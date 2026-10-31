<?php

if ( ! function_exists( 'stockholm_qode_is_sidearea_enabled' ) ) {
	function stockholm_qode_is_sidearea_enabled() {
		$is_enabled = true;
		if ( stockholm_qode_options()->getOptionValue( 'enable_side_area' ) == "no" || ! is_active_sidebar( 'sidearea' ) ) {
			$is_enabled = false;
		}
		
		return $is_enabled;
	}
}

if ( ! function_exists( 'stockholm_qode_include_sidearea' ) ) {
	function stockholm_qode_include_sidearea() {
		
		if ( stockholm_qode_is_sidearea_enabled() && ! stockholm_qode_is_popup_enabled() && ! stockholm_qode_is_vertical_header_enabled() ) {
			get_template_part( 'framework/modules/sidearea/templates/sidearea' );
		}
	}
	
	add_action( 'stockholm_qode_action_before_page_wrapper', 'stockholm_qode_include_sidearea' );
}

if ( ! function_exists( 'stockholm_qode_sidearea_opener_icon' ) ) {
	function stockholm_qode_sidearea_opener_icon() {
		$icon = stockholm_qode_options()->getOptionValue( 'sidearea_open_icon_type' );
		$html = '';
		
		if ( $icon != '' ) {
			switch ( $icon ):
				case 'font-elegant':
					$html = '<span class="icon_menu"></span>';
					break;
				case 'svg-path':
					 $svg_opener_path = stockholm_qode_options()->getOptionValue('side_area_icon_svg_opener');
					if( ! empty( $svg_opener_path ) ){
						$html = $svg_opener_path;
					}
					break;
				default:
					$html = '<i class="fa fa-bars"></i>';
					break;
			endswitch;
		}

//		$escape_atts = array(
//			'svg'   => array(
//				'xmlns'             => true,
//				'version'           => true,
//				'id'                => true,
//				'class'             => true,
//				'x'                 => true,
//				'y'                 => true,
//				'aria-hidden'       => true,
//				'aria-labelledby'   => true,
//				'role'              => true,
//				'width'             => true,
//				'height'            => true,
//				'viewbox'           => true,
//				'enable-background' => true,
//				'focusable'         => true,
//				'data-prefix'       => true,
//				'data-icon'         => true,
//			),
//			'g'     => array(
//				'stroke'       => true,
//				'stroke-width' => true,
//				'fill'         => true,
//				'fill-opacity' => true,
//			),
//			'rect'  => array(
//				'x'      => true,
//				'y'      => true,
//				'width'  => true,
//				'height' => true,
//			),
//			'title' => array(
//				'title' => true
//			),
//			'path'  => array(
//				'd'            => true,
//				'stroke'       => true,
//				'stroke-width' => true,
//				'fill'         => true,
//				'fill-opacity' => true,
//			),
//			'line'     => array(
//				'stroke'            => true,
//				'stroke-width'      => true,
//				'fill'              => true,
//				'fill-opacity'      => true,
//				'stroke-miterlimit' => true,
//				'x1'                => true,
//				'y1'                => true,
//				'x2'                => true,
//				'y2'                => true
//			),
//			'polygon' => array (
//				'points' => true,
//			),
//			'i' => array(
//				'class' => true,
//			),
//			'span' => array(
//				'id'    => true,
//				'class' => true,
//				'style' => true,
//			)
//		);

//		this is disabled until wp_kses is fixed in wp 5.5+
//		echo wp_kses( $html, $escape_atts );
		echo stockholm_qode_get_module_part( $html );
	}
}