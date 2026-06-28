/* ═══════════════════════════════════════════════════════════
   Jesús Villamizar AI Agency · main.js
   ═══════════════════════════════════════════════════════════ */

/* ─── Translations ──────────────────────────────────────────── */
const T = {
  es: {
    "meta.title": "Jesús Villamizar · Agencia de Inteligencia Artificial en Madrid",
    "meta.description": "Consultoría y desarrollo de Inteligencia Artificial a medida para empresas en España y Europa.",
    "nav.services": "Servicios",
    "nav.about": "Sobre mí",
    "nav.process": "Proceso",
    "nav.pricing": "Precios",
    "nav.contact": "Contacto",
    "nav.cta": "Hablar con Jesús",
    "hero.badge": "Agencia de Inteligencia Artificial · Madrid",
    "hero.title": "Transformamos tu negocio con <em>Inteligencia Artificial</em>",
    "hero.subtitle": "Consultoría y desarrollo de IA a medida para empresas que quieren liderar el futuro. Máster en Machine Learning y Deep Learning. Resultados medibles desde el primer mes.",
    "hero.cta1": "Ver Servicios",
    "hero.cta2": "Agenda una llamada",
    "hero.stat1": "Proyectos IA",
    "hero.stat2": "Años de experiencia",
    "hero.stat3": "Cobertura geográfica",
    "hero.scroll": "Explorar",
    "tech.label": "Tecnologías y plataformas",
    "services.badge": "Lo que hacemos",
    "services.title": "Servicios de IA para cada etapa de tu empresa",
    "services.subtitle": "Desde la primera consultoría hasta el despliegue de modelos en producción, cubrimos todo el espectro de la Inteligencia Artificial aplicada al negocio.",
    "services.basicTitle": "Servicios Esenciales",
    "services.advancedTitle": "Servicios Avanzados",
    "services.s1.title": "Consultoría Estratégica IA",
    "services.s1.desc": "Evaluamos tu negocio y diseñamos un roadmap de adopción de IA realista, con ROI claro y priorización de casos de uso de alto impacto.",
    "services.s2.title": "Chatbots y Asistentes Virtuales",
    "services.s2.desc": "Asistentes inteligentes que atienden a tus clientes 24/7, reducen costes de soporte y mejoran la experiencia de usuario en cualquier canal.",
    "services.s3.title": "Automatización de Procesos",
    "services.s3.desc": "Combinamos RPA con IA para automatizar flujos repetitivos, liberar a tu equipo de tareas manuales y eliminar errores operativos.",
    "services.s4.title": "Integración de APIs de IA",
    "services.s4.desc": "Conectamos modelos de lenguaje (GPT-4, Claude, Gemini) y otras APIs de IA a tus sistemas actuales de forma segura y escalable.",
    "services.s5.title": "Modelos ML Personalizados",
    "services.s5.desc": "Diseñamos y entrenamos modelos de Machine Learning a medida para tu sector — predicción de demanda, detección de fraude, scoring de clientes y más.",
    "services.s6.title": "Deep Learning",
    "services.s6.desc": "Visión artificial, procesamiento de lenguaje natural (NLP) y redes neuronales profundas aplicadas a problemas de alta complejidad.",
    "services.s7.title": "Agentes IA Autónomos",
    "services.s7.desc": "Sistemas de IA que razonan, planifican y ejecutan tareas complejas de forma autónoma, integrándose con tus herramientas y datos internos.",
    "services.s8.title": "MLOps & Producción",
    "services.s8.desc": "Desplegamos, monitorizamos y escalamos modelos en producción con pipelines CI/CD para IA, garantizando estabilidad, velocidad y trazabilidad.",
    "about.badge": "MSc. Machine Learning",
    "about.sectionBadge": "Sobre Jesús Villamizar",
    "about.title": "Ingeniero de IA con visión de negocio",
    "about.p1": "Soy un ingeniero con más de 8 años de experiencia en desarrollo de software y especialización en Inteligencia Artificial. Cuento con un Máster en Machine Learning y Deep Learning, y he trabajado en proyectos de IA para empresas en España y Europa.",
    "about.p2": "Mi enfoque combina el rigor técnico del desarrollo de modelos con la comprensión real del negocio: no entrego solo código, entrego soluciones que generan valor medible y sostenible.",
    "about.cred1.title": "Máster en ML & Deep Learning",
    "about.cred1.sub": "Especialización en redes neuronales y modelos generativos",
    "about.cred2.title": "Full Stack Engineer",
    "about.cred2.sub": "PHP, Python, Node.js, Docker, Kubernetes, AWS",
    "about.cred3.title": "Cobertura España y Europa",
    "about.cred3.sub": "Con base en Madrid, trabajando con clientes internacionales",
    "process.badge": "Cómo trabajamos",
    "process.title": "Un proceso claro, sin sorpresas",
    "process.subtitle": "Cada proyecto sigue una metodología probada que garantiza entregas de calidad, en plazo y con resultados medibles.",
    "process.s1.title": "Diagnóstico y Descubrimiento",
    "process.s1.desc": "Analizamos tu negocio, tus datos y tus objetivos. Identificamos los casos de uso con mayor impacto y menor fricción para empezar a generar valor rápido.",
    "process.s2.title": "Diseño de Solución",
    "process.s2.desc": "Proponemos la arquitectura técnica y el plan de proyecto con hitos claros, presupuesto detallado y métricas de éxito acordadas desde el inicio.",
    "process.s3.title": "Desarrollo e Iteración",
    "process.s3.desc": "Construimos la solución en sprints cortos con demos semanales. Tú tienes visibilidad total del progreso y retroalimentación en cada etapa.",
    "process.s4.title": "Despliegue y Soporte",
    "process.s4.desc": "Llevamos la solución a producción, formamos a tu equipo y ofrecemos soporte continuo para asegurar que el sistema mejora con el tiempo.",
    "why.badge": "Por qué elegirnos",
    "why.title": "Por qué elegir nuestra consultoría de Inteligencia Artificial",
    "faq.badge": "Preguntas frecuentes",
    "faq.title": "Todo lo que necesitas saber",
    "faq.q1": "¿Cuánto cuesta implementar Inteligencia Artificial en una empresa?",
    "faq.a1": "Nuestros planes empiezan desde 990€/mes para un primer chatbot o asistente virtual, y el plan Business con automatización de procesos está a 2.490€/mes. Los proyectos enterprise se presupuestan a medida.",
    "faq.q2": "¿Cuánto tiempo tarda en desarrollarse un proyecto de IA?",
    "faq.a2": "Un chatbot básico puede estar operativo en 2-4 semanas. Proyectos de automatización compleja o modelos ML a medida requieren entre 2 y 4 meses.",
    "faq.q3": "¿Necesito datos históricos para empezar con Inteligencia Artificial?",
    "faq.a3": "No siempre. Para chatbots basados en LLM no son necesarios datos propios. Para modelos predictivos sí se requiere un conjunto de datos mínimo, que evaluamos gratuitamente en el diagnóstico inicial.",
    "faq.q4": "¿Trabajáis con empresas fuera de Madrid?",
    "faq.a4": "Sí. Trabajamos de forma remota con empresas en toda España y Europa — Francia, Alemania, Italia, Portugal y más.",
    "faq.q5": "¿Qué diferencia hay entre un chatbot y un agente IA autónomo?",
    "faq.a5": "Un chatbot responde preguntas en un flujo predefinido. Un agente IA autónomo razona, planifica y ejecuta tareas complejas de forma independiente — consulta bases de datos, llama a APIs y toma decisiones sin intervención humana constante.",
    "why.w1.title": "Formación Académica de Alto Nivel",
    "why.w1.desc": "Máster en Machine Learning y Deep Learning. Conocimiento teórico sólido aplicado a problemas reales de negocio.",
    "why.w2.title": "Resultados Medibles",
    "why.w2.desc": "Cada proyecto incluye KPIs claros. No trabajamos por horas sin rumbo: nos comprometemos con resultados concretos y verificables.",
    "why.w3.title": "Enfoque End-to-End",
    "why.w3.desc": "Desde la estrategia hasta el despliegue en producción. Un solo interlocutor técnico con visión completa del proyecto.",
    "why.w4.title": "Tecnología Agnóstica",
    "why.w4.desc": "Elegimos la mejor herramienta para cada problema: OpenAI, Claude, modelos open source, TensorFlow o PyTorch. Sin sesgos de vendor.",
    "why.w5.title": "Comunicación Transparente",
    "why.w5.desc": "Reportes semanales, acceso al código en todo momento y reuniones regulares. Tú nunca pierdes el control de tu proyecto.",
    "why.w6.title": "Velocidad sin Sacrificar Calidad",
    "why.w6.desc": "Metodología ágil con entregas rápidas. Los primeros resultados visibles en las primeras semanas del proyecto.",
    "pricing.badge": "Planes y Precios",
    "pricing.title": "Transparencia desde el primer día",
    "pricing.subtitle": "Planes pensados para acompañarte en cada etapa. Sin letra pequeña, sin costes ocultos.",
    "pricing.period": "/mes",
    "pricing.popular": "Más popular",
    "pricing.cta": "Empezar ahora",
    "pricing.ctaEnterprise": "Solicitar propuesta",
    "pricing.p1.name": "Starter",
    "pricing.p1.desc": "Para empresas que quieren explorar el potencial de la IA con un primer proyecto concreto.",
    "pricing.p1.f1": "Consultoría estratégica (4h/mes)",
    "pricing.p1.f2": "Chatbot o asistente virtual básico",
    "pricing.p1.f3": "Integración con 1 plataforma",
    "pricing.p1.f4": "Soporte por email",
    "pricing.p1.f5": "Informe mensual de resultados",
    "pricing.p2.name": "Business",
    "pricing.p2.desc": "Para empresas que quieren automatizar procesos e integrar IA en el núcleo de sus operaciones.",
    "pricing.p2.f1": "Todo lo del plan Starter",
    "pricing.p2.f2": "Automatización de procesos con IA",
    "pricing.p2.f3": "Integración con múltiples sistemas",
    "pricing.p2.f4": "Modelo ML personalizado (básico)",
    "pricing.p2.f5": "Reunión semanal de seguimiento",
    "pricing.p2.f6": "Soporte prioritario",
    "pricing.p3.name": "Enterprise",
    "pricing.p3.amount": "A medida",
    "pricing.p3.desc": "Proyectos de Deep Learning, modelos ML avanzados, agentes autónomos y MLOps a escala empresarial.",
    "pricing.p3.f1": "Todo lo del plan Business",
    "pricing.p3.f2": "Modelos Deep Learning personalizados",
    "pricing.p3.f3": "Agentes IA autónomos",
    "pricing.p3.f4": "MLOps y despliegue en producción",
    "pricing.p3.f5": "Equipo dedicado al proyecto",
    "pricing.p3.f6": "SLA garantizado y soporte 24/7",
    "contact.badge": "Contacto",
    "contact.title": "¿Listo para transformar tu empresa con IA?",
    "contact.subtitle": "Cuéntame tu proyecto y en menos de 24 horas te propongo cómo podemos trabajar juntos.",
    "contact.location": "Madrid, España · Atención también remota",
    "contact.form.name": "Nombre",
    "contact.form.namePh": "Tu nombre",
    "contact.form.company": "Empresa",
    "contact.form.companyPh": "Tu empresa",
    "contact.form.email": "Email",
    "contact.form.emailPh": "tu@empresa.com",
    "contact.form.service": "Servicio de interés",
    "contact.form.servicePh": "Selecciona un servicio",
    "contact.form.opt1": "Consultoría Estratégica IA",
    "contact.form.opt2": "Chatbots y Asistentes",
    "contact.form.opt3": "Automatización de Procesos",
    "contact.form.opt4": "Modelos ML / Deep Learning",
    "contact.form.opt5": "Agentes IA Autónomos",
    "contact.form.opt6": "MLOps & Producción",
    "contact.form.opt7": "Otro / No sé aún",
    "contact.form.message": "Cuéntame tu proyecto",
    "contact.form.messagePh": "Describe brevemente tu empresa, el problema que quieres resolver y cualquier detalle relevante...",
    "contact.form.privacy": 'Acepto la <a href="/privacidad" target="_blank">política de privacidad</a>',
    "contact.form.submit": "Enviar mensaje",
    "footer.tagline": "Inteligencia Artificial a medida para empresas con ambición.",
    "footer.services": "Servicios",
    "footer.s1": "Consultoría IA",
    "footer.s2": "Chatbots",
    "footer.s3": "Automatización",
    "footer.s4": "Deep Learning",
    "footer.s5": "Agentes IA",
    "footer.company": "Empresa",
    "footer.about": "Sobre Jesús",
    "footer.process": "Proceso",
    "footer.pricing": "Precios",
    "footer.contact": "Contacto",
    "footer.legal": "Legal",
    "footer.privacy": "Política de Privacidad",
    "footer.legalNotice": "Aviso Legal",
    "footer.cookies": "Política de Cookies",
    "footer.rights": "Todos los derechos reservados",
    "footer.location": "Madrid, España",
    "form.success": "¡Mensaje enviado! Te responderé en menos de 24 horas.",
    "form.error": "Hubo un error al enviar. Por favor, inténtalo de nuevo.",
    "form.validName": "Por favor, introduce tu nombre.",
    "form.validEmail": "Por favor, introduce un email válido.",
    "form.validMessage": "Por favor, describe tu proyecto.",
    "form.validPrivacy": "Debes aceptar la política de privacidad."
  },
  en: {
    "meta.title": "Jesús Villamizar · Artificial Intelligence Agency in Madrid",
    "meta.description": "Custom AI consulting and development for businesses in Spain and Europe.",
    "nav.services": "Services",
    "nav.about": "About",
    "nav.process": "Process",
    "nav.pricing": "Pricing",
    "nav.contact": "Contact",
    "nav.cta": "Talk to Jesús",
    "hero.badge": "Artificial Intelligence Agency · Madrid",
    "hero.title": "We transform your business with <em>Artificial Intelligence</em>",
    "hero.subtitle": "Custom AI consulting and development for businesses that want to lead the future. Master's in Machine Learning and Deep Learning. Measurable results from day one.",
    "hero.cta1": "View Services",
    "hero.cta2": "Book a call",
    "hero.stat1": "AI Projects",
    "hero.stat2": "Years of experience",
    "hero.stat3": "Geographic coverage",
    "hero.scroll": "Explore",
    "tech.label": "Technologies & platforms",
    "services.badge": "What we do",
    "services.title": "AI services for every stage of your business",
    "services.subtitle": "From the first consultation to production model deployment, we cover the full spectrum of applied Artificial Intelligence.",
    "services.basicTitle": "Essential Services",
    "services.advancedTitle": "Advanced Services",
    "services.s1.title": "AI Strategic Consulting",
    "services.s1.desc": "We evaluate your business and design a realistic AI adoption roadmap, with clear ROI and prioritisation of high-impact use cases.",
    "services.s2.title": "Chatbots & Virtual Assistants",
    "services.s2.desc": "Intelligent assistants that serve your customers 24/7, reduce support costs and improve user experience across any channel.",
    "services.s3.title": "Process Automation",
    "services.s3.desc": "We combine RPA with AI to automate repetitive workflows, free your team from manual tasks and eliminate operational errors.",
    "services.s4.title": "AI API Integration",
    "services.s4.desc": "We connect language models (GPT-4, Claude, Gemini) and other AI APIs to your existing systems securely and scalably.",
    "services.s5.title": "Custom ML Models",
    "services.s5.desc": "We design and train custom Machine Learning models for your sector — demand forecasting, fraud detection, customer scoring and more.",
    "services.s6.title": "Deep Learning",
    "services.s6.desc": "Computer vision, natural language processing (NLP) and deep neural networks applied to highly complex problems.",
    "services.s7.title": "Autonomous AI Agents",
    "services.s7.desc": "AI systems that reason, plan and execute complex tasks autonomously, integrating with your internal tools and data.",
    "services.s8.title": "MLOps & Production",
    "services.s8.desc": "We deploy, monitor and scale models in production with AI CI/CD pipelines, ensuring stability, speed and traceability.",
    "about.badge": "MSc. Machine Learning",
    "about.sectionBadge": "About Jesús Villamizar",
    "about.title": "AI Engineer with business vision",
    "about.p1": "I am an engineer with over 8 years of experience in software development and specialisation in Artificial Intelligence. I hold a Master's in Machine Learning and Deep Learning, and have worked on AI projects for companies in Spain and Europe.",
    "about.p2": "My approach combines the technical rigour of model development with real business understanding: I don't just deliver code, I deliver solutions that generate measurable and sustainable value.",
    "about.cred1.title": "Master's in ML & Deep Learning",
    "about.cred1.sub": "Specialisation in neural networks and generative models",
    "about.cred2.title": "Full Stack Engineer",
    "about.cred2.sub": "PHP, Python, Node.js, Docker, Kubernetes, AWS",
    "about.cred3.title": "Spain & Europe coverage",
    "about.cred3.sub": "Based in Madrid, working with international clients",
    "process.badge": "How we work",
    "process.title": "A clear process, no surprises",
    "process.subtitle": "Every project follows a proven methodology that guarantees quality deliveries, on time and with measurable results.",
    "process.s1.title": "Diagnosis & Discovery",
    "process.s1.desc": "We analyse your business, your data and your objectives. We identify the use cases with the greatest impact and least friction to start generating value quickly.",
    "process.s2.title": "Solution Design",
    "process.s2.desc": "We propose the technical architecture and project plan with clear milestones, detailed budget and success metrics agreed from the outset.",
    "process.s3.title": "Development & Iteration",
    "process.s3.desc": "We build the solution in short sprints with weekly demos. You have full visibility of progress and feedback at every stage.",
    "process.s4.title": "Deployment & Support",
    "process.s4.desc": "We take the solution to production, train your team and offer ongoing support to ensure the system improves over time.",
    "why.badge": "Why choose us",
    "why.title": "Why choose our Artificial Intelligence consultancy",
    "faq.badge": "Frequently asked questions",
    "faq.title": "Everything you need to know",
    "faq.q1": "How much does it cost to implement Artificial Intelligence in a company?",
    "faq.a1": "Our plans start from €990/month for a first chatbot or virtual assistant, and the Business plan with process automation is €2,490/month. Enterprise projects are custom-quoted based on scope.",
    "faq.q2": "How long does an AI project take to develop?",
    "faq.a2": "A basic chatbot can be operational in 2-4 weeks. Complex automation or custom ML model projects require between 2 and 4 months.",
    "faq.q3": "Do I need historical data to get started with Artificial Intelligence?",
    "faq.a3": "Not always. For LLM-based chatbots, your own historical data is not required. For predictive models, a minimum dataset is needed — which we evaluate free of charge in the initial diagnostic.",
    "faq.q4": "Do you work with companies outside Madrid?",
    "faq.a4": "Yes. Although we are based in Madrid, we work remotely with companies across Spain and Europe — France, Germany, Italy, Portugal and more.",
    "faq.q5": "What is the difference between a chatbot and an autonomous AI agent?",
    "faq.a5": "A chatbot responds to questions within a predefined flow. An autonomous AI agent reasons, plans and executes complex tasks independently — querying databases, calling APIs and making decisions without constant human intervention.",
    "why.w1.title": "High-Level Academic Training",
    "why.w1.desc": "Master's in Machine Learning and Deep Learning. Solid theoretical knowledge applied to real business problems.",
    "why.w2.title": "Measurable Results",
    "why.w2.desc": "Every project includes clear KPIs. We don't bill hours without direction — we commit to concrete, verifiable results.",
    "why.w3.title": "End-to-End Approach",
    "why.w3.desc": "From strategy to production deployment. A single technical point of contact with a complete view of the project.",
    "why.w4.title": "Technology Agnostic",
    "why.w4.desc": "We choose the best tool for each problem: OpenAI, Claude, open source models, TensorFlow or PyTorch. No vendor bias.",
    "why.w5.title": "Transparent Communication",
    "why.w5.desc": "Weekly reports, full code access at all times and regular meetings. You never lose control of your project.",
    "why.w6.title": "Speed Without Sacrificing Quality",
    "why.w6.desc": "Agile methodology with fast deliveries. First visible results in the first weeks of the project.",
    "pricing.badge": "Plans & Pricing",
    "pricing.title": "Transparency from day one",
    "pricing.subtitle": "Plans designed to support you at every stage. No fine print, no hidden costs.",
    "pricing.period": "/month",
    "pricing.popular": "Most popular",
    "pricing.cta": "Get started",
    "pricing.ctaEnterprise": "Request a proposal",
    "pricing.p1.name": "Starter",
    "pricing.p1.desc": "For businesses that want to explore the potential of AI with a first concrete project.",
    "pricing.p1.f1": "Strategic consulting (4h/month)",
    "pricing.p1.f2": "Basic chatbot or virtual assistant",
    "pricing.p1.f3": "Integration with 1 platform",
    "pricing.p1.f4": "Email support",
    "pricing.p1.f5": "Monthly results report",
    "pricing.p2.name": "Business",
    "pricing.p2.desc": "For businesses that want to automate processes and integrate AI at the core of their operations.",
    "pricing.p2.f1": "Everything in Starter",
    "pricing.p2.f2": "AI-powered process automation",
    "pricing.p2.f3": "Integration with multiple systems",
    "pricing.p2.f4": "Custom ML model (basic)",
    "pricing.p2.f5": "Weekly progress meeting",
    "pricing.p2.f6": "Priority support",
    "pricing.p3.name": "Enterprise",
    "pricing.p3.amount": "Custom",
    "pricing.p3.desc": "Deep Learning projects, advanced ML models, autonomous agents and enterprise-scale MLOps.",
    "pricing.p3.f1": "Everything in Business",
    "pricing.p3.f2": "Custom Deep Learning models",
    "pricing.p3.f3": "Autonomous AI agents",
    "pricing.p3.f4": "MLOps & production deployment",
    "pricing.p3.f5": "Dedicated project team",
    "pricing.p3.f6": "Guaranteed SLA & 24/7 support",
    "contact.badge": "Contact",
    "contact.title": "Ready to transform your business with AI?",
    "contact.subtitle": "Tell me about your project and within 24 hours I'll propose how we can work together.",
    "contact.location": "Madrid, Spain · Remote work available",
    "contact.form.name": "Name",
    "contact.form.namePh": "Your name",
    "contact.form.company": "Company",
    "contact.form.companyPh": "Your company",
    "contact.form.email": "Email",
    "contact.form.emailPh": "you@company.com",
    "contact.form.service": "Service of interest",
    "contact.form.servicePh": "Select a service",
    "contact.form.opt1": "AI Strategic Consulting",
    "contact.form.opt2": "Chatbots & Assistants",
    "contact.form.opt3": "Process Automation",
    "contact.form.opt4": "ML Models / Deep Learning",
    "contact.form.opt5": "Autonomous AI Agents",
    "contact.form.opt6": "MLOps & Production",
    "contact.form.opt7": "Other / Not sure yet",
    "contact.form.message": "Tell me about your project",
    "contact.form.messagePh": "Briefly describe your company, the problem you want to solve and any relevant details...",
    "contact.form.privacy": 'I accept the <a href="/privacidad" target="_blank">privacy policy</a>',
    "contact.form.submit": "Send message",
    "footer.tagline": "Custom Artificial Intelligence for ambitious businesses.",
    "footer.services": "Services",
    "footer.s1": "AI Consulting",
    "footer.s2": "Chatbots",
    "footer.s3": "Automation",
    "footer.s4": "Deep Learning",
    "footer.s5": "AI Agents",
    "footer.company": "Company",
    "footer.about": "About Jesús",
    "footer.process": "Process",
    "footer.pricing": "Pricing",
    "footer.contact": "Contact",
    "footer.legal": "Legal",
    "footer.privacy": "Privacy Policy",
    "footer.legalNotice": "Legal Notice",
    "footer.cookies": "Cookie Policy",
    "footer.rights": "All rights reserved",
    "footer.location": "Madrid, Spain",
    "form.success": "Message sent! I'll get back to you within 24 hours.",
    "form.error": "There was an error sending your message. Please try again.",
    "form.validName": "Please enter your name.",
    "form.validEmail": "Please enter a valid email address.",
    "form.validMessage": "Please describe your project.",
    "form.validPrivacy": "You must accept the privacy policy."
  }
};

