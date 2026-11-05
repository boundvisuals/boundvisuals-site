<?php
// Painel · Ligar redes — one-time OAuth connection for Pinterest, LinkedIn (personal) and YouTube.
// Vítor pastes each app's Client ID + Secret here once, presses "Ligar", logs in, and the tokens are stored
// on HIS server (store/oauth.json.php, never served: first line is a PHP exit). Robots read them via FTP later.
// Nothing here publishes anything. "Desligar" removes the tokens (the app keys stay, so it can be redone in 1 click).
require __DIR__ . '/config.php';
header('X-Robots-Tag: noindex, nofollow');
header('Cache-Control: no-store');
header('Referrer-Policy: no-referrer');

$ok = isset($_COOKIE['bv_k']) && hash_equals($BV_KEY_HASH, hash('sha256', $_COOKIE['bv_k']));
if (!$ok) { http_response_code(401); echo 'Acesso privado.'; exit; }

$store = __DIR__ . '/store';
if (!is_dir($store)) mkdir($store, 0755, true);
function rd($f) { if (!file_exists($f)) return []; $r = file_get_contents($f); $n = strpos($r, "\n");
  return json_decode($n === false ? $r : substr($r, $n + 1), true) ?: []; }
function wr($f, $d) { file_put_contents($f, "<?php exit; ?>\n" . json_encode($d, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), LOCK_EX); }
function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

$REDIRECT = 'https://www.boundvisuals.com/painel/ligar.php';
$NETS = [
  'pinterest' => [
    'name' => 'Pinterest', 'console' => 'https://developers.pinterest.com/apps/',
    'auth' => 'https://www.pinterest.com/oauth/', 'token' => 'https://api.pinterest.com/v5/oauth/token',
    'scope' => 'boards:read,boards:write,pins:read,pins:write,user_accounts:read', 'basic' => true,
  ],
  'linkedin' => [
    'name' => 'LinkedIn (perfil pessoal)', 'console' => 'https://www.linkedin.com/developers/apps',
    'auth' => 'https://www.linkedin.com/oauth/v2/authorization', 'token' => 'https://www.linkedin.com/oauth/v2/accessToken',
    'scope' => 'openid profile w_member_social', 'basic' => false,
  ],
  'youtube' => [
    'name' => 'YouTube (Shorts)', 'console' => 'https://console.cloud.google.com/apis/credentials',
    'auth' => 'https://accounts.google.com/o/oauth2/v2/auth', 'token' => 'https://oauth2.googleapis.com/token',
    'scope' => 'https://www.googleapis.com/auth/youtube.upload https://www.googleapis.com/auth/youtube.readonly', 'basic' => false,
    'extra' => ['access_type' => 'offline', 'prompt' => 'consent'],
  ],
];
$F = "$store/oauth.json.php"; $S = "$store/oauth-state.json.php";
$all = rd($F); $msg = ''; $err = '';

function http_post($url, $fields, $basic = null) {
  $ch = curl_init($url);
  $hd = ['Content-Type: application/x-www-form-urlencoded', 'Accept: application/json', 'User-Agent: bv-painel'];
  if ($basic) $hd[] = 'Authorization: Basic ' . base64_encode($basic);
  curl_setopt_array($ch, [CURLOPT_POST => true, CURLOPT_POSTFIELDS => http_build_query($fields), CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 20, CURLOPT_HTTPHEADER => $hd]);
  $body = curl_exec($ch); $code = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
  return [$code, json_decode((string)$body, true) ?: ['raw' => substr((string)$body, 0, 300)]];
}
function http_get($url, $token) {
  $ch = curl_init($url);
  curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 20,
    CURLOPT_HTTPHEADER => ["Authorization: Bearer $token", 'Accept: application/json', 'User-Agent: bv-painel']]);
  $body = curl_exec($ch); $code = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
  return [$code, json_decode((string)$body, true) ?: []];
}

// 1) Save app keys
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['net'], $NETS[$_POST['net']])) {
  $n = $_POST['net']; $cur = $all[$n] ?? [];
  if (($_POST['do'] ?? '') === 'keys') {
    $id = trim((string)($_POST['client_id'] ?? '')); $sec = trim((string)($_POST['client_secret'] ?? ''));
    if ($id === '' || strlen($id) > 200 || preg_match('/\s/', $id)) $err = 'Client ID inválido.';
    else { $cur['client_id'] = $id; if ($sec !== '') $cur['client_secret'] = $sec; $all[$n] = $cur; wr($F, $all); $msg = $NETS[$n]['name'] . ': chaves guardadas. Agora carrega em «Ligar».'; }
  } elseif (($_POST['do'] ?? '') === 'off') {
    foreach (['access_token', 'refresh_token', 'expires_at', 'refresh_expires_at', 'connected_at', 'account', 'person_urn', 'scope_granted'] as $k) unset($cur[$k]);
    $all[$n] = $cur; wr($F, $all); $msg = $NETS[$n]['name'] . ' desligado (as chaves da app ficaram; podes voltar a ligar com 1 clique).';
  }
}

