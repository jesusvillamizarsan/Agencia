<?php
require_once __DIR__ . '/appointments.php';

$token  = trim($_GET['token'] ?? '');
$result = $token ? confirmAppointment($token) : ['ok' => false, 'error' => 'no_token'];

$siteUrl = SITE_URL;
$chatUrl = $siteUrl . '/#chat';

function pageWrap(string $title, string $content): string {
    global $siteUrl;
    return <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>$title · Jesús Villamizar AI Agency</title>
  <style>
    *{box-sizing:border-box;margin:0;padding:0}
    body{font-family:Arial,sans-serif;background:#0a1628;min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:24px}
    .card{background:#fff;border-radius:12px;overflow:hidden;max-width:480px;width:100%;text-align:center}
    .hdr{background:#0a1628;padding:24px 32px;border-bottom:3px solid #c9a84c}
    .hdr h1{color:#c9a84c;font-size:18px;font-weight:bold}
    .body{padding:36px 32px;color:#333;line-height:1.7}
    .icon{font-size:56px;margin-bottom:16px}
    h2{color:#0a1628;font-size:22px;margin-bottom:12px}
    p{color:#555;margin-bottom:12px}
    .detail{background:#f8f8f8;border-left:4px solid #c9a84c;padding:14px 18px;margin:20px 0;border-radius:0 6px 6px 0;text-align:left}
    .detail p{margin:4px 0;color:#333}
    .code{font-size:28px;font-weight:bold;color:#0a1628;letter-spacing:4px;margin:12px 0}
    .btn{display:inline-block;background:#c9a84c;color:#fff;text-decoration:none;padding:13px 28px;border-radius:6px;font-weight:bold;font-size:15px;margin-top:20px}
    .btn:hover{background:#b8943e}
    .footer{padding:14px 32px;background:#f0f0f0;font-size:12px;color:#999;text-align:center}
  </style>
</head>
<body>
  <div class="card">
    <div class="hdr"><h1>Jesús Villamizar · AI Agency</h1></div>
    <div class="body">$content</div>
    <div class="footer">Madrid, España · hello@jesusvillamizar.com</div>
  </div>
</body>
</html>
HTML;
}

// ── Success ────────────────────────────────────────────────
if ($result['ok']) {
    $a       = $result['appointment'];
    $dateStr = formatDate($a['date']);
    echo pageWrap('Cita confirmada', "
        <div class='icon'>✅</div>
        <h2>¡Cita confirmada!</h2>
        <p>Tu consulta ha quedado registrada. Aquí tienes los detalles:</p>
        <div class='detail'>
            <p><strong>Fecha:</strong> $dateStr</p>
            <p><strong>Hora:</strong> {$a['time']} (Madrid, hora española)</p>
            <p><strong>Duración:</strong> 30 minutos · Videollamada</p>
        </div>
        <p>Tu código de reserva es:</p>
        <p class='code'>{$a['code']}</p>
        <p style='font-size:13px;color:#999'>Guárdalo para modificar o cancelar desde el chat de la web.</p>
        <p>Jesús se pondrá en contacto contigo antes de la llamada con el enlace de la videollamada.</p>
        <a href='$chatUrl' class='btn'>Volver al inicio</a>
    ");
    exit;
}

// ── Already confirmed ──────────────────────────────────────
if ($result['error'] === 'already_confirmed') {
    $a       = $result['appointment'];
    $dateStr = formatDate($a['date']);
    echo pageWrap('Ya confirmada', "
        <div class='icon'>ℹ️</div>
        <h2>Esta cita ya estaba confirmada</h2>
        <div class='detail'>
            <p><strong>Fecha:</strong> $dateStr</p>
            <p><strong>Hora:</strong> {$a['time']} (Madrid, hora española)</p>
            <p><strong>Código:</strong> {$a['code']}</p>
        </div>
        <p>Si necesitas modificar o cancelar, usa el chat de la web con tu código de reserva.</p>
        <a href='$chatUrl' class='btn'>Ir al chat</a>
    ");
    exit;
}

// ── Expired ────────────────────────────────────────────────
if ($result['error'] === 'expired') {
    $a       = $result['appointment'];
    $dateStr = formatDate($a['date']);
    echo pageWrap('Enlace caducado', "
        <div class='icon'>⏰</div>
        <h2>El enlace ha caducado</h2>
        <p>El tiempo para confirmar tu cita del <strong>$dateStr a las {$a['time']}</strong> ha expirado.</p>
        <p>El hueco ya está disponible de nuevo. Si sigues interesado, puedes reservar una nueva cita desde el chat.</p>
        <a href='$chatUrl' class='btn'>Volver a reservar</a>
    ");
    exit;
}

// ── Cancelled / Not found ──────────────────────────────────
echo pageWrap('Enlace no válido', "
    <div class='icon'>❌</div>
    <h2>Enlace no válido</h2>
    <p>Este enlace de confirmación no existe o ya no está disponible.</p>
    <p>Si crees que es un error, contacta con nosotros o vuelve a solicitar una cita desde el chat.</p>
    <a href='$chatUrl' class='btn'>Ir al chat</a>
");
