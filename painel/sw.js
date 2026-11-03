// Network-first; never caches the API. Lets the panel install as an app on Windows and phones.
self.addEventListener("install", e => self.skipWaiting());
self.addEventListener("activate", e => e.waitUntil(self.clients.claim()));
self.addEventListener("fetch", e => {
  const u = new URL(e.request.url);
  if (e.request.method !== "GET" || u.pathname.endsWith("api.php")) return;
  e.respondWith(fetch(e.request).then(r => { const c = r.clone(); caches.open("bv-painel").then(x => x.put(e.request, c)); return r; }).catch(() => caches.match(e.request)));
});
