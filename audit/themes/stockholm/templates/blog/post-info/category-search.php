<?php
$category = get_the_category( get_the_ID() );

if ( ! empty( $category ) ) {
	get_template_part( 'templates/blog/post-info/category' );
}