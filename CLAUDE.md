# Agencia — Contexto del proyecto

## Stack
- PHP (XAMPP local)
- CSS, JS vanilla
- Assets: SVG, imágenes

## Estructura
```
Agencia/
├── assets/img/perfilfoto.jpg
├── assets/logo.svg
├── css/style.css
├── js/main.js
├── php/chat.php
├── php/contact.php
├── index.php
├── .htaccess
├── .env.example
└── .gitignore
```

## Estado del repositorio Git
- Repositorio inicializado y conectado a GitHub
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

## .gitignore configurado para ignorar
- `vendor/`, `node_modules/`
- `.env`, `.env.local`, `config.local.php`
- `logs/`, `cache/`, `tmp/`, `uploads/`
- Archivos de editor: `.vscode/`, `.idea/`, `.DS_Store`, `Thumbs.db`
