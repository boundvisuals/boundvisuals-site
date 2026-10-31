<?php

if ( ! function_exists( 'stockholm_qode_reset_options_map' ) ) {
	/**
	 * Reset options page
	 */
	function stockholm_qode_reset_options_map() {
		
		$resetPage = new StockholmQodeAdminPage(
			"17",
			esc_html__( "Reset", 'stockholm' )
		);
		
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			esc_html__( "Reset", 'stockholm' ),
			$resetPage
		);
		
		//Reset
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Reset to Defaults", 'stockholm' ),
			"reset_panel"
		);
		
		$resetPage->addChild(
			"panel1",
			$panel1
		);
		
		$reset_to_defaults = new StockholmQodeField(
			"yesno",
			"reset_to_defaults",
			"no",
			esc_html__( "Reset to Defaults", 'stockholm' ),
			esc_html__( "This option will reset all Select Options values to defaults", 'stockholm' )
		);
		
		$panel1->addChild(
			"reset_to_defaults",
			$reset_to_defaults
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_reset_options_map', 210 );
}