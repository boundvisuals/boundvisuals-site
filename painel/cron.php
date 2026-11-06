<?php
/* Server-side publisher (runs on PTServidor via cPanel cron every 5 min — no GitHub minutes).
   Reads the Painel data (store/data.json.php, built by the robot whenever the queue changes) + the live approvals
   and deletions made in the Painel, and publishes approved items whose time has come:
     feed  → Instagram carousel (+ caption; if Instagram refuses captions: no caption + caption as 1st comment) + Facebook Page
     story → Instagram story      reel → Instagram reel (+ caption)
   State: store/published.json.php (keyed like queue/published.json; the robot merges it back into the repo).
   Rules kept from publish.py: one feed post per run, 2 h between feed posts, stories missed by > 6 h are skipped,
   3 h cooldown after an error, nothing unapproved, nothing deleted.
   Cron command (cPanel → Cron Jobs, every 5 minutes):  php -q /home/boundvis/public_html/painel/cron.php
   Manual run from a browser is refused (CLI only), except ?k=<cron key> for a dry check. */
if (PHP_SAPI !== 'cli') { http_response_code(403); exit('cli only'); }
set_time_limit(280);
date_default_timezone_set('Europe/Lisbon');
$store = __DIR__ . '/store';
$G = 'https://graph.facebook.com/v21.0';

function rs($f) { if (!is_file($f)) return null; $t = file_get_contents($f); $p = strpos($t, "\n"); return json_decode($p === false ? $t : substr($t, $p + 1), true); }
function ws($f, $d) { $tmp = "$f.tmp"; file_put_contents($tmp, "<?php exit; ?>\n" . json_encode($d, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)); rename($tmp, $f); }
function logline($s) { global $store; file_put_contents("$store/cron.log", date('Y-m-d H:i:s') . " $s\n", FILE_APPEND); }

$lock = fopen("$store/cron.lock", 'c'); if (!flock($lock, LOCK_EX | LOCK_NB)) exit;   // never two runs at once
$meta = rs("$store/meta.json.php");                 // {token, ig, page} — uploaded by the robot from GitHub secrets
$data = rs("$store/data.json.php");
if (!$meta || !$data) { logline('missing meta or data'); exit; }
$TOKEN = $meta['token']; $IG = $meta['ig']; $PAGE = $meta['page'];

function api($method, $path, $params = [], $token = null) {
  global $G, $TOKEN;
  $params['access_token'] = $token ?: $TOKEN;
  $ch = curl_init();
  $url = "$G/$path";
  if ($method === 'GET') { $url .= '?' . http_build_query($params); }
  else { curl_setopt($ch, CURLOPT_POST, true); curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params)); }
  curl_setopt_array($ch, [CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 120]);
  $body = curl_exec($ch); $code = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
  $j = json_decode((string)$body, true);
  if ($code >= 400 || !is_array($j)) throw new Exception("$method $path -> $code " . substr((string)$body, 0, 300));
  return $j;
}
function container($params) {
  global $IG;
  for ($i = 0; $i < 4; $i++) {
    $r = api('POST', "$IG/media", $params);
    if (!empty($r['id']) && (string)$r['id'] !== '0') return $r['id'];
    sleep(8 + 8 * $i);
  }
  throw new Exception('container id 0');
}
function ready($cid, $tries = 30) {
  for ($i = 0; $i < $tries; $i++) {
    $r = api('GET', $cid, ['fields' => 'status_code']);
    if (($r['status_code'] ?? '') === 'FINISHED') return;
    if (($r['status_code'] ?? '') === 'ERROR') throw new Exception("container $cid ERROR");
    sleep(5);
  }
  throw new Exception("container $cid not ready");
}
function feed_container($urls, $caption) {
  $cap = $caption !== null ? ['caption' => $caption] : [];
  if (count($urls) === 1) { $c = container(['image_url' => $urls[0]] + $cap); ready($c); return $c; }
  $kids = [];
  foreach ($urls as $u) { $k = container(['image_url' => $u, 'is_carousel_item' => 'true']); $kids[] = $k; }
  foreach ($kids as $k) ready($k);
  sleep(4);
  $c = container(['media_type' => 'CAROUSEL', 'children' => implode(',', $kids)] + $cap); ready($c); return $c;
}

