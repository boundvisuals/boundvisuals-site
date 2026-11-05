// Network-first; never caches the API. Lets the panel install as an app on Windows and phones.
self.addEventListener("install", e => self.skipWaiting());
self.addEventListener("activate", e => e.waitUntil(self.clients.claim()));
self.addEventListener("fetch", e => {
  const u = new URL(e.request.url);
  if (e.request.method !== "GET" || u.pathname.endsWith("api.php") || u.pathname.endsWith("push.php")) return;
  e.respondWith(fetch(e.request).then(r => { const c = r.clone(); caches.open("bv-painel").then(x => x.put(e.request, c)); return r; }).catch(() => caches.match(e.request)));
});
// Notifications: pushes arrive empty; ask the panel what to show (cookie goes with same-origin requests).
self.addEventListener("push", e => e.waitUntil((async () => {
  let items = [];
  try { const r = await fetch("push.php?a=notif", { cache: "no-store", credentials: "same-origin" }); items = (await r.json()).items || []; } catch (x) {}
  if (!items.length) items = [{ id: "bv", title: "Painel", body: "Há novidades no Painel.", url: "/painel/" }];
  await Promise.all(items.map(n => self.registration.showNotification(n.title, { body: n.body, tag: n.id, icon: "icon-192.png", badge: "icon-192.png", data: { url: n.url || "/painel/" } })));
})()));
self.addEventListener("notificationclick", e => {
  e.notification.close();
  const url = (e.notification.data && e.notification.data.url) || "/painel/";
  e.waitUntil(self.clients.matchAll({ type: "window", includeUncontrolled: true }).then(cs => {
    for (const c of cs) if (c.url.includes("/painel/") && "focus" in c) { c.navigate(url).catch(() => {}); return c.focus(); }
    return self.clients.openWindow(url);
  }));
});
