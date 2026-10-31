<?php
$root = dirname( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) );
if ( file_exists( $root . '/wp-load.php' ) ) {
	require_once( $root . '/wp-load.php' );
} else {
	$root = dirname( dirname( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) ) );
	if ( file_exists( $root . '/wp-load.php' ) ) {
		require_once( $root . '/wp-load.php' );
	}
}
header( "Content-type: text/css; charset=utf-8" );
$stockholm_options = stockholm_qode_return_global_options();
?>
@media only screen and (max-width: 1000px){
<?php if ( ! empty( $stockholm_options['header_background_color'] ) ) { ?>
	.header_bottom {
	background-color: <?php echo esc_attr( $stockholm_options['header_background_color'] ); ?>;
	}
<?php } ?>
<?php if ( ! empty( $stockholm_options['mobile_background_color'] ) ) { ?>
	.header_bottom,
	nav.mobile_menu{
	background-color: <?php echo esc_attr( $stockholm_options['mobile_background_color'] ); ?> !important;
	}
<?php } ?>
<?php if ( ! empty( $stockholm_options['vertical_mobile_background_color'] ) ) { ?>
	.header_bottom,
	nav.mobile_menu{
	background-color: <?php echo esc_attr( $stockholm_options['vertical_mobile_background_color'] ); ?> !important;
	}
<?php } ?>
}
@media only screen and (min-width: 480px) and (max-width: 768px){

<?php if ( isset( $stockholm_options['parallax_minheight'] ) && ! empty( $stockholm_options['parallax_minheight'] ) ) { ?>
	section.parallax_section_holder{
	height: auto !important;
	min-height: <?php echo intval( $stockholm_options['parallax_minheight'] ); ?>px;
	}
<?php } ?>

<?php if ( isset( $stockholm_options['header_background_color_mobile'] ) && ! empty( $stockholm_options['header_background_color_mobile'] ) ) { ?>
	header{
	background-color: <?php echo esc_attr( $stockholm_options['header_background_color_mobile'] ); ?> !important;
	background-image:none;
	}
<?php } ?>
}

@media only screen and (max-width: 768px){
<?php if ((isset($stockholm_options['h1_fontsize_tablet']) && $stockholm_options['h1_fontsize_tablet'] !== '') || (isset($stockholm_options['h1_lineheight_tablet']) && $stockholm_options['h1_lineheight_tablet'] !== '') || (isset($stockholm_options['h1_letterspacing_tablet']) && $stockholm_options['h1_letterspacing_tablet'] !== '')) { ?>
    h1,
	h1 a {
	<?php if (isset($stockholm_options['h1_fontsize_tablet']) && $stockholm_options['h1_fontsize_tablet'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h1_fontsize_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h1_lineheight_tablet']) && $stockholm_options['h1_lineheight_tablet'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h1_lineheight_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h1_letterspacing_tablet']) && $stockholm_options['h1_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h1_letterspacing_tablet']); ?>px; <?php } ?>
    }
<?php } ?>

<?php if ((isset($stockholm_options['h2_fontsize_tablet']) && $stockholm_options['h2_fontsize_tablet'] !== '') || (isset($stockholm_options['h2_lineheight_tablet']) && $stockholm_options['h2_lineheight_tablet'] !== '') || (isset($stockholm_options['h2_letterspacing_tablet']) && $stockholm_options['h2_letterspacing_tablet'] !== '')) { ?>
    h2,
	h2 a,
	.content .container_inner.default_template_holder h2,
	.content .full_width h2 {
	<?php if (isset($stockholm_options['h2_fontsize_tablet']) && $stockholm_options['h2_fontsize_tablet'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h2_fontsize_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h2_lineheight_tablet']) && $stockholm_options['h2_lineheight_tablet'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h2_lineheight_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h2_letterspacing_tablet']) && $stockholm_options['h2_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h2_letterspacing_tablet']); ?>px; <?php } ?>
    }
<?php } ?>

<?php if ((isset($stockholm_options['h3_fontsize_tablet']) && $stockholm_options['h3_fontsize_tablet'] !== '') || (isset($stockholm_options['h3_lineheight_tablet']) && $stockholm_options['h3_lineheight_tablet'] !== '') || (isset($stockholm_options['h3_letterspacing_tablet']) && $stockholm_options['h3_letterspacing_tablet'] !== '')) { ?>
    h3, h3 a {
	<?php if (isset($stockholm_options['h3_fontsize_tablet']) && $stockholm_options['h3_fontsize_tablet'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h3_fontsize_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h3_lineheight_tablet']) && $stockholm_options['h3_lineheight_tablet'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h3_lineheight_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h3_letterspacing_tablet']) && $stockholm_options['h3_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h3_letterspacing_tablet']); ?>px; <?php } ?>
    }
