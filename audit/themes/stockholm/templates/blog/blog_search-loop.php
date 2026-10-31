<article id="post-<?php the_ID(); ?>">
	<div class="post_content_holder">
		<?php get_template_part( 'templates/blog/post-format/image' ); ?>
		<div class="post_text">
			<div class="post_text_inner">
				<div class="post_info">
					<?php get_template_part( 'templates/blog/post-info/date' ); ?>
					<?php get_template_part( 'templates/blog/post-info/category', 'search' ); ?>
					<?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
				</div>
				<div class="post_content">
					<?php get_template_part( 'templates/blog/post-info/title' ); ?>
					<?php
						$my_excerpt = get_the_excerpt();
						if ($my_excerpt != '') {
							echo esc_html($my_excerpt);
						}
					?>
				</div>
			</div>
		</div>
	</div>
</article>