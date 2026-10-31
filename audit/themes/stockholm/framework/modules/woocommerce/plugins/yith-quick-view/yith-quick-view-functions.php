<?php

if ( ! function_exists( 'stockholm_qode_woocommerce_quickview_link' ) ) {
	/**
	 * Function that returns quick view link
	 */
	function stockholm_qode_woocommerce_quickview_link() {
		$product = stockholm_qode_return_woocommerce_global_variable();
		
		echo '<div class="qode-yith-wcqv-holder"><a href="#" class="yith-wcqv-button" data-product_id="' . esc_attr( $product->get_id() ) . '"><span>' . esc_html__( 'QUICK LOOK', 'stockholm' ) . '</span></a></div>';
	}
	
	add_action( 'stockholm_qode_action_woocommerce_additional_info', 'stockholm_qode_woocommerce_quickview_link', 1 );
}

if ( ! function_exists( 'stockholm_qode_woocommerce_disable_yith_pretty_photo' ) ) {
	/**
	 * Function that disable YITH Quick View pretty photo style
	 */
	function stockholm_qode_woocommerce_disable_yith_pretty_photo() {
		//is woocommerce installed?
		if ( stockholm_qode_is_woocommerce_installed() && stockholm_qode_is_yith_wcqv_install() ) {
			wp_deregister_style( 'woocommerce_prettyPhoto_css' );
		}
	}
	
	add_action( 'wp_footer', 'stockholm_qode_woocommerce_disable_yith_pretty_photo' );
}

if ( ! function_exists( 'stockholm_qode_woocommerce_yith_template_single_title' ) ) {
	/**
	 * Function for overriding product title template in YITH Quick View plugin template
	 */
	function stockholm_qode_woocommerce_yith_template_single_title() {
		the_title( '<h3  itemprop="name" class="qode-yith-product-title entry-title">', '</h3>' );
	}
}

if ( ! function_exists( 'stockholm_qode_woocommerce_show_product_images' ) ) {
	/**
	 * Function for overriding product images template in YITH Quick View plugin template
	 */
	function stockholm_qode_woocommerce_show_product_images() {
		$product = stockholm_qode_return_woocommerce_global_variable();
		
		$html           = '';
		$attachment_ids = $product->get_gallery_image_ids();
		
		$html        .= '<div class="images qode-quick-view-gallery qode-owl-slider">';
		$image_title = esc_attr( get_the_title( $product->get_id() ) );
		$image_src   = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'woocommerce_single' );
		$html        .= '<div class="item"><img src="' . esc_url( $image_src[0] ) . '" alt="' . esc_attr( $image_title ) . '"></div>';
		if ( $attachment_ids ) {
			foreach ( $attachment_ids as $attachment_id ) {
				$image_link = wp_get_attachment_url( $attachment_id );
				
				if ( $image_link !== '' ) {
					$image_title = esc_attr( get_the_title( $attachment_id ) );
					$image_src   = wp_get_attachment_image_src( $attachment_id, 'woocommerce_single' );
					$html        .= '<div class="item"><img src="' . esc_url( $image_src[0] ) . '" alt="' . esc_attr( $image_title ) . '"></div>';
				}
			}
		}
		
		$html .= '</div>';
		
		echo stockholm_qode_get_module_part( $html );
	}
}

if ( ! function_exists( 'stockholm_qode_add_wishlist_into_wcqv_product_summary' ) ) {
	function stockholm_qode_add_wishlist_into_wcqv_product_summary() {
		echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
	}
	
	add_action('yith_wcqv_product_summary', 'stockholm_qode_add_wishlist_into_wcqv_product_summary', 31 );
}