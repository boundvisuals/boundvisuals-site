<?php
namespace Stockholm\Shortcodes\ProductListElegantCarousel;

use Stockholm\Shortcodes\Lib\ShortcodeInterface;

class ProductListElegantCarousel implements ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qode_product_list_carousel';
		
		add_action('vc_before_init', array($this,'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Product List Elegant - Carousel', 'stockholm'),
			'base' => $this->base,
			'icon' => 'icon-wpb-product-list-carousel extended-custom-icon-qode',
			'category' => array( esc_html__('by SELECT', 'stockholm'), esc_html__('by SELECT SHOP', 'stockholm'), ),
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
						'type'       => 'dropdown',
						'param_name' => 'info_position',
						'heading'    => esc_html__('Product Info Position', 'stockholm'),
						'value'      => array(
							esc_html__('Info On Image Hover', 'stockholm') => 'info-on-image',
							esc_html__('Info Below Image', 'stockholm')    => 'info-below-image',
							esc_html__('Info Below / Button on Image Hover', 'stockholm')    => 'info-below-button-on-image'
						),
						'admin_label' => true,
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'number_of_posts',
						'heading'    => esc_html__('Number of Products', 'stockholm')
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'space_between_items',
						'heading'    => esc_html__('Space Between Items', 'stockholm'),
						'value'      => array(
							esc_html__('Normal', 'stockholm')   => 'normal',
							esc_html__('Small', 'stockholm')    => 'small',
							esc_html__('Tiny', 'stockholm')     => 'tiny',
							esc_html__('No Space', 'stockholm') => 'no'
						),
						'save_always' => true,
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'order_by',
						'heading'     => esc_html__('Order By', 'stockholm'),
						'value'       => array_flip(stockholm_qode_get_query_order_by_array()),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'order',
						'heading'     => esc_html__('Order', 'stockholm'),
						'value'       => array_flip(stockholm_qode_get_query_order_array()),
						'save_always' => true
					),
					array(
	                    'type'       => 'dropdown',
	                    'param_name' => 'taxonomy_to_display',
	                    'heading'    => esc_html__('Choose Sorting Taxonomy', 'stockholm'),
	                    'value'      => array(
							esc_html__('Category', 'stockholm') => 'category',
							esc_html__('Tag', 'stockholm')      => 'tag',
							esc_html__('Id', 'stockholm')       => 'id'
	                    ),
	                    'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'stockholm')
	                ),
	                array(
	                    'type'        => 'textfield',
	                    'param_name'  => 'taxonomy_values',
	                    'heading'     => esc_html__('Enter Taxonomy Values', 'stockholm'),
	                    'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'stockholm')
	                ),
	                array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Image Proportions', 'stockholm'),
						'param_name' => 'image_size',
						'value'      => array(
							esc_html__('Default', 'stockholm')        => '',
							esc_html__('Original', 'stockholm')       => 'full',
							esc_html__('Square', 'stockholm')         => 'square',
							esc_html__('Landscape', 'stockholm')      => 'landscape',
							esc_html__('Portrait', 'stockholm')       => 'portrait',
							esc_html__('Medium', 'stockholm')         => 'medium',
							esc_html__('Large', 'stockholm')          => 'large',
							esc_html__('Shop Catalog', 'stockholm')   => 'shop_catalog',
							esc_html__('Shop Single', 'stockholm')    => 'woocommerce_single',
							esc_html__('Shop Thumbnail', 'stockholm') => 'woocommerce_thumbnail'
						)
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'number_of_visible_items',
						'heading'    => esc_html__('Number Of Visible Items', 'stockholm'),
						'value'      => array(
							esc_html__('One', 'stockholm')   => '1',
							esc_html__('Two', 'stockholm')   => '2',
							esc_html__('Three', 'stockholm') => '3',
							esc_html__('Four', 'stockholm')  => '4',
							esc_html__('Five', 'stockholm')  => '5',
							esc_html__('Six', 'stockholm')   => '6'
						),
						'save_always' => true,
						'group'       => esc_html__('Slider Settings', 'stockholm')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'slider_loop',
						'heading'     => esc_html__('Enable Slider Loop', 'stockholm'),
						'value'       => array_flip(stockholm_qode_get_yes_no_select_array(false, true)),
						'save_always' => true,
						'group'       => esc_html__('Slider Settings', 'stockholm')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'slider_autoplay',
						'heading'     => esc_html__('Enable Slider Autoplay', 'stockholm'),
						'value'       => array_flip(stockholm_qode_get_yes_no_select_array(false, true)),
						'save_always' => true,
						'group'       => esc_html__('Slider Settings', 'stockholm')
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'slider_speed',
						'heading'     => esc_html__('Slider Speed', 'stockholm'),
						'description' => esc_html__('Default value is 5000 (ms)', 'stockholm'),
						'group'       => esc_html__('Slider Settings', 'stockholm')
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'slider_speed_animation',
						'heading'     => esc_html__('Slider Slide Animation', 'stockholm'),
						'description' => esc_html__('Speed of slide animation in milliseconds. Default value is 600.', 'stockholm'),
						'group'       => esc_html__('Slider Settings', 'stockholm')
					),
					array(
						'type'		  => 'dropdown',
						'param_name'  => 'slider_navigation',
						'heading'	  => esc_html__('Enable Slider Navigation Arrows', 'stockholm'),
						'value'       => array_flip(stockholm_qode_get_yes_no_select_array(false, true)),
						'save_always' => true,
						'group'       => esc_html__('Slider Settings', 'stockholm')
					),
				array(
					'type'		  => 'dropdown',
					'param_name'  => 'slider_pagination',
					'heading'	  => esc_html__('Enable Slider Pagination', 'stockholm'),
					'value'       => array_flip(stockholm_qode_get_yes_no_select_array(false, false)),
					'save_always' => true,
					'group'       => esc_html__('Slider Settings', 'stockholm')
				),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'display_title',
						'heading'     => esc_html__('Display Title', 'stockholm'),
						'value'       => array_flip(stockholm_qode_get_yes_no_select_array(false, true)),
						'group'	      => esc_html__('Product Info', 'stockholm')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_tag',
						'heading'     => esc_html__('Title Tag', 'stockholm'),
						'value'       => array_flip(stockholm_qode_get_title_tag(true)),
						'dependency'  => array('element' => 'display_title', 'value' => array('yes')),
						'group'	      => esc_html__('Product Info Style', 'stockholm')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_transform',
						'heading'     => esc_html__('Title Text Transform', 'stockholm'),
						'value'       => array_flip(stockholm_qode_get_text_transform_array(true)),
						'dependency'  => array('element' => 'display_title', 'value' => array('yes')),
						'group'	      => esc_html__('Product Info Style', 'stockholm')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'display_category',
						'heading'     => esc_html__('Display Category', 'stockholm'),
						'value'       => array(
									        'Yes'   => 'yes',
									        'No'   => 'no'
									      ),
						'group'	      => esc_html__('Product Info', 'stockholm')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'display_excerpt',
						'heading'     => esc_html__('Display Excerpt', 'stockholm'),
						'value'       => array_flip(stockholm_qode_get_yes_no_select_array(false)),
						'group'	      => esc_html__('Product Info', 'stockholm')
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'excerpt_length',
						'heading'     => esc_html__('Excerpt Length', 'stockholm'),
						'description' => esc_html__('Number of characters', 'stockholm'),
						'dependency'  => array('element' => 'display_excerpt', 'value' => array('yes')),
						'group'	      => esc_html__('Product Info Style', 'stockholm')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'display_rating',
						'heading'     => esc_html__('Display Rating', 'stockholm'),
						'value'       => array_flip(stockholm_qode_get_yes_no_select_array(false)),
						'group'	      => esc_html__('Product Info', 'stockholm')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'display_price',
						'heading'     => esc_html__('Display Price', 'stockholm'),
						'value'       => array_flip(stockholm_qode_get_yes_no_select_array(false, true)),
						'group'	      => esc_html__('Product Info', 'stockholm')
					)
				)
		) );

	}
	public function render($atts, $content = null) {
		$default_atts = array(
            'info_position' 		  => 'info-on-image',
            'number_of_posts' 		  => '8',
            'space_between_items'	  => '',
            'order_by' 				  => 'date',
            'order' 				  => 'ASC',
            'taxonomy_to_display' 	  => 'category',
            'taxonomy_values' 		  => '',
            'image_size'			  => 'full',
			'number_of_visible_items' => '1',
			'slider_loop'		      => 'yes',
			'slider_autoplay'		  => 'yes',
			'slider_speed'		      => '5000',
			'slider_speed_animation'  => '600',
			'slider_navigation'	      => 'yes',
			'slider_pagination'	      => 'no',
            'display_title' 		  => 'yes',
            'title_tag'				  => 'h5',
            'title_transform'		  => '',
			'display_category'        => 'yes',
			'display_excerpt'		  => 'no',
			'excerpt_length' 		  => '20',
			'display_rating' 		  => 'no',
			'display_price' 		  => 'yes',
            'display_button' 		  => 'yes',
        );
		$params = shortcode_atts($default_atts, $atts);
		
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['holder_data'] = $this->getProductListCarouselDataAttributes($params);
		$params['class_name'] = 'plc';
		
		$params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];
		$params['title_styles'] = $this->getTitleStyles($params);

		$queryArray = $this->generateProductQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;

		$html = stockholm_qode_get_woo_shortcode_module_template_part('templates/product-list-carousel', 'product-list-carousel', '', $params);
		
		return $html;
	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getHolderClasses($params){
		$holderClasses = '';
		
		$columnsSpace = !empty($params['space_between_items']) ? 'qode-'.$params['space_between_items'].'-space' : 'qode-normal-space';

		$infoPosition = !empty($params['info_position']) ? 'qode-'.$params['info_position'] : 'qode-info-on-image';
		
		$holderClasses .= ' '. $columnsSpace .' '.$infoPosition;
		
		return $holderClasses;
	}
	
    /**
     * Return all data that product list carousel needs
     *
     * @param $params
     * @return array
     */
    private function getProductListCarouselDataAttributes($params) {
	    $slider_data = array();
	
	    $slider_data['data-number-of-items']        = !empty($params['number_of_visible_items']) ? $params['number_of_visible_items'] : '1';
	    $slider_data['data-enable-loop']            = !empty($params['slider_loop']) ? $params['slider_loop'] : '';
	    $slider_data['data-enable-autoplay']        = !empty($params['slider_autoplay']) ? $params['slider_autoplay'] : '';
	    $slider_data['data-slider-speed']           = !empty($params['slider_speed']) ? $params['slider_speed'] : '5000';
	    $slider_data['data-slider-speed-animation'] = !empty($params['slider_speed_animation']) ? $params['slider_speed_animation'] : '600';
	    $slider_data['data-enable-navigation']      = !empty($params['slider_navigation']) ? $params['slider_navigation'] : '';
	    $slider_data['data-enable-pagination']      = !empty($params['slider_pagination']) ? $params['slider_pagination'] : '';

	    return $slider_data;
    }

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateProductQueryArray($params){
		$queryArray = array(
			'post_status' => 'publish',
			'post_type' => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => $params['number_of_posts'],
			'orderby' => $params['order_by'],
			'order' => $params['order']
		);

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category') {
            $queryArray['product_cat'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag') {
            $queryArray['product_tag'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id') {
            $idArray = $params['taxonomy_values'];
            $ids = explode(',', $idArray);
            $queryArray['post__in'] = $ids;
        }

        return $queryArray;
	}
	
	/**
	 * Return Style for Title
	 *
	 * @param $params
	 * @return string
	 */
	public function getTitleStyles($params) {
		$styles = array();
		
		if (!empty($params['title_transform'])) {
			$styles[] = 'text-transform: '.$params['title_transform'];
		}
		
		return implode(';', $styles);
	}
}