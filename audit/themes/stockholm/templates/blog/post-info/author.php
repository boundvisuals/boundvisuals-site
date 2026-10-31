<?php if ( stockholm_qode_is_author_info_enabled() ) {
	$holder_tag = isset( $holder_tag ) && ! empty( $holder_tag ) ? $holder_tag : 'div';
	?>
	<<?php echo esc_attr( $holder_tag ); ?> class="post_author">
		<span><?php esc_html_e( 'By', 'stockholm' ); ?></span>
		<a class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><span><?php the_author_meta( 'display_name' ); ?></span></a>
	</<?php echo esc_attr( $holder_tag ); ?>>
<?php } ?>