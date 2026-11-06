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
ini_set('memory_limit', '1024M');
date_default_timezone_set('Europe/Lisbon');
$store = __DIR__ . '/store';
$G = 'https://graph.facebook.com/v21.0';

function rs($f) { if (!is_file($f)) return null; $t = file_get_contents($f); $p = strpos($t, "\n"); return json_decode($p === false ? $t : substr($t, $p + 1), true); }
function ws($f, $d) { $tmp = "$f.tmp"; file_put_contents($tmp, "<?php exit; ?>\n" . json_encode($d, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)); rename($tmp, $f); }
function logline($s) { global $store; file_put_contents("$store/cron.log", date('Y-m-d H:i:s') . " $s\n", FILE_APPEND); }

$lock = fopen("$store/cron.lock", 'c'); if (!flock($lock, LOCK_EX | LOCK_NB)) exit;   // never two runs at once
$meta = rs("$store/meta.json.php");                 // {token, ig, page} — uploaded by the robot from GitHub secrets
$data = rs("$store/data.json.php");
if (!$meta || !$data) {
  $why = [];
  foreach (['meta', 'data'] as $n) { $f = "$store/$n.json.php"; $t = is_file($f) ? file_get_contents($f) : ''; $p = strpos($t, "\n");
    json_decode($p === false ? $t : substr($t, $p + 1), true); $why[] = "$n: " . strlen($t) . ' bytes, ' . json_last_error_msg() . ', starts ' . json_encode(substr($t, 0, 20)); }
  logline('missing meta or data · ' . implode(' | ', $why)); exit;
}
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
$rcool = isset($state['_cooldown_reel_until']) ? strtotime($state['_cooldown_reel_until']) : 0;

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
      $noCap = false;
      if ($it['type'] === 'story') { $c = container(['image_url' => $url, 'media_type' => 'STORIES']); ready($c); }
      else {
        if ($now < $cool || $now < $rcool) continue;                         // feed/reel error cooldown → hold reels
        $rp = ['media_type' => 'REELS', 'video_url' => $url, 'cover_url' => $it['cover_url'] ?? '', 'share_to_feed' => 'true'];
        try { $c = container($rp + ['caption' => $it['pub']['caption'] ?? '']); ready($c, 50); }
        catch (Exception $e) {                                               // same fallback as feed: no caption, caption as 1st comment
          logline("reel caption refused ({$e->getMessage()}), posting without");
          $c = container($rp); ready($c, 50); $noCap = true;
        }
      }
      $mid = api('POST', "$IG/media_publish", ['creation_id' => $c])['id'];
      $state[$pk] = ['at' => date('c'), 'ig' => $mid];
      if ($it['type'] === 'reel') {
        try { $state[$pk]['ig_link'] = api('GET', $mid, ['fields' => 'permalink'])['permalink'] ?? null; } catch (Exception $e) {}
        if ($noCap) {
          $state[$pk]['caption'] = 'TO-FIX: posted as 1st comment';
          try { api('POST', "$mid/comments", ['message' => $it['pub']['plain'] ?? '']); $state[$pk]['caption_comment'] = 'ok'; } catch (Exception $e) { $state[$pk]['caption_comment'] = 'ERR ' . substr($e->getMessage(), 0, 120); }
        }
      }
      $published[] = $it;
    }
    ws("$store/published.json.php", $state);
    logline("PUBLISHED {$pk}");
  } catch (Exception $e) {
    logline("ERR {$pk}: " . $e->getMessage());
    $ck = $it['type'] === 'feed' ? '_cooldown_until' : ($it['type'] === 'reel' ? '_cooldown_reel_until' : '_cooldown_social_until');   // a reel error no longer stops stories
    $state[$ck] = date('c', $now + 3 * 3600);
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



// ---------------------------------------------------------------- LinkedIn (personal profile)
// Tue/Thu/Sat from 12:30: the latest feed post that already went out on Instagram, up to 4 images, English caption + site link.
$oa = rs("$store/oauth.json.php") ?? [];
$li = $oa['linkedin'] ?? [];
if (!empty($li['access_token']) && !empty($li['person_urn']) && in_array((int)date('N'), [2, 4, 6], true) && date('H:i') >= '12:30'
    && ($li['expires_at'] ?? PHP_INT_MAX) > time()) {
  $lst = rs("$store/linkedin.json.php") ?? [];
  if (($lst['last_day'] ?? '') !== date('Y-m-d')) {
    $cand = null;
    foreach (array_reverse($items) as $it) {
      if ($it['type'] !== 'feed' || empty($state[$it['pkey']]['ig']) || isset($lst['done'][$it['pkey']])) continue;
      $cand = $it; break;
    }
    if ($cand) {
      $V = '202509';
      $H = ["Authorization: Bearer {$li['access_token']}", "LinkedIn-Version: $V", 'X-Restli-Protocol-Version: 2.0.0', 'Content-Type: application/json'];
      $req = function ($method, $url, $body = null, $headers = null) use ($H) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [CURLOPT_CUSTOMREQUEST => $method, CURLOPT_RETURNTRANSFER => true, CURLOPT_HEADER => true, CURLOPT_TIMEOUT => 120,
          CURLOPT_HTTPHEADER => $headers ?? $H]);
        if ($body !== null) curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        $raw = curl_exec($ch); $code = curl_getinfo($ch, CURLINFO_HTTP_CODE); $hs = curl_getinfo($ch, CURLINFO_HEADER_SIZE); curl_close($ch);
        return [$code, substr((string)$raw, 0, $hs), json_decode(substr((string)$raw, $hs), true)];
      };
      try {
        $ids = [];
        $files = array_values(array_filter($cand['slide_files'] ?? [], fn($f) => !str_ends_with($f, '-full.jpg')));
        foreach (array_slice($files, 0, 4) as $f) {
          $path = dirname(__DIR__) . "/bv-fila/{$cand['project']}/$f";
          if (!is_file($path)) continue;
          [$c1, , $j] = $req('POST', 'https://api.linkedin.com/rest/images?action=initializeUpload', json_encode(['initializeUploadRequest' => ['owner' => $li['person_urn']]]));
          if ($c1 >= 300) throw new Exception("init $c1 " . json_encode($j));
          [$c2] = $req('PUT', $j['value']['uploadUrl'], file_get_contents($path), ["Authorization: Bearer {$li['access_token']}", 'Content-Type: image/jpeg']);
          if ($c2 >= 300) throw new Exception("upload $c2");
          $ids[] = $j['value']['image'];
        }
        if (!$ids) throw new Exception('no images');
        $esc = fn($t) => preg_replace('/([\\|{}@\[\]()<>#*_~])/', '\\$1', $t);
        $tags = implode(' ', array_map(fn($t) => '{hashtag|\\#|' . $t . '}', ['archviz', '3dvisualization', 'architecture', 'coronarenderer', 'ai']));
        $text = $esc(trim((string)($cand['caption'] ?? '')) . "\n\nMore of my work: https://www.boundvisuals.com") . "\n\n" . $tags;
        $content = count($ids) === 1 ? ['media' => ['id' => $ids[0]]] : ['multiImage' => ['images' => array_map(fn($i) => ['id' => $i], $ids)]];
        $post = ['author' => $li['person_urn'], 'commentary' => $text, 'visibility' => 'PUBLIC',
                 'distribution' => ['feedDistribution' => 'MAIN_FEED', 'targetEntities' => [], 'thirdPartyDistributionChannels' => []],
                 'content' => $content, 'lifecycleState' => 'PUBLISHED', 'isReshareDisabledByAuthor' => false];
        [$c3, $hdr, $j3] = $req('POST', 'https://api.linkedin.com/rest/posts', json_encode($post, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        if ($c3 >= 300) throw new Exception("post $c3 " . json_encode($j3));
        preg_match('/x-restli-id:\s*(\S+)/i', $hdr, $m);
        $lst['done'][$cand['pkey']] = ['at' => date('c'), 'id' => $m[1] ?? ''];
        $lst['last_day'] = date('Y-m-d');
        logline("LINKEDIN posted {$cand['pkey']}");
        $n = rs("$store/notify.json.php") ?? [];
        $n[] = ['id' => 'li-' . md5($cand['pkey']), 'title' => 'Publicado no LinkedIn: ' . ($cand['project_title'] ?? $cand['project']), 'body' => count($ids) . ' imagens + legenda', 'url' => '/painel/'];
        ws("$store/notify.json.php", $n);
      } catch (Exception $e) {
        $lst['last_day'] = date('Y-m-d'); $lst['last_error'] = date('c') . ' ' . substr($e->getMessage(), 0, 300);
        logline('LINKEDIN ERR ' . substr($e->getMessage(), 0, 200));
      }
      ws("$store/linkedin.json.php", $lst);
    }
  }
}

// ---------------------------------------------------------------- YouTube Shorts
// Every reel that went out on Instagram is uploaded to YouTube as a Short (one per run, resumable upload, token refresh).
$yt = $oa['youtube'] ?? [];
if (!empty($yt['refresh_token']) || !empty($yt['access_token'])) {
  $yst = rs("$store/youtube.json.php") ?? [];
  $cand = null;
  foreach ($items as $it) {
    if ($it['type'] !== 'reel' || empty($state[$it['pkey']]['ig']) || isset($yst['done'][$it['pkey']])) continue;
    if (isset($yst['fail'][$it['pkey']]) && $yst['fail'][$it['pkey']] >= 3) continue;
    $cand = $it; break;
  }
  if ($cand) {
    try {
      if (empty($yt['access_token']) || ($yt['expires_at'] ?? 0) < time() + 300) {          // refresh the 1-hour token
        $ch = curl_init('https://oauth2.googleapis.com/token');
        curl_setopt_array($ch, [CURLOPT_POST => true, CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 30, CURLOPT_POSTFIELDS => http_build_query([
          'grant_type' => 'refresh_token', 'refresh_token' => $yt['refresh_token'], 'client_id' => $yt['client_id'], 'client_secret' => $yt['client_secret']])]);
        $j = json_decode((string)curl_exec($ch), true); curl_close($ch);
        if (empty($j['access_token'])) throw new Exception('token refresh failed ' . json_encode($j));
        $yt['access_token'] = $j['access_token']; $yt['expires_at'] = time() + (int)($j['expires_in'] ?? 3600);
        $oa['youtube'] = $yt; ws("$store/oauth.json.php", $oa);
      }
      $file = basename(parse_url($cand['full'][0], PHP_URL_PATH));
      $path = dirname(__DIR__) . "/bv-fila/{$cand['project']}/reel/" . rawurldecode($file);
      if (!is_file($path)) throw new Exception("video file missing $path");
      $cap = trim(explode("\n", (string)($cand['caption'] ?? ''))[0]);
      $title = mb_substr($cap !== '' ? $cap : ($cand['project_title'] ?? 'Bound Visuals'), 0, 90) . ' #Shorts';
      $desc = trim(($cand['pub']['plain'] ?? $cand['caption'] ?? '')) . "\n\nVítor Hugo · Bound Visuals — 3D architecture visualization + AI\nhttps://www.boundvisuals.com\n\n#archviz #3dvisualization #architecture #shorts";
      $meta = ['snippet' => ['title' => $title, 'description' => mb_substr($desc, 0, 4900), 'tags' => ['archviz', 'architecture', '3d visualization', 'render', 'corona renderer', 'ai'], 'categoryId' => '22'],
               'status' => ['privacyStatus' => 'public', 'selfDeclaredMadeForKids' => false]];
      $ch = curl_init('https://www.googleapis.com/upload/youtube/v3/videos?uploadType=resumable&part=snippet,status');
      curl_setopt_array($ch, [CURLOPT_POST => true, CURLOPT_RETURNTRANSFER => true, CURLOPT_HEADER => true, CURLOPT_TIMEOUT => 60,
        CURLOPT_POSTFIELDS => json_encode($meta, JSON_UNESCAPED_UNICODE), CURLOPT_HTTPHEADER => ["Authorization: Bearer {$yt['access_token']}",
        'Content-Type: application/json; charset=UTF-8', 'X-Upload-Content-Type: video/mp4', 'X-Upload-Content-Length: ' . filesize($path)]]);
      $raw = (string)curl_exec($ch); $code = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
      if ($code !== 200 || !preg_match('/^location:\s*(\S+)/mi', $raw, $m)) throw new Exception("init $code " . substr($raw, -300));
      $fh = fopen($path, 'rb');
      $ch = curl_init(trim($m[1]));
      curl_setopt_array($ch, [CURLOPT_PUT => true, CURLOPT_INFILE => $fh, CURLOPT_INFILESIZE => filesize($path), CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 240,
        CURLOPT_HTTPHEADER => ["Authorization: Bearer {$yt['access_token']}", 'Content-Type: video/mp4']]);
      $body = (string)curl_exec($ch); $code = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch); fclose($fh);
      $j = json_decode($body, true);
      if ($code >= 300 || empty($j['id'])) throw new Exception("upload $code " . substr($body, 0, 300));
      $yst['done'][$cand['pkey']] = ['at' => date('c'), 'id' => $j['id'], 'privacy' => $j['status']['privacyStatus'] ?? '?'];
      logline("YOUTUBE uploaded {$cand['pkey']} -> {$j['id']}");
      $n = rs("$store/notify.json.php") ?? [];
      $n[] = ['id' => 'yt-' . md5($cand['pkey']), 'title' => 'Short no YouTube: ' . ($cand['project_title'] ?? $cand['project']), 'body' => 'https://youtube.com/shorts/' . $j['id'], 'url' => '/painel/'];
      ws("$store/notify.json.php", $n);
    } catch (Exception $e) {
      $yst['fail'][$cand['pkey']] = ($yst['fail'][$cand['pkey']] ?? 0) + 1;
      $yst['last_error'] = date('c') . ' ' . substr($e->getMessage(), 0, 300);
      logline('YOUTUBE ERR ' . substr($e->getMessage(), 0, 200));
    }
    ws("$store/youtube.json.php", $yst);
  }
}

