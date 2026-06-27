<?php
$page_title       = 'Desarrollo de Chatbots con IA para Empresas · Jesús Villamizar Madrid';
$page_description = 'Chatbots y asistentes virtuales con IA para empresas en España. Atención al cliente 24/7, integración con GPT-4 y Claude, en web, WhatsApp o CRM. Resultados desde el primer mes.';
$canonical        = 'https://jesusvillamizar.com/servicios/chatbots-asistentes-virtuales/';
$schema = json_encode(['@context'=>'https://schema.org','@graph'=>[
  ['@type'=>'Service','@id'=>'https://jesusvillamizar.com/servicios/chatbots-asistentes-virtuales/#service',
   'name'=>'Desarrollo de Chatbots y Asistentes Virtuales con IA',
   'description'=>'Asistentes inteligentes con GPT-4 y Claude que atienden a tus clientes 24/7, resuelven el 70% de consultas sin intervención humana y se integran en web, WhatsApp o tu CRM.',
   'provider'=>['@id'=>'https://jesusvillamizar.com/#person'],
   'areaServed'=>'ES','inLanguage'=>'es',
   'url'=>'https://jesusvillamizar.com/servicios/chatbots-asistentes-virtuales/'],
  ['@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>'https://jesusvillamizar.com/'],
    ['@type'=>'ListItem','position'=>2,'name'=>'Servicios','item'=>'https://jesusvillamizar.com/servicios/'],
    ['@type'=>'ListItem','position'=>3,'name'=>'Chatbots y Asistentes Virtuales','item'=>'https://jesusvillamizar.com/servicios/chatbots-asistentes-virtuales/']
  ]]
]],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
require_once '../../includes/head.php';
require_once '../../includes/nav.php';
?>

<section class="hero" style="min-height:50vh;">
  <div class="hero__bg-pattern"></div>
  <div class="container hero__inner" style="grid-template-columns:1fr;text-align:center;padding-block:7rem 4rem;">
    <div>
      <span class="hero__badge">Chatbots con IA</span>
      <h1 class="hero__title" style="font-size:clamp(2rem,4.5vw,3.2rem);">Chatbots y Asistentes Virtuales<br>con Inteligencia Artificial</h1>
      <p class="hero__subtitle" style="max-width:620px;margin-inline:auto;">
        Tu empresa atendiendo clientes 24/7, respondiendo en segundos y resolviendo el 70% de consultas sin intervención humana. Sin chatbots de árbol de decisión: IA real que entiende y conversa.
      </p>
      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
        <a href="/contacto/" class="btn btn--gold">Solicitar demo gratuita</a>
        <a href="/servicios/" class="btn btn--outline-light">Ver todos los servicios</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">¿Qué consigues?</span>
      <h2 class="section-title">Un asistente que trabaja mientras tú duermes</h2>
      <p class="section-subtitle">No es un chatbot de preguntas frecuentes. Es un sistema de IA que entiende el contexto, recuerda la conversación y sabe cuándo escalar a un humano.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><circle cx="18" cy="18" r="7" stroke="#C9A535" stroke-width="1.8"/><path d="M18 14v4l3 3" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>Disponible 24/7/365</h3>
        <p>Responde en segundos a cualquier hora. Sin colas de espera, sin coste de soporte nocturno o en fin de semana.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 18l5 5 11-11" stroke="#C9A535" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Resuelve el 70% de consultas</h3>
        <p>Solo las consultas complejas o de alto valor llegan a tu equipo. El chatbot gestiona el resto de forma autónoma.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><rect x="9" y="9" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="20" y="9" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="9" y="20" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/><rect x="20" y="20" width="7" height="7" rx="2" stroke="#C9A535" stroke-width="1.8"/></svg></div>
        <h3>Integrado en tus canales</h3>
        <p>Web, WhatsApp, Telegram, Slack o tu CRM. El mismo asistente en todos los canales con memoria compartida.</p>
      </div>
      <div class="why-card reveal">
        <div class="why-card__icon"><svg viewBox="0 0 36 36" fill="none"><rect width="36" height="36" rx="8" fill="rgba(201,165,53,.1)"/><path d="M10 26V16l8-6 8 6v10M14 26v-6h8v6" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Entrenado con tus datos</h3>
        <p>Conoce tu catálogo, tus precios, tus políticas y tu tono de marca. No es genérico: es tu asistente.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section--white">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Tecnología</span>
      <h2 class="section-title">Construido con los mejores modelos del mercado</h2>
      <p class="section-subtitle">GPT-4o, Claude 3.5 Sonnet, Llama 3. Elijo el modelo más adecuado para tu caso de uso, presupuesto y requisitos de privacidad.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin-top:3rem;">
      <div class="service-card reveal"><h3 class="service-card__title">RAG — Retrieval Augmented Generation</h3><p class="service-card__desc">El chatbot busca en tu documentación interna antes de responder. Respuestas precisas basadas en tus datos, no en información genérica.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Memoria y contexto de conversación</h3><p class="service-card__desc">Recuerda lo que dijo el usuario en mensajes anteriores. La conversación fluye de forma natural, sin repetir preguntas.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">Escalado inteligente a humano</h3><p class="service-card__desc">Detecta cuándo el usuario necesita un agente humano y transfiere la conversación con todo el contexto ya registrado.</p></div>
      <div class="service-card reveal"><h3 class="service-card__title">RGPD y privacidad de datos</h3><p class="service-card__desc">Opcionalmente desplegado en tu propia infraestructura o con modelos open-source on-premise para máxima privacidad.</p></div>
    </div>
  </div>
</section>

<section class="section section--light">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-badge">Sectores</span>
      <h2 class="section-title">¿Para qué tipo de empresa es este servicio?</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-top:3rem;">
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">E-commerce</h3><p class="service-card__desc" style="font-size:.85rem;">Estado de pedidos, devoluciones, recomendaciones de producto.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">Legal y Asesorías</h3><p class="service-card__desc" style="font-size:.85rem;">Primera capa de consultas antes de llegar al abogado o asesor.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">Inmobiliario</h3><p class="service-card__desc" style="font-size:.85rem;">Captación de leads, filtrado de requisitos, agendado de visitas.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">Salud y Clínicas</h3><p class="service-card__desc" style="font-size:.85rem;">Información de servicios, citas y FAQs sin colapsar recepción.</p></div>
      <div class="service-card reveal" style="padding:1.25rem;"><h3 class="service-card__title" style="font-size:.95rem;">SaaS y Tech</h3><p class="service-card__desc" style="font-size:.85rem;">Soporte técnico de primer nivel integrado en el propio producto.</p></div>
    </div>
  </div>
</section>

<section class="section section--navy" style="padding-block:5rem;">
  <div class="container" style="text-align:center;max-width:640px;">
    <h2 class="section-title section-title--light">Ve tu chatbot funcionando antes de decidir</h2>
    <p class="section-subtitle" style="color:rgba(255,255,255,.7);margin-bottom:2rem;">Te monto una demo personalizada con los datos de tu empresa en menos de una semana. Sin coste, sin compromiso.</p>
    <a href="/contacto/" class="btn btn--gold">Pedir demo gratuita</a>
  </div>
</section>

<?php require_once '../../includes/footer.php'; ?>
