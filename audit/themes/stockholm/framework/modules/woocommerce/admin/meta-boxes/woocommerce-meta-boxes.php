<?php

if ( ! function_exists( 'stockholm_qode_map_woocommerce_meta' ) ) {
	function stockholm_qode_map_woocommerce_meta() {
		$woocommerce_meta_box = stockholm_qode_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'stockholm' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		stockholm_qode_create_meta_box_field( array(
			'name'        => 'qode_single_product_new_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Enable New Product Mark', 'stockholm' ),
			'description' => esc_html__( 'Enabling this option will show new product mark on your product elegant lists', 'stockholm' ),
			'parent'      => $woocommerce_meta_box,
			'options'     => array(
				'no'  => esc_html__( 'No', 'stockholm' ),
				'yes' => esc_html__( 'Yes', 'stockholm' )
			)
		) );
	}
	
	add_action( 'stockholm_qode_action_meta_boxes_map', 'stockholm_qode_map_woocommerce_meta', 99 );
}