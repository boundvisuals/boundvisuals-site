<?php
/*** Removing shortcodes ***/
vc_remove_element( "vc_wp_search" );
vc_remove_element( "vc_teaser_grid" );
vc_remove_element( "vc_button" );
vc_remove_element( "vc_cta_button" );
vc_remove_element( "vc_cta_button2" );
vc_remove_element( "vc_message" );
vc_remove_element( "vc_tour" );
vc_remove_element( "vc_progress_bar" );
vc_remove_element( "vc_pie" );
vc_remove_element( "vc_posts_slider" );
vc_remove_element( "vc_toggle" );
vc_remove_element( "vc_images_carousel" );
vc_remove_element( "vc_posts_grid" );
vc_remove_element( "vc_carousel" );
vc_remove_element( "vc_cta" );
vc_remove_element( "vc_round_chart" );
vc_remove_element( "vc_line_chart" );
vc_remove_element( "vc_tta_accordion" );
vc_remove_element( "vc_tta_tour" );
vc_remove_element( "vc_tta_tabs" );
vc_remove_element( "vc_section" );

//Remove Grid Elements if disabled
if ( ! stockholm_qode_vc_grid_elements_enabled() && version_compare( stockholm_qode_get_vc_version(), '4.4.2' ) >= 0 ) {
	vc_remove_element( 'vc_basic_grid' );
	vc_remove_element( 'vc_media_grid' );
	vc_remove_element( 'vc_masonry_grid' );
	vc_remove_element( 'vc_masonry_media_grid' );
	vc_remove_element( 'vc_icon' );
	vc_remove_element( 'vc_button2' );
	vc_remove_element( "vc_custom_heading" );
	vc_remove_element( "vc_btn" );
	vc_remove_element( "vc_hoverbox" );
}

/*** Remove unused parameters ***/
if ( function_exists( 'vc_remove_param' ) ) {
	vc_remove_param( 'vc_single_image', 'css_animation' );
	vc_remove_param( 'vc_single_image', 'title' );
	vc_remove_param( 'vc_gallery', 'title' );
	vc_remove_param( 'vc_column_text', 'css_animation' );
	vc_remove_param( 'vc_row', 'video_bg' );
	vc_remove_param( 'vc_row', 'video_bg_url' );
	vc_remove_param( 'vc_row', 'video_bg_parallax' );
	vc_remove_param( 'vc_row', 'full_height' );
	vc_remove_param( 'vc_row', 'content_placement' );
	vc_remove_param( 'vc_row', 'full_width' );
	vc_remove_param( 'vc_row', 'bg_image' );
	vc_remove_param( 'vc_row', 'bg_color' );
	vc_remove_param( 'vc_row', 'font_color' );
	vc_remove_param( 'vc_row', 'margin_bottom' );
	vc_remove_param( 'vc_row', 'bg_image_repeat' );
	vc_remove_param( 'vc_tabs', 'interval' );
	vc_remove_param( 'vc_tabs', 'title' );
	vc_remove_param( 'vc_separator', 'style' );
	vc_remove_param( 'vc_separator', 'color' );
	vc_remove_param( 'vc_separator', 'accent_color' );
	vc_remove_param( 'vc_separator', 'el_width' );
	vc_remove_param( 'vc_text_separator', 'style' );
	vc_remove_param( 'vc_text_separator', 'color' );
	vc_remove_param( 'vc_text_separator', 'accent_color' );
	vc_remove_param( 'vc_text_separator', 'el_width' );
	vc_remove_param( 'vc_text_separator', 'title_align' );
	vc_remove_param( 'vc_accordion', 'title' );
	vc_remove_param( 'vc_row', 'gap' );
	vc_remove_param( 'vc_row', 'columns_placement' );
	vc_remove_param( 'vc_row', 'equal_height' );
	vc_remove_param( 'vc_row', 'disable_element' );
	vc_remove_param( 'vc_row_inner', 'disable_element' );
	vc_remove_param( 'vc_row_inner', 'gap' );
	vc_remove_param( 'vc_row_inner', 'content_placement' );
	vc_remove_param( 'vc_row_inner', 'equal_height' );
	vc_remove_param( 'vc_row', 'css_animation' );
	vc_remove_param( 'vc_text_separator', 'add_icon' );
	vc_remove_param( 'vc_text_separator', 'vc_icon' );
	vc_remove_param( 'vc_text_separator', 'i_icon_material' );
	vc_remove_param( 'vc_text_separator', 'i_icon_monosocial' );
	vc_remove_param( 'vc_text_separator', 'i_type' );
	vc_remove_param( 'vc_text_separator', 'i_icon_fontawesome' );
	vc_remove_param( 'vc_text_separator', 'i_icon_openiconic' );
	vc_remove_param( 'vc_text_separator', 'i_icon_typicons' );
	vc_remove_param( 'vc_text_separator', 'i_icon_entypo' );
	vc_remove_param( 'vc_text_separator', 'i_icon_linecons' );
	vc_remove_param( 'vc_text_separator', 'i_color' );
	vc_remove_param( 'vc_text_separator', 'i_custom_color' );
	vc_remove_param( 'vc_text_separator', 'i_background_color' );
	vc_remove_param( 'vc_text_separator', 'i_background_style' );
	vc_remove_param( 'vc_text_separator', 'i_custom_background_color' );
	vc_remove_param( 'vc_text_separator', 'i_size' );
	vc_remove_param( 'vc_text_separator', 'i_css_animation' );
	
	//remove vc parallax functionality
	vc_remove_param( 'vc_row', 'parallax' );
	vc_remove_param( 'vc_row', 'parallax_image' );
	
	vc_remove_param( 'vc_row', 'parallax_speed_video' );
	vc_remove_param( 'vc_row', 'parallax_speed_bg' );
	
	if ( version_compare( stockholm_qode_get_vc_version(), '4.4.2' ) >= 0 ) {
		vc_remove_param( 'vc_accordion', 'disable_keyboard' );
		vc_remove_param( 'vc_separator', 'align' );
		vc_remove_param( 'vc_separator', 'border_width' );
		vc_remove_param( 'vc_text_separator', 'align' );
		vc_remove_param( 'vc_text_separator', 'border_width' );
	}
	
	if ( version_compare( stockholm_qode_get_vc_version(), '4.7.4' ) >= 0 ) {
		add_action( 'init', 'stockholm_qode_remove_vc_image_zoom', 11 );
		function stockholm_qode_remove_vc_image_zoom() {
			//Remove zoom from click action on single image
			$param = WPBMap::getParam( 'vc_single_image', 'onclick' );
			unset( $param['value']['Zoom'] );
			vc_update_shortcode_param( 'vc_single_image', $param );
		}
		
		vc_remove_param( 'vc_text_separator', 'css' );
		vc_remove_param( 'vc_separator', 'css' );
	}
}

/*** Remove unused parameters from grid elements ***/
if ( function_exists( 'vc_remove_param' ) && stockholm_qode_vc_grid_elements_enabled() && version_compare( stockholm_qode_get_vc_version(), '4.4.2' ) >= 0 ) {
	vc_remove_param( 'vc_basic_grid', 'button_style' );
	vc_remove_param( 'vc_basic_grid', 'button_color' );
	vc_remove_param( 'vc_basic_grid', 'button_size' );
	vc_remove_param( 'vc_basic_grid', 'filter_color' );
	vc_remove_param( 'vc_basic_grid', 'filter_style' );
	vc_remove_param( 'vc_media_grid', 'button_style' );
	vc_remove_param( 'vc_media_grid', 'button_color' );
	vc_remove_param( 'vc_media_grid', 'button_size' );
	vc_remove_param( 'vc_media_grid', 'filter_color' );
	vc_remove_param( 'vc_media_grid', 'filter_style' );
	vc_remove_param( 'vc_masonry_grid', 'button_style' );
	vc_remove_param( 'vc_masonry_grid', 'button_color' );
	vc_remove_param( 'vc_masonry_grid', 'button_size' );
	vc_remove_param( 'vc_masonry_grid', 'filter_color' );
	vc_remove_param( 'vc_masonry_grid', 'filter_style' );
	vc_remove_param( 'vc_masonry_media_grid', 'button_style' );
	vc_remove_param( 'vc_masonry_media_grid', 'button_color' );
	vc_remove_param( 'vc_masonry_media_grid', 'button_size' );
	vc_remove_param( 'vc_masonry_media_grid', 'filter_color' );
	vc_remove_param( 'vc_masonry_media_grid', 'filter_style' );
	vc_remove_param( 'vc_basic_grid', 'paging_color' );
	vc_remove_param( 'vc_basic_grid', 'arrows_color' );
	vc_remove_param( 'vc_media_grid', 'paging_color' );
	vc_remove_param( 'vc_media_grid', 'arrows_color' );
	vc_remove_param( 'vc_masonry_grid', 'paging_color' );
	vc_remove_param( 'vc_masonry_grid', 'arrows_color' );
	vc_remove_param( 'vc_masonry_media_grid', 'paging_color' );
	vc_remove_param( 'vc_masonry_media_grid', 'arrows_color' );
}

/*** Remove frontend editor ***/
if ( function_exists( 'vc_disable_frontend' ) ) {
	vc_disable_frontend();
}

/*** Restore Tabs&Accordion from Deprecated category ***/
$stockholmQodeIconCollections = stockholm_qode_icon_collections();

$vc_map_deprecated_settings = array(
	'deprecated' => false,
	'category' => esc_html__( 'Content', 'stockholm' )
);
vc_map_update( 'vc_accordion', $vc_map_deprecated_settings );
vc_map_update( 'vc_tabs', $vc_map_deprecated_settings );
vc_map_update( 'vc_tab', array( 'deprecated' => false ) );
vc_map_update( 'vc_accordion_tab', array( 'deprecated' => false ) );

$font_awesome_icons = stockholm_qode_font_awesome_icon_array();
$fa_icons           = array();
$fa_icons[""]       = "";
foreach ( $font_awesome_icons as $key => $value ) {
	$fa_icons[ $key ] = $key;
}

$fe_icons = stockholm_qode_font_elegant_icon_array();

$linear_icons = stockholm_qode_linear_icons_icon_array();
foreach ( $linear_icons as $key => $value ) {
	$lnr_icons[ $key ] = $key;
}

$carousel_sliders = stockholm_get_carousel_slider_array();

$animations = array(
	""                                                           => "",
	esc_html__( "Elements Shows From Left Side", 'stockholm' )   => "element_from_left",
	esc_html__( "Elements Shows From Right Side", 'stockholm' )  => "element_from_right",
	esc_html__( "Elements Shows From Top Side", 'stockholm' )    => "element_from_top",
	esc_html__( "Elements Shows From Bottom Side", 'stockholm' ) => "element_from_bottom",
	esc_html__( "Elements Shows From Fade", 'stockholm' )        => "element_from_fade"
);

$social_icons_array = array(
	""                                             => "",
	esc_html__( "ADN", 'stockholm' )               => "fa-adn",
	esc_html__( "Android", 'stockholm' )           => "fa-android",
	esc_html__( "Apple", 'stockholm' )             => "fa-apple",
	esc_html__( "Bitbucket", 'stockholm' )         => "fa-bitbucket",
	esc_html__( "Bitbucket-Sign", 'stockholm' )    => "fa-bitbucket-sign",
	esc_html__( "Bitcoin", 'stockholm' )           => "fa-bitcoin",
	esc_html__( "BTC", 'stockholm' )               => "fa-btc",
	esc_html__( "CSS3", 'stockholm' )              => "fa-css3",
	esc_html__( "Dribbble", 'stockholm' )          => "fa-dribbble",
	esc_html__( "Dropbox", 'stockholm' )           => "fa-dropbox",
	esc_html__( "E-mail", 'stockholm' )            => "fa-envelope",
	esc_html__( "Facebook", 'stockholm' )          => "fa-facebook",
	esc_html__( "Facebook Official", 'stockholm' ) => "fa-facebook-official",
	esc_html__( "Facebook-Sign", 'stockholm' )     => "fa-facebook-sign",
	esc_html__( "Flickr", 'stockholm' )            => "fa-flickr",
	esc_html__( "Forumbee", 'stockholm' )          => "fa-forumbee",
	esc_html__( "Foursquare", 'stockholm' )        => "fa-foursquare",
	esc_html__( "GitHub", 'stockholm' )            => "fa-github",
	esc_html__( "GitHub-Alt", 'stockholm' )        => "fa-github-alt",
	esc_html__( "GitHub-Sign", 'stockholm' )       => "fa-github-sign",
	esc_html__( "Gittip", 'stockholm' )            => "fa-gittip",
	esc_html__( "Google Plus", 'stockholm' )       => "fa-google-plus",
	esc_html__( "Google Plus-Sign", 'stockholm' )  => "fa-google-plus-sign",
	esc_html__( "HTML5", 'stockholm' )             => "fa-html5",
	esc_html__( "Instagram", 'stockholm' )         => "fa-instagram",
	esc_html__( "LinkedIn", 'stockholm' )          => "fa-linkedin",
	esc_html__( "LinkedIn-Sign", 'stockholm' )     => "fa-linkedin-sign",
	esc_html__( "Linux", 'stockholm' )             => "fa-linux",
	esc_html__( "MaxCDN", 'stockholm' )            => "fa-maxcdn",
	esc_html__( "Paypal", 'stockholm' )            => "fa-paypal",
	esc_html__( "Pinterest", 'stockholm' )         => "fa-pinterest",
	esc_html__( "Pinterest-P", 'stockholm' )       => "fa-pinterest-p",
	esc_html__( "Pinterest-Sign", 'stockholm' )    => "fa-pinterest-sign",
	esc_html__( "Renren", 'stockholm' )            => "fa-renren",
	esc_html__( "Skype", 'stockholm' )             => "fa-skype",
	esc_html__( "StackExchange", 'stockholm' )     => "fa-stackexchange",
	esc_html__( "Trello", 'stockholm' )            => "fa-trello",
	esc_html__( "Tumblr", 'stockholm' )            => "fa-tumblr",
	esc_html__( "Tumblr-Sign", 'stockholm' )       => "fa-tumblr-sign",
	esc_html__( "Twitter", 'stockholm' )           => "fa-twitter",
	esc_html__( "Twitter-Sign", 'stockholm' )      => "fa-twitter-sign",
	esc_html__( "VK", 'stockholm' )                => "fa-vk",
	esc_html__( "WhatsApp", 'stockholm' )          => "fa-whatsapp",
	esc_html__( "Weibo", 'stockholm' )             => "fa-weibo",
	esc_html__( "Windows", 'stockholm' )           => "fa-windows",
	esc_html__( "Xing", 'stockholm' )              => "fa-xing",
	esc_html__( "Xing-Sign", 'stockholm' )         => "fa-xing-sign",
	esc_html__( "Yelp", 'stockholm' )              => "fa-yelp",
	esc_html__( "YouTube", 'stockholm' )           => "fa-youtube",
	esc_html__( "YouTube Play", 'stockholm' )      => "fa-youtube-play",
	esc_html__( "YouTube-Sign", 'stockholm' )      => "fa-youtube-sign"
);

/*** Accordion ***/
vc_add_param( "vc_accordion", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Style", 'stockholm' ),
	"param_name"  => "style",
	"value"       => array(
		esc_html__( "Accordion", 'stockholm' )       => "accordion",
		esc_html__( "Toggle", 'stockholm' )          => "toggle",
		esc_html__( "Boxed Accordion", 'stockholm' ) => "boxed_accordion",
		esc_html__( "Boxed Toggle", 'stockholm' )    => "boxed_toggle"
	),
	'save_always' => true
) );

vc_add_param( "vc_accordion", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Accordion Mark Border Radius", 'stockholm' ),
	"param_name" => "accordion_border_radius",
	"dependency" => Array( 'element' => "style", 'value' => array( 'accordion', 'toggle' ) )
) );

vc_add_param( "vc_accordion_tab", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Title Color", 'stockholm' ),
	"param_name" => "title_color"
) );

vc_add_param( "vc_accordion_tab", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Background Color", 'stockholm' ),
	"param_name" => "background_color"
) );

vc_add_param( "vc_accordion_tab", array(
	"type"       => "dropdown",
	"heading" => esc_html__( "Title Tag", 'stockholm' ),
	"param_name" => "title_tag",
	"value"      => array_flip( stockholm_qode_get_title_tag( true ) )
) );

/*** Tabs ***/

vc_add_param( "vc_tabs", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Style", 'stockholm' ),
	"param_name"  => "style",
	"value"       => array(
		esc_html__( "Horizontal Center", 'stockholm' ) => "horizontal",
		esc_html__( "Horizontal Left", 'stockholm' )   => "horizontal_left",
		esc_html__( "Horizontal Right", 'stockholm' )  => "horizontal_right",
		esc_html__( "Boxed", 'stockholm' )             => "boxed",
		esc_html__( "Vertical Left", 'stockholm' )     => "vertical_left",
		esc_html__( "Vertical Right", 'stockholm' )    => "vertical_right"
	),
	'save_always' => true
) );

/*** Gallery ***/

vc_add_param( "vc_gallery", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Column Number", 'stockholm' ),
	"param_name"  => "column_number",
	"value"       => array( 2, 3, 4, 5, esc_html__( "Disable", 'stockholm' ) => 0 ),
	'save_always' => true,
	"dependency"  => Array( 'element' => "type", 'value' => array( 'image_grid' ) )
) );

vc_add_param( "vc_gallery", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Grayscale Images", 'stockholm' ),
	"param_name"  => "grayscale",
	"value"       => array(
		esc_html__( 'No', 'stockholm' )  => 'no',
		esc_html__( 'Yes', 'stockholm' ) => 'yes'
	),
	'save_always' => true,
	"dependency"  => Array( 'element' => "type", 'value' => array( 'image_grid' ) )
) );

vc_add_param( "vc_gallery", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Space Between Images", 'stockholm' ),
	"param_name"  => "space_between_images",
	"value"       => array(
		esc_html__( 'No', 'stockholm' )  => 'no',
		esc_html__( 'Yes', 'stockholm' ) => 'yes'
	),
	'save_always' => true,
	"dependency"  => Array( 'element' => "type", 'value' => array( 'image_grid' ) )
) );

vc_add_param( "vc_gallery", array(
	"type"       => "dropdown",
	"heading"    => esc_html__( "Frame", 'stockholm' ),
	"param_name" => "frame",
	"value"      => array(
		''                               => '',
		esc_html__( 'Yes', 'stockholm' ) => 'use_frame',
		esc_html__( 'No', 'stockholm' )  => 'no'
	),
	"dependency" => Array( 'element' => "type", 'value' => array( 'flexslider_slide' ) )
) );

vc_add_param( "vc_gallery", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Choose Frame", 'stockholm' ),
	"param_name"  => "choose_frame",
	"value"       => array(
		esc_html__( 'Default', 'stockholm' ) => 'default',
		esc_html__( 'Frame 1', 'stockholm' ) => 'frame1',
		esc_html__( 'Frame 2', 'stockholm' ) => 'frame2',
		esc_html__( 'Frame 3', 'stockholm' ) => 'frame3',
		esc_html__( 'Frame 4', 'stockholm' ) => 'frame4'
	),
	'save_always' => true,
	"dependency"  => Array( 'element' => "frame", 'value' => array( 'use_frame' ) )
) );

