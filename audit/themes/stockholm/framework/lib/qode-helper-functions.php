<?php

if ( ! function_exists( 'stockholm_qode_return_toolbar_variable' ) ) {
	function stockholm_qode_return_toolbar_variable() {
		global $qode_toolbar;
		
		return $qode_toolbar;
	}
}

if ( ! function_exists( 'stockholm_qode_return_landing_variable' ) ) {
	function stockholm_qode_return_landing_variable() {
		global $qode_landing;
		
		return $qode_landing;
	}
}

if ( ! function_exists( 'stockholm_qode_return_global_options' ) ) {
	function stockholm_qode_return_global_options() {
		global $stockholm_qode_options;
		
		return $stockholm_qode_options;
	}
}

if ( ! function_exists( 'stockholm_qode_get_module_part' ) ) {
	function stockholm_qode_get_module_part( $module ) {
		return $module;
	}
}

if ( ! function_exists( 'stockholm_qode_is_core_installed' ) ) {
	/**
	 * Function that checks if Core plugin is installed
	 * @return bool
	 */
	function stockholm_qode_is_core_installed() {
		return class_exists( 'StockholmCore' );
	}
}

if ( ! function_exists( 'stockholm_qode_contact_form_7_installed' ) ) {
	/**
	 * Function that checks if contact form 7 installed
	 * @return bool
	 */
	function stockholm_qode_contact_form_7_installed() {
		return defined( 'WPCF7_VERSION' );
	}
}

if ( ! function_exists( 'stockholm_qode_layer_slider_installed' ) ) {
	/**
	 * Function that checks if layer slider installed
	 * @return bool
	 */
	function stockholm_qode_layer_slider_installed() {
		return defined( 'LS_PLUGIN_VERSION' );
	}
}

if ( ! function_exists( 'stockholm_qode_is_wpml_installed' ) ) {
	/**
	 * Function that checks if WPML plugin is installed
	 * @return bool
	 *
	 * @version 0.1
	 */
	function stockholm_qode_is_wpml_installed() {
		return defined( 'ICL_SITEPRESS_VERSION' );
	}
}

if ( ! function_exists( 'stockholm_qode_visual_composer_installed' ) ) {
	/**
	 * Function that checks if visual composer installed
	 * @return bool
	 */
	function stockholm_qode_visual_composer_installed() {
		return class_exists( 'WPBakeryVisualComposerAbstract' );
	}
}

if ( ! function_exists( 'stockholm_qode_get_vc_version' ) ) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function stockholm_qode_get_vc_version() {
		if ( stockholm_qode_visual_composer_installed() ) {
			return WPB_VC_VERSION;
		}
		
		return false;
	}
}

if ( ! function_exists( 'stockholm_qode_is_page_transition_enabled' ) ) {
	function stockholm_qode_is_page_transition_enabled() {
		return stockholm_qode_options()->getOptionValue( 'page_transitions' ) !== '0' && ! stockholm_qode_vc_grid_elements_enabled();
	}
}

if ( ! function_exists( 'stockholm_qode_vc_grid_elements_enabled' ) ) {
	/**
	 * Function that checks if Visual Composer Grid Elements are enabled
	 *
	 * @return bool
	 */
	function stockholm_qode_vc_grid_elements_enabled() {
		return stockholm_qode_options()->getOptionValue( 'enable_grid_elements' ) == 'yes';
	}
}

if ( ! function_exists( 'stockholm_qode_visual_composer_grid_elements' ) ) {
	/**
	 * Removes Visual Composer Grid Elements post type if VC Grid option disabled
	 * and enables Visual Composer Grid Elements post type
	 * if VC Grid option enabled
	 */
	function stockholm_qode_visual_composer_grid_elements() {
		
		if ( ! stockholm_qode_vc_grid_elements_enabled() ) {
			remove_action( 'init', 'vc_grid_item_editor_create_post_type' );
		}
	}
	
	add_action( 'vc_after_init', 'stockholm_qode_visual_composer_grid_elements', 12 );
}

