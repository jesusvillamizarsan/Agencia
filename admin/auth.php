<?php
/**
 * Admin shared security — included by index.php and agenda.php
 */

define('SESSION_TIMEOUT', 1800); // 30 minutes
define('ADMIN_LOG_FILE', __DIR__ . '/../data/admin_log.json');

// ── Load .env ─────────────────────────────────────────────
function auth_load_env(): void {
    $env_file = __DIR__ . '/../.env';
    if (!file_exists($env_file)) return;
    foreach (file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (str_starts_with(trim($line), '#') || !str_contains($line, '=')) continue;
        [$key, $val] = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($val);
    }
}

// ── IP whitelist ──────────────────────────────────────────
function check_admin_ip(): void {
    auth_load_env();
    $allowed = trim($_ENV['ADMIN_ALLOWED_IP'] ?? '');
    if (empty($allowed)) return; // no restriction configured

    $client_ip = $_SERVER['REMOTE_ADDR'] ?? '';
    $allowed_list = array_map('trim', explode(',', $allowed));

    if (!in_array($client_ip, $allowed_list, true)) {
        http_response_code(403);
        exit('Acceso denegado.');
    }
}

// ── Session timeout ───────────────────────────────────────
function check_session_timeout(): void {
    if (!isset($_SESSION['admin_auth']) || $_SESSION['admin_auth'] !== true) return;

    $last = $_SESSION['last_activity'] ?? 0;
    if ($last && (time() - $last) > SESSION_TIMEOUT) {
        $_SESSION = [];
        session_destroy();
        header('Location: index.php?timeout=1');
        exit;
    }
    $_SESSION['last_activity'] = time();
}

// ── Verify admin password (for destructive actions) ───────
function verify_admin_password(string $input): bool {
    auth_load_env();
    $stored = $_ENV['ADMIN_PASSWORD'] ?? '';
    return !empty($stored) && hash_equals($stored, $input);
}

// ── Audit log ─────────────────────────────────────────────
function log_admin_action(string $action, array $context = []): void {
    $entry = [
        'ts'     => date('c'),
        'action' => $action,
        'ip'     => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        'data'   => $context,
    ];

    $log = [];
    if (file_exists(ADMIN_LOG_FILE)) {
        $raw = file_get_contents(ADMIN_LOG_FILE);
        $log = json_decode($raw, true) ?? [];
    }
    array_unshift($log, $entry); // newest first
    $log = array_slice($log, 0, 500); // keep last 500 entries
    file_put_contents(ADMIN_LOG_FILE, json_encode($log, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
