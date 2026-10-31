<div class="full_width" <?php stockholm_qode_inline_page_background_style(); ?>>
	<div class="full_width_inner" <?php stockholm_qode_inline_page_padding_style(); ?>>
		<div class="portfolio_single portfolio_fullwidth_slider">
			<div class="container" <?php stockholm_qode_inline_page_background_style(); ?>>
				<div class="container_inner">
					<div class="two_columns_75_25 clearfix portfolio_container">
						<div class="column1">
							<div class="column_inner">
								<div class="portfolio_single_text_holder">
									<h2 class="portfolio_single_text_title"><span><?php the_title(); ?></span></h2>
									<?php the_content(); ?>
								</div>
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="portfolio_detail">
									<?php
									//get portfolio custom fields section
									get_template_part( 'templates/portfolio/parts/portfolio-custom-fields' );
									
									//get portfolio date section
									get_template_part( 'templates/portfolio/parts/portfolio-date' );
									
									//get portfolio categories section
									get_template_part( 'templates/portfolio/parts/portfolio-categories' );
									
									//get portfolio tags section
									get_template_part( 'templates/portfolio/parts/portfolio-tags' );
									
									//get portfolio share section
									get_template_part( 'templates/portfolio/parts/portfolio-social' );
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="portfolio_owl_slider">
				<?php stockholm_qode_get_template_part( 'templates/portfolio/parts/portfolio-media', '', array( 'portfolio_template' => 'slider', 'slider_type' => 'owl' ) ); ?>
			</div>
			<div class="container" <?php stockholm_qode_inline_page_background_style(); ?>>
				<div class="container_inner">
					<?php
					get_template_part( 'templates/portfolio/parts/portfolio-navigation' );
					get_template_part( 'templates/portfolio/parts/portfolio-comments' );
					?>
				</div>
			</div>
		</div>
	</div>
</div>