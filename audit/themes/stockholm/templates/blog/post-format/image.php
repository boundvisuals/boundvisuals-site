<?php if ( has_post_thumbnail() ) { ?>
	<div class="post_image">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail( 'blog_image_in_grid' ); ?>
		</a>
	</div>
<?php } ?>