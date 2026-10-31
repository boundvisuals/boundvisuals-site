<?php if ( $show_ordering_filter == 'yes' ) { ?>
	<div class="qode-pl-ordering-outer">
		<p><?php esc_html_e( 'Filter', 'stockholm' ); ?></p>
		<div class="qode-pl-ordering">
			<div>
				<h5><?php esc_html_e( 'Sort By', 'stockholm' ); ?></h5>
				<ul>
					<?php echo stockholm_qode_get_module_part( $ordering_filter_list ); ?>
				</ul>
			</div>
			<div>
				<h5><?php esc_html_e( 'Price Range', 'stockholm' ); ?></h5>
				<ul class="qode-pl-ordering-price">
					<?php echo stockholm_qode_get_module_part( $pricing_filter_list ); ?>
				</ul>
			</div>
		</div>
	</div>
<?php } ?>