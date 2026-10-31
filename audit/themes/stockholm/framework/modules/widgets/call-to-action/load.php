<?php

require_once QODE_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/call-to-action/call-to-action-widget.php';

if ( ! function_exists( 'stockholm_qode_call_to_action_widget_load' ) ) {
	function stockholm_qode_call_to_action_widget_load( $widgets ) {
		$widgets[] = 'StockholmQodeCallToActionWidget';
		
		return $widgets;
	}
	
	add_filter( 'stockholm_qode_filter_register_widgets', 'stockholm_qode_call_to_action_widget_load' );
}