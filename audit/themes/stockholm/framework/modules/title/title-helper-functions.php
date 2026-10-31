<?php

if ( ! function_exists( 'stockholm_qode_is_title_area_visible' ) ) {
	function stockholm_qode_is_title_area_visible() {
		$show_page_title      = stockholm_qode_options()->getOptionValue( 'show_page_title' );
		$show_page_title_meta = get_post_meta( stockholm_qode_get_page_id(), "qode_show-page-title", true );
		
		$is_visible = true;
		if ( $show_page_title == 'no' ) {
			$is_visible = false;
		}
		
		if ( $show_page_title_meta === 'yes' ) {
			$is_visible = true;
		} elseif ( $show_page_title_meta === 'no' ) {
			$is_visible = false;
		}
		
		if ( is_page_template( 'full_screen.php' ) ) {
			$is_visible = false;
		}
		
		return $is_visible;
	}
}

if ( ! function_exists( 'stockholm_qode_get_title_text' ) ) {
	function stockholm_qode_get_title_text() {
		$title = get_the_title( stockholm_qode_get_page_id() );
		
		if ( is_home() && is_front_page() ) {
			$title = get_option( 'blogname' );
		} elseif ( is_tag() ) {
			$title = single_term_title( '', false ) . esc_html__( ' Tag', 'stockholm' );
		} elseif ( is_date() ) {
			$title = get_the_time( 'F Y' );
		} elseif ( is_author() ) {
			$title = esc_html__( 'Author: ', 'stockholm' ) . get_the_author();
		} elseif ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_archive() ) {
			$title = esc_html__( 'Archive', 'stockholm' );
		} elseif ( is_search() ) {
			$title = esc_html__( 'Search: ', 'stockholm' ) . get_search_query();
		} elseif ( is_404() ) {
			$title = stockholm_qode_options()->getOptionValue( '404_title' ) ? stockholm_qode_options()->getOptionValue( '404_title' ) : esc_html__( '404 - Page not found', 'stockholm' );
		}
		
		if ( stockholm_qode_is_woocommerce_shop() || is_singular( 'product' ) ) {
			$shop_id = stockholm_qode_get_woo_shop_page_id();
			$title   = ! empty( $shop_id ) ? get_the_title( $shop_id ) : esc_html__( 'Shop', 'stockholm' );
		} elseif ( ( function_exists( 'is_product_category' ) && is_product_category() ) || ( function_exists( 'is_product_tag' ) && is_product_tag() ) ) {
			$tax = get_queried_object();
			
			if ( ! empty( $tax ) ) {
				$title = $tax->name ;
			}
		}
		
		return apply_filters( 'stockholm_qode_filter_title_text', $title );
	}
}

if ( ! function_exists( 'stockholm_qode_is_custom_breadcrumbs_enabled' ) ) {
	function stockholm_qode_is_custom_breadcrumbs_enabled() {
		$page_id = stockholm_qode_get_page_id();
		
		$is_enabled = 'no';
		if ( get_post_meta( $page_id, "qode_enable_breadcrumbs", true ) != "" ) {
			$is_enabled = get_post_meta( $page_id, "qode_enable_breadcrumbs", true );
		} elseif ( stockholm_qode_options()->getOptionValue( 'enable_breadcrumbs' ) ) {
			$is_enabled = stockholm_qode_options()->getOptionValue( 'enable_breadcrumbs' );
		}
		
		return $is_enabled == "yes";
	}
}