$state = rs("$store/published.json.php") ?? [];
$appr = rs("$store/approvals.json.php") ?? [];
$del = rs("$store/deleted.json.php") ?? [];
$delKeys = array_flip($del['keys'] ?? []);
$delSlides = (array)($del['slides'] ?? []);
$now = time();
$cool = isset($state['_cooldown_until']) ? strtotime($state['_cooldown_until']) : 0;
$scool = isset($state['_cooldown_social_until']) ? strtotime($state['_cooldown_social_until']) : 0;

$items = [];
foreach ($data['calendar'] ?? [] as $day) foreach ($day['items'] as $it) { $it['date'] = $day['date']; $items[] = $it; }
usort($items, fn($a, $b) => strcmp($a['date'] . $a['time'], $b['date'] . $b['time']));

function approved($it) {
  global $appr;
  $a = $appr[$it['key']] ?? null;
  if (is_array($a) && isset($a['v']) && $a['v'] === false) return false;   // un-approved in the Painel
  if (is_string($a)) return true;                                          // approved in the Painel
  return ($it['status'] ?? '') === 'approved';
}

$lastFeed = 0;
foreach ($state as $k => $v) if (is_array($v) && !empty($v['ig']) && substr_count($k, '_') === 1) $lastFeed = max($lastFeed, strtotime($v['at']));
$feedDone = false; $published = [];

foreach ($items as $it) {
  $pk = $it['pkey'] ?? null; if (!$pk || isset($state[$pk]) || isset($delKeys[$it['key']])) continue;
  if (!in_array($it['status'] ?? '', ['approved', 'pending'], true) || !approved($it)) continue;
  $when = strtotime($it['date'] . ' ' . $it['time']);
  if ($when > $now) continue;
  try {
    if ($it['type'] === 'feed') {
      if ($feedDone || $now < $cool || $now - $lastFeed < 2 * 3600) continue;
      $urls = $it['full'] ?? [];
      if (!empty($delSlides[$it['key']])) {                                   // slides removed in the Painel
        $keep = []; foreach (($it['slide_files'] ?? []) as $n => $f) if (!in_array($f, $delSlides[$it['key']], true) && isset($urls[$n])) $keep[] = $urls[$n];
        $urls = $keep;
      }
      if (!$urls) continue;
      $rec = ['at' => date('c')]; $noCap = false;
      try { $c = feed_container($urls, $it['pub']['caption'] ?? ''); }
      catch (Exception $e) { logline("caption refused ({$e->getMessage()}), posting without"); $c = feed_container($urls, null); $noCap = true; }
      $mid = api('POST', "$IG/media_publish", ['creation_id' => $c])['id'];
      $rec['ig'] = $mid;
      try { $rec['ig_link'] = api('GET', $mid, ['fields' => 'permalink'])['permalink'] ?? null; } catch (Exception $e) {}
      if ($noCap) {
        $rec['caption'] = 'TO-FIX: posted as 1st comment';
        try { api('POST', "$mid/comments", ['message' => $it['pub']['plain'] ?? '']); $rec['caption_comment'] = 'ok'; } catch (Exception $e) { $rec['caption_comment'] = 'ERR ' . substr($e->getMessage(), 0, 120); }
      }
      try {                                                                  // Facebook Page mirror
        $ptok = api('GET', $PAGE, ['fields' => 'access_token'])['access_token'];
        $ids = []; foreach ($urls as $u) $ids[] = api('POST', "$PAGE/photos", ['url' => $u, 'published' => 'false'], $ptok)['id'];
        $p = ['message' => $it['pub']['plain'] ?? '']; foreach ($ids as $i => $id) $p["attached_media[$i]"] = json_encode(['media_fbid' => $id]);
        $rec['fb'] = api('POST', "$PAGE/feed", $p, $ptok)['id'];
      } catch (Exception $e) { $rec['fb'] = 'ERR ' . substr($e->getMessage(), 0, 160); }
      $state[$pk] = $rec; $feedDone = true; $lastFeed = $now; $published[] = $it;
      if (!$noCap && !empty($it['pub']['comments'])) $state[$pk]['pending_comments'] = $it['pub']['comments'];   // posted spaced on next runs
    } else {
      if ($now < $scool) continue;
      if ($now - $when > 6 * 3600) { $state[$pk] = ['at' => date('c'), 'skipped' => 'missed window']; continue; }
      $url = $it['full'][0] ?? null; if (!$url) continue;
      if ($it['type'] === 'story') { $c = container(['image_url' => $url, 'media_type' => 'STORIES']); ready($c); }
      else {
        if ($now < $cool) continue;                                          // captions refused → hold reels
        $c = container(['media_type' => 'REELS', 'video_url' => $url, 'cover_url' => $it['cover_url'] ?? '', 'caption' => $it['pub']['caption'] ?? '', 'share_to_feed' => 'true']);
        ready($c, 50);
      }
      $mid = api('POST', "$IG/media_publish", ['creation_id' => $c])['id'];
      $state[$pk] = ['at' => date('c'), 'ig' => $mid];
      if ($it['type'] === 'reel') { try { $state[$pk]['ig_link'] = api('GET', $mid, ['fields' => 'permalink'])['permalink'] ?? null; } catch (Exception $e) {} }
      $published[] = $it;
    }
    ws("$store/published.json.php", $state);
    logline("PUBLISHED {$pk}");
  } catch (Exception $e) {
    logline("ERR {$pk}: " . $e->getMessage());
    if ($it['type'] === 'feed') $state['_cooldown_until'] = date('c', $now + 3 * 3600); else $state['_cooldown_social_until'] = date('c', $now + 3 * 3600);
    ws("$store/published.json.php", $state);
    break;
  }
}