/* ─── State ──────────────────────────────────────────────────── */
let currentLang = localStorage.getItem('jv_lang') || 'es';

/* ─── Apply Translations ─────────────────────────────────────── */
function applyTranslations(lang) {
  const dict = T[lang];
  document.documentElement.setAttribute('data-lang', lang);
  document.documentElement.setAttribute('lang', lang);

  // title & meta
  document.title = dict['meta.title'];
  const metaDesc = document.querySelector('meta[name="description"]');
  if (metaDesc) metaDesc.setAttribute('content', dict['meta.description']);

  // text nodes
  document.querySelectorAll('[data-i18n]').forEach(el => {
    const key = el.getAttribute('data-i18n');
    const val = dict[key];
    if (val !== undefined) {
      if (val.includes('<')) {
        el.innerHTML = val;
      } else {
        el.textContent = val;
      }
    }
  });

  // placeholders
  document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
    const key = el.getAttribute('data-i18n-placeholder');
    if (dict[key] !== undefined) {
      el.setAttribute('placeholder', dict[key]);
    }
  });

  currentLang = lang;
  try { localStorage.setItem('jv_lang', lang); } catch (_) {}
}

/* ─── Language Toggle ────────────────────────────────────────── */
function initLangToggle() {
  const btn = document.getElementById('langToggle');
  if (!btn) return;
  btn.addEventListener('click', () => {
    applyTranslations(currentLang === 'es' ? 'en' : 'es');
  });
}

