<?php
$filtered_content = '';
$post_content     = get_the_content();
preg_match( '/\[gallery.*ids=.(.*).\]/', $post_content, $ids );

if ( ! empty( $ids ) ) {
	$content          = str_replace( $ids[0], "", $post_content );
	$filtered_content = apply_filters( 'the_content', $content );
}

if ( ! empty( $filtered_content ) ) {
	echo do_shortcode( $filtered_content );
} else {
	the_content();
}