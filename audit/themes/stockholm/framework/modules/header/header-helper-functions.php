<?php

if ( ! function_exists( 'stockholm_qode_get_header_in_grid' ) ) {
	function stockholm_qode_get_header_in_grid() {
		return stockholm_qode_options()->getOptionValue( 'header_in_grid' ) !== "no";
	}
}

if ( ! function_exists( 'stockholm_qode_get_header_style_class' ) ) {
	function stockholm_qode_get_header_style_class() {
		$page_id      = stockholm_qode_get_page_id();
		$header_style = stockholm_qode_options()->getOptionValue( 'header_style' );
		
		$class = '';
		if ( get_post_meta( $page_id, "qode_header-style", true ) != "" ) {
			$class = get_post_meta( $page_id, "qode_header-style", true );
		} else if ( ! empty( $header_style ) ) {
			$class = $header_style;
		}
		
		return $class;
	}
}

if ( ! function_exists( 'stockholm_qode_get_header_bottom_appearance' ) ) {
	function stockholm_qode_get_header_bottom_appearance() {
		$header_bottom_appearance = stockholm_qode_options()->getOptionValue( 'header_bottom_appearance' );
		
		return ! empty( $header_bottom_appearance ) ? esc_attr( $header_bottom_appearance ) : 'fixed';
	}
}

if ( ! function_exists( 'stockholm_qode_get_header_button_size' ) ) {
	function stockholm_qode_get_header_button_size() {
		$header_buttons_size = stockholm_qode_options()->getOptionValue( 'header_buttons_size' );
		
		return ! empty( $header_buttons_size ) ? esc_attr( $header_buttons_size ) : '';
	}
}

if ( ! function_exists( 'stockholm_qode_header_classes' ) ) {
	/**
	 * Function that acts like filter for header classes based on theme settings
	 *
	 * @param array array of classes to add to header tag
	 *
	 * @return string
	 */
	function stockholm_qode_header_classes() {
		$classes = apply_filters( 'stockholm_qode_filter_header_classes', $classes = array() );
		
		if ( is_array( $classes ) && count( $classes ) ) {
			echo implode( ' ', $classes );
		}
	}
}

