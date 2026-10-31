<?php

if ( ! function_exists( 'stockholm_qode_parallax_options_map' ) ) {
	/**
	 * Parallax options page
	 */
	function stockholm_qode_parallax_options_map() {
		
		$parallaxPage = new StockholmQodeAdminPage(
			"14",
			esc_html__( "Parallax", 'stockholm' )
		);
		
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			esc_html__( "Parallax", 'stockholm' ),
			$parallaxPage
		);
		
		//Parallax Settings
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Parallax Settings", 'stockholm' ),
			"parallax_settings_panel"
		);
		
		$parallaxPage->addChild(
			"panel1",
			$panel1
		);
		
		$parallax_onoff = new StockholmQodeField(
			"onoff",
			"parallax_onoff",
			"on",
			esc_html__( "Parallax on touch devices", 'stockholm' ),
			esc_html__( "Enabling this option will allow parallax on touch devices", 'stockholm' )
		);
		
		$panel1->addChild(
			"parallax_onoff",
			$parallax_onoff
		);
		
		$parallax_minheight = new StockholmQodeField(
			"text",
			"parallax_minheight",
			"400",
			esc_html__( "Parallax Min Height (px)", 'stockholm' ),
			esc_html__( "Set a minimum height for parallax images on small displays (phones, tablets, etc.)", 'stockholm' )
		);
		
		$panel1->addChild(
			"parallax_minheight",
			$parallax_minheight
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_parallax_options_map', 160 );
}