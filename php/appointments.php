<?php
/**
 * Appointments API — Jesús Villamizar AI Agency
 * Handles: check availability, book, get, modify, cancel
 */

define('DATA_DIR',         __DIR__ . '/../data/');
define('AVAILABILITY_FILE', DATA_DIR . 'availability.json');
define('APPOINTMENTS_FILE', DATA_DIR . 'appointments.json');
define('SLOT_DURATION',    30); // minutes
define('NOTIFY_EMAIL',     'jesusvillamizargo@gmail.com');
define('SITE_NAME',        'Jesús Villamizar AI Agency');
$_jv_protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
$_jv_host     = $_SERVER['HTTP_HOST'] ?? 'jesusvillamizar.com';
define('SITE_URL', $_jv_protocol . '://' . $_jv_host);
define('CONFIRM_TTL',      3600); // 1 hour in seconds

// ── Load .env ──────────────────────────────────────────────
function loadEnv() {
    $env_file = __DIR__ . '/../.env';
    if (!file_exists($env_file)) return;
    foreach (file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (str_starts_with(trim($line), '#') || !str_contains($line, '=')) continue;
        [$key, $val] = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($val);
    }
}

// ── JSON file helpers ──────────────────────────────────────
function readJson(string $file): array {
    if (!file_exists($file)) return [];
    $fp = fopen($file, 'r');
    flock($fp, LOCK_SH);
    $data = json_decode(file_get_contents($file), true) ?? [];
    flock($fp, LOCK_UN);
    fclose($fp);
    return $data;
}

