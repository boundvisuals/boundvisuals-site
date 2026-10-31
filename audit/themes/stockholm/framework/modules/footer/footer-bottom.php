<?php

if ( stockholm_qode_is_footer_bottom_enabled() ):

	$classes = array();
	if ( stockholm_qode_options()->getOptionValue( 'footer_bottom_border_in_grid' ) == 'yes' ) {
		$classes[] = 'in_grid';
	}
	
	$styles = array();
	if ( stockholm_qode_options()->getOptionValue( 'footer_bottom_border_color' ) ) {
		$styles[] = 'height: 1px;';
		$styles[] = 'background-color: ' . esc_attr( stockholm_qode_options()->getOptionValue( 'footer_bottom_border_color' ) );
	}

	$footer_bottom_in_grid = false;
	if ( stockholm_qode_options()->getOptionValue( 'footer_bottom_in_grid' ) == "yes" ) {
		$footer_bottom_in_grid = true;
	}
	?>
	<div class="footer_bottom_holder">
        <?php if ( $footer_bottom_in_grid ){ ?>
            <div class="container">
            <div class="container_inner">
        <?php } ?>
            <?php if ( ! empty( $styles ) ) { ?>
			<div class="fotter_top_border_holder <?php echo implode( ' ', $classes ); ?>" <?php stockholm_qode_inline_style( $styles ); ?>></div>
		<?php } ?>
		<div class="footer_bottom">
			<?php dynamic_sidebar( 'footer_text' ); ?>
		</div>
        <?php if ( $footer_bottom_in_grid ){ ?>
            </div>
            </div>
        <?php } ?>
	</div>
<?php endif; ?>