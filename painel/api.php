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
function kick_robot() {   // apply the change right now: start the server robot in the background (no wait for the next minute)
  $home = dirname(__DIR__, 2);
  $sh = "$home/bv/repo/scripts/server_run.sh";
  if (!is_file($sh) || !function_exists('exec')) return 'queued';
  @exec('nohup bash ' . escapeshellarg($sh) . ' >> ' . escapeshellarg("$home/bv/run.log") . ' 2>&1 &');
  return 'started';
}
function kick_robot_now() {
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
  $pubst = read_store("$store/published.json.php") ?? [];                 // server publisher (cron.php): show status instantly
  if (!empty($d['calendar'])) foreach ($d['calendar'] as &$day) foreach ($day['items'] as &$it) {
    $r = $pubst[$it['pkey'] ?? ''] ?? null;
    if (is_array($r) && !empty($r['ig'])) { $it['status'] = 'published'; $it['link'] = $r['ig_link'] ?? ($it['link'] ?? null); }
    elseif (is_array($r) && !empty($r['skipped'])) $it['status'] = 'skipped';
  }
  unset($day, $it);
  $d['server_cron'] = is_file("$store/cron.log") ? date('c', filemtime("$store/cron.log")) : null;
  $d['ig_live'] = read_store("$store/ig_stats.json.php");
  // LIVE overlays (server state beats the last built snapshot): Instagram numbers + connected networks
  $igs = $d['ig_live'] ?? null;
  if (is_array($igs) && !empty($igs['now'])) {
    $d['stats'] = array_merge($d['stats'] ?? [], ['at' => $igs['at'] ?? null, 'account' => array_merge(($d['stats']['account'] ?? []), $igs['now'])]);
    if (isset($igs['media'])) $d['stats']['media'] = $igs['media'];
    if (isset($igs['reach_7d'])) $d['stats']['reach_7d'] = $igs['reach_7d'];
    if (empty($igs['error'])) unset($d['stats']['error']);
    $d['followers'] = array_merge($d['followers'] ?? [], $igs['history'] ?? []);
  }
  $oa = read_store("$store/oauth.json.php") ?? [];
  $lis = read_store("$store/linkedin.json.php") ?? [];
  $yts = read_store("$store/youtube.json.php") ?? [];
  $nets = [];
  foreach (($d['networks'] ?? []) as $n) {
    if (in_array($n['name'], ['Pinterest', 'YouTube Shorts', 'LinkedIn', 'Site · Behance · CG'], true)) continue;
    if ($n['name'] === 'Instagram' && !empty($igs['now']['followers_count']) && ($n['level'] ?? '') !== 'err') $n['status'] = ($n['status'] === 'ligado' ? 'a publicar' : $n['status']) . ' · ' . $igs['now']['followers_count'] . ' seguidores';
    $nets[] = $n;
  }
  $left = function ($c) { return !empty($c['expires_at']) ? max(0, (int)floor(($c['expires_at'] - time()) / 86400)) : null; };
  foreach (['linkedin' => 'LinkedIn (pessoal)', 'youtube' => 'YouTube Shorts', 'pinterest' => 'Pinterest', 'threads' => 'Threads'] as $k => $nm) {
    $c = $oa[$k] ?? [];
    if (!empty($c['access_token'])) {
      $days = $left($c); $extra = '';
      if ($k === 'linkedin' && !empty($lis['last_day'])) $extra = ' · último post ' . $lis['last_day'];
      if ($k === 'youtube' && !empty($yts)) $extra = ' · ' . count(array_filter($yts, 'is_array')) . ' Shorts';
      $warn = $days !== null && $days <= 7;
      $nets[] = ['name' => $nm, 'status' => 'ligado' . (!empty($c['account']) ? ' · ' . $c['account'] : '') . $extra . ($days !== null ? " · token {$days} dias" : ''), 'level' => $warn ? 'err' : ''];
    } else if ($k !== 'threads') $nets[] = ['name' => $nm, 'status' => !empty($c['client_id']) ? 'chaves guardadas · falta ligar' : 'por ligar'];
  }
  $nets[] = ['name' => 'Site · Behance · CG', 'status' => 'manual (tratas tu)'];
  $d['networks'] = $nets;
  // live publisher log (cron.php) instead of the old GitHub-runner log baked into the snapshot
  if (is_file("$store/cron.log")) {
    $tail = array_values(array_filter(array_map('trim', array_slice(file("$store/cron.log"), -40)), function ($l) { return $l !== ''; }));
    $keep = array_values(array_filter($tail, function ($l) { return !preg_match('/missing meta|nothing due|idle/i', $l); }));
    $show = array_slice($keep ?: $tail, -8);
    $old = $d['log'] ?? [];
    $i = array_search('Últimas ações:', $old);
    $d['log'] = array_merge(['Último robô de publicação (servidor, ' . date('d/m H:i', filemtime("$store/cron.log")) . '):'], $show, [''], $i !== false ? array_slice($old, $i) : []);
  }
  $d['ticks'] = read_store("$store/ticks.json.php") ?? new stdClass();
  $d['inbox'] = read_store("$store/inbox.json.php") ?? [];
  $d['opps'] = read_store("$store/opps.json.php") ?? [];
  $d['reviews'] = read_store("$store/reviews.json.php") ?? new stdClass();
  $d['robot_link'] = file_exists("$store/gh.json.php");
  $d['served_at'] = gmdate('c');
  echo json_encode($d, JSON_UNESCAPED_UNICODE);
  exit;
}
$in = json_decode(file_get_contents('php://input'), true) ?? [];
// "Avisar o Claude": Vítor marks a checkpoint (+ optional note). The robot copies it to docs/claude-ping.json;
// the next Claude chat reads it and reviews everything changed since the previous checkpoint. No credits spent until he opens a chat.
if ($a === 'ping' && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $cur = read_store("$store/ping.json.php") ?? [];
  $cur[] = ['at' => gmdate('c'), 'note' => mb_substr((string)($in['note'] ?? ''), 0, 4000), 'seen' => false];
  write_store("$store/ping.json.php", array_slice($cur, -50));
  echo json_encode(['ok' => true, 'robot' => kick_robot()]);
  exit;
}
if ($a === 'approve' && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $cur = read_store("$store/approvals.json.php") ?? [];
  $undo = isset($in['value']) && $in['value'] === false;          // "desaprovar" (undo)
  foreach (($in['keys'] ?? []) as $k) {
    if (is_string($k) && strlen($k) < 300) $cur[$k] = $undo ? ['v' => false, 'at' => gmdate('c')] : gmdate('c');
  }
  write_store("$store/approvals.json.php", $cur);
  echo json_encode(['ok' => true, 'count' => count($cur), 'robot' => kick_robot()]);
  exit;
}
// Apagar: a whole item (key) or one slide of a feed post (key + slide). undo:true restores.
if ($a === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $cur = read_store("$store/deleted.json.php") ?? ['keys' => [], 'slides' => new stdClass()];
  $cur['keys'] = $cur['keys'] ?? []; $sl = (array)($cur['slides'] ?? []);
  $k = (string)($in['key'] ?? ''); $slide = isset($in['slide']) ? (string)$in['slide'] : '';
  $undo = !empty($in['undo']);
  if ($k !== '' && strlen($k) < 300) {
    if ($slide === '') {
      $cur['keys'] = array_values(array_filter($cur['keys'], fn($x) => $x !== $k));
      if (!$undo) $cur['keys'][] = $k;
    } else {
      $list = array_values(array_filter((array)($sl[$k] ?? []), fn($x) => $x !== $slide));
      if (!$undo) $list[] = $slide;
      if ($list) $sl[$k] = $list; else unset($sl[$k]);
    }
  }
  $cur['slides'] = $sl ?: new stdClass();
  write_store("$store/deleted.json.php", $cur);
  echo json_encode(['ok' => true, 'robot' => kick_robot()]);
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
  } elseif (!empty($in['set_status'])) {                            // novo | em-curso | feito | arquivado
    $stt = in_array($in['status'] ?? '', ['novo', 'em-curso', 'feito', 'arquivado'], true) ? $in['status'] : 'novo';
    foreach ($cur as &$n) { if (($n['id'] ?? '') === $in['set_status']) { $n['status'] = $stt; if (!empty($in['tag'])) $n['tag'] = preg_replace('/[^a-z]/', '', $in['tag']); } }
    unset($n);
  } elseif (!empty($in['reply_to'])) {                               // Vítor answers inside a thread
    $text = trim((string)($in['text'] ?? ''));
    if ($text === '' || mb_strlen($text) > 5000) { http_response_code(400); echo '{"error":"empty"}'; exit; }
    foreach ($cur as &$n) { if (($n['id'] ?? '') === $in['reply_to']) { $n['thread'][] = ['who' => 'vitor', 'text' => $text, 'at' => gmdate('c')]; $n['status'] = 'novo'; } }
    unset($n);
  } else {
    $text = trim((string)($in['text'] ?? ''));
    if ($text === '' || mb_strlen($text) > 5000) { http_response_code(400); echo '{"error":"empty"}'; exit; }
    $tag = in_array($in['tag'] ?? '', ['ideia', 'debater', 'tarefa', 'conteudo', 'outro'], true) ? $in['tag'] : 'ideia';
    $num = 1 + array_reduce($cur, fn($m, $n) => max($m, (int)($n['num'] ?? 0)), count($cur));
    array_unshift($cur, ['id' => bin2hex(random_bytes(6)), 'num' => $num, 'text' => $text, 'tag' => $tag, 'at' => gmdate('c'), 'status' => 'novo']);
  }
  write_store("$store/inbox.json.php", $cur);
  kick_robot();
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
if ($a === 'caption' && $_SERVER['REQUEST_METHOD'] === 'POST') {   // caption edits: {key, en, pt}
  $cur = read_store("$store/captions.json.php") ?? [];
  $k = (string)($in['key'] ?? '');
  if ($k === '' || strlen($k) > 300) { http_response_code(400); echo '{"error":"key"}'; exit; }
  $cur[$k] = ['en' => mb_substr(trim((string)($in['en'] ?? '')), 0, 2000), 'pt' => mb_substr(trim((string)($in['pt'] ?? '')), 0, 2000), 'at' => gmdate('c')];
  write_store("$store/captions.json.php", $cur);
  echo json_encode(['ok' => true, 'robot' => kick_robot()]);
  exit;
}
if ($a === 'review' && $_SERVER['REQUEST_METHOD'] === 'POST') {   // crops looked at: accepted or edited (required before single approve)
  $cur = read_store("$store/reviews.json.php") ?? [];
  $k = (string)($in['key'] ?? '');
  if ($k === '' || strlen($k) > 300) { http_response_code(400); echo '{"error":"key"}'; exit; }
  if (!empty($in['undo'])) unset($cur[$k]); else $cur[$k] = ['how' => ($in['how'] ?? 'aceite') === 'editado' ? 'editado' : 'aceite', 'at' => gmdate('c')];
  write_store("$store/reviews.json.php", $cur);
  echo json_encode(['ok' => true, 'reviews' => $cur], JSON_UNESCAPED_UNICODE);
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
  $kind = in_array(($in['kind'] ?? ''), ['story', 'teaser'], true) ? $in['kind'] : 'post';
  $ck = ($kind === 'post' ? '' : "$kind|") . $stem;
  $hist = read_store("$store/crops_history.json.php") ?? [];
  $hist[$ck] = array_slice(array_merge([$in['previous'] ?? null], $hist[$ck] ?? []), 0, 10);   // undo stack
  write_store("$store/crops_history.json.php", $hist);
  $cur[$ck] = ['project' => $proj, 'kind' => $kind, 'crops' => $cr, 'at' => gmdate('c')];
  if ($kind === 'teaser') $cur[$ck]['src_stem'] = substr((string)($in['src_stem'] ?? ''), 0, 200);
  if (!empty($in['item_key'])) { $rv = read_store("$store/reviews.json.php") ?? []; $rv[(string)$in['item_key']] = ['how' => 'editado', 'at' => gmdate('c')]; write_store("$store/reviews.json.php", $rv); }
  write_store("$store/crops.json.php", $cur);
  echo json_encode(['ok' => true, 'robot' => kick_robot()]);
  exit;
}
http_response_code(400);
echo '{"error":"bad request"}';