// 2) Start login at the network
if (isset($_GET['go'], $NETS[$_GET['go']])) {
  $n = $_GET['go']; $c = $all[$n] ?? [];
  if (empty($c['client_id']) || empty($c['client_secret'])) { $err = 'Primeiro guarda o Client ID e o Client Secret.'; }
  else {
    $st = bin2hex(random_bytes(16)); wr($S, ['state' => $st, 'net' => $n, 'at' => time()]);
    $q = ['client_id' => $c['client_id'], 'redirect_uri' => $REDIRECT, 'response_type' => 'code', 'scope' => $NETS[$n]['scope'], 'state' => $st] + ($NETS[$n]['extra'] ?? []);
    header('Location: ' . $NETS[$n]['auth'] . '?' . http_build_query($q)); exit;
  }
}

// 3) Callback from the network
if (isset($_GET['state']) && (isset($_GET['code']) || isset($_GET['error']))) {
  $s = rd($S); @unlink($S);
  if (empty($s['state']) || !hash_equals($s['state'], (string)$_GET['state']) || time() - ($s['at'] ?? 0) > 900) $err = 'Ligação expirou ou não começou aqui. Carrega outra vez em «Ligar».';
  elseif (isset($_GET['error'])) $err = 'A rede recusou: ' . h($_GET['error_description'] ?? $_GET['error']);
  else {
    $n = $s['net']; $c = $all[$n]; $cfg = $NETS[$n];
    $fields = ['grant_type' => 'authorization_code', 'code' => (string)$_GET['code'], 'redirect_uri' => $REDIRECT];
    if ($cfg['basic']) [$code, $j] = http_post($cfg['token'], $fields, $c['client_id'] . ':' . $c['client_secret']);
    else [$code, $j] = http_post($cfg['token'], $fields + ['client_id' => $c['client_id'], 'client_secret' => $c['client_secret']]);
    if ($code !== 200 || empty($j['access_token'])) $err = "Erro ao trocar o código ($code): " . h($j['error_description'] ?? $j['message'] ?? $j['error'] ?? json_encode($j));
    else {
      $c['access_token'] = $j['access_token'];
      if (!empty($j['refresh_token'])) $c['refresh_token'] = $j['refresh_token'];
      $c['expires_at'] = isset($j['expires_in']) ? time() + (int)$j['expires_in'] : null;
      $c['refresh_expires_at'] = isset($j['refresh_token_expires_in']) ? time() + (int)$j['refresh_token_expires_in'] : ($c['refresh_expires_at'] ?? null);
      $c['scope_granted'] = $j['scope'] ?? '';
      $c['connected_at'] = gmdate('c');
      if ($n === 'linkedin') { [$k, $u] = http_get('https://api.linkedin.com/v2/userinfo', $c['access_token']);
        if ($k === 200 && !empty($u['sub'])) { $c['person_urn'] = 'urn:li:person:' . $u['sub']; $c['account'] = $u['name'] ?? ''; } }
      if ($n === 'pinterest') { [$k, $u] = http_get('https://api.pinterest.com/v5/user_account', $c['access_token']); if ($k === 200) $c['account'] = $u['username'] ?? ''; }
      if ($n === 'youtube') { [$k, $u] = http_get('https://www.googleapis.com/youtube/v3/channels?part=snippet&mine=true', $c['access_token']);
        if ($k === 200) $c['account'] = $u['items'][0]['snippet']['title'] ?? ''; }
      $all[$n] = $c; wr($F, $all); $msg = $cfg['name'] . ' ligado ✓' . (!empty($c['account']) ? ' — conta: ' . h($c['account']) : '');
    }
  }
}

