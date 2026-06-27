<?php
$page_title       = 'Contacto · Solicita tu diagnóstico gratuito de IA | Jesús Villamizar';
$page_description = 'Contacta con Jesús Villamizar para transformar tu empresa con Inteligencia Artificial. Diagnóstico gratuito, respuesta en menos de 24 horas. Madrid y remoto.';
$canonical        = 'https://jesusvillamizar.com/contacto/';

$schema = json_encode([
  '@context' => 'https://schema.org',
  '@graph'   => [
    [
      '@type'       => 'BreadcrumbList',
      'itemListElement' => [
        ['@type' => 'ListItem','position' => 1,'name' => 'Inicio','item' => 'https://jesusvillamizar.com/'],
        ['@type' => 'ListItem','position' => 2,'name' => 'Contacto','item' => 'https://jesusvillamizar.com/contacto/']
      ]
    ],
    [
      '@type'         => 'ContactPage',
      'name'          => 'Contacto · Jesús Villamizar AI Agency',
      'url'           => 'https://jesusvillamizar.com/contacto/',
      'description'   => 'Página de contacto para solicitar diagnóstico gratuito de IA',
      'contactOption' => 'TollFree',
      'areaServed'    => 'ES',
      'availableLanguage' => ['es','en']
    ]
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

require_once '../includes/head.php';
require_once '../includes/nav.php';
?>

<!-- ═══════════════════════ CONTACTO ═══════════════════════ -->
<section class="section section--navy" style="padding-top:7rem;">
  <div class="container contact">

    <div class="contact__info reveal">
      <span class="section-badge section-badge--light">Contacto</span>
      <h1 class="section-title section-title--light">¿Listo para transformar tu empresa con IA?</h1>
      <p class="contact__subtitle">Cuéntame tu proyecto y en menos de 24 horas te propongo cómo podemos trabajar juntos.</p>
      <div class="contact__details">
        <a href="mailto:hello@jesusvillamizar.com" class="contact__item">
          <svg viewBox="0 0 24 24" fill="none"><rect x="2" y="4" width="20" height="16" rx="2" stroke="#C9A535" stroke-width="1.8"/><path d="M2 8l10 6 10-6" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg>
          <span>hello@jesusvillamizar.com</span>
        </a>
        <a href="https://www.linkedin.com/in/villamizarsan/" target="_blank" rel="noopener noreferrer" class="contact__item">
          <svg viewBox="0 0 24 24" fill="none"><rect x="2" y="2" width="20" height="20" rx="4" stroke="#C9A535" stroke-width="1.8"/><path d="M7 10v7M7 7v.5" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/><path d="M11 17v-4a2 2 0 014 0v4M11 10v7" stroke="#C9A535" stroke-width="1.8" stroke-linecap="round"/></svg>
          <span>LinkedIn · Jesús Villamizar</span>
        </a>
        <div class="contact__item">
          <svg viewBox="0 0 24 24" fill="none"><path d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7z" stroke="#C9A535" stroke-width="1.8"/><circle cx="12" cy="9" r="2.5" stroke="#C9A535" stroke-width="1.8"/></svg>
          <span>Madrid, España · Atención también remota</span>
        </div>
      </div>
    </div>

    <div class="contact__form-wrap reveal reveal--right">
      <form id="contactForm" class="contact__form" novalidate>
        <div class="form-row">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" required autocomplete="name" placeholder="Tu nombre" />
          </div>
          <div class="form-group">
            <label for="company">Empresa</label>
            <input type="text" id="company" name="company" autocomplete="organization" placeholder="Tu empresa" />
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required autocomplete="email" placeholder="tu@empresa.com" />
        </div>
        <div class="form-group">
          <label for="service">Servicio de interés</label>
          <select id="service" name="service">
            <option value="">Selecciona un servicio</option>
            <option value="consultoria">Consultoría Estratégica IA</option>
            <option value="chatbot">Chatbot / Asistente Virtual</option>
            <option value="automatizacion">Automatización de Procesos</option>
            <option value="agentes">Agentes IA Autónomos</option>
            <option value="ml">Machine Learning a Medida</option>
            <option value="deep-learning">Deep Learning</option>
            <option value="integracion">Integración de APIs de IA</option>
            <option value="mlops">MLOps &amp; Producción</option>
            <option value="otro">Otro / No lo sé aún</option>
          </select>
        </div>
        <div class="form-group">
          <label for="message">Cuéntame tu proyecto</label>
          <textarea id="message" name="message" rows="5" required placeholder="Describe brevemente tu empresa, el problema que quieres resolver y qué esperas conseguir con IA..."></textarea>
        </div>
        <button type="submit" class="btn btn--gold btn--full">Enviar mensaje</button>
        <div id="formMsg" class="form-msg" role="alert"></div>
      </form>
    </div>

  </div>
</section>

<?php require_once '../includes/footer.php'; ?>