/*** Row ***/

vc_add_param( "vc_row", array(
	"type"                    => "dropdown",
	"show_settings_on_create" => true,
	"heading"                 => esc_html__( "Row Type", 'stockholm' ),
	"param_name"              => "row_type",
	"value"                   => array(
		esc_html__( "Row", 'stockholm' )          => "row",
		esc_html__( "Parallax", 'stockholm' )     => "parallax",
		esc_html__( "Expandable", 'stockholm' )   => "expandable",
		esc_html__( "Content menu", 'stockholm' ) => "content_menu"
	),
	'save_always'             => true
) );

vc_add_param( "vc_row", array(
	"type"                    => "dropdown",
	"show_settings_on_create" => true,
	"heading"                 => esc_html__( "Use Row as Full Screen Section", 'stockholm' ),
	"param_name"              => "use_row_as_full_screen_section",
	"value"                   => array(
		esc_html__( "No", 'stockholm' )  => "no",
		esc_html__( "Yes", 'stockholm' ) => "yes"
	),
	'save_always'             => true,
	"description"             => esc_html__( "This option works only for Full Screen Sections Template", 'stockholm' ),
	"dependency"              => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Type", 'stockholm' ),
	"param_name"  => "type",
	"value"       => array(
		esc_html__( "Full Width", 'stockholm' ) => "full_width",
		esc_html__( "In Grid", 'stockholm' )    => "grid"
	),
	'save_always' => true,
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Anchor ID (Example home)", 'stockholm' ),
	"param_name" => "anchor",
	"value"      => "",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row', 'parallax', 'expandable' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "checkbox",
	"heading"    => esc_html__( "Row in content menu", 'stockholm' ),
	"value"      => array( esc_html__( "Use row for content menu?", 'stockholm' ) => "in_content_menu" ),
	"param_name" => "in_content_menu",
	"dependency" => Array(
		'element' => "row_type",
		'value'   => array( 'row', 'parallax', 'expandable', 'expandable_with_background' )
	)
) );