if ( ! function_exists( 'stockholm_qode_transparent_header_class' ) ) {
	/**
	 * Function that adds transparency class to header based on page or theme options
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added transparent class
	 *
	 * @see stockholm_qode_is_archive_page()
	 */
	function stockholm_qode_transparent_header_class( $classes ) {
		$page_id = stockholm_qode_get_page_id();
		
		$transparent_values_array = array( '0.00', '0' );
		$is_archive               = stockholm_qode_is_archive_page();
		
		//is header transparent set on current page?
		$transparent_header = '1';
		if ( ! $is_archive && get_post_meta( $page_id, "qode_header_color_transparency_per_page", true ) !== "" ) {
			//take value set for current page
			$transparent_header = get_post_meta( $page_id, "qode_header_color_transparency_per_page", true );
		} elseif ( stockholm_qode_options()->getOptionValue( 'header_background_transparency_initial' ) ) {
			//take value set in global options
			$transparent_header = stockholm_qode_options()->getOptionValue( 'header_background_transparency_initial' );
		}
		
		//is header completely transparent?
		$is_header_transparent = in_array( $transparent_header, $transparent_values_array );
		if ( $is_header_transparent ) {
			$classes[] = 'transparent';
		}
		
		//is header transparent on scrolled window?
		if ( stockholm_qode_get_header_bottom_appearance() !== 'regular' && ! in_array( stockholm_qode_options()->getOptionValue( 'header_background_transparency_sticky' ), $transparent_values_array ) || ! in_array( stockholm_qode_options()->getOptionValue( 'header_background_transparency_scroll' ), $transparent_values_array ) ) {
			$classes[] = 'scrolled_not_transparent';
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_header_classes', 'stockholm_qode_transparent_header_class' );
}

if ( ! function_exists( 'stockholm_qode_with_border_header_class' ) ) {
	/**
	 * Function that adds border class on header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added border class
	 */
	function stockholm_qode_with_border_header_class( $classes ) {
		if ( stockholm_qode_options()->getOptionValue( 'header_bottom_border_color' ) !== '' ) {
			$classes[] = 'with_border';
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_header_classes', 'stockholm_qode_with_border_header_class' );
}

if ( ! function_exists( 'stockholm_qode_top_header_class' ) ) {
	/**
	 * Function that adds top header class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added top header class
	 */
	function stockholm_qode_top_header_class( $classes ) {
		
		if ( stockholm_qode_is_top_header_enabled() ) {
			$classes[] = 'has_top';
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_header_classes', 'stockholm_qode_top_header_class' );
}

if ( ! function_exists( 'stockholm_qode_has_woocommerce_dropdown_class' ) ) {
	/**
	 * Function that adds woocommerce dropdown class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added woocommerce dropdown class
	 *
	 * @see stockholm_qode_is_woocommerce_installed()
	 */
	function stockholm_qode_has_woocommerce_dropdown_class( $classes ) {
		if ( is_active_sidebar( 'woocommerce_dropdown' ) && stockholm_qode_is_woocommerce_installed() ) {
			$classes[] = 'has_woocommerce_dropdown ';
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_header_classes', 'stockholm_qode_has_woocommerce_dropdown_class' );
}

if ( ! function_exists( 'stockholm_qode_scroll_top_header_class' ) ) {
	/**
	 * Function that adds top header scroll class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added top header scroll class
	 */
	function stockholm_qode_scroll_top_header_class( $classes ) {
		
		$header_top_area_scroll = "no";
		if ( stockholm_qode_options()->getOptionValue( 'header_top_area_scroll' ) ) {
			$header_top_area_scroll = stockholm_qode_options()->getOptionValue( 'header_top_area_scroll' );
		}
		
		if ( $header_top_area_scroll == 'yes' ) {
			$classes[] = 'scroll_top';
		}
		
		if ( stockholm_qode_options()->getOptionValue( 'header_top_area_scroll' ) == 'no' && stockholm_qode_is_top_header_enabled() ) {
			$classes[] = 'scroll_header_top_area';
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_header_classes', 'stockholm_qode_scroll_top_header_class' );
}

if ( ! function_exists( 'stockholm_qode_center_logo_class' ) ) {
	/**
	 * Function that adds center logo class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added center logo class
	 */
	function stockholm_qode_center_logo_class( $classes ) {
		
		if ( stockholm_qode_options()->getOptionValue( 'center_logo_image' ) == 'yes' || stockholm_qode_get_header_bottom_appearance() == "fixed_hiding" ) {
			$classes[] = 'centered_logo';
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_header_classes', 'stockholm_qode_center_logo_class' );
}

if ( ! function_exists( 'stockholm_qode_center_logo_animate_class' ) ) {
	/**
	 * Function that adds center logo animate class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added center logo animate class
	 */
	function stockholm_qode_center_logo_animate_class( $classes ) {
		
		if ( stockholm_qode_options()->getOptionValue( 'center_logo_image_animate' ) == 'yes' || stockholm_qode_get_header_bottom_appearance() == "fixed_hiding" ) {
			$classes[] = 'centered_logo_animate';
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_header_classes', 'stockholm_qode_center_logo_animate_class' );
}

if ( ! function_exists( 'stockholm_qode_header_fixed_right_class' ) ) {
	/**
	 * Function that adds fixed header class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added fixed header class
	 */
	function stockholm_qode_header_fixed_right_class( $classes ) {
		if ( is_active_sidebar( 'header_fixed_right' ) ) {
			$classes[] = 'has_header_fixed_right';
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_header_classes', 'stockholm_qode_header_fixed_right_class' );
}

if ( ! function_exists( 'stockholm_qode_header_style_class' ) ) {
	/**
	 * Function that adds header style class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added header style class
	 */
	function stockholm_qode_header_style_class( $classes ) {
		$classes[] = stockholm_qode_get_header_style_class();
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_header_classes', 'stockholm_qode_header_style_class' );
}

if ( ! function_exists( 'stockholm_qode_header_class_first_level_bg_color' ) ) {
	/**
	 * Function that adds first level menu background color class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added first level menu background color class
	 */
	function stockholm_qode_header_class_first_level_bg_color( $classes ) {
		
		if ( stockholm_qode_options()->getOptionValue( 'menu_hover_background_color' ) !== '' ) {
			$classes[] = 'with_hover_bg_color';
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_header_classes', 'stockholm_qode_header_class_first_level_bg_color' );
}

if ( ! function_exists( 'stockholm_qode_header_bottom_appearance_class' ) ) {
	/**
	 * Function that adds bottom header appearance class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added bottom header appearance class
	 */
	function stockholm_qode_header_bottom_appearance_class( $classes ) {
		$stockholm_options = stockholm_qode_return_global_options();
		
		if ( isset( $_SESSION['qode_stockholm_header_type'] ) && $_SESSION['qode_stockholm_header_type'] == "big" ) {
			$stockholm_options["header_bottom_appearance"] = "stick menu_bottom";
		}
		
		$classes[] = stockholm_qode_get_header_bottom_appearance();
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_header_classes', 'stockholm_qode_header_bottom_appearance_class' );
}

if ( ! function_exists( 'stockholm_qode_get_vertical_area_classes' ) ) {
	function stockholm_qode_get_vertical_area_classes() {

		$vertical_alignment = stockholm_qode_get_meta_field_intersect( 'vertical_area_vertical_alignment', stockholm_qode_get_page_id());

		$class = '';
		if ( ! empty( $vertical_alignment ) ) {
			$class = 'qode-vetical-area-vertical-align-'.$vertical_alignment;
		}

		return $class;
	}
}