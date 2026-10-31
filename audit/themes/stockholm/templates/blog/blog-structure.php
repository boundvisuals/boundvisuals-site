<?php
$qode_template_name = get_page_template_slug( stockholm_qode_get_page_id() );
$qode_blog_query    = stockholm_qode_get_blog_query_posts();

$blog_style         = stockholm_qode_get_blog_style();
$blog_list          = "";
$blog_loading_class = "";

if ( $qode_template_name != "" ) {
	if ( $qode_template_name == "blog-large-image.php" ) {
		$blog_list       = "blog_large_image";
		$blog_list_class = "blog_large_image";
	} elseif ( $qode_template_name == "blog-masonry.php" ) {
		$blog_list       = "blog_masonry";
		$blog_list_class = "masonry";
	} elseif ( $qode_template_name == "blog-masonry-full-width.php" ) {
		$blog_list       = "blog_masonry";
		$blog_list_class = "masonry_full_width";
	} elseif ( $qode_template_name == "blog-pinterest-full-width.php" ) {
		$blog_list       = "blog_pinterest";
		$blog_list_class = "masonry_full_width pinterest_full_width";
	} elseif ( $qode_template_name == "blog-large-image-whole-post.php" ) {
		$blog_list       = "blog_large_image_whole_post";
		$blog_list_class = "blog_large_image";
	} elseif ( $qode_template_name == "blog-chequered.php" ) {
		$blog_list       = "blog_chequered";
		$blog_list_class = "blog_chequered";
	} elseif ( $qode_template_name == "blog-animated.php" ) {
		$blog_list       = "blog_animated";
		$blog_list_class = "blog_animated";
	} elseif ( $qode_template_name == "blog-centered.php" ) {
		$blog_list       = "blog_centered";
		$blog_list_class = "blog_centered";
	} else {
		$blog_list       = "blog_large_image";
		$blog_list_class = "blog_large_image";
	}
} else {
	if ( $blog_style == "1" ) {
		$blog_list       = "blog_large_image";
		$blog_list_class = "blog_large_image";
	} elseif ( $blog_style == "2" ) {
		$blog_list       = "blog_masonry";
		$blog_list_class = "masonry";
	} elseif ( $blog_style == "5" ) {
		$blog_list       = "blog_masonry";
		$blog_list_class = "masonry_full_width";
	} elseif ( $blog_style == "3" ) {
		$blog_list       = "blog_large_image_whole_post";
		$blog_list_class = "blog_large_image";
	} elseif ( $blog_style == "4" ) {
		$blog_list       = "blog_chequered";
		$blog_list_class = "blog_chequered";
	} elseif ( $blog_style == "6" ) {
		$blog_list       = "blog_animated";
		$blog_list_class = "blog_animated";
	} elseif ( $blog_style == "7" ) {
		$blog_list       = "blog_centered";
		$blog_list_class = "blog_centered";
	} elseif ( $blog_style == "8" ) {
		$blog_list       = "blog_pinterest";
		$blog_list_class = "masonry_full_width pinterest_full_width";
	} else {
		$blog_list       = "blog_large_image";
		$blog_list_class = "blog_large_image";
	}
}

$pagination_masonry = "pagination";
if ( stockholm_qode_options()->getOptionValue( 'pagination_masonry' ) ) {
	$pagination_masonry = stockholm_qode_options()->getOptionValue( 'pagination_masonry' ) ;
	
	if ( $blog_list == "blog_masonry" || $blog_list == "blog_pinterest" ) {
		$blog_list_class .= " masonry_" . $pagination_masonry;
	}
}

if ( ( $blog_list == "blog_masonry" || $blog_list == "blog_pinterest" ) && $pagination_masonry != "infinite_scroll" ) {
	if ( stockholm_qode_options()->getOptionValue( 'blog_loading_type' ) !== "" ) {
		$blog_loading_class = stockholm_qode_options()->getOptionValue( 'blog_loading_type' ) ;
	}
}

$filter = "no";
if ( stockholm_qode_options()->getOptionValue( 'blog_masonry_filter' ) ) {
	$filter = stockholm_qode_options()->getOptionValue( 'blog_masonry_filter' ) ;
}

if ( ( $blog_list == "blog_masonry" && $filter == "yes" ) || ( $blog_list == "blog_pinterest" && $filter == "yes" ) ) {
	get_template_part( 'templates/blog/masonry', 'filter' );
}
?>
	<div class="blog_holder <?php echo esc_attr( $blog_list_class ); ?> <?php echo esc_attr( $blog_loading_class ); ?>">
		<?php if ( $qode_blog_query->have_posts() ) : while ( $qode_blog_query->have_posts() ) : $qode_blog_query->the_post();
			get_template_part( 'templates/blog/' . $blog_list, 'loop' );
		endwhile; ?>
		<?php else: //If no posts are present ?>
			<div class="entry">
				<p><?php esc_html_e( 'No posts were found.', 'stockholm' ); ?></p>
			</div>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		<?php if ( $blog_list != "blog_masonry" && $blog_list != "blog_pinterest" ) {
			stockholm_qode_get_blog_pagination( $qode_blog_query );
		} ?>
	</div>
<?php if ( $blog_list == "blog_masonry" || $blog_list == "blog_pinterest" ) {
	$max_num_pages = stockholm_qode_get_blog_page_range( $qode_blog_query );
	
	if ( $pagination_masonry == "load_more" && get_next_posts_link( null, $max_num_pages ) ) { ?>
		<div class="blog_load_more_button_holder">
			<div class="blog_load_more_button">
				<span rel="<?php echo esc_attr( $max_num_pages ); ?>"><?php echo get_next_posts_link( esc_html__( 'Show more', 'stockholm' ), $max_num_pages ); ?></span>
			</div>
		</div>
	<?php } elseif ( $pagination_masonry == "infinite_scroll" ) { ?>
		<div class="blog_infinite_scroll_button">
			<span rel="<?php echo esc_attr( $max_num_pages ); ?>"><?php echo get_next_posts_link( esc_html__( 'Show more', 'stockholm' ), $max_num_pages ); ?></span>
		</div>
        <div class="qode-infinite-scroll-loading-label"><?php echo esc_html__('Loading new posts...', 'stockholm'); ?></div>
        <div class="qode-infinite-scroll-finished-label"><?php echo esc_html__('No more posts', 'stockholm'); ?></div>
	<?php } else {
		stockholm_qode_get_blog_pagination( $qode_blog_query );
	} ?>
<?php } ?>