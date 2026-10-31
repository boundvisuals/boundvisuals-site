<?php

if ( ! function_exists( 'stockholm_qode_elements_options_map' ) ) {
	/**
	 * Elements options page
	 */
	function stockholm_qode_elements_options_map() {

		$elementsPage = new StockholmQodeAdminPage(
			"6",
			esc_html__( "Elements", 'stockholm' )
		);

		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"elementsPage",
			$elementsPage
		);

		// Page

		$panel30 = new StockholmQodePanel(
			esc_html__( "Page Style", 'stockholm' ),
			"page_panel"
		);

		$elementsPage->addChild(
			"panel30",
			$panel30
		);

		$group31 = new StockholmQodeGroup(
			esc_html__( "Page Style", 'stockholm' ),
			esc_html__( "Define general page style", 'stockholm' )
		);

		$panel30->addChild(
			"group31",
			$group31
		);

		$row31 = new StockholmQodeRow();
		$group31->addChild(
			"row31",
			$row31
		);

		$page_general_styles = new StockholmQodeField(
			"yesnosimple",
			"page_hide_comments",
			"yes",
			esc_html__( "Hide Comments", 'stockholm' )
		);

		$row31->addChild(
			"page_general_styles",
			$page_general_styles
		);

		//Back to top

		$panel1 = new StockholmQodePanel(
			esc_html__( "Back to Top", 'stockholm' ),
			"back_to_top_panel"
		);

		$elementsPage->addChild(
			"panel1",
			$panel1
		);

		$icons_instance = stockholm_qode_icon_collections()::getInstance();

        $icon_packs = $icons_instance->getIconCollections();
        $icon_hide_array = array();
        $icon_show_array = array();

        foreach ($icon_packs as $dep_collection_key => $dep_collection_object) {
            $icon_hide_array[$dep_collection_key] = '';
            $icon_show_array[$dep_collection_key] = '#qodef_back_to_top_icon_pack_' . $dep_collection_key . '_container';

            foreach ($icon_packs as $key => $icon_collection_param) {
                if ($dep_collection_key !== $key) {
                    $icon_hide_array[$dep_collection_key] .= '#qodef_' . 'back_to_top_icon_pack' . '_' . $key . '_container,';
                }
            }

            $icon_hide_array[$dep_collection_key] = rtrim($icon_hide_array[$dep_collection_key], ',');
        }

        $back_to_top_icon_pack = new StockholmQodeField(
            "select",
            "back_to_top_icon_pack",
            "font_awesome",
            esc_html__( "Icon Pack", 'stockholm' ),
            esc_html__( "Choose desired icon pack for back to top icon", 'stockholm' ),
            $icon_packs,
            array(
                "dependence" => true,
                "hide"       => $icon_hide_array,
                "show"       => $icon_show_array
            )

        );

        $panel1->addChild(
            "back_to_top_icon_pack",
            $back_to_top_icon_pack
        );

        foreach( $icon_packs as $key => $value ){
            $back_to_top_icon_pack_single_container = new StockholmQodeContainer(
                "back_to_top_icon_pack_" . $key . '_container',
                "back_to_top_icon_pack",
                '',
                array_flip( array_diff($icon_packs, array($key => $value)) )
            );
            $panel1->addChild(
                "back_to_top_icon_pack_" . $key . '_container',
                $back_to_top_icon_pack_single_container
            );
            $back_to_top_icon_pack_single = new StockholmQodeField(
                "select",
                "back_to_top_icon_pack_" . $key,
                "",
                esc_html( $value . " Icon" ),
                '',
                $icons_instance->getBackToTopIconsArray($key)
            );

            $back_to_top_icon_pack_single_container->addChild(
                "back_to_top_icon_pack_" . $key,
                $back_to_top_icon_pack_single
            );
        }

		$group1 = new StockholmQodeGroup(
			esc_html__( "Back to Top Style", 'stockholm' ),
			esc_html__( "Define Back to top style", 'stockholm' )
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

		$back_to_top_arrow_size = new StockholmQodeField(
			"textsimple",
			"back_to_top_arrow_size",
			"14",
			esc_html__( "Icon Arrow Size (px)", 'stockholm' ),
			esc_html__( "Default value is 14", 'stockholm' )
		);

		$row1->addChild(
			"back_to_top_arrow_size",
			$back_to_top_arrow_size
		);

		$back_to_top_arrow_color = new StockholmQodeField(
			"colorsimple",
			"back_to_top_arrow_color",
			"",
			esc_html__( "Arrow Color", 'stockholm' )
		);

		$row1->addChild(
			"back_to_top_arrow_color",
			$back_to_top_arrow_color
		);

		$back_to_top_arrow_hover_color = new StockholmQodeField(
			"colorsimple",
			"back_to_top_arrow_hover_color",
			"",
			esc_html__( "Arrow Hover Color", 'stockholm' )
		);

		$row1->addChild(
			"back_to_top_arrow_hover_color",
			$back_to_top_arrow_hover_color
		);

		$back_to_top_background_color = new StockholmQodeField(
			"colorsimple",
			"back_to_top_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);

		$row1->addChild(
			"back_to_top_background_color",
			$back_to_top_background_color
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$back_to_top_background_hover_color = new StockholmQodeField(
			"colorsimple",
			"back_to_top_background_hover_color",
			"",
			esc_html__( "Background Hover Color", 'stockholm' )
		);

		$row2->addChild(
			"back_to_top_background_hover_color",
			$back_to_top_background_hover_color
		);

		$back_to_top_border_color = new StockholmQodeField(
			"colorsimple",
			"back_to_top_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);

		$row2->addChild(
			"back_to_top_border_color",
			$back_to_top_border_color
		);

		$back_to_top_border_hover_color = new StockholmQodeField(
			"colorsimple",
			"back_to_top_border_hover_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' )
		);

		$row2->addChild(
			"back_to_top_border_hover_color",
			$back_to_top_border_hover_color
		);

		$back_to_top_border_width = new StockholmQodeField(
			"textsimple",
			"back_to_top_border_width",
			"",
			esc_html__( "Border Width(px)", 'stockholm' ),
			""
		);

		$row2->addChild(
			"back_to_top_border_width",
			$back_to_top_border_width
		);

		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);

		$back_to_top_width = new StockholmQodeField(
			"textsimple",
			"back_to_top_width",
			"",
			esc_html__( "Width(px)", 'stockholm' ),
			""
		);

		$row3->addChild(
			"back_to_top_width",
			$back_to_top_width
		);

		$back_to_top_height = new StockholmQodeField(
			"textsimple",
			"back_to_top_height",
			"",
			esc_html__( "Height(px)", 'stockholm' ),
			""
		);

		$row3->addChild(
			"back_to_top_height",
			$back_to_top_height
		);

        $back_to_top_right_offset = new StockholmQodeField(
            "textsimple",
            "back_to_top_right_offset",
            "",
            esc_html__( "Right Offset(px)", 'stockholm' ),
            ""
        );

        $row3->addChild(
            "back_to_top_right_offset",
            $back_to_top_right_offset
        );

        $back_to_top_bottom_offset = new StockholmQodeField(
            "textsimple",
            "back_to_top_bottom_offset",
            "",
            esc_html__( "Bottom Offset(px)", 'stockholm' ),
            ""
        );

        $row3->addChild(
            "back_to_top_bottom_offset",
            $back_to_top_bottom_offset
        );

		//Buttons

		$panel2 = new StockholmQodePanel(
			esc_html__( "Buttons", 'stockholm' ),
			"buttons_panel"
		);

		$elementsPage->addChild(
			"panel2",
			$panel2
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Default Button Style", 'stockholm' ),
			esc_html__( "Define Default button style.", 'stockholm' )
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

		$button_title_color = new StockholmQodeField(
			"colorsimple",
			"button_title_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);

		$row1->addChild(
			"button_title_color",
			$button_title_color
		);

		$button_title_fontsize = new StockholmQodeField(
			"textsimple",
			"button_title_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);

		$row1->addChild(
			"button_title_fontsize",
			$button_title_fontsize
		);

		$button_title_lineheight = new StockholmQodeField(
			"textsimple",
			"button_title_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);

		$row1->addChild(
			"button_title_lineheight",
			$button_title_lineheight
		);

		$button_title_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"button_title_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);

		$row1->addChild(
			"button_title_texttransform",
			$button_title_texttransform
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$button_title_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"button_title_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);

		$row2->addChild(
			"button_title_google_fonts",
			$button_title_google_fonts
		);

		$button_title_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"button_title_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);

		$row2->addChild(
			"button_title_fontstyle",
			$button_title_fontstyle
		);

		$button_title_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"button_title_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);

		$row2->addChild(
			"button_title_fontweight",
			$button_title_fontweight
		);

		$button_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"button_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);

		$row2->addChild(
			"button_title_letter_spacing",
			$button_title_letter_spacing
		);

		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);

		$button_title_hovercolor = new StockholmQodeField(
			"colorsimple",
			"button_title_hovercolor",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);

		$row3->addChild(
			"button_title_hovercolor",
			$button_title_hovercolor
		);

		$button_backgroundcolor = new StockholmQodeField(
			"colorsimple",
			"button_backgroundcolor",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);

		$row3->addChild(
			"button_backgroundcolor",
			$button_backgroundcolor
		);

		$button_backgroundcolor_hover = new StockholmQodeField(
			"colorsimple",
			"button_backgroundcolor_hover",
			"",
			esc_html__( "Background Hover Color", 'stockholm' )
		);

		$row3->addChild(
			"button_backgroundcolor_hover",
			$button_backgroundcolor_hover
		);

		$button_border_color = new StockholmQodeField(
			"colorsimple",
			"button_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row3->addChild(
			"button_border_color",
			$button_border_color
		);

		$row4 = new StockholmQodeRow( true );
		$group1->addChild(
			"row4",
			$row4
		);

		$button_border_hover_color = new StockholmQodeField(
			"colorsimple",
			"button_border_hover_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' )
		);

		$row4->addChild(
			"button_border_hover_color",
			$button_border_hover_color
		);

		$button_border_width = new StockholmQodeField(
			"textsimple",
			"button_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' )
		);

		$row4->addChild(
			"button_border_width",
			$button_border_width
		);

		$button_border_radius = new StockholmQodeField(
			"textsimple",
			"button_border_radius",
			"",
			esc_html__( "Border radius (px)", 'stockholm' )
		);
		$row4->addChild(
			"button_border_radius",
			$button_border_radius
		);

		$button_padding = new StockholmQodeField(
			"textsimple",
			"button_padding",
			"",
			esc_html__( "Padding left/right (px)", 'stockholm' )
		);
		$row4->addChild(
			"button_padding",
			$button_padding
		);

		$group3 = new StockholmQodeGroup(
			esc_html__( "Predifined White Button", 'stockholm' ),
			esc_html__( "Define white button style.", 'stockholm' )
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

		$button_white_text_color = new StockholmQodeField(
			"colorsimple",
			"button_white_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"button_white_text_color",
			$button_white_text_color
		);

		$button_white_text_color_hover = new StockholmQodeField(
			"colorsimple",
			"button_white_text_color_hover",
			"",
			esc_html__( "Text Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"button_white_text_color_hover",
			$button_white_text_color_hover
		);

		$button_white_background_color = new StockholmQodeField(
			"colorsimple",
			"button_white_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row1->addChild(
			"button_white_background_color",
			$button_white_background_color
		);

		$button_white_background_color_hover = new StockholmQodeField(
			"colorsimple",
			"button_white_background_color_hover",
			"",
			esc_html__( "Background Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"button_white_background_color_hover",
			$button_white_background_color_hover
		);

		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);

		$button_white_border_color = new StockholmQodeField(
			"colorsimple",
			"button_white_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row2->addChild(
			"button_white_border_color",
			$button_white_border_color
		);

		$button_white_border_color_hover = new StockholmQodeField(
			"colorsimple",
			"button_white_border_color_hover",
			"",
			esc_html__( "Border Hover Color", 'stockholm' )
		);
		$row2->addChild(
			"button_white_border_color_hover",
			$button_white_border_color_hover
		);

		$group_underlined_button = new StockholmQodeGroup(
			esc_html__( "Predifined Underlined Button", 'stockholm' ),
			esc_html__( "Define underlined button style.", 'stockholm' )
		);
		$panel2->addChild(
			"group_underlined_button",
			$group_underlined_button
		);
		$row1 = new StockholmQodeRow();
		$group_underlined_button->addChild(
			"row1",
			$row1
		);

		$button_underlined_text_color = new StockholmQodeField(
			"colorsimple",
			"button_underlined_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"button_underlined_text_color",
			$button_underlined_text_color
		);

		$button_underlined_text_color_hover = new StockholmQodeField(
			"colorsimple",
			"button_underlined_text_color_hover",
			"",
			esc_html__( "Text Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"button_underlined_text_color_hover",
			$button_underlined_text_color_hover
		);

		$button_underlined_border_color = new StockholmQodeField(
			"colorsimple",
			"button_underlined_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row1->addChild(
			"button_underlined_border_color",
			$button_underlined_border_color
		);

		$button_underlined_border_color_hover = new StockholmQodeField(
			"colorsimple",
			"button_underlined_border_color_hover",
			"",
			esc_html__( "Border Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"button_underlined_border_color_hover",
			$button_underlined_border_color_hover
		);

		$group4 = new StockholmQodeGroup(
			esc_html__( "Small Button", 'stockholm' ),
			esc_html__( "Define small button style.", 'stockholm' )
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

		$small_button_lineheight = new StockholmQodeField(
			"textsimple",
			"small_button_lineheight",
			"",
			esc_html__( "Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"small_button_lineheight",
			$small_button_lineheight
		);

		$small_button_fontsize = new StockholmQodeField(
			"textsimple",
			"small_button_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"small_button_fontsize",
			$small_button_fontsize
		);

		$small_button_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"small_button_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row1->addChild(
			"small_button_fontweight",
			$small_button_fontweight
		);

		$small_button_padding = new StockholmQodeField(
			"textsimple",
			"small_button_padding",
			"",
			esc_html__( "Padding left/right (px) ", 'stockholm' )
		);
		$row1->addChild(
			"small_button_padding",
			$small_button_padding
		);

		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		$small_button_border_radius = new StockholmQodeField(
			"textsimple",
			"small_button_border_radius",
			"",
			esc_html__( "Border radius (px)", 'stockholm' )
		);
		$row2->addChild(
			"small_button_border_radius",
			$small_button_border_radius
		);

		$group5 = new StockholmQodeGroup(
			esc_html__( "Large Button", 'stockholm' ),
			esc_html__( "Define large button style.", 'stockholm' )
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

		$large_button_lineheight = new StockholmQodeField(
			"textsimple",
			"large_button_lineheight",
			"",
			esc_html__( "Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"large_button_lineheight",
			$large_button_lineheight
		);

		$large_button_fontsize = new StockholmQodeField(
			"textsimple",
			"large_button_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"large_button_fontsize",
			$large_button_fontsize
		);

		$large_button_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"large_button_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row1->addChild(
			"large_button_fontweight",
			$large_button_fontweight
		);

		$large_button_padding = new StockholmQodeField(
			"textsimple",
			"large_button_padding",
			"",
			esc_html__( "Padding left/right (px) ", 'stockholm' )
		);
		$row1->addChild(
			"large_button_padding",
			$large_button_padding
		);

		$row2 = new StockholmQodeRow( true );
		$group5->addChild(
			"row2",
			$row2
		);

		$large_button_border_radius = new StockholmQodeField(
			"textsimple",
			"large_button_border_radius",
			"",
			esc_html__( "Border radius (px)", 'stockholm' )
		);
		$row2->addChild(
			"large_button_border_radius",
			$large_button_border_radius
		);

		$group6 = new StockholmQodeGroup(
			esc_html__( "Extra Large Button", 'stockholm' ),
			esc_html__( "Define Extra large button style.", 'stockholm' )
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

		$big_large_button_lineheight = new StockholmQodeField(
			"textsimple",
			"big_large_button_lineheight",
			"",
			esc_html__( "Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"big_large_button_lineheight",
			$big_large_button_lineheight
		);

		$big_large_button_fontsize = new StockholmQodeField(
			"textsimple",
			"big_large_button_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"big_large_button_fontsize",
			$big_large_button_fontsize
		);

		$big_large_button_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"big_large_button_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row1->addChild(
			"big_large_button_fontweight",
			$big_large_button_fontweight
		);

		$big_large_button_padding = new StockholmQodeField(
			"textsimple",
			"big_large_button_padding",
			"",
			esc_html__( "Padding left/right (px) ", 'stockholm' )
		);
		$row1->addChild(
			"big_large_button_padding",
			$big_large_button_padding
		);

		$row2 = new StockholmQodeRow( true );
		$group6->addChild(
			"row2",
			$row2
		);

		$big_large_button_border_radius = new StockholmQodeField(
			"textsimple",
			"big_large_button_border_radius",
			"",
			esc_html__( "Border radius (px)", 'stockholm' )
		);
		$row2->addChild(
			"big_large_button_border_radius",
			$big_large_button_border_radius
		);

		//Blockquote

		$panel3 = new StockholmQodePanel(
			esc_html__( "Blockquote", 'stockholm' ),
			"blockquote_panel"
		);
		$elementsPage->addChild(
			"panel3",
			$panel3
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Blockquote Style", 'stockholm' ),
			esc_html__( "Define Blockquote style", 'stockholm' )
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

		$blockquote_color = new StockholmQodeField(
			"colorsimple",
			"blockquote_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blockquote_font_color",
			$blockquote_color
		);

		$blockquote_font_size = new StockholmQodeField(
			"textsimple",
			"blockquote_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blockquote_font_size",
			$blockquote_font_size
		);

		$blockquote_line_height = new StockholmQodeField(
			"textsimple",
			"blockquote_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blockquote_line_height",
			$blockquote_line_height
		);

		$blockquote_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blockquote_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blockquote_text_transform",
			$blockquote_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$blockquote_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blockquote_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blockquote_font_family",
			$blockquote_font_family
		);

		$blockquote_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blockquote_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blockquote_font_style",
			$blockquote_font_style
		);

		$blockquote_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blockquote_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blockquote_font_weight",
			$blockquote_font_weight
		);

		$blockquote_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blockquote_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blockquote_letter_spacing",
			$blockquote_letter_spacing
		);

		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);

		$blockquote_background_color = new StockholmQodeField(
			"colorsimple",
			"blockquote_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row3->addChild(
			"blockquote_background_color",
			$blockquote_background_color
		);

		$blockquote_border_color = new StockholmQodeField(
			"colorsimple",
			"blockquote_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row3->addChild(
			"blockquote_border_color",
			$blockquote_border_color
		);

		$blockquote_quote_icon_color = new StockholmQodeField(
			"colorsimple",
			"blockquote_quote_icon_color",
			"",
			esc_html__( "Quote Icon Color", 'stockholm' )
		);
		$row3->addChild(
			"blockquote_quote_icon_color",
			$blockquote_quote_icon_color
		);

		//Counters

		$panel4 = new StockholmQodePanel(
			esc_html__( "Counters", 'stockholm' ),
			"counters_panel"
		);
		$elementsPage->addChild(
			"panel4",
			$panel4
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Counters Style", 'stockholm' ),
			esc_html__( "Define styles for Counters", 'stockholm' )
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

		$counter_color = new StockholmQodeField(
			"colorsimple",
			"counter_color",
			"",
			esc_html__( "Numeral Color", 'stockholm' )
		);
		$row1->addChild(
			"counter_color",
			$counter_color
		);

		$counter_text_color = new StockholmQodeField(
			"colorsimple",
			"counter_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"counter_text_color",
			$counter_text_color
		);

		$counter_separator_color = new StockholmQodeField(
			"colorsimple",
			"counter_separator_color",
			"",
			esc_html__( "Separator Color", 'stockholm' )
		);
		$row1->addChild(
			"counter_separator_color",
			$counter_separator_color
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$counters_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"counters_font_family",
			"-1",
			esc_html__( "Numeral Font Family", 'stockholm' )
		);
		$row2->addChild(
			"counters_font_family",
			$counters_font_family
		);

		$counters_font_size = new StockholmQodeField(
			"textsimple",
			"counters_font_size",
			"",
			esc_html__( "Numeral Font Size (px)", 'stockholm' )
		);
		$row2->addChild(
			"counters_font_size",
			$counters_font_size
		);

		$counters_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"counters_fontweight",
			"",
			esc_html__( "Numeral Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"counters_fontweight",
			$counters_fontweight
		);

		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);

		$counters_text_font_size = new StockholmQodeField(
			"textsimple",
			"counters_text_font_size",
			"",
			esc_html__( "Text Font Size (px)", 'stockholm' )
		);
		$row3->addChild(
			"counters_text_font_size",
			$counters_text_font_size
		);

		$counters_text_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"counters_text_fontweight",
			"",
			esc_html__( "Text Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"counters_text_fontweight",
			$counters_text_fontweight
		);

		$counters_text_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"counters_text_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"counters_text_texttransform",
			$counters_text_texttransform
		);

		$counters_text_letterspacing = new StockholmQodeField(
			"textsimple",
			"counters_text_letterspacing",
			"",
			esc_html__( "Text Letter Spacing (px)", 'stockholm' )
		);
		$row3->addChild(
			"counters_text_letterspacing",
			$counters_text_letterspacing
		);

		//Countdown

		$panel20 = new StockholmQodePanel(
			esc_html__( "Countdown", 'stockholm' ),
			"countdown_panel"
		);
		$elementsPage->addChild(
			"panel20",
			$panel20
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Countdown Style", 'stockholm' ),
			esc_html__( "Define styles for Countdown", 'stockholm' )
		);
		$panel20->addChild(
			"group1",
			$group1
		);

		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$countdown_color = new StockholmQodeField(
			"colorsimple",
			"countdown_color",
			"",
			esc_html__( "Numeral Color", 'stockholm' )
		);
		$row1->addChild(
			"countdown_color",
			$countdown_color
		);

		$countdown_text_color = new StockholmQodeField(
			"colorsimple",
			"countdown_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"countdown_text_color",
			$countdown_text_color
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$countdown_font_size = new StockholmQodeField(
			"textsimple",
			"countdown_font_size",
			"",
			esc_html__( "Numeral Font Size (px)", 'stockholm' )
		);
		$row2->addChild(
			"countdown_font_size",
			$countdown_font_size
		);

		$countdown_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"countdown_fontweight",
			"",
			esc_html__( "Numeral Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"countdown_fontweight",
			$countdown_fontweight
		);

		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);

		$countdown_text_font_size = new StockholmQodeField(
			"textsimple",
			"countdown_text_font_size",
			"",
			esc_html__( "Text Font Size (px)", 'stockholm' )
		);
		$row3->addChild(
			"countdown_text_font_size",
			$countdown_text_font_size
		);

		$countdown_text_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"countdown_text_fontweight",
			"",
			esc_html__( "Text Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"countdown_text_fontweight",
			$countdown_text_fontweight
		);

		$countdown_text_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"countdown_text_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"countdown_text_texttransform",
			$countdown_text_texttransform
		);

		$countdown_text_letterspacing = new StockholmQodeField(
			"textsimple",
			"countdown_text_letterspacing",
			"",
			esc_html__( "Text Letter Spacing (px)", 'stockholm' )
		);
		$row3->addChild(
			"countdown_text_letterspacing",
			$countdown_text_letterspacing
		);

		//Expandable Section

		$panel5 = new StockholmQodePanel(
			esc_html__( "Expandable Section", 'stockholm' ),
			"expandable_section_panel"
		);
		$elementsPage->addChild(
			"panel5",
			$panel5
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Title Style", 'stockholm' ),
			esc_html__( "Define Expandable Section title style", 'stockholm' )
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

		$expandable_label_color = new StockholmQodeField(
			"colorsimple",
			"expandable_label_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"expandable_label_color",
			$expandable_label_color
		);

		$expandable_label_font_size = new StockholmQodeField(
			"textsimple",
			"expandable_label_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"expandable_label_font_size",
			$expandable_label_font_size
		);

		$expandable_label_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"expandable_label_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"expandable_label_text_transform",
			$expandable_label_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$expandable_label_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"expandable_label_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"expandable_label_font_family",
			$expandable_label_font_family
		);

		$expandable_label_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"expandable_label_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"expandable_label_font_weight",
			$expandable_label_font_weight
		);

		$expandable_label_letter_spacing = new StockholmQodeField(
			"textsimple",
			"expandable_label_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"expandable_label_letter_spacing",
			$expandable_label_letter_spacing
		);

		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);

		$expandable_background_color = new StockholmQodeField(
			"colorsimple",
			"expandable_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row3->addChild(
			"expandable_background_color",
			$expandable_background_color
		);

		$expandable_label_hover_color = new StockholmQodeField(
			"colorsimple",
			"expandable_label_hover_color",
			"",
			esc_html__( "Text Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"expandable_label_hover_color",
			$expandable_label_hover_color
		);

		//Highlight

		$panel17 = new StockholmQodePanel(
			esc_html__( "Highlight", 'stockholm' ),
			"highlight_panel"
		);
		$elementsPage->addChild(
			"panel17",
			$panel17
		);
		$highlight_color = new StockholmQodeField(
			"color",
			"highlight_color",
			"",
			esc_html__( "Highlight Color", 'stockholm' ),
			esc_html__( "Set color for Highlight", 'stockholm' )
		);
		$panel17->addChild(
			"highlight_color",
			$highlight_color
		);

		//Horizontal Progress Bars

		$panel6 = new StockholmQodePanel(
			esc_html__( "Horizontal Progress Bars", 'stockholm' ),
			"horizontal_progress_bars_panel"
		);
		$elementsPage->addChild(
			"panel6",
			$panel6
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Progress Bar Style", 'stockholm' ),
			esc_html__( "Define styles for Horizontal Progress Bars", 'stockholm' )
		);
		$panel6->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$progress_bar_horizontal_fontsize = new StockholmQodeField(
			"textsimple",
			"progress_bar_horizontal_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"progress_bar_horizontal_fontsize",
			$progress_bar_horizontal_fontsize
		);

		$progress_bar_horizontal_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"progress_bar_horizontal_fontweight",
			"",
			esc_html__( "Text Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row1->addChild(
			"progress_bar_horizontal_fontweight",
			$progress_bar_horizontal_fontweight
		);

		//Input Fields

		$panel7 = new StockholmQodePanel(
			esc_html__( "Input Fields", 'stockholm' ),
			"input_fields_panel"
		);
		$elementsPage->addChild(
			"panel7",
			$panel7
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Input Fields Style", 'stockholm' ),
			esc_html__( "Define styles for Input Fields", 'stockholm' )
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

		$input_background_color = new StockholmQodeField(
			"colorsimple",
			"input_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row1->addChild(
			"input_background_color",
			$input_background_color
		);

		$input_focus_background_color = new StockholmQodeField(
			"colorsimple",
			"input_focus_background_color",
			"",
			esc_html__( "Focus Background Color", 'stockholm' )
		);
		$row1->addChild(
			"input_focus_background_color",
			$input_focus_background_color
		);

		$input_border_color = new StockholmQodeField(
			"colorsimple",
			"input_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row1->addChild(
			"input_border_color",
			$input_border_color
		);

		$input_focus_border_color = new StockholmQodeField(
			"colorsimple",
			"input_focus_border_color",
			"",
			esc_html__( "Focus Border Color", 'stockholm' )
		);
		$row1->addChild(
			"input_focus_border_color",
			$input_focus_border_color
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$input_text_color = new StockholmQodeField(
			"colorsimple",
			"input_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row2->addChild(
			"input_text_color",
			$input_text_color
		);

		$input_focus_text_color = new StockholmQodeField(
			"colorsimple",
			"input_focus_text_color",
			"",
			esc_html__( "Focus Text Color", 'stockholm' )
		);
		$row2->addChild(
			"input_focus_text_color",
			$input_focus_text_color
		);

		//Interactive Banners

		$panel71 = new StockholmQodePanel(
			esc_html__( "Interactive Banners", 'stockholm' ),
			"interactive_banners_panel"
		);
		$elementsPage->addChild(
			"panel71",
			$panel71
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Interactive Banners Style", 'stockholm' ),
			esc_html__( "Define styles for Interactive Banners", 'stockholm' )
		);
		$panel71->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$input_background_color = new StockholmQodeField(
			"colorsimple",
			"interactive_banners_background_color",
			"",
			esc_html__( "Image Overlay Background Color", 'stockholm' )
		);
		$row1->addChild(
			"input_background_color",
			$input_background_color
		);

		$input_focus_background_color = new StockholmQodeField(
			"colorsimple",
			"interactive_banners_hover_background_color",
			"",
			esc_html__( "Image Overlay Hover Background Color", 'stockholm' )
		);
		$row1->addChild(
			"input_focus_background_color",
			$input_focus_background_color
		);

		//Message Boxes

		$panel8 = new StockholmQodePanel(
			esc_html__( "Message Boxes", 'stockholm' ),
			"message_boxes_panel"
		);
		$elementsPage->addChild(
			"panel8",
			$panel8
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Message Box Style", 'stockholm' ),
			esc_html__( "Define Message Box Style", 'stockholm' )
		);
		$panel8->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$message_title_color = new StockholmQodeField(
			"colorsimple",
			"message_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"message_title_color",
			$message_title_color
		);

		$message_backgroundcolor = new StockholmQodeField(
			"colorsimple",
			"message_backgroundcolor",
			"",
			esc_html__( "Background color", 'stockholm' )
		);
		$row1->addChild(
			"message_backgroundcolor",
			$message_backgroundcolor
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$message_title_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"message_title_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"message_title_google_fonts",
			$message_title_google_fonts
		);

		$message_title_fontsize = new StockholmQodeField(
			"textsimple",
			"message_title_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row2->addChild(
			"message_title_fontsize",
			$message_title_fontsize
		);

		$message_title_lineheight = new StockholmQodeField(
			"textsimple",
			"message_title_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row2->addChild(
			"message_title_lineheight",
			$message_title_lineheight
		);

		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);

		$message_title_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"message_title_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"message_title_fontstyle",
			$message_title_fontstyle
		);

		$message_title_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"message_title_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"message_title_fontweight",
			$message_title_fontweight
		);

		$group2 = new StockholmQodeGroup(
			esc_html__( "Message Icon Style", 'stockholm' ),
			esc_html__( "Define styles for Message Box icons", 'stockholm' )
		);
		$panel8->addChild(
			"group2",
			$group2
		);
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);

		$message_icon_color = new StockholmQodeField(
			"colorsimple",
			"message_icon_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"message_icon_color",
			$message_icon_color
		);

		$message_icon_fontsize = new StockholmQodeField(
			"textsimple",
			"message_icon_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"message_icon_fontsize",
			$message_icon_fontsize
		);

		//Pagination

		$panel10 = new StockholmQodePanel(
			esc_html__( "Pagination", 'stockholm' ),
			"pagination_panel"
		);
		$elementsPage->addChild(
			"panel10",
			$panel10
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Pagination Style", 'stockholm' ),
			esc_html__( "Define Pagination styles.", 'stockholm' )
		);
		$panel10->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$pagination_color = new StockholmQodeField(
			"colorsimple",
			"pagination_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"pagination_color",
			$pagination_color
		);

		$pagination_hover_color = new StockholmQodeField(
			"colorsimple",
			"pagination_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"pagination_hover_color",
			$pagination_hover_color
		);

		$pagination_font_size = new StockholmQodeField(
			"textsimple",
			"pagination_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pagination_font_size",
			$pagination_font_size
		);

		$pagination_line_height = new StockholmQodeField(
			"textsimple",
			"pagination_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"pagination_line_height",
			$pagination_line_height
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$pagination_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"pagination_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"pagination_text_transform",
			$pagination_text_transform
		);

		$pagination_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"pagination_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"pagination_font_family",
			$pagination_font_family
		);

		$pagination_font_style = new StockholmQodeField(
			"selectblanksimple",
			"pagination_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"pagination_font_style",
			$pagination_font_style
		);

		$pagination_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"pagination_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"pagination_font_weight",
			$pagination_font_weight
		);

		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);

		$pagination_letter_spacing = new StockholmQodeField(
			"textsimple",
			"pagination_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row3->addChild(
			"pagination_letter_spacing",
			$pagination_letter_spacing
		);

		$group2 = new StockholmQodeGroup(
			esc_html__( "Portfolio Pagination Style", 'stockholm' ),
			esc_html__( "Define Pagination styles for portfolio single.", 'stockholm' )
		);
		$panel10->addChild(
			"group2",
			$group2
		);
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);

		$portfolio_pagination_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_pagination_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_pagination_color",
			$portfolio_pagination_color
		);

		$portfolio_pagination_hover_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_pagination_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_pagination_hover_color",
			$portfolio_pagination_hover_color
		);

		$portfolio_pagination_font_size = new StockholmQodeField(
			"textsimple",
			"portfolio_pagination_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_pagination_font_size",
			$portfolio_pagination_font_size
		);

		//Pie Charts

		$panel11 = new StockholmQodePanel(
			esc_html__( "Pie Charts", 'stockholm' ),
			"pie_charts_panel"
		);
		$elementsPage->addChild(
			"panel11",
			$panel11
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Pie Chart Style", 'stockholm' ),
			esc_html__( "Define styles for Pie Charts", 'stockholm' )
		);
		$panel11->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$pie_charts_fontsize = new StockholmQodeField(
			"textsimple",
			"pie_charts_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pie_charts_fontsize",
			$pie_charts_fontsize
		);

		$pie_charts_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"pie_charts_fontweight",
			"",
			esc_html__( "Text Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row1->addChild(
			"pie_charts_fontweight",
			$pie_charts_fontweight
		);

		//Pricing table

		$panel12 = new StockholmQodePanel(
			esc_html__( "Pricing Table", 'stockholm' ),
			"pricing_table_panel"
		);
		$elementsPage->addChild(
			"panel12",
			$panel12
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Pricing tables Style", 'stockholm' ),
			esc_html__( "Define Pricing tables style", 'stockholm' )
		);
		$panel12->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$pricing_table_background_color = new StockholmQodeField(
			"colorsimple",
			"pricing_table_background_color",
			"",
			esc_html__( "Content Background Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_table_background_color",
			$pricing_table_background_color
		);

		$pricing_table_separator_color = new StockholmQodeField(
			"colorsimple",
			"pricing_table_separator_color",
			"",
			esc_html__( "Content Separator Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_table_separator_color",
			$pricing_table_separator_color
		);

		$pricing_table_separator_thickness = new StockholmQodeField(
			"textsimple",
			"pricing_table_separator_thickness",
			"",
			esc_html__( "Content Separator Thickness (px)", 'stockholm' ),
			esc_html__( "Default value is 14	", 'stockholm' )
		);
		$row1->addChild(
			"pricing_table_separator_thickness",
			$pricing_table_separator_thickness
		);

		$group2 = new StockholmQodeGroup(
			esc_html__( "Pricing tables active text", 'stockholm' ),
			esc_html__( "DefinePricing tables active text style.", 'stockholm' )
		);
		$panel12->addChild(
			"group2",
			$group2
		);
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);

		$pricing_tables_active_text_color = new StockholmQodeField(
			"colorsimple",
			"pricing_tables_active_text_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_active_text_color",
			$pricing_tables_active_text_color
		);

		$pricing_tables_active_text_font_size = new StockholmQodeField(
			"textsimple",
			"pricing_tables_active_text_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_active_text_font_size",
			$pricing_tables_active_text_font_size
		);

		$pricing_tables_active_text_line_height = new StockholmQodeField(
			"textsimple",
			"pricing_tables_active_text_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_active_text_line_height",
			$pricing_tables_active_text_line_height
		);

		$pricing_tables_active_text_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_active_text_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"pricing_tables_active_text_text_transform",
			$pricing_tables_active_text_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);

		$pricing_tables_active_text_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"pricing_tables_active_text_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_active_text_font_family",
			$pricing_tables_active_text_font_family
		);

		$pricing_tables_active_text_font_style = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_active_text_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"pricing_tables_active_text_font_style",
			$pricing_tables_active_text_font_style
		);

		$pricing_tables_active_text_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_active_text_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"pricing_tables_active_text_font_weight",
			$pricing_tables_active_text_font_weight
		);

		$pricing_tables_active_text_letter_spacing = new StockholmQodeField(
			"textsimple",
			"pricing_tables_active_text_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_active_text_letter_spacing",
			$pricing_tables_active_text_letter_spacing
		);

		$group3 = new StockholmQodeGroup(
			esc_html__( "Pricing tables title", 'stockholm' ),
			esc_html__( "Define Pricing tables title style.", 'stockholm' )
		);
		$panel12->addChild(
			"group3",
			$group3
		);
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);

		$pricing_tables_title_color = new StockholmQodeField(
			"colorsimple",
			"pricing_tables_title_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_title_color",
			$pricing_tables_title_color
		);

		$pricing_tables_title_font_size = new StockholmQodeField(
			"textsimple",
			"pricing_tables_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_title_font_size",
			$pricing_tables_title_font_size
		);

		$pricing_tables_title_line_height = new StockholmQodeField(
			"textsimple",
			"pricing_tables_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_title_line_height",
			$pricing_tables_title_line_height
		);

		$pricing_tables_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"pricing_tables_title_text_transform",
			$pricing_tables_title_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);

		$pricing_tables_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"pricing_tables_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_title_font_family",
			$pricing_tables_title_font_family
		);

		$pricing_tables_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"pricing_tables_title_font_style",
			$pricing_tables_title_font_style
		);

		$pricing_tables_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"pricing_tables_title_font_weight",
			$pricing_tables_title_font_weight
		);

		$pricing_tables_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"pricing_tables_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_title_letter_spacing",
			$pricing_tables_title_letter_spacing
		);

		$group4 = new StockholmQodeGroup(
			esc_html__( "Pricing tables period", 'stockholm' ),
			esc_html__( "DefinePricing tables period style.", 'stockholm' )
		);
		$panel12->addChild(
			"group4",
			$group4
		);
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);

		$pricing_tables_period_color = new StockholmQodeField(
			"colorsimple",
			"pricing_tables_period_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_period_color",
			$pricing_tables_period_color
		);

		$pricing_tables_period_font_size = new StockholmQodeField(
			"textsimple",
			"pricing_tables_period_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_period_font_size",
			$pricing_tables_period_font_size
		);

		$pricing_tables_period_line_height = new StockholmQodeField(
			"textsimple",
			"pricing_tables_period_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_period_line_height",
			$pricing_tables_period_line_height
		);

		$pricing_tables_period_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_period_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"pricing_tables_period_text_transform",
			$pricing_tables_period_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);

		$pricing_tables_period_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"pricing_tables_period_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_period_font_family",
			$pricing_tables_period_font_family
		);

		$pricing_tables_period_font_style = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_period_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"pricing_tables_period_font_style",
			$pricing_tables_period_font_style
		);

		$pricing_tables_period_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_period_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"pricing_tables_period_font_weight",
			$pricing_tables_period_font_weight
		);

		$pricing_tables_period_letter_spacing = new StockholmQodeField(
			"textsimple",
			"pricing_tables_period_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_period_letter_spacing",
			$pricing_tables_period_letter_spacing
		);

		$group5 = new StockholmQodeGroup(
			esc_html__( "Pricing tables price", 'stockholm' ),
			esc_html__( "Define Pricing Tables Price Style.", 'stockholm' )
		);
		$panel12->addChild(
			"group5",
			$group5
		);
		$row1 = new StockholmQodeRow();
		$group5->addChild(
			"row1",
			$row1
		);

		$pricing_tables_price_color = new StockholmQodeField(
			"colorsimple",
			"pricing_tables_price_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_price_color",
			$pricing_tables_price_color
		);

		$pricing_tables_price_font_size = new StockholmQodeField(
			"textsimple",
			"pricing_tables_price_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_price_font_size",
			$pricing_tables_price_font_size
		);

		$pricing_tables_price_line_height = new StockholmQodeField(
			"textsimple",
			"pricing_tables_price_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_price_line_height",
			$pricing_tables_price_line_height
		);

		$pricing_tables_price_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_price_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"pricing_tables_price_text_transform",
			$pricing_tables_price_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group5->addChild(
			"row2",
			$row2
		);

		$pricing_tables_price_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"pricing_tables_price_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_price_font_family",
			$pricing_tables_price_font_family
		);

		$pricing_tables_price_font_style = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_price_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"pricing_tables_price_font_style",
			$pricing_tables_price_font_style
		);

		$pricing_tables_price_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_price_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"pricing_tables_price_font_weight",
			$pricing_tables_price_font_weight
		);

		$pricing_tables_price_letter_spacing = new StockholmQodeField(
			"textsimple",
			"pricing_tables_price_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_price_letter_spacing",
			$pricing_tables_price_letter_spacing
		);

		$group6 = new StockholmQodeGroup(
			esc_html__( "Pricing tables currency", 'stockholm' ),
			esc_html__( "Define Pricing tables currency style.", 'stockholm' )
		);
		$panel12->addChild(
			"group6",
			$group6
		);
		$row1 = new StockholmQodeRow();
		$group6->addChild(
			"row1",
			$row1
		);

		$pricing_tables_currency_color = new StockholmQodeField(
			"colorsimple",
			"pricing_tables_currency_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_currency_color",
			$pricing_tables_currency_color
		);

		$pricing_tables_currency_font_size = new StockholmQodeField(
			"textsimple",
			"pricing_tables_currency_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_currency_font_size",
			$pricing_tables_currency_font_size
		);

		$pricing_tables_currency_line_height = new StockholmQodeField(
			"textsimple",
			"pricing_tables_currency_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_currency_line_height",
			$pricing_tables_currency_line_height
		);

		$pricing_tables_currency_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_currency_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"pricing_tables_currency_text_transform",
			$pricing_tables_currency_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group6->addChild(
			"row2",
			$row2
		);

		$pricing_tables_currency_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"pricing_tables_currency_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_currency_font_family",
			$pricing_tables_currency_font_family
		);

		$pricing_tables_currency_font_style = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_currency_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"pricing_tables_currency_font_style",
			$pricing_tables_currency_font_style
		);

		$pricing_tables_currency_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_currency_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"pricing_tables_currency_font_weight",
			$pricing_tables_currency_font_weight
		);

		$pricing_tables_currency_letter_spacing = new StockholmQodeField(
			"textsimple",
			"pricing_tables_currency_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_currency_letter_spacing",
			$pricing_tables_currency_letter_spacing
		);

		$group7 = new StockholmQodeGroup(
			esc_html__( "Pricing tables button", 'stockholm' ),
			esc_html__( "Define Pricing tables button style.", 'stockholm' )
		);
		$panel12->addChild(
			"group7",
			$group7
		);
		$row1 = new StockholmQodeRow();
		$group7->addChild(
			"row1",
			$row1
		);

		$pricing_tables_button_color = new StockholmQodeField(
			"colorsimple",
			"pricing_tables_button_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_button_color",
			$pricing_tables_button_color
		);

		$pricing_tables_button_font_size = new StockholmQodeField(
			"textsimple",
			"pricing_tables_button_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_button_font_size",
			$pricing_tables_button_font_size
		);

		$pricing_tables_button_line_height = new StockholmQodeField(
			"textsimple",
			"pricing_tables_button_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_tables_button_line_height",
			$pricing_tables_button_line_height
		);

		$pricing_tables_button_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_button_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"pricing_tables_button_text_transform",
			$pricing_tables_button_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group7->addChild(
			"row2",
			$row2
		);

		$pricing_tables_button_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"pricing_tables_button_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_button_font_family",
			$pricing_tables_button_font_family
		);

		$pricing_tables_button_font_style = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_button_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"pricing_tables_button_font_style",
			$pricing_tables_button_font_style
		);

		$pricing_tables_button_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"pricing_tables_button_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"pricing_tables_button_font_weight",
			$pricing_tables_button_font_weight
		);

		$pricing_tables_button_letter_spacing = new StockholmQodeField(
			"textsimple",
			"pricing_tables_button_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"pricing_tables_button_letter_spacing",
			$pricing_tables_button_letter_spacing
		);

		//Pricing list

		$panel19 = new StockholmQodePanel(
			esc_html__( "Pricing Lists", 'stockholm' ),
			"pricing_list_panel"
		);
		$elementsPage->addChild(
			"panel19",
			$panel19
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Pricing lists title", 'stockholm' ),
			esc_html__( "Define Pricing lists title style.", 'stockholm' )
		);
		$panel19->addChild(
			"group1",
			$group1
		);

		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$pricing_lists_title_color = new StockholmQodeField(
			"colorsimple",
			"pricing_lists_title_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_title_color",
			$pricing_lists_title_color
		);

		$pricing_lists_title_font_size = new StockholmQodeField(
			"textsimple",
			"pricing_lists_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_title_font_size",
			$pricing_lists_title_font_size
		);

		$pricing_lists_title_line_height = new StockholmQodeField(
			"textsimple",
			"pricing_lists_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_title_line_height",
			$pricing_lists_title_line_height
		);

		$pricing_lists_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"pricing_lists_title_text_transform",
			$pricing_lists_title_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$pricing_lists_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"pricing_lists_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"pricing_lists_title_font_family",
			$pricing_lists_title_font_family
		);

		$pricing_lists_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"pricing_lists_title_font_style",
			$pricing_lists_title_font_style
		);

		$pricing_lists_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"pricing_lists_title_font_weight",
			$pricing_lists_title_font_weight
		);

		$pricing_lists_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"pricing_lists_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"pricing_lists_title_letter_spacing",
			$pricing_lists_title_letter_spacing
		);

		$group2 = new StockholmQodeGroup(
			esc_html__( "Pricing lists price", 'stockholm' ),
			esc_html__( "Define Pricing lists Price Style.", 'stockholm' )
		);
		$panel19->addChild(
			"group2",
			$group2
		);

		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);

		$pricing_lists_price_color = new StockholmQodeField(
			"colorsimple",
			"pricing_lists_price_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_price_color",
			$pricing_lists_price_color
		);

		$pricing_lists_price_font_size = new StockholmQodeField(
			"textsimple",
			"pricing_lists_price_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_price_font_size",
			$pricing_lists_price_font_size
		);

		$pricing_lists_price_line_height = new StockholmQodeField(
			"textsimple",
			"pricing_lists_price_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_price_line_height",
			$pricing_lists_price_line_height
		);

		$pricing_lists_price_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_price_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"pricing_lists_price_text_transform",
			$pricing_lists_price_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);

		$pricing_lists_price_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"pricing_lists_price_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"pricing_lists_price_font_family",
			$pricing_lists_price_font_family
		);

		$pricing_lists_price_font_style = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_price_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"pricing_lists_price_font_style",
			$pricing_lists_price_font_style
		);

		$pricing_lists_price_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_price_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"pricing_lists_price_font_weight",
			$pricing_lists_price_font_weight
		);

		$pricing_lists_price_letter_spacing = new StockholmQodeField(
			"textsimple",
			"pricing_lists_price_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"pricing_lists_price_letter_spacing",
			$pricing_lists_price_letter_spacing
		);

		$group3 = new StockholmQodeGroup(
			esc_html__( "Pricing lists text", 'stockholm' ),
			esc_html__( "DefinePricing lists text style.", 'stockholm' )
		);
		$panel19->addChild(
			"group3",
			$group3
		);

		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);

		$pricing_lists_text_color = new StockholmQodeField(
			"colorsimple",
			"pricing_lists_text_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_text_color",
			$pricing_lists_text_color
		);

		$pricing_lists_text_font_size = new StockholmQodeField(
			"textsimple",
			"pricing_lists_text_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_text_font_size",
			$pricing_lists_text_font_size
		);

		$pricing_lists_text_line_height = new StockholmQodeField(
			"textsimple",
			"pricing_lists_text_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_text_line_height",
			$pricing_lists_text_line_height
		);

		$pricing_lists_text_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_text_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"pricing_lists_text_text_transform",
			$pricing_lists_text_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);

		$pricing_lists_text_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"pricing_lists_text_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"pricing_lists_text_font_family",
			$pricing_lists_text_font_family
		);

		$pricing_lists_text_font_style = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_text_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"pricing_lists_text_font_style",
			$pricing_lists_text_font_style
		);

		$pricing_lists_text_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_text_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"pricing_lists_text_font_weight",
			$pricing_lists_text_font_weight
		);

		$pricing_lists_text_letter_spacing = new StockholmQodeField(
			"textsimple",
			"pricing_lists_text_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"pricing_lists_text_letter_spacing",
			$pricing_lists_text_letter_spacing
		);

		$group4 = new StockholmQodeGroup(
			esc_html__( "Pricing lists highlighted text", 'stockholm' ),
			esc_html__( "DefinePricing lists highlighted text style.", 'stockholm' )
		);
		$panel19->addChild(
			"group4",
			$group4
		);

		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);

		$pricing_lists_highlighted_text_color = new StockholmQodeField(
			"colorsimple",
			"pricing_lists_highlighted_text_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_highlighted_text_color",
			$pricing_lists_highlighted_text_color
		);

		$pricing_lists_highlighted_text_font_size = new StockholmQodeField(
			"textsimple",
			"pricing_lists_highlighted_text_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_highlighted_text_font_size",
			$pricing_lists_highlighted_text_font_size
		);

		$pricing_lists_highlighted_text_line_height = new StockholmQodeField(
			"textsimple",
			"pricing_lists_highlighted_text_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"pricing_lists_highlighted_text_line_height",
			$pricing_lists_highlighted_text_line_height
		);

		$pricing_lists_highlighted_text_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_highlighted_text_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"pricing_lists_highlighted_text_text_transform",
			$pricing_lists_highlighted_text_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);

		$pricing_lists_highlighted_text_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"pricing_lists_highlighted_text_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"pricing_lists_highlighted_text_font_family",
			$pricing_lists_highlighted_text_font_family
		);

		$pricing_lists_highlighted_text_font_style = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_highlighted_text_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"pricing_lists_highlighted_text_font_style",
			$pricing_lists_highlighted_text_font_style
		);

		$pricing_lists_highlighted_text_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"pricing_lists_highlighted_text_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"pricing_lists_highlighted_text_font_weight",
			$pricing_lists_highlighted_text_font_weight
		);

		$pricing_lists_highlighted_text_letter_spacing = new StockholmQodeField(
			"textsimple",
			"pricing_lists_highlighted_text_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"pricing_lists_highlighted_text_letter_spacing",
			$pricing_lists_highlighted_text_letter_spacing
		);

		$row3 = new StockholmQodeRow();
		$group4->addChild(
			"row3",
			$row3
		);

		$pricing_lists_highlighted_background_color = new StockholmQodeField(
			"colorsimple",
			"pricing_lists_highlighted_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row3->addChild(
			"pricing_lists_highlighted_background_color",
			$pricing_lists_highlighted_background_color
		);

		//Separators

		$panel13 = new StockholmQodePanel(
			esc_html__( "Separators", 'stockholm' ),
			"separators_panel"
		);
		$elementsPage->addChild(
			"panel13",
			$panel13
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Normal", 'stockholm' ),
			esc_html__( 'Define styles for separator of type "Normal"', 'stockholm' )
		);
		$panel13->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$separator_color = new StockholmQodeField(
			"colorsimple",
			"separator_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"separator_color",
			$separator_color
		);

		$separator_thickness = new StockholmQodeField(
			"textsimple",
			"separator_thickness",
			"",
			esc_html__( "Thickness (px)", 'stockholm' )
		);
		$row1->addChild(
			"separator_thickness",
			$separator_thickness
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$separator_topmargin = new StockholmQodeField(
			"textsimple",
			"separator_topmargin",
			"",
			esc_html__( "Top Margin (px)", 'stockholm' )
		);
		$row2->addChild(
			"separator_topmargin",
			$separator_topmargin
		);

		$separator_bottommargin = new StockholmQodeField(
			"textsimple",
			"separator_bottommargin",
			"",
			esc_html__( "Bottom Margin (px)", 'stockholm' )
		);
		$row2->addChild(
			"separator_bottommargin",
			$separator_bottommargin
		);

		$separator_type = new StockholmQodeField(
			"selectsimple",
			"separator_type",
			"",
			esc_html__( "Separator type", 'stockholm' ),
			"",
			array(
				""       => "",
				"solid" => esc_html__( "Solid", 'stockholm' ),
				"dashed" => esc_html__( "Dashed", 'stockholm' )
			)
		);
		$row2->addChild(
			"separator_type",
			$separator_type
		);

		$group2 = new StockholmQodeGroup(
			esc_html__( "Small", 'stockholm' ),
			esc_html__( 'Define styles for separator of type "Small"', 'stockholm' )
		);
		$panel13->addChild(
			"group2",
			$group2
		);
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);

		$separator_small_color = new StockholmQodeField(
			"colorsimple",
			"separator_small_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"separator_small_color",
			$separator_small_color
		);

		$separator_small_thickness = new StockholmQodeField(
			"textsimple",
			"separator_small_thickness",
			"",
			esc_html__( "Thickness (px)", 'stockholm' )
		);
		$row1->addChild(
			"separator_small_thickness",
			$separator_small_thickness
		);

		$separator_small_width = new StockholmQodeField(
			"textsimple",
			"separator_small_width",
			"",
			esc_html__( "Width (px)", 'stockholm' )
		);
		$row1->addChild(
			"separator_small_width",
			$separator_small_width
		);

		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);

		$separator_small_topmargin = new StockholmQodeField(
			"textsimple",
			"separator_small_topmargin",
			"",
			esc_html__( "Top Margin (px)", 'stockholm' )
		);
		$row2->addChild(
			"separator_small_topmargin",
			$separator_small_topmargin
		);

		$separator_small_bottommargin = new StockholmQodeField(
			"textsimple",
			"separator_small_bottommargin",
			"",
			esc_html__( "Bottom Margin (px)", 'stockholm' )
		);
		$row2->addChild(
			"separator_small_bottommargin",
			$separator_small_bottommargin
		);

		$separator_small_type = new StockholmQodeField(
			"selectsimple",
			"separator_small_type",
			"",
			esc_html__( "Separator type", 'stockholm' ),
			"",
			array(
				""       => "",
				"solid" => esc_html__( "Solid", 'stockholm' ),
				"dashed" => esc_html__( "Dashed", 'stockholm' )
			)
		);
		$row2->addChild(
			"separator_small_type",
			$separator_small_type
		);

		//Slider Navigation

		$panel9 = new StockholmQodePanel(
			esc_html__( "Slider Navigation", 'stockholm' ),
			"navigation_panel"
		);
		$elementsPage->addChild(
			"panel9",
			$panel9
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Navigation Style", 'stockholm' ),
			esc_html__( "Define navigation styles for element sliders", 'stockholm' )
		);
		$panel9->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$navigation_arrow_size = new StockholmQodeField(
			"textsimple",
			"navigation_arrow_size",
			"14",
			esc_html__( "Icon Arrow Size (px)", 'stockholm' ),
			esc_html__( "Default value is 14	", 'stockholm' )
		);
		$row1->addChild(
			"navigation_arrow_size",
			$navigation_arrow_size
		);

		$navigation_arrow_color = new StockholmQodeField(
			"colorsimple",
			"navigation_arrow_color",
			"",
			esc_html__( "Arrow Color", 'stockholm' )
		);
		$row1->addChild(
			"navigation_arrow_color",
			$navigation_arrow_color
		);

		$navigation_arrow_hover_color = new StockholmQodeField(
			"colorsimple",
			"navigation_arrow_hover_color",
			"",
			esc_html__( "Arrow Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"navigation_arrow_hover_color",
			$navigation_arrow_hover_color
		);

		$navigation_background_color = new StockholmQodeField(
			"colorsimple",
			"navigation_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row1->addChild(
			"navigation_background_color",
			$navigation_background_color
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$navigation_background_hover_color = new StockholmQodeField(
			"colorsimple",
			"navigation_background_hover_color",
			"",
			esc_html__( "Background Hover Color", 'stockholm' )
		);
		$row2->addChild(
			"navigation_background_hover_color",
			$navigation_background_hover_color
		);

		$navigation_border_color = new StockholmQodeField(
			"colorsimple",
			"navigation_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);
		$row2->addChild(
			"navigation_border_color",
			$navigation_border_color
		);

		$navigation_border_hover_color = new StockholmQodeField(
			"colorsimple",
			"navigation_border_hover_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' )
		);
		$row2->addChild(
			"navigation_border_hover_color",
			$navigation_border_hover_color
		);

		$navigation_border_width = new StockholmQodeField(
			"textsimple",
			"navigation_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' )
		);
		$row2->addChild(
			"navigation_border_width",
			$navigation_border_width
		);

		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);
		$navigation_width = new StockholmQodeField(
			"textsimple",
			"navigation_width",
			"",
			esc_html__( "Width (px)", 'stockholm' )
		);
		$row3->addChild(
			"navigation_width",
			$navigation_width
		);

		$navigation_height = new StockholmQodeField(
			"textsimple",
			"navigation_height",
			"",
			esc_html__( "Height (px)", 'stockholm' )
		);
		$row3->addChild(
			"navigation_height",
			$navigation_height
		);

		$group2 = new StockholmQodeGroup(
			esc_html__( "Full Screen Navigation Style", 'stockholm' ),
			esc_html__( "Define styles for Full Screen Section template navigation", 'stockholm' )
		);
		$panel9->addChild(
			"group2",
			$group2
		);
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);

		$fs_navigation_arrow_size = new StockholmQodeField(
			"textsimple",
			"fs_navigation_arrow_size",
			"",
			esc_html__( "Icon Arrow Size (px)", 'stockholm' ),
			esc_html__( "Default value is 50.", 'stockholm' )
		);
		$row1->addChild(
			"fs_navigation_arrow_size",
			$fs_navigation_arrow_size
		);

		$fs_navigation_arrow_color = new StockholmQodeField(
			"colorsimple",
			"fs_navigation_arrow_color",
			"",
			esc_html__( "Arrow Color", 'stockholm' )
		);
		$row1->addChild(
			"fs_navigation_arrow_color",
			$fs_navigation_arrow_color
		);

		$fs_navigation_arrow_hover_color = new StockholmQodeField(
			"colorsimple",
			"fs_navigation_arrow_hover_color",
			"",
			esc_html__( "Arrow Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"fs_navigation_arrow_hover_color",
			$fs_navigation_arrow_hover_color
		);

		//Social Icon

		$panel14 = new StockholmQodePanel(
			esc_html__( "Social Icon", 'stockholm' ),
			"social_icon_panel"
		);
		$elementsPage->addChild(
			"panel14",
			$panel14
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Normal Icons", 'stockholm' ),
			esc_html__( "Define Normal Social Icons style", 'stockholm' )
		);
		$panel14->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$social_color = new StockholmQodeField(
			"colorsimple",
			"social_color",
			"",
			esc_html__( "Icon Color", 'stockholm' )
		);
		$row1->addChild(
			"social_color",
			$social_color
		);

		$social_hover_color = new StockholmQodeField(
			"colorsimple",
			"social_hover_color",
			"",
			esc_html__( "Icon Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"social_hover_color",
			$social_hover_color
		);

		$group2 = new StockholmQodeGroup(
			esc_html__( "Social circle/square Icon", 'stockholm' ),
			esc_html__( "Define Social circle/square Icons style", 'stockholm' )
		);
		$panel14->addChild(
			"group2",
			$group2
		);
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);

		$social_icon_color = new StockholmQodeField(
			"colorsimple",
			"social_icon_color",
			"",
			esc_html__( "Icon Color", 'stockholm' )
		);
		$row1->addChild(
			"social_icon_color",
			$social_icon_color
		);

		$social_icon_hover_color = new StockholmQodeField(
			"colorsimple",
			"social_icon_hover_color",
			"",
			esc_html__( "Icon Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"social_icon_hover_color",
			$social_icon_hover_color
		);

		$social_icon_background_color = new StockholmQodeField(
			"colorsimple",
			"social_icon_background_color",
			"",
			esc_html__( "Icon Background Color", 'stockholm' )
		);
		$row1->addChild(
			"social_icon_background_color",
			$social_icon_background_color
		);

		$social_icon_hover_background_color = new StockholmQodeField(
			"colorsimple",
			"social_icon_hover_background_color",
			"",
			esc_html__( "Icon Hover Background Color", 'stockholm' )
		);
		$row1->addChild(
			"social_icon_hover_background_color",
			$social_icon_hover_background_color
		);

		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);

		$social_icon_border_color = new StockholmQodeField(
			"colorsimple",
			"social_icon_border_color",
			"",
			esc_html__( "Icon Border Color", 'stockholm' )
		);
		$row2->addChild(
			"social_icon_border_color",
			$social_icon_border_color
		);

		$social_icon_hover_border_color = new StockholmQodeField(
			"colorsimple",
			"social_icon_hover_border_color",
			"",
			esc_html__( "Icon Hover Border Color", 'stockholm' )
		);
		$row2->addChild(
			"social_icon_hover_border_color",
			$social_icon_hover_border_color
		);

		//Tabs Panel

		$panel15 = new StockholmQodePanel(
			esc_html__( "Tabs", 'stockholm' ),
			"tabs_panel"
		);
		$elementsPage->addChild(
			"panel15",
			$panel15
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Tabs style", 'stockholm' ),
			esc_html__( "Define Tabs style", 'stockholm' )
		);
		$panel15->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$tabs_text_size = new StockholmQodeField(
			"textsimple",
			"tabs_text_size",
			"",
			esc_html__( "Tab text Size", 'stockholm' )
		);
		$row1->addChild(
			"tabs_text_size",
			$tabs_text_size
		);

		$tabs_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"tabs_fontweight",
			"",
			esc_html__( "Tab Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row1->addChild(
			"tabs_fontweight",
			$tabs_fontweight
		);

		$tabs_nav_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"tabs_nav_font_family",
			"-1",
			esc_html__( "Tabs navigation font family", 'stockholm' )
		);
		$row1->addChild(
			"tabs_nav_font_family",
			$tabs_nav_font_family
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$tab_text_color = new StockholmQodeField(
			"colorsimple",
			"tab_text_color",
			"",
			esc_html__( "Tab text color", 'stockholm' )
		);
		$row2->addChild(
			"tab_text_color",
			$tab_text_color
		);

		$tab_background_color = new StockholmQodeField(
			"colorsimple",
			"tab_background_color",
			"",
			esc_html__( "Tab background color", 'stockholm' )
		);
		$row2->addChild(
			"tab_background_color",
			$tab_background_color
		);

		$tab_active_text_color = new StockholmQodeField(
			"colorsimple",
			"tab_active_text_color",
			"",
			esc_html__( "Active tab text color", 'stockholm' )
		);
		$row2->addChild(
			"tab_active_text_color",
			$tab_active_text_color
		);

		$tab_active_background_color = new StockholmQodeField(
			"colorsimple",
			"tab_active_background_color",
			"",
			esc_html__( "Active tab background color", 'stockholm' )
		);
		$row2->addChild(
			"tab_active_background_color",
			$tab_active_background_color
		);

		$tab_text_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"tab_text_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"tab_text_text_transform",
			$tab_text_text_transform
		);

		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);

		$tab_bottom_border_color = new StockholmQodeField(
			"colorsimple",
			"tab_bottom_border_color",
			"",
			esc_html__( "Tab bottom border color", 'stockholm' )
		);
		$row2->addChild(
			"tab_bottom_border_color",
			$tab_bottom_border_color
		);

		$group2 = new StockholmQodeGroup(
			esc_html__( "Tabs content style", 'stockholm' ),
			esc_html__( "Define content styles for Tabs", 'stockholm' )
		);
		$panel15->addChild(
			"group2",
			$group2
		);
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);

		$tabs_content_text_size = new StockholmQodeField(
			"textsimple",
			"tabs_content_text_size",
			"",
			esc_html__( "Tab content text Size", 'stockholm' )
		);
		$row1->addChild(
			"tabs_content_text_size",
			$tabs_content_text_size
		);

		$tabs_content_background_color = new StockholmQodeField(
			"colorsimple",
			"tabs_content_background_color",
			"",
			esc_html__( "Tab content background color", 'stockholm' )
		);
		$row1->addChild(
			"tabs_content_background_color",
			$tabs_content_background_color
		);

		//Tags

		$panel18 = new StockholmQodePanel(
			esc_html__( "Tags", 'stockholm' ),
			"tags_panel"
		);
		$elementsPage->addChild(
			"panel18",
			$panel18
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Tags style", 'stockholm' ),
			esc_html__( "Define Tags style", 'stockholm' )
		);
		$panel18->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$tags_color = new StockholmQodeField(
			"colorsimple",
			"tags_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"tags_color",
			$tags_color
		);

		$tags_font_size = new StockholmQodeField(
			"textsimple",
			"tags_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"tags_font_size",
			$tags_font_size
		);

		$tags_line_height = new StockholmQodeField(
			"textsimple",
			"tags_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"tags_line_height",
			$tags_line_height
		);

		$tags_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"tags_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"tags_text_transform",
			$tags_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$tags_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"tags_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"tags_font_family",
			$tags_font_family
		);

		$tags_font_style = new StockholmQodeField(
			"selectblanksimple",
			"tags_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"tags_font_style",
			$tags_font_style
		);

		$tags_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"tags_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"tags_font_weight",
			$tags_font_weight
		);

		$tags_letter_spacing = new StockholmQodeField(
			"textsimple",
			"tags_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"tags_letter_spacing",
			$tags_letter_spacing
		);

		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);

		$tags_hover_color = new StockholmQodeField(
			"colorsimple",
			"tags_hover_color",
			"",
			esc_html__( "Hover color", 'stockholm' )
		);
		$row3->addChild(
			"tags_hover_color",
			$tags_hover_color
		);

		$tags_background_color = new StockholmQodeField(
			"colorsimple",
			"tags_background_color",
			"",
			esc_html__( "Background color", 'stockholm' )
		);
		$row3->addChild(
			"tags_background_color",
			$tags_background_color
		);

		$tags_background_hover_color = new StockholmQodeField(
			"colorsimple",
			"tags_background_hover_color",
			"",
			esc_html__( "Hover background color", 'stockholm' )
		);
		$row3->addChild(
			"tags_background_hover_color",
			$tags_background_hover_color
		);

		$tags_border_color = new StockholmQodeField(
			"colorsimple",
			"tags_border_color",
			"",
			esc_html__( "Border color", 'stockholm' )
		);
		$row3->addChild(
			"tags_border_color",
			$tags_border_color
		);

		$row4 = new StockholmQodeRow( true );
		$group1->addChild(
			"row4",
			$row4
		);

		$tags_border_hover_color = new StockholmQodeField(
			"colorsimple",
			"tags_border_hover_color",
			"",
			esc_html__( "Hover Border color", 'stockholm' )
		);
		$row4->addChild(
			"tags_border_hover_color",
			$tags_border_hover_color
		);

		$tags_border_width = new StockholmQodeField(
			"textsimple",
			"tags_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' )
		);
		$row4->addChild(
			"tags_border_width",
			$tags_border_width
		);

		//Testimonials

		$panel16 = new StockholmQodePanel(
			esc_html__( "Testimonials", 'stockholm' ),
			"testimonials_panel"
		);
		$elementsPage->addChild(
			"panel16",
			$panel16
		);

		$group4 = new StockholmQodeGroup(
			esc_html__( "Testimonials Title Style", 'stockholm' ),
			esc_html__( "Define Testimonials Title style", 'stockholm' )
		);
		$panel16->addChild(
			"group4",
			$group4
		);
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);

		$testimonials_title_color = new StockholmQodeField(
			"colorsimple",
			"testimonials_title_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"testimonials_title_color",
			$testimonials_title_color
		);

		$testimonials_title_font_size = new StockholmQodeField(
			"textsimple",
			"testimonials_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"testimonials_title_font_size",
			$testimonials_title_font_size
		);

		$testimonials_title_line_height = new StockholmQodeField(
			"textsimple",
			"testimonials_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"testimonials_title_line_height",
			$testimonials_title_line_height
		);

		$testimonials_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"testimonials_title_text_transform",
			$testimonials_title_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);

		$testimonials_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"testimonials_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"testimonials_title_font_family",
			$testimonials_title_font_family
		);

		$testimonials_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"testimonials_title_font_style",
			$testimonials_title_font_style
		);

		$testimonials_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"testimonials_title_font_weight",
			$testimonials_title_font_weight
		);

		$testimonials_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"testimonials_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"testimonials_title_letter_spacing",
			$testimonials_title_letter_spacing
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Testimonials Text Style", 'stockholm' ),
			esc_html__( "Define Testimonials Text style", 'stockholm' )
		);
		$panel16->addChild(
			"group1",
			$group1
		);
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);

		$testimonials_text_color = new StockholmQodeField(
			"colorsimple",
			"testimonials_text_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);
		$row1->addChild(
			"testimonials_text_color",
			$testimonials_text_color
		);

		$testimonials_text_font_size = new StockholmQodeField(
			"textsimple",
			"testimonials_text_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"testimonials_text_font_size",
			$testimonials_text_font_size
		);

		$testimonials_text_line_height = new StockholmQodeField(
			"textsimple",
			"testimonials_text_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"testimonials_text_line_height",
			$testimonials_text_line_height
		);

		$testimonials_text_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_text_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"testimonials_text_text_transform",
			$testimonials_text_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);

		$testimonials_text_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"testimonials_text_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"testimonials_text_font_family",
			$testimonials_text_font_family
		);

		$testimonials_text_font_style = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_text_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"testimonials_text_font_style",
			$testimonials_text_font_style
		);

		$testimonials_text_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_text_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"testimonials_text_font_weight",
			$testimonials_text_font_weight
		);

		$testimonials_text_letter_spacing = new StockholmQodeField(
			"textsimple",
			"testimonials_text_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"testimonials_text_letter_spacing",
			$testimonials_text_letter_spacing
		);

		$group2 = new StockholmQodeGroup(
			esc_html__( "Testimonials Author Style", 'stockholm' ),
			esc_html__( "Define Testimonials Author style", 'stockholm' )
		);
		$panel16->addChild(
			"group2",
			$group2
		);
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);

		$testimonials_author_color = new StockholmQodeField(
			"colorsimple",
			"testimonials_author_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);

		$row1->addChild(
			"testimonials_author_color",
			$testimonials_author_color
		);

		$testimonials_author_font_size = new StockholmQodeField(
			"textsimple",
			"testimonials_author_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);

		$row1->addChild(
			"testimonials_author_font_size",
			$testimonials_author_font_size
		);

		$testimonials_author_line_height = new StockholmQodeField(
			"textsimple",
			"testimonials_author_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);

		$row1->addChild(
			"testimonials_author_line_height",
			$testimonials_author_line_height
		);

		$testimonials_author_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_author_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"testimonials_author_text_transform",
			$testimonials_author_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);

		$testimonials_author_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"testimonials_author_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);

		$row2->addChild(
			"testimonials_author_font_family",
			$testimonials_author_font_family
		);

		$testimonials_author_font_style = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_author_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);

		$row2->addChild(
			"testimonials_author_font_style",
			$testimonials_author_font_style
		);

		$testimonials_author_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_author_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);

		$row2->addChild(
			"testimonials_author_font_weight",
			$testimonials_author_font_weight
		);

		$testimonials_author_letter_spacing = new StockholmQodeField(
			"textsimple",
			"testimonials_author_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);

		$row2->addChild(
			"testimonials_author_letter_spacing",
			$testimonials_author_letter_spacing
		);

		$group5 = new StockholmQodeGroup(
			esc_html__( "Testimonials Author Job Style", 'stockholm' ),
			esc_html__( "Define Testimonials Author Job Position style", 'stockholm' )
		);

		$panel16->addChild(
			"group5",
			$group5
		);

		$row1 = new StockholmQodeRow();
		$group5->addChild(
			"row1",
			$row1
		);

		$testimonials_author_job_color = new StockholmQodeField(
			"colorsimple",
			"testimonials_author_job_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);

		$row1->addChild(
			"testimonials_author_job_color",
			$testimonials_author_job_color
		);

		$testimonials_author_job_font_size = new StockholmQodeField(
			"textsimple",
			"testimonials_author_job_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);

		$row1->addChild(
			"testimonials_author_job_font_size",
			$testimonials_author_job_font_size
		);

		$testimonials_author_job_line_height = new StockholmQodeField(
			"textsimple",
			"testimonials_author_job_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);

		$row1->addChild(
			"testimonials_author_job_line_height",
			$testimonials_author_job_line_height
		);

		$testimonials_author_job_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_author_job_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);

		$row1->addChild(
			"testimonials_author_job_text_transform",
			$testimonials_author_job_text_transform
		);

		$row2 = new StockholmQodeRow( true );
		$group5->addChild(
			"row2",
			$row2
		);

		$testimonials_auhtor_job_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"testimonials_author_job_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);

		$row2->addChild(
			"testimonials_author_job_font_family",
			$testimonials_auhtor_job_font_family
		);

		$testimonials_author_job_font_style = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_author_job_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);

		$row2->addChild(
			"testimonials_author_job_font_style",
			$testimonials_author_job_font_style
		);

		$testimonials_author_job_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"testimonials_author_job_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);

		$row2->addChild(
			"testimonials_author_job_font_weight",
			$testimonials_author_job_font_weight
		);

		$testimonials_author_job_letter_spacing = new StockholmQodeField(
			"textsimple",
			"testimonials_author_job_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);

		$row2->addChild(
			"testimonials_author_job_letter_spacing",
			$testimonials_author_job_letter_spacing
		);

		$group3 = new StockholmQodeGroup(
			esc_html__( "Testimonials Navigation Style", 'stockholm' ),
			esc_html__( "Define Testimonials Navigation Style", 'stockholm' )
		);

		$panel16->addChild(
			"group3",
			$group3
		);

		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);

		$testimonials_navigation_color = new StockholmQodeField(
			"colorsimple",
			"testimonials_navigation_color",
			"",
			esc_html__( "Color", 'stockholm' )
		);

		$row1->addChild(
			"testimonials_navigation_color",
			$testimonials_navigation_color
		);

		$testimonials_navigation_active_color = new StockholmQodeField(
			"colorsimple",
			"testimonials_navigation_active_color",
			"",
			esc_html__( "Active Color", 'stockholm' )
		);

		$row1->addChild(
			"testimonials_navigation_active_color",
			$testimonials_navigation_active_color
		);

		$testimonaials_navigation_border_radius = new StockholmQodeField(
			"textsimple",
			"testimonaials_navigation_border_radius",
			"",
			esc_html__( "Border radius (px)", 'stockholm' )
		);

		$row1->addChild(
			"testimonaials_navigation_border_radius",
			$testimonaials_navigation_border_radius
		);

		$group6 = new StockholmQodeGroup(
			esc_html__( "Grouped Testimonials Style", 'stockholm' ),
			esc_html__( "Define Basic Layout for Grouped Testimonial Type", 'stockholm' )
		);

		$panel16->addChild(
			"group6",
			$group6
		);

		$row1 = new StockholmQodeRow();
		$group6->addChild(
			"row1",
			$row1
		);

		$testimonials_grouped_background_color = new StockholmQodeField(
			"colorsimple",
			"testimonials_grouped_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);

		$row1->addChild(
			"testimonials_grouped_background_color",
			$testimonials_grouped_background_color
		);

		$testimonials_grouped_background_transparency = new StockholmQodeField(
			"textsimple",
			"testimonials_grouped_background_transparency",
			"",
			esc_html__( "Transparency", 'stockholm' )
		);

		$row1->addChild(
			"testimonials_grouped_background_transparency",
			$testimonials_grouped_background_transparency
		);

		$row2 = new StockholmQodeRow();
		$group6->addChild(
			"row2",
			$row2
		);

		$testimonials_grouped_border_color = new StockholmQodeField(
			"colorsimple",
			"testimonials_grouped_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' )
		);

		$row2->addChild(
			"testimonials_grouped_border_color",
			$testimonials_grouped_border_color
		);

		$testimonials_grouped_border_width = new StockholmQodeField(
			"textsimple",
			"testimonials_grouped_border_width",
			"",
			esc_html__( "Border Width", 'stockholm' )
		);

		$row2->addChild(
			"testimonials_grouped_border_width",
			$testimonials_grouped_border_width
		);

		do_action( 'stockholm_qode_action_options_elements_page_map' );
	}

	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_elements_options_map', 70 );
}