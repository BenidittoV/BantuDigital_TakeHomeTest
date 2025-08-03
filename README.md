# BantuDigital\_TakeHomeTest

BantuDigital Take-Home Test - Simple Article API

A. Deskripsi Proyek
API RESTful dibuat dengan Laravel untuk mengelola artikel sederhana dengan fitur CRUD dan autentikasi JWT. API ini dapat melakukan registrasi login, serta operasi membuat, membaca, memperbarui, dan menghapus artikel dengan validasi input dan penanganan error.



B. Fitur
CRUD Artikel: Membuat, membaca (daftar dan detail), memperbarui, menghapus artikel.
Autentikasi: Registrasi dan login pengguna dengan JWT.
Protected Endpoint: Operasi artikel hanya bisa diakses setelah login.
Validasi Input: Validasi standar untuk input dengan pesan error jelas.
Fitur Tambahan:`    - Paginasi (10 artikel per halaman) dan pencarian berdasarkan judul/isi.
- Relasi artikel dengan kategori.
- Dokumentasi API via Postman.



C. Persiapan dan Cara Menjalankannya

Tool dibutuhkan:
PHP
Composer
MySQL
Git
Postman



D. Langkah Instalasi:
Clone repositori:git clone https://github.com/nama-username/bantudigital\_takehometest.git
cd bantudigital\_takehometest

Install dependensi:composer install

Edit .env dengan kredensial database MySQL:DB\_CONNECTION=mysql
DB\_HOST=127.0.0.1
DB\_PORT=3307
DB\_DATABASE=bantudigital\_takehometest
DB\_USERNAME=root
DB\_PASSWORD=

Buat kunci aplikasi dengan menjalankan php artisan key:generate
Install dan konfigurasi JWT:composer require tymon/jwt-auth
php artisan vendor:publish --provider="Tymon\\JWTAuth\\Providers\\LaravelServiceProvider"
php artisan jwt:secret
Jalankan migrasi:php artisan migrate
Jalankan server:php artisan serve



E. Endpoint API

Metode
Endpoint
Deskripsi
Autentikasi Dibutuhkan



1. Registrasi pengguna baru
   Method              : POST
   Endpoint            :/api/register
   Butuh Autentikasi?  : Tidak
2. Login dan dapatkan token JWT
   Method              : POST
   Endpoint            :/api/login
   Butuh Autentikasi?  : Tidak
3. Daftar list artikel
   Method              : GET
   Endpoint            :/api/artikel
   Butuh Autentikasi?  : Ya
4. Detail artikel
   Method              : GET
   Endpoint            :/api/artikel/{id}
   Butuh Autentikasi?  : Ya
5. Membuat artikel baru
   Method              : POST
   Endpoint            :/api/artikel
   Butuh Autentikasi?  : Ya
6. Mengupdate artikel
   Method              : PUT
   Endpoint            :/api/artikel/{id}
   Butuh Autentikasi?  : Ya
7. Menghapus artikel
   Method              : DELETE
   Endpoint            :/api/artikel /{id}
   Butuh Autentikasi?  : Ya



F. Dokumentasi API dengan Postman

Download file API\_takehometest.postman\_collection.json dari folder docs di repositori.
Buka Postman, klik Import, pilih file tersebut.
Isi base\_url: http://localhost:8000/api
token: Kosongkan awalnya.



Jalankan request Register untuk membuat pengguna dummy, lalu Login untuk mendapatkan token JWT.
Token akan otomatis disimpan di variabel token untuk endpoint artikel.
Gunakan request di folder Artikel untuk mencoba CRUD.



G. Fitur Tambahan

Pencarian: Gunakan ?search=kata\_kunci pada /api/artikel untuk mencari berdasarkan judul atau isi.
Paginasi: Default 10 artikel per halaman, gunakan ?page=2 untuk navigasi.
Relasi Kategori: Artikel bisa dikaitkan dengan kategori (lihat model dan migrasi).
Dokumentasi: Koleksi Postman di docs/API\_takehometest.postman\_collection.json.

