<?php

if ( ! function_exists( 'stockholm_qode_add_theme_version_class' ) ) {
	/**
	 * Function that adds classes on body for version of theme
	 */
	function stockholm_qode_add_theme_version_class( $classes ) {
		$current_theme = wp_get_theme();
		$theme_prefix  = 'select';
		
		//is child theme activated?
		if ( $current_theme->parent() ) {
			//add child theme version
			$classes[] = $theme_prefix . '-child-theme-ver-' . $current_theme->get( 'Version' );
			
			//get parent theme
			$current_theme = $current_theme->parent();
		}
		
		if ( $current_theme->exists() && $current_theme->get( 'Version' ) != "" ) {
			$classes[] = $theme_prefix . '-theme-ver-' . $current_theme->get( 'Version' );
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'stockholm_qode_add_theme_version_class' );
}

if ( ! function_exists( 'stockholm_qode_add_ajax_classes' ) ) {
	function stockholm_qode_add_ajax_classes( $classes ) {
		//init variables
		$qode_animation   = "";
		$page_transitions = stockholm_qode_options()->getOptionValue( 'page_transitions' );
		
		//is ajax set in session
		if ( isset( $_SESSION['qode_animation'] ) ) {
			$qode_animation = $_SESSION['qode_animation'];
		}
		
		//is ajax animation turned off in options or in session?
		if ( ( $page_transitions === "0" && $qode_animation == "no" ) || stockholm_qode_vc_grid_elements_enabled() ) {
			$classes[] = '';
		} //is up down animation type set?
		elseif ( $page_transitions === "1" && ( empty( $qode_animation ) || ( $qode_animation != "no" ) ) ) {
			$classes[] = 'ajax_updown';
			$classes[] = 'page_not_loaded';
		} //is fade animation type set?
		elseif ( $page_transitions === "2" && ( empty( $qode_animation ) || ( $qode_animation != "no" ) ) ) {
			$classes[] = 'ajax_fade';
			$classes[] = 'page_not_loaded';
		} //is up down fade animation type set?
		elseif ( $page_transitions === "3" && ( empty( $qode_animation ) || ( $qode_animation != "no" ) ) ) {
			$classes[] = 'ajax_updown_fade';
			$classes[] = 'page_not_loaded';
		} //is left / right animation type set?
		elseif ( $page_transitions === "4" && ( empty( $qode_animation ) || ( $qode_animation != "no" ) ) ) {
			$classes[] = 'ajax_leftright';
			$classes[] = 'page_not_loaded';
		} //is animation set only in session?
		elseif ( ! empty( $qode_animation ) && $qode_animation != "no" ) {
			$classes[] = 'page_not_loaded';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'stockholm_qode_add_ajax_classes' );
}

if ( ! function_exists( 'stockholm_qode_add_helpers_class' ) ) {
	/**
	 * Function that adds classes on body element
	 */
	function stockholm_qode_add_helpers_class( $classes ) {
		global $is_chrome;
		global $is_opera;
		global $stockholm_qode_options;
		
		$page_id = stockholm_qode_get_page_id();
		
		if ( stockholm_qode_options()->getOptionValue( 'boxed' ) == "yes" ) :
			$classes[] = 'boxed';
		endif;
		
		//is left menu area turned on?
		if ( stockholm_qode_is_vertical_header_enabled() ) {
			$classes[] = 'vertical_menu_enabled';
		}

        //left menu type class?
        if(isset($stockholm_qode_options['vertical_area_type']) && $stockholm_qode_options['vertical_area_type'] != '') {
            switch ($stockholm_qode_options['vertical_area_type']) {
                case 'hidden':
                    $classes[] = ' vertical_menu_hidden';
                    if(isset($stockholm_qode_options['vertical_logo_bottom']) && $stockholm_qode_options['vertical_logo_bottom'] !== '') {
                        $classes[] = 'vertical_menu_hidden_with_logo';
                    }
                    break;
            }
        }
		
		if ( stockholm_qode_options()->getOptionValue( 'vertical_area_transparency' ) == 'yes' && get_post_meta( $page_id, "qode_page_vertical_area_transparency", true ) != "no" ) {
			$classes[] = ' vertical_menu_transparency vertical_menu_transparency_on';
		} else if ( get_post_meta( $page_id, "qode_page_vertical_area_transparency", true ) == "yes" ) {
			$classes[] = ' vertical_menu_transparency vertical_menu_transparency_on';
		}
		
		if ( stockholm_qode_is_paspartu_enabled() ) {
			$classes[] = 'paspartu_enabled';
		}
		
		if ( stockholm_qode_is_vertical_header_enabled() ) {
			if ( stockholm_qode_options()->getOptionValue( 'enable_vertical_menu_hover_animation' ) == 'yes' && stockholm_qode_options()->getOptionValue( 'vertical_menu_hover_type' ) !== '' ) {
				$classes[] = "menu-animation-" . stockholm_qode_options()->getOptionValue( 'vertical_menu_hover_type' );
			}
		} else {
			if ( stockholm_qode_options()->getOptionValue( 'enable_menu_hover_animation' ) == 'yes' && stockholm_qode_options()->getOptionValue( 'menu_hover_type' ) !== '' ) {
				$classes[] = "menu-animation-" . stockholm_qode_options()->getOptionValue( 'menu_hover_type' );
			}
		}
		
		if ( stockholm_qode_options()->getOptionValue( 'enable_fullscreen_menu_hover_animation' ) == 'yes' && stockholm_qode_options()->getOptionValue( 'fullscreen_menu_hover_type' ) !== '' ) {
			$classes[] = "fs-menu-animation-" . stockholm_qode_options()->getOptionValue( 'fullscreen_menu_hover_type' );
		}
		
		if ( stockholm_qode_options()->getOptionValue( 'enable_popup_menu' ) == 'yes' ) {
			if ( stockholm_qode_options()->getOptionValue( 'popup_menu_appearance' ) !== '' ) {
				$classes[] = "popup-menu-" . stockholm_qode_options()->getOptionValue( 'popup_menu_appearance' );
			} else {
				$classes[] = "popup-menu-fade"; //default type was fade
			}
		}
		
		if ( stockholm_qode_options()->getOptionValue( 'enable_side_area' ) == 'yes' ) {
			if ( stockholm_qode_options()->getOptionValue( 'side_area_appear_type' ) !== '' ) {
				$classes[] = stockholm_qode_options()->getOptionValue( 'side_area_appear_type' );
			} else {
				$classes[] = "side_area_uncovered"; //default type was uncovered
			}
		}
		
		//is Chrome or Opera and is smooth scrolling turned on?
		if ( ( $is_chrome || $is_opera ) && stockholm_qode_options()->getOptionValue( 'smooth_scroll' ) == "yes" ) {
			$classes[] = "smooth_scroll";
		}
		
		if ( stockholm_qode_options()->getOptionValue( 'header_top_area_hide_on_mobile' ) == 'yes' ) {
			$classes[] = 'header_top_hide_on_mobile';
		}
		
		$isMobile = (bool) preg_match( '#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet' .
		                               '|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]' .
		                               '|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', getenv( "HTTP_USER_AGENT" ) );
		
		if ( stockholm_qode_options()->getOptionValue( 'elements_animation_on_touch' ) == "no" && $isMobile == true ) {
			$classes[] = 'no_animation_on_touch';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'stockholm_qode_add_helpers_class' );
}

/* Add class on body depending on content width */

if (!function_exists('stockholm_qode_content_width_class')) {
	/**
	 * Function that adds class on body depending on content width
	 * @param $classes array of current body classes
	 * @return array array of changed body classes
	 */
	function stockholm_qode_content_width_class($classes){
		global $stockholm_qode_options;

		$classes[] = "";
		if (isset($stockholm_qode_options['initial_content_width']) && $stockholm_qode_options['initial_content_width'] !== "grid_1100") {
			$classes[] = 'qode_' . $stockholm_qode_options['initial_content_width'];
		}
		return $classes;
	}

	add_filter('body_class','stockholm_qode_content_width_class');
}

/* Add class on body depending on footer advanced responsiveness */

if (!function_exists('stockholm_qode_footer_advanced_resposniveness_classes')) {
	/**
	 * Function that adds class on body depending on footer advanced responsiveness option
	 * @param $classes array of current body classes
	 * @return array array of changed body classes
	 */
	function stockholm_qode_footer_advanced_resposniveness_classes($classes){
		global $stockholm_qode_options;

        if (isset($stockholm_qode_options['footer_top_adv_responsiveness']) && $stockholm_qode_options['footer_top_adv_responsiveness'] == "yes") {
            $classes[] = 'qode_footer_adv_responsiveness';

            if (isset($stockholm_qode_options['footer_top_responsive_breakpoint'])) {
                $classes[] = 'qode_footer_adv_responsiveness_' . $stockholm_qode_options['footer_top_responsive_breakpoint'];
            }

            if (isset($stockholm_qode_options['footer_top_two_columns']) && $stockholm_qode_options['footer_top_two_columns'] == 'yes') {
                $classes[] = 'qode_footer_adv_responsiveness_two_columns';
            } else{
                $classes[] = 'qode_footer_adv_responsiveness_one_column';
            }
        }

		return $classes;
	}

	add_filter('body_class','stockholm_qode_footer_advanced_resposniveness_classes');
}


/* Add class on body depending on menu position */

if (!function_exists('stockholm_qode_menu_position_classes')) {
	/**
	 * Function that adds class on body depending on content width
	 * @param $classes array of current body classes
	 * @return array array of changed body classes
	 */
	function stockholm_qode_menu_position_classes($classes){
		global $stockholm_qode_options;

        if ( isset($stockholm_qode_options['menu_position']) ) {
            if( $stockholm_qode_options['menu_position'] !== "-1" ){
                $classes[] = 'qode_menu_' . $stockholm_qode_options['menu_position'];
            } else {
                $classes[] = 'qode_menu_right';
            }
        }

		return $classes;
	}

	add_filter('body_class','stockholm_qode_menu_position_classes');
}


/* Add class on body depending on sidebar advanced responsiveness */

if (!function_exists('stockholm_qode_sidebar_advanced_resposniveness_classes')) {
    /**
     * Function that adds class on body depending on sidebar responsiveness option
     * @param $classes array of current body classes
     * @return array array of changed body classes
     */
    function stockholm_qode_sidebar_advanced_resposniveness_classes($classes){
        global $stockholm_qode_options;

        if (isset($stockholm_qode_options['sidebar_adv_responsiveness']) && $stockholm_qode_options['sidebar_adv_responsiveness'] == "yes") {
            $classes[] = 'qode_sidebar_adv_responsiveness';

            if (isset($stockholm_qode_options['sidebar_adv_responsiveness_responsive_breakpoint'])) {
                $classes[] = 'qode_sidebar_adv_responsiveness_' . $stockholm_qode_options['sidebar_adv_responsiveness_responsive_breakpoint'];
            }
        }

        return $classes;
    }

    add_filter('body_class','stockholm_qode_sidebar_advanced_resposniveness_classes');
}

if(!function_exists('stockholm_qode_vss_responsive_body_class')) {
    /**
     * Function that adds vertical split slider responsive class to body.
     * @param $classes array of body classes
     * @return array with vertical split slider responsive body class added
     */
    function stockholm_qode_vss_responsive_body_class($classes) {
        global $stockholm_qode_options;

        if(isset($stockholm_qode_options['vss_responsive_advanced']) && $stockholm_qode_options['vss_responsive_advanced'] == 'yes') {
            $classes[] = 'vss_responsive_adv';

            $advanced_width = stockholm_qode_options()->getOptionValue('vss_responsive_advanced_width');

            if( !empty($advanced_width)) {
                $classes[] = "vss_width_" . $advanced_width;
            }

        }

        return $classes;
    }

    add_filter('body_class', 'stockholm_qode_vss_responsive_body_class');
}

if(!function_exists('stockholm_qode_is_mobile_logo_set')) {
    function stockholm_qode_is_mobile_logo_set($classes) {
        global $stockholm_qode_options;

        if( isset($stockholm_qode_options['mobile_logo_image']) && ! empty( $stockholm_qode_options['mobile_logo_image'] ) ) {
            $classes[] = 'qode-mobile-logo-set';
        }

        return $classes;
    }

    add_filter('body_class', 'stockholm_qode_is_mobile_logo_set');
}
