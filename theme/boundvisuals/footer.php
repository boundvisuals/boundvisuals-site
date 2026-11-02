</main>
<footer class="site-footer">
	<div class="foot-grid">
		<div class="foot-col">
			<p>© <?php echo esc_html(gmdate('Y')); ?> Bound Visuals<br>All rights reserved</p>
			<p>Portugal</p>
		</div>
		<div class="foot-col">
			<h2 class="foot-h">Contacts</h2>
			<p><a href="mailto:<?php echo esc_attr(bv_opt('bv_email')); ?>"><?php echo esc_html(bv_opt('bv_email')); ?></a></p>
			<p><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', bv_opt('bv_phone'))); ?>"><?php echo esc_html(bv_opt('bv_phone')); ?></a><br><small><?php echo nl2br(esc_html(bv_opt('bv_phone_note'))); ?></small></p>
		</div>
		<div class="foot-col">
			<h2 class="foot-h">Social</h2>
			<ul class="plain">
				<?php foreach (array_filter(array_map('trim', explode("\n", bv_opt('bv_social')))) as $u) : ?>
					<li><a href="<?php echo esc_url($u); ?>" rel="me noopener" target="_blank"><?php echo esc_html(bv_social_label($u)); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="foot-col">
			<h2 class="foot-h">Legal</h2>
			<ul class="plain">
				<?php $privacy = get_privacy_policy_url(); if ($privacy) : ?><li><a href="<?php echo esc_url($privacy); ?>">Privacy, Cookies &amp; GDPR Policy</a></li><?php endif; ?>
				<li><a href="<?php echo esc_url(bv_opt('bv_complaints')); ?>" target="_blank" rel="noopener">Complaints Book</a></li>
			</ul>
		</div>
	</div>
</footer>
<div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="Full resolution image" hidden>
	<button class="lb-close" type="button" aria-label="Close">Close</button>
	<button class="lb-prev" type="button" aria-label="Previous image">←</button>
	<figure><img alt=""><figcaption></figcaption></figure>
	<button class="lb-next" type="button" aria-label="Next image">→</button>
</div>
<?php wp_footer(); ?>
</body>
</html>
