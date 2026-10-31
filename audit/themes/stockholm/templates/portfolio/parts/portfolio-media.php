<?php
$qode_page_id = get_the_ID();

$portfolio_template    = isset( $portfolio_template ) && ! empty( $portfolio_template ) ? esc_attr( $portfolio_template ) : '';
$portfolio_image_size  = isset( $image_size ) && ! empty( $image_size ) ? esc_attr( $image_size ) : 'full';
$portfolio_slider_type = isset( $slider_type ) && ! empty( $slider_type ) ? esc_attr( $slider_type ) : '';

$lightbox_single_project = "no";
if ( stockholm_qode_options()->getOptionValue( 'lightbox_single_project' ) ) {
	$lightbox_single_project = stockholm_qode_options()->getOptionValue( 'lightbox_single_project' ) ;
}

$lightbox_video_single_project = 'no';
if ( stockholm_qode_options()->getOptionValue( 'lightbox_video_single_project' ) ) {
	$lightbox_video_single_project = stockholm_qode_options()->getOptionValue( 'lightbox_video_single_project' ) ;
}

$gallery_show_image_title = true;
if ( stockholm_qode_options()->getOptionValue( 'portfolio_hide_image_title' ) == 'yes' ) {
	$gallery_show_image_title = false;
}

$lightbox_additional_classes = array();
if ( $portfolio_template === 'gallery' ) {
	
	if ( get_post_meta( $qode_page_id, "qode_choose-number-of-portfolio-columns", true ) !== "" ) {
		$lightbox_additional_classes[] = 'v' . get_post_meta( $qode_page_id, "qode_choose-number-of-portfolio-columns", true );
	} elseif ( stockholm_qode_options()->getOptionValue( 'portfolio_columns_number' ) !== '' ) {
		$lightbox_additional_classes[] = 'v' . stockholm_qode_options()->getOptionValue( 'portfolio_columns_number' ) ;
	} else {
		$lightbox_additional_classes[] = 'v4';
	}
}

$media_wrapper_begin = '';
$media_wrapper_end   = '';

if ( $portfolio_template === 'slider' ) {
	$lightbox_single_project       = 'no';
	$lightbox_video_single_project = 'no';
	
	$media_wrapper_begin = $portfolio_slider_type === 'owl' ? '<div class="owl-item">' : '<li class="slide">';
	$media_wrapper_end   = $portfolio_slider_type === 'owl' ? '</div>' : '</li>';
}

$portfolio_m_images = get_post_meta( $qode_page_id, "qode_portfolio-image-gallery", true );
if ( $portfolio_m_images ) {
	$portfolio_image_gallery_array = explode( ',', $portfolio_m_images );
	foreach ( $portfolio_image_gallery_array as $gimg_id ) {
		$title     = get_the_title( $gimg_id );
		$image_alt = get_post_meta( $gimg_id, '_wp_attachment_image_alt', true );
		$image_src = wp_get_attachment_image_src( $gimg_id, $portfolio_image_size );
		if ( is_array( $image_src ) ) {
			$image_src = $image_src[0];
		}
		
		if ( $portfolio_template === 'masonry' ) {
			$image_predefined_size         = get_post_meta( $gimg_id, 'qode_portfolio_single_predefined_size', true );
			$media_wrapper_begin           = '<span class="mix ' . esc_attr( $image_predefined_size ) . '">';
			$media_wrapper_end             = '</span>';
			$lightbox_additional_classes[] = 'mix ' . esc_attr( $image_predefined_size );
		}
		
		if ( $portfolio_template === 'fullscreen-slider' ) { ?>
			<span class="qodef-portfolio-slide-image" style="background-image:url('<?php echo esc_url( $image_src ); ?>');"></span>
		<?php } elseif ( $portfolio_template === 'gallery' ) {
			$gallery_image_link = $lightbox_single_project == "yes" ? $image_src : '#';
			$gallery_image_data = $lightbox_single_project == "yes" ? 'data-rel="prettyPhoto[single_pretty_photo]"' : '';
			
			$gallery_image_size_meta = get_post_meta( $qode_page_id, 'qode_choose-portfolio-image-size', true );
			$gallery_image_size      = ! empty( $gallery_image_size_meta ) ? esc_attr( $gallery_image_size_meta ) : '';
			$gallery_image_src       = ! empty( $gallery_image_size ) ? wp_get_attachment_image_src( $gimg_id, $gallery_image_size ) : $image_src;
			$gallery_image_src       = ! empty( $gallery_image_src ) ? $gallery_image_src : $image_src;
			if ( is_array( $gallery_image_src ) ) {
				$gallery_image_src = $gallery_image_src[0];
			}
			?>
			<a class="lightbox_single_portfolio <?php echo esc_attr( implode( ' ', $lightbox_additional_classes ) ); ?>" href="<?php echo esc_attr( $gallery_image_link ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php echo stockholm_qode_get_module_part( $gallery_image_data ); ?>>
                <span class="gallery_text_holder">
					<?php if ( $gallery_show_image_title ) { ?>
						<span class="gallery_text_inner">
							<h4><?php echo wp_kses_post( $title ); ?></h4>
						</span>
					<?php } ?>
				</span>
				<img src="<?php echo esc_url( $gallery_image_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>"/>
			</a>
		<?php } elseif ( $lightbox_single_project == "yes" ) { ?>
			<a class="lightbox_single_portfolio <?php echo esc_attr( implode( ' ', $lightbox_additional_classes ) ); ?>" title="<?php echo esc_attr( $title ); ?>" href="<?php echo esc_url( $image_src ); ?>" data-rel="prettyPhoto[single_pretty_photo]">
				<img src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>"/>
			</a>
		<?php } else { ?>
			<?php echo wp_kses_post( $media_wrapper_begin ); ?>
				<img src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>"/>
			<?php echo wp_kses_post( $media_wrapper_end ); ?>
		<?php }
	}
}

