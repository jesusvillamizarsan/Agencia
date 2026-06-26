<?php
header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

// Sanitise inputs
function clean(string $val): string {
    return htmlspecialchars(strip_tags(trim($val)), ENT_QUOTES, 'UTF-8');
}

$name    = clean($_POST['name']    ?? '');
$company = clean($_POST['company'] ?? '');
$email   = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$service = clean($_POST['service'] ?? '');
$message = clean($_POST['message'] ?? '');
$privacy = isset($_POST['privacy']) && $_POST['privacy'] !== '';
$lang    = in_array($_POST['lang'] ?? '', ['es', 'en']) ? $_POST['lang'] : 'es';

// Validate required
if (!$name || !$email || !$message || !$privacy) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Missing required fields']);
    exit;
}

// Spam check: honeypot (add hidden field "website" to form if desired)
if (!empty($_POST['website'])) {
    echo json_encode(['ok' => true]); // Silent discard
    exit;
}

// ── Configure these ──────────────────────────────────────────
$to      = 'hello@jesusvillamizar.com';
$subject = $lang === 'en'
    ? "New contact from jesusvillamizar.com — {$name}"
    : "Nuevo contacto desde jesusvillamizar.com — {$name}";
// ─────────────────────────────────────────────────────────────

$body  = $lang === 'en' ? "New contact form submission\n\n" : "Nuevo mensaje desde el formulario de contacto\n\n";
$body .= "Name / Nombre: {$name}\n";
if ($company) $body .= "Company / Empresa: {$company}\n";
$body .= "Email: {$email}\n";
if ($service) $body .= ($lang === 'en' ? "Service: " : "Servicio: ") . "{$service}\n";
$body .= "\n" . ($lang === 'en' ? "Message:\n" : "Mensaje:\n") . "{$message}\n";
$body .= "\n---\nSent from jesusvillamizar.com";

$headers  = "From: noreply@jesusvillamizar.com\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "X-Mailer: PHP/" . PHP_VERSION . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$sent = mail($to, $subject, $body, $headers);

echo json_encode(['ok' => $sent]);
