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

## 🚀 2. Halaman Utama / Home (Halaman Depan Publik)

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

### B. Kartu Informasi Toko
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

### C. Kolom Fitur Keunggulan
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

## 🌐 3. Halaman Footer Publik
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
> *"Proses login dikontrol oleh fungsi `authenticate()` di file `app\Http\Controllers\SiteController.php`. Sesi login disimpan di dalam Laravel Session menggunakan `Session::put()` jika status kasir dinyatakan Aktif (`status === 1`)."*

---

## 📊 5. Dasbor Utama Admin Panel (Dashboard Home)
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

---

## 📦 6. Modul Data Barang (Data Master)
* **Lokasi File View:** `resources\views\admin\barang.blade.php`
* **Lokasi Logika Controller:** `app\Http\Controllers\SiteController.php` (Baris 212-230)

### A. Summary Kalkulasi Total di Bagian Footer Tabel
```html
<tfoot>
    <tr class="fw-bold text-white">
        <td colspan="5" class="text-end">Total Summary:</td>
        <td>{{ number_format($totalStok) }}</td>
        <td>Rp {{ number_format($totalBeli, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($totalJual, 0, ',', '.') }}</td>
        <td colspan="2"></td>
    </tr>
</tfoot>
```

### B. Notifikasi Otomatis Stok Menipis (Kritis)
```html
@if((int)$isi->stok === 0)
    <span class="badge bg-danger rounded px-2">Habis</span>
@elseif((int)$isi->stok <= 3)
    <span class="badge bg-warning text-dark rounded px-2">{{ $isi->stok }} (Kritis)</span>
@else
    <span class="badge bg-secondary bg-opacity-20 text-white rounded px-2">{{ $isi->stok }}</span>
@endif
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Total akumulasi stok barang, modal beli, dan nilai jual dihitung otomatis menggunakan perulangan PHP loop di view `resources\views\admin\barang.blade.php`. Jika stok barang berada di bawah atau sama dengan 3, sistem secara otomatis memberikan lencana (badge) berwarna kuning 'Kritis' untuk memberi tahu kasir/manajer agar segera melakukan restok."*

---

## 🛒 7. Modul Kasir POS / Keranjang Penjualan (Halaman Transaksi)
* **Lokasi File View:** `resources\views\admin\jual.blade.php`
* **Lokasi Fungsi Tambah/Kurang/Checkout:** `public\fungsi\tambah\tambah.php` dan `public\fungsi\edit\edit.php`

### A. Pencarian Barang Instan Menggunakan AJAX
```javascript
$("#cari").keyup(function(){
    $.ajax({
        type: "POST",
        url: "fungsi/edit/edit.php?cari_barang=yes",
        data:'keyword='+$(this).val(),
        success: function(html){
            $("#hasil_cari").html(html);
        }
    });
});
```

### B. Transaksi Final & Pengurangan Stok Otomatis
```html
<form method="POST" action="/dashboard?page=jual&nota=yes#kasirnya">
    @csrf
    <!-- Pengurangan stok barang dilakukan saat checkout final nota -->
    ...
</form>
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Pencarian barang menggunakan AJAX keyup event. Setiap kali pengguna mengetik karakter di kolom pencarian, javascript mengirim kueri POST ke `fungsi/edit/edit.php?cari_barang=yes` secara asinkron (tanpa refresh halaman). Setelah kasir menginput nominal bayar dan meng-klik tombol Bayar, item dalam keranjang sementara (`penjualan`) dipindahkan ke tabel transaksi (`nota`) dan stok barang di tabel `barang` dikurangi secara otomatis."*

---

## 📅 8. Modul Laporan Penjualan (Harian & Bulanan)
* **Lokasi File View:** `resources\views\admin\laporan.blade.php`

