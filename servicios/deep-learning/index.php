<?php
$page_title       = 'Deep Learning para Empresas: Visión Artificial y NLP · Jesús Villamizar';
$page_description = 'Servicios de Deep Learning para empresas en España. Visión artificial, NLP, transformers, fine-tuning de LLMs y redes neuronales profundas. PyTorch. Madrid y remoto.';
$canonical        = 'https://jesusvillamizar.com/servicios/deep-learning/';
$schema = json_encode(['@context'=>'https://schema.org','@graph'=>[
  ['@type'=>'Service','@id'=>'https://jesusvillamizar.com/servicios/deep-learning/#service',
   'name'=>'Deep Learning para Empresas',
   'description'=>'Visión artificial, procesamiento de lenguaje natural y redes neuronales profundas. Fine-tuning de LLMs y transformers para casos de uso de alta complejidad.',
   'provider'=>['@id'=>'https://jesusvillamizar.com/#person'],
   'areaServed'=>'ES','inLanguage'=>'es',
   'url'=>'https://jesusvillamizar.com/servicios/deep-learning/'],
  ['@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>'https://jesusvillamizar.com/'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Servicios','item'=>'https://jesusvillamizar.com/servicios/'],
    ['@type'=>'ListItem','position'=>3,'name'=>'Deep Learning','item'=>'https://jesusvillamizar.com/servicios/deep-learning/']
  ]]
]],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
require_once '../../includes/head.php';
require_once '../../includes/nav.php';
?>

<section class="hero" style="min-height:50vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">Deep Learning</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.2rem);">Deep Learning Aplicado<br>a Problemas Empresariales Reales</h1>
      <p class="hero__subtitle" style="max-width:620px;margin-inline:auto;">
        Visión artificial, NLP, transformers y redes neuronales profundas. Para los problemas donde el Machine Learning clásico se queda corto y se necesita el estado del arte.
      </p>
      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
        <a href="/contacto/" class="btn btn--gold">Hablar sobre mi proyecto</a>
        <a href="/servicios/" class="btn btn--outline-light">Ver todos los servicios</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Especialidades</span>
      <h2 class="section-title">Áreas de Deep Learning que domino</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="8" y="10" width="20" height="16" rx="3" stroke="#C9A535" stroke-width="1.8"/><circle cx="14" cy="17" r="3" stroke="#C9A535" stroke-width="1.5"/><path d="M20 14l6 6M20 20l6-6" stroke="#C9A535" stroke-width="1.5" stroke-linecap="round"/></svg></div><h3>Visión Artificial (Computer Vision)</h3><p>Detección de objetos, clasificación de imágenes, OCR avanzado, análisis de vídeo y control de calidad visual automatizado.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 18h3l3-6 3 12 3-6 3 3h3" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><h3>Procesamiento de Lenguaje Natural (NLP)</h3><p>Análisis de sentimiento, clasificación de textos, extracción de entidades, resumen automático y traducción especializada.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 22l5-8 5 4 4-6 2 10" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><h3>Series Temporales con DL</h3><p>LSTMs, Temporal Fusion Transformers y N-BEATS para predicciones de alta precisión en datos secuenciales complejos.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><circle cx="12" cy="18" r="3" stroke="#C9A535" stroke-width="1.8"/><circle cx="24" cy="12" r="3" stroke="#C9A535" stroke-width="1.8"/><circle cx="24" cy="24" r="3" stroke="#C9A535" stroke-width="1.8"/><path d="M15 18h6M21 12l-6 6M21 24l-6-6" stroke="#C9A535" stroke-width="1.5" stroke-linecap="round"/></svg></div><h3>Transformers y Fine-tuning</h3><p>Adapto modelos preentrenados (BERT, RoBERTa, LLaMA) a tu dominio específico con tus datos para máxima precisión.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26l4-8 4 5 3-4 5 7H10z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/></svg></div><h3>Modelos Generativos</h3><p>GANs, VAEs y modelos de difusión para generación de imágenes, datos sintéticos y aumento de datasets.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="9" y="9" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="20" y="9" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="9" y="20" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="20" y="20" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/></svg></div><h3>Multimodal (texto + imagen)</h3><p>Modelos que entienden y generan a la vez texto e imagen. Clasificación de productos con foto y descripción combinadas.</p></div>
    </div>
  </div>
</section>

<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <h2 class="section-title section-title--light">¿Tu problema necesita Deep Learning?</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2rem;">No siempre es la solución correcta. Cuéntame tu caso y te digo honestamente si necesitas DL o algo más simple funciona igual de bien.</p>
    <a href="/contacto/" class="btn btn--gold">Consultar gratis</a>
  </div>
</section>

<?php require_once '../../includes/footer.php'; ?>
