<?php

include "qode.iconcollection.interface.php";
include "qode.fontawesome.php";
include "qode.fontelegant.php";
include "qode.linearicons.php";
include "qode.lineaicons.php";
include "qode.ionicons.php";

/*
  Class: StockholmQodeIconCollections
  A class that initializes Qode Icon Collections
 */

class StockholmQodeIconCollections {
	private static $instance;
	public $iconCollections;
	public $VCParamsArray;
	public $iconPackParamName;
	
	private function __construct() {
		$this->iconPackParamName = 'icon_pack';
		$this->initIconCollections();
	}

    public static function getInstance() {
        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
	
	/**
	 * Method that adds individual collections to set of collections
	 */
	private function initIconCollections() {
		$this->addIconCollection( 'font_awesome', new StockholmQodeIconsFontAwesome( esc_html__( "Font Awesome", "stockholm" ), "fa_icon" ) );
		$this->addIconCollection( 'font_elegant', new StockholmQodeIconsFontElegant( esc_html__( "Font Elegant", "stockholm" ), "fe_icon" ) );
		$this->addIconCollection( 'linear_icons', new StockholmQodeIconsFontLinear( esc_html__( "Linear Icons", "stockholm" ), "linear_icon" ) );
		$this->addIconCollection( 'linea_icons', new StockholmQodeIconsFontLinea( esc_html__( "Linea Icons", "stockholm" ), "linea_icon" ) );
		$this->addIconCollection( 'ion_icons', new StockholmQodeIconsFontIon( esc_html__( "Ion Icons", "stockholm" ), "ion_icon" ) );
	}
	
	public function getVCParamsArray( $iconPackDependency = array(), $iconCollectionPrefix = "", $emptyIconPack = false ) {
		if ( $emptyIconPack ) {
			$iconCollectionsVC = $this->getIconCollectionsVCEmpty();
		} else {
			$iconCollectionsVC = $this->getIconCollectionsVC();
		}

		$iconPackParams = array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => esc_html__( "Icon Pack", "stockholm" ),
			"param_name"  => $this->iconPackParamName,
			"value"       => $iconCollectionsVC,
			"description" => "",
			"save_always" => true
		);
		
		if ( $iconPackDependency !== "" ) {
			$iconPackParams["dependency"] = $iconPackDependency;
		}
		
		$iconPackParams = array( $iconPackParams );
		
		$iconSetParams = array();
		if ( is_array( $this->iconCollections ) && count( $this->iconCollections ) ) {
			foreach ( $this->iconCollections as $key => $collection ) {
				$iconSetParams[] = array(
					"type"        => "dropdown",
					"class"       => "",
					"heading"     => esc_html__( "Icon", "stockholm" ),
					"param_name"  => $iconCollectionPrefix . $collection->param,
					"value"       => $collection->getIconsArray(),
					"description" => "",
					"dependency"  => array( 'element' => $this->iconPackParamName, 'value' => array( $key ) ),
				);
			}
		}
		
		return array_merge( $iconPackParams, $iconSetParams );
	}
	
	public function getSocialVCParamsArray( $iconPackDependency = array(), $iconCollectionPrefix = "", $emptyIconPack = false, $exclude = '' ) {
		if ( $emptyIconPack ) {
			$iconCollectionsVC = $this->getIconCollectionsVCEmptyExclude( $exclude );
		} else {
			$iconCollectionsVC = $this->getIconCollectionsVCExclude( $exclude );
		}
		
		$iconPackParams = array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => esc_html__( "Icon Pack", "stockholm" ),
			"param_name"  => $this->iconPackParamName,
			"value"       => $iconCollectionsVC,
			"description" => ""
		);
		
		if ( $iconPackDependency !== "" ) {
			$iconPackParams["dependency"] = $iconPackDependency;
		}
		
		$iconPackParams = array( $iconPackParams );
		
		$iconCollections = $this->iconCollections;
		if ( is_array( $exclude ) && count( $exclude ) ) {
			foreach ( $exclude as $exclude_key ) {
				if ( array_key_exists( $exclude_key, $this->iconCollections ) ) {
					unset( $iconCollections[ $exclude_key ] );
				}
			}
		} else {
			if ( array_key_exists( $exclude, $this->iconCollections ) ) {
				unset( $iconCollections[ $exclude ] );
			}
		}
		