### Kalkulasi Keuntungan Bersih (Profit Margin)
```php
@php
    $modal_bersih = $isi->harga_beli * $isi->jumlah;
    $keuntungan = $isi->total - $modal_bersih;
    
    $bayar += $isi->total;
    $jumlah += $isi->jumlah;
    $modal += $modal_bersih;
@endphp
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Keuntungan bersih dihitung dari akumulasi harga jual produk dikurangi harga modal beli produk dikalikan jumlah barang yang terjual. Kueri data laporan difilter berdasarkan parameter input bulan/tahun atau tanggal harian yang dikirim lewat formulir cari."*

---

## 👥 9. Modul Manajemen Kasir (Aktivasi Akun & Hapus)
* **Lokasi File View:** `resources\views\admin\kasir.blade.php`
* **Lokasi Aksi Controller:** `app\Http\Controllers\SiteController.php` (Baris 167-183)

```php
if ($request->has('activate') && $request->has('id')) {
    DB::table('member')->where('id_member', $request->query('id'))->update(['status' => 1]);
    return redirect()->route('dashboard', ['page' => 'kasir'])->with('success', 'Kasir berhasil diaktifkan.');
}
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Akun kasir yang baru didaftarkan tidak dapat langsung masuk ke sistem sebelum diaktifkan oleh Manajer. Manajer dapat mengaktifkan akun tersebut melalui tombol 'Aktifkan' yang mengirim parameter kueri ke `SiteController.php` untuk merubah kolom `status` menjadi `1` di tabel database `member`."*

---

## 🛠️ 10. Halaman Fitur / Keunggulan
* **Lokasi File View:** `resources\views\features.blade.php`
* **Lokasi Controller:** `app\Http\Controllers\SiteController.php` (Baris 43-46)

```html
@extends('layouts.site')
@section('title', 'Fitur - SmartKasir')
@section('content')
    <!-- Menampilkan rincian fitur-fitur masa depan secara detail -->
    ...
@endsection
```

---

## 👥 11. Halaman Tentang Kami (Tim Pengembang)
* **Lokasi File View:** `resources\views\about.blade.php`
* **Lokasi Controller:** `app\Http\Controllers\SiteController.php` (Baris 48-51)

### Kutipan Kode Penting (Mempertahankan Ukuran Gambar/Foto Tim Asli Tanpa Terpotong):
```css
.team-img-wrapper img { 
    width: 100%; 
    height: 100%; 
    object-fit: contain; /* Mempertahankan rasio gambar asli agar tidak terpotong (crop) */
    display: block;
    transition: transform 0.5s ease;
}
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Halaman Tentang Kami menampilkan profil mahasiswa tim pengembang dari Universitas Malikussaleh. Agar foto profil pengembang di kartu tim (`team-card`) tidak terpotong (crop) secara tidak rapi, kami mengatur gaya CSS `.team-img-wrapper img` menggunakan properti `object-fit: contain` di baris 25, sehingga rasio ukuran asli gambar tetap dipertahankan."*

---

## ✉️ 12. Halaman Hubungi Kami (Formulir Kontak)
* **Lokasi File View:** `resources\views\contact.blade.php`
* **Lokasi Controller (Kirim Pesan):** `app\Http\Controllers\SiteController.php` (Baris 68-82)

### A. Tag Form di View
```html
<form method="POST" action="{{ route('kirim-kontak') }}">
    @csrf
    <input type="text" name="nama" required>
    <input type="email" name="email" required>
    <input type="text" name="subjek" required>
    <textarea name="pesan" required></textarea>
    <button type="submit">Kirim Pesan</button>
</form>
```

### B. Proses Penyimpanan Data di Controller
```php
public function kirimKontak(Request $request)
{
    $data = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subjek' => 'required|string|max:255',
        'pesan' => 'required|string',
    ]);

    // Memasukkan pesan kontak langsung ke database
    DB::table('pesan_kontak')->insert($data);

    Session::flash('success', 'Pesan Anda berhasil dikirim.');
    return redirect()->route('kontak');
}
```

💡 **Cara Menjawab Pertanyaan Dosen:**
> *"Halaman Kontak menyediakan formulir 'Kirim Pesan'. Ketika tombol dikirim, kueri POST diarahkan ke fungsi `kirimKontak()` di `app\Http\Controllers\SiteController.php`. Data divalidasi terlebih dahulu sebelum dimasukkan langsung ke tabel database `pesan_kontak` menggunakan model Query Builder `DB::table()->insert()`."*

---

## 💾 13. Konfigurasi Database & Kompatibilitas Legacy Code
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