if ( ! function_exists( 'stockholm_qode_grid_elements_ajax_disable' ) ) {
	/**
	 * Function that disables ajax transitions if grid elements are enabled in theme options
	 */
	function stockholm_qode_grid_elements_ajax_disable() {
		
		if ( stockholm_qode_vc_grid_elements_enabled() ) {
			stockholm_qode_options()->addOption('page_transitions', '0');
		}
	}
	
	add_action( 'wp', 'stockholm_qode_grid_elements_ajax_disable' );
}

if ( ! function_exists( 'stockholm_qode_visual_composer_custom_shortcodce_css' ) ) {
	function stockholm_qode_visual_composer_custom_shortcodce_css() {
		if ( stockholm_qode_visual_composer_installed() ) {
			$page_id   = stockholm_qode_get_page_id();
			$animation = stockholm_qode_get_animation_name();
			
			if ( stockholm_qode_is_page_transition_enabled() || $animation == "updown" || $animation == "fade" || $animation == "updown_fade" || $animation == "leftright" ) {
				
				if ( is_page() || is_single() || is_singular( 'portfolio_page' ) ) {
					$shortcodes_custom_css = get_post_meta( $page_id, '_wpb_shortcodes_custom_css', true );
					if ( ! empty( $shortcodes_custom_css ) ) {
						echo '<style type="text/css" data-type="vc_shortcodes-custom-css-' . $page_id . '">';
						echo get_post_meta( $page_id, '_wpb_shortcodes_custom_css', true );
						echo '</style>';
					}
					
					$post_custom_css = get_post_meta( $page_id, '_wpb_post_custom_css', true );
					if ( ! empty( $post_custom_css ) ) {
						echo '<style type="text/css" data-type="vc_custom-css-' . $page_id . '">';
						echo get_post_meta( $page_id, '_wpb_post_custom_css', true );
						echo '</style>';
					}
				}
			}
		}
	}
	
	add_action( 'stockholm_qode_action_after_content_inner', 'stockholm_qode_visual_composer_custom_shortcodce_css' );
}

if ( ! function_exists( 'stockholm_qode_get_animation_name' ) ) {
	function stockholm_qode_get_animation_name() {
		$page_id   = stockholm_qode_get_page_id();
		$animation = get_post_meta( $page_id, "qode_show-animation", true );
		
		if ( ! empty( $_SESSION['qode_animation'] ) && $animation == "" ) {
			$animation = $_SESSION['qode_animation'];
		}
		
		return $animation;
	}
}

if ( ! function_exists( 'stockholm_qode_add_inline_html_after_content' ) ) {
	function stockholm_qode_add_inline_html_after_content() {
		$animation = stockholm_qode_get_animation_name();
		
		if ( stockholm_qode_is_page_transition_enabled() || $animation == "updown" || $animation == "fade" || $animation == "updown_fade" || $animation == "leftright" ) { ?>
			<div class="meta">
				<?php do_action( 'stockholm_qode_action_ajax_meta' ); ?>
				
				<span id="qode_page_id"><?php echo esc_attr( stockholm_qode_get_page_id() ); ?></span>
				<div class="body_classes"><?php echo esc_html( implode( ',', get_body_class() ) ); ?></div>
			</div>
		<?php }
	}
	
	add_action( 'stockholm_qode_action_after_content', 'stockholm_qode_add_inline_html_after_content' );
}

