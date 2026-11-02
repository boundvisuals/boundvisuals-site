/* Bound Visuals — no jQuery, no libraries. */
(() => {
	const $ = (s, r = document) => r.querySelector(s);
	const $$ = (s, r = document) => [...r.querySelectorAll(s)];

	// Header goes solid after scrolling.
	const header = $('.site-header');
	const onScroll = () => header && header.classList.toggle('scrolled', scrollY > 40);
	addEventListener('scroll', onScroll, { passive: true }); onScroll();

	// Mobile menu.
	const toggle = $('.nav-toggle'), mnav = $('#mobile-nav');
	if (toggle && mnav) toggle.addEventListener('click', () => {
		const open = mnav.hidden; mnav.hidden = !open; toggle.setAttribute('aria-expanded', open);
		toggle.textContent = open ? 'Close' : 'Menu'; document.body.style.overflow = open ? 'hidden' : '';
	});

	// Masonry (left-to-right order, like today's grid) + filters.
	const grid = $('#grid');
	if (grid) {
		const cards = $$('.card', grid);
		const layout = () => {
			const W = grid.clientWidth, n = W > 1100 ? 3 : W > 600 ? 2 : 1, gap = 10, cw = (W - gap * (n - 1)) / n;
			const h = Array(n).fill(0);
			grid.classList.add('masonry');
			cards.forEach(c => {
				if (c.classList.contains('is-hidden')) return;
				const r = parseFloat(getComputedStyle(c).getPropertyValue('--r')) || .5625;
				const i = h.indexOf(Math.min(...h));
				c.style.width = cw + 'px';
				c.style.transform = `translate(${i * (cw + gap)}px, ${h[i]}px)`;
				h[i] += cw * r + gap;
			});
			grid.style.height = Math.max(0, Math.max(...h) - gap) + 'px';
		};
		let t; addEventListener('resize', () => { clearTimeout(t); t = setTimeout(layout, 120); });
		layout();

		$$('.filters button').forEach(b => b.addEventListener('click', () => {
			$$('.filters button').forEach(x => { x.classList.toggle('is-active', x === b); x.setAttribute('aria-pressed', x === b); });
			const f = b.dataset.filter;
			cards.forEach(c => c.classList.toggle('is-hidden', f !== '*' && !c.dataset.cats.split(' ').includes(f)));
			layout(); history.replaceState(null, '', f === '*' ? location.pathname : '#' + f);
		}));
		const pre = decodeURIComponent(location.hash.slice(1));
		const btn = pre && $(`.filters button[data-filter="${CSS.escape(pre)}"]`);
		if (btn) btn.click();

		// Loops play only while visible (saves data + CPU), load on first view.
		const vids = $$('video[data-src]', grid);
		if ('IntersectionObserver' in window && !matchMedia('(prefers-reduced-motion: reduce)').matches) {
			const io = new IntersectionObserver(es => es.forEach(e => {
				const v = e.target;
				if (e.isIntersecting) {
					if (!v.src) { v.src = v.dataset.src; v.addEventListener('playing', () => v.classList.add('playing'), { once: true }); }
					v.play().catch(() => {});
				} else if (v.src) v.pause();
			}), { rootMargin: '200px 0px' });
			vids.forEach(v => io.observe(v));
		}
	}

	// YouTube facade: the player loads only when clicked.
	$$('.yt').forEach(el => el.addEventListener('click', () => {
		el.innerHTML = `<iframe src="https://www.youtube-nocookie.com/embed/${el.dataset.yt}?autoplay=1&rel=0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Video"></iframe>`;
	}, { once: true }));

	// Lightbox with the original file.
	const lb = $('#lightbox'), shots = $$('[data-lightbox]');
	if (lb && shots.length) {
		const img = $('img', lb), cap = $('figcaption', lb); let i = 0, last;
		const show = k => {
			i = (k + shots.length) % shots.length; const a = shots[i];
			lb.classList.add('loading'); img.onload = () => lb.classList.remove('loading');
			img.src = a.href; img.alt = $('img', a)?.alt || '';
			cap.textContent = `${i + 1} / ${shots.length}` + (a.dataset.w ? ` · ${a.dataset.w} × ${a.dataset.h} px` : '');
			const nx = shots[(i + 1) % shots.length]; if (nx) { const p = new Image(); p.src = nx.href; }
		};
		const open = k => { last = document.activeElement; show(k); lb.hidden = false; document.body.style.overflow = 'hidden'; $('.lb-close', lb).focus(); };
		const close = () => { lb.hidden = true; img.removeAttribute('src'); document.body.style.overflow = ''; last && last.focus(); };
		shots.forEach((a, k) => a.addEventListener('click', e => { if (e.metaKey || e.ctrlKey) return; e.preventDefault(); open(k); }));
		$('.lb-close', lb).onclick = close; $('.lb-next', lb).onclick = () => show(i + 1); $('.lb-prev', lb).onclick = () => show(i - 1);
		lb.addEventListener('click', e => { if (e.target === lb || e.target.tagName === 'FIGURE') close(); });
		addEventListener('keydown', e => { if (lb.hidden) return; if (e.key === 'Escape') close(); if (e.key === 'ArrowRight') show(i + 1); if (e.key === 'ArrowLeft') show(i - 1); });
		let x0 = null; lb.addEventListener('touchstart', e => x0 = e.touches[0].clientX, { passive: true });
		lb.addEventListener('touchend', e => { if (x0 === null) return; const dx = e.changedTouches[0].clientX - x0; if (Math.abs(dx) > 50) show(i + (dx < 0 ? 1 : -1)); x0 = null; });
	}
})();