if ( ! function_exists( 'stockholm_qode_custom_breadcrumbs' ) ) {
	function stockholm_qode_custom_breadcrumbs() {
		global $post;
		$homeLink  = esc_url( home_url( '/' )  );
		
		$pageid      = stockholm_qode_get_page_id();
		$shop_id     = stockholm_qode_get_woo_shop_page_id();
		$bread_style = "";
		if ( get_post_meta( $pageid, "qode_page_breadcrumbs_color", true ) != "" ) {
			$bread_style = " style='color:" . get_post_meta( $pageid, "qode_page_breadcrumbs_color", true ) . "';";
		}

		$showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter   = apply_filters( 'stockholm_qode_filter_breadcrumbs_delimiter', '<span class="delimiter"' . $bread_style . '>&nbsp;/&nbsp;</span>' ); // delimiter between crumbs
		$home        = esc_html( get_bloginfo('name') ); // text for the 'Home' link
		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before      = '<span class="current"' . $bread_style . '>'; // tag before the current crumb
		$after       = '</span>'; // tag after the current crumb
		$html        = '';
		
		if ( is_home() && ! is_front_page() ) {
			
			$html .= '<div class="breadcrumbs"><div class="breadcrumbs_inner"><a' . $bread_style . ' href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a>' . $delimiter . ' <a' . $bread_style . ' href="' . $homeLink . '">' . get_the_title( $pageid ) . '</a></div></div>';
			
		} elseif ( is_home() ) {
			
			if ( $showOnHome == 1 ) {
				$html .= '<div class="breadcrumbs"><div class="breadcrumbs_inner"><a' . $bread_style . ' href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a></div></div>';
			}
		} elseif ( is_front_page() ) {
			
			if ( $showOnHome == 1 ) {
				$html .= '<div class="breadcrumbs"><div class="breadcrumbs_inner"><a' . $bread_style . ' href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a></div></div>';
			}
		} else {
			
			$html .= '<div class="breadcrumbs"><div class="breadcrumbs_inner"><a' . $bread_style . ' href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a>' . $delimiter;
			
			if ( stockholm_qode_is_product_category() || stockholm_qode_is_product_tag() ) {
				
				if ( ! empty( $shop_id ) && $shop_id !== -1 ) {
					$html .= '<a itemprop="url" href="' . get_permalink( $shop_id ) . '">' . get_the_title( $shop_id ) . '</a>' . $delimiter;
				}
				
				$taxonomy_id        = get_queried_object_id();
				$taxonomy_type      = is_tax( 'product_tag' ) ? 'product_tag' : 'product_cat';
				$taxonomy           = ! empty( $taxonomy_id ) ? get_term_by( 'id', $taxonomy_id, $taxonomy_type ) : '';
				$taxonomy_parent_id = isset( $taxonomy->parent ) && $taxonomy->parent !== 0 ? $taxonomy->parent : '';
				$taxonomy_parent    = $taxonomy_parent_id !== '' ? get_term_by( 'id', $taxonomy_parent_id, $taxonomy_type ) : '';
				
				if ( ! empty( $taxonomy_parent ) ) {
					$html .= '<a itemprop="url" href="' . get_term_link( $taxonomy_parent->term_id ) . '">' . wp_kses_post( $taxonomy_parent->name ) . '</a>' . $delimiter;
				}
				
				if ( ! empty( $taxonomy ) ) {
					$html .= $before . esc_attr( $taxonomy->name ) . $after;
				}
			} elseif ( is_category() ) {
				$thisCat = get_category( get_query_var( 'cat' ), false );
				if ( isset( $thisCat->parent ) && $thisCat->parent != 0 ) {
					$html .= get_category_parents( $thisCat->parent, true, ' ' . $delimiter );
				}
				$html .= $before . single_cat_title( '', false ) . $after;
				
			} elseif ( is_search() ) {
				$html .= $before . esc_html__( 'Search results for "', 'stockholm' ) . get_search_query() . '"' . $after;
				
			} elseif ( is_day() ) {
				$html .= '<a' . $bread_style . ' href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $delimiter;
				$html .= '<a' . $bread_style . ' href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a>' . $delimiter;
				$html .= $before . get_the_time( 'd' ) . $after;
				
			} elseif ( is_month() ) {
				$html .= '<a' . $bread_style . ' href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $delimiter;
				$html .= $before . get_the_time( 'F' ) . $after;
				
			} elseif ( is_year() ) {
				$html .= $before . get_the_time( 'Y' ) . $after;
				
			} elseif ( is_singular( 'product' ) ) {
				$product      = wc_get_product( get_the_ID() );
				$categories   = ! empty( $product ) ? wc_get_product_category_list( $product->get_id(), ', ' ) : '';
				
				if ( ! empty( $shop_id ) && $shop_id !== -1 ) {
					$html .= '<a itemprop="url" href="' . get_permalink( $shop_id ) . '">' . get_the_title( $shop_id ) . '</a>' . $delimiter;
				}
				
				if ( ! empty( $categories ) ) {
					$html .= $categories . $delimiter;
				}
				
				$html .= $before . get_the_title() . $after;
				
			} elseif ( is_single() && ! is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					
					if ( $showCurrent == 1 ) {
						$html .= $before . get_the_title() . $after;
					}
				} else {
					$cat  = get_the_category();
					$cat  = $cat[0];
					$cats = get_category_parents( $cat, true, ' ' . $delimiter );
					if ( $showCurrent == 0 ) {
						$cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats );
					}
					$html .= $cats;
					if ( $showCurrent == 1 ) {
						$html .= $before . get_the_title() . $after;
					}
				}
				
			} elseif ( is_attachment() && ! $post->post_parent ) {
				if ( $showCurrent == 1 ) {
					$html .= $before . get_the_title() . $after;
				}
				
			} elseif ( is_attachment() ) {
				$parent = get_post( $post->post_parent );
				$cat    = get_the_category( $parent->ID );
				if ( $cat ) {
					$cat = $cat[0];
					$html .= get_category_parents( $cat, true, ' ' . $delimiter );
				}
				$html .= '<a' . $bread_style . ' href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a>';
				if ( $showCurrent == 1 ) {
					$html .= $delimiter . $before . get_the_title() . $after;
				}
				
			} elseif ( is_page() && ! $post->post_parent ) {
				if ( $showCurrent == 1 ) {
					$html .= $before . get_the_title() . $after;
				}
				
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id   = $post->post_parent;
				$breadcrumbs = array();
				while ( $parent_id ) {
					$page          = get_post( $parent_id );
					$breadcrumbs[] = '<a' . $bread_style . ' href="' . get_permalink( $page->ID ) . '">' . wp_kses_post( get_the_title( $page->ID ) ) . '</a>';
					$parent_id     = $page->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				for ( $i = 0; $i < count( $breadcrumbs ); $i ++ ) {
					$html .= $breadcrumbs[ $i ];
					if ( $i != count( $breadcrumbs ) - 1 ) {
						$html .= ' ' . $delimiter;
					}
				}
				if ( $showCurrent == 1 ) {
					$html .= $delimiter . $before . get_the_title() . $after;
				}
				
			} elseif ( is_tag() ) {
				$html .= $before . esc_html__( 'Posts tagged "', 'stockholm' ) . single_tag_title( '', false ) . '"' . $after;
				
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata( $author );
				$html .= $before . esc_html__( 'Articles posted by ', 'stockholm' ) . wp_kses_post( $userdata->display_name ) . $after;
				
			} elseif ( is_404() ) {
				$html .= $before . esc_html__( 'Error 404', 'stockholm' ) . $after;
			} elseif ( stockholm_qode_is_woocommerce_installed() && stockholm_qode_is_woocommerce_shop() ) {
				$html .= $before . get_the_title( $shop_id ) . $after;
			}
			
			$html .= '</div></div>';
		}
		
		echo wp_kses( $html, array(
			'div'  => array(
				'id'    => true,
				'class' => true,
				'style' => true
			),
			'span' => array(
				'class' => true,
				'id'    => true,
				'style' => true
			),
			'a'    => array(
				'class' => true,
				'id'    => true,
				'href'  => true,
				'style' => true
			)
		) );
	}
}

