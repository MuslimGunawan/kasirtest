# InfinityFree Deployment Checklist

## 1) Upload ke hosting
Unggah seluruh isi folder proyek ke folder public_html Anda, atau jika Anda ingin struktur lebih rapi, unggah isi folder berikut:
- app/
- bootstrap/
- config/
- database/
- public/
- resources/
- routes/
- storage/
- vendor/
- .env
- artisan
- composer.json
- composer.lock

## 2) Pastikan document root mengarah ke public
Di InfinityFree, document root sebaiknya menunjuk ke folder public. Jika Anda tidak bisa mengubah document root, gunakan file .htaccess di root untuk mengarahkan ke public.

## 3) Set database
Buka file .env dan ubah:
- DB_CONNECTION=mysql
- DB_HOST=localhost
- DB_DATABASE=nama_database_anda
- DB_USERNAME=nama_user_anda
- DB_PASSWORD=kata_sandi_anda

## 4) Jalankan perintah jika terminal tersedia
- php artisan key:generate
- php artisan config:clear

## 5) Jika error 500
Periksa:
- permission folder storage dan bootstrap/cache
- apakah vendor sudah terupload lengkap
- apakah .env benar