/* ─── Sticky Header ──────────────────────────────────────────── */
function initHeader() {
  const header = document.getElementById('header');
  if (!header) return;
  const onScroll = () => {
    header.classList.toggle('scrolled', window.scrollY > 40);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}

/* ─── Mobile Menu ────────────────────────────────────────────── */
function initMobileMenu() {
  const burger = document.getElementById('navBurger');
  const links  = document.getElementById('navLinks');
  const header = document.getElementById('header');
  if (!burger || !links) return;

  // Sync --header-h with real header height (backdrop-filter on #header makes
  // position:fixed children relative to it, so we use a body-level portal instead)
  function syncHeaderHeight() {
    const h = header ? header.offsetHeight : 72;
    document.documentElement.style.setProperty('--header-h', h + 'px');
  }
  syncHeaderHeight();

  // Build portal as direct child of <body> to escape #header stacking context
  const portal = document.createElement('div');
  portal.className = 'mobile-nav';
  portal.setAttribute('aria-hidden', 'true');
  portal.setAttribute('role', 'navigation');
  portal.setAttribute('aria-label', 'Menú de navegación móvil');

  const ul = document.createElement('ul');
  ul.className = 'mobile-nav__list';
  links.querySelectorAll('li').forEach(li => ul.appendChild(li.cloneNode(true)));

  // Add CTA button at the bottom
  const cta = document.createElement('li');
  cta.innerHTML = '<a href="/contacto/" class="btn btn--gold mobile-nav__cta">Hablar con Jesús</a>';
  ul.appendChild(cta);

  portal.appendChild(ul);
  document.body.appendChild(portal);

  function closeMenu() {
    portal.classList.remove('open');
    portal.setAttribute('aria-hidden', 'true');
    burger.classList.remove('open');
    burger.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  burger.setAttribute('aria-expanded', 'false');

  burger.addEventListener('click', () => {
    const open = portal.classList.toggle('open');
    portal.setAttribute('aria-hidden', String(!open));
    burger.classList.toggle('open', open);
    burger.setAttribute('aria-expanded', String(open));
    document.body.style.overflow = open ? 'hidden' : '';
    if (open) {
      syncHeaderHeight();
      portal.querySelector('a')?.focus();
    }
  });

  // Close on any link click inside portal
  portal.querySelectorAll('a').forEach(a => a.addEventListener('click', closeMenu));

  // Close clicking the overlay background
  portal.addEventListener('click', e => { if (e.target === portal) closeMenu(); });

  // Close on Escape
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && portal.classList.contains('open')) {
      closeMenu();
      burger.focus();
    }
  });

  // Close and unlock body when resizing to desktop
  window.addEventListener('resize', () => {
    syncHeaderHeight();
    if (window.innerWidth > 900 && portal.classList.contains('open')) closeMenu();
  });
}

