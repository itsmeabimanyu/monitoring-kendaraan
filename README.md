# Monitoring Kendaraan

This is the PHP 8.2 version of the project https://github.com/gilangmaulana1405/monitoring-kendaraan-fln

## Description

This repository contains the source code that has been adjusted to run on PHP version 8.2.
This project uses Laravel as the main framework (if Laravel is indeed used) and supports modern features of PHP 8.2.

## Installation
### 1. Install Laravel Sanctum
If Sanctum is not installed yet, install it via Composer:

```bash
composer require laravel/sanctum
```
Then publish the Sanctum config file and migration:

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

### 2. Install Laravel Reverb

```bash
composer require laravel/reverb
php artisan reverb:install
```
### 3. Edit .env:

```bash
SESSION_DRIVER=file
```

### 4. Creating Required Tables
Create the **cache** Table

```bash
php artisan cache:table
```

Create **Session** Table

```bash
php artisan session:table
```

Create **Jobs** Table

```bash
php artisan queue:table
php artisan migrate
```

### 5. Clear Cache and Config Cache

```bash
php artisan config:clear
php artisan cache:clear
```

```bash
php artisan migrate:fresh --seed
```

Run the Server
```bash
php artisan serve
php artisan queue:work
php artisan reverb:start
```