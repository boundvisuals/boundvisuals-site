<?php

if ( ! function_exists( 'stockholm_qode_map_page_meta_fields' ) ) {
	function stockholm_qode_map_page_meta_fields() {
		$qode_custom_sidebars = stockholm_qode_get_custom_sidebars();
		
		$qode_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$qode_blog_categories[ $category->term_id ] = $category->name;
		}
		
		// General Meta Box Section
		
		$qodeGeneral = new StockholmQodeMetaBox(
			"page",
			esc_html__( "Select General", 'stockholm' ),
			"general-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox( "page_general", $qodeGeneral );
		
		$qode_page_background_color = new StockholmQodeMetaField(
			"color",
			"qode_page_background_color",
			"",
			esc_html__( "Page Background Color", 'stockholm' ),
			esc_html__( "Choose the page background (body) color", 'stockholm' )
		);
		$qodeGeneral->addChild( "qode_page_background_color", $qode_page_background_color );

		$qode_page_background_image = new StockholmQodeMetaField(
			"image",
			"qode_page_background_image",
			"",
			esc_html__( "Page Background Image", 'stockholm' ),
			esc_html__( "Choose the page background (body) image. Please note that this option will override 'Page Background Color' option above", 'stockholm' )
		);
		$qodeGeneral->addChild( "qode_page_background_image", $qode_page_background_image );
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Content Style", 'stockholm' ),
			esc_html__( "Define styles for Content area", 'stockholm' )
		);
		$qodeGeneral->addChild( "group1", $group1 );
		
		$row1 = new StockholmQodeRow();
		$group1->addChild( "row1", $row1 );
		
		$qode_content_top_padding = new StockholmQodeMetaField(
			"textsimple",
			"qode_content-top-padding",
			"",
			esc_html__( "Content Top Padding (px)", 'stockholm' ),
			esc_html__( "This option control content top padding.", 'stockholm' )
		);
		$row1->addChild( "qode_content-top-padding", $qode_content_top_padding );
		
		$qode_content_top_padding_mobile = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_content-top-padding-mobile",
			"",
			esc_html__( "Set this top padding for mobile header", 'stockholm' ),
			"",
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			)
		);
		$row1->addChild( "qode_content-top-padding-mobile", $qode_content_top_padding_mobile );
		
		$qode_show_animation = new StockholmQodeMetaField(
			"selectblank",
			"qode_show-animation",
			"",
			esc_html__( "Page Transition", 'stockholm' ),
			esc_html__( 'Choose a type of transition between loading pages.', 'stockholm' ),
			array(
				"no_animation" => esc_html__( "No Animation", 'stockholm' ),
				"updown"       => esc_html__( "Up / Down", 'stockholm' ),
				"fade"         => esc_html__( "Fade", 'stockholm' ),
				"updown_fade"  => esc_html__( "Up/Down (In) / Fade (Out)", 'stockholm' ),
				"leftright"    => esc_html__( "Left / Right", 'stockholm' )
			),
			array(),
			"enable_grid_elements",
			array(
				"yes"
			)
		);
		$qodeGeneral->addChild( "qode_show-animation", $qode_show_animation );
		
		$page_transitions_notice = new StockholmQodeNotice(
			esc_html__( "Page Transition", 'stockholm' ),
			esc_html__( 'Choose a a type of transition between loading pages. In order for animation to work properly, you must choose "Post name" in permalinks settings', 'stockholm' ),
			esc_html__( "AJAX Page transitions are disabled due to VC Grid Elements", 'stockholm' ),
			"enable_grid_elements",
			"no"
		);
		$qodeGeneral->addChild( "page_transitions_notice", $page_transitions_notice );
		
		$qode_revolution_slider = new StockholmQodeMetaField(
			"text",
			"qode_revolution-slider",
			"",
			esc_html__( "Layer Slider or Select Slider Shortcode", 'stockholm' ),
			esc_html__( "Copy and paste your shortcode located in Select Slider -> Slider", 'stockholm' )
		);
		$qodeGeneral->addChild( "qode_revolution-slider", $qode_revolution_slider );
		
		$qode_enable_content_top_margin = new StockholmQodeMetaField(
			"selectblank",
			"qode_enable_content_top_margin",
			"",
			esc_html__( "Put Content Below Header", 'stockholm' ),
			esc_html__( "Enabling this option will put all of the content below header", 'stockholm' ),
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			)
		);
		$qodeGeneral->addChild( "qode_enable_content_top_margin", $qode_enable_content_top_margin );
		
		// Left Menu Area Meta Box Section
		
		$qodeLeftMenuArea = new StockholmQodeMetaBox(
			"page",
			esc_html__( "Select Left Menu Area", 'stockholm' ),
			"left-menu-meta",
			"vertical_area",
			array(
				"no"
			)
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox( "page_left_menu", $qodeLeftMenuArea );
		
		$qode_page_vertical_area_transparency = new StockholmQodeMetaField(
			"selectblank",
			"qode_page_vertical_area_transparency",
			"",
			esc_html__( "Enable transparent left menu area", 'stockholm' ),
			esc_html__( "Enabling this option will make Left Menu background transparent ", 'stockholm' ),
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			)
		);
		$qodeLeftMenuArea->addChild( "qode_page_vertical_area_transparency", $qode_page_vertical_area_transparency );
		
		$qode_page_vertical_area_background = new StockholmQodeMetaField(
			"color",
			"qode_page_vertical_area_background",
			"",
			esc_html__( "Left Menu Area Background Color", 'stockholm' ),
			esc_html__( "Choose a color for Left Menu background", 'stockholm' )
		);
		$qodeLeftMenuArea->addChild( "qode_page_vertical_area_background", $qode_page_vertical_area_background );
		
		$qode_page_vertical_area_background_image = new StockholmQodeMetaField(
			"image",
			"qode_page_vertical_area_background_image",
			"",
			esc_html__( "Left Menu Area Background Image", 'stockholm' ),
			esc_html__( "Choose an image for Left Menu background", 'stockholm' )
		);
		$qodeLeftMenuArea->addChild( "qode_page_vertical_area_background_image", $qode_page_vertical_area_background_image );
		
		// Header Meta Box Section
		
		$qodeHeader = new StockholmQodeMetaBox(
			"page",
			esc_html__( "Select Header", 'stockholm' ),
			"header-meta",
			"vertical_area",
			array(
				"yes"
			)
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox( "page_header", $qodeHeader );
		
		$qode_header_style = new StockholmQodeMetaField(
			"selectblank",
			"qode_header-style",
			"",
			esc_html__( "Header Skin", 'stockholm' ),
			esc_html__( "Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style", 'stockholm' ),
			array(
				"light" => esc_html__( "Light", 'stockholm' ),
				"dark"  => esc_html__( "Dark", 'stockholm' )
			)
		);
		$qodeHeader->addChild( "qode_header-style", $qode_header_style );
		
		$qode_header_color_per_page = new StockholmQodeMetaField(
			"color",
			"qode_header_color_per_page",
			"",
			esc_html__( "Initial Header Background Color", 'stockholm' ),
			esc_html__( "Choose a background color for header area", 'stockholm' )
		);
		$qodeHeader->addChild( "qode_header_color_per_page", $qode_header_color_per_page );
		
		$qode_header_color_transparency_per_page = new StockholmQodeMetaField(
			"text",
			"qode_header_color_transparency_per_page",
			"",
			esc_html__( "Initial Header Transparency", 'stockholm' ),
			esc_html__( "Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)", 'stockholm' ),
			array(),
			array(
				"col_width" => 3
			)
		);
		$qodeHeader->addChild( "qode_header_color_transparency_per_page", $qode_header_color_transparency_per_page );
		
		$qode_header_bottom_border_color = new StockholmQodeMetaField(
			"color",
			"qode_header_bottom_border_color",
			"",
			esc_html__( "Initial Header Bottom Border Color", 'stockholm' ),
			esc_html__( "Choose a bottom border color for header area", 'stockholm' )
		);
		$qodeHeader->addChild( "qode_header_bottom_border_color", $qode_header_bottom_border_color );
		
		$qode_page_scroll_amount_for_sticky = new StockholmQodeMetaField(
			"text",
			"qode_page_scroll_amount_for_sticky",
			"",
			esc_html__( "Scroll amount for sticky header appearance (px)", 'stockholm' ),
			esc_html__( "Define scroll amount for sticky header appearance", 'stockholm' ),
			array(),
			array(
				"col_width" => 3
			),
			"header_bottom_appearance", array(
				"regular",
				"fixed",
				"fixed_hiding"
			)
		);
		$qodeHeader->addChild( "qode_page_scroll_amount_for_sticky", $qode_page_scroll_amount_for_sticky );


		// Footer Meta Box Section
		$qodeFooter = new StockholmQodeMetaBox(
			"page",
			esc_html__( "Select Footer", 'stockholm' ),
			"header-meta",
			"vertical_area",
			array(
				"yes"
			)
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox( "page_footer", $qodeFooter );

		$qode_footer_top = new StockholmQodeMetaField(
			"selectblank",
			"qode_show_footer_top",
			"",
			esc_html__( "Show footer top", 'stockholm' ),
			esc_html__( "Enabling this option will show footer top on this page", 'stockholm' ),
			array(
				'no'	=>  esc_html__('No', 'stockholm'),
				'yes'	=>  esc_html__('Yes', 'stockholm')
			)
		);
		$qodeFooter->addChild( "qode_footer_top", $qode_footer_top );

		$qode_footer_bottom = new StockholmQodeMetaField(
			"selectblank",
			"qode_footer_text",
			"",
			esc_html__( "Show footer bottom", 'stockholm' ),
			esc_html__( "Enabling this option will show footer bottom on this page", 'stockholm' ),
			array(
				'no'	=>  esc_html__('No', 'stockholm'),
				'yes'	=>  esc_html__('Yes', 'stockholm')
			)
		);
		$qodeFooter->addChild( "qode_footer_bottom", $qode_footer_bottom );


		// Title Meta Box Section
		
		$qodeTitle = new StockholmQodeMetaBox(
			"page",
			esc_html__( "Select Title", 'stockholm' ),
			"title-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox( "page_title", $qodeTitle );
		
		$qode_show_page_title = new StockholmQodeMetaField(
			"selectblank",
			"qode_show-page-title",
			"",
			esc_html__( "Show Title Area", 'stockholm' ),
			esc_html__( "Disabling this option will turn off page title area", 'stockholm' ),
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			),
			array(
				"dependence" => true,
				"hide"       => array(
					"no" => "#qodef_qode_page_title_area_container"
				),
				"show"       => array(
					""    => "#qodef_qode_page_title_area_container",
					"yes" => "#qodef_qode_page_title_area_container"
				)
			) );
		$qodeTitle->addChild( "qode_show-page-title", $qode_show_page_title );
		
		$qode_page_title_area_container = new StockholmQodeContainer( "qode_page_title_area_container", "qode_show-page-title", "no" );
		$qodeTitle->addChild( "qode_page_title_area_container", $qode_page_title_area_container );
		
		$qode_page_title_type = new StockholmQodeMetaField(
			"selectblank",
			"qode_page_title_type",
			"",
			esc_html__( "Title Type", 'stockholm' ),
			esc_html__( "Choose title type for this page.", 'stockholm' ),
			array(
				"standard_title"    => esc_html__( "Standard", 'stockholm' ),
				"breadcrumbs_title" => esc_html__( "Breadcrumbs", 'stockholm' )
			)
		);
		$qode_page_title_area_container->addChild( "qode_page_title_type", $qode_page_title_type );

		$qode_title_in_grid = new StockholmQodeMetaField(
			"selectblank",
			"qode_title_in_grid",
			"yes",
			esc_html__( "Title in Grid", 'stockholm' ),
			"",
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			),
			array(
				"dependence" => true,
				"hide"       => array(
					"yes" => "#qodef_qode_title_in_grid_container",
					""   => "#qodef_qode_title_in_grid_container"
				),
				"show"       => array(
					"no" => "#qodef_qode_title_in_grid_container"
				)
			)
		);
		$qode_page_title_area_container->addChild("qode_title_in_grid",$qode_title_in_grid);

		$qode_title_in_grid_container = new StockholmQodeContainer(
			"qode_title_in_grid_container",
			"qode_title_in_grid",
			"",
			array('','yes')
		);
		$qode_page_title_area_container->addChild("qode_title_in_grid_container",$qode_title_in_grid_container);

		$qode_title_padding = new StockholmQodeMetaField(
			"text",
			"qode_title_padding",
			"",
			esc_html__( "Title Padding (px)", 'stockholm' ),
			esc_html__( "Set a padding for Title Area in pixels, ex. 0px 10px", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$qode_title_in_grid_container->addChild("qode_title_padding",$qode_title_padding);

		$qode_animate_page_title = new StockholmQodeMetaField(
			"selectblank",
			"qode_animate-page-title",
			"no",
			esc_html__( "Animations", 'stockholm' ),
			esc_html__( "Choose an animation for Title Area", 'stockholm' ),
			array(
				"no"              => esc_html__( "No animation", 'stockholm' ),
				"text_right_left" => esc_html__( "Text right to left", 'stockholm' ),
				"area_top_bottom" => esc_html__( "Title area top to bottom", 'stockholm' )
			)
		);
		$qode_page_title_area_container->addChild( "qode_animate_page_title", $qode_animate_page_title );
		
		$qode_show_page_title_text = new StockholmQodeMetaField(
			"yesno",
			"qode_show-page-title-text",
			"no",
			esc_html__( "Don't Show Title Text", 'stockholm' ),
			esc_html__( "Enable this option to hide the title text", 'stockholm' ),
			array(),
			array(
				"dependence" => true,
				"dependence_hide_on_yes" => "#qodef_qode_title_text_container",
				"dependence_show_on_yes" => ""
			)
		);
		$qode_page_title_area_container->addChild( "qode_show-page-title-text", $qode_show_page_title_text );
		
		$qode_title_text_container = new StockholmQodeContainer( "qode_title_text_container", "qode_show-page-title-text", "yes" );
		$qode_page_title_area_container->addChild( "qode_title_text_container", $qode_title_text_container );
		
		$qode_page_title_position = new StockholmQodeMetaField(
			"selectblank",
			"qode_page_title_position",
			"",
			esc_html__( "Title Text Alignment", 'stockholm' ),
			esc_html__( "Specify Title text alignment", 'stockholm' ),
			array(
				"left"   => esc_html__( "Left", 'stockholm' ),
				"center" => esc_html__( "Center", 'stockholm' ),
				"right"  => esc_html__( "Right", 'stockholm' )
			)
		);
		$qode_title_text_container->addChild( "qode_page_title_position", $qode_page_title_position );
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Title Text Style", 'stockholm' ),
			esc_html__( "Define styles for text in Title Area", 'stockholm' )
		);
		$qode_title_text_container->addChild( "group1", $group1 );
		
		$row1 = new StockholmQodeRow();
		$group1->addChild( "row1", $row1 );
		
		$qode_page_title_color = new StockholmQodeMetaField(
			"colorsimple",
			"qode_page-title-color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild( "qode_page-title-color", $qode_page_title_color );
		
		$qode_title_text_shadow = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_title_text_shadow",
			"",
			esc_html__( "Text Shadow", 'stockholm' ),
			"",
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			)
		);
		$row1->addChild( "qode_title_text_shadow", $qode_title_text_shadow );
		
		$row2 = new StockholmQodeRow();
		$group1->addChild( "row2", $row2 );
		
		$qode_page_title_text_background_color = new StockholmQodeMetaField(
			"colorsimple",
			"qode_page-title-text-background-color",
			"",
			esc_html__( "Text Background Color", 'stockholm' ),
			""
		);
		$row2->addChild( "qode_page-title-text-background-color", $qode_page_title_text_background_color );
		
		$qode_page_title_text_background_opacity = new StockholmQodeMetaField(
			"textsimple",
			"qode_page-title-text-background-opacity",
			"",
			esc_html__( "Text Background Opacity (0-1)", 'stockholm' ),
			"",
			array(),
			array(
				"col_width" => 3
			)
		);
		$row2->addChild( "qode_page-title-text-background-opacity", $qode_page_title_text_background_opacity );
		
		$qode_page_title_background_color = new StockholmQodeMetaField(
			"color",
			"qode_page-title-background-color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			esc_html__( "Choose background color for Title Area", 'stockholm' )
		);
		$qode_page_title_area_container->addChild( "qode_page-title-background-color", $qode_page_title_background_color );
		
		$qode_show_page_title_image = new StockholmQodeMetaField(
			"yesno",
			"qode_show-page-title-image",
			"no",
			esc_html__( "Don't Show Background Image", 'stockholm' ),
			esc_html__( "Enable this option to hide background image in Title Area", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_qode_background_image_container",
				"dependence_show_on_yes" => "#qodef_qode_title-height"
			)
		);
		$qode_page_title_area_container->addChild( "qode_show-page-title-image", $qode_show_page_title_image );
		
		$qode_background_image_container = new StockholmQodeContainer( "qode_background_image_container", "qode_show-page-title-image", "yes" );
		$qode_page_title_area_container->addChild( "qode_background_image_container", $qode_background_image_container );
		
		$qode_title_image = new StockholmQodeMetaField(
			"image",
			"qode_title-image",
			"",
			esc_html__( "Background Image", 'stockholm' ),
			esc_html__( "Choose a background image for Title Area", 'stockholm' )
		);
		$qode_background_image_container->addChild( "qode_title-image", $qode_title_image );
		
		$qode_title_overlay_image = new StockholmQodeMetaField(
			"image",
			"qode_title-overlay-image",
			"",
			esc_html__( "Pattern Overlay Image", 'stockholm' ),
			esc_html__( "Choose an image to be used as pattern over Title Area", 'stockholm' )
		);
		$qode_background_image_container->addChild( "qode_title-overlay-image", $qode_title_overlay_image );
		
		$qode_responsive_title_image = new StockholmQodeMetaField(
			"selectblank",
			"qode_responsive-title-image",
			"",
			esc_html__( "Responsive Background Image", 'stockholm' ),
			esc_html__( "Do you want to make Title background image responsive?", 'stockholm' ),
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			),
			array(
				"dependence" => true,
				"hide"       => array(
					"yes" => "#qodef_qode_responsive_title_image_container, #qodef_qode_title-height"
				),
				"show"       => array(
					""   => "#qodef_qode_responsive_title_image_container, #qodef_qode_title-height",
					"no" => "#qodef_qode_responsive_title_image_container, #qodef_qode_title-height"
				)
			)
		);
		$qode_background_image_container->addChild( "qode_responsive-title-image", $qode_responsive_title_image );
		
		$qode_responsive_title_image_container = new StockholmQodeContainer( "qode_responsive_title_image_container", "qode_responsive-title-image", "yes" );
		$qode_background_image_container->addChild( "qode_responsive_title_image_container", $qode_responsive_title_image_container );
		
		$qode_fixed_title_image = new StockholmQodeMetaField(
			"selectblank",
			"qode_fixed-title-image",
			"",
			esc_html__( "Parallax Background Image", 'stockholm' ),
			esc_html__( "Do you want background image to have parallax effect?", 'stockholm' ),
			array(
				"no"       => esc_html__( "No", 'stockholm' ),
				"yes"      => esc_html__( "Yes", 'stockholm' ),
				"yes_zoom" => esc_html__( "Yes, with zoom out", 'stockholm' )
			)
		);
		$qode_responsive_title_image_container->addChild( "qode_fixed-title-image", $qode_fixed_title_image );
		
		$qode_title_height = new StockholmQodeMetaField(
			"text",
			"qode_title-height",
			"",
			esc_html__( "Title Height (px)", 'stockholm' ),
			esc_html__( "Set a height for Title Area in pixels", 'stockholm' ),
			array(),
			array(
				"col_width" => 3
			)
		);
		$qode_page_title_area_container->addChild( "qode_title-height", $qode_title_height );
		
		$qode_enable_breadcrumbs = new StockholmQodeMetaField(
			"selectblank",
			"qode_enable_breadcrumbs",
			"",
			esc_html__( "Enable Breadcrumbs", 'stockholm' ),
			esc_html__( "Do you want to display breadcrumbs in title area?", 'stockholm' ),
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			),
			array(
				"dependence" => true,
				"hide"       => array(
					"no" => "#qodef_qode_enable_breadcrumbs_container",
					""   => "#qodef_qode_enable_breadcrumbs_container"
				),
				"show"       => array(
					"yes" => "#qodef_qode_enable_breadcrumbs_container"
				)
			)
		);
		$qode_page_title_area_container->addChild( "qode_enable_breadcrumbs", $qode_enable_breadcrumbs );

		$qode_enable_breadcrumbs_container = new StockholmQodeContainer(
			"qode_enable_breadcrumbs_container",
			"qode_enable_breadcrumbs",
			"",
			array('','no')
		);
		$qode_page_title_area_container->addChild("qode_enable_breadcrumbs_container",$qode_enable_breadcrumbs_container);

		$qode_page_breadcrumbs_color = new StockholmQodeMetaField(
			"color",
			"qode_page_breadcrumbs_color",
			"",
			esc_html__( "Breadcrumbs Color", 'stockholm' ),
			esc_html__( "Choose a color for breadcrumbs text ", 'stockholm' )
		);
		$qode_enable_breadcrumbs_container->addChild( "qode_page_breadcrumbs_color", $qode_page_breadcrumbs_color );

		$qode_title_breadcrumbs_postiion = new StockholmQodeMetaField(
			"select",
			"qode_title_breadcrumbs_postiion",
			"bellow_title",
			esc_html__( "Breadcrumbs Position", 'stockholm' ),
			esc_html__( "Select wehre bradcrumbs will be displyed", 'stockholm' ),
			array(
				"" => esc_html__( "", 'stockholm' ),
				"bellow_title"       => esc_html__( "Below Title", 'stockholm' ),
				"right_from_title"      => esc_html__( "Right From Title", 'stockholm' )
			)
		);

		$qode_enable_breadcrumbs_container->addChild(
			"qode_title_breadcrumbs_postiion",
			$qode_title_breadcrumbs_postiion
		);
		
		$qode_page_subtitle = new StockholmQodeMetaField(
			"text",
			"qode_page_subtitle",
			"",
			esc_html__( "Subtitle Text", 'stockholm' ),
			esc_html__( "Enter your subtitle text", 'stockholm' )
		);
		$qode_page_title_area_container->addChild( "qode_page_subtitle", $qode_page_subtitle );
		
		$qode_page_subtitle_color = new StockholmQodeMetaField(
			"color",
			"qode_page_subtitle_color",
			"",
			esc_html__( "Subtitle Text Color", 'stockholm' ),
			esc_html__( "Choose a color for subtitle text", 'stockholm' )
		);
		$qode_page_title_area_container->addChild( "qode_page_subtitle_color", $qode_page_subtitle_color );

		$qode_page_text_above_title = new StockholmQodeMetaField(
			"text",
			"qode_page_text_above_title",
			"",
			esc_html__('Text Above Title', 'stockholm'),
			esc_html__('Enter your text above Title' ,'stockholm')
		);
		$qode_page_title_area_container->addChild("qode_page_text_above_title",$qode_page_text_above_title);

		$qode_page_text_above_title_tag = new StockholmQodeMetaField(
			"select",
			"qode_page_text_above_title_tag",
			"",
			esc_html__( "Text Above Title - Title Tag", 'stockholm' ),
			'',
			stockholm_qode_get_title_tag(true)
		);
		$qode_page_title_area_container->addChild( "qode_page_text_above_title_tag", $qode_page_text_above_title_tag );

		$qode_page_text_above_title_color = new StockholmQodeMetaField(
			"color",
			"qode_page_text_above_title_color",
			"",
			esc_html__('Text Above Title Color', 'stockholm'),
			esc_html__('Choose a color for text above title', 'stockholm')
		);
		$qode_page_title_area_container->addChild("qode_page_text_above_title_color",$qode_page_text_above_title_color);



		// Content Bottom Meta Box Section
		
		$qodeContentBottom = new StockholmQodeMetaBox(
			"page",
			esc_html__( "Select Content Bottom", 'stockholm' ),
			"content-bottom-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox( "page_content_bottom", $qodeContentBottom );
		
		$qode_enable_content_bottom_area = new StockholmQodeMetaField(
			"selectblank",
			"qode_enable_content_bottom_area",
			"",
			esc_html__( "Show Content Bottom Area", 'stockholm' ),
			esc_html__( "Do you want to show content bottom area?", 'stockholm' ),
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			),
			array(
				"dependence" => true,
				"hide"       => array(
					"no" => "#qodef_qode_enable_content_bottom_area_container",
					""   => "#qodef_qode_enable_content_bottom_area_container"
				),
				"show"       => array(
					"yes" => "#qodef_qode_enable_content_bottom_area_container"
				)
			)
		);
		$qodeContentBottom->addChild( "qode_enable_content_bottom_area", $qode_enable_content_bottom_area );
		
		$qode_enable_content_bottom_area_container = new StockholmQodeContainer( "qode_enable_content_bottom_area_container", "qode_enable_content_bottom_area", "no", array(
			"",
			"no"
		) );
		$qodeContentBottom->addChild( "qode_enable_content_bottom_area_container", $qode_enable_content_bottom_area_container );
		
		$qode_content_bottom_background_color = new StockholmQodeMetaField(
			"color",
			"qode_content_bottom_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			esc_html__( "Choose a color for content bottom area", 'stockholm' )
		);
		$qode_enable_content_bottom_area_container->addChild( "qode_content_bottom_background_color", $qode_content_bottom_background_color );
		
		$qode_choose_content_bottom_sidebar = new StockholmQodeMetaField(
			"selectblank",
			"qode_choose_content_bottom_sidebar",
			"",
			esc_html__( "Custom Widget", 'stockholm' ),
			esc_html__( "Choose Custom Widget area to display", 'stockholm' ),
			$qode_custom_sidebars
		);
		$qode_enable_content_bottom_area_container->addChild( "qode_choose_content_bottom_sidebar", $qode_choose_content_bottom_sidebar );
		
		$qode_content_bottom_sidebar_in_grid = new StockholmQodeMetaField(
			"selectblank",
			"qode_content_bottom_sidebar_in_grid",
			"",
			esc_html__( "Display in Grid", 'stockholm' ),
			esc_html__( "Enabling this option will place Content Bottom in grid", 'stockholm' ),
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			)
		);
		$qode_enable_content_bottom_area_container->addChild( "qode_content_bottom_sidebar_in_grid", $qode_content_bottom_sidebar_in_grid );
		
		// Blog Meta Box Section
		
		$qodeBlog = new StockholmQodeMetaBox(
			"page",
			esc_html__( "Select Blog", 'stockholm' ),
			"blog-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox( "page_blog", $qodeBlog );
		
		$qode_choose_blog_category = new StockholmQodeMetaField(
			"selectblank",
			"qode_choose-blog-category",
			"",
			esc_html__( "Blog Category", 'stockholm' ),
			esc_html__( "Choose category of posts to display (leave empty to display all categories)", 'stockholm' ),
			$qode_blog_categories
		);
		$qodeBlog->addChild( "qode_choose-blog-category", $qode_choose_blog_category );
		
		$qode_show_posts_per_page = new StockholmQodeMetaField(
			"text",
			"qode_show-posts-per-page",
			"",
			esc_html__( "Number of Posts", 'stockholm' ),
			esc_html__( "Enter the number of posts to display", 'stockholm' ),
			array(),
			array(
				"col_width" => 3
			)
		);
		$qodeBlog->addChild( "qode_show-posts-per-page", $qode_show_posts_per_page );
		
		$qode_enable_page_comments = new StockholmQodeMetaField(
			"yesno",
			"qode_enable-page-comments",
			"no",
			esc_html__( "Show Comments", 'stockholm' ),
			esc_html__( "Enabling this option will show comments on your page ", 'stockholm' )
		);
		$qodeBlog->addChild( "qode_enable-page-comments", $qode_enable_page_comments );
		
		// Sidebar Area Meta Box Section
		
		$qodeSideBar = new StockholmQodeMetaBox(
			"page",
			esc_html__( "Select Sidebar", 'stockholm' ),
			"sidebar-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox( "page_side_bar", $qodeSideBar );
		
		$qode_show_sidebar = new StockholmQodeMetaField(
			"select",
			"qode_show-sidebar",
			"default",
			esc_html__( "Layout", 'stockholm' ),
			esc_html__( "Choose the sidebar layout", 'stockholm' ),
			array(
				"default" => esc_html__( "Default", 'stockholm' ),
				"1"       => esc_html__( "Sidebar 1/3 right", 'stockholm' ),
				"2"       => esc_html__( "Sidebar 1/4 right", 'stockholm' ),
				"3"       => esc_html__( "Sidebar 1/3 left", 'stockholm' ),
				"4"       => esc_html__( "Sidebar 1/4 left", 'stockholm' )
			)
		);
		$qodeSideBar->addChild( "qode_show-sidebar", $qode_show_sidebar );
		
		$qode_choose_sidebar = new StockholmQodeMetaField(
			"selectblank",
			"qode_choose-sidebar",
			"default",
			esc_html__( "Choose Widget Area in Sidebar", 'stockholm' ),
			esc_html__( "Choose Custom Widget area to display in Sidebar", 'stockholm' ),
			$qode_custom_sidebars
		);
		$qodeSideBar->addChild( "qode_choose-sidebar", $qode_choose_sidebar );

		// SEO Meta Box Section
		
		$qodeSeo = new StockholmQodeMetaBox(
			"page",
			esc_html__( "Select SEO", 'stockholm' ),
			"seo-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox( "page_seo", $qodeSeo );
		
		$seo_title = new StockholmQodeMetaField(
			"text",
			"qode_seo_title",
			"",
			esc_html__( "SEO Title", 'stockholm' ),
			esc_html__( "Enter custom Title for this page", 'stockholm' )
		);
		$qodeSeo->addChild( "seo_title", $seo_title );
		
		$seo_keywords = new StockholmQodeMetaField(
			"text",
			"qode_seo_keywords",
			"",
			esc_html__( "Meta Keywords", 'stockholm' ),
			esc_html__( "Enter the list of keywords separated by commas", 'stockholm' )
		);
		$qodeSeo->addChild( "seo_keywords", $seo_keywords );
		
		$seo_description = new StockholmQodeMetaField(
			"textarea",
			"qode_seo_description",
			"",
			esc_html__( "Meta Description", 'stockholm' ),
			esc_html__( "Enter meta description for this page", 'stockholm' )
		);
		$qodeSeo->addChild( "seo_description", $seo_description );

	}
	
	add_action( 'stockholm_qode_action_meta_boxes_map', 'stockholm_qode_map_page_meta_fields', 10 );
}