<?php
$qode_page_id = stockholm_qode_get_page_id();

$filter = stockholm_qode_options()->getOptionValue( 'blog_masonry_filter' ) ? stockholm_qode_options()->getOptionValue( 'blog_masonry_filter' ) : "no";

$blog_masnory_filter_class = "";
if ( stockholm_qode_options()->getOptionValue( 'portfolio_filter_disable_separator' ) == "yes" ) {
	$blog_masnory_filter_class = "without_separator";
}

$page_category = get_post_meta( $qode_page_id, "qode_choose-blog-category", true );
if ( is_category() ) {
	$page_category = get_query_var( 'cat' );
}
if ( $page_category == "" && ! is_category() ) {
	$args       = array(
		'parent' => 0
	);
	$categories = get_categories( $args );
} else {
	$args       = array(
		'parent' => $page_category
	);
	$categories = get_categories( $args );
}
if ( $filter == "yes" && count( $categories ) > 0 ) { ?>
	<div class="filter_outer">
		<div class="filter_holder <?php echo esc_attr( $blog_masnory_filter_class ); ?>">
			<ul>
				<li class='filter_title'><span><?php esc_html_e( 'Sort Blog:', 'stockholm' ); ?></span></li>
				<li class="filter" data-filter="*"><span><?php esc_html_e( 'All', 'stockholm' ); ?></span></li>
				<?php foreach ( $categories as $category ) { ?>
					<li class="filter" data-filter="<?php echo esc_attr( ".category-" . $category->slug ); ?>">
						<span><?php echo esc_html( $category->name ); ?></span>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php } ?>