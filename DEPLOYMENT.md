# Deployment ke InfinityFree

1. Upload seluruh isi folder proyek ke folder public_html (atau folder utama domain).
2. Pastikan file public/index.php tetap mengarah ke folder aplikasi Laravel.
3. Buat database MySQL di InfinityFree dan import file kasirdb1.sql.
4. Sesuaikan nilai DB_DATABASE, DB_USERNAME, dan DB_PASSWORD di .env.
5. Aktifkan mod_rewrite dan pastikan .htaccess di root dan public sudah ada.
6. Jalankan `php artisan key:generate` dan `php artisan config:clear` di server jika akses terminal tersedia.
