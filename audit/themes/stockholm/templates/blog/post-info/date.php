<?php
$is_enabled = true;

if ( stockholm_qode_options()->getOptionValue( 'blog_single_hide_date' ) == "yes" && is_singular( 'post' ) ) {
	$is_enabled = false;
}

if ( isset( $enable_date ) && $enable_date ) {
	$is_enabled = $enable_date;
}

if ( $is_enabled ) {
	$holder_tag = isset( $holder_tag ) && ! empty( $holder_tag ) ? $holder_tag : 'span';
	?>
	<<?php echo esc_attr( $holder_tag ); ?> class="time">
		<span><?php the_time( get_option( 'date_format' ) ); ?></span>
	</<?php echo esc_attr( $holder_tag ); ?>>
<?php } ?>