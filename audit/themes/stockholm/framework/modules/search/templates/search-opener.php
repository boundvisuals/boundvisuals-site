<?php if ( stockholm_qode_is_search_enabled() ) { ?>
	<a class="search_button <?php echo esc_attr( stockholm_qode_get_search_type() ); ?>" href="javascript:void(0)">
		<?php stockholm_qode_search_opener_icon(); ?>
	</a>
<?php } ?>