$portfolio_images = get_post_meta( $qode_page_id, "qode_portfolio_images", true );
if ( is_array( $portfolio_images ) && ! empty( $portfolio_images ) ) {
	usort( $portfolio_images, "stockholm_qode_compare_portfolio_images" );
	
	foreach ( $portfolio_images as $portfolio_image ) {
		$image_src = isset( $portfolio_image['portfolioimg'] ) ? $portfolio_image['portfolioimg'] : '';
		
		if ( $portfolio_template === 'masonry' ) {
			$image_predefined_size         = ! empty( $image_src ) ? get_post_meta( $portfolio_image, 'qode_portfolio_single_predefined_size', true ) : '';
			$media_wrapper_begin           = '<span class="mix ' . esc_attr( $image_predefined_size ) . '">';
			$media_wrapper_end             = '</span>';
			$lightbox_additional_classes[] = 'mix ' . esc_attr( $image_predefined_size );
		}
		
		if ( ! empty( $image_src ) ) {
			$image_id  = stockholm_qode_get_attachment_id_from_url( $image_src );
			$title     = $portfolio_image['portfoliotitle'];
			$image_alt = ! empty( $image_id ) ? get_post_meta( $image_id, '_wp_attachment_image_alt', true ) : '';
			
			if ( $portfolio_template === 'fullscreen-slider' ) { ?>
				<span class="qodef-portfolio-slide-image" style="background-image:url('<?php echo esc_url( $image_src ); ?>');"></span>
			<?php } elseif ( $portfolio_template === 'gallery' ) {
				$gallery_image_link = $lightbox_single_project == "yes" ? $image_src : '#';
				$gallery_image_data = $lightbox_single_project == "yes" ? 'data-rel="prettyPhoto[single_pretty_photo]"' : '';
				
				$gallery_image_size_meta = get_post_meta( $qode_page_id, 'qode_choose-portfolio-image-size', true );
				$gallery_image_size      = ! empty( $gallery_image_size_meta ) ? esc_attr( $gallery_image_size_meta ) : '';
				$gallery_image_src       = ! empty( $gallery_image_size ) ? wp_get_attachment_image_src( $image_id, $gallery_image_size ) : $image_src;
				$gallery_image_src       = ! empty( $gallery_image_src ) ? $gallery_image_src : $image_src;
				if ( is_array( $gallery_image_src ) ) {
					$gallery_image_src = $gallery_image_src[0];
				}
				?>
				<a class="lightbox_single_portfolio <?php echo esc_attr( implode( ' ', $lightbox_additional_classes ) ); ?>" href="<?php echo esc_attr( $gallery_image_link ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php echo stockholm_qode_get_module_part( $gallery_image_data ); ?>>
	                <span class="gallery_text_holder">
						<?php if ( $gallery_show_image_title ) { ?>
							<span class="gallery_text_inner">
								<h4><?php echo wp_kses_post( $title ); ?></h4>
							</span>
						<?php } ?>
					</span>
					<img src="<?php echo esc_url( $gallery_image_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>"/>
				</a>
			<?php } elseif ( $lightbox_single_project == "yes" ) { ?>
				<a class="lightbox_single_portfolio <?php echo esc_attr( implode( ' ', $lightbox_additional_classes ) ); ?>" title="<?php echo esc_attr( get_the_title( $image_id ) ); ?>" href="<?php echo esc_url( $image_src ); ?>" data-rel="prettyPhoto[single_pretty_photo]">
					<img src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>"/>
				</a>
			<?php } else { ?>
				<?php echo wp_kses_post( $media_wrapper_begin ); ?>
					<img src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>"/>
				<?php echo wp_kses_post( $media_wrapper_end ); ?>
			<?php }
		} else {
			$portfolio_video_type = "";
			if ( isset( $portfolio_image['portfoliovideotype'] ) && ! empty( $portfolio_image['portfoliovideotype'] ) ) {
				$portfolio_video_type = $portfolio_image['portfoliovideotype'];
			}
			
			if ( $portfolio_slider_type === 'owl' || $portfolio_template === 'fullscreen-slider' ) {
				$portfolio_video_type = "";
			}
			
			if ( $portfolio_template === 'gallery' ) {
				$media_wrapper_begin = '<a class="lightbox_single_portfolio ' . esc_attr( implode( ' ', $lightbox_additional_classes ) ) . '" href="#">';
				$media_wrapper_end   = '</a>';
			}
			
			switch ( $portfolio_video_type ) {
				case "youtube": ?>
					<?php if ( $lightbox_video_single_project == "yes" ) { ?>
						<a class="lightbox_single_portfolio <?php echo esc_attr( implode( ' ', $lightbox_additional_classes ) ); ?>" title="<?php echo esc_attr( $portfolio_image['portfoliotitle'] ); ?>" href="https://www.youtube.com/watch?feature=player_embedded&v=<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>" data-rel="prettyPhoto[single_pretty_photo]">
							<i class="fa fa-play"></i>
							<img width="100%" src="https://img.youtube.com/vi/<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>/maxresdefault.jpg" alt="<?php echo esc_attr( $portfolio_image['portfoliotitle'] ); ?>"/>
						</a>
					<?php } else { ?>
						<?php echo wp_kses_post( $media_wrapper_begin ); ?>
							<iframe width="100%" src="https://www.youtube.com/embed/<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
						<?php echo wp_kses_post( $media_wrapper_end ); ?>
					<?php }
					break;
				case "vimeo":
					if ( $lightbox_video_single_project == "yes" ) {
						$videoid = $portfolio_image['portfoliovideoid'];
						$video_url = "http://vimeo.com/api/v2/video/".$videoid.".php";
						$video_xml = unserialize(stockholm_qode_generate_portfolio_xml( $video_url ));
						$video_title = $video_xml[0]['title'];
						$video_thumbnail = $video_xml[0]['thumbnail_large'];
						?>
						<a class="lightbox_single_portfolio <?php echo esc_attr( implode( ' ', $lightbox_additional_classes ) ); ?>" title="<?php echo esc_attr( $portfolio_image['portfoliotitle'] ); ?>" href="https://vimeo.com/<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>" data-rel="prettyPhoto[single_pretty_photo]">
							<i class="fa fa-play"></i>
							<img width="100%" src="<?php echo esc_url( $video_thumbnail ); ?>" alt="<?php echo esc_attr( $portfolio_image['portfoliotitle'] ); ?>"/>
						</a>
					<?php } else { ?>
						<?php echo wp_kses_post( $media_wrapper_begin ); ?>
							<iframe src="https://player.vimeo.com/video/<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
						<?php echo wp_kses_post( $media_wrapper_end ); ?>
					<?php }
					break;
				case "self": ?>
					<?php echo wp_kses_post( $media_wrapper_begin ); ?>
						<div class="video">
							<div class="mobile-video-image" style="background-image: url(<?php echo esc_url( $portfolio_image['portfoliovideoimage'] ); ?>);"></div>
							<div class="video-wrap">
								<video class="video" poster="<?php echo esc_url( $portfolio_image['portfoliovideoimage'] ); ?>" preload="auto">
									<?php if ( ! empty( $portfolio_image['portfoliovideowebm'] ) ) { ?>
										<source type="video/webm" src="<?php echo esc_url( $portfolio_image['portfoliovideowebm'] ); ?>"> <?php } ?>
									<?php if ( ! empty( $portfolio_image['portfoliovideomp4'] ) ) { ?>
										<source type="video/mp4" src="<?php echo esc_url( $portfolio_image['portfoliovideomp4'] ); ?>"> <?php } ?>
									<?php if ( ! empty( $portfolio_image['portfoliovideoogv'] ) ) { ?>
										<source type="video/ogg" src="<?php echo esc_url( $portfolio_image['portfoliovideoogv'] ); ?>"> <?php } ?>
									<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
										<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf"/>
										<param name="flashvars" value="controls=true&file=<?php echo esc_url( $portfolio_image['portfoliovideomp4'] ); ?>"/>
										<img src="<?php echo esc_url( $portfolio_image['portfoliovideoimage'] ); ?>" width="1920" height="800" title="<?php esc_attr_e( 'No video playback capabilities', 'stockholm' ); ?>" alt="<?php esc_attr_e( 'Video thumb', 'stockholm' ); ?>"/>
									</object>
								</video>
							</div>
						</div>
					<?php echo wp_kses_post( $media_wrapper_end ); ?>
					<?php break;
			}
		}
	}
}
