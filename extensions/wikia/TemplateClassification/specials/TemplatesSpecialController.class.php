<?php

use Wikia\ContentReview\ContentReviewStatusesService;
use Wikia\ContentReview\Helper;

class TemplatesSpecialController extends WikiaSpecialPageController {

	const ITEMS_PER_PAGE = 20;

	public $type;
	public $templateName;
	public $templates = [];
	public $groups;

	function __construct() {
		parent::__construct( 'Templates' );
	}

	public function init() {
		$this->specialPage->setHeaders();
		$this->specialPage->getOutput()->setPageTitle( wfMessage( 'special-templates' )->escaped() );

		\Wikia::addAssetsToOutput( 'templates_hq_scss' );
	}

	public function index() {
		$allTemplates = $this->getAllTempaltes();

		if ( !empty( $allTemplates ) ) {
			$classifiedTemplates = $this->getClassifiedTemplates();

			$this->groups = $this->getTemplateGroups( $classifiedTemplates );
			$this->templateName = $this->getVal( 'template' );
			$this->type = $this->getVal( 'type', $this->getDefaultType() );
			$page = $this->request->getInt( 'page', 1 ) - 1;

			if ( !empty( $this->templateName ) ) {
				$this->templates = $this->filterTemplatesByName( $allTemplates, $classifiedTemplates );
			} else {
				$this->templates = $this->getTemplates( $allTemplates, $classifiedTemplates );
			}

			$total = $this->getTotalTemplatesNum();

			if ( $total > self::ITEMS_PER_PAGE ) {
				$this->sliceTemplates( $page );
				$this->preparePagination( $total, $page );
			}
		}

		$this->setVal( 'templates', $this->templates );
		$this->setVal( 'type', $this->type );
		$this->setVal( 'groups', $this->groups );
		$this->setVal( 'templateName', $this->templateName );
	}

	/**
	 * Get all classified templates on wiki
	 *
	 * @return array
	 */
	private function getClassifiedTemplates() {
		$classifiedTemplates = [];

		try {
			$classifiedTemplates = ( new \TemplateClassificationService() )->getTemplatesOnWiki( $this->wg->CityId );
		} catch( \Exception $e ) {
		}

		return $classifiedTemplates;
	}

	/**
	 * Get all templates on wiki with number of pages on which are included
	 *
	 * @return bool|mixed
	 * @throws \FluentSql\Exception\SqlException
	 */
	private function getAllTempaltes() {
		$db = wfGetDB( DB_SLAVE );

		$templates = ( new \WikiaSQL() )
			->SELECT( 'page_id', 'qc_title', 'qc_value' )
			->FROM( 'querycache' )
			->LEFT_JOIN( 'page' )
			->ON( 'page_title', 'qc_title' )
			->WHERE( 'qc_type' )->EQUAL_TO( 'Mostlinkedtemplates' )
			->AND_( 'qc_namespace' )->EQUAL_TO( NS_TEMPLATE )
			->AND_( 'page_namespace' )->EQUAL_TO( NS_TEMPLATE )
			->ORDER_BY( ['qc_value', 'DESC'] )
			->runLoop( $db, function( &$templates, $row ) {
				$templates[$row->page_id] = [
					'page_id' => $row->page_id,
					'title' => $row->qc_title,
					'count' => $row->qc_value
				];
			});

		return $templates;
	}

	/**
	 * Filter templates by name
	 *
	 * @param $groupedTemplates
	 * @return array
	 */
	private function filterTemplatesByName( $allTemplates, $classifiedTemplates ) {
		$templates = [];

		if ( $pageId = array_search( $this->templateName, array_column( $allTemplates, 'title', 'page_id' ) ) ) {
			$templates[$pageId] = $this->prepareTemplate( $pageId, $allTemplates[$pageId] );
			$this->type = $this->getTemplateType( $pageId, $classifiedTemplates );
		}

		return $templates;
	}

	/**
	 * Get templates depending by type
	 *
	 * @param $allTemplates
	 * @param $classifiedTemplates
	 * @return array
	 */
	private function getTemplates( $allTemplates, $classifiedTemplates ) {
		if ( $this->type === TemplateClassificationService::TEMPLATE_UNKNOWN ) {
			$templates = $this->getUnknownTemplates( $allTemplates, $classifiedTemplates );
		} else {
			$templates = $this->getTemplatesByType( $allTemplates, $classifiedTemplates );
		}

		return $templates;
	}

	/**
	 * Get all unknown templates
	 *
	 * @param array $allTemplates all tempaltes on wiki
	 * @param array $classifiedTemplates all classified templates on wiki
	 * @return array
	 */
	private function getUnknownTemplates( $allTemplates, $classifiedTemplates ) {
		$templates = [];

		foreach ( $allTemplates as $pageId => $template ) {
			if ( !isset( $classifiedTemplates[$pageId] ) || !$this->isUserType( $classifiedTemplates[$pageId] )	) {
				$templates[$pageId] = $this->prepareTemplate( $pageId, $template );
			}
		}

		return $templates;
	}

