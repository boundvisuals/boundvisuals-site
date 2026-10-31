<div class="popup_menu_holder_outer">
	<div class="popup_menu_holder">
		<div class="popup_menu_holder_inner">
			<nav class="popup_menu">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'popup-navigation',
					'container'       => '',
					'container_class' => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'fallback_cb'     => 'stokcholm_qode_top_navigation_fallback',
					'link_before'     => '<span>',
					'link_after'      => '</span>',
					'walker'          => new stockholm_qode_type3_walker_nav_menu()
				) );
				?>
			</nav>
		</div>
	</div>
</div>