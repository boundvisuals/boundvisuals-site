<?php
$args = array(
    "nav_position" => "left",
);

extract(shortcode_atts($args, $atts));
$html = "";
$data_attr = '';

$data_disable_header_skin_change = 'no';
$data_attr .= " data-disable-header-skin-change='" . $data_disable_header_skin_change . "'";

if( ! empty( $nav_position ) ){
    $data_attr .= " data-nav-position='" . $nav_position . "'";
}

$nav_position = ! empty( $params['nav_position'] ) ? $params['nav_position'] : 'left';

$html .= '<div class="vertical_split_slider" '.$data_attr.'>';
$html .= do_shortcode($content);
$html .= '</div>';

echo stockholm_qode_get_module_part( $html );