function writeJson(string $file, array $data): void {
    $fp = fopen($file, 'c+');
    flock($fp, LOCK_EX);
    ftruncate($fp, 0);
    rewind($fp);
    fwrite($fp, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    flock($fp, LOCK_UN);
    fclose($fp);
}

// ── Booking code ───────────────────────────────────────────
function generateCode(): string {
    $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    $code  = '';
    for ($i = 0; $i < 6; $i++) {
        $code .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $code;
}

function generateToken(): string {
    return bin2hex(random_bytes(16)); // 32-char hex token
}

// Returns slots that are truly blocked: confirmed, or pending and not yet expired
function getBlockedSlots(array $appointments): array {
    $now = time();
    return array_map(
        fn($a) => $a['date'] . ' ' . $a['time'],
        array_filter($appointments, function ($a) use ($now) {
            if ($a['status'] === 'confirmed') return true;
            if ($a['status'] === 'pending' && ($a['expires_at'] ?? 0) > $now) return true;
            return false;
        })
    );
}

// ── Get available slots for a date ────────────────────────
function getAvailableSlots(string $date): array {
    $avail = readJson(AVAILABILITY_FILE);
    $appts = readJson(APPOINTMENTS_FILE);

    $allSlots    = $avail['slots'] ?? [];
    $blockedSlots = getBlockedSlots($appts['appointments'] ?? []);

    $daySlots = array_filter($allSlots, fn($s) => str_starts_with($s, $date));
    $free = array_values(array_filter($daySlots, fn($s) => !in_array($s, $blockedSlots)));
    sort($free);

    return array_map(fn($s) => substr($s, 11), $free); // return only HH:MM
}

// ── Get next available dates (up to N) ────────────────────
function getNextAvailableDates(int $limit = 5): array {
    $avail = readJson(AVAILABILITY_FILE);
    $appts = readJson(APPOINTMENTS_FILE);

    $allSlots     = $avail['slots'] ?? [];
    $blockedSlots = getBlockedSlots($appts['appointments'] ?? []);

    $today = date('Y-m-d');
    $dates = [];
    foreach ($allSlots as $slot) {
        $date = substr($slot, 0, 10);
        if ($date < $today) continue;
        if (in_array($slot, $blockedSlots)) continue;
        $dates[$date] = true;
        if (count($dates) >= $limit) break;
    }
    return array_keys($dates);
}

// ── Book appointment ───────────────────────────────────────
function bookAppointment(string $name, string $email, string $phone, string $date, string $time): array {
    $slots = getAvailableSlots($date);
    if (!in_array($time, $slots)) {
        return ['ok' => false, 'error' => 'slot_unavailable'];
    }

    $data  = readJson(APPOINTMENTS_FILE);
    $code  = generateCode();
    $codes = array_column($data['appointments'] ?? [], 'code');
    while (in_array($code, $codes)) $code = generateCode();

    $appointment = [
        'code'        => $code,
        'name'        => $name,
        'email'       => $email,
        'phone'       => $phone,
        'date'        => $date,
        'time'        => $time,
        'status'      => 'pending',
        'confirm_token' => generateToken(),
        'expires_at'  => time() + CONFIRM_TTL,
        'created_at'  => date('c'),
    ];

    $data['appointments'][] = $appointment;
    writeJson(APPOINTMENTS_FILE, $data);

    sendPendingEmail($appointment);

    return ['ok' => true, 'code' => $code, 'date' => $date, 'time' => $time];
}

// ── Confirm appointment by token ───────────────────────────
function confirmAppointment(string $token): array {
    $data = readJson(APPOINTMENTS_FILE);
    foreach ($data['appointments'] as &$a) {
        if (($a['confirm_token'] ?? '') !== $token) continue;

        if ($a['status'] === 'confirmed') {
            return ['ok' => false, 'error' => 'already_confirmed', 'appointment' => $a];
        }
        if ($a['status'] === 'cancelled') {
            return ['ok' => false, 'error' => 'cancelled'];
        }
        if (time() > ($a['expires_at'] ?? 0)) {
            if (empty($a['expiry_notified'])) {
                $a['expiry_notified'] = true;
                writeJson(APPOINTMENTS_FILE, $data);
                sendExpiredEmail($a);
            }
            return ['ok' => false, 'error' => 'expired', 'appointment' => $a];
        }

        $a['status']       = 'confirmed';
        $a['confirmed_at'] = date('c');
        writeJson(APPOINTMENTS_FILE, $data);

        sendConfirmedEmail($a);
        sendNotificationEmail('nueva', $a);

        return ['ok' => true, 'appointment' => $a];
    }
    return ['ok' => false, 'error' => 'not_found'];
}

// ── Store lead analysis ────────────────────────────────────
function storeLeadAnalysis(string $code, array $analysis): void {
    $data = readJson(APPOINTMENTS_FILE);
    foreach ($data['appointments'] as &$a) {
        if ($a['code'] === $code) {
            $a['lead_analysis'] = $analysis;
            break;
        }
    }
    writeJson(APPOINTMENTS_FILE, $data);
}

// ── Get appointment ────────────────────────────────────────
function getAppointment(string $email, string $code): array {
    $data = readJson(APPOINTMENTS_FILE);
    foreach ($data['appointments'] ?? [] as $a) {
        if (strtolower($a['email']) === strtolower($email) && $a['code'] === strtoupper($code)) {
            return ['ok' => true, 'appointment' => $a];
        }
    }
    return ['ok' => false, 'error' => 'not_found'];
}

// ── Cancel appointment ─────────────────────────────────────
function cancelAppointment(string $email, string $code): array {
    $data = readJson(APPOINTMENTS_FILE);
    foreach ($data['appointments'] as &$a) {
        if (strtolower($a['email']) === strtolower($email) && $a['code'] === strtoupper($code)) {
            if ($a['status'] === 'cancelled') {
                return ['ok' => false, 'error' => 'already_cancelled'];
            }
            $a['status']       = 'cancelled';
            $a['cancelled_at'] = date('c');
            writeJson(APPOINTMENTS_FILE, $data);
            sendCancellationEmail($a);
            sendNotificationEmail('cancelada', $a);
            return ['ok' => true, 'appointment' => $a];
        }
    }
    return ['ok' => false, 'error' => 'not_found'];
}

// ── Modify appointment ─────────────────────────────────────
function modifyAppointment(string $email, string $code, string $newDate, string $newTime): array {
    $slots = getAvailableSlots($newDate);
    if (!in_array($newTime, $slots)) {
        return ['ok' => false, 'error' => 'slot_unavailable'];
    }

    $data = readJson(APPOINTMENTS_FILE);
    foreach ($data['appointments'] as &$a) {
        if (strtolower($a['email']) === strtolower($email) && $a['code'] === strtoupper($code)) {
            if ($a['status'] === 'cancelled') {
                return ['ok' => false, 'error' => 'already_cancelled'];
            }
            $a['date']        = $newDate;
            $a['time']        = $newTime;
            $a['modified_at'] = date('c');
            writeJson(APPOINTMENTS_FILE, $data);
            sendModificationEmail($a);
            sendNotificationEmail('modificada', $a);
            return ['ok' => true, 'appointment' => $a];
        }
    }
    return ['ok' => false, 'error' => 'not_found'];
}

// ── Email helpers ──────────────────────────────────────────
function formatDate(string $date): string {
    $months = ['enero','febrero','marzo','abril','mayo','junio',
               'julio','agosto','septiembre','octubre','noviembre','diciembre'];
    [$y, $m, $d] = explode('-', $date);
    return (int)$d . ' de ' . $months[(int)$m - 1] . ' de ' . $y;
}

function sendEmail(string $to, string $subject, string $htmlBody): bool {
    loadEnv();
    $host = $_ENV['SMTP_HOST'] ?? 'smtp.hostinger.com';
    $port = (int)($_ENV['SMTP_PORT'] ?? 465);
    $user = $_ENV['SMTP_USER'] ?? '';
    $pass = $_ENV['SMTP_PASS'] ?? '';

    if (!$user || !$pass) return false;

    $socket = @stream_socket_client("ssl://{$host}:{$port}", $errno, $errstr, 10);
    if (!$socket) return false;

    $read = fn() => fgets($socket, 512);
    $send = fn($cmd) => fputs($socket, $cmd . "\r\n");

    $read();
    $send("EHLO jesusvillamizar.com");
    while ($line = $read()) { if (substr($line, 3, 1) === ' ') break; }

    $send("AUTH LOGIN");  $read();
    $send(base64_encode($user)); $read();
    $send(base64_encode($pass));
    $resp = $read();
    if (substr(trim($resp), 0, 3) !== '235') { fclose($socket); return false; }

    $send("MAIL FROM:<{$user}>"); $read();
    $send("RCPT TO:<{$to}>"); $read();
    $send("DATA"); $read();

    $headers  = "From: " . SITE_NAME . " <{$user}>\r\n";
    $headers .= "Reply-To: hello@jesusvillamizar.com\r\n";
    $headers .= "To: {$to}\r\n";
    $headers .= "Subject: =?UTF-8?B?" . base64_encode($subject) . "?=\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $send($headers . "\r\n" . $htmlBody . "\r\n.");
    $resp = $read();

    $send("QUIT");
    fclose($socket);
    return substr(trim($resp), 0, 3) === '250';
}

function emailWrap(string $content): string {
    return <<<HTML
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><style>
  body{font-family:Arial,sans-serif;background:#f4f4f4;margin:0;padding:20px}
  .box{max-width:520px;margin:0 auto;background:#fff;border-radius:8px;overflow:hidden}
  .hdr{background:#0a1628;padding:24px 32px}
  .hdr h1{color:#c9a84c;margin:0;font-size:18px}
  .body{padding:28px 32px;color:#333;line-height:1.6}
  .detail{background:#f8f8f8;border-left:4px solid #c9a84c;padding:14px 18px;margin:18px 0;border-radius:0 6px 6px 0}
  .detail p{margin:4px 0}
  .code{font-size:22px;font-weight:bold;color:#0a1628;letter-spacing:3px}
  .btn{display:inline-block;background:#c9a84c;color:#fff;text-decoration:none;padding:14px 28px;border-radius:6px;font-weight:bold;font-size:16px;margin:16px 0}
  .footer{padding:16px 32px;background:#f0f0f0;font-size:12px;color:#777;text-align:center}
</style></head>
<body><div class="box">
  <div class="hdr"><h1>Jesús Villamizar · AI Agency</h1></div>
  <div class="body">$content</div>
  <div class="footer">Madrid, España · hello@jesusvillamizar.com</div>
</div></body></html>
HTML;
}

function sendPendingEmail(array $a): void {
    $dateStr     = formatDate($a['date']);
    $confirmUrl  = SITE_URL . '/php/confirm.php?token=' . $a['confirm_token'];
    $expiresIn   = '1 hora';
    $body = emailWrap("
        <p>Hola <strong>{$a['name']}</strong>,</p>
        <p>Has solicitado una consulta. Para confirmar tu reserva haz clic en el botón de abajo:</p>
        <div class='detail'>
            <p><strong>Fecha:</strong> $dateStr</p>
            <p><strong>Hora:</strong> {$a['time']} (Madrid, hora española)</p>
            <p><strong>Duración:</strong> 30 minutos · Videollamada</p>
        </div>
        <p><a href='$confirmUrl' class='btn'>Confirmar mi cita</a></p>
        <p style='color:#999;font-size:13px'>Este enlace caduca en $expiresIn. Si no confirmas, el hueco quedará libre de nuevo.</p>
        <p>Si no has solicitado esta cita, ignora este email.</p>
    ");
    sendEmail($a['email'], 'Confirma tu consulta — ' . $dateStr . ' a las ' . $a['time'], $body);
}

function sendConfirmedEmail(array $a): void {
    $dateStr = formatDate($a['date']);
    $body = emailWrap("
        <p>Hola <strong>{$a['name']}</strong>,</p>
        <p>¡Tu consulta ha quedado confirmada! Aquí tienes los detalles:</p>
        <div class='detail'>
            <p><strong>Fecha:</strong> $dateStr</p>
            <p><strong>Hora:</strong> {$a['time']} (Madrid, hora española)</p>
            <p><strong>Duración:</strong> 30 minutos · Videollamada</p>
        </div>
        <p>Tu código de reserva es:</p>
        <p class='code'>{$a['code']}</p>
        <p>Guarda este código para modificar o cancelar tu cita desde el chat de la web.</p>
        <p>Jesús se pondrá en contacto contigo antes de la llamada con el enlace de la videollamada.</p>
        <p>¡Hasta pronto!</p>
    ");
    sendEmail($a['email'], 'Consulta confirmada — ' . $dateStr . ' a las ' . $a['time'], $body);
}

function sendExpiredEmail(array $a): void {
    $dateStr = formatDate($a['date']);
    $chatUrl = SITE_URL . '/#chat';
    $body = emailWrap("
        <p>Hola <strong>{$a['name']}</strong>,</p>
        <p>El enlace para confirmar tu consulta del <strong>$dateStr a las {$a['time']}</strong> ha caducado (tenías 1 hora para confirmar).</p>
        <p>El hueco ya está de nuevo disponible. Si sigues interesado, puedes volver a reservar en cualquier momento desde el chat de nuestra web:</p>
        <p><a href='$chatUrl' class='btn'>Volver a reservar</a></p>
        <p>¡Esperamos verte pronto!</p>
    ");
    sendEmail($a['email'], 'Tu reserva ha caducado — Jesús Villamizar AI Agency', $body);
}

function sendCancellationEmail(array $a): void {
    $dateStr = formatDate($a['date']);
    $body = emailWrap("
        <p>Hola <strong>{$a['name']}</strong>,</p>
        <p>Tu consulta del <strong>$dateStr a las {$a['time']}</strong> ha sido cancelada correctamente.</p>
        <p>Si quieres reagendar, puedes hacerlo en cualquier momento desde el chat de la web.</p>
        <p>Un saludo,<br>Jesús Villamizar</p>
    ");
    sendEmail($a['email'], 'Consulta cancelada — Jesús Villamizar AI Agency', $body);
}

function sendModificationEmail(array $a): void {
    $dateStr = formatDate($a['date']);
    $body = emailWrap("
        <p>Hola <strong>{$a['name']}</strong>,</p>
        <p>Tu consulta ha sido reprogramada. Los nuevos datos son:</p>
        <div class='detail'>
            <p><strong>Nueva fecha:</strong> $dateStr</p>
            <p><strong>Nueva hora:</strong> {$a['time']} (Madrid, hora española)</p>
            <p><strong>Duración:</strong> 30 minutos</p>
            <p><strong>Tu código:</strong> {$a['code']}</p>
        </div>
        <p>Un saludo,<br>Jesús Villamizar</p>
    ");
    sendEmail($a['email'], 'Consulta reprogramada — ' . $dateStr . ' a las ' . $a['time'], $body);
}

function sendNotificationEmail(string $type, array $a): void {
    $dateStr   = formatDate($a['date']);
    $typeLabel = strtoupper($type);
    $body = emailWrap("
        <p><strong>Nueva cita confirmada</strong></p>
        <div class='detail'>
            <p><strong>Cliente:</strong> {$a['name']}</p>
            <p><strong>Email:</strong> {$a['email']}</p>
            <p><strong>Teléfono:</strong> {$a['phone']}</p>
            <p><strong>Fecha:</strong> $dateStr a las {$a['time']}</p>
            <p><strong>Código:</strong> {$a['code']}</p>
        </div>
    ");
    sendEmail(NOTIFY_EMAIL, "[$typeLabel] Consulta confirmada — {$a['name']} · $dateStr {$a['time']}", $body);
}
