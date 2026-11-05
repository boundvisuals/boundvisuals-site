<?php
// Painel — phone/desktop notifications (Web Push, no third-party service, no cost).
//   GET  push.php?a=key              → VAPID public key (keys are created on the server on first use)
//   POST push.php?a=sub   {sub}      → saves this device's subscription
//   POST push.php?a=unsub {endpoint} → removes it
//   POST push.php?a=test             → sends a test notification to every device
//   GET  push.php?a=notif            → what the service worker shows (last batch sent)
//   GET  push.php?a=run              → robot: sends what is in store/notify.json.php and not sent yet (no key needed: it can only
//                                       send notifications the robot already wrote; each id is sent once)
// Pushes carry no payload (no encryption needed); the service worker fetches ?a=notif and shows it.
require __DIR__ . '/config.php';
header('X-Robots-Tag: noindex, nofollow');
header('Cache-Control: no-store');
header('Content-Type: application/json; charset=utf-8');

$store = __DIR__ . '/store';
if (!is_dir($store)) mkdir($store, 0755, true);
function rs($f) { if (!file_exists($f)) return null; $raw = file_get_contents($f); $nl = strpos($raw, "\n");
  return json_decode($nl === false ? $raw : substr($raw, $nl + 1), true); }
function ws($f, $d) { file_put_contents($f, "<?php exit; ?>\n" . json_encode($d, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), LOCK_EX); }
function b64u($s) { return rtrim(strtr(base64_encode($s), '+/', '-_'), '='); }
function authed() { global $BV_KEY_HASH; $k = $_COOKIE['bv_k'] ?? ''; return $k !== '' && hash_equals($BV_KEY_HASH, hash('sha256', $k)); }

function vapid() {
  global $store;
  $v = rs("$store/vapid.json.php");
  if ($v && !empty($v['pem'])) return $v;
  $k = openssl_pkey_new(['curve_name' => 'prime256v1', 'private_key_type' => OPENSSL_KEYTYPE_EC]);
  openssl_pkey_export($k, $pem);
  $det = openssl_pkey_get_details($k);
  $pub = "\x04" . str_pad($det['ec']['x'], 32, "\0", STR_PAD_LEFT) . str_pad($det['ec']['y'], 32, "\0", STR_PAD_LEFT);
  $v = ['pem' => $pem, 'pub' => b64u($pub), 'at' => gmdate('c')];
  ws("$store/vapid.json.php", $v);
  return $v;
}
// DER ECDSA signature → raw r||s (64 bytes) for ES256
function der2raw($der) {
  $o = 2; if (ord($der[1]) & 0x80) $o += ord($der[1]) & 0x7f;
  $o++; $rl = ord($der[$o]); $o++; $r = substr($der, $o, $rl); $o += $rl;
  $o++; $sl = ord($der[$o]); $o++; $s = substr($der, $o, $sl);
  $r = str_pad(ltrim($r, "\0"), 32, "\0", STR_PAD_LEFT); $s = str_pad(ltrim($s, "\0"), 32, "\0", STR_PAD_LEFT);
  return $r . $s;
}
function vapid_header($endpoint, $v) {
  $u = parse_url($endpoint);
  $aud = $u['scheme'] . '://' . $u['host'] . (isset($u['port']) ? ':' . $u['port'] : '');
  $h = b64u('{"typ":"JWT","alg":"ES256"}');
  $c = b64u(json_encode(['aud' => $aud, 'exp' => time() + 12 * 3600, 'sub' => 'https://www.boundvisuals.com/painel/'], JSON_UNESCAPED_SLASHES));
  openssl_sign("$h.$c", $der, $v['pem'], OPENSSL_ALGO_SHA256);
  return "vapid t=$h.$c." . b64u(der2raw($der)) . ", k=" . $v['pub'];
}
// Sends an empty push to every saved device; drops devices the push service says are gone. Returns [sent, failed].
function push_all() {
  global $store;
  $subs = rs("$store/push_subs.json.php") ?? []; $v = vapid(); $ok = 0; $bad = 0; $keep = [];
  foreach ($subs as $s) {
    $ep = $s['endpoint'] ?? ''; if (!preg_match('#^https://#', $ep)) continue;
    $ch = curl_init($ep);
    curl_setopt_array($ch, [CURLOPT_POST => true, CURLOPT_POSTFIELDS => '', CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 15,
      CURLOPT_HTTPHEADER => ['TTL: 21600', 'Urgency: normal', 'Content-Length: 0', 'Authorization: ' . vapid_header($ep, $v)]]);
    curl_exec($ch); $code = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
    if ($code >= 200 && $code < 300) { $ok++; $s['last_ok'] = gmdate('c'); }
    else { $bad++; $s['last_err'] = $code; }
    if ($code !== 404 && $code !== 410) $keep[] = $s;
  }
  ws("$store/push_subs.json.php", $keep);
  return [$ok, $bad];
}