/* ─── Scroll Reveal ──────────────────────────────────────────── */
function initScrollReveal() {
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.reveal').forEach((el, i) => {
    el.style.transitionDelay = `${(i % 4) * 0.1}s`;
    observer.observe(el);
  });
}

/* ─── Smooth Scroll ──────────────────────────────────────────── */
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
      const target = document.querySelector(anchor.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      const offset = 80;
      const top = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top, behavior: 'smooth' });
    });
  });
}

/* ─── Contact Form ───────────────────────────────────────────── */
function initContactForm() {
  const form = document.getElementById('contactForm');
  const msg  = document.getElementById('formMsg');
  if (!form || !msg) return;

  form.addEventListener('submit', async e => {
    e.preventDefault();
    const dict = T[currentLang];

    // Validate
    const name    = form.name.value.trim();
    const email   = form.email.value.trim();
    const message = form.message.value.trim();
    const privacy = form.privacy.checked;

    if (!name)    { showMsg(msg, dict['form.validName'], 'error'); return; }
    if (!email || !isValidEmail(email)) { showMsg(msg, dict['form.validEmail'], 'error'); return; }
    if (!message) { showMsg(msg, dict['form.validMessage'], 'error'); return; }
    if (!privacy) { showMsg(msg, dict['form.validPrivacy'], 'error'); return; }

    const btn = form.querySelector('[type="submit"]');
    btn.disabled = true;
    btn.style.opacity = '.6';

    try {
      const data = new FormData(form);
      data.append('lang', currentLang);
      const res = await fetch('/php/contact.php', { method: 'POST', body: data });
      const json = await res.json();
      if (json.ok) {
        showMsg(msg, dict['form.success'], 'success');
        form.reset();
      } else {
        showMsg(msg, dict['form.error'], 'error');
      }
    } catch {
      showMsg(msg, dict['form.error'], 'error');
    } finally {
      btn.disabled = false;
      btn.style.opacity = '1';
    }
  });
}

