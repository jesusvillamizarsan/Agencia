<?php
// Variables esperadas: $page_title, $page_description, $canonical
// Opcionales: $og_title, $og_description, $og_image, $schema, $extra_head
$og_title       = $og_title       ?? $page_title;
$og_description = $og_description ?? $page_description;
$og_image       = $og_image       ?? 'https://jesusvillamizar.com/assets/img/og-image.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_description) ?>" />
  <meta name="robots" content="index, follow" />
  <meta name="geo.region" content="ES-MD" />
  <meta name="geo.placename" content="Madrid" />
  <meta property="og:title"       content="<?= htmlspecialchars($og_title) ?>" />
  <meta property="og:description" content="<?= htmlspecialchars($og_description) ?>" />
  <meta property="og:image"       content="<?= htmlspecialchars($og_image) ?>" />
  <meta property="og:image:width"  content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:url"         content="<?= htmlspecialchars($canonical) ?>" />
  <meta property="og:type"        content="website" />
  <meta property="og:locale"      content="es_ES" />
  <meta property="og:site_name"   content="Jesús Villamizar AI Agency" />
  <meta name="twitter:card"        content="summary_large_image" />
  <meta name="twitter:title"       content="<?= htmlspecialchars($og_title) ?>" />
  <meta name="twitter:description" content="<?= htmlspecialchars($og_description) ?>" />
  <meta name="twitter:image"       content="<?= htmlspecialchars($og_image) ?>" />
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>" />
  <link rel="icon" href="/assets/favicon.svg" type="image/svg+xml" />

<?php if (!empty($schema)): ?>
  <script type="application/ld+json"><?= $schema ?></script>
<?php endif; ?>

<?php if (!empty($extra_head)) echo $extra_head; ?>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preload"    href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'" />
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@400;500;600;700&display=swap" /></noscript>
  <link rel="preload" href="/css/style.css" as="style" />
  <link rel="stylesheet" href="/css/style.css" />
</head>
