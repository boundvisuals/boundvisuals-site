<?php

include_once get_template_directory() . '/theme-includes.php';

if ( ! function_exists( 'stockholm_qode_rewrite_rules_on_theme_activation' ) ) {
	function stockholm_qode_rewrite_rules_on_theme_activation() {
		flush_rewrite_rules();
	}
	
	add_action( 'after_switch_theme', 'stockholm_qode_rewrite_rules_on_theme_activation' );
}

if ( ! function_exists( 'stockholm_qode_add_theme_support' ) ) {
	function stockholm_qode_add_theme_support() {
		
		//add support for feed links
		add_theme_support( 'automatic-feed-links' );
		
		//add support for post formats
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'video', 'audio' ) );
		
		//add theme support for post thumbnails
		add_theme_support( 'post-thumbnails' );
		
		//add theme support for title tag
		add_theme_support( 'title-tag' );
		
		//defined content width variable
		$GLOBALS['content_width'] = 1060;
		
		load_theme_textdomain( 'stockholm', get_template_directory() . '/languages' );
		
		//add theme support for editor style
		add_editor_style( 'css/admin/editor-style.css' );
		
		add_image_size( 'portfolio-square', 550, 550, false );
		add_image_size( 'portfolio-landscape', 800, 600, false );
		add_image_size( 'portfolio-portrait', 600, 800, false );
		add_image_size( 'portfolio-default', 550, 498, false ); // and for blog masonry and latest post boxes type
		add_image_size( 'menu-featured-post', 345, 198, false );
		add_image_size( 'qode-carousel_slider', 400, 260, false );
		add_image_size( 'portfolio_slider', 480, 434, false );
		add_image_size( 'portfolio_masonry_regular', 500, 500, false );
		add_image_size( 'portfolio_masonry_wide', 1000, 500, false );
		add_image_size( 'portfolio_masonry_tall', 500, 1000, false );
		add_image_size( 'portfolio_masonry_large', 1000, 1000, false );
		add_image_size( 'portfolio_masonry_with_space', 700);
		add_image_size( 'latest_post_small_image', 125, 112, false );
		add_image_size( 'blog_image_in_grid', 1100);
		
		if ( stockholm_qode_get_header_bottom_appearance() != "stick_with_left_right_menu" || stockholm_qode_is_vertical_header_enabled() ) {
			//header and left menu location
			register_nav_menus(
				array(
					'top-navigation' => esc_html__( 'Top Navigation', 'stockholm' )
				)
			);
		}
		
		//popup menu location
		register_nav_menus(
			array(
				'popup-navigation' => esc_html__( 'Fullscreen Navigation', 'stockholm' )
			)
		);
		
		if ( stockholm_qode_get_header_bottom_appearance() == "stick_with_left_right_menu" && ! stockholm_qode_is_vertical_header_enabled() ) {
			//header left menu location
			register_nav_menus(
				array(
					'left-top-navigation' => esc_html__( 'Left Top Navigation', 'stockholm' )
				)
			);
			
			//header right menu location
			register_nav_menus(
				array(
					'right-top-navigation' => esc_html__( 'Right Top Navigation', 'stockholm' )
				)
			);
		}

		//mobile menu
		register_nav_menus(
			array('mobile-navigation' => esc_html__( 'Mobile Navigation', 'stockholm')
			)
		);
	}
	
	add_action( 'after_setup_theme', 'stockholm_qode_add_theme_support' );
}