	/**
	 * Get templates on wiki by type
	 *
	 * @param $allTemplates
	 * @param $classifiedTemplates
	 * @return array
	 */
	private function getTemplatesByType( $allTemplates, $classifiedTemplates ) {
		$templates = [];
		$templateIds = array_keys( $classifiedTemplates, $this->type );

		foreach ( $templateIds as $pageId ) {
			if ( isset( $allTemplates[$pageId] ) ) {
				$templates[$pageId] = $this->prepareTemplate( $pageId, $allTemplates[$pageId] );
			}
		}

		return $templates;
	}

	/**
	 * Get data about template page
	 *
	 * @param int $pageId
	 * @param array $template
	 * @return mixed
	 * @throws MWException
	 */
	private function prepareTemplate( $pageId, $template ) {
		$title = Title::newFromID( $pageId );

		if ( $title instanceof Title ) {
			$template['url'] = $title->getLocalURL();
			$template['wlh'] = SpecialPage::getTitleFor( 'Whatlinkshere', $title->getPrefixedText() )->getLocalURL();
			$template['revision'] = $this->getRevisionData( $title );
		}

		return $template;
	}

	/**
	 * Get data about tempalte page last revision
	 *
	 * @param Title $title
	 * @return array
	 * @throws MWException
	 */
	private function getRevisionData( Title $title ) {
		$data = [];
		$revision = Revision::newFromId( $title->getLatestRevID() );

		if ( $revision instanceof Revision ) {
			$data['timestamp'] = wfTimestamp( TS_UNIX, $revision->getTimestamp() );

			$user = $revision->getUserText();

			if ( $revision->getUser() ) {
				$userpage = Title::newFromText( $user, NS_USER )->getFullURL();
			} else {
				$userpage = SpecialPage::getTitleFor( 'Contributions', $user )->getFullUrl();
			}

			$data['username'] = $user;
			$data['userpage'] = $userpage;
		}

		return $data;
	}

	/**
	 * Prepare pagination
	 *
	 * @param int $total
	 * @param int $page
	 */
	private function preparePagination( $total, $page ) {
		$itemsPerPage = self::ITEMS_PER_PAGE;
		$params = [ 'page' => '%s' ];

		if ( $this->type ) {
			$params['type'] = $this->type;
		}

		if ( $this->templateName ) {
			$params['template'] = $this->templateName;
		}

		if( $total > $itemsPerPage ) {
			$paginator = Paginator::newFromArray( array_fill( 0, $total, '' ), $itemsPerPage, 3, false, '',  self::ITEMS_PER_PAGE );
			$paginator->setActivePage( $page );
			$url = urldecode( $this->specialPage->getTitle()->getLocalUrl( $params ) );
			$this->paginatorBar = $paginator->getBarHTML( $url );
		}
	}

	/**
	 * Slice templates list for pagination
	 *
	 * @param $page
	 */
	private function sliceTemplates( $page ) {
		$offset = $page * self::ITEMS_PER_PAGE;
		$limit = self::ITEMS_PER_PAGE;

		$this->templates = array_slice( $this->templates, $offset, $limit, true );
	}

	/**
	 * Get all existing and user facing template types on wiki
	 *
	 * @param array $groupedTemplates
	 * @return array
	 */
	private function getTemplateGroups( $classifiedTemplates ) {
		$groups = array_unique( $classifiedTemplates );

		foreach ( $groups as $id => $group ) {
			if ( !$this->isUserType( $group ) ) {
				if ( !in_array( TemplateClassificationService::TEMPLATE_UNKNOWN, $groups ) ) {
					$groups[] = TemplateClassificationService::TEMPLATE_UNKNOWN;
				}

				unset( $groups[$id] );
			}
		}

		sort( $groups );

		return $groups;
	}

	/**
	 * Get number of templates
	 *
	 * @return int
	 */
	private function getTotalTemplatesNum() {
		return count( $this->templates );
	}

	/**
	 * Get template type
	 *
	 * @param $pageId
	 * @param $classifiedTemplates
	 * @return string
	 */
	private function getTemplateType( $pageId, $classifiedTemplates ) {
		if ( !isset( $classifiedTemplates[$pageId] ) || !$this->isUserType( $classifiedTemplates[$pageId] )
		) {
			return TemplateClassificationService::TEMPLATE_UNKNOWN;
		} else {
			return $classifiedTemplates[$pageId];
		}

	}

	/**
	 * Get default type
	 *
	 * @return string
	 */
	private function getDefaultType() {
		if ( in_array( TemplateClassificationService::TEMPLATE_UNKNOWN, $this->groups ) ) {
			return TemplateClassificationService::TEMPLATE_UNKNOWN;
		} else {
			return $this->groups[0];
		}
	}

	/**
	 * Check if given type is user facing
	 *
	 * @param $type
	 * @return bool
	 */
	private function isUserType( $type ) {
		return in_array( $type, TemplateClassificationService::$templateTypes );
	}
}
