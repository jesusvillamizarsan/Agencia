# Agencia — Contexto del proyecto

## Stack
- PHP (XAMPP local / Hostinger producción)
- CSS, JS vanilla
- Assets: SVG, imágenes, WebP

## Arquitectura multipágina
El sitio migró de one-page a arquitectura multipágina. Cada sección tiene su propio directorio con `index.php`.

### Includes compartidos
```
includes/
├── head.php      # <head> completo con meta, OG, JSON-LD, GA, CSS
├── nav.php       # <header><nav> con URLs absolutas
└── footer.php    # footer + chat widget + </body></html>
```
- Páginas a 1 nivel de profundidad: `require_once '../includes/head.php'`
- Páginas a 2 niveles: `require_once '../../includes/head.php'`
- Todos los assets usan rutas absolutas (`/assets/...`, `/css/style.css`, `/js/main.js`)

### Estructura de páginas
```
Agencia/
├── index.php                              # Home (landing con i18n ES/EN)
├── sobre-jesus/index.php                  # Perfil, schema Person, E-E-A-T
├── servicios/
│   ├── index.php                          # Hub de servicios
│   ├── consultoria-estrategica-ia/
│   ├── chatbots-asistentes-virtuales/
│   ├── automatizacion-procesos-ia/
│   ├── agentes-ia-autonomos/
│   ├── integracion-apis-ia/
│   ├── machine-learning/
│   ├── deep-learning/
│   ├── mlops/
│   └── agente-de-voz-ia/
├── contacto/index.php
├── agencia-ia-madrid/index.php            # Landing local, schema LocalBusiness
├── consultoria-ia-para-empresas/index.php # Pillar comercial, schema Service+FAQ
├── blog/
│   ├── index.php                          # Hub del blog
│   └── ia-con-kit-digital/index.php       # Artículo Kit Digital (hasta 12.000€)
├── admin/                                 # Panel admin (protegido)
├── php/
│   ├── chat.php                           # Backend chatbot (OpenAI GPT-4o-mini)
│   ├── contact.php                        # Formulario de contacto (SMTP)
│   ├── appointments.php                   # Lógica de citas (book, confirm, cancel, modify)
│   └── confirm.php                        # Confirmación de cita por token (email link)
├── 404.php                                # Página de error 404 personalizada
├── css/style.css
├── js/main.js                             # i18n, scroll, chat, formulario
├── .htaccess                              # HTTPS redirect, 404, DirectoryIndex, protege includes/
├── .env                                   # Credenciales (NO en git)
└── .env.example
```

## Entorno local (agencia.local)
El sitio funciona completo en local mediante Virtual Host de XAMPP:
- URL local: `http://agencia.local` (configurado en `httpd-vhosts.conf`)
- Todos los fetch y rutas absolutas funcionan igual que en producción
- HTTPS redirect desactivado en local (condicionado por HTTP_HOST en `.htaccess`)
- Cookie de sesión admin sin `Secure` en local (condicionado por `$_SERVER['HTTPS']`)
- `SITE_URL` en `appointments.php` es dinámico — local genera links a `http://agencia.local`, producción a `https://jesusvillamizar.com`
- La carpeta `data/` (availability.json, appointments.json) NO está en git — cada entorno tiene sus propios datos

## Chatbot (chat.php + main.js)
- Modelo: GPT-4o-mini (OpenAI)
- Historial: hasta 20 mensajes en localStorage; se envían los últimos 14 al backend como contexto (snapshot antes del mensaje actual para evitar duplicados)
- Markdown: los mensajes del bot renderizan `**bold**`, `*italic*`, `` `code` `` y saltos de línea
- Timeout: 30s en el fetch, con mensaje de error diferenciado si se supera
- Animación de atención: salto + burbuja "¿Hablamos? 💬" cada 12s (primer disparo a los 8s), se detiene al hacer clic
- System prompt: en inglés, responde en el idioma del usuario; check de disponibilidad obligatorio antes de book; confirma email antes de reservar

## Rutas de fetch en main.js
Los fetch usan rutas absolutas — funcionan en todas las páginas tanto en local como en producción:
- `/php/contact.php` (formulario)
- `/php/chat.php` (chat widget)

## SEO implementado
- Schema JSON-LD: Person, ProfessionalService, WebSite, FAQPage (home), Service + BreadcrumbList (servicios), LocalBusiness (madrid), Article + FAQPage (blog), Blog
- Canonical URLs apuntando a `https://jesusvillamizar.com/`
- Google Analytics G-YV53NHGT2T (solo si usuario acepta cookies)

## Estado del repositorio Git
- Repo remoto: https://github.com/jesusvillamizarsan/Agencia
- Rama principal: `master`

## Gestión de tickets con `tk`
Este proyecto usa `tk` (v0.4.2) para gestionar tareas. Los tickets se guardan en `.tickets/`.

### Workflow para agentes (Claude Code)
1. Antes de empezar una tarea: `tk ready` — ver tickets disponibles
2. Al tomar un ticket: `tk start <id>`
3. Durante el trabajo: `tk add-note <id> "progreso..."` — documentar avances
4. Al terminar: `tk close <id>`

### Comandos frecuentes
```
tk create "Título" -t bug|feature|task -p 0-4   # crear ticket (0=máxima prioridad)
tk list                                           # listar abiertos
tk show <id>                                      # ver detalle
tk start <id>                                     # marcar en progreso
tk close <id>                                     # cerrar
tk stats                                          # métricas del proyecto
tk search "texto"                                 # buscar
```

## Tickets pendientes
- `tic-9254` [P1] — SEO Fase 0: verificar conversiones GSC + activar Bing Webmaster Tools *(requiere acción manual en los paneles)*

## .gitignore configurado para ignorar
- `vendor/`, `node_modules/`
- `.env`, `.env.local`, `config.local.php`
- `logs/`, `cache/`, `tmp/`, `uploads/`
- Archivos de editor: `.vscode/`, `.idea/`, `.DS_Store`, `Thumbs.db`
