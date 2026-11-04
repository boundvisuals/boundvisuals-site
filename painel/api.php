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
function read_store($f) {           // store files begin with a PHP exit line so they are never served directly
  if (!file_exists($f)) return null;
  $raw = file_get_contents($f);
  $nl = strpos($raw, "\n");
  return json_decode($nl === false ? $raw : substr($raw, $nl + 1), true);
}
function write_store($f, $data) {
  file_put_contents($f, "<?php exit; ?>\n" . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), LOCK_EX);
}

// Wakes the panel robot at once (GitHub workflow_dispatch) when Vítor saved a token in the panel settings.
function kick_robot() {
  global $store;
  $t = read_store("$store/gh.json.php")['token'] ?? '';
  if ($t === '') return 'no-token';
  $ch = curl_init('https://api.github.com/repos/boundvisuals/boundvisuals-site/actions/workflows/painel.yml/dispatches');
  curl_setopt_array($ch, [CURLOPT_POST => true, CURLOPT_POSTFIELDS => '{"ref":"main"}', CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 15,
    CURLOPT_HTTPHEADER => ["Authorization: Bearer $t", 'Accept: application/vnd.github+json', 'User-Agent: bv-painel', 'Content-Type: application/json']]);
  curl_exec($ch); $code = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
  return $code === 204 ? 'started' : "error-$code";
}

$a = $_GET['a'] ?? 'data';
if ($a === 'ghtoken' && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $in0 = json_decode(file_get_contents('php://input'), true) ?? [];
  $t = trim((string)($in0['token'] ?? ''));
  if (!preg_match('/^(github_pat_|ghp_)[A-Za-z0-9_]{20,255}$/', $t)) { http_response_code(400); echo '{"error":"token"}'; exit; }
  write_store("$store/gh.json.php", ['token' => $t, 'at' => gmdate('c')]);
  echo json_encode(['ok' => true, 'robot' => kick_robot()]);
  exit;
}
if ($a === 'data') {
  $d = read_store("$store/data.json.php") ?? ['error' => 'no data yet'];
  $d['pending_approvals'] = read_store("$store/approvals.json.php") ?? [];
  $d['ticks'] = read_store("$store/ticks.json.php") ?? new stdClass();
  $d['inbox'] = read_store("$store/inbox.json.php") ?? [];
  $d['opps'] = read_store("$store/opps.json.php") ?? [];
  $d['robot_link'] = file_exists("$store/gh.json.php");
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
  echo json_encode(['ok' => true, 'count' => count($cur), 'robot' => kick_robot()]);
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
if ($a === 'note' && $_SERVER['REQUEST_METHOD'] === 'POST') {   // ideas / topics written in the panel
  $cur = read_store("$store/inbox.json.php") ?? [];
  if (!empty($in['delete'])) {
    $cur = array_values(array_filter($cur, fn($n) => ($n['id'] ?? '') !== $in['delete']));
  } else {
    $text = trim((string)($in['text'] ?? ''));
    if ($text === '' || mb_strlen($text) > 5000) { http_response_code(400); echo '{"error":"empty"}'; exit; }
    $tag = in_array($in['tag'] ?? '', ['ideia', 'debater', 'tarefa', 'conteudo', 'outro'], true) ? $in['tag'] : 'ideia';
    array_unshift($cur, ['id' => bin2hex(random_bytes(6)), 'text' => $text, 'tag' => $tag, 'at' => gmdate('c'), 'status' => 'novo']);
  }
  write_store("$store/inbox.json.php", $cur);
  echo json_encode(['ok' => true, 'inbox' => $cur], JSON_UNESCAPED_UNICODE);
  exit;
}
if ($a === 'opp' && $_SERVER['REQUEST_METHOD'] === 'POST') {   // opportunities: jobs / clients
  $cur = read_store("$store/opps.json.php") ?? [];
  $clean = fn($v, $n = 500) => mb_substr(trim((string)$v), 0, $n);
  if (!empty($in['delete'])) {
    $cur = array_values(array_filter($cur, fn($o) => ($o['id'] ?? '') !== $in['delete']));
  } else {
    $o = ['id' => preg_replace('/[^a-f0-9]/', '', (string)($in['id'] ?? '')) ?: bin2hex(random_bytes(6)),
          'kind' => in_array($in['kind'] ?? '', ['vaga', 'cliente'], true) ? $in['kind'] : 'vaga',
          'title' => $clean($in['title'] ?? '', 200), 'org' => $clean($in['org'] ?? '', 200), 'url' => $clean($in['url'] ?? '', 500),
          'stage' => in_array($in['stage'] ?? '', ['encontrada', 'enviada', 'resposta', 'entrevista', 'proposta', 'ganha', 'perdida'], true) ? $in['stage'] : 'encontrada',
          'notes' => $clean($in['notes'] ?? '', 3000), 'updated' => gmdate('c')];
    if ($o['title'] === '') { http_response_code(400); echo '{"error":"title"}'; exit; }
    $found = false;
    foreach ($cur as &$x) { if ($x['id'] === $o['id']) { $o['created'] = $x['created'] ?? $o['updated']; $x = $o; $found = true; } }
    unset($x);
    if (!$found) { $o['created'] = $o['updated']; array_unshift($cur, $o); }
  }
  write_store("$store/opps.json.php", $cur);
  echo json_encode(['ok' => true, 'opps' => $cur], JSON_UNESCAPED_UNICODE);
  exit;
}
if ($a === 'crops' && $_SERVER['REQUEST_METHOD'] === 'POST') {   // crop editor: {project, stem, crops:[[cx,cy,h],...]}
  $cur = read_store("$store/crops.json.php") ?? [];
  $stem = (string)($in['stem'] ?? ''); $proj = preg_replace('/[^a-z0-9-]/', '', (string)($in['project'] ?? ''));
  $cr = [];
  foreach (($in['crops'] ?? []) as $c) {
    if (is_array($c) && count($c) === 3) $cr[] = array_map(fn($v) => round(max(0, min(1, (float)$v)), 3), $c);
  }
  if ($stem === '' || strlen($stem) > 200 || $proj === '' || count($cr) < 1 || count($cr) > 9) { http_response_code(400); echo '{"error":"bad crops"}'; exit; }
  $kind = ($in['kind'] ?? '') === 'story' ? 'story' : 'post';
  $cur[($kind === 'story' ? 'story|' : '') . $stem] = ['project' => $proj, 'kind' => $kind, 'crops' => $cr, 'at' => gmdate('c')];
  write_store("$store/crops.json.php", $cur);
  echo json_encode(['ok' => true, 'robot' => kick_robot()]);
  exit;
}
http_response_code(400);
echo '{"error":"bad request"}';
