<?php
// ── Session Guard ─────────────────────────────────────────────
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_samesite', 'Strict');
session_start();
if (!isset($_SESSION['admin_auth']) || $_SESSION['admin_auth'] !== true) {
    header('Location: index.php');
    exit;
}

// ── CSRF token ────────────────────────────────────────────────
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

function verify_csrf(): void {
    $token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
    if (!hash_equals($_SESSION['csrf_token'], $token)) {
        http_response_code(403);
        echo json_encode(['ok' => false, 'error' => 'Invalid CSRF token']);
        exit;
    }
}

// ── Paths ─────────────────────────────────────────────────────
define('AVAIL_FILE', __DIR__ . '/../data/availability.json');
define('APPT_FILE',  __DIR__ . '/../data/appointments.json');
define('SLOT_MINS',  30);

// ── Helpers ───────────────────────────────────────────────────
function read_json(string $path): array {
    if (!file_exists($path)) return [];
    $raw = file_get_contents($path);
    return json_decode($raw, true) ?? [];
}

function write_json(string $path, array $data): bool {
    $fp = fopen($path, 'c+');
    if (!$fp) return false;
    flock($fp, LOCK_EX);
    ftruncate($fp, 0);
    rewind($fp);
    fwrite($fp, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    fflush($fp);
    flock($fp, LOCK_UN);
    fclose($fp);
    return true;
}

function generate_slots(string $date, string $from, string $to): array {
    $slots = [];
    $current = strtotime("$date $from");
    $end     = strtotime("$date $to");
    while ($current < $end) {
        $slots[] = date('Y-m-d H:i', $current);
        $current += SLOT_MINS * 60;
    }
    return $slots;
}

function is_json_request(): bool {
    $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
    return str_contains($accept, 'application/json');
}

function json_response(array $data, int $code = 200): void {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

// ── Presets ───────────────────────────────────────────────────
$presets = [
    'morning'   => ['from' => '09:00', 'to' => '13:00'],
    'afternoon' => ['from' => '15:00', 'to' => '19:00'],
    'full'      => ['from' => '09:00', 'to' => '19:00'],
];

// ── POST Actions ──────────────────────────────────────────────
$action_message = '';
$action_type    = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $action = trim($_POST['action'] ?? '');
    $avail  = read_json(AVAIL_FILE);
    if (!isset($avail['slots']) || !is_array($avail['slots'])) {
        $avail = ['slots' => []];
    }

    if ($action === 'cancel_appointment') {
        $code = strtoupper(trim($_POST['code'] ?? ''));
        $appt_data = read_json(APPT_FILE);
        $found = false;
        foreach ($appt_data['appointments'] as &$a) {
            if ($a['code'] === $code && in_array($a['status'] ?? '', ['confirmed', 'pending'])) {
                $a['status']       = 'cancelled';
                $a['cancelled_at'] = date('c');
                $found = true;
                // Send cancellation email if was confirmed
                if ($a['status'] !== 'pending') {
                    require_once __DIR__ . '/../php/appointments.php';
                    sendCancellationEmail($a);
                }
                break;
            }
        }
        write_json(APPT_FILE, $appt_data);
        if (is_json_request()) json_response(['ok' => $found]);
        $_SESSION['flash'] = ['msg' => $found ? 'Cita cancelada.' : 'Cita no encontrada.', 'type' => $found ? 'success' : 'error'];
        header("Location: agenda.php?month={$view_month}&day={$selected_day}");
        exit;

    } elseif ($action === 'delete_appointment') {
        $code = strtoupper(trim($_POST['code'] ?? ''));
        $appt_data = read_json(APPT_FILE);
        $before = count($appt_data['appointments'] ?? []);
        $appt_data['appointments'] = array_values(array_filter($appt_data['appointments'] ?? [], fn($a) => $a['code'] !== $code));
        $deleted = count($appt_data['appointments']) < $before;
        write_json(APPT_FILE, $appt_data);
        if (is_json_request()) json_response(['ok' => $deleted]);
        $_SESSION['flash'] = ['msg' => $deleted ? 'Cita eliminada.' : 'Cita no encontrada.', 'type' => $deleted ? 'success' : 'error'];
        header("Location: agenda.php?month={$view_month}&day={$selected_day}");
        exit;

    } elseif ($action === 'save_note') {
        $code = strtoupper(trim($_POST['code'] ?? ''));
        $note = mb_substr(trim($_POST['note'] ?? ''), 0, 500);
        $appt_data = read_json(APPT_FILE);
        $found = false;
        foreach ($appt_data['appointments'] as &$a) {
            if ($a['code'] === $code) { $a['admin_note'] = $note; $found = true; break; }
        }
        write_json(APPT_FILE, $appt_data);
        if (is_json_request()) json_response(['ok' => $found]);
        $_SESSION['flash'] = ['msg' => 'Nota guardada.', 'type' => 'success'];
        header("Location: agenda.php?month={$view_month}&day={$selected_day}");
        exit;

    } elseif ($action === 'add_slots') {
        $date      = trim($_POST['date']      ?? '');
        $from_time = trim($_POST['from_time'] ?? '');
        $to_time   = trim($_POST['to_time']   ?? '');

        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)
            && preg_match('/^\d{2}:\d{2}$/', $from_time)
            && preg_match('/^\d{2}:\d{2}$/', $to_time)
            && $from_time < $to_time
        ) {
            $new_slots  = generate_slots($date, $from_time, $to_time);
            $merged     = array_values(array_unique(array_merge($avail['slots'], $new_slots)));
            sort($merged);
            $avail['slots'] = $merged;
            write_json(AVAIL_FILE, $avail);

            if (is_json_request()) {
                json_response(['ok' => true, 'added' => count($new_slots)]);
            }
            $action_message = 'Huecos añadidos correctamente.';
            $action_type    = 'success';
        } else {
            if (is_json_request()) json_response(['ok' => false, 'error' => 'Datos inválidos'], 400);
            $action_message = 'Datos inválidos. Revisa el rango horario.';
            $action_type    = 'error';
        }

    } elseif ($action === 'remove_slot') {
        $date = trim($_POST['date'] ?? '');
        $time = trim($_POST['time'] ?? '');
        $slot = "$date $time";

        $avail['slots'] = array_values(array_filter($avail['slots'], fn($s) => $s !== $slot));
        write_json(AVAIL_FILE, $avail);

        if (is_json_request()) json_response(['ok' => true]);
        $action_message = 'Hueco eliminado.';
        $action_type    = 'success';

    } elseif ($action === 'bulk_add') {
        $date   = trim($_POST['date']   ?? '');
        $preset = trim($_POST['preset'] ?? '');

        if (isset($presets[$preset]) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            $p         = $presets[$preset];
            $new_slots = generate_slots($date, $p['from'], $p['to']);
            $merged    = array_values(array_unique(array_merge($avail['slots'], $new_slots)));
            sort($merged);
            $avail['slots'] = $merged;
            write_json(AVAIL_FILE, $avail);

            if (is_json_request()) json_response(['ok' => true, 'added' => count($new_slots)]);
            $action_message = 'Huecos de preset añadidos.';
            $action_type    = 'success';
        } else {
            if (is_json_request()) json_response(['ok' => false, 'error' => 'Preset inválido'], 400);
            $action_message = 'Preset inválido.';
            $action_type    = 'error';
        }
    }

    // Redirect back (PRG pattern) if standard form post
    if (!is_json_request()) {
        $redir_date = $_POST['date'] ?? '';
        $qs = $redir_date ? '?day=' . urlencode($redir_date) : '';
        // Pass flash message via session
        $_SESSION['flash'] = ['msg' => $action_message, 'type' => $action_type];
        header("Location: agenda.php$qs");
        exit;
    }
}

