<?php
/**
 * Bound Visuals theme bootstrap.
 */
defined('ABSPATH') || exit;

define('BV_VER', '1.0.1');
define('BV_URI', get_template_directory_uri());
define('BV_DIR', get_template_directory());

require BV_DIR . '/inc/content.php';
require BV_DIR . '/inc/seo.php';
require BV_DIR . '/inc/customizer.php';

add_action('after_setup_theme', function () {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
	register_nav_menus(['primary' => 'Main menu', 'footer' => 'Footer (legal)']);
	add_image_size('bv-grid', 800, 0, false);
	add_image_size('bv-grid-2x', 1600, 0, false);
	add_image_size('bv-wide', 2400, 0, false);
});

// Never let WordPress recompress or downscale uploads: originals stay byte-identical.
add_filter('jpeg_quality', fn() => 100);
add_filter('wp_editor_set_quality', fn() => 100);
add_filter('big_image_size_threshold', '__return_false');

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('bv-main', BV_URI . '/assets/main.css', [], BV_VER);
	wp_enqueue_script('bv-main', BV_URI . '/assets/main.js', [], BV_VER, ['strategy' => 'defer', 'in_footer' => true]);

	// Front end does not need builder / icon-font / slider assets from old plugins.
	$builder_page = is_page() && !is_front_page() && get_post_meta(get_queried_object_id(), '_elementor_edit_mode', true) === 'builder';
	if (!is_admin() && !$builder_page) {
		foreach (['elementor-frontend', 'elementor-icons', 'elementor-post-*', 'qi-addons-for-elementor-grid-style', 'qi-addons-for-elementor-helper-parts-style', 'qi-addons-for-elementor-style', 'js_composer_front', 'layerslider', 'rs-plugin-settings', 'wp-block-library', 'global-styles', 'classic-theme-styles', 'font-awesome', 'elementor-gf-local-raleway'] as $h) {
			wp_dequeue_style($h);
		}
		foreach (['elementor-frontend', 'elementor-waypoints', 'layerslider', 'tp-tools', 'revmin', 'jquery-migrate'] as $h) {
			wp_dequeue_script($h);
		}
	}
	// reCAPTCHA only where a form is shown.
	if (!is_page(['get-my-budget', 'obter-o-meu-orcamento'])) {
		wp_dequeue_script('google-recaptcha');
		wp_dequeue_script('wpcf7-recaptcha');
	}
}, 100);

add_action('wp_head', function () {
	foreach (['Light', 'Bold'] as $w) {
		printf('<link rel="preload" href="%s/assets/fonts/VisbyCF-%s.woff2" as="font" type="font/woff2" crossorigin>' . "\n", esc_url(BV_URI), $w);
	}
}, 1);

// Remove emoji + embeds noise.
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');


function bv_logo(string $variant = 'light'): string {
	$file = $variant === 'dark' ? 'logo-dark.svg' : 'logo-light.svg';
	return sprintf('<img class="logo" src="%s/assets/img/%s" width="148" height="62" alt="%s">', esc_url(BV_URI), $file, esc_attr(get_bloginfo('name')));
}
