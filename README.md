# Tech Solutions - Project Manager

Este proyecto implementa un sistema de gestión de proyectos utilizando Laravel, desarrollado para la empresa Tech Solutions.

## Características

- Gestión de proyectos (CRUD completo)
- Visualización de listado de proyectos
- Detalles de cada proyecto
- Componente reutilizable de valor UF (Unidad de Fomento)
- Interfaz de usuario amigable usando Bootstrap

## Requisitos

- PHP 8.1 o superior
- Composer
- MySQL/MariaDB
- Extensiones PHP: PDO, BCMath, Ctype, JSON, Mbstring, OpenSSL, PDO_MySQL, Tokenizer, XML

## Instalación

1. Clonar el repositorio:
```
git clone [url-del-repositorio]
```

2. Instalar dependencias:
```
cd projectmanager
composer install
```

3. Configurar entorno:
```
cp .env.example .env
php artisan key:generate
```

4. Configurar base de datos en el archivo .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tech_solutions_projects
DB_USERNAME=[su-usuario]
DB_PASSWORD=[su-contraseña]
```

5. Crear la base de datos:
```
mysql -u [su-usuario] -p
CREATE DATABASE tech_solutions_projects;
exit;
```

6. Ejecutar migraciones y seeders:
```
php artisan migrate --seed
```

7. Ejecutar el servidor de desarrollo:
```
php artisan serve
```

8. Visitar [http://127.0.0.1:8000](http://127.0.0.1:8000) en el navegador.

## Estructura del Proyecto

- **Modelos**: `app/Models/Project.php`
- **Controladores**: `app/Http/Controllers/ProjectController.php`, `app/Http/Controllers/UFController.php`
- **Vistas**: `resources/views/projects/`
- **Rutas**: `routes/web.php`
- **Migraciones**: `database/migrations/`
- **Seeders**: `database/seeders/`

## Uso

- **Listar Proyectos**: Página principal
- **Ver Detalles**: Click en "View" junto a cada proyecto
- **Crear Proyecto**: Click en "Add New Project"
- **Editar Proyecto**: Click en "Edit" junto a cada proyecto
- **Eliminar Proyecto**: Click en "Delete" junto a cada proyecto

## Componente UF

El componente de valor UF es reutilizable y se encuentra implementado en la parte superior derecha de todas las páginas. Obtiene el valor actualizado desde una API externa.

## Desarrollado por

Estudiantes de [Nombre del Instituto/Universidad]
- [Nombre del Estudiante 1]
- [Nombre del Estudiante 2]
- [Nombre del Estudiante 3]

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
