<?php

if ( ! function_exists( 'stockholm_qode_include_preloader' ) ) {
	function stockholm_qode_include_preloader() {
		$loading_animation = true;
		if ( stockholm_qode_options()->getOptionValue( 'loading_animation' ) == "off" ) {
			$loading_animation = false;
		}
		
		$loading_image = "";
		if ( stockholm_qode_options()->getOptionValue( 'loading_image' ) ) {
			$loading_image = stockholm_qode_options()->getOptionValue( 'loading_image' );
		}
		
		if ( $loading_animation ) { ?>
			<div class="ajax_loader">
				<div class="ajax_loader_1">
					<?php if ( ! empty( $loading_image ) ) { ?>
						<div class="ajax_loader_2"><img src="<?php echo esc_url( $loading_image ); ?>" alt="<?php esc_attr_e( 'Preloader image', 'stockholm' ); ?>"/></div>
					<?php } else {
						stockholm_qode_loading_spinners();
					} ?>
				</div>
			</div>
		<?php }
	}
	
	add_action( 'stockholm_qode_action_before_page_wrapper', 'stockholm_qode_include_preloader' );
}