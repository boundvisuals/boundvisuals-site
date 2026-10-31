<?php

class StockholmQodeElementorProductListElegant extends \Elementor\Widget_Base {
    public function get_name() {
        return 'qode_product_list_elegant';
    }

    public function get_title() {
        return esc_html__( 'Product List Elegant', 'stockholm' );
    }

    public function get_icon() {
        return 'stockholm-elementor-custom-icon stockholm-elementor-product-list-elegant';
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
		    'qode_pl_info_position',
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
		    'qode_pl_number_of_posts',
		    [
			    'label' => esc_html__('Number of Products', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'default' => '8'
		    ]
	    );
        
	    
        $this->add_control(
            'qode_pl_number_of_columns',
            [
                'label' => esc_html__('Number of Columns', 'stockholm'),
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
            'qode_pl_space_between_items',
            [
                'label' => esc_html__('Space Between Items', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'large'     => esc_html__('Large', 'stockholm'),
                    'normal'    => esc_html__('Normal', 'stockholm'),
                    'small'     => esc_html__('Small', 'stockholm'),
                    'tiny'      => esc_html__('Tiny', 'stockholm'),
                    'no'        => esc_html__('No Space', 'stockholm'),
                ],
                'default' => 'normal'
            ]
        );

        $this->add_control(
            'qode_pl_show_ordering_filter',
            [
                'label' => esc_html__('Show Ordering Filter', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => stockholm_qode_get_yes_no_select_array(false,false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'qode_pl_price_range',
            [
                'label' => esc_html__('Price range for pricing filter', 'stockholm'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'qode_pl_show_ordering_filter' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'qode_pl_orderby',
            [
                'label' => esc_html__('Order By', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => stockholm_qode_get_query_order_by_array(),
                'default' => 'date',
                'condition' => [
                    'qode_pl_show_ordering_filter' => 'no'
                ]
            ]
        );

        $this->add_control(
            'qode_pl_order',
            [
                'label' => esc_html__('Order', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => stockholm_qode_get_query_order_array(),
                'default' => 'ASC',
                'condition' => [
                    'qode_pl_show_ordering_filter' => 'no'
                ]
            ]
        );

        $this->add_control(
            'qode_pl_show_category_filter',
            [
                'label' => esc_html__('Show Category Filter', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => stockholm_qode_get_yes_no_select_array(false,false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'qode_pl_category_values',
            [
                'label' => esc_html__('Enter Category Values', 'stockholm'),
                'description' => esc_html__('Separate values (category slugs) with a comma', 'stockholm'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'qode_pl_qode_pl_show_category_filter' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'qode_pl_show_all_item_in_filter',
            [
                'label' => esc_html__('Show "All" Item in Filter', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => stockholm_qode_get_yes_no_select_array(false,true),
                'default' => 'yes',
                'condition' => [
                    'qode_pl_show_category_filter' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'qode_pl_taxonomy_to_display',
            [
                'label' => esc_html__('Choose Sorting Taxonomy', 'stockholm'),
                'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'category' => esc_html__('Category', 'stockholm'),
                    'tag'      => esc_html__('Tag', 'stockholm'),
                    'id'       => esc_html__('Id', 'stockholm'),
                ],
                'default' => 'category',
                'condition' => [
                    'qode_pl_show_category_filter' => 'no'
                ]
            ]
        );

        $this->add_control(
            'qode_pl_taxonomy_values',
            [
                'label' => esc_html__('Enter Taxonomy Values', 'stockholm'),
                'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'stockholm'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'qode_pl_show_category_filter' => 'no'
                ]
            ]
        );

        $this->add_control(
            'qode_pl_image_size',
            [
                'label' => esc_html__('Image Proportions', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''               => esc_html__('Default', 'stockholm'),
                    'full'           => esc_html__('Original', 'stockholm'),
                    'square'         => esc_html__('Square', 'stockholm'),
                    'landscape'      => esc_html__('Landscape', 'stockholm'),
                    'portrait'       => esc_html__('Portrait', 'stockholm'),
                    'medium'         => esc_html__('Medium', 'stockholm'),
                    'large'          => esc_html__('Large', 'stockholm'),
                    'shop_catalog'   => esc_html__('Shop Catalog', 'stockholm'),
                    'woocommerce_single'    => esc_html__('Shop Single', 'stockholm'),
                    'woocommerce_thumbnail' => esc_html__('Shop Thumbnail', 'stockholm'),
                ],
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
            'qode_pl_display_title',
            [
                'label' => esc_html__('Display Title', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => stockholm_qode_get_yes_no_select_array(false,true),
                'default' => 'yes'
            ]
        );
        
        $this->add_control(
            'qode_pl_display_category',
            [
                'label' => esc_html__('Display Category', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => stockholm_qode_get_yes_no_select_array(false,true),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'qode_pl_display_excerpt',
            [
                'label' => esc_html__('Display Excerpt', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => stockholm_qode_get_yes_no_select_array(false,true),
                'default' => 'no'
            ]
        );
        
        $this->add_control(
            'qode_pl_display_rating',
            [
                'label' => esc_html__('Display Rating', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => stockholm_qode_get_yes_no_select_array(false,true),
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'qode_pl_display_price',
            [
                'label' => esc_html__('Display Price', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => stockholm_qode_get_yes_no_select_array(false,true),
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
		    'qode_pl_product_info_skin',
		    [
			    'label' => esc_html__('Product Info Skin', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => [
				    'default' => esc_html__('Default', 'stockholm'),
				    'light'   => esc_html__('Light', 'stockholm'),
				    'dark'    => esc_html__('Dark', 'stockholm'),
			    ],
			    'default' => 'default',
			    'condition' => [
				    'qode_pl_info_position' => 'info-on-image'
			    ]
		    ]
	    );
	
	    $this->add_control(
		    'qode_pl_product_info_hover_skin',
		    [
			    'label' => esc_html__('Product Info Hover Background Skin', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => [
				    'light' => esc_html__('Light', 'stockholm'),
				    'dark'  => esc_html__('Dark', 'stockholm'),
			    ],
			    'default' => 'dark',
			    'condition' => [
				    'qode_pl_info_position' => 'info-on-image'
			    ]
		    ]
	    );
	
	    $this->add_control(
		    'qode_pl_title_tag',
		    [
			    'label' => esc_html__('Title Tag', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_title_tag(false),
			    'default' => 'h4'
		    ]
	    );
	
	    $this->add_control(
		    'qode_pl_title_transform',
		    [
			    'label' => esc_html__('Title Text Transform', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => stockholm_qode_get_text_transform_array(true),
			    'default' => '',
			    'condition' => [
				    'qode_pl_display_title' => 'yes'
			    ]
		    ]
	    );
	
	    $this->add_control(
		    'qode_pl_excerpt_length',
		    [
			    'label' => esc_html__('Excerpt Length', 'stockholm'),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'default' => '20',
			    'description' => esc_html__('Number of characters', 'stockholm'),
			    'condition' => [
				    'qode_pl_display_excerpt' => 'yes'
			    ]
		    ]
	    );
        
        $this->add_control(
            'qode_pl_info_bottom_text_align',
            [
                'label' => esc_html__('Product Info Text Alignment', 'stockholm'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''       => esc_html__('Default', 'stockholm'),
                    'left'   => esc_html__('Left', 'stockholm'),
                    'center' => esc_html__('Center', 'stockholm'),
                    'right'  => esc_html__('Right', 'stockholm'),
                ],
                'default' => '',
                'condition' => [
                    'qode_pl_info_position' => 'info-below-image'
                ]
            ]
        );

        $this->add_control(
            'qode_pl_info_bottom_margin',
            [
                'label' => esc_html__('Product Info Bottom Margin (px)', 'stockholm'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'qode_pl_info_position' => 'info-below-image'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();
	
	    $params['holder_data'] = $this->getHolderData($params);
	
	    foreach ($params as $key => $value){
		    if( strpos( $key, 'qode_pl_' ) !== false ){
			    $new_key = str_replace('qode_pl_', '', $key);
			    $params[$new_key] = $value;
		    }
	    }
        
	    $params['type'] = !empty($params['type']) ? $params['type'] : 'standard';
	    $params['holder_classes'] = $this->getHolderClasses($params);
	    $params['class_name'] = 'pli';
	    $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : 'h5';
	    $params['title_styles'] = $this->getTitleStyles($params);
	    $params['text_wrapper_styles'] = $this->getTextWrapperStyles($params);
	    $params['categories_filter_list'] = $this->getProductCategoriesList($params);
	    $params['ordering_filter_list'] = $this->getProductOrderingList($params);
	    $params['pricing_filter_list'] = $this->getProductPricingList($params);

	    $params['category'] = ''; //used for ajax calling in category filter
	    $params['meta_key'] = ''; //used for ajax calling in category filter
	    $params['min_price'] = ''; //used for ajax calling in ordering filter
	    $params['max_price'] = ''; //used for ajax calling in ordering filter

	    $queryArray = $this->generateProductQueryArray($params);
	    $query_result = new \WP_Query($queryArray);
	    $params['query_result'] = $query_result;

        echo stockholm_qode_get_woo_shortcode_module_template_part('templates/product-list-'.$params['type'], 'product-list', '', $params);
    }
	
	private function getHolderClasses($params){
		$holderClasses = '';
		
		$productListType = !empty($params['type']) ? 'qode-'.$params['type'].'-layout' : 'qode-standard-layout';
		
		$columnsSpace = !empty($params['space_between_items']) ? 'qode-'.$params['space_between_items'].'-space' : 'qode-normal-space';
		
		$columnNumber = $this->getColumnNumberClass($params);
		
		$infoPosition = !empty($params['info_position']) ? 'qode-'.$params['info_position'] : 'qode-info-on-image';
		
		$productInfoClasses = !empty($params['product_info_skin']) ? 'qode-product-info-'.$params['product_info_skin'] : '';
		
		$productInfoHoverClasses = !empty($params['product_info_hover_skin']) ? 'qode-product-info-hover-'.$params['product_info_hover_skin'] : '';
		
		$holderClasses .= $productListType . ' ' . $columnsSpace . ' ' . $columnNumber . ' ' . $infoPosition . ' ' . $productInfoClasses . ' ' . $productInfoHoverClasses;
		
		return $holderClasses;
	}
	
	/**
	 * Generates columns number classes for product list holder
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getColumnNumberClass($params){
		
		$columns = $params['number_of_columns'];
		
		switch ($columns) {
			case 1:
				$columnsNumber = 'qode-one-column';
				break;
			case 2:
				$columnsNumber = 'qode-two-columns';
				break;
			case 3:
				$columnsNumber = 'qode-three-columns';
				break;
			case 4:
				$columnsNumber = 'qode-four-columns';
				break;
			case 5:
				$columnsNumber = 'qode-five-columns';
				break;
			case 6:
				$columnsNumber = 'qode-six-columns';
				break;
			default:
				$columnsNumber = 'qode-four-columns';
				break;
		}
		
		return $columnsNumber;
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
			'orderby' => $params['orderby'],
			'order' => $params['order']
		);
		
		if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category' && $params['show_category_filter'] == 'no') {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}
		
		if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag' && $params['show_category_filter'] == 'no') {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}
		
		if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id' && $params['show_category_filter'] == 'no') {
			$idArray = $params['taxonomy_values'];
			$ids = explode(',', $idArray);
			$queryArray['post__in'] = $ids;
		}
		
		
		//used for ajax calling in ordering filter
		if($params['show_ordering_filter'] == 'yes') {
			unset($queryArray['orderby'], $queryArray['order']);
			
			if ($params['meta_key'] !== ''){
				$queryArray['orderby'] = $params['orderby'];
				$queryArray['order'] = $params['order'];
				$queryArray['meta_key'] = $params['meta_key'];
			}
			
			if($params['min_price'] !== '' || $params['max_price'] !== ''){
				$queryArray['meta_query'] = array(
					array(
						'key' => '_price',
						'value' => array($params['min_price'], $params['max_price']),
						'compare' => 'BETWEEN',
						'type' => 'NUMERIC'
					),
				);
			}
		}
		
		//used for ajax calling in category filter
		if($params['show_category_filter'] == 'yes'){
			if($params['category_values'] !== '' && $params['category'] == '') {
				$queryArray['product_cat'] = $params['category_values'];
			}else {
				$queryArray['product_cat'] = $params['category'];
			}
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
	
	/**
	 * Return Style for Text Wrapper Holder
	 *
	 * @param $params
	 * @return string
	 */
	public function getTextWrapperStyles($params) {
		$styles = array();
		
		if (!empty($params['info_bottom_text_align'])) {
			$styles[] = 'text-align: '.$params['info_bottom_text_align'];
		}
		
		if ($params['info_bottom_margin'] !== '') {
			$styles[] = 'margin-bottom: '.intval($params['info_bottom_margin']).'px';
		}
		
		return implode(';', $styles);
	}
	
	/**
	 * Return product categories
	 *
	 * * @param $params
	 * @return string
	 */
	public function getProductCategoriesList($params) {
		$category_html = '';
		
		if($params['show_category_filter'] == 'yes') {
			$taxonomy = 'product_cat';
			$orderby = 'name';
			$show_count = 0;      // 1 for yes, 0 for no
			$pad_counts = 0;      // 1 for yes, 0 for no
			$hierarchical = 1;      // 1 for yes, 0 for no
			$title = '';
			$empty = 0;
			$parent = 0;
			
			$args = array(
				'taxonomy' => $taxonomy,
				'orderby' => $orderby,
				'show_count' => $show_count,
				'pad_counts' => $pad_counts,
				'hierarchical' => $hierarchical,
				'title_li' => $title,
				'hide_empty' => $empty,
				'parent' => $parent
			);
			
			$all_categories_string = '';
			if($params['category_values'] == ''){
				
				$all_categories = get_categories($args);
				
			}else{
				
				$all_categories = array();
				$categories = explode(',',$params['category_values']);
				foreach ($categories as $cat){
					$all_categories[] = get_term_by( 'slug', $cat, 'product_cat' );
					$all_categories_string .= $cat.',';
					
				}
			}
			
			if($params['show_all_item_in_filter'] == 'yes') {
				$category_html .= '<li><a class="qode-no-smooth-transitions active" data-category="' . $all_categories_string . '" href="#">' . esc_html__('All', 'stockholm') . '</a></li>';
			}
			foreach ($all_categories as $cat) {
				$category_html .= '<li><a class="qode-no-smooth-transitions" data-category="'.$cat->slug.'" href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a></li>';
				
				$termchildren = get_term_children( $cat->term_id, 'product_cat' );
				
				if(!empty($termchildren)){
					foreach ( $termchildren as $child ) {
						$cat = get_term_by( 'id', $child, 'product_cat' );
						$category_html .= '<li><a class="qode-no-smooth-transitions" data-category="'.$cat->slug.'" href="' . get_term_link($child, 'product_cat') . '">' . $cat->name . '</a></li>';
					}
				}
			}
		}
		
		return $category_html;
	}
	
	/**
	 * Return products sort by
	 *
	 * * @param $params
	 * @return string
	 */
	public function getProductOrderingList($params) {
		$sorting_list_html = '';
		
		if($params['show_ordering_filter'] == 'yes') {
			$orderby_options = apply_filters('woocommerce_catalog_orderby', array(
				'menu_order' => esc_html__('Default', 'stockholm'),
				'popularity' => esc_html__('Popularity', 'stockholm'),
				'rating' => esc_html__('Average rating', 'stockholm'),
				'newness' => esc_html__('Newness', 'stockholm'),
				'price' => esc_html__('Price: Low to High', 'stockholm'),
				'price-desc' => esc_html__('Price: High to Low', 'stockholm')
			));
			
			if (get_option('woocommerce_enable_review_rating') === 'no') {
				unset($orderby_options['rating']);
			}
			
			foreach ($orderby_options as $key => $value) {
				$sorting_list_html .= '<li><a class="qode-no-smooth-transitions" data-ordering="'. $key .'" href="#">'. $value .'</a></li>';
			}
		}
		
		return $sorting_list_html;
	}
	
	/**
	 * Return products sort by
	 *
	 * * @param $params
	 * @return string
	 */
	public function getProductPricingList($params) {
		$pricing_list_html = '';
		
		if($params['show_ordering_filter'] == 'yes') {
			$range = $params['price_range'] !== '' ? $params['price_range'] : 10;
			$value = 0;
			
			$pricing_list_html .= '<li><a data-minPrice="" data-maxPrice="" href="#">' . esc_html__('All', 'stockholm') . '</a></li>';
			for ($i = 1; $i <= 5; $i++){
				if($i !== 5){
					$pricing_list_html .= '<li><a data-minPrice="'. $value .'" data-maxPrice="'. ($value+$range) .'" href="#">'. get_woocommerce_currency_symbol().$value .'-'.get_woocommerce_currency_symbol().($value+$range). '</a></li>';
					
				}else{
					$pricing_list_html .= '<li><a data-minPrice="'. ($value) .'" data-maxPrice="'.(100000000000).'" href="#">'. ($value).get_woocommerce_currency_symbol(). '+</a></li>';
				}
				
				$value += $range;
			}
			
		}
		
		return $pricing_list_html;
	}
	
	/**
	 * Generates data attributes array
	 *
	 * @param $params
	 *
	 * @return string
	 */
	
	public function getHolderData($params){
		$dataString = '';
		unset($params['categories_filter_list'], $params['ordering_filter_list'], $params['pricing_filter_list'] );
		foreach ($params as $key => $value) {
			if( $value !== '' && strpos($key, 'qode_pl_') !== false ) {
				$new_key = str_replace( 'qode_pl_', '', $key );
				$new_key = str_replace( '_', '-', $new_key );
				$dataString .= ' data-'.$new_key.'="'.esc_attr($value).'"';
			}
		}

        $dataString .= 'data-class_name = "pli"';
		
		return $dataString;
	}
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new StockholmQodeElementorProductListElegant() );