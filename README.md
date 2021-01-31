<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## How to install and run laravel on local computer

-   Jalankan perintah `git clone https://github.com/berthojoris/k-lab.git` harusnya akan muncul folder `k-lab`
-   Setelah clone project berhasil, jalankan composer install dengan ketik perintah `composer install`
-   Setelah composer install berhasil, jalankan perintah `npm install` atau `yarn install`
-   Setelah npm install selesai, copy file .env.example dengan perintah `copy .env.example .env` atau jika perinta `copy` tidak ada, jalankan perintah `cp .env.example .env`
-   Seletah selesai, edit file `.env` [bukan file .env.example] , agar sesuai dengan laravel project. Misalnya `APP_URL` , `DB_DATABASE` , `DB_USERNAME` , `DB_PASSWORD` , dll
-   Seletah itu jalankan `php artisan key:generate` untuk generate random key di project
-   Setelah itu jalan perintah `php artisan migrate:fresh --seed` untuk menggenarate tabel dan dummy data
-   Setelah itu coba akses websitenya, jika tidak ada kendala pasti sudah sesuai dengan keinginan
-   Jika banyak perbedaan code dan mau melakukan reset branch tanpa peduli perubahan dan pull yg code terbaru, jalankan `git reset --hard origin/master`

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

## Model

-   Model mengharuskan menggunakan UUID sebagai key
-   Tiap model yang baru dibuat wajib ditambahkan `$guarded` dan di set ID. Contohnya seperti ini

```php
protected $guarded = ['id'];
```

-   Dan harus di tambahkan `getRouteKeyName()`. Contohnya seperti ini

```php
public function getRouteKeyName()
{
    return 'uuid';
}
```

Lihat contoh yang sudah ada di model

-   Setiap pencarian data menggunakan method `firstOrFail()`. Contohnya seperti ini

```php
$data = Polda::whereUuid($uuid)->firstOrFail();
```

## Request Validation

Untuk request validation pakai class terpisah. Baca disini [Larevel Request Validation](https://laravel.com/docs/8.x/validation#creating-form-requests)

Contohnya sudah ada di project, ikutin aja caranya

## Data

Untuk tabel yg ada butuh `created_by` dan `updated_by` bisa menggunakan helper `genUuid()` buat uuid dan `myUserId()` untuk ambil current id yg login

## Error when migration?

Tutup dulu / Remark codingan Observer di folder `app\Observers`. Semua file di folder itu dicek. Contoh salah satunya file `PoldaObserver.php` di bagian

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

Di tutup dulu, abis running migration, setelah itu di unmark/dibuka codingannya

Atau jika ada kebutuhan re-migrate database dan mulai dari awal dummy datanya, jalankan perintah `php artisan migrate:fresh --seed`

## Directive blade

-   Pelajari apa itu directive di blade template [Blade Directives](https://laravel.com/docs/8.x/blade#blade-directives)
-   Buat directive `@push('page_css')` untuk memasukan coding `css` dan directive `@push('page_js')` untuk code javascript
-   Ada 4 directive yg dibuat di project ini `@push('page_css')` , `@push('page_js')` , `@push('library_js')` , `@push('library_css')`
-   Keempat directive beda-beda peruntukannya untuk posisi code
-   Pelajari di salah satu file direktori `resources\views`

## How to use datatable

-   Setiap halaman yg menggunakan datatable **harus** dibuat codenya didalam `directive`
-   Daftarkan directive `@push('page_js')` untuk code datatablenya
-   Contoh yang sudah ada silahkan lihat di salah satu file `resources\views\nama_folder\index.blade.php`

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

Untuk penggunaannya seperti contoh

```php
public function data()
{
    $model = Article::with(['user' => function ($query) {
        $query->select('id', 'email', 'name');
    }, 'category']);

    return datatables()->eloquent($model)->toJson();
}
```

Code diatas akan mengambil data dari tabel `artikel` dan sekaligus relasi ke tabel `user` berdasarkan `user_id` di tabel artikel. Baca aja dokumentasinya

## Melakukan pull request di github

-   Lakukan `fork` project yang baru dari repository asli
-   Dari hasil fork ke repository pribadi, download project ke local computer dengan perintah `git clone link_repositorynya`
-   Install seperti biasa [Ikutin langkah-langkah di readme paling atas]
-   Jika sudah selesai, buat branch baru dengan nama terserah. Pastikan branch dibuat/checkout dari branch `master`
-   Coding sampai selesai, lakukan `commit`, lalu `push` ke repository dengan perintah `git push origin nama_branch_baru`
-   Kemudian lakukan `pull request` ke repository asli
-   Jika kesulitan ikutin tutorial ini : [Pull-Request di github](https://www.youtube.com/watch?v=6_UhNE5qVX4)

```

```