if ( ! function_exists( 'stockholm_qode_add_content_classes' ) ) {
	function stockholm_qode_add_content_classes( $classes ) {
		$page_id     = stockholm_qode_get_page_id();
		$new_classes = array();
		
		$header_transparency      = stockholm_qode_options()->getOptionValue( 'header_background_transparency_initial' );
		$header_transparency_meta = get_post_meta( $page_id, 'qode_header_color_transparency_per_page', true );
		if ( $header_transparency_meta !== false && $header_transparency_meta !== '' ) {
			$header_transparency = $header_transparency_meta;
		}
		
		$header_transparency_search = true;
		if ( ( is_search() || is_404() ) && stockholm_qode_options()->getOptionValue( 'header_background_transparency_initial' ) !== "" && stockholm_qode_options()->getOptionValue( 'header_background_transparency_initial' ) != '1' ) {
			$header_transparency_search = false;
		}
		
		$header_background_is_solid = $header_transparency === '' || $header_transparency == 1;
		$header_bottom_appearance   = stockholm_qode_get_header_bottom_appearance();
		
		if ( stockholm_qode_is_content_below_header() ) {
			
			if ( ( $header_bottom_appearance == "fixed" || $header_bottom_appearance == "fixed_hiding" ) && $header_background_is_solid ) {
				$new_classes[] = "content_top_margin";
			} else {
				$new_classes[] = "content_top_margin_none";
			}
		} elseif ( ( get_post_meta( $page_id, "qode_revolution-slider", true ) == "" && stockholm_qode_is_title_area_visible() && $header_background_is_solid ) || ( ( is_search() || is_404() ) && stockholm_qode_is_title_area_visible() && $header_transparency_search ) || ( $header_bottom_appearance == "regular" && $header_background_is_solid ) ) {
			if ( ( $header_bottom_appearance == "fixed" || $header_bottom_appearance == "fixed_hiding" ) && $header_background_is_solid ) {
				$new_classes[] = "content_top_margin";
			} else {
				$new_classes[] = "content_top_margin_none";
			}
		}
		
		return $classes . ' ' . implode( ' ', $new_classes );
	}
	
	add_filter( 'stockholm_qode_filter_content_classes', 'stockholm_qode_add_content_classes' );
}

if ( ! function_exists( 'stockholm_qode_add_content_inner_classes' ) ) {
	function stockholm_qode_add_content_inner_classes( $classes ) {
		$animation = stockholm_qode_get_animation_name();
		
		if ( ! empty( $animation ) ) {
			$classes .= ' ' . $animation;
		}
		
		return $classes;
	}
	
	add_filter( 'stockholm_qode_filter_content_inner_classes', 'stockholm_qode_add_content_inner_classes' );
}

if ( ! function_exists( 'stockholm_qode_is_woocommerce_installed' ) ) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function stockholm_qode_is_woocommerce_installed() {
		return function_exists( 'is_woocommerce' );
	}
}

if ( ! function_exists( 'stockholm_qode_is_woocommerce_shop' ) ) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function stockholm_qode_is_woocommerce_shop() {
		return function_exists( 'is_shop' ) && ( is_shop() || is_product() );
	}
}

if ( ! function_exists( 'stockholm_qode_is_woocommerce_page' ) ) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function stockholm_qode_is_woocommerce_page() {
		return function_exists( 'is_woocommerce' ) && is_woocommerce();
	}
}

if ( ! function_exists( 'stockholm_qode_is_product_category' ) ) {
	function stockholm_qode_is_product_category() {
		return function_exists( 'is_product_category' ) && is_product_category();
	}
}

if ( ! function_exists( 'stockholm_qode_is_product_tag' ) ) {
	function stockholm_qode_is_product_tag() {
		return function_exists( 'is_product_tag' ) && is_product_tag();
	}
}

if ( ! function_exists( 'stockholm_qode_get_woo_shop_page_id' ) ) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function stockholm_qode_get_woo_shop_page_id() {
		if ( stockholm_qode_is_woocommerce_installed() ) {
			$shop_id = get_option( 'woocommerce_shop_page_id' );
			$page_id = ! empty( $shop_id ) ? $shop_id : '-1';

			return $page_id;
		}
		
		return 0;
	}
}

if ( ! function_exists( 'stockholm_qode_get_page_id' ) ) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see stockholm_qode_is_woocommerce_installed()
	 * @see stockholm_qode_is_woocommerce_shop()
	 */
	function stockholm_qode_get_page_id() {
		if ( stockholm_qode_is_woocommerce_installed() && ( stockholm_qode_is_woocommerce_shop() || stockholm_qode_is_product_category() || stockholm_qode_is_product_tag() ) ) {
			return stockholm_qode_get_woo_shop_page_id();
		}
		
		if ( stockholm_qode_is_archive_page() ) {
			return - 1;
		}
		
		return get_queried_object_id();
	}
}

