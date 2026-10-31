<?php

// Adds theme support for woocommerce
add_theme_support( 'woocommerce' );

//Disable the default WooCommerce stylesheet.
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

if ( ! function_exists( 'stockholm_qode_woo_related_products_args' ) ) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 *
	 * @param $args array array of args for the query
	 *
	 * @return mixed array of changed args
	 */
	function stockholm_qode_woo_related_products_args( $args ) {
		$args['posts_per_page'] = 4;
		
		return $args;
	}
	
	add_filter( 'woocommerce_output_related_products_args', 'stockholm_qode_woo_related_products_args' );
}

if ( ! function_exists( 'stockholm_qode_woo_upsell_products_args' ) ) {
	function stockholm_qode_woo_upsell_products_args( $args ) {
		$args['posts_per_page'] = 4;
		
		return $args;
	}
	
	add_filter( 'woocommerce_upsell_display_args', 'stockholm_qode_woo_upsell_products_args' );
}

// Define number of products per page.
if ( ! function_exists( 'stockholm_qode_woo_product_per_page' ) ) {
	/**
	 * Function that sets number of products per page. Default is 12
	 * @return int number of products to be shown per page
	 */
	function stockholm_qode_woo_product_per_page() {
		$products_per_page = stockholm_qode_options()->getOptionValue( 'woo_products_per_page' );
		
		return ! empty( $products_per_page ) ? intval( $products_per_page ) : 12;
	}
	
	add_filter( 'loop_shop_per_page', 'stockholm_qode_woo_product_per_page', 20 );
}

// Define number of products per page.
if ( ! function_exists( 'stockholm_qode_woo_add_class_to_image_gallery' ) ) {
	function stockholm_qode_woo_add_class_to_image_gallery( $classes ) {
		
		if ( stockholm_qode_options()->getOptionValue( 'woo_product_single_enable_default_gallery_features' ) == 'yes' ) {
			$classes[] = 'qode-add-gallery-and-zoom-support';
		}
		
		return $classes;
	}
	
	add_filter( 'woocommerce_single_product_image_gallery_classes', 'stockholm_qode_woo_add_class_to_image_gallery' );
}

/**
 * Remove add to cart function from woocommerce_after_shop_loop_item_title hook
 * and hook it in stockholm_qode_action_woocommerce_after_product_image
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'stockholm_qode_action_woocommerce_after_product_image', 'woocommerce_template_loop_add_to_cart', 10 );

if ( ! function_exists( 'stockholm_qode_custom_override_checkout_fields' ) ) {
	/**
	 * Overrides placeholder values for checkout fields
	 *
	 * @param array all checkout fields
	 *
	 * @return array checkout fields with overriden values
	 */
	function stockholm_qode_custom_override_checkout_fields( $fields ) {
		//billing fields
		$args_billing = array(
			'first_name' => esc_html__( 'First name', 'stockholm' ),
			'last_name'  => esc_html__( 'Last name', 'stockholm' ),
			'company'    => esc_html__( 'Company name', 'stockholm' ),
			'address_1'  => esc_html__( 'Address', 'stockholm' ),
			'email'      => esc_html__( 'Email', 'stockholm' ),
			'phone'      => esc_html__( 'Phone', 'stockholm' ),
			'postcode'   => esc_html__( 'Postcode / ZIP', 'stockholm' ),
			'city'       => esc_html__( 'Town / City', 'stockholm' ),
			'state'      => esc_html__( 'State / County', 'stockholm' )
		);
		
		//shipping fields
		$args_shipping = array(
			'first_name' => esc_html__( 'First name', 'stockholm' ),
			'last_name'  => esc_html__( 'Last name', 'stockholm' ),
			'company'    => esc_html__( 'Company name', 'stockholm' ),
			'address_1'  => esc_html__( 'Address', 'stockholm' ),
			'postcode'   => esc_html__( 'Postcode / ZIP', 'stockholm' )
		);
		
		//override billing placeholder values
		foreach ( $args_billing as $key => $value ) {
			$fields["billing"]["billing_{$key}"]["placeholder"] = $value;
		}
		
		//override shipping placeholder values
		foreach ( $args_shipping as $key => $value ) {
			$fields["shipping"]["shipping_{$key}"]["placeholder"] = $value;
		}
		
		return $fields;
	}
	
	// Hook in
	add_filter( 'woocommerce_checkout_fields', 'stockholm_qode_custom_override_checkout_fields' );
}