vc_add_param( "vc_row", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Content menu title", 'stockholm' ),
	"value"      => "",
	"param_name" => "content_menu_title",
	"dependency" => Array( 'element' => "in_content_menu", 'value' => array( 'in_content_menu' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Content menu icon pack", 'stockholm' ),
	"param_name"  => "icon_pack",
	"value"       => array(
		esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
		esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
		esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
	),
	'save_always' => true,
	"dependency"  => Array( 'element' => "in_content_menu", 'value' => array( 'in_content_menu' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Content menu icon", 'stockholm' ),
	"param_name"  => "content_menu_fa_icon",
	"value"       => $fa_icons,
	'save_always' => true,
	"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Content menu icon", 'stockholm' ),
	"param_name"  => "content_menu_fe_icon",
	"value"       => $fe_icons,
	'save_always' => true,
	"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Content menu icon", 'stockholm' ),
	"param_name"  => "content_menu_linear_icon",
	"value"       => $lnr_icons,
	'save_always' => true,
	"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Text Align", 'stockholm' ),
	"param_name"  => "text_align",
	"value"       => array(
		esc_html__( "Left", 'stockholm' )   => "left",
		esc_html__( "Center", 'stockholm' ) => "center",
		esc_html__( "Right", 'stockholm' )  => "right"
	),
	'save_always' => true,
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'row', 'parallax', 'expandable' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "dropdown",
	"heading"    => esc_html__( "Video background", 'stockholm' ),
	"value"      => array(
		esc_html__( "No", 'stockholm' )  => "",
		esc_html__( "Yes", 'stockholm' ) => "show_video"
	),
	"param_name" => "video",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "dropdown",
	"heading"    => esc_html__( "Video overlay", 'stockholm' ),
	"value"      => array(
		esc_html__( "No", 'stockholm' )  => "",
		esc_html__( "Yes", 'stockholm' ) => "show_video_overlay"
	),
	"param_name" => "video_overlay",
	"dependency" => Array( 'element' => "video", 'value' => array( 'show_video' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "attach_image",
	"heading"    => esc_html__( "Video overlay image (pattern)", 'stockholm' ),
	"value"      => "",
	"param_name" => "video_overlay_image",
	"dependency" => Array( 'element' => "video_overlay", 'value' => array( 'show_video_overlay' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Video background (webm) file url", 'stockholm' ),
	"value"      => "",
	"param_name" => "video_webm",
	"dependency" => Array( 'element' => "video", 'value' => array( 'show_video' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Video background (mp4) file url", 'stockholm' ),
	"value"      => "",
	"param_name" => "video_mp4",
	"dependency" => Array( 'element' => "video", 'value' => array( 'show_video' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Video background (ogv) file url", 'stockholm' ),
	"value"      => "",
	"param_name" => "video_ogv",
	"dependency" => Array( 'element' => "video", 'value' => array( 'show_video' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "attach_image",
	"heading"    => esc_html__( "Video preview image", 'stockholm' ),
	"value"      => "",
	"param_name" => "video_image",
	"dependency" => Array( 'element' => "video", 'value' => array( 'show_video' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "attach_image",
	"heading"    => esc_html__( "Background image", 'stockholm' ),
	"value"      => "",
	"param_name" => "background_image",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'parallax', 'row' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "checkbox",
	"heading" => esc_html__( "Pattern background", 'stockholm' ),
	"value"      => array( esc_html__( "Use background image as pattern?", 'stockholm' ) => "pattern_background" ),
	"param_name" => "pattern_background",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Full Screen Height", 'stockholm' ),
	"param_name"  => "full_screen_section_height",
	"value"       => array(
		esc_html__( "No", 'stockholm' )  => "no",
		esc_html__( "Yes", 'stockholm' ) => "yes"
	),
	'save_always' => true,
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'parallax' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Vertically Align Content In Middle", 'stockholm' ),
	"param_name"  => "vertically_align_content_in_middle",
	"value"       => array(
		esc_html__( "No", 'stockholm' )  => "no",
		esc_html__( "Yes", 'stockholm' ) => "yes"
	),
	'save_always' => true,
	"dependency"  => array( 'element' => 'full_screen_section_height', 'value' => 'yes' )
) );

vc_add_param( "vc_row", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Section height", 'stockholm' ),
	"param_name" => "section_height",
	"value"      => "",
	"dependency" => Array( 'element' => "full_screen_section_height", 'value' => array( 'no' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Parallax speed", 'stockholm' ),
	"param_name" => "parallax_speed",
	"value"      => "",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'parallax' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Background color", 'stockholm' ),
	"param_name" => "background_color",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row', 'expandable', 'content_menu' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Background Animation", 'stockholm' ),
	"param_name"  => "background_animation",
	"value"       => array(
		esc_html__( "None", 'stockholm' )       => "none",
		esc_html__( "From Left", 'stockholm' )  => "from-left",
		esc_html__( "From Right", 'stockholm' ) => "from-right"
	),
	'save_always' => true,
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Border bottom color", 'stockholm' ),
	"param_name" => "border_color",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "textfield",
	"heading"     => esc_html__( "Padding", 'stockholm' ),
	"value"       => "",
	"param_name"  => "side_padding",
	"description" => esc_html__( "Padding (left/right in pixels)", 'stockholm' ),
	"dependency"  => Array( 'element' => "type", 'value' => array( 'full_width' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Padding Top (px)", 'stockholm' ),
	"value"      => "",
	"param_name" => "padding_top",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Padding Bottom (px)", 'stockholm' ),
	"value"      => "",
	"param_name" => "padding_bottom",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Label Color", 'stockholm' ),
	"param_name" => "color",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'expandable' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Label Hover Color", 'stockholm' ),
	"param_name" => "hover_color",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'expandable' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "textfield",
	"heading"     => esc_html__( "More Label", 'stockholm' ),
	"param_name"  => "more_button_label",
	"value"       => "",
	"description" => esc_html__( "Default label is More Facts", 'stockholm' ),
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'expandable' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "textfield",
	"heading"     => esc_html__( "Less Label", 'stockholm' ),
	"param_name"  => "less_button_label",
	"value"       => "",
	"description" => esc_html__( "Default label is Less Facts", 'stockholm' ),
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'expandable' ) )
) );

vc_add_param( "vc_row", array(
	"type"       => "dropdown",
	"heading"    => esc_html__( "Label Position", 'stockholm' ),
	"param_name" => "button_position",
	"value"      => array(
		""                                  => "",
		esc_html__( "Left", 'stockholm' )   => "left",
		esc_html__( "Right", 'stockholm' )  => "right",
		esc_html__( "Center", 'stockholm' ) => "center"
	),
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'expandable' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "CSS Animation", 'stockholm' ),
	"param_name"  => "css_animation",
	"admin_label" => true,
	"value"       => $animations,
	'save_always' => true,
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row", array(
	"type"        => "textfield",
	"heading"     => esc_html__( "Transition delay (ms)", 'stockholm' ),
	"param_name"  => "transition_delay",
	"admin_label" => true,
	"value"       => "",
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

/*** Row Inner ***/

vc_add_param( "vc_row_inner", array(
	"type"                    => "dropdown",
	"show_settings_on_create" => true,
	"heading"                 => esc_html__( "Row Type", 'stockholm' ),
	"param_name"              => "row_type",
	"value"                   => array(
		esc_html__( "Row", 'stockholm' )        => "row",
		esc_html__( "Parallax", 'stockholm' )   => "parallax",
		esc_html__( "Expandable", 'stockholm' ) => "expandable"
	),
	'save_always'             => true
) );

vc_add_param( "vc_row_inner", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Type", 'stockholm' ),
	"param_name"  => "type",
	"value"       => array(
		esc_html__( "Full Width", 'stockholm' ) => "full_width",
		esc_html__( "In Grid", 'stockholm' )    => "grid"
	),
	'save_always' => true,
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Use Row as Full Screen Section Slide", 'stockholm' ),
	"param_name"  => "use_row_as_full_screen_section_slide",
	"value"       => array(
		esc_html__( "No", 'stockholm' )  => "no",
		esc_html__( "Yes", 'stockholm' ) => "yes"
	),
	'save_always' => true,
	"description" => esc_html__( "This option works only for Full Screen Sections Template", 'stockholm' ),
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "checkbox",
	"heading"    => esc_html__( "Use as box", 'stockholm' ),
	"value"      => array( esc_html__( "Use row as box", 'stockholm' ) => "use_row_as_box" ),
	"param_name" => "use_as_box",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Anchor ID", 'stockholm' ),
	"param_name" => "anchor",
	"value"      => ""
) );

vc_add_param( "vc_row_inner", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Text Align", 'stockholm' ),
	"param_name"  => "text_align",
	"value"       => array(
		esc_html__( "Left", 'stockholm' )   => "left",
		esc_html__( "Center", 'stockholm' ) => "center",
		esc_html__( "Right", 'stockholm' )  => "right"
	),
	'save_always' => true
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Background color", 'stockholm' ),
	"param_name" => "background_color",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row', 'expandable' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "attach_image",
	"heading"    => esc_html__( "Background image", 'stockholm' ),
	"value"      => "",
	"param_name" => "background_image",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'parallax' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "attach_image",
	"heading"    => esc_html__( "Slide Background image", 'stockholm' ),
	"value"      => "",
	"param_name" => "slide_background_image",
	"dependency" => Array( 'element' => "use_row_as_full_screen_section_slide", 'value' => array( 'yes' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Section height", 'stockholm' ),
	"param_name" => "section_height",
	"value"      => "",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'parallax' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Parallax speed", 'stockholm' ),
	"param_name" => "parallax_speed",
	"value"      => "",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'parallax' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Border color", 'stockholm' ),
	"param_name" => "border_color",
	"value"      => "",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row', 'expandable' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"        => "textfield",
	"heading"     => esc_html__( "Padding", 'stockholm' ),
	"value"       => "",
	"param_name"  => "side_padding",
	"description" => esc_html__( "Left and right spacing in pixels", 'stockholm' ),
	"dependency"  => Array( 'element' => "type", 'value' => array( 'full_width' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Padding Top", 'stockholm' ),
	"value"      => "",
	"param_name" => "padding_top",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Padding Bottom", 'stockholm' ),
	"value"      => "",
	"param_name" => "padding_bottom",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "More Button Label", 'stockholm' ),
	"param_name" => "more_button_label",
	"value"      => "",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'expandable' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Less Button Label", 'stockholm' ),
	"param_name" => "less_button_label",
	"value"      => "",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'expandable' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "dropdown",
	"heading"    => esc_html__( "Button Position", 'stockholm' ),
	"param_name" => "button_position",
	"value"      => array(
		""                                  => "",
		esc_html__( "Left", 'stockholm' )   => "left",
		esc_html__( "Right", 'stockholm' )  => "right",
		esc_html__( "Center", 'stockholm' ) => "center"
	),
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'expandable' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Color", 'stockholm' ),
	"param_name" => "color",
	"dependency" => Array( 'element' => "row_type", 'value' => array( 'expandable' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "CSS Animation", 'stockholm' ),
	"param_name"  => "css_animation",
	"admin_label" => true,
	"value"       => $animations,
	'save_always' => true,
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

vc_add_param( "vc_row_inner", array(
	"type"        => "textfield",
	"heading"     => esc_html__( "Transition delay (ms)", 'stockholm' ),
	"param_name"  => "transition_delay",
	"admin_label" => true,
	"value"       => "",
	"dependency"  => Array( 'element' => "row_type", 'value' => array( 'row' ) )
) );

/*** Separator ***/

$separator_setting = array(
	'show_settings_on_create' => true,
	"controls"                => '',
);
vc_map_update( 'vc_separator', $separator_setting );

vc_add_param( "vc_separator", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Type", 'stockholm' ),
	"param_name"  => "type",
	"value"       => array(
		esc_html__( "Normal", 'stockholm' )      => "normal",
		esc_html__( "Transparent", 'stockholm' ) => "transparent",
		esc_html__( "Full width", 'stockholm' )  => "full_width",
		esc_html__( "Small", 'stockholm' )       => "small"
	),
	'save_always' => true
) );

vc_add_param( "vc_separator", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Position", 'stockholm' ),
	"param_name"  => "position",
	"value"       => array(
		esc_html__( "Center", 'stockholm' ) => "center",
		esc_html__( "Left", 'stockholm' )   => "left",
		esc_html__( "Right", 'stockholm' )  => "right"
	),
	'save_always' => true,
	"dependency"  => array( "element" => "type", "value" => array( "small" ) )
) );

vc_add_param( "vc_separator", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Color", 'stockholm' ),
	"param_name" => "color"
) );

vc_add_param( "vc_separator", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "Border Style", 'stockholm' ),
	"param_name"  => "border_style",
	"value"       => array(
		""                                  => "",
		esc_html__( "Dashed", 'stockholm' ) => "dashed",
		esc_html__( "Solid", 'stockholm' )  => "solid"
	),
	'save_always' => true
) );

vc_add_param( "vc_separator", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Thickness", 'stockholm' ),
	"param_name" => "thickness",
	"value"      => ""
) );

vc_add_param( "vc_separator", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Width", 'stockholm' ),
	"param_name" => "width",
	"value"      => "",
	"dependency" => array( "element" => "type", "value" => array( "small" ) )
) );

vc_add_param( "vc_separator", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Top Margin", 'stockholm' ),
	"param_name" => "up",
	"value"      => ""
) );

vc_add_param( "vc_separator", array(
	"type"       => "textfield",
	"heading"    => esc_html__( "Bottom Margin", 'stockholm' ),
	"param_name" => "down",
	"value"      => ""
) );

/*** Separator With Text ***/

vc_add_param( "vc_text_separator", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Border Color", 'stockholm' ),
	"param_name" => "border_color"
) );

vc_add_param( "vc_text_separator", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Background Color", 'stockholm' ),
	"param_name" => "background_color"
) );

vc_add_param( "vc_text_separator", array(
	"type"       => "colorpicker",
	"heading"    => esc_html__( "Title Color", 'stockholm' ),
	"param_name" => "title_color"
) );

/*** Single Image ***/

vc_add_param( "vc_single_image", array(
	"type"        => "dropdown",
	"heading"     => esc_html__( "CSS Animation", 'stockholm' ),
	"param_name"  => "qode_css_animation",
	"admin_label" => true,
	"value"       => $animations,
	'save_always' => true,
) );

vc_add_param( "vc_single_image", array(
	"type"        => "textfield",
	"heading"     => esc_html__( "Transition delay (s)", 'stockholm' ),
	"param_name"  => "transition_delay",
	"admin_label" => true,
	"value"       => ""
) );

/*** Contact Form 7 ***/

if ( stockholm_qode_contact_form_7_installed() ) {
	vc_add_param( "contact-form-7", array(
		"type"        => "dropdown",
		"heading"     => esc_html__( "Style", 'stockholm' ),
		"param_name"  => "html_class",
		"value"       => array(
			esc_html__( "Default", 'stockholm' )        => "default",
			esc_html__( "Custom Style 1", 'stockholm' ) => "cf7_custom_style_1",
			esc_html__( "Custom Style 2", 'stockholm' ) => "cf7_custom_style_2"
		),
		'save_always' => true,
		"description" => esc_html__( "You can style each form element individually in Select Options > Contact Form", 'stockholm' )
	) );
}

/*** Blockquote  ***/

vc_map( array(
	"name"                      => esc_html__( "Blockquote", 'stockholm' ),
	"base"                      => "blockquote",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-blockquote extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "textarea",
			"holder"      => "div",
			"heading"     => esc_html__( "Text", 'stockholm' ),
			"param_name"  => "text",
			"value"       => "Blockquote text",
			'save_always' => true
		),
		array(
			"type"       => "colorpicker",
			"heading"    => esc_html__( "Text Color", 'stockholm' ),
			"param_name" => "text_color"
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Text Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) )
		),
		array(
			"type"        => "textfield",
			"heading"     => esc_html__( "Width", 'stockholm' ),
			"param_name"  => "width",
			"description" => esc_html__( "Width (%)", 'stockholm' )
		),
		array(
			"type"        => "textfield",
			"heading"     => esc_html__( "Line Height", 'stockholm' ),
			"param_name"  => "line_height",
			"description" => esc_html__( "Line Height (px)", 'stockholm' )
		),
		array(
			"type"       => "colorpicker",
			"heading"    => esc_html__( "Background Color", 'stockholm' ),
			"param_name" => "background_color"
		),
		array(
			"type"       => "colorpicker",
			"heading"    => esc_html__( "Border Color", 'stockholm' ),
			"param_name" => "border_color"
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Show Quote Icon", 'stockholm' ),
			"param_name"  => "show_quote_icon",
			"value"       => array(
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			),
			'save_always' => true
		),
		array(
			"type"       => "colorpicker",
			"heading"    => esc_html__( "Quote Icon Color", 'stockholm' ),
			"param_name" => "quote_icon_color",
			"dependency" => array( 'element' => "show_quote_icon", 'value' => 'yes' ),
		),
		array(
			"type"       => "textfield",
			"heading"    => esc_html__( "Quote Icon Size (px)", 'stockholm' ),
			"param_name" => "quote_icon_size"
		)
	)
) );

/*** Button shortcode ***/

vc_map( array(
	"name"                      => esc_html__( "Button", 'stockholm' ),
	"base"                      => "qbutton",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-button extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array_merge(
		array(
			array(
				"type"        => "dropdown",
				"heading"     => esc_html__( "Size", 'stockholm' ),
				"param_name"  => "size",
				"value"       => array(
					esc_html__( "Default", 'stockholm' )                => "",
					esc_html__( "Small", 'stockholm' )                  => "small",
					esc_html__( "Medium", 'stockholm' )                 => "medium",
					esc_html__( "Large", 'stockholm' )                  => "large",
					esc_html__( "Extra Large", 'stockholm' )            => "big_large",
					esc_html__( "Extra Large Full Width", 'stockholm' ) => "big_large_full_width"
				),
				"admin_label" => true
			),
			array(
				"type"        => "dropdown",
				"heading"     => esc_html__( "Style", 'stockholm' ),
				"param_name"  => "style",
				"value"       => array(
					esc_html__( 'Default', 'stockholm' )		=> "",
					esc_html__( 'White', 'stockholm' )			=> "white",
					esc_html__( 'Underlined', 'stockholm' )	=> "underlined"
				),
				"admin_label" => true
			),
			array(
				"type"        => "textfield",
				"heading"     => esc_html__( "Text", 'stockholm' ),
				"param_name"  => "text",
				"admin_label" => true
			),
		),
		$stockholmQodeIconCollections->getVCParamsArray(array(), "", true),
//		array(
//			"type"       => "dropdown",
//			"heading"    => esc_html__( "Icon Pack", 'stockholm' ),
//			"param_name" => "icon_pack",
//			"value"      => array(
//				esc_html__( "No Icon", 'stockholm' )      => "",
//				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
//				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
//				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
//			)
//		),
//		array(
//			"type"        => "dropdown",
//			"heading"     => esc_html__( "Icon", 'stockholm' ),
//			"param_name"  => "fa_icon",
//			"value"       => $fa_icons,
//			'save_always' => true,
//			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
//		),
//		array(
//			"type"       => "dropdown",
//			"heading"    => esc_html__( "Icon", 'stockholm' ),
//			"param_name" => "fe_icon",
//			"value"      => $fe_icons,
//			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
//		),
//		array(
//			"type"       => "dropdown",
//			"heading"    => esc_html__( "Icon", 'stockholm' ),
//			"param_name" => "linear_icon",
//			"value"      => $lnr_icons,
//			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
//		),
		array(
			array(
				"type"       => "colorpicker",
				"heading"    => esc_html__( "Icon Color", 'stockholm' ),
				"param_name" => "icon_color",
				"dependency" => Array( 'element' => "icon", 'not_empty' => true )
			),
			array(
				"type"       => "textfield",
				"heading"    => esc_html__( "Icon Size (px)", 'stockholm' ),
				"param_name" => "icon_size"
			),
			array(
				"type"       => "textfield",
				"heading"    => esc_html__( "Link", 'stockholm' ),
				"param_name" => "link"
			),
			array(
				"type"        => "dropdown",
				"heading"     => esc_html__( "Link Target", 'stockholm' ),
				"param_name"  => "target",
				"value"       => array_flip( stockholm_qode_get_link_target_array() ),
				'save_always' => true,
			),
			array(
				"type"       => "colorpicker",
				"heading"    => esc_html__( "Color", 'stockholm' ),
				"param_name" => "color"
			),
			array(
				"type"       => "colorpicker",
				"heading"    => esc_html__( "Hover Color", 'stockholm' ),
				"param_name" => "hover_color"
			),
			array(
				"type"       => "colorpicker",
				"heading"    => esc_html__( "Background Color", 'stockholm' ),
				"param_name" => "background_color",
				"dependency" => array( "element" => "style", "value" => array( "", "white" ) )
			),
			array(
				"type"       => "colorpicker",
				"heading"    => esc_html__( "Hover Background Color", 'stockholm' ),
				"param_name" => "hover_background_color",
				"dependency" => array( "element" => "style", "value" => array( "", "white" ) )
			),
			array(
				"type"       => "colorpicker",
				"heading"    => esc_html__( "Border Color", 'stockholm' ),
				"param_name" => "border_color"
			),
			array(
				"type"       => "colorpicker",
				"heading"    => esc_html__( "Hover Border Color", 'stockholm' ),
				"param_name" => "hover_border_color"
			),
			array(
				"type"       => "textfield",
				"heading"    => esc_html__( "Font Size (px)", 'stockholm' ),
				"param_name" => "font_size"
			),
			array(
				"type"       => "dropdown",
				"heading"    => esc_html__( "Font Style", 'stockholm' ),
				"param_name" => "font_style",
				"value"      => array_flip( stockholm_qode_get_font_style_array( true ) )
			),
			array(
				"type"        => "dropdown",
				"heading"     => esc_html__( "Font Weight", 'stockholm' ),
				"param_name"  => "font_weight",
				"value"       => array_flip( stockholm_qode_get_font_weight_array( true ) ),
				'save_always' => true,
			),
			array(
				"type"        => "textfield",
				"heading"     => esc_html__( "Letter Spacing", 'stockholm' ),
				"param_name"  => "letter_spacing",
			),
			array(
				"type"        => "textfield",
				"heading"     => esc_html__( "Margin", 'stockholm' ),
				"param_name"  => "margin",
				"description" => esc_html__( "Please insert margin in format: 0px 0px 1px 0px", 'stockholm' )
			),
			array(
				"type"        => "textfield",
				"heading"     => esc_html__( "Border radius", 'stockholm' ),
				"param_name"  => "border_radius",
				"description" => esc_html__( "Please insert border radius(Rounded corners) in px. For example: 4", 'stockholm' ),
				"dependency"  => array( "element" => "style", "value" => array( "", "white" ) )
			),
			array(
				"type"       => "dropdown",
				"heading"    => esc_html__( "Hover Animation", 'stockholm' ),
				"param_name" => "hover_animation",
				"value"      => array(
					""                                        => "",
					esc_html__( "Move Icon", 'stockholm' )    => "move_icon",
					esc_html__( "Dispaly Dash", 'stockholm' ) => "display_dash"
				),
				"dependency" => array( "element" => "style", "value" => array( "", "white" ) )
			)
		)
	)
) );

/*** Call To Action ***/

vc_map( array(
	"name"                      => esc_html__( "Call to Action", 'stockholm' ),
	"base"                      => "call_to_action",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-action extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Full Width", 'stockholm' ),
			"param_name"  => "full_width",
			"value"       => array(
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Content in grid", 'stockholm' ),
			"param_name"  => "content_in_grid",
			"value"       => array(
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			),
			'save_always' => true,
			"dependency"  => array( "element" => "full_width", "value" => "yes" )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Type", 'stockholm' ),
			"param_name"  => "type",
			"value"       => array(
				esc_html__( "Normal", 'stockholm' )    => "normal",
				esc_html__( "With Icon", 'stockholm' ) => "with_icon"
			),
			'save_always' => true
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon Pack", 'stockholm' ),
			"param_name" => "icon_pack",
			"value"      => array(
				esc_html__( "No Icon", 'stockholm' )      => "",
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
			),
			"dependency" => Array( 'element' => "type", 'value' => array( 'with_icon' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => $fa_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => $fe_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon", 'stockholm' ),
			"param_name" => "linear_icon",
			"value"      => $lnr_icons,
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Size (px)", 'stockholm' ),
			"param_name" => "icon_size",
			"dependency" => Array( 'element' => "type", 'value' => array( 'with_icon' ) )
		),
		array(
			"type"       => "colorpicker",
			"heading"    => esc_html__( "Icon Color", 'stockholm' ),
			"param_name" => "icon_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'with_icon' ) )
		),
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Custom Icon", 'stockholm' ),
			"param_name" => "custom_icon",
			"dependency" => Array( 'element' => "type", 'value' => array( 'with_icon' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Color", 'stockholm' ),
			"param_name" => "background_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Color", 'stockholm' ),
			"param_name" => "border_color"
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Box Padding (top right bottom left) px", 'stockholm' ),
			"param_name"  => "box_padding",
			"description" => esc_html__( "Default padding is 60px 0 60px 0", 'stockholm' )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Default Text Font Size (px)", 'stockholm' ),
			"param_name"  => "text_size",
			"description" => esc_html__( "Font size for p tag", 'stockholm' )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Show Button", 'stockholm' ),
			"param_name"  => "show_button",
			"value"       => array(
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			),
			'save_always' => true
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Size", 'stockholm' ),
			"param_name" => "button_size",
			"value"      => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "Small", 'stockholm' )   => "small",
				esc_html__( "Medium", 'stockholm' )  => "medium",
				esc_html__( "Large", 'stockholm' )   => "large",
				esc_html__( "Huge", 'stockholm' )    => "big_large"
			),
			"dependency" => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Text", 'stockholm' ),
			"param_name" => "button_text",
			"dependency" => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Link", 'stockholm' ),
			"param_name" => "button_link",
			"dependency" => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Target", 'stockholm' ),
			"param_name" => "button_target",
			"value"      => array_flip( stockholm_qode_get_link_target_array( true ) ),
			"dependency" => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Button text color", 'stockholm' ),
			"param_name" => "button_text_color",
			"dependency" => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Button hover text color", 'stockholm' ),
			"param_name" => "button_hover_text_color",
			"dependency" => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Background Color", 'stockholm' ),
			"param_name" => "button_background_color",
			"dependency" => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Hover Background Color", 'stockholm' ),
			"param_name" => "button_hover_background_color",
			"dependency" => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Border Color", 'stockholm' ),
			"param_name" => "button_border_color",
			"dependency" => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Hover Border Color", 'stockholm' ),
			"param_name" => "button_hover_border_color",
			"dependency" => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => "<p>" . esc_html__( "This is custom text content for shortcode element", 'stockholm' ) . "</p>"
		)
	)
) );

/*** Counter ***/

vc_map( array(
	"name"                      => esc_html__( "Counter", 'stockholm' ),
	"base"                      => "counter",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	'admin_enqueue_css'         => array( get_template_directory_uri() . '/css/admin/vc-extend.css' ),
	"icon"                      => "icon-wpb-counter extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Type", 'stockholm' ),
			"param_name"  => "type",
			"value"       => array(
				esc_html__( "Zero Counter", 'stockholm' )   => "zero",
				esc_html__( "Random Counter", 'stockholm' ) => "random"
			),
			'save_always' => true
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Box", 'stockholm' ),
			"param_name" => "box",
			"value"      => array(
				""                               => "",
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			)
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Box Border Color", 'stockholm' ),
			"param_name" => "box_border_color",
			"dependency" => array( 'element' => "box", 'value' => array( 'yes' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Position", 'stockholm' ),
			"param_name"  => "position",
			"value"       => array(
				esc_html__( "Left", 'stockholm' )   => "left",
				esc_html__( "Right", 'stockholm' )  => "right",
				esc_html__( "Center", 'stockholm' ) => "center"
			),
			'save_always' => true
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Digit", 'stockholm' ),
			"param_name" => "digit"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Font size (px)", 'stockholm' ),
			"param_name" => "font_size"
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Font weight", 'stockholm' ),
			"param_name" => "font_weight",
			"value"      => array_flip( stockholm_qode_get_font_weight_array( true ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Font Color", 'stockholm' ),
			"param_name" => "font_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text", 'stockholm' ),
			"param_name" => "text"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Size (px)", 'stockholm' ),
			"param_name" => "text_size"
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Font Weight", 'stockholm' ),
			"param_name" => "text_font_weight",
			"value"      => array_flip( stockholm_qode_get_font_weight_array( true ) )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Transform", 'stockholm' ),
			"param_name" => "text_transform",
			"value"      => array_flip( stockholm_qode_get_text_transform_array( true ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Color", 'stockholm' ),
			"param_name" => "text_color"
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Separator", 'stockholm' ),
			"param_name"  => "separator",
			"value"       => array(
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			),
			'save_always' => true
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Separator Color", 'stockholm' ),
			"param_name" => "separator_color",
			"dependency" => array( 'element' => "separator", 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Separator Border Style", 'stockholm' ),
			"param_name" => "separator_border_style",
			"value"      => array(
				""                                  => "",
				esc_html__( "Dashed", 'stockholm' ) => "dashed",
				esc_html__( "Solid", 'stockholm' )  => "solid"
			),
			"dependency" => array( 'element' => "separator", 'value' => array( 'yes' ) )
		)
	)
) );

/*** Countdown shortcode ***/

vc_map( array(
	'name'                      => esc_html__( 'Countdown', 'stockholm' ),
	'base'                      => 'countdown',
	'category'                  => esc_html__( 'by SELECT', 'stockholm' ),
	'icon'                      => 'icon-wpb-countdown extended-custom-icon-qode',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Year', 'stockholm' ),
			'param_name'  => 'year',
			'value'       => array(
				''                                => '',
				esc_html__( '2019', 'stockholm' ) => '2019',
				esc_html__( '2020', 'stockholm' ) => '2020',
				esc_html__( '2021', 'stockholm' ) => '2021',
				esc_html__( '2022', 'stockholm' ) => '2022',
				esc_html__( '2023', 'stockholm' ) => '2023',
				esc_html__( '2024', 'stockholm' ) => '2024',
				esc_html__( '2025', 'stockholm' ) => '2025',
			),
			'admin_label' => true,
			'save_always' => true
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Month', 'stockholm' ),
			'param_name'  => 'month',
			'value'       => array(
				''                                     => '',
				esc_html__( 'January', 'stockholm' )   => '1',
				esc_html__( 'February', 'stockholm' )  => '2',
				esc_html__( 'March', 'stockholm' )     => '3',
				esc_html__( 'April', 'stockholm' )     => '4',
				esc_html__( 'May', 'stockholm' )       => '5',
				esc_html__( 'June', 'stockholm' )      => '6',
				esc_html__( 'July', 'stockholm' )      => '7',
				esc_html__( 'August', 'stockholm' )    => '8',
				esc_html__( 'September', 'stockholm' ) => '9',
				esc_html__( 'October', 'stockholm' )   => '10',
				esc_html__( 'November', 'stockholm' )  => '11',
				esc_html__( 'December', 'stockholm' )  => '12'
			),
			'admin_label' => true,
			'save_always' => true
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Day', 'stockholm' ),
			'param_name'  => 'day',
			'value'       => array(
				''   => '',
				'1'  => '1',
				'2'  => '2',
				'3'  => '3',
				'4'  => '4',
				'5'  => '5',
				'6'  => '6',
				'7'  => '7',
				'8'  => '8',
				'9'  => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
				'25' => '25',
				'26' => '26',
				'27' => '27',
				'28' => '28',
				'29' => '29',
				'30' => '30',
				'31' => '31',
			),
			'admin_label' => true,
			'save_always' => true
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Hour', 'stockholm' ),
			'param_name'  => 'hour',
			'value'       => array(
				''   => '',
				'0'  => '0',
				'1'  => '1',
				'2'  => '2',
				'3'  => '3',
				'4'  => '4',
				'5'  => '5',
				'6'  => '6',
				'7'  => '7',
				'8'  => '8',
				'9'  => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24'
			),
			'admin_label' => true,
			'save_always' => true
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Minute', 'stockholm' ),
			'param_name'  => 'minute',
			'value'       => array(
				''   => '',
				'0'  => '0',
				'1'  => '1',
				'2'  => '2',
				'3'  => '3',
				'4'  => '4',
				'5'  => '5',
				'6'  => '6',
				'7'  => '7',
				'8'  => '8',
				'9'  => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
				'25' => '25',
				'26' => '26',
				'27' => '27',
				'28' => '28',
				'29' => '29',
				'30' => '30',
				'31' => '31',
				'32' => '32',
				'33' => '33',
				'34' => '34',
				'35' => '35',
				'36' => '36',
				'37' => '37',
				'38' => '38',
				'39' => '39',
				'40' => '40',
				'41' => '41',
				'42' => '42',
				'43' => '43',
				'44' => '44',
				'45' => '45',
				'46' => '46',
				'47' => '47',
				'48' => '48',
				'49' => '49',
				'50' => '50',
				'51' => '51',
				'52' => '52',
				'53' => '53',
				'54' => '54',
				'55' => '55',
				'56' => '56',
				'57' => '57',
				'58' => '58',
				'59' => '59',
				'60' => '60',
			),
			'admin_label' => true,
			'save_always' => true
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Month Label', 'stockholm' ),
			'param_name' => 'month_label'
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Day Label', 'stockholm' ),
			'param_name' => 'day_label'
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Hour Label', 'stockholm' ),
			'param_name' => 'hour_label'
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Minute Label', 'stockholm' ),
			'param_name' => 'minute_label'
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Second Label', 'stockholm' ),
			'param_name' => 'second_label'
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Digit Font Size (px)', 'stockholm' ),
			'param_name' => 'digit_font_size',
			'group'      => esc_html__( 'Design Options', 'stockholm' )
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Label Font Size (px)', 'stockholm' ),
			'param_name' => 'label_font_size',
			'group'      => esc_html__( 'Design Options', 'stockholm' )
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Digit Color', 'stockholm' ),
			'param_name' => 'digit_color',
			'group'      => esc_html__( 'Design Options', 'stockholm' )
		)
	)
) );

/*** Cover Boxes ***/

vc_map( array(
	"name"                      => esc_html__( "Cover Boxes", 'stockholm' ),
	"base"                      => "cover_boxes",
	"icon"                      => "icon-wpb-cover_boxes extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Active element", 'stockholm' ),
			"param_name" => "active_element",
			"value"      => ""
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Title tag", 'stockholm' ),
			"param_name"  => "title_tag",
			"value"       => array_flip( stockholm_qode_get_title_tag( true ) ),
			"description" => esc_html__( "Choose with heading tag to display for titles", 'stockholm' )
		),
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Image 1", 'stockholm' ),
			"param_name" => "image1"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title 1", 'stockholm' ),
			"param_name" => "title1",
			"value"      => ""
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color 1", 'stockholm' ),
			"param_name" => "title_color1"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text 1", 'stockholm' ),
			"param_name" => "text1",
			"value"      => ""
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Color 1", 'stockholm' ),
			"param_name" => "text_color1"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Link 1", 'stockholm' ),
			"param_name" => "link1",
			"value"      => ""
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Link label 1", 'stockholm' ),
			"param_name" => "link_label1",
			"value"      => ""
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Target 1", 'stockholm' ),
			"param_name"  => "link_target1",
			"value"       => array_flip( stockholm_qode_get_link_target_array() ),
			'save_always' => true
		),
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Image 2", 'stockholm' ),
			"param_name" => "image2"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title 2", 'stockholm' ),
			"param_name" => "title2",
			"value"      => ""
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color 2", 'stockholm' ),
			"param_name" => "title_color2"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text 2", 'stockholm' ),
			"param_name" => "text2",
			"value"      => ""
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Color 2", 'stockholm' ),
			"param_name" => "text_color2"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Link 2", 'stockholm' ),
			"param_name" => "link2",
			"value"      => ""
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Link label 2", 'stockholm' ),
			"param_name" => "link_label2",
			"value"      => ""
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Target 2", 'stockholm' ),
			"param_name"  => "link_target2",
			"value"       => array_flip( stockholm_qode_get_link_target_array() ),
			'save_always' => true
		),
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Image 3", 'stockholm' ),
			"param_name" => "image3"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title 3", 'stockholm' ),
			"param_name" => "title3",
			"value"      => ""
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color 3", 'stockholm' ),
			"param_name" => "title_color3"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text 3", 'stockholm' ),
			"param_name" => "text3",
			"value"      => ""
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Color 3", 'stockholm' ),
			"param_name" => "text_color3"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Link 3", 'stockholm' ),
			"param_name" => "link3",
			"value"      => ""
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Link label 3", 'stockholm' ),
			"param_name" => "link_label3",
			"value"      => ""
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Target 3", 'stockholm' ),
			"param_name"  => "link_target3",
			"value"       => array_flip( stockholm_qode_get_link_target_array() ),
			'save_always' => true
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Read More Button Style", 'stockholm' ),
			"param_name" => "read_more_button_style",
			"value"      => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "No", 'stockholm' )      => "no",
				esc_html__( "Yes", 'stockholm' )     => "yes"
			)
		)
	)
) );

