<?php
//$qode_toolbar = true;

if ( isset( $qode_toolbar ) ):
	add_action( 'after_setup_theme', 'stockholm_qode_toolbar_section_start', 1 );
	add_action( 'wp_logout', 'stockholm_qode_toolbar_section_end' );
	add_action( 'wp_login', 'stockholm_qode_toolbar_section_end' );
	
	/* Start session */
	if ( ! function_exists( 'stockholm_qode_toolbar_section_start' ) ) {
		function stockholm_qode_toolbar_section_start() {
			if ( ! session_id() ) {
				session_start();
			}
			
			if ( ! empty( $_GET['animation'] ) ) {
				$_SESSION['qode_animation'] = $_GET['animation'];
			}
			
			if ( isset( $_SESSION['qode_animation'] ) && $_SESSION['qode_animation'] == "off" ) {
				$_SESSION['qode_animation'] = "";
			}
		}
	}
	
	/* End session */
	
	if ( ! function_exists( 'stockholm_qode_toolbar_section_end' ) ) {
		function stockholm_qode_toolbar_section_end() {
			session_destroy();
		}
	}

endif;