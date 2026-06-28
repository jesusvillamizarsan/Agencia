<?php
http_response_code(404);
$page_title       = 'Página no encontrada · Jesús Villamizar AI';
$page_description = 'La página que buscas no existe. Vuelve al inicio o explora los servicios de IA de Jesús Villamizar.';
$canonical        = 'https://jesusvillamizar.com/';
$og_title         = 'Página no encontrada · Jesús Villamizar AI';
$extra_head       = '<meta name="robots" content="noindex, nofollow" />';
require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/nav.php';
?>

<main style="min-height:70vh;display:flex;align-items:center;justify-content:center;padding:6rem 1.5rem;">
  <div style="text-align:center;max-width:560px;margin:0 auto;">
    <p style="font-size:7rem;font-weight:700;color:var(--gold);line-height:1;margin:0 0 .5rem;">404</p>
    <h1 style="font-size:2rem;color:var(--white);margin:0 0 1rem;">Página no encontrada</h1>
    <p style="color:var(--text-muted);font-size:1.05rem;line-height:1.7;margin:0 0 2.5rem;">
      La página que buscas no existe o ha sido movida.<br>
      Quizás el chatbot puede ayudarte a encontrar lo que necesitas.
    </p>
    <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
      <a href="/" class="btn btn--gold">Volver al inicio</a>
      <a href="/servicios/" class="btn btn--outline">Ver servicios</a>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
