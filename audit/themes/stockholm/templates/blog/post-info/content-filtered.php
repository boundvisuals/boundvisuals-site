<?php

if ( ! stockholm_qode_wp_link_pages_exist() ) {
	stockholm_qode_excerpt();
} else {
	$post_content = get_the_content();
	preg_match( '/\[gallery.*ids=.(.*).\]/', $post_content, $ids );
	
	if ( ! empty( $ids ) ) {
		$content          = str_replace( $ids[0], "", $post_content );
		$filtered_content = apply_filters( 'the_content', $content );
	} else {
		$filtered_content = $post_content;
	}
	
	if ( ! post_password_required() ) {
		echo do_shortcode( $filtered_content );
	}
	
	stockholm_qode_wp_link_pages();
}