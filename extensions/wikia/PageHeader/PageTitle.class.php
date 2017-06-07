<?php

namespace Wikia\PageHeader;

use \RequestContext;
use \Title;
use \WikiaGlobalRegistry;
use \WikiaApp;
use \WikiaPageType;

class PageTitle {

	/* @var string */
	public $title;

	/* @var string */
	public $prefix;

	/* @var WikiaGlobalRegistry */
	private $wg;

	/* @var int */
	private $namespace;

	/* @var Title */
	private $MWTitle;

	const PREFIX_LESS_NAMESPACES = [ NS_MEDIAWIKI, NS_TEMPLATE, NS_CATEGORY, NS_FILE ];

	public function __construct( WikiaApp $app ) {
		$this->wg = $app->wg;
		$this->MWTitle = RequestContext::getMain()->getTitle();
		$this->request = RequestContext::getMain()->getRequest();

		$this->namespace = $this->MWTitle->getNamespace();
		$this->title = $this->handleTitle( $app );
		$this->prefix = $this->handlePrefix();
	}

	private function handleTitle( WikiaApp $app ): string {
		if ( WikiaPageType::isMainPage() ) {
			return $this->titleMainPage();
		} else if ( $this->MWTitle->isTalkPage() || $this->shouldNotDisplayNamespacePrefix( $this->namespace ) ) {
			return htmlspecialchars( $this->MWTitle->getText() );
		} else if ( $this->request->getCheck( 'diff' ) ) {
			return $this->prefixedTitle( 'page-header-title-prefix-changes' );
		} else if ( $this->request->getVal( 'action', 'view' ) == 'history' ) {
			return $this->prefixedTitle( 'page-header-title-prefix-history' );
		} else if ( defined( 'NS_BLOG_ARTICLE' ) && $this->MWTitle->getNamespace() == NS_BLOG_ARTICLE &&
		            $this->MWTitle->isSubpage()) {
			// remove User_blog:xxx from title
			$titleParts = explode( '/', $this->MWTitle->getText() );
			array_shift( $titleParts );

			return implode( '/', $titleParts );
		}

		return $app->getSkinTemplateObj()->data['title'];
	}

	private function handlePrefix() {
		if ( $this->MWTitle->isTalkPage() ) {
			return $this->wg->ContLang->getNsText( NS_TALK );
		}

		return null;
	}

	private function shouldNotDisplayNamespacePrefix( $namespace ): bool {
		return in_array( $namespace,
			array_merge(
				self::PREFIX_LESS_NAMESPACES,
				defined( 'NS_BLOG_LISTING' ) ? [ NS_BLOG_LISTING ] : [],
				$this->wg->SuppressNamespacePrefix
			)
		);
	}

	private function titleMainPage(): string {
		return wfMessage( 'oasis-home' )->escaped();
	}

	private function prefixedTitle( $prefixKey ): string {
		return wfMessage( $prefixKey, $this->MWTitle->getPrefixedText() )->escaped();
	}
}