// ---------------------------------------------------------------- Threads
// Every feed post that went out on Instagram is mirrored to Threads (up to 10 images, caption ≤500 chars), one per run.
$th = $oa['threads'] ?? [];
if (!empty($th['access_token']) && !empty($th['user_id'])) {
  $tst = rs("$store/threads.json.php") ?? [];
  if (($th['expires_at'] ?? 0) < time() + 10 * 86400) {                                    // keep the 60-day token alive
    $ch = curl_init('https://graph.threads.net/refresh_access_token?' . http_build_query(['grant_type' => 'th_refresh_token', 'access_token' => $th['access_token']]));
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 20]); $j = json_decode((string)curl_exec($ch), true); curl_close($ch);
    if (!empty($j['access_token'])) { $th['access_token'] = $j['access_token']; $th['expires_at'] = time() + (int)($j['expires_in'] ?? 5184000); $oa['threads'] = $th; ws("$store/oauth.json.php", $oa); }
  }
  $cand = null;
  foreach ($items as $it) {
    if ($it['type'] !== 'feed' || empty($state[$it['pkey']]['ig']) || isset($tst['done'][$it['pkey']])) continue;
    if (($tst['fail'][$it['pkey']] ?? 0) >= 3 || $now - strtotime($state[$it['pkey']]['at']) < 600) continue;   // 10 min after Instagram
    $cand = $it; break;
  }
  if ($cand) {
    $T = 'https://graph.threads.net/v1.0';
    $tp = function ($path, $params) use ($T, $th) {
      $ch = curl_init("$T/$path"); $params['access_token'] = $th['access_token'];
      curl_setopt_array($ch, [CURLOPT_POST => true, CURLOPT_POSTFIELDS => http_build_query($params), CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 60]);
      $j = json_decode((string)curl_exec($ch), true); $code = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
      if ($code >= 300 || empty($j['id'])) throw new Exception("$path $code " . json_encode($j)); return $j['id'];
    };
    try {
      $urls = array_slice($cand['full'] ?? [], 0, 10);
      $text = mb_substr(trim((string)($cand['caption'] ?? '')) . "\n\nboundvisuals.com", 0, 490);
      $uid = $th['user_id'];
      if (count($urls) === 1) $cid = $tp("$uid/threads", ['media_type' => 'IMAGE', 'image_url' => $urls[0], 'text' => $text]);
      else {
        $kids = []; foreach ($urls as $u) $kids[] = $tp("$uid/threads", ['media_type' => 'IMAGE', 'image_url' => $u, 'is_carousel_item' => 'true']);
        sleep(20);
        $cid = $tp("$uid/threads", ['media_type' => 'CAROUSEL', 'children' => implode(',', $kids), 'text' => $text]);
      }
      sleep(25);
      $mid = $tp("$uid/threads_publish", ['creation_id' => $cid]);
      $tst['done'][$cand['pkey']] = ['at' => date('c'), 'id' => $mid];
      logline("THREADS posted {$cand['pkey']}");
    } catch (Exception $e) {
      $tst['fail'][$cand['pkey']] = ($tst['fail'][$cand['pkey']] ?? 0) + 1; $tst['last_error'] = date('c') . ' ' . substr($e->getMessage(), 0, 300);
      logline('THREADS ERR ' . substr($e->getMessage(), 0, 200));
    }
    ws("$store/threads.json.php", $tst);
  }
}
