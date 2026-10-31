<?php if ( stockholm_qode_is_author_info_enabled() ) { ?>
	<span class="post_author">
		<span><?php esc_html_e( 'By', 'stockholm' ); ?></span>
        <span><?php the_author_meta( 'display_name' ); ?></span>
	</span>
<?php } ?>