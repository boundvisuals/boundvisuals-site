<?php
/**
 * Pages (Info, Get my budget, Privacy…). Pages built with Elementor keep rendering through
 * Elementor until they are rebuilt; plain pages get the theme's own typography.
 */
get_header();
the_post();
$elementor = get_post_meta(get_the_ID(), '_elementor_edit_mode', true) === 'builder';
?>
<article class="page <?php echo $elementor ? 'page-builder' : 'page-plain'; ?>">
	<?php if (!$elementor) : ?><h1 class="page-title"><?php the_title(); ?></h1><?php endif; ?>
	<div class="page-content"><?php the_content(); ?></div>
</article>
<?php get_footer(); ?>