if ( ! function_exists( 'stockholm_qode_styles' ) ) {
	function stockholm_qode_styles() {
		global $is_chrome;
		global $is_safari;
		
		wp_enqueue_style( 'wp-mediaelement' );
		
		wp_enqueue_style( "stockholm-default-style", QODE_ROOT . "/style.css" );
		
		do_action( 'stockholm_qode_action_enqueue_before_main_css' );
		
		wp_enqueue_style( "stockholm-stylesheet", QODE_CSS_ROOT . "/stylesheet.min.css" );
		
		if ( $is_chrome || $is_safari ) {
			//include style for webkit browsers only
			wp_enqueue_style( "stockholm-webkit", QODE_ROOT . "/css/webkit_stylesheet.css" );
		}
		
		$responsiveness = "yes";
		if ( stockholm_qode_options()->getOptionValue( 'responsiveness' ) ) {
			$responsiveness = stockholm_qode_options()->getOptionValue( 'responsiveness' );
		}
		
		if ( stockholm_qode_is_woocommerce_installed() ) {
			wp_enqueue_style( "stockholm-woocommerce", QODE_CSS_ROOT . "/woocommerce.min.css" );
			
			if ( $responsiveness != "no" ) {
				wp_enqueue_style( "stockholm-woocommerce_responsive", QODE_CSS_ROOT . "/woocommerce_responsive.min.css" );	
			}
		}
		
		if ( file_exists( QODE_CSS_ROOT_DIR . '/style_dynamic.css' ) && stockholm_qode_is_css_folder_writable() && ! is_multisite() ) {
			wp_enqueue_style( 'stockholm-style-dynamic', QODE_CSS_ROOT . '/style_dynamic.css', array(), filemtime( QODE_CSS_ROOT_DIR . '/style_dynamic.css' ) );
		} else if ( file_exists( QODE_CSS_ROOT_DIR . '/style_dynamic_ms_id_' . stockholm_qode_get_multisite_blog_id() . '.css' ) && stockholm_qode_is_css_folder_writable() && is_multisite() ) {
			wp_enqueue_style( 'stockholm-style-dynamic', QODE_CSS_ROOT . '/style_dynamic_ms_id_' . stockholm_qode_get_multisite_blog_id() . '.css', array(), filemtime( QODE_CSS_ROOT_DIR . '/style_dynamic_ms_id_' . stockholm_qode_get_multisite_blog_id() . '.css' ) );
		} else {
			wp_enqueue_style( 'stockholm-style-dynamic', QODE_CSS_ROOT . '/style_dynamic_callback.php' ); // Temporary case for Major update
		}
		
		if ( $responsiveness != "no" ):
			wp_enqueue_style( "stockholm-responsive", QODE_CSS_ROOT . "/responsive.min.css" );
			
			//include proper styles
			if ( file_exists( QODE_CSS_ROOT_DIR . '/style_dynamic_responsive.css' ) && stockholm_qode_is_css_folder_writable() && ! is_multisite() ) {
				wp_enqueue_style( 'stockholm-style-dynamic-responsive', QODE_CSS_ROOT . '/style_dynamic_responsive.css', array(), filemtime( QODE_CSS_ROOT_DIR . '/style_dynamic_responsive.css' ) );
			} else if ( file_exists( QODE_CSS_ROOT_DIR . '/style_dynamic_responsive_ms_id_' . stockholm_qode_get_multisite_blog_id() . '.css' ) && stockholm_qode_is_css_folder_writable() && is_multisite() ) {
				wp_enqueue_style( 'stockholm-style-dynamic-responsive', QODE_CSS_ROOT . '/style_dynamic_responsive_ms_id_' . stockholm_qode_get_multisite_blog_id() . '.css', array(), filemtime( QODE_CSS_ROOT_DIR . '/style_dynamic_responsive_ms_id_' . stockholm_qode_get_multisite_blog_id() . '.css' ) );
			} else {
				wp_enqueue_style( 'stockholm-style-dynamic-responsive', QODE_CSS_ROOT . '/style_dynamic_responsive_callback.php' ); // Temporary case for Major update
			}
		endif;
		
		//is left menu activated and is responsive turned on?
		if ( stockholm_qode_is_vertical_header_enabled() && $responsiveness != "no" ) {
			wp_enqueue_style( "stockholm-vertical-responsive", QODE_CSS_ROOT . "/vertical_responsive.min.css" );
		}
		
		if( stockholm_qode_return_toolbar_variable() ){
			wp_enqueue_style( "stockholm-toolbar", QODE_CSS_ROOT . "/toolbar.css" );
		}
		
		if ( stockholm_qode_return_landing_variable() ) {
			wp_enqueue_style( "stockholm-landing-fancybox", get_home_url() . "/demo-files/landing/css/jquery.fancybox.css" );
			wp_enqueue_style( "stockholm-landing", get_home_url() . "/demo-files/landing/css/landing_stylesheet_stripped.css" );
		}
		
		if ( stockholm_qode_visual_composer_installed() ) {
			wp_enqueue_style( 'js_composer_front' );
		}
		
		$custom_css = stockholm_qode_options()->getOptionValue( 'custom_css' );
		
		if ( ! empty( $custom_css ) ) {
			if ( $responsiveness != "no" ) {
				wp_add_inline_style( 'stockholm-style-dynamic-responsive', $custom_css );
			} else {
				wp_add_inline_style( 'stockholm-style-dynamic', $custom_css );
			}
		}

        if( stockholm_qode_options()->getOptionValue('disable_google_fonts') != 'yes' ) {
            $font_weight_str = '100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
            $font_subset_str = 'latin,latin-ext';

            //default fonts
            $default_font_family = array(
                'Raleway',
                'Crete Round'
            );

            $modified_default_font_family = array();
            foreach ($default_font_family as $default_font) {
                $modified_default_font_family[] = $default_font . ':' . str_replace(' ', '', $font_weight_str);
            }

            $default_font_string = implode('|', $modified_default_font_family);

            $available_font_options = array_filter(array(
                stockholm_qode_options()->getOptionValue('google_fonts'),
                stockholm_qode_options()->getOptionValue('menu_google_fonts'),
                stockholm_qode_options()->getOptionValue('dropdown_google_fonts'),
                stockholm_qode_options()->getOptionValue('dropdown_wide_google_fonts'),
                stockholm_qode_options()->getOptionValue('dropdown_google_fonts_thirdlvl'),
                stockholm_qode_options()->getOptionValue('fixed_google_fonts'),
                stockholm_qode_options()->getOptionValue('sticky_google_fonts'),
                stockholm_qode_options()->getOptionValue('mobile_google_fonts'),
                stockholm_qode_options()->getOptionValue('h1_google_fonts'),
                stockholm_qode_options()->getOptionValue('h2_google_fonts'),
                stockholm_qode_options()->getOptionValue('h3_google_fonts'),
                stockholm_qode_options()->getOptionValue('h4_google_fonts'),
                stockholm_qode_options()->getOptionValue('h5_google_fonts'),
                stockholm_qode_options()->getOptionValue('h6_google_fonts'),
                stockholm_qode_options()->getOptionValue('text_google_fonts'),
                stockholm_qode_options()->getOptionValue('blockquote_font_family'),
                stockholm_qode_options()->getOptionValue('page_title_google_fonts'),
                stockholm_qode_options()->getOptionValue('page_subtitle_google_fonts'),
                stockholm_qode_options()->getOptionValue('page_breadcrumb_google_fonts'),
                stockholm_qode_options()->getOptionValue('blog_large_image_ql_title_font_family'),
                stockholm_qode_options()->getOptionValue('blog_masonry_title_font_family'),
                stockholm_qode_options()->getOptionValue('blog_masonry_ql_title_font_family'),
                stockholm_qode_options()->getOptionValue('blog_single_title_font_family'),
                stockholm_qode_options()->getOptionValue('blog_single_ql_title_font_family'),
                stockholm_qode_options()->getOptionValue('blog_list_info_font_family'),
                stockholm_qode_options()->getOptionValue('blog_large_image_ql_author_font_family'),
                stockholm_qode_options()->getOptionValue('blog_masonry_author_font_family'),
                stockholm_qode_options()->getOptionValue('contact_form_heading_google_fonts'),
                stockholm_qode_options()->getOptionValue('pricing_tables_active_text_font_family'),
                stockholm_qode_options()->getOptionValue('pricing_tables_title_font_family'),
                stockholm_qode_options()->getOptionValue('pricing_tables_period_font_family'),
                stockholm_qode_options()->getOptionValue('pricing_tables_price_font_family'),
                stockholm_qode_options()->getOptionValue('pricing_tables_currency_font_family'),
                stockholm_qode_options()->getOptionValue('pricing_tables_button_font_family'),
                stockholm_qode_options()->getOptionValue('message_title_google_fonts'),
                stockholm_qode_options()->getOptionValue('pagination_font_family'),
                stockholm_qode_options()->getOptionValue('button_title_google_fonts'),
                stockholm_qode_options()->getOptionValue('testimonials_text_font_family'),
                stockholm_qode_options()->getOptionValue('testimonials_author_font_family'),
                stockholm_qode_options()->getOptionValue('tabs_nav_font_family'),
                stockholm_qode_options()->getOptionValue('footer_top_text_font_family'),
                stockholm_qode_options()->getOptionValue('footer_top_link_font_family'),
                stockholm_qode_options()->getOptionValue('footer_bottom_text_font_family'),
                stockholm_qode_options()->getOptionValue('footer_bottom_link_font_family'),
                stockholm_qode_options()->getOptionValue('footer_title_font_family'),
                stockholm_qode_options()->getOptionValue('sidebar_title_font_family'),
                stockholm_qode_options()->getOptionValue('sidebar_link_font_family'),
                stockholm_qode_options()->getOptionValue('side_area_title_google_fonts'),
                stockholm_qode_options()->getOptionValue('sidearea_link_font_family'),
                stockholm_qode_options()->getOptionValue('vertical_menu_google_fonts'),
                stockholm_qode_options()->getOptionValue('vertical_dropdown_google_fonts'),
                stockholm_qode_options()->getOptionValue('vertical_dropdown_google_fonts_thirdlvl'),
                stockholm_qode_options()->getOptionValue('popup_menu_google_fonts'),
                stockholm_qode_options()->getOptionValue('popup_menu_google_fonts_2nd'),
                stockholm_qode_options()->getOptionValue('portfolio_single_big_title_font_family'),
                stockholm_qode_options()->getOptionValue('portfolio_single_small_title_font_family'),
                stockholm_qode_options()->getOptionValue('portfolio_single_meta_title_font_family'),
                stockholm_qode_options()->getOptionValue('portfolio_single_meta_text_font_family'),
                stockholm_qode_options()->getOptionValue('top_header_text_font_family'),
                stockholm_qode_options()->getOptionValue('portfolio_filter_title_font_family'),
                stockholm_qode_options()->getOptionValue('portfolio_filter_font_family'),
                stockholm_qode_options()->getOptionValue('portfolio_title_standard_list_font_family'),
                stockholm_qode_options()->getOptionValue('portfolio_category_standard_list_font_family'),
                stockholm_qode_options()->getOptionValue('portfolio_title_list_font_family'),
                stockholm_qode_options()->getOptionValue('portfolio_category_list_font_family'),
                stockholm_qode_options()->getOptionValue('expandable_label_font_family'),
                stockholm_qode_options()->getOptionValue('404_title_font_family'),
                stockholm_qode_options()->getOptionValue('404_text_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_category_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_title_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_price_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_sale_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_out_of_stock_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_sorting_result_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_list_add_to_cart_font_family'),
                stockholm_qode_options()->getOptionValue('woo_product_single_meta_title_font_family'),
                stockholm_qode_options()->getOptionValue('woo_product_single_meta_info_font_family'),
                stockholm_qode_options()->getOptionValue('woo_product_single_title_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_single_add_to_cart_font_family'),
                stockholm_qode_options()->getOptionValue('woo_product_single_price_font_family'),
                stockholm_qode_options()->getOptionValue('woo_product_single_related_font_family'),
                stockholm_qode_options()->getOptionValue('vc_grid_portfolio_filter_font_family'),
                stockholm_qode_options()->getOptionValue('vc_grid_button_title_google_fonts'),
                stockholm_qode_options()->getOptionValue('vc_grid_load_more_button_title_google_fonts'),
                stockholm_qode_options()->getOptionValue('blog_chequered_with_image_title_font_family'),
                stockholm_qode_options()->getOptionValue('blog_chequered_with_bgcolor_title_font_family'),
                stockholm_qode_options()->getOptionValue('blog_animated_title_font_family'),
                stockholm_qode_options()->getOptionValue('blog_centered_title_font_family'),
                stockholm_qode_options()->getOptionValue('blog_centered_info_font_family'),
                stockholm_qode_options()->getOptionValue('testimonials_title_font_family'),
                stockholm_qode_options()->getOptionValue('testimonials_author_job_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_standard_category_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_standard_title_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_standard_price_font_family'),
                stockholm_qode_options()->getOptionValue('woo_products_standard_list_add_to_cart_font_family'),
                stockholm_qode_options()->getOptionValue('gf_title_font_family'),
                stockholm_qode_options()->getOptionValue('gf_label_font_family'),
                stockholm_qode_options()->getOptionValue('gf_description_font_family')
            ));

            $additional_fonts_args = array('post_status' => 'publish', 'post_type' => 'slides', 'posts_per_page' => -1);
            $additional_fonts_query = new WP_Query($additional_fonts_args);

            if ($additional_fonts_query->have_posts()):
                while ($additional_fonts_query->have_posts()) : $additional_fonts_query->the_post();
                    $post_id = get_the_ID();

                    if (get_post_meta($post_id, "qode_slide-title-font-family", true) != "") {
                        array_push($available_font_options, get_post_meta($post_id, "qode_slide-title-font-family", true));
                    }
                    if (get_post_meta($post_id, "qode_slide-text-font-family", true) != "") {
                        array_push($available_font_options, get_post_meta($post_id, "qode_slide-text-font-family", true));
                    }
                    if (get_post_meta($post_id, "qode_slide-subtitle-font-family", true) != "") {
                        array_push($available_font_options, get_post_meta($post_id, "qode_slide-subtitle-font-family", true));
                    }
                endwhile;
            endif;

            wp_reset_postdata();

            //define available font options array
            $fonts_array = array();
            if (!empty($available_font_options)) {
                foreach ($available_font_options as $font_option_value) {
                    $font_option_string = $font_option_value . ':' . $font_weight_str;

                    if (!in_array(str_replace('+', ' ', $font_option_value), $default_font_family) && !in_array($font_option_string, $fonts_array)) {
                        $fonts_array[] = $font_option_string;
                    }
                }

                $fonts_array = array_diff($fonts_array, array('-1:' . $font_weight_str));
            }

            $google_fonts_string = implode('|', $fonts_array);

            $protocol = is_ssl() ? 'https:' : 'http:';

            //is google font option checked anywhere in theme?
            if (is_array($fonts_array) && count($fonts_array) > 0) {

                //include all checked fonts
                $fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
                $fonts_full_list_args = array(
                    'family' => urlencode($fonts_full_list),
                    'subset' => urlencode($font_subset_str),
                );

                $stockholm_global_fonts = add_query_arg($fonts_full_list_args, $protocol . '//fonts.googleapis.com/css');
                wp_enqueue_style('stockholm-google-fonts', esc_url_raw($stockholm_global_fonts), array(), '1.0.0');

            } else {
                //include default google font that theme is using
                $default_fonts_args = array(
                    'family' => urlencode($default_font_string),
                    'subset' => urlencode($font_subset_str),
                );
                $stockholm_global_fonts = add_query_arg($default_fonts_args, $protocol . '//fonts.googleapis.com/css');
                wp_enqueue_style('stockholm-google-fonts', esc_url_raw($stockholm_global_fonts), array(), '1.0.0');
            }
        }
	}
	
	add_action( 'wp_enqueue_scripts', 'stockholm_qode_styles' );
}

