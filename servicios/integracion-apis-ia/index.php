<?php
$page_title       = 'Integración de APIs de Inteligencia Artificial en tu Empresa · Jesús Villamizar';
$page_description = 'Integra GPT-4, Claude, Gemini y otras APIs de IA en tus sistemas actuales: CRM, ERP, web o app. Desarrollo seguro y escalable. España y Europa. Jesús Villamizar.';
$canonical        = 'https://jesusvillamizar.com/servicios/integracion-apis-ia/';
$schema = json_encode(['@context'=>'https://schema.org','@graph'=>[
  ['@type'=>'Service','@id'=>'https://jesusvillamizar.com/servicios/integracion-apis-ia/#service',
   'name'=>'Integración de APIs de Inteligencia Artificial',
   'description'=>'Conectamos modelos de lenguaje (GPT-4, Claude, Gemini) y APIs de IA a tus sistemas actuales de forma segura, escalable y conforme al RGPD.',
   'provider'=>['@id'=>'https://jesusvillamizar.com/#person'],
   'areaServed'=>'ES','inLanguage'=>'es',
   'url'=>'https://jesusvillamizar.com/servicios/integracion-apis-ia/'],
  ['@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>'https://jesusvillamizar.com/'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Servicios','item'=>'https://jesusvillamizar.com/servicios/'],
    ['@type'=>'ListItem','position'=>3,'name'=>'Integración de APIs de IA','item'=>'https://jesusvillamizar.com/servicios/integracion-apis-ia/']
  ]]
]],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
require_once '../../includes/head.php';
require_once '../../includes/nav.php';
?>

<section class="hero" style="min-height:50vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">Integración de IA</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.2rem);">Integra APIs de IA<br>en tus Sistemas Actuales</h1>
      <p class="hero__subtitle" style="max-width:620px;margin-inline:auto;">
        No necesitas cambiar tu software. Añadimos inteligencia artificial —GPT-4, Claude, Gemini, visión, voz— a los sistemas que ya tienes: CRM, ERP, web o aplicación propia.
      </p>
      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
        <a href="/contacto/" class="btn btn--gold">Consultar integración</a>
        <a href="/servicios/" class="btn btn--outline-light">Ver todos los servicios</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">APIs que integramos</span>
      <h2 class="section-title">Los mejores modelos del mercado en tu software</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><circle cx="18" cy="18" r="8" stroke="#C9A535" stroke-width="1.8"/><path d="M18 13v5l3 3" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div><h3>OpenAI (GPT-4o, o1)</h3><p>El modelo más utilizado en producción. Ideal para texto, código, análisis y asistentes de negocio.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M12 24l6-12 6 12M14 20h8" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><h3>Anthropic Claude</h3><p>Razonamiento avanzado, contextos muy largos y mejor rendimiento en análisis de documentos complejos.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 18l5 5 11-11" stroke="#C9A535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div><h3>Modelos Open Source</h3><p>Llama 3, Mistral, Phi. Desplegados en tu propia infraestructura para máxima privacidad y sin coste por token.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="9" y="9" width="18" height="18" rx="4" stroke="#C9A535" stroke-width="1.8"/><path d="M14 18l3 3 5-5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><h3>APIs de visión y voz</h3><p>Whisper para transcripción, DALL-E y Stable Diffusion para imágenes, ElevenLabs para síntesis de voz.</p></div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Lo que construimos</span>
      <h2 class="section-title">Más que una llamada a una API</h2>
      <p class="section-subtitle">Una integración de producción incluye gestión de errores, control de costes, caché inteligente, logging y seguridad. Eso es lo que entregamos.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="service-card reveal"><h3 class="service-card__title">Backend seguro y escalable</h3><p class="service-card__desc">Las claves de API nunca expuestas al cliente. Rate limiting, autenticación, logs de uso y control de costes por usuario.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Prompt engineering avanzado</h3><p class="service-card__desc">El sistema prompt que hace que el modelo se comporte exactamente como necesita tu caso de uso, con las guardrails correctas.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">RAG y base de conocimiento</h3><p class="service-card__desc">Conectamos el modelo a tu documentación interna con búsqueda semántica para respuestas precisas basadas en tus datos.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Cumplimiento RGPD</h3><p class="service-card__desc">Datos de usuarios europeos procesados conforme a la normativa. Contratos de procesamiento (DPA) con los proveedores.</p></div>
    </div>
  </div>
</section>

<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <h2 class="section-title section-title--light">¿Qué quieres añadir IA a tu sistema?</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2rem;">Cuéntame qué sistema tienes y qué quieres que haga la IA. Lo analizamos en 30 minutos.</p>
    <a href="/contacto/" class="btn btn--gold">Consultar integración</a>
  </div>
</section>

<?php require_once '../../includes/footer.php'; ?>
