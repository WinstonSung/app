<?php

namespace Wikia\PageHeader;

use \WikiaApp;

class Variants {

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
