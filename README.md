# SIMRS
Sistem Informasi Manajemen Rumah Sakit – Modul rawat inap

## Instalasi
Pastikan aplikasi Docker di komputer anda sudah berjalan.
### Konfigurasi Docker
Jika ini baru pertama kali:
1. Clone repository ini
2. Buka Terminal / CMD, kemudian `cd` ke dalam folder hasil clone repository
3. Jalankan perintah `docker-compose up`
4. Tunggu hingga Docker selesai download image container yang dibutuhkan

Jika sudah pernah melakukan langkah di atas sebelumnya:
1. Jalankan perintah `docker start simrs_web_1 simrs_app_1 simrs_database_1` di Terminal / CMD
### Konfigurasi MySQL
1. Jalankan aplikasi untuk mengakses database seperti SQLyog atau Navicat for MySQL / Navicat Premium
2. Buka koneksi ke `localhost:33061`
3. Buat database baru dengan nama `simrs`
### Konfigurasi Laravel
1. Buka Terminal / CMD, kemudian `cd` ke dalam folder source di dalam folder hasil clone repository
2. Jalankan `composer install`
3. Salin file `env.example` ke `env` menggunakan perintah `cp .env.example .env` di Terminal
4. Buka file `.env` menggunakan teks editor, kemudian ganti berikut ini:<br>
&nbsp;&nbsp;&nbsp; `DB_CONNECTION=mysql`<br>
&nbsp;&nbsp;&nbsp; `DB_HOST=127.0.0.1`<br>
&nbsp;&nbsp;&nbsp; `DB_PORT=33061`<br>
&nbsp;&nbsp;&nbsp; `DB_DATABASE=simrs`<br>
&nbsp;&nbsp;&nbsp; `DB_USERNAME=root`<br>
&nbsp;&nbsp;&nbsp; `DB_PASSWORD=secret`<br>
5. Jalankan perintah `php artisan key:generate`
6. Jalankan perintah `php artisan module:migrate`
7. Jalankan perintah `php artisan module:seed`

Jika langkah di atas sudah dilakukan semuanya, maka sistem dapat diakses pada url `localhost:8080` di browser
 ### Login
 - Username: id_user di tabel users
 - Pass: `pass`
 
 #### Jabatan
 - 1: Administrator Sistem
 - 2: Staff Administrasi
 - 3: Perawat
 - 4: Dokter