if ( ! function_exists( 'stockholm_qode_scripts' ) ) {
	function stockholm_qode_scripts() {
		global $is_IE;
		global $is_chrome;
		global $is_opera;
		
		//init theme core scripts
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-widget' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'jquery-effects-core' );
		wp_enqueue_script( 'jquery-effects-fade' );
		wp_enqueue_script( 'jquery-effects-scale' );
		wp_enqueue_script( 'jquery-effects-slide' );
		wp_enqueue_script( 'jquery-ui-position' );
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-form' );
		wp_enqueue_script( 'wp-mediaelement' );
		
		// 3rd party JavaScripts that we used in our theme
		wp_enqueue_script( 'doubletaptogo', QODE_JS_ROOT . '/plugins/doubletaptogo.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'modernizr', QODE_JS_ROOT . '/plugins/modernizr.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'appear', QODE_JS_ROOT . '/plugins/jquery.appear.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'hoverIntent' );
		wp_enqueue_script( 'absoluteCounter', QODE_JS_ROOT . '/plugins/absoluteCounter.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'easypiechart', QODE_JS_ROOT . '/plugins/easypiechart.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'mixitup', QODE_JS_ROOT . '/plugins/jquery.mixitup.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'nicescroll', QODE_JS_ROOT . '/plugins/jquery.nicescroll.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'prettyphoto', QODE_JS_ROOT . '/plugins/jquery.prettyPhoto.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'fitvids', QODE_JS_ROOT . '/plugins/jquery.fitvids.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'flexslider', QODE_JS_ROOT . '/plugins/jquery.flexslider-min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'infinitescroll', QODE_JS_ROOT . '/plugins/infinitescroll.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waitforimages', QODE_JS_ROOT . '/plugins/jquery.waitforimages.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waypoints', QODE_JS_ROOT . '/plugins/waypoints.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jplayer', QODE_JS_ROOT . '/plugins/jplayer.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'bootstrap-carousel', QODE_JS_ROOT . '/plugins/bootstrap.carousel.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'skrollr', QODE_JS_ROOT . '/plugins/skrollr.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'Chart', QODE_JS_ROOT . '/plugins/Chart.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-easing-1.3', QODE_JS_ROOT . '/plugins/jquery.easing.1.3.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-plugin', QODE_JS_ROOT . '/plugins/jquery.plugin.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'countdown', QODE_JS_ROOT . '/plugins/jquery.countdown.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'justifiedGallery', QODE_JS_ROOT . '/plugins/jquery.justifiedGallery.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'owl-carousel', QODE_JS_ROOT . '/plugins/owl.carousel.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( "carouFredSel", QODE_JS_ROOT . "/plugins/jquery.carouFredSel-6.2.1.js", array( 'jquery' ), false, true );
		wp_enqueue_script( "fullPage", QODE_JS_ROOT . "/plugins/jquery.fullPage.min.js", array( 'jquery' ), false, true );
		wp_enqueue_script( "lemmonSlider", QODE_JS_ROOT . "/plugins/lemmon-slider.js", array( 'jquery' ), false, true );
		wp_enqueue_script( "mousewheel", QODE_JS_ROOT . "/plugins/jquery.mousewheel.min.js", array( 'jquery' ), false, true );
		wp_enqueue_script( "touchSwipe", QODE_JS_ROOT . "/plugins/jquery.touchSwipe.min.js", array( 'jquery' ), false, true );
		wp_enqueue_script( "isotope", QODE_JS_ROOT . "/plugins/jquery.isotope.min.js", array( 'jquery' ), false, true );
        wp_enqueue_script( 'packery', QODE_JS_ROOT . '/plugins/packery-mode.pkgd.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( "parallax-scroll", QODE_JS_ROOT . "/plugins/jquery.parallax-scroll.js", array( 'jquery' ), false, true );
        wp_enqueue_script( 'hammer', QODE_JS_ROOT . '/plugins/hammer.min.js', false, true );
        wp_enqueue_script( 'virtual-scroll', QODE_JS_ROOT . '/plugins/virtual-scroll.min.js', false, true );
        wp_enqueue_script( 'multiscroll', QODE_JS_ROOT . "/plugins/jquery.multiscroll.min.js",array('jquery'),false,true);

		do_action( 'stockholm_qode_action_enqueue_additional_scripts' );
		
		if ( ( $is_chrome || $is_opera ) && stockholm_qode_options()->getOptionValue( 'smooth_scroll' ) == "yes" ) {
			wp_enqueue_script( "smooth-scroll", QODE_JS_ROOT . "/plugins/SmoothScroll.js", array( 'jquery' ), false, true );
		}
	
		if ( $is_IE ) {
			wp_enqueue_script( "html5", QODE_JS_ROOT . "/plugins/html5.js", array( 'jquery' ), false, false );
		}
		if ( stockholm_qode_options()->getOptionValue( 'enable_google_map' ) == "yes" || stockholm_qode_has_google_map_shortcode() ) :
			$google_maps_api_key = stockholm_qode_options()->getOptionValue( 'google_maps_api_key' );
		
			if ( ! empty( $google_maps_api_key ) ) {
				wp_enqueue_script( "stockholm-google-map-api", "https://maps.googleapis.com/maps/api/js?key=" . esc_attr( $google_maps_api_key ), array( 'jquery' ), false, true );
			}
		endif;
		
		if ( file_exists( QODE_JS_ROOT_DIR . '/default_dynamic.js' ) && stockholm_qode_is_js_folder_writable() && ! is_multisite() ) {
			wp_enqueue_script( 'stockholm-default-dynamic', QODE_JS_ROOT . '/default_dynamic.js', array( 'jquery' ), filemtime( QODE_JS_ROOT_DIR . '/default_dynamic.js' ), true );
		} else if ( file_exists( QODE_JS_ROOT_DIR . '/default_dynamic_ms_id_' . stockholm_qode_get_multisite_blog_id() . '.js' ) && stockholm_qode_is_js_folder_writable() && is_multisite() ) {
			wp_enqueue_script( 'stockholm-default-dynamic', QODE_JS_ROOT . '/default_dynamic_ms_id_' . stockholm_qode_get_multisite_blog_id() . '.js', array( 'jquery' ), filemtime( QODE_JS_ROOT_DIR . '/default_dynamic_ms_id_' . stockholm_qode_get_multisite_blog_id() . '.js' ), true );
		} else {
			wp_enqueue_script( 'stockholm-default-dynamic', QODE_JS_ROOT . '/default_dynamic_callback.php', array( 'jquery' ), false, true ); // Temporary case for Major update 4.0
		}
		
		wp_enqueue_script( "stockholm-default", QODE_JS_ROOT . "/default.min.js", array( 'jquery' ), false, true );
		
		$custom_js = stockholm_qode_options()->getOptionValue( 'custom_js' );
		if ( ! empty( $custom_js ) ) {
			wp_add_inline_script( 'stockholm-default', $custom_js );
		}
		
		global $wp_scripts;
		$wp_scripts->add_data( 'comment-reply', 'group', 1 );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( "comment-reply" );
		}
		

		
		if ( stockholm_qode_is_woocommerce_installed() ) {
			wp_enqueue_script( "stockholm-woocommerce", QODE_JS_ROOT . "/woocommerce.min.js", array( 'jquery' ), false, true );
			wp_enqueue_script( "select2" );
		}
		
		$has_ajax       = false;
		$qode_animation = "";
		if ( isset( $_SESSION['qode_stockholm_page_transitions'] ) ) {
			$qode_animation = $_SESSION['qode_stockholm_page_transitions'];
		}
		if ( stockholm_qode_is_page_transition_enabled() && ( empty( $qode_animation ) || ( $qode_animation != "no" ) ) ) {
			$has_ajax = true;
		} elseif ( ! empty( $qode_animation ) && ( $qode_animation != "no" ) ) {
			$has_ajax = true;
		}
		
		if ( $has_ajax ) :
			wp_enqueue_script( "stockholm-ajax", QODE_JS_ROOT . "/ajax.min.js", array( 'jquery' ), false, true );
		endif;
		
		if ( stockholm_qode_visual_composer_installed() ) {
			wp_enqueue_script( 'wpb_composer_front_js' );
		}

		if ( stockholm_qode_options()->getOptionValue( 'use_recaptcha' ) == "yes" ) :
			$url = 'https://www.google.com/recaptcha/api.js';
			$url = add_query_arg( array(
				'onload' => 'stockholmdQodeRecaptchaCallback',
				'render' => 'explicit' ), $url );
			wp_enqueue_script("recaptcha", $url, array('jquery'),false,true);
		endif;

		
		if( stockholm_qode_return_toolbar_variable() ){
			wp_enqueue_script("stockholm-toolbar", QODE_JS_ROOT. "/toolbar.js",array( 'jquery' ),false,true);
		}
		
		if ( stockholm_qode_return_landing_variable() ) {
			wp_enqueue_script( "stockholm-landing-fancybox", get_home_url() . "/demo-files/landing/js/jquery.fancybox.js", array( 'jquery' ), false, true );
			wp_enqueue_script( "stockholm-landing", get_home_url() . "/demo-files/landing/js/landing_default.js", array( 'jquery' ), false, true );
		}
	}
	
	add_action('wp_enqueue_scripts', 'stockholm_qode_scripts');
}

if ( ! function_exists( 'stockholm_qode_set_global_variables' ) ) {
	function stockholm_qode_set_global_variables() {
		$sticky_scroll_amount = get_post_meta( stockholm_qode_get_page_id(), "qode_page_scroll_amount_for_sticky", true );
		$left_menu_area_width = stockholm_qode_options()->getOptionValue('left_menu_area_width');

		if( empty( $left_menu_area_width ) ){
            $left_menu_area_width = 260;
        }

        wp_localize_script( 'stockholm-default', 'QodeLeftMenuArea', array( 'width' => intval($left_menu_area_width) ) );
		
		if ( $sticky_scroll_amount !== '' ) {
			wp_localize_script( 'stockholm-default', 'page_scroll_amount_for_sticky', $sticky_scroll_amount );
		}

		$global_variables = array();
		$global_variables = apply_filters('stockholm_qode_filter_js_global_variables', $global_variables);
		if( is_array( $global_variables ) && count( $global_variables ) > 0 ) {
			wp_localize_script( 'stockholm-default', 'StockholmQodeGlobalVars', array(
				'vars' => $global_variables
			) );
		}
		wp_localize_script( 'stockholm-default', 'QodeAdminAjax', array( 'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ) ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'stockholm_qode_set_global_variables' );
}

if ( ! function_exists( 'stockholm_qode_admin_jquery' ) ) {
	function stockholm_qode_admin_jquery() {
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_style( 'stockholm-admin-style', QODE_CSS_ROOT . '/admin/admin-style.css', false, '1.0', 'screen' );
		wp_enqueue_style( 'stockholm-admin-colorstyle', QODE_CSS_ROOT . '/admin/admin-colorpicker.css', false, '1.0', 'screen' );
		wp_enqueue_script( 'color-picker', QODE_JS_ROOT . '/admin/colorpicker.js', array( 'jquery' ), '1.0.0', false );
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_script( 'stockholm-admin-default', QODE_JS_ROOT . '/admin/default.js', array( 'jquery' ), '1.0.0', false );
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_script('media-upload');
		wp_enqueue_media();
		
		if ( function_exists( 'is_gutenberg_page' ) && is_admin() ) {
			wp_enqueue_style( 'stockholm-gutenberg-fix', QODE_CSS_ROOT . '/admin/gutenberg.css', array(), '1.0' );
		}
	}
	
	add_action( 'admin_enqueue_scripts', 'stockholm_qode_admin_jquery' );
}

if ( ! function_exists( 'stockholm_qode_enqueue_editor_customizer_styles' ) ) {
	/**
	 * Enqueue supplemental block editor styles
	 */
	function stockholm_qode_enqueue_editor_customizer_styles() {
		$protocol = is_ssl() ? 'https:' : 'http:';
		//include default google font that theme is using
		$default_fonts_args          = array(
			'family' => urlencode( 'Open Sans:300,400,600,700' ),
			'subset' => urlencode( 'latin-ext' ),
		);
		$stockholm_global_fonts = add_query_arg( $default_fonts_args, $protocol . '//fonts.googleapis.com/css' );
		wp_enqueue_style( 'stockholm-editor-google-fonts', esc_url_raw( $stockholm_global_fonts ) );
		
		wp_enqueue_style( 'stockholm-editor-customizer-style', QODE_CSS_ROOT . '/admin/editor-customizer-style.css' );
		wp_enqueue_style( 'stockholm-editor-blocks-style', QODE_CSS_ROOT . '/admin/editor-blocks-style.css' );
	}
	
	add_action( 'enqueue_block_editor_assets', 'stockholm_qode_enqueue_editor_customizer_styles' );
}

if ( ! function_exists( 'stockholm_qode_user_scalable_meta' ) ) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to stockholm_qode_action_header_meta action
	 */
	function stockholm_qode_user_scalable_meta() {
		//is responsiveness option is chosen?
		if ( stockholm_qode_options()->getOptionValue( 'responsiveness' ) !== 'no' ) { ?>
			<meta name=viewport content="width=device-width,initial-scale=1,user-scalable=no">
		<?php } else { ?>
			<meta name=viewport content="width=1200,user-scalable=no">
		<?php }
	}
	
	add_action( 'stockholm_qode_action_header_meta', 'stockholm_qode_user_scalable_meta' );
}

if ( ! function_exists( 'stockholm_qode_is_main_menu_set' ) ) {
	/**
	 * Function that checks if any of main menu locations are set.
	 * Checks whether top-navigation location is set, or left-top-navigation and right-top-navigation is set
	 * @return bool
	 *
	 * @version 0.1
	 */
	function stockholm_qode_is_main_menu_set() {
		$has_top_nav     = has_nav_menu( 'top-navigation' );
		$has_divided_nav = has_nav_menu( 'left-top-navigation' ) && has_nav_menu( 'right-top-navigation' );
		
		return $has_top_nav || $has_divided_nav;
	}
}

if ( ! function_exists( 'stockholm_qode_include_back_to_top' ) ) {
	function stockholm_qode_include_back_to_top() {
        $back_to_top_html = '<i class="fa fa-angle-up"></i>';
        $back_to_top_icon_pack = stockholm_qode_options()->getOptionValue('back_to_top_icon_pack');

        if(isset($back_to_top_icon_pack) && !empty($back_to_top_icon_pack)) {
            $back_to_top_icon_param = stockholm_qode_icon_collections()->getIconCollectionParamNameByKey($back_to_top_icon_pack);
            $back_to_top_icon = stockholm_qode_options()->getOptionValue('back_to_top_icon_pack_' . $back_to_top_icon_pack);
            if(isset($back_to_top_icon) && !empty($back_to_top_icon)){
                $back_to_top_html = stockholm_qode_icon_collections()->getIconHTML($back_to_top_icon, $back_to_top_icon_pack);
            }
        }
		if ( stockholm_qode_options()->getOptionValue( 'show_back_button' ) == "yes" ) { ?>
			<a id='back_to_top' href='#'>
				<span class="fa-stack">
					<?php echo stockholm_qode_get_module_part( $back_to_top_html ); ?>
				</span>
			</a>
		<?php }
	}
	
	add_action( 'stockholm_qode_action_before_page_header', 'stockholm_qode_include_back_to_top' );
}

if ( ! function_exists( 'stockholm_qode_hex2rgb' ) ) {
	/**
	 * Function that transforms hex color to rgb color
	 *
	 * @param $hex string original hex string
	 *
	 * @return array array containing three elements (r, g, b)
	 */
	function stockholm_qode_hex2rgb( $hex ) {
		$hex = str_replace( "#", "", $hex );
		
		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = array( $r, $g, $b );
		
		//return implode(",", $rgb); // returns the rgb values separated by commas
		return $rgb; // returns an array with the rgb values
	}
}

if ( ! function_exists( 'stockholm_qode_has_shortcode' ) ) {
	/**
	 * Function that checks whether shortcode exists on current page / post
	 *
	 * @param string shortcode to find
	 * @param string content to check. If isn't passed current post content will be used
	 *
	 * @return bool whether content has shortcode or not
	 */
	function stockholm_qode_has_shortcode( $shortcode, $content = '' ) {
		$has_shortcode = false;
		
		if ( $shortcode ) {
			//if content variable isn't past
			if ( $content == '' ) {
				//take content from current post
				$current_post = get_post( get_the_ID() );
				$content      = ! empty( $current_post ) ? $current_post->post_content : '';
			}
			
			//does content has shortcode added?
			if ( stripos( $content, '[' . $shortcode ) !== false ) {
				$has_shortcode = true;
			}
		}
		
		return $has_shortcode;
	}
}

if ( ! function_exists( 'stockholm_qode_has_google_map_shortcode' ) ) {
	/**
	 * Function that checks Qode Google Map shortcode exists on a page
	 * @return bool
	 */
	function stockholm_qode_has_google_map_shortcode() {
		$google_map_shortcode = 'qode_google_map';
		
		$slider_field  = get_post_meta( stockholm_qode_get_page_id(), 'qode_revolution-slider', true );
		$has_shortcode = stockholm_qode_has_shortcode( $google_map_shortcode ) || stockholm_qode_has_shortcode( $google_map_shortcode, $slider_field );
		
		if ( $has_shortcode ) {
			return true;
		}
		
		return false;
	}
}

if ( ! function_exists( 'stockholm_qode_compare_portfolio_images' ) ) {
	/**
	 * Function that compares two portfolio image for sorting
	 *
	 * @param $a int first image
	 * @param $b int second image
	 *
	 * @return int result of comparison
	 */
	function stockholm_qode_compare_portfolio_images( $a, $b ) {
		if ( isset( $a['portfolioimgordernumber'] ) && isset( $b['portfolioimgordernumber'] ) ) {
			if ( $a['portfolioimgordernumber'] == $b['portfolioimgordernumber'] ) {
				return 0;
			}
			
			return ( $a['portfolioimgordernumber'] < $b['portfolioimgordernumber'] ) ? - 1 : 1;
		}
		
		return 0;
	}
}

if ( ! function_exists( 'stockholm_qode_compare_portfolio_options' ) ) {
	/**
	 * Function that compares two portfolio options for sorting
	 *
	 * @param $a int first option
	 * @param $b int second option
	 *
	 * @return int result of comparison
	 */
	function stockholm_qode_compare_portfolio_options( $a, $b ) {
		if ( isset( $a['optionlabelordernumber'] ) && isset( $b['optionlabelordernumber'] ) ) {
			if ( $a['optionlabelordernumber'] == $b['optionlabelordernumber'] ) {
				return 0;
			}
			
			return ( $a['optionlabelordernumber'] < $b['optionlabelordernumber'] ) ? - 1 : 1;
		}
		
		return 0;
	}
}

if ( ! function_exists( 'stockholm_qode_attachment_field_custom_size' ) ) {
	function stockholm_qode_attachment_field_custom_size( $form_fields, $post ) {
		$field_value                                          = get_post_meta( $post->ID, 'qode_portfolio_single_predefined_size', true );
		$form_fields['qode_portfolio_single_predefined_size'] = array(
			'label' => esc_html__( 'Masonry Size', 'stockholm' ),
			'input' => 'text',
			'value' => $field_value ? $field_value : ''
		);
		$form_fields["qode_portfolio_single_predefined_size"]["extra_rows"] = array(
			"row1" => esc_html__( "Enter 'large' (twice the size of default image) or 'huge' (three times the size of default image) for Masonry Gallery templates on Portfolio Single Pages.", 'stockholm' )
		);
		
		return $form_fields;
	}
	
	add_filter( 'attachment_fields_to_edit', 'stockholm_qode_attachment_field_custom_size', 10, 3 );
}

if ( ! function_exists( 'stockholm_qode_attachment_field_custom_size_save' ) ) {
	function stockholm_qode_attachment_field_custom_size_save( $post, $attachment ) {
		if ( isset( $attachment['qode_portfolio_single_predefined_size'] ) ) {
			update_post_meta( $post['ID'], 'qode_portfolio_single_predefined_size', $attachment['qode_portfolio_single_predefined_size'] );
		}
		
		return $post;
	}
	
	add_filter( 'attachment_fields_to_save', 'stockholm_qode_attachment_field_custom_size_save', 10, 2 );
}

if(!function_exists('stockholm_qode_is_ajax_enabled')) {
    /**
     * Function that checks if ajax is enabled.
     * @return bool
     *
     * @version 0.1
     */
    function stockholm_qode_is_ajax_enabled() {
        global $stockholm_options;

        $has_ajax = false;

        if(isset($stockholm_options['page_transitions']) && $stockholm_options['page_transitions'] !== '0') {
            $has_ajax = true;
        }

        return $has_ajax;
    }
}

if ( ! function_exists('stockholm_qode_get_unique_page_class') ) {
    /**
     * Returns unique page class based on post type and page id
     *
     * $params int $id is page id
     * $params bool $allowSingleProductOption
     * @return string
     */
    function stockholm_qode_get_unique_page_class($id, $allowSingleProductOption = false ) {
        $page_class = '';

        if ( stockholm_qode_is_woocommerce_installed() && $allowSingleProductOption ) {

            if ( is_product() ) {
                $id = get_the_ID();
            }
        }

        if ( is_single() ) {
            $page_class = '.postid-' . $id;
        } elseif ( is_home() ) {
            $page_class .= '.home';
        } elseif ( is_archive() || $id === stockholm_qode_get_woo_shop_page_id() ) {
            $page_class .= '.archive';
        } elseif ( is_search() ) {
            $page_class .= '.search';
        } elseif ( is_404() ) {
            $page_class .= '.error404';
        } else {
            $page_class .= '.page-id-' . $id;
        }

        return $page_class;
    }
}

if ( ! function_exists('stockholm_qode_page_custom_style') ) {
    /**
     * Function that print custom page style
     */
    function stockholm_qode_page_custom_style() {
        $style = apply_filters( 'stockholm_qode_filter_add_page_custom_style', $style = array() );
        if ( $style !== '' ) {
            if(!stockholm_qode_is_ajax_enabled()) {
                wp_add_inline_style('stockholm-stylesheet', implode(' ', $style));
            } else {
                echo '<style type="text/css" id="stylesheet-inline-css-' .stockholm_qode_get_page_id() . '">';
                print implode(' ', $style);
                echo '</style>';
            }
        }
    }

}

if( ! function_exists('stockholm_qode_add_page_custom_style') ){
    function stockholm_qode_add_page_custom_style(){
        if(!stockholm_qode_is_ajax_enabled()) {
            add_action( 'wp_enqueue_scripts', 'stockholm_qode_page_custom_style' );
        } else {
            add_action( 'stockholm_qode_action_after_content_inner', 'stockholm_qode_page_custom_style' );
        }
    }

    add_action('after_setup_theme', 'stockholm_qode_add_page_custom_style');
}

if( ! function_exists( 'stockholm_qode_is_theme_registered' ) ) {
	function stockholm_qode_is_theme_registered() {
		if( function_exists( 'stockholm_core_is_theme_registered' ) ){
			return stockholm_core_is_theme_registered();
		} else {
			return false;
		}
	}
}

if( ! function_exists( 'stockholm_qode_add_registration_admin_notice' ) ) {
	function stockholm_qode_add_registration_admin_notice() {
		if( stockholm_qode_is_core_installed() &&  ! stockholm_qode_is_theme_registered() ) {
			?>
			<div class="error">
				<p>
					<?php
					echo wp_kses_post( sprintf(
						__( 'Your copy of the theme has not been activated. Please navigate to <a href="%s">Stockholm Dashboard</a> where you can input your purchase code and activate your copy of the theme so you can have access to all the theme features, elements & options.', 'stockholm' ),
						admin_url('admin.php?page=stockholm_core_dashboard')
					) );
					?>
				</p>
			</div>
			<?php
		}
	}

	add_action('admin_notices', 'stockholm_qode_add_registration_admin_notice');
}

/* --------------------------------------------*//* --------------------------------------------*//* --------------------------------------------*/

add_filter( 'big_image_size_threshold', '__return_false' );

add_filter('jpeg_quality', function($arg){return 100;});

function remove_all_image_sizes() {
    foreach ( get_intermediate_image_sizes() as $size ) {
            remove_image_size( $size );
    }
}
 
add_action('init', 'remove_all_image_sizes');