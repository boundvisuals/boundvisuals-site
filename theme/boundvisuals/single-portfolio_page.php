<?php
get_header();
the_post();
$post_obj = get_post();
$blocks = bv_project_blocks($post_obj->ID) ?: bv_blocks_from_content($post_obj);
$rows = bv_rows($blocks);
$back = home_url('/#work');
$terms = wp_list_pluck(bv_item_terms($post_obj), 'name');
?>
<article class="project">
	<header class="project-head">
		<a class="btn" href="<?php echo esc_url($back); ?>">See all works</a>
		<h1 class="project-title"><?php the_title(); ?></h1>
		<?php if ($terms) : ?><p class="project-cats"><?php echo esc_html(implode(' / ', $terms)); ?></p><?php endif; ?>
	</header>

	<div class="project-body">
		<?php
		$n = 0;
		foreach ($rows as $row) :
			if ($row[0]['type'] === 'image') :
				echo '<div class="row cols-' . count($row) . '">';
				foreach ($row as $b) :
					$id = $b['id'];
					$full = $id ? bv_original_url($id) : $b['url'];
					$meta = $id ? wp_get_attachment_metadata($id) : null;
					$alt = $id ? (get_post_meta($id, '_wp_attachment_image_alt', true) ?: get_the_title() . ' — image ' . ($n + 1)) : get_the_title();
					$size = $meta ? sprintf(' data-w="%d" data-h="%d"', $meta['width'], $meta['height']) : '';
					echo '<a class="shot" href="' . esc_url($full) . '"' . $size . ' data-lightbox>';
					if ($id) {
						echo wp_get_attachment_image($id, 'bv-wide', false, [
							'sizes'   => count($row) > 1 ? '(max-width: 800px) 100vw, 50vw' : '100vw',
							'loading' => $n < 1 ? 'eager' : 'lazy',
							'fetchpriority' => $n === 0 ? 'high' : 'auto',
							'alt'     => $alt,
						]);
					} else {
						echo '<img src="' . esc_url($b['url']) . '" alt="' . esc_attr($alt) . '" loading="lazy">';
					}
					echo '</a>';
					$n++;
				endforeach;
				echo '</div>';
			else :
				$b = $row[0];
				if ($b['type'] === 'text') {
					echo '<div class="project-info">' . wp_kses_post($b['html']) . '</div>';
				} elseif ($b['type'] === 'heading') {
					echo '<h2 class="project-sub">' . esc_html($b['text']) . '</h2>';
				} elseif ($b['type'] === 'video') {
					$yt = bv_youtube_id($b['url']);
					if ($yt) {
						printf('<div class="yt" data-yt="%1$s"><img src="https://i.ytimg.com/vi/%1$s/maxresdefault.jpg" alt="" loading="lazy"><button type="button" aria-label="Play video"></button></div>', esc_attr($yt));
					} else {
						printf('<video class="project-video" src="%s" controls playsinline preload="metadata"></video>', esc_url($b['url']));
					}
				}
			endif;
		endforeach;
		?>
	</div>

	<nav class="project-nav" aria-label="More projects">
		<?php
		$all = array_values(array_filter(bv_items(), fn($p) => !get_post_meta($p->ID, '_links_to', true)));
		$ids = wp_list_pluck($all, 'ID');
		$pos = array_search($post_obj->ID, $ids, true);
		if ($pos !== false && count($ids) > 1) {
			$prev = $all[($pos - 1 + count($all)) % count($all)];
			$next = $all[($pos + 1) % count($all)];
			printf('<a class="pn prev" href="%s"><small>Previous</small>%s</a>', esc_url(get_permalink($prev)), esc_html(get_the_title($prev)));
			printf('<a class="btn" href="%s">See all works</a>', esc_url($back));
			printf('<a class="pn next" href="%s"><small>Next</small>%s</a>', esc_url(get_permalink($next)), esc_html(get_the_title($next)));
		} else {
			printf('<a class="btn" href="%s">See all works</a>', esc_url($back));
		}
		?>
	</nav>
</article>
<?php get_footer(); ?>
