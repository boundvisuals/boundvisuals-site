<?php
/*
Template Name: Blog Chequered
*/

get_header();

$qodef_sidebar = stockholm_qode_get_sidebar_layout( false );

stockholm_qode_set_blog_word_count( 'number_of_chars_chequered' );
?>
<div class="full_width" <?php stockholm_qode_inline_page_background_style(); ?>>
	<div class="full_width_inner clearfix" <?php stockholm_qode_inline_page_padding_style(); ?>>
		<?php if ( ( $qodef_sidebar == "default" ) || ( $qodef_sidebar == "" ) ) : ?>
			<?php
			echo stockholm_qode_get_blog_content_part();
			get_template_part( 'templates/blog/blog', 'structure' );
			?>
		<?php elseif ( $qodef_sidebar == "1" || $qodef_sidebar == "2" ): ?>
			<div class="<?php if ( $qodef_sidebar == "1" ): ?>two_columns_66_33<?php elseif ( $qodef_sidebar == "2" ) : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
				<div class="column1">
					<div class="column_inner">
						<?php
						echo stockholm_qode_get_blog_content_part();
						get_template_part( 'templates/blog/blog', 'structure' );
						?>
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
						<?php
						echo stockholm_qode_get_blog_content_part();
						get_template_part( 'templates/blog/blog', 'structure' );
						?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>