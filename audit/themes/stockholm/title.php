<?php
$qode_page_id = stockholm_qode_get_page_id();

if ( get_post_meta( $qode_page_id, "qode_responsive-title-image", true ) != "" ) {
	$responsive_title_image = get_post_meta( $qode_page_id, "qode_responsive-title-image", true );
} else {
	$responsive_title_image = stockholm_qode_options()->getOptionValue( 'responsive_title_image' );
}

if ( get_post_meta( $qode_page_id, "qode_fixed-title-image", true ) != "" ) {
	$fixed_title_image = get_post_meta( $qode_page_id, "qode_fixed-title-image", true );
} else {
	$fixed_title_image = stockholm_qode_options()->getOptionValue( 'fixed_title_image' ) ;
}

if ( get_post_meta( $qode_page_id, "qode_title-image", true ) != "" ) {
	$title_image = get_post_meta( $qode_page_id, "qode_title-image", true );
} else {
	$title_image = stockholm_qode_options()->getOptionValue( 'title_image' ) ;
}

$title_image_width = '';
if ( ! empty( $title_image ) ) {
	$image_dimension = stockholm_qode_get_image_dimensions( $title_image );
	
	if ( ! empty( $image_dimension ) ) {
		$title_image_width = $image_dimension['width'];
	}
}

if ( get_post_meta( $qode_page_id, "qode_title-overlay-image", true ) != "" ) {
	$title_overlay_image = get_post_meta( $qode_page_id, "qode_title-overlay-image", true );
} else {
	$title_overlay_image = stockholm_qode_options()->getOptionValue( 'title_overlay_image' ) ;
}

$header_bottom_appearance = stockholm_qode_get_header_bottom_appearance();

$header_height_meta = stockholm_qode_options()->getOptionValue( 'header_height' );
if ( ! empty( $header_height_meta ) && $header_bottom_appearance != "fixed_hiding" ) {
	$header_height = $header_height_meta;
} elseif ( ! empty( $header_height_meta ) && $header_bottom_appearance == "fixed_hiding" ) {
	$header_height = $header_height_meta + 50; // 50 is logo height for fixed advanced header type
} elseif ( stockholm_qode_options()->getOptionValue( 'center_logo_image' ) == "yes" && $header_bottom_appearance != "stick" && stockholm_qode_options()->getOptionValue( 'header_bottom_appearance' ) != "fixed_hiding" ) {
	$header_height = 190;
} elseif ( empty( $header_height_meta ) && $header_bottom_appearance == "fixed_hiding" ) {
	$header_height = 222;
} else {
	$header_height = 100;
}

if ( stockholm_qode_options()->getOptionValue( 'header_bottom_border_color' ) !== '' ) {
	$header_height = $header_height + 1;
}

if ( $header_bottom_appearance == 'stick menu_bottom' ) {
	$menu_bottom = 60;
	if ( is_active_sidebar( 'header_fixed_right' ) ) {
		$menu_bottom = $menu_bottom + 26;
	}
} else {
	$menu_bottom = 0;
}

$header_top = stockholm_qode_return_top_header_height();

$header_height_padding = 0;
$header_height_padding = $header_height + $menu_bottom + $header_top;
if ( stockholm_qode_options()->getOptionValue( 'center_logo_image' ) == "yes" ) {
	if ( stockholm_qode_options()->getOptionValue( 'logo_image' ) !== '' ) {
		$image_dimension = stockholm_qode_get_image_dimensions( stockholm_qode_options()->getOptionValue( 'logo_image' )  );
		$logo_width  = 0;
		$logo_height = 0;
		
		if ( ! empty( $image_dimension ) ) {
			$logo_width = intval( $image_dimension['width'] );
			$logo_height = intval( $image_dimension['height'] );
		}
	}
	if ( $header_bottom_appearance == 'stick menu_bottom' ) {
		$header_height_padding = $header_height + $menu_bottom + $header_top + $logo_height + 20; // 20 is top margin of centered logo
	} else if ( $header_bottom_appearance == 'fixed_hiding' || $header_bottom_appearance == 'fixed' ) {
		if ( stockholm_qode_options()->getOptionValue( 'header_height' ) != '' && $header_bottom_appearance == "fixed" ) {
			$header_height_padding = $header_height + $header_top + $logo_height + 20;
		} else {
			$header_height_padding = $header_height + $header_top;
		}
	} else {
		$header_height_padding = $header_height + $header_top + $logo_height + 20; // 20 is top margin of centered logo
	}
}

