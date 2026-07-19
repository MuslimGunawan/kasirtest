# Panduan Kode Visual SmartKasir (Persiapan Ujian / Presentasi Dosen)

Panduan ini dibuat khusus untuk mempermudah Anda menjelaskan letak file kodingan, kutipan kode (*snippets*), dan bagaimana melakukan perubahan (seperti teks, warna, dan data) pada seluruh aplikasi jika ditanya oleh dosen saat presentasi.

---

## 🎨 1. Kunci Utama Warna & Tema (CSS Variables)
* **Lokasi File:** `public\assets\css\global-overrides.css`

### Kutipan Kode Penting:
```css
:root {
    --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); /* Gradasi Ungu Utama */
    --secondary-gradient: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%); /* Gradasi Biru */
    --dark-bg: #0b0b0f; /* Latar Belakang Gelap */
    --card-bg: rgba(20, 20, 28, 0.45); /* Background Efek Blur Transparan (Glassmorphism) */
    --border-color: rgba(255, 255, 255, 0.06); /* Border tipis neon */
}
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Semua warna di web ini diatur menggunakan CSS Variables di file `public\assets\css\global-overrides.css`. Jika ingin mengganti warna tema, kita tinggal merubah kode HEX pada variabel `--primary-gradient` (ungu) atau `--secondary-gradient` (biru) di bagian teratas (:root) file ini."*

---

## 🚀 2. Halaman Utama / Home (Screenshot 1, 2, & 3)

### A. Judul & Tombol Hero
* **Lokasi File:** `resources\views\home.blade.php` (Baris 201-217)

```html
<h1 class="hero-title">Revolusi Transaksi Digital Bisnis Anda</h1>
<p class="lead text-secondary mb-5 fs-5">Tingkatkan efisiensi operasional dengan sistem kasir...</p>
<div class="d-flex gap-3 flex-wrap">
    @if(session('admin'))
        <a href="{{ route('dashboard') }}" class="btn btn-primary-glow px-4 py-3 rounded-pill fw-bold">Buka Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="btn btn-primary-glow px-4 py-3 rounded-pill fw-bold">Mulai Sekarang</a>
    @endif
</div>
```

---

### B. Kartu Informasi Toko (Screenshot 2)
* **Lokasi File:** `resources\views\home.blade.php` (Baris 227-243)

```html
<div class="mock-card">
    <span class="fw-bold fs-5"><i class="fas fa-store me-2"></i>{{ $toko->nama_toko }}</span>
    <div class="fs-6 fw-bold tracking-widest mb-4">{{ $toko->tlp }}</div>
    <div class="fw-semibold">{{ $toko->nama_pemilik }}</div>
    <div class="fw-semibold">{{ number_format($totalTransactions) }}</div>
</div>
```

---

### C. Kolom Fitur Keunggulan (Screenshot 3)
* **Lokasi File:** `resources\views\home.blade.php` (Baris 307-344)

```html
<div class="row g-4">
    <div class="col-md-4">
        <div class="feature-card-glow tilt-3d">
            <h4 class="fw-bold text-white mb-3">Transaksi Kilat 3D</h4>
            <p class="text-secondary">Proses checkout super cepat...</p>
        </div>
    </div>
</div>
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Layout diatur menggunakan sistem grid Bootstrap (`col-md-4` membagi 12 kolom menjadi 3 bagian). Animasi scroll diatur oleh properti `data-aos=\"fade-up\"` dari modul JavaScript AOS."*

---

## 🌐 3. Halaman Footer Publik (Screenshot 4)
* **Lokasi File:** `resources\views\layouts\site.blade.php` (Baris 108-145)

```html
<footer class="bg-dark text-white py-5">
    <h4 class="fw-bold text-primary mb-3">SmartKasir</h4>
    <!-- Ikon Sosial Media dengan transisi warna hover lewat inline JS -->
    <a href="#" class="text-white bg-secondary bg-opacity-25" 
       onmouseover="this.style.background='#a855f7'" 
       onmouseout="this.style.background='rgba(108,117,125,0.25)'">
        <i class="fab fa-facebook-f"></i>
    </a>
</footer>
```

