<?php

if ( ! function_exists( 'stockholm_qode_return_global_wp_query' ) ) {
	function stockholm_qode_return_global_wp_query() {
		global $wp_query;
		
		return $wp_query;
	}
}

if ( ! function_exists( 'stockholm_qode_excerpt_more' ) ) {
	/**
	 * Function that adds three dotes on the end excerpt
	 *
	 * @param $more
	 *
	 * @return string
	 */
	function stockholm_qode_excerpt_more( $more ) {
		return '...';
	}
	
	add_filter( 'excerpt_more', 'stockholm_qode_excerpt_more' );
}

if ( ! function_exists( 'stockholm_qode_excerpt_length' ) ) {
	/**
	 * Function that changes excerpt length based on theme options
	 *
	 * @param $length int original value
	 *
	 * @return int changed value
	 */
	function stockholm_qode_excerpt_length( $length ) {
		$number_of_charts = stockholm_qode_options()->getOptionValue( 'number_of_chars' );
		
		return ! empty( $number_of_charts ) ? intval( $number_of_charts ) : 45;
	}
	
	add_filter( 'excerpt_length', 'stockholm_qode_excerpt_length', 999 );
}

if ( ! function_exists( 'stockholm_qode_post_has_read_more' ) ) {
	/**
	 * Function that checks if current post has read more tag set
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function stockholm_qode_post_has_read_more() {
		global $post;
		
		return strpos( $post->post_content, '<!--more-->' );
	}
}

if ( ! function_exists( 'stockholm_qode_modify_read_more_link' ) ) {
	function stockholm_qode_modify_read_more_link() {
		return '<a class="more-link" href="' . get_permalink() . '"><span>' . esc_html__( "READ MORE", "stockholm" ) . '</span></a>';
	}
	
	add_filter( 'the_content_more_link', 'stockholm_qode_modify_read_more_link' );
}

if ( ! function_exists( 'stockholm_qode_set_blog_word_count' ) ) {
	/**
	 * Function that sets global blog word count variable used by stockholm_qode_excerpt function
	 */
	function stockholm_qode_set_blog_word_count( $option_name ) {
		global $word_count;
		
		if ( ! empty( $option_name ) && stockholm_qode_options()->getOptionValue( $option_name ) !== '' ) {
			$word_count = intval( stockholm_qode_options()->getOptionValue( $option_name ) );
		}

		if ( empty( $word_count ) ) {
			$word_count = intval( stockholm_qode_options()->getOptionValue( 'number_of_chars' ) );
		}
	}
}

if ( ! function_exists( 'stockholm_qode_excerpt' ) ) {
	/**
	 * Function that cuts post excerpt to the number of word based on previosly set global
	 * variable $word_count, which is defined in stockholm_qode_set_blog_word_count function
	 */
	function stockholm_qode_excerpt() {
		global $word_count, $post;
		
		if ( post_password_required() ) {
			echo get_the_password_form();
		} else {
			$word_count = isset( $word_count ) && $word_count !== "" ? $word_count : stockholm_qode_options()->getOptionValue( 'number_of_chars' );
			
			if ( $word_count > 0 ) {
				
				//if post excerpt field is filled take that as post excerpt, else that content of the post
				$post_excerpt = $post->post_excerpt !== '' ? $post->post_excerpt : strip_tags( strip_shortcodes( $post->post_content ) );
				
				//remove leading dots if those exists
				$clean_excerpt = strlen( $post_excerpt ) && strpos( $post_excerpt, '...' ) ? strstr( $post_excerpt, '...', true ) : $post_excerpt;
				
				//explode current excerpt to words
				$excerpt_word_array = explode( ' ', $clean_excerpt );
				
				//cut down that array based on the number of the words option
				$excerpt_word_array = array_slice( $excerpt_word_array, 0, $word_count );
				
				//and finally implode words together
				$excerpt = implode( ' ', $excerpt_word_array );
				
				//is excerpt different than empty string?
				if ( $excerpt !== '' ) {
					echo '<p class="post_excerpt">' . rtrim( wp_kses_post( $excerpt ) ) . '</p>';
				}
			}
		}
	}
}

if ( ! function_exists( 'stockholm_qode_wp_link_pages' ) ) {
	function stockholm_qode_wp_link_pages() {
		$args_pages = array(
			'before'   => '<p class="single_links_pages">',
			'after'    => '</p>',
			'pagelink' => '<span>%</span>'
		);
		
		wp_link_pages( $args_pages );
	}
}

if ( ! function_exists( 'stockholm_qode_wp_link_pages_exist' ) ) {
	function stockholm_qode_wp_link_pages_exist() {
		$has_read_more = wp_link_pages( array( 'echo' => 0 ) );
		
		if ( stockholm_qode_is_core_installed() ) {
			if ( stockholm_qode_options()->getOptionValue( 'wp_read_more' ) === 'off' ) {
				$has_read_more = false;
			} else if ( stockholm_qode_options()->getOptionValue( 'wp_read_more' ) === 'on' ) {
				$has_read_more = true;
			}
		}
		
		return $has_read_more;
	}
}

