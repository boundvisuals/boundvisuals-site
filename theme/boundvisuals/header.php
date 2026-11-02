<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#0b0c0c">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip" href="#main">Skip to content</a>
<header class="site-header" id="top">
	<a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Bound Visuals, home"><?php echo bv_logo('light'); ?></a>
	<nav class="main-nav" aria-label="Main">
		<?php
		if (has_nav_menu('primary')) {
			wp_nav_menu(['theme_location' => 'primary', 'container' => false, 'menu_class' => 'menu', 'depth' => 1]);
		} else {
			echo '<ul class="menu"><li class="' . (is_front_page() || is_singular(BV_PT) ? 'current-menu-item' : '') . '"><a href="' . esc_url(home_url('/')) . '">Work</a></li><li class="' . (is_page('info') ? 'current-menu-item' : '') . '"><a href="' . esc_url(home_url('/info/')) . '">Info</a></li></ul>';
		}
		?>
	</nav>
	<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="mobile-nav">Menu</button>
</header>
<div class="mobile-nav" id="mobile-nav" hidden>
	<?php
	if (has_nav_menu('primary')) {
		wp_nav_menu(['theme_location' => 'primary', 'container' => false, 'menu_class' => 'menu', 'depth' => 1]);
	} else {
		echo '<ul class="menu"><li><a href="' . esc_url(home_url('/')) . '">Work</a></li><li><a href="' . esc_url(home_url('/info/')) . '">Info</a></li></ul>';
	}
	?>
</div>
<main id="main">
