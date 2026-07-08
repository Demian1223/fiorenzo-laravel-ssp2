# Fiorenzo - Luxury Fashion E-Commerce Backend (Laravel)

Backend API and admin server for the Fiorenzo luxury fashion e-commerce platform, built with Laravel. Handles product catalog, user accounts, cart/checkout logic, and secure API access for the companion Flutter mobile app.

## Core Features
- Relational database design in MySQL — product catalog, account profiles, and categorization schemas
- RESTful API endpoints serving JSON payloads to the Flutter mobile app, tested with Postman
- Token-based authentication using Laravel Sanctum, with Jetstream and Fortify for account security flows
- Activity Diagram–modeled system logic for automated delivery date calculations, verification flags, and cart reset behavior
- Security hardening: manually tested against SQL Injection and Cross-Site Scripting (XSS) vulnerabilities

## Tech Stack
- **Framework:** Laravel (PHP)
- **Auth:** Laravel Sanctum, Jetstream, Fortify
- **Database:** MySQL
- **Frontend (admin/web views):** Blade, Tailwind CSS
- **API testing:** Postman

## Related Project
Paired with the [Fiorenzo Flutter mobile app](https://github.com/Demian1223/fiorenzo_flutter-MAD2), which consumes this API.

## Running Locally

**Prerequisites:** PHP, Composer, MySQL, Node.js

```bash
git clone https://github.com/Demian1223/fiorenzo-laravel-ssp2.git
cd fiorenzo-laravel-ssp2
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
php artisan serve
```

---
*Built as an individual coursework project (Server-Side Programming module).*