/*** Custom Font ***/

vc_map( array(
	"name"                      => esc_html__( "Custom Font", 'stockholm' ),
	"base"                      => "custom_font",
	"icon"                      => "icon-wpb-custom_font extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Font Family", 'stockholm' ),
			"param_name" => "font_family",
			"value"      => ""
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Font Size(px)", 'stockholm' ),
			"param_name"  => "font_size",
			"value"       => "15",
			'save_always' => true
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Line Height(px)", 'stockholm' ),
			"param_name"  => "line_height",
			"value"       => "26",
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Font Style", 'stockholm' ),
			"param_name"  => "font_style",
			"value"       => array_flip( stockholm_qode_get_font_style_array( true ) ),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Text Align", 'stockholm' ),
			"param_name"  => "text_align",
			"value"       => array(
				esc_html__( "Left", 'stockholm' )   => "left",
				esc_html__( "Center", 'stockholm' ) => "center",
				esc_html__( "Right", 'stockholm' )  => "right"
			),
			'save_always' => true
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Font Weight", 'stockholm' ),
			"param_name"  => "font_weight",
			"value"       => "300",
			'save_always' => true
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Color", 'stockholm' ),
			"param_name" => "color"
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Text Decoration", 'stockholm' ),
			"param_name"  => "text_decoration",
			"value"       => array_flip( stockholm_qode_get_text_decorations() ),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Text Shadow", 'stockholm' ),
			"param_name"  => "text_shadow",
			"value"       => array(
				esc_html__( "No", 'stockholm' )  => "no",
				esc_html__( "Yes", 'stockholm' ) => "yes"
			),
			'save_always' => true
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Letter Spacing (px)", 'stockholm' ),
			"param_name" => "letter_spacing",
			"value"      => ""
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Color", 'stockholm' ),
			"param_name" => "background_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Padding (px)", 'stockholm' ),
			"param_name" => "padding",
			"value"      => "0"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Margin (px)", 'stockholm' ),
			"param_name" => "margin",
			"value"      => "0"
		),
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => "<p>" . esc_html__( "This is custom text content for shortcode element", 'stockholm' ) . "</p>"
		)
	)
) );

/*** Icon ***/

vc_map( array(
	"name"                      => esc_html__( "Icon", 'stockholm' ),
	"base"                      => "icons",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-icons extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Icon Pack", 'stockholm' ),
			"param_name"  => "icon_pack",
			"value"       => array(
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => $fa_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => $fe_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon", 'stockholm' ),
			"param_name" => "linear_icon",
			"value"      => $lnr_icons,
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Size", 'stockholm' ),
			"param_name"  => 'fa_size',
			"value"       => array(
				esc_html__( "Tiny", 'stockholm' )       => "fa-lg",
				esc_html__( "Small", 'stockholm' )      => "fa-2x",
				esc_html__( "Medium", 'stockholm' )     => "fa-3x",
				esc_html__( "Large", 'stockholm' )      => "fa-4x",
				esc_html__( "Very Large", 'stockholm' ) => "fa-5x"
			),
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Custom Size (px)", 'stockholm' ),
			"param_name" => "custom_size",
			"value"      => ""
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Type", 'stockholm' ),
			"param_name"  => "type",
			"value"       => array(
				esc_html__( "Normal", 'stockholm' ) => "normal",
				esc_html__( "Circle", 'stockholm' ) => "circle",
				esc_html__( "Square", 'stockholm' ) => "square"
			),
			'save_always' => true
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Color", 'stockholm' ),
			"param_name" => "icon_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Hover Color", 'stockholm' ),
			"param_name" => "icon_hover_color"
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Position", 'stockholm' ),
			"param_name" => "position",
			"value"      => array(
				esc_html__( "Normal", 'stockholm' ) => "",
				esc_html__( "Left", 'stockholm' )   => "left",
				esc_html__( "Center", 'stockholm' ) => "center",
				esc_html__( "Right", 'stockholm' )  => "right"
			)
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Color", 'stockholm' ),
			"param_name" => "border_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'circle', 'square' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Hover Color", 'stockholm' ),
			"param_name" => "border_hover_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'circle', 'square' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Border Width", 'stockholm' ),
			"param_name"  => "border_width",
			"description" => esc_html__( "Enter just number. Omit pixels", 'stockholm' ),
			"dependency"  => Array( 'element' => "type", 'value' => array( 'circle', 'square' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Border Radius", 'stockholm' ),
			"param_name"  => "border_radius",
			"description" => esc_html__( "Enter just number. Omit pixels", 'stockholm' ),
			"dependency"  => Array( 'element' => "type", 'value' => array( 'square' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Color", 'stockholm' ),
			"param_name" => "background_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'circle', 'square' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Hover Color", 'stockholm' ),
			"param_name" => "background_hover_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'circle', 'square' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Margin", 'stockholm' ),
			"param_name"  => "margin",
			"description" => esc_html__( "Margin (top right bottom left)", 'stockholm' )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Animation", 'stockholm' ),
			"param_name" => "icon_animation",
			"value"      => array(
				esc_html__( "No", 'stockholm' )  => "",
				esc_html__( "Yes", 'stockholm' ) => "q_icon_animation"
			)
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Animation Delay (ms)", 'stockholm' ),
			"param_name" => "icon_animation_delay",
			"value"      => ""
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Link", 'stockholm' ),
			"param_name" => "link",
			"value"      => ""
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Target", 'stockholm' ),
			"param_name"  => "target",
			"value"       => array_flip( stockholm_qode_get_link_target_array() ),
			'save_always' => true
		)
	)
) );

/*** Icon List Item ***/

vc_map( array(
	"name"     => esc_html__( "Icon List Item", 'stockholm' ),
	"base"     => "icon_list_item",
	"icon"     => "icon-wpb-icon_list_item extended-custom-icon-qode",
	"category" => esc_html__( 'by SELECT', 'stockholm' ),
	"params"   => array(
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon pack", 'stockholm' ),
			"param_name"  => "icon_pack",
			"value"       => array(
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => $fa_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => $fe_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon", 'stockholm' ),
			"param_name" => "linear_icon",
			"value"      => $lnr_icons,
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon Type", 'stockholm' ),
			"param_name"  => "icon_type",
			"value"       => array(
				esc_html__( "Normal", 'stockholm' ) => "normal_icon_list",
				esc_html__( "Small", 'stockholm' )  => "small_icon_list"
			),
			'save_always' => true
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Color", 'stockholm' ),
			"param_name" => "icon_color"
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Border Type", 'stockholm' ),
			"param_name" => "border_type",
			"value"      => array(
				""                                  => "",
				esc_html__( "Circle", 'stockholm' ) => "circle",
				esc_html__( "Square", 'stockholm' ) => "square"
			)
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Color", 'stockholm' ),
			"param_name" => "border_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color", 'stockholm' ),
			"param_name" => "title_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title size (px)", 'stockholm' ),
			"param_name" => "title_size",
		),
		array(
			"type"       => "textfield",
			"heading"    => esc_html__( "Item Link", 'stockholm' ),
			"param_name" => "item_link",
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Item Link Target", 'stockholm' ),
			"param_name" => "item_link_target",
			"value"      => array_flip(stockholm_qode_get_link_target_array())
		)

	)
) );

/*** Icon With Text ***/

vc_map( array(
	"name"                      => esc_html__( "Icon With Text", 'stockholm' ),
	"base"                      => "icon_text",
	"icon"                      => "icon-wpb-icon_text extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Box Type", 'stockholm' ),
			"param_name"  => "box_type",
			"value"       => array(
				esc_html__( "Normal", 'stockholm' )        => "normal",
				esc_html__( "Icon in a box", 'stockholm' ) => "icon_in_a_box"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Box Border", 'stockholm' ),
			"param_name"  => "box_border",
			"value"       => array(
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			),
			'save_always' => true,
			"dependency"  => Array( 'element' => "box_type", 'value' => array( 'icon_in_a_box' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Box Border Color", 'stockholm' ),
			"param_name" => "box_border_color",
			"dependency" => Array( 'element' => "box_type", 'value' => array( 'icon_in_a_box' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Box Background Color", 'stockholm' ),
			"param_name" => "box_background_color",
			"dependency" => Array( 'element' => "box_type", 'value' => array( 'icon_in_a_box' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon Pack", 'stockholm' ),
			"param_name"  => "icon_pack",
			"value"       => array(
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons",
				esc_html__( "Custom Icon", 'stockholm' )  => "custom_icon"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => $fa_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => $fe_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon", 'stockholm' ),
			"param_name" => "linear_icon",
			"value"      => $lnr_icons,
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
		),
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Custom Icon", 'stockholm' ),
			"param_name" => "custom_icon_image",
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'custom_icon' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Icon Type", 'stockholm' ),
			"param_name"  => "icon_type",
			"value"       => array(
				esc_html__( "Normal", 'stockholm' ) => "normal",
				esc_html__( "Circle", 'stockholm' ) => "circle",
				esc_html__( "Square", 'stockholm' ) => "square"
			),
			'save_always' => true,
			"description" => esc_html__( "This attribute doesn't work when Icon Position is Top With Title Over. In This case Icon Type is Normal", 'stockholm' ),
			"dependency"  => Array( 'element' => "icon_pack", 'value'   => array( 'font_awesome', 'font_elegant', 'linear_icons' ) )
		),
		array(
			"type"        => "textfield",
			"heading"     => esc_html__( "Icon Border Width (px)", 'stockholm' ),
			"param_name"  => "icon_border_width",
			"description" => esc_html__( "Enter just number, omit pixels", 'stockholm' ),
			"dependency"  => array( 'element' => 'icon_type', 'value' => array( 'circle', 'square' ) )
		),
		array(
			"type"       => "checkbox",
			"heading"    => "",
			"value"      => array( esc_html__( "Without Outer Border on Icon?", 'stockholm' ) => "yes" ),
			"param_name" => "without_double_border_icon",
			"dependency" => array( 'element' => 'icon_type', 'value' => array( 'circle', 'square' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Icon Size / Icon Space From Text", 'stockholm' ),
			"param_name"  => "icon_size",
			"value"       => array(
				esc_html__( "Tiny", 'stockholm' )       => "fa-lg",
				esc_html__( "Small", 'stockholm' )      => "fa-2x",
				esc_html__( "Medium", 'stockholm' )     => "fa-3x",
				esc_html__( "Large", 'stockholm' )      => "fa-4x",
				esc_html__( "Very Large", 'stockholm' ) => "fa-5x"
			),
			'save_always' => true,
			"description" => esc_html__( "This attribute doesn't work when Icon Position is Top With Title Over", 'stockholm' ),
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Custom Icon Size (px)", 'stockholm' ),
			"param_name"  => "custom_icon_size",
			"description" => esc_html__( "Default value is 20", 'stockholm' ),
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant', 'linear_icons' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Text Left Padding (px)", 'stockholm' ),
			"param_name"  => "text_left_padding",
			"description" => esc_html__( "Default value is 86. Only when Icon Position is Left", 'stockholm' ),
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant', 'linear_icons' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon Animation", 'stockholm' ),
			"param_name" => "icon_animation",
			"value"      => array(
				esc_html__( "No", 'stockholm' )  => "",
				esc_html__( "Yes", 'stockholm' ) => "q_icon_animation"
			)
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Animation Delay (ms)", 'stockholm' ),
			"param_name" => "icon_animation_delay",
			"value"      => "",
			"dependency" => Array( 'element' => "icon_animation", 'value' => array( 'q_icon_animation' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Icon Position", 'stockholm' ),
			"param_name"  => "icon_position",
			"value"       => array(
				esc_html__( "Top", 'stockholm' )             => "top",
				esc_html__( "Left", 'stockholm' )            => "left",
				esc_html__( "Left From Title", 'stockholm' ) => "left_from_title"
			),
			'save_always' => true,
			"description" => esc_html__( "Icon Position (only for normal box type)", 'stockholm' ),
			"dependency"  => Array( 'element' => "box_type", 'value' => array( 'normal' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Icon Margin", 'stockholm' ),
			"param_name"  => "icon_margin",
			"value"       => "",
			"description" => esc_html__( "Margin should be set in a top right bottom left format", 'stockholm' )
		),
		array(
			"type"        => "colorpicker",
			"holder"      => "div",
			"heading"     => esc_html__( "Icon Border Color", 'stockholm' ),
			"param_name"  => "icon_border_color",
			"description" => esc_html__( "Only for Square and Circle type", 'stockholm' ),
			"dependency"  => Array( 'element' => "icon_type", 'value' => array( 'square', 'circle' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Color", 'stockholm' ),
			"param_name" => "icon_color",
			"dependency" => Array( 'element' => "icon_pack", 'value'   => array( 'font_awesome', 'font_elegant', 'linear_icons' ) )
		),
		array(
			"type"        => "colorpicker",
			"holder"      => "div",
			"heading"     => esc_html__( "Icon Background Color", 'stockholm' ),
			"param_name"  => "icon_background_color",
			"description" => esc_html__( "Icon Background Color (only for square and circle icon type)", 'stockholm' ),
			"dependency"  => Array( 'element' => "icon_type", 'value' => array( 'square', 'circle' ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title",
			"value"      => ""
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) ),
			"dependency" => Array( 'element' => "title", 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color", 'stockholm' ),
			"param_name" => "title_color",
			"dependency" => Array( 'element' => "title", 'not_empty' => true )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Title Top Padding (px)", 'stockholm' ),
			"param_name"  => "title_padding",
			"value"       => "",
			"description" => esc_html__( "This attribute is used for boxed type", 'stockholm' ),
			"dependency"  => Array( 'element' => "box_type", 'value' => array( 'icon_in_a_box' ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text", 'stockholm' ),
			"param_name" => "text",
			"value"      => ""
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Color", 'stockholm' ),
			"param_name" => "text_color",
			"dependency" => Array( 'element' => "text", 'not_empty' => true )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Link", 'stockholm' ),
			"param_name" => "link",
			"value"      => "",
			"dependency" => Array( 'element' => "box_type", 'value' => array( 'normal' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Link Text", 'stockholm' ),
			"param_name"  => "link_text",
			"description" => esc_html__( "Default value is READ MORE", 'stockholm' ),
			"dependency"  => Array( 'element' => "link", 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Link Color", 'stockholm' ),
			"param_name" => "link_color",
			"dependency" => Array( 'element' => "link_text", 'not_empty' => true )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Target", 'stockholm' ),
			"param_name" => "target",
			"value"      => array_flip( stockholm_qode_get_link_target_array( true ) ),
			"dependency" => Array( 'element' => "link", 'not_empty' => true )
		)
	)
) );

/*** Image Hover ***/

vc_map( array(
	"name"                      => esc_html__( "Image Hover", 'stockholm' ),
	"base"                      => "image_hover",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-image_hover extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Image", 'stockholm' ),
			"param_name" => "image"
		),
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Hover Image", 'stockholm' ),
			"param_name" => "hover_image"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Link", 'stockholm' ),
			"param_name" => "link"
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Target", 'stockholm' ),
			"param_name"  => "target",
			"value"       => array_flip( stockholm_qode_get_link_target_array() ),
			'save_always' => true
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Animation", 'stockholm' ),
			"param_name" => "animation",
			"value"      => array(
				""                               => "",
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			)
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Animation Speed (in s)", 'stockholm' ),
			"param_name" => "animation_speed",
			"dependency" => array( 'element' => "animation", 'value' => array( "yes" ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Transition Delay(s)", 'stockholm' ),
			"param_name" => "transition_delay",
			"dependency" => array( 'element' => "animation", 'value' => array( "yes" ) )
		)
	)
) );

/*** Image With Text ***/

vc_map( array(
	"name"                      => esc_html__( "Image With Text", 'stockholm' ),
	"base"                      => "image_with_text",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-image_with_text extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Image", 'stockholm' ),
			"param_name" => "image"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color", 'stockholm' ),
			"param_name" => "title_color"
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) )
		),
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => "<p>" . esc_html__( "This is custom text content for shortcode element", 'stockholm' ) . "</p>"
		)
	)
) );

/*** Interactive Banners ***/

vc_map( array(
	"name"                      => esc_html__( "Interactive Banners", 'stockholm' ),
	"base"                      => "interactive_banners",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-image_with_text_over extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Width", 'stockholm' ),
			"param_name" => "layout_width",
			"value"      => array(
				""                               => "",
				esc_html__( "1/2", 'stockholm' ) => "one_half",
				esc_html__( "1/3", 'stockholm' ) => "one_third",
				esc_html__( "1/4", 'stockholm' ) => "one_fourth",
			)
		),
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Image", 'stockholm' ),
			"param_name" => "image"
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon Pack", 'stockholm' ),
			"param_name" => "icon_pack",
			"value"      => array(
				esc_html__( "No Icon", 'stockholm' )      => "",
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
			)
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => $fa_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => $fe_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon", 'stockholm' ),
			"param_name" => "linear_icon",
			"value"      => $lnr_icons,
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Custom Size (px)", 'stockholm' ),
			"param_name"  => "icon_custom_size",
			"value"       => "",
			"description" => esc_html__( "Defaul value is 45", 'stockholm' ),
			"dependency"  => Array(
				'element' => "icon_pack",
				'value'   => array( 'font_awesome', 'font_elegant', 'linear_icons' )
			)
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Color", 'stockholm' ),
			"param_name" => "icon_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color", 'stockholm' ),
			"param_name" => "title_color",
			"dependency" => Array( 'element' => "title", 'not_empty' => true )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Title Size (px)", 'stockholm' ),
			"param_name"  => "title_size",
			"description" => esc_html__( "Defaul value is 21", 'stockholm' ),
			"dependency"  => Array( 'element' => "title", 'not_empty' => true )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) ),
			"dependency" => Array( 'element' => "title", 'not_empty' => true )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Subtitle", 'stockholm' ),
			"param_name" => "subtitle"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Subtitle Color", 'stockholm' ),
			"param_name" => "subtitle_color",
			"dependency" => Array( 'element' => "subtitle", 'not_empty' => true )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Subtitle Size (px)", 'stockholm' ),
			"param_name"  => "subtitle_size",
			"description" => esc_html__( "Defaul value is 17", 'stockholm' ),
			"dependency"  => Array( 'element' => "subtitle", 'not_empty' => true )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Subtitle Tag", 'stockholm' ),
			"param_name" => "subtitle_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) ),
			"dependency" => Array( 'element' => "subtitle", 'not_empty' => true )
		),
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => "<p>" . esc_html__( "This is custom text content for shortcode element", 'stockholm' ) . "</p>"
		)
	)
) );

/*** Latest Posts ***/

vc_map( array(
	"name"                      => esc_html__( "Latest Posts", 'stockholm' ),
	"base"                      => "latest_post",
	"icon"                      => "icon-wpb-latest_post extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Type", 'stockholm' ),
			"param_name"  => "type",
			"value"       => array(
				esc_html__( "Image in left box", 'stockholm' ) => "image_in_box",
				esc_html__( "Boxes", 'stockholm' )             => "boxes"
			),
			'save_always' => true
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Number of Posts", 'stockholm' ),
			"param_name" => "number_of_posts",
			"dependency" => Array( 'element' => "type", 'value' => array( 'image_in_box' ) )
		),
        array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Image Size", 'stockholm' ),
			"param_name" => "image_size",
			"value"      => array(
                esc_html__( "Predefined", 'stockholm' )   => 'portfolio-default',
                esc_html__('Full ( Original )', 'stockholm') => 'full'
            ),
			"dependency" => Array( 'element' => "type", 'value' => array( 'boxes' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Number of Columns", 'stockholm' ),
			"param_name"  => "number_of_columns",
			"value"       => array(
				esc_html__( "One", 'stockholm' )   => "1",
				esc_html__( "Two", 'stockholm' )   => "2",
				esc_html__( "Three", 'stockholm' ) => "3",
				esc_html__( "Four", 'stockholm' )  => "4",
				esc_html__( "Five", 'stockholm' )  => "5"
			),
			'save_always' => true,
			"dependency"  => Array( 'element' => "type", 'value' => array( 'boxes' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Number of Rows", 'stockholm' ),
			"param_name"  => "number_of_rows",
			"value"       => array(
				esc_html__( "One", 'stockholm' )   => "1",
				esc_html__( "Two", 'stockholm' )   => "2",
				esc_html__( "Three", 'stockholm' ) => "3",
				esc_html__( "Four", 'stockholm' )  => "4",
				esc_html__( "Five", 'stockholm' )  => "5",
				esc_html__( "Six", 'stockholm' )   => "6",
			),
			'save_always' => true,
			"dependency"  => Array( 'element' => "type", 'value' => array( 'boxes' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Order By", 'stockholm' ),
			"param_name"  => "order_by",
			"value"       => array(
				esc_html__( "Title", 'stockholm' ) => "title",
				esc_html__( "Date", 'stockholm' )  => "date"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Order", 'stockholm' ),
			"param_name"  => "order",
			"value"       => array_flip( stockholm_qode_get_query_order_array() ),
			'save_always' => true
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Category Slug", 'stockholm' ),
			"param_name"  => "category",
			"description" => esc_html__( "Leave empty for all or use comma for list", 'stockholm' )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Text Length", 'stockholm' ),
			"param_name"  => "text_length",
			"description" => esc_html__( "Number of characters", 'stockholm' ),
			"dependency"  => Array( 'element' => "type", 'value' => array( 'boxes' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Display Category", 'stockholm' ),
			"param_name" => "display_category",
			"value"      => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "Yes", 'stockholm' )     => "1",
				esc_html__( "No", 'stockholm' )      => "0"
			)
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Display Date", 'stockholm' ),
			"param_name" => "display_date",
			"value"      => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "Yes", 'stockholm' )     => "1",
				esc_html__( "No", 'stockholm' )      => "0"
			)
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Display Author", 'stockholm' ),
			"param_name" => "display_author",
			"value"      => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "Yes", 'stockholm' )     => "1",
				esc_html__( "No", 'stockholm' )      => "0"
			)
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Box Background Color", 'stockholm' ),
			"param_name" => "background_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'boxes' ) )
		)
	)
) );

/*** Line Graph shortcode ***/

vc_map( array(
	"name"                      => esc_html__( "Line Graph", 'stockholm' ),
	"base"                      => "line_graph",
	"icon"                      => "icon-wpb-line_graph extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Type", 'stockholm' ),
			"param_name" => "type",
			"value"      => array(
				""                                         => "",
				esc_html__( "Rounded edges", 'stockholm' ) => "rounded",
				esc_html__( "Sharp edges", 'stockholm' )   => "sharp"
			)
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Width", 'stockholm' ),
			"param_name" => "width"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Height", 'stockholm' ),
			"param_name" => "height"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Custom Color", 'stockholm' ),
			"param_name" => "custom_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Scale steps", 'stockholm' ),
			"param_name" => "scale_steps"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Scale step width", 'stockholm' ),
			"param_name" => "scale_step_width"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Labels", 'stockholm' ),
			"param_name" => "labels",
			"value"      => esc_html__( "Label 1, Label 2, Label 3", 'stockholm' )
		),
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => esc_html__( "#e6ae48,Legend One,1,5,10;#f5b94d,Legend Two,3,7,20;#fdc050,Legend Three,10,2,34", 'stockholm' )
		)
	)
) );

