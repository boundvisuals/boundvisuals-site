<div class="full_width" <?php stockholm_qode_inline_page_background_style(); ?>>
	<div class="full_width_inner" <?php stockholm_qode_inline_page_padding_style(); ?>>
		<div class="portfolio_single portfolio_fullscreen_slider">
			<div class="fullscreen-slider">
				<div class="qodef-portfolio-slider-content">
					<span class="qodef-control qodef-close icon_minus-06"></span>
					<span class="qodef-control qodef-open icon_plus"></span>
					<div class="qodef-description">
						<div class="qodef-table">
							<div class="qodef-table-cell">
								<h3><?php the_title(); ?></h3>
								<div class="info portfolio_single_custom_date">
									<p class="info_date"><?php the_time( get_option( 'date_format' ) ); ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="qodef-portfolio-slider-content-info">
						<div class="qodef-hidden-info">
							<div class="qodef-portfolio-title">
								<h3><?php the_title(); ?></h3>
							</div>
							<div class="qodef-portfolio-horizontal-holder">
								<div class="qodef-portfolio-info-holder">
									<?php
									//get portfolio custom fields section
									get_template_part( 'templates/portfolio/parts/portfolio-custom-fields' );
									
									//get portfolio date section
									get_template_part( 'templates/portfolio/parts/portfolio-date' );
									
									//get portfolio categories section
									get_template_part( 'templates/portfolio/parts/portfolio-categories' );
									
									//get portfolio tags section
									get_template_part( 'templates/portfolio/parts/portfolio-tags' );
									?>
								</div>
							</div>
							<div class="qodef-portfolio-content-holder">
								<?php
								get_template_part( 'templates/portfolio/parts/portfolio-content' );
								//get portfolio share section
								get_template_part( 'templates/portfolio/parts/portfolio-social' );
								?>
							</div>
						</div>
					</div>
				
				</div>
				<div class="qodef-full-screen-slider-holder">
					<div class="qodef-portfolio-full-screen-slider">
						<?php stockholm_qode_get_template_part( 'templates/portfolio/parts/portfolio-media', '', array( 'portfolio_template' => 'fullscreen-slider' ) ); ?>
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