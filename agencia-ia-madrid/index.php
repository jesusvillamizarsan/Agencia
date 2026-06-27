<?php
$page_title       = 'Agencia de Inteligencia Artificial en Madrid · Jesús Villamizar';
$page_description = 'Agencia de IA en Madrid especializada en chatbots, automatización, agentes autónomos y Machine Learning. Ingeniero con Máster en ML. Proyectos reales desde Madrid para España y Europa.';
$canonical        = 'https://jesusvillamizar.com/agencia-ia-madrid/';

$schema = json_encode([
  '@context' => 'https://schema.org',
  '@graph'   => [
    [
      '@type'            => 'LocalBusiness',
      '@id'              => 'https://jesusvillamizar.com/#localbusiness',
      'name'             => 'Jesús Villamizar · Agencia de Inteligencia Artificial Madrid',
      'description'      => 'Agencia de Inteligencia Artificial en Madrid especializada en chatbots, automatización de procesos, agentes IA autónomos y Machine Learning para empresas.',
      'url'              => 'https://jesusvillamizar.com/agencia-ia-madrid/',
      'telephone'        => '',
      'email'            => 'hello@jesusvillamizar.com',
      'image'            => 'https://jesusvillamizar.com/assets/img/perfilfoto.jpg',
      'logo'             => 'https://jesusvillamizar.com/assets/logos/logo-horizontal-negro.png',
      'founder'          => ['@id' => 'https://jesusvillamizar.com/#person'],
      'address'          => [
        '@type'           => 'PostalAddress',
        'addressLocality' => 'Madrid',
        'addressRegion'   => 'Community of Madrid',
        'addressCountry'  => 'ES',
        'postalCode'      => '28001'
      ],
      'geo'              => [
        '@type'     => 'GeoCoordinates',
        'latitude'  => '40.4168',
        'longitude' => '-3.7038'
      ],
      'areaServed'       => [
        ['@type' => 'City', 'name' => 'Madrid'],
        ['@type' => 'City', 'name' => 'Barcelona'],
        ['@type' => 'City', 'name' => 'Valencia'],
        ['@type' => 'Country', 'name' => 'España'],
        ['@type' => 'Country', 'name' => 'Europa']
      ],
      'openingHoursSpecification' => [
        ['@type' => 'OpeningHoursSpecification','dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'],'opens' => '09:00','closes' => '19:00']
      ],
      'priceRange'       => '€€',
      'sameAs'           => ['https://www.linkedin.com/in/villamizarsan/','https://github.com/jesusvillamizar'],
      'hasOfferCatalog'  => [
        '@type' => 'OfferCatalog',
        'name'  => 'Servicios de Inteligencia Artificial en Madrid',
        'itemListElement' => [
          ['@type' => 'Offer','itemOffered' => ['@type' => 'Service','name' => 'Consultoría IA Madrid','url' => 'https://jesusvillamizar.com/servicios/consultoria-estrategica-ia/']],
          ['@type' => 'Offer','itemOffered' => ['@type' => 'Service','name' => 'Chatbots IA Madrid','url' => 'https://jesusvillamizar.com/servicios/chatbots-asistentes-virtuales/']],
          ['@type' => 'Offer','itemOffered' => ['@type' => 'Service','name' => 'Automatización con IA Madrid','url' => 'https://jesusvillamizar.com/servicios/automatizacion-procesos-ia/']],
          ['@type' => 'Offer','itemOffered' => ['@type' => 'Service','name' => 'Agentes IA Autónomos','url' => 'https://jesusvillamizar.com/servicios/agentes-ia-autonomos/']],
          ['@type' => 'Offer','itemOffered' => ['@type' => 'Service','name' => 'Machine Learning a Medida','url' => 'https://jesusvillamizar.com/servicios/machine-learning/']]
        ]
      ]
    ],
    [
      '@type'           => 'BreadcrumbList',
      'itemListElement' => [
        ['@type' => 'ListItem','position' => 1,'name' => 'Inicio','item' => 'https://jesusvillamizar.com/'],
        ['@type' => 'ListItem','position' => 2,'name' => 'Agencia de IA en Madrid','item' => 'https://jesusvillamizar.com/agencia-ia-madrid/']
      ]
    ],
    [
      '@type'       => 'FAQPage',
      'mainEntity'  => [
        ['@type' => 'Question','name' => '¿Cuánto cuesta contratar una agencia de IA en Madrid?',
         'acceptedAnswer' => ['@type' => 'Answer','text' => 'El coste depende del proyecto. Los planes de entrada para chatbots o automatización empiezan desde 990€/mes. Los proyectos de Machine Learning o Deep Learning a medida se presupuestan según alcance. El primer diagnóstico es gratuito.']],
        ['@type' => 'Question','name' => '¿Trabajáis solo en Madrid o también de forma remota?',
         'acceptedAnswer' => ['@type' => 'Answer','text' => 'Tenemos base en Madrid pero trabajamos en remoto con empresas de toda España y Europa. La mayoría de proyectos se gestionan 100% de forma remota sin pérdida de calidad.']],
        ['@type' => 'Question','name' => '¿En cuánto tiempo se ven resultados con IA?',
         'acceptedAnswer' => ['@type' => 'Answer','text' => 'Depende del proyecto. Un chatbot puede estar funcionando en 2-4 semanas. Un sistema de automatización de procesos en 3-6 semanas. Los proyectos de Machine Learning a medida suelen llevar entre 2 y 4 meses hasta producción.']],
        ['@type' => 'Question','name' => '¿Sois una agencia o un freelance?',
         'acceptedAnswer' => ['@type' => 'Answer','text' => 'Somos una agencia boutique liderada por Jesús Villamizar, ingeniero de IA con Máster en Machine Learning y más de 8 años de experiencia. La ventaja: el que te vende es el que programa. Sin intermediarios ni subcontratas.']],
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
      <span class="hero__badge">Agencia de IA · Madrid</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.4rem);">Agencia de Inteligencia Artificial<br>en Madrid</h1>
      <p class="hero__subtitle" style="max-width:640px;margin-inline:auto;">
        Chatbots, automatización, agentes IA y Machine Learning para empresas. Con base en Madrid, trabajando con clientes en toda España y Europa. El ingeniero que firma el código es el que te atiende.
      </p>
      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
        <a href="/contacto/" class="btn btn--gold">Solicitar diagnóstico gratuito</a>
        <a href="/servicios/" class="btn btn--outline-light">Ver servicios</a>
      </div>
      <p style="color:rgba(255,255,255,.45);font-size:.82rem;margin-top:1.5rem;">📍 Madrid · Remoto · España y Europa</p>
    </div>
  </div>
</section>

<!-- ═══════════════════════ SEÑALES DE CONFIANZA ═══════════════════════ -->
<section class="section section--light" style="padding-block:3rem;">
  <div class="container">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:1.5rem;text-align:center;">
      <div>
        <p style="font-family:var(--font-serif);font-size:2.2rem;color:var(--gold);line-height:1;">+50</p>
        <p style="font-size:.82rem;color:var(--text-mid);text-transform:uppercase;letter-spacing:.06em;">Proyectos IA</p>
      </div>
      <div>
        <p style="font-family:var(--font-serif);font-size:2.2rem;color:var(--gold);line-height:1;">+8</p>
        <p style="font-size:.82rem;color:var(--text-mid);text-transform:uppercase;letter-spacing:.06em;">Años de experiencia</p>
      </div>
      <div>
        <p style="font-family:var(--font-serif);font-size:2.2rem;color:var(--gold);line-height:1;">MSc.</p>
        <p style="font-size:.82rem;color:var(--text-mid);text-transform:uppercase;letter-spacing:.06em;">ML &amp; Deep Learning</p>
      </div>
      <div>
        <p style="font-family:var(--font-serif);font-size:2.2rem;color:var(--gold);line-height:1;">ES/EU</p>
        <p style="font-size:.82rem;color:var(--text-mid);text-transform:uppercase;letter-spacing:.06em;">Cobertura geográfica</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ POR QUÉ UNA AGENCIA IA EN MADRID ═══════════════════════ -->
<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">¿Por qué elegirnos?</span>
      <h2 class="section-title">Lo que distingue a esta agencia de IA en Madrid</h2>
      <p class="section-subtitle">Madrid es el hub tecnológico de España. Hay decenas de agencias de IA. La diferencia está en quién ejecuta el trabajo.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 18l5 5 11-11" stroke="#C9A535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Ingeniero real, no comercial</h3>
        <p>Jesús Villamizar —Máster en ML &amp; Deep Learning, 8+ años de experiencia— diseña, construye y entrega tu proyecto. Sin subcontratas ocultas.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26V16l8-6 8 6v10M14 26v-5h8v5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Proyectos en producción real</h3>
        <p>No vendemos demos. Entregamos sistemas que funcionan con métricas reales: reducción de tiempo, coste y tasa de error medibles.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="10" y="14" width="16" height="12" rx="2" stroke="#C9A535" stroke-width="1.8"/><path d="M14 14v-2a4 4 0 018 0v2" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>RGPD y EU AI Act</h3>
        <p>Diseñamos sistemas conformes con la regulación europea desde el día uno. Especialmente relevante para empresas en España.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><circle cx="18" cy="18" r="7" stroke="#C9A535" stroke-width="1.8"/><path d="M18 14v4l3 3" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>Respuesta en menos de 24h</h3>
        <p>Interlocutor único, comunicación directa. Sin tickets de soporte ni esperar a que el account manager consulte al técnico.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ SERVICIOS ═══════════════════════ -->
<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Servicios en Madrid</span>
      <h2 class="section-title">¿Qué puede hacer la IA por tu empresa?</h2>
      <p class="section-subtitle">Desde la consultoría inicial hasta sistemas avanzados de Machine Learning. Elige el punto de entrada que mejor encaja con tu momento actual.</p>
    </div>
    <div class="services-grid reveal" style="margin-top:3rem;">
      <a href="/servicios/chatbots-asistentes-virtuales/" class="service-card" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon"><svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><path d="M12 28V16a2 2 0 012-2h4l2-4h4l2 4h4a2 2 0 012 2v12H12z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/><circle cx="20" cy="22" r="3" stroke="#C9A535" stroke-width="1.8"/></svg></div>
        <h3 class="service-card__title">Chatbots con IA</h3>
        <p class="service-card__desc">Atención al cliente 24/7 que resuelve el 70% de consultas sin intervención humana.</p>
      </a>
      <a href="/servicios/automatizacion-procesos-ia/" class="service-card" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon"><svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><path d="M8 20h4l4-8 4 16 4-8 4 8h4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3 class="service-card__title">Automatización de Procesos</h3>
        <p class="service-card__desc">Elimina el trabajo manual repetitivo con flujos inteligentes que procesan documentos y sincronizan sistemas.</p>
      </a>
      <a href="/servicios/agentes-ia-autonomos/" class="service-card" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon"><svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><path d="M20 10c-5.5 0-10 4-10 10s4.5 10 10 10 10-4 10-10" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/><path d="M26 10l4 4-4 4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="20" cy="20" r="3" fill="#C9A535" opacity="0.8"/></svg></div>
        <h3 class="service-card__title">Agentes IA Autónomos</h3>
        <p class="service-card__desc">Sistemas que razonan, deciden y ejecutan tareas complejas sin intervención humana.</p>
      </a>
      <a href="/servicios/machine-learning/" class="service-card" style="text-decoration:none;color:inherit;display:block;">
        <div class="service-card__icon"><svg viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#C9A535" opacity="0.12"/><ellipse cx="20" cy="20" rx="10" ry="6" stroke="#C9A535" stroke-width="1.8"/><ellipse cx="20" cy="20" rx="10" ry="6" stroke="#C9A535" stroke-width="1.8" transform="rotate(60 20 20)"/><ellipse cx="20" cy="20" rx="10" ry="6" stroke="#C9A535" stroke-width="1.8" transform="rotate(120 20 20)"/><circle cx="20" cy="20" r="2.5" fill="#C9A535"/></svg></div>
        <h3 class="service-card__title">Machine Learning a Medida</h3>
        <p class="service-card__desc">Modelos entrenados con tus datos para predecir, clasificar y optimizar con precisión superior a cualquier SaaS.</p>
      </a>
    </div>
    <div style="text-align:center;margin-top:2.5rem;">
      <a href="/servicios/" class="btn btn--outline" style="border-color:var(--navy);color:var(--navy);">Ver todos los servicios →</a>
    </div>
  </div>
</section>

<!-- ═══════════════════════ SECTORES ═══════════════════════ -->
<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Sectores</span>
      <h2 class="section-title">Empresas madrileñas que más se benefician de la IA</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-top:3rem;">
      <div class="service-card reveal" style="padding:1.25rem;text-align:center;"><h3 class="service-card__title" style="font-size:.95rem;">Fintech y Banca</h3><p class="service-card__desc" style="font-size:.85rem;">Detección de fraude, scoring crediticio, atención al cliente y análisis de riesgo.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;text-align:center;"><h3 class="service-card__title" style="font-size:.95rem;">Legal y Asesorías</h3><p class="service-card__desc" style="font-size:.85rem;">Revisión de contratos, extracción de cláusulas y consultas de primer nivel automatizadas.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;text-align:center;"><h3 class="service-card__title" style="font-size:.95rem;">Inmobiliario</h3><p class="service-card__desc" style="font-size:.85rem;">Cualificación de leads, valoración automatizada y agendado de visitas con IA.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;text-align:center;"><h3 class="service-card__title" style="font-size:.95rem;">E-commerce y Retail</h3><p class="service-card__desc" style="font-size:.85rem;">Recomendación de producto, predicción de demanda y soporte 24/7.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;text-align:center;"><h3 class="service-card__title" style="font-size:.95rem;">Salud y Clínicas</h3><p class="service-card__desc" style="font-size:.85rem;">Gestión de citas, triaje inicial y análisis de datos clínicos estructurados.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;text-align:center;"><h3 class="service-card__title" style="font-size:.95rem;">Logística</h3><p class="service-card__desc" style="font-size:.85rem;">Optimización de rutas, predicción de demanda y automatización de albaranes.</p></div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ FAQ ═══════════════════════ -->
<section class="section section--light">
  <div class="container" style="max-width:780px;">
    <div class="section-header reveal">
      <span class="section-badge">Preguntas frecuentes</span>
      <h2 class="section-title">Lo que nos preguntan las empresas de Madrid</h2>
    </div>
    <div style="margin-top:3rem;display:flex;flex-direction:column;gap:1.25rem;">

      <div class="service-card reveal">
        <h3 class="service-card__title">¿Cuánto cuesta contratar una agencia de IA en Madrid?</h3>
        <p class="service-card__desc">Los proyectos de entrada —como un chatbot o una automatización básica— empiezan desde 990€/mes. Los proyectos de Machine Learning o Deep Learning a medida se presupuestan según el alcance tras el diagnóstico gratuito.</p>
      </div>

      <div class="service-card reveal">
        <h3 class="service-card__title">¿Trabajáis solo en Madrid o también de forma remota?</h3>
        <p class="service-card__desc">Tenemos base en Madrid pero trabajamos en remoto con empresas de toda España y Europa. La mayoría de proyectos se gestionan 100% en remoto sin pérdida alguna de calidad ni comunicación.</p>
      </div>

      <div class="service-card reveal">
        <h3 class="service-card__title">¿En cuánto tiempo se ven resultados?</h3>
        <p class="service-card__desc">Un chatbot puede estar funcionando en 2-4 semanas. Un sistema de automatización de procesos en 3-6 semanas. Los proyectos de Machine Learning a medida llevan entre 2 y 4 meses hasta producción.</p>
      </div>

      <div class="service-card reveal">
        <h3 class="service-card__title">¿Sois una agencia grande o un freelance?</h3>
        <p class="service-card__desc">Somos una agencia boutique liderada por Jesús Villamizar, ingeniero de IA con Máster en ML y más de 8 años de experiencia. La ventaja: el que te vende es el que programa. Sin intermediarios ni subcontratas.</p>
      </div>

      <div class="service-card reveal">
        <h3 class="service-card__title">¿Cumplís con el RGPD y el EU AI Act?</h3>
        <p class="service-card__desc">Sí. El cumplimiento regulatorio es parte del diseño, no un extra. Implementamos sistemas conformes con el RGPD y el EU AI Act desde el principio, con contratos de procesamiento de datos (DPA) con todos los proveedores.</p>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════ CTA FINAL ═══════════════════════ -->
<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <span class="section-badge section-badge--light">Madrid · España · Europa</span>
    <h2 class="section-title section-title--light" style="margin-top:1rem;">¿Tu empresa en Madrid está lista para la IA?</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2.5rem;">
      30 minutos de llamada. Te cuento exactamente qué oportunidades tiene tu negocio con la Inteligencia Artificial, sin compromiso y sin coste.
    </p>
    <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
      <a href="/contacto/" class="btn btn--gold">Solicitar diagnóstico gratuito</a>
      <a href="/sobre-jesus/" class="btn btn--outline-light">Conocer a Jesús</a>
    </div>
  </div>
</section>

<?php require_once '../includes/footer.php'; ?>
