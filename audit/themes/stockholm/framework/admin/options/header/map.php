<?php

if ( ! function_exists( 'stockholm_qode_haeder_options_map' ) ) {
	function stockholm_qode_haeder_options_map() {
		
		$headerandfooterPage = new StockholmQodeAdminPage(
			"2",
			esc_html__( "Header", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"headerandfooter",
			$headerandfooterPage
		);
		
		// Header Position
		
		$panel6 = new StockholmQodePanel(
			esc_html__( "Header Position", 'stockholm' ),
			"header_position"
		);
		$headerandfooterPage->addChild(
			"panel6",
			$panel6
		);
		$vertical_area = new StockholmQodeField(
			"yesno",
			"vertical_area",
			"no",
			esc_html__( "Switch to Left Menu", 'stockholm' ),
			esc_html__( "Enabling this option will switch to a Left Menu area (default is Top Menu)", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_header_panel,#qodef_menu_panel,#qodef_header_top_panel,#qodef_enable_search_panel,#qodef_enable_side_area_panel,#qodef_enable_popup_menu_panel,#qodef_language_switcher",
				"dependence_show_on_yes" => "#qodef_vertical_areas_panel"
			)
		);
		$panel6->addChild(
			"vertical_area",
			$vertical_area
		);
		
		// Header
		
		$panel5 = new StockholmQodePanel(
			esc_html__( "Header", 'stockholm' ),
			"header_panel",
			"vertical_area",
			"yes"
		);
		$headerandfooterPage->addChild(
			"panel5",
			$panel5
		);
		
		$header_in_grid = new StockholmQodeField(
			"yesno",
			"header_in_grid",
			"yes",
			esc_html__( "Header in Grid", 'stockholm' ),
			esc_html__( "Enabling this option will display header content in grid", 'stockholm' )
		);
		$panel5->addChild(
			"header_in_grid",
			$header_in_grid
		);
		
		$header_bottom_appearance = new StockholmQodeField(
			"select",
			"header_bottom_appearance",
			"fixed",
			esc_html__( "Header Type", 'stockholm' ),
			esc_html__( "Choose the header layout & behavior", 'stockholm' ),
			array(
				"regular"                    => esc_html__( "Regular", 'stockholm' ),
				"fixed"                      => esc_html__( "Fixed", 'stockholm' ),
				"fixed_hiding"               => esc_html__( "Fixed Advanced", 'stockholm' ),
				"stick"                      => esc_html__( "Sticky", 'stockholm' ),
				"stick menu_bottom"          => esc_html__( "Sticky Expanded", 'stockholm' ),
				"stick_with_left_right_menu" => esc_html__( "Sticky Divided", 'stockholm' )
			),
			array(
				"dependence" => true,
				"hide"       => array(
					"regular"                    => "#qodef_scroll_amount_for_sticky_container,#qodef_header_height_scroll,#qodef_header_height_sticky,#qodef_header_height_scroll_hidden,#qodef_header_background_color_scroll,#qodef_header_background_color_sticky,#qodef_header_background_transparency_scroll,#qodef_header_background_transparency_sticky,#qodef_scroll_amount_for_fixed_hiding_container",
					"fixed"                      => "#qodef_scroll_amount_for_sticky_container,#qodef_header_height_sticky,#qodef_header_height_scroll_hidden,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky,#qodef_scroll_amount_for_fixed_hiding_container",
					"fixed_hiding"               => "#qodef_scroll_amount_for_sticky_container,#qodef_menu_position_container,#qodef_header_height_scroll,#qodef_header_height_sticky,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky",
					"stick menu_bottom"          => "#qodef_menu_position_container,#qodef_header_height_scroll,#qodef_header_height_scroll_hidden,#qodef_header_background_transparency_scroll,#qodef_header_background_color_scroll,#qodef_scroll_amount_for_fixed_hiding_container",
					"stick_with_left_right_menu" => "#qodef_menu_position_container,#qodef_header_height_scroll,#qodef_header_height_scroll_hidden,#qodef_header_background_transparency_scroll,#qodef_header_background_color_scroll,#qodef_scroll_amount_for_fixed_hiding_container",
					"stick"                      => "#qodef_header_height_scroll,#qodef_header_height_scroll_hidden,#qodef_header_background_color_scroll,#qodef_header_background_transparency_scroll,#qodef_scroll_amount_for_fixed_hiding_container"
				),
				"show"       => array(
					"regular"                    => "#qodef_menu_position_container",
					"fixed"                      => "#qodef_menu_position_container,#qodef_header_height_scroll,#qodef_header_background_color_scroll,#qodef_header_background_transparency_scroll",
					"stick"                      => "#qodef_scroll_amount_for_sticky_container,#qodef_menu_position_container,#qodef_header_height_sticky,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky",
					"stick menu_bottom"          => "#qodef_scroll_amount_for_sticky_container,#qodef_header_height_sticky,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky",
					"stick_with_left_right_menu" => "#qodef_scroll_amount_for_sticky_container,#qodef_header_height_sticky,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky",
					"fixed_hiding"               => "#qodef_header_height_scroll_hidden,#qodef_header_background_color_scroll,#qodef_header_background_transparency_scroll,#qodef_scroll_amount_for_fixed_hiding_container"
				)
			)
		);
		$panel5->addChild(
			"header_bottom_appearance",
			$header_bottom_appearance
		);
		
		$scroll_amount_for_sticky_container = new StockholmQodeContainer(
			"scroll_amount_for_sticky_container",
			"header_bottom_appearance",
			"fixed",
			array(
				"regular",
				"fixed",
				"fixed_hiding"
			)
		);
		$panel5->addChild(
			"scroll_amount_for_sticky_container",
			$scroll_amount_for_sticky_container
		);
		$scroll_amount_for_sticky = new StockholmQodeField(
			"text",
			"scroll_amount_for_sticky",
			"",
			esc_html__( "Scroll Amount for Sticky (px)", 'stockholm' ),
			esc_html__( "Enter scroll amount (in pixels) for Sticky Menu to appear", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$scroll_amount_for_sticky_container->addChild(
			"scroll_amount_for_sticky",
			$scroll_amount_for_sticky
		);
		
		$scroll_amount_for_fixed_hiding_container = new StockholmQodeContainer(
			"scroll_amount_for_fixed_hiding_container",
			"header_bottom_appearance",
			"fixed",
			array(
				"regular",
				"fixed",
				"stick",
				"stick menu_bottom",
				"stick_with_left_right_menu"
			)
		);
		$panel5->addChild(
			"scroll_amount_for_fixed_hiding_container",
			$scroll_amount_for_fixed_hiding_container
		);
		$scroll_amount_for_fixed_hiding = new StockholmQodeField(
			"text",
			"scroll_amount_for_fixed_hiding",
			"",
			esc_html__( "Scroll Amount (px)", 'stockholm' ),
			esc_html__( "Enter scroll amount (in pixels) for menu to hide", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$scroll_amount_for_fixed_hiding_container->addChild(
			"scroll_amount_for_fixed_hiding",
			$scroll_amount_for_fixed_hiding
		);
		
		$menu_position_container = new StockholmQodeContainer(
			"menu_position_container",
			"header_bottom_appearance",
			"fixed_hiding",
			array(
				"stick menu_bottom",
				"stick_with_left_right_menu",
				"fixed_hiding"
			)
		);
		$panel5->addChild(
			"menu_position_container",
			$menu_position_container
		);
		
		$menu_position = new StockholmQodeField(
			"select",
			"menu_position",
			"",
			esc_html__( "Menu Position", 'stockholm' ),
			esc_html__( "Choose a menu position (default is right alignment)", 'stockholm' ),
			array(
				"-1"     => esc_html__( "Default", 'stockholm' ),
				"center" => esc_html__( "Center", 'stockholm' ),
				"left" => esc_html__( "Left", 'stockholm' ),
			)
		);
		$menu_position_container->addChild(
			"menu_position",
			$menu_position
		);
		
		$center_logo_image = new StockholmQodeField(
			"yesno",
			"center_logo_image",
			"no",
			esc_html__( "Center Logo", 'stockholm' ),
			esc_html__( "Enabling this option will center logo and position it above menu", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_center_logo_image_container"
			)
		);
		$menu_position_container->addChild(
			"center_logo_image",
			$center_logo_image
		);
		
		$center_logo_image_container = new StockholmQodeContainer(
			"center_logo_image_container",
			"center_logo_image",
			"no"
		);
		$menu_position_container->addChild(
			"center_logo_image_container",
			$center_logo_image_container
		);
		
		$center_logo_image_animate = new StockholmQodeField(
			"yesno",
			"center_logo_image_animate",
			"no",
			esc_html__( "Animate Centered Logo", 'stockholm' ),
			esc_html__( "Enabling this option will animate logo upon loading", 'stockholm' )
		);
		$center_logo_image_container->addChild(
			"center_logo_image_animate",
			$center_logo_image_animate
		);
		
		$enable_border_top_bottom_menu = new StockholmQodeField(
			"yesno",
			"enable_border_top_bottom_menu",
			"no",
			esc_html__( "Enable Top/Bottom Border in Menu", 'stockholm' ),
			esc_html__( "Enabling this option will display top and bottom border in menu.", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_menu_border_container"
			)
		);
		$center_logo_image_container->addChild(
			"enable_border_top_bottom_menu",
			$enable_border_top_bottom_menu
		);
		
		$menu_border_container = new StockholmQodeContainer(
			"menu_border_container",
			"enable_border_top_bottom_menu",
			"no"
		);
		$center_logo_image_container->addChild(
			"menu_border_container",
			$menu_border_container
		);
		
		$color_border_top_bottom_menu = new StockholmQodeField(
			"color",
			"color_border_top_bottom_menu",
			"",
			esc_html__( "Border Color", 'stockholm' ),
			esc_html__( "Choose a color for the top/bottom border in menu.", 'stockholm' )
		);
		$menu_border_container->addChild(
			"color_border_top_bottom_menu",
			$color_border_top_bottom_menu
		);
		
		$disable_text_shadow_for_sticky = new StockholmQodeField(
			"yesno",
			"disable_text_shadow_for_sticky",
			"yes",
			esc_html__( "Disable Dropdown Shadow For Scrolled Header", 'stockholm' ),
			esc_html__( "Enabling this option will display text shadow for scrolled/sticky header", 'stockholm' )
		);
		$panel5->addChild(
			"disable_text_shadow_for_sticky",
			$disable_text_shadow_for_sticky
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Header Height", 'stockholm' ),
			esc_html__( "Enter header height in pixels", 'stockholm' )
		);
		$panel5->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$header_height = new StockholmQodeField(
			"textsimple",
			"header_height",
			"",
			esc_html__( "Initial (px)", 'stockholm' ),
			esc_html__( "Initial header (px)", 'stockholm' )
		);
		$row1->addChild(
			"header_height",
			$header_height
		);
		
		$header_height_scroll = new StockholmQodeField(
			"textsimple",
			"header_height_scroll",
			"",
			esc_html__( "After Scroll (px)", 'stockholm' ),
			"",
			array(),
			array(),
			"header_bottom_appearance",
			array(
				"regular",
				"stick",
				"stick menu_bottom",
				"stick_with_left_right_menu",
				"fixed_hiding"
			)
		);
		$row1->addChild(
			"header_height_scroll",
			$header_height_scroll
		);
		
		$header_height_sticky = new StockholmQodeField(
			"textsimple",
			"header_height_sticky",
			"",
			esc_html__( "After Scroll (px)", 'stockholm' ),
			"",
			array(),
			array(),
			"header_bottom_appearance",
			array(
				"regular",
				"fixed",
				"fixed_hiding"
			)
		);
		$row1->addChild(
			"header_height_sticky",
			$header_height_sticky
		);
		
		$header_height_scroll_hidden = new StockholmQodeField(
			"textsimple",
			"header_height_scroll_hidden",
			"",
			esc_html__( "After Scroll (px)", 'stockholm' ),
			"",
			array(),
			array(),
			"header_bottom_appearance",
			array(
				"regular",
				"fixed",
				"stick",
				"stick menu_bottom",
				"stick_with_left_right_menu"
			)
		);
		$row1->addChild(
			"header_height_scroll_hidden",
			$header_height_scroll_hidden
		);
		
		$header_height_mobile = new StockholmQodeField(
			"textsimple",
			"header_height_mobile",
			"",
			esc_html__( "Mobile (px)", 'stockholm' ),
			esc_html__( "Mobile header height (px)", 'stockholm' )
		);
		$row1->addChild(
			"header_height_mobile",
			$header_height_mobile
		);
		
		$header_style = new StockholmQodeField(
			"select",
			"header_style",
			"",
			esc_html__( "Header Skin", 'stockholm' ),
			esc_html__( "Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style", 'stockholm' ),
			array(
				"-1"    => "",
				"light" => esc_html__( "Light", 'stockholm' ),
				"dark"  => esc_html__( "Dark", 'stockholm' )
			)
		);
		$panel5->addChild(
			"header_style",
			$header_style
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Header Background Color", 'stockholm' ),
			esc_html__( "Choose a background color for header area", 'stockholm' )
		);
		$panel5->addChild(
			"group2",
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		
		$header_background_color = new StockholmQodeField(
			"colorsimple",
			"header_background_color",
			"",
			esc_html__( "Initial", 'stockholm' ),
			""
		);
		$row1->addChild(
			"header_background_color",
			$header_background_color
		);
		
		$header_background_color_scroll = new StockholmQodeField(
			"colorsimple",
			"header_background_color_scroll",
			"",
			esc_html__( "After Scroll", 'stockholm' ),
			"",
			array(),
			array(),
			"header_bottom_appearance",
			array(
				"regular",
				"stick",
				"stick menu_bottom",
				"stick_with_left_right_menu"
			)
		);
		$row1->addChild(
			"header_background_color_scroll",
			$header_background_color_scroll
		);
		
		$header_background_color_sticky = new StockholmQodeField(
			"colorsimple",
			"header_background_color_sticky",
			"",
			esc_html__( "After Scroll", 'stockholm' ),
			"",
			array(),
			array(),
			"header_bottom_appearance",
			array(
				"regular",
				"fixed",
				"fixed_hiding"
			)
		);
		$row1->addChild(
			"header_background_color_sticky",
			$header_background_color_sticky
		);
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Header Transparency", 'stockholm' ),
			esc_html__( "Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)", 'stockholm' )
		);
		$panel5->addChild(
			"group3",
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		
		$header_background_transparency_initial = new StockholmQodeField(
			"textsimple",
			"header_background_transparency_initial",
			"",
			esc_html__( "Initial", 'stockholm' ),
			""
		);
		$row1->addChild(
			"header_background_transparency_initial",
			$header_background_transparency_initial
		);
		
		$header_background_transparency_scroll = new StockholmQodeField(
			"textsimple",
			"header_background_transparency_scroll",
			"",
			esc_html__( "After Scroll", 'stockholm' ),
			"",
			array(),
			array(),
			"header_bottom_appearance",
			array(
				"regular",
				"stick",
				"stick menu_bottom",
				"stick_with_left_right_menu"
			)
		);
		$row1->addChild(
			"header_background_transparency_scroll",
			$header_background_transparency_scroll
		);
		
		$header_background_transparency_sticky = new StockholmQodeField(
			"textsimple",
			"header_background_transparency_sticky",
			"",
			esc_html__( "After Scroll", 'stockholm' ),
			"",
			array(),
			array(),
			"header_bottom_appearance",
			array(
				"regular",
				"fixed",
				"fixed_hiding"
			)
		);
		$row1->addChild(
			"header_background_transparency_sticky",
			$header_background_transparency_sticky
		);
		
		$enable_header_bottom_border = new StockholmQodeField(
			"yesno",
			"enable_header_bottom_border",
			"no",
			esc_html__( "Enable Header Bottom Border", 'stockholm' ),
			esc_html__( "This option displays a border under the header", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_header_bottom_border_container"
			)
		);
		$panel5->addChild(
			"enable_header_bottom_border",
			$enable_header_bottom_border
		);
		
		$header_bottom_border_container = new StockholmQodeContainer(
			"header_bottom_border_container",
			"enable_header_bottom_border",
			"no"
		);
		$panel5->addChild(
			"header_bottom_border_container",
			$header_bottom_border_container
		);
		
		$header_bottom_border_color = new StockholmQodeField(
			"color",
			"header_bottom_border_color",
			"",
			esc_html__( "Header Bottom Border Color", 'stockholm' ),
			esc_html__( "Choose a color for the header bottom border. Note: If color has not been chosen, border bottom will not be displayed", 'stockholm' )
		);
		$header_bottom_border_container->addChild(
			"header_bottom_border_color",
			$header_bottom_border_color
		);
		
		$header_botom_border_transparency = new StockholmQodeField(
			"text",
			"header_botom_border_transparency",
			"",
			esc_html__( "Header Bottom Border Transparency", 'stockholm' ),
			esc_html__( "Choose a transparency for the header border color (0 = fully transparent, 1 = opaque). Note: Works only if Header Bottom Border Color is filled", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$header_bottom_border_container->addChild(
			"header_botom_border_transparency",
			$header_botom_border_transparency
		);
		
		$header_botom_border_in_grid = new StockholmQodeField(
			"yesno",
			"header_botom_border_in_grid",
			"no",
			esc_html__( "Enable Header Bottom Border in Grid", 'stockholm' ),
			esc_html__( "Enabling this option will set header border bottom width in grid.", 'stockholm' )
		);
		$header_bottom_border_container->addChild(
			"header_botom_border_in_grid",
			$header_botom_border_in_grid
		);
		
		// Menu
		
		$panel4 = new StockholmQodePanel(
			esc_html__( "Menu", 'stockholm' ),
			"menu_panel",
			"vertical_area",
			"yes"
		);
		$headerandfooterPage->addChild(
			"panel4",
			$panel4
		);
		
		$enable_menu_hover_animation = new StockholmQodeField(
			"yesno",
			"enable_menu_hover_animation",
			"no",
			esc_html__( "Enable 1st Level Menu Hover Animation", 'stockholm' ),
			esc_html__( "This option will enable hover animation for first level in main menu", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_menu_hover_animation_container"
			)
		);
		$panel4->addChild(
			"enable_menu_hover_animation",
			$enable_menu_hover_animation
		);
		
		$enable_menu_hover_animation_container = new StockholmQodeContainer(
			"enable_menu_hover_animation_container",
			"enable_menu_hover_animation",
			"no"
		);
		$panel4->addChild(
			"enable_menu_hover_animation_container",
			$enable_menu_hover_animation_container
		);
		
		$menu_hover_type = new StockholmQodeField(
			"select",
			"menu_hover_type",
			"",
			esc_html__( "Menu Hover Animation Type", 'stockholm' ),
			esc_html__( "Choose a hover animation type for firsl level in main menu", 'stockholm' ),
			array(
				"underline"        => esc_html__( "Underline", 'stockholm' ),
				"line-through"     => esc_html__( "Line Through", 'stockholm' ),
				"underline-bottom" => esc_html__( "Underline Bottom of Header", 'stockholm' ),
			)
		);
		$enable_menu_hover_animation_container->addChild(
			"menu_hover_type",
			$menu_hover_type
		);
		
		$menu_hover_animation_color = new StockholmQodeField(
			"color",
			"menu_hover_animation_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			esc_html__( "Chose a color", 'stockholm' )
		);
		$enable_menu_hover_animation_container->addChild(
			"menu_hover_animation_color",
			$menu_hover_animation_color
		);
		
		$menu_dropdown_appearance = new StockholmQodeField(
			"select",
			"menu_dropdown_appearance",
			"",
			esc_html__( "Dropdown Appearance", 'stockholm' ),
			esc_html__( "Choose appearance for dropdown menu", 'stockholm' ),
			array(
				""               => esc_html__( "Default", 'stockholm' ),
				"animate_height" => esc_html__( "Animate Height", 'stockholm' )
			)
		);
		$panel4->addChild(
			"menu_dropdown_appearance",
			$menu_dropdown_appearance
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Main Dropdown Menu", 'stockholm' ),
			esc_html__( "Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)", 'stockholm' )
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
		
		$dropdown_background_color = new StockholmQodeField(
			"colorsimple",
			"dropdown_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"dropdown_background_color",
			$dropdown_background_color
		);
		
		$dropdown_background_transparency = new StockholmQodeField(
			"textsimple",
			"dropdown_background_transparency",
			"",
			esc_html__( "Transparency", 'stockholm' ),
			""
		);
		$row1->addChild(
			"dropdown_background_transparency",
			$dropdown_background_transparency
		);
		
		$dropdown_separator_color = new StockholmQodeField(
			"colorsimple",
			"dropdown_separator_color",
			"",
			esc_html__( "Item Separator Bottom Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"dropdown_separator_color",
			$dropdown_separator_color
		);
		
		$header_separator_color = new StockholmQodeField(
			"colorsimple",
			"header_separator_color",
			"",
			esc_html__( "Vertical Separator Color for Wide Menu", 'stockholm' ),
			""
		);
		$row1->addChild(
			"header_separator_color",
			$header_separator_color
		);
		
		$disable_dropdown_top_separator = new StockholmQodeField(
			"yesno",
			"disable_dropdown_top_separator",
			"no",
			esc_html__( "Disable Dropdown Top Separator", 'stockholm' ),
			esc_html__( "This option removes separator on top of dropdown menu", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_disable_dropdown_top_separator_container",
				"dependence_show_on_yes" => ""
			)
		);
		$panel4->addChild(
			"disable_dropdown_top_separator",
			$disable_dropdown_top_separator
		);
		
		$disable_dropdown_top_separator_container = new StockholmQodeContainer(
			"disable_dropdown_top_separator_container",
			"disable_dropdown_top_separator",
			"yes"
		);
		$panel4->addChild(
			"disable_dropdown_top_separator_container",
			$disable_dropdown_top_separator_container
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Dropdown Top Separator Style", 'stockholm' ),
			esc_html__( "Define style for the top separator", 'stockholm' )
		);
		$disable_dropdown_top_separator_container->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$dropdown_top_separator_color = new StockholmQodeField(
			"colorsimple",
			"dropdown_top_separator_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"dropdown_top_separator_color",
			$dropdown_top_separator_color
		);
		
		$dropdown_top_separator_thickness = new StockholmQodeField(
			"textsimple",
			"dropdown_top_separator_thickness",
			"",
			esc_html__( "Thickness (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"dropdown_top_separator_thickness",
			$dropdown_top_separator_thickness
		);
		
		$dropdown_border_around = new StockholmQodeField(
			"yesno",
			"dropdown_border_around",
			"no",
			esc_html__( "Border", 'stockholm' ),
			esc_html__( "Enabling this option will display border around dropdown menu", 'stockholm' )
		);
		$panel4->addChild(
			"dropdown_border_around",
			$dropdown_border_around
		);
		
		$enable_wide_menu_background = new StockholmQodeField(
			"yesno",
			"enable_wide_menu_background",
			"no",
			esc_html__( "Enable Full Width Background for Wide Dropdown Type", 'stockholm' ),
			esc_html__( "Enabling this option will show full width background  for wide dropdown type", 'stockholm' )
		);
		$panel4->addChild(
			"enable_wide_menu_background",
			$enable_wide_menu_background
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Mobile Menu", 'stockholm' ),
			esc_html__( "Define styles for Mobile Menu (as seen on small screens)", 'stockholm' )
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
		$mobile_separator_color = new StockholmQodeField(
			"colorsimple",
			"mobile_separator_color",
			"",
			esc_html__( "Separator Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"mobile_separator_color",
			$mobile_separator_color
		);
		$mobile_background_color = new StockholmQodeField(
			"colorsimple",
			"mobile_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"mobile_background_color",
			$mobile_background_color
		);
		
		// Select Search
		
		$panel3 = new StockholmQodePanel(
			esc_html__( "Select Search", 'stockholm' ),
			"enable_search_panel",
			"vertical_area",
			"yes"
		);
		$headerandfooterPage->addChild(
			"panel3",
			$panel3
		);
		
		$enable_search = new StockholmQodeField(
			"yesno",
			"enable_search",
			"no",
			esc_html__( "Enable Select Search Bar", 'stockholm' ),
			"This option enables Select Search functionality (search icon will appear next to main navigation)
        ",
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_search_container"
			)
		);
		$panel3->addChild(
			"enable_search",
			$enable_search
		);
		
		$enable_search_container = new StockholmQodeContainer(
			"enable_search_container",
			"enable_search",
			"no"
		);
		$panel3->addChild(
			"enable_search_container",
			$enable_search_container
		);
		
		$search_type = new StockholmQodeField(
			"select",
			"search_type",
			"from_window_top",
			esc_html__( "Search Type", 'stockholm' ),
			esc_html__( "Choose a search type", 'stockholm' ),
			array(
				"from_window_top"   => esc_html__( "Slide from Window Top", 'stockholm' ),
				"fullscreen_search" => esc_html__( "Fullscreen", 'stockholm' )
			)
		);
		$enable_search_container->addChild(
			"search_type",
			$search_type
		);
		
		$search_background_color = new StockholmQodeField(
			"color",
			"search_background_color",
			"",
			esc_html__( "Select Search Background Color", 'stockholm' ),
			esc_html__( "Choose a background color for Select search bar", 'stockholm' )
		);
		$enable_search_container->addChild(
			"search_background_color",
			$search_background_color
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Select Search Text Style", 'stockholm' ),
			esc_html__( "Define styles for Search Text input field", 'stockholm' )
		);
		$enable_search_container->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		$search_text_color = new StockholmQodeField(
			"colorsimple",
			"search_text_color",
			"",
			esc_html__( "Select Search Text Color", 'stockholm' ),
			esc_html__( "Choose a text color for Select search bar", 'stockholm' )
		);
		$row1->addChild(
			"search_text_color",
			$search_text_color
		);
		$search_text_font_size = new StockholmQodeField(
			"textsimple",
			"search_text_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"search_text_font_size",
			$search_text_font_size
		);
		$search_text_line_height = new StockholmQodeField(
			"textsimple",
			"search_text_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"search_text_line_height",
			$search_text_line_height
		);
		$search_text_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"search_text_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"search_text_text_transform",
			$search_text_text_transform
		);
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$search_text_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"search_text_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"search_text_google_fonts",
			$search_text_google_fonts
		);
		$search_text_font_style = new StockholmQodeField(
			"selectblanksimple",
			"search_text_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"search_text_font_style",
			$search_text_font_style
		);
		$search_text_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"search_text_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"search_text_font_weight",
			$search_text_font_weight
		);
		$search_text_letter_spacing = new StockholmQodeField(
			"textsimple",
			"search_text_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"search_text_letter_spacing",
			$search_text_letter_spacing
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Select Search Icon Style", 'stockholm' ),
			esc_html__( "Define styles for Search Icon input field", 'stockholm' )
		);
		$enable_search_container->addChild(
			"group2",
			$group2
		);
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		$search_icon_color = new StockholmQodeField(
			"colorsimple",
			"search_icon_color",
			"",
			esc_html__( "Icon Color", 'stockholm' ),
			esc_html__( "Choose a text color for Select search bar", 'stockholm' )
		);
		$row1->addChild(
			"search_icon_color",
			$search_icon_color
		);
		$search_icon_hover_color = new StockholmQodeField(
			"colorsimple",
			"search_icon_hover_color",
			"",
			esc_html__( "Icon Hover Color", 'stockholm' ),
			esc_html__( "Choose a text color for Select search bar", 'stockholm' )
		);
		$row1->addChild(
			"search_icon_hover_color",
			$search_icon_hover_color
		);
		$search_icon_font_size = new StockholmQodeField(
			"textsimple",
			"search_icon_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"search_icon_font_size",
			$search_icon_font_size
		);
		$search_icon_line_height = new StockholmQodeField(
			"textsimple",
			"search_icon_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"search_icon_line_height",
			$search_icon_line_height
		);
		
		$row2 = new StockholmQodeRow();
		$group2->addChild(
			"row2",
			$row2
		);
		$search_icon_type = new StockholmQodeField(
			'selectsimple',
			'search_icon_type',
			'',
			esc_html__( 'Search Icon', 'stockholm' ),
			'',
			array(
				''             => esc_html__( 'Font Awesome Icon', 'stockholm' ),
				'font-elegant' => esc_html__( 'Font Elegant Icon', 'stockholm' ),
				'font-linear'  => esc_html__( 'Linear Icon', 'stockholm' )
			)
		);
		$row2->addChild(
			'search_icon_type',
			$search_icon_type
		);
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Select Search Close Icon Style", 'stockholm' ),
			esc_html__( "Define styles for Search Close Icon", 'stockholm' )
		);
		$enable_search_container->addChild(
			"group3",
			$group3
		);
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		$search_colose_icon_color = new StockholmQodeField(
			"colorsimple",
			"search_colose_icon_color",
			"",
			esc_html__( "Icon Color", 'stockholm' ),
			esc_html__( "Choose a text color for Select search bar", 'stockholm' )
		);
		$row1->addChild(
			"search_colose_icon_color",
			$search_colose_icon_color
		);
		
		// Side Area
		
		$panel11 = new StockholmQodePanel(
			esc_html__( "Side Area", 'stockholm' ),
			"enable_side_area_panel",
			"vertical_area",
			"yes"
		);
		$headerandfooterPage->addChild(
			"panel11",
			$panel11
		);
		
		$enable_side_area = new StockholmQodeField(
			"yesno",
			"enable_side_area",
			"yes",
			esc_html__( "Enable Side Area", 'stockholm' ),
			esc_html__( "This option enables a side area to be opened from main menu navigation", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_side_area_container"
			)
		);
		$panel11->addChild(
			"enable_side_area",
			$enable_side_area
		);
		
		$enable_side_area_container = new StockholmQodeContainer(
			"enable_side_area_container",
			"enable_side_area",
			"no"
		);
		$panel11->addChild(
			"enable_side_area_container",
			$enable_side_area_container
		);
		
		$side_area_appear_type = new StockholmQodeField(
			"select",
			"side_area_appear_type",
			"side_area_uncovered",
			esc_html__( "Side Area Type", 'stockholm' ),
			esc_html__( "Choose a type of Side Area", 'stockholm' ),
			array(
				'side_area_uncovered'          => esc_html__( 'Uncovered from Content', 'stockholm' ),
				'side_area_over_content'       => esc_html__( 'Move from Right Over Content', 'stockholm' ),
				'side_area_slide_with_content' => esc_html__( 'Slide from Right With Content', 'stockholm' ),
			)
		);
		$enable_side_area_container->addChild(
			"side_area_appear_type",
			$side_area_appear_type
		);
		
		$side_area_title = new StockholmQodeField(
			"text",
			"side_area_title",
			"",
			esc_html__( "Side Area Title", 'stockholm' ),
			esc_html__( "Enter a title to appear in Side Area", 'stockholm' )
		);
		$enable_side_area_container->addChild(
			"side_area_title",
			$side_area_title
		);
		
		$side_area_background_color = new StockholmQodeField(
			"color",
			"side_area_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			esc_html__( "Choose a background color for Side Area", 'stockholm' )
		);
		$enable_side_area_container->addChild(
			"side_area_background_color",
			$side_area_background_color
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Title", 'stockholm' ),
			esc_html__( "Define styles for Side Area titles", 'stockholm' )
		);
		$enable_side_area_container->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		$side_area_title_color = new StockholmQodeField(
			"colorsimple",
			"side_area_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"side_area_title_color",
			$side_area_title_color
		);
		$side_area_title_fontsize = new StockholmQodeField(
			"textsimple",
			"side_area_title_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"side_area_title_fontsize",
			$side_area_title_fontsize
		);
		$side_area_title_lineheight = new StockholmQodeField(
			"textsimple",
			"side_area_title_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"side_area_title_lineheight",
			$side_area_title_lineheight
		);
		$side_area_title_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"side_area_title_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"side_area_title_texttransform",
			$side_area_title_texttransform
		);
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$side_area_title_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"side_area_title_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"side_area_title_google_fonts",
			$side_area_title_google_fonts
		);
		$side_area_title_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"side_area_title_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"side_area_title_fontstyle",
			$side_area_title_fontstyle
		);
		$side_area_title_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"side_area_title_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"side_area_title_fontweight",
			$side_area_title_fontweight
		);
		$side_area_title_letterspacing = new StockholmQodeField(
			"textsimple",
			"side_area_title_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"side_area_title_letterspacing",
			$side_area_title_letterspacing
		);
		
		$side_area_text_color = new StockholmQodeField(
			"color",
			"side_area_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			esc_html__( "Choose a text color for Side Area", 'stockholm' )
		);
		$enable_side_area_container->addChild(
			"side_area_text_color",
			$side_area_text_color
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Link Style", 'stockholm' ),
			esc_html__( "Define styles for side area widget links", 'stockholm' )
		);
		$enable_side_area_container->addChild(
			"group2",
			$group2
		);
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		$sidearea_link_color = new StockholmQodeField(
			"colorsimple",
			"sidearea_link_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"sidearea_link_color",
			$sidearea_link_color
		);
		
		$sidearea_link_font_size = new StockholmQodeField(
			"textsimple",
			"sidearea_link_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"sidearea_link_font_size",
			$sidearea_link_font_size
		);
		
		$sidearea_link_line_height = new StockholmQodeField(
			"textsimple",
			"sidearea_link_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"sidearea_link_line_height",
			$sidearea_link_line_height
		);
		
		$sidearea_link_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"sidearea_link_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"sidearea_link_text_transform",
			$sidearea_link_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$sidearea_link_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"sidearea_link_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"sidearea_link_font_family",
			$sidearea_link_font_family
		);
		
		$sidearea_link_font_style = new StockholmQodeField(
			"selectblanksimple",
			"sidearea_link_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"sidearea_link_font_style",
			$sidearea_link_font_style
		);
		
		$sidearea_link_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"sidearea_link_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"sidearea_link_font_weight",
			$sidearea_link_font_weight
		);
		
		$sidearea_link_letter_spacing = new StockholmQodeField(
			"textsimple",
			"sidearea_link_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"sidearea_link_letter_spacing",
			$sidearea_link_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group2->addChild(
			"row3",
			$row3
		);
		$sidearea_link_hover_color = new StockholmQodeField(
			"colorsimple",
			"sidearea_link_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' ),
			""
		);
		$row3->addChild(
			"sidearea_link_hover_color",
			$sidearea_link_hover_color
		);
		
//		$group_open_icon_group = new StockholmQodeGroup(
//			esc_html__( "Open Icon Style", 'stockholm' ),
//			esc_html__( "Define styles for side area open icon", 'stockholm' )
//		);
//		$enable_side_area_container->addChild(
//			"group_open_icon_group",
//			$group_open_icon_group
//		);
//
//		$row1 = new StockholmQodeRow();
//		$group_open_icon_group->addChild(
//			"row1",
//			$row1
//		);


		$sidearea_open_icon_type = new StockholmQodeField(
			"select",
			"sidearea_open_icon_type",
			"font-awesome",
			esc_html__( "Icon Type", 'stockholm' ),
			"",
			array(
				'font-awesome' => esc_html__( 'Font Awesome', 'stockholm' ),
				'font-elegant' => esc_html__( 'Font Elegant', 'stockholm' ),
				'svg-path' 		=> esc_html__('SVG Path', 'stockholm')
			),
			array(
				"dependence" => true,
				"hide" => array(
					'font-awesome' => '#qodef_side_area_icon_svg_container',
					'font-elegant' => '#qodef_side_area_icon_svg_container'
				),
				"show" => array(
					'svg-path' => '#qodef_side_area_icon_svg_container'
				)
			)
		);
		$enable_side_area_container->addChild(
			"sidearea_open_icon_type",
			$sidearea_open_icon_type
		);

		//sidearea svg options map start

		$icon_collections_keys = array(
			'font-awesome',
			'font-elegant'
		);

		$side_area_icon_svg_container = new StockholmQodeContainer(
			"side_area_icon_svg_container",
			"sidearea_open_icon_type",
			"font-awesome",
			$icon_collections_keys
		);

		$side_area_button_icon_svg_opener = new StockholmQodeField(
			"textarea",
			"side_area_icon_svg_opener",
			"",
			esc_html__('Side Area SVG Opener Path', 'stockholm'),
			esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'stockholm'),
			"", array("col_width" => 3));

		$side_area_icon_svg_container->addChild("side_area_icon_svg_opener", $side_area_button_icon_svg_opener);

		$enable_side_area_container->addChild("side_area_icon_svg_opener", $side_area_icon_svg_container);

		//sidearea svg options map end


		$group3 = new StockholmQodeGroup(
			esc_html__( "Close Icon Style", 'stockholm' ),
			esc_html__( "Define styles for side area close icon", 'stockholm' )
		);
		$enable_side_area_container->addChild(
			"group3",
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		
		$sidearea_close_icon_type = new StockholmQodeField(
			"selectsimple",
			"sidearea_close_icon_type",
			"",
			esc_html__( "Icon Type", 'stockholm' ),
			"",
			array(
				'default' => esc_html__( 'Default', 'stockholm' ),
				'fold'    => esc_html__( 'Fold', 'stockholm' )
			)
		);
		$row1->addChild(
			"sidearea_close_icon_type",
			$sidearea_close_icon_type
		);
		
		$sidearea_close_icon_color = new StockholmQodeField(
			"colorsimple",
			"sidearea_close_icon_color",
			"",
			esc_html__( "Fold Icon Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"sidearea_close_icon_color",
			$sidearea_close_icon_color
		);
		
		$sidearea_close_icon_color = new StockholmQodeField(
			"textsimple",
			"sidearea_close_icon_size",
			"",
			esc_html__( "Fold Icon Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"sidearea_close_icon_size",
			$sidearea_close_icon_color
		);
		
		$group5 = new StockholmQodeGroup(
			esc_html__( "Close Icon Position", 'stockholm' ),
			esc_html__( "Define position for close icon in side area  (enter value with unit, px or %) Default value is 30px for top and right", 'stockholm' )
		);
		$enable_side_area_container->addChild(
			"group5",
			$group5
		);
		
		$sidearea_close_icon_position_top = new StockholmQodeField(
			"textsimple",
			"sidearea_close_icon_position_top",
			"",
			esc_html__( "Top Position", 'stockholm' ),
			esc_html__( "Set top position for Close Icon in Side Area", 'stockholm' )
		);
		$group5->addChild(
			"sidearea_close_icon_position_top",
			$sidearea_close_icon_position_top
		);
		
		$sidearea_close_icon_position_right = new StockholmQodeField(
			"textsimple",
			"sidearea_close_icon_position_right",
			"",
			esc_html__( "Right Position", 'stockholm' ),
			esc_html__( "Set right position for Close Icon in Side Area", 'stockholm' )
		);
		$group5->addChild(
			"sidearea_close_icon_position_right",
			$sidearea_close_icon_position_right
		);
		
		$sidearea_text_alignment = new StockholmQodeField(
			"select",
			"sidearea_text_alignment",
			"",
			esc_html__( "Text Alignment", 'stockholm' ),
			esc_html__( "Choose side area text alignment", 'stockholm' ),
			array(
				"left"   => esc_html__( "Left", 'stockholm' ),
				"center" => esc_html__( "Center", 'stockholm' ),
				"right"  => esc_html__( "Right", 'stockholm' )
			)
		);
		$enable_side_area_container->addChild(
			"sidearea_text_alignment",
			$sidearea_text_alignment
		);
		
		$group4 = new StockholmQodeGroup(
			esc_html__( "Side Area Padding", 'stockholm' ),
			esc_html__( "Define padding for side area (enter value with unit, px or %). Default is 30px.", 'stockholm' )
		);
		$enable_side_area_container->addChild(
			"group4",
			$group4
		);
		
		$sidearea_padding_top = new StockholmQodeField(
			"textsimple",
			"sidearea_padding_top",
			"",
			esc_html__( "Padding Top", 'stockholm' ),
			esc_html__( "Set padding top for Side Area. Default value is 30px", 'stockholm' )
		);
		$group4->addChild(
			"sidearea_padding_top",
			$sidearea_padding_top
		);
		
		$sidearea_padding_right = new StockholmQodeField(
			"textsimple",
			"sidearea_padding_right",
			"",
			esc_html__( "Padding Right", 'stockholm' ),
			esc_html__( "Set padding right for Side Area. Default value is 30px", 'stockholm' )
		);
		$group4->addChild(
			"sidearea_padding_right",
			$sidearea_padding_right
		);
		
		$sidearea_padding_bottom = new StockholmQodeField(
			"textsimple",
			"sidearea_padding_bottom",
			"",
			esc_html__( "Padding Bottom", 'stockholm' ),
			esc_html__( "Set padding bottom for Side Area. Default value is 30px", 'stockholm' )
		);
		$group4->addChild(
			"sidearea_padding_bottom",
			$sidearea_padding_bottom
		);
		
		$sidearea_padding_left = new StockholmQodeField(
			"textsimple",
			"sidearea_padding_left",
			"",
			esc_html__( "Padding Left", 'stockholm' ),
			esc_html__( "Set padding left for Side Area. Default value is 30px", 'stockholm' )
		);
		$group4->addChild(
			"sidearea_padding_left",
			$sidearea_padding_left
		);
		
		// Fullscreen Menu
		
		$panel12 = new StockholmQodePanel(
			esc_html__( "Fullscreen Menu", 'stockholm' ),
			"enable_popup_menu_panel",
			"vertical_area",
			"yes"
		);
		$headerandfooterPage->addChild(
			"panel12",
			$panel12
		);
		
		$enable_popup_menu = new StockholmQodeField(
			"yesno",
			"enable_popup_menu",
			"no",
			esc_html__( "Enable Fullscreen Menu", 'stockholm' ),
			esc_html__( "This option enables a fullscreen menu to be opened from main menu navigation", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_popup_menu_container"
			)
		);
		$panel12->addChild(
			"enable_popup_menu",
			$enable_popup_menu
		);
		
		$enable_popup_menu_container = new StockholmQodeContainer(
			"enable_popup_menu_container",
			"enable_popup_menu",
			"no"
		);
		$panel12->addChild(
			"enable_popup_menu_container",
			$enable_popup_menu_container
		);
		
		$logo_image_popup = new StockholmQodeField(
			"image",
			"logo_image_popup",
			"",
			esc_html__( "Logo image for Fullscreen menu", 'stockholm' ),
			esc_html__( "Choose a logo for Fullscreen Menu", 'stockholm' )
		);
		$enable_popup_menu_container->addChild(
			"logo_image_popup",
			$logo_image_popup
		);
		
		$popup_menu_appearance = new StockholmQodeField(
			"select",
			"popup_menu_appearance",
			"fade",
			esc_html__( "Popup Menu Appearance", 'stockholm' ),
			esc_html__( "Choose type of appearance for popup menu", 'stockholm' ),
			array(
				"fade"            => esc_html__( "Fade", 'stockholm' ),
				"slide-from-left" => esc_html__( "Slide from Left", 'stockholm' ),
				"text-from-top"   => esc_html__( "Text Appears from Top", 'stockholm' )
			)
		);
		$enable_popup_menu_container->addChild(
			"popup_menu_appearance",
			$popup_menu_appearance
		);

		$popup_menu_opener = new StockholmQodeField(
			"select",
			"popup_menu_opener",
			"predefined",
			esc_html__( "Popup Menu Opener", 'stockholm' ),
			esc_html__( "Choose menu opener icon type", 'stockholm' ),
			array(
				"predefined" => esc_html__( "Predefined", 'stockholm' ),
				"svg-path" => esc_html__( "SVG Path", 'stockholm' )
			),
            array(
                "dependence" => true,
                "hide" => ['predefined' => '#qodef_popup_menu_svg_opener_container'],
                "show" => ['svg-path' => '#qodef_popup_menu_svg_opener_container']
            )
		);
		$enable_popup_menu_container->addChild(
			"popup_menu_opener",
            $popup_menu_opener
		);

        $popup_menu_svg_opener_container = new StockholmQodeContainer(
            "popup_menu_svg_opener_container",
            'popup_menu_opener',
            '',
            array('', 'predefined')
        );
        $enable_popup_menu_container->addChild(
            "popup_menu_svg_opener_container",
            $popup_menu_svg_opener_container
        );

        $popup_menu_icon_svg_opener = new StockholmQodeField("textarea", "popup_menu_icon_svg_opener", "", esc_html__('Fullscreen Menu Opener SVG Opener Path', 'stockholm'), esc_html__('Enter your Fullscreen Menu Opener icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'stockholm'), "", array("col_width" => 3));
        $popup_menu_icon_svg_closer = new StockholmQodeField("textarea", "popup_menu_icon_svg_closer", "", esc_html__('Fullscreen Menu Closer SVG Opener Path', 'stockholm'), esc_html__('Enter your Fullscreen Menu Closer icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'stockholm'), "", array("col_width" => 3));

        $popup_menu_svg_opener_container->addChild(
            'popup_menu_icon_svg_opener',
            $popup_menu_icon_svg_opener
        );

        $popup_menu_svg_opener_container->addChild(
            'popup_menu_icon_svg_closer',
            $popup_menu_icon_svg_closer
        );

		$enable_fullscreen_menu_hover_animation = new StockholmQodeField(
			"yesno",
			"enable_fullscreen_menu_hover_animation",
			"no",
			esc_html__( "Enable Fullscreen Menu Hover Animation", 'stockholm' ),
			esc_html__( "This option will enable hover animation for fullscreen menu", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_fullscreen_menu_hover_animation_container"
			)
		);
		$enable_popup_menu_container->addChild(
			"enable_fullscreen_menu_hover_animation",
			$enable_fullscreen_menu_hover_animation
		);
		
		$enable_fullscreen_menu_hover_animation_container = new StockholmQodeContainer(
			"enable_fullscreen_menu_hover_animation_container",
			"enable_fullscreen_menu_hover_animation",
			"no"
		);
		$enable_popup_menu_container->addChild(
			"enable_fullscreen_menu_hover_animation_container",
			$enable_fullscreen_menu_hover_animation_container
		);
		
		$fullscreen_menu_hover_type = new StockholmQodeField(
			"select",
			"fullscreen_menu_hover_type",
			"",
			esc_html__( "Menu Hover Animation Type", 'stockholm' ),
			esc_html__( "Choose a hover animation type for fullscreen menu", 'stockholm' ),
			array(
				"underline"    => esc_html__( "Underline", 'stockholm' ),
				"line-through" => esc_html__( "Line Through", 'stockholm' )
			)
		);
		$enable_fullscreen_menu_hover_animation_container->addChild(
			"fullscreen_menu_hover_type",
			$fullscreen_menu_hover_type
		);
		
		$fullscreen_menu_hover_animation_color = new StockholmQodeField(
			"color",
			"fullscreen_menu_hover_animation_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			esc_html__( "Chose a color", 'stockholm' )
		);
		$enable_fullscreen_menu_hover_animation_container->addChild(
			"fullscreen_menu_hover_animation_color",
			$fullscreen_menu_hover_animation_color
		);
		
		$group1 = new StockholmQodeGroup(
			"1st Level Style",
			esc_html__( "Define styles for 1st level in Fullscreen Menu", 'stockholm' )
		);
		$enable_popup_menu_container->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$popup_menu_color = new StockholmQodeField(
			"colorsimple",
			"popup_menu_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"popup_menu_color",
			$popup_menu_color
		);
		$popup_menu_hover_color = new StockholmQodeField(
			"colorsimple",
			"popup_menu_hover_color",
			"",
			esc_html__( "Text Hover Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"popup_menu_hover_color",
			$popup_menu_hover_color
		);
		$popup_menu_hover_background_color = new StockholmQodeField(
			"colorsimple",
			"popup_menu_hover_background_color",
			"",
			esc_html__( "Background Hover Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"popup_menu_hover_background_color",
			$popup_menu_hover_background_color
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		
		$popup_menu_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"popup_menu_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"popup_menu_google_fonts",
			$popup_menu_google_fonts
		);
		$popup_menu_fontsize = new StockholmQodeField(
			"textsimple",
			"popup_menu_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"popup_menu_fontsize",
			$popup_menu_fontsize
		);
		$popup_menu_lineheight = new StockholmQodeField(
			"textsimple",
			"popup_menu_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"popup_menu_lineheight",
			$popup_menu_lineheight
		);
		
		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);
		
		$popup_menu_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"popup_menu_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"popup_menu_fontstyle",
			$popup_menu_fontstyle
		);
		$popup_menu_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"popup_menu_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"popup_menu_fontweight",
			$popup_menu_fontweight
		);
		$popup_menu_letterspacing = new StockholmQodeField(
			"textsimple",
			"popup_menu_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"popup_menu_letterspacing",
			$popup_menu_letterspacing
		);
		$popup_menu_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"popup_menu_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"popup_menu_texttransform",
			$popup_menu_texttransform
		);
		
		$group2 = new StockholmQodeGroup(
			"2nd Level Style",
			esc_html__( "Define styles for 2nd level in Fullscreen Menu", 'stockholm' )
		);
		$enable_popup_menu_container->addChild(
			"group2",
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		
		$popup_menu_color_2nd = new StockholmQodeField(
			"colorsimple",
			"popup_menu_color_2nd",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"popup_menu_color_2nd",
			$popup_menu_color_2nd
		);
		$popup_menu_hover_color_2nd = new StockholmQodeField(
			"colorsimple",
			"popup_menu_hover_color_2nd",
			"",
			esc_html__( "Text Hover Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"popup_menu_hover_color_2nd",
			$popup_menu_hover_color_2nd
		);
		$popup_menu_hover_background_color_2nd = new StockholmQodeField(
			"colorsimple",
			"popup_menu_hover_background_color_2nd",
			"",
			esc_html__( "Background Hover Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"popup_menu_hover_background_color_2nd",
			$popup_menu_hover_background_color_2nd
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		
		$popup_menu_google_fonts_2nd = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"popup_menu_google_fonts_2nd",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"popup_menu_google_fonts_2nd",
			$popup_menu_google_fonts_2nd
		);
		$popup_menu_fontsize_2nd = new StockholmQodeField(
			"textsimple",
			"popup_menu_fontsize_2nd",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"popup_menu_fontsize_2nd",
			$popup_menu_fontsize_2nd
		);
		$popup_menu_lineheight_2nd = new StockholmQodeField(
			"textsimple",
			"popup_menu_lineheight_2nd",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"popup_menu_lineheight_2nd",
			$popup_menu_lineheight_2nd
		);
		
		$row3 = new StockholmQodeRow( true );
		$group2->addChild(
			"row3",
			$row3
		);
		
		$popup_menu_fontstyle_2nd = new StockholmQodeField(
			"selectblanksimple",
			"popup_menu_fontstyle_2nd",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"popup_menu_fontstyle_2nd",
			$popup_menu_fontstyle_2nd
		);
		$popup_menu_fontweight_2nd = new StockholmQodeField(
			"selectblanksimple",
			"popup_menu_fontweight_2nd",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"popup_menu_fontweight_2nd",
			$popup_menu_fontweight_2nd
		);
		$popup_menu_letterspacing_2nd = new StockholmQodeField(
			"textsimple",
			"popup_menu_letterspacing_2nd",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"popup_menu_letterspacing_2nd",
			$popup_menu_letterspacing_2nd
		);
		$popup_menu_texttransform_2nd = new StockholmQodeField(
			"selectblanksimple",
			"popup_menu_texttransform_2nd",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"popup_menu_texttransform_2nd",
			$popup_menu_texttransform_2nd
		);
		
		$group3 = new StockholmQodeGroup(
			"3rd Level Style",
			esc_html__( "Define styles for 3rd level in Fullscreen Menu", 'stockholm' )
		);
		$enable_popup_menu_container->addChild(
			"group3",
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		
		$popup_menu_3rd_color = new StockholmQodeField(
			"colorsimple",
			"popup_menu_3rd_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"popup_menu_3rd_color",
			$popup_menu_3rd_color
		);
		$popup_menu_3rd_hover_color = new StockholmQodeField(
			"colorsimple",
			"popup_menu_3rd_hover_color",
			"",
			esc_html__( "Text Hover Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"popup_menu_3rd_hover_color",
			$popup_menu_3rd_hover_color
		);
		$popup_menu_3rd_hover_background_color = new StockholmQodeField(
			"colorsimple",
			"popup_menu_3rd_hover_background_color",
			"",
			esc_html__( "Background Hover Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"popup_menu_3rd_hover_background_color",
			$popup_menu_3rd_hover_background_color
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		
		$popup_menu_3rd_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"popup_menu_3rd_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"popup_menu_3rd_google_fonts",
			$popup_menu_3rd_google_fonts
		);
		$popup_menu_3rd_fontsize = new StockholmQodeField(
			"textsimple",
			"popup_menu_3rd_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"popup_menu_3rd_fontsize",
			$popup_menu_3rd_fontsize
		);
		$popup_menu_3rd_lineheight = new StockholmQodeField(
			"textsimple",
			"popup_menu_3rd_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"popup_menu_3rd_lineheight",
			$popup_menu_3rd_lineheight
		);
		
		$row3 = new StockholmQodeRow( true );
		$group3->addChild(
			"row3",
			$row3
		);
		
		$popup_menu_3rd_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"popup_menu_3rd_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"popup_menu_3rd_fontstyle",
			$popup_menu_3rd_fontstyle
		);
		$popup_menu_3rd_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"popup_menu_3rd_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"popup_menu_3rd_fontweight",
			$popup_menu_3rd_fontweight
		);
		$popup_menu_3rd_letterspacing = new StockholmQodeField(
			"textsimple",
			"popup_menu_3rd_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"popup_menu_3rd_letterspacing",
			$popup_menu_3rd_letterspacing
		);
		$popup_menu_3rd_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"popup_menu_3rd_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"popup_menu_3rd_texttransform",
			$popup_menu_3rd_texttransform
		);
		
		$group4 = new StockholmQodeGroup(
			esc_html__( "Background", 'stockholm' ),
			esc_html__( "Select a background color for Fullscreen Menu", 'stockholm' )
		);
		$enable_popup_menu_container->addChild(
			"group4",
			$group4
		);
		
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);
		
		$popup_menu_background_color = new StockholmQodeField(
			"colorsimple",
			"popup_menu_background_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"popup_menu_background_color",
			$popup_menu_background_color
		);
		$pattern_image_popup = new StockholmQodeField(
			"image",
			"pattern_image_popup",
			"",
			esc_html__( "Pattern Background Image", 'stockholm' ),
			esc_html__( "Choose a pattern image for Fullscreen Menu background", 'stockholm' )
		);
		$row1->addChild(
			"pattern_image_popup",
			$pattern_image_popup
		);
		
		// Header Top
		
		$panel2 = new StockholmQodePanel(
			esc_html__( "Header Top", 'stockholm' ),
			"header_top_panel",
			"vertical_area",
			"yes"
		);
		$headerandfooterPage->addChild(
			"panel2",
			$panel2
		);
		
		$header_top_area = new StockholmQodeField(
			"yesno",
			"header_top_area",
			"no",
			esc_html__( "Show Header Top Area", 'stockholm' ),
			"Enabling this option will show Header Top area (this setting applies to Header Left and Header Right widgets)
    ",
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_header_top_area_container"
			)
		);
		$panel2->addChild(
			"header_top_area",
			$header_top_area
		);
		
		$header_top_area_container = new StockholmQodeContainer(
			"header_top_area_container",
			"header_top_area",
			"no"
		);
		$panel2->addChild(
			"header_top_area_container",
			$header_top_area_container
		);
		
		$header_top_area_hide_on_mobile = new StockholmQodeField(
			"yesno",
			"header_top_area_hide_on_mobile",
			"no",
			esc_html__( "Hide on Mobile Devices", 'stockholm' ),
			esc_html__( "Enabling this option will hide Header Top on mobile devices", 'stockholm' )
		);
		$header_top_area_container->addChild(
			"header_top_area_hide_on_mobile",
			$header_top_area_hide_on_mobile
		);
		
		$header_top_area_scroll = new StockholmQodeField(
			"yesno",
			"header_top_area_scroll",
			"no",
			esc_html__( "Hide on Scroll", 'stockholm' ),
			esc_html__( "Enabling this option will hide Header Top on scroll (if Fixed, Sticky or Sticky Expanded menu is chosen)", 'stockholm' )
		);
		$header_top_area_container->addChild(
			"header_top_area_scroll",
			$header_top_area_scroll
		);
		
		$header_top_background_color = new StockholmQodeField(
			"color",
			"header_top_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			esc_html__( "Choose a background color for Header Top area", 'stockholm' )
		);
		$header_top_area_container->addChild(
			"header_top_background_color",
			$header_top_background_color
		);
		
		$top_header_border_color = new StockholmQodeField(
			"color",
			"top_header_border_color",
			"",
			esc_html__( "Border Bottom Color", 'stockholm' ),
			esc_html__( "Choose a color for the bottom border", 'stockholm' )
		);
		$header_top_area_container->addChild(
			"top_header_border_color",
			$top_header_border_color
		);
		
		$top_header_border_weight = new StockholmQodeField(
			"text",
			"top_header_border_weight",
			"",
			esc_html__( "Border Width (px)", 'stockholm' ),
			esc_html__( "Enter a width for the bottom border", 'stockholm' )
		);
		$header_top_area_container->addChild(
			"top_header_border_weight",
			$top_header_border_weight
		);
		
		// Left Menu Area
		
		$panel7 = new StockholmQodePanel(
			esc_html__( "Left Menu Area", 'stockholm' ),
			"vertical_areas_panel",
			"vertical_area",
			"no"
		);
		$headerandfooterPage->addChild(
			"panel7",
			$panel7
		);

        $vertical_area_type = new StockholmQodeField(
            "select",
            "vertical_area_type",
            "",
            esc_html__('Left Menu Area Type', 'stockholm'),
            esc_html__('Specify menu type', 'stockholm'),
            array(
                ""			=> esc_html__('Always Opened (Default)', 'stockholm'),
                "hidden"	=> esc_html__('Initially Hidden', 'stockholm')
            ),
            array("dependence" => true,
                "hide" => array(
                    "" => "#qodef_vertical_area_hidden_button_color_container, #qodef_vertical_area_width_container",
                    "hidden" => "#qodef_vertical_area_transparency_container"),
                "show" => array(
                    "" => "#qodef_vertical_area_transparency_container",
                    "hidden" => "#qodef_vertical_area_hidden_button_color_container, #qodef_vertical_area_width_container"
                )
            ));
        $panel7->addChild("vertical_area_type", $vertical_area_type);

        $vertical_area_hidden_button_color_container = new StockholmQodeContainer("vertical_area_hidden_button_color_container", "vertical_area_type", "");
        $panel7->addChild("vertical_area_hidden_button_color_container", $vertical_area_hidden_button_color_container);

        $vertical_area_hidden_button_color = new StockholmQodeField("color", "vertical_area_hidden_button_color", "", esc_html__('Button Color', 'stockholm'), esc_html__('Choose a color for button that opens/closes Hidden Left Menu Area', 'stockholm'));
        $vertical_area_hidden_button_color_container->addChild("vertical_area_hidden_button_color", $vertical_area_hidden_button_color);

        $vertical_area_transparency_container = new StockholmQodeContainer("vertical_area_transparency_container", "vertical_area_type", "hidden");
        $panel7->addChild("vertical_area_transparency_container", $vertical_area_transparency_container);
		
		$left_menu_area_width = new StockholmQodeField(
			"text",
			"left_menu_area_width",
			"",
			esc_html__( "Left menu area width", 'stockholm' ),
            esc_html__("Set width of the left menu area in px. Default value is 260px", 'stockholm' ),
            array(),
            array( "col_width" => 3 )
		);
        $vertical_area_transparency_container->addChild(
			"left_menu_area_width",
            $left_menu_area_width
		);

        $vertical_area_transparency = new StockholmQodeField(
			"yesno",
			"vertical_area_transparency",
			"no",
			esc_html__( "Enable transparent left menu area", 'stockholm' ),
			"Enabling this option will make Left Menu background transparent
    "
		);
        $vertical_area_transparency_container->addChild(
			"vertical_area_transparency",
			$vertical_area_transparency
		);
		
		$vertical_area_background = new StockholmQodeField(
			"color",
			"vertical_area_background",
			"",
			esc_html__( "Left Menu Area Background Color", 'stockholm' ),
			esc_html__( "Choose a color for Left Menu background", 'stockholm' )
		);
		$panel7->addChild(
			"vertical_area_background",
			$vertical_area_background
		);
		
		$vertical_area_background_image = new StockholmQodeField(
			"image",
			"vertical_area_background_image",
			"",
			esc_html__( "Left Menu Area Background Image", 'stockholm' ),
			esc_html__( "Choose an image for Left Menu background", 'stockholm' )
		);
		$panel7->addChild(
			"vertical_area_background_image",
			$vertical_area_background_image
		);
		
		$vertical_area_dropdown_event = new StockholmQodeField(
			"select",
			"vertical_area_dropdown_event",
			"hover_event",
			esc_html__( "Sub-menu Display Behavior", 'stockholm' ),
			esc_html__( "Choose the way sub-menu items show", 'stockholm' ),
			array(
				"hover_event" => esc_html__( "Hover Event", 'stockholm' ),
				"click_event" => esc_html__( "Click Event", 'stockholm' )
			)
		);
		$panel7->addChild(
			"vertical_area_dropdown_event",
			$vertical_area_dropdown_event
		);
		
		$enable_vertical_menu_hover_animation = new StockholmQodeField(
			"yesno",
			"enable_vertical_menu_hover_animation",
			"no",
			esc_html__( "Enable 1st Level Menu Hover Animation", 'stockholm' ),
			esc_html__( "This option will enable hover animation for first level in vertical menu", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_vertical_menu_hover_animation_container"
			)
		);
		$panel7->addChild(
			"enable_vertical_menu_hover_animation",
			$enable_vertical_menu_hover_animation
		);
		
		$enable_vertical_menu_hover_animation_container = new StockholmQodeContainer(
			"enable_vertical_menu_hover_animation_container",
			"enable_vertical_menu_hover_animation",
			"no"
		);
		$panel7->addChild(
			"enable_vertical_menu_hover_animation_container",
			$enable_vertical_menu_hover_animation_container
		);
		
		$vertical_menu_hover_type = new StockholmQodeField(
			"select",
			"vertical_menu_hover_type",
			"",
			esc_html__( "Menu Hover Animation Type", 'stockholm' ),
			esc_html__( "Choose a hover animation type for firsl level in vertical menu", 'stockholm' ),
			array(
				"underline"    => esc_html__( "Underline", 'stockholm' ),
				"line-through" => esc_html__( "Line Through", 'stockholm' )
			)
		);
		$enable_vertical_menu_hover_animation_container->addChild(
			"vertical_menu_hover_type",
			$vertical_menu_hover_type
		);
		
		$vertical_menu_hover_animation_color = new StockholmQodeField(
			"color",
			"vertical_menu_hover_animation_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			esc_html__( "Chose a color", 'stockholm' )
		);
		$enable_vertical_menu_hover_animation_container->addChild(
			"vertical_menu_hover_animation_color",
			$vertical_menu_hover_animation_color
		);
		
		$vertical_area_padding = new StockholmQodeField(
			"text",
			"vertical_area_padding",
			"",
			esc_html__( "Padding (top right bottom left)", 'stockholm' ),
			esc_html__( "Set padding for Left Area. Default value is 20px 40px 20px 40px.", 'stockholm' )
		);
		$panel7->addChild(
			"vertical_area_padding",
			$vertical_area_padding
		);
		
		$vertical_area_text_color = new StockholmQodeField(
			"color",
			"vertical_area_text_color",
			"",
			esc_html__( "Left Menu Area Text Color (for Widgets)", 'stockholm' ),
			esc_html__( "Choose a text color for widgets in Left Menu", 'stockholm' )
		);
		$panel7->addChild(
			"vertical_area_text_color",
			$vertical_area_text_color
		);

		$horizontal_area_alignment = new StockholmQodeField(
			"selectblank",
			"vertical_area_alignment",
			"",
			esc_html__( "Left Menu Area Horizontal Aligment", 'stockholm' ),
			esc_html__( "Specify horizontal alignment for logo, menu and widgets.", 'stockholm' ),
			array(
				"left"   => esc_html__( "Left", 'stockholm' ),
				"center" => esc_html__( "Center", 'stockholm' ),
				"right"  => esc_html__( "Right", 'stockholm' )
			)
		);
		$panel7->addChild(
			"vertical_area_alignment",
			$horizontal_area_alignment
		);

		$vertical_area_vertical_alignment = new StockholmQodeField(
			"selectblank",
			"vertical_area_vertical_alignment",
			"",
			esc_html__( "Left Menu Area Vertical Aligment", 'stockholm' ),
			esc_html__( "Specify vertical alignment for logo, menu and widgets.", 'stockholm' ),
			array(
				"top"   => esc_html__( "Top", 'stockholm' ),
				"center" => esc_html__( "Center", 'stockholm' ),
				"space-between" => esc_html__( "Space Between", 'stockholm' ),
				"bottom"  => esc_html__( "Bottom", 'stockholm' )
			)
		);
		$panel7->addChild(
			"vertical_area_vertical_alignment",
			$vertical_area_vertical_alignment
		);
		
		$group1 = new StockholmQodeGroup(
			"1st Level Menu Style",
			esc_html__( "Define styles for 1st level in Left Menu", 'stockholm' )
		);
		$panel7->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$vertical_menu_color = new StockholmQodeField(
			"colorsimple",
			"vertical_menu_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"vertical_menu_color",
			$vertical_menu_color
		);
		$vertical_menu_hovercolor = new StockholmQodeField(
			"colorsimple",
			"vertical_menu_hovercolor",
			"",
			esc_html__( "Hover/Active color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"vertical_menu_hovercolor",
			$vertical_menu_hovercolor
		);
		
		$vertical_menu_hover_background_color = new StockholmQodeField(
			"colorsimple",
			"vertical_menu_hover_background_color",
			"",
			esc_html__( "Hover/Active background color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"vertical_menu_hover_background_color",
			$vertical_menu_hover_background_color
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		
		$vertical_menu_google_fonts = new StockholmQodeField(
			"fontsimple",
			"vertical_menu_google_fonts",
			"-1",
			esc_html__( "Font family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"vertical_menu_google_fonts",
			$vertical_menu_google_fonts
		);
		$vertical_menu_fontsize = new StockholmQodeField(
			"textsimple",
			"vertical_menu_fontsize",
			"",
			esc_html__( "Font size (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"vertical_menu_fontsize",
			$vertical_menu_fontsize
		);
		$vertical_menu_lineheight = new StockholmQodeField(
			"textsimple",
			"vertical_menu_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"vertical_menu_lineheight",
			$vertical_menu_lineheight
		);
		
		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);
		
		$vertical_menu_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"vertical_menu_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"vertical_menu_fontstyle",
			$vertical_menu_fontstyle
		);
		$vertical_menu_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"vertical_menu_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"vertical_menu_fontweight",
			$vertical_menu_fontweight
		);
		$vertical_menu_letterspacing = new StockholmQodeField(
			"textsimple",
			"vertical_menu_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"vertical_menu_letterspacing",
			$vertical_menu_letterspacing
		);
		$vertical_menu_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"vertical_menu_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"vertical_menu_texttransform",
			$vertical_menu_texttransform
		);
		
		$group2 = new StockholmQodeGroup(
			"2nd Level Menu Style",
			esc_html__( "Define styles for 2nd level in Left Menu", 'stockholm' )
		);
		$panel7->addChild(
			"group2",
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		
		$vertical_dropdown_color = new StockholmQodeField(
			"colorsimple",
			"vertical_dropdown_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"vertical_dropdown_color",
			$vertical_dropdown_color
		);
		$vertical_dropdown_hovercolor = new StockholmQodeField(
			"colorsimple",
			"vertical_dropdown_hovercolor",
			"",
			esc_html__( "Hover/Active Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"vertical_dropdown_hovercolor",
			$vertical_dropdown_hovercolor
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		
		$vertical_dropdown_google_fonts = new StockholmQodeField(
			"fontsimple",
			"vertical_dropdown_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"vertical_dropdown_google_fonts",
			$vertical_dropdown_google_fonts
		);
		$vertical_dropdown_fontsize = new StockholmQodeField(
			"textsimple",
			"vertical_dropdown_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"vertical_dropdown_fontsize",
			$vertical_dropdown_fontsize
		);
		$vertical_dropdown_lineheight = new StockholmQodeField(
			"textsimple",
			"vertical_dropdown_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"vertical_dropdown_lineheight",
			$vertical_dropdown_lineheight
		);
		
		$row3 = new StockholmQodeRow( true );
		$group2->addChild(
			"row3",
			$row3
		);
		
		$vertical_dropdown_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"vertical_dropdown_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"vertical_dropdown_fontstyle",
			$vertical_dropdown_fontstyle
		);
		$vertical_dropdown_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"vertical_dropdown_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"vertical_dropdown_fontweight",
			$vertical_dropdown_fontweight
		);
		$vertical_dropdown_letterspacing = new StockholmQodeField(
			"textsimple",
			"vertical_dropdown_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"vertical_dropdown_letterspacing",
			$vertical_dropdown_letterspacing
		);
		$vertical_dropdown_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"vertical_dropdown_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"vertical_dropdown_texttransform",
			$vertical_dropdown_texttransform
		);
		
		$group3 = new StockholmQodeGroup(
			"3rd Level Menu Style",
			esc_html__( "Define styles for 3rd level in Left Menu", 'stockholm' )
		);
		$panel7->addChild(
			"group3",
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		
		$vertical_dropdown_color_thirdlvl = new StockholmQodeField(
			"colorsimple",
			"vertical_dropdown_color_thirdlvl",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"vertical_dropdown_color_thirdlvl",
			$vertical_dropdown_color_thirdlvl
		);
		$vertical_dropdown_hovercolor_thirdlvl = new StockholmQodeField(
			"colorsimple",
			"vertical_dropdown_hovercolor_thirdlvl",
			"",
			esc_html__( "Hover/Active Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"vertical_dropdown_hovercolor_thirdlvl",
			$vertical_dropdown_hovercolor_thirdlvl
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		
		$vertical_dropdown_google_fonts_thirdlvl = new StockholmQodeField(
			"fontsimple",
			"vertical_dropdown_google_fonts_thirdlvl",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"vertical_dropdown_google_fonts_thirdlvl",
			$vertical_dropdown_google_fonts_thirdlvl
		);
		$vertical_dropdown_fontsize_thirdlvl = new StockholmQodeField(
			"textsimple",
			"vertical_dropdown_fontsize_thirdlvl",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"vertical_dropdown_fontsize_thirdlvl",
			$vertical_dropdown_fontsize_thirdlvl
		);
		$vertical_dropdown_lineheight_thirdlvl = new StockholmQodeField(
			"textsimple",
			"vertical_dropdown_lineheight_thirdlvl",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"vertical_dropdown_lineheight_thirdlvl",
			$vertical_dropdown_lineheight_thirdlvl
		);
		
		$row3 = new StockholmQodeRow( true );
		$group3->addChild(
			"row3",
			$row3
		);
		
		$vertical_dropdown_fontstyle_thirdlvl = new StockholmQodeField(
			"selectblanksimple",
			"vertical_dropdown_fontstyle_thirdlvl",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"vertical_dropdown_fontstyle_thirdlvl",
			$vertical_dropdown_fontstyle_thirdlvl
		);
		$vertical_dropdown_fontweight_thirdlvl = new StockholmQodeField(
			"selectblanksimple",
			"vertical_dropdown_fontweight_thirdlvl",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"vertical_dropdown_fontweight_thirdlvl",
			$vertical_dropdown_fontweight_thirdlvl
		);
		$vertical_dropdown_letterspacing_thirdlvl = new StockholmQodeField(
			"textsimple",
			"vertical_dropdown_letterspacing_thirdlvl",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"vertical_dropdown_letterspacing_thirdlvl",
			$vertical_dropdown_letterspacing_thirdlvl
		);
		$vertical_dropdown_texttransform_thirdlvl = new StockholmQodeField(
			"selectblanksimple",
			"vertical_dropdown_texttransform_thirdlvl",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"vertical_dropdown_texttransform_thirdlvl",
			$vertical_dropdown_texttransform_thirdlvl
		);
		
		$vertical_mobile_background_color = new StockholmQodeField(
			"color",
			"vertical_mobile_background_color",
			"",
			esc_html__( "Mobile Background Color", 'stockholm' ),
			esc_html__( "Define background color for mobile header", 'stockholm' )
		);
		$panel7->addChild(
			"vertical_mobile_background_color",
			$vertical_mobile_background_color
		);
		
		// Header Button Icons
		
		$panel9 = new StockholmQodePanel(
			esc_html__( "Header Button Icons", 'stockholm' ),
			"header_buttons_panel"
		);
		$headerandfooterPage->addChild(
			"panel9",
			$panel9
		);
		
		$header_buttons_color = new StockholmQodeField(
			"color",
			"header_buttons_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			esc_html__( "Choose a color for Header icons", 'stockholm' )
		);
		$panel9->addChild(
			"header_buttons_color",
			$header_buttons_color
		);
		
		$header_buttons_hover_color = new StockholmQodeField(
			"color",
			"header_buttons_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' ),
			esc_html__( "Choose a hover color for Header icons", 'stockholm' )
		);
		$panel9->addChild(
			"header_buttons_hover_color",
			$header_buttons_hover_color
		);
		
		$header_buttons_font_size = new StockholmQodeField(
			"text",
			"header_buttons_font_size",
			"",
			esc_html__( "Icon Size (px)", 'stockholm' ),
			esc_html__( "Choose a size for Header icons", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel9->addChild(
			"header_buttons_font_size",
			$header_buttons_font_size
		);
		
		$header_buttons_size = new StockholmQodeField(
			"select",
			"header_buttons_size",
			"normal",
			esc_html__( "Side Menu / Fullscreen Menu Icon Size", 'stockholm' ),
			esc_html__( "Choose a size for Side Menu / Fullscreen Menu icons", 'stockholm' ),
			array(
				"normal" => esc_html__( "Normal", 'stockholm' ),
				"medium" => esc_html__( "Medium", 'stockholm' ),
				"large"  => esc_html__( "Large", 'stockholm' )
			)
		);
		$panel9->addChild(
			"header_buttons_size",
			$header_buttons_size
		);
		
		if ( stockholm_qode_is_wpml_installed() ) {
			$wpml_panel = new StockholmQodePanel(
				esc_html__( 'Language Switcher', 'stockholm' ),
				'language_switcher',
				'vertical_area',
				'yes'
			);
			
			$headerandfooterPage->addChild(
				'language_switcher',
				$wpml_panel
			);
			
			$lang_items_padding = new StockholmQodeField(
				'text',
				'header_bottom_lang_items_padding',
				'',
				esc_html__( 'Left / Right Spacing Between Languages in List (px)', 'stockholm' ),
				esc_html__( 'Set spacing between languages when horizontal language switcher is added to main menu', 'stockholm' ),
				array(),
				array( "col_width" => 3 )
			);
			$wpml_panel->addChild(
				'header_bottom_lang_items_padding',
				$lang_items_padding
			);
		}
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_haeder_options_map', 30 );
}