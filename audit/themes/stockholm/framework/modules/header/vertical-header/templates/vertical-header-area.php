<?php
$page_id = stockholm_qode_get_page_id();

$vertical_area_classes = array();
$vertical_area_classes[] = stockholm_qode_get_header_style_class();
$vertical_area_classes[] = stockholm_qode_get_vertical_area_classes();

$vertical_area_styles = array();
if ( get_post_meta( $page_id, "qode_page_vertical_area_background", true ) != "" ) {
	$vertical_area_styles[] = 'background-color: ' . esc_attr( get_post_meta( $page_id, "qode_page_vertical_area_background", true ) );
}

$vertical_area_background_styles = array();
$vertical_area_background_image  = "";
if ( stockholm_qode_options()->getOptionValue( 'vertical_area_background_image' ) != "" ) {
	$vertical_area_background_image = stockholm_qode_options()->getOptionValue( 'vertical_area_background_image' ) ;
}

if ( get_post_meta( $page_id, "qode_page_vertical_area_background_image", true ) != "" ) {
	$vertical_area_background_image = get_post_meta( $page_id, "qode_page_vertical_area_background_image", true );
}

if ( ! empty( $vertical_area_background_image ) ) {
	$vertical_area_background_styles[] = 'background-image: url(' . esc_url( $vertical_area_background_image ) . ')';
}

$vertical_menu_classes = array();
if ( stockholm_qode_options()->getOptionValue( 'vertical_area_dropdown_event' ) == "click_event" ) {
	$vertical_menu_classes[] = "vm_click_event";
} else {
	$vertical_menu_classes[] = "vm_hover_event";
}

$vertical_menu_type = stockholm_qode_options()->getOptionValue('vertical_area_type');
?>
<aside class="vertical_menu_area with_scroll <?php echo esc_attr( implode( ' ', $vertical_area_classes ) ); ?>" <?php stockholm_qode_inline_style( $vertical_area_styles ); ?>>
    <?php if( $vertical_menu_type == 'hidden') { ?>
        <a href="#" class="vertical_menu_hidden_button">
            <span class="vertical_menu_hidden_button_line"></span>
        </a>
    <?php } ?>
	<div class="vertical_area_background" <?php stockholm_qode_inline_style( $vertical_area_background_styles ); ?>></div>
	<div class="vertical_logo_wrapper">
		<div class="q_logo_vertical">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php get_template_part( 'framework/modules/header/templates/logo', 'default' ); ?>
			</a>
		</div>
	</div>
	
	<nav class="vertical_menu dropdown_animation vertical_menu_toggle <?php echo esc_attr( implode( ' ', $vertical_menu_classes ) ); ?>">
		<?php
		wp_nav_menu( array(
			'theme_location'  => 'top-navigation',
			'container'       => '',
			'container_class' => '',
			'menu_class'      => '',
			'menu_id'         => '',
			'fallback_cb'     => 'stokcholm_qode_top_navigation_fallback',
			'link_before'     => '<span>',
			'link_after'      => '</span>',
			'walker'          => new stockholm_qode_type1_walker_nav_menu()
		) );
		?>
	</nav>
	<?php if ( is_active_sidebar( 'vertical_menu_area' ) ) { ?>
		<div class="vertical_menu_area_widget_holder">
			<?php dynamic_sidebar( 'vertical_menu_area' ); ?>
		</div>
	<?php } ?>
</aside>