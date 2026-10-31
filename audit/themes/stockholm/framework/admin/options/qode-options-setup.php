<?php

if ( ! function_exists( 'stockholm_qode_admin_map_init' ) ) {
	function stockholm_qode_admin_map_init() {
		
		do_action( 'stockholm_qode_action_before_options_map' );
		
		require_once( QODE_ROOT_DIR . '/framework/admin/options/general/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/logo/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/header/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/footer/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/title/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/fonts/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/elements/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/sidebar/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/blog/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/portfolio/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/slider/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/social/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/error404/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/contact/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/parallax/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/vertical-split-slider/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/contentbottom/map.php' );
		require_once( QODE_ROOT_DIR . '/framework/admin/options/backupoptions/map.php' );
		
		if ( stockholm_qode_visual_composer_installed() && version_compare( stockholm_qode_get_vc_version(), '4.4.2' ) >= 0 ) {
			require_once( QODE_ROOT_DIR . '/framework/admin/options/visualcomposer/map.php' );
		} else {
			stockholm_qode_framework()->qodeOptions->addOption( "enable_grid_elements", "no" );
		}
		
		if ( class_exists( 'GFForms' ) ) {
			require_once( QODE_ROOT_DIR . '/framework/admin/options/gravityforms/map.php' );
		}
		
		require_once( QODE_ROOT_DIR . '/framework/admin/options/reset/map.php' );
		
		do_action( 'stockholm_qode_action_options_map' );
		
		do_action( 'stockholm_qode_action_after_options_map' );
	}
	
	add_action( 'after_setup_theme', 'stockholm_qode_admin_map_init' );
}
