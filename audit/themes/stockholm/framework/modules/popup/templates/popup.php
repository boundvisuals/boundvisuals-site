<div class="qode-popup-holder">
	<div class="qode-popup-shader"></div>
	<div class="qode-popup-table">
		<div class="qode-popup-table-cell">
			<div class="qode-popup-inner">
				<a class="qode-popup-close" href="javascript:void(0)">
					<span class="icon_close"></span>
				</a>
				<div class="qode-popup-content-container">
					<?php if ( ! empty( $title ) ) { ?>
						<div class="qode-popup-title-holder">
							<h2 class="qode-popup-title"><?php echo wp_kses_post( $title ); ?></h2>
						</div>
					<?php } ?>
					<?php if ( ! empty( $subtitle ) ) { ?>
						<div class="qode-popup-subtitle">
							<?php echo wp_kses_post( $subtitle ); ?>
						</div>
					<?php } ?>
					<?php if( ! empty( $contact_form ) ) {
						echo do_shortcode( '[contact-form-7 id="' . esc_attr( $contact_form ) . '" html_class="' . esc_attr( $contact_form_style ) . '"]' );
					} ?>
				</div>
			</div>
		</div>
	</div>
</div>