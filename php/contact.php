<?php
header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

// ── Rate limiting: max 3 submissions per IP per 10 minutes ───
$rate_file = __DIR__ . '/../data/contact_rate.json';
$ip        = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$now       = time();
$window    = 600;
$max_req   = 3;

$rate_data = [];
if (file_exists($rate_file)) {
    $rate_data = json_decode(file_get_contents($rate_file), true) ?? [];
}
$rate_data = array_filter($rate_data, fn($t) => ($now - $t['ts']) < $window);
$ip_hits   = array_filter($rate_data, fn($t) => $t['ip'] === $ip);

if (count($ip_hits) >= $max_req) {
    http_response_code(429);
    echo json_encode(['ok' => false, 'error' => 'Too many requests']);
    exit;
}

// ── Honeypot anti-spam ────────────────────────────────────────
if (!empty($_POST['website'])) {
    echo json_encode(['ok' => true]);
    exit;
}

// Sanitise inputs
function clean(string $val): string {
    return htmlspecialchars(strip_tags(trim($val)), ENT_QUOTES, 'UTF-8');
}

$name    = mb_substr(clean($_POST['name']    ?? ''), 0, 100);
$company = mb_substr(clean($_POST['company'] ?? ''), 0, 100);
$email   = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$message = mb_substr(clean($_POST['message'] ?? ''), 0, 3000);
$privacy = isset($_POST['privacy']) && $_POST['privacy'] !== '';
$lang    = in_array($_POST['lang'] ?? '', ['es', 'en']) ? $_POST['lang'] : 'es';

$allowed_services = ['Consultoría Estratégica IA','Chatbots y Asistentes','Automatización de Procesos','Modelos ML / Deep Learning','Agentes IA Autónomos','MLOps & Producción','Otro / No sé aún',
                     'AI Strategic Consulting','Chatbots & Assistants','Process Automation','ML Models / Deep Learning','Autonomous AI Agents','MLOps & Production','Other / Not sure yet',''];
$raw_service = clean($_POST['service'] ?? '');
$service     = in_array($raw_service, $allowed_services, true) ? $raw_service : '';

if (!$name || !$email || !$message || !$privacy) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Missing required fields']);
    exit;
}

// ── Load .env ────────────────────────────────────────────────
$env_file = __DIR__ . '/../.env';
if (file_exists($env_file)) {
    foreach (file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (str_starts_with(trim($line), '#') || !str_contains($line, '=')) continue;
        [$key, $val] = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($val);
    }
}

// ── SMTP config ──────────────────────────────────────────────
$smtp_host = $_ENV['SMTP_HOST'] ?? 'smtp.hostinger.com';
$smtp_port = (int)($_ENV['SMTP_PORT'] ?? 465);
$smtp_user = $_ENV['SMTP_USER'] ?? '';
$smtp_pass = $_ENV['SMTP_PASS'] ?? '';
$to        = $_ENV['CONTACT_TO'] ?? 'hello@jesusvillamizar.com';

$subject = $lang === 'en'
    ? "New contact from jesusvillamizar.com — {$name}"
    : "Nuevo contacto desde jesusvillamizar.com — {$name}";

$body  = $lang === 'en' ? "New contact form submission\n\n" : "Nuevo mensaje desde el formulario de contacto\n\n";
$body .= "Name / Nombre: {$name}\n";
if ($company) $body .= "Company / Empresa: {$company}\n";
$body .= "Email: {$email}\n";
if ($service) $body .= ($lang === 'en' ? "Service: " : "Servicio: ") . "{$service}\n";
$body .= "\n" . ($lang === 'en' ? "Message:\n" : "Mensaje:\n") . "{$message}\n";
$body .= "\n---\nSent from jesusvillamizar.com";

// ── Send via SMTP ─────────────────────────────────────────────
function smtp_send(string $host, int $port, string $user, string $pass, string $to, string $subject, string $body): bool {
    $socket = @stream_socket_client("ssl://{$host}:{$port}", $errno, $errstr, 10);
    if (!$socket) return false;

    $read = fn() => fgets($socket, 512);
    $send = fn($cmd) => fputs($socket, $cmd . "\r\n");

    $read(); // 220 greeting
    $send("EHLO jesusvillamizar.com");
    while ($line = $read()) { if (substr($line, 3, 1) === ' ') break; }

    $send("AUTH LOGIN");
    $read();
    $send(base64_encode($user));
    $read();
    $send(base64_encode($pass));
    $resp = $read();
    if (substr(trim($resp), 0, 3) !== '235') { fclose($socket); return false; }

    $send("MAIL FROM:<{$user}>");
    $read();
    $send("RCPT TO:<{$to}>");
    $read();
    $send("DATA");
    $read();

    $headers  = "From: Jesús Villamizar AI <{$user}>\r\n";
    $headers .= "Reply-To: {$to}\r\n";
    $headers .= "To: {$to}\r\n";
    $headers .= "Subject: {$subject}\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $send($headers . "\r\n" . $body . "\r\n.");
    $resp = $read();

    $send("QUIT");
    fclose($socket);
    return substr(trim($resp), 0, 3) === '250';
}

$sent = smtp_send($smtp_host, $smtp_port, $smtp_user, $smtp_pass, $to, $subject, $body);

if ($sent) {
    $rate_data[] = ['ip' => $ip, 'ts' => $now];
    file_put_contents($rate_file, json_encode(array_values($rate_data)));
} else {
    error_log("contact.php SMTP failed for $email at " . date('Y-m-d H:i:s'));
}

echo json_encode(['ok' => $sent]);
