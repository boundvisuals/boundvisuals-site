<?php
/**
 * Bound Visuals theme bootstrap.
 */
defined('ABSPATH') || exit;

define('BV_VER', '1.0.5');
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

	// Front end loads only what this theme needs (allowlist). Pages still built with Elementor keep everything.
	$builder_page = is_page() && !is_front_page() && get_post_meta(get_queried_object_id(), '_elementor_edit_mode', true) === 'builder';
	if (!is_admin() && !$builder_page) {
		$keep = '/^(bv-|admin-bar|dashicons|contact-form-7|wpcf7|cookie|pys|pixel|jquery-core|jquery$|wp-hooks|wp-i18n|swv)/i';
		global $wp_styles, $wp_scripts;
		foreach ((array) $wp_styles->queue as $h) { if (!preg_match($keep, $h)) wp_dequeue_style($h); }
		foreach ((array) $wp_scripts->queue as $h) { if (!preg_match($keep, $h)) wp_dequeue_script($h); }
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
