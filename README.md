# Meaningful Math

## Installation

Run the commands:

```shell
composer install
php artisan migrate
```

## Admin user creation

Create a new admin user with a password:

```shell
php artisan tinker
```

```php
$user = \App\Models\User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => bcrypt('yourpassword'),
]);
```