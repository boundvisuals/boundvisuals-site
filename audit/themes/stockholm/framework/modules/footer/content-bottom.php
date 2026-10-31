<?php
$qode_page_id    = stockholm_qode_get_page_id();
$qode_is_enabled = "yes";

if ( get_post_meta( $qode_page_id, "qode_enable_content_bottom_area", true ) != "" ) {
	$qode_is_enabled = get_post_meta( $qode_page_id, "qode_enable_content_bottom_area", true );
} elseif ( stockholm_qode_options()->getOptionValue( 'enable_content_bottom_area' ) ) {
	//content bottom area is turned on in theme options
	$qode_is_enabled = stockholm_qode_options()->getOptionValue( 'enable_content_bottom_area' );
}

if ( $qode_is_enabled == "yes" ) {
	//is sidebar chosen for content bottom area for current page?
	$content_bottom_area_sidebar = "";
	if ( get_post_meta( $qode_page_id, 'qode_choose_content_bottom_sidebar', true ) != "" ) {
		$content_bottom_area_sidebar = get_post_meta( $qode_page_id, 'qode_choose_content_bottom_sidebar', true );
	} elseif ( stockholm_qode_options()->getOptionValue( 'content_bottom_sidebar_custom_display' ) ) {
		//sidebar is chosen for content bottom area in theme options
		$content_bottom_area_sidebar = stockholm_qode_options()->getOptionValue( 'content_bottom_sidebar_custom_display' );
	}
	
	//take content bottom area in grid option for current page if set or from theme options otherwise
	$content_bottom_area_in_grid = true;
	if ( get_post_meta( $qode_page_id, 'qode_content_bottom_sidebar_in_grid', true ) != "" ) {
		$content_bottom_area_in_grid = get_post_meta( $qode_page_id, 'qode_content_bottom_sidebar_in_grid', true );
	} elseif ( stockholm_qode_options()->getOptionValue( 'content_bottom_in_grid' ) ) {
		$content_bottom_area_in_grid = stockholm_qode_options()->getOptionValue( 'content_bottom_in_grid' );
	}
	
	$styles = array();
	
	$content_bottom_background_color = get_post_meta( $qode_page_id, "qode_content_bottom_background_color", true );
	if ( ! empty( $content_bottom_background_color ) ) {
		$styles[] = 'background-color: ' . esc_attr( $content_bottom_background_color );
	}
	?>
	<div class="content_bottom" <?php stockholm_qode_inline_style( $styles ); ?>>
		<?php if ( $content_bottom_area_in_grid == 'yes' ){ ?>
		<div class="container">
			<div class="container_inner clearfix">
				<?php } ?>
				<?php dynamic_sidebar( $content_bottom_area_sidebar ); ?>
				<?php if ( $content_bottom_area_in_grid == 'yes' ){ ?>
			</div>
		</div>
	<?php } ?>
	</div>
<?php } ?>