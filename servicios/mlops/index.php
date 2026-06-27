<?php
$page_title       = 'MLOps y Despliegue de Modelos en Producción · Jesús Villamizar';
$page_description = 'MLOps para empresas en España. Pipelines CI/CD para IA, monitorización de modelos, Docker, Kubernetes y AWS SageMaker. Modelos de ML estables y escalables en producción.';
$canonical        = 'https://jesusvillamizar.com/servicios/mlops/';
$schema = json_encode(['@context'=>'https://schema.org','@graph'=>[
  ['@type'=>'Service','@id'=>'https://jesusvillamizar.com/servicios/mlops/#service',
   'name'=>'MLOps y Despliegue de Modelos en Producción',
   'description'=>'Pipelines CI/CD para IA, monitorización de modelos, contenedorización y escalado. Los modelos de ML se mantienen funcionando y precisos en producción.',
   'provider'=>['@id'=>'https://jesusvillamizar.com/#person'],
   'areaServed'=>'ES','inLanguage'=>'es',
   'url'=>'https://jesusvillamizar.com/servicios/mlops/'],
  ['@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>'https://jesusvillamizar.com/'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Servicios','item'=>'https://jesusvillamizar.com/servicios/'],
    ['@type'=>'ListItem','position'=>3,'name'=>'MLOps y Producción','item'=>'https://jesusvillamizar.com/servicios/mlops/']
  ]]
]],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
require_once '../../includes/head.php';
require_once '../../includes/nav.php';
?>

<section class="hero" style="min-height:50vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">MLOps</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.2rem);">MLOps: Modelos de IA Estables<br>y Escalables en Producción</h1>
      <p class="hero__subtitle" style="max-width:620px;margin-inline:auto;">
        Un modelo que funciona en un notebook no es un producto. MLOps es la disciplina que convierte experimentos de IA en sistemas robustos que escalan, se monitorizan y se mantienen solos.
      </p>
      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
        <a href="/contacto/" class="btn btn--gold">Hablar sobre mi infraestructura</a>
        <a href="/servicios/" class="btn btn--outline-light">Ver todos los servicios</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">El problema</span>
      <h2 class="section-title">El modelo funciona en local pero falla en producción</h2>
      <p class="section-subtitle">Es el problema número uno en proyectos de IA. Sin MLOps, los modelos degradan silenciosamente, no escalan bajo carga y son imposibles de actualizar sin romper nada.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="8" y="14" width="10" height="12" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="22" y="10" width="10" height="12" rx="2" stroke="#C9A535" stroke-width="1.8"/><path d="M18 20h4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div><h3>Pipeline CI/CD para IA</h3><p>Cada cambio en el modelo pasa por pruebas automáticas antes de llegar a producción. Nunca rompe nada sin aviso.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26l4-8 4 5 3-4 5 7" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><h3>Monitorización de modelos</h3><p>Alertas cuando la precisión baja, cuando los datos de entrada cambian (data drift) o cuando la latencia sube.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M18 10v16M10 18l8-8 8 8" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><h3>Escalado automático</h3><p>El sistema escala según la carga. Sin pagar infraestructura ociosa en horas bajas ni saturarse en picos.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 18h16M18 10l8 8-8 8" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><h3>Reentrenamiento automático</h3><p>El modelo se reentrena periódicamente con datos nuevos sin intervención manual. Siempre actualizado y preciso.</p></div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Stack MLOps</span>
      <h2 class="section-title">Herramientas que uso para llevar modelos a producción</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1rem;margin-top:3rem;">
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">Docker y Kubernetes</h3><p class="service-card__desc" style="font-size:.85rem;">Contenedorización del modelo y orquestación para escalado automático y alta disponibilidad.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">AWS SageMaker</h3><p class="service-card__desc" style="font-size:.85rem;">Plataforma MLOps de AWS para entrenamiento, despliegue y monitorización gestionada.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">MLflow</h3><p class="service-card__desc" style="font-size:.85rem;">Registro de experimentos, versionado de modelos y trazabilidad de cada entrenamiento.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">GitHub Actions / CI</h3><p class="service-card__desc" style="font-size:.85rem;">Pipelines de integración y despliegue continuo adaptados al ciclo de vida de modelos de ML.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">FastAPI</h3><p class="service-card__desc" style="font-size:.85rem;">API REST del modelo con documentación automática, autenticación y control de versiones.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">Prometheus + Grafana</h3><p class="service-card__desc" style="font-size:.85rem;">Monitorización de métricas del modelo y alertas en tiempo real ante degradación del rendimiento.</p></div>
    </div>
  </div>
</section>

<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <h2 class="section-title section-title--light">¿Tienes un modelo que necesita escalar?</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2rem;">Cuéntame tu arquitectura actual y te digo cómo llevarlo a producción de forma robusta.</p>
    <a href="/contacto/" class="btn btn--gold">Hablar con Jesús</a>
  </div>
</section>

<?php require_once '../../includes/footer.php'; ?>
