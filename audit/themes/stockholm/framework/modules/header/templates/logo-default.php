<?php

if ( stockholm_qode_options()->getOptionValue( 'logo_image' ) !== "" ) {
	$logo_image = stockholm_qode_options()->getOptionValue( 'logo_image' ) ;
} else {
	$logo_image = get_template_directory_uri() . '/img/logo.png';
}
if ( stockholm_qode_options()->getOptionValue( 'logo_image_light' ) !== "" ) {
	$logo_image_light = stockholm_qode_options()->getOptionValue( 'logo_image_light' ) ;
} else {
	$logo_image_light = get_template_directory_uri() . '/img/logo.png';
}
if ( stockholm_qode_options()->getOptionValue( 'logo_image_dark' ) !== "" ) {
	$logo_image_dark = stockholm_qode_options()->getOptionValue( 'logo_image_dark' ) ;
} else {
	$logo_image_dark = get_template_directory_uri() . '/img/logo_black.png';
}
if ( stockholm_qode_options()->getOptionValue( 'mobile_logo_image' ) !== "" ) {
    $mobile_logo_image = stockholm_qode_options()->getOptionValue( 'mobile_logo_image' ) ;
}
?>
<img class="normal" src="<?php echo esc_url( $logo_image ); ?>" alt="<?php esc_attr_e( 'Logo', 'stockholm' ); ?>"/>
<img class="light" src="<?php echo esc_url( $logo_image_light ); ?>" alt="<?php esc_attr_e( 'Logo', 'stockholm' ); ?>"/>
<img class="dark" src="<?php echo esc_url( $logo_image_dark ); ?>" alt="<?php esc_attr_e( 'Logo', 'stockholm' ); ?>"/>
<?php if( ! empty( $mobile_logo_image ) ) { ?>
    <img class="mobile-logo" src="<?php echo esc_url( $mobile_logo_image ); ?>" alt="<?php esc_attr_e( 'Logo', 'stockholm' ); ?>"/>
<?php } ?>
