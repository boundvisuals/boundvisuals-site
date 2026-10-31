<?php
get_header();

$qodef_sidebar = stockholm_qode_get_sidebar_layout();
?>
<div class="container">
	<?php if ( stockholm_qode_get_blog_style() != "5" && stockholm_qode_get_blog_style() != "8" ) : ?>
	<div class="container_inner default_template_holder clearfix">
		<?php else : ?>
		<div class="content_inner">
			<div class="full_width">
				<div class="full_width_inner full_page_container_inner">
					<?php endif; ?>
					<?php if ( ( $qodef_sidebar == "default" ) || ( $qodef_sidebar == "" ) ) : ?>
						<?php get_template_part( 'templates/blog/blog', 'structure' ); ?>
					<?php elseif ( $qodef_sidebar == "1" || $qodef_sidebar == "2" ): ?>
						<div class="<?php if ( $qodef_sidebar == "1" ): ?>two_columns_66_33<?php elseif ( $qodef_sidebar == "2" ) : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
							<div class="column1">
								<div class="column_inner">
									<?php get_template_part( 'templates/blog/blog', 'structure' ); ?>
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
									<?php get_template_part( 'templates/blog/blog', 'structure' ); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>