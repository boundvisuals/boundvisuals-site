<?php

if ( ! function_exists( 'stockholm_qode_is_paspartu_enabled' ) ) {
	function stockholm_qode_is_paspartu_enabled() {
		return stockholm_qode_options()->getOptionValue( 'paspartu' ) == 'yes';
	}
}

if ( ! function_exists( 'stockholm_qode_include_paspartu_area' ) ) {
	function stockholm_qode_include_paspartu_area() {
		
		if ( stockholm_qode_is_paspartu_enabled() ) {
			get_template_part( 'framework/modules/paspartu/templates/paspartu-area' );
		}
	}
	
	add_action( 'stockholm_qode_action_before_page_header', 'stockholm_qode_include_paspartu_area' );
}