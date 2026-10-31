<?php

if ( ! function_exists( 'stockholm_qode_is_popup_enabled' ) ) {
	function stockholm_qode_is_popup_enabled() {
		return stockholm_qode_options()->getOptionValue( 'enable_popup_menu' ) == 'yes' && has_nav_menu( 'popup-navigation' );
	}
}

if ( ! function_exists( 'stockholm_qode_include_popup_area' ) ) {
	function stockholm_qode_include_popup_area() {
		
		if ( stockholm_qode_is_popup_enabled()) {
			get_template_part( 'framework/modules/popup/templates/popup-menu' );
		}
	}
	
	add_action( 'stockholm_qode_action_before_page_header', 'stockholm_qode_include_popup_area' );
}

if ( ! function_exists( 'stockholm_qode_add_popup_logo_image' ) ) {
	function stockholm_qode_add_popup_logo_image() {
		
		if ( stockholm_qode_is_popup_enabled() ) {
			$logo_image_popup = get_template_directory_uri() . '/img/logo_white.png';
			
			if ( stockholm_qode_options()->getOptionValue( 'logo_image_popup' ) ) {
				$logo_image_popup = stockholm_qode_options()->getOptionValue( 'logo_image_popup' );
			}
			?>
			<img class="popup" src="<?php echo esc_url( $logo_image_popup ); ?>" alt="<?php esc_attr_e( 'Logo', 'stockholm' ); ?>"/>
		<?php }
	}
	
	add_action( 'stockholm_qode_action_additional_logo_image', 'stockholm_qode_add_popup_logo_image' );
}

if ( ! function_exists( 'stockholm_qode_include_popup_subscribe_area' ) ) {
	function stockholm_qode_include_popup_subscribe_area() {

		if ( stockholm_qode_active_widget( false, false, 'qode_popup_opener' ) && stockholm_qode_options()->getOptionValue( 'enable_popup' ) == 'yes' ) {
			$params                       = array();
			$params['title']              = stockholm_qode_options()->getOptionValue( 'popup_title' );
			$params['subtitle']           = stockholm_qode_options()->getOptionValue( 'popup_subtitle' );
			$params['contact_form']       = stockholm_qode_options()->getOptionValue( 'popup_contact_form' );
			$params['contact_form_style'] = stockholm_qode_options()->getOptionValue( 'popup_contact_form_style' );
			
			stockholm_qode_get_module_template_part( 'templates/popup', 'popup', '', $params );
		}
	}
	
	add_action( 'stockholm_qode_action_before_page_header', 'stockholm_qode_include_popup_subscribe_area' );
}