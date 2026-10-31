<?php

$text_wrapper_class = '';
if($display_price == 'no' && $display_rating == 'no'){
    $text_wrapper_class .= 'qode-no-rating-price';
}
?>
<div class="qode-pli">
	<div class="qode-pli-inner">
		<div class="qode-pli-image">
			<?php stockholm_qode_get_module_template_part('templates/parts/image', 'woocommerce', '', $params); ?>
		</div>
		<div class="qode-pli-text">
			<div class="qode-pli-text-outer">
				<div class="qode-pli-text-inner">
					<div class="qode-pli-additional-info">
                        <?php do_action('stockholm_qode_action_woocommerce_additional_info'); ?>
                    </div>
				</div>
			</div>
		</div>
		<a class="qode-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
	<div class="qode-pli-text-wrapper <?php echo esc_html($text_wrapper_class); ?>" <?php stockholm_qode_inline_style($text_wrapper_styles); ?>>

		<?php stockholm_qode_get_module_template_part('templates/parts/category', 'woocommerce', '', $params); ?>

        <?php stockholm_qode_get_module_template_part('templates/parts/title', 'woocommerce', '', $params); ?>

		<?php stockholm_qode_get_module_template_part('templates/parts/excerpt', 'woocommerce', '', $params); ?>
		
		<?php stockholm_qode_get_module_template_part('templates/parts/rating', 'woocommerce', '', $params); ?>
		
		<?php stockholm_qode_get_module_template_part('templates/parts/price', 'woocommerce', '', $params); ?>

		<?php stockholm_qode_get_module_template_part('templates/parts/add-to-cart', 'woocommerce', '', $params); ?>
	</div>
</div>