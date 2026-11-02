<?php
/**
 * Plugin Name: Bound Visuals SEO
 * Description: Real titles, descriptions, social previews and structured data for boundvisuals.com. Changes nothing visible on the page. Delete this file to undo.
 * Version: 1.0.0
 * Author: Vítor Hugo · Bound Visuals
 */
defined('ABSPATH') || exit;

const BVSEO_PT  = 'portfolio_page';
const BVSEO_TAX = 'portfolio_category';
const BVSEO_GENERIC = ['3D - Bound Visuals', 'We develop 3D solutions'];

function bvseo_is_generic(?string $s): bool {
	if (!$s) return true;
	foreach (BVSEO_GENERIC as $g) {
		if (stripos(trim($s), $g) === 0) return true;
	}
	return false;
}

function bvseo_terms(int $id): array {
	$t = get_the_terms($id, BVSEO_TAX);
	return is_array($t) ? wp_list_pluck($t, 'name') : [];
}

/** "Name: … Client: … Date: …" text from the project's Elementor text widget. */
function bvseo_info(int $id): string {
	$raw = get_post_meta($id, '_elementor_data', true);
	$data = is_string($raw) ? json_decode($raw, true) : $raw;
	$found = '';
	$walk = function ($nodes) use (&$walk, &$found) {
		foreach ((array) $nodes as $n) {
			if ($found) return;
			if (($n['widgetType'] ?? '') === 'text-editor' && !empty($n['settings']['editor'])) {
				$found = trim(preg_replace('/[ \t]+/', ' ', wp_strip_all_tags(preg_replace('~<br\s*/?>|</p>|</div>|</li>~i', "\n", $n['settings']['editor']))));
				return;
			}
			if (!empty($n['elements'])) $walk($n['elements']);
		}
	};
	$walk($data);
	return $found;
}

function bvseo_title(): ?string {
	if (is_front_page()) {
		return 'Bound Visuals · 3D Architectural Visualisation & CGI Studio, Portugal';
	}
	if (is_singular(BVSEO_PT)) {
		$id = get_queried_object_id();
		$custom = get_post_meta($id, '_seopress_titles_title', true) ?: get_post_meta($id, 'qode_seo_title', true);
		if (!bvseo_is_generic($custom)) return $custom;
		$terms = bvseo_terms($id);
		$kind = in_array('Architectural', $terms, true) ? 'Architectural Visualisation'
			: (in_array('Automotive', $terms, true) ? 'Automotive CGI'
			: (in_array('Product', $terms, true) ? 'Product CGI'
			: (in_array('Film/Animation', $terms, true) ? '3D Animation' : '3D Visualisation')));
		return get_the_title($id) . ' · ' . $kind . ' · Bound Visuals';
	}
	if (is_page()) {
		$custom = get_post_meta(get_queried_object_id(), '_seopress_titles_title', true);
		return !bvseo_is_generic($custom) ? $custom : get_the_title() . ' · Bound Visuals';
	}
	return null;
}

function bvseo_description(): string {
	if (is_singular(BVSEO_PT)) {
		$id = get_queried_object_id();
		$custom = get_post_meta($id, '_seopress_titles_desc', true) ?: get_post_meta($id, 'qode_seo_description', true);
		if (!bvseo_is_generic($custom)) return $custom;
		$terms = array_values(array_diff(array_map('strtolower', bvseo_terms($id)), ['image']));
		$what = $terms ? implode(' and ', $terms) . ' visualisation' : '3D visualisation';
		$info = bvseo_info($id);
		$extra = '';
		if (preg_match('/Client:\s*(.+)/i', $info, $m)) $extra .= ' Client: ' . trim($m[1]) . '.';
		if (preg_match('/Date:\s*(\d{4})/i', $info, $m)) $extra .= ' ' . $m[1] . '.';
		return wp_html_excerpt(sprintf('%s, %s by Bound Visuals, 3D studio in Portugal.%s', get_the_title($id), $what, $extra), 158, '…');
	}
	if (is_page() && !is_front_page()) {
		$custom = get_post_meta(get_queried_object_id(), '_seopress_titles_desc', true);
		if (!bvseo_is_generic($custom)) return $custom;
	}
	return 'Bound Visuals is Vítor Hugo\'s 3D brand in Portugal, dedicated to architectural visualisation and product CGI: photoreal images, animation and 360º for developers, architects and brands.';
}