// ── Flash message from session ────────────────────────────────
$flash = null;
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

// ── Load data ─────────────────────────────────────────────────
$avail = read_json(AVAIL_FILE);
$slots_all = $avail['slots'] ?? [];

$appt_data = read_json(APPT_FILE);
$appointments_all = $appt_data['appointments'] ?? [];

// ── Calendar state ────────────────────────────────────────────
$today       = date('Y-m-d');
$selected_day = $_GET['day'] ?? $today;

// Validate selected day
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $selected_day)) {
    $selected_day = $today;
}

// Month navigation
$view_month = $_GET['month'] ?? date('Y-m');
if (!preg_match('/^\d{4}-\d{2}$/', $view_month)) {
    $view_month = date('Y-m');
}
[$view_year, $view_mon] = explode('-', $view_month);
$view_year = (int)$view_year;
$view_mon  = (int)$view_mon;

$prev_month = date('Y-m', mktime(0, 0, 0, $view_mon - 1, 1, $view_year));
$next_month = date('Y-m', mktime(0, 0, 0, $view_mon + 1, 1, $view_year));

// ── Index slots & appointments by date ───────────────────────
$slots_by_date = [];
foreach ($slots_all as $s) {
    [$d, $t] = explode(' ', $s, 2);
    $slots_by_date[$d][] = $t;
}

$appts_by_date   = [];
$confirmed_appts = [];
$pending_appts   = [];
$now_ts          = time();

foreach ($appointments_all as $a) {
    $status = $a['status'] ?? '';
    if ($status === 'confirmed') {
        $appts_by_date[$a['date']][] = $a;
        if ($a['date'] >= $today) $confirmed_appts[] = $a;
    } elseif ($status === 'pending' && ($a['expires_at'] ?? 0) > $now_ts) {
        $appts_by_date[$a['date']][] = $a;
        if ($a['date'] >= $today) $pending_appts[] = $a;
    }
}

usort($confirmed_appts, fn($a, $b) => strcmp("$a[date] $a[time]", "$b[date] $b[time]"));
usort($pending_appts,   fn($a, $b) => strcmp("$a[date] $a[time]", "$b[date] $b[time]"));
$confirmed_appts = array_slice($confirmed_appts, 0, 10);

// ── Calendar grid ─────────────────────────────────────────────
$first_day      = mktime(0, 0, 0, $view_mon, 1, $view_year);
$days_in_month  = (int)date('t', $first_day);
$start_weekday  = (int)date('N', $first_day); // 1=Mon .. 7=Sun

