<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $interval
 * @var $el_class
 * @var $content - shortcode content
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Tabs $this
 */
$title = $interval = $el_class = $style = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'jquery-ui-tabs' );

$el_class = $this->getExtraClass( $el_class );

$element = 'wpb_tabs';
if ( 'vc_tour' === $this->shortcode ) {
	$element = 'wpb_tour';
}

// Extract tab titles
preg_match_all( '/vc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();
/**
 * vc_tabs
 *
 */
if ( isset( $matches[1] ) ) {
	$tab_titles = $matches[1];
}
$tabs_nav = '';
$tabs_nav .= '<ul class="tabs-nav vc_clearfix">';
foreach ( $tab_titles as $tab ) {
	$tab_atts = shortcode_parse_atts( $tab[0] );
	if ( isset( $tab_atts['title'] ) ) {
		$tabs_nav .= '<li><a href="#tab-' . ( isset( $tab_atts['tab_id'] ) ? $tab_atts['tab_id'] : sanitize_title( $tab_atts['title'] ) ) . '">' . $tab_atts['title'] . '</a></li>';
	}
}
$tabs_nav .= '</ul>';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . ' tabs_holder wpb_content_element clearfix ' . $el_class ), $this->settings['base'], $atts );

if ( 'vc_tour' === $this->shortcode ) {
	$next_prev_nav = '<div class="wpb_tour_next_prev_nav vc_clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="' . esc_attr__( 'Previous tab', 'stockholm' ) . '">' . esc_html__( 'Previous tab', 'stockholm' ) . '</a></span> <span class="wpb_next_slide"><a href="#next" title="' . esc_attr__( 'Next tab', 'stockholm' ) . '">' . esc_html__( 'Next tab', 'stockholm' ) . '</a></span></div>';
} else {
	$next_prev_nav = '';
}

switch($style) {
    case 'boxed':
        $style_class = 'boxed';
        break;
    case 'vertical_left':
        $style_class = 'vertical left';
        break;
    case 'vertical_right':
        $style_class = 'vertical right';
        break;
    case 'horizontal':
        $style_class = 'horizontal center';
        break;
    case 'horizontal_left':
        $style_class = 'horizontal left';
        break;
    case 'horizontal_right':
        $style_class = 'horizontal right';
        break;
}

$output = '
	<div class="' . $css_class . '" data-interval="' . $interval . '">
		<div class="wpb_wrapper q_tabs ' . $style_class . '">
			' . wpb_widget_title( array(
		'title' => $title,
		'extraclass' => $element . '_heading',
	) )
          . $tabs_nav
          . "<div class='tabs-container'>"
          . wpb_js_remove_wpautop( $content )
          ."</div>"
          . $next_prev_nav . '
		</div>
	</div>
';

// @codingStandardsIgnoreLine
echo stockholm_qode_get_module_part($output);