<?php

$text_wrapper_class = '';
if($display_price == 'no' && $display_rating == 'no'){
    $text_wrapper_class .= 'qode-no-rating-price';
}
?>
<div class="qode-plc-item">
	<div class="qode-plc-item-inner">
		<div class="qode-plc-image">
			<?php stockholm_qode_get_module_template_part('templates/parts/image', 'woocommerce', '', $params); ?>
		</div>
		<?php stockholm_qode_get_module_template_part('templates/parts/add-to-cart', 'woocommerce', 'button-on-image', $params); ?>
		<div class="qode-plc-text">
			<div class="qode-plc-text-outer">
				<div class="qode-plc-text-inner">
					<div class="qode-plc-additional-info">
                        <?php do_action('stockholm_qode_action_woocommerce_additional_info'); ?>
                    </div>
				</div>
			</div>
		</div>
		<a class="qode-plc-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
	<div class="qode-plc-text-wrapper <?php echo esc_html($text_wrapper_class); ?>">

		<?php stockholm_qode_get_module_template_part('templates/parts/category', 'woocommerce', '', $params); ?>

        <?php stockholm_qode_get_module_template_part('templates/parts/title', 'woocommerce', '', $params); ?>

		<?php stockholm_qode_get_module_template_part('templates/parts/excerpt', 'woocommerce', '', $params); ?>

		<?php stockholm_qode_get_module_template_part('templates/parts/rating', 'woocommerce', '', $params); ?>

		<?php stockholm_qode_get_module_template_part('templates/parts/price', 'woocommerce', '', $params); ?>


	</div>
</div>