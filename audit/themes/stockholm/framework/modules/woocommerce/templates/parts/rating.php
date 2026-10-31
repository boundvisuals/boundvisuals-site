<?php

if ( $display_rating === 'yes' && get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
	$product = stockholm_qode_return_woocommerce_global_variable();
	$average = $product->get_average_rating();
	?>
	<div class="qode-<?php echo esc_attr( $class_name ); ?>-rating-holder">
		<div class="qode-<?php echo esc_attr( $class_name ); ?>-rating" title="<?php echo sprintf( esc_attr__( "Rated %s out of 5", "stockholm" ), $average ); ?>">
			<span style="width: <?php echo floatval( $average / 5 ) * 100 . '%'; ?>"></span>
		</div>
	</div>
<?php } ?>