if ( ! function_exists( 'stockholm_qode_is_archive_page' ) ) {
	/**
	 * Function that checks if current page archive page, search, 404 or default home blog page
	 * @return bool
	 *
	 * @see is_archive()
	 * @see is_search()
	 * @see is_404()
	 * @see is_front_page()
	 * @see is_home()
	 */
	function stockholm_qode_is_archive_page() {
		return is_archive() || is_search() || is_404() || ( is_front_page() && is_home() );
	}
}

if ( ! function_exists( 'stockholm_qode_get_custom_sidebars' ) ) {
	function stockholm_qode_get_custom_sidebars() {
		$custom_sidebars      = array();
		$custom_sidebars_meta = get_option( 'qode_sidebars' );
		
		if ( is_array( $custom_sidebars_meta ) && count( $custom_sidebars_meta ) ) {
			foreach ( $custom_sidebars_meta as $sidebar ) {
				$custom_sidebars[ sanitize_title( $sidebar ) ] = $sidebar;
			}
		}
		
		return $custom_sidebars;
	}
}

if ( ! function_exists( 'stockholm_qode_get_sidebar_layout' ) ) {
	function stockholm_qode_get_sidebar_layout( $default_value = true ) {
		$qode_page_id      = stockholm_qode_get_page_id();
		$show_sidebar_meta = get_post_meta( $qode_page_id, "qode_show-sidebar", true );
		$sidebar           = $default_value ? stockholm_qode_options()->getOptionValue( 'category_blog_sidebar' ) : '';
		
		if ( stockholm_qode_is_archive_page() && ! ( stockholm_qode_is_woocommerce_shop() || stockholm_qode_is_product_category() || stockholm_qode_is_product_tag() ) ) {
			$show_sidebar_meta = '';
		}
		
		if ( ! empty( $show_sidebar_meta ) ) {
			$sidebar = $show_sidebar_meta;
		}
		
		if ( is_singular( 'post' ) && ( $show_sidebar_meta === 'default' || empty( $show_sidebar_meta ) ) ) {
			$sidebar = stockholm_qode_options()->getOptionValue( 'blog_single_sidebar' );
		}
		
		if ( is_singular( 'portfolio_page' ) ) {
			$show_portfolio_sidebar_meta = get_post_meta( $qode_page_id, "qode_portfolio_show_sidebar", true );
			
			if ( ! empty( $show_portfolio_sidebar_meta ) && $show_portfolio_sidebar_meta != "default" ) {
				$sidebar = $show_portfolio_sidebar_meta;
			} elseif ( stockholm_qode_options()->getOptionValue( 'portfolio_single_sidebar' ) ) {
				$sidebar = stockholm_qode_options()->getOptionValue( 'portfolio_single_sidebar' );
			}
		}
		
		if ( ! empty( $sidebar ) && ! is_active_sidebar( stockholm_qode_get_sidebar_name() ) ) {
			$sidebar = '';
		}
		
		return $sidebar;
	}
}

if ( ! function_exists( 'stockholm_qode_get_sidebar_name' ) ) {
	function stockholm_qode_get_sidebar_name() {
		$page_id = stockholm_qode_get_page_id();
		
		if ( get_post_meta( $page_id, 'qode_choose-sidebar', true ) != "" ) {
			$sidebar = get_post_meta( $page_id, 'qode_choose-sidebar', true );
		} else {
			if ( is_singular( "post" ) ) {
				if ( stockholm_qode_options()->getOptionValue( 'blog_single_sidebar_custom_display' ) != "" ) {
					$sidebar = stockholm_qode_options()->getOptionValue( 'blog_single_sidebar_custom_display' );
				} else {
					$sidebar = 'sidebar';
				}
			} elseif ( is_singular( "portfolio_page" ) && stockholm_qode_options()->getOptionValue( 'portfolio_single_sidebar_custom_display' ) != "" ) {
				$sidebar = stockholm_qode_options()->getOptionValue( 'portfolio_single_sidebar_custom_display' );
			} else {
				$sidebar = 'sidebar_page';
			}
		}
		
		return $sidebar;
	}
}

if ( ! function_exists( 'stockholm_qode_is_author_info_enabled' ) ) {
	function stockholm_qode_is_author_info_enabled() {
		$is_disabled = "no";
		
		if ( stockholm_qode_options()->getOptionValue( 'blog_hide_author' ) ) {
			$is_disabled = stockholm_qode_options()->getOptionValue( 'blog_hide_author' );
		}
		
		return $is_disabled === 'no';
	}
}

