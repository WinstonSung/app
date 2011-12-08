<?php
/**
 * HealthCheck
 *
 * @file
 * @ingroup Extensions
 * @author Łukasz Garczewski (TOR) <tor@wikia-inc.com>
 * @date 2009-11-10
 * @copyright Copyright © 2009 Łukasz Garczewski, Wikia Inc.
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This is a MediaWiki extension named HealthCheck.\n";
	exit( 1 );
}

class HealthCheck extends UnlistedSpecialPage {

	const STATUS_MESSAGE_OK = "Server status is: OK";
	const POST_PARAM_GET = 'posttest_get';
	const POST_PARAM_POST = 'posttest_post';

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'HealthCheck'/*class*/ );
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page or null
	 */
	public function execute( $par ) {
		global $wgOut, $wgRequest, $wgDevelEnvironment;

		// Set page title and other stuff
		$this->setHeaders();
		$wgOut->setPageTitle( 'Special:Healthcheck' );

		// for faster response
		$wgOut->setArticleBodyOnly( true );

		$statusCode = 200;
		$statusMsg = self::STATUS_MESSAGE_OK;

		if ( $wgRequest->wasPosted() && $wgRequest->getVal(self::POST_PARAM_GET) ) {
			$testValue = $wgRequest->getVal(self::POST_PARAM_GET);
			if ( empty($testValue) || $testValue != $wgRequest->getVal(self::POST_PARAM_POST) ) {
				$statusCode = 503;
				$statusMsg = "Server status is: NOT OK - POST data incorrect";
			}
			$wgOut->setStatusCode( $statusCode );
			$wgOut->addHTML( $statusMsg );
			return;
		}



		$maxLoad = $wgRequest->getVal('maxload');
		$cpuCount = rtrim( shell_exec('cat /proc/cpuinfo | grep processor | wc -l') );
		$load = sys_getloadavg();


		if ( $cpuRatio = $wgRequest->getVal('cpuratio') ) {
		    $maxLoad = $cpuCount * $cpuRatio;
		}

		$wgRequest->response()->header("Cpu-Count: $cpuCount");
		$wgRequest->response()->header("Load: " . implode(", ", $load));
		$wgRequest->response()->header("Max-Load: $maxLoad");

		if ( $maxLoad ) {
		    if ( $load[0] > $maxLoad ||
			 $load[1] > $maxLoad ||
			 $load[2] > $maxLoad ) {
				$statusCode = 503;
				$statusMsg = "Server status is: NOT OK - load ($load[0] $load[1] $load[2]) > $maxLoad (cpu = $cpuCount)";
		    }
		}


		if ( file_exists( "/usr/wikia/conf/current/host_disabled" ) ||
			 file_exists( "/etc/apache2/host_disabled" ) ) {
			# failure!
  			$statusCode = 503;
			$statusMsg  = 'Server status is: NOT OK - Disabled';
		}


		// Varnish should respond with a 200 for any request to any host with this path
		// The Http class takes care of the proxying through varnish for us.
		if ( empty( $wgDevelEnvironment ) ) {
			$content = Http::get("http://x/__varnish_nagios_check");
			if (!$content) {
				$statusCode = 503;
				$statusMsg  = 'Server status is: NOT OK - Varnish not responding';
			}
		}

		// check for riak if riak is using as sessions provider
		// @author Krzysztof Krzyżaniak (eloy)
		global $wgSessionsInRiak, $wgRiakSessionNode, $wgRiakStorageNodes, $wgSolidCacheType;
		if( 0  ) { // disabled, original condition: $wgSessionsInRiak || $wgSolidCacheType == CACHE_RIAK
			// get data for connection
			$riakNode = $wgRiakStorageNodes[ $wgRiakSessionNode ];

			// build url
			$riakPing = sprintf( "http://%s:%s/ping", $riakNode[ "host"], $riakNode[ "port" ] );

			// set proxy if needed, for local riak we have to pass request directly
			$options = array();
			if( isset( $riakNode[ "proxy"] ) && $riakNode[ "proxy" ] ) {
				$options[ "proxy" ] = $riakNode[ "proxy" ];
			}
			else {
				$options[ "noProxy" ] = true;
			}

			$content = Http::get( $riakPing, 'default', $options );
			if( $content === false ) {
				$statusCode = 503;
				$statusMsg = "Server status is: NOT OK - Riak is down";
			}
		}

		$content = Http::post('http://'.$_SERVER['SERVER_NAME'].'/index.php?title=Special:HealthCheck&'.self::POST_PARAM_GET.'=1234',array(
			'proxy' => '127.0.0.1:80',
			'postData' => array(
				self::POST_PARAM_POST => '1234',
			),
		));
		if ( substr( (string)$content, 0, strlen(self::STATUS_MESSAGE_OK) ) != self::STATUS_MESSAGE_OK ) {
			$statusCode = 503;
			$statusMsg  = 'Server status is: NOT OK - POST request failed';
		}

		$wgOut->setStatusCode( $statusCode );
		$wgOut->addHTML( $statusMsg );
	}
}
