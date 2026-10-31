<?php

if ( ! function_exists( 'stockholm_qode_contact_options_map' ) ) {
	function stockholm_qode_contact_options_map() {

		$contactPage = new StockholmQodeAdminPage(
			"13",
			esc_html__( "Contact Page", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			esc_html__( "Contact Page", 'stockholm' ),
			$contactPage
		);
		
		//Contact Form
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Contact Page", 'stockholm' ),
			"contact_page_panel"
		);
		$contactPage->addChild(
			"panel1",
			$panel1
		);
		
		$enable_google_map = new StockholmQodeField(
			"yesno",
			"enable_google_map",
			"no",
			esc_html__( "Enable Google Map", 'stockholm' ),
			esc_html__( "Enabling this option will display a Google Map on your Contact page", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_google_map_settings_panel"
			)
		);
		$panel1->addChild(
			"enable_google_map",
			$enable_google_map
		);
		
		$section_between_map_form = new StockholmQodeField(
			"yesno",
			"section_between_map_form",
			"yes",
			esc_html__( "Show Upper Section", 'stockholm' ),
			esc_html__( "Enabling this option will display a section above the Contact Form", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_upper_section_settings_panel"
			)
		);
		$panel1->addChild(
			"section_between_map_form",
			$section_between_map_form
		);
		
		$enable_contact_form = new StockholmQodeField(
			"yesno",
			"enable_contact_form",
			"no",
			esc_html__( "Enable Contact Form", 'stockholm' ),
			esc_html__( "This option will display a Contact Form on Contact page", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_contact_form_settings_panel"
			)
		);
		$panel1->addChild(
			"enable_contact_form",
			$enable_contact_form
		);
		
		//Google Map Settings
		
		$panel3 = new StockholmQodePanel(
			esc_html__( "Google Map Settings", 'stockholm' ),
			"google_map_settings_panel",
			"enable_google_map",
			"no"
		);
		$contactPage->addChild(
			"panel3",
			$panel3
		);
		
		$google_map_position = new StockholmQodeField(
			"select",
			"google_map_position",
			"",
			esc_html__( "Google map position", 'stockholm' ),
			esc_html__( "Choose position for google map", 'stockholm' ),
			array(
				"bottom_position" => esc_html__( "Bottom - Between Content and Footer", 'stockholm' ),
				"top_position"    => esc_html__( "Top - Between Title and Content", 'stockholm' ),
				"right_position"  => esc_html__( "Right From Contact Form", 'stockholm' ),
				"left_position"   => esc_html__( "Left From Contact Form", 'stockholm' )
			)
		);
		
		$google_maps_api_key = new StockholmQodeField(
			"text",
			"google_maps_api_key",
			"",
			esc_html__( "Google Maps Api Key", 'stockholm' ),
			esc_html__( "Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our documentation.", 'stockholm' )
		);
		$panel3->addChild(
			"google_maps_api_key",
			$google_maps_api_key
		);
		
		$google_maps_height = new StockholmQodeField(
			"text",
			"google_maps_height",
			"750",
			esc_html__( "Map Height (px)", 'stockholm' ),
			esc_html__( "Enter a height for Google Map in pixels. Default value is 750.", 'stockholm' )
		);
		$panel3->addChild(
			"google_maps_height",
			$google_maps_height
		);
		
		$panel3->addChild(
			"google_map_position",
			$google_map_position
		);
		
		$google_maps_address = new StockholmQodeField(
			"text",
			"google_maps_address",
			"",
			esc_html__( "Google Map Address", 'stockholm' ),
			esc_html__( 'Enter address to be pinned on Google Map (Example: "Louvre Museum, Paris, France', 'stockholm' )
		);
		$panel3->addChild(
			"google_maps_address",
			$google_maps_address
		);
		
		$google_maps_address2 = new StockholmQodeField(
			"text",
			"google_maps_address2",
			"",
			esc_html__( "Google Map Address 2", 'stockholm' ),
			esc_html__( "Enter additional address to be pinned on Google Map", 'stockholm' )
		);
		$panel3->addChild(
			"google_maps_address2",
			$google_maps_address2
		);
		
		$google_maps_address3 = new StockholmQodeField(
			"text",
			"google_maps_address3",
			"",
			esc_html__( "Google Map Address 3", 'stockholm' ),
			esc_html__( "Enter additional address to be pinned on Google Map", 'stockholm' )
		);
		$panel3->addChild(
			"google_maps_address3",
			$google_maps_address3
		);
		
		$google_maps_address4 = new StockholmQodeField(
			"text",
			"google_maps_address4",
			"",
			esc_html__( "Google Map Address 4", 'stockholm' ),
			esc_html__( "Enter additional address to be pinned on Google Map", 'stockholm' )
		);
		$panel3->addChild(
			"google_maps_address4",
			$google_maps_address4
		);
		
		$google_maps_address5 = new StockholmQodeField(
			"text",
			"google_maps_address5",
			"",
			esc_html__( "Google Map Address 5", 'stockholm' ),
			esc_html__( "Enter additional address to be pinned on Google Map", 'stockholm' )
		);
		$panel3->addChild(
			"google_maps_address5",
			$google_maps_address5
		);
		
		$google_maps_pin_image = new StockholmQodeField(
			"image",
			"google_maps_pin_image",
			QODE_ROOT . "/img/pin.png",
			esc_html__( "Pin Image", 'stockholm' ),
			esc_html__( "Select a pin image to be used on Google Map ", 'stockholm' )
		);
		$panel3->addChild(
			"google_maps_pin_image",
			$google_maps_pin_image
		);
		
		$google_maps_zoom = new StockholmQodeField(
			"range",
			"google_maps_zoom",
			"12",
			esc_html__( "Map Zoom", 'stockholm' ),
			esc_html__( "Enter a zoom factor for Google Map (0 = whole worlds, 19 = individual buildings)", 'stockholm' ),
			array(),
			array(
				"range_min"      => "3",
				"range_max"      => "19",
				"range_step"     => "1",
				"range_decimals" => "0"
			)
		);
		$panel3->addChild(
			"google_maps_zoom",
			$google_maps_zoom
		);
		
		$google_maps_scroll_wheel = new StockholmQodeField(
			"yesno",
			"google_maps_scroll_wheel",
			"no",
			esc_html__( "Zoom Map on Mouse Wheel", 'stockholm' ),
			esc_html__( "Enabling this option will allow users to zoom in on Map using mouse wheel", 'stockholm' )
		);
		$panel3->addChild(
			"google_maps_scroll_wheel",
			$google_maps_scroll_wheel
		);
		
		$google_maps_style = new StockholmQodeField(
			"yesno",
			"google_maps_style",
			"yes",
			esc_html__( "Custom Map Style", 'stockholm' ),
			esc_html__( "Enabling this option will allow Map editing", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_google_maps_style_container"
			)
		);
		$panel3->addChild(
			"google_maps_style",
			$google_maps_style
		);
		
		$google_maps_style_container = new StockholmQodeContainer(
			"google_maps_style_container",
			"google_maps_style",
			"no"
		);
		$panel3->addChild(
			"google_maps_style_container",
			$google_maps_style_container
		);
		
		$google_maps_color = new StockholmQodeField(
			"color",
			"google_maps_color",
			"",
			esc_html__( "Color Overlay", 'stockholm' ),
			esc_html__( "Choose a Map color overlay", 'stockholm' )
		);
		$google_maps_style_container->addChild(
			"google_maps_color",
			$google_maps_color
		);
		
		$google_maps_saturation = new StockholmQodeField(
			"range",
			"google_maps_saturation",
			"",
			esc_html__( "Saturation", 'stockholm' ),
			esc_html__( "Choose a level of saturation (-100 = least saturated, 100 = most saturated)", 'stockholm' ),
			array(),
			array(
				"range_min"      => "-100",
				"range_max"      => "100",
				"range_step"     => "1",
				"range_decimals" => "0"
			)
		);
		$google_maps_style_container->addChild(
			"google_maps_saturation",
			$google_maps_saturation
		);
		
		$google_maps_lightness = new StockholmQodeField(
			"range",
			"google_maps_lightness",
			"",
			esc_html__( "Lightness", 'stockholm' ),
			esc_html__( "Choose a level of lightness (-100 = darkest, 100 = lightest)", 'stockholm' ),
			array(),
			array(
				"range_min"      => "-100",
				"range_max"      => "100",
				"range_step"     => "1",
				"range_decimals" => "0"
			)
		);
		$google_maps_style_container->addChild(
			"google_maps_lightness",
			$google_maps_lightness
		);
		
		//Upper Section Settings
		
		$panel4 = new StockholmQodePanel(
			esc_html__( "Upper Section Settings", 'stockholm' ),
			"upper_section_settings_panel",
			"section_between_map_form",
			"no"
		);
		$contactPage->addChild(
			"panel4",
			$panel4
		);
		
		$contact_section_text_align = new StockholmQodeField(
			"select",
			"contact_section_text_align",
			"",
			esc_html__( "Section Alignment", 'stockholm' ),
			esc_html__( "Choose an alignment for Upper Section", 'stockholm' ),
			array(
				""             => esc_html__( "Default", 'stockholm' ),
				"left_align"   => esc_html__( "Left", 'stockholm' ),
				"right_align"  => esc_html__( "Right", 'stockholm' ),
				"center_align" => esc_html__( "Center", 'stockholm' )
			)
		);
		$panel4->addChild(
			"contact_section_text_align",
			$contact_section_text_align
		);
		
		$contact_section_above_form_title = new StockholmQodeField(
			"text",
			"contact_section_above_form_title",
			"",
			esc_html__( "Title", 'stockholm' ),
			esc_html__( "Enter a title to be displayed in Upper Section", 'stockholm' )
		);
		$panel4->addChild(
			"contact_section_above_form_title",
			$contact_section_above_form_title
		);
		
		$contact_section_above_form_subtitle = new StockholmQodeField(
			"text",
			"contact_section_above_form_subtitle",
			"",
			esc_html__( "Subtitle", 'stockholm' ),
			esc_html__( "Enter a subtitle to be displayed in Upper Section", 'stockholm' )
		);
		$panel4->addChild(
			"contact_section_above_form_subtitle",
			$contact_section_above_form_subtitle
		);
		
		//Contact Form Settings
		
		$panel2 = new StockholmQodePanel(
			esc_html__( "Contact Form Settings", 'stockholm' ),
			"contact_form_settings_panel",
			"enable_contact_form",
			"no"
		);
		$contactPage->addChild(
			"panel2",
			$panel2
		);
		
		$receive_mail = new StockholmQodeField(
			"text",
			"receive_mail",
			"",
			esc_html__( "Mail Send To", 'stockholm' ),
			esc_html__( "Enter email address for receiving messages submitted through Contact Form", 'stockholm' )
		);
		$panel2->addChild(
			"receive_mail",
			$receive_mail
		);
		
		$email_from = new StockholmQodeField(
			"text",
			"email_from",
			"",
			esc_html__( "Email From", 'stockholm' ),
			esc_html__( 'Enter a default email address to appear in "From" field when receiving emails through Contact Form', 'stockholm' )
		);
		$panel2->addChild(
			"email_from",
			$email_from
		);
		
		$email_subject = new StockholmQodeField(
			"text",
			"email_subject",
			"",
			esc_html__( "Email Subject", 'stockholm' ),
			esc_html__( 'Enter a default message to appear in "Subject" field when receiving emails through Contact Form', 'stockholm' )
		);
		$panel2->addChild(
			"email_subject",
			$email_subject
		);
		
		$hide_contact_form_website = new StockholmQodeField(
			"yesno",
			"hide_contact_form_website",
			"no",
			esc_html__( "Hide Website Field", 'stockholm' ),
			esc_html__( 'Enabling this option will hide the "Website" field on Contact Form', 'stockholm' )
		);
		$panel2->addChild(
			"hide_contact_form_website",
			$hide_contact_form_website
		);
		
		$contact_heading_above = new StockholmQodeField(
			"text",
			"contact_heading_above",
			"",
			esc_html__( "Contact Form Heading", 'stockholm' ),
			esc_html__( "Enter a heading to be displayed above Contact Form", 'stockholm' )
		);
		$panel2->addChild(
			"contact_heading_above",
			$contact_heading_above
		);
		
		$use_recaptcha = new StockholmQodeField(
			"yesno",
			"use_recaptcha",
			"no",
			esc_html__( "Use reCAPTCHA", 'stockholm' ),
			esc_html__( "Enabling this option will place a reCAPTCHA box under Contact Form", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_use_recaptcha_container"
			)
		);
		$panel2->addChild(
			"use_recaptcha",
			$use_recaptcha
		);
		
		$use_recaptcha_container = new StockholmQodeContainer(
			"use_recaptcha_container",
			"use_recaptcha",
			"no"
		);
		$panel2->addChild(
			"use_recaptcha_container",
			$use_recaptcha_container
		);
		
		$recaptcha_public_key = new StockholmQodeField(
			"text",
			"recaptcha_public_key",
			"",
			"reCAPTCHA Public Key",
			esc_html__( "Enter reCAPTCHA public key. For more info, see https://www.google.com/recaptcha", 'stockholm' )
		);
		$use_recaptcha_container->addChild(
			"recaptcha_public_key",
			$recaptcha_public_key
		);
		
		$recaptcha_private_key = new StockholmQodeField(
			"text",
			"recaptcha_private_key",
			"",
			"reCAPTCHA Private Key",
			esc_html__( "Enter reCAPTCHA private key. For more info, see https://www.google.com/recaptcha", 'stockholm' )
		);
		$use_recaptcha_container->addChild(
			"recaptcha_private_key",
			$recaptcha_private_key
		);
		
		$use_custom_style = new StockholmQodeField(
			"yesno",
			"use_custom_style",
			"no",
			esc_html__( "Use Custom Style", 'stockholm' ),
			esc_html__( "Enabling this option will use custom style set for contact form on contact page", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => ""
			)
		);
		$panel2->addChild(
			"use_custom_style",
			$use_custom_style
		);
		
		//Contact Form 7 Settings
		
		$panel5 = new StockholmQodePanel(
			esc_html__( "Custom Style 1 Settings", 'stockholm' ),
			"contact_form_custom_style_1_panel"
		);
		$contactPage->addChild(
			"panel5",
			$panel5
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Background", 'stockholm' ),
			esc_html__( "Define background for form elements (input, textarea, select)", 'stockholm' )
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
		$cf7_custom_style_1_element_background_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_element_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_background_color",
			$cf7_custom_style_1_element_background_color
		);
		$cf7_custom_style_1_element_focus_background_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_element_focus_background_color",
			"",
			esc_html__( "Focus Background Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_focus_background_color",
			$cf7_custom_style_1_element_focus_background_color
		);
		$cf7_custom_style_1_element_background_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_background_transparency",
			"",
			esc_html__( "Background Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_background_transparency",
			$cf7_custom_style_1_element_background_transparency
		);
		$cf7_custom_style_1_element_focus_background_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_focus_background_transparency",
			"",
			esc_html__( "Focus Background Transparency (0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_focus_background_transparency",
			$cf7_custom_style_1_element_focus_background_transparency
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Border", 'stockholm' ),
			esc_html__( "Define border style for form elements (text input fields, textarea, select)", 'stockholm' )
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
		$cf7_custom_style_1_element_border_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_element_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_border_color",
			$cf7_custom_style_1_element_border_color
		);
		$cf7_custom_style_1_element_focus_border_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_element_focus_border_color",
			"",
			esc_html__( "Focus Border Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_focus_border_color",
			$cf7_custom_style_1_element_focus_border_color
		);
		$cf7_custom_style_1_border_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_border_transparency",
			"",
			esc_html__( "Border Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_border_transparency",
			$cf7_custom_style_1_border_transparency
		);
		$cf7_custom_style_1_focus_border_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_focus_border_transparency",
			"",
			esc_html__( "Focus Border Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_focus_border_transparency",
			$cf7_custom_style_1_focus_border_transparency
		);
		
		$row2 = new StockholmQodeRow();
		$group2->addChild(
			"row2",
			$row2
		);
		$cf7_custom_style_1_element_border_width = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_1_element_border_width",
			$cf7_custom_style_1_element_border_width
		);
		$cf7_custom_style_1_element_border_radius = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_border_radius",
			"",
			esc_html__( "Border Radius (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_1_element_border_radius",
			$cf7_custom_style_1_element_border_radius
		);
		$cf7_custom_style_1_element_border_bottom = new StockholmQodeField(
			"yesnosimple",
			"cf7_custom_style_1_element_border_bottom",
			"no",
			esc_html__( "Show Only Border Bottom", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_1_element_border_bottom",
			$cf7_custom_style_1_element_border_bottom
		);
		
		$group3 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Text Style", 'stockholm' ),
			esc_html__( "Define text style for form elements (text input fields, textarea, select)", 'stockholm' )
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
		$cf7_custom_style_1_element_font_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_element_font_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_font_color",
			$cf7_custom_style_1_element_font_color
		);
		$cf7_custom_style_1_element_font_focus_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_element_font_focus_color",
			"",
			esc_html__( "Focus Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_font_focus_color",
			$cf7_custom_style_1_element_font_focus_color
		);
		$cf7_custom_style_1_element_font_size = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_font_size",
			$cf7_custom_style_1_element_font_size
		);
		$cf7_custom_style_1_element_line_height = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_line_height",
			$cf7_custom_style_1_element_line_height
		);
		
		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		$cf7_custom_style_1_element_font_family = new StockholmQodeField(
			"fontsimple",
			"cf7_custom_style_1_element_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_1_element_font_family",
			$cf7_custom_style_1_element_font_family
		);
		$cf7_custom_style_1_element_font_style = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_1_element_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"cf7_custom_style_1_element_font_style",
			$cf7_custom_style_1_element_font_style
		);
		$cf7_custom_style_1_element_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_1_element_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"cf7_custom_style_1_element_font_weight",
			$cf7_custom_style_1_element_font_weight
		);
		$cf7_custom_style_1_element_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_1_element_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"cf7_custom_style_1_element_text_transform",
			$cf7_custom_style_1_element_text_transform
		);
		
		$row3 = new StockholmQodeRow( true );
		$group3->addChild(
			"row3",
			$row3
		);
		$cf7_custom_style_1_element_letter_spacing = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_1_element_letter_spacing",
			$cf7_custom_style_1_element_letter_spacing
		);
		
		$group4 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Labels Style", 'stockholm' ),
			esc_html__( "Define labels style for form elements (text input fields, textarea, select)", 'stockholm' )
		);
		$panel5->addChild(
			"group4",
			$group4
		);
		
		$row1 = new StockholmQodeRow();
		$group4->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_1_label_font_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_label_font_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_label_font_color",
			$cf7_custom_style_1_label_font_color
		);
		$cf7_custom_style_1_label_font_size = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_label_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_label_font_size",
			$cf7_custom_style_1_label_font_size
		);
		$cf7_custom_style_1_label_line_height = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_label_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_label_line_height",
			$cf7_custom_style_1_label_line_height
		);
		$cf7_custom_style_1_label_font_family = new StockholmQodeField(
			"fontsimple",
			"cf7_custom_style_1_label_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_label_font_family",
			$cf7_custom_style_1_label_font_family
		);
		
		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		$cf7_custom_style_1_label_font_style = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_1_label_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"cf7_custom_style_1_label_font_style",
			$cf7_custom_style_1_label_font_style
		);
		$cf7_custom_style_1_label_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_1_label_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"cf7_custom_style_1_label_font_weight",
			$cf7_custom_style_1_label_font_weight
		);
		$cf7_custom_style_1_label_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_1_label_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"cf7_custom_style_1_label_text_transform",
			$cf7_custom_style_1_label_text_transform
		);
		$cf7_custom_style_1_label_letter_spacing = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_label_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_1_label_letter_spacing",
			$cf7_custom_style_1_label_letter_spacing
		);
		
		$group5 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Padding", 'stockholm' ),
			esc_html__( "Define padding for form elements (text input fields, textarea, select)", 'stockholm' )
		);
		$panel5->addChild(
			"group5",
			$group5
		);
		$row1 = new StockholmQodeRow();
		$group5->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_1_element_padding_top = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_padding_top",
			"",
			esc_html__( "Padding Top (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_padding_top",
			$cf7_custom_style_1_element_padding_top
		);
		$cf7_custom_style_1_element_padding_right = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_padding_right",
			"",
			esc_html__( "Padding Right (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_padding_right",
			$cf7_custom_style_1_element_padding_right
		);
		$cf7_custom_style_1_element_padding_bottom = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_padding_bottom",
			"",
			esc_html__( "Padding Bottom (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_padding_bottom",
			$cf7_custom_style_1_element_padding_bottom
		);
		$cf7_custom_style_1_element_padding_left = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_padding_left",
			"",
			esc_html__( "Padding Left (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_padding_left",
			$cf7_custom_style_1_element_padding_left
		);
		
		$group6 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Margin", 'stockholm' ),
			esc_html__( "Define margin for form elements (text input fields, textarea, select)", 'stockholm' )
		);
		$panel5->addChild(
			"group6",
			$group6
		);
		$row1 = new StockholmQodeRow();
		$group6->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_1_element_margin_top = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_margin_top",
			"",
			esc_html__( "Margin Top (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_margin_top",
			$cf7_custom_style_1_element_margin_top
		);
		$cf7_custom_style_1_element_margin_bottom = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_element_margin_bottom",
			"",
			esc_html__( "Margin Bottom (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_element_margin_bottom",
			$cf7_custom_style_1_element_margin_bottom
		);
		
		$cf7_custom_style_1_element_textarea_height = new StockholmQodeField(
			"text",
			"cf7_custom_style_1_element_textarea_height",
			"",
			esc_html__( "Textarea Height (px)", 'stockholm' ),
			esc_html__( "Enter height for textarea form element", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel5->addChild(
			"cf7_custom_style_1_element_textarea_height",
			$cf7_custom_style_1_element_textarea_height
		);
		
		$group7 = new StockholmQodeGroup(
			esc_html__( "Button Background", 'stockholm' ),
			esc_html__( "Define background for button", 'stockholm' )
		);
		$panel5->addChild(
			"group7",
			$group7
		);
		
		$row1 = new StockholmQodeRow();
		$group7->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_1_button_background_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_button_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_background_color",
			$cf7_custom_style_1_button_background_color
		);
		$cf7_custom_style_1_button_hover_background_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_button_hover_background_color",
			"",
			esc_html__( "Hover Background Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_hover_background_color",
			$cf7_custom_style_1_button_hover_background_color
		);
		$cf7_custom_style_1_button_background_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_button_background_transparency",
			"",
			esc_html__( "Background Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_background_transparency",
			$cf7_custom_style_1_button_background_transparency
		);
		$cf7_custom_style_1_button_hover_background_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_button_hover_background_transparency",
			"",
			esc_html__( "Hover Background Transparency (0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_hover_background_transparency",
			$cf7_custom_style_1_button_hover_background_transparency
		);
		
		$group8 = new StockholmQodeGroup(
			esc_html__( "Button Border", 'stockholm' ),
			esc_html__( "Define border style for button", 'stockholm' )
		);
		$panel5->addChild(
			"group8",
			$group8
		);
		
		$row1 = new StockholmQodeRow();
		$group8->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_1_button_border_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_button_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_border_color",
			$cf7_custom_style_1_button_border_color
		);
		$cf7_custom_style_1_button_hover_border_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_button_hover_border_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_hover_border_color",
			$cf7_custom_style_1_button_hover_border_color
		);
		$cf7_custom_style_1_button_border_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_button_border_transparency",
			"",
			esc_html__( "Border Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_border_transparency",
			$cf7_custom_style_1_button_border_transparency
		);
		$cf7_custom_style_1_button_hover_border_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_button_hover_border_transparency",
			"",
			esc_html__( "Hover Border Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_hover_border_transparency",
			$cf7_custom_style_1_button_hover_border_transparency
		);
		
		$row2 = new StockholmQodeRow();
		$group8->addChild(
			"row2",
			$row2
		);
		$cf7_custom_style_1_button_border_width = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_button_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_1_button_border_width",
			$cf7_custom_style_1_button_border_width
		);
		$cf7_custom_style_1_button_border_radius = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_button_border_radius",
			"",
			esc_html__( "Border Radius (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_1_button_border_radius",
			$cf7_custom_style_1_button_border_radius
		);
		
		$group9 = new StockholmQodeGroup(
			esc_html__( "Button Text Style", 'stockholm' ),
			esc_html__( "Define text style for button", 'stockholm' )
		);
		$panel5->addChild(
			"group9",
			$group9
		);
		
		$row1 = new StockholmQodeRow();
		$group9->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_1_button_font_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_button_font_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_font_color",
			$cf7_custom_style_1_button_font_color
		);
		$cf7_custom_style_1_button_font_hover_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_1_button_font_hover_color",
			"",
			esc_html__( "Hover Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_font_hover_color",
			$cf7_custom_style_1_button_font_hover_color
		);
		$cf7_custom_style_1_button_font_size = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_button_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_font_size",
			$cf7_custom_style_1_button_font_size
		);
		$cf7_custom_style_1_button_font_family = new StockholmQodeField(
			"fontsimple",
			"cf7_custom_style_1_button_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_1_button_font_family",
			$cf7_custom_style_1_button_font_family
		);
		
		$row2 = new StockholmQodeRow( true );
		$group9->addChild(
			"row2",
			$row2
		);
		$cf7_custom_style_1_button_font_style = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_1_button_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"cf7_custom_style_1_button_font_style",
			$cf7_custom_style_1_button_font_style
		);
		$cf7_custom_style_1_button_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_1_button_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"cf7_custom_style_1_button_font_weight",
			$cf7_custom_style_1_button_font_weight
		);
		$cf7_custom_style_1_button_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_1_button_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"cf7_custom_style_1_button_text_transform",
			$cf7_custom_style_1_button_text_transform
		);
		$cf7_custom_style_1_button_letter_spacing = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_button_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_1_button_letter_spacing",
			$cf7_custom_style_1_button_letter_spacing
		);
		
		$group10 = new StockholmQodeGroup(
			esc_html__( "Button Dimensions", 'stockholm' ),
			esc_html__( "Define dimensions for button", 'stockholm' )
		);
		$panel5->addChild(
			"group10",
			$group10
		);
		
		$row1 = new StockholmQodeRow();
		$group10->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_1_button_height = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_button_height",
			"",
			esc_html__( "Button Height (px)", 'stockholm' ),
			esc_html__( "Enter button height in px", 'stockholm' )
		);
		$row1->addChild(
			"cf7_custom_style_1_button_height",
			$cf7_custom_style_1_button_height
		);
		$cf7_custom_style_1_button_padding = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_button_padding",
			"",
			esc_html__( "Button Padding (px)", 'stockholm' ),
			esc_html__( "Enter value for button left and right padding in px", 'stockholm' )
		);
		$row1->addChild(
			"cf7_custom_style_1_button_padding",
			$cf7_custom_style_1_button_padding
		);
		$cf7_custom_style_1_button_margin = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_1_button_margin",
			"",
			esc_html__( "Button Top Margin (px)", 'stockholm' ),
			esc_html__( "Enter value for button top margin in px", 'stockholm' )
		);
		$row1->addChild(
			"cf7_custom_style_1_button_margin",
			$cf7_custom_style_1_button_margin
		);
		
		$cf7_custom_style_1_error_validation_messages_color = new StockholmQodeField(
			"color",
			"cf7_custom_style_1_error_validation_messages_color",
			"",
			esc_html__( "Validation Error Text Color", 'stockholm' ),
			esc_html__( "Choose color for error form validation text messages", 'stockholm' )
		);
		$panel5->addChild(
			"cf7_custom_style_1_error_validation_messages_color",
			$cf7_custom_style_1_error_validation_messages_color
		);


		$panel6 = new StockholmQodePanel(
			esc_html__( "Custom Style 2 Settings", 'stockholm' ),
			"contact_form_custom_style_2_panel"
		);
		$contactPage->addChild(
			"panel6",
			$panel6
		);

		$group1 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Background", 'stockholm' ),
			esc_html__( "Define background for form elements (input, textarea, select)", 'stockholm' )
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
		$cf7_custom_style_2_element_background_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_element_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_background_color",
			$cf7_custom_style_2_element_background_color
		);
		$cf7_custom_style_2_element_focus_background_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_element_focus_background_color",
			"",
			esc_html__( "Focus Background Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_focus_background_color",
			$cf7_custom_style_2_element_focus_background_color
		);
		$cf7_custom_style_2_element_background_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_background_transparency",
			"",
			esc_html__( "Background Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_background_transparency",
			$cf7_custom_style_2_element_background_transparency
		);
		$cf7_custom_style_2_element_focus_background_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_focus_background_transparency",
			"",
			esc_html__( "Focus Background Transparency (0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_focus_background_transparency",
			$cf7_custom_style_2_element_focus_background_transparency
		);

		$group2 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Border", 'stockholm' ),
			esc_html__( "Define border style for form elements (text input fields, textarea, select)", 'stockholm' )
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
		$cf7_custom_style_2_element_border_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_element_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_border_color",
			$cf7_custom_style_2_element_border_color
		);
		$cf7_custom_style_2_element_focus_border_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_element_focus_border_color",
			"",
			esc_html__( "Focus Border Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_focus_border_color",
			$cf7_custom_style_2_element_focus_border_color
		);
		$cf7_custom_style_2_border_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_border_transparency",
			"",
			esc_html__( "Border Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_border_transparency",
			$cf7_custom_style_2_border_transparency
		);
		$cf7_custom_style_2_focus_border_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_focus_border_transparency",
			"",
			esc_html__( "Focus Border Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_focus_border_transparency",
			$cf7_custom_style_2_focus_border_transparency
		);

		$row2 = new StockholmQodeRow();
		$group2->addChild(
			"row2",
			$row2
		);
		$cf7_custom_style_2_element_border_width = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_2_element_border_width",
			$cf7_custom_style_2_element_border_width
		);
		$cf7_custom_style_2_element_border_radius = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_border_radius",
			"",
			esc_html__( "Border Radius (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_2_element_border_radius",
			$cf7_custom_style_2_element_border_radius
		);
		$cf7_custom_style_2_element_border_bottom = new StockholmQodeField(
			"yesnosimple",
			"cf7_custom_style_2_element_border_bottom",
			"no",
			esc_html__( "Show Only Border Bottom", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_2_element_border_bottom",
			$cf7_custom_style_2_element_border_bottom
		);

		$group3 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Text Style", 'stockholm' ),
			esc_html__( "Define text style for form elements (text input fields, textarea, select)", 'stockholm' )
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
		$cf7_custom_style_2_element_font_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_element_font_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_font_color",
			$cf7_custom_style_2_element_font_color
		);
		$cf7_custom_style_2_element_font_focus_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_element_font_focus_color",
			"",
			esc_html__( "Focus Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_font_focus_color",
			$cf7_custom_style_2_element_font_focus_color
		);
		$cf7_custom_style_2_element_font_size = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_font_size",
			$cf7_custom_style_2_element_font_size
		);
		$cf7_custom_style_2_element_line_height = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_line_height",
			$cf7_custom_style_2_element_line_height
		);

		$row2 = new StockholmQodeRow( true );
		$group3->addChild(
			"row2",
			$row2
		);
		$cf7_custom_style_2_element_font_family = new StockholmQodeField(
			"fontsimple",
			"cf7_custom_style_2_element_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_2_element_font_family",
			$cf7_custom_style_2_element_font_family
		);
		$cf7_custom_style_2_element_font_style = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_2_element_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"cf7_custom_style_2_element_font_style",
			$cf7_custom_style_2_element_font_style
		);
		$cf7_custom_style_2_element_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_2_element_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"cf7_custom_style_2_element_font_weight",
			$cf7_custom_style_2_element_font_weight
		);
		$cf7_custom_style_2_element_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_2_element_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"cf7_custom_style_2_element_text_transform",
			$cf7_custom_style_2_element_text_transform
		);

		$row3 = new StockholmQodeRow( true );
		$group3->addChild(
			"row3",
			$row3
		);
		$cf7_custom_style_2_element_letter_spacing = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_2_element_letter_spacing",
			$cf7_custom_style_2_element_letter_spacing
		);

		$group4 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Labels Style", 'stockholm' ),
			esc_html__( "Define labels style for form elements (text input fields, textarea, select)", 'stockholm' )
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
		$cf7_custom_style_2_label_font_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_label_font_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_label_font_color",
			$cf7_custom_style_2_label_font_color
		);
		$cf7_custom_style_2_label_font_size = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_label_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_label_font_size",
			$cf7_custom_style_2_label_font_size
		);
		$cf7_custom_style_2_label_line_height = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_label_line_height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_label_line_height",
			$cf7_custom_style_2_label_line_height
		);
		$cf7_custom_style_2_label_font_family = new StockholmQodeField(
			"fontsimple",
			"cf7_custom_style_2_label_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_label_font_family",
			$cf7_custom_style_2_label_font_family
		);

		$row2 = new StockholmQodeRow( true );
		$group4->addChild(
			"row2",
			$row2
		);
		$cf7_custom_style_2_label_font_style = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_2_label_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"cf7_custom_style_2_label_font_style",
			$cf7_custom_style_2_label_font_style
		);
		$cf7_custom_style_2_label_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_2_label_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"cf7_custom_style_2_label_font_weight",
			$cf7_custom_style_2_label_font_weight
		);
		$cf7_custom_style_2_label_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_2_label_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"cf7_custom_style_2_label_text_transform",
			$cf7_custom_style_2_label_text_transform
		);
		$cf7_custom_style_2_label_letter_spacing = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_label_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_2_label_letter_spacing",
			$cf7_custom_style_2_label_letter_spacing
		);

		$group5 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Padding", 'stockholm' ),
			esc_html__( "Define padding for form elements (text input fields, textarea, select)", 'stockholm' )
		);
		$panel6->addChild(
			"group5",
			$group5
		);
		$row1 = new StockholmQodeRow();
		$group5->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_2_element_padding_top = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_padding_top",
			"",
			esc_html__( "Padding Top (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_padding_top",
			$cf7_custom_style_2_element_padding_top
		);
		$cf7_custom_style_2_element_padding_right = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_padding_right",
			"",
			esc_html__( "Padding Right (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_padding_right",
			$cf7_custom_style_2_element_padding_right
		);
		$cf7_custom_style_2_element_padding_bottom = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_padding_bottom",
			"",
			esc_html__( "Padding Bottom (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_padding_bottom",
			$cf7_custom_style_2_element_padding_bottom
		);
		$cf7_custom_style_2_element_padding_left = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_padding_left",
			"",
			esc_html__( "Padding Left (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_padding_left",
			$cf7_custom_style_2_element_padding_left
		);

		$group6 = new StockholmQodeGroup(
			esc_html__( "Form Elements' Margin", 'stockholm' ),
			esc_html__( "Define margin for form elements (text input fields, textarea, select)", 'stockholm' )
		);
		$panel6->addChild(
			"group6",
			$group6
		);
		$row1 = new StockholmQodeRow();
		$group6->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_2_element_margin_top = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_margin_top",
			"",
			esc_html__( "Margin Top (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_margin_top",
			$cf7_custom_style_2_element_margin_top
		);
		$cf7_custom_style_2_element_margin_bottom = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_element_margin_bottom",
			"",
			esc_html__( "Margin Bottom (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_element_margin_bottom",
			$cf7_custom_style_2_element_margin_bottom
		);

		$cf7_custom_style_2_element_textarea_height = new StockholmQodeField(
			"text",
			"cf7_custom_style_2_element_textarea_height",
			"",
			esc_html__( "Textarea Height (px)", 'stockholm' ),
			esc_html__( "Enter height for textarea form element", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel6->addChild(
			"cf7_custom_style_2_element_textarea_height",
			$cf7_custom_style_2_element_textarea_height
		);

		$group7 = new StockholmQodeGroup(
			esc_html__( "Button Background", 'stockholm' ),
			esc_html__( "Define background for button", 'stockholm' )
		);
		$panel6->addChild(
			"group7",
			$group7
		);

		$row1 = new StockholmQodeRow();
		$group7->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_2_button_background_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_button_background_color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_background_color",
			$cf7_custom_style_2_button_background_color
		);
		$cf7_custom_style_2_button_hover_background_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_button_hover_background_color",
			"",
			esc_html__( "Hover Background Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_hover_background_color",
			$cf7_custom_style_2_button_hover_background_color
		);
		$cf7_custom_style_2_button_background_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_button_background_transparency",
			"",
			esc_html__( "Background Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_background_transparency",
			$cf7_custom_style_2_button_background_transparency
		);
		$cf7_custom_style_2_button_hover_background_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_button_hover_background_transparency",
			"",
			esc_html__( "Hover Background Transparency (0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_hover_background_transparency",
			$cf7_custom_style_2_button_hover_background_transparency
		);

		$group8 = new StockholmQodeGroup(
			esc_html__( "Button Border", 'stockholm' ),
			esc_html__( "Define border style for button", 'stockholm' )
		);
		$panel6->addChild(
			"group8",
			$group8
		);

		$row1 = new StockholmQodeRow();
		$group8->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_2_button_border_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_button_border_color",
			"",
			esc_html__( "Border Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_border_color",
			$cf7_custom_style_2_button_border_color
		);
		$cf7_custom_style_2_button_hover_border_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_button_hover_border_color",
			"",
			esc_html__( "Border Hover Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_hover_border_color",
			$cf7_custom_style_2_button_hover_border_color
		);
		$cf7_custom_style_2_button_border_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_button_border_transparency",
			"",
			esc_html__( "Border Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_border_transparency",
			$cf7_custom_style_2_button_border_transparency
		);
		$cf7_custom_style_2_button_hover_border_transparency = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_button_hover_border_transparency",
			"",
			esc_html__( "Hover Border Transparency (values: 0-1)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_hover_border_transparency",
			$cf7_custom_style_2_button_hover_border_transparency
		);

		$row2 = new StockholmQodeRow();
		$group8->addChild(
			"row2",
			$row2
		);
		$cf7_custom_style_2_button_border_width = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_button_border_width",
			"",
			esc_html__( "Border Width (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_2_button_border_width",
			$cf7_custom_style_2_button_border_width
		);
		$cf7_custom_style_2_button_border_radius = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_button_border_radius",
			"",
			esc_html__( "Border Radius (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_2_button_border_radius",
			$cf7_custom_style_2_button_border_radius
		);

		$group9 = new StockholmQodeGroup(
			esc_html__( "Button Text Style", 'stockholm' ),
			esc_html__( "Define text style for button", 'stockholm' )
		);
		$panel6->addChild(
			"group9",
			$group9
		);

		$row1 = new StockholmQodeRow();
		$group9->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_2_button_font_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_button_font_color",
			"",
			esc_html__( "Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_font_color",
			$cf7_custom_style_2_button_font_color
		);
		$cf7_custom_style_2_button_font_hover_color = new StockholmQodeField(
			"colorsimple",
			"cf7_custom_style_2_button_font_hover_color",
			"",
			esc_html__( "Hover Text Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_font_hover_color",
			$cf7_custom_style_2_button_font_hover_color
		);
		$cf7_custom_style_2_button_font_size = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_button_font_size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_font_size",
			$cf7_custom_style_2_button_font_size
		);
		$cf7_custom_style_2_button_font_family = new StockholmQodeField(
			"fontsimple",
			"cf7_custom_style_2_button_font_family",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row1->addChild(
			"cf7_custom_style_2_button_font_family",
			$cf7_custom_style_2_button_font_family
		);

		$row2 = new StockholmQodeRow( true );
		$group9->addChild(
			"row2",
			$row2
		);
		$cf7_custom_style_2_button_font_style = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_2_button_font_style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"cf7_custom_style_2_button_font_style",
			$cf7_custom_style_2_button_font_style
		);
		$cf7_custom_style_2_button_font_weight = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_2_button_font_weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"cf7_custom_style_2_button_font_weight",
			$cf7_custom_style_2_button_font_weight
		);
		$cf7_custom_style_2_button_text_transform = new StockholmQodeField(
			"selectblanksimple",
			"cf7_custom_style_2_button_text_transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"cf7_custom_style_2_button_text_transform",
			$cf7_custom_style_2_button_text_transform
		);
		$cf7_custom_style_2_button_letter_spacing = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_button_letter_spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"cf7_custom_style_2_button_letter_spacing",
			$cf7_custom_style_2_button_letter_spacing
		);

		$group10 = new StockholmQodeGroup(
			esc_html__( "Button Dimensions", 'stockholm' ),
			esc_html__( "Define dimensions for button", 'stockholm' )
		);
		$panel6->addChild(
			"group10",
			$group10
		);

		$row1 = new StockholmQodeRow();
		$group10->addChild(
			"row1",
			$row1
		);
		$cf7_custom_style_2_button_height = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_button_height",
			"",
			esc_html__( "Button Height (px)", 'stockholm' ),
			esc_html__( "Enter button height in px", 'stockholm' )
		);
		$row1->addChild(
			"cf7_custom_style_2_button_height",
			$cf7_custom_style_2_button_height
		);
		$cf7_custom_style_2_button_padding = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_button_padding",
			"",
			esc_html__( "Button Padding (px)", 'stockholm' ),
			esc_html__( "Enter value for button left and right padding in px", 'stockholm' )
		);
		$row1->addChild(
			"cf7_custom_style_2_button_padding",
			$cf7_custom_style_2_button_padding
		);
		$cf7_custom_style_2_button_margin = new StockholmQodeField(
			"textsimple",
			"cf7_custom_style_2_button_margin",
			"",
			esc_html__( "Button Top Margin (px)", 'stockholm' ),
			esc_html__( "Enter value for button top margin in px", 'stockholm' )
		);
		$row1->addChild(
			"cf7_custom_style_2_button_margin",
			$cf7_custom_style_2_button_margin
		);

		$cf7_custom_style_2_error_validation_messages_color = new StockholmQodeField(
			"color",
			"cf7_custom_style_2_error_validation_messages_color",
			"",
			esc_html__( "Validation Error Text Color", 'stockholm' ),
			esc_html__( "Choose color for error form validation text messages", 'stockholm' )
		);
		$panel6->addChild(
			"cf7_custom_style_2_error_validation_messages_color",
			$cf7_custom_style_2_error_validation_messages_color
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_contact_options_map', 150 );
}