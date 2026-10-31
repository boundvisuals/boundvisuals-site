<div class="full_width">
	<div class="full_width_inner" <?php stockholm_qode_inline_page_padding_style(); ?>>
		<div class="portfolio_single full-width-portfolio">
			<?php if ( post_password_required() ) {
				echo get_the_password_form();
			} else { ?>
				<?php the_content(); ?>
				
				<div class="container">
					<div class="container_inner clearfix">
						<?php
						get_template_part( 'templates/portfolio/parts/portfolio-navigation' );
						
						get_template_part( 'templates/portfolio/parts/portfolio-comments' );
						?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>