/*** Message ***/

vc_map( array(
	"name"                      => esc_html__( "Message", 'stockholm' ),
	"base"                      => "message",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-message extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Type", 'stockholm' ),
			"param_name"  => "type",
			"value"       => array(
				esc_html__( "Normal", 'stockholm' )    => "normal",
				esc_html__( "With Icon", 'stockholm' ) => "with_icon"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon pack", 'stockholm' ),
			"param_name"  => "icon_pack",
			"value"       => array(
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
			),
			'save_always' => true,
			"dependency"  => Array( 'element' => "type", 'value' => array( 'with_icon' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => $fa_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => $fe_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon", 'stockholm' ),
			"param_name" => "linear_icon",
			"value"      => $lnr_icons,
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Icon Size", 'stockholm' ),
			"param_name"  => "icon_size",
			"value"       => array(
				esc_html__( "Small", 'stockholm' )  => "fa-lg",
				esc_html__( "Medium", 'stockholm' ) => "fa-2x",
				esc_html__( "Large", 'stockholm' )  => "fa-3x"
			),
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Custom Size (px)", 'stockholm' ),
			"param_name" => "icon_custom_size",
			"value"      => "",
			"dependency" => Array( 'element' => "type", 'value' => array( 'with_icon' ) )
		),
		array(
			"type"       => "colorpicker",
			"heading"    => esc_html__( "Icon Color", 'stockholm' ),
			"param_name" => "icon_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'with_icon' ) )
		),
		array(
			"type"       => "colorpicker",
			"heading"    => esc_html__( "Icon Background Color", 'stockholm' ),
			"param_name" => "icon_background_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'with_icon' ) )
		),
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Custom Icon", 'stockholm' ),
			"param_name" => "custom_icon",
			"dependency" => Array( 'element' => "type", 'value' => array( 'with_icon' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Color", 'stockholm' ),
			"param_name" => "background_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Color", 'stockholm' ),
			"param_name" => "border_color"
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Border Width (px)", 'stockholm' ),
			"param_name"  => "border_width",
			"description" => esc_html__( "Default value is 2", 'stockholm' )
		),
		array(
			"type"        => "colorpicker",
			"holder"      => "div",
			"heading"     => esc_html__( "Close Button Color", 'stockholm' ),
			"param_name"  => "close_button_color",
			"description" => esc_html__( "Default color is #fff", 'stockholm' )
		),
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => "<p>" . esc_html__( "This is custom text content for shortcode element", 'stockholm' ) . "</p>"
		)
	)
) );

/*** Ordered List ***/

vc_map( array(
	"name"                      => esc_html__( "List - Ordered", 'stockholm' ),
	"base"                      => "ordered_list",
	"icon"                      => "icon-wpb-ordered_list extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => "<ol><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ol>"
		)
	)
) );

/*** Pie Chart ***/

vc_map( array(
	"name"                      => esc_html__( "Pie Chart", 'stockholm' ),
	"base"                      => "pie_chart",
	"icon"                      => "icon-wpb-pie_chart extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Percentage", 'stockholm' ),
			"param_name" => "percent"
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Show Percentage Mark", 'stockholm' ),
			"param_name"  => "show_percent_mark",
			"value"       => array(
				esc_html__( "Yes", 'stockholm' ) => "with_mark",
				esc_html__( "No", 'stockholm' )  => "without_mark"
			),
			'save_always' => true,
			"dependency"  => Array( 'element' => "percent", 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Percentage Color", 'stockholm' ),
			"param_name" => "percentage_color",
			"dependency" => Array( 'element' => "percent", 'not_empty' => true )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Percentage Font Size", 'stockholm' ),
			"param_name" => "percent_font_size",
			"dependency" => Array( 'element' => "percent", 'not_empty' => true )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Percentage Font weight", 'stockholm' ),
			"param_name" => "percent_font_weight",
			"value"      => array_flip( stockholm_qode_get_font_weight_array( true ) ),
			"dependency" => Array( 'element' => "percent", 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Bar Active Color", 'stockholm' ),
			"param_name" => "active_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Bar Noactive Color", 'stockholm' ),
			"param_name" => "noactive_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Pie Chart Width (px)", 'stockholm' ),
			"param_name" => "chart_width"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Pie Chart Line Width (px)", 'stockholm' ),
			"param_name" => "line_width"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color", 'stockholm' ),
			"param_name" => "title_color"
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text", 'stockholm' ),
			"param_name" => "text"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Color", 'stockholm' ),
			"param_name" => "text_color"
		)
	)
) );

/*** Pie Chart With Icon ***/

vc_map( array(
	"name"                      => esc_html__( "Pie Chart With Icon", 'stockholm' ),
	"base"                      => "pie_chart_with_icon",
	"icon"                      => "icon-wpb-pie_chart_with_icon extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Percentage", 'stockholm' ),
			"param_name" => "percent"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Bar Active Color", 'stockholm' ),
			"param_name" => "active_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Bar Inactive Color", 'stockholm' ),
			"param_name" => "noactive_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Pie Chart Width (px)", 'stockholm' ),
			"param_name" => "chart_width"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Pie Chart Line Width (px)", 'stockholm' ),
			"param_name" => "line_width"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color", 'stockholm' ),
			"param_name" => "title_color",
			"dependency" => array( 'element' => "title", 'not_empty' => true )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) ),
			"dependency" => array( 'element' => "title", 'not_empty' => true )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon pack", 'stockholm' ),
			"param_name" => "icon_pack",
			"value"      => array(
				esc_html__( "No Icon", 'stockholm' )      => "",
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
			)
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => $fa_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => $fe_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon", 'stockholm' ),
			"param_name" => "linear_icon",
			"value"      => $lnr_icons,
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Color", 'stockholm' ),
			"param_name" => "icon_color",
			"dependency" => Array(
				'element' => "icon_pack",
				'value'   => array( 'font_awesome', 'font_elegant', 'linear_icons' )
			)
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text", 'stockholm' ),
			"param_name" => "text"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Color", 'stockholm' ),
			"param_name" => "text_color",
			"dependency" => array( 'element' => "text", 'not_empty' => true )
		)
	)
) );

/*** Pie Chart 2 (Pie) ***/

vc_map( array(
	"name"                      => esc_html__( "Pie Chart 2 (Pie)", 'stockholm' ),
	"base"                      => "pie_chart2",
	"icon"                      => "icon-wpb-pie_chart2 extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Width", 'stockholm' ),
			"param_name" => "width"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Height", 'stockholm' ),
			"param_name" => "height"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Legend Text Color", 'stockholm' ),
			"param_name" => "color"
		),
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => esc_html__( "15,#e6ae48,Legend One; 35,#f5b94d,Legend Two; 50,#fdc050,Legend Three", 'stockholm' )
		)
	)
) );

/*** Pie Chart 3 (Doughnut) ***/

vc_map( array(
	"name"                      => esc_html__( "Pie Chart 3 (Doughnut)", 'stockholm' ),
	"base"                      => "pie_chart3",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-pie_chart3 extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Width", 'stockholm' ),
			"param_name" => "width"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Height", 'stockholm' ),
			"param_name" => "height"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Legend Text Color", 'stockholm' ),
			"param_name" => "color"
		),
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => esc_html__( "15,#e6ae48,Legend One; 35,#f5b94d,Legend Two; 50,#fdc050,Legend Three", 'stockholm' )
		)
	)
) );

/*** Portfolio Slider ***/

vc_map( array(
	"name"                      => esc_html__( "Portfolio Slider", 'stockholm' ),
	"base"                      => "portfolio_slider",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-portfolio_slider extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Order By", 'stockholm' ),
			"param_name" => "order_by",
			"value"      => array(
				""                                      => "",
				esc_html__( "Menu Order", 'stockholm' ) => "menu_order",
				esc_html__( "Title", 'stockholm' )      => "title",
				esc_html__( "Date", 'stockholm' )       => "date"
			)
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Order", 'stockholm' ),
			"param_name" => "order",
			"value"      => array_flip( stockholm_qode_get_query_order_array( true ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Number", 'stockholm' ),
			"param_name"  => "number",
			"value"       => "-1",
			"description" => esc_html__( "Number of portolios on page (-1 is all)", 'stockholm' )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Number of Columns", 'stockholm' ),
			"param_name"  => "number_of_columns",
			"value"       => array(
				'' => '',
				'2' => '2',
				'3' => '3',
				'4' => '4'
			),
			"description" => esc_html__( "Number of columns for portfolio slider", 'stockholm' ),
			'std'         => ''
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Category", 'stockholm' ),
			"param_name"  => "category",
			"value"       => "",
			"description" => esc_html__( "Category Slug (leave empty for all)", 'stockholm' )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Selected Projects", 'stockholm' ),
			"param_name"  => "selected_projects",
			"value"       => "",
			"description" => esc_html__( "Selected Projects (leave empty for all, delimit by comma)", 'stockholm' )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Disable Portfolio Link", 'stockholm' ),
			"param_name"  => "disable_link",
			"value"       => array(
				""                               => "",
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			),
			"description" => esc_html__( "Default value is No", 'stockholm' )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Show Lightbox", 'stockholm' ),
			"param_name"  => "lightbox",
			"value"       => array(
				""                               => "",
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			),
			"description" => esc_html__( "Default value is Yes", 'stockholm' )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Show Like", 'stockholm' ),
			"param_name"  => "show_like",
			"value"       => array(
				""                               => "",
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			),
			"description" => esc_html__( "Default value is Yes", 'stockholm' )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Image size", 'stockholm' ),
			"param_name" => "image_size",
			"value"      => array(
				esc_html__( "Default", 'stockholm' )       => "",
				esc_html__( "Original Size", 'stockholm' ) => "full",
				esc_html__( "Square", 'stockholm' )        => "square",
				esc_html__( "Landscape", 'stockholm' )     => "landscape",
				esc_html__( "Portrait", 'stockholm' )      => "portrait"
			)
		),
		array(
			"type"       => "checkbox",
			"heading"    => esc_html__( "Prev/Next navigation", 'stockholm' ),
			"value"      => array( esc_html__( "Enable prev/next navigation?", 'stockholm' ) => "enable_navigation" ),
			"param_name" => "enable_navigation"
		)
	)
) );

/*** Progress Bar Horizontal ***/

vc_map( array(
	"name"                      => esc_html__( "Progress Bar - Horizontal", 'stockholm' ),
	"base"                      => "progress_bar",
	"icon"                      => "icon-wpb-progress_bar extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color", 'stockholm' ),
			"param_name" => "title_color"
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Custom Size (px)", 'stockholm' ),
			"param_name" => "title_custom_size"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Percentage", 'stockholm' ),
			"param_name" => "percent"
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Show Percentage Mark", 'stockholm' ),
			"param_name"  => "show_percent_mark",
			"value"       => array(
				esc_html__( "Yes", 'stockholm' ) => "with_mark",
				esc_html__( "No", 'stockholm' )  => "without_mark"
			),
			'save_always' => true,
			"dependency"  => Array( 'element' => "percent", 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Percentage Color", 'stockholm' ),
			"param_name" => "percent_color",
			"dependency" => Array( 'element' => "percent", 'not_empty' => true )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Percentage Font Size", 'stockholm' ),
			"param_name" => "percent_font_size",
			"dependency" => Array( 'element' => "percent", 'not_empty' => true )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Percentage Font weight", 'stockholm' ),
			"param_name" => "percent_font_weight",
			"value"      => array_flip( stockholm_qode_get_font_weight_array( true ) ),
			"dependency" => Array( 'element' => "percent", 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Active Background Color", 'stockholm' ),
			"param_name" => "active_background_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Active Border Color", 'stockholm' ),
			"param_name" => "active_border_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Inactive Background Color", 'stockholm' ),
			"param_name" => "noactive_background_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Progress Bar Height (px)", 'stockholm' ),
			"param_name" => "height"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Progress Bar Border Radius", 'stockholm' ),
			"param_name" => "border_radius"
		)
	)
) );

/*** Progress Bar Icon ***/

vc_map( array(
	"name"                      => esc_html__( "Progress Bar - Icon", 'stockholm' ),
	"base"                      => "progress_bar_icon",
	"icon"                      => "icon-wpb-progress_bar_icon extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Number of Icons", 'stockholm' ),
			"param_name" => "icons_number"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Number of Active Icons", 'stockholm' ),
			"param_name" => "active_number"
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Type", 'stockholm' ),
			"param_name"  => "type",
			"value"       => array(
				esc_html__( "Normal", 'stockholm' ) => "normal",
				esc_html__( "Circle", 'stockholm' ) => "circle",
				esc_html__( "Square", 'stockholm' ) => "square"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon Pack", 'stockholm' ),
			"param_name"  => "icon_pack",
			"value"       => array(
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => $fa_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => $fe_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon", 'stockholm' ),
			"param_name" => "linear_icon",
			"value"      => $lnr_icons,
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Size", 'stockholm' ),
			"param_name"  => "size",
			"value"       => array(
				esc_html__( "Tiny", 'stockholm' )       => "tiny",
				esc_html__( "Small", 'stockholm' )      => "small",
				esc_html__( "Medium", 'stockholm' )     => "medium",
				esc_html__( "Large", 'stockholm' )      => "large",
				esc_html__( "Very Large", 'stockholm' ) => "very_large",
			),
			'save_always' => true
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Color", 'stockholm' ),
			"param_name" => "icon_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Active Color", 'stockholm' ),
			"param_name" => "icon_active_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Color", 'stockholm' ),
			"param_name" => "background_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Active Color", 'stockholm' ),
			"param_name" => "background_active_color"
		),
		array(
			"type"        => "colorpicker",
			"holder"      => "div",
			"heading"     => esc_html__( "Border Color", 'stockholm' ),
			"param_name"  => "border_color",
			"description" => esc_html__( "Only for Square and Circle type", 'stockholm' ),
			"dependency"  => array( 'element' => "type", 'value' => array( 'square', 'circle' ) )
		),
		array(
			"type"        => "colorpicker",
			"holder"      => "div",
			"heading"     => esc_html__( "Border Active Color", 'stockholm' ),
			"param_name"  => "border_active_color",
			"description" => esc_html__( "Only for Square and Circle type", 'stockholm' ),
			"dependency"  => array( 'element' => "type", 'value' => array( 'square', 'circle' ) )
		)
	)
) );

