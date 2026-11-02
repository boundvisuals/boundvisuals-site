<?php
/**
 * Read the existing content model without the page builder:
 * - portfolio_page items, portfolio_category terms
 * - grid loop video: meta pfv_featured_video_uploading (attachment id)
 * - redirect thumbnails: meta _links_to (Page Links To)
 * - project body: Elementor JSON (_elementor_data) → ordered blocks
 */
defined('ABSPATH') || exit;

const BV_PT  = 'portfolio_page';
const BV_TAX = 'portfolio_category';

function bv_items(): array {
	return get_posts([
		'post_type'      => BV_PT,
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'],
	]);
}

/** Categories that actually have items, in name order (like the current filter row). */
function bv_filters(): array {
	$terms = get_terms(['taxonomy' => BV_TAX, 'hide_empty' => true, 'orderby' => 'name']);
	return is_wp_error($terms) ? [] : $terms;
}

function bv_item_link(WP_Post $p): string {
	$to = get_post_meta($p->ID, '_links_to', true);
	return $to ? esc_url($to) : get_permalink($p);
}

function bv_item_video(WP_Post $p): ?string {
	$id = (int) get_post_meta($p->ID, 'pfv_featured_video_uploading', true);
	if ($id && ($url = wp_get_attachment_url($id))) {
		return $url;
	}
	$custom = get_post_meta($p->ID, '_pfv_custom_vid_url', true);
	return ($custom && preg_match('/\.(mp4|webm)(\?|$)/i', $custom)) ? $custom : null;
}

function bv_item_terms(WP_Post $p): array {
	$t = get_the_terms($p, BV_TAX);
	return (is_array($t)) ? $t : [];
}

/** True original file (before WP's -scaled copy), so the lightbox is the untouched master. */
function bv_original_url(int $att): string {
	$u = function_exists('wp_get_original_image_url') ? wp_get_original_image_url($att) : '';
	return $u ?: (string) wp_get_attachment_url($att);
}

/**
 * Turn Elementor JSON into a flat list of blocks:
 * ['type'=>'image','id'=>int,'url'=>string] | ['type'=>'text','html'=>string]
 * | ['type'=>'video','url'=>string] | ['type'=>'heading','text'=>string]
 * Buttons ("See all works") are skipped: the theme prints its own.
 */
function bv_project_blocks(int $post_id): array {
	$raw = get_post_meta($post_id, '_elementor_data', true);
	$data = is_string($raw) ? json_decode($raw, true) : $raw;
	$out = [];
	if (!is_array($data)) {
		return $out;
	}
	$walk = function (array $nodes) use (&$walk, &$out) {
		foreach ($nodes as $n) {
			$type = $n['widgetType'] ?? '';
			$s = $n['settings'] ?? [];
			if ($type === 'image' && !empty($s['image'])) {
				$out[] = ['type' => 'image', 'id' => (int) ($s['image']['id'] ?? 0), 'url' => $s['image']['url'] ?? ''];
			} elseif ($type === 'image-gallery' && !empty($s['wp_gallery'])) {
				foreach ($s['wp_gallery'] as $g) {
					$out[] = ['type' => 'image', 'id' => (int) ($g['id'] ?? 0), 'url' => $g['url'] ?? ''];
				}
			} elseif ($type === 'text-editor' && !empty($s['editor'])) {
				$out[] = ['type' => 'text', 'html' => $s['editor']];
			} elseif ($type === 'heading' && !empty($s['title'])) {
				$out[] = ['type' => 'heading', 'text' => wp_strip_all_tags($s['title'])];
			} elseif ($type === 'video') {
				$u = $s['youtube_url'] ?? ($s['vimeo_url'] ?? ($s['hosted_url']['url'] ?? ''));
				if ($u) {
					$out[] = ['type' => 'video', 'url' => $u];
				}
			}
			if (!empty($n['elements'])) {
				$walk($n['elements']);
			}
		}
	};
	$walk($data);
	return $out;
}

/** Fallback when a project was not built with Elementor: images found in post_content. */
function bv_blocks_from_content(WP_Post $p): array {
	$out = [];
	if (preg_match_all('/wp-image-(\d+)/', $p->post_content, $m)) {
		foreach (array_unique($m[1]) as $id) {
			$out[] = ['type' => 'image', 'id' => (int) $id, 'url' => wp_get_attachment_url((int) $id)];
		}
	}
	$text = trim(wp_strip_all_tags(preg_replace('/<img[^>]*>/', '', $p->post_content)));
	if ($text) {
		$out[] = ['type' => 'text', 'html' => wpautop(esc_html($text))];
	}
	return $out;
}

/** Group consecutive portrait images in pairs (as the current project pages do). */
function bv_rows(array $blocks): array {
	$rows = [];
	$buf = null;
	foreach ($blocks as $b) {
		if ($b['type'] !== 'image') {
			if ($buf) { $rows[] = [$buf]; $buf = null; }
			$rows[] = [$b];
			continue;
		}
		$meta = $b['id'] ? wp_get_attachment_metadata($b['id']) : null;
		$portrait = $meta && !empty($meta['height']) && $meta['height'] > $meta['width'];
		if ($portrait) {
			if ($buf) { $rows[] = [$buf, $b]; $buf = null; } else { $buf = $b; }
		} else {
			if ($buf) { $rows[] = [$buf]; $buf = null; }
			$rows[] = [$b];
		}
	}
	if ($buf) { $rows[] = [$buf]; }
	return $rows;
}

function bv_youtube_id(string $url): ?string {
	return preg_match('~(?:youtu\.be/|v=|embed/|shorts/)([\w-]{11})~', $url, $m) ? $m[1] : null;
}

/** Plain-text info ("Name: … Client: …") for SEO descriptions. */
function bv_project_info_text(int $post_id): string {
	foreach (bv_project_blocks($post_id) as $b) {
		if ($b['type'] === 'text') {
			return trim(preg_replace('/\s+/', ' ', wp_strip_all_tags($b['html'])));
		}
	}
	return '';
}
