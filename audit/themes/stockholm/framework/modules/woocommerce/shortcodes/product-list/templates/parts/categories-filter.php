<?php if ( $show_category_filter == 'yes' ) { ?>
	<div class="qode-pl-categories">
		<h6 class="qode-pl-categories-label"><?php esc_html_e( 'Categories', 'stockholm' ); ?></h6>
		<ul>
			<?php echo stockholm_qode_get_module_part( $categories_filter_list ); ?>
		</ul>
	</div>
<?php } ?>