$a = $_GET['a'] ?? '';
if ($a === 'run') {                                   // robot trigger (idempotent)
  if (!(rs("$store/push_subs.json.php") ?? [])) { echo '{"ok":true,"sent":0,"devices":0}'; exit; }   // nobody subscribed yet: keep everything for later
  $want = rs("$store/notify.json.php") ?? [];
  $sent = rs("$store/push_sent.json.php") ?? [];
  $ticks = rs("$store/ticks.json.php") ?? [];
  $batch = [];
  foreach ($want as $n) {
    $id = (string)($n['id'] ?? ''); if ($id === '' || isset($sent[$id])) continue;
    if (!empty($n['task']) && !empty($ticks[$n['task']]['done'])) { $sent[$id] = 'skipped-done'; continue; }   // ticked in the panel
    $batch[] = ['id' => $id, 'title' => (string)($n['title'] ?? 'Painel'), 'body' => (string)($n['body'] ?? ''), 'url' => (string)($n['url'] ?? '/painel/')];
    $sent[$id] = gmdate('c');
    if (count($batch) >= 3) break;
  }
  if (!$batch) { echo '{"ok":true,"sent":0}'; exit; }
  ws("$store/push_last.json.php", ['at' => gmdate('c'), 'items' => $batch]);
  [$ok, $bad] = push_all();
  if (count($sent) > 400) $sent = array_slice($sent, -300, null, true);
  ws("$store/push_sent.json.php", $sent);
  echo json_encode(['ok' => true, 'sent' => count($batch), 'devices_ok' => $ok, 'devices_failed' => $bad]);
  exit;
}
if (!authed()) { http_response_code(401); echo '{"error":"no access"}'; exit; }
if ($a === 'key') { echo json_encode(['key' => vapid()['pub'], 'devices' => count(rs("$store/push_subs.json.php") ?? [])]); exit; }
if ($a === 'notif') { echo json_encode(rs("$store/push_last.json.php") ?? ['items' => []], JSON_UNESCAPED_UNICODE); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo '{"error":"method"}'; exit; }
$in = json_decode(file_get_contents('php://input'), true) ?? [];
$subs = rs("$store/push_subs.json.php") ?? [];
if ($a === 'sub') {
  $s = $in['sub'] ?? []; $ep = (string)($s['endpoint'] ?? '');
  if (!preg_match('#^https://[^\s]{10,800}$#', $ep)) { http_response_code(400); echo '{"error":"sub"}'; exit; }
  $subs = array_values(array_filter($subs, fn($x) => ($x['endpoint'] ?? '') !== $ep));
  $subs[] = ['endpoint' => $ep, 'ua' => substr((string)($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 160), 'at' => gmdate('c')];
  ws("$store/push_subs.json.php", array_slice($subs, -10));
  echo json_encode(['ok' => true, 'devices' => count($subs)]); exit;
}
if ($a === 'unsub') {
  $ep = (string)($in['endpoint'] ?? '');
  ws("$store/push_subs.json.php", array_values(array_filter($subs, fn($x) => ($x['endpoint'] ?? '') !== $ep)));
  echo '{"ok":true}'; exit;
}
if ($a === 'test') {
  ws("$store/push_last.json.php", ['at' => gmdate('c'), 'items' => [['id' => 'test-' . time(), 'title' => 'Painel · teste ✓', 'body' => 'As notificações estão a funcionar neste aparelho.', 'url' => '/painel/']]]);
  [$ok, $bad] = push_all();
  echo json_encode(['ok' => $ok > 0, 'devices_ok' => $ok, 'devices_failed' => $bad]); exit;
}
http_response_code(400); echo '{"error":"action"}';
