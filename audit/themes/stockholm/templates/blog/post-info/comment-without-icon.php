<?php if ( stockholm_qode_is_comments_enabled() ) { ?>
	<div class="post_comments">
		<a class="post_comments" href="<?php comments_link(); ?>">
			<span><?php comments_number( esc_html__( 'No Comments', 'stockholm' ), esc_html__( '1 Comment', 'stockholm' ), esc_html__( '% Comments', 'stockholm' ) ); ?></span>
		</a>
	</div>
<?php } ?>