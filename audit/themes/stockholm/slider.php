<?php
$stockholm_revslider = get_post_meta( stockholm_qode_get_page_id(), "qode_revolution-slider", true );

if ( ! empty( $stockholm_revslider ) && ! is_page_template( 'full_screen.php' ) ) { ?>
	<div class="q_slider">
		<div class="q_slider_inner">
			<?php echo do_shortcode( $stockholm_revslider ); ?>
		</div>
	</div>
	<?php
}
?>