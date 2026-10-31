<?php

if ( ! function_exists( 'stockholm_qode_slider_options_map' ) ) {
	/**
	 * Slider options page
	 */
	function stockholm_qode_slider_options_map() {
		
		$sliderPage = new StockholmQodeAdminPage(
			"10",
			esc_html__( "Select Slider", 'stockholm' )
		);
		
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"slider",
			$sliderPage
		);
		
		// General Style
		
		$panel3 = new StockholmQodePanel(
			esc_html__( "General Style", 'stockholm' ),
			"navigation_control_style"
		);
		
		$sliderPage->addChild(
			"panel3",
			$panel3
		);
		
		$qs_slider_height_tablet = new StockholmQodeField(
			"text",
			"qs_slider_height_tablet",
			"",
			esc_html__( "Slider Height For Tablet Portrait and Mobile Landscape View (px)", 'stockholm' ),
			esc_html__( "Define slider height for tablet devices - portrait view and mobile devices landscape view", 'stockholm' )
		);
		
		$panel3->addChild(
			"qs_slider_height_tablet",
			$qs_slider_height_tablet
		);
		
		$qs_slider_height_mobile = new StockholmQodeField(
			"text",
			"qs_slider_height_mobile",
			"",
			esc_html__( "Slider Height For Mobile Devices (px)", 'stockholm' ),
			esc_html__( "Define slider height for mobile devices", 'stockholm' )
		);
		
		$panel3->addChild(
			"qs_slider_height_mobile",
			$qs_slider_height_mobile
		);
		
		// Navigation Style
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Navigation Style", 'stockholm' ),
			"navigation_style"
		);
		
		$sliderPage->addChild(
			"panel1",
			$panel1
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Navigation Style", 'stockholm' ),
			esc_html__( "Define styles for Select Slider navigation.", 'stockholm' )
		);
		
		$panel1->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$qs_navigation_color = new StockholmQodeField(
			"colorsimple",
			"qs_navigation_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			esc_html__( "Choose the most dominant theme color. Default color is #ffffff.", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_navigation_color",
			$qs_navigation_color
		);
		
		$qs_navigation_hover_color = new StockholmQodeField(
			"colorsimple",
			"qs_navigation_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' ),
			esc_html__( "Choose the most dominant theme color. Default color is #ffffff.", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_navigation_hover_color",
			$qs_navigation_hover_color
		);
		
		$qs_navigation_background_color = new StockholmQodeField(
			"colorsimple",
			"qs_navigation_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			esc_html__( "Choose the most dominant theme color. Default color is #a6a6a6.", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_navigation_background_color",
			$qs_navigation_background_color
		);
		
		$qs_navigation_background_hover_color = new StockholmQodeField(
			"colorsimple",
			"qs_navigation_background_hover_color",
			"",
			esc_html__( "Background Hover Color", 'stockholm' ),
			esc_html__( "Choose the most dominant theme color. Default color is #393939.", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_navigation_background_hover_color",
			$qs_navigation_background_hover_color
		);
		
		$row2 = new StockholmQodeRow();
		$group1->addChild(
			"row2",
			$row2
		);
		
		$qs_navigation_border_color = new StockholmQodeField(
			"colorsimple",
			"qs_navigation_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' ),
			esc_html__( "Choose the most dominant theme color. Default color is transparent.", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_navigation_border_color",
			$qs_navigation_border_color
		);
		
		$qs_navigation_border_hover_color = new StockholmQodeField(
			"colorsimple",
			"qs_navigation_border_hover_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' ),
			esc_html__( "Choose the most dominant theme color. Default color is transparent.", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_navigation_border_hover_color",
			$qs_navigation_border_hover_color
		);
		
		// Navigation Control Style
		
		$panel2 = new StockholmQodePanel(
			esc_html__( "Navigation Control Style", 'stockholm' ),
			"navigation_control_style"
		);
		
		$sliderPage->addChild(
			"panel2",
			$panel2
		);
		
		$qs_navigation_control_color = new StockholmQodeField(
			"color",
			"qs_navigation_control_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			esc_html__( "Default color is #fffff.", 'stockholm' )
		);
		
		$panel2->addChild(
			"qs_navigation_control_color",
			$qs_navigation_control_color
		);
		
		//Buttons
		
		$panel4 = new StockholmQodePanel(
			esc_html__( "Buttons Style", 'stockholm' ),
			"buttons_panel"
		);
		
		$sliderPage->addChild(
			"panel4",
			$panel4
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Button 1 Style", 'stockholm' ),
			esc_html__( "Define style for button 1.", 'stockholm' )
		);
		
		$panel4->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$qs_button_color = new StockholmQodeField(
			"colorsimple",
			"qs_button_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_button_color",
			$qs_button_color
		);
		
		$qs_button_hover_color = new StockholmQodeField(
			"colorsimple",
			"qs_button_hover_color",
			"",
			esc_html__( "Hover Text Color", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_button_hover_color",
			$qs_button_hover_color
		);
		
		$qs_button_background_color = new StockholmQodeField(
			"colorsimple",
			"qs_button_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_button_background_color",
			$qs_button_background_color
		);
		
		$qs_button_hover_background_color = new StockholmQodeField(
			"colorsimple",
			"qs_button_hover_background_color",
			"",
			esc_html__( "Background Hover Color", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_button_hover_background_color",
			$qs_button_hover_background_color
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		
		$qs_button_border_color = new StockholmQodeField(
			"colorsimple",
			"qs_button_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		
		$row2->addChild(
			"qs_button_border_color",
			$qs_button_border_color
		);
		
		$qs_button_hover_border_color = new StockholmQodeField(
			"colorsimple",
			"qs_button_hover_border_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' )
		);
		
		$row2->addChild(
			"qs_button_hover_border_color",
			$qs_button_hover_border_color
		);
		
		$qs_button_border_width = new StockholmQodeField(
			"textsimple",
			"qs_button_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' )
		);
		
		$row2->addChild(
			"qs_button_border_width",
			$qs_button_border_width
		);
		
		$qs_button_border_radius = new StockholmQodeField(
			"textsimple",
			"qs_button_border_radius",
			"",
			esc_html__( "Border radius (px)", 'stockholm' )
		);
		
		$row2->addChild(
			"qs_button_border_radius",
			$qs_button_border_radius
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Button 2 Style", 'stockholm' ),
			esc_html__( "Define style for button 2.", 'stockholm' )
		);
		
		$panel4->addChild(
			"group2",
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		
		$qs_button2_color = new StockholmQodeField(
			"colorsimple",
			"qs_button2_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_button2_color",
			$qs_button2_color
		);
		
		$qs_button2_hover_color = new StockholmQodeField(
			"colorsimple",
			"qs_button2_hover_color",
			"",
			esc_html__( "Hover Text Color", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_button2_hover_color",
			$qs_button2_hover_color
		);
		
		$qs_button2_background_color = new StockholmQodeField(
			"colorsimple",
			"qs_button2_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_button2_background_color",
			$qs_button2_background_color
		);
		
		$qs_button2_hover_background_color = new StockholmQodeField(
			"colorsimple",
			"qs_button2_hover_background_color",
			"",
			esc_html__( "Background Hover Color", 'stockholm' )
		);
		
		$row1->addChild(
			"qs_button2_hover_background_color",
			$qs_button2_hover_background_color
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		
		$qs_button2_border_color = new StockholmQodeField(
			"colorsimple",
			"qs_button2_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		
		$row2->addChild(
			"qs_button2_border_color",
			$qs_button2_border_color
		);
		
		$qs_button2_hover_border_color = new StockholmQodeField(
			"colorsimple",
			"qs_button2_hover_border_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' )
		);
		
		$row2->addChild(
			"qs_button2_hover_border_color",
			$qs_button2_hover_border_color
		);
		
		$qs_button2_border_width = new StockholmQodeField(
			"textsimple",
			"qs_button2_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' )
		);
		
		$row2->addChild(
			"qs_button2_border_width",
			$qs_button2_border_width
		);
		
		$qs_button2_border_radius = new StockholmQodeField(
			"textsimple",
			"qs_button2_border_radius",
			"",
			esc_html__( "Border radius (px)", 'stockholm' )
		);
		
		$row2->addChild(
			"qs_button2_border_radius",
			$qs_button2_border_radius
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_slider_options_map', 90 );
}