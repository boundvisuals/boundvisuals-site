<?php
// Painel Vítor Hugo • Bound Visuals — tiny API.
//   GET  api.php?a=data                → data written by the robots (store/data.json.php)
//   POST api.php?a=approve  {keys:[]}  → records approvals in store/approvals.json.php (robot applies them to the queue)
//   POST api.php?a=task     {id,done}  → records task ticks in store/ticks.json.php
// Access: cookie bv_k (set by index.php from ?k=) must match the sha256 in config.php.
require __DIR__ . '/config.php';
header('X-Robots-Tag: noindex, nofollow');
header('Cache-Control: no-store');
header('Content-Type: application/json; charset=utf-8');

function authed() {
  global $BV_KEY_HASH;
  $k = $_COOKIE['bv_k'] ?? '';
  return $k !== '' && hash_equals($BV_KEY_HASH, hash('sha256', $k));
}
if (!authed()) { http_response_code(401); echo '{"error":"no access"}'; exit; }

$store = __DIR__ . '/store';
if (!is_dir($store)) mkdir($store, 0755, true);
function read_store($f) {           // files start with "<?php exit; ?>\n" so they are never served directly
  if (!file_exists($f)) return null;
  $raw = file_get_contents($f);
  $nl = strpos($raw, "\n");
  return json_decode($nl === false ? $raw : substr($raw, $nl + 1), true);
}
function write_store($f, $data) {
  file_put_contents($f, "<?php exit; ?>\n" . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), LOCK_EX);
}

$a = $_GET['a'] ?? 'data';
if ($a === 'data') {
  $d = read_store("$store/data.json.php") ?? ['error' => 'no data yet'];
  $d['pending_approvals'] = read_store("$store/approvals.json.php") ?? [];
  $d['ticks'] = read_store("$store/ticks.json.php") ?? new stdClass();
  $d['served_at'] = gmdate('c');
  echo json_encode($d, JSON_UNESCAPED_UNICODE);
  exit;
}
$in = json_decode(file_get_contents('php://input'), true) ?? [];
if ($a === 'approve' && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $cur = read_store("$store/approvals.json.php") ?? [];
  foreach (($in['keys'] ?? []) as $k) {
    if (is_string($k) && strlen($k) < 300) $cur[$k] = gmdate('c');
  }
  write_store("$store/approvals.json.php", $cur);
  echo json_encode(['ok' => true, 'count' => count($cur)]);
  exit;
}
if ($a === 'task' && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $cur = read_store("$store/ticks.json.php") ?? [];
  $id = $in['id'] ?? '';
  if (is_string($id) && $id !== '' && strlen($id) < 120) $cur[$id] = ['done' => !empty($in['done']), 'at' => gmdate('c')];
  write_store("$store/ticks.json.php", $cur);
  echo json_encode(['ok' => true]);
  exit;
}
http_response_code(400);
echo '{"error":"bad request"}';
