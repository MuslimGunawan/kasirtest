# Panduan Kode Visual SmartKasir (Persiapan Ujian / Presentasi Dosen)

Panduan ini dibuat khusus untuk mempermudah Anda menjelaskan letak file kodingan, kutipan kode (*snippets*), dan bagaimana melakukan perubahan (seperti teks, warna, dan data) pada halaman depan (**Home**) jika ditanya oleh dosen saat presentasi.

---

## 🎨 1. Kunci Utama Warna & Tema (CSS Variables)

Semua warna ungu neon, gradasi, efek blur (glassmorphism), dan latar belakang gelap pada website diatur terpusat di satu file CSS utama:
* **Lokasi File:** [global-overrides.css](file:///c:/laragon/www/Kasirryukyuy/public/assets/css/global-overrides.css)

### Kutipan Kode Penting:
```css
:root {
    --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); /* Warna Gradasi Ungu/Indigo */
    --secondary-gradient: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%); /* Warna Gradasi Biru */
    --dark-bg: #0b0b0f; /* Warna Background Hitam/Gelap */
    --card-bg: rgba(20, 20, 28, 0.45); /* Warna Background Transparan Card (Efek Glassmorphism) */
    --border-color: rgba(255, 255, 255, 0.06); /* Warna Garis Batas Halus */
}
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Jika ingin mengganti warna tema website (misal dari ungu ke hijau), kita cukup mengubah nilai HEX pada `--primary-gradient` di baris 3 pada file `global-overrides.css` ini, maka seluruh tombol dan elemen bertema ungu di web akan otomatis berubah secara instan."*

---

## 🚀 2. Hero Section (Screenshot 1)

Bagian paling atas yang berisi judul utama, sub-judul, tombol "Mulai Sekarang", dan lencana bintang.
* **Lokasi File:** [home.blade.php](file:///c:/laragon/www/Kasirryukyuy/resources/views/home.blade.php) (Mulai dari Baris 201)

### Kutipan Kode Penting:
```html
<section class="hero-section">
    ...
    <span class="badge badge-custom rounded-pill mb-4"><i class="fas fa-star me-2"></i>Sistem Kasir 3D #1 di Indonesia</span>
    <h1 class="hero-title">Revolusi Transaksi Digital Bisnis Anda</h1>
    <p class="lead text-secondary mb-5 fs-5">Tingkatkan efisiensi operasional dengan sistem kasir...</p>
    
    <div class="d-flex gap-3 flex-wrap">
        <!-- Jika sudah login, tombol mengarah ke Dashboard. Jika belum, mengarah ke Login -->
        @if(session('admin'))
            <a href="{{ route('dashboard') }}" class="btn btn-primary-glow px-4 py-3 rounded-pill fw-bold">Buka Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary-glow px-4 py-3 rounded-pill fw-bold">Mulai Sekarang</a>
        @endif
        <a href="{{ route('fitur') }}" class="btn btn-outline-light rounded-pill px-4 py-3">Pelajari Fitur</a>
    </div>
    ...
</section>
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Teks judul diubah pada baris 207 `h1.hero-title`. Kondisi `@if(session('admin'))` digunakan untuk mendeteksi apakah user sudah masuk ke sistem atau belum. Jika sudah masuk, tombol akan bertuliskan 'Buka Dashboard' dan mengarah langsung ke halaman admin, jika belum akan bertuliskan 'Mulai Sekarang' dan mengarah ke form login."*

---

## 💳 3. Kartu Statistik & Mockup Ringkasan (Screenshot 2)

Bagian kanan layar yang menampilkan replika kartu toko, jumlah omset, target penjualan, dan metrik stok.
* **Lokasi File:** [home.blade.php](file:///c:/laragon/www/Kasirryukyuy/resources/views/home.blade.php) (Mulai dari Baris 220)

### Kutipan Kode Penting (Replika Kartu Toko):
```html
<div class="mock-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Nama toko dimuat secara dinamis dari database -->
        <span class="fw-bold fs-5"><i class="fas fa-store me-2"></i>{{ $toko->nama_toko }}</span>
        <i class="fas fa-microchip fs-3 text-warning"></i>
    </div>
    <div class="fs-6 fw-bold tracking-widest mb-4"><i class="fas fa-phone-alt me-1"></i> {{ $toko->tlp }}</div>
    <div class="d-flex justify-content-between text-sm opacity-75">
        <div>
            <div style="font-size: 0.7rem;">PEMILIK TOKO</div>
            <div class="fw-semibold">{{ $toko->nama_pemilik }}</div>
        </div>
        <div class="text-end">
            <div style="font-size: 0.7rem;">TOTAL TRANSAKSI</div>
            <div class="fw-semibold">{{ number_format($totalTransactions) }}</div>
        </div>
    </div>
</div>
```

### Kutipan Kode Penting (Metrik Stok & Omset):
```html
<div class="fs-3 fw-bold text-white mb-4">Rp {{ number_format($totalSales, 0, ',', '.') }}</div>
...
<div class="fw-bold text-white">Stok Terpantau</div>
<div class="text-muted" style="font-size: 0.75rem;">
    @if($lowStock > 0)
        {{ $lowStock }} Produk Stok Menipis (<= 50)
    @else
        Semua Stok Aman
    @endif
</div>
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Data kartu dan ringkasan omset di atas bersifat **real-time (tidak hardcode)**. Data diambil dari controller menggunakan sintaks blade double curly braces seperti `{{ $toko->nama_toko }}` untuk nama toko, `{{ number_format($totalSales) }}` untuk total nominal penjualan, dan kondisi logika `@if($lowStock > 0)` untuk memantau apakah ada barang yang hampir habis di dalam gudang."*

---

## ⚡ 4. Bagian Keunggulan / Fitur (Screenshot 3)

Bagian tiga kolom kartu keunggulan seperti "Transaksi Kilat 3D", "Manajemen Stok Cerdas", dan "Laporan Analitik".
* **Lokasi File:** [home.blade.php](file:///c:/laragon/www/Kasirryukyuy/resources/views/home.blade.php) (Mulai dari Baris 307)

### Kutipan Kode Penting:
```html
<section class="section-padding" style="background: #08080c; ...">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge badge-custom rounded-pill mb-2">KEUNGGULAN</span>
            <h2 class="section-title">Fitur Masa Depan</h2>
            <p class="text-secondary">Semua yang Anda butuhkan untuk mengelola bisnis...</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card-glow tilt-3d">
                    <div class="icon-container"><i class="fas fa-bolt"></i></div>
                    <h4 class="fw-bold text-white mb-3">Transaksi Kilat 3D</h4>
                    <p class="text-secondary">Proses checkout super cepat...</p>
                </div>
            </div>
            ...
        </div>
    </div>
</section>
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Layout tiga kolom dibentuk menggunakan sistem grid Bootstrap (`col-md-4` yang berarti 12 dibagi 3 kolom). Animasi slide saat di-scroll diatur oleh atribut `data-aos=\"fade-up\"` dari pustaka JavaScript AOS (Animate on Scroll)."*

---

## 🌐 5. Footer Proyek (Screenshot 4)

Bagian paling bawah halaman yang berisi profil ringkas toko, daftar menu navigasi cepat, bantuan, dan ikon media sosial.
* **Lokasi File:** [site.blade.php](file:///c:/laragon/www/Kasirryukyuy/resources/views/layouts/site.blade.php) (Mulai dari Baris 108)

### Kutipan Kode Penting:
```html
<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h4 class="fw-bold text-primary mb-3"><i class="fas fa-cash-register me-2"></i>SmartKasir</h4>
                <p class="text-white-50">Solusi kasir modern untuk bisnis masa depan...</p>
            </div>
            ...
            <div class="col-lg-3">
                <h5 class="fw-bold mb-3">Sosial Media</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center rounded-circle" 
                       style="width: 40px; height: 40px; transition: all 0.3s;" 
                       onmouseover="this.style.background='#a855f7'" 
                       onmouseout="this.style.background='rgba(108,117,125,0.25)'">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    ...
                </div>
            </div>
        </div>
        ...
    </div>
</footer>
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Footer dibungkus di dalam file layout bersama `site.blade.php` agar tampil konsisten di semua halaman publik (seperti halaman Fitur, Tentang, dan Kontak). Ikon media sosial menggunakan pustaka FontAwesome (seperti `fab fa-facebook-f`). Efek perubahan warna ungu saat kursor diarahkan ke ikon sosmed diatur menggunakan event handler inline JavaScript `onmouseover` dan `onmouseout` pada baris 134-136."*

---

## 💾 6. Dari Mana Data Tersebut Berasal? (Controller Logic)

Semua data statistik real-time yang ada pada screenshot dikirim langsung dari database melalui Controller Laravel sebelum halaman HTML ditampilkan.
* **Lokasi File:** [SiteController.php](file:///c:/laragon/www/Kasirryukyuy/app/Http/Controllers/SiteController.php) (Mulai dari Baris 24)

### Kutipan Kode Penting:
```php
public function home()
{
    // Mengambil data pengaturan toko pertama dari database
    $toko = DB::table('toko')->first();
    
    // Menghitung total penjualan sukses (nota)
    $totalSales = DB::table('nota')->sum('total');
    
    // Menghitung total seluruh transaksi (berapa kali nota diinput)
    $totalTransactions = DB::table('nota')->distinct('tanggal_input')->count('tanggal_input');
    
    // Menghitung barang dengan stok menipis (di bawah atau sama dengan 50 unit)
    $lowStock = DB::table('barang')->whereRaw('CAST(stok AS SIGNED) <= 50')->count();

    // Mengirimkan variabel ke file view home.blade.php
    return view('home', compact('toko', 'totalSales', 'totalTransactions', 'lowStock'));
}
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Halaman utama memanggil fungsi `home()` pada `SiteController.php`. Fungsi ini melakukan query database menggunakan query builder Laravel `DB::table()` untuk menghitung total penjualan, menghitung transaksi, dan mencari stok kritis, lalu hasilnya dikirimkan ke file `home.blade.php` lewat fungsi `compact()`."*
