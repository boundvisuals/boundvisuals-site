<?php get_header(); ?>
<article class="page page-plain">
	<?php if (is_404()) : ?>
		<h1 class="page-title">Page not found</h1>
		<p>This page moved or no longer exists.</p>
		<p><a class="btn" href="<?php echo esc_url(home_url('/')); ?>">See all works</a></p>
	<?php else : ?>
		<?php while (have_posts()) : the_post(); ?>
			<h1 class="page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="page-content"><?php the_excerpt(); ?></div>
		<?php endwhile; ?>
	<?php endif; ?>
</article>
<?php get_footer(); ?>
