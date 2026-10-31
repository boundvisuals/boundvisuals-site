<?php

if ( ! function_exists( 'stockholm_qode_woocommerce_options_map' ) ) {
	function stockholm_qode_woocommerce_options_map() {
		
		$woocommercePage = new StockholmQodeAdminPage(
			"16",
			esc_html__( "WooCommerce", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"woocommerce",
			$woocommercePage
		);
		
		// General
		$panel3 = new StockholmQodePanel(
			esc_html__( "General", 'stockholm' ),
			"general_panel"
		);
		$woocommercePage->addChild(
			"panel3",
			$panel3
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Input Fields Style", 'stockholm' ),
			esc_html__( "Define styles for Input Fields", 'stockholm' )
		);
		$panel3->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$woo_input_text_color = new StockholmQodeField(
			"colorsimple",
			"woo_input_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_input_text_color",
			$woo_input_text_color
		);
		
		$woo_input_focus_text_color = new StockholmQodeField(
			"colorsimple",
			"woo_input_focus_text_color",
			"",
			esc_html__( "Focus Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_input_focus_text_color",
			$woo_input_focus_text_color
		);
		
		$woo_input_background_color = new StockholmQodeField(
			"colorsimple",
			"woo_input_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_input_background_color",
			$woo_input_background_color
		);
		
		$woo_input_focus_background_color = new StockholmQodeField(
			"colorsimple",
			"woo_input_focus_background_color",
			"",
			esc_html__( "Focus Background Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_input_focus_background_color",
			$woo_input_focus_background_color
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		
		$woo_input_border_color = new StockholmQodeField(
			"colorsimple",
			"woo_input_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row2->addChild(
			"woo_input_border_color",
			$woo_input_border_color
		);
		
		$woo_input_focus_border_color = new StockholmQodeField(
			"colorsimple",
			"woo_input_focus_border_color",
			"",
			esc_html__( "Focus Border Color", 'stockholm' )
		);
		$row2->addChild(
			"woo_input_focus_border_color",
			$woo_input_focus_border_color
		);
		
		$woo_input_border_width = new StockholmQodeField(
			"textsimple",
			"woo_input_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_input_border_width",
			$woo_input_border_width
		);
		
		//Button
		
		$group8 = new StockholmQodeGroup(
			esc_html__( "Button Style", 'stockholm' ),
			esc_html__( "Define button styles for all shop pages", 'stockholm' )
		);
		$panel3->addChild(
			"group8",
			$group8
		);
		
		$row1 = new StockholmQodeRow();
		$group8->addChild(
			"row1",
			$row1
		);
		
		$woo_products_list_add_to_cart_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_list_add_to_cart_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_list_add_to_cart_color",
			$woo_products_list_add_to_cart_color
		);
		
		$woo_products_list_add_to_cart_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_list_add_to_cart_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_list_add_to_cart_font_size",
			$woo_products_list_add_to_cart_font_size
		);
		
		$woo_products_list_add_to_cart_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_list_add_to_cart_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_list_add_to_cart_line_height",
			$woo_products_list_add_to_cart_line_height
		);
		
		$woo_products_list_add_to_cart_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_list_add_to_cart_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_list_add_to_cart_text_transform",
			$woo_products_list_add_to_cart_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group8->addChild(
			"row2",
			$row2
		);
		
		$woo_products_list_add_to_cart_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_list_add_to_cart_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_list_add_to_cart_font_family",
			$woo_products_list_add_to_cart_font_family
		);
		
		$woo_products_list_add_to_cart_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_list_add_to_cart_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_list_add_to_cart_font_style",
			$woo_products_list_add_to_cart_font_style
		);
		
		$woo_products_list_add_to_cart_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_list_add_to_cart_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_list_add_to_cart_font_weight",
			$woo_products_list_add_to_cart_font_weight
		);
		
		$woo_products_list_add_to_cart_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_list_add_to_cart_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_list_add_to_cart_letter_spacing",
			$woo_products_list_add_to_cart_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group8->addChild(
			"row3",
			$row3
		);
		
		$woo_products_list_add_to_cart_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_list_add_to_cart_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_list_add_to_cart_hover_color",
			$woo_products_list_add_to_cart_hover_color
		);
		
		$woo_products_list_add_to_cart_background_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_list_add_to_cart_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_list_add_to_cart_background_color",
			$woo_products_list_add_to_cart_background_color
		);
		
		$woo_products_list_add_to_cart_background_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_list_add_to_cart_background_hover_color",
			"",
			esc_html__( "Hover Background Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_list_add_to_cart_background_hover_color",
			$woo_products_list_add_to_cart_background_hover_color
		);
		
		$row4 = new StockholmQodeRow( true );
		$group8->addChild(
			"row4",
			$row4
		);
		
		$woo_products_list_add_to_cart_border_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_list_add_to_cart_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_list_add_to_cart_border_color",
			$woo_products_list_add_to_cart_border_color
		);
		
		$woo_products_list_add_to_cart_border_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_list_add_to_cart_border_hover_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_list_add_to_cart_border_hover_color",
			$woo_products_list_add_to_cart_border_hover_color
		);
		
		$woo_products_list_add_to_cart_border_width = new StockholmQodeField(
			"textsimple",
			"woo_products_list_add_to_cart_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_list_add_to_cart_border_width",
			$woo_products_list_add_to_cart_border_width
		);
		
		$woo_products_list_add_to_cart_border_radius = new StockholmQodeField(
			"textsimple",
			"woo_products_list_add_to_cart_border_radius",
			"",
			esc_html__( "Border radius (px)", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_list_add_to_cart_border_radius",
			$woo_products_list_add_to_cart_border_radius
		);
		
		//Product list styles
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Product List", 'stockholm' ),
			"product_list_panel"
		);
		$woocommercePage->addChild(
			"panel1",
			$panel1
		);
		
		//Product per page
		
		$woo_products_per_page = new StockholmQodeField(
			"text",
			"woo_products_per_page",
			"",
			esc_html__( "Number Of Product Per Page", 'stockholm' ),
			esc_html__( "Set number of products on shop page.", 'stockholm' )
		);
		$panel1->addChild(
			"woo_products_per_page",
			$woo_products_per_page
		);
		
		//Product list type
		
		$woo_products_list_type = new StockholmQodeField(
			"select",
			"woo_products_list_type",
			"",
			esc_html__( "Product List Type", 'stockholm' ),
			esc_html__( "Set layout type for products on product list.", 'stockholm' ),
			array(
				"default"  => esc_html__( "Default", 'stockholm' ),
				"standard" => esc_html__( "Standard", 'stockholm' ),
				"simple"   => esc_html__( "Simple", 'stockholm' ),
				"elegant"  => esc_html__( "Elegant", 'stockholm' )
			)
		);
		$panel1->addChild(
			"woo_products_list_type",
			$woo_products_list_type
		);
		
		//Product box
		
		$wooDefaultGroupPanel = new StockholmQodePanel(
			esc_html__( 'Default List Options', 'stockholm' ),
			'woo_default_group_panel',
			'',
			''
		);
		$panel1->addChild(
			'woo_default_group_pannel',
			$wooDefaultGroupPanel
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Product Box Style", 'stockholm' ),
			esc_html__( "Define Product Box Style", 'stockholm' )
		);
		$wooDefaultGroupPanel->addChild(
			"group1",
			$group1
		);
		
		$woo_products_disable_box = new StockholmQodeField(
			"yesno",
			"woo_products_disable_box",
			"no",
			esc_html__( "Disable Text Box", 'stockholm' ),
			esc_html__( "Enabling this option will disable box around products text.", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_woo_products_disable_box_container",
				"dependence_show_on_yes" => ""
			)
		);
		$group1->addChild(
			"woo_products_disable_box",
			$woo_products_disable_box
		);
		
		$woo_products_disable_box_container = new StockholmQodeContainer(
			"woo_products_disable_box_container",
			"woo_products_disable_box",
			"yes"
		);
		$group1->addChild(
			"woo_products_disable_box_container",
			$woo_products_disable_box_container
		);
		
		$woo_products_box_background_color = new StockholmQodeField(
			"color",
			"woo_products_box_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			esc_html__( "Specify box background color.", 'stockholm' )
		);
		$woo_products_disable_box_container->addChild(
			"woo_products_box_background_color",
			$woo_products_box_background_color
		);
		
		$woo_products_box_text_align = new StockholmQodeField(
			"select",
			"woo_products_box_text_align",
			"left",
			esc_html__( "Products Text Align", 'stockholm' ),
			esc_html__( "Specify Products text alignment", 'stockholm' ),
			array(
				"left"   => esc_html__( "Left", 'stockholm' ),
				"center" => esc_html__( "Center", 'stockholm' ),
				"right"  => esc_html__( "Right", 'stockholm' )
			)
		);
		$wooDefaultGroupPanel->addChild(
			"woo_products_box_text_align",
			$woo_products_box_text_align
		);
		
		$woo_products_box_border_color = new StockholmQodeField(
			"color",
			"woo_products_box_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' ),
			esc_html__( "Specify box border color.", 'stockholm' )
		);
		$wooDefaultGroupPanel->addChild(
			"woo_products_box_border_color",
			$woo_products_box_border_color
		);
		
		//Product category
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Product Category Style", 'stockholm' ),
			esc_html__( "Define Product Category Style", 'stockholm' )
		);
		$wooDefaultGroupPanel->addChild(
			"group2",
			$group2
		);
		
		$woo_products_category_hide_category = new StockholmQodeField(
			"yesno",
			"woo_products_category_hide_category",
			"no",
			esc_html__( "Disable Product Category", 'stockholm' ),
			esc_html__( "Enabling this option will hide product category.", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_woo_products_hide_category_container",
				"dependence_show_on_yes" => ""
			)
		);
		$group2->addChild(
			"woo_products_category_hide_category",
			$woo_products_category_hide_category
		);
		
		$woo_products_hide_category_container = new StockholmQodeContainer(
			"woo_products_hide_category_container",
			"woo_products_category_hide_category",
			"yes"
		);
		$group2->addChild(
			"woo_products_hide_category_container",
			$woo_products_hide_category_container
		);
		
		$group5 = new StockholmQodeGroup(
			esc_html__( "Product Category Style", 'stockholm' ),
			esc_html__( "Define Product Category Style", 'stockholm' )
		);
		$woo_products_hide_category_container->addChild(
			"group5",
			$group5
		);
		
		$row1 = new StockholmQodeRow( true );
		$group5->addChild(
			"row1",
			$row1
		);
		
		$woo_products_category_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_category_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_category_color",
			$woo_products_category_color
		);
		
		$woo_products_category_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_category_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_category_font_size",
			$woo_products_category_font_size
		);
		
		$woo_products_category_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_category_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_category_line_height",
			$woo_products_category_line_height
		);
		
		$woo_products_category_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_category_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_category_text_transform",
			$woo_products_category_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group5->addChild(
			"row2",
			$row2
		);
		
		$woo_products_category_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_category_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_category_font_family",
			$woo_products_category_font_family
		);
		
		$woo_products_category_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_category_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_category_font_style",
			$woo_products_category_font_style
		);
		
		$woo_products_category_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_category_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_category_font_weight",
			$woo_products_category_font_weight
		);
		
		$woo_products_category_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_category_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_category_letter_spacing",
			$woo_products_category_letter_spacing
		);
		
		//Product title
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Product Title Style", 'stockholm' ),
			esc_html__( "Define Product Title Style", 'stockholm' )
		);
		$wooDefaultGroupPanel->addChild(
			"group3",
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		
		$woo_products_title_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_title_color",
			$woo_products_title_color
		);
		
		$woo_products_title_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_title_font_size",
			$woo_products_title_font_size
		);
		
		$woo_products_title_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_title_line_height",
			$woo_products_title_line_height
		);
		
		$woo_products_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_title_text_transform",
			$woo_products_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		
		$woo_products_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_title_font_family",
			$woo_products_title_font_family
		);
		
		$woo_products_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_title_font_style",
			$woo_products_title_font_style
		);
		
		$woo_products_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_title_font_weight",
			$woo_products_title_font_weight
		);
		
		$woo_products_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_title_letter_spacing",
			$woo_products_title_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group3->addChild(
			"row3",
			$row3
		);
		
		$woo_products_title_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_title_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_title_hover_color",
			$woo_products_title_hover_color
		);
		
		//Product price
		
		$group4 = new StockholmQodeGroup(
			esc_html__( "Product Price Style", 'stockholm' ),
			esc_html__( "Define Product Price Style", 'stockholm' )
		);
		$wooDefaultGroupPanel->addChild(
			"group4",
			$group4
		);
		
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);
		
		$woo_products_price_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_price_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_price_color",
			$woo_products_price_color
		);
		
		$woo_products_price_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_price_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_price_font_size",
			$woo_products_price_font_size
		);
		
		$woo_products_price_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_price_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_price_line_height",
			$woo_products_price_line_height
		);
		
		$woo_products_price_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_price_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_price_text_transform",
			$woo_products_price_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		
		$woo_products_price_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_price_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_price_font_family",
			$woo_products_price_font_family
		);
		
		$woo_products_price_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_price_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_price_font_style",
			$woo_products_price_font_style
		);
		
		$woo_products_price_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_price_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_price_font_weight",
			$woo_products_price_font_weight
		);
		
		$woo_products_price_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_price_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_price_letter_spacing",
			$woo_products_price_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group4->addChild(
			"row3",
			$row3
		);
		
		$woo_products_price_old_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_price_old_color",
			"",
			esc_html__( "Old Price Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_price_old_color",
			$woo_products_price_old_color
		);
		
		//Product list standard styles
		
		$wooStandardGroupPanel = new StockholmQodePanel(
			esc_html__( "Standard List Options", 'stockholm' ),
			"product_list_standard_panel"
		);
		$panel1->addChild(
			"product_list_standard_panel",
			$wooStandardGroupPanel
		);
		
		//Product category
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Product Category Style", 'stockholm' ),
			esc_html__( "Define Product Category Style", 'stockholm' )
		);
		$wooStandardGroupPanel->addChild(
			"group1",
			$group1
		);
		
		$woo_products_standard_category_hide_category = new StockholmQodeField(
			"yesno",
			"woo_products_standard_category_hide_category",
			"no",
			esc_html__( "Disable Product Category", 'stockholm' ),
			esc_html__( "Enabling this option will hide product category.", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_woo_products_standard_hide_category_container",
				"dependence_show_on_yes" => ""
			)
		);
		$group1->addChild(
			"woo_products_standard_category_hide_category",
			$woo_products_standard_category_hide_category
		);
		
		$woo_products_standard_hide_category_container = new StockholmQodeContainer(
			"woo_products_standard_hide_category_container",
			"woo_products_standard_category_hide_category",
			"yes"
		);
		$group1->addChild(
			"woo_products_standard_hide_category_container",
			$woo_products_standard_hide_category_container
		);
		
		$group10 = new StockholmQodeGroup(
			esc_html__( "Product Category Style", 'stockholm' ),
			esc_html__( "Define Product Category Style", 'stockholm' )
		);
		$woo_products_standard_hide_category_container->addChild(
			"group10",
			$group10
		);
		
		$row1 = new StockholmQodeRow( true );
		$group10->addChild(
			"row1",
			$row1
		);
		
		$woo_products_standard_category_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_standard_category_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_category_color",
			$woo_products_standard_category_color
		);
		
		$woo_products_standard_category_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_category_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_category_font_size",
			$woo_products_standard_category_font_size
		);
		
		$woo_products_standard_category_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_category_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_category_line_height",
			$woo_products_standard_category_line_height
		);
		
		$woo_products_standard_category_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_category_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_standard_category_text_transform",
			$woo_products_standard_category_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group10->addChild(
			"row2",
			$row2
		);
		
		$woo_products_standard_category_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_standard_category_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_standard_category_font_family",
			$woo_products_standard_category_font_family
		);
		
		$woo_products_standard_category_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_category_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_standard_category_font_style",
			$woo_products_standard_category_font_style
		);
		
		$woo_products_standard_category_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_category_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_standard_category_font_weight",
			$woo_products_standard_category_font_weight
		);
		
		$woo_products_standard_category_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_category_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_standard_category_letter_spacing",
			$woo_products_standard_category_letter_spacing
		);
		
		//Product title
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Product Title Style", 'stockholm' ),
			esc_html__( "Define Product Title Style", 'stockholm' )
		);
		$wooStandardGroupPanel->addChild(
			"group2",
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		
		$woo_products_standard_title_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_standard_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_title_color",
			$woo_products_standard_title_color
		);
		
		$woo_products_standard_title_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_title_font_size",
			$woo_products_standard_title_font_size
		);
		
		$woo_products_standard_title_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_title_line_height",
			$woo_products_standard_title_line_height
		);
		
		$woo_products_standard_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_standard_title_text_transform",
			$woo_products_standard_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		
		$woo_products_standard_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_standard_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_standard_title_font_family",
			$woo_products_standard_title_font_family
		);
		
		$woo_products_standard_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_standard_title_font_style",
			$woo_products_standard_title_font_style
		);
		
		$woo_products_standard_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_standard_title_font_weight",
			$woo_products_standard_title_font_weight
		);
		
		$woo_products_standard_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_standard_title_letter_spacing",
			$woo_products_standard_title_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group2->addChild(
			"row3",
			$row3
		);
		
		$woo_products_standard_title_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_standard_title_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_standard_title_hover_color",
			$woo_products_standard_title_hover_color
		);
		
		//Product price
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Product Price Style", 'stockholm' ),
			esc_html__( "Define Product Price Style", 'stockholm' )
		);
		$wooStandardGroupPanel->addChild(
			"group3",
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		
		$woo_products_standard_price_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_standard_price_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_price_color",
			$woo_products_standard_price_color
		);
		
		$woo_products_standard_price_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_price_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_price_font_size",
			$woo_products_standard_price_font_size
		);
		
		$woo_products_standard_price_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_price_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_price_line_height",
			$woo_products_standard_price_line_height
		);
		
		$woo_products_standard_price_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_price_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_standard_price_text_transform",
			$woo_products_standard_price_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		
		$woo_products_standard_price_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_standard_price_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_standard_price_font_family",
			$woo_products_standard_price_font_family
		);
		
		$woo_products_standard_price_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_price_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_standard_price_font_style",
			$woo_products_standard_price_font_style
		);
		
		$woo_products_standard_price_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_price_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_standard_price_font_weight",
			$woo_products_standard_price_font_weight
		);
		
		$woo_products_standard_price_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_price_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_standard_price_letter_spacing",
			$woo_products_standard_price_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group3->addChild(
			"row3",
			$row3
		);
		
		$woo_products_standard_price_old_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_standard_price_old_color",
			"",
			esc_html__( "Old Price Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_standard_price_old_color",
			$woo_products_standard_price_old_color
		);
		
		//Button
		
		$group4 = new StockholmQodeGroup(
			esc_html__( "Button Style", 'stockholm' ),
			esc_html__( "Define button styles for all shop pages", 'stockholm' )
		);
		$wooStandardGroupPanel->addChild(
			"group4",
			$group4
		);
		
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);
		
		$woo_products_standard_list_add_to_cart_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_standard_list_add_to_cart_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_list_add_to_cart_color",
			$woo_products_standard_list_add_to_cart_color
		);
		
		$woo_products_standard_list_add_to_cart_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_list_add_to_cart_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_list_add_to_cart_font_size",
			$woo_products_standard_list_add_to_cart_font_size
		);
		
		$woo_products_standard_list_add_to_cart_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_list_add_to_cart_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_standard_list_add_to_cart_line_height",
			$woo_products_standard_list_add_to_cart_line_height
		);
		
		$woo_products_standard_list_add_to_cart_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_list_add_to_cart_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_standard_list_add_to_cart_text_transform",
			$woo_products_standard_list_add_to_cart_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		
		$woo_products_standard_list_add_to_cart_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_standard_list_add_to_cart_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_standard_list_add_to_cart_font_family",
			$woo_products_standard_list_add_to_cart_font_family
		);
		
		$woo_products_standard_list_add_to_cart_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_list_add_to_cart_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_standard_list_add_to_cart_font_style",
			$woo_products_standard_list_add_to_cart_font_style
		);
		
		$woo_products_standard_list_add_to_cart_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_standard_list_add_to_cart_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_standard_list_add_to_cart_font_weight",
			$woo_products_standard_list_add_to_cart_font_weight
		);
		
		$woo_products_standard_list_add_to_cart_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_list_add_to_cart_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_standard_list_add_to_cart_letter_spacing",
			$woo_products_standard_list_add_to_cart_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group4->addChild(
			"row3",
			$row3
		);
		
		$woo_products_standard_list_add_to_cart_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_standard_list_add_to_cart_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_standard_list_add_to_cart_hover_color",
			$woo_products_standard_list_add_to_cart_hover_color
		);
		
		$woo_products_standard_list_add_to_cart_background_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_standard_list_add_to_cart_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_standard_list_add_to_cart_background_color",
			$woo_products_standard_list_add_to_cart_background_color
		);
		
		$woo_products_standard_list_add_to_cart_background_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_standard_list_add_to_cart_background_hover_color",
			"",
			esc_html__( "Hover Background Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_standard_list_add_to_cart_background_hover_color",
			$woo_products_standard_list_add_to_cart_background_hover_color
		);
		
		$row4 = new StockholmQodeRow( true );
		$group4->addChild(
			"row4",
			$row4
		);
		
		$woo_products_standard_list_add_to_cart_border_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_standard_list_add_to_cart_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_standard_list_add_to_cart_border_color",
			$woo_products_standard_list_add_to_cart_border_color
		);
		
		$woo_products_standard_list_add_to_cart_border_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_standard_list_add_to_cart_border_hover_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_standard_list_add_to_cart_border_hover_color",
			$woo_products_standard_list_add_to_cart_border_hover_color
		);
		
		$woo_products_standard_list_add_to_cart_border_width = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_list_add_to_cart_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_standard_list_add_to_cart_border_width",
			$woo_products_standard_list_add_to_cart_border_width
		);
		
		$woo_products_standard_list_add_to_cart_border_radius = new StockholmQodeField(
			"textsimple",
			"woo_products_standard_list_add_to_cart_border_radius",
			"",
			esc_html__( "Border radius (px)", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_standard_list_add_to_cart_border_radius",
			$woo_products_standard_list_add_to_cart_border_radius
		);
		
		//Product list standard styles
		
		$wooSimpleGroupPanel = new StockholmQodePanel(
			esc_html__( "Simple List Options", 'stockholm' ),
			"product_list_simple_panel"
		);
		$panel1->addChild(
			"product_list_simple_panel",
			$wooSimpleGroupPanel
		);
		
		//Product title
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Product Title Style", 'stockholm' ),
			esc_html__( "Define Product Title Style", 'stockholm' )
		);
		$wooSimpleGroupPanel->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$woo_products_simple_title_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_simple_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_simple_title_color",
			$woo_products_simple_title_color
		);
		
		$woo_products_simple_title_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_simple_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_simple_title_font_size",
			$woo_products_simple_title_font_size
		);
		
		$woo_products_simple_title_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_simple_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_simple_title_line_height",
			$woo_products_simple_title_line_height
		);
		
		$woo_products_simple_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_simple_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_simple_title_text_transform",
			$woo_products_simple_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		
		$woo_products_simple_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_simple_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_simple_title_font_family",
			$woo_products_simple_title_font_family
		);
		
		$woo_products_simple_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_simple_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_simple_title_font_style",
			$woo_products_simple_title_font_style
		);
		
		$woo_products_simple_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_simple_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_simple_title_font_weight",
			$woo_products_simple_title_font_weight
		);
		
		$woo_products_simple_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_simple_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_simple_title_letter_spacing",
			$woo_products_simple_title_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);
		
		$woo_products_simple_title_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_simple_title_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_simple_title_hover_color",
			$woo_products_simple_title_hover_color
		);
		
		//Product price
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Product Price Style", 'stockholm' ),
			esc_html__( "Define Product Price Style", 'stockholm' )
		);
		$wooSimpleGroupPanel->addChild(
			"group2",
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		
		$woo_products_simple_price_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_simple_price_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_simple_price_color",
			$woo_products_simple_price_color
		);
		
		$woo_products_simple_price_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_simple_price_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_simple_price_font_size",
			$woo_products_simple_price_font_size
		);
		
		$woo_products_simple_price_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_simple_price_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_simple_price_line_height",
			$woo_products_simple_price_line_height
		);
		
		$woo_products_simple_price_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_simple_price_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_simple_price_text_transform",
			$woo_products_simple_price_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		
		$woo_products_simple_price_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_simple_price_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_simple_price_font_family",
			$woo_products_simple_price_font_family
		);
		
		$woo_products_simple_price_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_simple_price_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_simple_price_font_style",
			$woo_products_simple_price_font_style
		);
		
		$woo_products_simple_price_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_simple_price_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_simple_price_font_weight",
			$woo_products_simple_price_font_weight
		);
		
		$woo_products_simple_price_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_simple_price_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_simple_price_letter_spacing",
			$woo_products_simple_price_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group2->addChild(
			"row3",
			$row3
		);
		
		$woo_products_simple_price_old_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_simple_price_old_color",
			"",
			esc_html__( "Old Price Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_simple_price_old_color",
			$woo_products_simple_price_old_color
		);
		
		//Product sale
		
		$group5 = new StockholmQodeGroup(
			esc_html__( "Product Sale Style", 'stockholm' ),
			esc_html__( "Define Product Sale Style", 'stockholm' )
		);
		$panel1->addChild(
			"group5",
			$group5
		);
		
		$row1 = new StockholmQodeRow();
		$group5->addChild(
			"row1",
			$row1
		);
		
		$woo_products_sale_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_sale_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sale_color",
			$woo_products_sale_color
		);
		
		$woo_products_sale_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_sale_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sale_font_size",
			$woo_products_sale_font_size
		);
		
		$woo_products_sale_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_sale_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sale_line_height",
			$woo_products_sale_line_height
		);
		
		$woo_products_sale_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_sale_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_sale_text_transform",
			$woo_products_sale_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group5->addChild(
			"row2",
			$row2
		);
		
		$woo_products_sale_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_sale_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_sale_font_family",
			$woo_products_sale_font_family
		);
		
		$woo_products_sale_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_sale_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_sale_font_style",
			$woo_products_sale_font_style
		);
		
		$woo_products_sale_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_sale_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_sale_font_weight",
			$woo_products_sale_font_weight
		);
		
		$woo_products_sale_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_sale_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_sale_letter_spacing",
			$woo_products_sale_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group5->addChild(
			"row3",
			$row3
		);
		
		$woo_products_sale_background_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_sale_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_sale_background_color",
			$woo_products_sale_background_color
		);
		
		//Product out of stock
		
		$group6 = new StockholmQodeGroup(
			esc_html__( "Product Out Of Stock Style", 'stockholm' ),
			esc_html__( "Define Out Of Stock Product Style", 'stockholm' )
		);
		$panel1->addChild(
			"group6",
			$group6
		);
		
		$row1 = new StockholmQodeRow();
		$group6->addChild(
			"row1",
			$row1
		);
		
		$woo_products_out_of_stock_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_out_of_stock_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_out_of_stock_color",
			$woo_products_out_of_stock_color
		);
		
		$woo_products_out_of_stock_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_out_of_stock_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_out_of_stock_font_size",
			$woo_products_out_of_stock_font_size
		);
		
		$woo_products_out_of_stock_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_out_of_stock_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_out_of_stock_line_height",
			$woo_products_out_of_stock_line_height
		);
		
		$woo_products_out_of_stock_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_out_of_stock_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_out_of_stock_text_transform",
			$woo_products_out_of_stock_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group6->addChild(
			"row2",
			$row2
		);
		
		$woo_products_out_of_stock_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_out_of_stock_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_out_of_stock_font_family",
			$woo_products_out_of_stock_font_family
		);
		
		$woo_products_out_of_stock_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_out_of_stock_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_out_of_stock_font_style",
			$woo_products_out_of_stock_font_style
		);
		
		$woo_products_out_of_stock_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_out_of_stock_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_out_of_stock_font_weight",
			$woo_products_out_of_stock_font_weight
		);
		
		$woo_products_out_of_stock_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_out_of_stock_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_out_of_stock_letter_spacing",
			$woo_products_out_of_stock_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group6->addChild(
			"row3",
			$row3
		);
		
		$woo_products_out_of_stock_background_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_out_of_stock_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_out_of_stock_background_color",
			$woo_products_out_of_stock_background_color
		);
		
		//Sorting
		
		$group8 = new StockholmQodeGroup(
			esc_html__( "Product Sorting Style", 'stockholm' ),
			esc_html__( "Define Sorting Style", 'stockholm' )
		);
		$panel1->addChild(
			"group8",
			$group8
		);
		
		$row1 = new StockholmQodeRow();
		$group8->addChild(
			"row1",
			$row1
		);
		
		$woo_products_sorting_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_sorting_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sorting_color",
			$woo_products_sorting_color
		);
		
		$woo_products_sorting_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_sorting_hover_color",
			"",
			esc_html__( "Text Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sorting_hover_color",
			$woo_products_sorting_hover_color
		);
		
		$woo_products_sorting_background_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_sorting_background_color",
			"",
			esc_html__( "Box Background Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sorting_background_color",
			$woo_products_sorting_background_color
		);
		
		$woo_products_sorting_border_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_sorting_border_color",
			"",
			esc_html__( "Box Border Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sorting_border_color",
			$woo_products_sorting_border_color
		);
		
		$row2 = new StockholmQodeRow( true );
		$group8->addChild(
			"row2",
			$row2
		);
		
		$woo_products_sorting_border_width = new StockholmQodeField(
			"textsimple",
			"woo_products_sorting_border_width",
			"",
			esc_html__( "Box Border Width (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sorting_border_width",
			$woo_products_sorting_border_width
		);
		
		$woo_products_sorting_dropdown_background_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_sorting_dropdown_background_color",
			"",
			esc_html__( "Dropdown Background Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sorting_dropdown_background_color",
			$woo_products_sorting_dropdown_background_color
		);
		
		//Sorting Result
		
		$group7 = new StockholmQodeGroup(
			esc_html__( "Product Sorting Result Style", 'stockholm' ),
			esc_html__( "Define Sorting Result Text Style", 'stockholm' )
		);
		$panel1->addChild(
			"group7",
			$group7
		);
		
		$row1 = new StockholmQodeRow();
		$group7->addChild(
			"row1",
			$row1
		);
		
		$woo_products_sorting_result_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_sorting_result_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sorting_result_color",
			$woo_products_sorting_result_color
		);
		
		$woo_products_sorting_result_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_sorting_result_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sorting_result_font_size",
			$woo_products_sorting_result_font_size
		);
		
		$woo_products_sorting_result_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_sorting_result_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_sorting_result_line_height",
			$woo_products_sorting_result_line_height
		);
		
		$woo_products_sorting_result_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_sorting_result_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_sorting_result_text_transform",
			$woo_products_sorting_result_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group7->addChild(
			"row2",
			$row2
		);
		
		$woo_products_sorting_result_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_sorting_result_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_sorting_result_font_family",
			$woo_products_sorting_result_font_family
		);
		
		$woo_products_sorting_result_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_sorting_result_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_sorting_result_font_style",
			$woo_products_sorting_result_font_style
		);
		
		$woo_products_sorting_result_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_sorting_result_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_sorting_result_font_weight",
			$woo_products_sorting_result_font_weight
		);
		
		$woo_products_sorting_result_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_sorting_result_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_sorting_result_letter_spacing",
			$woo_products_sorting_result_letter_spacing
		);
		
		//Pricing Filter
		
		$group9 = new StockholmQodeGroup(
			esc_html__( "Filter Price Style", 'stockholm' ),
			esc_html__( "Define Filter Price Style", 'stockholm' )
		);
		$panel1->addChild(
			"group9",
			$group9
		);
		
		$row1 = new StockholmQodeRow( true );
		$group9->addChild(
			"row1",
			$row1
		);
		
		$woo_products_price_filter_background_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_price_filter_background_color",
			"",
			esc_html__( "Slider Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_price_filter_background_color",
			$woo_products_price_filter_background_color
		);
		
		$woo_products_price_filter_background_active_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_price_filter_background_active_color",
			"",
			esc_html__( "Active Slider Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_price_filter_background_active_color",
			$woo_products_price_filter_background_active_color
		);
		
		$woo_products_price_filter_arrows_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_price_filter_arrows_color",
			"",
			esc_html__( "Arrows Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_price_filter_arrows_color",
			$woo_products_price_filter_arrows_color
		);
		
		$woo_products_price_filter_slider_height = new StockholmQodeField(
			"textsimple",
			"woo_products_price_filter_slider_height",
			"",
			esc_html__( "Slider Height(px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_price_filter_slider_height",
			$woo_products_price_filter_slider_height
		);
		
		$row2 = new StockholmQodeRow( true );
		$group9->addChild(
			"row2",
			$row2
		);
		
		$woo_products_price_filter_arrows_height = new StockholmQodeField(
			"textsimple",
			"woo_products_price_filter_arrows_height",
			"",
			esc_html__( "Arrows Height(px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_price_filter_arrows_height",
			$woo_products_price_filter_arrows_height
		);
		
		$woo_products_price_filter_arrows_border_radius = new StockholmQodeField(
			"textsimple",
			"woo_products_price_filter_arrows_border_radius",
			"",
			esc_html__( "Arrows Border Radius(px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_price_filter_arrows_border_radius",
			$woo_products_price_filter_arrows_border_radius
		);
		
		//Product single styles
		
		$panel2 = new StockholmQodePanel(
			esc_html__( "Product Single", 'stockholm' ),
			"product_single_panel"
		);
		$woocommercePage->addChild(
			"panel2",
			$panel2
		);

        $woo_product_single_product_type = new StockholmQodeField(
            "select",
            "woo_product_single_product_type",
            "",
            esc_html__( "Product Type", 'stockholm' ),
            esc_html__( "Choose product type", 'stockholm' ),
            array(
                "" => esc_html__('Default', 'stockholm'),
                "large-gallery" => esc_html__('Large Gallery', 'stockholm'),
                "two-columns-gallery" => esc_html__('Full Width Gallery - Two Columns', 'stockholm'),
            ),
            array(
                "dependence" => true,
                "hide"       => array(
                    "large-gallery" => "#qodef_woo_product_single_thumb_number_container",
                    "two-columns-gallery" => "#qodef_woo_product_single_thumb_number_container",
                ),
                "show"       => array(
                    "" => "#qodef_woo_product_single_thumb_number_container"
                )
            )
        );
        $panel2->addChild(
            "woo_product_single_product_type",
            $woo_product_single_product_type
        );

        $woo_product_single_thumb_number_container = new StockholmQodeContainer(
            "woo_product_single_thumb_number_container",
            "woo_product_single_product_type",
            "large-gallery",
            array("large-gallery", "two-columns-gallery")
        );

        $panel2->addChild(
            "woo_product_single_thumb_number_container",
            $woo_product_single_thumb_number_container
        );

        $group0 = new StockholmQodeGroup(
            esc_html__( "Product Thumbnails", 'stockholm' ),
            esc_html__( "Define Product Thumbnails Style", 'stockholm' )
        );
        $woo_product_single_thumb_number_container->addChild(
            "group0",
            $group0
        );

        $row0 = new StockholmQodeRow();
        $group0->addChild(
            "row0",
            $row0
        );

        $woo_product_single_thumb_number = new StockholmQodeField(
            "selectsimple",
            "woo_product_single_thumb_number",
            "4",
            esc_html__( "Number of thumbnails", 'stockholm' ),
            "",
            array(
                "4" => "4",
                "3" => "3",
            )
        );
        $row0->addChild(
            "woo_product_single_thumb_number",
            $woo_product_single_thumb_number
        );

        $woo_product_single_thumb_position = new StockholmQodeField(
            "selectsimple",
            "woo_product_single_thumb_position",
            "below",
            esc_html__( "Position of thumbnails", 'stockholm' ),
            "",
            array(
                "below" => esc_html__('Below Image', 'stockholm'),
                "left" => esc_html__('Left From Image', 'stockholm')
            )
        );
        $row0->addChild(
            "woo_product_single_thumb_position",
            $woo_product_single_thumb_position
        );

		$woo_product_single_tabs_position = new StockholmQodeField(
			"select",
			"woo_product_single_tabs_position",
			"right",
			esc_html__( "Info Tabs Position", 'stockholm' ),
			"",
			array(
				"right" => "Right from Images",
				"bellow" => "Bellow Images",
			)
		);
		$panel2->addChild(
			"woo_product_single_tabs_position",
			$woo_product_single_tabs_position
		);
		
		//Product single title
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Product Single Title Style", 'stockholm' ),
			esc_html__( "Define Product Single Title Style", 'stockholm' )
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
		
		$woo_product_single_title_color = new StockholmQodeField(
			"colorsimple",
			"woo_product_single_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_title_color",
			$woo_product_single_title_color
		);
		
		$woo_product_single_title_font_size = new StockholmQodeField(
			"textsimple",
			"woo_product_single_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_title_font_size",
			$woo_product_single_title_font_size
		);
		
		$woo_product_single_title_line_height = new StockholmQodeField(
			"textsimple",
			"woo_product_single_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_title_line_height",
			$woo_product_single_title_line_height
		);
		
		$woo_product_single_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_product_single_title_text_transform",
			$woo_product_single_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		
		$woo_product_single_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_product_single_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_product_single_title_font_family",
			$woo_product_single_title_font_family
		);
		
		$woo_product_single_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_product_single_title_font_style",
			$woo_product_single_title_font_style
		);
		
		$woo_product_single_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_product_single_title_font_weight",
			$woo_product_single_title_font_weight
		);
		
		$woo_product_single_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_product_single_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_product_single_title_letter_spacing",
			$woo_product_single_title_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);
		
		$woo_product_single_title_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_product_single_title_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_product_single_title_hover_color",
			$woo_product_single_title_hover_color
		);
		
		//Product single meta title
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Product Single Meta Title Style", 'stockholm' ),
			esc_html__( "Define Product Single Meta Title Style", 'stockholm' )
		);
		$panel2->addChild(
			"group2",
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		
		$woo_product_single_meta_title_color = new StockholmQodeField(
			"colorsimple",
			"woo_product_single_meta_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_meta_title_color",
			$woo_product_single_meta_title_color
		);
		
		$woo_product_single_meta_title_font_size = new StockholmQodeField(
			"textsimple",
			"woo_product_single_meta_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_meta_title_font_size",
			$woo_product_single_meta_title_font_size
		);
		
		$woo_product_single_meta_title_line_height = new StockholmQodeField(
			"textsimple",
			"woo_product_single_meta_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_meta_title_line_height",
			$woo_product_single_meta_title_line_height
		);
		
		$woo_product_single_meta_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_meta_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_product_single_meta_title_text_transform",
			$woo_product_single_meta_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		
		$woo_product_single_meta_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_product_single_meta_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_product_single_meta_title_font_family",
			$woo_product_single_meta_title_font_family
		);
		
		$woo_product_single_meta_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_meta_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_product_single_meta_title_font_style",
			$woo_product_single_meta_title_font_style
		);
		
		$woo_product_single_meta_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_meta_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_product_single_meta_title_font_weight",
			$woo_product_single_meta_title_font_weight
		);
		
		$woo_product_single_meta_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_product_single_meta_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_product_single_meta_title_letter_spacing",
			$woo_product_single_meta_title_letter_spacing
		);
		
		//Product single meta title
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Product Single Meta Info Style", 'stockholm' ),
			esc_html__( "Define Product Single Meta Info Style", 'stockholm' )
		);
		$panel2->addChild(
			"group3",
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		
		$woo_product_single_meta_info_color = new StockholmQodeField(
			"colorsimple",
			"woo_product_single_meta_info_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_meta_info_color",
			$woo_product_single_meta_info_color
		);
		
		$woo_product_single_meta_info_font_size = new StockholmQodeField(
			"textsimple",
			"woo_product_single_meta_info_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_meta_info_font_size",
			$woo_product_single_meta_info_font_size
		);
		
		$woo_product_single_meta_info_line_height = new StockholmQodeField(
			"textsimple",
			"woo_product_single_meta_info_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_meta_info_line_height",
			$woo_product_single_meta_info_line_height
		);
		
		$woo_product_single_meta_info_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_meta_info_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_product_single_meta_info_text_transform",
			$woo_product_single_meta_info_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		
		$woo_product_single_meta_info_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_product_single_meta_info_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_product_single_meta_info_font_family",
			$woo_product_single_meta_info_font_family
		);
		
		$woo_product_single_meta_info_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_meta_info_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_product_single_meta_info_font_style",
			$woo_product_single_meta_info_font_style
		);
		
		$woo_product_single_meta_info_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_meta_info_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_product_single_meta_info_font_weight",
			$woo_product_single_meta_info_font_weight
		);
		
		$woo_product_single_meta_info_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_product_single_meta_info_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_product_single_meta_info_letter_spacing",
			$woo_product_single_meta_info_letter_spacing
		);
		
		//Product single price
		
		$group4 = new StockholmQodeGroup(
			esc_html__( "Product Single Price Style", 'stockholm' ),
			esc_html__( "Define Product Single Price Style", 'stockholm' )
		);
		$panel2->addChild(
			"group4",
			$group4
		);
		
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);
		
		$woo_product_single_price_color = new StockholmQodeField(
			"colorsimple",
			"woo_product_single_price_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_price_color",
			$woo_product_single_price_color
		);
		
		$woo_product_single_price_font_size = new StockholmQodeField(
			"textsimple",
			"woo_product_single_price_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_price_font_size",
			$woo_product_single_price_font_size
		);
		
		$woo_product_single_price_line_height = new StockholmQodeField(
			"textsimple",
			"woo_product_single_price_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_price_line_height",
			$woo_product_single_price_line_height
		);
		
		$woo_product_single_price_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_price_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_product_single_price_text_transform",
			$woo_product_single_price_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		
		$woo_product_single_price_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_product_single_price_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_product_single_price_font_family",
			$woo_product_single_price_font_family
		);
		
		$woo_product_single_price_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_price_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_product_single_price_font_style",
			$woo_product_single_price_font_style
		);
		
		$woo_product_single_price_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_price_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_product_single_price_font_weight",
			$woo_product_single_price_font_weight
		);
		
		$woo_product_single_price_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_product_single_price_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_product_single_price_letter_spacing",
			$woo_product_single_price_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group4->addChild(
			"row3",
			$row3
		);
		
		$woo_product_single_price_old_color = new StockholmQodeField(
			"colorsimple",
			"woo_product_single_price_old_color",
			"",
			esc_html__( "Old Price Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_product_single_price_old_color",
			$woo_product_single_price_old_color
		);
		
		//Related Products Title
		
		$group5 = new StockholmQodeGroup(
			esc_html__( "Related Products Title Style", 'stockholm' ),
			esc_html__( "Define Related Products Title Style", 'stockholm' )
		);
		$panel2->addChild(
			"group5",
			$group5
		);
		
		$row1 = new StockholmQodeRow();
		$group5->addChild(
			"row1",
			$row1
		);
		
		$woo_product_single_related_color = new StockholmQodeField(
			"colorsimple",
			"woo_product_single_related_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_related_color",
			$woo_product_single_related_color
		);
		
		$woo_product_single_related_font_size = new StockholmQodeField(
			"textsimple",
			"woo_product_single_related_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_related_font_size",
			$woo_product_single_related_font_size
		);
		
		$woo_product_single_related_line_height = new StockholmQodeField(
			"textsimple",
			"woo_product_single_related_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_related_line_height",
			$woo_product_single_related_line_height
		);
		
		$woo_product_single_related_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_related_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_product_single_related_text_transform",
			$woo_product_single_related_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group5->addChild(
			"row2",
			$row2
		);
		
		$woo_product_single_related_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_product_single_related_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_product_single_related_font_family",
			$woo_product_single_related_font_family
		);
		
		$woo_product_single_related_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_related_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_product_single_related_font_style",
			$woo_product_single_related_font_style
		);
		
		$woo_product_single_related_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_product_single_related_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_product_single_related_font_weight",
			$woo_product_single_related_font_weight
		);
		
		$woo_product_single_related_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_product_single_related_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_product_single_related_letter_spacing",
			$woo_product_single_related_letter_spacing
		);
		
		//Qunatity button
		
		$group51 = new StockholmQodeGroup(
			esc_html__( "Quantity Button Style", 'stockholm' ),
			esc_html__( "Define Quantity Button Style", 'stockholm' )
		);
		$panel2->addChild(
			"group51",
			$group51
		);
		
		$woo_products_single_qunatity_width = new StockholmQodeField(
			"textsimple",
			"woo_products_single_qunatity_width",
			"",
			esc_html__( "Width/Height (px)", 'stockholm' ),
			""
		);
		$group51->addChild(
			"woo_products_single_qunatity_width",
			$woo_products_single_qunatity_width
		);
		
		//Add to cart button
		
		$group6 = new StockholmQodeGroup(
			esc_html__( "Add To Cart Button Style", 'stockholm' ),
			esc_html__( "Define Add To Cart Button Style", 'stockholm' )
		);
		$panel2->addChild(
			"group6",
			$group6
		);
		
		$row1 = new StockholmQodeRow();
		$group6->addChild(
			"row1",
			$row1
		);
		
		$woo_products_single_add_to_cart_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_single_add_to_cart_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_single_add_to_cart_color",
			$woo_products_single_add_to_cart_color
		);
		
		$woo_products_single_add_to_cart_font_size = new StockholmQodeField(
			"textsimple",
			"woo_products_single_add_to_cart_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_single_add_to_cart_font_size",
			$woo_products_single_add_to_cart_font_size
		);
		
		$woo_products_single_add_to_cart_line_height = new StockholmQodeField(
			"textsimple",
			"woo_products_single_add_to_cart_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_products_single_add_to_cart_line_height",
			$woo_products_single_add_to_cart_line_height
		);
		
		$woo_products_single_add_to_cart_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_single_add_to_cart_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_products_single_add_to_cart_text_transform",
			$woo_products_single_add_to_cart_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group6->addChild(
			"row2",
			$row2
		);
		
		$woo_products_single_add_to_cart_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_products_single_add_to_cart_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_single_add_to_cart_font_family",
			$woo_products_single_add_to_cart_font_family
		);
		
		$woo_products_single_add_to_cart_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_single_add_to_cart_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_products_single_add_to_cart_font_style",
			$woo_products_single_add_to_cart_font_style
		);
		
		$woo_products_single_add_to_cart_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_products_single_add_to_cart_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_products_single_add_to_cart_font_weight",
			$woo_products_single_add_to_cart_font_weight
		);
		
		$woo_products_single_add_to_cart_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_products_single_add_to_cart_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_products_single_add_to_cart_letter_spacing",
			$woo_products_single_add_to_cart_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group6->addChild(
			"row3",
			$row3
		);
		
		$woo_products_single_add_to_cart_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_single_add_to_cart_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_single_add_to_cart_hover_color",
			$woo_products_single_add_to_cart_hover_color
		);
		
		$woo_products_single_add_to_cart_background_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_single_add_to_cart_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_single_add_to_cart_background_color",
			$woo_products_single_add_to_cart_background_color
		);
		
		$woo_products_single_add_to_cart_background_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_single_add_to_cart_background_hover_color",
			"",
			esc_html__( "Hover Background Color", 'stockholm' )
		);
		$row3->addChild(
			"woo_products_single_add_to_cart_background_hover_color",
			$woo_products_single_add_to_cart_background_hover_color
		);
		
		$row4 = new StockholmQodeRow( true );
		$group6->addChild(
			"row4",
			$row4
		);
		
		$woo_products_single_add_to_cart_border_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_single_add_to_cart_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_single_add_to_cart_border_color",
			$woo_products_single_add_to_cart_border_color
		);
		
		$woo_products_single_add_to_cart_border_hover_color = new StockholmQodeField(
			"colorsimple",
			"woo_products_single_add_to_cart_border_hover_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_single_add_to_cart_border_hover_color",
			$woo_products_single_add_to_cart_border_hover_color
		);
		
		$woo_products_single_add_to_cart_border_width = new StockholmQodeField(
			"textsimple",
			"woo_products_single_add_to_cart_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_single_add_to_cart_border_width",
			$woo_products_single_add_to_cart_border_width
		);
		
		$woo_products_single_add_to_cart_border_radius = new StockholmQodeField(
			"textsimple",
			"woo_products_single_add_to_cart_border_radius",
			"",
			esc_html__( "Border radius (px)", 'stockholm' )
		);
		$row4->addChild(
			"woo_products_single_add_to_cart_border_radius",
			$woo_products_single_add_to_cart_border_radius
		);
		
		//Woocommerce tabs
		
		$woo_product_single_disable_tab_content_box = new StockholmQodeField(
			"yesno",
			"woo_product_single_disable_tab_content_box",
			"no",
			esc_html__( "Disable Tab Content Box", 'stockholm' ),
			esc_html__( "Enabling this option will disable box around tab content.", 'stockholm' )
		);
		$panel2->addChild(
			"woo_product_single_disable_tab_content_box",
			$woo_product_single_disable_tab_content_box
		);
		
		$woo_product_single_enable_default_gallery_features = new StockholmQodeField(
			"yesno",
			"woo_product_single_enable_default_gallery_features",
			"no",
			esc_html__( "Enable Default WooCommerce Product Gallery Features", 'stockholm' ),
			esc_html__( "Enabling this option will add support for WooCommerce default zoom, swipe and lightbox features", 'stockholm' )
		);
		$panel2->addChild(
			"woo_product_single_enable_default_gallery_features",
			$woo_product_single_enable_default_gallery_features
		);
		
		//Social share
		
		$group7 = new StockholmQodeGroup(
			esc_html__( "Social Share", 'stockholm' ),
			esc_html__( "Define social share layout.", 'stockholm' )
		);
		$panel2->addChild(
			"group7",
			$group7
		);
		
		$row1 = new StockholmQodeRow();
		$group7->addChild(
			"row1",
			$row1
		);
		
		$woo_product_single_single_social_share_type = new StockholmQodeField(
			"selectsimple",
			"woo_product_single_single_social_share_type",
			"no",
			esc_html__( "Social Share Type", 'stockholm' ),
			"",
			array(
				"circle"  => esc_html__( "Circle", 'stockholm' ),
				"regular" => esc_html__( "Regular", 'stockholm' )
			)
		);
		$row1->addChild(
			"woo_product_single_single_social_share_type",
			$woo_product_single_single_social_share_type
		);
		
		$woo_product_single_font_size = new StockholmQodeField(
			"textsimple",
			"woo_product_single_font_size",
			"",
			esc_html__( "Social share icon font size", 'stockholm' )
		);
		$row1->addChild(
			"woo_product_single_font_size",
			$woo_product_single_font_size
		);
		
		//Shop category showcase styles
		
		$panel5 = new StockholmQodePanel(
			esc_html__( "Shop Category Showcase Shortcode", 'stockholm' ),
			"shop_category_showcase_panel"
		);
		$woocommercePage->addChild(
			"panel5",
			$panel5
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Category Title Style", 'stockholm' ),
			esc_html__( "Define Showcase Category Title Style", 'stockholm' )
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
		
		$woo_shop_category_showcase_category_title_color = new StockholmQodeField(
			"colorsimple",
			"woo_shop_category_showcase_category_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_shop_category_showcase_category_title_color",
			$woo_shop_category_showcase_category_title_color
		);
		
		$woo_shop_category_showcase_category_title_font_size = new StockholmQodeField(
			"textsimple",
			"woo_shop_category_showcase_category_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_shop_category_showcase_category_title_font_size",
			$woo_shop_category_showcase_category_title_font_size
		);
		
		$woo_shop_category_showcase_category_title_line_height = new StockholmQodeField(
			"textsimple",
			"woo_shop_category_showcase_category_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_shop_category_showcase_category_title_line_height",
			$woo_shop_category_showcase_category_title_line_height
		);
		
		$woo_shop_category_showcase_category_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_shop_category_showcase_category_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_shop_category_showcase_category_title_text_transform",
			$woo_shop_category_showcase_category_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		
		$woo_shop_category_showcase_category_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_shop_category_showcase_category_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_shop_category_showcase_category_title_font_family",
			$woo_shop_category_showcase_category_title_font_family
		);
		
		$woo_shop_category_showcase_category_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_shop_category_showcase_category_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_shop_category_showcase_category_title_font_style",
			$woo_shop_category_showcase_category_title_font_style
		);
		
		$woo_shop_category_showcase_category_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_shop_category_showcase_category_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_shop_category_showcase_category_title_font_weight",
			$woo_shop_category_showcase_category_title_font_weight
		);
		
		$woo_shop_category_showcase_category_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_shop_category_showcase_category_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_shop_category_showcase_category_title_letter_spacing",
			$woo_shop_category_showcase_category_title_letter_spacing
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Product Title Style", 'stockholm' ),
			esc_html__( "Define Showcase Product Title Style", 'stockholm' )
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
		
		$woo_shop_category_showcase_product_title_color = new StockholmQodeField(
			"colorsimple",
			"woo_shop_category_showcase_product_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_shop_category_showcase_product_title_color",
			$woo_shop_category_showcase_product_title_color
		);
		
		$woo_shop_category_showcase_product_title_font_size = new StockholmQodeField(
			"textsimple",
			"woo_shop_category_showcase_product_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_shop_category_showcase_product_title_font_size",
			$woo_shop_category_showcase_product_title_font_size
		);
		
		$woo_shop_category_showcase_product_title_line_height = new StockholmQodeField(
			"textsimple",
			"woo_shop_category_showcase_product_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_shop_category_showcase_product_title_line_height",
			$woo_shop_category_showcase_product_title_line_height
		);
		
		$woo_shop_category_showcase_product_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_shop_category_showcase_product_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_shop_category_showcase_product_title_text_transform",
			$woo_shop_category_showcase_product_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		
		$woo_shop_category_showcase_product_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_shop_category_showcase_product_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_shop_category_showcase_product_title_font_family",
			$woo_shop_category_showcase_product_title_font_family
		);
		
		$woo_shop_category_showcase_product_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_shop_category_showcase_product_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_shop_category_showcase_product_title_font_style",
			$woo_shop_category_showcase_product_title_font_style
		);
		
		$woo_shop_category_showcase_product_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_shop_category_showcase_product_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_shop_category_showcase_product_title_font_weight",
			$woo_shop_category_showcase_product_title_font_weight
		);
		
		$woo_shop_category_showcase_product_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_shop_category_showcase_product_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_shop_category_showcase_product_title_letter_spacing",
			$woo_shop_category_showcase_product_title_letter_spacing
		);
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Product Price Style", 'stockholm' ),
			esc_html__( "Define Showcase Product Price Style", 'stockholm' )
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
		
		$woo_shop_category_showcase_product_price_color = new StockholmQodeField(
			"colorsimple",
			"woo_shop_category_showcase_product_price_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"woo_shop_category_showcase_product_price_color",
			$woo_shop_category_showcase_product_price_color
		);
		
		$woo_shop_category_showcase_product_price_font_size = new StockholmQodeField(
			"textsimple",
			"woo_shop_category_showcase_product_price_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_shop_category_showcase_product_price_font_size",
			$woo_shop_category_showcase_product_price_font_size
		);
		
		$woo_shop_category_showcase_product_price_line_height = new StockholmQodeField(
			"textsimple",
			"woo_shop_category_showcase_product_price_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"woo_shop_category_showcase_product_price_line_height",
			$woo_shop_category_showcase_product_price_line_height
		);
		
		$woo_shop_category_showcase_product_price_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"woo_shop_category_showcase_product_price_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"woo_shop_category_showcase_product_price_text_transform",
			$woo_shop_category_showcase_product_price_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		
		$woo_shop_category_showcase_product_price_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"woo_shop_category_showcase_product_price_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"woo_shop_category_showcase_product_price_font_family",
			$woo_shop_category_showcase_product_price_font_family
		);
		
		$woo_shop_category_showcase_product_price_font_style = new StockholmQodeField(
			"selectblanksimple",
			"woo_shop_category_showcase_product_price_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"woo_shop_category_showcase_product_price_font_style",
			$woo_shop_category_showcase_product_price_font_style
		);
		
		$woo_shop_category_showcase_product_price_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"woo_shop_category_showcase_product_price_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"woo_shop_category_showcase_product_price_font_weight",
			$woo_shop_category_showcase_product_price_font_weight
		);
		
		$woo_shop_category_showcase_product_price_letter_spacing = new StockholmQodeField(
			"textsimple",
			"woo_shop_category_showcase_product_price_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"woo_shop_category_showcase_product_price_letter_spacing",
			$woo_shop_category_showcase_product_price_letter_spacing
		);
		
		//Dropdown Cart
		$panel_dropdown_cart = new StockholmQodePanel(
			esc_html__( 'Dropdown Cart', 'stockholm' ),
			'panel_dropdown_cart'
		);
		$woocommercePage->addChild(
			'panel_dropdown_cart',
			$panel_dropdown_cart
		);

		$woo_dropdown_cart_icon_source = new StockholmQodeField(
			'select',
			'woo_dropdown_cart_icon_source',
			'icon_path',
			esc_html__( 'Select Drodown Cart Icon Source', 'stockholm' ),
			esc_html__( 'Choose whether you would like to use icons from an icon pack or SVG icons', 'stockholm' ),
			array(
				'icon_path'             => esc_html__( 'Icon Pack', 'stockholm' ),
				'svg_path' => esc_html__( 'SVG Path', 'stockholm' )
			),
			array(
				"dependence" => true,
				"hide"       => array(
					"icon_path"                    => "#qodef_woo_dropdown_cart_svg_path_container",
					"svg_path"                      => "#qodef_woo_dropdown_cart_icon_container",
				),
				"show"       => array(
					"icon_path"                    => "#qodef_woo_dropdown_cart_icon_container",
					"svg_path"                      => "#qodef_woo_dropdown_cart_svg_path_container",
				)
			)
		);
		$panel_dropdown_cart->addChild(
			'woo_dropdown_cart_icon_source',
			$woo_dropdown_cart_icon_source
		);

		$woo_dropdown_cart_icon_container = new StockholmQodeContainer(
			"woo_dropdown_cart_icon_container",
			"woo_dropdown_cart_icon_source",
			"svg_path"
		);
		$panel_dropdown_cart->addChild(
			"woo_dropdown_cart_icon_container",
			$woo_dropdown_cart_icon_container
		);

		$woo_dropdown_cart_icon = new StockholmQodeField(
			'select',
			'woo_dropdown_cart_icon',
			'',
			esc_html__( 'Cart Icon Font', 'stockholm' ),
			esc_html__( 'Choose icon font for dropdown cart icon', 'stockholm' ),
			array(
				''             => esc_html__( 'Font Awesome Icon', 'stockholm' ),
				'font-elegant' => esc_html__( 'Font Elegant Icon', 'stockholm' ),
				'font-linear'  => esc_html__( 'Linear Icon', 'stockholm' ),
				'font-linea'   => esc_html__( 'Linea Icon', 'stockholm' )
			)
		);
		$woo_dropdown_cart_icon_container->addChild(
			'woo_dropdown_cart_icon',
			$woo_dropdown_cart_icon
		);

		$woo_dropdown_cart_svg_path_container = new StockholmQodeContainer(
			"woo_dropdown_cart_svg_path_container",
			"woo_dropdown_cart_icon_source",
			"icon_path"
		);
		$panel_dropdown_cart->addChild(
			"woo_dropdown_cart_svg_path_container",
			$woo_dropdown_cart_svg_path_container
		);

		$woo_dropdown_cart_svg_path = new StockholmQodeField(
			"textarea",
			"woo_dropdown_cart_svg_path",
			"",
			esc_html__( "Dropdown Cart Icon SVG Path", 'stockholm' ),
			esc_html__( "Enter your dropdown cart icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation", 'stockholm' )
		);
		$woo_dropdown_cart_svg_path_container->addChild(
			"woo_dropdown_cart_svg_path",
			$woo_dropdown_cart_svg_path
		);

		$woo_dropdown_cart_show_product_number = new StockholmQodeField(
			"yesno",
			"woo_dropdown_cart_show_product_number",
			"no",
			esc_html__( "Show Product Number", 'stockholm' ),
			esc_html__( "Enabling this option will show product number on cart icon.", 'stockholm' )
		);

		$panel_dropdown_cart->addChild(
			"woo_dropdown_cart_show_product_number",
			$woo_dropdown_cart_show_product_number
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_woocommerce_options_map', 190 );
}