<?php

if ( ! function_exists( 'stockholm_qode_is_top_header_enabled' ) ) {
	function stockholm_qode_is_top_header_enabled() {
		$display_header_top = "yes";
		$header_top_area    = stockholm_qode_options()->getOptionValue( 'header_top_area' );
		
		if ( ! empty( $header_top_area ) ) {
			$display_header_top = $header_top_area;
		}
		if ( ! empty( $_SESSION['qode_stockholm_header_top'] ) ) {
			$display_header_top = $_SESSION['qode_stockholm_header_top'];
		}
		
		return $display_header_top === 'yes';
	}
}

if ( ! function_exists( 'stockholm_qode_return_top_header_height' ) ) {
	function stockholm_qode_return_top_header_height() {
		return stockholm_qode_is_top_header_enabled() ? 33 : 0;
	}
}