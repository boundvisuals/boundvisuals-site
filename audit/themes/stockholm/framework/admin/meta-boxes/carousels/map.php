<?php

if ( ! function_exists( 'stockholm_qode_map_carousel_meta_fields' ) ) {
	function stockholm_qode_map_carousel_meta_fields() {
		
		// Carousel General Meta Box Section
		
		$qodeCarousels = new StockholmQodeMetaBox(
			"carousels",
			esc_html__( "Select Carousels", 'stockholm' ),
			"carousel-meta"
		);
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"carousels",
			$qodeCarousels
		);
		
		$qode_carousel_image = new StockholmQodeMetaField(
			"image",
			"qode_carousel-image",
			"",
			esc_html__( "Carousel Image", 'stockholm' ),
			esc_html__( "Choose carousel image (min width needs to be 220px)", 'stockholm' )
		);
		$qodeCarousels->addChild(
			"qode_carousel-image",
			$qode_carousel_image
		);
		
		$qode_carousel_hover_image = new StockholmQodeMetaField(
			"image",
			"qode_carousel-hover-image",
			"",
			esc_html__( "Carousel Hover Image", 'stockholm' ),
			esc_html__( "Choose carousel hover image (min width needs to be 220px)", 'stockholm' )
		);
		$qodeCarousels->addChild(
			"qode_carousel-hover-image",
			$qode_carousel_hover_image
		);
		
		$qode_carousel_item_link = new StockholmQodeMetaField(
			"text",
			"qode_carousel-item-link",
			"",
			esc_html__( "Link", 'stockholm' ),
			esc_html__( "Enter the URL to which you want the image to link to (e.g. http://www.example.com)", 'stockholm' )
		);
		$qodeCarousels->addChild(
			"qode_carousel-item-link",
			$qode_carousel_item_link
		);
		
		$qode_carousel_item_target = new StockholmQodeMetaField(
			"selectblank",
			"qode_carousel-item-target",
			"",
			esc_html__( "Target", 'stockholm' ),
			esc_html__( "Specify where to open the linked document", 'stockholm' ),
			stockholm_qode_get_link_target_array()
		);
		$qodeCarousels->addChild(
			"qode_carousel-item-target",
			$qode_carousel_item_target
		);
	}
	
	add_action( 'stockholm_qode_action_meta_boxes_map', 'stockholm_qode_map_carousel_meta_fields', 60 );
}