<?php
/*
Template Name: WooCommerce
*/

get_header();

$qodef_sidebar = stockholm_qode_get_sidebar_layout( false );
$single_product_type = stockholm_qode_options()->getOptionValue('woo_product_single_product_type');
$in_grid = true;

if( is_singular('product') && $single_product_type == 'two-columns-gallery' ){
    $in_grid = false;
}
?>

<?php if( $in_grid ){ ?>
    <div class="container" <?php stockholm_qode_inline_page_background_style(); ?>>
        <div class="container_inner default_template_holder clearfix" <?php stockholm_qode_inline_page_padding_style(); ?>>
<?php } else { ?>
    <div class="full_width" <?php stockholm_qode_inline_page_background_style(); ?>>
        <div class="full_width_inner default_template_holder clearfix" <?php stockholm_qode_inline_page_padding_style(); ?>>
<?php } ?>
		<?php if ( ! is_singular( 'product' ) ) {
			if ( ( $qodef_sidebar == "default" ) || ( $qodef_sidebar == "" ) ) {
				stockholm_qode_woocommerce_content();
			} elseif ( $qodef_sidebar == "1" || $qodef_sidebar == "2" ) {
				stockholm_qode_set_number_of_columns_woo_product_list();
				
				if ( $qodef_sidebar == "1" ) { ?>
					<div class="two_columns_66_33 grid2 woocommerce_with_sidebar clearfix">
						<div class="column1">
				<?php } elseif ( $qodef_sidebar == "2" ) { ?>
					<div class="two_columns_75_25 grid2 woocommerce_with_sidebar clearfix">
						<div class="column1">
				<?php } ?>
							<div class="column_inner">
								<?php stockholm_qode_woocommerce_content(); ?>
							</div>
						</div>
						<div class="column2"><?php get_sidebar(); ?></div>
					</div>
			<?php } elseif ( $qodef_sidebar == "3" || $qodef_sidebar == "4" ) {
				stockholm_qode_set_number_of_columns_woo_product_list();
				
				if ( $qodef_sidebar == "3" ) { ?>
					<div class="two_columns_33_66 grid2 woocommerce_with_sidebar clearfix">
						<div class="column1"><?php get_sidebar(); ?></div>
						<div class="column2">
				<?php } elseif ( $qodef_sidebar == "4" ) { ?>
					<div class="two_columns_25_75 grid2 woocommerce_with_sidebar clearfix">
						<div class="column1"><?php get_sidebar(); ?></div>
						<div class="column2">
				<?php } ?>
							<div class="column_inner">
								<?php stockholm_qode_woocommerce_content(); ?>
							</div>
						</div>
					</div>
			<?php }
		} else {
			stockholm_qode_woocommerce_content();
		} ?>
	</div>
</div>
<?php get_footer(); ?>