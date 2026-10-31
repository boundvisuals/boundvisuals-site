<?php
if ( ! function_exists( 'stockholm_qode_fonts_options_map' ) ) {
	/**
	 * Fonts options page
	 */
	function stockholm_qode_fonts_options_map() {
		
		$fontsPage = new StockholmQodeAdminPage(
			"5",
			esc_html__( "Fonts", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"fonts",
			$fontsPage
		);
		
		// Headings
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Headings", 'stockholm' ),
			"headings_panel"
		);
		$fontsPage->addChild(
			"panel1",
			$panel1
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "H1 Style", 'stockholm' ),
			esc_html__( "Define styles for H1 heading", 'stockholm' )
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
		$h1_color = new StockholmQodeField(
			"colorsimple",
			"h1_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"h1_color",
			$h1_color
		);
		$h1_fontsize = new StockholmQodeField(
			"textsimple",
			"h1_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"h1_fontsize",
			$h1_fontsize
		);
		$h1_lineheight = new StockholmQodeField(
			"textsimple",
			"h1_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"h1_lineheight",
			$h1_lineheight
		);
		$h1_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"h1_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"h1_texttransform",
			$h1_texttransform
		);
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$h1_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"h1_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"h1_google_fonts",
			$h1_google_fonts
		);
		$h1_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"h1_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"h1_fontstyle",
			$h1_fontstyle
		);
		$h1_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"h1_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"h1_fontweight",
			$h1_fontweight
		);
		$h1_letterspacing = new StockholmQodeField(
			"textsimple",
			"h1_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"h1_letterspacing",
			$h1_letterspacing
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "H2 Style", 'stockholm' ),
			esc_html__( "Define styles for H2 heading", 'stockholm' )
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
		$h2_color = new StockholmQodeField(
			"colorsimple",
			"h2_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"h2_color",
			$h2_color
		);
		$h2_fontsize = new StockholmQodeField(
			"textsimple",
			"h2_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"h2_fontsize",
			$h2_fontsize
		);
		$h2_lineheight = new StockholmQodeField(
			"textsimple",
			"h2_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"h2_lineheight",
			$h2_lineheight
		);
		$h2_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"h2_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"h2_texttransform",
			$h2_texttransform
		);
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$h2_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"h2_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"h2_google_fonts",
			$h2_google_fonts
		);
		$h2_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"h2_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"h2_fontstyle",
			$h2_fontstyle
		);
		$h2_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"h2_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"h2_fontweight",
			$h2_fontweight
		);
		$h2_letterspacing = new StockholmQodeField(
			"textsimple",
			"h2_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"h2_letterspacing",
			$h2_letterspacing
		);
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "H3 Style", 'stockholm' ),
			esc_html__( "Define styles for H3 heading", 'stockholm' )
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
		$h3_color = new StockholmQodeField(
			"colorsimple",
			"h3_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"h3_color",
			$h3_color
		);
		$h3_fontsize = new StockholmQodeField(
			"textsimple",
			"h3_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"h3_fontsize",
			$h3_fontsize
		);
		$h3_lineheight = new StockholmQodeField(
			"textsimple",
			"h3_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"h3_lineheight",
			$h3_lineheight
		);
		$h3_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"h3_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"h3_texttransform",
			$h3_texttransform
		);
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		$h3_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"h3_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"h3_google_fonts",
			$h3_google_fonts
		);
		$h3_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"h3_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"h3_fontstyle",
			$h3_fontstyle
		);
		$h3_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"h3_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"h3_fontweight",
			$h3_fontweight
		);
		$h3_letterspacing = new StockholmQodeField(
			"textsimple",
			"h3_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"h3_letterspacing",
			$h3_letterspacing
		);
		
		$group4 = new StockholmQodeGroup(
			esc_html__( "H4 Style", 'stockholm' ),
			esc_html__( "Define styles for H4 heading", 'stockholm' )
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
		$h4_color = new StockholmQodeField(
			"colorsimple",
			"h4_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"h4_color",
			$h4_color
		);
		$h4_fontsize = new StockholmQodeField(
			"textsimple",
			"h4_fontsize",
			"",
			esc_html__( "Font size (px)", 'stockholm' )
		);
		$row1->addChild(
			"h4_fontsize",
			$h4_fontsize
		);
		$h4_lineheight = new StockholmQodeField(
			"textsimple",
			"h4_lineheight",
			"",
			esc_html__( "Line height (px)", 'stockholm' )
		);
		$row1->addChild(
			"h4_lineheight",
			$h4_lineheight
		);
		$h4_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"h4_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"h4_texttransform",
			$h4_texttransform
		);
		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		$h4_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"h4_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"h4_google_fonts",
			$h4_google_fonts
		);
		$h4_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"h4_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"h4_fontstyle",
			$h4_fontstyle
		);
		$h4_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"h4_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"h4_fontweight",
			$h4_fontweight
		);
		$h4_letterspacing = new StockholmQodeField(
			"textsimple",
			"h4_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"h4_letterspacing",
			$h4_letterspacing
		);
		
		$group5 = new StockholmQodeGroup(
			esc_html__( "H5 style", 'stockholm' ),
			esc_html__( "Define styles for H5 heading", 'stockholm' )
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
		$h5_color = new StockholmQodeField(
			"colorsimple",
			"h5_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"h5_color",
			$h5_color
		);
		$h5_fontsize = new StockholmQodeField(
			"textsimple",
			"h5_fontsize",
			"",
			esc_html__( "Font size (px)", 'stockholm' )
		);
		$row1->addChild(
			"h5_fontsize",
			$h5_fontsize
		);
		$h5_lineheight = new StockholmQodeField(
			"textsimple",
			"h5_lineheight",
			"",
			esc_html__( "Line height (px)", 'stockholm' )
		);
		$row1->addChild(
			"h5_lineheight",
			$h5_lineheight
		);
		$h5_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"h5_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"h5_texttransform",
			$h5_texttransform
		);
		$row2 = new StockholmQodeRow( true );
		$group5->addChild(
			"row2",
			$row2
		);
		$h5_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"h5_google_fonts",
			"-1",
			esc_html__( "Font family", 'stockholm' )
		);
		$row2->addChild(
			"h5_google_fonts",
			$h5_google_fonts
		);
		$h5_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"h5_fontstyle",
			"",
			esc_html__( "Font style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"h5_fontstyle",
			$h5_fontstyle
		);
		$h5_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"h5_fontweight",
			"",
			esc_html__( "Font weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"h5_fontweight",
			$h5_fontweight
		);
		$h5_letterspacing = new StockholmQodeField(
			"textsimple",
			"h5_letterspacing",
			"",
			esc_html__( "Letter spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"h5_letterspacing",
			$h5_letterspacing
		);
		
		$group6 = new StockholmQodeGroup(
			esc_html__( "H6 Style", 'stockholm' ),
			esc_html__( "Define styles for H6 heading", 'stockholm' )
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
		$h6_color = new StockholmQodeField(
			"colorsimple",
			"h6_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"h6_color",
			$h6_color
		);
		$h6_fontsize = new StockholmQodeField(
			"textsimple",
			"h6_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"h6_fontsize",
			$h6_fontsize
		);
		$h6_lineheight = new StockholmQodeField(
			"textsimple",
			"h6_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"h6_lineheight",
			$h6_lineheight
		);
		$h6_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"h6_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"h6_texttransform",
			$h6_texttransform
		);
		$row2 = new StockholmQodeRow( true );
		$group6->addChild(
			"row2",
			$row2
		);
		$h6_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"h6_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"h6_google_fonts",
			$h6_google_fonts
		);
		$h6_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"h6_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"h6_fontstyle",
			$h6_fontstyle
		);
		$h6_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"h6_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"h6_fontweight",
			$h6_fontweight
		);
		$h6_letterspacing = new StockholmQodeField(
			"textsimple",
			"h6_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"h6_letterspacing",
			$h6_letterspacing
		);


		$panel1_responsive_tablet = new StockholmQodePanel(esc_html__("Headings Responsive (Tablet Portrait View)", "stockholm"), "headings_responsive_tablet_panel");
		$fontsPage->addChild("panel1_responsive_tablet", $panel1_responsive_tablet);

		$group1 = new StockholmQodeGroup(esc_html__("H1 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H1 heading", "stockholm"));
		$panel1_responsive_tablet->addChild("group1", $group1);
		$row1 = new StockholmQodeRow();
		$group1->addChild("row1", $row1);
		$h1_fontsize_tablet = new StockholmQodeField("textsimple", "h1_fontsize_tablet", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h1_fontsize_tablet", $h1_fontsize_tablet);
		$h1_lineheight_tablet = new StockholmQodeField("textsimple", "h1_lineheight_tablet", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h1_lineheight_tablet", $h1_lineheight_tablet);
		$h1_letterspacing_tablet = new StockholmQodeField("textsimple", "h1_letterspacing_tablet", "", esc_html__("Letter Spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h1_letterspacing_tablet", $h1_letterspacing_tablet);

		$group2 = new StockholmQodeGroup(esc_html__("H2 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H2 heading", "stockholm"));
		$panel1_responsive_tablet->addChild("group2", $group2);
		$row1 = new StockholmQodeRow();
		$group2->addChild("row1", $row1);
		$h2_fontsize_tablet = new StockholmQodeField("textsimple", "h2_fontsize_tablet", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h2_fontsize_tablet", $h2_fontsize_tablet);
		$h2_lineheight_tablet = new StockholmQodeField("textsimple", "h2_lineheight_tablet", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h2_lineheight_tablet", $h2_lineheight_tablet);
		$h2_letterspacing_tablet = new StockholmQodeField("textsimple", "h2_letterspacing_tablet", "", esc_html__("Letter Spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h2_letterspacing_tablet", $h2_letterspacing_tablet);

		$group3 = new StockholmQodeGroup(esc_html__("H3 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H3 heading", "stockholm"));
		$panel1_responsive_tablet->addChild("group3", $group3);
		$row1 = new StockholmQodeRow();
		$group3->addChild("row1", $row1);
		$h3_fontsize_tablet = new StockholmQodeField("textsimple", "h3_fontsize_tablet", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h3_fontsize_tablet", $h3_fontsize_tablet);
		$h3_lineheight_tablet = new StockholmQodeField("textsimple", "h3_lineheight_tablet", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h3_lineheight_tablet", $h3_lineheight_tablet);
		$h3_letterspacing_tablet = new StockholmQodeField("textsimple", "h3_letterspacing_tablet", "", esc_html__("Letter Spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h3_letterspacing_tablet", $h3_letterspacing_tablet);

		$group4 = new StockholmQodeGroup(esc_html__("H4 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H4 heading", "stockholm"));
		$panel1_responsive_tablet->addChild("group4", $group4);
		$row1 = new StockholmQodeRow();
		$group4->addChild("row1", $row1);
		$h4_fontsize_tablet = new StockholmQodeField("textsimple", "h4_fontsize_tablet", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h4_fontsize_tablet", $h4_fontsize_tablet);
		$h4_lineheight_tablet = new StockholmQodeField("textsimple", "h4_lineheight_tablet", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h4_lineheight_tablet", $h4_lineheight_tablet);
		$h4_letterspacing_tablet = new StockholmQodeField("textsimple", "h4_letterspacing_tablet", "", esc_html__("Letter Spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h4_letterspacing_tablet", $h4_letterspacing_tablet);

		$group5 = new StockholmQodeGroup(esc_html__("H5 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H5 heading", "stockholm"));
		$panel1_responsive_tablet->addChild("group5", $group5);
		$row1 = new StockholmQodeRow();
		$group5->addChild("row1", $row1);
		$h5_fontsize_tablet = new StockholmQodeField("textsimple", "h5_fontsize_tablet", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h5_fontsize_tablet", $h5_fontsize_tablet);
		$h5_lineheight_tablet = new StockholmQodeField("textsimple", "h5_lineheight_tablet", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h5_lineheight_tablet", $h5_lineheight_tablet);
		$h5_letterspacing_tablet = new StockholmQodeField("textsimple", "h5_letterspacing_tablet", "", esc_html__("Letter spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h5_letterspacing_tablet", $h5_letterspacing_tablet);

		$group6 = new StockholmQodeGroup(esc_html__("H6 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H6 heading", "stockholm"));
		$panel1_responsive_tablet->addChild("group6", $group6);
		$row1 = new StockholmQodeRow();
		$group6->addChild("row1", $row1);
		$h6_fontsize_tablet = new StockholmQodeField("textsimple", "h6_fontsize_tablet", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h6_fontsize_tablet", $h6_fontsize_tablet);
		$h6_lineheight_tablet = new StockholmQodeField("textsimple", "h6_lineheight_tablet", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h6_lineheight_tablet", $h6_lineheight_tablet);
		$h6_letterspacing_tablet = new StockholmQodeField("textsimple", "h6_letterspacing_tablet", "", esc_html__("Letter Spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h6_letterspacing_tablet", $h6_letterspacing_tablet);

		$panel1_responsive_mobile = new StockholmQodePanel(esc_html__("Headings Responsive (Mobile Devices)", "stockholm"), "headings_responsive_mobile_panel");
		$fontsPage->addChild("panel1_responsive_mobile", $panel1_responsive_mobile);

		$group1 = new StockholmQodeGroup(esc_html__("H1 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H1 heading", "stockholm"));
		$panel1_responsive_mobile->addChild("group1", $group1);
		$row1 = new StockholmQodeRow();
		$group1->addChild("row1", $row1);
		$h1_fontsize_mobile = new StockholmQodeField("textsimple", "h1_fontsize_mobile", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h1_fontsize_mobile", $h1_fontsize_mobile);
		$h1_lineheight_mobile = new StockholmQodeField("textsimple", "h1_lineheight_mobile", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h1_lineheight_mobile", $h1_lineheight_mobile);
		$h1_letterspacing_mobile = new StockholmQodeField("textsimple", "h1_letterspacing_mobile", "", esc_html__("Letter Spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h1_letterspacing_mobile", $h1_letterspacing_mobile);

		$group2 = new StockholmQodeGroup(esc_html__("H2 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H2 heading", "stockholm"));
		$panel1_responsive_mobile->addChild("group2", $group2);
		$row1 = new StockholmQodeRow();
		$group2->addChild("row1", $row1);
		$h2_fontsize_mobile = new StockholmQodeField("textsimple", "h2_fontsize_mobile", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h2_fontsize_mobile", $h2_fontsize_mobile);
		$h2_lineheight_mobile = new StockholmQodeField("textsimple", "h2_lineheight_mobile", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h2_lineheight_mobile", $h2_lineheight_mobile);
		$h2_letterspacing_mobile = new StockholmQodeField("textsimple", "h2_letterspacing_mobile", "", esc_html__("Letter Spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h2_letterspacing_mobile", $h2_letterspacing_mobile);

		$group3 = new StockholmQodeGroup(esc_html__("H3 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H3 heading", "stockholm"));
		$panel1_responsive_mobile->addChild("group3", $group3);
		$row1 = new StockholmQodeRow();
		$group3->addChild("row1", $row1);
		$h3_fontsize_mobile = new StockholmQodeField("textsimple", "h3_fontsize_mobile", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h3_fontsize_mobile", $h3_fontsize_mobile);
		$h3_lineheight_mobile = new StockholmQodeField("textsimple", "h3_lineheight_mobile", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h3_lineheight_mobile", $h3_lineheight_mobile);
		$h3_letterspacing_mobile = new StockholmQodeField("textsimple", "h3_letterspacing_mobile", "", esc_html__("Letter Spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h3_letterspacing_mobile", $h3_letterspacing_mobile);

		$group4 = new StockholmQodeGroup(esc_html__("H4 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H4 heading", "stockholm"));
		$panel1_responsive_mobile->addChild("group4", $group4);
		$row1 = new StockholmQodeRow();
		$group4->addChild("row1", $row1);
		$h4_fontsize_mobile = new StockholmQodeField("textsimple", "h4_fontsize_mobile", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h4_fontsize_mobile", $h4_fontsize_mobile);
		$h4_lineheight_mobile = new StockholmQodeField("textsimple", "h4_lineheight_mobile", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h4_lineheight_mobile", $h4_lineheight_mobile);
		$h4_letterspacing_mobile = new StockholmQodeField("textsimple", "h4_letterspacing_mobile", "", esc_html__("Letter Spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h4_letterspacing_mobile", $h4_letterspacing_mobile);

		$group5 = new StockholmQodeGroup(esc_html__("H5 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H5 heading", "stockholm"));
		$panel1_responsive_mobile->addChild("group5", $group5);
		$row1 = new StockholmQodeRow();
		$group5->addChild("row1", $row1);
		$h5_fontsize_mobile = new StockholmQodeField("textsimple", "h5_fontsize_mobile", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h5_fontsize_mobile", $h5_fontsize_mobile);
		$h5_lineheight_mobile = new StockholmQodeField("textsimple", "h5_lineheight_mobile", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h5_lineheight_mobile", $h5_lineheight_mobile);
		$h5_letterspacing_mobile = new StockholmQodeField("textsimple", "h5_letterspacing_mobile", "", esc_html__("Letter spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h5_letterspacing_mobile", $h5_letterspacing_mobile);

		$group6 = new StockholmQodeGroup(esc_html__("H6 Responsive Style", "stockholm"), esc_html__("Define responsive styles for H6 heading", "stockholm"));
		$panel1_responsive_mobile->addChild("group6", $group6);
		$row1 = new StockholmQodeRow();
		$group6->addChild("row1", $row1);
		$h6_fontsize_mobile = new StockholmQodeField("textsimple", "h6_fontsize_mobile", "", esc_html__("Font Size (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h6_fontsize_mobile", $h6_fontsize_mobile);
		$h6_lineheight_mobile = new StockholmQodeField("textsimple", "h6_lineheight_mobile", "", esc_html__("Line Height (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h6_lineheight_mobile", $h6_lineheight_mobile);
		$h6_letterspacing_mobile = new StockholmQodeField("textsimple", "h6_letterspacing_mobile", "", esc_html__("Letter Spacing (px)", "stockholm"), esc_html__("This is some description", "stockholm"));
		$row1->addChild("h6_letterspacing_mobile", $h6_letterspacing_mobile);

		// Text
		
		$panel2 = new StockholmQodePanel(
			esc_html__( "Text", 'stockholm' ),
			"text_panel"
		);
		$fontsPage->addChild(
			"panel2",
			$panel2
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Paragraph", 'stockholm' ),
			esc_html__( "Define styles for paragraph text", 'stockholm' )
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
		$text_color = new StockholmQodeField(
			"colorsimple",
			"text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"text_color",
			$text_color
		);
		$text_fontsize = new StockholmQodeField(
			"textsimple",
			"text_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"text_fontsize",
			$text_fontsize
		);
		$text_lineheight = new StockholmQodeField(
			"textsimple",
			"text_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"text_lineheight",
			$text_lineheight
		);
		$text_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"text_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"text_text_transform",
			$text_text_transform
		);
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$text_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"text_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"text_google_fonts",
			$text_google_fonts
		);
		$text_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"text_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"text_fontstyle",
			$text_fontstyle
		);
		$text_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"text_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"text_fontweight",
			$text_fontweight
		);
		$text_letter_spacing = new StockholmQodeField(
			"textsimple",
			"text_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"text_letter_spacing",
			$text_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);
		$text_margin = new StockholmQodeField(
			"textsimple",
			"text_margin",
			"",
			esc_html__( "Top/Bottom Margin (px)", 'stockholm' )
		);
		$row3->addChild(
			"text_margin",
			$text_margin
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Links", 'stockholm' ),
			esc_html__( "Define styles for link text", 'stockholm' )
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
		$link_color = new StockholmQodeField(
			"colorsimple",
			"link_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"link_color",
			$link_color
		);
		$link_hovercolor = new StockholmQodeField(
			"colorsimple",
			"link_hovercolor",
			"",
			esc_html__( "Hover Text Color", 'stockholm' )
		);
		$row1->addChild(
			"link_hovercolor",
			$link_hovercolor
		);
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$link_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"link_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"link_fontstyle",
			$link_fontstyle
		);
		$link_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"link_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"link_fontweight",
			$link_fontweight
		);
		$link_fontdecoration = new StockholmQodeField(
			"selectblanksimple",
			"link_fontdecoration",
			"",
			esc_html__( "Font Decoration", 'stockholm' ),
			"",
			stockholm_qode_get_text_decorations()
		);
		$row2->addChild(
			"link_fontdecoration",
			$link_fontdecoration
		);
		
		// Header & Menu
		
		$panel4 = new StockholmQodePanel(
			esc_html__( "Header & Menu", 'stockholm' ),
			"header_and_menu_panel"
		);
		$fontsPage->addChild(
			"panel4",
			$panel4
		);
		
		$group1 = new StockholmQodeGroup(
			"1st Level Menu",
			esc_html__( "Define styles for 1st level in Top Navigation Menu", 'stockholm' )
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
		$menu_color = new StockholmQodeField(
			"colorsimple",
			"menu_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"menu_color",
			$menu_color
		);
		$menu_hovercolor = new StockholmQodeField(
			"colorsimple",
			"menu_hovercolor",
			"",
			esc_html__( "Hover Text Color", 'stockholm' )
		);
		$row1->addChild(
			"menu_hovercolor",
			$menu_hovercolor
		);
		$menu_activecolor = new StockholmQodeField(
			"colorsimple",
			"menu_activecolor",
			"",
			esc_html__( "Active Text Color", 'stockholm' )
		);
		$row1->addChild(
			"menu_activecolor",
			$menu_activecolor
		);
		$menu_hover_background_color = new StockholmQodeField(
			"colorsimple",
			"menu_hover_background_color",
			"",
			esc_html__( "Hover Text Background Color", 'stockholm' )
		);
		$row1->addChild(
			"menu_hover_background_color",
			$menu_hover_background_color
		);
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$menu_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"menu_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"menu_google_fonts",
			$menu_google_fonts
		);
		$menu_fontsize = new StockholmQodeField(
			"textsimple",
			"menu_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row2->addChild(
			"menu_fontsize",
			$menu_fontsize
		);
		$menu_lineheight = new StockholmQodeField(
			"textsimple",
			"menu_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row2->addChild(
			"menu_lineheight",
			$menu_lineheight
		);
		$menu_hover_background_color_transparency = new StockholmQodeField(
			"textsimple",
			"menu_hover_background_color_transparency",
			"",
			esc_html__( "Hover Background Color Transparency", 'stockholm' )
		);
		$row2->addChild(
			"menu_hover_background_color_transparency",
			$menu_hover_background_color_transparency
		);
		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);
		$menu_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"menu_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"menu_fontstyle",
			$menu_fontstyle
		);
		$menu_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"menu_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"menu_fontweight",
			$menu_fontweight
		);
		$menu_letterspacing = new StockholmQodeField(
			"textsimple",
			"menu_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row3->addChild(
			"menu_letterspacing",
			$menu_letterspacing
		);
		$menu_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"menu_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"menu_texttransform",
			$menu_texttransform
		);
		$row4 = new StockholmQodeRow( true );
		$group1->addChild(
			"row4",
			$row4
		);
		$menu_padding_left_right = new StockholmQodeField(
			"textsimple",
			"menu_padding_left_right",
			"",
			esc_html__( "Padding Left/Right(px)", 'stockholm' )
		);
		$row4->addChild(
			"menu_padding_left_right",
			$menu_padding_left_right
		);
		$menu_separator_color = new StockholmQodeField(
			"colorsimple",
			"menu_separator_color",
			"",
			esc_html__( "Separator Color", 'stockholm' )
		);
		$row4->addChild(
			"menu_separator_color",
			$menu_separator_color
		);
		$menu_remove_separator_between_items = new StockholmQodeField(
			"yesnosimple",
			"menu_remove_separator_between_items",
			"no",
			esc_html__( "Remove Separator Between Items", 'stockholm' ),
			""
		);
		$row4->addChild(
			"menu_remove_separator_between_items",
			$menu_remove_separator_between_items
		);
		
		$group2 = new StockholmQodeGroup(
			"2nd Level Menu",
			esc_html__( "Define styles for 2nd level in Top Navigation Menu", 'stockholm' )
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
		$dropdown_color = new StockholmQodeField(
			"colorsimple",
			"dropdown_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"dropdown_color",
			$dropdown_color
		);
		$dropdown_hovercolor = new StockholmQodeField(
			"colorsimple",
			"dropdown_hovercolor",
			"",
			esc_html__( "Hover/Active Color", 'stockholm' )
		);
		$row1->addChild(
			"dropdown_hovercolor",
			$dropdown_hovercolor
		);
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$dropdown_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"dropdown_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"dropdown_google_fonts",
			$dropdown_google_fonts
		);
		$dropdown_fontsize = new StockholmQodeField(
			"textsimple",
			"dropdown_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row2->addChild(
			"dropdown_fontsize",
			$dropdown_fontsize
		);
		$dropdown_lineheight = new StockholmQodeField(
			"textsimple",
			"dropdown_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row2->addChild(
			"dropdown_lineheight",
			$dropdown_lineheight
		);
		$dropdown_padding_top_bottom = new StockholmQodeField(
			"textsimple",
			"dropdown_padding_top_bottom",
			"",
			esc_html__( "Padding Top/Bottom", 'stockholm' )
		);
		$row2->addChild(
			"dropdown_padding_top_bottom",
			$dropdown_padding_top_bottom
		);
		$row3 = new StockholmQodeRow( true );
		$group2->addChild(
			"row3",
			$row3
		);
		$dropdown_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"dropdown_fontstyle",
			"",
			esc_html__( "Font style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"dropdown_fontstyle",
			$dropdown_fontstyle
		);
		$dropdown_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"dropdown_fontweight",
			"",
			esc_html__( "Font weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"dropdown_fontweight",
			$dropdown_fontweight
		);
		$dropdown_letterspacing = new StockholmQodeField(
			"textsimple",
			"dropdown_letterspacing",
			"",
			esc_html__( "Letter spacing (px)", 'stockholm' )
		);
		$row3->addChild(
			"dropdown_letterspacing",
			$dropdown_letterspacing
		);
		$dropdown_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"dropdown_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"dropdown_texttransform",
			$dropdown_texttransform
		);
		
		$group3 = new StockholmQodeGroup(
			"2nd Level Wide Menu",
			esc_html__( "Define styles for 2nd level in Wide Menu", 'stockholm' )
		);
		$panel4->addChild(
			"group3",
			$group3
		);
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		$dropdown_wide_color = new StockholmQodeField(
			"colorsimple",
			"dropdown_wide_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"dropdown_wide_color",
			$dropdown_wide_color
		);
		$dropdown_wide_hovercolor = new StockholmQodeField(
			"colorsimple",
			"dropdown_wide_hovercolor",
			"",
			esc_html__( "Hover Text Color", 'stockholm' )
		);
		$row1->addChild(
			"dropdown_wide_hovercolor",
			$dropdown_wide_hovercolor
		);
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		$dropdown_wide_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"dropdown_wide_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"dropdown_wide_google_fonts",
			$dropdown_wide_google_fonts
		);
		$dropdown_wide_fontsize = new StockholmQodeField(
			"textsimple",
			"dropdown_wide_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row2->addChild(
			"dropdown_wide_fontsize",
			$dropdown_wide_fontsize
		);
		$dropdown_wide_lineheight = new StockholmQodeField(
			"textsimple",
			"dropdown_wide_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row2->addChild(
			"dropdown_wide_lineheight",
			$dropdown_wide_lineheight
		);
		$row3 = new StockholmQodeRow( true );
		$group3->addChild(
			"row3",
			$row3
		);
		$dropdown_wide_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"dropdown_wide_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"dropdown_wide_fontstyle",
			$dropdown_wide_fontstyle
		);
		$dropdown_wide_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"dropdown_wide_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"dropdown_wide_fontweight",
			$dropdown_wide_fontweight
		);
		$dropdown_wide_letterspacing = new StockholmQodeField(
			"textsimple",
			"dropdown_wide_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row3->addChild(
			"dropdown_wide_letterspacing",
			$dropdown_wide_letterspacing
		);
		$dropdown_wide_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"dropdown_wide_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"dropdown_wide_texttransform",
			$dropdown_wide_texttransform
		);
		
		$group4 = new StockholmQodeGroup(
			"3rd Level Menu",
			esc_html__( "Define styles for 3nd level in Top Navigation Menu", 'stockholm' )
		);
		$panel4->addChild(
			"group4",
			$group4
		);
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);
		$dropdown_color_thirdlvl = new StockholmQodeField(
			"colorsimple",
			"dropdown_color_thirdlvl",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"dropdown_color_thirdlvl",
			$dropdown_color_thirdlvl
		);
		$dropdown_hovercolor_thirdlvl = new StockholmQodeField(
			"colorsimple",
			"dropdown_hovercolor_thirdlvl",
			"",
			esc_html__( "Hover/Active Color", 'stockholm' )
		);
		$row1->addChild(
			"dropdown_hovercolor_thirdlvl",
			$dropdown_hovercolor_thirdlvl
		);
		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		$dropdown_google_fonts_thirdlvl = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"dropdown_google_fonts_thirdlvl",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"dropdown_google_fonts_thirdlvl",
			$dropdown_google_fonts_thirdlvl
		);
		$dropdown_fontsize_thirdlvl = new StockholmQodeField(
			"textsimple",
			"dropdown_fontsize_thirdlvl",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row2->addChild(
			"dropdown_fontsize_thirdlvl",
			$dropdown_fontsize_thirdlvl
		);
		$dropdown_lineheight_thirdlvl = new StockholmQodeField(
			"textsimple",
			"dropdown_lineheight_thirdlvl",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row2->addChild(
			"dropdown_lineheight_thirdlvl",
			$dropdown_lineheight_thirdlvl
		);
		$row3 = new StockholmQodeRow( true );
		$group4->addChild(
			"row3",
			$row3
		);
		$dropdown_fontstyle_thirdlvl = new StockholmQodeField(
			"selectblanksimple",
			"dropdown_fontstyle_thirdlvl",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"dropdown_fontstyle_thirdlvl",
			$dropdown_fontstyle_thirdlvl
		);
		$dropdown_fontweight_thirdlvl = new StockholmQodeField(
			"selectblanksimple",
			"dropdown_fontweight_thirdlvl",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"dropdown_fontweight_thirdlvl",
			$dropdown_fontweight_thirdlvl
		);
		$dropdown_letterspacing_thirdlvl = new StockholmQodeField(
			"textsimple",
			"dropdown_letterspacing_thirdlvl",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row3->addChild(
			"dropdown_letterspacing",
			$dropdown_letterspacing_thirdlvl
		);
		$dropdown_texttransform_thirdlvl = new StockholmQodeField(
			"selectblanksimple",
			"dropdown_texttransform_thirdlvl",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row3->addChild(
			"dropdown_texttransform_thirdlvl",
			$dropdown_texttransform_thirdlvl
		);
		
		$group5 = new StockholmQodeGroup(
			esc_html__( "Fixed Menu", 'stockholm' ),
			esc_html__( "Define styles for Fixed Menu", 'stockholm' )
		);
		$panel4->addChild(
			"group5",
			$group5
		);
		$row1 = new StockholmQodeRow();
		$group5->addChild(
			"row1",
			$row1
		);
		$fixed_color = new StockholmQodeField(
			"colorsimple",
			"fixed_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"fixed_color",
			$fixed_color
		);
		$fixed_hovercolor = new StockholmQodeField(
			"colorsimple",
			"fixed_hovercolor",
			"",
			esc_html__( "Hover/Active Color", 'stockholm' )
		);
		$row1->addChild(
			"fixed_hovercolor",
			$fixed_hovercolor
		);
		$row2 = new StockholmQodeRow( true );
		$group5->addChild(
			"row2",
			$row2
		);
		$fixed_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"fixed_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"fixed_google_fonts",
			$fixed_google_fonts
		);
		$fixed_fontsize = new StockholmQodeField(
			"textsimple",
			"fixed_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row2->addChild(
			"fixed_fontsize",
			$fixed_fontsize
		);
		$fixed_lineheight = new StockholmQodeField(
			"textsimple",
			"fixed_lineheight",
			"",
			esc_html__( "Line height (px)", 'stockholm' )
		);
		$row2->addChild(
			"fixed_lineheight",
			$fixed_lineheight
		);
		$fixed_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"fixed_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"fixed_texttransform",
			$fixed_texttransform
		);
		$row3 = new StockholmQodeRow( true );
		$group5->addChild(
			"row3",
			$row3
		);
		$fixed_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"fixed_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"fixed_fontstyle",
			$fixed_fontstyle
		);
		$fixed_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"fixed_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"fixed_fontweight",
			$fixed_fontweight
		);
		$fixed_letterspacing = new StockholmQodeField(
			"textsimple",
			"fixed_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row3->addChild(
			"fixed_letterspacing",
			$fixed_letterspacing
		);
		
		$group6 = new StockholmQodeGroup(
			esc_html__( "Sticky Menu", 'stockholm' ),
			esc_html__( "Define styles for Sticky Menu", 'stockholm' )
		);
		$panel4->addChild(
			"group6",
			$group6
		);
		$row1 = new StockholmQodeRow();
		$group6->addChild(
			"row1",
			$row1
		);
		$sticky_color = new StockholmQodeField(
			"colorsimple",
			"sticky_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"sticky_color",
			$sticky_color
		);
		$sticky_hovercolor = new StockholmQodeField(
			"colorsimple",
			"sticky_hovercolor",
			"",
			esc_html__( "Hover/Active color", 'stockholm' )
		);
		$row1->addChild(
			"sticky_hovercolor",
			$sticky_hovercolor
		);
		$row2 = new StockholmQodeRow( true );
		$group6->addChild(
			"row2",
			$row2
		);
		$sticky_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"sticky_google_fonts",
			"-1",
			esc_html__( "Font family", 'stockholm' )
		);
		$row2->addChild(
			"sticky_google_fonts",
			$sticky_google_fonts
		);
		$sticky_fontsize = new StockholmQodeField(
			"textsimple",
			"sticky_fontsize",
			"",
			esc_html__( "Font size (px)", 'stockholm' )
		);
		$row2->addChild(
			"sticky_fontsize",
			$sticky_fontsize
		);
		$sticky_lineheight = new StockholmQodeField(
			"textsimple",
			"sticky_lineheight",
			"",
			esc_html__( "Line height (px)", 'stockholm' )
		);
		$row2->addChild(
			"sticky_lineheight",
			$sticky_lineheight
		);
		$sticky_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"sticky_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"sticky_texttransform",
			$sticky_texttransform
		);
		$row3 = new StockholmQodeRow( true );
		$group6->addChild(
			"row3",
			$row3
		);
		$sticky_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"sticky_fontstyle",
			"",
			esc_html__( "Font style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"sticky_fontstyle",
			$sticky_fontstyle
		);
		$sticky_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"sticky_fontweight",
			"",
			esc_html__( "Font weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"sticky_fontweight",
			$sticky_fontweight
		);
		$sticky_letterspacing = new StockholmQodeField(
			"textsimple",
			"sticky_letterspacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row3->addChild(
			"sticky_letterspacing",
			$sticky_letterspacing
		);
		
		$group7 = new StockholmQodeGroup(
			esc_html__( "Mobile Menu", 'stockholm' ),
			esc_html__( "Define styles for Mobile Menu (as seen on small screens)", 'stockholm' )
		);
		$panel4->addChild(
			"group7",
			$group7
		);
		$row1 = new StockholmQodeRow();
		$group7->addChild(
			"row1",
			$row1
		);
		$mobile_color = new StockholmQodeField(
			"colorsimple",
			"mobile_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"mobile_color",
			$mobile_color
		);
		$mobile_hovercolor = new StockholmQodeField(
			"colorsimple",
			"mobile_hovercolor",
			"",
			esc_html__( "Hover/Active Color", 'stockholm' )
		);
		$row1->addChild(
			"mobile_hovercolor",
			$mobile_hovercolor
		);
		$row2 = new StockholmQodeRow( true );
		$group7->addChild(
			"row2",
			$row2
		);
		$mobile_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"mobile_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"mobile_google_fonts",
			$mobile_google_fonts
		);
		$mobile_fontsize = new StockholmQodeField(
			"textsimple",
			"mobile_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row2->addChild(
			"mobile_fontsize",
			$mobile_fontsize
		);
		$mobile_lineheight = new StockholmQodeField(
			"textsimple",
			"mobile_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row2->addChild(
			"mobile_lineheight",
			$mobile_lineheight
		);
		$mobile_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"mobile_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"mobile_texttransform",
			$mobile_texttransform
		);
		$row3 = new StockholmQodeRow( true );
		$group7->addChild(
			"row3",
			$row3
		);
		$mobile_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"mobile_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"mobile_fontstyle",
			$mobile_fontstyle
		);
		$mobile_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"mobile_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"mobile_fontweight",
			$mobile_fontweight
		);
		$mobile_letter_spacing = new StockholmQodeField(
			"textsimple",
			"mobile_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row3->addChild(
			"mobile_letter_spacing",
			$mobile_letter_spacing
		);
		
		$group8 = new StockholmQodeGroup(
			esc_html__( "Header Top", 'stockholm' ),
			esc_html__( "Define styles for Header Top area", 'stockholm' )
		);
		$panel4->addChild(
			"group8",
			$group8
		);
		$row1 = new StockholmQodeRow();
		$group8->addChild(
			"row1",
			$row1
		);
		$top_header_text_color = new StockholmQodeField(
			"colorsimple",
			"top_header_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"top_header_text_color",
			$top_header_text_color
		);
		$top_header_text_hover_color = new StockholmQodeField(
			"colorsimple",
			"top_header_text_hover_color",
			"",
			esc_html__( "Hover Text Color", 'stockholm' )
		);
		$row1->addChild(
			"top_header_text_hover_color",
			$top_header_text_hover_color
		);
		$row2 = new StockholmQodeRow( true );
		$group8->addChild(
			"row2",
			$row2
		);
		$top_header_text_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"top_header_text_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"top_header_text_font_family",
			$top_header_text_font_family
		);
		$top_header_text_font_size = new StockholmQodeField(
			"textsimple",
			"top_header_text_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row2->addChild(
			"top_header_text_font_size",
			$top_header_text_font_size
		);
		$top_header_text_line_height = new StockholmQodeField(
			"textsimple",
			"top_header_text_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row2->addChild(
			"top_header_text_line_height",
			$top_header_text_line_height
		);
		$top_header_text_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"top_header_text_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"top_header_text_texttransform",
			$top_header_text_texttransform
		);
		$row3 = new StockholmQodeRow( true );
		$group8->addChild(
			"row3",
			$row3
		);
		$group8->addChild(
			"row3",
			$row3
		);
		$top_header_text_font_style = new StockholmQodeField(
			"selectblanksimple",
			"top_header_text_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row3->addChild(
			"top_header_text_font_style",
			$top_header_text_font_style
		);
		$top_header_text_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"top_header_text_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row3->addChild(
			"top_header_text_font_weight",
			$top_header_text_font_weight
		);
		$top_header_text_letter_spacing = new StockholmQodeField(
			"textsimple",
			"top_header_text_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row3->addChild(
			"top_header_text_letter_spacing",
			$top_header_text_letter_spacing
		);
		
		// Page title, subtitle and breadcrumbs
		
		$panel3 = new StockholmQodePanel(
			esc_html__( "Page Title Style", 'stockholm' ),
			"page_title_panel"
		);
		$fontsPage->addChild(
			"panel3",
			$panel3
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Title", 'stockholm' ),
			esc_html__( "Define styles for page title", 'stockholm' )
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
		$page_title_color = new StockholmQodeField(
			"colorsimple",
			"page_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"page_title_color",
			$page_title_color
		);
		$page_title_fontsize = new StockholmQodeField(
			"textsimple",
			"page_title_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"page_title_fontsize",
			$page_title_fontsize
		);
		$page_title_lineheight = new StockholmQodeField(
			"textsimple",
			"page_title_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"page_title_lineheight",
			$page_title_lineheight
		);
		$page_title_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"page_title_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"page_title_texttransform",
			$page_title_texttransform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$page_title_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"page_title_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"page_title_google_fonts",
			$page_title_google_fonts
		);
		$page_title_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"page_title_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"page_title_fontstyle",
			$page_title_fontstyle
		);
		$page_title_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"page_title_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"page_title_fontweight",
			$page_title_fontweight
		);
		$page_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"page_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"page_title_letter_spacing",
			$page_title_letter_spacing
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Subtitle", 'stockholm' ),
			esc_html__( "Define styles for page subtitle", 'stockholm' )
		);
		$panel3->addChild(
			"group2",
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		$page_subtitle_color = new StockholmQodeField(
			"colorsimple",
			"page_subtitle_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"page_subtitle_color",
			$page_subtitle_color
		);
		$page_subtitle_fontsize = new StockholmQodeField(
			"textsimple",
			"page_subtitle_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"page_subtitle_fontsize",
			$page_subtitle_fontsize
		);
		$page_subtitle_lineheight = new StockholmQodeField(
			"textsimple",
			"page_subtitle_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"page_subtitle_lineheight",
			$page_subtitle_lineheight
		);
		$page_subtitle_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"page_subtitle_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"page_subtitle_texttransform",
			$page_subtitle_texttransform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$page_subtitle_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"page_subtitle_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"page_subtitle_google_fonts",
			$page_subtitle_google_fonts
		);
		$page_subtitle_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"page_subtitle_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"page_subtitle_fontstyle",
			$page_subtitle_fontstyle
		);
		$page_subtitle_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"page_subtitle_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"page_subtitle_fontweight",
			$page_subtitle_fontweight
		);
		$page_subtitle_letter_spacing = new StockholmQodeField(
			"textsimple",
			"page_subtitle_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"page_subtitle_letter_spacing",
			$page_subtitle_letter_spacing
		);
		$group_ptat = new StockholmQodeGroup(
			esc_html__( "Text Above Title", 'stockholm' ),
			esc_html__( "Define styles for page text above title", 'stockholm' )
		);
		$panel3->addChild(
			"group_ptat",
			$group_ptat
		);

		$row1 = new StockholmQodeRow();
		$group_ptat->addChild(
			"row1",
			$row1
		);
		$page_text_above_title_color = new StockholmQodeField(
			"colorsimple",
			"page_text_above_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"page_text_above_title_color",
			$page_text_above_title_color
		);
		$page_text_above_title_fontsize = new StockholmQodeField(
			"textsimple",
			"page_text_above_title_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"page_text_above_title_fontsize",
			$page_text_above_title_fontsize
		);
		$page_text_above_title_lineheight = new StockholmQodeField(
			"textsimple",
			"page_text_above_title_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"page_text_above_title_lineheight",
			$page_text_above_title_lineheight
		);
		$page_text_above_title_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"page_text_above_title_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"page_text_above_title_texttransform",
			$page_text_above_title_texttransform
		);

		$row2 = new StockholmQodeRow( true );
		$group_ptat->addChild(
			"row2",
			$row2
		);
		$page_text_above_title_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"page_text_above_title_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"page_text_above_title_google_fonts",
			$page_text_above_title_google_fonts
		);
		$page_text_above_title_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"page_text_above_title_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"page_text_above_title_fontstyle",
			$page_text_above_title_fontstyle
		);
		$page_text_above_title_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"page_text_above_title_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"page_text_above_title_fontweight",
			$page_text_above_title_fontweight
		);
		$page_text_above_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"page_text_above_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"page_text_above_title_letter_spacing",
			$page_text_above_title_letter_spacing
		);
		$group3 = new StockholmQodeGroup(
			esc_html__( "Breadcrumbs", 'stockholm' ),
			esc_html__( "Define styles for page breadcrumbs", 'stockholm' )
		);
		$panel3->addChild(
			"group3",
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		$page_breadcrumb_color = new StockholmQodeField(
			"colorsimple",
			"page_breadcrumb_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"page_breadcrumb_color",
			$page_breadcrumb_color
		);
		$page_breadcrumb_fontsize = new StockholmQodeField(
			"textsimple",
			"page_breadcrumb_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"page_breadcrumb_fontsize",
			$page_breadcrumb_fontsize
		);
		$page_breadcrumb_lineheight = new StockholmQodeField(
			"textsimple",
			"page_breadcrumb_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"page_breadcrumb_lineheight",
			$page_breadcrumb_lineheight
		);
		$page_breadcrumb_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"page_breadcrumb_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"page_breadcrumb_texttransform",
			$page_breadcrumb_texttransform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		$page_breadcrumb_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"page_breadcrumb_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"page_breadcrumb_google_fonts",
			$page_breadcrumb_google_fonts
		);
		$page_breadcrumb_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"page_breadcrumb_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"page_breadcrumb_fontstyle",
			$page_breadcrumb_fontstyle
		);
		$page_breadcrumb_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"page_breadcrumb_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"page_breadcrumb_fontweight",
			$page_breadcrumb_fontweight
		);
		$page_breadcrumb_letter_spacing = new StockholmQodeField(
			"textsimple",
			"page_breadcrumb_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"page_breadcrumb_letter_spacing",
			$page_breadcrumb_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group3->addChild(
			"row3",
			$row3
		);
		$page_breadcrumb_hovercolor = new StockholmQodeField(
			"colorsimple",
			"page_breadcrumb_hovercolor",
			"",
			esc_html__( "Hover/Active Color", 'stockholm' )
		);
		$row3->addChild(
			"page_breadcrumb_hovercolor",
			$page_breadcrumb_hovercolor
		);
		
		// Portfolio List and Blog List
		
		$panel5 = new StockholmQodePanel(
			esc_html__( "Filter Style for Portfolio and Blog Masonry Lists", 'stockholm' ),
			"portfolio_blog_panel"
		);
		$fontsPage->addChild(
			"panel5",
			$panel5
		);
		
		$portfolio_filter_margin_bottom = new StockholmQodeField(
			"text",
			"portfolio_filter_margin_bottom",
			"",
			esc_html__( "Filter Bottom Margin (px)", 'stockholm' ),
			esc_html__( "This option define bottom margin for filter area. Default value is 36.", 'stockholm' )
		);
		$panel5->addChild(
			"portfolio_filter_margin_bottom",
			$portfolio_filter_margin_bottom
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Filter Title", 'stockholm' ),
			esc_html__( "Define styles for filter title", 'stockholm' )
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
		$portfolio_filter_title_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_filter_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_filter_title_color",
			$portfolio_filter_title_color
		);
		$portfolio_filter_title_font_size = new StockholmQodeField(
			"textsimple",
			"portfolio_filter_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_filter_title_font_size",
			$portfolio_filter_title_font_size
		);
		$portfolio_filter_title_line_height = new StockholmQodeField(
			"textsimple",
			"portfolio_filter_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_filter_title_line_height",
			$portfolio_filter_title_line_height
		);
		$portfolio_filter_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_filter_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"portfolio_filter_title_text_transform",
			$portfolio_filter_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$portfolio_filter_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"portfolio_filter_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_filter_title_font_family",
			$portfolio_filter_title_font_family
		);
		$portfolio_filter_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_filter_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"portfolio_filter_title_font_style",
			$portfolio_filter_title_font_style
		);
		$portfolio_filter_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_filter_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"portfolio_filter_title_font_weight",
			$portfolio_filter_title_font_weight
		);
		$portfolio_filter_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"portfolio_filter_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_filter_title_letter_spacing",
			$portfolio_filter_title_letter_spacing
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Filter Categories", 'stockholm' ),
			esc_html__( "Define styles for filter categories", 'stockholm' )
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
		$portfolio_filter_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_filter_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_filter_color",
			$portfolio_filter_color
		);
		$portfolio_filter_font_size = new StockholmQodeField(
			"textsimple",
			"portfolio_filter_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_filter_font_size",
			$portfolio_filter_font_size
		);
		$portfolio_filter_line_height = new StockholmQodeField(
			"textsimple",
			"portfolio_filter_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_filter_line_height",
			$portfolio_filter_line_height
		);
		$portfolio_filter_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_filter_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"portfolio_filter_text_transform",
			$portfolio_filter_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$portfolio_filter_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"portfolio_filter_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_filter_font_family",
			$portfolio_filter_font_family
		);
		$portfolio_filter_font_style = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_filter_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"portfolio_filter_font_style",
			$portfolio_filter_font_style
		);
		$portfolio_filter_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_filter_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"portfolio_filter_font_weight",
			$portfolio_filter_font_weight
		);
		$portfolio_filter_letter_spacing = new StockholmQodeField(
			"textsimple",
			"portfolio_filter_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_filter_letter_spacing",
			$portfolio_filter_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group2->addChild(
			"row3",
			$row3
		);
		$portfolio_filter_hovercolor = new StockholmQodeField(
			"colorsimple",
			"portfolio_filter_hovercolor",
			"",
			esc_html__( "Hover/Active Color", 'stockholm' )
		);
		$row3->addChild(
			"portfolio_filter_hovercolor",
			$portfolio_filter_hovercolor
		);
		
		$portfolio_filter_disable_separator = new StockholmQodeField(
			"yesno",
			"portfolio_filter_disable_separator",
			"yes",
			esc_html__( "Disable Separator Between Categories", 'stockholm' ),
			esc_html__( "Disabling this option will remove separator between filter categories.", 'stockholm' )
		);
		$panel5->addChild(
			"portfolio_filter_disable_separator",
			$portfolio_filter_disable_separator
		);
		
		// Portfolio List
		
		$panel6 = new StockholmQodePanel(
			esc_html__( "Portfolio List", 'stockholm' ),
			"portfolio_panel"
		);
		$fontsPage->addChild(
			"panel6",
			$panel6
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Title Style for Standard and Pinterest Lists", 'stockholm' ),
			esc_html__( "Define title styles for standard and pinterest portfolio lists.", 'stockholm' )
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
		$portfolio_title_standard_list_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_title_standard_list_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_title_standard_list_color",
			$portfolio_title_standard_list_color
		);
		$portfolio_title_standard_list_font_size = new StockholmQodeField(
			"textsimple",
			"portfolio_title_standard_list_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_title_standard_list_font_size",
			$portfolio_title_standard_list_font_size
		);
		$portfolio_title_standard_list_line_height = new StockholmQodeField(
			"textsimple",
			"portfolio_title_standard_list_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_title_standard_list_line_height",
			$portfolio_title_standard_list_line_height
		);
		$portfolio_title_standard_list_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_title_standard_list_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"portfolio_title_standard_list_text_transform",
			$portfolio_title_standard_list_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$portfolio_title_standard_list_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"portfolio_title_standard_list_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_title_standard_list_font_family",
			$portfolio_title_standard_list_font_family
		);
		$portfolio_title_standard_list_font_style = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_title_standard_list_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"portfolio_title_standard_list_font_style",
			$portfolio_title_standard_list_font_style
		);
		$portfolio_title_standard_list_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_title_standard_list_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"portfolio_title_standard_list_font_weight",
			$portfolio_title_standard_list_font_weight
		);
		$portfolio_title_standard_list_letter_spacing = new StockholmQodeField(
			"textsimple",
			"portfolio_title_standard_list_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_title_standard_list_letter_spacing",
			$portfolio_title_standard_list_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);
		$portfolio_title_standard_list_hover_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_title_standard_list_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"portfolio_title_standard_list_hover_color",
			$portfolio_title_standard_list_hover_color
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Category Style for Standard and Pinterest Lists", 'stockholm' ),
			esc_html__( "Define category styles for standard and pinterest portfolio lists.", 'stockholm' )
		);
		$panel6->addChild(
			"group2",
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		$portfolio_category_standard_list_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_category_standard_list_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_category_standard_list_color",
			$portfolio_category_standard_list_color
		);
		$portfolio_category_standard_list_font_size = new StockholmQodeField(
			"textsimple",
			"portfolio_category_standard_list_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_category_standard_list_font_size",
			$portfolio_category_standard_list_font_size
		);
		$portfolio_category_standard_list_line_height = new StockholmQodeField(
			"textsimple",
			"portfolio_category_standard_list_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_category_standard_list_line_height",
			$portfolio_category_standard_list_line_height
		);
		$portfolio_category_standard_list_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_category_standard_list_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"portfolio_category_standard_list_text_transform",
			$portfolio_category_standard_list_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$portfolio_category_standard_list_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"portfolio_category_standard_list_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_category_standard_list_font_family",
			$portfolio_category_standard_list_font_family
		);
		$portfolio_category_standard_list_font_style = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_category_standard_list_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"portfolio_category_standard_list_font_style",
			$portfolio_category_standard_list_font_style
		);
		$portfolio_category_standard_list_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_category_standard_list_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"portfolio_category_standard_list_font_weight",
			$portfolio_category_standard_list_font_weight
		);
		$portfolio_category_standard_list_letter_spacing = new StockholmQodeField(
			"textsimple",
			"portfolio_category_standard_list_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_category_standard_list_letter_spacing",
			$portfolio_category_standard_list_letter_spacing
		);
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Title Style for Gallery and Masonry Lists", 'stockholm' ),
			esc_html__( "Define title styles for gallery and masonry portfolio lists.", 'stockholm' )
		);
		$panel6->addChild(
			"group3",
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		$portfolio_title_list_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_title_list_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_title_list_color",
			$portfolio_title_list_color
		);
		$portfolio_title_list_font_size = new StockholmQodeField(
			"textsimple",
			"portfolio_title_list_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_title_list_font_size",
			$portfolio_title_list_font_size
		);
		$portfolio_title_list_line_height = new StockholmQodeField(
			"textsimple",
			"portfolio_title_list_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_title_list_line_height",
			$portfolio_title_list_line_height
		);
		$portfolio_title_list_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_title_list_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"portfolio_title_list_text_transform",
			$portfolio_title_list_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		$portfolio_title_list_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"portfolio_title_list_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_title_list_font_family",
			$portfolio_title_list_font_family
		);
		$portfolio_title_list_font_style = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_title_list_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"portfolio_title_list_font_style",
			$portfolio_title_list_font_style
		);
		$portfolio_title_list_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_title_list_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"portfolio_title_list_font_weight",
			$portfolio_title_list_font_weight
		);
		$portfolio_title_list_letter_spacing = new StockholmQodeField(
			"textsimple",
			"portfolio_title_list_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_title_list_letter_spacing",
			$portfolio_title_list_letter_spacing
		);
		
		$group4 = new StockholmQodeGroup(
			esc_html__( "Category Style for Gallery and Masonry Lists", 'stockholm' ),
			esc_html__( "Define category styles for gallery and masonry portfolio lists.", 'stockholm' )
		);
		$panel6->addChild(
			"group4",
			$group4
		);
		
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);
		$portfolio_category_list_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_category_list_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_category_list_color",
			$portfolio_category_list_color
		);
		$portfolio_category_list_font_size = new StockholmQodeField(
			"textsimple",
			"portfolio_category_list_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_category_list_font_size",
			$portfolio_category_list_font_size
		);
		$portfolio_category_list_line_height = new StockholmQodeField(
			"textsimple",
			"portfolio_category_list_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_category_list_line_height",
			$portfolio_category_list_line_height
		);
		$portfolio_category_list_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_category_list_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"portfolio_category_list_text_transform",
			$portfolio_category_list_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		$portfolio_category_list_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"portfolio_category_list_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_category_list_font_family",
			$portfolio_category_list_font_family
		);
		$portfolio_category_list_font_style = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_category_list_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"portfolio_category_list_font_style",
			$portfolio_category_list_font_style
		);
		$portfolio_category_list_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_category_list_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"portfolio_category_list_font_weight",
			$portfolio_category_list_font_weight
		);
		$portfolio_category_list_letter_spacing = new StockholmQodeField(
			"textsimple",
			"portfolio_category_list_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_category_list_letter_spacing",
			$portfolio_category_list_letter_spacing
		);
		
		// Portfolio Single
		
		$panel61 = new StockholmQodePanel(
			esc_html__( "Portfolio Single", 'stockholm' ),
			"portfolio_single_panel"
		);
		$fontsPage->addChild(
			"panel61",
			$panel61
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Title Style for Big Images, Big Slider, Full Width Slider, Masonry Gallery and Gallery Layout", 'stockholm' ),
			esc_html__( "Define title styles for portfolio single big images, big slider and gallery layout.", 'stockholm' )
		);
		$panel61->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		$portfolio_single_big_title_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_single_big_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_big_title_color",
			$portfolio_single_big_title_color
		);
		$portfolio_single_big_title_font_size = new StockholmQodeField(
			"textsimple",
			"portfolio_single_big_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_big_title_font_size",
			$portfolio_single_big_title_font_size
		);
		$portfolio_single_big_title_line_height = new StockholmQodeField(
			"textsimple",
			"portfolio_single_big_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_big_title_line_height",
			$portfolio_single_big_title_line_height
		);
		$portfolio_single_big_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_big_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"portfolio_single_big_title_text_transform",
			$portfolio_single_big_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$portfolio_single_big_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"portfolio_single_big_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_single_big_title_font_family",
			$portfolio_single_big_title_font_family
		);
		$portfolio_single_big_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_big_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"portfolio_single_big_title_font_style",
			$portfolio_single_big_title_font_style
		);
		$portfolio_single_big_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_big_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"portfolio_single_big_title_font_weight",
			$portfolio_single_big_title_font_weight
		);
		$portfolio_single_big_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"portfolio_single_big_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_single_big_title_letter_spacing",
			$portfolio_single_big_title_letter_spacing
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Title Style for Small Images, Small Slider, Gallery, Gallery Right, Fixed Left, Fixed Right Layout", 'stockholm' ),
			esc_html__( "Define title styles for portfolio single small images and small slider layout.", 'stockholm' )
		);
		$panel61->addChild(
			"group2",
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		$portfolio_single_small_title_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_single_small_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_small_title_color",
			$portfolio_single_small_title_color
		);
		$portfolio_single_small_title_font_size = new StockholmQodeField(
			"textsimple",
			"portfolio_single_small_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_small_title_font_size",
			$portfolio_single_small_title_font_size
		);
		$portfolio_single_small_title_line_height = new StockholmQodeField(
			"textsimple",
			"portfolio_single_small_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_small_title_line_height",
			$portfolio_single_small_title_line_height
		);
		$portfolio_single_small_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_small_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"portfolio_single_small_title_text_transform",
			$portfolio_single_small_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$portfolio_single_small_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"portfolio_single_small_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_single_small_title_font_family",
			$portfolio_single_small_title_font_family
		);
		$portfolio_single_small_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_small_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"portfolio_single_small_title_font_style",
			$portfolio_single_small_title_font_style
		);
		$portfolio_single_small_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_small_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"portfolio_single_small_title_font_weight",
			$portfolio_single_small_title_font_weight
		);
		$portfolio_single_small_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"portfolio_single_small_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_single_small_title_letter_spacing",
			$portfolio_single_small_title_letter_spacing
		);
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Title Info Style", 'stockholm' ),
			esc_html__( "Define info title (date, categories, custom) styles.", 'stockholm' )
		);
		$panel61->addChild(
			"group3",
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		$portfolio_single_meta_title_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_single_meta_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_meta_title_color",
			$portfolio_single_meta_title_color
		);
		$portfolio_single_meta_title_font_size = new StockholmQodeField(
			"textsimple",
			"portfolio_single_meta_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_meta_title_font_size",
			$portfolio_single_meta_title_font_size
		);
		$portfolio_single_meta_title_line_height = new StockholmQodeField(
			"textsimple",
			"portfolio_single_meta_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_meta_title_line_height",
			$portfolio_single_meta_title_line_height
		);
		$portfolio_single_meta_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_meta_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"portfolio_single_meta_title_text_transform",
			$portfolio_single_meta_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		$portfolio_single_meta_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"portfolio_single_meta_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_single_meta_title_font_family",
			$portfolio_single_meta_title_font_family
		);
		$portfolio_single_meta_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_meta_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"portfolio_single_meta_title_font_style",
			$portfolio_single_meta_title_font_style
		);
		$portfolio_single_meta_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_meta_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"portfolio_single_meta_title_font_weight",
			$portfolio_single_meta_title_font_weight
		);
		$portfolio_single_meta_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"portfolio_single_meta_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_single_meta_title_letter_spacing",
			$portfolio_single_meta_title_letter_spacing
		);
		
		$group4 = new StockholmQodeGroup(
			esc_html__( "Text Info Style", 'stockholm' ),
			esc_html__( "Define info text styles.", 'stockholm' )
		);
		$panel61->addChild(
			"group4",
			$group4
		);
		
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);
		$portfolio_single_meta_text_color = new StockholmQodeField(
			"colorsimple",
			"portfolio_single_meta_text_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_meta_text_color",
			$portfolio_single_meta_text_color
		);
		$portfolio_single_meta_text_font_size = new StockholmQodeField(
			"textsimple",
			"portfolio_single_meta_text_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_meta_text_font_size",
			$portfolio_single_meta_text_font_size
		);
		$portfolio_single_meta_text_line_height = new StockholmQodeField(
			"textsimple",
			"portfolio_single_meta_text_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"portfolio_single_meta_text_line_height",
			$portfolio_single_meta_text_line_height
		);
		$portfolio_single_meta_text_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_meta_text_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"portfolio_single_meta_text_text_transform",
			$portfolio_single_meta_text_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		$portfolio_single_meta_text_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"portfolio_single_meta_text_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_single_meta_text_font_family",
			$portfolio_single_meta_text_font_family
		);
		$portfolio_single_meta_text_font_style = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_meta_text_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"portfolio_single_meta_text_font_style",
			$portfolio_single_meta_text_font_style
		);
		$portfolio_single_meta_text_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"portfolio_single_meta_text_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"portfolio_single_meta_text_font_weight",
			$portfolio_single_meta_text_font_weight
		);
		$portfolio_single_meta_text_letter_spacing = new StockholmQodeField(
			"textsimple",
			"portfolio_single_meta_text_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"portfolio_single_meta_text_letter_spacing",
			$portfolio_single_meta_text_letter_spacing
		);
		
		// Blog List and Single
		
		$panel9 = new StockholmQodePanel(
			esc_html__( "Blog Info", 'stockholm' ),
			"blog_list_single_panel"
		);
		$fontsPage->addChild(
			"panel9",
			$panel9
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Blog Info Style", 'stockholm' ),
			esc_html__( "Applied to both blog list and single. Define info (date, categories, author, etc.) styles.", 'stockholm' )
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
		$blog_list_info_color = new StockholmQodeField(
			"colorsimple",
			"blog_list_info_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_list_info_color",
			$blog_list_info_color
		);
		$blog_list_info_font_size = new StockholmQodeField(
			"textsimple",
			"blog_list_info_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_list_info_font_size",
			$blog_list_info_font_size
		);
		$blog_list_info_line_height = new StockholmQodeField(
			"textsimple",
			"blog_list_info_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_list_info_line_height",
			$blog_list_info_line_height
		);
		$blog_list_info_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_list_info_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_list_info_text_transform",
			$blog_list_info_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$blog_list_info_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_list_info_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_list_info_font_family",
			$blog_list_info_font_family
		);
		$blog_list_info_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_list_info_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_list_info_font_style",
			$blog_list_info_font_style
		);
		$blog_list_info_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_list_info_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_list_info_font_weight",
			$blog_list_info_font_weight
		);
		$blog_list_info_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_list_info_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_list_info_letter_spacing",
			$blog_list_info_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);
		$blog_list_info_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_list_info_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"blog_list_info_hover_color",
			$blog_list_info_hover_color
		);
		
		// Blog List
		
		$panel7 = new StockholmQodePanel(
			esc_html__( "Blog List", 'stockholm' ),
			"blog_panel"
		);
		$fontsPage->addChild(
			"panel7",
			$panel7
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Blog Large Image Title Style", 'stockholm' ),
			esc_html__( "Define title styles for Blog Large Image template.", 'stockholm' )
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
		$blog_large_image_title_color = new StockholmQodeField(
			"colorsimple",
			"blog_large_image_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_title_color",
			$blog_large_image_title_color
		);
		$blog_large_image_title_fontsize = new StockholmQodeField(
			"textsimple",
			"blog_large_image_title_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_title_fontsize",
			$blog_large_image_title_fontsize
		);
		$blog_large_image_title_lineheight = new StockholmQodeField(
			"textsimple",
			"blog_large_image_title_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_title_lineheight",
			$blog_large_image_title_lineheight
		);
		$blog_large_image_title_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"blog_large_image_title_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_large_image_title_texttransform",
			$blog_large_image_title_texttransform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$blog_large_image_title_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_large_image_title_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_large_image_title_google_fonts",
			$blog_large_image_title_google_fonts
		);
		$blog_large_image_title_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"blog_large_image_title_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_large_image_title_fontstyle",
			$blog_large_image_title_fontstyle
		);
		$blog_large_image_title_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"blog_large_image_title_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_large_image_title_fontweight",
			$blog_large_image_title_fontweight
		);
		$blog_large_image_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_large_image_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_large_image_title_letter_spacing",
			$blog_large_image_title_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group2->addChild(
			"row3",
			$row3
		);
		$blog_large_image_title_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_large_image_title_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"blog_large_image_title_hover_color",
			$blog_large_image_title_hover_color
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Blog Large Image Quote/Link Title Style", 'stockholm' ),
			esc_html__( "Define title styles for Quote/Link articles on Blog Large Image template.", 'stockholm' )
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
		$blog_large_image_ql_title_color = new StockholmQodeField(
			"colorsimple",
			"blog_large_image_ql_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_ql_title_color",
			$blog_large_image_ql_title_color
		);
		$blog_large_image_ql_title_font_size = new StockholmQodeField(
			"textsimple",
			"blog_large_image_ql_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_ql_title_font_size",
			$blog_large_image_ql_title_font_size
		);
		$blog_large_image_ql_title_line_height = new StockholmQodeField(
			"textsimple",
			"blog_large_image_ql_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_ql_title_line_height",
			$blog_large_image_ql_title_line_height
		);
		$blog_large_image_ql_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_large_image_ql_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_large_image_ql_title_text_transform",
			$blog_large_image_ql_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$blog_large_image_ql_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_large_image_ql_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_large_image_ql_title_font_family",
			$blog_large_image_ql_title_font_family
		);
		$blog_large_image_ql_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_large_image_ql_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_large_image_ql_title_font_style",
			$blog_large_image_ql_title_font_style
		);
		$blog_large_image_ql_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_large_image_ql_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_large_image_ql_title_font_weight",
			$blog_large_image_ql_title_font_weight
		);
		$blog_large_image_ql_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_large_image_ql_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_large_image_ql_title_letter_spacing",
			$blog_large_image_ql_title_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group1->addChild(
			"row3",
			$row3
		);
		$blog_large_image_ql_title_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_large_image_ql_title_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"blog_large_image_ql_title_hover_color",
			$blog_large_image_ql_title_hover_color
		);
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Blog Masonry/Pinterest Title Style", 'stockholm' ),
			esc_html__( "Define title styles for Blog Masonry/Pinterest template.", 'stockholm' )
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
		$blog_masonry_title_color = new StockholmQodeField(
			"colorsimple",
			"blog_masonry_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_title_color",
			$blog_masonry_title_color
		);
		$blog_masonry_title_font_size = new StockholmQodeField(
			"textsimple",
			"blog_masonry_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_title_font_size",
			$blog_masonry_title_font_size
		);
		$blog_masonry_title_line_height = new StockholmQodeField(
			"textsimple",
			"blog_masonry_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_title_line_height",
			$blog_masonry_title_line_height
		);
		$blog_masonry_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_masonry_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_masonry_title_text_transform",
			$blog_masonry_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		$blog_masonry_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_masonry_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_masonry_title_font_family",
			$blog_masonry_title_font_family
		);
		$blog_masonry_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_masonry_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_masonry_title_font_style",
			$blog_masonry_title_font_style
		);
		$blog_masonry_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_masonry_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_masonry_title_font_weight",
			$blog_masonry_title_font_weight
		);
		$blog_masonry_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_masonry_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_masonry_title_letter_spacing",
			$blog_masonry_title_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group3->addChild(
			"row3",
			$row3
		);
		$blog_masonry_title_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_masonry_title_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"blog_masonry_title_hover_color",
			$blog_masonry_title_hover_color
		);
		
		$group4 = new StockholmQodeGroup(
			esc_html__( "Blog Masonry/Pinterest Quote/Link Title Style", 'stockholm' ),
			esc_html__( "Define title styles for Quote/Link articles on Blog Masonry/Pinterest template.", 'stockholm' )
		);
		$panel7->addChild(
			"group4",
			$group4
		);
		
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);
		$blog_masonry_ql_title_color = new StockholmQodeField(
			"colorsimple",
			"blog_masonry_ql_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_ql_title_color",
			$blog_masonry_ql_title_color
		);
		$blog_masonry_ql_title_font_size = new StockholmQodeField(
			"textsimple",
			"blog_masonry_ql_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_ql_title_font_size",
			$blog_masonry_ql_title_font_size
		);
		$blog_masonry_ql_title_line_height = new StockholmQodeField(
			"textsimple",
			"blog_masonry_ql_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_ql_title_line_height",
			$blog_masonry_ql_title_line_height
		);
		$blog_masonry_ql_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_masonry_ql_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_masonry_ql_title_text_transform",
			$blog_masonry_ql_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		$blog_masonry_ql_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_masonry_ql_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_masonry_ql_title_font_family",
			$blog_masonry_ql_title_font_family
		);
		$blog_masonry_ql_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_masonry_ql_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_masonry_ql_title_font_style",
			$blog_masonry_ql_title_font_style
		);
		$blog_masonry_ql_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_masonry_ql_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_masonry_ql_title_font_weight",
			$blog_masonry_ql_title_font_weight
		);
		$blog_masonry_ql_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_masonry_ql_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_masonry_ql_title_letter_spacing",
			$blog_masonry_ql_title_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group4->addChild(
			"row3",
			$row3
		);
		$blog_masonry_ql_title_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_masonry_ql_title_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"blog_masonry_ql_title_hover_color",
			$blog_masonry_ql_title_hover_color
		);
		
		$group7 = new StockholmQodeGroup(
			esc_html__( "Blog Masonry/Pinterest Quote/Link Icon Style", 'stockholm' ),
			esc_html__( "Define icon styles for Quote/Link articles on Blog Masonry/Pinterest template.", 'stockholm' )
		);
		$panel7->addChild(
			"group7",
			$group7
		);
		
		$row1 = new StockholmQodeRow();
		$group7->addChild(
			"row1",
			$row1
		);
		$blog_masonry_ql_icon_color = new StockholmQodeField(
			"colorsimple",
			"blog_masonry_ql_icon_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_ql_icon_color",
			$blog_masonry_ql_icon_color
		);
		$blog_masonry_ql_icon_background_color = new StockholmQodeField(
			"colorsimple",
			"blog_masonry_ql_icon_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_ql_icon_background_color",
			$blog_masonry_ql_icon_background_color
		);
		$blog_masonry_ql_icon_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_masonry_ql_icon_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_ql_icon_hover_color",
			$blog_masonry_ql_icon_hover_color
		);
		$blog_masonry_ql_icon_background_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_masonry_ql_icon_background_hover_color",
			"",
			esc_html__( "Hover Background Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_ql_icon_background_hover_color",
			$blog_masonry_ql_icon_background_hover_color
		);
		
		$group8 = new StockholmQodeGroup(
			esc_html__( "Blog Large Image Quote Author Style", 'stockholm' ),
			esc_html__( "Define author styles for Quote articles on Blog Large Image template.", 'stockholm' )
		);
		$panel7->addChild(
			"group8",
			$group8
		);
		
		$row1 = new StockholmQodeRow();
		$group8->addChild(
			"row1",
			$row1
		);
		$blog_large_image_ql_author_color = new StockholmQodeField(
			"colorsimple",
			"blog_large_image_ql_author_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_ql_author_color",
			$blog_large_image_ql_author_color
		);
		$blog_large_image_ql_author_font_size = new StockholmQodeField(
			"textsimple",
			"blog_large_image_ql_author_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_ql_author_font_size",
			$blog_large_image_ql_author_font_size
		);
		$blog_large_image_ql_author_line_height = new StockholmQodeField(
			"textsimple",
			"blog_large_image_ql_author_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_ql_author_line_height",
			$blog_large_image_ql_author_line_height
		);
		$blog_large_image_ql_author_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_large_image_ql_author_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_large_image_ql_author_text_transform",
			$blog_large_image_ql_author_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group8->addChild(
			"row2",
			$row2
		);
		$blog_large_image_ql_author_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_large_image_ql_author_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_large_image_ql_author_font_family",
			$blog_large_image_ql_author_font_family
		);
		$blog_large_image_ql_author_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_large_image_ql_author_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_large_image_ql_author_font_style",
			$blog_large_image_ql_author_font_style
		);
		$blog_large_image_ql_author_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_large_image_ql_author_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_large_image_ql_author_font_weight",
			$blog_large_image_ql_author_font_weight
		);
		$blog_large_image_ql_author_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_large_image_ql_author_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_large_image_ql_author_letter_spacing",
			$blog_large_image_ql_author_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group8->addChild(
			"row3",
			$row3
		);
		$blog_large_image_ql_author_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_large_image_ql_author_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"blog_large_image_ql_author_hover_color",
			$blog_large_image_ql_author_hover_color
		);
		
		$group5 = new StockholmQodeGroup(
			esc_html__( "Blog Masonry/Pinterest Author and Comments Style", 'stockholm' ),
			esc_html__( "Define author and comments styles for Blog Masonry/Pinterest template.", 'stockholm' )
		);
		$panel7->addChild(
			"group5",
			$group5
		);
		
		$row1 = new StockholmQodeRow();
		$group5->addChild(
			"row1",
			$row1
		);
		$blog_masonry_author_color = new StockholmQodeField(
			"colorsimple",
			"blog_masonry_author_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_author_color",
			$blog_masonry_author_color
		);
		$blog_masonry_author_font_size = new StockholmQodeField(
			"textsimple",
			"blog_masonry_author_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_author_font_size",
			$blog_masonry_author_font_size
		);
		$blog_masonry_author_line_height = new StockholmQodeField(
			"textsimple",
			"blog_masonry_author_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_masonry_author_line_height",
			$blog_masonry_author_line_height
		);
		$blog_masonry_author_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_masonry_author_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_masonry_author_text_transform",
			$blog_masonry_author_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group5->addChild(
			"row2",
			$row2
		);
		$blog_masonry_author_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_masonry_author_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_masonry_author_font_family",
			$blog_masonry_author_font_family
		);
		$blog_masonry_author_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_masonry_author_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_masonry_author_font_style",
			$blog_masonry_author_font_style
		);
		$blog_masonry_author_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_masonry_author_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_masonry_author_font_weight",
			$blog_masonry_author_font_weight
		);
		$blog_masonry_author_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_masonry_author_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_masonry_author_letter_spacing",
			$blog_masonry_author_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group5->addChild(
			"row3",
			$row3
		);
		$blog_masonry_author_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_masonry_author_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"blog_masonry_author_hover_color",
			$blog_masonry_author_hover_color
		);
		
		$group6 = new StockholmQodeGroup(
			esc_html__( "Blog Large Image Icons Style", 'stockholm' ),
			esc_html__( "Define icons styles in articles for Blog Large Image template.", 'stockholm' )
		);
		$panel7->addChild(
			"group6",
			$group6
		);
		
		$row1 = new StockholmQodeRow();
		$group6->addChild(
			"row1",
			$row1
		);
		$blog_large_image_icon_color = new StockholmQodeField(
			"colorsimple",
			"blog_large_image_icon_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_icon_color",
			$blog_large_image_icon_color
		);
		$blog_large_image_icon_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_large_image_icon_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_icon_hover_color",
			$blog_large_image_icon_hover_color
		);
		$blog_large_image_icon_background_color = new StockholmQodeField(
			"colorsimple",
			"blog_large_image_icon_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_icon_background_color",
			$blog_large_image_icon_background_color
		);
		$blog_large_image_icon_background_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_large_image_icon_background_hover_color",
			"",
			esc_html__( "Background Hover Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_large_image_icon_background_hover_color",
			$blog_large_image_icon_background_hover_color
		);
		
		$group9 = new StockholmQodeGroup(
			esc_html__( "Blog Chequered With Background Image Visible Title Style", 'stockholm' ),
			esc_html__( "Define title styles for Blog Chequered template when background image of post is visible.", 'stockholm' )
		);
		$panel7->addChild(
			"group9",
			$group9
		);
		
		$row1 = new StockholmQodeRow();
		$group9->addChild(
			"row1",
			$row1
		);
		$blog_chequered_with_image_title_color = new StockholmQodeField(
			"colorsimple",
			"blog_chequered_with_image_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_chequered_with_image_title_color",
			$blog_chequered_with_image_title_color
		);
		$blog_chequered_with_image_title_font_size = new StockholmQodeField(
			"textsimple",
			"blog_chequered_with_image_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_chequered_with_image_title_font_size",
			$blog_chequered_with_image_title_font_size
		);
		$blog_chequered_with_image_title_line_height = new StockholmQodeField(
			"textsimple",
			"blog_chequered_with_image_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_chequered_with_image_title_line_height",
			$blog_chequered_with_image_title_line_height
		);
		$blog_chequered_with_image_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_chequered_with_image_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_chequered_with_image_title_text_transform",
			$blog_chequered_with_image_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group9->addChild(
			"row2",
			$row2
		);
		$blog_chequered_with_image_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_chequered_with_image_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_chequered_with_image_title_font_family",
			$blog_chequered_with_image_title_font_family
		);
		$blog_chequered_with_image_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_chequered_with_image_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_chequered_with_image_title_font_style",
			$blog_chequered_with_image_title_font_style
		);
		$blog_chequered_with_image_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_chequered_with_image_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_chequered_with_image_title_font_weight",
			$blog_chequered_with_image_title_font_weight
		);
		$blog_chequered_with_image_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_chequered_with_image_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_chequered_with_image_title_letter_spacing",
			$blog_chequered_with_image_title_letter_spacing
		);
		
		$group10 = new StockholmQodeGroup(
			esc_html__( "Blog Chequered With Background Color Visible Title Style", 'stockholm' ),
			esc_html__( "Define title styles for Blog Chequered template when background color of post is visible.", 'stockholm' )
		);
		$panel7->addChild(
			"group10",
			$group10
		);
		
		$row1 = new StockholmQodeRow();
		$group10->addChild(
			"row1",
			$row1
		);
		$blog_chequered_with_bgcolor_title_color = new StockholmQodeField(
			"colorsimple",
			"blog_chequered_with_bgcolor_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_chequered_with_bgcolor_title_color",
			$blog_chequered_with_bgcolor_title_color
		);
		$blog_chequered_with_bgcolor_title_font_size = new StockholmQodeField(
			"textsimple",
			"blog_chequered_with_bgcolor_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_chequered_with_bgcolor_title_font_size",
			$blog_chequered_with_bgcolor_title_font_size
		);
		$blog_chequered_with_bgcolor_title_line_height = new StockholmQodeField(
			"textsimple",
			"blog_chequered_with_bgcolor_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_chequered_with_bgcolor_title_line_height",
			$blog_chequered_with_bgcolor_title_line_height
		);
		$blog_chequered_with_bgcolor_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_chequered_with_bgcolor_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_chequered_with_bgcolor_title_text_transform",
			$blog_chequered_with_bgcolor_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group10->addChild(
			"row2",
			$row2
		);
		$blog_chequered_with_bgcolor_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_chequered_with_bgcolor_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_chequered_with_bgcolor_title_font_family",
			$blog_chequered_with_bgcolor_title_font_family
		);
		$blog_chequered_with_bgcolor_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_chequered_with_bgcolor_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_chequered_with_bgcolor_title_font_style",
			$blog_chequered_with_bgcolor_title_font_style
		);
		$blog_chequered_with_bgcolor_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_chequered_with_bgcolor_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_chequered_with_bgcolor_title_font_weight",
			$blog_chequered_with_bgcolor_title_font_weight
		);
		$blog_chequered_with_bgcolor_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_chequered_with_bgcolor_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_chequered_with_bgcolor_title_letter_spacing",
			$blog_chequered_with_bgcolor_title_letter_spacing
		);
		
		$group11 = new StockholmQodeGroup(
			esc_html__( "Blog Animated Title Style", 'stockholm' ),
			esc_html__( "Define title styles for Blog Animated template.", 'stockholm' )
		);
		$panel7->addChild(
			"group11",
			$group11
		);
		
		$row1 = new StockholmQodeRow();
		$group11->addChild(
			"row1",
			$row1
		);
		$blog_animated_title_color = new StockholmQodeField(
			"colorsimple",
			"blog_animated_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_animated_title_color",
			$blog_animated_title_color
		);
		$blog_animated_title_font_size = new StockholmQodeField(
			"textsimple",
			"blog_animated_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_animated_title_font_size",
			$blog_animated_title_font_size
		);
		$blog_animated_title_line_height = new StockholmQodeField(
			"textsimple",
			"blog_animated_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_animated_title_line_height",
			$blog_animated_title_line_height
		);
		$blog_animated_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_animated_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_animated_title_text_transform",
			$blog_animated_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group11->addChild(
			"row2",
			$row2
		);
		$blog_animated_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_animated_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_animated_title_font_family",
			$blog_animated_title_font_family
		);
		$blog_animated_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_animated_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_animated_title_font_style",
			$blog_animated_title_font_style
		);
		$blog_animated_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_animated_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_animated_title_font_weight",
			$blog_animated_title_font_weight
		);
		$blog_animated_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_animated_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_animated_title_letter_spacing",
			$blog_animated_title_letter_spacing
		);
		
		$group12 = new StockholmQodeGroup(
			esc_html__( "Blog Centered Title Style", 'stockholm' ),
			esc_html__( "Define title styles for Blog Centered template.", 'stockholm' )
		);
		$panel7->addChild(
			"group12",
			$group12
		);
		
		$row1 = new StockholmQodeRow();
		$group12->addChild(
			"row1",
			$row1
		);
		$blog_centered_title_color = new StockholmQodeField(
			"colorsimple",
			"blog_centered_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_centered_title_color",
			$blog_centered_title_color
		);
		$blog_centered_title_font_size = new StockholmQodeField(
			"textsimple",
			"blog_centered_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_centered_title_font_size",
			$blog_centered_title_font_size
		);
		$blog_centered_title_line_height = new StockholmQodeField(
			"textsimple",
			"blog_centered_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_centered_title_line_height",
			$blog_centered_title_line_height
		);
		$blog_centered_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_centered_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_centered_title_text_transform",
			$blog_centered_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group12->addChild(
			"row2",
			$row2
		);
		$blog_centered_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_centered_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_centered_title_font_family",
			$blog_centered_title_font_family
		);
		$blog_centered_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_centered_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_centered_title_font_style",
			$blog_centered_title_font_style
		);
		$blog_centered_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_centered_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_centered_title_font_weight",
			$blog_centered_title_font_weight
		);
		$blog_centered_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_centered_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_centered_title_letter_spacing",
			$blog_centered_title_letter_spacing
		);
		
		$group13 = new StockholmQodeGroup(
			esc_html__( "Blog Centered Info Style", 'stockholm' ),
			esc_html__( "Define styles for date, categories and author info on Blog Centered template.", 'stockholm' )
		);
		$panel7->addChild(
			"group13",
			$group13
		);
		
		$row1 = new StockholmQodeRow();
		$group13->addChild(
			"row1",
			$row1
		);
		$blog_centered_info_color = new StockholmQodeField(
			"colorsimple",
			"blog_centered_info_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_centered_info_color",
			$blog_centered_info_color
		);
		$blog_centered_info_font_size = new StockholmQodeField(
			"textsimple",
			"blog_centered_info_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_centered_info_font_size",
			$blog_centered_info_font_size
		);
		$blog_centered_info_line_height = new StockholmQodeField(
			"textsimple",
			"blog_centered_info_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_centered_info_line_height",
			$blog_centered_info_line_height
		);
		$blog_centered_info_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_centered_info_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_centered_info_text_transform",
			$blog_centered_info_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group13->addChild(
			"row2",
			$row2
		);
		$blog_centered_info_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_centered_info_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_centered_info_font_family",
			$blog_centered_info_font_family
		);
		$blog_centered_info_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_centered_info_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_centered_info_font_style",
			$blog_centered_info_font_style
		);
		$blog_centered_info_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_centered_info_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_centered_info_font_weight",
			$blog_centered_info_font_weight
		);
		$blog_centered_info_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_centered_info_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_centered_info_letter_spacing",
			$blog_centered_info_letter_spacing
		);
		
		// Blog Single
		
		$panel8 = new StockholmQodePanel(
			esc_html__( "Blog Single", 'stockholm' ),
			"blog_single_panel"
		);
		$fontsPage->addChild(
			"panel8",
			$panel8
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Blog Single Title Style", 'stockholm' ),
			esc_html__( "Define title styles for Blog Single.", 'stockholm' )
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
		$blog_single_title_color = new StockholmQodeField(
			"colorsimple",
			"blog_single_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_single_title_color",
			$blog_single_title_color
		);
		$blog_single_title_font_size = new StockholmQodeField(
			"textsimple",
			"blog_single_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_single_title_font_size",
			$blog_single_title_font_size
		);
		$blog_single_title_line_height = new StockholmQodeField(
			"textsimple",
			"blog_single_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_single_title_line_height",
			$blog_single_title_line_height
		);
		$blog_single_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_single_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_single_title_text_transform",
			$blog_single_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$blog_single_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_single_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_single_title_font_family",
			$blog_single_title_font_family
		);
		$blog_single_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_single_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_single_title_font_style",
			$blog_single_title_font_style
		);
		$blog_single_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_single_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_single_title_font_weight",
			$blog_single_title_font_weight
		);
		$blog_single_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_single_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_single_title_letter_spacing",
			$blog_single_title_letter_spacing
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Blog Single Quote/Link Title Style", 'stockholm' ),
			esc_html__( "Define title styles for Quote/Link articles on Blog Single.", 'stockholm' )
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
		$blog_single_ql_title_color = new StockholmQodeField(
			"colorsimple",
			"blog_single_ql_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"blog_single_ql_title_color",
			$blog_single_ql_title_color
		);
		$blog_single_ql_title_font_size = new StockholmQodeField(
			"textsimple",
			"blog_single_ql_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_single_ql_title_font_size",
			$blog_single_ql_title_font_size
		);
		$blog_single_ql_title_line_height = new StockholmQodeField(
			"textsimple",
			"blog_single_ql_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_single_ql_title_line_height",
			$blog_single_ql_title_line_height
		);
		$blog_single_ql_title_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"blog_single_ql_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"blog_single_ql_title_text_transform",
			$blog_single_ql_title_text_transform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$blog_single_ql_title_font_family = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"blog_single_ql_title_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"blog_single_ql_title_font_family",
			$blog_single_ql_title_font_family
		);
		$blog_single_ql_title_font_style = new StockholmQodeField(
			"selectblanksimple",
			"blog_single_ql_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"blog_single_ql_title_font_style",
			$blog_single_ql_title_font_style
		);
		$blog_single_ql_title_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"blog_single_ql_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"blog_single_ql_title_font_weight",
			$blog_single_ql_title_font_weight
		);
		$blog_single_ql_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"blog_single_ql_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"blog_single_ql_title_letter_spacing",
			$blog_single_ql_title_letter_spacing
		);
		
		$row3 = new StockholmQodeRow( true );
		$group2->addChild(
			"row3",
			$row3
		);
		$blog_single_ql_title_hover_color = new StockholmQodeField(
			"colorsimple",
			"blog_single_ql_title_hover_color",
			"",
			esc_html__( "Hover Color", 'stockholm' )
		);
		$row3->addChild(
			"blog_single_ql_title_hover_color",
			$blog_single_ql_title_hover_color
		);
		
		// Contact Page
		
		$panel10 = new StockholmQodePanel(
			esc_html__( "Contact Page", 'stockholm' ),
			"contact_page_panel"
		);
		$fontsPage->addChild(
			"panel10",
			$panel10
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Heading Style", 'stockholm' ),
			esc_html__( "Define heading styles above contact form.", 'stockholm' )
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
		$contact_form_heading_color = new StockholmQodeField(
			"colorsimple",
			"contact_form_heading_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"contact_form_heading_color",
			$contact_form_heading_color
		);
		$contact_form_heading_fontsize = new StockholmQodeField(
			"textsimple",
			"contact_form_heading_fontsize",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"contact_form_heading_fontsize",
			$contact_form_heading_fontsize
		);
		$contact_form_heading_lineheight = new StockholmQodeField(
			"textsimple",
			"contact_form_heading_lineheight",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"contact_form_heading_lineheight",
			$contact_form_heading_lineheight
		);
		$contact_form_heading_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"contact_form_heading_texttransform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"contact_form_heading_texttransform",
			$contact_form_heading_texttransform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group1->addChild(
			"row2",
			$row2
		);
		$contact_form_heading_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"contact_form_heading_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"contact_form_heading_google_fonts",
			$contact_form_heading_google_fonts
		);
		$contact_form_heading_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"contact_form_heading_fontstyle",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"contact_form_heading_fontstyle",
			$contact_form_heading_fontstyle
		);
		$contact_form_heading_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"contact_form_heading_fontweight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"contact_form_heading_fontweight",
			$contact_form_heading_fontweight
		);
		$contact_form_heading_letter_spacing = new StockholmQodeField(
			"textsimple",
			"contact_form_heading_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"contact_form_heading_letter_spacing",
			$contact_form_heading_letter_spacing
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Title Style", 'stockholm' ),
			esc_html__( "Define title styles in section above form.", 'stockholm' )
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
		$contact_form_section_title_color = new StockholmQodeField(
			"colorsimple",
			"contact_form_section_title_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"contact_form_section_title_color",
			$contact_form_section_title_color
		);
		$contact_form_section_title_fontsize = new StockholmQodeField(
			"textsimple",
			"contact_form_section_title_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"contact_form_section_title_fontsize",
			$contact_form_section_title_fontsize
		);
		$contact_form_section_title_lineheight = new StockholmQodeField(
			"textsimple",
			"contact_form_section_title_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"contact_form_section_title_lineheight",
			$contact_form_section_title_lineheight
		);
		$contact_form_section_title_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"contact_form_section_title_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"contact_form_section_title_texttransform",
			$contact_form_section_title_texttransform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group2->addChild(
			"row2",
			$row2
		);
		$contact_form_section_title_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"contact_form_section_title_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"contact_form_section_title_google_fonts",
			$contact_form_section_title_google_fonts
		);
		$contact_form_section_title_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"contact_form_section_title_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"contact_form_section_title_fontstyle",
			$contact_form_section_title_fontstyle
		);
		$contact_form_section_title_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"contact_form_section_title_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"contact_form_section_title_fontweight",
			$contact_form_section_title_fontweight
		);
		$contact_form_section_title_letter_spacing = new StockholmQodeField(
			"textsimple",
			"contact_form_section_title_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"contact_form_section_title_letter_spacing",
			$contact_form_section_title_letter_spacing
		);
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Subtitle Style", 'stockholm' ),
			esc_html__( "Define subtitle styles in section above form.", 'stockholm' )
		);
		$panel10->addChild(
			"group3",
			$group3
		);
		
		$row1 = new StockholmQodeRow();
		$group3->addChild(
			"row1",
			$row1
		);
		$contact_form_section_subtitle_color = new StockholmQodeField(
			"colorsimple",
			"contact_form_section_subtitle_color",
			"",
			esc_html__( "Text Color", 'stockholm' )
		);
		$row1->addChild(
			"contact_form_section_subtitle_color",
			$contact_form_section_subtitle_color
		);
		$contact_form_section_subtitle_fontsize = new StockholmQodeField(
			"textsimple",
			"contact_form_section_subtitle_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' )
		);
		$row1->addChild(
			"contact_form_section_subtitle_fontsize",
			$contact_form_section_subtitle_fontsize
		);
		$contact_form_section_subtitle_lineheight = new StockholmQodeField(
			"textsimple",
			"contact_form_section_subtitle_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' )
		);
		$row1->addChild(
			"contact_form_section_subtitle_lineheight",
			$contact_form_section_subtitle_lineheight
		);
		$contact_form_section_subtitle_texttransform = new StockholmQodeField(
			"selectblanksimple",
			"contact_form_section_subtitle_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row1->addChild(
			"contact_form_section_subtitle_texttransform",
			$contact_form_section_subtitle_texttransform
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		$contact_form_section_subtitle_google_fonts = new StockholmQodeField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"contact_form_section_subtitle_google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' )
		);
		$row2->addChild(
			"contact_form_section_subtitle_google_fonts",
			$contact_form_section_subtitle_google_fonts
		);
		$contact_form_section_subtitle_fontstyle = new StockholmQodeField(
			"selectblanksimple",
			"contact_form_section_subtitle_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"contact_form_section_subtitle_fontstyle",
			$contact_form_section_subtitle_fontstyle
		);
		$contact_form_section_subtitle_fontweight = new StockholmQodeField(
			"selectblanksimple",
			"contact_form_section_subtitle_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"contact_form_section_subtitle_fontweight",
			$contact_form_section_subtitle_fontweight
		);
		$contact_form_section_subtitle_letter_spacing = new StockholmQodeField(
			"textsimple",
			"contact_form_section_subtitle_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' )
		);
		$row2->addChild(
			"contact_form_section_subtitle_letter_spacing",
			$contact_form_section_subtitle_letter_spacing
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_fonts_options_map', 60 );
}