<?php

if ( ! function_exists( 'stockholm_qode_get_portfolio_template' ) ) {
	function stockholm_qode_get_portfolio_template() {
		$page_id            = get_the_ID();
		$portfolio_style    = stockholm_qode_options()->getOptionValue( 'portfolio_style' );
		$portfolio_template = 'small-images';
		
		if ( get_post_meta( $page_id, "qode_choose-portfolio-single-view", true ) != "" ) {
			$portfolio_template = get_post_meta( $page_id, "qode_choose-portfolio-single-view", true );
		} elseif ( ! empty( $portfolio_style ) ) {
			$portfolio_template = $portfolio_style;
		}
		
		return $portfolio_template;
	}
}

if ( ! function_exists( 'stockholm_qode_get_portfolio_full_width_templates' ) ) {
	function stockholm_qode_get_portfolio_full_width_templates() {
		$templates = array(
			'full-width-custom',
			'fullwidth-slider',
			'fullwidth-slider-inverted',
			'fullscreen-slider',
			'wide-left',
			'wide-right'
		);
		
		return $templates;
	}
}

if ( ! function_exists( 'stockholm_qode_get_portfolio_follow_info_class' ) ) {
	function stockholm_qode_get_portfolio_follow_info_class() {
		$class = "portfolio_single_follow";
		
		if ( stockholm_qode_options()->getOptionValue( 'portfolio_text_follow' ) ) {
			$class = stockholm_qode_options()->getOptionValue( 'portfolio_text_follow' );
		}
		
		return $class;
	}
}