$title_type = "standard_title";
if ( get_post_meta( $qode_page_id, "qode_page_title_type", true ) != "" ) {
	$title_type = get_post_meta( $qode_page_id, "qode_page_title_type", true );
} elseif ( stockholm_qode_options()->getOptionValue( 'title_type' ) ) {
	$title_type = stockholm_qode_options()->getOptionValue( 'title_type' ) ;
}

if ( is_404() ) {
	$title_type = "breadcrumbs_title";
}

//init variables
$title_subtitle_padding   = '';
$header_transparency      = '';
$is_header_transparent    = false;
$transparent_values_array = array( '0.00', '0' );
$solid_values_array       = array( '', '1' );

//is header transparent not set on current page?
if ( get_post_meta( $qode_page_id, "qode_header_color_transparency_per_page", true ) === "" ) {
	//take global value set in Qode Options
	$header_transparency = stockholm_qode_options()->getOptionValue( 'header_background_transparency_initial' ) ;
} else {
	//take value set for current page
	$header_transparency = get_post_meta( $qode_page_id, "qode_header_color_transparency_per_page", true );
}

//is header completely transparent?
$is_header_transparent = in_array( $header_transparency, $transparent_values_array );

//is header solid?
$is_header_solid = in_array( $header_transparency, $solid_values_array );

$title_height = 330; // default title height without header height
if ( $title_type == "breadcrumbs_title" ) {
	$title_height = 88;
}

if ( get_post_meta( $qode_page_id, "qode_title-height", true ) != "" ) {
	$title_height = get_post_meta( $qode_page_id, "qode_title-height", true );
} elseif ( stockholm_qode_options()->getOptionValue( 'title_height' ) != '' ) {
	$title_height = stockholm_qode_options()->getOptionValue( 'title_height' ) ;
}

if ( $title_type == "breadcrumbs_title" && ! $is_header_solid && stockholm_qode_is_content_below_header() == false ) {
	if ( stockholm_qode_options()->getOptionValue( 'center_logo_image' ) == "yes" || $header_bottom_appearance == 'fixed_hiding' ) {
		if ( $header_bottom_appearance == 'stick menu_bottom' ) {
			$title_height = $title_height + $header_height + $menu_bottom + $header_top + $logo_height + 20; // 20 is top margin of centered logo
		} elseif ( $header_bottom_appearance == 'fixed_hiding' || $header_bottom_appearance == 'fixed' ) {
			if ( ! empty( $header_height_meta ) && $header_bottom_appearance == "fixed" ) {
				$title_height = $title_height + $header_height + $header_top + $logo_height + 20;
			} else {
				$title_height = $title_height + $header_height + $header_top;
			}
		} else {
			$title_height = $title_height + $header_height + $header_top + $logo_height + 20; // 20 is top margin of centered logo
		}
	} else {
		$title_height = $title_height + $header_height + $menu_bottom + $header_top;
	}
}

$title_background_color = '';
if ( get_post_meta( $qode_page_id, "qode_page-title-background-color", true ) != "" ) {
	$title_background_color = get_post_meta( $qode_page_id, "qode_page-title-background-color", true );
} else {
	$title_background_color = stockholm_qode_options()->getOptionValue( 'title_background_color' ) ;
}

$show_title_image = true;
if ( get_post_meta( $qode_page_id, "qode_show-page-title-image", true ) == "yes" ) {
	$show_title_image = false;
}
$qode_page_title_style = "standard";
if ( get_post_meta( $qode_page_id, "qode_page_title_style", true ) != "" ) {
	$qode_page_title_style = get_post_meta( $qode_page_id, "qode_page_title_style", true );
} else {
	if ( stockholm_qode_options()->getOptionValue( 'title_style' ) ) {
		$qode_page_title_style = stockholm_qode_options()->getOptionValue( 'title_style' ) ;
	} else {
		$qode_page_title_style = "standard";
	}
}

