<?php

if ( stockholm_qode_is_footer_top_enabled() ) {
	
	$footer_in_grid = true;
	if ( stockholm_qode_options()->getOptionValue( 'footer_in_grid' ) != "yes" ) {
		$footer_in_grid = false;
	}
	
	$footer_top_columns = 4;
	if ( stockholm_qode_options()->getOptionValue( 'footer_top_columns' ) ) {
		$footer_top_columns = stockholm_qode_options()->getOptionValue( 'footer_top_columns' );
	}
	
	$classes = array();
	if ( stockholm_qode_options()->getOptionValue( 'footer_top_border_in_grid' ) == 'yes' ) {
		$classes[] = 'in_grid';
	}
	
	$styles = array();
	if ( stockholm_qode_options()->getOptionValue( 'footer_top_border_color' ) !== '' ) {
		$styles[] = 'height: 1px;';
		$styles[] = 'background-color: ' . esc_attr( stockholm_qode_options()->getOptionValue( 'footer_top_border_color' ) );
	}
	
	if ( ! empty( $styles ) ) { ?>
		<div class="fotter_top_border_holder <?php echo implode( ' ', $classes ); ?>" <?php stockholm_qode_inline_style( $styles ); ?>></div>
	<?php } ?>
	<div class="footer_top_holder">
		<div class="footer_top <?php echo esc_attr( ! $footer_in_grid ? 'footer_top_full' : '' ); ?>">
			<?php if ( $footer_in_grid ){ ?>
			<div class="container">
				<div class="container_inner">
					<?php } ?>
					<?php switch ( $footer_top_columns ) {
						case 7:
							?>
                            <div class="qodef-grid-row qodef-grid-normal-gutter">
                                <div class="qodef-grid-col-3  qodef-footer-top-column-1">
									<?php dynamic_sidebar( 'footer_column_1' ); ?>
                                </div>
                                <div class="qodef-grid-col-6  qodef-footer-top-column-2">
									<?php dynamic_sidebar( 'footer_column_2' ); ?>
                                </div>
                                <div class="qodef-grid-col-3 qodef-footer-top-column-3">
									<?php dynamic_sidebar( 'footer_column_3' ); ?>
                                </div>
                            </div>
							<?php
							break;
						case 6:
							?>
							<div class="two_columns_50_50 clearfix">
								<div class="qode_column column1 qodef-footer-top-column-1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="qode_column column2 qodef-footer-top-column-2">
									<div class="column_inner">
										<div class="two_columns_50_50 clearfix">
											<div class="qode_column column1">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_2' ); ?>
												</div>
											</div>
											<div class="qode_column column2 qodef-footer-top-column-3">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_3' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							break;
						case 5:
							?>
							<div class="two_columns_50_50 clearfix">
								<div class="qode_column column1">
									<div class="column_inner">
										<div class="two_columns_50_50 clearfix">
											<div class="qode_column column1 qodef-footer-top-column-1">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_1' ); ?>
												</div>
											</div>
											<div class="qode_column column2 qodef-footer-top-column-2">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_2' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="qode_column column2 qodef-footer-top-column-3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
							</div>
							<?php
							break;
						case 4:
							?>
							<div class="four_columns clearfix">
								<div class="qode_column column1 qodef-footer-top-column-1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="qode_column column2 qodef-footer-top-column-2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="qode_column column3 qodef-footer-top-column-3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
								<div class="qode_column column4 qodef-footer-top-column-4">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_4' ); ?>
									</div>
								</div>
							</div>
							<?php
							break;
						case 3:
							?>
							<div class="three_columns clearfix">
								<div class="qode_column column1 qodef-footer-top-column-1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="qode_column column2 qodef-footer-top-column-2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="qode_column column3 qodef-footer-top-column-3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
							</div>
							<?php
							break;
						case 2:
							?>
							<div class="two_columns_50_50 clearfix">
								<div class="qode_column column1 qodef-footer-top-column-1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="qode_column column2 qodef-footer-top-column-2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
							</div>
							<?php
							break;
						case 1:
							dynamic_sidebar( 'footer_column_1' );
							break;
					}
					?>
					<?php if ( $footer_in_grid ){ ?>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
<?php } ?>