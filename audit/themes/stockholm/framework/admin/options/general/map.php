<?php

if ( ! function_exists( 'stockholm_qode_general_options_map' ) ) {
	function stockholm_qode_general_options_map() {
		
		$generalPage = new StockholmQodeAdminPage(
			"",
			esc_html__( "General", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"general",
			$generalPage
		);
		
		// Design Style
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Design Style", 'stockholm' ),
			"design_style"
		);
		$generalPage->addChild(
			"panel1",
			$panel1
		);
		
		$disable_google_fonts = new StockholmQodeField(
			"yesno",
			"disable_google_fonts",
			"no",
			esc_html__( "Disable Google Fonts", 'stockholm' ),
            '',
            array(),
            array(
                "dependence"             => true,
                "dependence_hide_on_yes" => "#qodef_google_fonts_container",
                "dependence_show_on_yes" => ""
            )
		);
		$panel1->addChild(
			"disable_google_fonts",
            $disable_google_fonts
		);

        $google_fonts_container = new StockholmQodeContainer(
            "google_fonts_container",
            "disable_google_fonts",
            "yes"
        );

        $panel1->addChild(
            "google_fonts_container",
            $google_fonts_container
        );

		$google_fonts = new StockholmQodeField(
			"font",
			"google_fonts",
			"-1",
			esc_html__( "Font Family", 'stockholm' ),
			esc_html__( "Choose a default Google font for your site", 'stockholm' )
		);
        $google_fonts_container->addChild(
			"google_fonts",
			$google_fonts
		);
		
		$first_color = new StockholmQodeField(
			"color",
			"first_color",
			"",
			esc_html__( "First Main Color", 'stockholm' ),
			esc_html__( "Choose the most dominant theme color. Default color is #e6ae48.", 'stockholm' )
		);
		$panel1->addChild(
			"first_color",
			$first_color
		);
		
		$background_color = new StockholmQodeField(
			"color",
			"background_color",
			"",
			esc_html__( "Content Background Color", 'stockholm' ),
			esc_html__( "Choose the background color for page content area. Default color is #f5f5f5.", 'stockholm' )
		);
		$panel1->addChild(
			"background_color",
			$background_color
		);

		$background_image = new StockholmQodeField(
			"image",
			"content_background_image",
			"",
			esc_html__( "Content Background Image", 'stockholm' ),
			esc_html__( "Choose the background image for page content area. Please note that this option will override 'Content Background Color' option above", 'stockholm' )
		);
		$panel1->addChild(
			"background_image",
            $background_image
		);
		
		$selection_color = new StockholmQodeField(
			"color",
			"selection_color",
			"",
			esc_html__( "Text Selection Color", 'stockholm' ),
			esc_html__( "Choose the color users see when selecting text", 'stockholm' )
		);
		$panel1->addChild(
			"selection_color",
			$selection_color
		);
		
		$content_top_padding = new StockholmQodeField(
			"text",
			"content_top_padding",
			"0",
			esc_html__( "Content Top Padding (px)", 'stockholm' ),
			esc_html__( "Enter top padding for content area. If you set this value then it's important to set also Content top padding for mobile header value.", 'stockholm' )
		);
		$panel1->addChild(
			"content_top_padding",
			$content_top_padding
		);
		
		$content_top_padding_default_template = new StockholmQodeField(
			"text",
			"content_top_padding_default_template",
			"44",
			esc_html__( "Content Top Padding for Templates in Grid (px)", 'stockholm' ),
			esc_html__( "Enter top padding for content area for Templates in grid. If you set this value then it's important to set also Content top padding for mobile header value.", 'stockholm' )
		);
		$panel1->addChild(
			"content_top_padding_default_template",
			$content_top_padding_default_template
		);
		
		$content_top_padding_mobile = new StockholmQodeField(
			"text",
			"content_top_padding_mobile",
			"44",
			esc_html__( "Content Top Padding for Mobile Header (px)", 'stockholm' ),
			esc_html__( "Enter top padding for content area for Mobile Header.", 'stockholm' )
		);
		$panel1->addChild(
			"content_top_padding_mobile",
			$content_top_padding_mobile
		);
		
		$boxed = new StockholmQodeField(
			"yesno",
			"boxed",
			"no",
			esc_html__( "Boxed layout", 'stockholm' ),
			esc_html__( "Enabling this option will display site content in grid", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_boxed_container"
			)
		);
		$panel1->addChild(
			"boxed",
			$boxed
		);
		
		$boxed_container = new StockholmQodeContainer(
			"boxed_container",
			"boxed",
			"no"
		);
		$panel1->addChild(
			"boxed_container",
			$boxed_container
		);
		
		$background_color_box = new StockholmQodeField(
			"color",
			"background_color_box",
			"",
			esc_html__( "Page Background Color", 'stockholm' ),
			esc_html__( "Choose the page background (body) color. Default color is #f5f5f5.", 'stockholm' )
		);
		$boxed_container->addChild(
			"background_color_box",
			$background_color_box
		);
		
		$background_image = new StockholmQodeField(
			"image",
			"background_image",
			"",
			esc_html__( "Background Image", 'stockholm' ),
			esc_html__( "Choose an image to be displayed in background", 'stockholm' )
		);
		$boxed_container->addChild(
			"background_image",
			$background_image
		);
		
		$pattern_background_image = new StockholmQodeField(
			"image",
			"pattern_background_image",
			"",
			esc_html__( "Background Pattern", 'stockholm' ),
			esc_html__( "Choose an image to be used as background pattern", 'stockholm' )
		);
		$boxed_container->addChild(
			"pattern_background_image",
			$pattern_background_image
		);
		
		$enable_content_top_margin = new StockholmQodeField(
			"yesno",
			"enable_content_top_margin",
			"no",
			esc_html__( "Put Content Below Header", 'stockholm' ),
			esc_html__( "Enabling this option  will put all of the content below header", 'stockholm' )
		);
		$panel1->addChild(
			"enable_content_top_margin",
			$enable_content_top_margin
		);
		
		$paspartu = new StockholmQodeField(
			"yesno",
			"paspartu",
			"no",
			esc_html__( "Enable Passepartout", 'stockholm' ),
			esc_html__( "Enabling this option will show passepartout", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_paspartu_container"
			)
		);
		$panel1->addChild(
			"paspartu",
			$paspartu
		);
		
		$paspartu_container = new StockholmQodeContainer(
			"paspartu_container",
			"paspartu",
			"no"
		);
		$panel1->addChild(
			"paspartu_container",
			$paspartu_container
		);
		
		$paspartu_color = new StockholmQodeField(
			"color",
			"paspartu_color",
			"",
			esc_html__( "Passepartout Color", 'stockholm' ),
			esc_html__( "Choose color for passepartout", 'stockholm' )
		);
		$paspartu_container->addChild(
			"paspartu_color",
			$paspartu_color
		);
		
		$paspartu_width = new StockholmQodeField(
			"text",
			"paspartu_width",
			"",
			esc_html__( "Passepartout Size (%)", 'stockholm' ),
			esc_html__( "Enter size amount for passepartout, default value is 2% (the percent is in relation to site width)", 'stockholm' )
		);
		$paspartu_container->addChild(
			"paspartu_width",
			$paspartu_width
		);

		$initial_content_width = new StockholmQodeField(
			"select",
			"initial_content_width",
			"grid_1100",
			esc_html__("Initial Width of Content", "stockholm"),
			esc_html__('Choose the initial width of content which is in grid', "stockholm"),
			array(
				"grid_1100" => esc_html__("1100px (default)", "stockholm"),
				"grid_1200" => esc_html__("1200px", "stockholm"),
				"grid_1300" => esc_html__("1300px", "stockholm"),
				"grid_1400" => esc_html__("1400px", "stockholm"),
				"grid_1500" => esc_html__("1500px", "stockholm")
			)
		);

		$panel1->addChild(
			"initial_content_width",
			$initial_content_width
		);
		
		// Settings
		
		$panel4 = new StockholmQodePanel(
			esc_html__( "Settings", 'stockholm' ),
			"settings"
		);
		$generalPage->addChild(
			"panel4",
			$panel4
		);
		
		$page_transitions = new StockholmQodeField(
			"select",
			"page_transitions",
			"0",
			esc_html__( "Page Transition", 'stockholm' ),
			esc_html__( 'Choose a a type of transition between loading pages. In order for animation to work properly, you must choose "Post name" in permalinks settings', 'stockholm' ),
			array(
				0 => "No animation",
				1 => "Up/Down",
				2 => "Fade",
				3 => "Up/Down (In) / Fade (Out)",
				4 => "Left/Right"
			),
			array(),
			"enable_grid_elements",
			array( "yes" )
		);
		$panel4->addChild(
			"page_transitions",
			$page_transitions
		);
		
		$page_transitions_notice = new StockholmQodeNotice(
			esc_html__( "Page Transition", 'stockholm' ),
			esc_html__( 'Choose a a type of transition between loading pages. In order for animation to work properly, you must choose "Post name" in permalinks settings', 'stockholm' ),
			esc_html__( "Page transition is disabled because VC Grid is Enabled", 'stockholm' ),
			"enable_grid_elements",
			"no"
		);
		$panel4->addChild(
			"page_transitions_notice",
			$page_transitions_notice
		);
		
		$loading_animation = new StockholmQodeField(
			"onoff",
			"loading_animation",
			"off",
			esc_html__( "Loading Animation", 'stockholm' ),
			esc_html__( "Enabling this option will display animation while page loads", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_loading_animation_container"
			)
		);
		$panel4->addChild(
			"loading_animation",
			$loading_animation
		);
		
		$loading_animation_container = new StockholmQodeContainer(
			"loading_animation_container",
			"loading_animation",
			"off"
		);
		$panel4->addChild(
			"loading_animation_container",
			$loading_animation_container
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Loading Animation Graphic", 'stockholm' ),
			esc_html__( "Choose type and color of preload graphic animation", 'stockholm' )
		);
		$loading_animation_container->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$loading_animation_spinner = new StockholmQodeField(
			"selectsimple",
			"loading_animation_spinner",
			"pulse",
			esc_html__( "Spinner", 'stockholm' ),
			"",
			array(
				"pulse"                 => esc_html__( "Pulse", 'stockholm' ),
				"double_pulse"          => esc_html__( "Double Pulse", 'stockholm' ),
				"cube"                  => esc_html__( "Cube", 'stockholm' ),
				"rotating_cubes"        => esc_html__( "Rotating Cubes", 'stockholm' ),
				"stripes"               => esc_html__( "Stripes", 'stockholm' ),
				"wave"                  => esc_html__( "Wave", 'stockholm' ),
				"two_rotating_circles"  => esc_html__( "2 Rotating Circles", 'stockholm' ),
				"five_rotating_circles" => esc_html__( "5 Rotating Circles", 'stockholm' ),
				"pulsating_circle"      => esc_html__( "Pulsating Circle", 'stockholm' ),
				"ripples"               => esc_html__( "Ripples", 'stockholm' ),
				"spinner"               => esc_html__( "Spinner", 'stockholm' ),
				"cubes"                 => esc_html__( "Cubes", 'stockholm' ),
				"indeterminate"         => esc_html__( "Indeterminate", 'stockholm' )
			)
		);
		$row1->addChild(
			"loading_animation_spinner",
			$loading_animation_spinner
		);
		
		$spinner_color = new StockholmQodeField(
			"colorsimple",
			"spinner_color",
			"",
			esc_html__( "Spinner Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"spinner_color",
			$spinner_color
		);
		
		$loading_image = new StockholmQodeField(
			"image",
			"loading_image",
			"",
			esc_html__( "Loading Image", 'stockholm' ),
			esc_html__( 'Upload custom image to be displayed while page loads (Note: Page Transition must not be set to "No Animation")', 'stockholm' )
		);
		$loading_animation_container->addChild(
			"loading_image",
			$loading_image
		);
		
		$smooth_scroll = new StockholmQodeField(
			"yesno",
			"smooth_scroll",
			"yes",
			esc_html__( "Smooth Scroll", 'stockholm' ),
			esc_html__( "Enabling this option will perform a smooth scrolling effect on every page (for Chrome and Opera browsers)", 'stockholm' )
		);
		$panel4->addChild(
			"smooth_scroll",
			$smooth_scroll
		);
		
		$elements_animation_on_touch = new StockholmQodeField(
			"yesno",
			"elements_animation_on_touch",
			"no",
			esc_html__( "Elements Animation on Mobile/Touch Devices", 'stockholm' ),
			esc_html__( "Enabling this option will allow elements (shortcodes) to animate on mobile / touch devices", 'stockholm' )
		);
		$panel4->addChild(
			"elements_animation_on_touch",
			$elements_animation_on_touch
		);
		
		$show_back_button = new StockholmQodeField(
			"yesno",
			"show_back_button",
			"yes",
			esc_html__( "Show 'Back To Top Button'", 'stockholm' ),
			esc_html__( "Enabling this option will display a Back to Top button on every page", 'stockholm' )
		);
		$panel4->addChild(
			"show_back_button",
			$show_back_button
		);
		
		$responsiveness = new StockholmQodeField(
			"yesno",
			"responsiveness",
			"yes",
			esc_html__( "Responsiveness", 'stockholm' ),
			esc_html__( "Enabling this option will make all pages responsive", 'stockholm' ),
            array(),
            array(
                "dependence"             => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_sidebar_responsiveness_container"
            )
		);
		$panel4->addChild(
			"responsiveness",
			$responsiveness
		);

        $sidebar_responsiveness_container = new StockholmQodeContainer(
            "sidebar_responsiveness_container",
            "responsiveness",
            "no",
            array('no')
        );
        $panel4->addChild("sidebar_responsiveness_container", $sidebar_responsiveness_container);

        $sidebar_adv_responsiveness = new StockholmQodeField(
            "yesno",
            "sidebar_adv_responsiveness",
            "no",
            esc_html__( "Advanced Sidebar Responsiveness", 'stockholm' ),
            esc_html__( "Enable this option if you want advanced sidebar responsiveness. Default value is 'No'", 'stockholm' ),
            array(),
            array(
                "dependence"             => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_sidebar_adv_responsiveness_container"
            )
        );
        $sidebar_responsiveness_container->addChild(
            "sidebar_adv_responsiveness",
            $sidebar_adv_responsiveness
        );

        $sidebar_adv_responsiveness_container = new StockholmQodeContainer(
            "sidebar_adv_responsiveness_container",
            "sidebar_adv_responsiveness",
            "no",
            array('no')
        );
        $sidebar_responsiveness_container->addChild("sidebar_adv_responsiveness_container", $sidebar_adv_responsiveness_container);

        $sidebar_adv_responsiveness_responsive_breakpoint = new StockholmQodeField(
            "select",
            "sidebar_adv_responsiveness_responsive_breakpoint",
            "",
            esc_html__( "Responsive Breakpoint", 'stockholm' ),
            '',
            array(
                '1024' => esc_html__('Tablet Landscape ( 1024px )', 'stockholm'),
                '768' => esc_html__('Tablet Portrait ( 768px )', 'stockholm'),
            )
        );
        $sidebar_adv_responsiveness_container->addChild(
            "sidebar_adv_responsiveness_responsive_breakpoint",
            $sidebar_adv_responsiveness_responsive_breakpoint
        );
		
		$favicon_image = new StockholmQodeField(
			"image",
			"favicon_image",
			QODE_ROOT . "/img/favicon.ico",
			esc_html__( "Favicon Image", 'stockholm' ),
			esc_html__( "Choose a favicon image to be displayed", 'stockholm' )
		);
		$panel4->addChild(
			"favicon_image",
			$favicon_image
		);
		
		$internal_no_ajax_links = new StockholmQodeField(
			"textarea",
			"internal_no_ajax_links",
			"",
			esc_html__( "List of Internal URLs Loaded Without AJAX (Separated With Comma)", 'stockholm' ),
			esc_html__( "To disable AJAX transitions on certain pages, enter their full URLs here (for example: http://www.mydomain.com/forum/)", 'stockholm' )
		);
		$panel4->addChild(
			"internal_no_ajax_links",
			$internal_no_ajax_links
		);
		
		// Custom Code
		
		$panel3 = new StockholmQodePanel(
			esc_html__( "Custom Code", 'stockholm' ),
			"custom_code"
		);
		$generalPage->addChild(
			"panel3",
			$panel3
		);
		
		$custom_css = new StockholmQodeField(
			"textarea",
			"custom_css",
			"",
			esc_html__( "Custom CSS", 'stockholm' ),
			esc_html__( "Enter your custom CSS here", 'stockholm' )
		);
		$panel3->addChild(
			"custom_css",
			$custom_css
		);
		
		$custom_js = new StockholmQodeField(
			"textarea",
			"custom_js",
			"",
			esc_html__( "Custom JS", 'stockholm' ),
			esc_html__( 'Enter your custom Javascript here (jQuery selector is "$j" because of the conflict mode)', 'stockholm' )
		);
		$panel3->addChild(
			"custom_js",
			$custom_js
		);
		
		// SEO
		
		$panel2 = new StockholmQodePanel(
			esc_html__( "SEO", 'stockholm' ),
			"seo"
		);
		$generalPage->addChild(
			"panel2",
			$panel2
		);
		
		$google_analytics_code = new StockholmQodeField(
			"text",
			"google_analytics_code",
			"",
			esc_html__( "Google Analytics Account ID", 'stockholm' ),
			esc_html__( "With this field you can monitor traffic on your website. Example UA-000000-01", 'stockholm' )
		);
		$panel2->addChild(
			"google_analytics_code",
			$google_analytics_code
		);
		
		$disable_qode_seo = new StockholmQodeField(
			"yesno",
			"disable_qode_seo",
			"no",
			esc_html__( "Disable Select SEO", 'stockholm' ),
			esc_html__( "Enabling this option will turn off Select SEO", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_disable_qode_seo_container",
				"dependence_show_on_yes" => ""
			)
		);
		$panel2->addChild(
			"disable_qode_seo",
			$disable_qode_seo
		);
		
		$disable_qode_seo_container = new StockholmQodeContainer(
			"disable_qode_seo_container",
			"disable_qode_seo",
			"yes"
		);
		$panel2->addChild(
			"disable_qode_seo_container",
			$disable_qode_seo_container
		);
		
		$meta_keywords = new StockholmQodeField(
			"textarea",
			"meta_keywords",
			"",
			esc_html__( "Meta Keywords", 'stockholm' ),
			esc_html__( "Add relevant keywords separated with commas to improve SEO", 'stockholm' )
		);
		$disable_qode_seo_container->addChild(
			"meta_keywords",
			$meta_keywords
		);
		
		$meta_description = new StockholmQodeField(
			"textarea",
			"meta_description",
			"",
			esc_html__( "Meta Description", 'stockholm' ),
			esc_html__( "Enter a short description of the website for SEO", 'stockholm' )
		);
		$disable_qode_seo_container->addChild(
			"meta_description",
			$meta_description
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_general_options_map', 10 );
}
