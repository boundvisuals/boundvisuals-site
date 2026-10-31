<?php

if ( ! function_exists( 'stockholm_qode_add_product_list_shortcode' ) ) {
	function stockholm_qode_add_product_list_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'Stockholm\Shortcodes\ProductListElegant\ProductListElegant',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'stockholm_qode_filter_add_vc_shortcode', 'stockholm_qode_add_product_list_shortcode' );
}

if ( ! function_exists( 'stockholm_qode_if_quicklook_or_wishlist_are_installed_class' ) ) {
	function stockholm_qode_if_quicklook_or_wishlist_are_installed_class() {
		if ( stockholm_qode_is_yith_wcqv_install() || stockholm_qode_is_yith_wcwl_install() ) {
			echo 'qode-has-additional-info';
		}
	}
}