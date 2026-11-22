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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).




# Center & Space Booking Management System

A Laravel-based management system for centers, rentable spaces, employees, and customer bookings. The project provides a **web dashboard** for authorized staff and a **REST API** for customers.

## Main Features

- **Super Admin:** manages employees, centers, and spaces; reviews and manages bookings.
- **Employee:** manages centers, spaces, and bookings through the web dashboard, subject to role permissions.
- **Customer:** registers and logs in through the API, explores available centers and spaces, and creates or manages bookings through supported endpoints.
- Booking statuses include **pending**, **confirmed**, **cancelled**, and **rejected**.

## Technologies

| Technology | Purpose |
| --- | --- |
| Laravel 12 | Backend, web routes, and REST API |
| PHP (8.2.12) | Laravel runtime |
| MySQL | Database |
| Laravel Sanctum | Customer API authentication |
| Blade and Bootstrap 5 | Staff web interface |
| Composer | PHP dependency management |
| Postman | API testing |

> **Version note:** Laravel 12 requires PHP 8.2 or later. For an exact record of the development environment, replace the PHP and MySQL version descriptions above with the output of `php -v` and `mysql --version` on the project computer. You can check the Laravel version with `php artisan --version`.

## Requirements

- PHP 8.2.12 or later with the extensions required by Laravel
- Composer
- MySQL server (for example, via XAMPP or a standalone MySQL installation)
- Git (to clone the project)
- Postman (to test the customer API)

## Installation and Setup

### 1. Clone the project

```bash
git clone <YOUR_GITHUB_REPOSITORY_URL>
cd <YOUR_PROJECT_FOLDER>
```

Alternatively, download the repository as a ZIP file and extract it.

### 2. Install dependencies

```bash
composer install
```

### 3. Configure the environment

Copy `.env.example` to `.env`.

**Windows PowerShell:**

```powershell
Copy-Item .env.example .env
```

**Command Prompt:**

```bat
copy .env.example .env
```

Then generate the application key:

```bash
php artisan key:generate
```

### 4. Create the MySQL database

Start your MySQL server. Create an empty database using phpMyAdmin or MySQL, for example:

```sql
CREATE DATABASE center_space_booking;
```

Update the database settings in the local `.env` file according to your MySQL installation:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=center_space_booking
DB_USERNAME=root
DB_PASSWORD=
```

`DB_USERNAME` and `DB_PASSWORD` are examples only. Use the actual credentials configured on your computer.

### 5. Create the tables and initial administrator

Run the migrations:

```bash
php artisan migrate
```

**The initial seeder must be executed before using the staff dashboard**, because this project requires an initial **Super Admin** account. Run the project's configured seeders:

```bash
php artisan db:seed
```

> Check `database/seeders/DatabaseSeeder.php` to confirm that it calls the Super Admin seeder. If the administrator seeder is not registered there, run the relevant seeder directly using `php artisan db:seed --class=YourAdminSeederClass` (replace the class name with the actual one).
>
> The Super Admin sign-in credentials depend on the project's seeder configuration. Use the test credentials defined for your submission; do not publish real passwords or secrets in this README.

### 6. Start Laravel

```bash
php artisan serve
```

The application will normally run at:

`http://127.0.0.1:8000`

Open the staff login page through the login route configured in the application (for example, `/login` if that is the active route).

## Web Dashboard and User Roles

1. **Super Admin:** the initial account is created by the seeder. Log in with that account to access the dashboard and create employees.
2. **Employee:** employee accounts are created **by the Super Admin** from the staff dashboard; employees then sign in through the web login page.
3. **Customer:** customer accounts are created via the **API registration endpoint**, not from the staff dashboard. Customers use API authentication and do not have access to the staff web dashboard.

Staff-only routes are protected by authentication and role middleware.

## Testing the Customer API with Postman

1. Start Laravel using `php artisan serve`.
2. Open Postman and **Import** the supplied Postman Collection JSON file.
3. Set the collection's base URL to `http://127.0.0.1:8000` if the collection uses a base URL variable.
4. Use the **customer registration** request in the collection to create a customer account.
5. Use the **customer login** request to obtain an authentication token.
6. For protected customer endpoints, include the token in the request header:

```http
Authorization: Bearer <CUSTOMER_ACCESS_TOKEN>
Accept: application/json
```

7. Test the remaining supported endpoints for centers, spaces, and bookings using the collection examples.

**Note:** The exact API URLs, request bodies, and sample responses are provided in the exported Postman Collection. You can inspect the routes implemented in the project with:

```bash
php artisan route:list --path=api
```

## Notes

- The web dashboard uses session-based Laravel authentication, while the customer API uses Laravel Sanctum tokens.
- Do **not** commit the `.env` file, real database passwords, or production API tokens to GitHub.
- The initial Super Admin must exist before employees can be created through the dashboard.
- Run `php artisan migrate` on a fresh database; do not use `migrate:fresh` on a database containing important data because it drops tables.

## Submission Files

- Laravel project source code and database setup (migrations and seeders; database export if required by the instructor)
- GitHub repository URL
- This `README.md`
- Exported Postman Collection containing implemented API endpoints with request and response examples
