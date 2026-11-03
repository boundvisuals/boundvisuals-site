<?php
require __DIR__ . '/config.php';
header('X-Robots-Tag: noindex, nofollow');
// First visit: /painel/?k=KEY → sets a 1-year cookie and cleans the URL.
if (isset($_GET['k'])) {
  if (hash_equals($BV_KEY_HASH, hash('sha256', $_GET['k']))) {
    setcookie('bv_k', $_GET['k'], ['expires' => time() + 31536000, 'path' => '/painel/', 'secure' => true, 'httponly' => true, 'samesite' => 'Lax']);
    header('Location: /painel/'); exit;
  }
}
$ok = isset($_COOKIE['bv_k']) && hash_equals($BV_KEY_HASH, hash('sha256', $_COOKIE['bv_k']));
if (!$ok) { http_response_code(401); echo '<!doctype html><meta name="robots" content="noindex"><meta name="viewport" content="width=device-width"><body style="background:#0b0c0c;color:#c5c1b7;font:16px system-ui;display:grid;place-items:center;height:100vh;margin:0">Acesso privado.</body>'; exit; }
readfile(__DIR__ . '/app.html');
