<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## How to install and run laravel on local computer

-   Jalankan perintah `git clone https://github.com/berthojoris/k-lab.git` harusnya akan muncul folder `k-lab`
-   Setelah clone project berhasil, jalankan composer install dengan ketik perintah `composer install`
-   Setelah composer install berhasil, jalankan perintah `npm install` atau `yarn install`
-   Setelah npm install selesai, copy file .env.example dengan perintah `copy .env.example .env` atau jika perinta `copy` tidak ada, jalankan perintah `cp .env.example .env`
-   Seletah selesai, edit file `.env` [bukan file .env.example] , agar sesuai dengan laravel project. Misalnya `APP_URL` , `DB_DATABASE` , `DB_USERNAME` , `DB_PASSWORD` , dll
-   Seletah itu jalankan `php artisan key:generate` untuk generate random key di project
-   Setelah itu jalan perintah `php artisan migrate --seed` untuk menggenarate tabel dan dummy data
-   Setelah itu coba akses websitenya, jika tidak ada kendala pasti sudah sesuai dengan keiinginan

## Routing

Untuk route pakai resource. Baca disini [Laravel Resource Controller](https://laravel.com/docs/8.x/controllers#resource-controllers)

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

Untuk request validation pakai class terpisah. Baca disini [Larevel Request Validation](https://laravel.com/docs/8.x/validation#creating-form-requests)

Contohnya sudah ada di project, ikutin aja caranya

## Data

Untuk tabel yg ada butuh `created_by` dan `updated_by` bisa menggunakan helper `genUuid()` buat uuid dan `myUserId()` untuk ambil current id yg login

## Error when migration?

Tutup dulu / Remark codingan Observer di file `PoldaObserver.php` di bagian

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

## How to use datatable

-   Setiap halaman yg menggunakan datatable **harus** dibuat 1 file `.js` dan di taroh di `resources\js\app\nama_file.js`
-   Misalnya halaman yang mau dibuat adalah halaman profile, yang akan diakses http://domain.com/profile , maka harus dibuat file `profile.js` untuk kebutuhan jika di halaman profile membutuhkan list datatable
-   Setelah itu tambahkan/daftarkan filenya di file `webpack.mix.js`. Contohin yang sudah ada
-   Cara penambahan list seperti ini

```js
mix.js("resources/js/app.js", "public/js")
    .js("resources/js/app/category.js", "public/js")
    .js("resources/js/app/article.js", "public/js")
    .js("resources/js/app/polda.js", "public/js")
    .sass("resources/sass/app.scss", "public/css");
```

Mau ditambah file baru berarti jadi

```js
mix.js("resources/js/app.js", "public/js")
    .js("resources/js/app/category.js", "public/js")
    .js("resources/js/app/article.js", "public/js")
    .js("resources/js/app/polda.js", "public/js")
    .js("resources/js/app/file_baru_disini.js", "public/js")
    .sass("resources/sass/app.scss", "public/css");
```

Setelah itu run `npm run watch` atau `yarn run watch`
Kemudian bikin file js-nya contoh `file_baru_disini.js` diatas

Pastikan jika ingin menambahkan file js baru, matikan dulu `npm run watch` atau `yarn run watch` dengan perintah `ctrl+c`

## How to provide JSON DATA for datatable

-   Tambah route untuk API di file `web.php`
-   Edit bagian `Route::group(['prefix' => 'data']`
-   Call api dengan method `GET` (Liat contoh di file web.php)
-   Contoh yang sekarang seperti ini

```php
Route::group(['prefix' => 'data'], function () {
    Route::get('/contoh', 'ContohController@data')->name('contoh_data');
});
```

Jadi routenya akan seperti ini jika diakses http://domain.com/data/contoh

## Relational in Model

-   Untuk model (database) relasi ini coba baca dokumentasi di [Eloquent Relationship](https://laravel.com/docs/8.x/eloquent-relationships)
-   Untuk query relasi tabel, pakai fungsi `with` di modelnya. Liat contoh di project file-file controllernya di bagian `public function data()`
-   Sebelum menggunakan fungsi `with`, harus dibuatkan dulu fungsi relasinya di file modelnya. Contohnya gini

```php
public function user()
{
    return $this->belongsTo(User::class, 'created_by', 'id');
}
```

Dibaca aja dokumentasinya