function fdate($t) { return $t ? date('d/m/Y', $t) : '—'; }
?><!doctype html><html lang="pt"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow"><title>Ligar redes · Painel</title>
<style>
:root{--bg:#0b0c0c;--fg:#e5e5e3;--mut:#c5c1b7;--card:#151717;--line:#2a2d2d;--ok:#7fc79a;--bad:#e7a08a}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--fg);font:15px/1.5 system-ui,-apple-system,"Segoe UI",sans-serif}
main{max-width:860px;margin:0 auto;padding:20px 16px 60px}a{color:var(--fg)}h1{font-weight:500;font-size:22px;margin:6px 0 4px}
.sub{color:var(--mut);font-size:13px}.card{background:var(--card);border:1px solid var(--line);border-radius:14px;padding:16px;margin:14px 0}
h2{font-size:17px;font-weight:500;margin:0 0 6px;display:flex;justify-content:space-between;gap:10px;align-items:center;flex-wrap:wrap}
.pill{font-size:12px;border-radius:99px;padding:2px 10px;border:1px solid var(--line);color:var(--mut)}.pill.on{color:var(--ok);border-color:var(--ok)}
label{display:block;font-size:13px;color:var(--mut);margin:10px 0 4px}input{width:100%;padding:10px;border-radius:9px;border:1px solid var(--line);background:#0f1111;color:var(--fg);font:inherit}
.row{display:flex;gap:8px;flex-wrap:wrap;margin-top:12px}.btn{display:inline-block;padding:9px 14px;border-radius:9px;border:1px solid var(--line);background:#1d2020;color:var(--fg);font:inherit;cursor:pointer;text-decoration:none}
.btn.pri{background:var(--fg);color:var(--bg);border-color:var(--fg)}.msg{padding:10px 14px;border-radius:10px;margin:12px 0;border:1px solid var(--ok);color:var(--ok)}.msg.err{border-color:var(--bad);color:var(--bad)}
code{background:#0f1111;border:1px solid var(--line);border-radius:6px;padding:2px 6px;word-break:break-all;font-size:13px}ol{padding-left:20px;margin:6px 0}li{margin:3px 0}
details summary{cursor:pointer;color:var(--mut);margin-top:10px}
</style></head><body><main>
<a class="sub" href="/painel/">← Painel</a>
<h1>Ligar redes</h1>
<p class="sub">Faz-se uma vez por rede. Nada é publicado daqui; os robôs só usam estas ligações quando aprovares no Calendário. As chaves ficam no teu servidor, não no GitHub.</p>
<?php if ($msg) echo '<div class="msg">' . $msg . '</div>'; if ($err) echo '<div class="msg err">' . $err . '</div>'; ?>
<div class="card"><b style="font-weight:500">Endereço de retorno (Redirect URI)</b>
<p class="sub" style="margin:4px 0 8px">Em cada rede vais colar exatamente isto no campo «Redirect URI» / «Authorized redirect URIs»:</p>
<code id="ru"><?= h($REDIRECT) ?></code> <button class="btn" onclick="navigator.clipboard.writeText(document.getElementById('ru').textContent);this.textContent='Copiado ✓'">Copiar</button></div>
<?php foreach ($NETS as $n => $cfg): $c = $all[$n] ?? []; $on = !empty($c['access_token']); ?>
<div class="card" id="<?= $n ?>">
<h2><?= h($cfg['name']) ?> <span class="pill <?= $on ? 'on' : '' ?>"><?= $on ? 'Ligado' . (!empty($c['account']) ? ' · ' . h($c['account']) : '') : (!empty($c['client_id']) ? 'Chaves guardadas · falta ligar' : 'Por ligar') ?></span></h2>
<?php if ($on): ?><div class="sub">Ligado a <?= h(substr($c['connected_at'] ?? '', 0, 10)) ?> · acesso válido até <?= fdate($c['expires_at'] ?? null) ?><?= !empty($c['refresh_token']) ? ' (renova-se sozinho' . (!empty($c['refresh_expires_at']) ? ' até ' . fdate($c['refresh_expires_at']) : '') . ')' : ' (sem renovação automática: volta a carregar «Ligar» antes desta data; eu aviso-te)' ?></div><?php endif; ?>
<form method="post" action="ligar.php#<?= $n ?>"><input type="hidden" name="net" value="<?= $n ?>"><input type="hidden" name="do" value="keys">
<label>Client ID <?= $n === 'pinterest' ? '(«App id»)' : '' ?></label><input name="client_id" autocomplete="off" value="<?= h($c['client_id'] ?? '') ?>" placeholder="cola aqui">
<label>Client Secret <?= $n === 'pinterest' ? '(«App secret key»)' : ($n === 'linkedin' ? '(«Primary Client Secret»)' : '') ?></label><input name="client_secret" type="password" autocomplete="off" placeholder="<?= !empty($c['client_secret']) ? '•••• guardado (vazio = manter)' : 'cola aqui' ?>">
<div class="row"><button class="btn">Guardar chaves</button>
<a class="btn pri" href="ligar.php?go=<?= $n ?>"><?= $on ? 'Voltar a ligar' : 'Ligar' ?></a></div></form>
<?php if ($on): ?><form method="post" action="ligar.php#<?= $n ?>" onsubmit="return confirm('Desligar <?= h($cfg['name']) ?>?')"><input type="hidden" name="net" value="<?= $n ?>"><input type="hidden" name="do" value="off"><div class="row"><button class="btn">Desligar</button></div></form><?php endif; ?>
<details><summary>Passo a passo (clique a clique)</summary>
<?php if ($n === 'pinterest'): ?><ol>
<li>Abre <a href="https://www.pinterest.com/business/convert/" target="_blank" rel="noopener">pinterest.com/business/convert</a> e confirma que a tua conta é de empresa (se já for, salta).</li>
<li>Abre <a href="<?= $cfg['console'] ?>" target="_blank" rel="noopener">developers.pinterest.com/apps</a> → <b>Connect app</b> (ou «Create app»).</li>
<li>Nome: <code>Bound Visuals Publisher</code> · Site: <code>https://www.boundvisuals.com</code> · Descrição: <code>Publishes my own 3D work to my Pinterest boards.</code> → <b>Submit</b>.</li>
<li>Na app, em <b>Configure</b> → <b>Redirect URIs</b>, cola o endereço de retorno acima → <b>Add</b> → <b>Save</b>.</li>
<li>Copia o <b>App id</b> e o <b>App secret key</b> (botão «Show») para os campos acima → <b>Guardar chaves</b> → <b>Ligar</b> → <b>Give access</b>.</li>
<li>Deves ver «Pinterest ligado ✓». Nota: no início a app está em «Trial access» (os pins só tu os vês). Eu preparo o pedido de «Standard access» e digo-te quando carregar no botão.</li></ol>
<?php elseif ($n === 'linkedin'): ?><ol>
<li>Abre <a href="<?= $cfg['console'] ?>" target="_blank" rel="noopener">linkedin.com/developers/apps</a> → <b>Create app</b>.</li>
<li>App name: <code>Vítor Hugo Publisher</code> · LinkedIn Page: escolhe a página <b>Bound Visuals</b> (é obrigatório indicar uma, não publica lá) · Logo: o teu avatar → aceita os termos → <b>Create app</b>.</li>
<li>Separador <b>Products</b> → em «Share on LinkedIn» carrega <b>Request access</b> → aceita; depois em «Sign In with LinkedIn using OpenID Connect» → <b>Request access</b>. Os dois ficam «Added» em segundos.</li>
<li>Separador <b>Auth</b> → «Authorized redirect URLs for your app» → lápis ✎ → <b>Add redirect URL</b> → cola o endereço de retorno → <b>Update</b>.</li>
<li>No mesmo separador copia <b>Client ID</b> e <b>Primary Client Secret</b> para os campos acima → <b>Guardar chaves</b> → <b>Ligar</b> → <b>Allow</b>.</li>
<li>A ligação dura 60 dias; eu aviso-te uma semana antes para carregares outra vez em «Voltar a ligar» (10 segundos).</li></ol>
<?php else: ?><ol>
<li>Abre <a href="https://console.cloud.google.com/projectcreate" target="_blank" rel="noopener">console.cloud.google.com/projectcreate</a> com a conta Google do teu canal YouTube → Project name <code>Bound Visuals Publisher</code> → <b>Create</b>.</li>
<li>Abre <a href="https://console.cloud.google.com/apis/library/youtube.googleapis.com" target="_blank" rel="noopener">YouTube Data API v3</a> (confirma que no topo está o projeto novo) → <b>Enable</b>.</li>
<li>Abre <a href="https://console.cloud.google.com/auth/branding" target="_blank" rel="noopener">Google Auth Platform → Branding</a> → <b>Get started</b> → App name <code>Bound Visuals Publisher</code>, o teu email → Audience <b>External</b> → contacto: o teu email → aceita → <b>Create</b>.</li>
<li><a href="https://console.cloud.google.com/auth/audience" target="_blank" rel="noopener">Audience</a> → <b>Publish app</b> → <b>Confirm</b> (importante: em «Testing» a ligação morre ao fim de 7 dias; não precisas de verificação da Google para uso só teu).</li>
<li><a href="https://console.cloud.google.com/auth/clients" target="_blank" rel="noopener">Clients</a> → <b>Create client</b> → Application type <b>Web application</b> → Name <code>Painel</code> → em «Authorized redirect URIs» <b>Add URI</b> e cola o endereço de retorno → <b>Create</b>.</li>
<li>Copia <b>Client ID</b> e <b>Client secret</b> para os campos acima → <b>Guardar chaves</b> → <b>Ligar</b> → escolhe a conta/canal → aparece «Google hasn't verified this app» → <b>Advanced</b> → <b>Go to Bound Visuals Publisher (unsafe)</b> (é a tua própria app) → <b>Continue</b>.</li>
<li>Deves ver «YouTube ligado ✓ — conta: (nome do canal)».</li></ol>
<?php endif; ?></details></div>
<?php endforeach; ?>
<p class="sub">Dúvidas ou erro? Copia a mensagem vermelha para Ideias, eu trato.</p>
</main></body></html>
