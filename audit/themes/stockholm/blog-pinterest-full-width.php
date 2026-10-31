<?php
/*
Template Name: Blog Pinterest Full Width
*/

get_header();

$qodef_sidebar = stockholm_qode_get_sidebar_layout( false );

stockholm_qode_set_blog_word_count( 'number_of_chars_masonry' );
?>
<div class="full_width" <?php stockholm_qode_inline_page_background_style(); ?>>
	<div class="full_width_inner" <?php stockholm_qode_inline_page_padding_style(); ?>>
		<?php
		echo stockholm_qode_get_blog_content_part();
		get_template_part( 'templates/blog/blog', 'structure' );
		?>
	</div>
</div>
<?php get_footer(); ?>