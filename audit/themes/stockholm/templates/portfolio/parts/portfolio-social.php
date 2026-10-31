<?php if ( stockholm_qode_is_social_share_enabled() ) {
	//check social share style
	$social_type = 'circle';
	if ( stockholm_qode_options()->getOptionValue( 'portfolio_social_share_type' ) != "" ) {
		$social_type = stockholm_qode_options()->getOptionValue( 'portfolio_social_share_type' ) ;
	}
	?>
	<div class="portfolio_social_holder">
		<?php echo do_shortcode( '[social_share_list list_type=' . esc_attr( $social_type ) . ']' ); ?>
	</div>
<?php } ?>