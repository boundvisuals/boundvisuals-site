<?php
$is_enabled = true;

if ( stockholm_qode_options()->getOptionValue( 'blog_single_hide_category' ) == "yes" && is_singular( 'post' ) ) {
	$is_enabled = false;
}

if ( $is_enabled ) { ?>
	<span class="post_category">
		<span><?php esc_html_e( 'In', 'stockholm' ); ?></span>
		<span><?php the_category( ', ' ); ?></span>
	</span>
<?php } ?>