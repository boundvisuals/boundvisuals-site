<?php

class StockholmQodeWoocommerceDropdownCart extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'woocommerce-dropdown-cart', // Base ID
			esc_html__( 'Stockholm WooCommerce Dropdown Cart', 'stockholm' ), // Name
			array( 'description' => esc_html__( 'Display a shop cart icon with a dropdown that shows products that are in the cart', 'stockholm' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		echo wp_kses_post( $before_widget );
        ?>
		<div class="shopping_cart_outer">
            <div class="shopping_cart_inner">
                <div class="shopping_cart_header">
		            <?php echo stockholm_qode_get_module_template_part('widgets/templates/dropdown-cart-content','woocommerce'); ?>
                </div>
            </div>
        </div>
        <?php
		echo wp_kses_post( $after_widget );
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		return $instance;
	}
}

if ( ! function_exists( 'stockholm_qode_woocommerc_dropdown_cart_widget_load' ) ) {
	function stockholm_qode_woocommerc_dropdown_cart_widget_load( $widgets ) {
		$widgets[] = 'StockholmQodeWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'stockholm_qode_filter_register_widgets', 'stockholm_qode_woocommerc_dropdown_cart_widget_load' );
}

if ( ! function_exists( 'stockholm_qode_woocommerce_add_to_cart_fragment' ) ) {
	function stockholm_qode_woocommerce_add_to_cart_fragment($fragments){
		ob_start();
		?>
        <div class="shopping_cart_header">
			<?php stockholm_qode_get_module_template_part('widgets/templates/dropdown-cart-content','woocommerce'); ?>
        </div>
		<?php
		$fragments['div.shopping_cart_header'] = ob_get_clean();

		return $fragments;
	}
	add_filter('woocommerce_add_to_cart_fragments', 'stockholm_qode_woocommerce_add_to_cart_fragment');
}
?>