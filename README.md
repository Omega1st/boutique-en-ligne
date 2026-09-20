# Boutique Simple

Application conforme aux trois documents de conception fournis : SPA React, API REST Laravel, MySQL, authentification Sanctum, panier local, achats transactionnels et administration.

## Structure
- `frontend/` : React 19 + Vite, interface publique et administration responsive.
- `backend/` : Laravel 12, API `/api/v1`, migrations, modèles, contrôleurs, middleware, seeders et tests.

## Prérequis
- Node.js 20.19+ ou 22.12+
- PHP 8.2+, Composer, MySQL 8+

## Démarrage du front-end
```bash
cd frontend
cp .env.example .env
npm install
npm run dev
```
Le mode démonstration est activé par défaut (`VITE_DEMO_MODE=true`) et fonctionne sans API.

## Démarrage de l'API
Le dossier `backend` contient le code métier du projet. Pour obtenir les fichiers de framework Laravel non versionnés :
```bash
composer create-project laravel/laravel:^12.0 api-temp
cp -R backend/app backend/database backend/routes backend/tests backend/config api-temp/
cp backend/composer.json api-temp/composer.json
cd api-temp
composer install
php artisan install:api
cp .env.example .env
php artisan key:generate
```
Configurez MySQL dans `.env`, puis :
```bash
php artisan migrate --seed
php artisan serve
```
Dans `frontend/.env`, définissez `VITE_DEMO_MODE=false` et `VITE_API_URL=http://localhost:8000/api/v1`.

## Comptes de démonstration
- Administrateur : `admin@boutique.test` / `Admin123!`
- Client : `client@boutique.test` / `Client123!`

## Vérifications
```bash
cd frontend && npm run build
cd backend && php artisan test
```

## Sécurité
Les totaux et prix sont recalculés côté serveur. Les produits sont verrouillés dans une transaction. Les routes admin exigent `auth:sanctum` et le middleware `admin`. Les secrets restent dans `.env`.
