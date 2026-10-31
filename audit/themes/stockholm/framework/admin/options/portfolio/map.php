<?php

if ( ! function_exists( 'stockholm_qode_portfolio_options_map' ) ) {
	/**
	 * Portfolio options page
	 */
	function stockholm_qode_portfolio_options_map() {
		
		$portfolioPage = new StockholmQodeAdminPage(
			"9",
			esc_html__( "Portfolio", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"portfolioPage",
			$portfolioPage
		);
		
		//Portfolio List
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Portfolio List", 'stockholm' ),
			"porfolio_list"
		);
		$portfolioPage->addChild(
			"panel1",
			$panel1
		);
		
		$portfolio_disable_text_box = new StockholmQodeField(
			"yesno",
			"portfolio_disable_text_box",
			"no",
			esc_html__( "Disable Text Box", 'stockholm' ),
			esc_html__( "Enabling this option will disable box around project text.", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_enable_portfolio_list_box_container",
				"dependence_show_on_yes" => ""
			)
		);
		$panel1->addChild(
			"portfolio_disable_text_box",
			$portfolio_disable_text_box
		);
		
		$enable_portfolio_list_box_container = new StockholmQodeContainer(
			"enable_portfolio_list_box_container",
			"portfolio_disable_text_box",
			"yes"
		);
		$panel1->addChild(
			"enable_portfolio_list_box_container",
			$enable_portfolio_list_box_container
		);
		
		$portfolio_list_box_background_color = new StockholmQodeField(
			"color",
			"portfolio_list_box_background_color",
			"",
			esc_html__( "Portfolio Box Background Color", 'stockholm' ),
			esc_html__( "Default color is #ffffff.", 'stockholm' )
		);
		$enable_portfolio_list_box_container->addChild(
			"portfolio_list_box_background_color",
			$portfolio_list_box_background_color
		);
		
		$portfolio_shader_color = new StockholmQodeField(
			"color",
			"portfolio_shader_color",
			"",
			esc_html__( "Portfolio Image Hover Color", 'stockholm' ),
			esc_html__( "Default color is #e6ae48.", 'stockholm' )
		);
		$panel1->addChild(
			"portfolio_shader_color",
			$portfolio_shader_color
		);
		
		$portfolio_shader_transparency = new StockholmQodeField(
			"text",
			"portfolio_shader_transparency",
			"",
			esc_html__( "Portfolio Image Hover Color Transparnecy", 'stockholm' ),
			esc_html__( "Choose a transparency for image hover color (0 = fully transparent, 1 = opaque). Note: If image hover color has not been chosen, transparency will not be displayed", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel1->addChild(
			"portfolio_shader_transparency",
			$portfolio_shader_transparency
		);
		
		$portfolio_qode_like = new StockholmQodeField(
			"onoff",
			"portfolio_qode_like",
			"on",
			esc_html__( "Likes", 'stockholm' ),
			esc_html__( 'Enabling this option will turn on "Likes"', 'stockholm' )
		);
		$panel1->addChild(
			"portfolio_qode_like",
			$portfolio_qode_like
		);
		
		$portfolio_list_hide_category = new StockholmQodeField(
			"yesno",
			"portfolio_list_hide_category",
			"no",
			esc_html__( "Hide Category", 'stockholm' ),
			esc_html__( "Enabling this option will disable categories on Portfolio list and Portfolio Slider.", 'stockholm' )
		);
		$panel1->addChild(
			"portfolio_list_hide_category",
			$portfolio_list_hide_category
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Icons Style", 'stockholm' ),
			esc_html__( "Define icons styles on project hover.", 'stockholm' )
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
		$portfolio_list_icons_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_list_icons_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_list_icons_color",
			$portfolio_list_icons_color
		);
		$portfolio_list_icons_hover_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_list_icons_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_list_icons_hover_color",
			$portfolio_list_icons_hover_color
		);
		$portfolio_list_icons_background_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_list_icons_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_list_icons_background_color",
			$portfolio_list_icons_background_color
		);
		$portfolio_list_icons_background_hover_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_list_icons_background_hover_color",
			"",
			esc_html__( "Background Hover Color", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_list_icons_background_hover_color",
			$portfolio_list_icons_background_hover_color
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$portfolio_list_icons_border_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_list_icons_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_list_icons_border_color",
			$portfolio_list_icons_border_color
		);
		$portfolio_list_icons_border_hover_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_list_icons_border_hover_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_list_icons_border_hover_color",
			$portfolio_list_icons_border_hover_color
		);
		$portfolio_list_icons_border_radius = new StockholmQodeField(
			"textsimple",
			"portfolio_list_icons_border_radius",
			"",
			esc_html__( "Border Radius (px)", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_list_icons_border_radius",
			$portfolio_list_icons_border_radius
		);
		
		//Portfolio Single Project
		
		$panel2 = new StockholmQodePanel(
			esc_html__( "Portfolio Single", 'stockholm' ),
			"porfolio_single_project"
		);
		$portfolioPage->addChild(
			"panel2",
			$panel2
		);
		
		$portfolio_style = new StockholmQodeField(
			"select",
			"portfolio_style",
			"small-images",
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
			
			)
		);
		$panel2->addChild(
			"portfolio_style",
			$portfolio_style
		);
		
		$lightbox_single_project = new StockholmQodeField(
			"yesno",
			"lightbox_single_project",
			"yes",
			esc_html__( "Lightbox for Images", 'stockholm' ),
			esc_html__( "Enabling this option will turn on lightbox functionality for projects with images. (Note that Full Screen Slider and Full Width Slider single portfolio types don't use light boxes)", 'stockholm' )
		);
		$panel2->addChild(
			"lightbox_single_project",
			$lightbox_single_project
		);
		
		$lightbox_video_single_project = new StockholmQodeField(
			"yesno",
			"lightbox_video_single_project",
			"no",
			esc_html__( "Lightbox for Videos", 'stockholm' ),
			esc_html__( "Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects. (Note that Full Screen Slider and Full Width Slider single portfolio types don't use light boxes)", 'stockholm' )
		);
		$panel2->addChild(
			"lightbox_video_single_project",
			$lightbox_video_single_project
		);
		
		$portfolio_hide_categories = new StockholmQodeField(
			"yesno",
			"portfolio_hide_categories",
			"no",
			esc_html__( "Hide Categories", 'stockholm' ),
			esc_html__( "Enabling this option will disable category meta description on Single Projects.", 'stockholm' )
		);
		$panel2->addChild(
			"portfolio_hide_categories",
			$portfolio_hide_categories
		);
		
		$portfolio_hide_date = new StockholmQodeField(
			"yesno",
			"portfolio_hide_date",
			"no",
			esc_html__( "Hide Date", 'stockholm' ),
			esc_html__( "Enabling this option will disable date meta on Single Projects.", 'stockholm' )
		);
		$panel2->addChild(
			"portfolio_hide_date",
			$portfolio_hide_date
		);
		
		$portfolio_hide_comments = new StockholmQodeField(
			"yesno",
			"portfolio_hide_comments",
			"yes",
			esc_html__( "Hide Comments", 'stockholm' ),
			esc_html__( "Enabling this option will turn off comments functionality.", 'stockholm' )
		);
		$panel2->addChild(
			"portfolio_hide_comments",
			$portfolio_hide_comments
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Social Share Style", 'stockholm' ),
			esc_html__( "Define icons styles for social share on Single Project.", 'stockholm' )
		);
		$panel2->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		$portfolio_social_share_type = new StockholmQodeField(
			"select",
			"portfolio_social_share_type",
			"circle",
			esc_html__( "Social Share Type", 'stockholm' ),
			esc_html__( 'Select social share type for display on Single Projects. Social Share for Portfolio Item must be enabled. ', 'stockholm' ),
			array(
				"circle"  => esc_html__( "Circle", 'stockholm' ),
				"regular" => esc_html__( "Regular", 'stockholm' )
			),
			array(),
			array( "col_width" => 3 )
		);
		$row1->addChild(
			"portfolio_social_share_type",
			$portfolio_social_share_type
		);
		$portfolio_single_social_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_single_social_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_social_color",
			$portfolio_single_social_color
		);
		$portfolio_single_social_hover_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_single_social_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_social_hover_color",
			$portfolio_single_social_hover_color
		);
		
		$portfolio_text_follow = new StockholmQodeField(
			"portfoliofollow",
			"portfolio_text_follow",
			"portfolio_single_follow",
			esc_html__( "Sticky Side Text ", 'stockholm' ),
			esc_html__( "Enabling this option will make side text sticky on Single Project pages", 'stockholm' )
		);
		$panel2->addChild(
			"portfolio_text_follow",
			$portfolio_text_follow
		);
		
		$portfolio_hide_pagination = new StockholmQodeField(
			"yesno",
			"portfolio_hide_pagination",
			"no",
			esc_html__( "Hide Pagination", 'stockholm' ),
			esc_html__( "Enabling this option will turn off portfolio pagination functionality.", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_portfolio_hide_pagination_container",
				"dependence_show_on_yes" => ""
			)
		);
		$panel2->addChild(
			"portfolio_hide_pagination",
			$portfolio_hide_pagination
		);
		
		$portfolio_hide_pagination_container = new StockholmQodeContainer(
			"portfolio_hide_pagination_container",
			"portfolio_hide_pagination",
			"yes"
		);
		$panel2->addChild(
			"portfolio_hide_pagination_container",
			$portfolio_hide_pagination_container
		);
		
		$portfolio_navigation_through_same_category = new StockholmQodeField(
			"yesno",
			"portfolio_navigation_through_same_category",
			"no",
			esc_html__( "Enable Pagination Through Same Category", 'stockholm' ),
			esc_html__( "Enabling this option will make portfolio pagination sort through current category.", 'stockholm' )
		);
		$portfolio_hide_pagination_container->addChild(
			"portfolio_navigation_through_same_category",
			$portfolio_navigation_through_same_category
		);
		
		$portfolio_navigation_reverse_order = new StockholmQodeField(
			"yesno",
			"portfolio_navigation_reverse_order",
			"no",
			esc_html__( "Revert Pagination Order", 'stockholm' ),
			esc_html__( "Enabling this option will revert next/prev pagination order.", 'stockholm' )
		);
		$portfolio_hide_pagination_container->addChild(
			"portfolio_navigation_reverse_order",
			$portfolio_navigation_reverse_order
		);
		
		$portfolio_box_background_color = new StockholmQodeField(
			"color",
			"portfolio_box_background_color",
			"",
			esc_html__( "Portfolio Box Background Color", 'stockholm' ),
			esc_html__( "This color only works when Portfolio style is (Big Images, Big Slider or Gallery). Default color is #ffffff.", 'stockholm' )
		);
		$panel2->addChild(
			"portfolio_box_background_color",
			$portfolio_box_background_color
		);
		
		$portfolio_box_lr_padding = new StockholmQodeField(
			"text",
			"portfolio_box_lr_padding",
			"",
			esc_html__( "Portfolio Box Left/Right Padding(px)", 'stockholm' ),
			esc_html__( "This padding only works when Portfolio style is (Big Images, Big Slider or Gallery). Default value is 45.", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel2->addChild(
			"portfolio_box_lr_padding",
			$portfolio_box_lr_padding
		);
		
		$portfolio_columns_number = new StockholmQodeField(
			"select",
			"portfolio_columns_number",
			"2",
			esc_html__( "Number of Columns", 'stockholm' ),
			esc_html__( 'Enter the number of columns for Portfolio Gallery type', 'stockholm' ),
			array(
				"2" => esc_html__( "2 columns", 'stockholm' ),
				"3" => esc_html__( "3 columns", 'stockholm' ),
				"4" => esc_html__( "4 columns", 'stockholm' )
			)
		);
		$panel2->addChild(
			"portfolio_columns_number",
			$portfolio_columns_number
		);
		
		$portfolio_hide_image_title = new StockholmQodeField(
			"yesno",
			"portfolio_hide_image_title",
			"no",
			esc_html__( "Hide Image Title", 'stockholm' ),
			esc_html__( "Enabling this option will hide image title from portfolio images hover in Portfolio Gallery Type.", 'stockholm' )
		);
		$panel2->addChild(
			"portfolio_hide_image_title",
			$portfolio_hide_image_title
		);
		
		$portfolio_single_gallery_color = new StockholmQodeField(
			"color",
			"portfolio_single_gallery_color",
			"",
			esc_html__( "Gallery Image Hover Color", 'stockholm' ),
			esc_html__( "Select color for image overlay in Single Project Gallery Type.", 'stockholm' )
		);
		$panel2->addChild(
			"portfolio_single_gallery_color",
			$portfolio_single_gallery_color
		);
		
		$portfolio_single_gallery_transparency = new StockholmQodeField(
			"text",
			"portfolio_single_gallery_transparency",
			"",
			esc_html__( "Gallery Image Hover Color Transparnecy", 'stockholm' ),
			esc_html__( "Enter a transparency for image overlay in Single Project Gallery Type. (0 = fully transparent, 1 = opaque). Note: If image hover color has not been chosen, transparency will not be displayed", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel2->addChild(
			"portfolio_single_gallery_transparency",
			$portfolio_single_gallery_transparency
		);
		
		$portfolio_single_sidebar = new StockholmQodeField(
			"select",
			"portfolio_single_sidebar",
			"default",
			esc_html__( "Sidebar Layout", 'stockholm' ),
			esc_html__( "Choose a sidebar layout for Single Project pages. (Note that Full Screen Slider and Full Width Slider single portfolio types don't use  sidebar)", 'stockholm' ),
			array(
				"default" => esc_html__( "No Sidebar", 'stockholm' ),
				"1"       => esc_html__( "Sidebar 1/3 right", 'stockholm' ),
				"2"       => esc_html__( "Sidebar 1/4 right", 'stockholm' ),
				"3"       => esc_html__( "Sidebar 1/3 left", 'stockholm' ),
				"4"       => esc_html__( "Sidebar 1/4 left", 'stockholm' )
			)
		);
		$panel2->addChild(
			"portfolio_single_sidebar",
			$portfolio_single_sidebar
		);
		
		$custom_sidebars = stockholm_qode_get_custom_sidebars();
		
		$portfolio_single_sidebar_custom_display = new StockholmQodeField(
			"selectblank",
			"portfolio_single_sidebar_custom_display",
			"",
			esc_html__( "Sidebar to Display", 'stockholm' ),
			esc_html__( "Choose a sidebar to display on Single Project pages", 'stockholm' ),
			$custom_sidebars
		);
		$panel2->addChild(
			"portfolio_single_sidebar_custom_display",
			$portfolio_single_sidebar_custom_display
		);
		
		$portfolio_single_slug = new StockholmQodeField(
			"text",
			"portfolio_single_slug",
			"",
			esc_html__( "Portfolio Single Slug", 'stockholm' ),
			esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect) ', 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel2->addChild(
			"portfolio_single_slug",
			$portfolio_single_slug
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_portfolio_options_map', 110 );
}