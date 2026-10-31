<?php

if ( ! function_exists( 'stockholm_qode_gravityforms_options_map' ) ) {
	function stockholm_qode_gravityforms_options_map() {
		
		$gravityformsPage = new StockholmQodeAdminPage(
			"18",
			esc_html__( "Gravity Forms", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			esc_html__( "Gravity Forms", 'stockholm' ),
			$gravityformsPage
		);
		
		// General
		$panel1 = new StockholmQodePanel(
			esc_html__( "General", 'stockholm' ),
			"general_panel"
		);
		$gravityformsPage->addChild(
			"panel1",
			$panel1
		);
		
		//Title style
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Title Style", 'stockholm' ),
			esc_html__( "Define styles for forms Title", 'stockholm' )
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
		
		$gf_title_color = new StockholmQodeField(
			"colorsimple",
			"gf_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_title_color",
			$gf_title_color
		);
		
		$gf_title_font_size = new StockholmQodeField(
			"textsimple",
			"gf_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"gf_title_font_size",
			$gf_title_font_size
		);
		
		$gf_title_line_height = new StockholmQodeField(
			"textsimple",
			"gf_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"gf_title_line_height",
			$gf_title_line_height
		);
		
		$gf_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"gf_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			'',
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"gf_title_text_transform",
			$gf_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		
		$gf_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"gf_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"gf_title_font_family",
			$gf_title_font_family
		);
		
		$gf_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"gf_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			'',
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"gf_title_font_style",
			$gf_title_font_style
		);
		
		$gf_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"gf_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"gf_title_font_weight",
			$gf_title_font_weight
		);
		
		$gf_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"gf_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"gf_title_letter_spacing",
			$gf_title_letter_spacing
		);
		
		//Input style
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Input Fields Style", 'stockholm' ),
			esc_html__( "Define styles for Input Fields", 'stockholm' )
		);
		$panel1->addChild(
			"group2",
			$group2
		);
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		
		$gf_input_text_color = new StockholmQodeField(
			"colorsimple",
			"gf_input_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_input_text_color",
			$gf_input_text_color
		);
		
		$gf_input_focus_text_color = new StockholmQodeField(
			"colorsimple",
			"gf_input_focus_text_color",
			"",
			esc_html__( "Focus Text Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_input_focus_text_color",
			$gf_input_focus_text_color
		);
		
		$gf_input_background_color = new StockholmQodeField(
			"colorsimple",
			"gf_input_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_input_background_color",
			$gf_input_background_color
		);
		
		$gf_input_focus_background_color = new StockholmQodeField(
			"colorsimple",
			"gf_input_focus_background_color",
			"",
			esc_html__( "Focus Background Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_input_focus_background_color",
			$gf_input_focus_background_color
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		
		$gf_input_border_color = new StockholmQodeField(
			"colorsimple",
			"gf_input_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row2->addChild(
			"gf_input_border_color",
			$gf_input_border_color
		);
		
		$gf_input_focus_border_color = new StockholmQodeField(
			"colorsimple",
			"gf_input_focus_border_color",
			"",
			esc_html__( "Focus Border Color", 'stockholm' )
		);
		$row2->addChild(
			"gf_input_focus_border_color",
			$gf_input_focus_border_color
		);
		
		$gf_input_border_width = new StockholmQodeField(
			"textsimple",
			"gf_input_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' )
		);
		$row2->addChild(
			"gf_input_border_width",
			$gf_input_border_width
		);
		
		//Select Box style
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Drop Down Fields Style", 'stockholm' ),
			esc_html__( "Define styles for Drop Down fields", 'stockholm' )
		);
		$panel1->addChild(
			"group3",
			$group3
		);
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		
		$gf_select_text_color = new StockholmQodeField(
			"colorsimple",
			"gf_select_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_select_text_color",
			$gf_select_text_color
		);
		
		$gf_select_background_color = new StockholmQodeField(
			"colorsimple",
			"gf_select_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_select_background_color",
			$gf_select_background_color
		);
		
		$gf_select_border_color = new StockholmQodeField(
			"colorsimple",
			"gf_select_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_select_border_color",
			$gf_select_border_color
		);
		
		//Label style
		
		$group4 = new StockholmQodeGroup(
			esc_html__( "Label Style", 'stockholm' ),
			esc_html__( "Define styles for input Labels", 'stockholm' )
		);
		$panel1->addChild(
			"group4",
			$group4
		);
		
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);
		
		$gf_label_color = new StockholmQodeField(
			"colorsimple",
			"gf_label_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_label_color",
			$gf_label_color
		);
		
		$gf_label_font_size = new StockholmQodeField(
			"textsimple",
			"gf_label_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"gf_label_font_size",
			$gf_label_font_size
		);
		
		$gf_label_line_height = new StockholmQodeField(
			"textsimple",
			"gf_label_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"gf_label_line_height",
			$gf_label_line_height
		);
		
		$gf_label_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"gf_label_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"gf_label_text_transform",
			$gf_label_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		
		$gf_label_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"gf_label_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"gf_label_font_family",
			$gf_label_font_family
		);
		
		$gf_label_font_style = new StockholmQodeField(
			"selectblanksimple",
			"gf_label_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"gf_label_font_style",
			$gf_label_font_style
		);
		
		$gf_label_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"gf_label_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"gf_label_font_weight",
			$gf_label_font_weight
		);
		
		$gf_label_letter_spacing = new StockholmQodeField(
			"textsimple",
			"gf_label_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"gf_label_letter_spacing",
			$gf_label_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group4->addChild(
			"row3",
			$row3
		);
		
		$gf_label_require_color = new StockholmQodeField(
			"colorsimple",
			"gf_label_require_color",
			"",
			esc_html__( "Require Mark Color", 'stockholm' )
		);
		$row3->addChild(
			"gf_label_require_color",
			$gf_label_require_color
		);
		
		//Description style
		
		$group5 = new StockholmQodeGroup(
			esc_html__( "Description Style", 'stockholm' ),
			esc_html__( "Define styles for forms descriptions", 'stockholm' )
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
		
		$gf_description_color = new StockholmQodeField(
			"colorsimple",
			"gf_description_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_description_color",
			$gf_description_color
		);
		
		$gf_description_font_size = new StockholmQodeField(
			"textsimple",
			"gf_description_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"gf_description_font_size",
			$gf_description_font_size
		);
		
		$gf_description_line_height = new StockholmQodeField(
			"textsimple",
			"gf_description_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"gf_description_line_height",
			$gf_description_line_height
		);
		
		$gf_description_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"gf_description_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"gf_description_text_transform",
			$gf_description_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group5->addChild(
			"row2",
			$row2
		);
		
		$gf_description_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"gf_description_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"gf_description_font_family",
			$gf_description_font_family
		);
		
		$gf_description_font_style = new StockholmQodeField(
			"selectblanksimple",
			"gf_description_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"gf_description_font_style",
			$gf_description_font_style
		);
		
		$gf_description_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"gf_description_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"gf_description_font_weight",
			$gf_description_font_weight
		);
		
		$gf_description_letter_spacing = new StockholmQodeField(
			"textsimple",
			"gf_description_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"gf_description_letter_spacing",
			$gf_description_letter_spacing
		);
		
		//Button style
		
		$group6 = new StockholmQodeGroup(
			esc_html__( "Button Style", 'stockholm' ),
			esc_html__( "Define styles for buttons", 'stockholm' )
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
		
		$gf_button_text_color = new StockholmQodeField(
			"colorsimple",
			"gf_button_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_button_text_color",
			$gf_button_text_color
		);
		
		$gf_button_focus_text_color = new StockholmQodeField(
			"colorsimple",
			"gf_button_focus_text_color",
			"",
			esc_html__( "Focus Text Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_button_focus_text_color",
			$gf_button_focus_text_color
		);
		
		$gf_button_background_color = new StockholmQodeField(
			"colorsimple",
			"gf_button_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_button_background_color",
			$gf_button_background_color
		);
		
		$gf_button_focus_background_color = new StockholmQodeField(
			"colorsimple",
			"gf_button_focus_background_color",
			"",
			esc_html__( "Focus Background Color", 'stockholm' )
		);
		$row1->addChild(
			"gf_button_focus_background_color",
			$gf_button_focus_background_color
		);
		
		$row2 = new StockholmQodeRow( true );
		$group6->addChild(
			"row2",
			$row2
		);
		
		$gf_button_border_color = new StockholmQodeField(
			"colorsimple",
			"gf_button_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row2->addChild(
			"gf_button_border_color",
			$gf_button_border_color
		);
		
		$gf_button_focus_border_color = new StockholmQodeField(
			"colorsimple",
			"gf_button_focus_border_color",
			"",
			esc_html__( "Focus Border Color", 'stockholm' )
		);
		$row2->addChild(
			"gf_button_focus_border_color",
			$gf_button_focus_border_color
		);
		
		$gf_button_border_width = new StockholmQodeField(
			"textsimple",
			"gf_button_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' )
		);
		$row2->addChild(
			"gf_button_border_width",
			$gf_button_border_width
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_gravityforms_options_map', 200 );
}