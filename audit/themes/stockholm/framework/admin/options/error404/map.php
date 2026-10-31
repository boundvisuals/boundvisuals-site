<?php

if ( ! function_exists( 'stockholm_qode_error_options_map' ) ) {
	function stockholm_qode_error_options_map() {
		
		$error404Page = new StockholmQodeAdminPage(
			"12",
			"404 Error Page"
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"error404Page",
			$error404Page
		);
		
		//404 Page Options
		
		$panel1 = new StockholmQodePanel(
			"404 Page Options",
			"page_error_options_panel"
		);
		$error404Page->addChild(
			"panel1",
			$panel1
		);
		
		$title_404 = new StockholmQodeField(
			"text",
			"404_title",
			"",
			esc_html__( "Title", 'stockholm' ),
			esc_html__( "Enter title for 404 page", 'stockholm' )
		);
		$panel1->addChild(
			"404_title",
			$title_404
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Title Style", 'stockholm' ),
			esc_html__( "Define title styles.", 'stockholm' )
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
		$title_404_color = new StockholmQodeField(
			"colorsimple",
			"404_title_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"404_title_color",
			$title_404_color
		);
		
		$title_404_font_size = new StockholmQodeField(
			"textsimple",
			"404_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"404_title_font_size",
			$title_404_font_size
		);
		
		$title_404_line_height = new StockholmQodeField(
			"textsimple",
			"404_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"404_title_line_height",
			$title_404_line_height
		);
		
		$title_404_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"404_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"404_title_text_transform",
			$title_404_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$title_404_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"404_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"404_title_font_family",
			$title_404_font_family
		);
		
		$title_404_font_style = new StockholmQodeField(
			"selectblanksimple",
			"404_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"404_title_font_style",
			$title_404_font_style
		);
		
		$title_404_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"404_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"404_title_font_weight",
			$title_404_font_weight
		);
		
		$title_404_letter_spacing = new StockholmQodeField(
			"textsimple",
			"404_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"404_title_letter_spacing",
			$title_404_letter_spacing
		);
		
		$text_404 = new StockholmQodeField(
			"text",
			"404_text",
			"",
			esc_html__( "Text", 'stockholm' ),
			esc_html__( "Enter text for 404 page", 'stockholm' )
		);
		$panel1->addChild(
			"404_text",
			$text_404
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Text Style", 'stockholm' ),
			esc_html__( "Define title styles.", 'stockholm' )
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
		$text_404_color = new StockholmQodeField(
			"colorsimple",
			"404_text_color",
			"",
			esc_html__( "Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"404_text_color",
			$text_404_color
		);
		
		$text_404_font_size = new StockholmQodeField(
			"textsimple",
			"404_text_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"404_text_font_size",
			$text_404_font_size
		);
		
		$text_404_line_height = new StockholmQodeField(
			"textsimple",
			"404_text_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"404_title_line_height",
			$text_404_line_height
		);
		
		$text_404_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"404_text_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"404_text_text_transform",
			$text_404_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$text_404_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"404_text_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"404_text_font_family",
			$text_404_font_family
		);
		
		$text_404_font_style = new StockholmQodeField(
			"selectblanksimple",
			"404_text_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"404_text_font_style",
			$text_404_font_style
		);
		
		$text_404_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"404_text_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"404_text_font_weight",
			$text_404_font_weight
		);
		
		$text_404_letter_spacing = new StockholmQodeField(
			"textsimple",
			"404_text_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"404_text_letter_spacing",
			$text_404_letter_spacing
		);
		
		$backlabel_404 = new StockholmQodeField(
			"text",
			"404_backlabel",
			"",
			esc_html__( "Back to Home Button Label", 'stockholm' ),
			esc_html__( 'Enter label for "Back to Home" button ', 'stockholm' )
		);
		$panel1->addChild(
			"404_backlabel",
			$backlabel_404
		);
		
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_error_options_map', 140 );
}


