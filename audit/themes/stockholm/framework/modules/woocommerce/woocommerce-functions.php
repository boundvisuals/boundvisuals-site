<?php
/**
 * Woocommerce helper functions
 */

if ( ! function_exists( 'stockholm_qode_return_woocommerce_global_variable' ) ) {
	function stockholm_qode_return_woocommerce_global_variable() {
		if ( stockholm_qode_is_woocommerce_installed() ) {
			global $product;
			
			return $product;
		}
	}
}

if ( ! function_exists( 'stockholm_qode_add_product_to_meta_boxes' ) ) {
	function stockholm_qode_add_product_to_meta_boxes( $metaboxes ) {
		$metaboxes[] = 'product';
		
		return $metaboxes;
	}
	
	add_filter( 'stockholm_qode_filter_meta_box_post_types_save', 'stockholm_qode_add_product_to_meta_boxes' );
}

if ( ! function_exists( 'stockholm_qode_is_yith_wcqv_install' ) ) {
	function stockholm_qode_is_yith_wcqv_install() {
		return defined( 'YITH_WCQV' );
	}
}

if ( ! function_exists( 'stockholm_qode_is_yith_wcwl_install' ) ) {
	function stockholm_qode_is_yith_wcwl_install() {
		return defined( 'YITH_WCWL' );
	}
}

