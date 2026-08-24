# Science of Sport Laravel Micro-Platform - Assessment Notes

## English

### Project Summary

This project is a Laravel micro-platform for managing and displaying tournament/event posts based on the Science of Sport Golf Classic Tournament 2025 assessment prompt.

Current implementation focuses on the backend and Laravel architecture requirements:

- Laravel web application with Blade views
- SQLite local database
- Laravel Breeze session authentication
- Role-based access using `admin` and `user`
- Eloquent model for tournament posts
- Form Request validation
- Service class for business/data orchestration
- Policy-based authorization
- Public listing and detail pages for published posts
- Admin-only create, edit, delete, and draft visibility

### Demo Credentials

Admin:

```text
Email: admin@example.com
Password: password
```

Standard user:

```text
Email: user@example.com
Password: password
```

### Role Permissions

Guest:

- Can view the public tournament posts index.
- Can view published tournament post details.
- Cannot access create or edit screens.

Standard user:

- Can log in.
- Can view published tournament posts.
- Cannot see create, edit, or delete controls.
- Receives authorization denial when attempting admin-only actions.

Admin:

- Can view all posts, including drafts.
- Can create tournament posts.
- Can edit tournament posts.
- Can delete tournament posts.

### Main Laravel Files

- Routes: `routes/web.php`
- Controller: `app/Http/Controllers/TournamentPostController.php`
- Service: `app/Services/TournamentPostService.php`
- Policy: `app/Policies/TournamentPostPolicy.php`
- Store request: `app/Http/Requests/StoreTournamentPostRequest.php`
- Update request: `app/Http/Requests/UpdateTournamentPostRequest.php`
- Model: `app/Models/TournamentPost.php`
- User model/roles: `app/Models/User.php`
- Main seeder: `database/seeders/DatabaseSeeder.php`
- Tournament post seeder: `database/seeders/TournamentPostSeeder.php`
- Public/admin views: `resources/views/tournament-posts`

### Local Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm run dev
php artisan serve
```

When using Laravel Herd, the app can be accessed locally through:

```text
http://science-sport-assessment.test
```

### Current Status

Completed:

- Authentication
- Roles
- Eloquent model and migration
- Seeded demo users and seeded tournament posts
- Thin controller structure
- Form Request validation
- Service class
- Policy authorization
- Public and protected routes
- Basic Blade views for listing, detail, create, edit, and delete flows

Pending or recommended next improvements:

- AJAX search or pagination enhancement
- Final visual design based on the Golf Classic theme
- More polished public landing page
- Production deployment configuration
- Optional tests for roles and CRUD authorization

### Deployment Note

Netlify is not the best deployment target for this Laravel application because this project requires a PHP runtime, Laravel routing, sessions, authentication, and database access at request time.

Netlify can run PHP during build time, but it does not host a traditional PHP/Laravel runtime in the same way as a PHP-capable application host. A better deployment target for this assessment is Render, Railway, Fly.io, DigitalOcean App Platform, a VPS, or another PHP/Laravel-capable host.

---

## Español

### Resumen Del Proyecto

Este proyecto es una micro-plataforma Laravel para administrar y mostrar posts/entradas de torneo basadas en el assessment de Science of Sport Golf Classic Tournament 2025.

La implementación actual se enfoca en los requisitos de backend y arquitectura Laravel:

- Aplicación web Laravel con Blade
- Base de datos local SQLite
- Autenticación de sesión con Laravel Breeze
- Roles `admin` y `user`
- Modelo Eloquent para tournament posts
- Validación con Form Requests
- Service class para lógica de negocio y persistencia
- Autorización con Policy
- Listado público y detalle público de posts publicados
- Funciones de crear, editar, borrar y ver drafts solo para admin

### Credenciales Demo

Admin:

```text
Email: admin@example.com
Password: password
```

Usuario estándar:

```text
Email: user@example.com
Password: password
```

### Permisos Por Rol

Guest:

- Puede ver el listado público de tournament posts.
- Puede ver el detalle de posts publicados.
- No puede entrar a pantallas de crear o editar.

Usuario estándar:

- Puede iniciar sesión.
- Puede ver posts publicados.
- No ve controles de crear, editar o borrar.
- Recibe rechazo de autorización si intenta acciones de admin.

Admin:

- Puede ver todos los posts, incluyendo drafts.
- Puede crear tournament posts.
- Puede editar tournament posts.
- Puede borrar tournament posts.

### Archivos Principales De Laravel

- Rutas: `routes/web.php`
- Controller: `app/Http/Controllers/TournamentPostController.php`
- Service: `app/Services/TournamentPostService.php`
- Policy: `app/Policies/TournamentPostPolicy.php`
- Store request: `app/Http/Requests/StoreTournamentPostRequest.php`
- Update request: `app/Http/Requests/UpdateTournamentPostRequest.php`
- Modelo: `app/Models/TournamentPost.php`
- Modelo User/roles: `app/Models/User.php`
- Seeder principal: `database/seeders/DatabaseSeeder.php`
- Seeder de posts: `database/seeders/TournamentPostSeeder.php`
- Vistas públicas/admin: `resources/views/tournament-posts`

### Setup Local

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm run dev
php artisan serve
```

Usando Laravel Herd, la app puede abrirse localmente en:

```text
http://science-sport-assessment.test
```

### Estado Actual

Completado:

- Autenticación
- Roles
- Modelo y migración Eloquent
- Usuarios demo y posts demo con seeders
- Controller delgado
- Validación con Form Requests
- Service class
- Autorización con Policy
- Rutas públicas y protegidas
- Vistas Blade básicas para listar, ver detalle, crear, editar y borrar

Pendiente o recomendado como siguientes mejoras:

- Búsqueda o paginación con AJAX
- Diseño visual final basado en el tema Golf Classic
- Landing pública más pulida
- Configuración de deploy productivo
- Tests opcionales de roles y autorización CRUD

### Nota De Deploy

Netlify no es el mejor destino para desplegar esta aplicación Laravel porque el proyecto requiere runtime PHP, rutas Laravel, sesiones, autenticación y acceso a base de datos durante cada request.

Netlify puede usar PHP durante el proceso de build, pero no hospeda una aplicación PHP/Laravel tradicional como runtime persistente. Para este assessment conviene usar Render, Railway, Fly.io, DigitalOcean App Platform, un VPS u otro hosting compatible con PHP/Laravel.