/*** Progress Bar Vertical ***/

vc_map( array(
	"name"                      => esc_html__( "Progress Bar - Vertical", 'stockholm' ),
	"base"                      => "progress_bar_vertical",
	"icon"                      => "icon-wpb-vertical_progress_bar extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color", 'stockholm' ),
			"param_name" => "title_color"
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Size (px)", 'stockholm' ),
			"param_name" => "title_size"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Bar Color", 'stockholm' ),
			"param_name" => "bar_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Bar Border Color", 'stockholm' ),
			"param_name" => "bar_border_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Bar Background Color", 'stockholm' ),
			"param_name" => "background_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Top Border Radius", 'stockholm' ),
			"param_name" => "border_radius"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Percent", 'stockholm' ),
			"param_name" => "percent"
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Show Percentage Mark", 'stockholm' ),
			"param_name"  => "show_percent_mark",
			"value"       => array(
				esc_html__( "Yes", 'stockholm' ) => "with_mark",
				esc_html__( "No", 'stockholm' )  => "without_mark"
			),
			'save_always' => true,
			"dependency"  => Array( 'element' => "percent", 'not_empty' => true )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Percentage Text Size(px)", 'stockholm' ),
			"param_name" => "percentage_text_size",
			"dependency" => Array( 'element' => "percent", 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Percentage Color", 'stockholm' ),
			"param_name" => "percent_color",
			"dependency" => Array( 'element' => "percent", 'not_empty' => true )
		),
		array(
			"type"       => "textarea",
			"holder"     => "div",
			"heading"    => esc_html__( "Text", 'stockholm' ),
			"param_name" => "text",
			"value"      => ""
		)
	)
) );

/*** Select Carousel ***/

vc_map( array(
	"name"                      => esc_html__( "Select Carousel", 'stockholm' ),
	"base"                      => "qode_carousel",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-qode_carousel extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Carousel Slider", 'stockholm' ),
			"param_name"  => "carousel",
			"value"       => $carousel_sliders,
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Carousel Type", 'stockholm' ),
			"param_name"  => "carousel_type",
			"value"       => array(
				esc_html__( "Default", 'stockholm' )   => "",
				esc_html__( "Draggable", 'stockholm' ) => "carousel_owl"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Items Visible", 'stockholm' ),
			"param_name"  => "items_visible",
			"value"       => array(
				esc_html__( "Six", 'stockholm' )  => "6",
				esc_html__( "Five", 'stockholm' )  => "5",
				esc_html__( "Four", 'stockholm' )  => "4",
				esc_html__( "Three", 'stockholm' ) => "3",
				esc_html__( "Twobig_large_full_width", 'stockholm' ) => "2"
			),
			'save_always' => true
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Order By", 'stockholm' ),
			"param_name" => "order_by",
			"value"      => array(
				""                                      => "",
				esc_html__( "Menu Order", 'stockholm' ) => "menu_order",
				esc_html__( "Title", 'stockholm' )      => "title",
				esc_html__( "Date", 'stockholm' )       => "date"
			)
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Order", 'stockholm' ),
			"param_name" => "order",
			"value"      => array_flip( stockholm_qode_get_query_order_array( true ) ),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Stage Padding", 'stockholm' ),
			"description"     => esc_html__( "Padding left and right on stage (can see neighbours)", 'stockholm' ),
			"param_name"  => "stage_padding",
			"value"       => array(
				esc_html__( "No", 'stockholm' )  => "no",
				esc_html__( "Yes", 'stockholm' ) => "yes",
			),
			'save_always' => true,
			"dependency"  => array( 'element' => "carousel_type", 'value' => array( 'carousel_owl' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Show navigation?", 'stockholm' ),
			"param_name"  => "show_navigation",
			"value"       => array(
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no",
			),
			'save_always' => true,
			"dependency"  => array( 'element' => "carousel_type", 'value' => array( '' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Show navigation?", 'stockholm' ),
			"param_name"  => "show_draggable_navigation",
			"value"       => array(
				esc_html__( "No", 'stockholm' )  => "no",
				esc_html__( "Yes", 'stockholm' ) => "yes"
			),
			'save_always' => true,
			"dependency"  => array( 'element' => "carousel_type", 'value' => array( 'carousel_owl' ) )
		),
        array(
			"type"        => "textfield",
			"heading"     => esc_html__( "Autoplay speed (in miliseconds)", 'stockholm' ),
			"param_name"  => "draggable_slider_speed",
			'save_always' => true,
			"dependency"  => array( 'element' => "carousel_type", 'value' => array( 'carousel_owl' ) )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Show Items In Two Rows?", 'stockholm' ),
			"param_name" => "show_in_two_rows",
			"value"      => array(
				esc_html__( "No", 'stockholm' )  => "",
				esc_html__( "Yes", 'stockholm' ) => "yes",
			)
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Space Between Items?", 'stockholm' ),
			"param_name"  => "space_between",
			"value"       => array(
				esc_html__( "No", 'stockholm' )  => "no",
				esc_html__( "Yes", 'stockholm' ) => "yes"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Hover Effect", 'stockholm' ),
			"param_name"  => "hover_effect",
			"value"       => array(
				esc_html__( "Show second image", 'stockholm' ) => "second_image",
				esc_html__( "Overlay", 'stockholm' )           => "overlay",
				esc_html__( "Disable", 'stockholm' )           => "disable"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "On Click", 'stockholm' ),
			"param_name"  => "on_click",
			"value"       => array(
				esc_html__( "Open link", 'stockholm' )                 => "open_link",
				esc_html__( "Open image in Prettyphoto", 'stockholm' ) => "prettyphoto"
			),
			'save_always' => true,
			"dependency"  => array( 'element' => "hover_effect", 'value' => array( 'overlay', 'disable' ) )
		)
	)
) );

/*** Select Image Slider ***/

vc_map( array(
	"name"                      => esc_html__( "Select Image Slider", 'stockholm' ),
	"base"                      => "image_slider_no_space",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-images-stack extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "attach_images",
			"holder"     => "div",
			"heading"    => esc_html__( "Images", 'stockholm' ),
			"param_name" => "images"
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "On Click", 'stockholm' ),
			"param_name" => "on_click",
			"value"      => array(
				esc_html__( "Do Nothing", 'stockholm' )                => "",
				esc_html__( "Open Image in Prettyphoto", 'stockholm' ) => "prettyphoto",
				esc_html__( "Open Image in New Tab", 'stockholm' )     => "new_tab",
				esc_html__( "Use Custom Links", 'stockholm' )          => "use_custom_links"
			)
		),
		array(
			"type"        => "textarea",
			"holder"      => "div",
			"heading"     => esc_html__( "Custom Links", 'stockholm' ),
			"param_name"  => "custom_links",
			"value"       => "",
			"dependency"  => array( 'element' => 'on_click', 'value' => 'use_custom_links' ),
			"description" => esc_html__( "Enter links for each image here. Divide links with comma.", 'stockholm' )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Custom Links Target", 'stockholm' ),
			"param_name" => "custom_links_target",
			"value"      => array_flip( stockholm_qode_get_link_target_array( true ) ),
			"dependency" => array( 'element' => 'on_click', 'value' => 'use_custom_links' )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Link all Items", 'stockholm' ),
			"param_name" => "link_all_items",
			"value"      => array(
				""                               => "",
				esc_html__( "No", 'stockholm' )  => "no",
				esc_html__( "Yes", 'stockholm' ) => "yes"
			),
			"dependency" => array( 'element' => 'on_click', 'value' => 'use_custom_links' )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Slider Height (px)", 'stockholm' ),
			"param_name" => "height",
			"value"      => ""
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Navigation Style", 'stockholm' ),
			"param_name" => "navigation_style",
			"value"      => array(
				""                                 => "",
				esc_html__( "Light", 'stockholm' ) => "light",
				esc_html__( "Dark", 'stockholm' )  => "dark"
			)
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Highlight Active Image", 'stockholm' ),
			"param_name" => "highlight_active_image",
			"value"      => array(
				""                               => "",
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			)
		)
	)
) );

/*** Service Table ***/

vc_map( array(
	"name"                      => esc_html__( "Service Table", 'stockholm' ),
	"base"                      => "service_table",
	"icon"                      => "icon-wpb-service_table extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title",
			"value"      => ""
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title/Title Icon Color", 'stockholm' ),
			"param_name" => "title_color"
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Title Background Type", 'stockholm' ),
			"param_name"  => "title_background_type",
			"value"       => array(
				esc_html__( "Background Color", 'stockholm' ) => "background_color_type",
				esc_html__( "Background Image", 'stockholm' ) => "background_image_type"
			),
			'save_always' => true
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Background Color", 'stockholm' ),
			"param_name" => "title_background_color",
			"dependency" => array( 'element' => "title_background_type", 'value' => array( 'background_color_type' ) )
		),
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Image", 'stockholm' ),
			"param_name" => "background_image",
			"dependency" => array( 'element' => "title_background_type", 'value' => array( 'background_image_type' ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Image Height (px)", 'stockholm' ),
			"param_name" => "background_image_height",
			"value"      => "",
			"dependency" => array( 'element' => "title_background_type", 'value' => array( 'background_image_type' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon Pack", 'stockholm' ),
			"param_name"  => "icon_pack",
			"value"       => array(
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => $fa_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => $fe_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon", 'stockholm' ),
			"param_name" => "linear_icon",
			"value"      => $lnr_icons,
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Custom Size (px)", 'stockholm' ),
			"param_name" => "custom_size",
			"value"      => ""
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Content Background Color", 'stockholm' ),
			"param_name" => "content_background_color"
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Around", 'stockholm' ),
			"param_name" => "border",
			"value"      => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "No", 'stockholm' )      => "no",
				esc_html__( "Yes", 'stockholm' )     => "yes"
			)
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Width (px)", 'stockholm' ),
			"param_name" => "border_width",
			"value"      => "",
			"dependency" => array( 'element' => "border", 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Color", 'stockholm' ),
			"param_name" => "border_color",
			"value"      => "",
			"dependency" => array( 'element' => "border", 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => "<li>content content content</li><li>content content content</li><li>content content content</li>"
		)
	)
) );

/*** Social Icon ***/

vc_map( array(
	"name"                      => esc_html__( "Social Icons", 'stockholm' ),
	"base"                      => "social_icons",
	"icon"                      => "icon-wpb-social_icons extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Type", 'stockholm' ),
			"param_name"  => "type",
			"value"       => array(
				esc_html__( "Normal", 'stockholm' ) => "normal_social",
				esc_html__( "Circle", 'stockholm' ) => "circle_social",
				esc_html__( "Square", 'stockholm' ) => "square_social"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon pack", 'stockholm' ),
			"param_name"  => "icon_pack",
			"value"       => array(
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => stockholm_qode_font_awesome_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => stockholm_qode_font_elegant_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Size", 'stockholm' ),
			"param_name"  => "size",
			"value"       => array(
				esc_html__( "Tiny", 'stockholm' )   => "tiny",
				esc_html__( "Small", 'stockholm' )  => "small",
				esc_html__( "Medium", 'stockholm' ) => "medium",
				esc_html__( "Large", 'stockholm' )  => "large",
				esc_html__( "Huge", 'stockholm' )   => "huge"
			),
			'save_always' => true
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Link", 'stockholm' ),
			"param_name" => "link",
			"value"      => ""
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Target", 'stockholm' ),
			"param_name"  => "target",
			"value"       => array_flip( stockholm_qode_get_link_target_array() ),
			'save_always' => true
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Color", 'stockholm' ),
			"param_name" => "icon_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Color", 'stockholm' ),
			"param_name" => "background_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'circle_social', 'square_social' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Color", 'stockholm' ),
			"param_name" => "border_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'circle_social', 'square_social' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Hover Color", 'stockholm' ),
			"param_name" => "icon_hover_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Hover Color", 'stockholm' ),
			"param_name" => "background_hover_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'circle_social', 'square_social' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Hover Color", 'stockholm' ),
			"param_name" => "border_hover_color",
			"dependency" => Array( 'element' => "type", 'value' => array( 'circle_social', 'square_social' ) )
		)
	)
) );

/*** Social Share ***/

vc_map( array(
	"name"                      => esc_html__( "Social Share", 'stockholm' ),
	"base"                      => "social_share",
	"icon"                      => "icon-wpb-social_share extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"show_settings_on_create"   => false,
	"params"                    => array()
) );

/*** Social Share List ***/

vc_map( array(
	"name"                      => esc_html__( "Social Share List", 'stockholm' ),
	"base"                      => "social_share_list",
	"icon"                      => "icon-wpb-social_share extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"show_settings_on_create"   => false,
	"params"                    => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Icon Type", 'stockholm' ),
			"param_name"  => "list_type",
			"value"       => array(
				esc_html__( "Circle", 'stockholm' )  => "circle",
				esc_html__( "Regular", 'stockholm' ) => "regular"
			),
			'save_always' => true
		),
	)
) );

/*** Team ***/

vc_map( array(
	"name"                      => esc_html__( "Team", 'stockholm' ),
	"base"                      => "q_team",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-q_team extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Type", 'stockholm' ),
			"param_name" => "team_type",
			"value"      => array(
				esc_html__( "Default", 'stockholm' )       => "",
				esc_html__( "Info on Hover", 'stockholm' ) => "info_hover"
			)
		),
        array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icons Position", 'stockholm' ),
			"param_name" => "icons_position",
			"value"      => array(
				esc_html__( "Default", 'stockholm' )       => "",
				esc_html__( "Below Title", 'stockholm' ) => "below_title"
			)
		),
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Image", 'stockholm' ),
			"param_name" => "team_image"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Image Hover Color", 'stockholm' ),
			"param_name" => "team_image_hover_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Name", 'stockholm' ),
			"param_name" => "team_name"
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Name Tag", 'stockholm' ),
			"param_name" => "team_name_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) ),
			"dependency" => array( 'element' => 'team_name', 'not_empty' => true )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Name Font Size(px)", 'stockholm' ),
			"param_name" => "team_name_font_size",
			"dependency" => array( 'element' => 'team_name', 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Name Color", 'stockholm' ),
			"param_name" => "team_name_color",
			"dependency" => array( 'element' => 'team_name', 'not_empty' => true )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Name Font Weight", 'stockholm' ),
			"param_name"  => "team_name_font_weight",
			"value"       => array_flip( stockholm_qode_get_font_weight_array( true ) ),
			'save_always' => true,
			"dependency"  => array( 'element' => 'team_name', 'not_empty' => true )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Name Text Transform", 'stockholm' ),
			"param_name" => "team_name_text_transform",
			"value"      => array_flip( stockholm_qode_get_text_transform_array( true ) ),
			"dependency" => array( 'element' => 'team_name', 'not_empty' => true )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Position", 'stockholm' ),
			"param_name" => "team_position"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Position Font Size(px)", 'stockholm' ),
			"param_name" => "team_position_font_size",
			"dependency" => array( 'element' => 'team_position', 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Position Color", 'stockholm' ),
			"param_name" => "team_position_color",
			"dependency" => array( 'element' => 'team_position', 'not_empty' => true )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Position Font Weight", 'stockholm' ),
			"param_name"  => "team_position_font_weight",
			"value"       => array_flip( stockholm_qode_get_font_weight_array( true ) ),
			'save_always' => true,
			"dependency"  => array( 'element' => 'team_position', 'not_empty' => true )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Position Text Transform", 'stockholm' ),
			"param_name" => "team_position_text_transform",
			"value"      => array_flip( stockholm_qode_get_text_transform_array( true ) ),
			"dependency" => array( 'element' => 'team_position', 'not_empty' => true )
		),
		array(
			"type"       => "textarea",
			"holder"     => "div",
			"heading"    => esc_html__( "Description", 'stockholm' ),
			"param_name" => "team_description"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Description Color", 'stockholm' ),
			"param_name" => "team_description_color",
			"dependency" => array( 'element' => 'team_description', 'not_empty' => true )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Align", 'stockholm' ),
			"param_name" => "text_align",
			"value"      => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "Left", 'stockholm' )    => "left_align",
				esc_html__( "Center", 'stockholm' )  => "center_align",
				esc_html__( "Right", 'stockholm' )   => "right_align"
			)
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Color", 'stockholm' ),
			"param_name" => "background_color"
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Box Border", 'stockholm' ),
			"param_name" => "box_border",
			"value"      => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "No", 'stockholm' )      => "no",
				esc_html__( "Yes", 'stockholm' )     => "yes"
			)
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Box Border Width", 'stockholm' ),
			"param_name" => "box_border_width",
			"value"      => "",
			"dependency" => array( 'element' => "box_border", 'value' => array( 'yes' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Box Border Color", 'stockholm' ),
			"param_name" => "box_border_color",
			"value"      => "",
			"dependency" => array( 'element' => "box_border", 'value' => array( 'yes' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Social Icon Pack", 'stockholm' ),
			"param_name"  => "team_social_icon_pack",
			"value"       => array(
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Social Icons Type", 'stockholm' ),
			"param_name"  => "team_social_icon_type",
			"value"       => array(
				esc_html__( "Normal", 'stockholm' ) => "normal_social",
				esc_html__( "Circle", 'stockholm' ) => "circle_social",
				esc_html__( "Square", 'stockholm' ) => "square_social"
			),
			'save_always' => true
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icons Color", 'stockholm' ),
			"param_name" => "team_social_icon_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icons Background Color", 'stockholm' ),
			"param_name" => "team_social_icon_background_color",
			"dependency" => array( 'team_social_icon_type' => 'team_position', 'value' => array( 'circle_social', 'square_social' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icons Border Color", 'stockholm' ),
			"param_name" => "team_social_icon_border_color",
			"dependency" => array( 'team_social_icon_type' => 'team_position', 'value' => array( 'circle_social', 'square_social' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icons Hover Color", 'stockholm' ),
			"param_name" => "team_social_icon_hover_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icons Background Hover Color", 'stockholm' ),
			"param_name" => "team_social_background_hover_color",
			"dependency" => array( 'team_social_icon_type' => 'team_position', 'value' => array( 'circle_social', 'square_social' ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icons Border Hover Color", 'stockholm' ),
			"param_name" => "team_social_border_hover_color",
			"dependency" => array( 'team_social_icon_type' => 'team_position', 'value' => array( 'circle_social', 'square_social' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Social Icon 1", 'stockholm' ),
			"param_name"  => "team_social_fa_icon_1",
			"value"       => stockholm_qode_font_awesome_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "team_social_icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Social Icon 1", 'stockholm' ),
			"param_name"  => "team_social_fe_icon_1",
			"value"       => stockholm_qode_font_elegant_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "team_social_icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icon 1 Link", 'stockholm' ),
			"param_name" => "team_social_icon_1_link",
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icon 1 Target", 'stockholm' ),
			"param_name" => "team_social_icon_1_target",
			"value"      => array_flip( stockholm_qode_get_link_target_array( true ) ),
			"dependency" => Array( 'element' => "team_social_icon_1_link", 'not_empty' => true )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Social Icon 2", 'stockholm' ),
			"param_name"  => "team_social_fa_icon_2",
			"value"       => stockholm_qode_font_awesome_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "team_social_icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Social Icon 2", 'stockholm' ),
			"param_name"  => "team_social_fe_icon_2",
			"value"       => stockholm_qode_font_elegant_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "team_social_icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Social Icon 2 Link", 'stockholm' ),
			"param_name"  => "team_social_icon_2_link",
			"description" => esc_html__( "This is enabled only if you are using social icon", 'stockholm' )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icon 2 Target", 'stockholm' ),
			"param_name" => "team_social_icon_2_target",
			"value"      => array_flip( stockholm_qode_get_link_target_array( true ) ),
			"dependency" => Array( 'element' => "team_social_icon_2_link", 'not_empty' => true )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Social Icon 3", 'stockholm' ),
			"param_name"  => "team_social_fa_icon_3",
			"value"       => stockholm_qode_font_awesome_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "team_social_icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Social Icon 3", 'stockholm' ),
			"param_name"  => "team_social_fe_icon_3",
			"value"       => stockholm_qode_font_elegant_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "team_social_icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Social Icon 3 Link", 'stockholm' ),
			"param_name"  => "team_social_icon_3_link",
			"description" => esc_html__( "This is enabled only if you are using social icon", 'stockholm' )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icon 3 Target", 'stockholm' ),
			"param_name" => "team_social_icon_3_target",
			"value"      => array_flip( stockholm_qode_get_link_target_array( true ) ),
			"dependency" => Array( 'element' => "team_social_icon_3_link", 'not_empty' => true )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Social Icon 4", 'stockholm' ),
			"param_name"  => "team_social_fa_icon_4",
			"value"       => stockholm_qode_font_awesome_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "team_social_icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Social Icon 4", 'stockholm' ),
			"param_name"  => "team_social_fe_icon_4",
			"value"       => stockholm_qode_font_elegant_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "team_social_icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Social Icon 4 Link", 'stockholm' ),
			"param_name"  => "team_social_icon_4_link",
			"description" => esc_html__( "This is enabled only if you are using social icon", 'stockholm' )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icon 4 Target", 'stockholm' ),
			"param_name" => "team_social_icon_4_target",
			"value"      => array_flip( stockholm_qode_get_link_target_array( true ) ),
			"dependency" => Array( 'element' => "team_social_icon_4_link", 'not_empty' => true )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Social Icon 5", 'stockholm' ),
			"param_name"  => "team_social_fa_icon_5",
			"value"       => stockholm_qode_font_awesome_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "team_social_icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Social Icon 5", 'stockholm' ),
			"param_name"  => "team_social_fe_icon_5",
			"value"       => stockholm_qode_font_elegant_social_vc(),
			'save_always' => true,
			"dependency"  => Array( 'element' => "team_social_icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Social Icon 5 Link", 'stockholm' ),
			"param_name"  => "team_social_icon_5_link",
			"description" => esc_html__( "This is enabled only if you are using social icon", 'stockholm' )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Social Icon 5 Target", 'stockholm' ),
			"param_name" => "team_social_icon_5_target",
			"value"      => array_flip( stockholm_qode_get_link_target_array( true ) ),
			"dependency" => Array( 'element' => "team_social_icon_5_link", 'not_empty' => true )
		),
		array(
			"type"       => "checkbox",
			"heading"    => esc_html__( "Team Member Skills", 'stockholm' ),
			"value"      => array( esc_html__( "Show Team Member Skills?", 'stockholm' ) => "yes" ),
			"param_name" => "show_skills"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Skills Title Size", 'stockholm' ),
			"param_name" => "skills_title_size",
			"dependency" => array( "element" => "show_skills", "value" => "yes" )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "First Skill Title", 'stockholm' ),
			"param_name"  => "skill_title_1",
			"description" => esc_html__( "For example Web design", 'stockholm' ),
			"dependency"  => array( "element" => "show_skills", "value" => "yes" )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "First Skill Percentage", 'stockholm' ),
			"param_name"  => "skill_percentage_1",
			"description" => esc_html__( "Enter just number, without %", 'stockholm' ),
			"dependency"  => array( "element" => "show_skills", "value" => "yes" )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Second Skill Title", 'stockholm' ),
			"param_name"  => "skill_title_2",
			"description" => esc_html__( "For example Web design", 'stockholm' ),
			"dependency"  => array( "element" => "show_skills", "value" => "yes" )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Second Skill Percentage", 'stockholm' ),
			"param_name"  => "skill_percentage_2",
			"description" => esc_html__( "Enter just number, without %", 'stockholm' ),
			"dependency"  => array( "element" => "show_skills", "value" => "yes" )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Third Skill Title", 'stockholm' ),
			"param_name"  => "skill_title_3",
			"description" => esc_html__( "For example Web design", 'stockholm' ),
			"dependency"  => array( "element" => "show_skills", "value" => "yes" )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Third Skill Percentage", 'stockholm' ),
			"param_name"  => "skill_percentage_3",
			"description" => esc_html__( "Enter just number, without %", 'stockholm' ),
			"dependency"  => array( "element" => "show_skills", "value" => "yes" )
		)
	)
) );