<?php } ?>

<?php if ((isset($stockholm_options['h4_fontsize_tablet']) && $stockholm_options['h4_fontsize_tablet'] !== '') || (isset($stockholm_options['h4_lineheight_tablet']) && $stockholm_options['h4_lineheight_tablet'] !== '') || (isset($stockholm_options['h4_letterspacing_tablet']) && $stockholm_options['h4_letterspacing_tablet'] !== '')) { ?>
    h4, h4 a {
	<?php if (isset($stockholm_options['h4_fontsize_tablet']) && $stockholm_options['h4_fontsize_tablet'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h4_fontsize_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h4_lineheight_tablet']) && $stockholm_options['h4_lineheight_tablet'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h4_lineheight_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h4_letterspacing_tablet']) && $stockholm_options['h4_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h4_letterspacing_tablet']); ?>px; <?php } ?>
    }
<?php } ?>

<?php if ((isset($stockholm_options['h5_fontsize_tablet']) && $stockholm_options['h5_fontsize_tablet'] !== '') || (isset($stockholm_options['h5_lineheight_tablet']) && $stockholm_options['h5_lineheight_tablet'] !== '') || (isset($stockholm_options['h5_letterspacing_tablet']) && $stockholm_options['h5_letterspacing_tablet'] !== '')) { ?>
    h5, h5 a {
	<?php if (isset($stockholm_options['h5_fontsize_tablet']) && $stockholm_options['h5_fontsize_tablet'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h5_fontsize_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h5_lineheight_tablet']) && $stockholm_options['h5_lineheight_tablet'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h5_lineheight_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h5_letterspacing_tablet']) && $stockholm_options['h5_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h5_letterspacing_tablet']); ?>px; <?php } ?>
    }
<?php } ?>

<?php if ((isset($stockholm_options['h6_fontsize_tablet']) && $stockholm_options['h6_fontsize_tablet'] !== '') || (isset($stockholm_options['h6_lineheight_tablet']) && $stockholm_options['h6_lineheight_tablet'] !== '') || (isset($stockholm_options['h6_letterspacing_tablet']) && $stockholm_options['h6_letterspacing_tablet'] !== '')) { ?>
    h6, h6 a {
	<?php if (isset($stockholm_options['h6_fontsize_tablet']) && $stockholm_options['h6_fontsize_tablet'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h6_fontsize_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h6_lineheight_tablet']) && $stockholm_options['h6_lineheight_tablet'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h6_lineheight_tablet']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h6_letterspacing_tablet']) && $stockholm_options['h6_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h6_letterspacing_tablet']); ?>px; <?php } ?>
    }
<?php } ?>

}
@media only screen and (max-width: 600px) {
<?php if ((isset($stockholm_options['h1_fontsize_mobile']) && $stockholm_options['h1_fontsize_mobile'] !== '') || (isset($stockholm_options['h1_lineheight_mobile']) && $stockholm_options['h1_lineheight_mobile'] !== '') || (isset($stockholm_options['h1_letterspacing_mobile']) && $stockholm_options['h1_letterspacing_mobile'] !== '')) { ?>
    h1, h1 a {
	<?php if (isset($stockholm_options['h1_fontsize_mobile']) && $stockholm_options['h1_fontsize_mobile'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h1_fontsize_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h1_lineheight_mobile']) && $stockholm_options['h1_lineheight_mobile'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h1_lineheight_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h1_letterspacing_mobile']) && $stockholm_options['h1_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h1_letterspacing_mobile']); ?>px; <?php } ?>
    }
<?php } ?>

<?php if ((isset($stockholm_options['h2_fontsize_mobile']) && $stockholm_options['h2_fontsize_mobile'] !== '') || (isset($stockholm_options['h2_lineheight_mobile']) && $stockholm_options['h2_lineheight_mobile'] !== '') || (isset($stockholm_options['h2_letterspacing_mobile']) && $stockholm_options['h2_letterspacing_mobile'] !== '')) { ?>
    h2, h2 a,
	.content .container_inner.default_template_holder h2,
	.content .full_width h2 {
	<?php if (isset($stockholm_options['h2_fontsize_mobile']) && $stockholm_options['h2_fontsize_mobile'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h2_fontsize_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h2_lineheight_mobile']) && $stockholm_options['h2_lineheight_mobile'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h2_lineheight_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h2_letterspacing_mobile']) && $stockholm_options['h2_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h2_letterspacing_mobile']); ?>px; <?php } ?>
    }
