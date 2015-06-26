<?php

class TemplateConverter {

	const TEMPLATE_VARIABLE_REGEX = '/{{{([^\|}]*?)\|?.*}}}/sU';

	var $title; // Title object of the template we're converting

	/**
	 * Names of variables that should be converted to a <title> tag
	 * @var array
	 */
	public static $titleAliases = [
		'name',
		'title',
	];

	/**
	 * Names of variables that should be converted to an <image> tag
	 * @var array
	 */
	public static $imageAliases = [
		'image',
		'picture',
		'photo',
		'mainimage',
	];

	public function __construct( Title $templateTitle ) {
		$this->title = $templateTitle;
	}

	/**
	 * Performs a conversion to a template with a portable infobox.
	 *
	 * @param $content
	 * @return string
	 */
	public function convertAsInfobox( $content ) {
		$draft = "<infobox>\n";

		$variables = $this->findTemplateVariables( $content );

		foreach ( $variables as $variable ) {
			if ( in_array( $variable, self::$titleAliases ) ) {
				$draft .= $this->createTitleTag( $variable );
			} elseif ( in_array( $variable, self::$imageAliases ) ) {
				$draft .= $this->createImageTag( $variable );
			} else {
				$draft .= $this->createDataTag( $variable );
			}
		}

		$draft .= "</infobox>\n";

		$draft .= $this->generatePreviewSection( $variables );

		return $draft;
	}

	/**
	 * Extracts variables used in a content of a template.
	 *
	 * @param $content
	 * @return array
	 */
	public function findTemplateVariables( $content ) {
		$variables = [];

		preg_match_all( self::TEMPLATE_VARIABLE_REGEX, $content, $variables );
		$variables = array_unique( $variables[1] );

		return $variables;
	}

	/**
	 * Creates a <title> tag.
	 *
	 * @param $source
	 * @param string $default
	 * @return string
	 */
	public function createTitleTag( $source, $default = '' ) {
		if ( empty( $default ) ) {
			$default = '{{PAGENAME}}';
		}
		return "\t<title source=\"{$source}\"><default>{$default}</default></title>\n";
	}

	/**
	 * Creates an <image> tag.
	 *
	 * @param $source
	 * @return string
	 */
	public function createImageTag( $source ) {
		return "\t<image source=\"{$source}\"/>\n";
	}

	/**
	 * Creates a <data> tag.
	 *
	 * @param $source
	 * @param string $label
	 * @return string
	 */
	public function createDataTag( $source, $label = '' ) {
		if ( empty( $label ) ) {
			$label = $source;
		}
		return "\t<data source=\"{$source}\"><label>{$label}</label></data>\n";
	}

	public function generatePreviewSection( $variables ) {
		$preview = "{{" . $this->title->getText() . "\n";
		$docs = $preview;

		foreach ( $variables as $var ) {
			$preview .= "|{$var}=This is a test\n";
			$docs .= "|{$var}=\n";
		}

		$preview .= "}}\n";
		$docs .= "}}\n";

		$return = "<noinclude>\n== Usage & preview ==\n";

		$return .= "Type in this:\n<pre>\n$docs</pre>\nto see this:\n$preview\n";

		$return .= "[{{fullurl:PAGENAME}}?action=purge Click here to refresh the preview above]\n";

		$return .= "</noinclude>\n";

		return $return;
	}
} 
