<?php
get_header();

$qodef_sidebar = stockholm_qode_get_sidebar_layout();
?>
<div class="container">
	<div class="container_inner default_template_holder clearfix">
		<?php if ( ( $qodef_sidebar == "default" ) || ( $qodef_sidebar == "" ) ) : ?>
			<div class="blog_holder blog_large_image">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'templates/blog/blog_search', 'loop' ); ?>
				<?php endwhile; ?>
				<?php else: //If no posts are present ?>
					<div class="entry">
						<p><?php esc_html_e( 'No posts were found.', 'stockholm' ); ?></p>
					</div>
				<?php endif; ?>
				<?php stockholm_qode_get_blog_pagination( stockholm_qode_return_global_wp_query() ); ?>
			</div>
		<?php elseif ( $qodef_sidebar == "1" || $qodef_sidebar == "2" ): ?>
			<div class="<?php if ( $qodef_sidebar == "1" ): ?>two_columns_66_33<?php elseif ( $qodef_sidebar == "2" ) : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
				<div class="column1">
					<div class="column_inner">
						<div class="blog_holder blog_large_image">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'templates/blog/blog_search', 'loop' ); ?>
							<?php endwhile; ?>
							<?php else: //If no posts are present ?>
								<div class="entry">
									<p><?php esc_html_e( 'No posts were found.', 'stockholm' ); ?></p>
								</div>
							<?php endif; ?>
							<?php stockholm_qode_get_blog_pagination( stockholm_qode_return_global_wp_query() ); ?>
						</div>
					</div>
				</div>
				<div class="column2">
					<?php get_sidebar(); ?>
				</div>
			</div>
		<?php elseif ( $qodef_sidebar == "3" || $qodef_sidebar == "4" ): ?>
			<div class="<?php if ( $qodef_sidebar == "3" ): ?>two_columns_33_66<?php elseif ( $qodef_sidebar == "4" ) : ?>two_columns_25_75<?php endif; ?> background_color_sidebar grid2 clearfix">
				<div class="column1">
					<?php get_sidebar(); ?>
				</div>
				<div class="column2">
					<div class="column_inner">
						<div class="blog_holder blog_large_image">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'templates/blog/blog_search', 'loop' ); ?>
							<?php endwhile; ?>
							<?php else: //If no posts are present ?>
								<div class="entry">
									<p><?php esc_html_e( 'No posts were found.', 'stockholm' ); ?></p>
								</div>
							<?php endif; ?>
							<?php stockholm_qode_get_blog_pagination( stockholm_qode_return_global_wp_query() ); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>