if ( ! function_exists( 'stockholm_qode_title_classes' ) ) {
	/**
	 * Function that adds classes to title div.
	 * All other functions are tied to it with add_filter function
	 *
	 * @return string
	 */
	function stockholm_qode_title_classes() {
		$classes = apply_filters( 'stockholm_qode_filter_title_classes', $classes = array() );
		
		if ( is_array( $classes ) && count( $classes ) ) {
			echo implode( ' ', $classes );
		}
	}
}

if ( ! function_exists( 'stockholm_qode_title_position_class' ) ) {
	/**
	 * Function that adds class on title based on title position option
	 * Could be left, centered or right
	 *
	 * @param $classes array of classes
	 *
	 * @return array changed array of classes
	 */
	function stockholm_qode_title_position_class( $classes ) {
		$page_id = stockholm_qode_get_page_id();
		
		$title_position = stockholm_qode_options()->getOptionValue( 'page_title_position' );
		if ( get_post_meta( $page_id, "qode_page_title_position", true ) != "" ) {
			$title_position = get_post_meta( $page_id, "qode_page_title_position", true );
		}
		
		if ( ! empty( $title_position ) ) {
			$classes[] = 'position_' . esc_attr( $title_position );
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_title_classes', 'stockholm_qode_title_position_class' );
}

if ( ! function_exists( 'stockholm_qode_title_background_image_classes' ) ) {
	function stockholm_qode_title_background_image_classes( $classes ) {
		$page_id = stockholm_qode_get_page_id();
		
		//is responsive image is set for current page?
		if ( get_post_meta( $page_id, "qode_responsive-title-image", true ) != "" ) {
			$is_img_responsive = get_post_meta( $page_id, "qode_responsive-title-image", true );
		} else {
			//take value from theme options
			$is_img_responsive = stockholm_qode_options()->getOptionValue( 'responsive_title_image' );
		}
		
		//is title image chosen for current page?
		if ( get_post_meta( $page_id, "qode_title-image", true ) != "" ) {
			$title_img = get_post_meta( $page_id, "qode_title-image", true );
		} else {
			//take image that is set in theme options
			$title_img = stockholm_qode_options()->getOptionValue( 'title_image' );
		}
		
		//is image set to be fixed for current page?
		if ( get_post_meta( $page_id, "qode_fixed-title-image", true ) != "" ) {
			$is_image_fixed = get_post_meta( $page_id, "qode_fixed-title-image", true );
		} else {
			//take setting from theme options
			$is_image_fixed = stockholm_qode_options()->getOptionValue( 'fixed_title_image' );
		}
		
		//is title image hidden for current page?
		$show_title_img = true;
		if ( get_post_meta( $page_id, "qode_show-page-title-image", true ) == "yes" ) {
			$show_title_img = false;
		}
		
		//is title image set and visible?
		if ( ! empty( $title_img ) && $show_title_img == true ) {
			$is_image_fixed_array = array( 'yes', 'yes_zoom' );
			
			//is image not responsive and parallax title is set?
			if ( $is_img_responsive == 'no' && in_array( $is_image_fixed, $is_image_fixed_array ) ) {
				$classes[] = 'has_fixed_background';
				
				if ( $is_image_fixed == 'yes_zoom' ) {
					$classes[] = 'zoom_out';
				}
			} //is image not responsive and parallax title isn't set?
			elseif ( $is_img_responsive == 'no' ) {
				$classes[] = 'has_background';
			}
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_title_classes', 'stockholm_qode_title_background_image_classes' );
}

if ( ! function_exists( 'stockholm_qode_title_text_is_hidden_class' ) ) {
	function stockholm_qode_title_text_is_hidden_class( $classes ) {
		$page_id = stockholm_qode_get_page_id();
		
		if ( get_post_meta( $page_id, "qode_show-page-title-text", true ) == "yes" ) {
			$classes[] = 'without_title_text';
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_title_classes', 'stockholm_qode_title_text_is_hidden_class' );
}

if ( ! function_exists( 'stockholm_qode_title_breadcrumb_type_class' ) ) {
	function stockholm_qode_title_breadcrumb_type_class( $classes ) {
		$page_id    = stockholm_qode_get_page_id();
		$title_type = "standard_title";
		
		if ( get_post_meta( $page_id, "qode_page_title_type", true ) != "" ) {
			$title_type = get_post_meta( $page_id, "qode_page_title_type", true );
		} else if ( is_404() ) {
			$title_type = "breadcrumbs_title";
		} else {
			$title_type = stockholm_qode_options()->getOptionValue( 'title_type' );
		}
		
		if ( ! empty( $title_type ) ) {
			$classes[] = $title_type;
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_title_classes', 'stockholm_qode_title_breadcrumb_type_class' );
}

if ( ! function_exists( 'stockholm_qode_title_breadcrumb_position_class' ) ) {
	function stockholm_qode_title_breadcrumb_position_class( $classes ) {

		$title_type = stockholm_qode_get_meta_field_intersect('title_type');
		$breadcrumbs_position = stockholm_qode_get_meta_field_intersect('title_breadcrumbs_postiion');

		if($title_type == 'standard_title' && stockholm_qode_is_custom_breadcrumbs_enabled() &&  $breadcrumbs_position == 'right_from_title' ){
			$classes[] = 'breadcrumbs_right_from_title';
		}
		return $classes;
	}

	add_filter( 'stockholm_qode_filter_title_classes', 'stockholm_qode_title_breadcrumb_position_class' );
}

if ( ! function_exists( 'stockholm_qode_title_background_color_class' ) ) {
	function stockholm_qode_title_background_color_class( $classes ) {
		$page_id = stockholm_qode_get_page_id();
		
		//is title image chosen for current page?
		if ( get_post_meta( $page_id, "qode_title-image", true ) != "" ) {
			$title_img = get_post_meta( $page_id, "qode_title-image", true );
		} else {
			//take image that is set in theme options
			$title_img = stockholm_qode_options()->getOptionValue( 'title_image' );
		}
		
		//is title background color set?
		if ( get_post_meta( $page_id, "qode_page-title-background-color", true ) != "" ) {
			$title_bg_color = get_post_meta( $page_id, "qode_page-title-background-color", true );
		} else {
			//take background color from
			$title_bg_color = stockholm_qode_options()->getOptionValue( 'title_background_color' );
		}
		
		if ( $title_bg_color !== '' && empty( $title_img ) ) {
			$classes[] = 'with_background_color';
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_title_classes', 'stockholm_qode_title_background_color_class' );
}

if ( ! function_exists( 'stockholm_qode_title_text_background_class' ) ) {
	function stockholm_qode_title_text_background_class( $classes ) {
		$page_id = stockholm_qode_get_page_id();
		
		$title_class = '';
		if ( get_post_meta( $page_id, "qode_page-title-text-background-color", true ) != "" ) {
			$title_class = 'with_title_text_bg_color';
		} else if ( stockholm_qode_options()->getOptionValue( 'title_text_background_color' ) != '' ) {
			$title_class = "with_title_text_bg_color";
		}
		
		if ( ! empty( $title_class ) ) {
			$classes[] = $title_class;
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_title_classes', 'stockholm_qode_title_text_background_class' );
}