<?php $base = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) ? '/Agencia' : ''; ?>
<!DOCTYPE html>
<html lang="es" data-lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Política de Privacidad · Jesús Villamizar AI</title>
  <meta name="description" content="Política de privacidad de Jesús Villamizar AI Agency. Información sobre el tratamiento de datos personales conforme al RGPD y la LOPDGDD." />
  <meta name="robots" content="noindex, follow" />
  <link rel="canonical" href="https://jesusvillamizar.com/privacidad" />
  <link rel="icon" href="assets/favicon.svg" type="image/svg+xml" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $base; ?>/css/style.css" />
</head>
<body>

<header id="header">
  <nav class="nav container">
    <a href="/" class="nav__logo">
      <img src="/assets/logos/logo-horizontal-blanco.png" alt="Jesús Villamizar AI Agency" class="nav__logo-img" />
    </a>
    <ul class="nav__links" id="navLinks">
      <li><a href="/#servicios" class="nav__link">Servicios</a></li>
      <li><a href="/#sobre-mi" class="nav__link">Sobre mí</a></li>
      <li><a href="/#proceso" class="nav__link">Proceso</a></li>
      <li><a href="/#precios" class="nav__link">Precios</a></li>
      <li><a href="/#contacto" class="nav__link">Contacto</a></li>
    </ul>
    <div class="nav__actions">
      <a href="/#contacto" class="btn btn--gold btn--sm nav__cta">Hablar con Jesús</a>
      <button class="nav__burger" id="navBurger" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>
</header>

<main class="legal-page container">
  <h1>Política de Privacidad</h1>
  <p><em>Última actualización: 27 de junio de 2026</em></p>

  <h2>1. Responsable del tratamiento</h2>
  <p>
    <strong>Titular:</strong> Jesús Villamizar<br />
    <strong>Actividad:</strong> Consultoría y desarrollo de Inteligencia Artificial<br />
    <strong>Domicilio:</strong> Madrid, España<br />
    <strong>Email de contacto:</strong> <a href="mailto:hello@jesusvillamizar.com">hello@jesusvillamizar.com</a>
  </p>

  <h2>2. Datos personales que recopilamos</h2>
  <p>A través de este sitio web podemos tratar los siguientes datos:</p>
  <ul>
    <li><strong>Formulario de contacto:</strong> nombre, empresa (opcional), dirección de email, servicio de interés y mensaje libre.</li>
    <li><strong>Chat virtual:</strong> los mensajes de texto que introduces en el chat del sitio. Estos mensajes se procesan a través de la API de OpenAI (modelo GPT-4o-mini) para generar respuestas automáticas.</li>
    <li><strong>Sistema de citas del chatbot:</strong> cuando solicitas una cita a través del asistente virtual, se recogen nombre, dirección de email, número de teléfono y fecha preferida de la cita.</li>
    <li><strong>Datos técnicos:</strong> dirección IP, tipo de navegador y páginas visitadas, gestionados de forma anónima por el servidor web.</li>
  </ul>
  <p>No recopilamos datos especialmente protegidos (salud, ideología, origen racial, etc.).</p>

  <h2>3. Finalidad y base legal del tratamiento</h2>
  <ul>
    <li><strong>Responder a tu consulta</strong> — base legal: ejecución de medidas precontractuales a petición del interesado (art. 6.1.b RGPD).</li>
    <li><strong>Gestionar el chat de atención al visitante</strong> — base legal: interés legítimo en proporcionar asistencia inmediata (art. 6.1.f RGPD).</li>
    <li><strong>Gestionar solicitudes de cita</strong> — los datos de nombre, email, teléfono y fecha recogidos a través del sistema de citas del chatbot se utilizan exclusivamente para concertar y confirmar la reunión solicitada. Base legal: ejecución de medidas precontractuales a petición del interesado (art. 6.1.b RGPD).</li>
    <li><strong>Cumplimiento de obligaciones legales</strong> — base legal: obligación legal (art. 6.1.c RGPD).</li>
  </ul>

  <h2>4. Transferencias internacionales de datos</h2>
  <p>
    Los mensajes enviados a través del chat son procesados por <strong>OpenAI, LLC</strong> (Estados Unidos), que actúa como encargado del tratamiento. OpenAI ofrece garantías adecuadas mediante Cláusulas Contractuales Tipo aprobadas por la Comisión Europea. Puedes consultar su política de privacidad en <a href="https://openai.com/privacy" target="_blank" rel="noopener noreferrer">openai.com/privacy</a>.
  </p>
  <p>No realizamos ninguna otra transferencia de datos a terceros países fuera del Espacio Económico Europeo.</p>

  <h2>5. Plazo de conservación</h2>
  <ul>
    <li><strong>Formulario de contacto:</strong> los datos se conservan durante el tiempo necesario para gestionar tu consulta y, en caso de relación contractual, durante el plazo legal aplicable (máximo 5 años).</li>
    <li><strong>Sistema de citas:</strong> los datos de la cita (nombre, email, teléfono y fecha) se conservan durante el tiempo necesario para gestionar la reunión solicitada y, como máximo, durante 1 año desde la fecha de la cita.</li>
    <li><strong>Chat:</strong> el historial del chat se almacena únicamente en tu navegador (localStorage) y no en nuestros servidores. Puedes borrarlo en cualquier momento desde el propio widget o limpiando los datos del navegador.</li>
  </ul>

  <h2>6. Tus derechos</h2>
  <p>Conforme al RGPD y la LOPDGDD tienes derecho a:</p>
  <ul>
    <li><strong>Acceso:</strong> conocer qué datos personales tuyos tratamos.</li>
    <li><strong>Rectificación:</strong> corregir datos inexactos o incompletos.</li>
    <li><strong>Supresión:</strong> solicitar el borrado de tus datos cuando ya no sean necesarios.</li>
    <li><strong>Limitación:</strong> pedir que suspendamos el tratamiento en determinadas circunstancias.</li>
    <li><strong>Portabilidad:</strong> recibir tus datos en un formato estructurado y de uso común.</li>
    <li><strong>Oposición:</strong> oponerte al tratamiento basado en interés legítimo.</li>
  </ul>
  <p>
    Para ejercer cualquiera de estos derechos, envíanos un email a <a href="mailto:hello@jesusvillamizar.com">hello@jesusvillamizar.com</a> indicando el derecho que deseas ejercer y adjuntando una copia de tu documento de identidad.
  </p>
  <p>
    Si consideras que el tratamiento de tus datos no es conforme a la normativa, puedes presentar una reclamación ante la <strong>Agencia Española de Protección de Datos (AEPD)</strong> en <a href="https://www.aepd.es" target="_blank" rel="noopener noreferrer">www.aepd.es</a>.
  </p>

  <h2>7. Seguridad</h2>
  <p>Aplicamos medidas técnicas y organizativas adecuadas para proteger tus datos personales frente a accesos no autorizados, pérdida o destrucción accidental, conforme al artículo 32 del RGPD.</p>

  <h2>8. Cambios en esta política</h2>
  <p>Podemos actualizar esta política en cualquier momento. La fecha de "última actualización" al inicio del documento refleja siempre la versión vigente.</p>
