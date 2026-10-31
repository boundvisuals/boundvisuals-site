<?php

if ( ! function_exists( 'stockholm_qode_sidebar_options_map' ) ) {
	/**
	 * Sidebar options page
	 */
	function stockholm_qode_sidebar_options_map() {
		
		$sidebarPage = new StockholmQodeAdminPage(
			"7",
			esc_html__( "Sidebar", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"sidebar",
			$sidebarPage
		);
		
		$panel2 = new StockholmQodePanel(
			esc_html__( "General Style", 'stockholm' ),
			"general_style"
		);
		$sidebarPage->addChild(
			"panel2",
			$panel2
		);
		
		$sidebar_alignment = new StockholmQodeField(
			"select",
			"sidebar_alignment",
			"default",
			esc_html__( "Sidebar Text Alignment", 'stockholm' ),
			esc_html__( "Choose alignment for sidebar.", 'stockholm' ),
			array(
				""       => esc_html__( "Default", 'stockholm' ),
				"left"   => esc_html__( "Left", 'stockholm' ),
				"center" => esc_html__( "Center", 'stockholm' ),
				"right"  => esc_html__( "Right", 'stockholm' )
			)
		);
		$panel2->addChild(
			"sidebar_alignment",
			$sidebar_alignment
		);
		
		$sidebar_widget_border = new StockholmQodeField(
			"select",
			"sidebar_widget_border",
			"default",
			esc_html__( "Border Around Widgets", 'stockholm' ),
			esc_html__( "Enable this option to display border around widgets.", 'stockholm' ),
			array(
				""    => esc_html__( "Default", 'stockholm' ),
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			)
		);
		$panel2->addChild(
			"sidebar_widget_border",
			$sidebar_widget_border
		);
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Widget Style", 'stockholm' ),
			"widget_style"
		);
		$sidebarPage->addChild(
			"panel1",
			$panel1
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Title Style", 'stockholm' ),
			esc_html__( "Define styles for widgets title.", 'stockholm' )
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
		$sidebar_title_color = new StockholmQodeField(
			"colorsimple",
			"sidebar_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"sidebar_title_color",
			$sidebar_title_color
		);
		
		$sidebar_title_font_size = new StockholmQodeField(
			"textsimple",
			"sidebar_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"sidebar_title_font_size",
			$sidebar_title_font_size
		);
		
		$sidebar_title_line_height = new StockholmQodeField(
			"textsimple",
			"sidebar_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"sidebar_title_line_height",
			$sidebar_title_line_height
		);
		
		$sidebar_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"sidebar_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"sidebar_title_text_transform",
			$sidebar_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$sidebar_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"sidebar_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"sidebar_title_font_family",
			$sidebar_title_font_family
		);
		
		$sidebar_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"sidebar_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"sidebar_title_font_style",
			$sidebar_title_font_style
		);
		
		$sidebar_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"sidebar_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"sidebar_title_font_weight",
			$sidebar_title_font_weight
		);
		
		$sidebar_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"sidebar_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"sidebar_title_letter_spacing",
			$sidebar_title_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);
		$sidebar_title_background = new StockholmQodeField(
			"colorsimple",
			"sidebar_title_background",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row3->addChild(
			"sidebar_title_background",
			$sidebar_title_background
		);
		
		$sidebar_title_border_color = new StockholmQodeField(
			"colorsimple",
			"sidebar_title_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row3->addChild(
			"sidebar_title_border_color",
			$sidebar_title_border_color
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Link Style", 'stockholm' ),
			esc_html__( "Define styles for widget links.", 'stockholm' )
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
		$sidebar_link_color = new StockholmQodeField(
			"colorsimple",
			"sidebar_link_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"sidebar_link_color",
			$sidebar_link_color
		);
		
		$sidebar_link_font_size = new StockholmQodeField(
			"textsimple",
			"sidebar_link_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"sidebar_link_font_size",
			$sidebar_link_font_size
		);
		
		$sidebar_link_line_height = new StockholmQodeField(
			"textsimple",
			"sidebar_link_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"sidebar_link_line_height",
			$sidebar_link_line_height
		);
		
		$sidebar_link_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"sidebar_link_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"sidebar_link_text_transform",
			$sidebar_link_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$sidebar_link_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"sidebar_link_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"sidebar_link_font_family",
			$sidebar_link_font_family
		);
		
		$sidebar_link_font_style = new StockholmQodeField(
			"selectblanksimple",
			"sidebar_link_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"sidebar_link_font_style",
			$sidebar_link_font_style
		);
		
		$sidebar_link_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"sidebar_link_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"sidebar_link_font_weight",
			$sidebar_link_font_weight
		);
		
		$sidebar_link_letter_spacing = new StockholmQodeField(
			"textsimple",
			"sidebar_link_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"sidebar_link_letter_spacing",
			$sidebar_link_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group2->addChild(
			"row3",
			$row3
		);
		$sidebar_link_hover_color = new StockholmQodeField(
			"colorsimple",
			"sidebar_link_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"sidebar_link_hover_color",
			$sidebar_link_hover_color
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_sidebar_options_map', 80 );
}