if ( ! function_exists( 'stockholm_qode_woocommerce_content' ) ) {
	/**
	 * Output WooCommerce content.
	 *
	 * This function is only used in the optional 'woocommerce.php' template
	 * which people can add to their themes to add basic woocommerce support
	 * without hooks or modifying core templates.
	 *
	 * @access public
	 * @return void
	 */
	function stockholm_qode_woocommerce_content() {
		
		if ( is_singular( 'product' ) ) {
			
			while ( have_posts() ) : the_post();
				
				wc_get_template_part( 'content', 'single-product' );
			
			endwhile;
			
		} else {
			
			do_action( 'woocommerce_archive_description' );
			
			if ( have_posts() ) {
				
				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
				
				woocommerce_product_loop_start();
				
				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();
						
						/**
						 * Hook: woocommerce_shop_loop.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
						
						wc_get_template_part( 'content', 'product' );
					}
				}
				
				woocommerce_product_loop_end();
				
				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}
		}
	}
}

if ( ! function_exists( 'woocommerce_output_product_data_tabs' ) ) {
	/**
	 * Output the product tabs.
	 *
	 * @access public
	 * @subpackage    Product/Tabs
	 * @return void
	 */
	function woocommerce_output_product_data_tabs() {
		wc_get_template( 'single-product/tabs/tabs.php' );
		echo '</div>';
	}
}

if ( ! function_exists( 'stockholm_qode_woocommerce_change_actions_priorities' ) ) {
	/**
	 * Function that changes woocommerce actions priorities.
	 * Used in product listing to put product rating bellow product price
	 */
	function stockholm_qode_woocommerce_change_actions_priorities() {
		$actions = array(
			array(
				'tag'             => 'woocommerce_after_shop_loop_item_title',
				'action'          => 'woocommerce_template_loop_price',
				'priority'        => 10,
				'priority_to_set' => 10
			),
			array(
				'tag'             => 'woocommerce_after_shop_loop_item_title',
				'action'          => 'woocommerce_template_loop_rating',
				'priority'        => 5,
				'priority_to_set' => 11
			)
		);
		
		foreach ( $actions as $action ) {
			//actions which priorities needs to be changed
			remove_action( $action['tag'], $action['action'], $action['priority'] );
			
			//new priorities
			add_action( $action['tag'], $action['action'], $action['priority_to_set'] );
		}
	}
	
	add_action( 'woocommerce_change_priorities', 'stockholm_qode_woocommerce_change_actions_priorities' );
	do_action( 'woocommerce_change_priorities' );
}

if ( ! function_exists( 'stockholm_qode_set_number_of_columns_woo_product_list' ) ) {
	function stockholm_qode_set_number_of_columns_woo_product_list() {
		global $woocommerce_loop;
		
		$woocommerce_loop['columns'] = 3;
	}
}

if ( ! function_exists( 'stockholm_qode_qode_woocommerce_share' ) ) {
	function stockholm_qode_qode_woocommerce_share() {
		//check social share style
		$social_type = 'circle';
		if ( stockholm_qode_options()->getOptionValue( 'woo_product_single_single_social_share_type' ) ) {
			$social_type = stockholm_qode_options()->getOptionValue( 'woo_product_single_single_social_share_type' );
		}
		
		if ( stockholm_qode_is_core_installed() && stockholm_qode_is_social_share_enabled() ) {
			echo '<span class="social_share_title">' . esc_html__( "Share:", "stockholm" ) . ' </span>';
			echo do_shortcode( '[social_share_list list_type=' . esc_attr( $social_type ) . ']' );
		}
	}
	
	add_action( 'woocommerce_product_meta_end', 'stockholm_qode_qode_woocommerce_share' );
}

//Remove open and close link position
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );


if ( ! function_exists( 'stockholm_qode_qode_woocommerce_tabs_position' ) ) {
	function stockholm_qode_qode_woocommerce_tabs_position() {
		//Change product tabs position
		$info_tabs_position = stockholm_qode_options()->getOptionValue( 'woo_product_single_tabs_position' );

		//default position on stockholm
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 70 );

		if($info_tabs_position == 'bellow'){
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 70 );
			add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
		}
	}
	add_action( 'init', 'stockholm_qode_qode_woocommerce_tabs_position' );
}

if (!function_exists('stockholm_qode_woocommerce_product_thumbnail_size')) {
    function stockholm_qode_woocommerce_product_thumbnail_size() {

        $product_single_layout = stockholm_qode_woocommerce_single_type();

        if ($product_single_layout == 'large-gallery') {
            if ( version_compare( WOOCOMMERCE_VERSION, '3.3' ) >= 0 ) {
                return "woocommerce_single";
            } else {
                return "shop_single";
            }
        } else if($product_single_layout == 'two-columns-gallery') {
            return "full";
        } else {
            if ( version_compare( WOOCOMMERCE_VERSION, '3.3' ) >= 0 ) {
                return "woocommerce_thumbnail";
            } else {
                return "shop_thumbnail";
            }

        }
    }
    add_filter('woocommerce_gallery_thumbnail_size', 'stockholm_qode_woocommerce_product_thumbnail_size', 10);
}