/*** Testimonials ***/

vc_map( array(
	"name"                      => esc_html__( "Testimonials", 'stockholm' ),
	"base"                      => "testimonials",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                      => "icon-wpb-testimonials extended-custom-icon-qode",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Type", 'stockholm' ),
			"param_name"  => "type",
			"value"       => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "Grouped", 'stockholm' ) => "grouped"
			),
			'save_always' => true
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Category", 'stockholm' ),
			"param_name"  => "category",
			"value"       => "",
			"description" => esc_html__( "Category Slug (leave empty for all)", 'stockholm' )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Number", 'stockholm' ),
			"param_name"  => "number",
			"value"       => "",
			"description" => esc_html__( "Number of Testimonials", 'stockholm' )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Show Author Image", 'stockholm' ),
			"param_name"  => "show_author_image",
			"value"       => array(
				esc_html__( "No", 'stockholm' )  => "no",
				esc_html__( "Yes", 'stockholm' ) => "yes"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Show Title", 'stockholm' ),
			"param_name"  => "show_title",
			"value"       => array(
				esc_html__( "No", 'stockholm' )  => "no",
				esc_html__( "Yes", 'stockholm' ) => "yes"
			),
			'save_always' => true,
			"dependency"  => array( "element" => "type", "value" => array( "" ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Color", 'stockholm' ),
			"param_name" => "text_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Font Size", 'stockholm' ),
			"param_name" => "text_font_size"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Author Text Color", 'stockholm' ),
			"param_name" => "author_text_color"
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Show Author Job Position", 'stockholm' ),
			"param_name"  => "show_author_job_position",
			"value"       => array(
				esc_html__( "No", 'stockholm' )  => "no",
				esc_html__( "Yes", 'stockholm' ) => "yes"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Text Align", 'stockholm' ),
			"param_name"  => "text_align",
			"value"       => array(
				esc_html__( "Left", 'stockholm' )   => "left_align",
				esc_html__( "Center", 'stockholm' ) => "center_align",
				esc_html__( "Right", 'stockholm' )  => "right_align"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Show navigation", 'stockholm' ),
			"param_name"  => "show_navigation",
			"value"       => array(
				esc_html__( "Yes", 'stockholm' ) => "yes",
				esc_html__( "No", 'stockholm' )  => "no"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Navigation Style", 'stockholm' ),
			"param_name"  => "navigation_style",
			"value"       => array(
				esc_html__( "Dark", 'stockholm' )  => "dark",
				esc_html__( "Light", 'stockholm' ) => "light"
			),
			'save_always' => true,
			"dependency"  => array( "element" => "show_navigation", "value" => array( "yes" ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Show navigation arrows", 'stockholm' ),
			"param_name"  => "show_navigation_arrows",
			"value"       => array(
				esc_html__( "No", 'stockholm' )  => "no",
				esc_html__( "Yes", 'stockholm' ) => "yes"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Auto rotate slides", 'stockholm' ),
			"param_name"  => "auto_rotate_slides",
			"value"       => array(
				"3"                                  => "3",
				"5"                                  => "5",
				"10"                                 => "10",
				"15"                                 => "15",
				esc_html__( "Disable", 'stockholm' ) => "0"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Animation type", 'stockholm' ),
			"param_name"  => "animation_type",
			"value"       => array(
				esc_html__( "Fade", 'stockholm' )  => "fade",
				esc_html__( "Slide", 'stockholm' ) => "slide"
			),
			'save_always' => true
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Animation speed", 'stockholm' ),
			"param_name"  => "animation_speed",
			"value"       => "",
			"description" => esc_html__( "Speed of slide animation in miliseconds", 'stockholm' )
		)
	)
) );

/*** Product list shortcode ***/
if ( stockholm_qode_is_woocommerce_installed() ) {
	vc_map( array(
		'name'                      => esc_html__( 'Select Product List', 'stockholm' ),
		'base'                      => 'qode_product_list',
		'category'                  => esc_html__( 'by SELECT', 'stockholm' ),
		'icon'                      => 'icon-wpb-product-list extended-custom-icon-qode',
		'allowed_container_element' => 'vc_row',
		'params'                    => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Type', 'stockholm' ),
				'param_name'  => 'type',
				'value'       => array(
					esc_html__( 'Standard', 'stockholm' ) => 'standard',
					esc_html__( 'Simple', 'stockholm' )   => 'simple'
				),
				'save_always' => true,
				'admin_label' => true
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'stockholm' ),
				'param_name'  => 'columns',
				'value'       => array(
					esc_html__( 'Two', 'stockholm' )   => '2',
					esc_html__( 'Three', 'stockholm' ) => '3',
					esc_html__( 'Four', 'stockholm' )  => '4',
					esc_html__( 'Five', 'stockholm' )  => '5'
				),
				'save_always' => true,
				'admin_label' => true
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Number of Items', 'stockholm' ),
				'param_name'  => 'items_number',
				'value'       => '',
				'admin_label' => true,
				'description' => esc_html__( 'Leave empty for all.', 'stockholm' )
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Order By', 'stockholm' ),
				'param_name'  => 'order_by',
				'value'       => array(
					esc_html__( 'ID', 'stockholm' )         => 'id',
					esc_html__( 'Date', 'stockholm' )       => 'date',
					esc_html__( 'Menu Order', 'stockholm' ) => 'menu_order',
					esc_html__( 'Title', 'stockholm' )      => 'title'
				),
				'save_always' => true,
				'admin_label' => true
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Sort Order', 'stockholm' ),
				'param_name'  => 'sort_order',
				'value'       => array_flip( stockholm_qode_get_query_order_array() ),
				'save_always' => true,
				'admin_label' => true
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Choose Sorting Taxonomy', 'stockholm' ),
				'param_name'  => 'taxonomy_to_display',
				'value'       => array(
					esc_html__( 'Category', 'stockholm' ) => 'category',
					esc_html__( 'Tag', 'stockholm' )      => 'tag',
					esc_html__( 'Id', 'stockholm' )       => 'id'
				),
				'save_always' => true,
				'admin_label' => true,
				'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display.', 'stockholm' )
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Enter Taxonomy Values', 'stockholm' ),
				'param_name'  => 'taxonomy_values',
				'value'       => '',
				'admin_label' => true,
				'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'stockholm' )
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Display Categories', 'stockholm' ),
				'param_name' => 'display_categories',
				'value'      => array(
					esc_html__( 'Yes', 'stockholm' ) => 'yes',
					esc_html__( 'No', 'stockholm' )  => 'no'
				),
				"dependency" => array( "element" => "type", "value" => array( "standard" ) )
			)
		)
	) );
}

/*** Unordered List ***/

vc_map( array(
	"name"                      => esc_html__( "List - Unordered", 'stockholm' ),
	"base"                      => "unordered_list",
	"icon"                      => "icon-wpb-unordered_list extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Style", 'stockholm' ),
			"param_name"  => "style",
			"value"       => array(
				esc_html__( "Circle", 'stockholm' ) => "circle",
				esc_html__( "Number", 'stockholm' ) => "number"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Number Type", 'stockholm' ),
			"param_name"  => "number_type",
			"value"       => array(
				esc_html__( "Circle", 'stockholm' )      => "circle_number",
				esc_html__( "Transparent", 'stockholm' ) => "transparent_number"
			),
			'save_always' => true,
			"dependency"  => array( 'element' => "style", 'value' => array( 'number' ) )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Animate List", 'stockholm' ),
			"param_name"  => "animate",
			"value"       => array(
				esc_html__( "No", 'stockholm' )  => "no",
				esc_html__( "Yes", 'stockholm' ) => "yes"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Font Weight", 'stockholm' ),
			"param_name"  => "font_weight",
			"value"       => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "Light", 'stockholm' )   => "light",
				esc_html__( "Normal", 'stockholm' )  => "normal",
				esc_html__( "Bold", 'stockholm' )    => "bold"
			),
			'save_always' => true
		),
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => "<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>"
		)
	)
) );

/*** Product combo shortcode ***/
if ( stockholm_qode_is_woocommerce_installed() ) {
	vc_map( array(
		'name'                      => esc_html__( 'Shop Category Showcase', 'stockholm' ),
		'base'                      => 'qode_shop_category_showcase',
		'category'                  => esc_html__( 'by SELECT', 'stockholm' ),
		'icon'                      => 'icon-wpb-shop-category-showcase extended-custom-icon-qode',
		'allowed_container_element' => 'vc_row',
		'params'                    => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Category Slug', 'stockholm' ),
				'param_name'  => 'cat_slug',
				'value'       => '',
				'admin_label' => true
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Product ID', 'stockholm' ),
				'param_name'  => 'product_id',
				'value'       => '',
				'admin_label' => true
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Product 2 ID', 'stockholm' ),
				'param_name'  => 'product_id_2',
				'value'       => '',
				'admin_label' => true
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Products position', 'stockholm' ),
				'param_name'  => 'products_position',
				'value'       => array(
					esc_html__( 'Left', 'stockholm' )  => 'left',
					esc_html__( 'Right', 'stockholm' ) => 'right'
				),
				'save_always' => true,
				'description' => esc_html__( "Choose where products will be placed related to category position.", 'stockholm' )
			)
		)
	) );
}

class WPBakeryShortCode_Qode_Pricing_Tables extends WPBakeryShortCodesContainer {
}

vc_map( array(
	"name"                    => esc_html__( "Select Pricing Tables", 'stockholm' ),
	"base"                    => "qode_pricing_tables",
	"as_parent"               => array( 'only' => 'qode_pricing_table' ),
	"content_element"         => true,
	"category"                => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                    => "icon-wpb-pricing_column extended-custom-icon-qode",
	"show_settings_on_create" => true,
	"params"                  => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Columns", 'stockholm' ),
			"param_name"  => "columns",
			"value"       => array(
				esc_html__( "Two", 'stockholm' )   => "two_columns",
				esc_html__( "Three", 'stockholm' ) => "three_columns",
				esc_html__( "Four", 'stockholm' )  => "four_columns",
			),
			'save_always' => true
		)
	),
	"js_view"                 => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Pricing_Table extends WPBakeryShortCode {
}

// Pricing table shortcode
vc_map( array(
	"name"                      => esc_html__( "Pricing Table", 'stockholm' ),
	"base"                      => "qode_pricing_table",
	"icon"                      => "icon-wpb-pricing_column extended-custom-icon-qode",
	"category"                  => esc_html__( 'by SELECT', 'stockholm' ),
	"allowed_container_element" => 'vc_row',
	"as_child"                  => array( 'only' => 'qode_pricing_tables' ),
	"params"                    => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title",
			"value"      => esc_html__( "Basic Plan", 'stockholm' )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color", 'stockholm' ),
			"param_name" => "title_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Background Color", 'stockholm' ),
			"param_name" => "title_background_color"
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Price", 'stockholm' ),
			"param_name"  => "price",
			"description" => esc_html__( "Default value is 100", 'stockholm' )
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Price Font Weight", 'stockholm' ),
			"param_name"  => "price_font_weight",
			"value"       => array_flip( stockholm_qode_get_font_weight_array( true ) ),
			'save_always' => true
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Currency", 'stockholm' ),
			"param_name"  => "currency",
			"description" => esc_html__( "Default mark is $", 'stockholm' )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Price Period", 'stockholm' ),
			"param_name"  => "price_period",
			"description" => esc_html__( "Default label is monthly", 'stockholm' )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Text", 'stockholm' ),
			"param_name" => "button_text"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Link", 'stockholm' ),
			"param_name" => "link",
			"dependency" => array( 'element' => 'button_text', 'not_empty' => true )
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Target", 'stockholm' ),
			"param_name" => "target",
			"value"      => array_flip( stockholm_qode_get_link_target_array( true ) ),
			"dependency" => array( 'element' => 'link', 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Color", 'stockholm' ),
			"param_name" => "button_color",
			"dependency" => array( 'element' => 'button_text', 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Button Background Color", 'stockholm' ),
			"param_name" => "button_background_color",
			"dependency" => array( 'element' => 'button_text', 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Content Background Color", 'stockholm' ),
			"param_name" => "content_background_color"
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Active", 'stockholm' ),
			"param_name"  => "active",
			"value"       => array(
				esc_html__( "No", 'stockholm' )  => "no",
				esc_html__( "Yes", 'stockholm' ) => "yes"
			),
			'save_always' => true
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Active text", 'stockholm' ),
			"param_name"  => "active_text",
			"description" => esc_html__( "Best choice", 'stockholm' ),
			"dependency"  => array( 'element' => 'active', 'value' => 'yes' )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Active Text Color", 'stockholm' ),
			"param_name" => "active_text_color",
			"dependency" => array( 'element' => 'active', 'value' => 'yes' )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Active Text Background Color", 'stockholm' ),
			"param_name" => "active_text_background_color",
			"dependency" => array( 'element' => 'active', 'value' => 'yes' )
		),
		array(
			"type"       => "textarea_html",
			"holder"     => "div",
			"heading"    => esc_html__( "Content", 'stockholm' ),
			"param_name" => "content",
			"value"      => "<li>content content content</li><li>content content content</li><li>content content content</li>"
		)
	)
) );

/*Pricing list shortcode*/

class WPBakeryShortCode_Qode_Pricing_List extends WPBakeryShortCodesContainer {
}

vc_map( array(
	"name"                    => esc_html__( "Select Pricing List", 'stockholm' ),
	"base"                    => "qode_pricing_list",
	"as_parent"               => array( 'only' => 'qode_pricing_list_item' ),
	"content_element"         => true,
	"category"                => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                    => "icon-wpb-pricing-list extended-custom-icon-qode",
	"show_settings_on_create" => false,
	"js_view"                 => 'VcColumnView',
	"params"                  => array()
) );

/*** Pricing List Item ***/
class WPBakeryShortCode_Qode_Pricing_List_Item extends WPBakeryShortCode {
}

