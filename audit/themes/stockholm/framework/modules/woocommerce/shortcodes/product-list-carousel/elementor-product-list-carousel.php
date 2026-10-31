<?php

class StockholmQodeElementorProductListCarousel extends \Elementor\Widget_Base{
    public function get_name() {
        return 'qode_product_list_carousel';
    }

    public function get_title() {
        return esc_html__( 'Product List Elegant - Carousel', 'stockholm' );
    }

    public function get_icon() {
        return 'stockholm-elementor-custom-icon stockholm-elementor-product-list-carousel';
    }

    public function get_categories() {
        return [ 'select' ];
    }

    protected function _register_controls(){
        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__( 'General', 'stockholm' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
			'info_position',
			[
				'label' => esc_html__('Product Info Position', 'stockholm'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'info-on-image'    => esc_html__('Info On Image Hover', 'stockholm'),
					'info-below-image' => esc_html__('Info Below Image', 'stockholm'),
					'info-below-button-on-image' => esc_html__('Info Below / Button on Image Hover', 'stockholm'),
				],
				'default' => 'info-on-image',
			]
		);

	    $this->add_control(
		    'number_of_posts',
		    [
			    'label' => esc_html__('Number of Products', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'default' => '8'
		    ]
	    );
	
	    $this->add_control(
		    'space_between_items',
		    [
			    'label' => esc_html__('Space Between Items', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => [
				    'normal' => esc_html__('Normal', 'stockholm'),
				    'small'  => esc_html__('Small', 'stockholm'),
				    'tiny'   => esc_html__('Tiny', 'stockholm'),
				    'no'     => esc_html__('No Space', 'stockholm'),
			    ],
			    'default' => 'normal'
		    ]
	    );
	
	    $this->add_control(
		    'order_by',
		    [
			    'label' => esc_html__('Order By', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_query_order_by_array(),
			    'default' => 'date'
		    ]
	    );
	
	    $this->add_control(
		    'order',
		    [
			    'label' => esc_html__('Order', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_query_order_array(),
			    'default' => 'ASC'
		    ]
	    );
	
	    $this->add_control(
		    'taxonomy_to_display',
		    [
			    'label' => esc_html__('Choose Sorting Taxonomy', 'stockholm'),
			    'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => [
				    'category' => esc_html__('Category', 'stockholm'),
				    'tag'      => esc_html__('Tag', 'stockholm'),
				    'id'       => esc_html__('Id', 'stockholm'),
			    ],
			    'default' => 'category'
		    ]
	    );
	
	    $this->add_control(
		    'taxonomy_values',
		    [
			    'label' => esc_html__('Enter Taxonomy Values', 'stockholm'),
			    'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::TEXT
		    ]
	    );
	
	    $this->add_control(
		    'image_size',
		    [
			    'label' => esc_html__('Image Proportions', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => [
				    ''                      => esc_html__('Default', 'stockholm'),
				    'full'                  => esc_html__('Original', 'stockholm'),
				    'square'                => esc_html__('Square', 'stockholm'),
				    'landscape'             => esc_html__('Landscape', 'stockholm'),
				    'portrait'              => esc_html__('Portrait', 'stockholm'),
				    'medium'                => esc_html__('Medium', 'stockholm'),
				    'large'                 => esc_html__('Large', 'stockholm'),
				    'shop_catalog'          => esc_html__('Shop Catalog', 'stockholm'),
				    'woocommerce_single'    => esc_html__('Shop Single', 'stockholm'),
				    'woocommerce_thumbnail' => esc_html__('Shop Thumbnail', 'stockholm'),
			    ],
		    ]
	    );
	    
	    $this->end_controls_section();
	
	    $this->start_controls_section(
		    'slider_settings',
		    [
			    'label' => esc_html__( 'Slider Settings', 'stockholm' ),
			    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		    ]
	    );
	
	    $this->add_control(
		    'number_of_visible_items',
		    [
			    'label' => esc_html__('Number Of Visible Items', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => [
				    '1' => esc_html__('One', 'stockholm'),
				    '2' => esc_html__('Two', 'stockholm'),
				    '3' => esc_html__('Three', 'stockholm'),
				    '4' => esc_html__('Four', 'stockholm'),
				    '5' => esc_html__('Five', 'stockholm'),
				    '6' => esc_html__('Six', 'stockholm'),
			    ],
			    'default' => '4'
		    ]
	    );
	
	    $this->add_control(
		    'slider_loop',
		    [
			    'label' => esc_html__('Enable Slider Loop', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_yes_no_select_array(false, true),
			    'default' => 'yes'
		    ]
	    );
	
	    $this->add_control(
		    'slider_autoplay',
		    [
			    'label' => esc_html__('Enable Slider Autoplay', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_yes_no_select_array(false, true),
			    'default' => 'yes'
		    ]
	    );
	
	    $this->add_control(
		    'slider_speed',
		    [
			    'label' => esc_html__('Slider Speed', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'description' => esc_html__('Default value is 5000 (ms)', 'stockholm')
		    ]
	    );
	
	    $this->add_control(
		    'slider_speed_animation',
		    [
			    'label' => esc_html__('Slider Slide Animation', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'description' => esc_html__('Speed of slide animation in milliseconds. Default value is 600.', 'stockholm')
		    ]
	    );
	
	    $this->add_control(
		    'slider_navigation',
		    [
			    'label' => esc_html__('Enable Slider Navigation Arrows', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_yes_no_select_array(false, true),
			    'default' => 'yes'
		    ]
	    );

	    $this->add_control(
		    'slider_pagination',
		    [
			    'label' => esc_html__('Enable Slider Pagination', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_yes_no_select_array(false, true),
			    'default' => 'no'
		    ]
	    );
	    
	    $this->end_controls_section();
	    
	    $this->start_controls_section(
		    'product_info',
		    [
			    'label' => esc_html__( 'Product Info', 'stockholm' ),
			    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		    ]
	    );
	
	    $this->add_control(
		    'display_title',
		    [
			    'label' => esc_html__('Display Title', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_yes_no_select_array(false, true),
			    'default' => 'yes'
		    ]
	    );
	
	    $this->add_control(
		    'display_category',
		    [
			    'label' => esc_html__('Display Category', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_yes_no_select_array(false, true),
			    'default' => 'yes'
		    ]
	    );
	
	    $this->add_control(
		    'display_excerpt',
		    [
			    'label' => esc_html__('Display Excerpt', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_yes_no_select_array(false, true),
			    'default' => 'no'
		    ]
	    );
	
	    $this->add_control(
		    'display_rating',
		    [
			    'label' => esc_html__('Display Rating', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_yes_no_select_array(false, true),
			    'default' => 'yes'
		    ]
	    );
	
	    $this->add_control(
		    'display_price',
		    [
			    'label' => esc_html__('Display Price', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_yes_no_select_array(false, true),
			    'default' => 'yes'
		    ]
	    );
	
	
	    $this->end_controls_section();
	    
	    $this->start_controls_section(
		    'product_info_style',
		    [
			    'label' => esc_html__( 'Product Info Style', 'stockholm' ),
			    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		    ]
	    );
	
	    $this->add_control(
		    'title_tag',
		    [
			    'label' => esc_html__('Title Tag', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_title_tag(true),
			    'default' => 'h4'
		    ]
	    );
	
	    $this->add_control(
		    'title_transform',
		    [
			    'label' => esc_html__('Title Text Transform', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_text_transform_array(true),
			    'default' => '',
			    'condition' => [
				    'display_title' => 'yes'
			    ]
		    ]
	    );
	
	    $this->add_control(
		    'excerpt_length',
		    [
			    'label' => esc_html__('Excerpt Length', 'stockholm'),
			    'description' => esc_html__('Number of characters', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'options' => stockholm_qode_get_text_transform_array(true),
			    'default' => '20',
			    'condition' => [
				    'display_excerpt' => 'yes'
			    ]
		    ]
	    );
	    
	    $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();
	
	    $params['holder_classes'] = $this->getHolderClasses($params);
	    $params['holder_data'] = $this->getProductListCarouselDataAttributes($params);
	    $params['class_name'] = 'plc';
	
	    $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : 'h5';
	    $params['title_styles'] = $this->getTitleStyles($params);
	
	    $queryArray = $this->generateProductQueryArray($params);
	    $query_result = new \WP_Query($queryArray);
	    $params['query_result'] = $query_result;

        echo stockholm_qode_get_woo_shortcode_module_template_part('templates/product-list-carousel', 'product-list-carousel', '', $params);
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

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new StockholmQodeElementorProductListCarousel() );