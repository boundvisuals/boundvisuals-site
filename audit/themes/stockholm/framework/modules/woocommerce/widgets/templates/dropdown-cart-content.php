
<a class="header_cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
    <?php echo stockholm_qode_get_woo_dropdown_cart_icon(); ?>
    <?php echo stockholm_qode_get_woo_dropdown_cart_product_number(); ?>
</a>
<?php if ( is_object( WC()->cart ) ) { ?>
<div class="shopping_cart_dropdown">
    <div class="shopping_cart_dropdown_inner">
        <ul class="woocommerce-mini-cart cart_list product_list_widget">
            <?php if ( ! WC()->cart->is_empty() ) :
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                    $_product = $cart_item['data'];

                    // Only display if allowed
                    if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
                        continue;
                    }

                    // Get price
                    $product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
                    $product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
                    ?>
                    <li>
                        <?php
                        echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                            '<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                            esc_html__( 'Remove this item', 'stockholm' ),
                            esc_attr( $cart_item['product_id'] ),
                            esc_attr( $cart_item_key ),
                            esc_attr( $_product->get_sku() )
                        ), $cart_item_key );
                        ?>
                        <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
                            <?php echo stockholm_qode_get_module_part($_product->get_image()); ?>
                            <?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
                        </a>
                        <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>

                        <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li><?php esc_html_e( 'No products in the cart.', 'stockholm' ); ?></li>
            <?php endif; ?>
        </ul>
    </div>
    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="qbutton dark small view-cart"><?php esc_html_e( 'Cart', 'stockholm' ); ?></a>
    <span class="total"><?php esc_html_e( 'Total:', 'stockholm' ); ?><span><?php wc_cart_totals_subtotal_html(); ?></span></span>
</div>
<?php } ?>
