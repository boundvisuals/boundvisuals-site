<?php if ( stockholm_qode_is_comments_enabled() ) { ?>
	<a class="post_comments" href="<?php comments_link(); ?>">
		<i class="icon_comment" aria-hidden="true"></i>
		<span><?php comments_number( '0', '1', '%' ); ?></span>
	</a>
<?php } ?>