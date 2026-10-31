<?php

if ( ! function_exists( 'stockholm_qode_is_search_enabled' ) ) {
	function stockholm_qode_is_search_enabled() {
		return stockholm_qode_options()->getOptionValue( 'enable_search' ) == "yes";
	}
}

if ( ! function_exists( 'stockholm_qode_get_search_type' ) ) {
	function stockholm_qode_get_search_type() {
		$type_meta = stockholm_qode_options()->getOptionValue( 'search_type' );
		
		return ! empty( $type_meta ) ? $type_meta : 'from_window_top';
	}
}

if ( ! function_exists( 'stockholm_qode_include_fullscreen_search_area' ) ) {
	function stockholm_qode_include_fullscreen_search_area() {
		
		if ( stockholm_qode_is_search_enabled() && stockholm_qode_get_search_type() == "fullscreen_search" ) {
			get_template_part( 'framework/modules/search/templates/search-area', 'fullscreen' );
		}
	}
	
	add_action( 'stockholm_qode_action_before_page_header', 'stockholm_qode_include_fullscreen_search_area' );
}

if ( ! function_exists( 'stockholm_qode_search_opener_icon' ) ) {
	function stockholm_qode_search_opener_icon() {
		$icon = stockholm_qode_options()->getOptionValue( 'search_icon_type' );
		
		switch ( $icon ):
			case 'font-elegant':
				$html = '<i class="icon_search"></i>';
				break;
			case 'font-linear':
				$html = '<i class="lnr lnr-magnifier"></i>';
				break;
			default:
				$html = '<i class="fa fa-search"></i>';
				break;
		endswitch;
		
		echo wp_kses_post( $html );
	}
}