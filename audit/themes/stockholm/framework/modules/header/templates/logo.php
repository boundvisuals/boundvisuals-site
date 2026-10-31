<?php
if ( stockholm_qode_options()->getOptionValue( 'logo_image_sticky' ) !== "" ) {
	$logo_image_sticky = stockholm_qode_options()->getOptionValue( 'logo_image_sticky' ) ;
} else {
	$logo_image_sticky = get_template_directory_uri() . '/img/logo_black.png';
}
?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	<?php get_template_part( 'framework/modules/header/templates/logo', 'default' ); ?>
	
	<img class="sticky" src="<?php echo esc_url( $logo_image_sticky ); ?>" alt="<?php esc_attr_e( 'Logo', 'stockholm' ); ?>"/>
	
	<?php do_action( 'stockholm_qode_action_additional_logo_image' ); ?>
</a>