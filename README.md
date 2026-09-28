# PHP REST Blog API

Laravel API for a blog domain, with user registration and token-based authentication through Laravel Sanctum.

## Available endpoints

Public:

- `POST /api/register`
- `POST /api/login`

Authenticated with a Sanctum token:

- `GET /api/user`
- `POST /api/logout`
- `GET /api/billets`
- `GET /api/billet/{billet}`
- `POST /api/commentaire`

## Run locally

```bash
composer install
cp .env.example .env
php artisan key:generate
# set your own DB_* values in .env
php artisan migrate --seed
php artisan serve
```

The application is then available through the URL reported by Laravel. Do not commit `.env` files or credentials.

## Scope

Academic API project intended to demonstrate Laravel routing, validation, Eloquent models and Sanctum authentication. It is not presented as a deployed production API.