// ── Month name in Spanish ─────────────────────────────────────
$month_names_es = [
    1=>'Enero', 2=>'Febrero', 3=>'Marzo', 4=>'Abril',
    5=>'Mayo', 6=>'Junio', 7=>'Julio', 8=>'Agosto',
    9=>'Septiembre', 10=>'Octubre', 11=>'Noviembre', 12=>'Diciembre',
];
$day_names_es = ['L', 'M', 'X', 'J', 'V', 'S', 'D'];

$month_title = $month_names_es[$view_mon] . ' ' . $view_year;

// ── Day panel data ────────────────────────────────────────────
$panel_slots = $slots_by_date[$selected_day] ?? [];
sort($panel_slots);
$panel_appts = $appts_by_date[$selected_day] ?? [];
usort($panel_appts, fn($a, $b) => strcmp($a['time'], $b['time']));

// Helper: score color
function scoreColor(int $score): string {
    if ($score >= 7) return '#059669';
    if ($score >= 4) return '#D97706';
    return '#DC2626';
}
function scoreBg(int $score): string {
    if ($score >= 7) return '#D1FAE5';
    if ($score >= 4) return '#FEF3C7';
    return '#FEE2E2';
}

// Spanish formatted date for panel
$panel_ts   = strtotime($selected_day);
$panel_date_label = date('j', $panel_ts) . ' de ' . strtolower($month_names_es[(int)date('n', $panel_ts)]) . ' de ' . date('Y', $panel_ts);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda — Panel Admin · Jesús Villamizar AI Agency</title>
    <link rel="icon" href="../assets/favicon.svg" type="image/svg+xml" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ── Reset ── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { font-size: 16px; }
        body {
            font-family: 'Inter', -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
            color: #1A1A2E;
            background: #F0F2F5;
            min-height: 100vh;
        }
        a { text-decoration: none; color: inherit; }
        button { cursor: pointer; border: none; background: none; font-family: inherit; }
        ul { list-style: none; }

        /* ── Variables ── */
        :root {
            --navy:      #0B1D3A;
            --navy-mid:  #112347;
            --navy-light:#162E57;
            --gold:      #C9A535;
            --gold-pale: #F5ECC8;
            --white:     #FFFFFF;
            --off-white: #F8F9FB;
            --light-grey:#F0F2F5;
            --text:      #1A1A2E;
            --text-mid:  #4A5568;
            --text-light:#718096;
            --border:    #E2E8F0;
            --green:     #059669;
            --green-pale:#D1FAE5;
            --red:       #DC2626;
            --red-pale:  #FEE2E2;
            --radius:    10px;
            --shadow-sm: 0 2px 8px rgba(11,29,58,.07);
            --shadow-md: 0 6px 24px rgba(11,29,58,.11);
            --trans:     0.2s ease;
        }

        /* ── Navbar ── */
        .admin-nav {
            background: var(--navy);
            padding: 0 2rem;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 12px rgba(0,0,0,.25);
        }

        .admin-nav__brand {
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .admin-nav__logo {
            width: 34px;
            height: 34px;
            background: var(--gold);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'DM Serif Display', serif;
            font-size: .95rem;
            color: var(--navy);
            font-weight: 700;
            letter-spacing: -.02em;
        }

        .admin-nav__title {
            font-size: .95rem;
            font-weight: 600;
            color: var(--white);
        }

        .admin-nav__title span {
            color: var(--gold);
        }

        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .45rem .9rem;
            border-radius: 8px;
            border: 1.5px solid rgba(255,255,255,.2);
            color: rgba(255,255,255,.8);
            font-size: .8rem;
            font-weight: 500;
            transition: background var(--trans), color var(--trans), border-color var(--trans);
        }

        .btn-logout:hover {
            background: rgba(255,255,255,.1);
            color: var(--white);
            border-color: rgba(255,255,255,.4);
        }

        /* ── Layout ── */
        .admin-wrap {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1.75rem 1.5rem 3rem;
        }

        .admin-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            grid-template-rows: auto;
            gap: 1.5rem;
            align-items: start;
        }

        .admin-left  { display: flex; flex-direction: column; gap: 1.5rem; }
        .admin-right { display: flex; flex-direction: column; gap: 1.5rem; }

        /* ── Card base ── */
        .card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .card__head {
            padding: 1.1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card__title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.1rem;
            color: var(--navy);
        }

        .card__body { padding: 1.5rem; }

        /* ── Flash ── */
        .flash {
            padding: .8rem 1.2rem;
            border-radius: var(--radius);
            font-size: .875rem;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .flash--success { background: var(--green-pale); color: #065F46; border: 1px solid #A7F3D0; }
        .flash--error   { background: var(--red-pale);   color: #991B1B;  border: 1px solid #FECACA; }

        /* ── Month nav ── */
        .month-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .month-nav__label {
            font-family: 'DM Serif Display', serif;
            font-size: 1.25rem;
            color: var(--navy);
            min-width: 160px;
            text-align: center;
        }

        .month-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1.5px solid var(--border);
            background: var(--white);
            color: var(--text-mid);
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background var(--trans), color var(--trans), border-color var(--trans);
        }

        .month-btn:hover {
            background: var(--navy);
            color: var(--white);
            border-color: var(--navy);
        }

        /* ── Calendar grid ── */
        .cal-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            margin-top: 1rem;
        }

        .cal-dow {
            text-align: center;
            font-size: .7rem;
            font-weight: 700;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: .06em;
            padding: .4rem 0;
        }

        .cal-day {
            aspect-ratio: 1;
            border-radius: 10px;
            border: 1.5px solid transparent;
            padding: .35rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 3px;
            cursor: pointer;
            transition: background var(--trans), border-color var(--trans), box-shadow var(--trans);
            min-width: 0;
            background: #F8F9FB;
            position: relative;
        }

        .cal-day:hover:not(.cal-day--past):not(.cal-day--empty) {
            background: var(--gold-pale);
            border-color: var(--gold);
        }

        .cal-day--today {
            background: var(--navy);
        }

        .cal-day--today .cal-day__num { color: var(--gold); }

        .cal-day--selected {
            border-color: var(--gold);
            background: #FEFCE8;
            box-shadow: 0 0 0 2px rgba(201,165,53,.25);
        }

        .cal-day--past {
            opacity: .45;
            cursor: default;
        }

        .cal-day--empty {
            background: transparent;
            cursor: default;
        }

        .cal-day__num {
            font-size: .8rem;
            font-weight: 600;
            color: var(--text);
            line-height: 1;
        }

        .cal-day--today .cal-day__num { color: var(--gold); font-weight: 700; }

        .cal-day__badges {
            display: flex;
            flex-wrap: wrap;
            gap: 2px;
        }

        .cal-badge {
            display: inline-flex;
            align-items: center;
            gap: 2px;
            font-size: .6rem;
            font-weight: 700;
            border-radius: 4px;
            padding: 1px 4px;
            line-height: 1.3;
        }

        .cal-badge--avail  { background: var(--gold);      color: var(--navy); }
        .cal-badge--appt   { background: var(--green);     color: var(--white); }

        /* ── Day panel ── */
        .panel-date {
            font-family: 'DM Serif Display', serif;
            font-size: 1rem;
            color: var(--navy);
        }

        .panel-section {
            margin-bottom: 1.5rem;
        }

        .panel-section:last-child { margin-bottom: 0; }

        .panel-section__label {
            font-size: .7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: var(--text-light);
            margin-bottom: .75rem;
            display: flex;
            align-items: center;
            gap: .4rem;
        }

        .panel-section__label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* Preset buttons */
        .preset-row {
            display: flex;
            gap: .5rem;
            flex-wrap: wrap;
            margin-bottom: .75rem;
        }

        .btn-preset {
            padding: .4rem .85rem;
            border-radius: 6px;
            border: 1.5px solid var(--gold);
            background: transparent;
            color: var(--navy);
            font-size: .78rem;
            font-weight: 600;
            transition: background var(--trans), color var(--trans);
        }

        .btn-preset:hover {
            background: var(--gold);
            color: var(--navy);
        }

        /* Time range form */
        .time-range {
            display: flex;
            align-items: center;
            gap: .5rem;
            flex-wrap: wrap;
        }

        .time-range label {
            font-size: .78rem;
            color: var(--text-mid);
            font-weight: 500;
        }

        .time-input {
            padding: .45rem .7rem;
            border: 1.5px solid var(--border);
            border-radius: 7px;
            font-size: .85rem;
            font-family: inherit;
            color: var(--text);
            outline: none;
            transition: border-color var(--trans);
            width: 100px;
        }

        .time-input:focus { border-color: var(--gold); }

        .btn-add {
            padding: .45rem .9rem;
            border-radius: 7px;
            background: var(--navy);
            color: var(--white);
            font-size: .8rem;
            font-weight: 600;
            transition: background var(--trans);
        }

        .btn-add:hover { background: var(--navy-light); }

        /* Slot list */
        .slot-list {
            display: flex;
            flex-wrap: wrap;
            gap: .4rem;
        }

        .slot-chip {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            padding: .35rem .65rem;
            border-radius: 6px;
            background: var(--gold-pale);
            border: 1px solid rgba(201,165,53,.35);
            font-size: .82rem;
            color: var(--navy);
            font-weight: 600;
        }

        .slot-remove {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: rgba(11,29,58,.12);
            color: var(--navy);
            font-size: .7rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background var(--trans);
            flex-shrink: 0;
            cursor: pointer;
        }

        .slot-remove:hover { background: var(--red); color: var(--white); }

        .empty-state {
            font-size: .85rem;
            color: var(--text-light);
            font-style: italic;
            padding: .5rem 0;
        }

        /* Appointment item */
        .appt-item {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: .6rem .9rem;
            padding: .85rem;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            background: var(--off-white);
            margin-bottom: .6rem;
        }

        .appt-item:last-child { margin-bottom: 0; }

        .appt-time {
            grid-row: 1 / 3;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: .35rem .6rem;
            background: var(--green);
            color: var(--white);
            border-radius: 7px;
            font-size: .85rem;
            font-weight: 700;
            align-self: start;
            white-space: nowrap;
        }

        .appt-name {
            font-size: .9rem;
            font-weight: 600;
            color: var(--text);
            align-self: end;
        }

        .appt-meta {
            font-size: .78rem;
            color: var(--text-mid);
            align-self: start;
            display: flex;
            flex-direction: column;
            gap: 1px;
        }

        /* ── Upcoming list ── */
        .upcoming-item {
            display: flex;
            gap: .8rem;
            align-items: flex-start;
            padding: .8rem 0;
            border-bottom: 1px solid var(--border);
        }

        .upcoming-item:last-child { border-bottom: none; padding-bottom: 0; }

        .upcoming-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--green);
            flex-shrink: 0;
            margin-top: .35rem;
        }

        .upcoming-info {}

        .upcoming-who {
            font-size: .875rem;
            font-weight: 600;
            color: var(--text);
        }

        .upcoming-when {
            font-size: .78rem;
            color: var(--text-mid);
            margin-top: 1px;
        }

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 20px;
            height: 20px;
            border-radius: 10px;
            background: var(--gold);
            color: var(--navy);
            font-size: .7rem;
            font-weight: 700;
            padding: 0 5px;
        }

        /* ── Responsive ── */
        @media (max-width: 1024px) {
            .admin-grid {
                grid-template-columns: 1fr;
            }

            .admin-right {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {
            .admin-wrap { padding: 1rem .75rem 2rem; }
            .admin-nav  { padding: 0 1rem; }

            .admin-right {
                grid-template-columns: 1fr;
            }

            .cal-day { padding: .25rem; }
            .cal-day__num { font-size: .72rem; }
            .cal-badge { display: none; }

            .time-range { flex-direction: column; align-items: flex-start; }
            .time-input { width: 100%; }
        }
    </style>
</head>
<body>

<!-- ── Navbar ── -->
<nav class="admin-nav">
    <div class="admin-nav__brand">
        <div class="admin-nav__logo">JV</div>
        <span class="admin-nav__title">Panel de <span>Agenda</span></span>
    </div>
    <a href="logout.php" class="btn-logout">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
            <polyline points="16 17 21 12 16 7"/>
            <line x1="21" y1="12" x2="9" y2="12"/>
        </svg>
        Cerrar sesión
    </a>
</nav>

<!-- ── Main ── -->
<main class="admin-wrap">

    <?php if ($flash): ?>
    <div class="flash flash--<?= $flash['type'] ?>">
        <?= $flash['type'] === 'success' ? '✓' : '!' ?>
        <?= htmlspecialchars($flash['msg']) ?>
    </div>
    <?php endif; ?>

    <div class="admin-grid">

        <!-- ════ LEFT COLUMN ════ -->
        <div class="admin-left">

            <!-- Calendar card -->
            <div class="card">
                <div class="card__head">
                    <nav class="month-nav" style="width:100%">
                        <a href="?month=<?= $prev_month ?>&day=<?= $selected_day ?>" class="month-btn" title="Mes anterior">&#8592;</a>
                        <span class="month-nav__label"><?= $month_title ?></span>
                        <a href="?month=<?= $next_month ?>&day=<?= $selected_day ?>" class="month-btn" title="Mes siguiente">&#8594;</a>
                    </nav>
                </div>
                <div class="card__body" style="padding: 1rem 1.25rem 1.25rem;">

                    <div class="cal-grid">
                        <!-- Day-of-week headers -->
                        <?php foreach ($day_names_es as $dn): ?>
                        <div class="cal-dow"><?= $dn ?></div>
                        <?php endforeach; ?>

                        <!-- Empty cells before first day -->
                        <?php for ($i = 1; $i < $start_weekday; $i++): ?>
                        <div class="cal-day cal-day--empty"></div>
                        <?php endfor; ?>

                        <!-- Days -->
                        <?php for ($d = 1; $d <= $days_in_month; $d++):
                            $date_str    = sprintf('%04d-%02d-%02d', $view_year, $view_mon, $d);
                            $is_today    = ($date_str === $today);
                            $is_selected = ($date_str === $selected_day);
                            $is_past     = ($date_str < $today);
                            $n_slots     = count($slots_by_date[$date_str] ?? []);
                            $day_appts   = $appts_by_date[$date_str] ?? [];
                            $n_appts     = count(array_filter($day_appts, fn($a) => ($a['status'] ?? '') === 'confirmed'));
                            $n_pending   = count(array_filter($day_appts, fn($a) => ($a['status'] ?? '') === 'pending'));

                            $cls = 'cal-day';
                            if ($is_today)    $cls .= ' cal-day--today';
                            if ($is_selected) $cls .= ' cal-day--selected';
                            if ($is_past)     $cls .= ' cal-day--past';
                        ?>
                        <?php if (!$is_past): ?>
                        <a href="?month=<?= $view_month ?>&day=<?= $date_str ?>" class="<?= $cls ?>">
                        <?php else: ?>
                        <div class="<?= $cls ?>">
                        <?php endif; ?>
                            <span class="cal-day__num"><?= $d ?></span>
                            <div class="cal-day__badges">
                                <?php if ($n_slots > 0): ?>
                                <span class="cal-badge cal-badge--avail"><?= $n_slots ?></span>
                                <?php endif; ?>
                                <?php if ($n_appts > 0): ?>
                                <span class="cal-badge cal-badge--appt"><?= $n_appts ?></span>
                                <?php endif; ?>
                                <?php if ($n_pending > 0): ?>
                                <span class="cal-badge" style="background:#D97706;color:#fff"><?= $n_pending ?>?</span>
                                <?php endif; ?>
                            </div>
                        <?php if (!$is_past): ?>
                        </a>
                        <?php else: ?>
                        </div>
                        <?php endif; ?>
                        <?php endfor; ?>
                    </div>

                    <!-- Legend -->
                    <div style="display:flex;gap:1rem;margin-top:1rem;flex-wrap:wrap;">
                        <span style="display:inline-flex;align-items:center;gap:.35rem;font-size:.75rem;color:var(--text-mid)">
                            <span class="cal-badge cal-badge--avail" style="font-size:.7rem">N</span> Huecos libres
                        </span>
                        <span style="display:inline-flex;align-items:center;gap:.35rem;font-size:.75rem;color:var(--text-mid)">
                            <span class="cal-badge cal-badge--appt" style="font-size:.7rem">N</span> Citas confirmadas
                        </span>
                    </div>
                </div>
            </div>

            <!-- Day panel card -->
            <div class="card">
                <div class="card__head">
                    <span class="card__title">Disponibilidad</span>
                    <span class="panel-date"><?= htmlspecialchars($panel_date_label) ?></span>
                </div>
                <div class="card__body">

                    <!-- Preset buttons -->
                    <div class="panel-section">
                        <p class="panel-section__label">Añadir rápido</p>
                        <div class="preset-row">
                            <form method="POST" action="?month=<?= $view_month ?>&day=<?= $selected_day ?>" style="display:contents">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                                <input type="hidden" name="action" value="bulk_add">
                                <input type="hidden" name="date"   value="<?= htmlspecialchars($selected_day) ?>">
                                <button type="submit" name="preset" value="morning"   class="btn-preset">Mañana (9–13)</button>
                                <button type="submit" name="preset" value="afternoon" class="btn-preset">Tarde (15–19)</button>
                                <button type="submit" name="preset" value="full"      class="btn-preset">Todo el día (9–19)</button>
                            </form>
                        </div>
                    </div>

                    <!-- Custom range -->
                    <div class="panel-section">
                        <p class="panel-section__label">Añadir rango personalizado</p>
                        <form method="POST" action="?month=<?= $view_month ?>&day=<?= $selected_day ?>">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                            <input type="hidden" name="action" value="add_slots">
                            <input type="hidden" name="date"   value="<?= htmlspecialchars($selected_day) ?>">
                            <div class="time-range">
                                <label for="from_time">Desde</label>
                                <input class="time-input" type="time" id="from_time" name="from_time" value="09:00" required>
                                <label for="to_time">Hasta</label>
                                <input class="time-input" type="time" id="to_time"   name="to_time"   value="11:00" required>
                                <button type="submit" class="btn-add">+ Añadir rango</button>
                            </div>
                        </form>
                    </div>

                    <!-- Available slots -->
                    <div class="panel-section">
                        <p class="panel-section__label">
                            Huecos disponibles
                            <?php if ($panel_slots): ?>
                            <span class="badge-count"><?= count($panel_slots) ?></span>
                            <?php endif; ?>
                        </p>
                        <?php if ($panel_slots): ?>
                        <div class="slot-list">
                            <?php foreach ($panel_slots as $t): ?>
                            <form method="POST" action="?month=<?= $view_month ?>&day=<?= $selected_day ?>" style="display:contents">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                                <input type="hidden" name="action" value="remove_slot">
                                <input type="hidden" name="date"   value="<?= htmlspecialchars($selected_day) ?>">
                                <input type="hidden" name="time"   value="<?= htmlspecialchars($t) ?>">
                                <span class="slot-chip">
                                    <?= htmlspecialchars($t) ?>
                                    <button type="submit" class="slot-remove" title="Eliminar hueco">&#x2715;</button>
                                </span>
                            </form>
                            <?php endforeach; ?>
                        </div>
                        <?php else: ?>
                        <p class="empty-state">No hay huecos configurados para este día.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Appointments for selected day -->
                    <?php if ($panel_appts): ?>
                    <div class="panel-section">
                        <p class="panel-section__label">
                            Citas del día
                            <span class="badge-count" style="background:var(--green);color:var(--white)"><?= count($panel_appts) ?></span>
                        </p>
                        <?php foreach ($panel_appts as $a):
                            $isPending  = ($a['status'] ?? '') === 'pending';
                            $analysis   = $a['lead_analysis'] ?? null;
                            $score      = (int)($analysis['score'] ?? 0);
                            $accentColor = $isPending ? '#D97706' : 'var(--green)';
                        ?>
                        <div class="appt-item" style="border-left: 3px solid <?= $accentColor ?>; margin-bottom:.75rem">
                            <span class="appt-time" style="background:<?= $accentColor ?>"><?= htmlspecialchars($a['time']) ?></span>
                            <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:.5rem">
                                <span class="appt-name"><?= htmlspecialchars($a['name']) ?></span>
                                <?php if ($isPending): ?>
                                <span style="font-size:.7rem;background:#FEF3C7;color:#92400E;padding:2px 7px;border-radius:10px;font-weight:600;white-space:nowrap">Pendiente</span>
                                <?php elseif ($score > 0): ?>
                                <span style="font-size:.75rem;background:<?= scoreBg($score) ?>;color:<?= scoreColor($score) ?>;padding:2px 8px;border-radius:10px;font-weight:700;white-space:nowrap"><?= $score ?>/10</span>
                                <?php endif; ?>
                            </div>
                            <div class="appt-meta">
                                <span><?= htmlspecialchars($a['email']) ?></span>
                                <?php if (!empty($a['phone'])): ?><span><?= htmlspecialchars($a['phone']) ?></span><?php endif; ?>
                                <span style="color:var(--text-light);font-size:.72rem">Ref: <?= htmlspecialchars($a['code']) ?></span>
                            </div>

                            <?php if ($analysis): ?>
                            <div style="grid-column:1/-1;margin-top:.5rem;padding:.6rem .75rem;background:<?= scoreBg($score) ?>;border-radius:7px;font-size:.78rem">
                                <strong style="color:<?= scoreColor($score) ?>"><?= htmlspecialchars($analysis['label'] ?? '') ?></strong>
                                <?php if (!empty($analysis['summary'])): ?>
                                <p style="margin:.3rem 0 0;color:#374151"><?= htmlspecialchars($analysis['summary']) ?></p>
                                <?php endif; ?>
                                <?php if (!empty($analysis['signals'])): ?>
                                <p style="margin:.4rem 0 0;color:#065F46">&#10003; <?= htmlspecialchars(implode(' · ', $analysis['signals'])) ?></p>
                                <?php endif; ?>
                                <?php if (!empty($analysis['alerts'])): ?>
                                <p style="margin:.2rem 0 0;color:#991B1B">&#9888; <?= htmlspecialchars(implode(' · ', $analysis['alerts'])) ?></p>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <!-- Note -->
                            <div style="grid-column:1/-1;margin-top:.4rem">
                                <form method="POST" action="?month=<?= $view_month ?>&day=<?= $selected_day ?>" style="display:flex;gap:.4rem;align-items:center">
                                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                                    <input type="hidden" name="action" value="save_note">
                                    <input type="hidden" name="code" value="<?= htmlspecialchars($a['code']) ?>">
                                    <input type="text" name="note" placeholder="Nota interna..." value="<?= htmlspecialchars($a['admin_note'] ?? '') ?>" style="flex:1;padding:.35rem .6rem;border:1px solid var(--border);border-radius:6px;font-size:.78rem;font-family:inherit;outline:none">
                                    <button type="submit" style="padding:.35rem .7rem;background:var(--navy);color:#fff;border-radius:6px;font-size:.75rem;font-weight:600;cursor:pointer;border:none">Guardar</button>
                                </form>
                            </div>

                            <!-- Actions -->
                            <div style="grid-column:1/-1;display:flex;gap:.4rem;margin-top:.35rem">
                                <form method="POST" action="?month=<?= $view_month ?>&day=<?= $selected_day ?>" onsubmit="return confirm('¿Cancelar esta cita?')">
                                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                                    <input type="hidden" name="action" value="cancel_appointment">
                                    <input type="hidden" name="code" value="<?= htmlspecialchars($a['code']) ?>">
                                    <button type="submit" style="padding:.3rem .65rem;border:1px solid #FCA5A5;background:#FEF2F2;color:#DC2626;border-radius:6px;font-size:.75rem;font-weight:600;cursor:pointer">Cancelar</button>
                                </form>
                                <form method="POST" action="?month=<?= $view_month ?>&day=<?= $selected_day ?>" onsubmit="return confirm('¿Eliminar permanentemente esta cita del registro?')">
                                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                                    <input type="hidden" name="action" value="delete_appointment">
                                    <input type="hidden" name="code" value="<?= htmlspecialchars($a['code']) ?>">
                                    <button type="submit" style="padding:.3rem .65rem;border:1px solid var(--border);background:var(--off-white);color:var(--text-mid);border-radius:6px;font-size:.75rem;font-weight:600;cursor:pointer">Eliminar</button>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                </div><!-- /card__body -->
            </div><!-- /day panel card -->

        </div><!-- /admin-left -->

        <!-- ════ RIGHT COLUMN ════ -->
        <div class="admin-right">

            <!-- Pending appointments -->
            <?php if ($pending_appts): ?>
            <div class="card" style="border:1.5px solid #FDE68A">
                <div class="card__head" style="background:#FFFBEB">
                    <span class="card__title" style="color:#92400E">Pendientes de confirmar</span>
                    <span class="badge-count" style="background:#D97706;color:#fff"><?= count($pending_appts) ?></span>
                </div>
                <div class="card__body">
                    <?php foreach ($pending_appts as $a):
                        $ts    = strtotime($a['date']);
                        $label = date('j', $ts) . ' ' . $month_names_es[(int)date('n', $ts)] . ', ' . $a['time'];
                        $mins  = max(0, (int)(($a['expires_at'] - time()) / 60));
                    ?>
                    <div class="upcoming-item">
                        <span class="upcoming-dot" style="background:#D97706"></span>
                        <div class="upcoming-info" style="flex:1">
                            <p class="upcoming-who"><?= htmlspecialchars($a['name']) ?></p>
                            <p class="upcoming-when"><?= htmlspecialchars($label) ?></p>
                            <p class="upcoming-when" style="color:#D97706">Expira en ~<?= $mins ?> min</p>
                        </div>
                        <form method="POST" action="?month=<?= $view_month ?>&day=<?= $selected_day ?>" onsubmit="return confirm('¿Cancelar esta solicitud pendiente?')">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                            <input type="hidden" name="action" value="cancel_appointment">
                            <input type="hidden" name="code" value="<?= htmlspecialchars($a['code']) ?>">
                            <button type="submit" style="padding:.25rem .55rem;border:1px solid #FCA5A5;background:#FEF2F2;color:#DC2626;border-radius:5px;font-size:.72rem;font-weight:600;cursor:pointer">Cancelar</button>
                        </form>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Upcoming confirmed appointments -->
            <div class="card">
                <div class="card__head">
                    <span class="card__title">Próximas citas</span>
                    <?php if ($confirmed_appts): ?>
                    <span class="badge-count" style="background:var(--green);color:var(--white)"><?= count($confirmed_appts) ?></span>
                    <?php endif; ?>
                </div>
                <div class="card__body">
                    <?php if ($confirmed_appts): ?>
                    <?php foreach ($confirmed_appts as $a):
                        $ts       = strtotime($a['date']);
                        $label    = date('j', $ts) . ' ' . $month_names_es[(int)date('n', $ts)] . ', ' . $a['time'];
                        $analysis = $a['lead_analysis'] ?? null;
                        $score    = (int)($analysis['score'] ?? 0);
                    ?>
                    <div class="upcoming-item" style="flex-wrap:wrap;gap:.4rem">
                        <span class="upcoming-dot"></span>
                        <div class="upcoming-info" style="flex:1;min-width:0">
                            <div style="display:flex;align-items:center;gap:.5rem;flex-wrap:wrap">
                                <p class="upcoming-who"><?= htmlspecialchars($a['name']) ?></p>
                                <?php if ($score > 0): ?>
                                <span style="font-size:.7rem;background:<?= scoreBg($score) ?>;color:<?= scoreColor($score) ?>;padding:1px 7px;border-radius:10px;font-weight:700"><?= $score ?>/10</span>
                                <?php endif; ?>
                            </div>
                            <p class="upcoming-when"><?= htmlspecialchars($label) ?></p>
                            <p class="upcoming-when"><?= htmlspecialchars($a['email']) ?></p>
                            <?php if ($analysis && !empty($analysis['label'])): ?>
                            <p style="font-size:.72rem;color:<?= scoreColor($score) ?>;margin-top:2px"><?= htmlspecialchars($analysis['label']) ?></p>
                            <?php endif; ?>
                        </div>
                        <form method="POST" action="?month=<?= $view_month ?>&day=<?= urlencode($a['date']) ?>" onsubmit="return confirm('¿Cancelar esta cita?')">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                            <input type="hidden" name="action" value="cancel_appointment">
                            <input type="hidden" name="code" value="<?= htmlspecialchars($a['code']) ?>">
                            <button type="submit" style="padding:.25rem .55rem;border:1px solid #FCA5A5;background:#FEF2F2;color:#DC2626;border-radius:5px;font-size:.72rem;font-weight:600;cursor:pointer;align-self:flex-start">Cancelar</button>
                        </form>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <p class="empty-state">No hay citas próximas confirmadas.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Quick stats -->
            <div class="card">
                <div class="card__head">
                    <span class="card__title">Resumen</span>
                </div>
                <div class="card__body" style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <?php
                    $total_slots  = count($slots_all);
                    $future_slots = array_filter($slots_all, fn($s) => substr($s, 0, 10) >= $today);
                    $total_appts  = count(array_filter($appointments_all, fn($a) => ($a['status'] ?? '') === 'confirmed'));
                    $future_appts = count(array_filter($appointments_all, fn($a) => ($a['status'] ?? '') === 'confirmed' && ($a['date'] ?? '') >= $today));
                    $n_pending    = count($pending_appts);
                    ?>
                    <div style="text-align:center;padding:.75rem;background:var(--off-white);border-radius:var(--radius)">
                        <p style="font-size:1.6rem;font-weight:700;color:var(--gold)"><?= count($future_slots) ?></p>
                        <p style="font-size:.75rem;color:var(--text-mid);margin-top:2px">Huecos futuros</p>
                    </div>
                    <div style="text-align:center;padding:.75rem;background:var(--off-white);border-radius:var(--radius)">
                        <p style="font-size:1.6rem;font-weight:700;color:var(--green)"><?= $future_appts ?></p>
                        <p style="font-size:.75rem;color:var(--text-mid);margin-top:2px">Citas próximas</p>
                    </div>
                    <div style="text-align:center;padding:.75rem;background:var(--off-white);border-radius:var(--radius)">
                        <p style="font-size:1.6rem;font-weight:700;color:#D97706"><?= $n_pending ?></p>
                        <p style="font-size:.75rem;color:var(--text-mid);margin-top:2px">Pendientes</p>
                    </div>
                    <div style="text-align:center;padding:.75rem;background:var(--off-white);border-radius:var(--radius)">
                        <p style="font-size:1.6rem;font-weight:700;color:var(--navy)"><?= $total_appts ?></p>
                        <p style="font-size:.75rem;color:var(--text-mid);margin-top:2px">Citas totales</p>
                    </div>
                </div>
            </div>

        </div><!-- /admin-right -->

    </div><!-- /admin-grid -->
</main>

</body>
</html>
