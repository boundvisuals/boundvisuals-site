<?php

if ( ! function_exists( 'stockholm_qode_register_sidebars' ) ) {
	function stockholm_qode_register_sidebars() {
		$centered_logo = false;
		if ( stockholm_qode_is_core_installed() && stockholm_qode_options()->getOptionValue( 'center_logo_image' ) == "yes" ) {
			$centered_logo = true;
		}
		
		if ( stockholm_qode_is_core_installed() && stockholm_qode_get_header_bottom_appearance() == "fixed_hiding" ) {
			$centered_logo = true;
		}
		
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'stockholm' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Default Sidebar area. In order to display this area you need to enable sidebar layout through global theme options or on page meta box options.', 'stockholm' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
			'after_widget'  => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Page', 'stockholm' ),
			'id'            => 'sidebar_page',
			'description'   => esc_html__( 'Default Sidebar area for Pages. In order to display this area you need to enable sidebar layout through global theme options or on page meta box options.', 'stockholm' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
			'after_widget'  => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Header Top Left', 'stockholm' ),
			'id'            => 'header_left',
			'description'   => esc_html__( 'Widgets added here will appear on the left side in top header area', 'stockholm' ),
			'before_widget' => '<div class="header-widget %2$s header-left-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => ''
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Header Top Right', 'stockholm' ),
			'id'            => 'header_right',
			'description'   => esc_html__( 'Widgets added here will appear on the right side in top header area', 'stockholm' ),
			'before_widget' => '<div class="header-widget %2$s header-right-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => ''
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Header Bottom Right', 'stockholm' ),
			'id'            => 'header_bottom_right',
			'description'   => esc_html__( 'Widgets added here will appear on the right side in menu header area', 'stockholm' ),
			'before_widget' => '<div class="header_bottom_widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => ''
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Header Fixed Right', 'stockholm' ),
			'id'            => 'header_fixed_right',
			'description'   => esc_html__( 'This widget area is used only with "sticky with menu on bottom" menu type', 'stockholm' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		) );
		
		if ( $centered_logo ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Header Left From Logo', 'stockholm' ),
				'id'            => 'header_left_from_logo',
				'description'   => esc_html__( 'Widgets added here will appear on the left side of logo area', 'stockholm' ),
				'before_widget' => '<div class="header-widget %2$s header-left-from-logo-widget"><div class="header-left-from-logo-widget-inner"><div class="header-left-from-logo-widget-inner2">',
				'after_widget'  => '</div></div></div>',
				'before_title'  => '',
				'after_title'   => ''
			) );
			
			register_sidebar( array(
				'name'          => esc_html__( 'Header Right From Logo', 'stockholm' ),
				'id'            => 'header_right_from_logo',
				'description'   => esc_html__( 'Widgets added here will appear on the right side of logo area', 'stockholm' ),
				'before_widget' => '<div class="header-widget %2$s header-right-from-logo-widget"><div class="header-right-from-logo-widget-inner"><div class="header-right-from-logo-widget-inner2">',
				'after_widget'  => '</div></div></div>',
				'before_title'  => '',
				'after_title'   => ''
			) );
		}
		
		register_sidebar( array(
			'name'          => esc_html__( 'Left Menu Area', 'stockholm' ),
			'id'            => 'vertical_menu_area',
			'description'   => esc_html__( 'Widgets added here will appear inside Left Menu Area', 'stockholm' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Side Area', 'stockholm' ),
			'id'            => 'sidearea',
			'description'   => esc_html__( 'Widgets added here will appear inside Side Area', 'stockholm' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );
		
		do_action( 'stockholm_qode_action_additional_sidebars' );
		
		if ( stockholm_qode_is_woocommerce_installed() ) {
			register_sidebar( array(
				'name'          => esc_html__( 'WooCommerce Dropdown Widget Area', 'stockholm' ),
				'id'            => 'woocommerce_dropdown',
				'description'   => esc_html__( 'This widget area should be used only for WooCommerce dropdown cart widget', 'stockholm' ),
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => ''
			) );
		}
	}
	
	add_action( 'widgets_init', 'stockholm_qode_register_sidebars' );
}

if ( ! function_exists( 'stockholm_qode_is_user_made_sidebar' ) ) {
	function stockholm_qode_is_user_made_sidebar( $name ) {
		
		//this have to be changed depending on theme
		if ( $name == esc_html__( 'Sidebar', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Sidebar Page', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Header Top Left', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Header Top Right', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Header Bottom Right', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Header Fixed Right', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Header Left From Logo', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Header Right From Logo', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Left Menu Area', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Side Area', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Footer Column 1', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Footer Column 2', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Footer Column 3', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Footer Column 4', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Footer Text', 'stockholm' ) ) {
			return false;
		} else if ( $name == esc_html__( 'WooCommerce Dropdown Widget Area', 'stockholm' ) ) {
			return false;
		} else {
			return true;
		}
	}
}

if ( ! function_exists( 'stockholm_qode_get_sidebar_area_classes' ) ) {
	function stockholm_qode_get_sidebar_area_classes() {
		$classes = array();
		
		if ( stockholm_qode_is_core_installed() ) {
			if ( stockholm_qode_options()->getOptionValue( 'sidebar_widget_border' ) == 'yes' ) {
				$classes[] = 'enable_widget_borders';
			}
			
			if ( stockholm_qode_options()->getOptionValue( 'sidebar_alignment' ) ) {
				$classes[] = stockholm_qode_options()->getOptionValue( 'sidebar_alignment' );
			}
		}
		
		return implode( ' ', $classes );
	}
}