if ( ! function_exists( 'stockholm_qode_is_comments_enabled' ) ) {
	function stockholm_qode_is_comments_enabled( $is_portfolio = false ) {
		$is_disabled = "";
		
		if ( stockholm_qode_options()->getOptionValue( 'blog_hide_comments' ) && ! $is_portfolio ) {
			$is_disabled = stockholm_qode_options()->getOptionValue( 'blog_hide_comments' );
		}
		
		if ( $is_portfolio ) {
			
			if ( get_post_meta( get_the_ID(), "qode_portfolio-hide-comments", true ) == "yes" ) {
				$is_disabled = "yes";
			} elseif ( stockholm_qode_options()->getOptionValue( 'portfolio_hide_comments' ) ) {
				$is_disabled = stockholm_qode_options()->getOptionValue( 'portfolio_hide_comments' );
			}
		}
		
		if ( ! comments_open() ) {
			$is_disabled = 'yes';
		}
		
		return $is_disabled !== 'yes';
	}
}

if ( ! function_exists( 'stockholm_qode_get_comments_template' ) ) {
	function stockholm_qode_get_comments_template( $is_full_width = false, $is_single = false ) {
		$qode_page_id = stockholm_qode_get_page_id();
		
		$enable_page_comments = false;
		if ( get_post_meta( $qode_page_id, "qode_enable-page-comments", true ) ) {
			$enable_page_comments = true;
		}
		
		if ( $is_single ) {
			if ( stockholm_qode_options()->getOptionValue( 'blog_single_hide_comments' ) !== 'yes' ) {
				$enable_page_comments = true;
			} else {
				$enable_page_comments = false;
			}
		}
		
		if ( stockholm_qode_options()->getOptionValue( 'page_hide_comments' ) === 'yes' && ( $is_full_width || is_page() ) ) {
			$enable_page_comments = false;
		}
		
		if ( $enable_page_comments ) { ?>
			<?php if( $is_full_width ) { ?>
				<div class="container">
				<div class="container_inner">
			<?php } ?>
			<?php comments_template( '', true ); ?>
			<?php if( $is_full_width ) { ?>
				</div>
				</div>
			<?php } ?>
		<?php }
	}
}

if ( ! function_exists( 'stockholm_qode_comment' ) ) {
	function stockholm_qode_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		
		$is_pingback_comment = $comment->comment_type == 'pingback';
		
		$comment_class = 'comment';
		
		if ( $is_pingback_comment ) {
			$comment_class .= ' pingback-comment';
		}
		?>
		<li>
		<div class="<?php echo esc_attr( $comment_class ); ?>">
			<?php if ( ! $is_pingback_comment ) { ?>
				<div class="image"> <?php echo get_avatar( $comment, 102 ); ?> </div>
			<?php } ?>
			<div class="text">
				<div class="comment_info">
					<h4 class="name"><?php if ( $is_pingback_comment ) { esc_html_e( 'Pingback:', 'stockholm' ); } ?><?php echo get_comment_author_link(); ?></h4>
					<span class="comment_date"><?php comment_time( get_option( 'date_format' ) ); ?> <?php esc_html_e( 'at', 'stockholm' ); ?> <?php comment_time( get_option( 'time_format' ) ); ?></span>
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
				<?php if ( ! $is_pingback_comment ) { ?>
					<div class="text_holder" id="comment-<?php echo esc_attr( comment_ID() ); ?>">
						<?php comment_text(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'stockholm' ); ?></em></p>
		<?php endif; ?>
		<?php
	}
}

if ( ! function_exists( 'stockholm_qode_is_social_share_enabled' ) ) {
	function stockholm_qode_is_social_share_enabled() {
		$is_enabled = "no";
		
		if ( stockholm_qode_options()->getOptionValue( 'enable_social_share' ) ) {
			$is_enabled = stockholm_qode_options()->getOptionValue( 'enable_social_share' );
		}
		
		if ( ! stockholm_qode_is_core_installed() ) {
			$is_enabled = 'no';
		}
		
		return $is_enabled === 'yes';
	}
}

