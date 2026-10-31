<?php

require_once QODE_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/popup-opener/popup-opener.php';

if ( ! function_exists( 'stockholm_qode_register_popup_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function stockholm_qode_register_popup_opener_widget( $widgets ) {
		$widgets[] = 'StockholmQodePopupOpener';
		
		return $widgets;
	}
	
	add_filter( 'stockholm_qode_filter_register_widgets', 'stockholm_qode_register_popup_opener_widget' );
}