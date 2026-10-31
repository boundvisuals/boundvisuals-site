<?php
/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

// Initialising Shortcodes
if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {
	function stockholm_qode_require_vc_extend() {
		if ( stockholm_qode_is_core_installed() && stockholm_qode_is_theme_registered() ) {
			require_once locate_template( '/extendvc/extend-vc.php' );
			
			do_action( 'stockholm_qode_action_vc_map' );
		}
	}
	
	add_action( 'init', 'stockholm_qode_require_vc_extend', 11 );
}
