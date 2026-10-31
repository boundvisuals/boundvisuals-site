<?php

if ( ! function_exists( 'stockholm_qode_map_testimonials_meta_fields' ) ) {
	function stockholm_qode_map_testimonials_meta_fields() {
		
		$qodeTestimonials = new StockholmQodeMetaBox(
			"testimonials",
			esc_html__( "Select Testimonials", 'stockholm' ),
			"testimonials-meta"
		);
		
		stockholm_qode_framework()->qodeMetaBoxes->addMetaBox(
			"testimonials",
			$qodeTestimonials
		);
		
		$qode_testimonial_author = new StockholmQodeMetaField(
			"text",
			"qode_testimonial-author",
			"",
			esc_html__( "Author", 'stockholm' ),
			esc_html__( "Enter the author name", 'stockholm' )
		);
		
		$qodeTestimonials->addChild(
			"qode_testimonial-author",
			$qode_testimonial_author
		);
		
		$qode_testimonial_job = new StockholmQodeMetaField(
			"text",
			"qode_testimonial-job",
			"",
			esc_html__( "Job Position", 'stockholm' ),
			esc_html__( "Enter the author job position", 'stockholm' )
		);
		
		$qodeTestimonials->addChild(
			"qode_testimonial-job",
			$qode_testimonial_job
		);
		
		$qode_testimonial_text = new StockholmQodeMetaField(
			"textarea",
			"qode_testimonial-text",
			"",
			esc_html__( "Text", 'stockholm' ),
			esc_html__( "Enter the testimonial text", 'stockholm' )
		);
		
		$qodeTestimonials->addChild(
			"qode_testimonial-text",
			$qode_testimonial_text
		);
	}
	
	add_action( 'stockholm_qode_action_meta_boxes_map', 'stockholm_qode_map_testimonials_meta_fields', 50 );
}