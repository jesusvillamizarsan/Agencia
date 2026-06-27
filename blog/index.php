<?php
$page_title       = 'Blog de Inteligencia Artificial para Empresas · Jesús Villamizar';
$page_description = 'Artículos sobre IA aplicada a empresas: casos de uso, guías técnicas, regulación y estrategia. Escrito por Jesús Villamizar, ingeniero de IA con Máster en ML.';
$canonical        = 'https://jesusvillamizar.com/blog/';
$schema = json_encode([
  '@context' => 'https://schema.org',
  '@graph'   => [
    ['@type'=>'Blog','@id'=>'https://jesusvillamizar.com/blog/#blog',
     'name'=>'Blog de Inteligencia Artificial para Empresas · Jesús Villamizar',
     'url'=>'https://jesusvillamizar.com/blog/',
     'author'=>['@id'=>'https://jesusvillamizar.com/#person'],
     'inLanguage'=>'es'],
    ['@type'=>'BreadcrumbList','itemListElement'=>[
      ['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>'https://jesusvillamizar.com/'],
      ['@type'=>'ListItem','position'=>2,'name'=>'Blog','item'=>'https://jesusvillamizar.com/blog/']
    ]]
  ]
], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
require_once '../includes/head.php';
require_once '../includes/nav.php';
?>

<section class="hero" style="min-height:40vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">Blog</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4vw,3rem);">Inteligencia Artificial aplicada<br>a empresas reales</h1>
      <p class="hero__subtitle" style="max-width:560px;margin-inline:auto;">Casos de uso, guías técnicas, regulación y estrategia. Sin humo: solo lo que funciona en producción.</p>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container" style="max-width:900px;">

    <article class="service-card reveal" style="padding:2rem;margin-bottom:1.5rem;">
      <div style="display:flex;gap:.75rem;flex-wrap:wrap;margin-bottom:1rem;">
        <span style="font-size:.78rem;font-weight:600;color:var(--gold);text-transform:uppercase;letter-spacing:.06em;">Financiación IA</span>
        <span style="font-size:.78rem;color:var(--text-light);">· 28 junio 2026 · Jesús Villamizar</span>
      </div>
      <h2 style="font-family:var(--font-serif);font-size:1.4rem;color:var(--navy);margin-bottom:.75rem;">
        <a href="/blog/ia-con-kit-digital/" style="color:inherit;text-decoration:none;">Cómo usar el Kit Digital para implementar IA en tu empresa (hasta 12.000 €)</a>
      </h2>
      <p style="color:var(--text-mid);font-size:.93rem;line-height:1.7;margin-bottom:1.25rem;">El programa Kit Digital incluye categorías que permiten financiar chatbots, automatización de procesos y otras soluciones de IA para pymes y autónomos en España. Te explico qué cubre, cuánto puedes conseguir y cómo solicitarlo.</p>
      <a href="/blog/ia-con-kit-digital/" class="btn btn--gold" style="padding:.55rem 1.4rem;font-size:.88rem;">Leer artículo →</a>
    </article>

    <div class="reveal" style="text-align:center;padding:3rem;color:var(--text-light);font-size:.9rem;">
      <p>Próximos artículos: <em>Cuánto cuesta un proyecto de IA en España [2026]</em> · <em>EU AI Act: qué implica para tu empresa</em> · <em>RAG vs Fine-tuning: cuándo usar cada uno</em></p>
    </div>

  </div>
</section>

<?php require_once '../includes/footer.php'; ?>
