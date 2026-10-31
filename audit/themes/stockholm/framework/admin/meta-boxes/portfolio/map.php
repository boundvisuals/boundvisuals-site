<?php

if ( ! function_exists( 'stockholm_qode_map_portfolio_meta_fields' ) ) {
	function stockholm_qode_map_portfolio_meta_fields() {
		$qode_custom_sidebars = stockholm_qode_get_custom_sidebars();
		
		$qode_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$qode_pages[ $page->ID ] = $page->post_title;
		}
		
		// Portfolio Images Meta Box Section
		
		$qodePortfolioImages = new StockholmQodeMetaBox(
			"portfolio_page",
			esc_html__( "Select Portfolio Images (multiple upload)", 'stockholm' ),
			"portfolio-images-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"portfolio_images",
			$qodePortfolioImages
		);
		
		$qode_portfolio_image_gallery = new StockholmQodeMultipleImages(
			"qode_portfolio-image-gallery",
			esc_html__( "Portfolio Images", 'stockholm' ),
			esc_html__( "Choose your portfolio images", 'stockholm' )
		);
		$qodePortfolioImages->addChild(
			"qode_portfolio-image-gallery",
			$qode_portfolio_image_gallery
		);
		
		// Portfolio Images/Video 2 Meta Box Section
		
		$qodePortfolioImagesVideos2 = new StockholmQodeMetaBox(
			"portfolio_page",
			esc_html__( "Select Portfolio Images/Videos (single upload)", 'stockholm' ),
			"portfolio-single-image-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"portfolio_images_videos2",
			$qodePortfolioImagesVideos2
		);
		
		$qode_portfolio_images_videos2 = new StockholmQodeImagesVideosFramework(
			esc_html__( "Portfolio Images/Videos 2", 'stockholm' )
		);
		$qodePortfolioImagesVideos2->addChild(
			"qode_portfolio_images_videos2",
			$qode_portfolio_images_videos2
		);
		
		// Portfolio Additional Sidebar Meta Box Section
		
		$qodeAdditionalSidebarItems = new StockholmQodeMetaBox(
			"portfolio_page",
			esc_html__( "Select Additional Portfolio Sidebar Items", 'stockholm' ),
			"portfolio-sidebar-items-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"portfolio_properties",
			$qodeAdditionalSidebarItems
		);
		
		$qode_portfolio_properties = new StockholmQodeOptionsFramework(
			esc_html__( "Portfolio Properties", 'stockholm' )
		);
		$qodeAdditionalSidebarItems->addChild(
			"qode_portfolio_properties",
			$qode_portfolio_properties
		);
		
		// General Meta Box Section
		
		$qodeGeneral = new StockholmQodeMetaBox(
			"portfolio_page",
			esc_html__( "Select General", 'stockholm' ),
			"general-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"portfolio_general",
			$qodeGeneral
		);
		
		$qode_page_background_color = new StockholmQodeMetaField(
			"color",
			"qode_page_background_color",
			"",
			esc_html__( "Page Background Color", 'stockholm' ),
			esc_html__( "Choose the page background (body) color", 'stockholm' )
		);
		$qodeGeneral->addChild(
			"qode_page_background_color",
			$qode_page_background_color
		);

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
		$qodeGeneral->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$qode_content_top_padding = new StockholmQodeMetaField(
			"textsimple",
			"qode_content-top-padding",
			"",
			esc_html__( "Content Top Padding (px)", 'stockholm' ),
			esc_html__( "This option control content top padding.", 'stockholm' )
		);
		$row1->addChild(
			"qode_content-top-padding",
			$qode_content_top_padding
		);
		
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
		$row1->addChild(
			"qode_content-top-padding-mobile",
			$qode_content_top_padding_mobile
		);
		
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
			array( "yes" )
		);
		$qodeGeneral->addChild(
			"qode_show-animation",
			$qode_show_animation
		);
		
		$page_transitions_notice = new StockholmQodeNotice(
			esc_html__( "Page Transition", 'stockholm' ),
			esc_html__( 'Choose a a type of transition between loading pages. In order for animation to work properly, you must choose "Post name" in permalinks settings', 'stockholm' ),
			esc_html__( "AJAX Page transitions are disabled due to VC Grid Elements", 'stockholm' ),
			"enable_grid_elements",
			"no"
		);
		$qodeGeneral->addChild(
			"page_transitions_notice",
			$page_transitions_notice
		);
		
		$qode_revolution_slider = new StockholmQodeMetaField(
			"text",
			"qode_revolution-slider",
			"",
			esc_html__( "Layer Slider or Select Slider Shortcode", 'stockholm' ),
			esc_html__( "Copy and paste your shortcode located in Select Slider -> Slider", 'stockholm' )
		);
		$qodeGeneral->addChild(
			"qode_revolution-slider",
			$qode_revolution_slider
		);
		
		$qode_choose_portfolio_single_view = new StockholmQodeMetaField(
			"selectblank",
			"qode_choose-portfolio-single-view",
			"",
			esc_html__( "Portfolio Type", 'stockholm' ),
			esc_html__( 'Choose a default type for Single Project pages', 'stockholm' ),
			array(
				"small-images"              => esc_html__( "Portfolio small images", 'stockholm' ),
				"small-slider"              => esc_html__( "Portfolio small slider", 'stockholm' ),
				"big-images"                => esc_html__( "Portfolio big images", 'stockholm' ),
				"big-images-inverted"       => esc_html__( "Portfolio big images inverted", 'stockholm' ),
				"big-slider"                => esc_html__( "Portfolio big slider", 'stockholm' ),
				"custom"                    => esc_html__( "Portfolio custom", 'stockholm' ),
				"full-width-custom"         => esc_html__( "Portfolio full width custom", 'stockholm' ),
				"gallery"                   => esc_html__( "Portfolio gallery", 'stockholm' ),
				"gallery-right"             => esc_html__( "Portfolio gallery right", 'stockholm' ),
				"fullscreen-slider"         => esc_html__( "Portfolio full screen slider", 'stockholm' ),
				"fullwidth-slider"          => esc_html__( "Portfolio full width slider", 'stockholm' ),
				"fullwidth-slider-inverted" => esc_html__( "Portfolio full width slider inverted", 'stockholm' ),
				"masonry-gallery"           => esc_html__( "Portfolio masonry gallery", 'stockholm' ),
				"fixed-right"               => esc_html__( "Portfolio fixed right", 'stockholm' ),
				"fixed-left"                => esc_html__( "Portfolio fixed left", 'stockholm' ),
				"wide-right"                => esc_html__( "Portfolio wide right", 'stockholm' ),
				"wide-left"                 => esc_html__( "Portfolio wide left", 'stockholm' )
			),
			array(
				"dependence" => true,
				"hide"       => array(
					""                          => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"small-images"              => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"small-slider"              => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"big-images"                => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"big-images-inverted"       => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"big-slider"                => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"custom"                    => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"full-width-custom"         => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"fullscreen-slider"         => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"fullwidth-slider"          => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"fullwidth-slider-inverted" => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"masonry-gallery"           => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"fixed-right"               => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"fixed-left"                => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"wide-left"                 => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"wide-right"                => "#qodef_qode_choose_number_of_portfolio_columns_container"
				),
				"show"       => array(
					"gallery"       => "#qodef_qode_choose_number_of_portfolio_columns_container",
					"gallery-right" => "#qodef_qode_choose_number_of_portfolio_columns_container"
				)
			)
		);
		$qodeGeneral->addChild(
			"qode_choose-portfolio-single-view",
			$qode_choose_portfolio_single_view
		);
		
		$qode_choose_number_of_portfolio_columns_container = new StockholmQodeContainer(
			"qode_choose_number_of_portfolio_columns_container",
			"qode_choose-portfolio-single-view",
			"no",
			array(
				"",
				"small-images",
				"small-slider",
				"big-images",
				"big-images-inverted",
				"big-slider",
				"custom",
				"full-width-custom",
				"fullscreen-slider",
				"fullwidth-slider",
				"fullwidth-slider-inverted",
				"masonry-gallery",
				"fixed-right",
				"fixed-left",
				"wide-left",
				"wide-right"
			)
		);
		$qodeGeneral->addChild(
			"qode_choose_number_of_portfolio_columns_container",
			$qode_choose_number_of_portfolio_columns_container
		);
		
		$qode_choose_number_of_portfolio_columns = new StockholmQodeMetaField(
			"selectblank",
			"qode_choose-number-of-portfolio-columns",
			"",
			esc_html__( "Number of Columns", 'stockholm' ),
			esc_html__( 'Select the number of columns for Portfolio Gallery type', 'stockholm' ),
			array(
				"2" => esc_html__( "2 Columns", 'stockholm' ),
				"3" => esc_html__( "3 Columns", 'stockholm' ),
				"4" => esc_html__( "4 Columns", 'stockholm' )
			)
		);
		$qode_choose_number_of_portfolio_columns_container->addChild(
			"qode_choose-number-of-portfolio-columns",
			$qode_choose_number_of_portfolio_columns
		);
		
		$qode_choose_portfolio_image_size = new StockholmQodeMetaField(
			"select",
			"qode_choose-portfolio-image-size",
			"full",
			esc_html__( "Image Proportions", 'stockholm' ),
			esc_html__( 'Choose image proportions for Portfolio Gallery type', 'stockholm' ),
			array(
				"full"                => esc_html__( "Original Size", 'stockholm' ),
				"portfolio-square"    => esc_html__( "Square", 'stockholm' ),
				"portfolio-landscape" => esc_html__( "Landscape", 'stockholm' ),
				"portfolio-portrait"  => esc_html__( "Portrait", 'stockholm' )
			)
		);
		$qode_choose_number_of_portfolio_columns_container->addChild(
			"qode_choose-portfolio-image-size",
			$qode_choose_portfolio_image_size
		);
		
		$qode_choose_portfolio_list_page = new StockholmQodeMetaField(
			"selectblank",
			"qode_choose-portfolio-list-page",
			"",
			esc_html__( "Back To Link", 'stockholm' ),
			esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'stockholm' ),
			$qode_pages
		);
		$qodeGeneral->addChild(
			"qode_choose-portfolio-list-page",
			$qode_choose_portfolio_list_page
		);
		
		$qode_portfolio_subtitle = new StockholmQodeMetaField(
			"text",
			"qode_portfolio_subtitle",
			"",
			esc_html__( "Portfolio Subtitle", 'stockholm' ),
			esc_html__( "Enter portfolio subtitle", 'stockholm' )
		);
		$qodeGeneral->addChild(
			"qode_portfolio_subtitle",
			$qode_portfolio_subtitle
		);
		
		$qode_portfolio_external_link = new StockholmQodeMetaField(
			"text",
			"qode_portfolio-external-link",
			"",
			esc_html__( "Portfolio External Link", 'stockholm' ),
			esc_html__( "Enter URL to link from Portfolio List page", 'stockholm' )
		);
		$qodeGeneral->addChild(
			"qode_portfolio-external-link",
			$qode_portfolio_external_link
		);
		
		$qode_portfolio_external_link_target = new StockholmQodeMetaField(
			"select",
			"qode_portfolio-external-link-target",
			"_blank",
			esc_html__( "Portfolio External Link Target", 'stockholm' ),
			esc_html__( "Choose target for portfolio link from Portfolio List page", 'stockholm' ),
			stockholm_qode_get_link_target_array()
		);
		$qodeGeneral->addChild(
			"qode_portfolio-external-link-target",
			$qode_portfolio_external_link_target
		);
		
		$qode_portfolio_lightbox_link = new StockholmQodeMetaField(
			"text",
			"qode_portfolio-lightbox-link",
			"",
			esc_html__( "Portfolio Custom Lighbox Content", 'stockholm' ),
			esc_html__( "Enter URL to link custom image/video content inside lightbox", 'stockholm' )
		);
		$qodeGeneral->addChild(
			"qode_portfolio-lightbox-link",
			$qode_portfolio_lightbox_link
		);
		
		$qode_portfolio_type_masonry_style = new StockholmQodeMetaField(
			"select",
			"qode_portfolio_type_masonry_style",
			"",
			esc_html__( "Dimensions for Masonry", 'stockholm' ),
			esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists', 'stockholm' ),
			array(
				"default"            => esc_html__( "Default", 'stockholm' ),
				"large_width"        => esc_html__( "Large width", 'stockholm' ),
				"large_height"       => esc_html__( "Large height", 'stockholm' ),
				"large_width_height" => esc_html__( "Large width/height", 'stockholm' )
			)
		);
		$qodeGeneral->addChild(
			"qode_portfolio_type_masonry_style",
			$qode_portfolio_type_masonry_style
		);
		
		$qode_portfolio_masonry_parallax = new StockholmQodeMetaField(
			"select",
			"qode_portfolio_masonry_parallax",
			"no",
			esc_html__( "Set Masonry Item in Parallax", 'stockholm' ),
			"",
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			)
		);
		$qodeGeneral->addChild(
			"qode_portfolio_masonry_parallax",
			$qode_portfolio_masonry_parallax
		);
		
		$qode_portfolio_disable_comments = new StockholmQodeMetaField(
			"selectblank",
			"qode_portfolio-hide-comments",
			"",
			esc_html__( "Disable Comments", 'stockholm' ),
			"",
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			)
		);
		$qodeGeneral->addChild(
			"qode_portfolio-hide-comments",
			$qode_portfolio_disable_comments
		);
		
		$qode_enable_content_top_margin = new StockholmQodeMetaField(
			"selectblank",
			"qode_enable_content_top_margin",
			"",
			esc_html__( "Put Content Below Header", 'stockholm' ),
			esc_html__( "Enabling this option will put all of the content below header", 'stockholm' ),
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' ),
			)
		);
		$qodeGeneral->addChild(
			"qode_enable_content_top_margin",
			$qode_enable_content_top_margin
		);
		
		// Header Meta Box Section
		
		$qodeHeader = new StockholmQodeMetaBox(
			"portfolio_page",
			esc_html__( "Select Header", 'stockholm' ),
			"header-meta",
			"vertical_area",
			array( "yes" )
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"porfolio_header",
			$qodeHeader
		);
		
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
		$qodeHeader->addChild(
			"qode_header-style",
			$qode_header_style
		);
		
		$qode_header_color_per_page = new StockholmQodeMetaField(
			"color",
			"qode_header_color_per_page",
			"",
			esc_html__( "Initial Header Background Color", 'stockholm' ),
			esc_html__( "Choose a background color for header area", 'stockholm' )
		);
		$qodeHeader->addChild(
			"qode_header_color_per_page",
			$qode_header_color_per_page
		);
		
		$qode_header_color_transparency_per_page = new StockholmQodeMetaField(
			"text",
			"qode_header_color_transparency_per_page",
			"",
			esc_html__( "Initial Header Transparency", 'stockholm' ),
			esc_html__( "Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$qodeHeader->addChild(
			"qode_header_color_transparency_per_page",
			$qode_header_color_transparency_per_page
		);
		
		$qode_header_bottom_border_color = new StockholmQodeMetaField(
			"color",
			"qode_header_bottom_border_color",
			"",
			esc_html__( "Initial Header Bottom Border Color", 'stockholm' ),
			esc_html__( "Choose a bottom border color for header area", 'stockholm' )
		);
		$qodeHeader->addChild(
			"qode_header_bottom_border_color",
			$qode_header_bottom_border_color
		);
		
		$qode_page_scroll_amount_for_sticky = new StockholmQodeMetaField(
			"text",
			"qode_page_scroll_amount_for_sticky",
			"",
			esc_html__( "Scroll amount for sticky header appearance (px)", 'stockholm' ),
			esc_html__( "Define scroll amount for sticky header appearance", 'stockholm' ),
			array(),
			array( "col_width" => 3 ),
			"header_bottom_appearance",
			array(
				"regular",
				"fixed",
				"fixed_hiding"
			)
		);
		$qodeHeader->addChild(
			"qode_page_scroll_amount_for_sticky",
			$qode_page_scroll_amount_for_sticky
		);
		
		// Left Menu Area Meta Box Section
		
		$qodeLeftMenuArea = new StockholmQodeMetaBox(
			"portfolio_page",
			esc_html__( "Select Left Menu Area", 'stockholm' ),
			"left-menu-meta",
			"vertical_area",
			array( "no" )
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"porfolio_left_menu",
			$qodeLeftMenuArea
		);
		
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
		$qodeLeftMenuArea->addChild(
			"qode_page_vertical_area_transparency",
			$qode_page_vertical_area_transparency
		);
		
		$qode_page_vertical_area_background = new StockholmQodeMetaField(
			"color",
			"qode_page_vertical_area_background",
			"",
			esc_html__( "Left Menu Area Background Color", 'stockholm' ),
			esc_html__( "Choose a color for Left Menu background", 'stockholm' )
		);
		$qodeLeftMenuArea->addChild(
			"qode_page_vertical_area_background",
			$qode_page_vertical_area_background
		);
		
		$qode_page_vertical_area_background_image = new StockholmQodeMetaField(
			"image",
			"qode_page_vertical_area_background_image",
			"",
			esc_html__( "Left Menu Area Background Image", 'stockholm' ),
			esc_html__( "Choose an image for Left Menu background", 'stockholm' )
		);
		$qodeLeftMenuArea->addChild(
			"qode_page_vertical_area_background_image",
			$qode_page_vertical_area_background_image
		);

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
			"portfolio_page",
			esc_html__( "Select Title", 'stockholm' ),
			"title-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"porfolio_title",
			$qodeTitle
		);
		
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
			)
		);
		$qodeTitle->addChild(
			"qode_show-page-title",
			$qode_show_page_title
		);
		
		$qode_page_title_area_container = new StockholmQodeContainer(
			"qode_page_title_area_container",
			"qode_show-page-title",
			"no"
		);
		$qodeTitle->addChild(
			"qode_page_title_area_container",
			$qode_page_title_area_container
		);
		
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
		$qode_page_title_area_container->addChild(
			"qode_page_title_type",
			$qode_page_title_type
		);
		
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
		$qode_page_title_area_container->addChild(
			"qode_animate_page_title",
			$qode_animate_page_title
		);
		
		$qode_show_page_title_text = new StockholmQodeMetaField(
			"yesno",
			"qode_show-page-title-text",
			"no",
			esc_html__( "Don't Show Title Text", 'stockholm' ),
			esc_html__( "Enable this option to hide the title text", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_qode_title_text_container",
				"dependence_show_on_yes" => ""
			)
		);
		$qode_page_title_area_container->addChild(
			"qode_show-page-title-text",
			$qode_show_page_title_text
		);
		
		$qode_title_text_container = new StockholmQodeContainer(
			"qode_title_text_container",
			"qode_show-page-title-text",
			"yes"
		);
		$qode_page_title_area_container->addChild(
			"qode_title_text_container",
			$qode_title_text_container
		);
		
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
		$qode_title_text_container->addChild(
			"qode_page_title_position",
			$qode_page_title_position
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Title Text Style", 'stockholm' ),
			esc_html__( "Define styles for text in Title Area", 'stockholm' )
		);
		$qode_title_text_container->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$qode_page_title_color = new StockholmQodeMetaField(
			"colorsimple",
			"qode_page-title-color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"qode_page-title-color",
			$qode_page_title_color
		);
		
		$qode_title_text_shadow = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_title_text_shadow",
			"",
			esc_html__( "Text Shadow", 'stockholm' ),
			'',
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "yes", 'stockholm' )
			)
		);
		$row1->addChild(
			"qode_title_text_shadow",
			$qode_title_text_shadow
		);
		
		$row2 = new StockholmQodeRow();
		$group1->addChild(
			"row2",
			$row2
		);
		
		$qode_page_title_text_background_color = new StockholmQodeMetaField(
			"colorsimple",
			"qode_page-title-text-background-color",
			"",
			esc_html__( "Text Background Color", 'stockholm' )
		);
		$row2->addChild(
			"qode_page-title-text-background-color",
			$qode_page_title_text_background_color
		);
		
		$qode_page_title_text_background_opacity = new StockholmQodeMetaField(
			"textsimple",
			"qode_page-title-text-background-opacity",
			"",
			esc_html__( "Text Background Opacity (0-1)", 'stockholm' ),
			'',
			array(),
			array( "col_width" => 3 )
		);
		$row2->addChild(
			"qode_page-title-text-background-opacity",
			$qode_page_title_text_background_opacity
		);
		
		$qode_page_title_background_color = new StockholmQodeMetaField(
			"color",
			"qode_page-title-background-color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			esc_html__( "Choose background color for Title Area", 'stockholm' )
		);
		$qode_page_title_area_container->addChild(
			"qode_page-title-background-color",
			$qode_page_title_background_color
		);
		
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
				"dependence_show_on_yes" => ""
			)
		);
		$qode_page_title_area_container->addChild(
			"qode_show-page-title-image",
			$qode_show_page_title_image
		);
		
		$qode_background_image_container = new StockholmQodeContainer(
			"qode_background_image_container",
			"qode_show-page-title-image",
			"yes"
		);
		$qode_page_title_area_container->addChild(
			"qode_background_image_container",
			$qode_background_image_container
		);
		
		$qode_title_image = new StockholmQodeMetaField(
			"image",
			"qode_title-image",
			"",
			esc_html__( "Background Image", 'stockholm' ),
			esc_html__( "Choose a background image for Title Area", 'stockholm' )
		);
		$qode_background_image_container->addChild(
			"qode_title-image",
			$qode_title_image
		);
		
		$qode_title_overlay_image = new StockholmQodeMetaField(
			"image",
			"qode_title-overlay-image",
			"",
			esc_html__( "Pattern Overlay Image", 'stockholm' ),
			esc_html__( "Choose an image to be used as pattern over Title Area", 'stockholm' )
		);
		$qode_background_image_container->addChild(
			"qode_title-overlay-image",
			$qode_title_overlay_image
		);
		
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
		$qode_background_image_container->addChild(
			"qode_responsive-title-image",
			$qode_responsive_title_image
		);
		
		$qode_responsive_title_image_container = new StockholmQodeContainer(
			"qode_responsive_title_image_container",
			"qode_responsive-title-image",
			"yes"
		);
		$qode_background_image_container->addChild(
			"qode_responsive_title_image_container",
			$qode_responsive_title_image_container
		);
		
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
		$qode_responsive_title_image_container->addChild(
			"qode_fixed-title-image",
			$qode_fixed_title_image
		);
		
		$qode_title_height = new StockholmQodeMetaField(
			"text",
			"qode_title-height",
			"",
			esc_html__( "Title Height (px)", 'stockholm' ),
			esc_html__( "Set a height for Title Area in pixels", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$qode_page_title_area_container->addChild(
			"qode_title-height",
			$qode_title_height
		);
		
		$qode_enable_breadcrumbs = new StockholmQodeMetaField(
			"selectblank",
			"qode_enable_breadcrumbs",
			"",
			esc_html__( "Enable Breadcrumbs", 'stockholm' ),
			esc_html__( "Do you want to display breadcrumbs in title area?", 'stockholm' ),
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			)
		);
		$qode_page_title_area_container->addChild(
			"qode_enable_breadcrumbs",
			$qode_enable_breadcrumbs
		);
		
		$qode_page_breadcrumbs_color = new StockholmQodeMetaField(
			"color",
			"qode_page_breadcrumbs_color",
			"",
			esc_html__( "Breadcrumbs Color", 'stockholm' ),
			esc_html__( "Choose a color for breadcrumbs text ", 'stockholm' )
		);
		$qode_page_title_area_container->addChild(
			"qode_page_breadcrumbs_color",
			$qode_page_breadcrumbs_color
		);
		
		$qode_page_subtitle = new StockholmQodeMetaField(
			"text",
			"qode_page_subtitle",
			"",
			esc_html__( "Subtitle Text", 'stockholm' ),
			esc_html__( "Enter your subtitle text", 'stockholm' )
		);
		$qode_page_title_area_container->addChild(
			"qode_page_subtitle",
			$qode_page_subtitle
		);
		
		$qode_page_subtitle_color = new StockholmQodeMetaField(
			"color",
			"qode_page_subtitle_color",
			"",
			esc_html__( "Subtitle Text Color", 'stockholm' ),
			esc_html__( "Choose a color for subtitle text", 'stockholm' )
		);
		$qode_page_title_area_container->addChild(
			"qode_page_subtitle_color",
			$qode_page_subtitle_color
		);
		
		// Content Bottom Meta Box Section
		
		$qodeContentBottom = new StockholmQodeMetaBox(
			"portfolio_page",
			esc_html__( "Select Content Bottom", 'stockholm' ),
			"content-bottom-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"portfolio_content_bottom_page",
			$qodeContentBottom
		);
		
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
		$qodeContentBottom->addChild(
			"qode_enable_content_bottom_area",
			$qode_enable_content_bottom_area
		);
		
		$qode_enable_content_bottom_area_container = new StockholmQodeContainer(
			"qode_enable_content_bottom_area_container",
			"qode_enable_content_bottom_area",
			"no",
			array(
				"",
				"no"
			)
		);
		$qodeContentBottom->addChild(
			"qode_enable_content_bottom_area_container",
			$qode_enable_content_bottom_area_container
		);
		
		$qode_content_bottom_background_color = new StockholmQodeMetaField(
			"color",
			"qode_content_bottom_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			esc_html__( "Choose a color for content bottom area", 'stockholm' )
		);
		$qode_enable_content_bottom_area_container->addChild(
			"qode_content_bottom_background_color",
			$qode_content_bottom_background_color
		);
		
		$qode_choose_content_bottom_sidebar = new StockholmQodeMetaField(
			"selectblank",
			"qode_choose_content_bottom_sidebar",
			"",
			esc_html__( "Custom Widget", 'stockholm' ),
			esc_html__( "Choose Custom Widget area to display", 'stockholm' ),
			$qode_custom_sidebars
		);
		$qode_enable_content_bottom_area_container->addChild(
			"qode_choose_content_bottom_sidebar",
			$qode_choose_content_bottom_sidebar
		);
		
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
		$qode_enable_content_bottom_area_container->addChild(
			"qode_content_bottom_sidebar_in_grid",
			$qode_content_bottom_sidebar_in_grid
		);
		
		// Sidebar Area Meta Box Section
		
		$qodeSideBar = new StockholmQodeMetaBox(
			"portfolio_page",
			esc_html__( "Select Sidebar", 'stockholm' ),
			"sidebar-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"portfolio_side_bar",
			$qodeSideBar
		);
		
		$qode_show_sidebar = new StockholmQodeMetaField(
			"selectblank",
			"qode_portfolio_show_sidebar",
			"default",
			esc_html__( "Layout", 'stockholm' ),
			esc_html__( "Choose the sidebar layout (Note that Full Screen Slider and Full Width Slider single portfolio types don't use  sidebar)", 'stockholm' ),
			array(
				"default" => esc_html__( "Default", 'stockholm' ),
				"1"       => esc_html__( "Sidebar 1/3 right", 'stockholm' ),
				"2"       => esc_html__( "Sidebar 1/4 right", 'stockholm' ),
				"3"       => esc_html__( "Sidebar 1/3 left", 'stockholm' ),
				"4"       => esc_html__( "Sidebar 1/4 left", 'stockholm' ),
			)
		);
		$qodeSideBar->addChild(
			"qode_portfolio_show_sidebar",
			$qode_show_sidebar
		);
		
		$qode_choose_sidebar = new StockholmQodeMetaField(
			"selectblank",
			"qode_choose-sidebar",
			"default",
			esc_html__( "Choose Widget Area in Sidebar", 'stockholm' ),
			esc_html__( "Choose Custom Widget area to display in Sidebar", 'stockholm' ),
			$qode_custom_sidebars
		);
		$qodeSideBar->addChild(
			"qode_choose-sidebar",
			$qode_choose_sidebar
		);
		
		// SEO Meta Box Section
		
		$qodeSeo = new StockholmQodeMetaBox(
			"portfolio_page",
			esc_html__( "Select SEO", 'stockholm' ),
			"seo-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"portfolio_seo",
			$qodeSeo
		);
		
		$seo_title = new StockholmQodeMetaField(
			"text",
			"qode_seo_title",
			"",
			esc_html__( "SEO Title", 'stockholm' ),
			esc_html__( "Enter custom Title for this page", 'stockholm' )
		);
		$qodeSeo->addChild(
			"seo_title",
			$seo_title
		);
		
		$seo_keywords = new StockholmQodeMetaField(
			"text",
			"qode_seo_keywords",
			"",
			esc_html__( "Meta Keywords", 'stockholm' ),
			esc_html__( "Enter the list of keywords separated by commas", 'stockholm' )
		);
		$qodeSeo->addChild(
			"seo_keywords",
			$seo_keywords
		);
		
		$seo_description = new StockholmQodeMetaField(
			"textarea",
			"qode_seo_description",
			"",
			esc_html__( "Meta Description", 'stockholm' ),
			esc_html__( "Enter meta description for this page", 'stockholm' )
		);
		$qodeSeo->addChild(
			"seo_description",
			$seo_description
		);
	}
	
	add_action( 'stockholm_qode_action_meta_boxes_map', 'stockholm_qode_map_portfolio_meta_fields', 20 );
}