$title_outer_classes = array();

$animate_title_area = '';
if ( get_post_meta( $qode_page_id, "qode_animate-page-title", true ) != "" ) {
	$animate_title_area = get_post_meta( $qode_page_id, "qode_animate-page-title", true );
} else {
	$animate_title_area = stockholm_qode_options()->getOptionValue( 'animate_title_area' ) ;
}

if ( $animate_title_area == "text_right_left" ) {
	$title_outer_classes[] = "animate_title_text";
} elseif ( $animate_title_area == "area_top_bottom" ) {
	$title_outer_classes[] = "animate_title_area";
} else {
	$title_outer_classes[] = "title_without_animation";
}

if ( get_post_meta( $qode_page_id, "qode_title_text_shadow", true ) == "yes" ) {
	$title_outer_classes[] = 'title_text_shadow';
} elseif ( stockholm_qode_options()->getOptionValue( 'title_text_shadow' ) == "yes" ) {
	$title_outer_classes[] = 'title_text_shadow';
}

if ( $responsive_title_image == 'yes' && $show_title_image == true && $title_image !== '' ) {
	$title_outer_classes[] = 'with_image';
}

$title_outer_styles = array();
if ( $title_height != ''&& $animate_title_area == 'area_top_bottom' ) {
	$title_outer_styles[] = 'opacity: 0;';
	$title_outer_styles[] = 'height:' . intval( $header_height_padding ) . 'px;';
}

$title_styles = array();
if ( $responsive_title_image == 'no' && $title_image != "" && $show_title_image == true ) {
	if ( $title_image_width != '' ) {
		$title_styles[] = 'background-size:' . intval( $title_image_width ) . 'px auto;';
	}
	
	$title_styles[] = 'background-image:url(' . esc_url( $title_image ) . ');';
}

if ( $title_height != '' ) {
	$title_styles[] = 'height:' . intval( $title_height ) . 'px;';
}

if ( $title_background_color != '' ) {
	$title_styles[] = 'background-color:' . $title_background_color . ';';
}

$title_img_classes = array();
if ( $responsive_title_image == 'yes' && $title_image != "" && $show_title_image == true ) {
	$title_img_classes[] = "responive";
} else {
	$title_img_classes[] = "not_responsive";
}

$title_overlay_styles = array();
if ( ! empty( $title_overlay_image ) ) {
	$title_overlay_styles[] = 'background-image:url(' . esc_url( $title_overlay_image ) . ');';
}

//is header solid?
if ( $title_type == "breadcrumbs_title" && ! $is_header_solid && stockholm_qode_is_content_below_header() == false ) {
	//is header semi-transparent?
	if ( ! $is_header_transparent ) {
		$title_calculated_height = $title_height - $header_height_padding;
		
		if ( $title_calculated_height < 0 ) {
			$title_calculated_height = 0;
		}
		
		//center title between border and end of title section
		$title_holder_height    = 'style="padding-top:' . $header_height_padding . 'px;height:' . ( $title_calculated_height ) . 'px;"';
		$title_subtitle_padding = 'style="padding-top:' . $header_height_padding . 'px;"';
	} else {
		//header is transparent
		$title_holder_height    = 'style="padding-top:' . $header_height_padding . 'px;height:' . ( $title_height - $header_height_padding ) . 'px;"';
		$title_subtitle_padding = 'style="padding-top:' . $header_height_padding . 'px;"';
	}
} else {
	$title_holder_height    = 'style="height:' . $title_height . 'px;"';
	$title_subtitle_padding = '';
}

