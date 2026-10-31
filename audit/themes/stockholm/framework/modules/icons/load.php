<?php

foreach ( glob( QODE_FRAMEWORK_MODULES_ROOT_DIR . '/icons/*/*.php' ) as $module_load ) {
	include_once $module_load;
}

if ( ! function_exists( 'stockholm_qode_enqueue_additional_css_styles' ) ) {
	function stockholm_qode_enqueue_additional_css_styles() {
		$icon_packs = array(
			'font-awesome',
			'elegant-icons',
			'linear-icons',
			'linea-icons',
			'ion-icons'
		);
	
		foreach ( $icon_packs as $icon_pack ) {
			$prefix   = $icon_pack === 'font-awesome' ? 'stockholm-' : '';
			$main_css = $icon_pack === 'font-awesome' ? 'css/' . $icon_pack : 'style';
			
			wp_enqueue_style( $prefix . $icon_pack, QODE_FRAMEWORK_MODULES_ROOT . "/icons/" . $icon_pack . "/" . $main_css . ".min.css" );
		}
	}
	
	add_action( 'stockholm_qode_action_enqueue_before_main_css', 'stockholm_qode_enqueue_additional_css_styles' );
}