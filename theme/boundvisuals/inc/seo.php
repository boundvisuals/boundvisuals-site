<?php
/**
 * Lightweight SEO: real titles/descriptions per project, Open Graph, canonical, JSON-LD.
 * Skipped automatically if a dedicated SEO plugin is active.
 */
defined('ABSPATH') || exit;

function bv_seo_plugin_active(): bool {
	return defined('WPSEO_VERSION') || defined('SEOPRESS_VERSION') || defined('RANK_MATH_VERSION') || class_exists('AIOSEO\\Plugin\\AIOSEO');
}

function bv_meta_description(): string {
	if (is_singular(BV_PT)) {
		$id = get_queried_object_id();
		$d = get_post_meta($id, '_seopress_titles_desc', true) ?: get_post_meta($id, 'qode_seo_description', true);
		if ($d) {
			return $d;
		}
		$terms = wp_list_pluck(bv_item_terms(get_post($id)), 'name');
		$info = bv_project_info_text($id);
		$base = sprintf('%s: %s by Bound Visuals, 3D visualisation studio in Portugal.', get_the_title($id), $terms ? strtolower(implode(', ', $terms)) . ' visualisation' : '3D visualisation');
		return wp_html_excerpt($base . ($info ? ' ' . $info : ''), 158, '…');
	}
	if (is_front_page()) {
		return get_theme_mod('bv_meta_home', 'Bound Visuals is the 3D visualisation studio of Vítor Hugo in Portugal: architectural renders, product CGI, animation and AI film for developers and architects.');
	}
	if (is_singular()) {
		return wp_html_excerpt(wp_strip_all_tags(get_the_excerpt()), 158, '…');
	}
	return get_bloginfo('description');
}

add_filter('document_title_parts', function ($parts) {
	if (bv_seo_plugin_active()) {
		return $parts;
	}
	if (is_singular(BV_PT)) {
		$names = wp_list_pluck(bv_item_terms(get_queried_object()), 'name');
		$kind = in_array('Architectural', $names, true) ? 'Architectural Visualisation' : ($names ? $names[0] : '3D Visualisation');
		$parts['title'] = get_the_title() . ' · ' . $kind;
		$parts['site'] = 'Bound Visuals';
		unset($parts['tagline']);
	}
	if (is_front_page()) {
		$parts['title'] = 'Bound Visuals';
		$parts['tagline'] = get_theme_mod('bv_title_home', '3D Architectural Visualisation & CGI Studio, Portugal');
	}
	return $parts;
});
add_filter('document_title_separator', fn() => '·');

add_action('wp_head', function () {
	if (bv_seo_plugin_active()) {
		return;
	}
	$desc = bv_meta_description();
	$url = is_singular() ? get_permalink() : home_url(add_query_arg([], $GLOBALS['wp']->request ?? ''));
	$img = is_singular() && has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'bv-wide') : BV_URI . '/assets/img/logo-dark.svg';
	$title = wp_get_document_title();
	echo "\n";
	printf('<meta name="description" content="%s">' . "\n", esc_attr($desc));
	printf('<link rel="canonical" href="%s">' . "\n", esc_url($url));
	printf('<meta property="og:type" content="%s">' . "\n", is_singular(BV_PT) ? 'article' : 'website');
	printf('<meta property="og:title" content="%s">' . "\n", esc_attr($title));
	printf('<meta property="og:description" content="%s">' . "\n", esc_attr($desc));
	printf('<meta property="og:url" content="%s">' . "\n", esc_url($url));
	printf('<meta property="og:image" content="%s">' . "\n", esc_url($img));
	echo '<meta property="og:site_name" content="Bound Visuals">' . "\n";
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";

	$org = [
		'@type' => 'Organization', '@id' => home_url('/#studio'), 'name' => 'Bound Visuals', 'url' => home_url('/'),
		'logo' => BV_URI . '/assets/img/logo-dark.svg', 'email' => 'info@boundvisuals.com', 'telephone' => '+351913215170',
		'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'PT'],
		'founder' => ['@id' => home_url('/#vitor')],
		'sameAs' => array_values(array_filter(array_map('trim', explode("\n", bv_opt('bv_social'))))),
	];
	$person = ['@type' => 'Person', '@id' => home_url('/#vitor'), 'name' => 'Vítor Hugo', 'jobTitle' => '3D Artist · AI Image & Video Specialist', 'worksFor' => ['@id' => home_url('/#studio')]];
	$graph = [$org, $person];
	if (is_singular(BV_PT)) {
		$graph[] = [
			'@type' => 'CreativeWork', 'name' => get_the_title(), 'url' => get_permalink(), 'image' => $img,
			'description' => $desc, 'creator' => ['@id' => home_url('/#studio')], 'dateCreated' => get_the_date('c'),
			'genre' => implode(', ', wp_list_pluck(bv_item_terms(get_queried_object()), 'name')),
		];
	}
	echo '<script type="application/ld+json">' . wp_json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}, 2);
