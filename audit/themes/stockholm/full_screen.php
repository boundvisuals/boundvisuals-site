<?php
/*
Template Name: Full Screen Sections
*/

get_header(); ?>
<div class="full_screen_preloader">
	<div class="ajax_loader">
		<div class="ajax_loader_1"><?php echo stockholm_qode_loading_spinners( true ); ?></div>
	</div>
</div>
<div class="full_screen_holder" <?php stockholm_qode_inline_page_background_style( true ); ?>>
	<div class="full_screen_navigation_holder up_arrow">
		<div class="full_screen_navigation_inner"><a id="up_fs_button" href="#"><span class='arrow_carrot-up'></span></a></div>
	</div>
	<div class="full_screen_inner" <?php stockholm_qode_inline_page_padding_style(); ?>>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
	</div>
	<div class="full_screen_navigation_holder down_arrow">
		<div class="full_screen_navigation_inner"><a id="down_fs_button" href="#"><span class='arrow_carrot-down'></span></a></div>
	</div>
</div>
<?php get_footer(); ?>