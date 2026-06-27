<?php
$page_title       = 'Servicios de Inteligencia Artificial para Empresas · Jesús Villamizar';
$page_description = 'Consultoría IA, chatbots, automatización de procesos, agentes autónomos, Machine Learning y MLOps. Servicios de IA a medida para empresas en España y Europa.';
$canonical        = 'https://jesusvillamizar.com/servicios/';

$schema = json_encode([
  '@context' => 'https://schema.org',
  '@graph'   => [
    [
      '@type'       => 'BreadcrumbList',
      'itemListElement' => [
        ['@type' => 'ListItem','position' => 1,'name' => 'Inicio','item' => 'https://jesusvillamizar.com/'],
        ['@type' => 'ListItem','position' => 2,'name' => 'Servicios','item' => 'https://jesusvillamizar.com/servicios/']
      ]
    ],
    [
      '@type'       => 'ItemList',
      'name'        => 'Servicios de Inteligencia Artificial',
      'itemListElement' => [
        ['@type' => 'ListItem','position' => 1,'url' => 'https://jesusvillamizar.com/servicios/consultoria-estrategica-ia/','name' => 'Consultoría Estratégica IA'],
        ['@type' => 'ListItem','position' => 2,'url' => 'https://jesusvillamizar.com/servicios/chatbots-asistentes-virtuales/','name' => 'Chatbots y Asistentes Virtuales'],
        ['@type' => 'ListItem','position' => 3,'url' => 'https://jesusvillamizar.com/servicios/automatizacion-procesos-ia/','name' => 'Automatización de Procesos con IA'],
        ['@type' => 'ListItem','position' => 4,'url' => 'https://jesusvillamizar.com/servicios/agentes-ia-autonomos/','name' => 'Agentes IA Autónomos'],
        ['@type' => 'ListItem','position' => 5,'url' => 'https://jesusvillamizar.com/servicios/machine-learning/','name' => 'Machine Learning a Medida'],
        ['@type' => 'ListItem','position' => 6,'url' => 'https://jesusvillamizar.com/servicios/deep-learning/','name' => 'Deep Learning'],
        ['@type' => 'ListItem','position' => 7,'url' => 'https://jesusvillamizar.com/servicios/integracion-apis-ia/','name' => 'Integración de APIs de IA'],
        ['@type' => 'ListItem','position' => 8,'url' => 'https://jesusvillamizar.com/servicios/mlops/','name' => 'MLOps y Producción']
      ]
    ]
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

require_once '../includes/head.php';
require_once '../includes/nav.php';
?>

<!-- ═══════════════════════ HERO SERVICIOS ═══════════════════════ -->
<section class="hero" style="min-height:55vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">Lo que hacemos</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.2rem);">Servicios de IA para cada etapa<br>de tu empresa</h1>
      <p class="hero__subtitle" style="max-width:620px;margin-inline:auto;">
        Desde la primera consultoría hasta el despliegue de modelos en producción. Cubrimos todo el espectro de la Inteligencia Artificial aplicada al negocio.
      </p>
    </div>
  </div>
</section>

<!-- ═══════════════════════ SERVICIOS ESENCIALES ═══════════════════════ -->
<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Servicios Esenciales</span>
      <h2 class="section-title">El punto de entrada más eficiente</h2>
      <p class="section-subtitle">Diseñados para empresas que quieren resultados reales en semanas, no en meses.</p>
    </div>

    <div class="services-grid reveal" style="margin-top:3rem;">

      <a href="/servicios/consultoria-estrategica-ia/" class="service-card" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon">
          <svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><path d="M20 8l10 6v12l-10 6-10-6V14l10-6z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/><circle cx="20" cy="20" r="3" fill="#C9A535"/></svg>
        </div>
        <h3 class="service-card__title">Consultoría Estratégica IA</h3>
        <p class="service-card__desc">Evaluamos tu negocio y diseñamos un roadmap de adopción de IA realista, con ROI claro y priorización de casos de uso de alto impacto.</p>
      </a>

      <a href="/servicios/chatbots-asistentes-virtuales/" class="service-card" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon">
          <svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><path d="M12 28V16a2 2 0 012-2h4l2-4h4l2 4h4a2 2 0 012 2v12H12z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/><circle cx="20" cy="22" r="3" stroke="#C9A535" stroke-width="1.8"/></svg>
        </div>
        <h3 class="service-card__title">Chatbots y Asistentes Virtuales</h3>
        <p class="service-card__desc">Asistentes inteligentes que atienden a tus clientes 24/7, reducen costes de soporte y mejoran la experiencia de usuario en cualquier canal.</p>
      </a>

      <a href="/servicios/automatizacion-procesos-ia/" class="service-card" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon">
          <svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><path d="M8 20h4l4-8 4 16 4-8 4 8h4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h3 class="service-card__title">Automatización de Procesos con IA</h3>
        <p class="service-card__desc">Combinamos RPA con IA para automatizar flujos repetitivos, liberar a tu equipo de tareas manuales y eliminar errores operativos.</p>
      </a>

      <a href="/servicios/integracion-apis-ia/" class="service-card" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon">
          <svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><path d="M14 20h12M20 14v12" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/><rect x="8" y="8" width="10" height="10" rx="3" stroke="#C9A535" stroke-width="1.8"/><rect x="22" y="22" width="10" height="10" rx="3" stroke="#C9A535" stroke-width="1.8"/></svg>
        </div>
        <h3 class="service-card__title">Integración de APIs de IA</h3>
        <p class="service-card__desc">Conectamos GPT-4, Claude, Gemini y otras APIs de IA a tus sistemas actuales (CRM, ERP, base de datos) de forma segura y escalable.</p>
      </a>

    </div>
  </div>
</section>

<!-- ═══════════════════════ SERVICIOS AVANZADOS ═══════════════════════ -->
<section class="section section--navy">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge section-badge--light">Servicios Avanzados</span>
      <h2 class="section-title section-title--light">Para cuando necesitas ingeniería real</h2>
      <p class="section-subtitle" style="color:rgba(255,255,255,.7);">Modelos propios, arquitecturas complejas, sistemas que escalan. Para proyectos donde un SaaS genérico no llega.</p>
    </div>

    <div class="services-grid reveal" style="margin-top:3rem;">

      <a href="/servicios/agentes-ia-autonomos/" class="service-card service-card--dark" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon">
          <svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.2"/><path d="M20 10c-5.5 0-10 4-10 10s4.5 10 10 10 10-4 10-10" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/><path d="M26 10l4 4-4 4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="20" cy="20" r="3" fill="#C9A535" opacity="0.8"/></svg>
        </div>
        <h3 class="service-card__title">Agentes IA Autónomos</h3>
        <p class="service-card__desc">Sistemas de IA que razonan, planifican y ejecutan tareas complejas de forma autónoma, integrándose con tus herramientas y datos internos.</p>
      </a>

      <a href="/servicios/machine-learning/" class="service-card service-card--dark" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon">
          <svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.2"/><ellipse cx="20" cy="20" rx="10" ry="6" stroke="#C9A535" stroke-width="1.8"/><ellipse cx="20" cy="20" rx="10" ry="6" stroke="#C9A535" stroke-width="1.8" transform="rotate(60 20 20)"/><ellipse cx="20" cy="20" rx="10" ry="6" stroke="#C9A535" stroke-width="1.8" transform="rotate(120 20 20)"/><circle cx="20" cy="20" r="2.5" fill="#C9A535"/></svg>
        </div>
        <h3 class="service-card__title">Machine Learning a Medida</h3>
        <p class="service-card__desc">Modelos de clasificación, regresión, predicción de demanda, detección de fraude y scoring de clientes entrenados con tus datos.</p>
      </a>

      <a href="/servicios/deep-learning/" class="service-card service-card--dark" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon">
          <svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.2"/><circle cx="12" cy="20" r="3" fill="#C9A535" opacity="0.7"/><circle cx="20" cy="12" r="3" fill="#C9A535" opacity="0.7"/><circle cx="28" cy="20" r="3" fill="#C9A535" opacity="0.7"/><circle cx="20" cy="28" r="3" fill="#C9A535" opacity="0.7"/><circle cx="20" cy="20" r="4" fill="#C9A535"/><line x1="15" y1="20" x2="17" y2="20" stroke="#C9A535" stroke-width="1.5"/><line x1="23" y1="20" x2="25" y2="20" stroke="#C9A535" stroke-width="1.5"/><line x1="20" y1="15" x2="20" y2="17" stroke="#C9A535" stroke-width="1.5"/><line x1="20" y1="23" x2="20" y2="25" stroke="#C9A535" stroke-width="1.5"/></svg>
        </div>
        <h3 class="service-card__title">Deep Learning</h3>
        <p class="service-card__desc">Visión artificial, NLP y redes neuronales profundas. Transformers, fine-tuning y modelos generativos para problemas de alta complejidad.</p>
      </a>

      <a href="/servicios/mlops/" class="service-card service-card--dark" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon">
          <svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.2"/><rect x="8" y="14" width="10" height="12" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="22" y="10" width="10" height="12" rx="2" stroke="#C9A535" stroke-width="1.8"/><path d="M18 20h4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/><path d="M13 26v4M27 22v8" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3 class="service-card__title">MLOps &amp; Producción</h3>
        <p class="service-card__desc">Pipelines CI/CD para IA, monitorización de modelos, Docker, Kubernetes y AWS SageMaker. Modelos estables que se mantienen solos en producción.</p>
      </a>

    </div>
  </div>
</section>

<!-- ═══════════════════════ CTA ═══════════════════════ -->
<section class="section section--light" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <h2 class="section-title">¿No sabes por dónde empezar?</h2>
    <p class="section-subtitle" style="margin-bottom:2rem;">Cuéntame tu situación en una llamada de 30 minutos y te digo qué servicio encaja mejor con tu negocio — sin compromiso.</p>
    <a href="/contacto/" class="btn btn--gold">Solicitar diagnóstico gratuito</a>
  </div>
</section>

<?php require_once '../includes/footer.php'; ?>