vc_map( array(
	"name"            => esc_html__( "Select Pricing List Item", 'stockholm' ),
	"base"            => "qode_pricing_list_item",
	"content_element" => true,
	"icon"            => "icon-wpb-pricing-list-item extended-custom-icon-qode",
	"as_child"        => array( 'only' => 'qode_pricing_list' ),
	"params"          => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title",
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) ),
			"dependency" => array( 'element' => "title", 'not_empty' => true )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text", 'stockholm' ),
			"param_name" => "text",
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Price", 'stockholm' ),
			"param_name"  => "price",
			"description" => esc_html__( "You can append any unit that you want", 'stockholm' )
		),
		array(
			"type"       => "checkbox",
			"holder"     => "div",
			"heading"    => esc_html__( "Highlighted Item", 'stockholm' ),
			"param_name" => "enable_highlighted_item",
			"value"      => array( esc_html__( "Set as highlighted item?", 'stockholm' ) => "enable_highlighted_item" )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Highlighted Text", 'stockholm' ),
			"param_name" => "highlighted_text",
			"dependency" => array( 'element' => "enable_highlighted_item", 'value'   => array( "enable_highlighted_item" ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Item Margin Bottom (px)", 'stockholm' ),
			"param_name" => "margin_bottom_item"
		)
	)
) );

class WPBakeryShortCode_Animated_Icons_With_Text extends WPBakeryShortCodesContainer {}

//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name"                    => esc_html__( "Animated Icons With Text", 'stockholm' ),
	"base"                    => "animated_icons_with_text",
	"as_parent"               => array( 'only' => 'animated_icon_with_text' ),
	"content_element"         => true,
	"category"                => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                    => "icon-wpb-animated_icons_with_text extended-custom-icon-qode",
	"show_settings_on_create" => true,
	"params"                  => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Columns", 'stockholm' ),
			"param_name"  => "columns",
			"value"       => array(
				esc_html__( "Two", 'stockholm' )   => "two_columns",
				esc_html__( "Three", 'stockholm' ) => "three_columns",
				esc_html__( "Four", 'stockholm' )  => "four_columns",
				esc_html__( "Five", 'stockholm' )  => "five_columns"
			),
			'save_always' => true
		)
	),
	"js_view"                 => 'VcColumnView'
) );

class WPBakeryShortCode_Animated_Icon_With_Text extends WPBakeryShortCode {
}

vc_map( array(
	"name"            => esc_html__( "Animated Icon With Text", 'stockholm' ),
	"base"            => "animated_icon_with_text",
	"icon"            => "icon-wpb-animated_icon_with_text extended-custom-icon-qode",
	"content_element" => true,
	"as_child"        => array( 'only' => 'animated_icons_with_text' ),
	"params"          => array(
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title"
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true, array( 'p' => 'p' ) ) )
		),
		array(
			"type"       => "textarea",
			"holder"     => "div",
			"heading"    => esc_html__( "Text", 'stockholm' ),
			"param_name" => "text"
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon Pack", 'stockholm' ),
			"param_name" => "icon_pack",
			"value"      => array(
				esc_html__( "No Icon", 'stockholm' )      => "",
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
			)
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => $fa_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_awesome' ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => $fe_icons,
			'save_always' => true,
			"dependency"  => Array( 'element' => "icon_pack", 'value' => array( 'font_elegant' ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon", 'stockholm' ),
			"param_name" => "linear_icon",
			"value"      => $lnr_icons,
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Icon Size", 'stockholm' ),
			"param_name"  => "size",
			"description" => esc_html__( "Put number in px, ex.25", 'stockholm' )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Color", 'stockholm' ),
			"param_name" => "icon_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Background Color", 'stockholm' ),
			"param_name" => "icon_background_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Color", 'stockholm' ),
			"param_name" => "border_color"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Color On Hover", 'stockholm' ),
			"param_name" => "icon_color_hover"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Background Color On Hover", 'stockholm' ),
			"param_name" => "icon_background_color_hover"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Color On Hover", 'stockholm' ),
			"param_name" => "border_color_hover"
		)
	)
) );

class WPBakeryShortCode_Qode_Circles extends WPBakeryShortCodesContainer {
}

//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name"                    => esc_html__( "Select Process Holder", 'stockholm' ),
	"base"                    => "qode_circles",
	"as_parent"               => array( 'only' => 'qode_circle' ),
	"content_element"         => true,
	"category"                => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                    => "icon-wpb-qode_circles extended-custom-icon-qode",
	"show_settings_on_create" => true,
	"params"                  => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Columns", 'stockholm' ),
			"param_name"  => "columns",
			"value"       => array(
				esc_html__( "Three", 'stockholm' ) => "three_columns",
				esc_html__( "Four", 'stockholm' )  => "four_columns",
				esc_html__( "Five", 'stockholm' )  => "five_columns"
			),
			'save_always' => true
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Lines Between Items?", 'stockholm' ),
			"param_name" => "lines_between",
			"value"      => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "No", 'stockholm' )      => "no",
				esc_html__( "Yes", 'stockholm' )     => "yes"
			)
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Line Color", 'stockholm' ),
			"param_name" => "line_color"
		)
	),
	"js_view"                 => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Circle extends WPBakeryShortCode {
}

vc_map( array(
	"name"            => esc_html__( "Select Process", 'stockholm' ),
	"base"            => "qode_circle",
	"content_element" => true,
	"icon"            => "icon-wpb-qode_circle extended-custom-icon-qode",
	"as_child"        => array( 'only' => 'qode_circles' ),
	"params"          => array(
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Type", 'stockholm' ),
			"param_name"  => "type",
			"value"       => array(
				esc_html__( "Icon in Process", 'stockholm' ) => "icon_type",
				esc_html__( "Image", 'stockholm' )           => "image_type",
				esc_html__( "Text in Process", 'stockholm' ) => "text_type"
			),
			'save_always' => true
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Background Process Color", 'stockholm' ),
			"param_name" => "background_color"
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Background Process Transparency", 'stockholm' ),
			"param_name"  => "background_transparency",
			"description" => esc_html__( "Insert value between 0 and 1", 'stockholm' )
		),
		array(
			"type"       => "checkbox",
			"heading"    => "",
			"value"      => array( esc_html__( "Without outer border?", 'stockholm' ) => "yes" ),
			"param_name" => "without_double_border"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Process Color", 'stockholm' ),
			"param_name" => "border_color"
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Border Process Width", 'stockholm' ),
			"param_name" => "border_width"
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon Pack", 'stockholm' ),
			"param_name"  => "icon_pack",
			"value"       => array(
				esc_html__( "Font Awesome", 'stockholm' ) => "font_awesome",
				esc_html__( "Font Elegant", 'stockholm' ) => "font_elegant",
				esc_html__( "Linear Icons", 'stockholm' ) => "linear_icons"
			),
			'save_always' => true,
			"dependency"  => array( 'element' => "type", 'value' => array( "icon_type" ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fa_icon",
			"value"       => $fa_icons,
			'save_always' => true,
			"dependency"  => array( 'element' => "icon_pack", 'value' => array( "font_awesome" ) )
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__( "Icon", 'stockholm' ),
			"param_name"  => "fe_icon",
			"value"       => $fe_icons,
			'save_always' => true,
			"dependency"  => array( 'element' => "icon_pack", 'value' => array( "font_elegant" ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Icon", 'stockholm' ),
			"param_name" => "linear_icon",
			"value"      => $lnr_icons,
			"dependency" => Array( 'element' => "icon_pack", 'value' => array( 'linear_icons' ) )
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"heading"     => esc_html__( "Size", 'stockholm' ),
			"param_name"  => "size",
			"description" => esc_html__( "Enter just number. Omit px", 'stockholm' ),
			"dependency"  => array( 'element' => "type", 'value' => array( "icon_type" ) )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Icon Color", 'stockholm' ),
			"param_name" => "icon_color",
			"dependency" => array( 'element' => "type", 'value' => array( "icon_type" ) )
		),
		array(
			"type"       => "attach_image",
			"holder"     => "div",
			"heading"    => esc_html__( "Image", 'stockholm' ),
			"param_name" => "image",
			"dependency" => array( 'element' => "type", 'value' => array( "image_type" ) )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text in Process", 'stockholm' ),
			"param_name" => "text_in_circle",
			"dependency" => array( 'element' => "type", 'value' => array( "text_type" ) )
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Text in Process Tag", 'stockholm' ),
			"param_name" => "text_in_circle_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) ),
			"dependency" => array( 'element' => "text_in_circle", 'not_empty' => true )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Text in Process Size (px)", 'stockholm' ),
			"param_name" => "font_size",
			"dependency" => array( 'element' => "text_in_circle", 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Text in Process Color", 'stockholm' ),
			"param_name" => "text_in_circle_color",
			"dependency" => array( 'element' => "text_in_circle", 'not_empty' => true )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Link", 'stockholm' ),
			"param_name" => "link"
		),
		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"heading"    => esc_html__( "Link Target", 'stockholm' ),
			"param_name" => "link_target",
			"value"      => array_flip( stockholm_qode_get_link_target_array( true ) ),
			"dependency" => array( 'element' => "link", 'not_empty' => true )
		),
		array(
			"type"       => "textfield",
			"holder"     => "div",
			"heading"    => esc_html__( "Title", 'stockholm' ),
			"param_name" => "title"
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Title Tag", 'stockholm' ),
			"param_name" => "title_tag",
			"value"      => array_flip( stockholm_qode_get_title_tag( true ) ),
			"dependency" => array( 'element' => "title", 'not_empty' => true )
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Title Color", 'stockholm' ),
			"param_name" => "title_color",
			"dependency" => array( 'element' => "title", 'not_empty' => true )
		),
		array(
			"type"       => "textarea",
			"holder"     => "div",
			"heading"    => esc_html__( "Text", 'stockholm' ),
			"param_name" => "text"
		),
		array(
			"type"       => "colorpicker",
			"holder"     => "div",
			"heading"    => esc_html__( "Text Color", 'stockholm' ),
			"param_name" => "text_color",
			"dependency" => array( 'element' => "text", 'not_empty' => true )
		)
	)
) );

/**************Elements Holder*************************/
class WPBakeryShortCode_Qode_Elements_Holder extends WPBakeryShortCodesContainer {
}

//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name"                    => esc_html__( 'Select Elements Holder', 'stockholm' ),
	"base"                    => "qode_elements_holder",
	"as_parent"               => array( 'only' => 'qode_elements_holder_item' ),
	"content_element"         => true,
	"category"                => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                    => "icon-wpb-qode_elements_holder extended-custom-icon-qode",
	"show_settings_on_create" => true,
	"js_view"                 => 'VcColumnView',
	"params"                  => array(
		array(
			"type"       => "colorpicker",
			"heading"    => esc_html__( "Background Color", 'stockholm' ),
			"param_name" => "background_color",
			"value"      => ""
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"heading"     => esc_html__( "Columns", 'stockholm' ),
			"param_name"  => "number_of_columns",
			"value"       => array(
				esc_html__( "One", 'stockholm' )   => "one_column",
				esc_html__( "Two", 'stockholm' )   => "two_columns",
				esc_html__( "Three", 'stockholm' ) => "three_columns",
				esc_html__( "Four", 'stockholm' )  => "four_columns"
			),
			'save_always' => true
		),
		array(
			"type"        => "dropdown",
			"group"       => esc_html__( "Width & Responsiveness", 'stockholm' ),
			"heading"     => esc_html__( "Switch to One Column", 'stockholm' ),
			"param_name"  => "switch_to_one_column",
			"value"       => array(
				esc_html__( "Default", 'stockholm' )      => "",
				esc_html__( "Below 1300px", 'stockholm' ) => "1300",
				esc_html__( "Below 1000px", 'stockholm' ) => "1000",
				esc_html__( "Below 768px", 'stockholm' )  => "768",
				esc_html__( "Below 600px", 'stockholm' )  => "600",
				esc_html__( "Below 480px", 'stockholm' )  => "480",
				esc_html__( "Never", 'stockholm' )        => "never"
			),
			"description" => esc_html__( "Choose on which stage item will be in one column", 'stockholm' )
		),
		array(
			"type"        => "dropdown",
			"group"       => esc_html__( "Width & Responsiveness", 'stockholm' ),
			"heading"     => esc_html__( "Choose Alignment In Responsive Mode", 'stockholm' ),
			"param_name"  => "alignment_one_column",
			"value"       => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "Left", 'stockholm' )    => "left",
				esc_html__( "Center", 'stockholm' )  => "center",
				esc_html__( "Right", 'stockholm' )   => "right"
			),
			"description" => esc_html__( "Alignment When Items are in One Column", 'stockholm' )
		)
	)
) );

class WPBakeryShortCode_Qode_Elements_Holder_Item extends WPBakeryShortCodesContainer {
}

//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" => esc_html__( 'Select Elements Holder Item', 'stockholm' ),
	"base"                    => "qode_elements_holder_item",
	"as_parent"               => array( 'except' => 'vc_row, vc_tabs, vc_accordion, cover_boxes, portfolio_list, portfolio_slider, qode_carousel' ),
	"as_child"                => array( 'only' => 'qode_elements_holder' ),
	"content_element"         => true,
	"category" => esc_html__( 'by SELECT', 'stockholm' ),
	"icon"                    => "icon-wpb-qode_elements_holder_item extended-custom-icon-qode",
	"show_settings_on_create" => true,
	"js_view"                 => 'VcColumnView',
	"params"                  => array(
		array(
			"type"       => "colorpicker",
			"heading" => esc_html__( "Background Color", 'stockholm' ),
			"param_name" => "background_color",
			"value"      => ""
		),
		array(
			"type"       => "attach_image",
			"heading" => esc_html__( "Background Image", 'stockholm' ),
			"param_name" => "background_image",
			"value"      => ""
		),
		array(
			"type"        => "textfield",
			"heading" => esc_html__( "Padding", 'stockholm' ),
			"param_name"  => "item_padding",
			"value"       => "",
			"description" => esc_html__( "Please insert padding in format 0px 10px 0px 10px", 'stockholm' )
		),
		array(
			"type"       => "dropdown",
			"heading" => esc_html__( "Vertical Alignment", 'stockholm' ),
			"param_name" => "vertical_alignment",
			"value"      => array(
				esc_html__( "Default", 'stockholm' ) => "",
				esc_html__( "Top", 'stockholm' ) => "top",
				esc_html__( "Middle", 'stockholm' ) => "middle",
				esc_html__( "Bottom", 'stockholm' ) => "bottom"
			),
			"admin_label" => true
		),
		array(
			'type'        => 'textfield',
			'group'       => esc_html__( 'Width & Responsiveness', 'stockholm' ),
			'heading'     => esc_html__( 'Padding on screen size between 1280px-1600px', 'stockholm' ),
			'param_name'  => 'item_padding_1280_1600',
			'value'       => '',
			'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'stockholm' )
		),
		array(
			'type'        => 'textfield',
			'group'       => esc_html__( 'Width & Responsiveness', 'stockholm' ),
			'heading'     => esc_html__( 'Padding on screen size between 1024px-1280px', 'stockholm' ),
			'param_name'  => 'item_padding_1024_1280',
			'value'       => '',
			'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'stockholm' )
		),
		array(
			'type'        => 'textfield',
			'group'       => esc_html__( 'Width & Responsiveness', 'stockholm' ),
			'heading'     => esc_html__( 'Padding on screen size between 768px-1024px', 'stockholm' ),
			'param_name'  => 'item_padding_768_1024',
			'value'       => '',
			'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'stockholm' )
		),
		array(
			'type'        => 'textfield',
			'group'       => esc_html__( 'Width & Responsiveness', 'stockholm' ),
			'heading'     => esc_html__( 'Padding on screen size between 600px-768px', 'stockholm' ),
			'param_name'  => 'item_padding_600_768',
			'value'       => '',
			'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'stockholm' )
		),
		array(
			'type'        => 'textfield',
			'group'       => esc_html__( 'Width & Responsiveness', 'stockholm' ),
			'heading'     => esc_html__( 'Padding on screen size between 480px-600px', 'stockholm' ),
			'param_name'  => 'item_padding_480_600',
			'value'       => '',
			'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'stockholm' )
		),
		array(
			'type'        => 'textfield',
			'group'       => esc_html__( 'Width & Responsiveness', 'stockholm' ),
			'heading'     => esc_html__( 'Padding on Screen Size Bellow 480px', 'stockholm' ),
			'param_name'  => 'item_padding_480',
			'value'       => '',
			'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'stockholm' )
		)
	)
) );

class WPBakeryShortCode_Qode_Vertical_Split_Slider  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
    "name" =>  esc_html__( 'Select Vertical Split Slider', 'stockholm' ),
    "base" => "qode_vertical_split_slider",
    "as_parent" => array('only' => 'qode_vertical_left_sliding_panel,qode_vertical_right_sliding_panel'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => esc_html__( 'by SELECT', 'stockholm'),
    "icon" => "extended-custom-icon-qode icon-wpb-vertical_split_slider",
    "show_settings_on_create" => false,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__( 'Navigation Position', 'stockholm'),
            "param_name" => "nav_position",
            'value' => array(
                esc_html__('Left', 'select-core') => 'left',
                esc_html__('Right', 'select-core') => 'right',
            )
        ),
    ),
    "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Vertical_Left_Sliding_Panel  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
    "name" =>  esc_html__( 'Left Sliding Panel', 'stockholm' ),
    "base" => "qode_vertical_left_sliding_panel",
    "as_parent" => array('only' => 'qode_vertical_slide_content_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "as_child" => array('only' => 'qode_vertical_split_slider'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => esc_html__( 'by SELECT', 'stockholm'),
    "icon" => "extended-custom-icon-qode icon-wpb-vertical_split_left",
    "show_settings_on_create" => false,
    "params" => array(),
    "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Vertical_Right_Sliding_Panel  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
    "name" =>  esc_html__( 'Right Sliding Panel', 'stockholm' ),
    "base" => "qode_vertical_right_sliding_panel",
    "as_parent" => array('only' => 'qode_vertical_slide_content_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "as_child" => array('only' => 'qode_vertical_split_slider'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => esc_html__( 'by SELECT', 'stockholm'),
    "icon" => "extended-custom-icon-qode icon-wpb-vertical_split_right",
    "show_settings_on_create" => false,
    "params" => array(),
    "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Vertical_Slide_Content_Item  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
    "name" =>  esc_html__( 'Slide Content Item', 'stockholm' ),
    "base" => "qode_vertical_slide_content_item",
    "as_parent" => array('except' => 'vc_row, vc_accordion, cover_boxes, portfolio_list, portfolio_slider, qode_carousel'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "as_child" => array('only' => 'qode_vertical_left_sliding_panel, qode_vertical_right_sliding_panel'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => esc_html__( 'by SELECT', 'stockholm'),
    "icon" => "extended-custom-icon-qode icon-wpb-qode_horizontal_marquee_item",
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "colorpicker",
            "heading" => esc_html__( 'Background Color', 'stockholm'),
            "param_name" => "background_color"
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__( 'Background Image', 'stockholm'),
            "param_name" => "background_image"
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Padding left/right', 'stockholm'),
            "param_name" => "item_padding",
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__( "Content Aligment", 'stockholm'),
            "param_name" => "aligment",
            "value" => array(
                esc_html__('Left', 'stockholm')    	=> "left",
                esc_html__('Right', 'stockholm')      => "right",
                esc_html__('Center', 'stockholm')     => "center"
            ),
            'save_always' => true
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__( 'Header/Bullets Style', 'stockholm'),
            "param_name" => "header_style",
            "value" => array(
                ""	=>	"",
                esc_html__('Light', 'stockholm')	=>	"light",
                esc_html__('Dark', 'stockholm')	=>	"dark"
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Item Link', 'stockholm'),
            "param_name" => "item_link"
        )

    )
) );
