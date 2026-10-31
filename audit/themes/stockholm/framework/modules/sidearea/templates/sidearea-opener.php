<?php if ( stockholm_qode_is_sidearea_enabled() && ! stockholm_qode_is_popup_enabled() ) { ?>
	<a class="side_menu_button_link <?php echo esc_attr( stockholm_qode_get_header_button_size() ); ?>" href="#">
		<?php stockholm_qode_sidearea_opener_icon(); ?>
	</a>
<?php } ?>