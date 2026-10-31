<?php
$product = stockholm_qode_return_woocommerce_global_variable();

if ( get_post_meta( $product->get_id(), 'qode_single_product_new_meta', true ) === 'yes' ) { ?>
	<span class="qode-<?php echo esc_attr( $class_name ); ?>-new-product"><?php esc_html_e( 'NEW', 'stockholm' ); ?></span>
<?php } ?>

<?php if ( $product->is_on_sale() && $product->is_in_stock() ) { ?>
	<span class="qode-<?php echo esc_attr( $class_name ); ?>-onsale"><?php echo stockholm_qode_woocommerce_sale_percentage( intval( $product->get_regular_price() ), intval( $product->get_sale_price() ) ); ?></span>
<?php } ?>

<?php if ( ! $product->is_in_stock() ) { ?>
	<span class="qode-<?php echo esc_attr( $class_name ); ?>-out-of-stock"><?php esc_html_e( 'SOLD', 'stockholm' ); ?></span>
<?php }

$product_image_size = 'shop_catalog';
if ( $image_size === 'full' ) {
	$product_image_size = 'full';
} else if ( $image_size === 'square' ) {
	$product_image_size = 'portfolio-square';
} else if ( $image_size === 'landscape' ) {
	$product_image_size = 'portfolio-landscape';
} else if ( $image_size === 'portrait' ) {
	$product_image_size = 'portfolio-portrait';
} else if ( $image_size === 'medium' ) {
	$product_image_size = 'medium';
} else if ( $image_size === 'large' ) {
	$product_image_size = 'large';
} else if ( $image_size === 'woocommerce_thumbnail' ) {
	$product_image_size = 'woocommerce_thumbnail';
}

if ( has_post_thumbnail() ) {
	the_post_thumbnail( apply_filters( 'stockholm_qode_filter_product_list_image_size', $product_image_size ) );
}