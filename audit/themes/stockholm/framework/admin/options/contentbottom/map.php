<?php

if ( ! function_exists( 'stockholm_qode_contentbottom_options_map' ) ) {
	/**
	 * Content Bottom options page
	 */
	function stockholm_qode_contentbottom_options_map() {
		
		$contentbottomPage = new StockholmQodeAdminPage(
			"15",
			esc_html__( "Content Bottom", 'stockholm' )
		);
		
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			esc_html__( "Content Bottom", 'stockholm' ),
			$contentbottomPage
		);
		
		//Content Bottom Area
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Content Bottom Area", 'stockholm' ),
			"content_bottom_area_panel"
		);
		
		$contentbottomPage->addChild(
			"panel1",
			$panel1
		);
		
		$enable_content_bottom_area = new StockholmQodeField(
			"yesno",
			"enable_content_bottom_area",
			"no",
			esc_html__( "Enable Content Bottom Area", 'stockholm' ),
			esc_html__( "This option will enable Content Bottom area on pages", 'stockholm' ),
			array(),
			array(
				"dependence" => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_content_bottom_area_container"
			)
		);
		
		$panel1->addChild(
			"enable_content_bottom_area",
			$enable_content_bottom_area
		);
		
		$enable_content_bottom_area_container = new StockholmQodeContainer(
			"enable_content_bottom_area_container",
			"enable_content_bottom_area",
			"no"
		);
		
		$panel1->addChild(
			"enable_content_bottom_area_container",
			$enable_content_bottom_area_container
		);
		
		$custom_sidebars = stockholm_qode_get_custom_sidebars();
		
		$content_bottom_sidebar_custom_display = new StockholmQodeField(
			"selectblank",
			"content_bottom_sidebar_custom_display",
			"",
			esc_html__( "Sidebar to Display", 'stockholm' ),
			esc_html__( "Choose a Content Bottom sidebar to display", 'stockholm' ),
			$custom_sidebars
		);
		
		$enable_content_bottom_area_container->addChild(
			"content_bottom_sidebar_custom_display",
			$content_bottom_sidebar_custom_display
		);
		
		$content_bottom_in_grid = new StockholmQodeField(
			"yesno",
			"content_bottom_in_grid",
			"yes",
			esc_html__( "Display in Grid", 'stockholm' ),
			esc_html__( "Enabling this option will place Content Bottom in grid", 'stockholm' )
		);
		
		$enable_content_bottom_area_container->addChild(
			"content_bottom_in_grid",
			$content_bottom_in_grid
		);
		
		$content_bottom_background_color = new StockholmQodeField(
			"color",
			"content_bottom_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			esc_html__( "Choose a background color for Content Bottom area", 'stockholm' )
		);
		
		$enable_content_bottom_area_container->addChild(
			"content_bottom_background_color",
			$content_bottom_background_color
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_contentbottom_options_map', 170 );
}