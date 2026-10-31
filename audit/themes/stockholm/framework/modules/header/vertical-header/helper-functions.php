<?php

if ( ! function_exists( 'stockholm_qode_is_vertical_header_enabled' ) ) {
	function stockholm_qode_is_vertical_header_enabled() {
		return stockholm_qode_options()->getOptionValue( 'vertical_area' ) == 'yes';
	}
}

if ( ! function_exists( 'stockholm_qode_include_vertical_header_area' ) ) {
	function stockholm_qode_include_vertical_header_area() {
		
		if ( stockholm_qode_is_vertical_header_enabled() ) {
			get_template_part( 'framework/modules/header/vertical-header/templates/vertical-header-area' );
		}
	}
	
	add_action( 'stockholm_qode_action_before_page_header', 'stockholm_qode_include_vertical_header_area' );
}