if ( ! function_exists( 'stockholm_qode_get_blog_content_part' ) ) {
	function stockholm_qode_get_blog_content_part() {
		$page_object = get_post( stockholm_qode_get_page_id() );
		$content     = $page_object->post_content;
		$content     = apply_filters( 'the_content', $content );
		
		return $content;
	}
}

if ( ! function_exists( 'stockholm_qode_get_blog_style' ) ) {
	function stockholm_qode_get_blog_style() {
		$blog_style = stockholm_qode_options()->getOptionValue( 'blog_style' );
		
		return ! empty( $blog_style ) ? $blog_style : '';
	}
}

if ( ! function_exists( 'stockholm_qode_get_blog_query_posts' ) ) {
	function stockholm_qode_get_blog_query_posts() {
		$qode_page_id             = stockholm_qode_get_page_id();
		$category                 = get_post_meta( $qode_page_id, "qode_choose-blog-category", true );
		$number_of_posts_per_page = get_post_meta( $qode_page_id, "qode_show-posts-per-page", true );
		$post_number              = ! empty( $number_of_posts_per_page ) ? esc_attr( $number_of_posts_per_page ) : esc_attr( get_option( 'posts_per_page' ) );
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'paged'          => $paged,
			'cat'            => $category,
			'posts_per_page' => $post_number
		);
		
		$blog_query = new WP_Query( $query_array );
		if ( is_archive() ) {
			$blog_query = stockholm_qode_return_global_wp_query();
		}
		
		return $blog_query;
	}
}

if ( ! function_exists( 'stockholm_qode_get_blog_page_range' ) ) {
	function stockholm_qode_get_blog_page_range( $qode_blog_query ) {
		$blog_page_range_meta = stockholm_qode_options()->getOptionValue( 'blog_page_range' );
		
		$blog_page_range = $qode_blog_query->max_num_pages;
		if ( ! empty( $blog_page_range_meta ) ) {
			$blog_page_range = $blog_page_range_meta;
		}
		
		return $blog_page_range;
	}
}

if ( ! function_exists( 'stockholm_qode_get_blog_pagination' ) ) {
	function stockholm_qode_get_blog_pagination( $qode_blog_query ) {
		
		if ( stockholm_qode_options()->getOptionValue( 'pagination' ) !== 0 ) {
			
			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}
			
			stockholm_qode_get_blog_pagination_html( $qode_blog_query->max_num_pages, stockholm_qode_get_blog_page_range( $qode_blog_query ), $paged );
		}
	}
}

if ( ! function_exists( 'stockholm_qode_get_blog_pagination_html' ) ) {
	function stockholm_qode_get_blog_pagination_html( $pages = '', $range = 4, $paged = 1 ) {
		$showitems = $range + 1;
		
		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if ( ! $pages ) {
				$pages = 1;
			}
		}
		
		if ( 1 != $pages ) {
			echo "<div class='pagination'><ul>";
			if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
				echo "<li class='first'><a href='" . get_pagenum_link( 1 ) . "'><span class='arrow_carrot-2left'></span></a></li>";
			}
			echo "<li class='prev";
			if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
				echo " prev_first";
			}
			echo "'><a href='" . get_pagenum_link( $paged - 1 ) . "'><span class='arrow_carrot-left'></span></a></li>";
			
			for ( $i = 1; $i <= $pages; $i ++ ) {
				if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
					echo esc_attr( $paged == $i ) ? "<li class='active'><span>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link( $i ) . "' class='inactive'>" . $i . "</a></li>";
				}
			}
			
			echo "<li class='next";
			if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
				echo " next_last";
			}
			echo "'><a href=\"";
			if ( $pages > $paged ) {
				echo get_pagenum_link( $paged + 1 );
			} else {
				echo get_pagenum_link( $paged );
			}
			echo "\"><span class='arrow_carrot-right'></span></a></li>";
			
			if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
				echo "<li class='last'><a href='" . get_pagenum_link( $pages ) . "'><span class='arrow_carrot-2right'></span></a></li>";
			}
			echo "</ul></div>\n";
		}
	}
}

if ( ! function_exists( 'stockholm_qode_get_blog_masonry_full_width_classes' ) ) {
	function stockholm_qode_get_blog_masonry_full_width_classes() {
		$classes = array();
		
		if ( stockholm_qode_options()->getOptionValue( 'blog_masonry_filter' ) == "yes" ) {
			$classes[] = "full_page_container_inner";
		}
		
		if ( ! empty( $classes ) ) {
			return implode( ' ', $classes );
		}
	}
}