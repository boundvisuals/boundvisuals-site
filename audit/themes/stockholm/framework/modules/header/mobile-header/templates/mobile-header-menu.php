<nav class="mobile_menu">
	<?php if(has_nav_menu('mobile-navigation')) {
        wp_nav_menu(array('theme_location' => 'mobile-navigation',
            'container' => '',
            'container_class' => '',
            'menu_class' => '',
            'menu_id' => '',
            'fallback_cb' => 'stokcholm_qode_top_navigation_fallback',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'walker' => new stockholm_qode_type2_walker_nav_menu()
        ));
    } else { ?>
		<?php if (stockholm_qode_get_header_bottom_appearance() == "stick_with_left_right_menu") {
			echo '<ul>';
			wp_nav_menu(array(
				'theme_location' => 'left-top-navigation',
				'container' => '',
				'container_class' => '',
				'menu_class' => '',
				'menu_id' => '',
				'fallback_cb' => '',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'walker' => new stockholm_qode_type4_walker_nav_menu(),
				'items_wrap' => '%3$s'
			));
			wp_nav_menu(array(
				'theme_location' => 'right-top-navigation',
				'container' => '',
				'container_class' => '',
				'menu_class' => '',
				'menu_id' => '',
				'fallback_cb' => '',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'walker' => new stockholm_qode_type4_walker_nav_menu(),
				'items_wrap' => '%3$s'
			));
			echo '</ul>';
		} else {
			wp_nav_menu(array(
				'theme_location' => 'top-navigation',
				'container' => '',
				'container_class' => '',
				'menu_class' => '',
				'menu_id' => '',
				'fallback_cb' => 'stokcholm_qode_top_navigation_fallback',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'walker' => new stockholm_qode_type2_walker_nav_menu()
			));
		}
	}
	?>
</nav>