<?php
$page_title       = 'Machine Learning a Medida para Empresas · Jesús Villamizar Madrid';
$page_description = 'Modelos de Machine Learning personalizados para empresas en España. Predicción de demanda, detección de fraude, scoring de clientes, clasificación. PyTorch, Scikit-learn, AWS.';
$canonical        = 'https://jesusvillamizar.com/servicios/machine-learning/';
$schema = json_encode(['@context'=>'https://schema.org','@graph'=>[
  ['@type'=>'Service','@id'=>'https://jesusvillamizar.com/servicios/machine-learning/#service',
   'name'=>'Machine Learning a Medida para Empresas',
   'description'=>'Diseño y entrenamiento de modelos de Machine Learning personalizados para predicción de demanda, detección de fraude, scoring de clientes y clasificación con tus datos.',
   'provider'=>['@id'=>'https://jesusvillamizar.com/#person'],
   'areaServed'=>'ES','inLanguage'=>'es',
   'url'=>'https://jesusvillamizar.com/servicios/machine-learning/'],
  ['@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>'https://jesusvillamizar.com/'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Servicios','item'=>'https://jesusvillamizar.com/servicios/'],
    ['@type'=>'ListItem','position'=>3,'name'=>'Machine Learning a Medida','item'=>'https://jesusvillamizar.com/servicios/machine-learning/']
  ]]
]],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
require_once '../../includes/head.php';
require_once '../../includes/nav.php';
?>

<section class="hero" style="min-height:50vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">Machine Learning</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.2rem);">Modelos de Machine Learning<br>Entrenados con tus Datos</h1>
      <p class="hero__subtitle" style="max-width:620px;margin-inline:auto;">
        Cuando un SaaS genérico no es suficiente. Modelos propios entrenados con los datos de tu negocio para predecir, clasificar y optimizar con una precisión que ningún producto estándar puede alcanzar.
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
      <span class="section-badge">Casos de uso</span>
      <h2 class="section-title">¿Qué problema puede resolver un modelo de ML?</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26l4-6 4 3 4-8 4 11" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><h3>Predicción de demanda</h3><p>Anticipa ventas, necesidades de stock o de personal con días o semanas de antelación. Reduce roturas y exceso de inventario.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M18 10l2 6h6l-5 3.6 2 6L18 22l-5 3.6 2-6L10 16h6z" stroke="#C9A535" stroke-width="1.8" stroke-linejoin="round"/></svg></div><h3>Detección de fraude</h3><p>Identifica transacciones, solicitudes o comportamientos anómalos en tiempo real con alta precisión y bajo porcentaje de falsos positivos.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M12 22c0-3.3 2.7-6 6-6s6 2.7 6 6M18 10a3 3 0 100 6 3 3 0 000-6z" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div><h3>Scoring de clientes</h3><p>Puntúa la probabilidad de compra, de churn o de impago de cada cliente. Prioriza tu equipo comercial donde hay más retorno.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="9" y="9" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="20" y="9" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="9" y="20" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="20" y="20" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/></svg></div><h3>Clasificación y categorización</h3><p>Tickets de soporte, solicitudes, productos, documentos. El modelo clasifica automáticamente con una precisión superior al 95%.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 18h16M10 13h16M10 23h10" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div><h3>Recomendación de productos</h3><p>Sistema de recomendación personalizado basado en el historial de compra y comportamiento de cada usuario.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M18 10v16M10 18h16" stroke="#C9A535" stroke-width="2" stroke-linecap="round"/></svg></div><h3>Mantenimiento predictivo</h3><p>Predice fallos en maquinaria o sistemas antes de que ocurran. Reduce paradas no planificadas y costes de mantenimiento correctivo.</p></div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Proceso</span>
      <h2 class="section-title">De los datos al modelo en producción</h2>
    </div>
    <div class="process-steps reveal" style="margin-top:3rem;">
      <div class="process-step"><div class="process-step__num">01</div><div class="process-step__body"><h3>Análisis y preparación de datos</h3><p>Auditoría de los datos disponibles, limpieza, feature engineering y definición de la variable objetivo.</p></div></div>
      <div class="process-step"><div class="process-step__num">02</div><div class="process-step__body"><h3>Selección y entrenamiento del modelo</h3><p>Comparativa de algoritmos (XGBoost, Random Forest, redes neuronales) y entrenamiento con validación cruzada.</p></div></div>
      <div class="process-step"><div class="process-step__num">03</div><div class="process-step__body"><h3>Evaluación y ajuste</h3><p>Métricas de rendimiento, análisis de errores, ajuste de hiperparámetros y validación con datos reales.</p></div></div>
      <div class="process-step"><div class="process-step__num">04</div><div class="process-step__body"><h3>Despliegue y monitorización</h3><p>API REST del modelo, integración con tus sistemas, dashboard de métricas y alerta si el rendimiento cae.</p></div></div>
    </div>
  </div>
</section>

<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <h2 class="section-title section-title--light">¿Tienes datos pero no sabes qué hacer con ellos?</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2rem;">Cuéntame qué datos tienes y qué problema quieres resolver. Te digo en 30 minutos si un modelo de ML puede ayudarte.</p>
    <a href="/contacto/" class="btn btn--gold">Hablar con Jesús</a>
  </div>
</section>

<?php require_once '../../includes/footer.php'; ?>
