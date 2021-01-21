<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Cara install laravel di local

-   Jalankan perintah `git clone https://github.com/berthojoris/k-lab.git` harusnya akan muncul folder `k-lab`
-   Setelah clone project berhasil, jalankan composer install dengan ketik perintah `composer install`
-   Setelah composer install berhasil, jalankan perintah `npm install` atau `yarn install`
-   Setelah npm install selesai, copy file .env.example dengan perintah `copy .env.example .env` atau jika perinta `copy` tidak ada, jalankan perintah `cp .env.example .env`
-   Seletah selesai, edit file `.env` [bukan file .env.example] , agar sesuai dengan laravel project. Misalnya `APP_URL` , `DB_DATABASE` , `DB_USERNAME` , `DB_PASSWORD` , dll
-   Seletah itu jalankan `php artisan key:generate` untuk generate random key di project
-   Setelah itu jalan perintah `php artisan migrate --seed` untuk menggenarate tabel dan dummy data
-   Setelah itu coba akses websitenya, jika tidak ada kendala pasti sudah sesuai dengan keiinginan

## Routing

Untuk route pakai resource. Baca disini https://laravel.com/docs/8.x/controllers#resource-controllers

Contoh define route di file `web.php`

```php
Route::resource('test', 'TestController', [
    'names' => [
        'index' => 'action_index',
        'create' => 'action_create',
        'store' => 'action_store',
        'show' => 'action_show',
        'edit' => 'action_edit',
        'update' => 'action_update',
        'destroy' => 'action_destroy',
    ]
]);
```

Generatenya pakai `php artisan make:controller TestController --resource`

## Request Validation

Untuk request validation pakai class terpisah. Baca disini https://laravel.com/docs/8.x/validation#form-request-validation

Contohnya sudah ada di project, ikutin aja caranya

## Data

Untuk tabel yg ada butuh `created_by` dan `updated_by` bisa menggunakan helper `genUuid()` buat uuid dan `myUserId()` untuk ambil current id yg login

## Error ketika migration

Tutup dulu / Remark codingan Observer di file `PoldaObserver` di bagian

```php
public function creating(Polda $polda)
{
    $polda->uuid = genUuid();
    $polda->created_by = myUserId();
    $polda->updated_by = myUserId();
}
```

dan

```php
public function updating(Polda $polda)
{
    $polda->updated_by = myUserId();
}
```

Tapi setelah itu di buka lagi codingannya
