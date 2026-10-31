<?php

if ( ! function_exists( 'stockholm_qode_map_slides_meta_fields' ) ) {
	function stockholm_qode_map_slides_meta_fields() {
		
		// Slide Type Meta Box Section
		
		$qodeSlideType = new StockholmQodeMetaBox(
			"slides",
			esc_html__( "Select Slide Type", 'stockholm' ),
			"slide-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"slides_type",
			$qodeSlideType
		);
		
		$qode_slide_background_type = new StockholmQodeMetaField(
			"imagevideo",
			"qode_slide-background-type",
			"image",
			esc_html__( "Slide Background Type", 'stockholm' ),
			esc_html__( "Do you want to upload an image or video?", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef-meta-box-slides_video_settings",
				"dependence_show_on_yes" => "#qodef-meta-box-slides_image_settings"
			)
		);
		$qodeSlideType->addChild(
			"qode_slide-background-type",
			$qode_slide_background_type
		);
		
		// Slide Image Meta Box Section
		
		$qodeSlideImageSettings = new StockholmQodeMetaBox(
			"slides",
			esc_html__( "Select Slide Image", 'stockholm' ),
			"slide-image-meta",
			"qode_slide-background-type",
			array( "video" )
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"slides_image_settings",
			$qodeSlideImageSettings
		);
		
		$qode_slide_image = new StockholmQodeMetaField(
			"image",
			"qode_slide-image",
			"",
			esc_html__( "Slide Image", 'stockholm' ),
			esc_html__( "Choose background image", 'stockholm' )
		);
		$qodeSlideImageSettings->addChild(
			"qode_title-image",
			$qode_slide_image
		);
		
		$qode_slide_overlay_image = new StockholmQodeMetaField(
			"image",
			"qode_slide-overlay-image",
			"",
			esc_html__( "Overlay Image", 'stockholm' ),
			esc_html__( "Choose overlay image (pattern) for background image", 'stockholm' )
		);
		$qodeSlideImageSettings->addChild(
			"qode_slide-overlay-image",
			$qode_slide_overlay_image
		);
		
		// Slide Video Meta Box Section
		
		$qodeSlideVideoSettings = new StockholmQodeMetaBox(
			"slides",
			esc_html__( "Select Slide Video", 'stockholm' ),
			"slide-video-meta",
			"qode_slide-background-type",
			array( "image" )
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"slides_video_settings",
			$qodeSlideVideoSettings
		);
		
		$qode_slide_video_webm = new StockholmQodeMetaField(
			"text",
			"qode_slide-video-webm",
			"",
			esc_html__( "Video - webm", 'stockholm' ),
			esc_html__( "Path to the webm file that you have previously uploaded in Media Section", 'stockholm' )
		);
		$qodeSlideVideoSettings->addChild(
			"qode_slide-video-webm",
			$qode_slide_video_webm
		);
		
		$qode_slide_video_mp4 = new StockholmQodeMetaField(
			"text",
			"qode_slide-video-mp4",
			"",
			esc_html__( "Video - mp4", 'stockholm' ),
			esc_html__( "Path to the mp4 file that you have previously uploaded in Media Section", 'stockholm' )
		);
		$qodeSlideVideoSettings->addChild(
			"qode_slide-video-mp4",
			$qode_slide_video_mp4
		);
		
		$qode_slide_video_ogv = new StockholmQodeMetaField(
			"text",
			"qode_slide-video-ogv",
			"",
			esc_html__( "Video - ogv", 'stockholm' ),
			esc_html__( "Path to the ogv file that you have previously uploaded in Media Section", 'stockholm' )
		);
		$qodeSlideVideoSettings->addChild(
			"qode_slide-video-ogv",
			$qode_slide_video_ogv
		);
		
		$qode_slide_video_image = new StockholmQodeMetaField(
			"image",
			"qode_slide-video-image",
			"",
			esc_html__( "Video Preview Image", 'stockholm' ),
			esc_html__( "Choose background image that will be visible until video is loaded. This image will be shown on touch devices too.", 'stockholm' )
		);
		$qodeSlideVideoSettings->addChild(
			"qode_slide-video-image",
			$qode_slide_video_image
		);
		
		$qode_slide_video_overlay = new StockholmQodeMetaField(
			"yesempty",
			"qode_slide-video-overlay",
			"",
			esc_html__( "Video Overlay Image", 'stockholm' ),
			esc_html__( "Do you want to have a overlay image on video? ", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_qode_slide-video-overlay_container"
			)
		);
		$qodeSlideVideoSettings->addChild(
			"qode_slide-video-overlay",
			$qode_slide_video_overlay
		);
		
		$qode_slide_video_overlay_container = new StockholmQodeContainer(
			"qode_slide-video-overlay_container",
			"qode_slide-video-overlay",
			""
		);
		$qodeSlideVideoSettings->addChild(
			"qode_slide_video_overlay_container",
			$qode_slide_video_overlay_container
		);
		
		$qode_slide_video_overlay_image = new StockholmQodeMetaField(
			"image",
			"qode_slide-video-overlay-image",
			"",
			esc_html__( "Overlay Image", 'stockholm' ),
			esc_html__( "Choose overlay image (pattern) for background video", 'stockholm' )
		);
		$qode_slide_video_overlay_container->addChild(
			"qode_slide-video-overlay-image",
			$qode_slide_video_overlay_image
		);
		
		// Slide General Meta Box Section
		
		$qodeSlideGeneral = new StockholmQodeMetaBox(
			"slides",
			esc_html__( "Select Slide General", 'stockholm' ),
			"slide-general-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"slides_layout",
			$qodeSlideGeneral
		);
		
		$qode_slide_header_style = new StockholmQodeMetaField(
			"selectblank",
			"qode_slide-header-style",
			"",
			esc_html__( "Header Style", 'stockholm' ),
			esc_html__( "Header style will be applied when this slide is in focus", 'stockholm' ),
			array(
				"light" => esc_html__( "Light", 'stockholm' ),
				"dark"  => esc_html__( "Dark", 'stockholm' )
			)
		);
		$qodeSlideGeneral->addChild(
			"qode_slide-header-style",
			$qode_slide_header_style
		);
		
		$qode_slide_navigation_color = new StockholmQodeMetaField(
			"color",
			"qode_slide-navigation-color",
			"",
			esc_html__( "Navigation Color", 'stockholm' ),
			esc_html__( "Navigation color will be applied when this slide is in focus", 'stockholm' )
		);
		$qodeSlideGeneral->addChild(
			"qode_slide-navigation-color",
			$qode_slide_navigation_color
		);
		
		$qode_slide_scroll_to_section = new StockholmQodeMetaField(
			"text",
			"qode_slide-anchor-button",
			"",
			esc_html__( "Scroll to Section", 'stockholm' ),
			esc_html__( "An arrow will appear to take viewers to the next section of the page. Enter the section anchor here, for example, '#contact'", 'stockholm' )
		);
		$qodeSlideGeneral->addChild(
			"qode_slide-anchor-button",
			$qode_slide_scroll_to_section
		);
		
		$qode_slide_hide_title = new StockholmQodeMetaField(
			"yesempty",
			"qode_slide-hide-title",
			"",
			esc_html__( "Hide Slide Title", 'stockholm' ),
			esc_html__( "Do you want to hide slide title?", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef-meta-box-slides_title",
				"dependence_show_on_yes" => ""
			)
		);
		$qodeSlideGeneral->addChild(
			"qode_slide-hide-title",
			$qode_slide_hide_title
		);
		
		$qode_slide_hide_shadow = new StockholmQodeMetaField(
			"yesempty",
			"qode_slide-hide-shadow",
			"",
			esc_html__( "Show Slide Text Shadow", 'stockholm' ),
			esc_html__( "Do you want to show text shadow?", 'stockholm' )
		);
		$qodeSlideGeneral->addChild(
			"qode_slide-hide-shadow",
			$qode_slide_hide_shadow
		);
		
		$qode_slide_content_fading_out = new StockholmQodeMetaField(
			"select",
			"qode_slide-contnet-fading-out",
			"on",
			esc_html__( "Slide Content Fading-Out", 'stockholm' ),
			esc_html__( "Disabling this option will turn off parallax effect and fading-out on scrolling.", 'stockholm' ),
			array(
				"fading_out_on"  => esc_html__( "On", 'stockholm' ),
				"fading_out_off" => esc_html__( "Off", 'stockholm' )
			)
		);
		$qodeSlideGeneral->addChild(
			"qode_slide-contnet-fading-out",
			$qode_slide_content_fading_out
		);
		
		$qode_slide_thumbnail_animation = new StockholmQodeMetaField(
			"select",
			"qode_slide-thumbnail-animation",
			"flip",
			esc_html__( "Graphic Animation", 'stockholm' ),
			esc_html__( "This is how the graphic will enter the slide", 'stockholm' ),
			array(
				"flip"              => esc_html__( "Flip", 'stockholm' ),
				"fade"              => esc_html__( "Fade", 'stockholm' ),
				"without_animation" => esc_html__( "Without Animation", 'stockholm' )
			)
		);
		$qodeSlideGeneral->addChild(
			"qode_slide-thumbnail-animation",
			$qode_slide_thumbnail_animation
		);
		
		$qode_slide_content_animation = new StockholmQodeMetaField(
			"select",
			"qode_slide-content-animation",
			"all_at_once",
			esc_html__( "Content Animation", 'stockholm' ),
			esc_html__( "This is how content (title, subtitle, text and buttons) will enter the slide", 'stockholm' ),
			array(
				"all_at_once"       => esc_html__( "All At Once", 'stockholm' ),
				"one_by_one"        => esc_html__( "One By One", 'stockholm' ),
				"without_animation" => esc_html__( "Without Animation", 'stockholm' )
			)
		);
		$qodeSlideGeneral->addChild(
			"qode_slide-content-animation",
			$qode_slide_content_animation
		);
		
		// Slide Title Meta Box Section
		
		$qodeSlideTitle = new StockholmQodeMetaBox(
			"slides",
			esc_html__( "Select Slide Title", 'stockholm' ),
			"slide-title-meta",
			"qode_slide-hide-title",
			array( "yes" )
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"slides_title",
			$qodeSlideTitle
		);
		
		$title_group = new StockholmQodeGroup(
			esc_html__( "Title Style", 'stockholm' ),
			esc_html__( "Define styles for title", 'stockholm' )
		);
		$qodeSlideTitle->addChild(
			"title_group",
			$title_group
		);
		$row1 = new StockholmQodeRow();
		$title_group->addChild(
			"row1",
			$row1
		);
		$title_color = new StockholmQodeMetaField(
			"colorsimple",
			"qode_slide-title-color",
			"",
			esc_html__( "Font Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-title-color",
			$title_color
		);
		$title_fontsize = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-title-font-size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-title-font-size",
			$title_fontsize
		);
		$title_lineheight = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-title-line-height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-title-line-height",
			$title_lineheight
		);
		$title_letterspacing = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-title-letter-spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-title-letter-spacing",
			$title_letterspacing
		);
		
		$row2 = new StockholmQodeRow( true );
		$title_group->addChild(
			"row2",
			$row2
		);
		$title_google_fonts = new StockholmQodeMetaField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"qode_slide-title-font-family",
			"",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"qode_slide-title-font-family",
			$title_google_fonts
		);
		$title_fontstyle = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_slide-title-font-style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"qode_slide-title-font-style",
			$title_fontstyle
		);
		$title_fontweight = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_slide-title-font-weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"qode_slide-title-font-weight",
			$title_fontweight
		);
		$title_texttransform = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_slide-title-text-transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"qode_slide-title-text-transform",
			$title_texttransform
		);
		
		$row3 = new StockholmQodeRow( true );
		$title_group->addChild(
			"row3",
			$row3
		);
		$title_bottom_margin = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-title-bottom-margin",
			"",
			esc_html__( "Bottom Margin", 'stockholm' ),
			""
		);
		$row3->addChild(
			"qode_slide-title-bottom-margin",
			$title_bottom_margin
		);
		$title_background_color = new StockholmQodeMetaField(
			"colorsimple",
			"qode_slide-title-background-color",
			"",
			esc_html__( "Background Color", 'stockholm' ),
			""
		);
		$row3->addChild(
			"qode_slide-title-background-color",
			$title_background_color
		);
		$title_background_opacity = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-title-background-opacity",
			"",
			esc_html__( "Background Opacity (0-1)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"qode_slide-title-background-opacity",
			$title_background_opacity
		);
		
		// Slide Subtitle Meta Box Section
		
		$qodeSlideSubtitle = new StockholmQodeMetaBox(
			"slides",
			esc_html__( "Select Slide Subtitle", 'stockholm' ),
			"slide-subtitle-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"slides_subtitle",
			$qodeSlideSubtitle
		);
		
		$qode_slide_subtitle = new StockholmQodeMetaField(
			"text",
			"qode_slide-subtitle",
			"",
			esc_html__( "Slide Subtitle", 'stockholm' ),
			esc_html__( "Enter slide subtitle", 'stockholm' )
		);
		$qodeSlideSubtitle->addChild(
			"qode_slide-subtitle",
			$qode_slide_subtitle
		);
		
		$subtitle_group = new StockholmQodeGroup(
			esc_html__( "Subtitle Style", 'stockholm' ),
			esc_html__( "Define styles for subtitle", 'stockholm' )
		);
		$qodeSlideSubtitle->addChild(
			"subtitle_group",
			$subtitle_group
		);
		$row1 = new StockholmQodeRow();
		$subtitle_group->addChild(
			"row1",
			$row1
		);
		$subtitle_color = new StockholmQodeMetaField(
			"colorsimple",
			"qode_slide-subtitle-color",
			"",
			esc_html__( "Font Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-subtitle-color",
			$subtitle_color
		);
		$subtitle_fontsize = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-subtitle-font-size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-subtitle-font-size",
			$subtitle_fontsize
		);
		$subtitle_lineheight = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-subtitle-line-height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-subtitle-line-height",
			$subtitle_lineheight
		);
		$subtitle_letterspacing = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-subtitle-letter-spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-subtitle-letter-spacing",
			$subtitle_letterspacing
		);
		
		$row2 = new StockholmQodeRow( true );
		$subtitle_group->addChild(
			"row2",
			$row2
		);
		$subtitle_google_fonts = new StockholmQodeMetaField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"qode_slide-subtitle-font-family",
			"",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"qode_slide-subtitle-font-family",
			$subtitle_google_fonts
		);
		$subtitle_fontstyle = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_slide-subtitle-font-style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"qode_slide-subtitle-font-style",
			$subtitle_fontstyle
		);
		$subtitle_fontweight = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_slide-subtitle-font-weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"qode_slide-subtitle-font-weight",
			$subtitle_fontweight
		);
		$subtitle_transform = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_slide-subtitle-text-transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"qode_slide-subtitle-text-transform",
			$subtitle_transform
		);
		
		$row3 = new StockholmQodeRow( true );
		$subtitle_group->addChild(
			"row3",
			$row3
		);
		$subtitle_bottom_margin = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-subtitle-bottom-margin",
			"",
			esc_html__( "Bottom Margin", 'stockholm' ),
			""
		);
		$row3->addChild(
			"qode_slide-subtitle-bottom-margin",
			$subtitle_bottom_margin
		);
		
		// Slide Text Meta Box Section
		
		$qodeSlideText = new StockholmQodeMetaBox(
			"slides",
			esc_html__( "Select Slide Text", 'stockholm' ),
			"slide-text-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"slides_text",
			$qodeSlideText
		);
		
		$qode_slide_text = new StockholmQodeMetaField(
			"textarea",
			"qode_slide-text",
			"",
			esc_html__( "Slide Text", 'stockholm' ),
			esc_html__( "Enter slide text", 'stockholm' )
		);
		$qodeSlideText->addChild(
			"qode_slide-text",
			$qode_slide_text
		);
		
		$text_group = new StockholmQodeGroup(
			esc_html__( "Text Style", 'stockholm' ),
			esc_html__( "Define styles for text", 'stockholm' )
		);
		$qodeSlideText->addChild(
			"title_group",
			$text_group
		);
		$row1 = new StockholmQodeRow();
		$text_group->addChild(
			"row1",
			$row1
		);
		$text_color = new StockholmQodeMetaField(
			"colorsimple",
			"qode_slide-text-color",
			"",
			esc_html__( "Font Color", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-text-color",
			$text_color
		);
		$text_fontsize = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-text-font-size",
			"",
			esc_html__( "Font Size (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-text-font-size",
			$text_fontsize
		);
		$text_lineheight = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-text-line-height",
			"",
			esc_html__( "Line Height (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-text-line-height",
			$text_lineheight
		);
		$text_letterspacing = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-text-letter-spacing",
			"",
			esc_html__( "Letter Spacing (px)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-text-letter-spacing",
			$text_letterspacing
		);
		
		$row2 = new StockholmQodeRow( true );
		$text_group->addChild(
			"row2",
			$row2
		);
		$text_google_fonts = new StockholmQodeMetaField(
			esc_html__( "Fontsimple", 'stockholm' ),
			"qode_slide-text-font-family",
			"",
			esc_html__( "Font Family", 'stockholm' ),
			""
		);
		$row2->addChild(
			"qode_slide-text-font-family",
			$text_google_fonts
		);
		$text_fontstyle = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_slide-text-font-style",
			"",
			esc_html__( "Font Style", 'stockholm' ),
			"",
			stockholm_qode_get_font_style_array()
		);
		$row2->addChild(
			"qode_slide-text-font-style",
			$text_fontstyle
		);
		$text_fontweight = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_slide-text-font-weight",
			"",
			esc_html__( "Font Weight", 'stockholm' ),
			"",
			stockholm_qode_get_font_weight_array()
		);
		$row2->addChild(
			"qode_slide-text-font-weight",
			$text_fontweight
		);
		$text_transform = new StockholmQodeMetaField(
			"selectblanksimple",
			"qode_slide-text-text-transform",
			"",
			esc_html__( "Text Transform", 'stockholm' ),
			"",
			stockholm_qode_get_text_transform_array()
		);
		$row2->addChild(
			"qode_slide-text-text-transform",
			$text_transform
		);
		
		$row3 = new StockholmQodeRow( true );
		$text_group->addChild(
			"row3",
			$row3
		);
		$text_bottom_margin = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-text-bottom-margin",
			"",
			esc_html__( "Bottom Margin", 'stockholm' ),
			""
		);
		$row3->addChild(
			"qode_slide-text-bottom-margin",
			$text_bottom_margin
		);
		
		// Slide Graphic Meta Box Section
		
		$qodeSlideGraphic = new StockholmQodeMetaBox(
			"slides",
			esc_html__( "Select Slide Graphic", 'stockholm' ),
			"slide-graphic-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"slides_graphic",
			$qodeSlideGraphic
		);
		
		$qode_slide_graphic = new StockholmQodeMetaField(
			"image",
			"qode_slide-thumbnail",
			"",
			esc_html__( "Slide Graphic", 'stockholm' ),
			esc_html__( "Choose slide graphic", 'stockholm' )
		);
		$qodeSlideGraphic->addChild(
			"qode_slide-thumbnail",
			$qode_slide_graphic
		);
		
		$qode_slide_graphic_link = new StockholmQodeMetaField(
			"text",
			"qode_slide-thumbnail-link",
			"",
			esc_html__( "Link", 'stockholm' ),
			esc_html__( "Past link for slide graphic if you want to link it", 'stockholm' )
		);
		$qodeSlideGraphic->addChild(
			"qode_slide-thumbnail-link",
			$qode_slide_graphic_link
		);
		
		// Slide Buttons Meta Box Section
		
		$qodeSlideButtons = new StockholmQodeMetaBox(
			"slides",
			esc_html__( "Select Slide Buttons", 'stockholm' ),
			"slide-button-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"slides_buttons",
			$qodeSlideButtons
		);
		
		$button1_group = new StockholmQodeGroup(
			esc_html__( "Button 1", 'stockholm' ),
			""
		);
		$qodeSlideButtons->addChild(
			"button1_group",
			$button1_group
		);
		$row1 = new StockholmQodeRow();
		$button1_group->addChild(
			"row1",
			$row1
		);
		$button1_label = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-button-label",
			"",
			esc_html__( "Label", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-button-label",
			$button1_label
		);
		$button1_link = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-button-link",
			"",
			esc_html__( "Link", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-button-link",
			$button1_link
		);
		$button1_target = new StockholmQodeMetaField(
			"selectsimple",
			"qode_slide-button-target",
			"_self",
			esc_html__( "Target", 'stockholm' ),
			"",
			stockholm_qode_get_link_target_array()
		);
		$row1->addChild(
			"qode_slide-button-target",
			$button1_target
		);
		
		$button2_group = new StockholmQodeGroup(
			esc_html__( "Button 2", 'stockholm' ),
			""
		);
		$qodeSlideButtons->addChild(
			"button2_group",
			$button2_group
		);
		$row1 = new StockholmQodeRow();
		$button2_group->addChild(
			"row1",
			$row1
		);
		$button2_label = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-button-label2",
			"",
			esc_html__( "Label", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-button-label2",
			$button2_label
		);
		$button2_link = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-button-link2",
			"",
			esc_html__( "Link", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-button-link2",
			$button2_link
		);
		$button2_target = new StockholmQodeMetaField(
			"selectsimple",
			"qode_slide-button-target2",
			"_self",
			esc_html__( "Target", 'stockholm' ),
			"",
			stockholm_qode_get_link_target_array()
		);
		$row1->addChild(
			"qode_slide-button-target2",
			$button2_target
		);
		
		// Slide Content Meta Box Section
		
		$qodeSlideContentPositioning = new StockholmQodeMetaBox(
			"slides",
			esc_html__( "Select Slide Content Positioning", 'stockholm' ),
			"slide-positioning-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"slides_content_positioning",
			$qodeSlideContentPositioning
		);
		
		$qode_slide_graphic_alignment = new StockholmQodeMetaField(
			"selectblank",
			"qode_slide-graphic-alignment",
			"",
			esc_html__( "Graphic Alignment", 'stockholm' ),
			esc_html__( "Choose an alignment for the slide graphic", 'stockholm' ),
			array(
				"left"   => esc_html__( "Left", 'stockholm' ),
				"center" => esc_html__( "Center", 'stockholm' ),
				"right"  => esc_html__( "Right", 'stockholm' )
			)
		);
		$qodeSlideContentPositioning->addChild(
			"qode_slide-graphic-alignment",
			$qode_slide_graphic_alignment
		);
		
		$qode_slide_text_alignment = new StockholmQodeMetaField(
			"selectblank",
			"qode_slide-content-alignment",
			"",
			esc_html__( "Text Alignment", 'stockholm' ),
			esc_html__( "Choose an alignment for the slide text", 'stockholm' ),
			array(
				"left"   => esc_html__( "Left", 'stockholm' ),
				"center" => esc_html__( "Center", 'stockholm' ),
				"right"  => esc_html__( "Right", 'stockholm' )
			)
		);
		$qodeSlideContentPositioning->addChild(
			"qode_slide-content-alignment",
			$qode_slide_text_alignment
		);
		
		$qode_slide_vertical_alignment = new StockholmQodeMetaField(
			"yesno",
			"qode_slide-vertical-alignment",
			"no",
			esc_html__( "Vertical alignment", 'stockholm' ),
			esc_html__( "Do you want to vertically center content?", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_qode_slide-vertical-alignment_container",
				"dependence_show_on_yes" => ""
			)
		);
		$qodeSlideContentPositioning->addChild(
			"qode_slide-vertical-alignment",
			$qode_slide_vertical_alignment
		);
		
		$qode_slide_vertical_alignment_container = new StockholmQodeContainer(
			"qode_slide-vertical-alignment_container",
			"qode_slide-vertical-alignment",
			"yes"
		);
		$qodeSlideContentPositioning->addChild(
			"qode_slide-vertical-alignment_container",
			$qode_slide_vertical_alignment_container
		);
		
		$qode_slide_separate_text_graphic = new StockholmQodeMetaField(
			"selectblank",
			"qode_slide-separate-text-graphic",
			"no",
			esc_html__( "Separate Graphic and Text Positioning", 'stockholm' ),
			esc_html__( "Do you want to separately position graphic and text?", 'stockholm' ),
			array(
				"no"  => esc_html__( "No", 'stockholm' ),
				"yes" => esc_html__( "Yes", 'stockholm' )
			),
			array(
				"dependence" => true,
				"hide"       => array(
					""   => "#qodef_qode_slide_graphic_positioning_container",
					"no" => "#qodef_qode_slide_graphic_positioning_container"
				),
				"show"       => array(
					"yes" => "#qodef_qode_slide_graphic_positioning_container"
				)
			)
		);
		$qode_slide_vertical_alignment_container->addChild(
			"qode_slide-separate-text-graphic",
			$qode_slide_separate_text_graphic
		);
		
		$qode_slide_bottom_right_alignment = new StockholmQodeMetaField(
			"yesno",
			"qode_slide-bottom-right-alignment",
			"no",
			esc_html__( "Set Content To Bottom Right", 'stockholm' ),
			esc_html__( "Enabling this option you will set content position to the bottom right corner.", 'stockholm' )
		);
		$qode_slide_vertical_alignment_container->addChild(
			"qode_slide-bottom-right-alignment",
			$qode_slide_bottom_right_alignment
		);
		
		$content_positioning_group = new StockholmQodeGroup(
			esc_html__( "Content Positioning", 'stockholm' ),
			esc_html__( "Positioning for slide title, subtitle, text and buttons (and graphic if positioning is not separated) ", 'stockholm' )
		);
		$qode_slide_vertical_alignment_container->addChild(
			"content_positioning_group",
			$content_positioning_group
		);
		$row1 = new StockholmQodeRow();
		$content_positioning_group->addChild(
			"row1",
			$row1
		);
		$qode_slide_content_width = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-content-width",
			"",
			esc_html__( "Width (%)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-content-width",
			$qode_slide_content_width
		);
		
		$row2 = new StockholmQodeRow( true );
		$content_positioning_group->addChild(
			"row2",
			$row2
		);
		$qode_slide_content_top = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-content-top",
			"",
			esc_html__( "Content from top (%)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"qode_slide-content-top",
			$qode_slide_content_top
		);
		$qode_slide_content_left = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-content-left",
			"",
			esc_html__( "Content from left (%)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"qode_slide-content-left",
			$qode_slide_content_left
		);
		
		$row3 = new StockholmQodeRow( true );
		$content_positioning_group->addChild(
			"row3",
			$row3
		);
		$qode_slide_content_bottom = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-content-bottom",
			"",
			esc_html__( "Content from bototm (%)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"qode_slide-content-bottom",
			$qode_slide_content_bottom
		);
		$qode_slide_content_right = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-content-right",
			"",
			esc_html__( "Content from right (%)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"qode_slide-content-right",
			$qode_slide_content_right
		);
		
		$qode_slide_graphic_positioning_container = new StockholmQodeContainer(
			"qode_slide_graphic_positioning_container",
			"qode_slide-separate-text-graphic",
			"no"
		);
		$qode_slide_vertical_alignment_container->addChild(
			"qode_slide_graphic_positioning_container",
			$qode_slide_graphic_positioning_container
		);
		
		$graphic_positioning_group = new StockholmQodeGroup(
			esc_html__( "Graphic Positioning", 'stockholm' ),
			esc_html__( "Positioning for slide graphic", 'stockholm' )
		);
		$qode_slide_graphic_positioning_container->addChild(
			"graphic_positioning_group",
			$graphic_positioning_group
		);
		$row1 = new StockholmQodeRow();
		$graphic_positioning_group->addChild(
			"row1",
			$row1
		);
		$qode_slide_content_width = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-graphic-width",
			"",
			esc_html__( "Width (%)", 'stockholm' ),
			""
		);
		$row1->addChild(
			"qode_slide-graphic-width",
			$qode_slide_content_width
		);
		
		$row2 = new StockholmQodeRow( true );
		$graphic_positioning_group->addChild(
			"row2",
			$row2
		);
		$qode_slide_content_top = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-graphic-top",
			"",
			esc_html__( "Content from top (%)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"qode_slide-graphic-top",
			$qode_slide_content_top
		);
		$qode_slide_content_left = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-graphic-left",
			"",
			esc_html__( "Content from left (%)", 'stockholm' ),
			""
		);
		$row2->addChild(
			"qode_slide-graphic-left",
			$qode_slide_content_left
		);
		
		$row3 = new StockholmQodeRow( true );
		$graphic_positioning_group->addChild(
			"row3",
			$row3
		);
		$qode_slide_content_bottom = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-graphic-bottom",
			"",
			esc_html__( "Content from bototm (%)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"qode_slide-graphic-bottom",
			$qode_slide_content_bottom
		);
		$qode_slide_content_right = new StockholmQodeMetaField(
			"textsimple",
			"qode_slide-graphic-right",
			"",
			esc_html__( "Content from right (%)", 'stockholm' ),
			""
		);
		$row3->addChild(
			"qode_slide-graphic-right",
			$qode_slide_content_right
		);
		
		$qode_slide_content_background = new StockholmQodeMetaField(
			"color",
			"qode_slide-content-background-color",
			"",
			esc_html__( "Slide Content Background Color", 'stockholm' ),
			""
		);
		$qode_slide_vertical_alignment_container->addChild(
			"qode_slide-content-background-color",
			$qode_slide_content_background
		);
		
		$qode_slide_content_padding = new StockholmQodeMetaField(
			"text",
			"qode_slide-content-text-padding",
			"",
			esc_html__( "Slide Content Text Padding", 'stockholm' ),
			esc_html__( "Define some padding around text (top right bottom left) - Default value is 0px 0px 0px 0px", 'stockholm' )
		);
		$qode_slide_vertical_alignment_container->addChild(
			"qode_slide-content-text-padding",
			$qode_slide_content_padding
		);
	}
	
	add_action( 'stockholm_qode_action_meta_boxes_map', 'stockholm_qode_map_slides_meta_fields', 30 );
}