<?php

if ( ! function_exists( 'stockholm_qode_include_woocommerce_shortcodes' ) ) {
	function stockholm_qode_include_woocommerce_shortcodes() {
		if( stockholm_qode_is_theme_registered() ) {
			foreach ( glob( QODE_FRAMEWORK_MODULES_ROOT_DIR . '/woocommerce/shortcodes/*/load.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
		}
	}
	
	add_action( 'stockholm_qode_action_include_shortcodes_file', 'stockholm_qode_include_woocommerce_shortcodes' );
}