// extra hashtag comments: one per run, at least 2 min apart, stop at the first refusal
foreach ($state as $k => &$v) {
  if (!is_array($v) || empty($v['pending_comments']) || empty($v['ig'])) continue;
  if (isset($v['last_comment']) && $now - strtotime($v['last_comment']) < 120) break;
  $msg = array_shift($v['pending_comments']);
  try { api('POST', "{$v['ig']}/comments", ['message' => $msg]); $v['last_comment'] = date('c'); }
  catch (Exception $e) { $v['pending_comments'] = []; $v['comments_error'] = substr($e->getMessage(), 0, 120); }
  ws("$store/published.json.php", $state);
  break;
}
unset($v);

// phone notification for what went out (push.php sends each id once)
if ($published) {
  $n = rs("$store/notify.json.php") ?? [];
  foreach ($published as $it) {
    $t = $it['type'] === 'feed' ? 'post' : $it['type'];
    $n[] = ['id' => 'pub-' . md5($it['pkey']), 'title' => "Publicado no Instagram: " . ($it['project_title'] ?? $it['project']),
                     'body' => ucfirst($t) . ' das ' . $it['time'] . (isset($state[$it['pkey']]['caption']) ? ' · saiu sem legenda — copia-a no Painel' : ''), 'url' => '/painel/'];
  }
  ws("$store/notify.json.php", $n);
  @file_get_contents('https://www.boundvisuals.com/painel/push.php?a=run');
}

// daily Instagram numbers (once a day, after 07:00)
$st = rs("$store/ig_stats.json.php") ?? [];
if (($st['day'] ?? '') !== date('Y-m-d') && (int)date('G') >= 7) {
  try {
    $u = api('GET', $IG, ['fields' => 'followers_count,media_count,username']);
    $st['day'] = date('Y-m-d'); $st['now'] = $u; $st['history'][date('Y-m-d')] = $u['followers_count'] ?? null;
    ws("$store/ig_stats.json.php", $st);
  } catch (Exception $e) { logline('stats ERR ' . substr($e->getMessage(), 0, 120)); }
}

// start the GitHub robot (re-renders crops, applies approvals to the repo) once, 5 min after the last click in the Painel
$dirty = "$store/robot_dirty";
if (is_file($dirty) && time() - filemtime($dirty) >= 300) {
  $t = (rs("$store/gh.json.php") ?? [])['token'] ?? '';
  if ($t !== '') {
    $ch = curl_init('https://api.github.com/repos/boundvisuals/boundvisuals-site/actions/workflows/painel.yml/dispatches');
    curl_setopt_array($ch, [CURLOPT_POST => true, CURLOPT_POSTFIELDS => '{"ref":"main"}', CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 15,
      CURLOPT_HTTPHEADER => ["Authorization: Bearer $t", 'Accept: application/vnd.github+json', 'User-Agent: bv-painel', 'Content-Type: application/json']]);
    curl_exec($ch); $code = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
    if ($code === 204) { unlink($dirty); logline('robot started'); } else logline("robot start error $code");
  }
}
// same after something was published, so the repo + Painel catch up
if ($published) @touch($dirty);