if ( ! function_exists( 'stockholm_qode_is_like_enabled' ) ) {
	function stockholm_qode_is_like_enabled( $is_portfolio = false ) {
		$is_enabled = "on";
		
		if ( stockholm_qode_options()->getOptionValue( 'qode_like' ) && ! $is_portfolio ) {
			$is_enabled = stockholm_qode_options()->getOptionValue( 'qode_like' );
		}
		
		if ( stockholm_qode_options()->getOptionValue( 'portfolio_qode_like' ) && $is_portfolio ) {
			$is_enabled = stockholm_qode_options()->getOptionValue( 'portfolio_qode_like' );
		}
		
		if ( ! stockholm_qode_is_core_installed() ) {
			$is_enabled = 'off';
		}
		
		return $is_enabled === 'on';
	}
}

if ( ! function_exists( 'stockholm_qode_get_like_template' ) ) {
	function stockholm_qode_get_like_template( $is_portfolio = false, $project_id = -1 ) {
		$html = '';
		
		if ( stockholm_qode_is_like_enabled( $is_portfolio ) ) {
			if ( $is_portfolio ) {
				$html = stockholm_qode_like_portfolio_list( $project_id );
			} else {
				$html = stockholm_qode_get_like();
			}
		}
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_the_excerpt_max_charlength' ) ) {
	/**
	 * Function that sets character length for social share shortcode
	 *
	 * @param $charlength string original text
	 *
	 * @return string shortened text
	 */
	function stockholm_qode_the_excerpt_max_charlength( $charlength ) {
		$via = '';
		if ( stockholm_qode_options()->getOptionValue( 'twitter_via' ) ) {
			$via = sprintf( esc_html__( ' via %s', 'stockholm' ), stockholm_qode_options()->getOptionValue( 'twitter_via' ) );
		}
		
		$excerpt    = get_the_excerpt();
		$charlength = 140 - ( mb_strlen( $via ) + $charlength );
		
		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex   = mb_substr( $excerpt, 0, $charlength );
			$exwords = explode( ' ', $subex );
			$excut   = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				return mb_substr( $subex, 0, $excut );
			} else {
				return $subex;
			}
		} else {
			return $excerpt;
		}
	}
}

if ( ! function_exists( 'stockholm_qode_is_content_below_header' ) ) {
	/**
	 * Function that check is content below header on page
	 *
	 * @param none
	 *
	 * @return true/false
	 */
	function stockholm_qode_is_content_below_header() {
		$page_id = stockholm_qode_get_page_id();
		
		$content_below_header = false;
		if ( get_post_meta( $page_id, "qode_enable_content_top_margin", true ) === 'yes' ) {
			$content_below_header = true;
		} elseif ( get_post_meta( $page_id, "qode_enable_content_top_margin", true ) === 'no' ) {
			$content_below_header = false;
		} else {
			if ( stockholm_qode_options()->getOptionValue( 'enable_content_top_margin' ) === 'yes' ) {
				$content_below_header = true;
			} elseif ( stockholm_qode_options()->getOptionValue( 'enable_content_top_margin' ) === 'no' ) {
				$content_below_header = false;
			}
		}
		
		return $content_below_header;
	}
}

if ( ! function_exists( 'stockholm_qode_inline_page_background_style' ) ) {
	function stockholm_qode_inline_page_background_style( $additional_css = false ) {
		$page_id = stockholm_qode_get_page_id();
		$style   = array();
		
		$background_color = get_post_meta( $page_id, "qode_page_background_color", true );
		
		if ( ! empty( $background_color ) ) {
			$style[] = 'background-color:' . esc_attr( $background_color );
		}
		
		if ( $additional_css ) {
			$header_bottom_appearance = stockholm_qode_get_header_bottom_appearance();
			
			if ( ! stockholm_qode_is_vertical_header_enabled() ) {
				if ( $header_bottom_appearance == 'regular' || $header_bottom_appearance == 'stick' || $header_bottom_appearance == 'stick_with_left_right_menu' ) {
					$header_height_meta = stockholm_qode_options()->getOptionValue( 'header_height' );
					$header_height      = ! empty( $header_height_meta ) ? $header_height_meta : 100;
					
					$style[] = "margin-top:" . - intval( $header_height ) . "px;";
				}
			}
		}
		
		if ( ! empty( $style ) ) {
			echo stockholm_qode_get_inline_style( $style );
		}
	}
}

