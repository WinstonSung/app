<?php

namespace Wikia\PageHeader;

use Html;
use WikiaApp;

class Variants {


	/**
	 * @var \SkinTemplate
	 */
	private $skinTemplate;

	public function __construct( WikiaApp $app ) {
		$this->skinTemplate = $app->getSkinTemplateObj();
	}

	/**
	 * @return array
	 */
	private function languageVariants() {
		$variants = $this->skinTemplate->get( 'content_navigation' )['variants'];
		if ( !empty( $variants ) ) {
			return array_map( function ( $variant ) {
				return Html::element( 'a', [
					'href' => $variant['href'],
					'rel' => 'nofollow',
					'id' => $variant['id'],
				], $variant['text'] );
			}, $variants );
		}

		return [];
	}
}
