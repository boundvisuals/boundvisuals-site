<?php
if ( ! function_exists( 'stockholm_qode_register_separator_widget' ) ) {
    /**
     * Function that register separator widget
     */
    function stockholm_qode_register_separator_widget( $widgets ) {
        $widgets[] = 'StockholmQodeSeparator';

        return $widgets;
    }

    add_filter( 'stockholm_qode_filter_register_widgets', 'stockholm_qode_register_separator_widget' );
}