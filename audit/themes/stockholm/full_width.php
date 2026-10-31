<?php
/*
Template Name: Full Width
*/

get_header();

$qodef_sidebar = stockholm_qode_get_sidebar_layout( false );
?>
<div class="full_width" <?php stockholm_qode_inline_page_background_style(); ?>>
	<div class="full_width_inner" <?php stockholm_qode_inline_page_padding_style(); ?>>
		<?php if ( ( $qodef_sidebar == "default" ) || ( $qodef_sidebar == "" ) ) : ?>
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
					<?php stockholm_qode_wp_link_pages(); ?>
					<?php stockholm_qode_get_comments_template( true ); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		<?php elseif ( $qodef_sidebar == "1" || $qodef_sidebar == "2" ): ?>
			<?php if ( $qodef_sidebar == "1" ) : ?>
				<div class="two_columns_66_33 clearfix grid2">
					<div class="column1">
			<?php elseif ( $qodef_sidebar == "2" ) : ?>
				<div class="two_columns_75_25 clearfix grid2">
					<div class="column1">
			<?php endif; ?>
						<?php if ( have_posts() ) :
							while ( have_posts() ) : the_post(); ?>
								<div class="column_inner">
									<?php the_content(); ?>
									<?php stockholm_qode_wp_link_pages(); ?>
									<?php stockholm_qode_get_comments_template( true ); ?>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<div class="column2"><?php get_sidebar(); ?></div>
				</div>
			<?php elseif ( $qodef_sidebar == "3" || $qodef_sidebar == "4" ): ?>
				<?php if ( $qodef_sidebar == "3" ) : ?>
					<div class="two_columns_33_66 clearfix grid2">
						<div class="column1"><?php get_sidebar(); ?></div>
						<div class="column2">
				<?php elseif ( $qodef_sidebar == "4" ) : ?>
					<div class="two_columns_25_75 clearfix grid2">
						<div class="column1"><?php get_sidebar(); ?></div>
						<div class="column2">
				<?php endif; ?>
							<?php if ( have_posts() ) :
								while ( have_posts() ) : the_post(); ?>
									<div class="column_inner">
										<?php the_content(); ?>
										<?php stockholm_qode_wp_link_pages(); ?>
										<?php stockholm_qode_get_comments_template( true ); ?>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>