function showMsg(el, text, type) {
  el.textContent = text;
  el.className = 'form-msg ' + type;
  setTimeout(() => { el.className = 'form-msg'; el.textContent = ''; }, 6000);
}

function isValidEmail(v) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
}

/* ─── Year ───────────────────────────────────────────────────── */
function setYear() {
  const el = document.getElementById('year');
  if (el) el.textContent = new Date().getFullYear();
}

/* ─── Active Nav Link ────────────────────────────────────────── */
function initActiveNav() {
  const sections = document.querySelectorAll('section[id]');
  const links    = document.querySelectorAll('.nav__link');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        links.forEach(l => l.classList.remove('active'));
        const link = document.querySelector(`.nav__link[href="#${entry.target.id}"]`);
        if (link) link.classList.add('active');
      }
    });
  }, { threshold: 0.4 });
  sections.forEach(s => observer.observe(s));
}

/* ─── Chat Page Actions ──────────────────────────────────────── */
function executeActions(actions) {
  const sectionMap = {
    scroll_contact:  '#contacto',
    scroll_services: '#servicios',
    scroll_pricing:  '#precios',
  };

  actions.forEach(action => {
    const selector = sectionMap[action];
    if (!selector) return;

    const target = document.querySelector(selector);
    if (!target) return;

    // Smooth scroll to section
    target.scrollIntoView({ behavior: 'smooth', block: 'start' });

    // Pulse highlight on the target section
    target.classList.add('chat-action-highlight');
    setTimeout(() => target.classList.remove('chat-action-highlight'), 2000);
  });
}

