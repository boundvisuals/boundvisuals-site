<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	
	<?php do_action( 'stockholm_qode_action_header_meta' ); ?>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php
	/*
	 * @hooked stockholm_qode_include_preloader
	 * @hooked stockholm_qode_include_sidearea
	 */

	// Hook to include default WordPress hook after body tag open
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	do_action( 'stockholm_qode_action_before_page_wrapper' ); ?>
	<div class="wrapper">
		<div class="wrapper_inner">
			<?php
			/*
			 * @hooked stockholm_qode_include_vertical_header_area
			 * @hooked stockholm_qode_include_popup_area
			 * @hooked stockholm_qode_include_popup_subscribe_area
			 * @hooked stockholm_qode_include_fullscreen_search_area
			 * @hooked stockholm_qode_include_paspartu_area
			 * @hooked stockholm_qode_include_back_to_top
			 */
			do_action( 'stockholm_qode_action_before_page_header' );
			
			get_template_part( 'framework/modules/header/templates/header-area' );
			?>
			
			<div class="<?php echo esc_attr( apply_filters( 'stockholm_qode_filter_content_classes', 'content' ) ); ?>">
				<?php do_action( 'stockholm_qode_action_after_content' ); ?>
				
				<div class="<?php echo esc_attr( apply_filters( 'stockholm_qode_filter_content_inner_classes', 'content_inner' ) ); ?>">
					<?php do_action( 'stockholm_qode_action_after_content_inner' ); ?>
					
					<?php get_template_part( 'title' ); ?>
					<?php get_template_part( 'slider' ); ?>