# Monitoring Kendaraan

Ini adalah versi PHP 8.2 dari proyek https://github.com/gilangmaulana1405/monitoring-kendaraan-fln

## Deskripsi

Repositori ini berisi source code yang telah disesuaikan untuk berjalan di PHP versi 8.2.  
Proyek ini menggunakan Laravel sebagai framework utama (jika memang menggunakan Laravel), dan mendukung fitur-fitur modern dari PHP 8.2.

## Instalasi
### Install Laravel Sanctum
If Sanctum is not installed yet, install it via Composer:

```bash
composer require laravel/sanctum
```
Then publish the Sanctum config file and migration:

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```
Edit your .env:

```bash
SESSION_DRIVER=file
```
Then clear config cache just in case:

```bash
php artisan config:cache
```

Setelah mengatur koneksi database di file .env, jalankan:

```bash
php artisan migrate --seed
```
Ini akan membuat semua tabel dan mengisi data awal secara otomatis.

Menjalankan Server
```bash
php artisan serve
```
