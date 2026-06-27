<?php
$page_title       = 'Jesús Villamizar · Ingeniero de IA con Máster en Machine Learning | Madrid';
$page_description = 'Jesús Villamizar, ingeniero de Inteligencia Artificial con más de 8 años de experiencia y Máster en ML & Deep Learning. Proyectos reales en producción para empresas en España y Europa.';
$canonical        = 'https://jesusvillamizar.com/sobre-jesus/';

$schema = json_encode([
  '@context' => 'https://schema.org',
  '@graph'   => [
    [
      '@type'       => 'Person',
      '@id'         => 'https://jesusvillamizar.com/#person',
      'name'        => 'Jesús Villamizar',
      'jobTitle'    => 'AI Engineer & Machine Learning Specialist',
      'description' => 'Ingeniero de Inteligencia Artificial con más de 8 años de experiencia, Máster en Machine Learning y Deep Learning. Fundador de agencia de IA en Madrid con proyectos reales en producción para empresas en España y Europa.',
      'url'         => 'https://jesusvillamizar.com/sobre-jesus/',
      'email'       => 'hello@jesusvillamizar.com',
      'image'       => 'https://jesusvillamizar.com/assets/img/perfilfoto.jpg',
      'knowsAbout'  => ['Inteligencia Artificial','Machine Learning','Deep Learning','MLOps','Procesamiento de Lenguaje Natural','Visión Artificial','Agentes IA Autónomos','Automatización de Procesos con IA','RAG','LLMs','Python','AWS'],
      'sameAs'      => ['https://www.linkedin.com/in/villamizarsan/','https://github.com/jesusvillamizar'],
      'knowsLanguage' => ['es','en'],
      'address'     => ['@type' => 'PostalAddress','addressLocality' => 'Madrid','addressCountry' => 'ES'],
      'alumniOf'    => ['@type' => 'EducationalOrganization','name' => 'Máster en Machine Learning y Deep Learning'],
      'hasOccupation' => [
        '@type'      => 'Occupation',
        'name'       => 'AI Engineer',
        'occupationLocation' => ['@type' => 'City','name' => 'Madrid'],
        'skills'     => 'Python, Machine Learning, Deep Learning, LLMs, RAG, Agentes IA, MLOps, AWS, Docker'
      ]
    ],
    [
      '@type'       => 'BreadcrumbList',
      'itemListElement' => [
        ['@type' => 'ListItem','position' => 1,'name' => 'Inicio','item' => 'https://jesusvillamizar.com/'],
        ['@type' => 'ListItem','position' => 2,'name' => 'Sobre Jesús','item' => 'https://jesusvillamizar.com/sobre-jesus/']
      ]
    ]
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

require_once '../includes/head.php';
require_once '../includes/nav.php';
?>

<!-- ═══════════════════════ HERO SOBRE JESÚS ═══════════════════════ -->
<section class="section section--navy" style="padding-top:7rem;padding-bottom:4rem;">
  <div class="container about">
    <div class="about__visual reveal">
      <div class="about__img-wrap">
        <div class="about__img-placeholder">
          <img src="/assets/img/perfilfoto.jpg" alt="Jesús Villamizar, ingeniero de inteligencia artificial en Madrid" width="500" height="500" style="width:100%;height:100%;object-fit:cover;border-radius:inherit;" fetchpriority="high" />
        </div>
        <div class="about__badge-float">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M10 2l2.4 5.2 5.6.8-4 3.9.9 5.6L10 14.8l-4.9 2.7.9-5.6L2 8l5.6-.8L10 2z" fill="#C9A535"/></svg>
          <span>MSc. Machine Learning</span>
        </div>
      </div>
    </div>

    <div class="about__content reveal reveal--right">
      <span class="section-badge section-badge--light">Sobre Jesús Villamizar</span>
      <h1 class="section-title section-title--light">Ingeniero de IA con visión de negocio</h1>
      <p class="about__text">
        Soy un ingeniero con más de 8 años de experiencia en desarrollo de software y especialización en Inteligencia Artificial. Cuento con un Máster en Machine Learning y Deep Learning, y he construido sistemas de IA reales en producción para empresas en España y Europa.
      </p>
      <p class="about__text">
        Mi diferenciador es simple: <strong style="color:var(--gold)">el que te vende es el que programa.</strong> No soy un comercial que subcontrata. Soy el ingeniero que diseña, construye y mantiene tu solución de IA de principio a fin.
      </p>
      <div class="about__credentials">
        <div class="credential">
          <svg class="credential__icon" viewBox="0 0 24 24" fill="none"><path d="M12 2L3 7l9 5 9-5-9-5zM3 12l9 5 9-5M3 17l9 5 9-5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div>
            <strong>Máster en ML &amp; Deep Learning</strong>
            <span>Especialización en redes neuronales y modelos generativos</span>
          </div>
        </div>
        <div class="credential">
          <svg class="credential__icon" viewBox="0 0 24 24" fill="none"><rect x="2" y="3" width="20" height="14" rx="2" stroke="#C9A535" stroke-width="1.8"/><path d="M8 21h8M12 17v4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg>
          <div>
            <strong>Full Stack AI Engineer</strong>
            <span>Python, PHP, Node.js, Docker, Kubernetes, AWS</span>
          </div>
        </div>
        <div class="credential">
          <svg class="credential__icon" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#C9A535" stroke-width="1.8"/><path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg>
          <div>
            <strong>Cobertura España y Europa</strong>
            <span>Con base en Madrid, trabajando con clientes internacionales</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ STACK TÉCNICO ═══════════════════════ -->
<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Stack técnico</span>
      <h2 class="section-title">Tecnologías que uso en producción</h2>
      <p class="section-subtitle">No son buzzwords. Son las herramientas con las que he construido sistemas reales.</p>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.5rem;margin-top:3rem;">

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26l4-8 4 5 3-4 5 7H10z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/></svg>
        </div>
        <h3>LLMs &amp; RAG</h3>
        <p>OpenAI GPT-4o, Claude 3.5, Llama 3, Mistral. RAG con embeddings, reranking y guardrails de producción.</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><circle cx="18" cy="18" r="7" stroke="#C9A535" stroke-width="1.8"/><path d="M18 11v7l4 4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3>Agentes IA Autónomos</h3>
        <p>LangGraph, CrewAI, AutoGen. Orquestación multi-agente con memoria persistente y herramientas externas.</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="9" y="9" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="20" y="9" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="9" y="20" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="20" y="20" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/></svg>
        </div>
        <h3>Machine Learning</h3>
        <p>PyTorch, TensorFlow, Scikit-learn. Modelos de clasificación, regresión, series temporales y visión artificial.</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26V16l8-6 8 6v10M14 26v-6h8v6" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h3>MLOps &amp; Producción</h3>
        <p>Docker, Kubernetes, AWS SageMaker, CI/CD pipelines. Modelos que se mantienen solos en producción.</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M12 24l4-8 4 5 2-3 4 6H12z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/></svg>
        </div>
        <h3>APIs &amp; Integraciones</h3>
        <p>OpenAI, Anthropic, Hugging Face, n8n, Make. Conecto cualquier LLM con tus sistemas existentes (CRM, ERP, BD).</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M18 10v4M18 22v4M10 18h4M22 18h4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/><circle cx="18" cy="18" r="4" stroke="#C9A535" stroke-width="1.8"/></svg>
        </div>
        <h3>Deep Learning</h3>
        <p>Redes neuronales convolucionales, transformers, fine-tuning de modelos preentrenados y modelos generativos.</p>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════ POR QUÉ YO ═══════════════════════ -->
<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Mi diferencial</span>
      <h2 class="section-title">Por qué trabajar con Jesús Villamizar</h2>
      <p class="section-subtitle">Las agencias tienen comerciales. Yo tengo código en producción.</p>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2rem;margin-top:3rem;">

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 18l5 5 11-11" stroke="#C9A535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h3>Ingeniero que firma el código</h3>
        <p>Soy yo quien diseña la arquitectura, escribe el código y lo pone en producción. Sin intermediarios, sin subcontratas.</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M18 10l2 6h6l-5 3.6 2 6L18 22l-5 3.6 2-6L10 16h6l2-6z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/></svg>
        </div>
        <h3>Máster en ML &amp; Deep Learning</h3>
        <p>Formación técnica real en redes neuronales, modelos generativos y sistemas de IA. Nada de certificados express en prompt engineering.</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M12 22c0-3.3 2.7-6 6-6s6 2.7 6 6M18 10a3 3 0 100 6 3 3 0 000-6z" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3>Interlocutor técnico y de negocio</h3>
        <p>Hablo con tu CTO y con tu CEO. Traduzco requisitos de negocio a arquitectura técnica y viceversa sin que nada se pierda.</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="10" y="14" width="16" height="12" rx="2" stroke="#C9A535" stroke-width="1.8"/><path d="M14 14v-2a4 4 0 018 0v2" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3>RGPD y EU AI Act</h3>
        <p>Construyo sistemas de IA que cumplen con la regulación europea. No es un extra: es parte del diseño desde el día uno.</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26V16l8-6 8 6v10M14 26v-5h8v5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h3>Resultados medibles</h3>
        <p>No entrego prototipos. Entrego sistemas que funcionan con métricas claras: reducción de tiempo, coste o tasa de error.</p>
      </div>

      <div class="why-card reveal">
        <div class="why-card__icon">
          <svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><circle cx="18" cy="18" r="7" stroke="#C9A535" stroke-width="1.8"/><path d="M18 14v4l3 3" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3>+50 proyectos de IA</h3>
        <p>Más de ocho años construyendo sistemas de IA en sectores como fintech, retail, salud, legal y logística en España y Europa.</p>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════ CTA ═══════════════════════ -->
<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:680px;">
    <span class="section-badge section-badge--light">¿Hablamos?</span>
    <h2 class="section-title section-title--light" style="margin-top:1rem;">¿Listo para implementar IA en tu empresa?</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2.5rem;">
      Cuéntame tu proyecto. En menos de 24 horas te propongo cómo la IA puede generar valor real en tu negocio.
    </p>
    <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
      <a href="/contacto/" class="btn btn--gold">Solicitar diagnóstico gratuito</a>
      <a href="/servicios/" class="btn btn--outline-light">Ver servicios</a>
    </div>
  </div>
</section>

<?php require_once '../includes/footer.php'; ?>
