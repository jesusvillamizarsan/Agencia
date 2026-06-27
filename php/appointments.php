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

// ── Get available slots for a date ────────────────────────
function getAvailableSlots(string $date): array {
    $avail = readJson(AVAILABILITY_FILE);
    $appts = readJson(APPOINTMENTS_FILE);

    $allSlots = $avail['slots'] ?? [];
    $bookedSlots = array_map(
        fn($a) => $a['date'] . ' ' . $a['time'],
        array_filter($appts['appointments'] ?? [], fn($a) => $a['status'] === 'confirmed')
    );

    $daySlots = array_filter($allSlots, fn($s) => str_starts_with($s, $date));
    $free = array_values(array_filter($daySlots, fn($s) => !in_array($s, $bookedSlots)));
    sort($free);

    return array_map(fn($s) => substr($s, 11), $free); // return only HH:MM
}

// ── Get next available dates (up to N) ────────────────────
function getNextAvailableDates(int $limit = 5): array {
    $avail = readJson(AVAILABILITY_FILE);
    $appts = readJson(APPOINTMENTS_FILE);

    $allSlots = $avail['slots'] ?? [];
    $bookedSlots = array_map(
        fn($a) => $a['date'] . ' ' . $a['time'],
        array_filter($appts['appointments'] ?? [], fn($a) => $a['status'] === 'confirmed')
    );

    $today  = date('Y-m-d');
    $dates  = [];
    foreach ($allSlots as $slot) {
        $date = substr($slot, 0, 10);
        if ($date < $today) continue;
        if (in_array($slot, $bookedSlots)) continue;
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
    // ensure unique code
    $codes = array_column($data['appointments'] ?? [], 'code');
    while (in_array($code, $codes)) $code = generateCode();

    $appointment = [
        'code'       => $code,
        'name'       => $name,
        'email'      => $email,
        'phone'      => $phone,
        'date'       => $date,
        'time'       => $time,
        'status'     => 'confirmed',
        'created_at' => date('c'),
    ];

    $data['appointments'][] = $appointment;
    writeJson(APPOINTMENTS_FILE, $data);

    sendConfirmationEmail($appointment);
    sendNotificationEmail('nueva', $appointment);

    return ['ok' => true, 'code' => $code, 'date' => $date, 'time' => $time];
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

function sendEmail(string $to, string $subject, string $body): void {
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: " . SITE_NAME . " <noreply@jesusvillamizar.com>\r\n";
    $headers .= "Reply-To: hello@jesusvillamizar.com\r\n";
    @mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, $headers);
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
  .footer{padding:16px 32px;background:#f0f0f0;font-size:12px;color:#777;text-align:center}
</style></head>
<body><div class="box">
  <div class="hdr"><h1>Jesús Villamizar · AI Agency</h1></div>
  <div class="body">$content</div>
  <div class="footer">Madrid, España · hello@jesusvillamizar.com</div>
</div></body></html>
HTML;
}

function sendConfirmationEmail(array $a): void {
    $dateStr = formatDate($a['date']);
    $body = emailWrap("
        <p>Hola <strong>{$a['name']}</strong>,</p>
        <p>Tu consulta ha quedado confirmada. Aquí tienes los detalles:</p>
        <div class='detail'>
            <p><strong>Fecha:</strong> $dateStr</p>
            <p><strong>Hora:</strong> {$a['time']} (Madrid, hora española)</p>
            <p><strong>Duración:</strong> 30 minutos</p>
        </div>
        <p>Tu código de reserva es:</p>
        <p class='code'>{$a['code']}</p>
        <p>Guarda este código para modificar o cancelar tu cita desde el chat de la web.</p>
        <p>Jesús se pondrá en contacto contigo antes de la llamada con el enlace de la videollamada.</p>
        <p>¡Hasta pronto!</p>
    ");
    sendEmail($a['email'], 'Consulta confirmada — ' . $dateStr . ' a las ' . $a['time'], $body);
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
    $dateStr = formatDate($a['date']);
    $typeLabel = strtoupper($type);
    $body = emailWrap("
        <p><strong>⚡ Cita $type</strong></p>
        <div class='detail'>
            <p><strong>Cliente:</strong> {$a['name']}</p>
            <p><strong>Email:</strong> {$a['email']}</p>
            <p><strong>Teléfono:</strong> {$a['phone']}</p>
            <p><strong>Fecha:</strong> $dateStr a las {$a['time']}</p>
            <p><strong>Código:</strong> {$a['code']}</p>
            <p><strong>Estado:</strong> {$a['status']}</p>
        </div>
    ");
    sendEmail(NOTIFY_EMAIL, "[$typeLabel] Consulta — {$a['name']} · $dateStr {$a['time']}", $body);
}