if ( ! function_exists( 'stockholm_qode_extended_default_shop_list' ) ) {
	function stockholm_qode_extended_default_shop_list() {
		$product_list_type = stockholm_qode_options()->getOptionValue( 'woo_products_list_type' );
		
		if ( $product_list_type == 'elegant' ) {
			
			/*************** GENERAL FILTERS - begin ***************/
			
			//Sale flash template override
			add_filter( 'woocommerce_sale_flash', 'stockholm_qode_elegant_woocommerce_sale_flash' );
			
			//Out of stock template
			add_filter( 'woocommerce_product_thumbnails', 'stockholm_qode_elegant_woocommerce_product_out_of_stock' );
			add_action( 'woocommerce_before_shop_loop_item_title', 'stockholm_qode_elegant_woocommerce_product_out_of_stock', 10 );
			
			//New product template
			add_action( 'woocommerce_before_shop_loop_item_title', 'stockholm_qode_elegant_woocommerce_new_product_mark', 10 );
			
			/*************** GENERAL FILTERS - end ***************/
			
			/*************** PRODUCT SINGLE FILTERS - begin ***************/
			
			//add sale flash on image
			remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' );
			add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash' );
			add_action( 'woocommerce_product_thumbnails', 'stockholm_qode_elegant_woocommerce_new_product_mark' );
			
			/*************** PRODUCT SINGLE FILTERS - end ***************/
			
			
			/*************** PRODUCT LISTS FILTERS - begin ***************/
			
			//Add additional html tags around product lists
			add_action( 'woocommerce_before_shop_loop', 'stockholm_qode_elegant_pl_holder_additional_tag_before', 35 );
			add_action( 'woocommerce_after_shop_loop', 'stockholm_qode_elegant_pl_holder_additional_tag_after', 5 );
			
			//Add additional html tag around product elements
			add_action( 'woocommerce_before_shop_loop_item', 'stockholm_qode_elegant_pl_inner_additional_tag_before', 5 );
			
			//Add additional html tags around image and marks
			add_action( 'woocommerce_before_shop_loop_item_title', 'stockholm_qode_elegant_pl_image_additional_tag_before', 5 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_pl_image_additional_tag_after', 6 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'stockholm_qode_elegant_pl_image_additional_tag_after', 1 );
			
			/*************** Product Info Position Is On Image Hover ***************/
			
			//Add additional html tag around product elements
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'stockholm_qode_elegant_pl_inner_additional_tag_after', 22 );
			
			//Add open and close link position
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'woocommerce_template_loop_product_link_open', 21 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'woocommerce_template_loop_product_link_close', 21 );
			
			//Add additional html around product info elements
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'stockholm_qode_elegant_pl_inner_text_additional_tag_before', 5 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'stockholm_qode_elegant_pl_inner_text_additional_tag_after', 15 );
			
			//Override product title with our own html
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'stockholm_qode_elegant_woocommerce_template_loop_product_title', 7 );
			
			//Add additional html tags around rating star element
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'stockholm_qode_elegant_pl_rating_additional_tag_before', 9 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'stockholm_qode_elegant_pl_rating_additional_tag_after', 11 );
			
			//Change rating star position
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'woocommerce_template_loop_rating', 10 );
			
			//Change price position
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'woocommerce_template_loop_price', 12 );
			
			//Change add to cart position
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_on_image_hover', 'woocommerce_template_loop_add_to_cart', 13 );
			
			/*************** Product Info Position Is Below Image ***************/
			
			//Add open and close link position
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_pl_additional_info_before', 18 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_pl_additional_info', 18 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_pl_additional_info_after', 18 );
			
			//Add open and close link position
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'woocommerce_template_loop_product_link_open', 19 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'woocommerce_template_loop_product_link_close', 19 );
			
			//Add additional html tag around product elements
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_pl_inner_additional_tag_after', 20 );
			
			//Add additional html at the end of product info elements
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_pl_text_wrapper_additional_tag_before', 21 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_pl_text_wrapper_additional_tag_after', 30 );
			
			//Add categoriers html
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_pl_categories', 22 );
			
			//Override product title with our own html
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_woocommerce_template_loop_product_title', 23 );
			
			//Change price position
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'woocommerce_template_loop_price', 27 );
			
			//Change add to cart position
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_woocommerce_template_loop_add_to_cart', 28 );
			
			//Add additional html around add to cart element
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_pl_inner_text_additional_tag_before', 1 );
			add_action( 'stockholm_qode_action_shop_elegant_woo_pl_info_below_image', 'stockholm_qode_elegant_pl_inner_text_additional_tag_after', 4 );
			
			/*************** PRODUCT LISTS FILTERS - end ***************/
		}
	}
	
	add_action( 'init', 'stockholm_qode_extended_default_shop_list' );
}