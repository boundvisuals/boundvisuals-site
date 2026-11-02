<?php
/**
 * Everything visible that is not a post lives here: Appearance → Customize → Bound Visuals.
 */
defined('ABSPATH') || exit;

function bv_opt(string $key): string {
	$defaults = [
		'bv_headline' => 'We develop 3D solutions linked to the world of static and moving images by paying maximum attention to detail and experience through emotions.',
		'bv_email'    => 'info@boundvisuals.com',
		'bv_phone'    => '+351 913 215 170',
		'bv_phone_note' => "Chamada para rede móvel nacional\nCall to a national mobile network",
		'bv_social'   => "https://www.behance.net/boundvisuals\nhttps://www.instagram.com/vitorhugo_boundvisuals/\nhttps://www.linkedin.com/\nhttps://www.youtube.com/",
		'bv_complaints' => 'https://www.livroreclamacoes.pt/',
	];
	return (string) get_theme_mod($key, $defaults[$key] ?? '');
}

add_action('customize_register', function (WP_Customize_Manager $c) {
	$c->add_section('bv', ['title' => 'Bound Visuals', 'priority' => 30]);
	$fields = [
		'bv_headline'   => ['Home headline', 'textarea'],
		'bv_title_home' => ['Home SEO title (after "Bound Visuals ·")', 'text'],
		'bv_meta_home'  => ['Home SEO description', 'textarea'],
		'bv_email'      => ['Email', 'text'],
		'bv_phone'      => ['Phone', 'text'],
		'bv_phone_note' => ['Phone note', 'textarea'],
		'bv_social'     => ['Social links (one URL per line)', 'textarea'],
		'bv_complaints' => ['Complaints Book link', 'url'],
	];
	foreach ($fields as $id => [$label, $type]) {
		$c->add_setting($id, ['default' => bv_opt($id), 'sanitize_callback' => $type === 'url' ? 'esc_url_raw' : 'sanitize_textarea_field']);
		$c->add_control($id, ['label' => $label, 'section' => 'bv', 'type' => $type]);
	}
});

function bv_social_label(string $url): string {
	foreach (['behance' => 'Behance', 'instagram' => 'Instagram', 'linkedin' => 'LinkedIn', 'youtube' => 'YouTube', 'facebook' => 'Facebook', 'pinterest' => 'Pinterest', 'vimeo' => 'Vimeo', 'artstation' => 'ArtStation'] as $k => $l) {
		if (stripos($url, $k) !== false) {
			return $l;
		}
	}
	return parse_url($url, PHP_URL_HOST) ?: $url;
}
