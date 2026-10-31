<?php

if ( ! function_exists( 'stockholm_qode_loading_spinners' ) ) {
	function stockholm_qode_loading_spinners( $return = false ) {
		$spinner_html      = '';
		$spinner_animation = stockholm_qode_options()->getOptionValue( 'loading_animation_spinner' );
		
		if ( ! empty( $spinner_animation ) ) {
			switch ( $spinner_animation ) {
				case "pulse":
					$spinner_html = stockholm_qode_loading_spinner_pulse();
					break;
				case "double_pulse":
					$spinner_html = stockholm_qode_loading_spinner_double_pulse();
					break;
				case "cube":
					$spinner_html = stockholm_qode_loading_spinner_cube();
					break;
				case "rotating_cubes":
					$spinner_html = stockholm_qode_loading_spinner_rotating_cubes();
					break;
				case "stripes":
					$spinner_html = stockholm_qode_loading_spinner_stripes();
					break;
				case "wave":
					$spinner_html = stockholm_qode_loading_spinner_wave();
					break;
				case "two_rotating_circles":
					$spinner_html = stockholm_qode_loading_spinner_two_rotating_circles();
					break;
				case "five_rotating_circles":
					$spinner_html = stockholm_qode_loading_spinner_five_rotating_circles();
					break;
				case "pulsating_circle":
					$spinner_html = stockholm_qode_loading_spinner_pulsating_circle();
					break;
				case "ripples":
					$spinner_html = stockholm_qode_loading_spinner_ripples();
					break;
				case "spinner":
					$spinner_html = stockholm_qode_loading_spinner_spinner();
					break;
				case "cubes":
					$spinner_html = stockholm_qode_loading_spinner_cubes();
					break;
				case "indeterminate":
					$spinner_html = stockholm_qode_loading_spinner_indeterminate();
					break;
			}
		} else {
			$spinner_html = stockholm_qode_loading_spinner_pulse();
		}
		
		if ( $return === true ) {
			return $spinner_html;
		}
		
		echo wp_kses( $spinner_html, array(
			'div' => array(
				'class' => true,
				'style' => true,
				'id'    => true
			)
		) );
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_pulse' ) ) {
	function stockholm_qode_loading_spinner_pulse() {
		$html = '<div class="pulse"></div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_double_pulse' ) ) {
	function stockholm_qode_loading_spinner_double_pulse() {
		$html = '';
		$html .= '<div class="double_pulse">';
		$html .= '<div class="double-bounce1"></div>';
		$html .= '<div class="double-bounce2"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_cube' ) ) {
	function stockholm_qode_loading_spinner_cube() {
		$html = '<div class="cube"></div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_rotating_cubes' ) ) {
	function stockholm_qode_loading_spinner_rotating_cubes() {
		$html = '';
		$html .= '<div class="rotating_cubes">';
		$html .= '<div class="cube1"></div>';
		$html .= '<div class="cube2"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_stripes' ) ) {
	function stockholm_qode_loading_spinner_stripes() {
		$html = '';
		$html .= '<div class="stripes">';
		$html .= '<div class="rect1"></div>';
		$html .= '<div class="rect2"></div>';
		$html .= '<div class="rect3"></div>';
		$html .= '<div class="rect4"></div>';
		$html .= '<div class="rect5"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_wave' ) ) {
	function stockholm_qode_loading_spinner_wave() {
		$html = '';
		$html .= '<div class="wave">';
		$html .= '<div class="bounce1"></div>';
		$html .= '<div class="bounce2"></div>';
		$html .= '<div class="bounce3"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_two_rotating_circles' ) ) {
	function stockholm_qode_loading_spinner_two_rotating_circles() {
		$html = '';
		$html .= '<div class="two_rotating_circles">';
		$html .= '<div class="dot1"></div>';
		$html .= '<div class="dot2"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_five_rotating_circles' ) ) {
	function stockholm_qode_loading_spinner_five_rotating_circles() {
		$html = '';
		$html .= '<div class="five_rotating_circles">';
		$html .= '<div class="spinner-container container1">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '<div class="spinner-container container2">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '<div class="spinner-container container3">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_pulsating_circle' ) ) {
	function stockholm_qode_loading_spinner_pulsating_circle() {
		$html = '<div class="pulsating_circle"></div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_ripples' ) ) {
	function stockholm_qode_loading_spinner_ripples() {
		$html = '';
		$html .= '<div class="ripples">';
		$html .= '<div class="ripples_circle ripples_circle1"></div>';
		$html .= '<div class="ripples_circle ripples_circle2"></div>';
		$html .= '<div class="ripples_circle ripples_circle3"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_spinner' ) ) {
	function stockholm_qode_loading_spinner_spinner() {
		$html = '<div class="spinner"></div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_cubes' ) ) {
	function stockholm_qode_loading_spinner_cubes() {
		$html = '';
		$html .= '<div class="loading-center-absolute">';
		$html .= '<div class="object object_one"></div>';
		$html .= '<div class="object object_two"></div>';
		$html .= '<div class="object object_three"></div>';
		$html .= '<div class="object object_four"></div>';
		$html .= '<div class="object object_five"></div>';
		$html .= '<div class="object object_six"></div>';
		$html .= '<div class="object object_seven"></div>';
		$html .= '<div class="object object_eight"></div>';
		$html .= '<div class="object object_nine"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'stockholm_qode_loading_spinner_indeterminate' ) ) {
	function stockholm_qode_loading_spinner_indeterminate() {
		$html = '';
		$html .= '<div class="indeterminate-holder">';
		$html .= '<div class="indeterminate-progress">';
		$html .= '<div class="indeterminate"></div>';
		$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}
}
