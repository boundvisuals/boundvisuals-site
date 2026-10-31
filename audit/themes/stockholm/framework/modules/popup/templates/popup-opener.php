<?php if ( stockholm_qode_is_popup_enabled() ) { ?>
    <?php
    $popup_menu_opener_classes = array(
        'popup_menu',
        esc_attr( stockholm_qode_get_header_button_size() )
    );

    $opener_type = stockholm_qode_options()->getOptionValue('popup_menu_opener');

    if( ! empty( $opener_type ) ){
        $popup_menu_opener_classes[] = 'qode-popup-menu-' . $opener_type;
    }

    ?>
	<a href="javascript:void(0)" class="<?php echo implode(' ', $popup_menu_opener_classes)?>">
        <?php if( ! empty( $opener_type ) && $opener_type == 'svg-path' ){
            $svg_opener = stockholm_qode_options()->getOptionValue('popup_menu_icon_svg_opener');
            $svg_closer = stockholm_qode_options()->getOptionValue('popup_menu_icon_svg_closer');
        ?>
            <span class="qode-popup-menu-opener-inner">
                <span class="qode-popup-svg-holder qode-popup-svg-opener">
                    <?php echo stockholm_qode_get_module_part( $svg_opener ); ?>
                </span>
                <span class="qode-popup-svg-holder qode-popup-svg-closer">
                    <?php echo stockholm_qode_get_module_part( $svg_closer ); ?>
                </span>
            </span>
        <?php } else { ?>
		    <span class="popup_menu_inner"><i class="line">&nbsp;</i></span>
        <?php } ?>
	</a>
<?php } ?>