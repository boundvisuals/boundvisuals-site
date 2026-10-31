<?php

if ( ! function_exists( 'stockholm_qode_meta_boxes_map_init' ) ) {
	function stockholm_qode_meta_boxes_map_init() {
		
		do_action( 'stockholm_qode_action_before_meta_boxes_map' );
		
		require_once( QODE_ROOT_DIR . '/framework/admin/meta-boxes/page/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/meta-boxes/portfolio/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/meta-boxes/slides/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/meta-boxes/post/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/meta-boxes/testimonials/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/meta-boxes/carousels/map.php' );
		
		do_action( 'stockholm_qode_action_meta_boxes_map' );
	}
	
	add_action( 'init', 'stockholm_qode_meta_boxes_map_init' );
}