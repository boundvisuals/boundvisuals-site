<?php
get_header();

$qodef_sidebar = stockholm_qode_get_sidebar_layout( false );
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container" <?php stockholm_qode_inline_page_background_style(); ?>>
		<div class="container_inner default_template_holder" <?php stockholm_qode_inline_page_padding_style(); ?>>
			<?php if ( ( $qodef_sidebar == "default" ) || ( $qodef_sidebar == "" ) ) : ?>
				<div class="blog_holder blog_single">
					<?php get_template_part( 'templates/blog/blog_single', 'loop' ); ?>
					<?php stockholm_qode_get_comments_template( false, true ); ?>
				</div>
			<?php elseif ( $qodef_sidebar == "1" || $qodef_sidebar == "2" ): ?>
				<?php if ( $qodef_sidebar == "1" ) : ?>
					<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
						<div class="column1">
				<?php elseif ( $qodef_sidebar == "2" ) : ?>
					<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
						<div class="column1">
				<?php endif; ?>
							<div class="column_inner">
								<div class="blog_holder blog_single">
									<?php get_template_part( 'templates/blog/blog_single', 'loop' ); ?>
								</div>
								<?php stockholm_qode_get_comments_template( false, true ); ?>
							</div>
						</div>
						<div class="column2">
							<?php get_sidebar(); ?>
						</div>
					</div>
			<?php elseif ( $qodef_sidebar == "3" || $qodef_sidebar == "4" ): ?>
				<?php if ( $qodef_sidebar == "3" ) : ?>
					<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
						<div class="column1">
							<?php get_sidebar(); ?>
						</div>
						<div class="column2">
				<?php elseif ( $qodef_sidebar == "4" ) : ?>
					<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
						<div class="column1">
							<?php get_sidebar(); ?>
						</div>
						<div class="column2">
				<?php endif; ?>
							<div class="column_inner">
								<div class="blog_holder blog_single">
									<?php get_template_part( 'templates/blog/blog_single', 'loop' ); ?>
								</div>
								<?php stockholm_qode_get_comments_template( false, true ); ?>
							</div>
						</div>
					</div>
			<?php endif; ?>
		</div>
	</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>