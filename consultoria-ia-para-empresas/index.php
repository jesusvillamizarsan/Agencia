<?php
$page_title       = 'Consultoría de Inteligencia Artificial para Empresas en España · Jesús Villamizar';
$page_description = 'Consultoría de IA para empresas en España. Estrategia, implementación y resultados medibles. Experto en Machine Learning, chatbots, automatización y agentes IA. Madrid y remoto.';
$canonical        = 'https://jesusvillamizar.com/consultoria-ia-para-empresas/';

$schema = json_encode([
  '@context' => 'https://schema.org',
  '@graph'   => [
    [
      '@type'       => 'Service',
      '@id'         => 'https://jesusvillamizar.com/consultoria-ia-para-empresas/#service',
      'name'        => 'Consultoría de Inteligencia Artificial para Empresas',
      'description' => 'Servicio completo de consultoría de IA para empresas en España: diagnóstico, estrategia, implementación y producción. Especialistas en Machine Learning, chatbots, automatización y agentes IA.',
      'provider'    => ['@id' => 'https://jesusvillamizar.com/#person'],
      'areaServed'  => 'ES',
      'inLanguage'  => 'es',
      'url'         => 'https://jesusvillamizar.com/consultoria-ia-para-empresas/',
      'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name'  => 'Servicios de Consultoría IA',
        'itemListElement' => [
          ['@type' => 'Offer','itemOffered' => ['@type' => 'Service','name' => 'Diagnóstico y Estrategia IA','url' => 'https://jesusvillamizar.com/servicios/consultoria-estrategica-ia/']],
          ['@type' => 'Offer','itemOffered' => ['@type' => 'Service','name' => 'Chatbots y Asistentes Virtuales','url' => 'https://jesusvillamizar.com/servicios/chatbots-asistentes-virtuales/']],
          ['@type' => 'Offer','itemOffered' => ['@type' => 'Service','name' => 'Automatización de Procesos con IA','url' => 'https://jesusvillamizar.com/servicios/automatizacion-procesos-ia/']],
          ['@type' => 'Offer','itemOffered' => ['@type' => 'Service','name' => 'Agentes IA Autónomos','url' => 'https://jesusvillamizar.com/servicios/agentes-ia-autonomos/']],
          ['@type' => 'Offer','itemOffered' => ['@type' => 'Service','name' => 'Machine Learning a Medida','url' => 'https://jesusvillamizar.com/servicios/machine-learning/']]
        ]
      ]
    ],
    [
      '@type'           => 'BreadcrumbList',
      'itemListElement' => [
        ['@type' => 'ListItem','position' => 1,'name' => 'Inicio','item' => 'https://jesusvillamizar.com/'],
        ['@type' => 'ListItem','position' => 2,'name' => 'Consultoría de IA para Empresas','item' => 'https://jesusvillamizar.com/consultoria-ia-para-empresas/']
      ]
    ],
    [
      '@type'      => 'FAQPage',
      'mainEntity' => [
        ['@type' => 'Question','name' => '¿Qué es la consultoría de inteligencia artificial para empresas?',
         'acceptedAnswer' => ['@type' => 'Answer','text' => 'La consultoría de IA para empresas es el proceso de analizar los procesos de negocio, identificar dónde la Inteligencia Artificial puede generar valor real —reduciendo costes, automatizando tareas o mejorando decisiones— y diseñar un plan de implementación técnico y económicamente viable.']],
        ['@type' => 'Question','name' => '¿Cuánto cuesta un consultor de inteligencia artificial en España?',
         'acceptedAnswer' => ['@type' => 'Answer','text' => 'El coste depende del alcance. Un diagnóstico inicial es gratuito. Los proyectos de implementación empiezan desde 990€/mes para soluciones como chatbots o automatizaciones básicas. Los proyectos de Machine Learning o sistemas complejos se presupuestan a medida.']],
        ['@type' => 'Question','name' => '¿Cuándo tiene sentido contratar un consultor de IA?',
         'acceptedAnswer' => ['@type' => 'Answer','text' => 'Tiene sentido cuando tu empresa tiene procesos repetitivos que consumen tiempo de tu equipo, cuando necesitas tomar decisiones más rápidas basadas en datos, cuando quieres mejorar la atención al cliente sin aumentar plantilla, o cuando buscas una ventaja competitiva sostenible en tu sector.']],
        ['@type' => 'Question','name' => '¿Cuánto tiempo tarda en implementarse un proyecto de IA?',
         'acceptedAnswer' => ['@type' => 'Answer','text' => 'Los primeros resultados se ven en 2-6 semanas dependiendo del proyecto. Un chatbot puede estar operativo en 2-4 semanas. Un sistema de automatización en 3-6 semanas. Un modelo de Machine Learning a medida requiere entre 2 y 4 meses hasta producción.']],
        ['@type' => 'Question','name' => '¿Necesito un equipo técnico interno para implementar IA?',
         'acceptedAnswer' => ['@type' => 'Answer','text' => 'No. Nos encargamos de todo el ciclo técnico: arquitectura, desarrollo, despliegue y mantenimiento. Solo necesitas un interlocutor de negocio que conozca los procesos a mejorar.']],
        ['@type' => 'Question','name' => '¿Qué diferencia hay entre un consultor de IA freelance y una agencia?',
         'acceptedAnswer' => ['@type' => 'Answer','text' => 'En nuestro caso, la ventaja es que el consultor es también el ingeniero que implementa. No hay intermediarios ni subcontratas. Tienes un único interlocutor técnico y de negocio que conoce tu proyecto de principio a fin.']],
      ]
    ]
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

require_once '../includes/head.php';
require_once '../includes/nav.php';
?>

<!-- ═══════════════════════ HERO ═══════════════════════ -->
<section class="hero" style="min-height:60vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">Consultor IA · España</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.4rem);">Consultoría de Inteligencia Artificial<br>para Empresas en España</h1>
      <p class="hero__subtitle" style="max-width:660px;margin-inline:auto;">
        Implementamos IA en tu empresa con resultados medibles desde el primer mes. Sin humo, sin buzzwords: ingeniería real aplicada a los procesos que más impacto tienen en tu negocio.
      </p>
      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
        <a href="/contacto/" class="btn btn--gold">Diagnóstico gratuito — 30 min</a>
        <a href="#servicios" class="btn btn--outline-light">Ver cómo lo hacemos</a>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ QUÉ ES ═══════════════════════ -->
<section class="section section--light">
  <div class="container">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;" class="about">
      <div class="reveal">
        <span class="section-badge">Qué es y qué no es</span>
        <h2 class="section-title">Consultoría de IA que genera resultados, no informes</h2>
        <p style="color:var(--text-mid);line-height:1.8;margin-bottom:1.25rem;">
          Hay muchas empresas que venden "estrategia de IA" y entregan un PDF de 80 páginas que nunca llega a implementarse. Eso no es lo que hacemos.
        </p>
        <p style="color:var(--text-mid);line-height:1.8;margin-bottom:1.25rem;">
          Nuestra consultoría de IA combina el análisis estratégico con la implementación técnica real. Identificamos los casos de uso con mayor ROI, los desarrollamos y los ponemos en producción. El resultado es un sistema funcionando, no un documento.
        </p>
        <p style="color:var(--text-mid);line-height:1.8;">
          Trabajamos con empresas de todos los tamaños en España: desde pymes de 10 personas hasta empresas medianas con 500 empleados, en sectores como fintech, legal, retail, logística y salud.
        </p>
      </div>
      <div class="reveal">
        <div style="display:flex;flex-direction:column;gap:1rem;">
          <div style="display:flex;align-items:flex-start;gap:1rem;padding:1.25rem;background:var(--white);border-radius:var(--radius);border:1px solid var(--border);">
            <svg style="flex-shrink:0;margin-top:.15rem;" width="22" height="22" viewBox="0 0 22 22" fill="none"><circle cx="11" cy="11" r="10" fill="rgba(201,165,53,.15)"/><path d="M7 11l3 3 5-5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <div><strong style="font-size:.95rem;">Diagnóstico honesto</strong><p style="font-size:.88rem;color:var(--text-mid);margin-top:.25rem;">Si la IA no tiene sentido para tu caso, te lo decimos antes de cobrar un euro.</p></div>
          </div>
          <div style="display:flex;align-items:flex-start;gap:1rem;padding:1.25rem;background:var(--white);border-radius:var(--radius);border:1px solid var(--border);">
            <svg style="flex-shrink:0;margin-top:.15rem;" width="22" height="22" viewBox="0 0 22 22" fill="none"><circle cx="11" cy="11" r="10" fill="rgba(201,165,53,.15)"/><path d="M7 11l3 3 5-5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <div><strong style="font-size:.95rem;">Del análisis a la producción</strong><p style="font-size:.88rem;color:var(--text-mid);margin-top:.25rem;">No delegamos la implementación. El mismo equipo que diseña la solución la construye.</p></div>
          </div>
          <div style="display:flex;align-items:flex-start;gap:1rem;padding:1.25rem;background:var(--white);border-radius:var(--radius);border:1px solid var(--border);">
            <svg style="flex-shrink:0;margin-top:.15rem;" width="22" height="22" viewBox="0 0 22 22" fill="none"><circle cx="11" cy="11" r="10" fill="rgba(201,165,53,.15)"/><path d="M7 11l3 3 5-5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <div><strong style="font-size:.95rem;">ROI medible desde el inicio</strong><p style="font-size:.88rem;color:var(--text-mid);margin-top:.25rem;">Definimos métricas de éxito antes de empezar. Sabes exactamente qué esperar y cuándo.</p></div>
          </div>
          <div style="display:flex;align-items:flex-start;gap:1rem;padding:1.25rem;background:var(--white);border-radius:var(--radius);border:1px solid var(--border);">
            <svg style="flex-shrink:0;margin-top:.15rem;" width="22" height="22" viewBox="0 0 22 22" fill="none"><circle cx="11" cy="11" r="10" fill="rgba(201,165,53,.15)"/><path d="M7 11l3 3 5-5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <div><strong style="font-size:.95rem;">Sin lock-in tecnológico</strong><p style="font-size:.88rem;color:var(--text-mid);margin-top:.25rem;">El sistema es tuyo. Código abierto, documentado y transferible a tu equipo cuando quieras.</p></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ SERVICIOS ═══════════════════════ -->
<section id="servicios" class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Áreas de consultoría</span>
      <h2 class="section-title">¿Qué tipo de consultoría de IA necesita tu empresa?</h2>
      <p class="section-subtitle">Cada empresa es distinta. Estos son los cuatro puntos de entrada más comunes según el momento en que se encuentra tu negocio.</p>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin-top:3rem;">

      <div class="service-card reveal">
        <div class="service-card__icon"><svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><path d="M20 8l10 6v12l-10 6-10-6V14l10-6z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/><circle cx="20" cy="20" r="3" fill="#C9A535"/></svg></div>
        <h3 class="service-card__title">Estrategia y Roadmap IA</h3>
        <p class="service-card__desc">Para empresas que empiezan. Analizamos tu negocio, identificamos casos de uso con mayor ROI y te entregamos un plan priorizado y ejecutable.</p>
        <a href="/servicios/consultoria-estrategica-ia/" style="display:inline-block;margin-top:1rem;color:var(--gold);font-size:.88rem;font-weight:600;">Ver más →</a>
      </div>

      <div class="service-card reveal">
        <div class="service-card__icon"><svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><path d="M12 28V16a2 2 0 012-2h4l2-4h4l2 4h4a2 2 0 012 2v12H12z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/><circle cx="20" cy="22" r="3" stroke="#C9A535" stroke-width="1.8"/></svg></div>
        <h3 class="service-card__title">Chatbots y Atención al Cliente</h3>
        <p class="service-card__desc">Para empresas que quieren mejorar su atención al cliente. Asistentes que resuelven el 70% de consultas sin intervención humana, disponibles 24/7.</p>
        <a href="/servicios/chatbots-asistentes-virtuales/" style="display:inline-block;margin-top:1rem;color:var(--gold);font-size:.88rem;font-weight:600;">Ver más →</a>
      </div>

      <div class="service-card reveal">
        <div class="service-card__icon"><svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><path d="M8 20h4l4-8 4 16 4-8 4 8h4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3 class="service-card__title">Automatización de Procesos</h3>
        <p class="service-card__desc">Para empresas con procesos manuales repetitivos. Eliminamos trabajo sin valor añadido: extracción de documentos, sincronización de sistemas, informes automáticos.</p>
        <a href="/servicios/automatizacion-procesos-ia/" style="display:inline-block;margin-top:1rem;color:var(--gold);font-size:.88rem;font-weight:600;">Ver más →</a>
      </div>

      <div class="service-card reveal">
        <div class="service-card__icon"><svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><ellipse cx="20" cy="20" rx="10" ry="6" stroke="#C9A535" stroke-width="1.8"/><ellipse cx="20" cy="20" rx="10" ry="6" stroke="#C9A535" stroke-width="1.8" transform="rotate(60 20 20)"/><ellipse cx="20" cy="20" rx="10" ry="6" stroke="#C9A535" stroke-width="1.8" transform="rotate(120 20 20)"/><circle cx="20" cy="20" r="2.5" fill="#C9A535"/></svg></div>
        <h3 class="service-card__title">Machine Learning y Modelos Propios</h3>
        <p class="service-card__desc">Para empresas con datos y problemas complejos. Predicción de demanda, detección de fraude, scoring de clientes. Modelos entrenados con tus datos.</p>
        <a href="/servicios/machine-learning/" style="display:inline-block;margin-top:1rem;color:var(--gold);font-size:.88rem;font-weight:600;">Ver más →</a>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════ PROCESO ═══════════════════════ -->
<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Cómo trabajamos</span>
      <h2 class="section-title">Del primer contacto al sistema en producción</h2>
      <p class="section-subtitle">Un proceso transparente, sin sorpresas, con entregables claros en cada fase.</p>
    </div>
    <div class="process-steps reveal" style="margin-top:3rem;">
      <div class="process-step">
        <div class="process-step__num">01</div>
        <div class="process-step__body">
          <h3>Diagnóstico gratuito</h3>
          <p>Llamada de 30 minutos para entender tu negocio, tus datos y tus objetivos. Sin compromiso. Al terminar sabes si la IA puede ayudarte y cómo.</p>
        </div>
      </div>
      <div class="process-step">
        <div class="process-step__num">02</div>
        <div class="process-step__body">
          <h3>Análisis y propuesta</h3>
          <p>Profundizamos en tus procesos y datos. Entregamos una propuesta con el caso de uso concreto, tecnología, plazo, coste y ROI estimado.</p>
        </div>
      </div>
      <div class="process-step">
        <div class="process-step__num">03</div>
        <div class="process-step__body">
          <h3>Desarrollo iterativo</h3>
          <p>Construimos en sprints de 2 semanas con demos funcionales al final de cada uno. Ves el progreso real, no presentaciones de PowerPoint.</p>
        </div>
      </div>
      <div class="process-step">
        <div class="process-step__num">04</div>
        <div class="process-step__body">
          <h3>Despliegue y transferencia</h3>
          <p>Lanzamos a producción, documentamos todo y formamos a tu equipo. El sistema es tuyo desde el primer día.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ POR QUÉ JESÚS ═══════════════════════ -->
<section class="section section--navy">
  <div class="container about">
    <div class="about__visual reveal">
      <div class="about__img-wrap">
        <div class="about__img-placeholder">
          <img src="/assets/img/perfilfoto.jpg" alt="Jesús Villamizar, consultor de inteligencia artificial en España" width="500" height="500" style="width:100%;height:100%;object-fit:cover;border-radius:inherit;" loading="lazy" />
        </div>
        <div class="about__badge-float">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M10 2l2.4 5.2 5.6.8-4 3.9.9 5.6L10 14.8l-4.9 2.7.9-5.6L2 8l5.6-.8L10 2z" fill="#C9A535"/></svg>
          <span>MSc. ML &amp; Deep Learning</span>
        </div>
      </div>
    </div>
    <div class="about__content reveal reveal--right">
      <span class="section-badge section-badge--light">Tu consultor de IA</span>
      <h2 class="section-title section-title--light">El que te vende es el que programa</h2>
      <p class="about__text">Soy Jesús Villamizar, ingeniero de IA con más de 8 años de experiencia y Máster en Machine Learning y Deep Learning. He construido sistemas de IA reales en producción para empresas de España y Europa.</p>
      <p class="about__text">No soy un consultor que subcontrata el desarrollo. Soy el ingeniero que diseña, construye y mantiene tu solución. Hablas con el mismo perfil técnico durante todo el proyecto, desde el diagnóstico hasta el despliegue.</p>
      <div class="about__credentials">
        <div class="credential">
          <svg class="credential__icon" viewBox="0 0 24 24" fill="none"><path d="M12 2L3 7l9 5 9-5-9-5zM3 12l9 5 9-5M3 17l9 5 9-5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div><strong>Máster en ML &amp; Deep Learning</strong><span>Redes neuronales, LLMs, modelos generativos</span></div>
        </div>
        <div class="credential">
          <svg class="credential__icon" viewBox="0 0 24 24" fill="none"><rect x="2" y="3" width="20" height="14" rx="2" stroke="#C9A535" stroke-width="1.8"/><path d="M8 21h8M12 17v4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg>
          <div><strong>+50 proyectos de IA en producción</strong><span>Fintech, legal, retail, logística, salud</span></div>
        </div>
        <div class="credential">
          <svg class="credential__icon" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#C9A535" stroke-width="1.8"/><path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg>
          <div><strong>España y Europa</strong><span>Base en Madrid, proyectos internacionales</span></div>
        </div>
      </div>
      <a href="/sobre-jesus/" style="display:inline-block;margin-top:2rem;" class="btn btn--gold">Conocer a Jesús</a>
    </div>
  </div>
</section>

<!-- ═══════════════════════ CASOS DE USO POR SECTOR ═══════════════════════ -->
<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Casos de uso</span>
      <h2 class="section-title">¿Cómo puede la IA ayudar a tu empresa?</h2>
      <p class="section-subtitle">Ejemplos reales de lo que implementamos para empresas en España, ordenados por impacto y velocidad de retorno.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.5rem;margin-top:3rem;">

      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M18 10a5 5 0 015 5v1a5 5 0 01-10 0v-1a5 5 0 015-5z" stroke="#C9A535" stroke-width="1.8"/><path d="M10 30c0-4.4 3.6-8 8-8s8 3.6 8 8" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>Atención al cliente sin ampliar plantilla</h3>
        <p>Un asistente con IA resuelve el 60-80% de las consultas de soporte de forma autónoma. El equipo humano solo gestiona los casos complejos o de alto valor.</p>
        <p style="margin-top:.75rem;font-size:.82rem;color:var(--gold);font-weight:600;">⏱ Resultado en 2-4 semanas</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26l4-8 4 5 3-4 5 7H10z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/></svg></div>
        <h3>Procesamiento automático de documentos</h3>
        <p>Facturas, contratos, albaranes, formularios. La IA extrae los datos, los valida y los registra en tu ERP o CRM sin intervención humana.</p>
        <p style="margin-top:.75rem;font-size:.82rem;color:var(--gold);font-weight:600;">⏱ Resultado en 3-5 semanas</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26l4-6 4 3 4-8 4 11" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Predicción de demanda y stock</h3>
        <p>Modelos de ML que anticipan la demanda con semanas de antelación. Menos roturas de stock, menos sobrestock, mejor planificación del equipo.</p>
        <p style="margin-top:.75rem;font-size:.82rem;color:var(--gold);font-weight:600;">⏱ Resultado en 6-10 semanas</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M12 22c0-3.3 2.7-6 6-6s6 2.7 6 6M18 10a3 3 0 100 6 3 3 0 000-6z" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>Cualificación automática de leads</h3>
        <p>El sistema analiza cada lead entrante, cruza datos, lo puntúa y prioriza la agenda de tu equipo comercial. Solo llaman a quien tiene probabilidad real de comprar.</p>
        <p style="margin-top:.75rem;font-size:.82rem;color:var(--gold);font-weight:600;">⏱ Resultado en 3-6 semanas</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M18 10l2 6h6l-5 3.6 2 6L18 22l-5 3.6 2-6L10 16h6z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/></svg></div>
        <h3>Detección de fraude y anomalías</h3>
        <p>Modelos que detectan transacciones, solicitudes o comportamientos anómalos en tiempo real. Alta precisión, bajo número de falsos positivos.</p>
        <p style="margin-top:.75rem;font-size:.82rem;color:var(--gold);font-weight:600;">⏱ Resultado en 8-12 semanas</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><circle cx="18" cy="18" r="7" stroke="#C9A535" stroke-width="1.8"/><path d="M18 14v4l3 3" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>Agentes IA para tareas autónomas</h3>
        <p>Sistemas que investigan, deciden y ejecutan objetivos completos sin supervisión: research de mercado, generación de informes, gestión de incidencias.</p>
        <p style="margin-top:.75rem;font-size:.82rem;color:var(--gold);font-weight:600;">⏱ Resultado en 4-8 semanas</p>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════ SECTORES ═══════════════════════ -->
<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Sectores</span>
      <h2 class="section-title">Consultoría de IA especializada por sector</h2>
      <p class="section-subtitle">Cada sector tiene sus propios casos de uso de mayor impacto. Los conocemos porque los hemos implementado.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1rem;margin-top:3rem;">
      <div class="service-card reveal" style="padding:1.5rem;">
        <h3 class="service-card__title" style="font-size:1rem;">🏦 Fintech y Banca</h3>
        <p class="service-card__desc" style="font-size:.85rem;">Scoring crediticio, detección de fraude, compliance automático y chatbots de atención financiera.</p>
      </div>
      <div class="service-card reveal" style="padding:1.5rem;">
        <h3 class="service-card__title" style="font-size:1rem;">⚖️ Legal y Asesorías</h3>
        <p class="service-card__desc" style="font-size:.85rem;">Revisión de contratos, extracción de cláusulas de riesgo, consultas de primer nivel y due diligence automático.</p>
      </div>
      <div class="service-card reveal" style="padding:1.5rem;">
        <h3 class="service-card__title" style="font-size:1rem;">🛒 E-commerce y Retail</h3>
        <p class="service-card__desc" style="font-size:.85rem;">Recomendación de producto, predicción de demanda, soporte 24/7 y detección de devoluciones fraudulentas.</p>
      </div>
      <div class="service-card reveal" style="padding:1.5rem;">
        <h3 class="service-card__title" style="font-size:1rem;">🏥 Salud y Clínicas</h3>
        <p class="service-card__desc" style="font-size:.85rem;">Triaje inicial, gestión de citas, análisis de documentos clínicos y seguimiento de pacientes.</p>
      </div>
      <div class="service-card reveal" style="padding:1.5rem;">
        <h3 class="service-card__title" style="font-size:1rem;">🏢 Inmobiliario</h3>
        <p class="service-card__desc" style="font-size:.85rem;">Valoración automática de propiedades, cualificación de compradores y agendado de visitas con IA.</p>
      </div>
      <div class="service-card reveal" style="padding:1.5rem;">
        <h3 class="service-card__title" style="font-size:1rem;">🚚 Logística</h3>
        <p class="service-card__desc" style="font-size:.85rem;">Optimización de rutas, predicción de demanda, procesamiento de albaranes y gestión de incidencias.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ FAQ ═══════════════════════ -->
<section class="section section--light">
  <div class="container" style="max-width:800px;">
    <div class="section-header reveal">
      <span class="section-badge">Preguntas frecuentes</span>
      <h2 class="section-title">Lo que nos preguntan antes de empezar</h2>
    </div>
    <div style="margin-top:3rem;display:flex;flex-direction:column;gap:1.25rem;">

      <div class="service-card reveal">
        <h3 class="service-card__title">¿Qué es exactamente la consultoría de IA para empresas?</h3>
        <p class="service-card__desc">Es el proceso de analizar los procesos de tu empresa, identificar dónde la IA puede generar valor real —reduciendo costes, automatizando tareas o mejorando decisiones— y diseñar e implementar la solución técnica. A diferencia de la consultoría estratégica tradicional, el resultado final es un sistema funcionando, no un informe.</p>
      </div>

      <div class="service-card reveal">
        <h3 class="service-card__title">¿Cuánto cuesta un consultor de inteligencia artificial en España?</h3>
        <p class="service-card__desc">El primer diagnóstico es gratuito. Los proyectos de implementación empiezan desde 990€/mes para soluciones como chatbots o automatizaciones básicas. Los proyectos de Machine Learning o agentes IA complejos se presupuestan a medida tras el diagnóstico. No hay costes ocultos: precio cerrado antes de empezar.</p>
      </div>

      <div class="service-card reveal">
        <h3 class="service-card__title">¿Necesito tener un equipo técnico interno?</h3>
        <p class="service-card__desc">No. Nos encargamos de todo el ciclo técnico: arquitectura, desarrollo, integración, despliegue y mantenimiento. Solo necesitas un interlocutor de negocio que conozca los procesos a mejorar. Al finalizar, documentamos todo y formamos a tu equipo para que puedan gestionarlo.</p>
      </div>

      <div class="service-card reveal">
        <h3 class="service-card__title">¿Cuándo tiene sentido contratar una consultoría de IA?</h3>
        <p class="service-card__desc">Cuando tienes procesos repetitivos que consumen tiempo, cuando necesitas tomar decisiones más rápidas basadas en datos, cuando quieres mejorar la atención al cliente sin aumentar plantilla, o cuando buscas una ventaja competitiva sostenible. Si no estás seguro, el diagnóstico gratuito existe precisamente para eso.</p>
      </div>

      <div class="service-card reveal">
        <h3 class="service-card__title">¿En cuánto tiempo se ven resultados?</h3>
        <p class="service-card__desc">Los primeros resultados se ven en 2-6 semanas. Un chatbot puede estar funcionando en 2-4 semanas. Una automatización de procesos en 3-6 semanas. Un modelo de Machine Learning a medida requiere entre 2 y 4 meses hasta producción. En todos los casos definimos las métricas de éxito antes de empezar.</p>
      </div>

      <div class="service-card reveal">
        <h3 class="service-card__title">¿Qué diferencia hay entre un consultor de IA freelance y una agencia?</h3>
        <p class="service-card__desc">En nuestro caso, ninguna: el consultor y el ingeniero son la misma persona. No hay comerciales que venden y técnicos que ejecutan. Jesús Villamizar analiza tu caso, diseña la solución y la construye. Interlocutor único de principio a fin, sin pérdida de información entre equipos.</p>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════ CTA FINAL ═══════════════════════ -->
<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <span class="section-badge section-badge--light">Sin compromiso</span>
    <h2 class="section-title section-title--light" style="margin-top:1rem;">Empieza con un diagnóstico gratuito</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2.5rem;">
      30 minutos de llamada. Te cuento exactamente qué oportunidades tiene tu empresa con la IA, qué tecnología encaja mejor y qué coste y plazo puedes esperar. Sin presiones y sin letra pequeña.
    </p>
    <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
      <a href="/contacto/" class="btn btn--gold">Reservar diagnóstico gratuito</a>
      <a href="/servicios/" class="btn btn--outline-light">Explorar servicios</a>
    </div>
  </div>
</section>

<?php require_once '../includes/footer.php'; ?>
