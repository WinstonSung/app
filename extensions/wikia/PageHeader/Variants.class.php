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
		$this->currentVariantName = \Language::getLanguageName( $this->title->getPageLanguage()->getCode() );
		$this->variantList = $this->handleVariants( $app );
	}

	/**
	 * @param WikiaApp $app
	 *
	 * @return array
	 */
	private function handleVariants( WikiaApp $app ): array {
		$variants = $this->skinTemplate->get( 'content_navigation' )['variants'];
		if ( !empty( $variants ) ) {
			foreach ( $variants as $variant ) {
				$variants[$variant] = [
					'href' => $variant['href'],
					'id' => $variant['id'],
				];
			return $variants;
		}

		return [];
	}
}
