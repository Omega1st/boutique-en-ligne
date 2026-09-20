# Enregistrement du middleware
Dans `bootstrap/app.php` d’un Laravel 12, ajoutez dans `withMiddleware` :
```php
$middleware->alias(['admin' => \App\Http\Middleware\EnsureAdmin::class]);
```