if ( ! function_exists( 'stockholm_qode_get_woo_shortcode_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template name of the template to load
	 * @param string $module name of the module folder
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return html
	 * @see stockholm_qode_get_template_part()
	 */
	function stockholm_qode_get_woo_shortcode_module_template_part( $template, $module, $slug = '', $params = array() ) {
		
		//HTML Content from template
		$html          = '';
		$template_path = 'framework/modules/woocommerce/shortcodes/' . $module;
		
		$temp = $template_path . '/' . $template;
		
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		$templates = array();
		
		if ( $temp !== '' ) {
			if ( $slug !== '' ) {
				$templates[] = "{$temp}-{$slug}.php";
			}
			
			$templates[] = $temp . '.php';
		}
		$located = stockholm_qode_find_template_path( $templates );
		if ( $located ) {
			ob_start();
			include( $located );
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_product_single_enable_default_gallery_features' ) ) {
	function stockholm_qode_product_single_enable_default_gallery_features() {
		
		if ( stockholm_qode_options()->getOptionValue( 'woo_product_single_enable_default_gallery_features' ) == 'yes' ) {
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
	}
	
	add_action( 'init', 'stockholm_qode_product_single_enable_default_gallery_features' );
}

if ( ! function_exists( 'stockholm_qode_woocommerce_sale_percentage' ) ) {
	/**
	 * Function that social share for product page
	 * Return string
	 */
	function stockholm_qode_woocommerce_sale_percentage( $price, $sale_price ) {
		if ( $price > 0 ) {
			return '-' . ( 100 - round( ( $sale_price * 100 ) / $price ) ) . '%';
		} else {
			return esc_html__( 'SALE', 'stockholm' );
		}
	}
}

if ( ! function_exists( 'stockholm_qode_woocommerce_share_tag_before' ) ) {
	/**
	 * Function that adds tag before share and like section
	 */
	function stockholm_qode_woocommerce_share_tag_before() {
		echo '<div class="qode-single-product-share">';
	}
}

if ( ! function_exists( 'stockholm_qode_woocommerce_share_tag_after' ) ) {
	/**
	 * Function that adds tag before share and like section
	 */
	function stockholm_qode_woocommerce_share_tag_after() {
		echo '</div>';
	}
}

if ( ! function_exists( 'stockholm_qode_product_ajax_load_category' ) ) {
	function stockholm_qode_product_ajax_load_category() {
		$shortcode_params = array();
		
		if ( ! empty( $_POST ) ) {
			foreach ( $_POST as $key => $value ) {
				if ( $key !== '' ) {
					$addUnderscoreBeforeCapitalLetter = preg_replace( '/([A-Z])/', '_$1', $key );
					$setAllLettersToLowercase         = strtolower( $addUnderscoreBeforeCapitalLetter );
					
					$shortcode_params[ $setAllLettersToLowercase ] = $value;
				}
			}
		}
		
		check_ajax_referer( 'qodef_product_load_more_nonce_' . sanitize_text_field( $_POST['product_load_more_id'] ), 'product_load_more_nonce' );
		
		$html = '';
		
		$product_list = new \Stockholm\Shortcodes\ProductListElegant\ProductListElegant();
		
		$query_array   = $product_list->generateProductQueryArray( $shortcode_params );
		$query_results = new \WP_Query( $query_array );
		
		if ( $query_results->have_posts() ): while ( $query_results->have_posts() ) : $query_results->the_post();
			$html .= stockholm_qode_get_woo_shortcode_module_template_part( 'templates/parts/' . $shortcode_params['info_position'], 'product-list', '', $shortcode_params );
		endwhile;
		else:
			$html .= '<p class="qode-no-posts">' . esc_html__( 'No products were found!', 'stockholm' ) . '</p>';
		endif;
		wp_reset_postdata();
		
		$return_obj = array(
			'html' => $html,
		);
		
		echo json_encode( $return_obj );
		exit;
	}
	
	add_action( 'wp_ajax_nopriv_stockholm_qode_action_product_ajax_load_category', 'stockholm_qode_product_ajax_load_category' );
	add_action( 'wp_ajax_stockholm_qode_action_product_ajax_load_category', 'stockholm_qode_product_ajax_load_category' );
}

if ( ! function_exists( 'stockholm_qode_woo_elegant_pl_body_class' ) ) {
	function stockholm_qode_woo_elegant_pl_body_class( $classes ) {
		if ( stockholm_qode_is_woocommerce_installed() && stockholm_qode_options()->getOptionValue( 'woo_products_list_type' ) == 'elegant' ) {
			$classes[] = 'qode-elegant-product-list';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'stockholm_qode_woo_elegant_pl_body_class' );
}

if ( ! function_exists( 'stockholm_qode_product_list_standard_actions' ) ) {
	function stockholm_qode_product_list_standard_actions( $params ) {
		add_action( 'stockholm_qode_action_pl_standard_woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 5 );
		add_action( 'stockholm_qode_action_pl_standard_woocommerce_before_shop_loop_item', 'stockholm_qode_get_woocommerce_out_of_stock', 5 );
		add_action( 'stockholm_qode_action_pl_standard_woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		
		add_action( 'stockholm_qode_action_pl_standard_woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		
		add_action( 'stockholm_qode_action_pl_standard_woocommerce_shop_loop_item_hover_image', 'stockholm_qode_woocommerce_shop_loop_hover_image', 10 );
		
		add_action( 'stockholm_qode_action_pl_standard_woocommerce_shop_loop_item_hover_link_close', 'woocommerce_template_loop_product_link_close', 15 );
		
		add_action( 'stockholm_qode_action_pl_standard_woocommerce_shop_loop_product_simple_button', 'stockholm_qode_woocommerce_shop_loop_button', 5 );
		
		if ( $params['display_categories'] != '' && $params['display_categories'] == 'yes' ) {
			add_action( 'stockholm_qode_action_pl_standard_woocommerce_shop_loop_item_categories', 'stockholm_qode_woocommerce_shop_loop_categories', 5 );
		}
		
		add_action( 'stockholm_qode_action_pl_standard_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5 );
		add_action( 'stockholm_qode_action_pl_standard_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'stockholm_qode_action_pl_standard_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );
		
		add_action( 'stockholm_qode_action_pl_standard_woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	}
	
	add_action( 'stockholm_qode_action_pl_standard_initial_setup', 'stockholm_qode_product_list_standard_actions', 5, 1 );
}

if ( ! function_exists( 'stockholm_qode_product_list_simple_actions' ) ) {
	function stockholm_qode_product_list_simple_actions() {
		add_action( 'stockholm_qode_action_pl_simple_woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 5 );
		add_action( 'stockholm_qode_action_pl_simple_woocommerce_before_shop_loop_item', 'stockholm_qode_get_woocommerce_out_of_stock', 5 );
		add_action( 'stockholm_qode_action_pl_simple_woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		
		add_action( 'stockholm_qode_action_pl_simple_woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		
		add_action( 'stockholm_qode_action_pl_simple_woocommerce_shop_loop_item_hover_link_close', 'woocommerce_template_loop_product_link_close', 15 );
		
		add_action( 'stockholm_qode_action_pl_simple_woocommerce_shop_loop_item_overlay', 'woocommerce_template_loop_product_link_open', 5 );
		add_action( 'stockholm_qode_action_pl_simple_woocommerce_shop_loop_item_overlay', 'woocommerce_template_loop_product_link_close', 10 );
		
		add_action( 'stockholm_qode_action_pl_simple_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5 );
		add_action( 'stockholm_qode_action_pl_simple_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'stockholm_qode_action_pl_simple_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );
		
		add_action( 'stockholm_qode_action_pl_simple_woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	}
	
	add_action( 'stockholm_qode_action_pl_simple_initial_setup', 'stockholm_qode_product_list_simple_actions', 5 );
}

if ( ! function_exists( 'stockholm_qode_woocommerce_shop_loop_hover_image' ) ) {
	/**
	 * Function that prints hover image on standard product list
	 */
	function stockholm_qode_woocommerce_shop_loop_hover_image() {
		$product             = stockholm_qode_return_woocommerce_global_variable();
		$product_hover_image = '';
		
		$product_gallery_ids = $product->get_gallery_attachment_ids();
		if ( ! empty( $product_gallery_ids ) ) {
			//get product image url, shop catalog size
			$product_hover_image = wp_get_attachment_image( $product_gallery_ids[0], 'shop_catalog' );
		}
		
		echo stockholm_qode_get_module_part( $product_hover_image );
	}
}

if ( ! function_exists( 'stockholm_qode_woocommerce_shop_loop_categories' ) ) {
	/**
	 * Function that prints html with product categories
	 */
	function stockholm_qode_woocommerce_shop_loop_categories() {
		$product = stockholm_qode_return_woocommerce_global_variable();
		
		echo '<div class="qodef-product-list-categories">' . wc_get_product_category_list( $product->get_id(), ', ' ) . '</div>';
	}
}

if ( ! function_exists( 'stockholm_qode_woocommerce_shop_loop_button' ) ) {
	/**
	 * Function that prints button for product list
	 */
	function stockholm_qode_woocommerce_shop_loop_button() {
		$product = stockholm_qode_return_woocommerce_global_variable();
		/* Adding classes to add to cart button. Should be checked after each woocommerce update */
		$class = ' ';
		$class .= ' button';
		$class .= ' product_type_' . $product->product_type;
		$class .= $product->is_purchasable() && $product->is_in_stock() ? ' add_to_cart_button' : ' ';
		$class .= $product->supports( 'ajax_add_to_cart' ) ? ' ajax_add_to_cart' : ' ';
		
		$button_text = $product->add_to_cart_text();
		if ( $product->is_type( 'variable' ) ) {
			$button_text = esc_html__( 'Options', 'stockholm' );
		}
		
		echo apply_filters( 'woocommerce_loop_add_to_cart_link',
			sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="qbutton add-to-cart-button %s">%s</a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->get_id() ),
				esc_attr( $product->get_sku() ),
				esc_attr( isset( $class ) ? $class : 'button' ),
				esc_html( $button_text )
			),
			$product );
	}
}

if ( ! function_exists( 'stockholm_qode_get_woocommerce_out_of_stock' ) ) {
	/**
	 * Function that prints html with out of stock text if product is out of stock
	 */
	function stockholm_qode_get_woocommerce_out_of_stock() {
		$product = stockholm_qode_return_woocommerce_global_variable();
		
		if ( ! $product->is_in_stock() ) {
			echo '<span class="onsale out-of-stock-button"><span>' . esc_html__( "Out of stock", "stockholm" ) . '</span></span>';
		}
	}
}

if ( ! function_exists( 'stockholm_qode_shop_standard_actions' ) ) {
	function stockholm_qode_shop_standard_actions() {
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 5 );
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_before_shop_loop_item', 'stockholm_qode_get_woocommerce_out_of_stock', 5 );
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_shop_loop_item_hover_image', 'stockholm_qode_woocommerce_shop_loop_hover_image', 10 );
		
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_shop_loop_item_hover_link_close', 'woocommerce_template_loop_product_link_close', 15 );
		
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_shop_loop_product_simple_button', 'stockholm_qode_woocommerce_shop_loop_button', 5 );
		
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_shop_loop_item_categories', 'stockholm_qode_woocommerce_shop_loop_categories', 5 );
		
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5 );
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );
		
		add_action( 'stockholm_qode_action_shop_standard_woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	}
	
	add_action( 'stockholm_qode_action_shop_standard_initial_setup', 'stockholm_qode_shop_standard_actions' );
}

if ( ! function_exists( 'stockholm_qode_shop_simple_actions' ) ) {
	function stockholm_qode_shop_simple_actions() {
		add_action( 'stockholm_qode_action_shop_simple_woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 5 );
		add_action( 'stockholm_qode_action_shop_simple_woocommerce_before_shop_loop_item', 'stockholm_qode_get_woocommerce_out_of_stock', 5 );
		add_action( 'stockholm_qode_action_shop_simple_woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		
		add_action( 'stockholm_qode_action_shop_simple_woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		
		add_action( 'stockholm_qode_action_shop_simple_woocommerce_shop_loop_item_hover_link_close', 'woocommerce_template_loop_product_link_close', 15 );
		
		add_action( 'stockholm_qode_action_shop_simple_woocommerce_shop_loop_item_overlay', 'woocommerce_template_loop_product_link_open', 5 );
		add_action( 'stockholm_qode_action_shop_simple_woocommerce_shop_loop_item_overlay', 'woocommerce_template_loop_product_link_close', 10 );
		
		add_action( 'stockholm_qode_action_shop_simple_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5 );
		add_action( 'stockholm_qode_action_shop_simple_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'stockholm_qode_action_shop_simple_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );
		
		add_action( 'stockholm_qode_action_shop_simple_woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	}
	
	add_action( 'stockholm_qode_action_shop_simple_initial_setup', 'stockholm_qode_shop_simple_actions' );
}

if( ! function_exists('stockholm_qode_load_theme_elementor_shortcodes') ){
	function stockholm_qode_load_theme_elementor_shortcodes(){
		
		if (stockholm_qode_is_elementor_installed() && stockholm_qode_is_theme_registered()) {
			foreach (glob(QODE_FRAMEWORK_MODULES_ROOT_DIR . '/woocommerce/shortcodes/*/elementor-*.php') as $shortcode_load) {
				include_once $shortcode_load;
			}
		}
	}
	
	add_action('init', 'stockholm_qode_load_theme_elementor_shortcodes');
}

if ( ! function_exists( 'stockholm_qode_get_woo_dropdown_cart_icon' ) ) {
	function stockholm_qode_get_woo_dropdown_cart_icon(){
		$icon_source = stockholm_qode_options()->getOptionValue( 'woo_dropdown_cart_icon_source' );

		$html = '';

		switch ( $icon_source ) {
			case 'icon_path':
				$cart_icon = stockholm_qode_options()->getOptionValue('woo_dropdown_cart_icon');
				switch ($cart_icon) {
					case 'font-elegant':
						$cart_icon_class = "icon_bag_alt";
						break;
					case 'font-linear':
						$cart_icon_class = "lnr lnr-cart";
						break;
                    case 'font-linea':
						$cart_icon_class = "icon-ecommerce-bag";
						break;
					default:
						$cart_icon_class = "fa fa-shopping-cart";
						break;
				}
				$html .= '<i class="'. esc_html( $cart_icon_class ) .'"></i>';
				break;
			case 'svg_path':
				$icon_svg_path = stockholm_qode_options()->getOptionValue( 'woo_dropdown_cart_svg_path' );
				if(!empty($icon_svg_path)){
					$html .= $icon_svg_path;
				}
				break;
		}

		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_get_woo_dropdown_cart_product_number' ) ) {
	function stockholm_qode_get_woo_dropdown_cart_product_number(){
		$html = '';
		$show_number = stockholm_qode_options()->getOptionValue( 'woo_dropdown_cart_show_product_number' );
		if($show_number == 'yes'){
			$html .= '<div class="header_cart_number">'. WC()->cart->cart_contents_count . '</div>';
		}
		return $html;
	}
}

//function that enables woocommerce templates to be rendered in elementor admin frontend view
if( ! function_exists('stockholm_qode_init_elementor_wc_list_fx') ){
    function stockholm_qode_init_elementor_wc_list_fx(){

        if (stockholm_qode_is_woocommerce_installed()) {
            //include default shop templates
            wc()->frontend_includes();
        }
    }

    // Priority = 5, in order to allow plugins remove/add their wc hooks on init.
    if ( ! empty( $_REQUEST['action'] ) && 'elementor' === $_REQUEST['action'] && is_admin() ) {
        add_action( 'init', 'stockholm_qode_init_elementor_wc_list_fx', 5 );
    }
}

if(!function_exists('stockholm_qode_woocommerce_single_type')) {
    function stockholm_qode_woocommerce_single_type() {
        $type = '';
        if (stockholm_qode_is_woocommerce_installed()) {
            $type = stockholm_qode_options()->getOptionValue('woo_product_single_product_type');
        }
        return $type;
    }
}

if(!function_exists('stockholm_qode_woocommerce_single_type_body_class')) {
    function stockholm_qode_woocommerce_single_type_body_class( $classes ) {
        $type = '';

        if (stockholm_qode_is_woocommerce_installed()) {
            $type = stockholm_qode_options()->getOptionValue('woo_product_single_product_type');
        }

        if( $type !== '' ){
            $classes[] = 'qode-single-product-' . $type . '-type';
        }

        return $classes;
    }

    add_filter('body_class', 'stockholm_qode_woocommerce_single_type_body_class');
}

if(!function_exists('stockholm_qode_woocommerce_single_thumbs_position_body_class')) {
    function stockholm_qode_woocommerce_single_thumbs_position_body_class( $classes ) {
        $type = '';

        if (stockholm_qode_is_woocommerce_installed()) {
            $type = stockholm_qode_options()->getOptionValue('woo_product_single_thumb_position');
        }

        if( $type !== '' ){
            $classes[] = 'qode-single-product-thumbs-' . $type;
        }

        return $classes;
    }

    add_filter('body_class', 'stockholm_qode_woocommerce_single_thumbs_position_body_class');
}