		$iconSetParams = array();
		if ( is_array( $iconCollections ) && count( $iconCollections ) ) {
			foreach ( $iconCollections as $key => $collection ) {
				$iconSetParams[] = array(
					"type"        => "dropdown",
					"class"       => "",
					"heading"     => esc_html__( "Icon", "stockholm" ),
					"param_name"  => $iconCollectionPrefix . $collection->param,
					"value"       => $collection->getSocialIconsArrayVC(),
					"description" => "",
					"dependency"  => array( 'element' => $this->iconPackParamName, 'value' => array( $key ) )
				);
			}
		}
		
		return array_merge( $iconPackParams, $iconSetParams );
	}
	
	public function getIconSizesArray() {
		return array(
			esc_html__( 'Tiny', 'stockholm' )       => 'fa-lg',
			esc_html__( 'Small', 'stockholm' )      => 'fa-2x',
			esc_html__( 'Medium', 'stockholm' )     => 'fa-3x',
			esc_html__( 'Large', 'stockholm' )      => 'fa-4x',
			esc_html__( 'Very Large', 'stockholm' ) => 'fa-5x'
		);
	}
	
	public function getIconSizeClass( $iconSize ) {
		switch ( $iconSize ) {
			case "fa-lg":
				$iconSize = "qode_tiny_icon";
				break;
			case "fa-2x":
				$iconSize = "qode_small_icon";
				break;
			case "fa-3x":
				$iconSize = "qode_medium_icon";
				break;
			case "fa-4x":
				$iconSize = "qode_large_icon";
				break;
			case "fa-5x":
				$iconSize = "qode_huge_icon";
				break;
			default:
				$iconSize = "qode_small_icon";
		}
		
		return $iconSize;
	}
	
	public function getIconCollectionParamNameByKey( $key ) {
		$collection = $this->getIconCollection( $key );
		
		if ( $collection ) {
			return $collection->param;
		}
		
		return false;
	}
	
	public function getShortcodeParams( $iconCollectionPrefix = "" ) {
		$iconCollectionsParam = array();
		foreach ( $this->iconCollections as $key => $collection ) {
			$iconCollectionsParam[ $iconCollectionPrefix . $collection->param ] = '';
		}
		
		return array_merge( array( $this->iconPackParamName => '', ), $iconCollectionsParam );
	}
	
	public function addIconCollection( $key, $value ) {
		$this->iconCollections[ $key ] = $value;
	}
	
	public function getIconCollection( $key ) {
		if ( array_key_exists( $key, $this->iconCollections ) ) {
			return $this->iconCollections[ $key ];
		}
		
		return false;
	}
	
	public function getIconCollectionIcons( iStockholmQodeIconCollection $collection ) {
		return $collection->getIconsArray();
	}
	
	public function getIconCollectionsVC() {
		$vc_array = array();
		foreach ( $this->iconCollections as $key => $collection ) {
			$vc_array[ $collection->title ] = $key;
		}
		
		return $vc_array;
	}
	
	public function getIconCollectionsVCExclude( $exclude ) {
		$array = $this->getIconCollectionsVC();
		
		if ( is_array( $exclude ) && count( $exclude ) ) {
			foreach ( $exclude as $key ) {
				if ( ( $x = array_search( $key, $array ) ) !== false ) {
					unset( $array[ $x ] );
				}
			}
			
		} else {
			if ( ( $x = array_search( $exclude, $array ) ) !== false ) {
				unset( $array[ $x ] );
			}
		}
		
		return $array;
	}
	
	public function getIconCollectionsKeys() {
		return array_keys( $this->iconCollections );
	}
	
	/**
	 * Method that returns an array of 'param' attribute of each icon collection
	 * @return array array of param attributes
	 */
	public function getIconCollectionsParams() {
		$paramArray = array();
		if ( is_array( $this->iconCollections ) && count( $this->iconCollections ) ) {
			foreach ( $this->iconCollections as $key => $obj ) {
				$paramArray[] = $obj->param;
			}
		}
		
		return $paramArray;
	}
	
	public function getIconCollections() {
		$array = array();
		foreach ( $this->iconCollections as $key => $collection ) {
			$array[ $key ] = $collection->title;
		}
		
		return $array;
	}
	
	public function getIconCollectionsEmpty( $no_empty_key = "" ) {
		$array                  = array();
		$array[ $no_empty_key ] = esc_html__( 'No Icon', 'stockholm' );
		foreach ( $this->iconCollections as $key => $collection ) {
			$array[ $key ] = $collection->title;
		}
		
		return $array;
	}
	
	public function getIconCollectionsVCEmpty() {
		$vc_array            = array();
		$vc_array[ esc_html__( 'No Icon', 'stockholm' ) ] = "";
		foreach ( $this->iconCollections as $key => $collection ) {
			$vc_array[ $collection->title ] = $key;
		}
		
		return $vc_array;
	}
	
	public function getIconCollectionsVCEmptyExclude( $key ) {
		$array = $this->getIconCollectionsVCEmpty();
		if ( ( $x = array_search( $key, $array ) ) !== false ) {
			unset( $array[ $x ] );
		}
		
		return $array;
	}
	
	public function getIconCollectionsExclude( $exclude ) {
		$array = $this->getIconCollections();
		
		if ( is_array( $exclude ) && count( $exclude ) ) {
			foreach ( $exclude as $exclude_key ) {
				if ( array_key_exists( $exclude_key, $array ) ) {
					unset( $array[ $exclude_key ] );
				}
			}
			
		} else {
			if ( array_key_exists( $exclude, $array ) ) {
				unset( $array[ $exclude ] );
			}
		}
		
		return $array;
	}
	
	public function hasIconCollection( $key ) {
		return array_key_exists( $key, $this->iconCollections );
	}
	
	public function enqueueStyles() {
		if ( is_array( $this->iconCollections ) && count( $this->iconCollections ) ) {
			foreach ( $this->iconCollections as $collection_key => $collection_obj ) {
				wp_enqueue_style( 'stockholm-' . $collection_key, $collection_obj->styleUrl );
			}
		}
	}
	
	# HEADER AND SIDE MENU ICONS
	public function getSearchIcon( $iconPack, $params = array() ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			echo wp_kses_post( $iconsObject->getSearchIcon( $params ) );
		}
	}
	
	public function getSearchClose( $iconPack, $params = array() ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			echo wp_kses_post( $iconsObject->getSearchClose( $params ) );
		}
	}
	
	public function getSearchIconValue( $iconPack ) {
		
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			echo wp_kses_post( $iconsObject->getSearchIconValue() );
		}
	}
	
	public function getMenuSideIcon( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			echo wp_kses_post( $iconsObject->getMenuSideIcon() );
		}
	}
	
	public function getBackToTopIcon( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			echo wp_kses_post( $iconsObject->getBackToTopIcon() );
		}
	}

	public function hasBackToTopIconsArray( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			return $iconsObject->hasBackToTopIconsArray();
		}
	}

	public function getBackToTopIconsArray( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			return $iconsObject->getBackToTopIconsArray();
		}
	}
	
	public function getMobileMenuIcon( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			echo wp_kses_post( $iconsObject->getMobileMenuIcon() );
		}
	}
	
	public function getQuoteIcon( $iconPack, $return = false ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			if ( $return == true ) {
				return $iconsObject->getQuoteIcon();
			} else {
				echo wp_kses_post( $iconsObject->getQuoteIcon() );
			}
		}
	}
	
	# SOCIAL SIDEBAR ICONS
	public function getFacebookIcon( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			
			return $iconsObject->getFacebookIcon();
		}
	}
	
	public function getTwitterIcon( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			
			return $iconsObject->getTwitterIcon();
		}
	}
	
	public function getGooglePlusIcon( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			
			return $iconsObject->getGooglePlusIcon();
		}
	}
	
	public function getLinkedInIcon( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			
			return $iconsObject->getLinkedInIcon();
		}
	}
	
	public function getTumblrIcon( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			
			return $iconsObject->getTumblrIcon();
		}
	}
	
	public function getPinterestIcon( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			
			return $iconsObject->getPinterestIcon();
		}
	}
	
	public function getVKIcon( $iconPack ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconsObject = $this->getIconCollection( $iconPack );
			
			return $iconsObject->getVKIcon();
		}
	}
	
	public function getIconHTML( $icon, $iconPack, $iconParams = array() ) {
		if ( $this->hasIconCollection( $iconPack ) ) {
			$iconCollection = $this->getIconCollection( $iconPack );
			if ( $iconCollection ) {
				return $iconCollection->render( $icon, $iconParams );
			}
		}
		
		return false;
	}
	
	public function renderIconHTML( $icon, $iconPack, $iconParams = array() ) {
		echo stockholm_qode_get_module_part( $this->getIconHTML( $icon, $iconPack, $iconParams ) );
	}
	
	public function getElementorParamsArray($control_object, $iconPackDependency = array(), $iconCollectionPrefix = "", $emptyIconPack = false){
		if ($emptyIconPack) {
			$iconCollectionsVC = $this->getIconCollectionsVCEmpty();
		} else {
			$iconCollectionsVC = $this->getIconCollectionsVC();
		}
		
		$control_object->add_control(
			'icon_pack', [
				'label' => esc_html__( 'Icon Pack', 'stockholm' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($iconCollectionsVC),
				'condition' => $iconPackDependency
			]
		);
		
		if (is_array($this->iconCollections) && count($this->iconCollections)) {
			foreach ($this->iconCollections as $key => $collection) {
				$control_object->add_control(
					$iconCollectionPrefix . $collection->param, [
						'label' => esc_html__( 'Icon', 'stockholm' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' => array_flip($collection->getIconsArray()),
						'condition' => [
							'icon_pack' => $key,
						]
					]
				);
			}
		}
	}
	
	public function getElementorIconFromIconPack( $params ){
		$params['icon'] = '';
		
		if( ! empty( $params['fe_icon'] ) ){
			$params['icon'] = $params['fe_icon'];
		}
		
		if( ! empty( $params['linea_icon'] ) ){
			$params['icon'] = $params['linea_icon'];
		}
		
		if( ! empty( $params['dripicon'] ) ){
			$params['icon'] = $params['dripicon'];
		}
		
		if( ! empty( $params['kiko'] ) ){
			$params['icon'] = $params['kiko'];
		}
		
		return $params['icon'];
	}
	
	public function getSocialElementorParamsArray($control_object, $iconPackDependency = array(), $iconCollectionPrefix = "", $emptyIconPack = false, $exclude = '') {
		
		
		if ($emptyIconPack) {
			$iconCollectionsVC = $this->getIconCollectionsVCEmptyExclude($exclude);
		} else {
			$iconCollectionsVC = $this->getIconCollectionsVCExclude($exclude);
		}
		
		$icon_pack_args = array(
			'label' => esc_html__( 'Icon Pack', 'stockholm' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => array_flip($iconCollectionsVC)
		);
		
		if (!empty($iconPackDependency)) {
			$icon_pack_args['condition'] = [$iconPackDependency];
		}
		
		$control_object->add_control(
			'icon_pack',
			$icon_pack_args
		
		);
		
		$iconCollections = $this->iconCollections;

		if(is_array($exclude) && count($exclude)) {
			foreach ($exclude as $exclude_key) {
				if  (array_key_exists($exclude_key, $this->iconCollections)) {
					
					unset($iconCollections[$exclude_key]);
				}
			}
			
		} else {
			if  (array_key_exists($exclude, $this->iconCollections)) {
				unset($iconCollections[$exclude]);
			}
		}
		
		if (is_array($iconCollections) && count($iconCollections)) {
			foreach ($iconCollections as $key => $collection) {
				if( $collection->getSocialIconsArrayVC() ){
					$control_object->add_control(
						$iconCollectionPrefix . $collection->param, [
							'label' => esc_html__( 'Icon', 'stockholm' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'options' => array_flip($collection->getSocialIconsArrayVC()),
							'condition' => [
								'icon_pack' => $key,
							]
						]
					);
				}
			}
		}
	}
}
