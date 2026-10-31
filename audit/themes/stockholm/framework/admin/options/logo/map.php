<?php

if ( ! function_exists( 'stockholm_qode_logo_options_map' ) ) {
	/**
	 * Logo options page
	 */
	function stockholm_qode_logo_options_map() {
		
		$logoPage = new StockholmQodeAdminPage(
			"1",
			esc_html__( "Logo", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"logo",
			$logoPage
		);
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Logo", 'stockholm' ),
			"logo"
		);
		$logoPage->addChild(
			"panel1",
			$panel1
		);
		
		$logo_image = new StockholmQodeField(
			"image",
			"logo_image",
			QODE_ROOT . "/img/logo.png",
			esc_html__( "Logo Image - Normal", 'stockholm' ),
			esc_html__( "Choose a default logo image to display ", 'stockholm' )
		);
		$panel1->addChild(
			"logo_image",
			$logo_image
		);
		
		$logo_image_light = new StockholmQodeField(
			"image",
			"logo_image_light",
			QODE_ROOT . "/img/logo_white.png",
			esc_html__( "Logo Image - Light", 'stockholm' ),
			esc_html__( 'Choose a logo image to display for "Light" header skin', 'stockholm' )
		);
		$panel1->addChild(
			"logo_image_light",
			$logo_image_light
		);
		
		$logo_image_dark = new StockholmQodeField(
			"image",
			"logo_image_dark",
			QODE_ROOT . "/img/logo_black.png",
			esc_html__( "Logo Image - Dark", 'stockholm' ),
			esc_html__( 'Choose a logo image to display for "Dark" header skin', 'stockholm' )
		);
		$panel1->addChild(
			"logo_image_dark",
			$logo_image_dark
		);
		
		$logo_image_sticky = new StockholmQodeField(
			"image",
			"logo_image_sticky",
			QODE_ROOT . "/img/logo_black.png",
			esc_html__( "Logo Image - Sticky Header", 'stockholm' ),
			esc_html__( 'Choose a logo image to display for "Sticky" header type', 'stockholm' )
		);
		$panel1->addChild(
			"logo_image_sticky",
			$logo_image_sticky
		);
		
		$logo_image_fixed_hidden = new StockholmQodeField(
			"image",
			"logo_image_fixed_hidden",
			"",
			esc_html__( "Logo Image - Fixed Advanced Header", 'stockholm' ),
			esc_html__( 'Choose a logo image to display for "Fixed Advanced" header type', 'stockholm' )
		);
		$panel1->addChild(
			"logo_image_fixed_hidden",
			$logo_image_fixed_hidden
		);

        $mobile_logo_image = new StockholmQodeField(
            "image",
            "mobile_logo_image",
            "",
            esc_html__( "Logo Image - Mobile", 'stockholm' ),
            esc_html__( "Choose a default logo image to display in mobile menu. Leave empty if you want default logo to be displayed", 'stockholm' )
        );
        $panel1->addChild(
            "mobile_logo_image",
            $mobile_logo_image
        );
		
		$logo_mobile_header_height = new StockholmQodeField(
			"text",
			"logo_mobile_header_height",
			"",
			esc_html__( "Logo Height For Mobile Header (px)", 'stockholm' ),
			esc_html__( "Define logo height for mobile header", 'stockholm' )
		);
		$panel1->addChild(
			"logo_mobile_header_height",
			$logo_mobile_header_height
		);
		
		$logo_mobile_height = new StockholmQodeField(
			"text",
			"logo_mobile_height",
			"",
			esc_html__( "Logo Height For Mobile Devices (px)", 'stockholm' ),
			esc_html__( "Define logo height for mobile devices", 'stockholm' )
		);
		$panel1->addChild(
			"logo_mobile_height",
			$logo_mobile_height
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_logo_options_map', 20 );
}
