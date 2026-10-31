<div class="full_width" <?php stockholm_qode_inline_page_background_style(); ?>>
	<div class="full_width_inner" <?php stockholm_qode_inline_page_padding_style(); ?>>
		<div class="portfolio_single portfolio-wide-left">
			<div class="two_columns_33_66 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="portfolio_detail <?php echo esc_attr( stockholm_qode_get_portfolio_follow_info_class() ); ?> clearfix">
							<?php
							//get portfolio content section
							get_template_part( 'templates/portfolio/parts/portfolio-content' );
							
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
				<div class="column2">
					<div class="column_inner">
						<div class="portfolio_images">
							<?php stockholm_qode_get_template_part( 'templates/portfolio/parts/portfolio-media' ); ?>
						</div>
					</div>
				</div>
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