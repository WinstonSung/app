<?php

class AdSS_ManagerBillingPager extends TablePager {

	private $mTitle, $bl, $userId;

	function __construct( $userId ) {
		global $wgAdSS_DBname;

		parent::__construct();

		$this->mDb = wfGetDB( DB_MASTER, array(), $wgAdSS_DBname );
		$this->mTitle = Title::makeTitle( NS_SPECIAL, "AdSS/manager/billing" );
		$this->userId = $userId;
	}

	function getTitle() {
		return $this->mTitle;
	}

	function isFieldSortable( $field ) {
		return false;
	}

	function formatRow( $row ) {
		$this->bl = AdSS_Billing::newFromRow( $row );
		return parent::formatRow( $row );
	}

	function formatValue( $name, $value ) {
		global $wgAdSS_templatesDir, $wgLang;
		switch( $name ) {
			case 'billing_timestamp':
				return substr( $value, 0, 16 );
			case 'description':
				if( $this->bl->paymentId ) {
					return wfMsgHtml( 'adss-paypal-payment' );
				} elseif( $this->bl->adId ) {
					$r = wfMsgHtml( 'adss-adss-fee' );
					$tmpl = new EasyTemplate( $wgAdSS_templatesDir . '/manager' );
					$tmpl->set( 'ad', AdSS_AdFactory::createFromId( $this->bl->adId ) );
					$r .= "<div style=\"display:none\"><ul><li>".$tmpl->render( 'ad' )."</li></ul></div>";
					return $r;
				} else {
					return '';
				}
			case 'fee':
				return $this->bl->amount < 0 ? wfMsg( 'adss-amount', $wgLang->formatNum( -$this->bl->amount ) ) : '';
			case 'paid':
				return $this->bl->amount > 0 ? wfMsg( 'adss-amount', $wgLang->formatNum( (float) $this->bl->amount ) ) : '';
			default:
				return $value;
		}
	}

	function getDefaultSort() {
		return "billing_id";
	}

	function getDefaultDirections() {
		// descending
		return true;
	}

	function getFieldNames() {
		return array(
				'billing_timestamp' => wfMsgHtml( 'adss-timestamp' ),
				'description'       => wfMsgHtml( 'adss-description' ),
				'fee'               => wfMsgHtml( 'adss-fee' ),
				'paid'              => wfMsgHtml( 'adss-paid' ),
			    );
	}

	function getQueryInfo() {
		$qi = array(
				'tables' => array( 'billing' ),
				'fields' => array( '*' ),
				'conds'  => array( 'billing_user_id' => $this->userId ),
			    );
		return $qi;
	}

}
