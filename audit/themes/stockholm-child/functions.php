<?php

/*** Child Theme Function  ***/

if ( ! function_exists( 'stockholm_qode_child_theme_enqueue_scripts' ) ) {
	function stockholm_qode_child_theme_enqueue_scripts() {
		$parent_style = 'stockholm-default-style';
		
		wp_enqueue_style( 'stockholm-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'stockholm_qode_child_theme_enqueue_scripts' );
}