/* ─── Chat Widget ────────────────────────────────────────────── */
const CHAT_STORAGE_KEY = 'jv_chat_history';
const CHAT_MAX_STORED  = 20; // máximo de mensajes a persistir

function renderBotMarkdown(raw) {
  const s = raw
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;');
  return s
    .replace(/\*\*(.+?)\*\*/gs, '<strong>$1</strong>')
    .replace(/\*([^*\n]+)\*/g,  '<em>$1</em>')
    .replace(/`([^`\n]+)`/g,    '<code style="background:rgba(255,255,255,.1);padding:1px 5px;border-radius:3px;font-size:.9em">$1</code>')
    .replace(/\n/g, '<br>');
}

function saveChatHistory(hist) {
  try {
    localStorage.setItem(CHAT_STORAGE_KEY, JSON.stringify(hist.slice(-CHAT_MAX_STORED)));
  } catch (e) { console.warn('Chat storage error:', e); }
}

function loadChatHistory() {
  try {
    return JSON.parse(localStorage.getItem(CHAT_STORAGE_KEY) || '[]');
  } catch (e) { console.warn('Chat storage error:', e); return []; }
}

function clearChatHistory() {
  try { localStorage.removeItem(CHAT_STORAGE_KEY); } catch (e) { console.warn('Chat storage error:', e); }
}

function initChatbot() {
  const widget   = document.getElementById('chat-widget');
  const toggle   = document.getElementById('chat-toggle');
  const window_  = document.getElementById('chat-window');
  const messages = document.getElementById('chat-messages');
  const form     = document.getElementById('chat-form');
  const input    = document.getElementById('chat-input');
  const sendBtn  = form.querySelector('.chat-send');
  const clearBtn = document.getElementById('chat-clear');
  if (!widget) return;

  const greetings = {
    es: '¡Hola! Soy el asistente de Jesús Villamizar. ¿En qué puedo ayudarte hoy? Puedo contarte sobre nuestros servicios de IA, precios o resolver cualquier duda.',
    en: 'Hi! I\'m the assistant for Jesús Villamizar\'s AI Agency. How can I help you today? I can tell you about our AI services, pricing, or answer any questions you have.',
  };

  let history    = loadChatHistory();
  let isOpen     = false;
  let isThinking = false;

  // Paint saved messages on load
  function restoreHistory() {
    history.forEach(turn => {
      const role = turn.role === 'user' ? 'user' : 'bot';
      const div = document.createElement('div');
      div.className = `chat-msg chat-msg--${role}`;
      if (role === 'bot') {
        div.innerHTML = renderBotMarkdown(turn.content);
      } else {
        div.textContent = turn.content;
      }
      messages.appendChild(div);
    });
    if (history.length) messages.scrollTop = messages.scrollHeight;
  }

  // Update greeting based on language
  function syncGreeting() {
    const el = messages.querySelector('[data-chat-greeting]');
    if (el) el.textContent = greetings[currentLang] || greetings.es;
  }

  // Append a message bubble
  function addMessage(text, role) {
    const div = document.createElement('div');
    div.className = `chat-msg chat-msg--${role}`;
    if (role === 'bot') {
      div.innerHTML = renderBotMarkdown(text);
    } else {
      div.textContent = text;
    }
    messages.appendChild(div);
    messages.scrollTop = messages.scrollHeight;
    return div;
  }

  // Show animated typing indicator
  function showTyping() {
    const div = document.createElement('div');
    div.className = 'chat-msg chat-msg--typing';
    div.id = 'chat-typing';
    div.innerHTML = '<span></span><span></span><span></span>';
    messages.appendChild(div);
    messages.scrollTop = messages.scrollHeight;
  }

  function hideTyping() {
    const el = document.getElementById('chat-typing');
    if (el) el.remove();
  }

  // Send message to backend
  async function sendMessage(text) {
    if (isThinking || !text.trim()) return;
    isThinking = true;
    sendBtn.disabled = true;

    addMessage(text, 'user');
    // Snapshot context BEFORE adding current message to avoid duplicating it in the API call
    const contextHistory = history.slice(-14);
    history.push({ role: 'user', content: text });
    saveChatHistory(history);

    showTyping();

    const controller = new AbortController();
    const timeoutId  = setTimeout(() => controller.abort(), 30000);

    try {
      const res = await fetch('/php/chat.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message: text, history: contextHistory }),
        signal: controller.signal,
      });
      clearTimeout(timeoutId);

      const data = await res.json();
      hideTyping();

      if (data.reply) {
        addMessage(data.reply, 'bot');
        history.push({ role: 'assistant', content: data.reply });
        saveChatHistory(history);
        if (data.actions && data.actions.length) {
          setTimeout(() => executeActions(data.actions), 600);
        }
      } else {
        const errMsg = currentLang === 'en'
          ? 'Sorry, something went wrong. Please try again.'
          : 'Lo siento, ocurrió un error. Por favor intenta de nuevo.';
        addMessage(errMsg, 'bot');
      }
    } catch (err) {
      clearTimeout(timeoutId);
      hideTyping();
      const isTimeout = err.name === 'AbortError';
      const errMsg = currentLang === 'en'
        ? (isTimeout ? 'The request took too long. Please try again.' : 'Connection error. Please try again.')
        : (isTimeout ? 'La respuesta tardó demasiado. Por favor intenta de nuevo.' : 'Error de conexión. Por favor intenta de nuevo.');
      addMessage(errMsg, 'bot');
    } finally {
      isThinking = false;
      sendBtn.disabled = false;
      input.focus();
    }
  }

  // Restore history on init
  restoreHistory();

  // Pulse CTA animation — stops on first click
  toggle.classList.add('is-pulsing');

  // Periodic attention effect: jump + bubble every 12s, first trigger at 8s
  const bubble = document.createElement('div');
  bubble.className = 'chat-bubble';
  bubble.textContent = '¿Hablamos? 💬';
  widget.appendChild(bubble);

  let attentionTimer  = null;
  let attentionDelay  = null;

  function triggerAttention() {
    if (isOpen) return;
    bubble.classList.add('is-visible');
    toggle.classList.add('is-jumping');
    setTimeout(() => toggle.classList.remove('is-jumping'), 750);
    setTimeout(() => bubble.classList.remove('is-visible'), 3800);
  }

  attentionDelay = setTimeout(() => {
    triggerAttention();
    attentionTimer = setInterval(triggerAttention, 12000);
  }, 8000);

  // Toggle open/close
  toggle.addEventListener('click', () => {
    clearTimeout(attentionDelay);
    clearInterval(attentionTimer);
    bubble.classList.remove('is-visible');
    toggle.classList.remove('is-pulsing', 'is-jumping');

    isOpen = !isOpen;
    widget.classList.toggle('is-open', isOpen);
    window_.setAttribute('aria-hidden', String(!isOpen));
    if (isOpen) {
      syncGreeting();
      input.focus();
    }
  });

  // Clear history button
  if (clearBtn) {
    clearBtn.addEventListener('click', () => {
      history = [];
      clearChatHistory();
      messages.innerHTML = `<div class="chat-msg chat-msg--bot"><p data-chat-greeting="${currentLang}">${greetings[currentLang]}</p></div>`;
    });
  }

  // Form submit
  form.addEventListener('submit', e => {
    e.preventDefault();
    const text = input.value.trim();
    if (!text) return;
    input.value = '';
    sendMessage(text);
  });

  // Sync greeting when language changes
  const origApply = applyTranslations;
  window._chatLangObserver = () => syncGreeting();
}

/* ─── Init ───────────────────────────────────────────────────── */
function initCookieBanner() {
  if (localStorage.getItem('jv_cookie_consent')) return;

  const banner = document.createElement('div');
  banner.id = 'cookie-banner';
  banner.setAttribute('role', 'dialog');
  banner.setAttribute('aria-label', 'Aviso de cookies');
  banner.innerHTML = `
    <div class="cookie-banner__inner">
      <div class="cookie-banner__text">
        <strong>🍪 Usamos cookies</strong>
        <p>Utilizamos cookies técnicas para el funcionamiento del sitio y cookies analíticas para mejorar tu experiencia. Puedes aceptar todas o elegir solo las esenciales. <a href="/cookies" target="_blank">Más info</a></p>
      </div>
      <div class="cookie-banner__actions">
        <button id="cookieReject" class="cookie-btn cookie-btn--outline">Solo esenciales</button>
        <button id="cookieAccept" class="cookie-btn cookie-btn--gold">Aceptar todas</button>
      </div>
    </div>
  `;
  document.body.appendChild(banner);

  requestAnimationFrame(() => banner.classList.add('cookie-banner--visible'));

  function loadGA() {
    if (window._gaLoaded) return;
    window._gaLoaded = true;
    var s = document.createElement('script');
    s.async = true;
    s.src = 'https://www.googletagmanager.com/gtag/js?id=G-YV53NHGT2T';
    document.head.appendChild(s);
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    window.gtag = gtag;
    gtag('js', new Date());
    gtag('config', 'G-YV53NHGT2T');
  }

  function setConsent(value) {
    localStorage.setItem('jv_cookie_consent', value);
    if (value === 'all') loadGA();
    banner.classList.remove('cookie-banner--visible');
    setTimeout(() => banner.remove(), 400);
  }

  document.getElementById('cookieAccept').addEventListener('click', () => setConsent('all'));
  document.getElementById('cookieReject').addEventListener('click', () => setConsent('essential'));
}

document.addEventListener('DOMContentLoaded', () => {
  requestAnimationFrame(() => applyTranslations(currentLang));
  initLangToggle();
  initHeader();
  initMobileMenu();
  initScrollReveal();
  initSmoothScroll();
  initContactForm();
  initActiveNav();
  setYear();
  initChatbot();
  initCookieBanner();
});
