<?php get_header(); ?>
<section class="intro">
	<h1 class="intro-title"><?php echo esc_html(bv_opt('bv_headline')); ?></h1>
</section>

<section class="work" aria-label="Work">
	<div class="filters" role="group" aria-label="Filter by category">
		<button type="button" class="is-active" data-filter="*" aria-pressed="true">All</button>
		<?php foreach (bv_filters() as $t) : ?>
			<button type="button" data-filter="<?php echo esc_attr($t->slug); ?>" aria-pressed="false"><?php echo esc_html($t->name); ?></button>
		<?php endforeach; ?>
	</div>

	<div class="grid" id="grid">
		<?php
		$i = 0;
		foreach (bv_items() as $p) :
			$terms = bv_item_terms($p);
			$slugs = implode(' ', wp_list_pluck($terms, 'slug'));
			$names = implode(' / ', wp_list_pluck($terms, 'name'));
			$thumb = get_post_thumbnail_id($p);
			$video = bv_item_video($p);
			$meta = $thumb ? wp_get_attachment_metadata($thumb) : null;
			$ratio = ($meta && !empty($meta['width'])) ? round($meta['height'] / $meta['width'], 4) : 0.5625;
			?>
			<article class="card" data-cats="<?php echo esc_attr($slugs); ?>" style="--r:<?php echo esc_attr($ratio); ?>">
				<a href="<?php echo bv_item_link($p); ?>" class="card-link">
					<span class="card-media">
						<?php
						if ($thumb) {
							echo wp_get_attachment_image($thumb, 'bv-grid', false, [
								'sizes'   => '(max-width: 700px) 100vw, (max-width: 1100px) 50vw, 33vw',
								'loading' => $i < 3 ? 'eager' : 'lazy',
								'fetchpriority' => $i === 0 ? 'high' : 'auto',
								'alt'     => get_the_title($p),
							]);
						}
						if ($video) {
							printf('<video muted loop playsinline preload="none" data-src="%s" aria-hidden="true"></video>', esc_url($video));
						}
						?>
					</span>
					<span class="card-info">
						<span class="card-title"><?php echo esc_html(get_the_title($p)); ?></span>
						<?php if ($names) : ?><span class="card-cats"><?php echo esc_html($names); ?></span><?php endif; ?>
					</span>
				</a>
			</article>
			<?php
			$i++;
		endforeach;
		?>
	</div>
</section>
<?php get_footer(); ?>
