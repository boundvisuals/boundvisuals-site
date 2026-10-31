<?php

if ( ! function_exists( 'stockholm_qode_register_footer_sidebars' ) ) {
	function stockholm_qode_register_footer_sidebars() {
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 1', 'stockholm' ),
			'id'            => 'footer_column_1',
			'description'   => esc_html__( 'Widgets added here will appear in the first column of top footer area', 'stockholm' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 2', 'stockholm' ),
			'id'            => 'footer_column_2',
			'description'   => esc_html__( 'Widgets added here will appear in the second column of top footer area', 'stockholm' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 3', 'stockholm' ),
			'id'            => 'footer_column_3',
			'description'   => esc_html__( 'Widgets added here will appear in the third column of top footer area', 'stockholm' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 4', 'stockholm' ),
			'id'            => 'footer_column_4',
			'description'   => esc_html__( 'Widgets added here will appear in the fourth column of top footer area', 'stockholm' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Text', 'stockholm' ),
			'id'            => 'footer_text',
			'description'   => esc_html__( 'Widgets added here will appear in the footer bottom text area', 'stockholm' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		) );
	}
	
	add_action( 'stockholm_qode_action_additional_sidebars', 'stockholm_qode_register_footer_sidebars' );
}

if ( ! function_exists( 'stockholm_qode_is_footer_top_enabled' ) ) {
	function stockholm_qode_is_footer_top_enabled() {
		$footer_top_flag = false;

		//check value from options and meta field on current page
		$option_flag = true;
		if ( stockholm_qode_get_meta_field_intersect( 'show_footer_top' ) == "no" ) {
			$option_flag = false;
		}
		
		//check footer columns.If they are empty, disable footer top
		$columns_flag = false;
		for ( $i = 1; $i <= 4; $i ++ ) {
			$footer_columns_id = 'footer_column_' . $i;
			if ( is_active_sidebar( $footer_columns_id ) ) {
				$columns_flag = true;
				break;
			}
		}
		
		if ( $option_flag && $columns_flag ) {
			$footer_top_flag = true;
		}
		
		return $footer_top_flag;
	}
}

if ( ! function_exists( 'stockholm_qode_is_footer_bottom_enabled' ) ) {
	function stockholm_qode_is_footer_bottom_enabled() {
		$footer_bottom_flag = false;
		
		//check value from options and meta field on current page
		$option_flag = true;
		if ( stockholm_qode_get_meta_field_intersect( 'footer_text' ) == "no" ) {
			$option_flag = false;
		}
		
		if ( $option_flag && is_active_sidebar( 'footer_text' ) ) {
			$footer_bottom_flag = true;
		}
		
		return $footer_bottom_flag;
	}
}

if ( ! function_exists( 'stockholm_qode_get_footer_holder_classes' ) ) {
	function stockholm_qode_get_footer_holder_classes() {
		$classes = array();
		
		if ( stockholm_qode_options()->getOptionValue( 'uncovering_footer' ) == "yes" ) {
			$classes[] = 'uncover';
		}
		
		$footer_border_columns_meta = stockholm_qode_options()->getOptionValue( 'footer_border_columns' );
		$footer_border_columns      = ! empty( $footer_border_columns_meta ) ? $footer_border_columns_meta : 'yes';
		
		if ( $footer_border_columns == 'yes' ) {
			$classes[] = 'footer_border_columns';
		}
		
		if ( ! empty( $classes ) ) {
			return implode( ' ', $classes );
		}
	}
}