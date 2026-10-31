<?php

/*
   Class: StockholmQodeFramework
   A class that initializes Qode Framework
*/

class StockholmQodeFramework {
	private static $instance;
	public $qodeOptions;
	public $qodeMetaBoxes;
	
	private function __construct() {
		$this->qodeOptions   = StockholmQodeOptions::get_instance();
		$this->qodeMetaBoxes = StockholmQodeMetaBoxes::get_instance();
	}

    public static function get_instance() {
        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

/*
   Class: StockholmQodeOptions
   A class that initializes Qode Options
*/

class StockholmQodeOptions {
	private static $instance;
	public $adminPages;
	public $options;
	
	private function __construct() {
		$this->adminPages = array();
		$this->options    = array();
	}

    public static function get_instance() {
        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
	
	public function addAdminPage( $key, $page ) {
		$this->adminPages[ $key ] = $page;
	}
	
	public function getAdminPage( $key ) {
		return $this->adminPages[ $key ];
	}
	
	public function adminPageExists( $key ) {
		return array_key_exists( $key, $this->adminPages );
	}
	
	public function getAdminPageFromSlug( $slug ) {
		foreach ( $this->adminPages as $key => $page ) {
			if ( $page->slug == $slug ) {
				return $page;
			}
		}
		
		return;
	}
	
	public function addOption( $key, $value, $type = '' ) {
		$this->options[ $key ] = $value;
		
		$this->addOptionByType( $type, $key );
	}
	
	public function getOption( $key ) {
		if ( isset( $this->options[ $key ] ) ) {
			return $this->options[ $key ];
		}
		
		return;
	}
	
	public function addOptionByType( $type, $key ) {
		$this->optionsByType[ $type ][] = $key;
	}
	
	public function getOptionsByType( $type ) {
		if ( array_key_exists( $type, $this->optionsByType ) ) {
			return $this->optionsByType[ $type ];
		}
		
		return array();
	}
	
	public function getOptionValue( $key ) {
		global $stockholm_qode_options;
		
		if ( is_array( $stockholm_qode_options ) && array_key_exists( $key, $stockholm_qode_options ) ) {
			return $stockholm_qode_options[ $key ];
		} elseif ( array_key_exists( $key, $this->options ) ) {
			return $this->getOption( $key );
		}
		
		return false;
	}
}

/*
   Class: StockholmQodeAdminPage
   A class that initializes Qode Admin Page
*/

class StockholmQodeAdminPage implements iStockholmQodeLayoutNode {
	public $layout;
	private $factory;
	public $slug;
	public $title;
	public $icon;
	
	function __construct( $slug = "", $title_label = "", $icon = "" ) {
		$this->layout  = array();
		$this->factory = new StockholmQodeFieldFactory();
		$this->slug    = $slug;
		$this->title   = $title_label;
		$this->icon    = $icon;
	}
	
	public function hasChidren() {
		return ( is_array( $this->children ) && count( $this->layout ) > 0 ) ? true : false;
	}
	
	public function getChild( $key ) {
		return $this->layout[ $key ];
	}
	
	public function addChild( $key, $value ) {
		$this->layout[ $key ] = $value;
	}
	
	function render() {
		foreach ( $this->layout as $child ) {
			$this->renderChild( $child );
		}
	}
	
	public function renderChild( iStockholmQodeRender $child ) {
		$child->render( $this->factory );
	}
}

/*
   Class: StockholmQodeMetaBoxes
   A class that initializes Qode Meta Boxes
*/

class StockholmQodeMetaBoxes {
	private static $instance;
	public $metaBoxes;
	public $options;
	public $optionsByType;
	
	private function __construct() {
		$this->metaBoxes     = array();
		$this->options       = array();
		$this->optionsByType = array();
	}

    public static function get_instance() {
        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
	
	public function addMetaBox( $key, $box ) {
		$this->metaBoxes[ $key ] = $box;
	}
	
	public function getMetaBox( $key ) {
		return $this->metaBoxes[ $key ];
	}
	
	public function addOption( $key, $value ) {
		$this->options[ $key ] = $value;
	}
	
	public function getOption( $key ) {
		if ( isset( $this->options[ $key ] ) ) {
			return $this->options[ $key ];
		}
		
		return;
	}
	
	public function getMetaBoxesByScope( $scope ) {
		$boxes = array();
		
		if ( is_array( $this->metaBoxes ) && count( $this->metaBoxes ) ) {
			foreach ( $this->metaBoxes as $metabox ) {
				if ( is_array( $metabox->scope ) && in_array( $scope, $metabox->scope ) ) {
					$boxes[] = $metabox;
				} elseif ( $metabox->scope !== '' && $metabox->scope === $scope ) {
					$boxes[] = $metabox;
				}
			}
		}
		
		return $boxes;
	}
	
	public function addOptionByType( $type, $key ) {
		$this->optionsByType[ $type ][] = $key;
	}
	
	public function getOptionsByType( $type ) {
		
		if ( array_key_exists( $type, $this->optionsByType ) ) {
			return $this->optionsByType[ $type ];
		}
		
		return array();
	}
}

/*
   Class: StockholmQodeMetaBox
   A class that initializes Qode Meta Box
*/

class StockholmQodeMetaBox implements iStockholmQodeLayoutNode {
	public $layout;
	private $factory;
	public $scope;
	public $title;
	public $hidden_property;
	public $hidden_values = array();
	public $name;
	
	function __construct( $scope = "", $title_label = "", $name = '', $hidden_property = "", $hidden_values = array() ) {
		$this->layout          = array();
		$this->factory         = new StockholmQodeFieldFactory();
		$this->scope           = $scope;
		$this->title           = $title_label;
		$this->hidden_property = $hidden_property;
		$this->hidden_values   = $hidden_values;
		$this->name            = $name;
	}
	
	public function hasChidren() {
		return ( is_array( $this->layout ) && count( $this->layout ) > 0 ) ? true : false;
	}
	
	public function getChild( $key ) {
		return $this->layout[ $key ];
	}
	
	public function addChild( $key, $value ) {
		$this->layout[ $key ] = $value;
	}
	
	function render() {
		foreach ( $this->layout as $child ) {
			$this->renderChild( $child );
		}
	}
	
	public function renderChild( iStockholmQodeRender $child ) {
		$child->render( $this->factory );
	}
}

if ( ! function_exists( 'stockholm_qode_init_framework_variable' ) ) {
	function stockholm_qode_init_framework_variable() {
		global $stockholm_qode_framework;
		
		$stockholm_qode_framework = StockholmQodeFramework::get_instance();
	}
	
	add_action( 'stockholm_qode_action_before_options_map', 'stockholm_qode_init_framework_variable' );
}