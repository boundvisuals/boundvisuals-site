<?php

if ( ! stockholm_qode_wp_link_pages_exist() ) {
	stockholm_qode_excerpt();
} else {
	
	if ( ! post_password_required() ) {
		the_content( '<span>' . esc_html__( 'Read More', 'stockholm' ) . '</span>' );
	}
	
	stockholm_qode_wp_link_pages();
}