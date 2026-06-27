<?php
/**
 * OG Image generator — Jesús Villamizar AI Agency
 * Produces a 1200×630 PNG for Open Graph / Twitter Card
 */
header('Content-Type: image/png');
header('Cache-Control: public, max-age=604800');
header('X-Content-Type-Options: nosniff');

$w = 1200;
$h = 630;

$img = imagecreatetruecolor($w, $h);

// ── Colours ───────────────────────────────────────────────
$navy     = imagecolorallocate($img, 10,  22,  40);
$navy2    = imagecolorallocate($img, 14,  32,  60);
$gold     = imagecolorallocate($img, 201, 168, 76);
$gold_dim = imagecolorallocate($img, 140, 110, 45);
$white    = imagecolorallocate($img, 255, 255, 255);
$grey     = imagecolorallocate($img, 150, 165, 190);

// ── Background ────────────────────────────────────────────
imagefilledrectangle($img, 0,   0, $w, $h,      $navy);
imagefilledrectangle($img, 0,   0, $w, 320,     $navy2);  // subtle top gradient

// Decorative corner glow (top-right)
for ($r = 300; $r > 0; $r -= 15) {
    $alpha = (int)(100 - $r / 3.5);
    $c = imagecolorallocatealpha($img, 201, 168, 76, max(0, min(127, 127 - $alpha)));
    imagefilledellipse($img, $w - 60, 0, $r * 2, $r * 2, $c);
}

// Gold accent bar — top
imagefilledrectangle($img, 0, 0, $w, 7, $gold);

// Gold accent bar — bottom
imagefilledrectangle($img, 0, $h - 7, $w, $h, $gold);

// ── Try to load a system font ─────────────────────────────
$font_bold = null;
$font_reg  = null;

$bold_paths = [
    '/usr/share/fonts/truetype/liberation/LiberationSans-Bold.ttf',
    '/usr/share/fonts/liberation/LiberationSans-Bold.ttf',
    '/usr/share/fonts/truetype/freefont/FreeSansBold.ttf',
    '/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf',
    '/usr/share/fonts/dejavu/DejaVuSans-Bold.ttf',
    'C:\Windows\Fonts\arialbd.ttf',
    'C:\Windows\Fonts\calibrib.ttf',
    '/Library/Fonts/Arial Bold.ttf',
    '/System/Library/Fonts/Helvetica.ttc',
];
$reg_paths = [
    '/usr/share/fonts/truetype/liberation/LiberationSans-Regular.ttf',
    '/usr/share/fonts/liberation/LiberationSans-Regular.ttf',
    '/usr/share/fonts/truetype/freefont/FreeSans.ttf',
    '/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf',
    '/usr/share/fonts/dejavu/DejaVuSans.ttf',
    'C:\Windows\Fonts\arial.ttf',
    'C:\Windows\Fonts\calibri.ttf',
    '/Library/Fonts/Arial.ttf',
    '/System/Library/Fonts/Helvetica.ttc',
];

foreach ($bold_paths as $p) { if (file_exists($p)) { $font_bold = $p; break; } }
foreach ($reg_paths  as $p) { if (file_exists($p)) { $font_reg  = $p; break; } }

if (!$font_bold) $font_bold = $font_reg;
if (!$font_reg)  $font_reg  = $font_bold;

// ── Text layout ───────────────────────────────────────────
if ($font_bold && $font_reg) {
    // Badge pill background
    $badge_x = 80; $badge_y = 95;
    imagefilledroundedrectangle($img, $badge_x, $badge_y, $badge_x + 290, $badge_y + 36, 18, $gold_dim);
    imagettftext($img, 13, 0, $badge_x + 14, $badge_y + 24, $white, $font_reg,
        'AGENCIA DE IA · MADRID');

    // Main name
    imagettftext($img, 62, 0, 78, 230, $white, $font_bold, 'Jesús Villamizar');

    // Gold tagline
    imagettftext($img, 28, 0, 82, 286, $gold, $font_reg,
        'Consultoría de Inteligencia Artificial');

    // Divider
    imagefilledrectangle($img, 82, 314, 420, 317, $gold_dim);

    // Services row
    $services = ['Machine Learning', 'Deep Learning', 'Chatbots', 'Agentes IA', 'MLOps'];
    $sx = 82;
    foreach ($services as $svc) {
        $bbox = imagettfbbox(14, 0, $font_reg, $svc);
        $sw   = abs($bbox[2] - $bbox[0]) + 28;
        imagefilledroundedrectangle($img, $sx, 338, $sx + $sw, 368, 14,
            imagecolorallocate($img, 20, 40, 75));
        imagettftext($img, 13, 0, $sx + 14, 358, $grey, $font_reg, $svc);
        $sx += $sw + 10;
    }

    // Bottom URL
    imagettftext($img, 19, 0, 82, 580, $gold, $font_reg, 'jesusvillamizar.com');

    // Right side — decorative "AI" monogram
    imagettftext($img, 160, 0, 820, 420, imagecolorallocate($img, 20, 38, 68), $font_bold, 'AI');
    imagettftext($img, 18, 0, 832, 455, $gold_dim, $font_reg, 'Artificial Intelligence');

} else {
    // Fallback: built-in GD bitmap fonts
    imagestring($img, 5, 80, 180, 'Jesus Villamizar AI Agency', $white);
    imagestring($img, 4, 80, 220, 'Agencia de Inteligencia Artificial - Madrid', $gold);
    imagestring($img, 3, 80, 340, 'Machine Learning  Deep Learning  Chatbots  Agentes IA', $grey);
    imagestring($img, 3, 80, 570, 'jesusvillamizar.com', $gold);
}

// ── Output ────────────────────────────────────────────────
imagepng($img, null, 8);
imagedestroy($img);

// Helper: rounded rectangle (PHP < 8.1 doesn't have imagefilledroundedrectangle natively)
function imagefilledroundedrectangle(GdImage $img, int $x1, int $y1, int $x2, int $y2, int $r, int $color): void {
    imagefilledrectangle($img, $x1 + $r, $y1, $x2 - $r, $y2, $color);
    imagefilledrectangle($img, $x1, $y1 + $r, $x2, $y2 - $r, $color);
    imagefilledellipse($img, $x1 + $r, $y1 + $r, $r * 2, $r * 2, $color);
    imagefilledellipse($img, $x2 - $r, $y1 + $r, $r * 2, $r * 2, $color);
    imagefilledellipse($img, $x1 + $r, $y2 - $r, $r * 2, $r * 2, $color);
    imagefilledellipse($img, $x2 - $r, $y2 - $r, $r * 2, $r * 2, $color);
}
