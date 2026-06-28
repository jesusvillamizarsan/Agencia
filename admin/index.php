<?php
// ── Secure session config ─────────────────────────────────────
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_samesite', 'Strict');
ini_set('session.cookie_secure', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 1 : 0);
session_start();

require_once __DIR__ . '/auth.php';
check_admin_ip();
header('X-Robots-Tag: noindex, nofollow');

if (isset($_SESSION['admin_auth']) && $_SESSION['admin_auth'] === true) {
    header('Location: agenda.php');
    exit;
}

// ── Load .env ─────────────────────────────────────────────────
$env_file = __DIR__ . '/../.env';
if (file_exists($env_file)) {
    foreach (file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (str_starts_with(trim($line), '#') || !str_contains($line, '=')) continue;
        [$key, $val] = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($val);
    }
}

$admin_password = $_ENV['ADMIN_PASSWORD'] ?? '';
$error = '';
$info  = '';
if (isset($_GET['timeout'])) $info = 'Sesión cerrada por inactividad. Vuelve a iniciar sesión.';

// ── Brute-force throttle (5 attempts → 15 min lockout) ───────
$attempts  = $_SESSION['login_attempts'] ?? 0;
$locked_at = $_SESSION['login_locked_at'] ?? 0;
$lockout   = 15 * 60; // 15 minutes
$max_tries = 5;

if ($attempts >= $max_tries && (time() - $locked_at) < $lockout) {
    $remaining = ceil(($lockout - (time() - $locked_at)) / 60);
    $error = "Demasiados intentos. Espera {$remaining} minuto(s).";
} elseif ($attempts >= $max_tries) {
    // Lockout expired — reset
    $_SESSION['login_attempts']  = 0;
    $_SESSION['login_locked_at'] = 0;
    $attempts = 0;
}

// ── Process Login ─────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($error)) {
    $input = trim($_POST['password'] ?? '');
    if (!empty($admin_password) && hash_equals($admin_password, $input)) {
        $_SESSION['admin_auth']     = true;
        $_SESSION['login_attempts'] = 0;
        $_SESSION['last_activity']  = time();
        session_regenerate_id(true);
        log_admin_action('login');
        header('Location: agenda.php');
        exit;
    } else {
        $_SESSION['login_attempts']  = $attempts + 1;
        $_SESSION['login_locked_at'] = time();
        $remaining_tries = $max_tries - ($_SESSION['login_attempts']);
        $error = $remaining_tries > 0
            ? "Contraseña incorrecta. Te quedan {$remaining_tries} intento(s)."
            : "Demasiados intentos. Acceso bloqueado 15 minutos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Jesús Villamizar AI Agency</title>
    <link rel="icon" href="../assets/favicon.svg" type="image/svg+xml" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --navy:      #0B1D3A;
            --navy-mid:  #112347;
            --gold:      #C9A535;
            --gold-pale: #F5ECC8;
            --white:     #FFFFFF;
            --text:      #1A1A2E;
            --text-mid:  #4A5568;
            --border:    #E2E8F0;
            --font-serif: 'DM Serif Display', Georgia, serif;
            --font-sans:  'Inter', -apple-system, sans-serif;
            --radius:    12px;
            --shadow-lg: 0 20px 60px rgba(11,29,58,.25);
            --trans:     0.3s ease;
        }

        html, body {
            height: 100%;
            font-family: var(--font-sans);
            -webkit-font-smoothing: antialiased;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: var(--navy);
            background-image:
                radial-gradient(ellipse 80% 60% at 50% -10%, rgba(201,165,53,.18) 0%, transparent 65%),
                radial-gradient(ellipse 40% 40% at 90% 90%, rgba(201,165,53,.08) 0%, transparent 60%);
            padding: 1rem;
        }

        .login-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            padding: 3rem 2.5rem;
            width: 100%;
            max-width: 420px;
            text-align: center;
        }

        .login-logo {
            width: 56px;
            height: 56px;
            background: var(--navy);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-family: var(--font-serif);
            font-size: 1.5rem;
            color: var(--gold);
            letter-spacing: -.02em;
        }

        .login-title {
            font-family: var(--font-serif);
            font-size: 1.75rem;
            color: var(--navy);
            margin-bottom: .4rem;
        }

        .login-subtitle {
            font-size: .875rem;
            color: var(--text-mid);
            margin-bottom: 2rem;
        }

        .form-group {
            text-align: left;
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: .8rem;
            font-weight: 600;
            color: var(--text-mid);
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-bottom: .5rem;
        }

        .form-input {
            width: 100%;
            padding: .8rem 1rem;
            border: 1.5px solid var(--border);
            border-radius: var(--radius);
            font-family: var(--font-sans);
            font-size: .95rem;
            color: var(--text);
            background: #F8F9FB;
            outline: none;
            transition: border-color var(--trans), box-shadow var(--trans);
        }

        .form-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201,165,53,.15);
            background: var(--white);
        }

        .btn-login {
            display: block;
            width: 100%;
            padding: .9rem;
            background: var(--gold);
            color: var(--navy);
            border: none;
            border-radius: var(--radius);
            font-family: var(--font-sans);
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            letter-spacing: .02em;
            transition: background var(--trans), transform var(--trans), box-shadow var(--trans);
            margin-top: .5rem;
        }

        .btn-login:hover {
            background: #b8922e;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(201,165,53,.35);
        }

        .btn-login:active { transform: translateY(0); }

        .error-msg {
            background: #FEF2F2;
            color: #991B1B;
            border: 1px solid #FECACA;
            border-radius: 8px;
            padding: .75rem 1rem;
            font-size: .875rem;
            margin-bottom: 1.25rem;
            text-align: left;
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .error-icon {
            flex-shrink: 0;
            width: 18px;
            height: 18px;
            background: #DC2626;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: .7rem;
            font-weight: 700;
        }

        .login-footer {
            margin-top: 2rem;
            font-size: .78rem;
            color: var(--text-mid);
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-logo">JV</div>
    <h1 class="login-title">Panel de Agenda</h1>
    <p class="login-subtitle">Acceso exclusivo · Jesús Villamizar AI Agency</p>

    <?php if ($info): ?>
    <div class="error-msg" style="background:#EFF6FF;color:#1E40AF;border-color:#BFDBFE">
        <span class="error-icon" style="background:#2563EB">i</span>
        <?= htmlspecialchars($info) ?>
    </div>
    <?php endif; ?>
    <?php if ($error): ?>
    <div class="error-msg">
        <span class="error-icon">!</span>
        <?= htmlspecialchars($error) ?>
    </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label class="form-label" for="password">Contraseña</label>
            <input
                class="form-input"
                type="password"
                id="password"
                name="password"
                placeholder="••••••••••••"
                autofocus
                autocomplete="current-password"
                required
            >
        </div>
        <button type="submit" class="btn-login">Entrar</button>
    </form>

    <p class="login-footer">Acceso restringido al propietario del sitio</p>
</div>

</body>
</html>