<?php } ?>

<?php if ((isset($stockholm_options['h3_fontsize_mobile']) && $stockholm_options['h3_fontsize_mobile'] !== '') || (isset($stockholm_options['h3_lineheight_mobile']) && $stockholm_options['h3_lineheight_mobile'] !== '') || (isset($stockholm_options['h3_letterspacing_mobile']) && $stockholm_options['h3_letterspacing_mobile'] !== '')) { ?>
    h3, h3 a {
	<?php if (isset($stockholm_options['h3_fontsize_mobile']) && $stockholm_options['h3_fontsize_mobile'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h3_fontsize_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h3_lineheight_mobile']) && $stockholm_options['h3_lineheight_mobile'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h3_lineheight_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h3_letterspacing_mobile']) && $stockholm_options['h3_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h3_letterspacing_mobile']); ?>px; <?php } ?>
    }
<?php } ?>

<?php if ((isset($stockholm_options['h4_fontsize_mobile']) && $stockholm_options['h4_fontsize_mobile'] !== '') || (isset($stockholm_options['h4_lineheight_mobile']) && $stockholm_options['h4_lineheight_mobile'] !== '') || (isset($stockholm_options['h4_letterspacing_mobile']) && $stockholm_options['h4_letterspacing_mobile'] !== '')) { ?>
    h4, h4 a {
	<?php if (isset($stockholm_options['h4_fontsize_mobile']) && $stockholm_options['h4_fontsize_mobile'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h4_fontsize_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h4_lineheight_mobile']) && $stockholm_options['h4_lineheight_mobile'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h4_lineheight_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h4_letterspacing_mobile']) && $stockholm_options['h4_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h4_letterspacing_mobile']); ?>px; <?php } ?>
    }
<?php } ?>

<?php if ((isset($stockholm_options['h5_fontsize_mobile']) && $stockholm_options['h5_fontsize_mobile'] !== '') || (isset($stockholm_options['h5_lineheight_mobile']) && $stockholm_options['h5_lineheight_mobile'] !== '') || (isset($stockholm_options['h5_letterspacing_mobile']) && $stockholm_options['h5_letterspacing_mobile'] !== '')) { ?>
    h5, h5 a {
	<?php if (isset($stockholm_options['h5_fontsize_mobile']) && $stockholm_options['h5_fontsize_mobile'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h5_fontsize_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h5_lineheight_mobile']) && $stockholm_options['h5_lineheight_mobile'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h5_lineheight_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h5_letterspacing_mobile']) && $stockholm_options['h5_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h5_letterspacing_mobile']); ?>px; <?php } ?>
    }
<?php } ?>

<?php if ((isset($stockholm_options['h6_fontsize_mobile']) && $stockholm_options['h6_fontsize_mobile'] !== '') || (isset($stockholm_options['h6_lineheight_mobile']) && $stockholm_options['h6_lineheight_mobile'] !== '') || (isset($stockholm_options['h6_letterspacing_mobile']) && $stockholm_options['h6_letterspacing_mobile'] !== '')) { ?>
    h6, h6 a {
	<?php if (isset($stockholm_options['h6_fontsize_mobile']) && $stockholm_options['h6_fontsize_mobile'] !== '') { ?>font-size: <?php echo intval($stockholm_options['h6_fontsize_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h6_lineheight_mobile']) && $stockholm_options['h6_lineheight_mobile'] !== '') { ?>line-height: <?php echo intval($stockholm_options['h6_lineheight_mobile']); ?>px; <?php } ?>
	<?php if (isset($stockholm_options['h6_letterspacing_mobile']) && $stockholm_options['h6_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo intval($stockholm_options['h6_letterspacing_mobile']); ?>px; <?php } ?>
    }
<?php } ?>
}
@media only screen and (max-width: 480px){

<?php if ( isset( $stockholm_options['parallax_minheight'] ) && ! empty( $stockholm_options['parallax_minheight'] ) ) { ?>
	section.parallax_section_holder{
	height: auto !important;
	min-height: <?php echo intval( $stockholm_options['parallax_minheight'] ); ?>px;
	}
<?php } ?>

<?php if ( isset( $stockholm_options['header_background_color_mobile'] ) && ! empty( $stockholm_options['header_background_color_mobile'] ) ) { ?>
	header{
	background-color: <?php echo esc_attr( $stockholm_options['header_background_color_mobile'] ); ?> !important;
	background-image:none;
	}
<?php } ?>
}