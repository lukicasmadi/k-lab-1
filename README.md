<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Cara install laravel di local

-   Jalankan perintah `git clone https://github.com/berthojoris/k-lab.git`
-   Setelah clone project berhasil, jalankan composer install dengan ketik perintah `composer install`
-   Setelah composer install berhasil, jalankan perintah `npm install` atau `yarn install`
-   Setelah npm install selesai, copy file .env.example dengan perintah `copy .env.example .env`
-   Seletah selesai, edit file `.env` [bukan file .env.example] , agar sesuai dengan laravel project. Misalnya `APP_URL` , `DB_DATABASE` , `DB_USERNAME` , `DB_PASSWORD` , dll
-   Seletah itu jalankan `php artisan key:generate` untuk generate random key di project
-   Setelah itu jalan perintah `php artisan migrate --seed` untuk menggenarate tabel dan dummy data
-   Setelah itu coba akses websitenya, jika tidak ada kendala pasti sudah sesuai dengan keiinginan
