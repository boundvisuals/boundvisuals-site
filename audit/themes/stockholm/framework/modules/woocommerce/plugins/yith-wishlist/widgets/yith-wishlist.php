<?php

class StockholmQodeYithWishlist extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'qode_woocommerce_yith_wishlist',
			esc_html__( 'Stockholm Woocommerce Wishlist', 'stockholm' ),
			array( 'description' => esc_html__( 'Display a wishlist icon with number of products that are in the wishlist', 'stockholm' ) )
		);
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		foreach ( $this->params as $param ) {
			$param_name = $param['name'];
			
			$instance[ $param_name ] = sanitize_text_field( $new_instance[ $param_name ] );
		}
		
		return $instance;
	}
	
	public function widget( $args, $instance ) {
		extract( $args );
		
		global $yith_wcwl;
		$unique_id = rand( 1000, 9999 );
		?>
		<div class="qode-wishlist-widget-holder">
			<a href="<?php echo esc_url( $yith_wcwl->get_wishlist_url() ); ?>" class="qode-wishlist-widget-link">
				<span class="qode-wishlist-widget-icon"><i class="icon_heart_alt"></i></span>
				<span class="qode-wishlist-items-number">(<span><?php echo yith_wcwl_count_products(); ?></span>)</span>
			</a>
			<?php wp_nonce_field( 'qodef_product_wishlist_nonce_' . $unique_id, 'qodef_product_wishlist_nonce_' . $unique_id ); ?>
		</div>
		<?php
	}
}