---

## 🔒 4. Halaman Login & Proses Autentikasi
* **Lokasi Tampilan (View):** `resources\views\login.blade.php`
* **Lokasi Logika Proses (Controller):** `app\Http\Controllers\SiteController.php` (Baris 89-117)

```php
public function authenticate(Request $request)
{
    $request->validate([
        'user' => 'required',
        'pass' => 'required',
    ]);

    $user = trim($request->input('user'));
    $pass = trim($request->input('pass'));

    // Autentikasi mencocokkan user dan hash MD5 password dengan tabel member & login
    $member = DB::table('member')
        ->join('login', 'member.id_member', '=', 'login.id_member')
        ->where('login.user', $user)
        ->where('login.pass', md5($pass))
        ->select('member.*', 'login.user')
        ->first();

    if ($member && (int) $member->status === 1) {
        Session::put('admin', (array) $member);
        Session::put('role', $member->role);
        return redirect()->route('dashboard');
    }

    Session::flash('error', 'Username atau password salah.');
    return redirect()->back();
}
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Proses login dikontrol oleh fungsi `authenticate()` di file `app\Http\Controllers\SiteController.php`. Fungsi ini mencocokkan username dan meng-hash input password dengan MD5 sebelum dicocokkan ke database. Jika sukses, data member akan disimpan ke dalam Session Laravel (`Session::put()`)."*

---

## 📊 5. Dasbor Utama Admin Panel
* **Lokasi File Dispatcing Page:** `resources\views\dashboard.blade.php`
* **Lokasi File View Dasbor:** `resources\views\admin\home.blade.php`
* **Lokasi Data Logika Controller:** `app\Http\Controllers\SiteController.php` (Baris 119-256)

```php
public function dashboard(Request $request)
{
    if (!Session::has('admin')) {
        return redirect()->route('login');
    }
    
    $page = $request->query('page');
    // Fetch data stats global
    $data['jml_barang'] = DB::table('barang')->count();
    $data['stok'] = (int) DB::table('barang')->sum('stok');
    $data['jual'] = (int) DB::table('nota')->sum('jumlah');
    $data['jml_kategori'] = DB::table('kategori')->count();
    
    return view('dashboard', $data);
}
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Untuk membatasi akses admin panel dari tamu yang belum login, kami menggunakan pemeriksaan Session `Session::has('admin')` pada baris pertama fungsi `dashboard()`. Jika tidak memiliki sesi login, user secara otomatis akan dilempar/di-redirect kembali ke halaman login."*

---

## 💾 6. Konfigurasi Database & Kompatibilitas Legacy Code
Untuk memastikan fungsionalitas Laravel dan file-file PHP Native lama (seperti cetak nota, export excel, proses hapus/tambah) berjalan beriringan menggunakan database yang sama:

* **File Kredensial Database Laravel:** `.env`
* **File Konfigurasi Database Laravel:** `config\database.php`
* **File Koneksi Database PHP Native:** `public\config\database.php`

### Kutipan File `public\config\database.php`:
```php
<?php
$host    = '127.0.0.1';
$user    = 'root';
$pass    = '';
$dbname  = 'kasirdb1';

try {
    $config = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
} catch(PDOException $e) {
    echo 'Koneksi gagal: ' . $e->getMessage();
}
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Agar aplikasi Laravel 11 tetap kompatibel dengan skrip PHP lama (seperti script cetak nota `print.php` dan ekspor excel `excel.php`), kami menduplikasi konfigurasi database PDO di dalam `public\config\database.php` sehingga kedua sistem (Laravel & PHP Native) menggunakan satu database MySQL terpusat (`kasirdb1`)."*