/* Titles: win over the theme and old SEO meta. */
add_filter('pre_get_document_title', fn($t) => bvseo_title() ?? $t, 99999);
add_filter('wp_title', fn($t) => bvseo_title() ?? $t, 99999);

/* Remove other description / Open Graph tags from the head, then print ours once. */
add_action('template_redirect', function () {
	if (is_admin() || wp_doing_ajax() || is_feed()) return;
	ob_start(function ($html) {
		$head_end = stripos($html, '</head>');
		if ($head_end === false) return $html;
		$head = substr($html, 0, $head_end);
		$head = preg_replace('~<meta\s+(?:name="description"|property="og:(?:title|description|url|image|type|site_name)[^"]*"|name="twitter:(?:title|description|image|card)")[^>]*>\s*~i', '', $head);
		$head = preg_replace('~<link\s+rel="canonical"[^>]*>\s*~i', '', $head);
		return $head . bvseo_tags() . substr($html, $head_end);
	});
}, 0);

function bvseo_tags(): string {
	$desc = bvseo_description();
	$title = wp_get_document_title();
	$url = is_singular() ? get_permalink() : home_url('/');
	$img = '';
	if (is_singular() && has_post_thumbnail()) {
		$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
		$img = $src ? $src[0] : '';
	}
	$o = "\n<!-- Bound Visuals SEO -->\n";
	$o .= sprintf('<meta name="description" content="%s">' . "\n", esc_attr($desc));
	$o .= sprintf('<link rel="canonical" href="%s">' . "\n", esc_url($url));
	$o .= sprintf('<meta property="og:type" content="%s">' . "\n", is_singular(BVSEO_PT) ? 'article' : 'website');
	$o .= '<meta property="og:site_name" content="Bound Visuals">' . "\n";
	$o .= sprintf('<meta property="og:title" content="%s">' . "\n", esc_attr($title));
	$o .= sprintf('<meta property="og:description" content="%s">' . "\n", esc_attr($desc));
	$o .= sprintf('<meta property="og:url" content="%s">' . "\n", esc_url($url));
	if ($img) $o .= sprintf('<meta property="og:image" content="%s">' . "\n", esc_url($img));
	$o .= '<meta name="twitter:card" content="summary_large_image">' . "\n";

	$graph = [
		['@type' => 'Organization', '@id' => home_url('/#studio'), 'name' => 'Bound Visuals', 'url' => home_url('/'),
			'email' => 'info@boundvisuals.com', 'telephone' => '+351913215170',
			'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'PT'], 'founder' => ['@id' => home_url('/#vitor')],
			'sameAs' => ['https://www.instagram.com/vitorhugo_boundvisuals/', 'https://www.behance.net/boundvisuals']],
		['@type' => 'Person', '@id' => home_url('/#vitor'), 'name' => 'Vítor Hugo', 'jobTitle' => '3D Artist · AI Image & Video Specialist',
			'worksFor' => ['@id' => home_url('/#studio')]],
	];
	if (is_singular(BVSEO_PT)) {
		$id = get_queried_object_id();
		$graph[] = ['@type' => 'CreativeWork', 'name' => get_the_title($id), 'url' => $url, 'description' => $desc,
			'image' => $img ?: null, 'creator' => ['@id' => home_url('/#studio')], 'dateCreated' => get_the_date('c', $id),
			'genre' => implode(', ', bvseo_terms($id))];
	}
	$o .= '<script type="application/ld+json">' . wp_json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
	return $o . "<!-- /Bound Visuals SEO -->\n";
}
