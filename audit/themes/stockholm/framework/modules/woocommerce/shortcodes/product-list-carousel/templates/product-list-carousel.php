<div class="qode-plc-holder <?php echo esc_attr($holder_classes) ?>">
	<div class="qode-plc-outer qode-owl-slider" <?php echo stockholm_qode_get_inline_attrs($holder_data); ?>>
		<?php if($query_result->have_posts()): while ($query_result->have_posts()) : $query_result->the_post();
			echo stockholm_qode_get_woo_shortcode_module_template_part('templates/parts/'.$params['info_position'], 'product-list-carousel', '', $params);
		endwhile;	else:
			stockholm_qode_get_module_template_part('templates/parts/no-posts', 'woocommerce', '', $params);
		endif;
			wp_reset_postdata();
		?>
	</div>
</div>