<div class="qode-elegant-pl-holder <?php echo esc_attr($holder_classes) ?>" <?php echo wp_kses($holder_data, array('data')); ?>>
	<?php if($query_result->have_posts()){ ?>
        <?php echo stockholm_qode_get_woo_shortcode_module_template_part('templates/parts/categories-filter', 'product-list', '', $params); ?>
        <?php echo stockholm_qode_get_woo_shortcode_module_template_part('templates/parts/ordering-filter', 'product-list', '', $params); ?>
        <div class="qode-prl-loading">
            <span class="qode-prl-loading-msg"><?php esc_html_e('Loading...', 'stockholm') ?></span>
        </div>
        <div class="qode-pl-outer">
            <?php while ($query_result->have_posts()) : $query_result->the_post();
                echo stockholm_qode_get_woo_shortcode_module_template_part('templates/parts/'.$params['info_position'], 'product-list', '', $params);
            endwhile;
            ?>
        </div>
    <?php }else {
        stockholm_qode_get_module_template_part('templates/parts/no-posts', 'woocommerce', '', $params);
    }
    wp_reset_postdata();
	
	$qodef_unique_id = rand( 1000, 9999 );
	wp_nonce_field( 'qodef_product_load_more_nonce_' . $qodef_unique_id, 'qodef_product_load_more_nonce_' . $qodef_unique_id );
	?>
</div>