<div class="post_title">
	<h3 class="qodef-post-title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php echo get_post_meta( get_the_ID(), "quote_format", true ); ?><span class="quote_author">&mdash; <?php the_title(); ?></span>
		</a>
	</h3>
</div>