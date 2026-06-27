<footer class="footer">
  <div class="container footer__inner">
    <div class="footer__brand">
      <picture>
        <source srcset="/assets/logos/logo-horizontal-blanco.webp" type="image/webp" />
        <img src="/assets/logos/logo-horizontal-blanco.png" alt="Jesús Villamizar AI Agency" class="footer__logo" loading="lazy" width="230" height="105" />
      </picture>
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
        <h3>Servicios</h3>
        <a href="/servicios/chatbots-asistentes-virtuales/">Chatbots IA</a>
        <a href="/servicios/automatizacion-procesos-ia/">Automatización</a>
        <a href="/servicios/agentes-ia-autonomos/">Agentes IA</a>
        <a href="/servicios/machine-learning/">Machine Learning</a>
        <a href="/servicios/consultoria-estrategica-ia/">Consultoría IA</a>
      </div>
      <div class="footer__col">
        <h3>Empresa</h3>
        <a href="/sobre-jesus/">Sobre Jesús</a>
        <a href="/#proceso">Proceso</a>
        <a href="/#precios">Precios</a>
        <a href="/contacto/">Contacto</a>
      </div>
      <div class="footer__col">
        <h3>Legal</h3>
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

<!-- CHAT WIDGET -->
<div id="chat-widget" class="chat-widget" aria-label="Chat" role="complementary">
  <button id="chat-toggle" class="chat-toggle is-pulsing" aria-label="Abrir chat">
    <svg class="chat-icon-open" viewBox="0 0 24 24" fill="none"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
    <svg class="chat-icon-close" viewBox="0 0 24 24" fill="none"><path d="M18 6 6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
  </button>
  <div id="chat-window" class="chat-window" aria-hidden="true">
    <div class="chat-header">
      <div class="chat-header__info">
        <div class="chat-header__avatar">JV</div>
        <div>
          <p class="chat-header__name">Jesús Villamizar AI</p>
          <p class="chat-header__status"><span class="chat-status-dot"></span>Online</p>
        </div>
      </div>
      <button id="chat-clear" class="chat-clear-btn" title="Limpiar conversación" aria-label="Limpiar conversación">
        <svg viewBox="0 0 24 24" fill="none"><path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
    </div>
    <div id="chat-messages" class="chat-messages" role="log" aria-live="polite">
      <div class="chat-msg chat-msg--bot">
        <p>¡Hola! Soy el asistente de Jesús Villamizar. ¿En qué puedo ayudarte hoy?</p>
      </div>
    </div>
    <form id="chat-form" class="chat-form" autocomplete="off">
      <input id="chat-input" type="text" class="chat-input" placeholder="Escribe tu mensaje..." maxlength="500" aria-label="Mensaje" />
      <button type="submit" class="chat-send" aria-label="Enviar">
        <svg viewBox="0 0 24 24" fill="none"><path d="M22 2 11 13M22 2 15 22l-4-9-9-4 20-7z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
    </form>
  </div>
</div>

<script src="/js/main.js"></script>
</body>
</html>
