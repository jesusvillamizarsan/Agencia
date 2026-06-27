<?php
$page_title       = 'Agentes de IA Autónomos para Empresas · Jesús Villamizar';
$page_description = 'Desarrollo de agentes IA autónomos con LangGraph y CrewAI. Sistemas que razonan, planifican y ejecutan tareas complejas sin intervención humana. España y Europa.';
$canonical        = 'https://jesusvillamizar.com/servicios/agentes-ia-autonomos/';
$schema = json_encode(['@context'=>'https://schema.org','@graph'=>[
  ['@type'=>'Service','@id'=>'https://jesusvillamizar.com/servicios/agentes-ia-autonomos/#service',
   'name'=>'Agentes de IA Autónomos para Empresas',
   'description'=>'Sistemas de IA que razonan, planifican y ejecutan tareas complejas de forma autónoma usando LangGraph, CrewAI y AutoGen. Se integran con tus herramientas y datos internos.',
   'provider'=>['@id'=>'https://jesusvillamizar.com/#person'],
   'areaServed'=>'ES','inLanguage'=>'es',
   'url'=>'https://jesusvillamizar.com/servicios/agentes-ia-autonomos/'],
  ['@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>'https://jesusvillamizar.com/'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Servicios','item'=>'https://jesusvillamizar.com/servicios/'],
    ['@type'=>'ListItem','position'=>3,'name'=>'Agentes IA Autónomos','item'=>'https://jesusvillamizar.com/servicios/agentes-ia-autonomos/']
  ]]
]],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
require_once '../../includes/head.php';
require_once '../../includes/nav.php';
?>

<section class="hero" style="min-height:50vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">Agentes IA</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.2rem);">Agentes de Inteligencia Artificial<br>Autónomos para Empresas</h1>
      <p class="hero__subtitle" style="max-width:640px;margin-inline:auto;">
        Más allá del chatbot. Un agente IA no solo responde: piensa, decide, usa herramientas y completa tareas complejas de principio a fin, solo o en equipo con otros agentes.
      </p>
      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
        <a href="/contacto/" class="btn btn--gold">Hablar sobre mi caso de uso</a>
        <a href="/servicios/" class="btn btn--outline-light">Ver todos los servicios</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">¿Qué es un agente IA?</span>
      <h2 class="section-title">La diferencia entre un chatbot y un agente</h2>
      <p class="section-subtitle">Un chatbot responde preguntas. Un agente IA ejecuta objetivos: investiga, toma decisiones, llama APIs, escribe código, envía emails y devuelve resultados concretos.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><circle cx="18" cy="18" r="7" stroke="#C9A535" stroke-width="1.8"/><path d="M18 11v7l4 4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>Razonamiento en cadena</h3>
        <p>El agente descompone tareas complejas en subtareas, las ejecuta en orden y ajusta su plan si algo falla.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 18h16M18 10l8 8-8 8" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Uso de herramientas externas</h3>
        <p>Puede buscar en internet, consultar tu base de datos, llamar a APIs, ejecutar código Python o enviar emails.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><circle cx="13" cy="18" r="4" stroke="#C9A535" stroke-width="1.8"/><circle cx="25" cy="14" r="4" stroke="#C9A535" stroke-width="1.8"/><circle cx="25" cy="24" r="3" stroke="#C9A535" stroke-width="1.8"/><path d="M17 18h4M21 14h-2M21 24h-2" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>Sistemas multi-agente</h3>
        <p>Varios agentes especializados trabajando en paralelo bajo un orquestador. Como un equipo de trabajo, pero en IA.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="10" y="14" width="16" height="12" rx="2" stroke="#C9A535" stroke-width="1.8"/><path d="M14 14v-2a4 4 0 018 0v2" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>Memoria persistente</h3>
        <p>El agente recuerda conversaciones pasadas, preferencias del usuario y estado de tareas a largo plazo.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Casos de uso</span>
      <h2 class="section-title">Lo que un agente IA puede hacer por ti</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="service-card reveal"><h3 class="service-card__title">Agente de investigación de mercado</h3><p class="service-card__desc">Monitoriza competidores, recoge noticias del sector y genera informes resumidos diarios sin intervención humana.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Agente de cualificación de leads</h3><p class="service-card__desc">Investiga cada lead entrante, cruza datos con LinkedIn y CRM, puntúa el interés y prepara el briefing para el comercial.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Agente de soporte técnico nivel 2</h3><p class="service-card__desc">Accede a logs, consulta la base de conocimiento y resuelve incidencias técnicas que antes requerían un ingeniero.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Agente de generación de contenido</h3><p class="service-card__desc">Redacta, revisa, publica y reporta contenido de blog, redes sociales o emails con tu tono de voz y SEO integrado.</p></div>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Stack técnico</span>
      <h2 class="section-title">Las herramientas que uso para construirlos</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1rem;margin-top:3rem;">
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">LangGraph</h3><p class="service-card__desc" style="font-size:.85rem;">Orquestación de agentes con estado persistente y flujos condicionales complejos.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">CrewAI</h3><p class="service-card__desc" style="font-size:.85rem;">Equipos de agentes con roles definidos y comunicación entre ellos.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">AutoGen (Microsoft)</h3><p class="service-card__desc" style="font-size:.85rem;">Conversaciones multi-agente con generación y ejecución de código.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">GPT-4o / Claude 3.5</h3><p class="service-card__desc" style="font-size:.85rem;">Los mejores modelos de razonamiento disponibles como "cerebro" del agente.</p></div>
    </div>
  </div>
</section>

<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <h2 class="section-title section-title--light">¿Tienes un proceso que podría hacerse solo?</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2rem;">Cuéntame el proceso y en 30 minutos te digo si un agente IA puede resolverlo y cómo.</p>
    <a href="/contacto/" class="btn btn--gold">Hablar con Jesús</a>
  </div>
</section>

<?php require_once '../../includes/footer.php'; ?>
