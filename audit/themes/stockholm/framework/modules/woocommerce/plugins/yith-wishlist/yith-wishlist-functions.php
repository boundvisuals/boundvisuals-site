<?php

if ( ! function_exists( 'stockholm_qode_is_yith_wishlist_installed' ) ) {
	function stockholm_qode_is_yith_wishlist_installed() {
		return defined( 'YITH_WCWL' );
	}
}

if ( ! function_exists( 'stockholm_qode_woocommerce_wishlist_shortcode' ) ) {
	function stockholm_qode_woocommerce_wishlist_shortcode() {
		
		if ( stockholm_qode_is_yith_wishlist_installed() ) {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
		}
	}
}

if ( ! function_exists( 'stockholm_qode_product_ajax_wishlist' ) ) {
	function stockholm_qode_product_ajax_wishlist() {
		check_ajax_referer( 'qodef_product_wishlist_nonce_' . sanitize_text_field( $_POST['product_wishlist_id'] ), 'product_wishlist_nonce' );
		
		$data = array(
			'wishlist_count_products' => class_exists( 'YITH_WCWL' ) ? yith_wcwl_count_products() : 0
		);
		
		wp_send_json( $data );
		exit;
	}
	
	add_action( 'wp_ajax_stockholm_qode_action_product_ajax_wishlist', 'stockholm_qode_product_ajax_wishlist' );
	add_action( 'wp_ajax_nopriv_stockholm_qode_action_product_ajax_wishlist', 'stockholm_qode_product_ajax_wishlist' );
}

if ( ! function_exists( 'stockholm_qode_register_yith_wishlist_widget' ) ) {
	function stockholm_qode_register_yith_wishlist_widget( $widgets ) {
		$widgets[] = 'StockholmQodeYithWishlist';
		
		return $widgets;
	}
	
	add_filter( 'stockholm_qode_filter_register_widgets', 'stockholm_qode_register_yith_wishlist_widget' );
}