if ( ! function_exists( 'stockholm_qode_inline_page_padding_style' ) ) {
	function stockholm_qode_inline_page_padding_style() {
		$page_id = stockholm_qode_get_page_id();
		$style   = array();
		
		$content_padding = get_post_meta( $page_id, "qode_content-top-padding", true );
		$is_mobile_check = get_post_meta( $page_id, "qode_content-top-padding-mobile", true);
		$padding_suffix  = $is_mobile_check === 'yes' ? '!important' : '';
		
		if ( $content_padding !== '' ) {
			$style[] = 'padding-top:' . intval( $content_padding ) . 'px' . $padding_suffix;
		}
		
		if ( ! empty( $style ) ) {
			echo stockholm_qode_get_inline_style( $style );
		}
	}
}

if ( ! function_exists( 'stockholm_get_carousel_slider_array' ) ) {
	function stockholm_get_carousel_slider_array() {
		$carousel_output = array( "" => "" );
		$terms           = get_terms( 'carousels_category' );
		
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ):
			foreach ( $terms as $term ):
				$carousel_output[ $term->name ] = $term->slug;
			endforeach;
		endif;
		
		return $carousel_output;
	}
}

if ( ! function_exists( 'stockholm_qode_is_elementor_installed' ) ) {
	/**
	 * Function that checks if elementor is installed
	 * @return bool
	 */
	function stockholm_qode_is_elementor_installed() {
		return defined('ELEMENTOR_VERSION');
	}
}

if ( ! function_exists( 'stockholm_qode_is_contact_form_7_installed' ) ) {
	/**
	 * Function that checks if constct form 7 is installed
	 * @return bool
	 */
	function stockholm_qode_is_contact_form_7_installed() {
		return defined('WPCF7_VERSION');
	}
}

if( ! function_exists('stockholm_qode_get_page_background_image') ){
    function stockholm_qode_get_page_background_image( $style ){
        $page_id      = stockholm_qode_get_page_id();
        $class_prefix = stockholm_qode_get_unique_page_class( $page_id, true );

        $container_selector = array(
            $class_prefix . ' .wrapper'
        );

        $bg_color_remove_selectors = array(
            $class_prefix,
            $class_prefix . ' .wrapper',
            $class_prefix . ' .content',
            $class_prefix . ' .full_width',
            $class_prefix . ' .content .container',
            $class_prefix . ' .more_facts_holder'
        );

        $container_class       = array();
        $bg_color_remove_class = array();

        $page_background_image_url = get_post_meta( $page_id, 'qode_page_background_image', true );

        if ( !empty($page_background_image_url) ) {
            $container_class['background-image'] = "url(" . $page_background_image_url . ")";
            $container_class['background-size'] = "cover";
            $container_class['background-position'] = 'center 0px';
            $container_class['background-repeat'] = 'no-repeat';
            $container_class['background-attachment'] = 'initial';

            $bg_color_remove_class['background-color'] = 'transparent !important;';
        }

        $current_style = stockholm_qode_dynamic_css( $container_selector, $container_class );
        $current_style .= stockholm_qode_dynamic_css( $bg_color_remove_selectors, $bg_color_remove_class );

        $style[] = $current_style;

        return $style;
    }

    add_filter( 'stockholm_qode_filter_add_page_custom_style', 'stockholm_qode_get_page_background_image' );
}

if( ! function_exists('stockholm_qode_generate_portfolio_xml') ){
	function stockholm_qode_generate_portfolio_xml( $stockholm_qode_url ){
		global $wp_filesystem;
		if( empty($wp_filesystem) ) {
			require_once (ABSPATH . '/wp-admin/includes/file.php');
			WP_Filesystem();
		}

		return $wp_filesystem->get_contents($stockholm_qode_url);
	}
}