</main>

<footer class="footer">
  <div class="container footer__inner">
    <div class="footer__brand">
      <img src="/assets/logos/logo-horizontal-blanco.png" alt="Jesús Villamizar AI Agency" class="footer__logo" loading="lazy" />
      <p class="footer__tagline">Inteligencia Artificial a medida para empresas con ambición.</p>
      <div class="footer__socials">
        <a href="https://www.linkedin.com/in/villamizarsan/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
          <svg viewBox="0 0 24 24" fill="none"><rect x="2" y="2" width="20" height="20" rx="4" stroke="currentColor" stroke-width="1.8"/><path d="M7 10v7M7 7v.5M11 17v-4a2 2 0 014 0v4M11 10v7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        </a>
        <a href="https://github.com/jesusvillamizar" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
          <svg viewBox="0 0 24 24" fill="none"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.9a3.4 3.4 0 00-.9-2.4c3-.3 6.2-1.5 6.2-6.7a5.3 5.3 0 00-1.4-3.6 4.9 4.9 0 00-.1-3.6s-1.2-.4-3.8 1.4a13 13 0 00-7 0C6.6 2.4 5.4 2.8 5.4 2.8a4.9 4.9 0 00-.1 3.6A5.3 5.3 0 003.8 10c0 5.2 3.2 6.4 6.2 6.7a3.4 3.4 0 00-.9 2.4V22" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>
    <div class="footer__links">
      <div class="footer__col">
        <h5>Servicios</h5>
        <a href="/#servicios">Consultoría IA</a>
        <a href="/#servicios">Chatbots</a>
        <a href="/#servicios">Automatización</a>
        <a href="/#servicios">Deep Learning</a>
        <a href="/#servicios">Agentes IA</a>
      </div>
      <div class="footer__col">
        <h5>Empresa</h5>
        <a href="/#sobre-mi">Sobre Jesús</a>
        <a href="/#proceso">Proceso</a>
        <a href="/#precios">Precios</a>
        <a href="/#contacto">Contacto</a>
      </div>
      <div class="footer__col">
        <h5>Legal</h5>
        <a href="/privacidad">Política de Privacidad</a>
        <a href="/aviso-legal">Aviso Legal</a>
        <a href="/cookies">Política de Cookies</a>
      </div>
    </div>
  </div>
  <div class="footer__bottom">
    <div class="container">
      <p>© <span id="year"></span> Jesús Villamizar · Todos los derechos reservados</p>
      <p>Madrid, España</p>
    </div>
  </div>
</footer>

<script src="/js/main.js"></script>
</body>
</html>
