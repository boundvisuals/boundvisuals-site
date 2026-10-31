<?php
$title_tag    = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h2';
$title_text   = isset( $post_format ) && $post_format === 'quote' ? get_post_meta( get_the_ID(), "quote_format", true ) : get_the_title();
$has_date     = isset( $has_date ) && $has_date;
$disable_link = ( isset( $disable_link ) && $disable_link ) || is_singular( 'post' );
?>
<<?php echo esc_attr( $title_tag ); ?> class="qodef-post-title">
	<?php if ( $has_date ) {
		get_template_part( 'templates/blog/post-info/date' );
	} ?>
	<?php echo sprintf( '%s %s %s', ! $disable_link ? '<a href="' . get_the_permalink() . '">' : '<span>', wp_kses_post( $title_text ), ! $disable_link ? '</a>' : '</span>' ); ?>
</<?php echo esc_attr( $title_tag ); ?>>