//is vertical menu activated in Qode Options?
if ( stockholm_qode_is_vertical_header_enabled() ) {
	$title_subtitle_padding = 0;
	$title_holder_height    = 330;
	if ( $title_type == "breadcrumbs_title" ) {
		$title_holder_height = 100;
	}
	$title_height = 330; // default title height without header height
	if ( $title_type == "breadcrumbs_title" ) {
		$title_height = 100;
	}
	if ( get_post_meta( $qode_page_id, "qode_title-height", true ) != "" ) {
		$title_holder_height = get_post_meta( $qode_page_id, "qode_title-height", true );
		$title_height        = get_post_meta( $qode_page_id, "qode_title-height", true );
	} else if ( stockholm_qode_options()->getOptionValue( 'title_height' ) != '' ) {
		$title_holder_height = stockholm_qode_options()->getOptionValue( 'title_height' ) ;
		$title_height        = stockholm_qode_options()->getOptionValue( 'title_height' ) ;
	}
	$title_holder_height = 'style="height:' . $title_holder_height . 'px;"';
}

$title_label_styles = array();
if ( get_post_meta( $qode_page_id, "qode_page-title-color", true ) != "" ) {
	$title_label_styles[] = 'color: ' . get_post_meta( $qode_page_id, "qode_page-title-color", true );
}

if ( get_post_meta( $qode_page_id, "qode_page-title-text-background-color", true ) != '' ) {
	$original_color = get_post_meta( $qode_page_id, "qode_page-title-text-background-color", true );
	$rgb_color      = stockholm_qode_hex2rgb( $original_color );
	
	if ( get_post_meta( $qode_page_id, "qode_page-title-text-background-opacity", true ) != '' ) {
		$opacity = get_post_meta( $qode_page_id, "qode_page-title-text-background-opacity", true );
	} elseif ( stockholm_qode_options()->getOptionValue( 'title_text_background_opacity' ) != '' ) {
		$opacity = stockholm_qode_options()->getOptionValue( 'title_text_background_opacity' ) ;
	} else {
		$opacity = 1;
	}
	
	$title_label_styles[] = 'background-color: rgba(' . $rgb_color[0] . ',' . $rgb_color[1] . ',' . $rgb_color[2] . ',' . $opacity . ')';
} elseif ( stockholm_qode_options()->getOptionValue( 'title_text_background_color' ) !== '' ) {
	$original_color = stockholm_qode_options()->getOptionValue( 'title_text_background_color' ) ;
	$rgb_color      = stockholm_qode_hex2rgb( $original_color );
	
	if ( get_post_meta( $qode_page_id, "qode_page-title-text-background-opacity", true ) != '' ) {
		$opacity = get_post_meta( $qode_page_id, "qode_page-title-text-background-opacity", true );
	} elseif ( stockholm_qode_options()->getOptionValue( 'title_text_background_opacity' ) != '' ) {
		$opacity = stockholm_qode_options()->getOptionValue( 'title_text_background_opacity' ) ;
	} else {
		$opacity = 1;
	}
	
	$title_label_styles[] = 'background-color: rgba(' . $rgb_color[0] . ',' . $rgb_color[1] . ',' . $rgb_color[2] . ',' . $opacity . ')';
}

$subtite_text = ! stockholm_qode_is_archive_page() ? get_post_meta( $qode_page_id, "qode_page_subtitle", true ) : '';

$subtitle_styles = array();
if ( get_post_meta( $qode_page_id, "qode_page_subtitle_color", true ) != "" ) {
	$subtitle_styles[] = 'color: ' . get_post_meta( $qode_page_id, "qode_page_subtitle_color", true );
}
$stockholm_qode_text_above_title_styles = array();
if(get_post_meta($id, "qode_page_text_above_title_color", true) != ""){
	$stockholm_qode_text_above_title_styles[] = 'color:' . get_post_meta($id, "qode_page_text_above_title_color", true);
}
$stockholm_qode_text_above_title_tag = 'h4';
if(get_post_meta($id, "qode_page_text_above_title_tag", true) != ""){
	$stockholm_qode_text_above_title_tag = get_post_meta($id, "qode_page_text_above_title_tag", true);
}

$title_in_grid = stockholm_qode_get_meta_field_intersect('title_in_grid');
$title_full_width_padding = stockholm_qode_get_meta_field_intersect('title_padding');
$title_full_width_padding_style = $title_full_width_padding !== '' ? 'padding:'.$title_full_width_padding.';' : '';

