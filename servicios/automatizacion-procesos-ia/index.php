<?php
$page_title       = 'Automatización de Procesos con Inteligencia Artificial · Jesús Villamizar';
$page_description = 'Automatización de procesos empresariales con IA en España. RPA inteligente, flujos con n8n y Make, extracción de documentos, integración con ERP y CRM. Madrid y remoto.';
$canonical        = 'https://jesusvillamizar.com/servicios/automatizacion-procesos-ia/';
$schema = json_encode(['@context'=>'https://schema.org','@graph'=>[
  ['@type'=>'Service','@id'=>'https://jesusvillamizar.com/servicios/automatizacion-procesos-ia/#service',
   'name'=>'Automatización de Procesos con Inteligencia Artificial',
   'description'=>'Automatización de flujos de trabajo empresariales combinando RPA con IA. Extracción de documentos, integración de sistemas y eliminación de trabajo manual repetitivo.',
   'provider'=>['@id'=>'https://jesusvillamizar.com/#person'],
   'areaServed'=>'ES','inLanguage'=>'es',
   'url'=>'https://jesusvillamizar.com/servicios/automatizacion-procesos-ia/'],
  ['@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>'https://jesusvillamizar.com/'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Servicios','item'=>'https://jesusvillamizar.com/servicios/'],
    ['@type'=>'ListItem','position'=>3,'name'=>'Automatización de Procesos con IA','item'=>'https://jesusvillamizar.com/servicios/automatizacion-procesos-ia/']
  ]]
]],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
require_once '../../includes/head.php';
require_once '../../includes/nav.php';
?>

<section class="hero" style="min-height:50vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">Automatización con IA</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.2rem);">Automatización de Procesos<br>con Inteligencia Artificial</h1>
      <p class="hero__subtitle" style="max-width:620px;margin-inline:auto;">
        Elimina el trabajo manual repetitivo de tu empresa. Flujos de trabajo inteligentes que procesan documentos, sincronizan sistemas y toman decisiones sin intervención humana.
      </p>
      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
        <a href="/contacto/" class="btn btn--gold">Analizar mi proceso</a>
        <a href="/servicios/" class="btn btn--outline-light">Ver todos los servicios</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">El problema</span>
      <h2 class="section-title">Tu equipo pierde horas en tareas que puede hacer la IA</h2>
      <p class="section-subtitle">Introducir datos manualmente, copiar entre sistemas, procesar facturas, clasificar correos, enviar informes. Trabajo sin valor añadido que la IA puede hacer en segundos.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26l4-8 4 5 3-4 5 7H10z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/></svg></div>
        <h3>Extracción de documentos</h3>
        <p>Facturas, contratos, albaranes, formularios. La IA extrae los datos estructurados automáticamente y los introduce en tu sistema.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="9" y="9" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="20" y="20" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><path d="M12.5 16v4.5h11" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>Sincronización de sistemas</h3>
        <p>CRM, ERP, bases de datos, hojas de cálculo. Conectamos tus herramientas para que los datos fluyan solos sin copiar y pegar.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 18h16M18 10l8 8-8 8" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Flujos de aprobación</h3>
        <p>Automatiza las revisiones y aprobaciones internas. La IA clasifica, prioriza y enruta cada solicitud al responsable correcto.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26V16l8-6 8 6v10M14 26v-5h8v5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Informes automáticos</h3>
        <p>Generación y envío de informes periódicos sin intervención humana. Siempre puntuales, siempre con datos actualizados.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Stack técnico</span>
      <h2 class="section-title">Herramientas que uso para automatizar</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="service-card reveal"><h3 class="service-card__title">n8n y Make (Integromat)</h3><p class="service-card__desc">Orquestación de flujos de trabajo con más de 400 integraciones. Automatización visual con lógica compleja y IA embebida.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Python + LangChain</h3><p class="service-card__desc">Cuando la automatización necesita razonamiento real: clasificación de documentos, extracción semántica y toma de decisiones con LLMs.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">APIs y Webhooks</h3><p class="service-card__desc">Conectamos cualquier sistema con API REST: Salesforce, HubSpot, SAP, Holded, Notion, Google Workspace y más.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">OCR + IA para documentos</h3><p class="service-card__desc">Extracción precisa de datos de PDFs, imágenes y formularios escaneados. Validación automática y enrutamiento al sistema destino.</p></div>
    </div>
  </div>
</section>

<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <h2 class="section-title section-title--light">Identifica cuánto tiempo pierdes cada semana</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2rem;">En 30 minutos analizamos tus procesos y estimamos el ahorro real. Sin compromiso.</p>
    <a href="/contacto/" class="btn btn--gold">Analizar mis procesos gratis</a>
  </div>
</section>

<?php require_once '../../includes/footer.php'; ?>
