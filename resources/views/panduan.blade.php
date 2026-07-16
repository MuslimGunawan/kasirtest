@extends('layouts.site')

@section('title', 'Panduan - SmartKasir')

@section('content')
<style>
    .step-number { 
        width: 45px; 
        height: 45px; 
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); 
        color: white; 
        border-radius: 50%; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        font-weight: 800; 
        margin-bottom: 1.5rem; 
        font-size: 1.1rem;
        box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
    }
</style>

<header class="universal-header text-center">
    <div class="container" data-aos="fade-up">
        <h1 class="universal-title display-3 fw-bold mb-4">Panduan Penggunaan</h1>
        <p class="lead fs-5 text-secondary opacity-75">Cara mudah menggunakan SmartKasir</p>
    </div>
</header>

<section class="py-5 mb-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="premium-glass-card tilt-3d p-4 h-100">
                    <div class="step-number">1</div>
                    <h4 class="fw-bold text-white mb-3">Pendaftaran</h4>
                    <p class="text-secondary mb-0">Klik tombol Masuk lalu pilih Daftar. Isi formulir pendaftaran dengan data Anda yang lengkap.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="premium-glass-card tilt-3d p-4 h-100">
                    <div class="step-number">2</div>
                    <h4 class="fw-bold text-white mb-3">Login & Dashboard</h4>
                    <p class="text-secondary mb-0">Masuk dengan username dan password Anda, lalu Anda akan diarahkan ke dashboard utama aplikasi.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="premium-glass-card tilt-3d p-4 h-100">
                    <div class="step-number">3</div>
                    <h4 class="fw-bold text-white mb-3">Kelola Produk</h4>
                    <p class="text-secondary mb-0">Buka menu Barang untuk menambahkan produk baru, mengatur stok, dan menetapkan harga jual.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                <div class="premium-glass-card tilt-3d p-4 h-100">
                    <div class="step-number">4</div>
                    <h4 class="fw-bold text-white mb-3">Transaksi Penjualan</h4>
                    <p class="text-secondary mb-0">Gunakan menu Transaksi untuk mencatat penjualan. Cari produk, masukkan jumlah, lalu sistem akan menghitung total otomatis.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                <div class="premium-glass-card tilt-3d p-4 h-100">
                    <div class="step-number">5</div>
                    <h4 class="fw-bold text-white mb-3">Laporan</h4>
                    <p class="text-secondary mb-0">Pantau performa bisnis Anda melalui menu Laporan untuk melihat grafik penjualan dan keuntungan.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
