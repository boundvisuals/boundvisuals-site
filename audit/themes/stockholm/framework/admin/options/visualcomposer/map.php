<?php

if ( ! function_exists( 'stockholm_qode_visualcomposer_options_map' ) ) {
	/**
	 * Visual Composer options page
	 */
	function stockholm_qode_visualcomposer_options_map() {
		
		$visualComposerPage = new StockholmQodeAdminPage(
			'19',
			esc_html__( 'Visual Composer', 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			'visualComposerPage',
			$visualComposerPage
		);
		
		$panel1 = new StockholmQodePanel(
			esc_html__( 'Visual Composer Grid Elements', 'stockholm' ),
			'vc_grid_elements'
		);
		$visualComposerPage->addChild(
			'panel1',
			$panel1
		);
		
		$enable_grid_elements = new StockholmQodeField(
			'yesno',
			'enable_grid_elements',
			'no',
			esc_html__( 'Enable Grid Elements', 'stockholm' ),
			esc_html__( 'Enabling this option will allow Visual Composer Grid Elements. NOTE: Enabling Grid Elements will disable Page Transition.', 'stockholm' ),
			array(),
			array(
				'dependence'             => 'true',
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_vc_grid_elements_style'
			)
		);
		$panel1->addChild(
			'enable_grid_elements',
			$enable_grid_elements
		);
		
		$panel2 = new StockholmQodePanel(
			esc_html__( 'Visual Composer Grid Elements Style', 'stockholm' ),
			'vc_grid_elements_style',
			'enable_grid_elements',
			'no'
		);
		$visualComposerPage->addChild(
			'panel2',
			$panel2
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( 'Button', 'stockholm' ),
			esc_html__( 'Define styles for grid button', 'stockholm' )
		);
		$panel2->addChild(
			'group1',
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$vc_grid_button_title_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_button_title_color',
			'',
			esc_html__( 'Text Color', 'stockholm' ),
			''
		);
		$row1->addChild(
			'vc_grid_button_title_color',
			$vc_grid_button_title_color
		);
		$vc_grid_button_title_hovercolor = new StockholmQodeField(
			'colorsimple',
			'vc_grid_button_title_hovercolor',
			'',
			esc_html__( 'Hover Color', 'stockholm' ),
			''
		);
		$row1->addChild(
			'vc_grid_button_title_hovercolor',
			$vc_grid_button_title_hovercolor
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			'row2',
			$row2
		);
		
		$vc_grid_button_title_google_fonts = new StockholmQodeField(
			esc_html__( 'Fontsimple', 'stockholm' ),
			'vc_grid_button_title_google_fonts',
			'-1',
			esc_html__( 'Font Family', 'stockholm' ),
			''
		);
		$row2->addChild(
			'vc_grid_button_title_google_fonts',
			$vc_grid_button_title_google_fonts
		);
		$vc_grid_button_title_fontsize = new StockholmQodeField(
			'textsimple',
			'vc_grid_button_title_fontsize',
			'',
			esc_html__( 'Font Size (px)', 'stockholm' ),
			''
		);
		$row2->addChild(
			'vc_grid_button_title_fontsize',
			$vc_grid_button_title_fontsize
		);
		$vc_grid_button_title_lineheight = new StockholmQodeField(
			'textsimple',
			'vc_grid_button_title_lineheight',
			'',
			esc_html__( 'Line Height (px)', 'stockholm' ),
			''
		);
		$row2->addChild(
			'vc_grid_button_title_lineheight',
			$vc_grid_button_title_lineheight
		);
		
		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			'row3',
			$row3
		);
		
		$vc_grid_button_title_fontstyle = new StockholmQodeField(
			'selectblanksimple',
			'vc_grid_button_title_fontstyle',
			'',
			esc_html__( 'Font Style', 'stockholm' ),
			'',
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			'vc_grid_button_title_fontstyle',
			$vc_grid_button_title_fontstyle
		);
		$vc_grid_button_title_fontweight = new StockholmQodeField(
			'selectblanksimple',
			'vc_grid_button_title_fontweight',
			'',
			esc_html__( 'Font Weight', 'stockholm' ),
			'',
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			'vc_grid_button_title_fontweight',
			$vc_grid_button_title_fontweight
		);
		$vc_grid_button_title_letter_spacing = new StockholmQodeField(
			'textsimple',
			'vc_grid_button_title_letter_spacing',
			'',
			esc_html__( 'Letter Spacing (px)', 'stockholm' ),
			''
		);
		$row3->addChild(
			'vc_grid_button_title_letter_spacing',
			$vc_grid_button_title_letter_spacing
		);
		
		$row4 = new StockholmQodeRow( true );
		$group1->addChild(
			'row4',
			$row4
		);
		
		$vc_grid_button_backgroundcolor = new StockholmQodeField(
			'colorsimple',
			'vc_grid_button_backgroundcolor',
			'',
			esc_html__( 'Background Color', 'stockholm' ),
			''
		);
		$row4->addChild(
			'vc_grid_button_backgroundcolor',
			$vc_grid_button_backgroundcolor
		);
		$vc_grid_button_backgroundcolor_hover = new StockholmQodeField(
			'colorsimple',
			'vc_grid_button_backgroundcolor_hover',
			'',
			esc_html__( 'Hover Background Color', 'stockholm' ),
			''
		);
		$row4->addChild(
			'vc_grid_button_backgroundcolor_hover',
			$vc_grid_button_backgroundcolor_hover
		);
		$vc_grid_button_border_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_button_border_color',
			'',
			esc_html__( 'Border Color', 'stockholm' ),
			''
		);
		$row4->addChild(
			'vc_grid_button_border_color',
			$vc_grid_button_border_color
		);
		$vc_grid_button_border_hover_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_button_border_hover_color',
			'',
			esc_html__( 'Border Hover color', 'stockholm' ),
			''
		);
		$row4->addChild(
			'vc_grid_button_border_hover_color',
			$vc_grid_button_border_hover_color
		);
		
		$row5 = new StockholmQodeRow( true );
		$group1->addChild(
			'row5',
			$row5
		);
		
		$vc_grid_button_border_width = new StockholmQodeField(
			'textsimple',
			'vc_grid_button_border_width',
			'',
			esc_html__( 'Border Width (px)', 'stockholm' ),
			esc_html__( 'This is some description', 'stockholm' )
		);
		$row5->addChild(
			'vc_grid_button_border_width',
			$vc_grid_button_border_width
		);
		$vc_grid_button_border_radius = new StockholmQodeField(
			'textsimple',
			'vc_grid_button_border_radius',
			'',
			esc_html__( 'Border Radius (px)', 'stockholm' ),
			esc_html__( 'This is some description', 'stockholm' )
		);
		$row5->addChild(
			'vc_grid_button_border_radius',
			$vc_grid_button_border_radius
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( 'Load More Button', 'stockholm' ),
			esc_html__( 'Define styles for grid load more button', 'stockholm' )
		);
		$panel2->addChild(
			'group2',
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		
		$vc_grid_load_more_button_title_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_load_more_button_title_color',
			'',
			esc_html__( 'Text Color', 'stockholm' ),
			''
		);
		$row1->addChild(
			'vc_grid_load_more_button_title_color',
			$vc_grid_load_more_button_title_color
		);
		$vc_grid_load_more_button_title_hovercolor = new StockholmQodeField(
			'colorsimple',
			'vc_grid_load_more_button_title_hovercolor',
			'',
			esc_html__( 'Hover Color', 'stockholm' ),
			''
		);
		$row1->addChild(
			'vc_grid_load_more_button_title_hovercolor',
			$vc_grid_load_more_button_title_hovercolor
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			'row2',
			$row2
		);
		
		$vc_grid_load_more_button_title_google_fonts = new StockholmQodeField(
			esc_html__( 'Fontsimple', 'stockholm' ),
			'vc_grid_load_more_button_title_google_fonts',
			'-1',
			esc_html__( 'Font Family', 'stockholm' ),
			''
		);
		$row2->addChild(
			'vc_grid_load_more_button_title_google_fonts',
			$vc_grid_load_more_button_title_google_fonts
		);
		$vc_grid_load_more_button_title_fontsize = new StockholmQodeField(
			'textsimple',
			'vc_grid_load_more_button_title_fontsize',
			'',
			esc_html__( 'Font Size (px)', 'stockholm' ),
			''
		);
		$row2->addChild(
			'vc_grid_load_more_button_title_fontsize',
			$vc_grid_load_more_button_title_fontsize
		);
		$vc_grid_load_more_button_title_lineheight = new StockholmQodeField(
			'textsimple',
			'vc_grid_load_more_button_title_lineheight',
			'',
			esc_html__( 'Line Height (px)', 'stockholm' ),
			''
		);
		$row2->addChild(
			'vc_grid_load_more_button_title_lineheight',
			$vc_grid_load_more_button_title_lineheight
		);
		
		$row3 = new StockholmQodeRow( true );
		$group2->addChild(
			'row3',
			$row3
		);
		
		$vc_grid_load_more_button_title_fontstyle = new StockholmQodeField(
			'selectblanksimple',
			'vc_grid_load_more_button_title_fontstyle',
			'',
			esc_html__( 'Font Style', 'stockholm' ),
			'',
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			'vc_grid_load_more_button_title_fontstyle',
			$vc_grid_load_more_button_title_fontstyle
		);
		$vc_grid_load_more_button_title_fontweight = new StockholmQodeField(
			'selectblanksimple',
			'vc_grid_load_more_button_title_fontweight',
			'',
			esc_html__( 'Font Weight', 'stockholm' ),
			'',
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			'vc_grid_load_more_button_title_fontweight',
			$vc_grid_load_more_button_title_fontweight
		);
		$vc_grid_load_more_button_title_letter_spacing = new StockholmQodeField(
			'textsimple',
			'vc_grid_load_more_button_title_letter_spacing',
			'',
			esc_html__( 'Letter Spacing (px)', 'stockholm' ),
			''
		);
		$row3->addChild(
			'vc_grid_load_more_button_title_letter_spacing',
			$vc_grid_load_more_button_title_letter_spacing
		);
		
		$row4 = new StockholmQodeRow( true );
		$group2->addChild(
			'row4',
			$row4
		);
		
		$vc_grid_load_more_button_backgroundcolor = new StockholmQodeField(
			'colorsimple',
			'vc_grid_load_more_button_backgroundcolor',
			'',
			esc_html__( 'Background Color', 'stockholm' ),
			''
		);
		$row4->addChild(
			'vc_grid_load_more_button_backgroundcolor',
			$vc_grid_load_more_button_backgroundcolor
		);
		$vc_grid_load_more_button_backgroundcolor_hover = new StockholmQodeField(
			'colorsimple',
			'vc_grid_load_more_button_backgroundcolor_hover',
			'',
			esc_html__( 'Hover Background Color', 'stockholm' ),
			''
		);
		$row4->addChild(
			'vc_grid_load_more_button_backgroundcolor_hover',
			$vc_grid_load_more_button_backgroundcolor_hover
		);
		$vc_grid_load_more_button_border_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_load_more_button_border_color',
			'',
			esc_html__( 'Border Color', 'stockholm' ),
			''
		);
		$row4->addChild(
			'vc_grid_load_more_button_border_color',
			$vc_grid_load_more_button_border_color
		);
		$vc_grid_load_more_button_border_hover_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_load_more_button_border_hover_color',
			'',
			esc_html__( 'Border Hover color', 'stockholm' ),
			''
		);
		$row4->addChild(
			'vc_grid_load_more_button_border_hover_color',
			$vc_grid_load_more_button_border_hover_color
		);
		
		$row5 = new StockholmQodeRow( true );
		$group2->addChild(
			'row5',
			$row5
		);
		
		$vc_grid_load_more_button_border_width = new StockholmQodeField(
			'textsimple',
			'vc_grid_load_more_button_border_width',
			'',
			esc_html__( 'Border Width (px)', 'stockholm' ),
			esc_html__( 'This is some description', 'stockholm' )
		);
		$row5->addChild(
			'vc_grid_load_more_button_border_width',
			$vc_grid_load_more_button_border_width
		);
		$vc_grid_load_more_button_border_radius = new StockholmQodeField(
			'textsimple',
			'vc_grid_load_more_button_border_radius',
			'',
			esc_html__( 'Border Radius (px)', 'stockholm' ),
			esc_html__( 'This is some description', 'stockholm' )
		);
		$row5->addChild(
			'vc_grid_load_more_button_border_radius',
			$vc_grid_load_more_button_border_radius
		);
		
		$group3 = new StockholmQodeGroup(
			esc_html__( 'Pagination', 'stockholm' ),
			esc_html__( 'Define styles for grid pagination', 'stockholm' )
		);
		$panel2->addChild(
			'group3',
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			'row1',
			$row1
		);
		
		$vc_grid_pagination_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_pagination_color',
			'',
			esc_html__( 'Color', 'stockholm' ),
			''
		);
		$row1->addChild(
			'vc_grid_pagination_color',
			$vc_grid_pagination_color
		);
		
		$vc_grid_pagination_hover_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_pagination_hover_color',
			'',
			esc_html__( 'Hover Color', 'stockholm' ),
			''
		);
		$row1->addChild(
			'vc_grid_pagination_hover_color',
			$vc_grid_pagination_hover_color
		);
		
		$vc_grid_pagination_background_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_pagination_background_color',
			'',
			esc_html__( 'Background Color', 'stockholm' ),
			''
		);
		$row1->addChild(
			'vc_grid_pagination_background_color',
			$vc_grid_pagination_background_color
		);
		
		$vc_grid_pagination_background_hover_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_pagination_background_hover_color',
			'',
			esc_html__( 'Background Hover Color', 'stockholm' ),
			''
		);
		$row1->addChild(
			'vc_grid_pagination_background_hover_color',
			$vc_grid_pagination_background_hover_color
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			'row2',
			$row2
		);
		
		$vc_grid_pagination_border_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_pagination_border_color',
			'',
			esc_html__( 'Border Color', 'stockholm' ),
			''
		);
		$row2->addChild(
			'vc_grid_pagination_border_color',
			$vc_grid_pagination_border_color
		);
		
		$vc_grid_pagination_border_hover_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_pagination_border_hover_color',
			'',
			esc_html__( 'Border Hover Color', 'stockholm' ),
			''
		);
		$row2->addChild(
			'vc_grid_pagination_border_hover_color',
			$vc_grid_pagination_border_hover_color
		);
		
		$group5 = new StockholmQodeGroup(
			esc_html__( 'Filter', 'stockholm' ),
			esc_html__( 'Define styles for grid filter', 'stockholm' )
		);
		$panel2->addChild(
			'group5',
			$group5
		);
		
		$row1 = new StockholmQodeRow();
		$group5->addChild(
			'row1',
			$row1
		);
		
		$vc_grid_portfolio_filter_color = new StockholmQodeField(
			"colorsimple",
			"vc_grid_portfolio_filter_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row1->addChild(
			"vc_grid_portfolio_filter_color",
			$vc_grid_portfolio_filter_color
		);
		$vc_grid_portfolio_filter_hovercolor = new StockholmQodeField(
			"colorsimple",
			"vc_grid_portfolio_filter_hovercolor",
			"",
			esc_html__( "Hover/Active Color", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row1->addChild(
			"vc_grid_portfolio_filter_hovercolor",
			$vc_grid_portfolio_filter_hovercolor
		);
		$vc_grid_portfolio_filter_font_size = new StockholmQodeField(
			"textsimple",
			"vc_grid_portfolio_filter_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row1->addChild(
			"vc_grid_portfolio_filter_font_size",
			$vc_grid_portfolio_filter_font_size
		);
		$vc_grid_portfolio_filter_line_height = new StockholmQodeField(
			"textsimple",
			"vc_grid_portfolio_filter_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row1->addChild(
			"vc_grid_portfolio_filter_line_height",
			$vc_grid_portfolio_filter_line_height
		);
		
		$row2 = new StockholmQodeRow( true );
		$group5->addChild(
			'row2',
			$row2
		);
		
		$vc_grid_portfolio_filter_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"vc_grid_portfolio_filter_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' ),
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"vc_grid_portfolio_filter_text_transform",
			$vc_grid_portfolio_filter_text_transform
		);
		$vc_grid_portfolio_filter_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"vc_grid_portfolio_filter_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row2->addChild(
			"vc_grid_portfolio_filter_font_family",
			$vc_grid_portfolio_filter_font_family
		);
		$vc_grid_portfolio_filter_font_style = new StockholmQodeField(
			"selectblanksimple",
			"vc_grid_portfolio_filter_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' ),
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"vc_grid_portfolio_filter_font_style",
			$vc_grid_portfolio_filter_font_style
		);
		$vc_grid_portfolio_filter_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"vc_grid_portfolio_filter_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' ),
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"vc_grid_portfolio_filter_font_weight",
			$vc_grid_portfolio_filter_font_weight
		);
		
		$row3 = new StockholmQodeRow( true );
		$group5->addChild(
			'row3',
			$row3
		);
		
		$vc_grid_portfolio_filter_letter_spacing = new StockholmQodeField(
			"textsimple",
			"vc_grid_portfolio_filter_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			esc_html__( "This is some description", 'stockholm' )
		);
		$row3->addChild(
			"vc_grid_portfolio_filter_letter_spacing",
			$vc_grid_portfolio_filter_letter_spacing
		);
		$vc_grid_portfolio_filter_margin_bottom = new StockholmQodeField(
			"textsimple",
			"vc_grid_portfolio_filter_margin_bottom",
			"",
			esc_html__( "Filter Bottom Margin (px)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"vc_grid_portfolio_filter_margin_bottom",
			$vc_grid_portfolio_filter_margin_bottom
		);
		
		$group4 = new StockholmQodeGroup(
			esc_html__( 'Arrows', 'stockholm' ),
			esc_html__( 'Define styles for grid arrows', 'stockholm' )
		);
		$panel2->addChild(
			'group4',
			$group4
		);
		
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			'row1',
			$row1
		);
		
		$vc_grid_arrows_color = new StockholmQodeField(
			'colorsimple',
			'vc_grid_arrows_color',
			'',
			esc_html__( 'Color', 'stockholm' ),
			''
		);
		$row1->addChild(
			'vc_grid_arrows_color',
			$vc_grid_arrows_color
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_visualcomposer_options_map', 180 );
}