<?php
$page_title       = 'Consultoría Estratégica de Inteligencia Artificial para Empresas · Jesús Villamizar';
$page_description = 'Consultoría de IA para empresas en España. Diagnóstico, roadmap y priorización de casos de uso con ROI claro. Primer paso para adoptar IA sin riesgo. Madrid y remoto.';
$canonical        = 'https://jesusvillamizar.com/servicios/consultoria-estrategica-ia/';
$schema = json_encode(['@context'=>'https://schema.org','@graph'=>[
  ['@type'=>'Service','@id'=>'https://jesusvillamizar.com/servicios/consultoria-estrategica-ia/#service',
   'name'=>'Consultoría Estratégica de Inteligencia Artificial',
   'description'=>'Análisis de tu negocio y diseño de un roadmap de adopción de IA realista con ROI claro y priorización de casos de uso de alto impacto.',
   'provider'=>['@id'=>'https://jesusvillamizar.com/#person'],
   'areaServed'=>'ES','inLanguage'=>'es',
   'url'=>'https://jesusvillamizar.com/servicios/consultoria-estrategica-ia/'],
  ['@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>'https://jesusvillamizar.com/'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Servicios','item'=>'https://jesusvillamizar.com/servicios/'],
    ['@type'=>'ListItem','position'=>3,'name'=>'Consultoría Estratégica IA','item'=>'https://jesusvillamizar.com/servicios/consultoria-estrategica-ia/']
  ]]
]],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
require_once '../../includes/head.php';
require_once '../../includes/nav.php';
?>

<section class="hero" style="min-height:50vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">Consultoría de IA</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.2rem);">Consultoría Estratégica<br>de Inteligencia Artificial</h1>
      <p class="hero__subtitle" style="max-width:600px;margin-inline:auto;">
        El primer paso para adoptar IA sin despilfarrar presupuesto. Analizamos tu negocio, identificamos los casos de uso con mayor ROI y te entregamos un roadmap ejecutable.
      </p>
      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
        <a href="/contacto/" class="btn btn--gold">Solicitar diagnóstico gratuito</a>
        <a href="/servicios/" class="btn btn--outline-light">Ver todos los servicios</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">¿Qué consigues?</span>
      <h2 class="section-title">Claridad antes de invertir un euro en IA</h2>
      <p class="section-subtitle">La mayoría de proyectos de IA fracasan por falta de estrategia, no de tecnología. La consultoría existe para evitarlo.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 18l5 5 11-11" stroke="#C9A535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Diagnóstico honesto</h3>
        <p>Evaluamos si la IA tiene sentido para tu caso concreto. Si no lo tiene, te lo decimos. No vendemos por vender.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26V10h16M10 18h10" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Roadmap priorizado</h3>
        <p>Lista ordenada de casos de uso por impacto económico, complejidad técnica y tiempo de implementación.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M18 10v4M18 22v4M10 18h4M22 18h4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/><circle cx="18" cy="18" r="4" stroke="#C9A535" stroke-width="1.8"/></svg></div>
        <h3>ROI estimado</h3>
        <p>Para cada caso de uso: ahorro esperado en tiempo, reducción de coste operativo o incremento de ingresos.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="10" y="14" width="16" height="12" rx="2" stroke="#C9A535" stroke-width="1.8"/><path d="M14 14v-2a4 4 0 018 0v2" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>Sin dependencia tecnológica</h3>
        <p>El informe es tuyo. Puedes implementarlo con nosotros o con cualquier otro equipo. Sin lock-in.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Cómo funciona</span>
      <h2 class="section-title">De cero a roadmap en 2 semanas</h2>
    </div>
    <div class="process-steps reveal" style="margin-top:3rem;">
      <div class="process-step">
        <div class="process-step__num">01</div>
        <div class="process-step__body">
          <h3>Entrevista de negocio</h3>
          <p>Sesión de 90 minutos con los responsables clave para entender procesos, datos disponibles, pain points y objetivos.</p>
        </div>
      </div>
      <div class="process-step">
        <div class="process-step__num">02</div>
        <div class="process-step__body">
          <h3>Auditoría de datos y sistemas</h3>
          <p>Analizamos qué datos tienes, en qué formato, qué calidad tienen y qué sistemas habría que integrar.</p>
        </div>
      </div>
      <div class="process-step">
        <div class="process-step__num">03</div>
        <div class="process-step__body">
          <h3>Identificación de casos de uso</h3>
          <p>Mapeamos entre 5 y 15 oportunidades de IA ordenadas por impacto estimado y viabilidad técnica.</p>
        </div>
      </div>
      <div class="process-step">
        <div class="process-step__num">04</div>
        <div class="process-step__body">
          <h3>Entrega del roadmap</h3>
          <p>Documento ejecutivo con cada caso de uso detallado: descripción, tecnología, estimación de coste, ROI y siguientes pasos.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Casos de uso frecuentes</span>
      <h2 class="section-title">Lo que solemos encontrar en la auditoría</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="service-card reveal"><h3 class="service-card__title">Atención al cliente con IA</h3><p class="service-card__desc">Chatbot que resuelve el 60-80% de las consultas sin intervención humana. ROI visible en el primer mes.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Automatización de documentos</h3><p class="service-card__desc">Extracción automática de datos de facturas, contratos y albaranes. Elimina horas de trabajo manual.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Predicción de demanda</h3><p class="service-card__desc">Modelos que anticipan ventas, stock o necesidades de personal con semanas de antelación.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Análisis de datos internos</h3><p class="service-card__desc">Preguntar a tus datos en lenguaje natural. Sin Excel, sin BI costosos, sin esperar al equipo de datos.</p></div>
    </div>
  </div>
</section>

<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <h2 class="section-title section-title--light">Empieza con un diagnóstico gratuito</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2rem;">30 minutos de llamada. Te cuento qué oportunidades de IA tiene tu negocio sin coste ni compromiso.</p>
    <a href="/contacto/" class="btn btn--gold">Reservar llamada gratuita</a>
  </div>
</section>

<?php require_once '../../includes/footer.php'; ?>
