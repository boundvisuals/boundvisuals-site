<?php

if ( ! function_exists( 'stockholm_qode_title_options_map' ) ) {
	/**
	 * Title options page
	 */
	function stockholm_qode_title_options_map() {
		
		$titlePage = new StockholmQodeAdminPage(
			"4",
			esc_html__( "Title", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"title",
			$titlePage
		);
		
		$panel8 = new StockholmQodePanel(
			esc_html__( "Title", 'stockholm' ),
			"title_panel"
		);
		$titlePage->addChild(
			"panel8",
			$panel8
		);
		
		$show_page_title = new StockholmQodeField(
			"yesno",
			"show_page_title",
			"yes",
			esc_html__( "Enable Page Title Area", 'stockholm' ),
			esc_html__( "This option will enable Title Area", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_title_container"
			)
		);
		$panel8->addChild(
			"show_page_title",
			$show_page_title
		);
		
		$enable_title_container = new StockholmQodeContainer(
			"enable_title_container",
			"show_page_title",
			"no"
		);
		$panel8->addChild(
			"enable_title_container",
			$enable_title_container
		);
		
		$title_type = new StockholmQodeField(
			"select",
			"title_type",
			"standard_title",
			esc_html__( "Title Type", 'stockholm' ),
			esc_html__( "Choose title type", 'stockholm' ),
			array(
				"standard_title"    => esc_html__( "Standard", 'stockholm' ),
				"breadcrumbs_title" => esc_html__( "Breadcrumb", 'stockholm' )
			),
			array(
				"dependence" => true,
				"hide"       => array(
					"breadcrumbs_title" => "#qodef_breadcrumbs_container",
				),
				"show"       => array(
					"standard_title" => "#qodef_breadcrumbs_container"
				)
			)
		);
		$enable_title_container->addChild(
			"title_type",
			$title_type
		);

		$title_in_grid = new StockholmQodeField(
			"yesno",
			"title_in_grid",
			"yes",
			esc_html__( "Title in Grid", 'stockholm' ),
			"",
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_title_in_grid_container",
				"dependence_show_on_yes" => ""
			)
		);
		$enable_title_container->addChild(
			"title_in_grid",
			$title_in_grid
		);

		$title_in_grid_container = new StockholmQodeContainer(
			"title_in_grid_container",
			"title_in_grid",
			"yes"
		);
		$enable_title_container->addChild(
			"title_in_grid_container",
			$title_in_grid_container
		);

		$title_padding = new StockholmQodeField(
			"text",
			"title_padding",
			"",
			esc_html__( "Title Padding (px)", 'stockholm' ),
			esc_html__( "Set a padding for Title Area in pixels, ex. 0px 10px", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$title_in_grid_container->addChild(
			"title_padding",
			$title_padding
		);
		
		$animate_title_area = new StockholmQodeField(
			"select",
			"animate_title_area",
			"no",
			esc_html__( "Animations", 'stockholm' ),
			esc_html__( "Choose an animation for Title Area", 'stockholm' ),
			array(
				"no"              => esc_html__( "No animation", 'stockholm' ),
				"text_right_left" => esc_html__( "Text right to left", 'stockholm' ),
				"area_top_bottom" => esc_html__( "Title area top to bottom", 'stockholm' )
			)
		);
		$enable_title_container->addChild(
			"animate_title_area",
			$animate_title_area
		);
		
		$page_title_position = new StockholmQodeField(
			"select",
			"page_title_position",
			"left",
			esc_html__( "Title Text Alignment", 'stockholm' ),
			esc_html__( "Specify Title text alignment", 'stockholm' ),
			array(
				"left"   => esc_html__( "Left", 'stockholm' ),
				"center" => esc_html__( "Center", 'stockholm' ),
				"right"  => esc_html__( "Right", 'stockholm' )
			)
		);
		$enable_title_container->addChild(
			"page_title_position",
			$page_title_position
		);
		
		$title_text_background_color = new StockholmQodeField(
			"color",
			"title_text_background_color",
			"",
			esc_html__( "Title Text Background Color", 'stockholm' ),
			esc_html__( "Choose a background color for title text", 'stockholm' )
		);
		$enable_title_container->addChild(
			"title_text_background_color",
			$title_text_background_color
		);
		
		$title_text_background_opacity = new StockholmQodeField(
			"text",
			"title_text_background_opacity",
			"",
			esc_html__( "Title Text Background Opacity (0-1)", 'stockholm' ),
			esc_html__( "Set opacity for title text background.", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$enable_title_container->addChild(
			"title_text_background_opacity",
			$title_text_background_opacity
		);
		
		$title_text_shadow = new StockholmQodeField(
			"yesno",
			"title_text_shadow",
			"no",
			esc_html__( "Text Shadow", 'stockholm' ),
			esc_html__( "Enabling this option will give Title text a shadow", 'stockholm' )
		);
		$enable_title_container->addChild(
			"title_text_shadow",
			$title_text_shadow
		);
		
		$title_background_color = new StockholmQodeField(
			"color",
			"title_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			esc_html__( "Choose a background color for Title Area", 'stockholm' )
		);
		$enable_title_container->addChild(
			"title_background_color",
			$title_background_color
		);
		
		$title_image = new StockholmQodeField(
			"image",
			"title_image",
			"",
			esc_html__( "Background Image", 'stockholm' ),
			esc_html__( "Choose an Image for Title Area", 'stockholm' )
		);
		$enable_title_container->addChild(
			"title_image",
			$title_image
		);
		
		$responsive_title_image = new StockholmQodeField(
			"yesno",
			"responsive_title_image",
			"no",
			esc_html__( "Background Responsive Image", 'stockholm' ),
			esc_html__( "Enabling this option will make Title background image responsive", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_responsive_title_image_container",
				"dependence_show_on_yes" => ""
			)
		);
		$enable_title_container->addChild(
			"responsive_title_image",
			$responsive_title_image
		);
		
		$responsive_title_image_container = new StockholmQodeContainer(
			"responsive_title_image_container",
			"responsive_title_image",
			"yes"
		);
		$enable_title_container->addChild(
			"responsive_title_image_container",
			$responsive_title_image_container
		);
		$fixed_title_image = new StockholmQodeField(
			"select",
			"fixed_title_image",
			"no",
			esc_html__( "Parallax Title Image", 'stockholm' ),
			esc_html__( "Enabling this option will make Title image parallax", 'stockholm' ),
			array(
				"no"       => esc_html__( "No", 'stockholm' ),
				"yes"      => esc_html__( "Yes", 'stockholm' ),
				"yes_zoom" => esc_html__( "Yes, with zoom out", 'stockholm' )
			)
		);
		$responsive_title_image_container->addChild(
			"fixed_title_image",
			$fixed_title_image
		);
		$title_height = new StockholmQodeField(
			"text",
			"title_height",
			"",
			esc_html__( "Title Height (px)", 'stockholm' ),
			esc_html__( "Set a height for Title Area in pixels", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$responsive_title_image_container->addChild(
			"title_height",
			$title_height
		);
		
		$title_overlay_image = new StockholmQodeField(
			"image",
			"title_overlay_image",
			"",
			esc_html__( "Pattern Overlay Image", 'stockholm' ),
			esc_html__( "Choose an image to be used as pattern over Title Area", 'stockholm' )
		);
		$enable_title_container->addChild(
			"title_overlay_image",
			$title_overlay_image
		);
		
		$border_bottom_title_area = new StockholmQodeField(
			"yesno",
			"border_bottom_title_area",
			"no",
			esc_html__( "Bottom Border", 'stockholm' ),
			esc_html__( "Enabling this option will display bottom border on Title Area", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_border_bottom_title_area_container"
			)
		);
		$enable_title_container->addChild(
			"border_bottom_title_area",
			$border_bottom_title_area
		);
		$border_bottom_title_area_container = new StockholmQodeContainer(
			"border_bottom_title_area_container",
			"border_bottom_title_area",
			"no"
		);
		$enable_title_container->addChild(
			"border_bottom_title_area_container",
			$border_bottom_title_area_container
		);
		$border_bottom_title_area_color = new StockholmQodeField(
			"color",
			"border_bottom_title_area_color",
			"",
			esc_html__( "Bottom Border Color", 'stockholm' ),
			esc_html__( "Choose a color for Title Area bottom border", 'stockholm' )
		);
		$border_bottom_title_area_container->addChild(
			"border_bottom_title_area_color",
			$border_bottom_title_area_color
		);

		$breadcrumbs_container = new StockholmQodeContainer(
			"breadcrumbs_container",
			"title_type",
			"breadcrumbs_title"
		);
		$enable_title_container->addChild(
			"breadcrumbs_container",
			$breadcrumbs_container
		);

		$enable_breadcrumbs = new StockholmQodeField(
			"yesno",
			"enable_breadcrumbs",
			"no",
			esc_html__( "Enable Breadcrumbs", 'stockholm' ),
			esc_html__( "This option will display Breadcrumbs in Title Area", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_breadcrumbs_container"
			)
		);
		$breadcrumbs_container->addChild(
			"enable_breadcrumbs",
			$enable_breadcrumbs
		);

		$enable_breadcrumbs_container = new StockholmQodeContainer(
			"enable_breadcrumbs_container",
			"enable_breadcrumbs",
			"no"
		);
		$breadcrumbs_container->addChild(
			"enable_breadcrumbs_container",
			$enable_breadcrumbs_container
		);

		$title_breadcrumbs_postiion = new StockholmQodeField(
			"select",
			"title_breadcrumbs_postiion",
			"bellow_title",
			esc_html__( "Breadcrumbs Position", 'stockholm' ),
			esc_html__( "Select wehre bradcrumbs will be displyed", 'stockholm' ),
			array(
				"bellow_title"       => esc_html__( "Below Title", 'stockholm' ),
				"right_from_title"      => esc_html__( "Right From Title", 'stockholm' )
			)
		);

		$enable_breadcrumbs_container->addChild(
			"title_breadcrumbs_postiion",
			$title_breadcrumbs_postiion
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_title_options_map', 50 );
}