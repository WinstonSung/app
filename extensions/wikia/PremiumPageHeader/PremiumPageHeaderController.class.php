<?php

class PremiumPageHeaderController extends WikiaController {

	public function wikiHeader() {
		$themeSettings = new ThemeSettings();
		$settings = $themeSettings->getSettings();

		$this->setVal( 'wordmarkText', $settings["wordmark-text"] );

		// fixme we should define new message for tally
		$this->setVal( 'tallyMsg',
			wfMessage( 'pph-total-articles', SiteStats::articles() )->parse() );

		$this->setVal( 'addNewPageHref', SpecialPage::getTitleFor( 'CreatePage' )->getLocalURL() );

		$this->setVal( 'mainPageURL', Title::newMainPage()->getLocalURL() );

	}

	public function navigation() {
		$this->setVal( 'data',
			( new NavigationModel() )->getLocalNavigationTree( NavigationModel::WIKI_LOCAL_MESSAGE ) );
	}
}
