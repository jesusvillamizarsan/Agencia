<?php
$page_title       = 'Agente de Voz con Inteligencia Artificial para Empresas · Jesús Villamizar';
$page_description = 'Agentes de voz con IA para empresas en España. Llamadas automatizadas, recepción virtual y atención telefónica 24/7 con comprensión del lenguaje natural. Madrid y remoto.';
$canonical        = 'https://jesusvillamizar.com/servicios/agente-de-voz-ia/';
$schema = json_encode(['@context'=>'https://schema.org','@graph'=>[
  ['@type'=>'Service','@id'=>'https://jesusvillamizar.com/servicios/agente-de-voz-ia/#service',
   'name'=>'Agente de Voz con Inteligencia Artificial',
   'description'=>'Sistemas de voz con IA que gestionan llamadas entrantes y salientes, atienden clientes 24/7 y se integran con tu CRM. Comprensión natural del lenguaje hablado en español.',
   'provider'=>['@id'=>'https://jesusvillamizar.com/#person'],
   'areaServed'=>'ES','inLanguage'=>'es',
   'url'=>'https://jesusvillamizar.com/servicios/agente-de-voz-ia/'],
  ['@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>'https://jesusvillamizar.com/'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Servicios','item'=>'https://jesusvillamizar.com/servicios/'],
    ['@type'=>'ListItem','position'=>3,'name'=>'Agente de Voz con IA','item'=>'https://jesusvillamizar.com/servicios/agente-de-voz-ia/']
  ]]
]],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
require_once '../../includes/head.php';
require_once '../../includes/nav.php';
?>

<section class="hero" style="min-height:50vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">Agente de Voz IA</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.2rem);">Agentes de Voz con IA<br>para tu Empresa</h1>
      <p class="hero__subtitle" style="max-width:620px;margin-inline:auto;">
        Tu recepción virtual que atiende llamadas 24/7, entiende al cliente en lenguaje natural, gestiona citas y consultas, y escala al humano solo cuando es necesario.
      </p>
      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
        <a href="/contacto/" class="btn btn--gold">Solicitar demo de voz</a>
        <a href="/servicios/" class="btn btn--outline-light">Ver todos los servicios</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">¿Qué puede hacer?</span>
      <h2 class="section-title">Un agente de voz va mucho más allá de un IVR</h2>
      <p class="section-subtitle">Los sistemas de voz por menús (pulse 1, pulse 2) generan frustración. Un agente de voz con IA entiende lo que el cliente dice y responde como lo haría una persona.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M18 10a5 5 0 015 5v4a5 5 0 01-10 0v-4a5 5 0 015-5z" stroke="#C9A535" stroke-width="1.8"/><path d="M11 19a7 7 0 0014 0M18 26v4" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div><h3>Comprensión del lenguaje natural</h3><p>Entiende frases completas, acentos regionales y lenguaje coloquial. No hace falta repetir "uno" tres veces.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><circle cx="18" cy="18" r="7" stroke="#C9A535" stroke-width="1.8"/><path d="M18 14v4l3 3" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div><h3>Disponible 24/7</h3><p>Gestiona llamadas fuera del horario de oficina, en festivos y en horas punta sin coste adicional de personal.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="9" y="9" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="20" y="9" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="9" y="20" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><path d="M23.5 20v7M20 23.5h7" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div><h3>Gestión de citas y reservas</h3><p>Consulta disponibilidad en tu calendario y agenda citas en tiempo real durante la llamada, sin intervención humana.</p></div>
      <div class="why-card reveal"><div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26V16l8-6 8 6v10M14 26v-5h8v5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><h3>Integrado con tu CRM</h3><p>Registra automáticamente cada llamada, crea contactos y actualiza el estado en Salesforce, HubSpot o tu sistema.</p></div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Casos de uso</span>
      <h2 class="section-title">Sectores donde el agente de voz tiene mayor impacto</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="service-card reveal"><h3 class="service-card__title">Clínicas y Salud</h3><p class="service-card__desc">Gestión de citas, recordatorios de consulta y resolución de dudas frecuentes sin colapsar la recepción.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Inmobiliarias</h3><p class="service-card__desc">Captación de leads por teléfono, cualificación de interés y agendado de visitas automático.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Contact Centers</h3><p class="service-card__desc">Primer nivel de atención que resuelve el 60% de llamadas sin transferir a un agente humano.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Hostelería y Reservas</h3><p class="service-card__desc">Reservas de mesa o habitación por teléfono con comprobación de disponibilidad en tiempo real.</p></div>
    </div>
  </div>
</section>

<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <h2 class="section-title section-title--light">Escucha cómo suena tu agente de voz</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2rem;">Te preparo una demo de voz personalizada para tu sector en menos de una semana. Gratis.</p>
    <a href="/contacto/" class="btn btn--gold">Solicitar demo de voz</a>
  </div>
</section>

<?php require_once '../../includes/footer.php'; ?>
