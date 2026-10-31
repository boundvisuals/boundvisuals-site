<div class="column_inner">
	<aside class="sidebar <?php echo esc_attr( stockholm_qode_get_sidebar_area_classes() ); ?>">
		<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( stockholm_qode_get_sidebar_name() ) ) : endif; ?>
	</aside>
</div>