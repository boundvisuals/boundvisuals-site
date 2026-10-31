<?php

/*************** YITH WISHLIST FILTERS - begin ***************/

//Add yith wishlist button
add_action( 'stockholm_qode_action_woocommerce_additional_info', 'stockholm_qode_woocommerce_wishlist_shortcode', 2 );

//Remove quick view button from wishlist
remove_all_actions( 'yith_wcwl_table_after_product_name' );


/*************** YITH WISHLIST FILTERS - end ***************/