if ( stockholm_qode_is_title_area_visible() ) { ?>
	<div class="title_outer <?php echo esc_attr( implode( ' ', $title_outer_classes ) ); ?>" <?php stockholm_qode_inline_style( $title_outer_styles ); ?> <?php stockholm_qode_inline_attr( intval( $title_height ), 'data-height', true ); ?>>
		<div class="title <?php stockholm_qode_title_classes(); ?>" <?php stockholm_qode_inline_style( $title_styles ); ?>>
			<?php if ( ! empty( $title_image ) ) { ?>
				<div class="image <?php echo esc_attr( implode( ' ', $title_img_classes ) ); ?>">
					<img src="<?php echo esc_url( $title_image ); ?>" alt="<?php esc_attr_e( 'Title Image', 'stockholm' ); ?>" />
				</div>
			<?php } ?>
			<?php if ( ! empty( $title_overlay_image ) ) { ?>
				<div class="title_overlay" <?php stockholm_qode_inline_style( $title_overlay_styles ); ?>></div>
			<?php } ?>
			<div class="title_holder" <?php if ( ( $title_image !== '' && $responsive_title_image != 'yes' && $show_title_image == true ) || ( $title_type == 'breadcrumbs_title' && $title_image == '' ) ) {
				echo wp_kses( $title_holder_height, array( 'style' ) );
			} ?>>

                <?php if($title_in_grid == 'yes'){ ?>
                <div class="container">
                    <div class="container_inner clearfix">
                <?php }else{ ?>
                <div class="title_full_width" <?php echo stockholm_qode_inline_style($title_full_width_padding_style); ?>>
				<?php } ?>
						<div class="title_subtitle_holder" <?php if ( $title_image !== '' && $responsive_title_image == 'yes' && $show_title_image == true ) {
							echo wp_kses( $title_subtitle_padding, array( 'style' ) );
						} ?>>
							<?php if ( ( $responsive_title_image == 'yes' && $show_title_image == true ) || ( $fixed_title_image == "yes" || $fixed_title_image == "yes_zoom" ) || ( $responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true ) ){ ?>
							<div class="title_subtitle_holder_inner">
								<?php } ?>
								
								<?php if ( $title_type != "breadcrumbs_title" ) { ?>

                                    <?php if(get_post_meta($id, "qode_page_text_above_title", true) != ""){ ?>
                                        <<?php echo esc_attr($stockholm_qode_text_above_title_tag); ?> class="qodef-text-above-title" <?php echo stockholm_qode_get_inline_style($stockholm_qode_text_above_title_styles); ?>><?php echo get_post_meta($id, "qode_page_text_above_title", true); ?></<?php echo esc_attr($stockholm_qode_text_above_title_tag); ?>>
									<?php } ?>

									<?php if ( get_post_meta( $qode_page_id, "qode_show-page-title-text", true ) !== 'yes' ) { ?>
										<h1 <?php stockholm_qode_inline_style( $title_label_styles ); ?>><span><?php echo wp_kses_post( stockholm_qode_get_title_text() ); ?></span></h1>
									<?php } ?>

									<?php if ( ! empty($subtite_text) ) { ?>
										<span class="subtitle" <?php stockholm_qode_inline_style( $subtitle_styles ); ?>><?php echo wp_kses_post( $subtite_text ); ?></span>
									<?php } ?>
									<?php if ( stockholm_qode_is_custom_breadcrumbs_enabled() ) { ?>
										<div class="breadcrumb"> <?php stockholm_qode_custom_breadcrumbs(); ?></div>
									<?php } ?>

								<?php } else { ?>
									<div class="breadcrumb"> <?php stockholm_qode_custom_breadcrumbs(); ?></div>
								<?php } ?>
							</div>
							<?php if ( ( $responsive_title_image == 'yes' && $show_title_image == true ) || ( $fixed_title_image == "yes" || $fixed_title_image == "yes_zoom" ) || ( $responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true ) ){ ?>
						</div>
						<?php } ?>
                <?php if($title_in_grid == 'yes'){ ?>
                    </div>
                </div>
                <?php }else{ ?>
                </div>
                <?php } ?>
			</div>
		</div>
	</div>
<?php } ?>