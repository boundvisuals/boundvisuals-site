<?php if ( stockholm_qode_is_top_header_enabled() ) {
	$qode_page_id = stockholm_qode_get_page_id();
	
	$header_color_transparency_per_page = "";
	if ( stockholm_qode_options()->getOptionValue( 'header_background_transparency_initial' ) !== "" ) {
		$header_color_transparency_per_page = stockholm_qode_options()->getOptionValue( 'header_background_transparency_initial' ) ;
	}
	if ( get_post_meta( $qode_page_id, "qode_header_color_transparency_per_page", true ) != "" ) {
		$header_color_transparency_per_page = get_post_meta( $qode_page_id, "qode_header_color_transparency_per_page", true );
	}
	
	$top_header_area_styles = array();
	if ( get_post_meta( $qode_page_id, "qode_header_color_per_page", true ) != "" ) {
		if ( $header_color_transparency_per_page != "" ) {
			$header_background_color  = stockholm_qode_hex2rgb( get_post_meta( $qode_page_id, "qode_header_color_per_page", true ) );
			$top_header_area_styles[] = "background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
		} else {
			$top_header_area_styles[] = "background-color:" . get_post_meta( $qode_page_id, "qode_header_color_per_page", true ) . ";";
		}
	} else if ( $header_color_transparency_per_page != "" && get_post_meta( $qode_page_id, "qode_header_color_per_page", true ) == "" ) {
		$header_background_color  = stockholm_qode_options()->getOptionValue( 'header_top_background_color' ) ? stockholm_qode_hex2rgb( stockholm_qode_options()->getOptionValue( 'header_top_background_color' )  ) : stockholm_qode_hex2rgb( "#ffffff" );
		$top_header_area_styles[] = "background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
	}
	?>
	<div class="header_top clearfix" <?php stockholm_qode_inline_style( $top_header_area_styles ); ?>>
		<?php if ( stockholm_qode_get_header_in_grid() ){ ?>
		<div class="container">
			<div class="container_inner clearfix">
				<?php } ?>
				<div class="left">
					<div class="inner">
						<?php dynamic_sidebar( 'header_left' ); ?>
					</div>
				</div>
				<div class="right">
					<div class="inner">
						<?php dynamic_sidebar( 'header_right' ); ?>
					</div>
				</div>
				<?php if ( stockholm_qode_get_header_in_grid() ){ ?>
			</div>
		</div>
	<?php } ?>
	</div>
<?php } ?>