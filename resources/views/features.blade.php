@extends('layouts.site')

@section('title', 'Fitur Unggulan - SmartKasir')

@section('content')
<style>
    .icon-wrapper { 
        width: 80px; 
        height: 80px; 
        background: rgba(99, 102, 241, 0.1); 
        border: 1px solid rgba(99, 102, 241, 0.2);
        border-radius: 50%; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        margin-bottom: 24px; 
        transition: all 0.3s; 
    }
    .premium-glass-card:hover .icon-wrapper { 
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); 
        color: white; 
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
    }
    .feature-icon { 
        font-size: 2.2rem; 
        color: #a855f7; 
        transition: all 0.3s; 
    }
    .premium-glass-card:hover .feature-icon { 
        color: white; 
    }
</style>

<header class="universal-header text-center">
    <div class="container" data-aos="fade-up">
        <h1 class="universal-title display-3 fw-bold mb-4">Fitur Canggih</h1>
        <p class="lead fs-5 text-secondary opacity-75">Solusi lengkap untuk pertumbuhan bisnis Anda</p>
    </div>
</header>

<section class="py-5 mb-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="premium-glass-card tilt-3d p-4 text-center">
                    <div class="d-flex justify-content-center"><div class="icon-wrapper"><i class="fas fa-bolt feature-icon"></i></div></div>
                    <h3 class="h4 fw-bold mb-3 text-white">Transaksi Kilat</h3>
                    <p class="text-secondary mb-0">Proses checkout super cepat dengan antarmuka yang intuitif. Minimalkan antrian dan tingkatkan kepuasan pelanggan Anda.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="premium-glass-card tilt-3d p-4 text-center">
                    <div class="d-flex justify-content-center"><div class="icon-wrapper"><i class="fas fa-boxes feature-icon"></i></div></div>
                    <h3 class="h4 fw-bold mb-3 text-white">Manajemen Stok Real-time</h3>
                    <p class="text-secondary mb-0">Pantau persediaan barang secara otomatis. Dapatkan notifikasi saat stok menipis agar Anda tidak pernah kehabisan barang.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="premium-glass-card tilt-3d p-4 text-center">
                    <div class="d-flex justify-content-center"><div class="icon-wrapper"><i class="fas fa-chart-pie feature-icon"></i></div></div>
                    <h3 class="h4 fw-bold mb-3 text-white">Laporan Analitik</h3>
                    <p class="text-secondary mb-0">Data penjualan divisualisasikan dalam grafik yang mudah dipahami. Analisis tren penjualan harian, mingguan, hingga bulanan.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                <div class="premium-glass-card tilt-3d p-4 text-center">
                    <div class="d-flex justify-content-center"><div class="icon-wrapper"><i class="fas fa-users feature-icon"></i></div></div>
                    <h3 class="h4 fw-bold mb-3 text-white">Manajemen Pengguna</h3>
                    <p class="text-secondary mb-0">Atur hak akses untuk kasir dan manajer. Pantau kinerja setiap karyawan dengan sistem log aktivitas yang detail.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
                <div class="premium-glass-card tilt-3d p-4 text-center">
                    <div class="d-flex justify-content-center"><div class="icon-wrapper"><i class="fas fa-print feature-icon"></i></div></div>
                    <h3 class="h4 fw-bold mb-3 text-white">Cetak Struk Otomatis</h3>
                    <p class="text-secondary mb-0">Kompatibel dengan berbagai jenis printer thermal. Cetak struk belanja profesional dengan logo toko Anda.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="600">
                <div class="premium-glass-card tilt-3d p-4 text-center">
                    <div class="d-flex justify-content-center"><div class="icon-wrapper"><i class="fas fa-shield-alt feature-icon"></i></div></div>
                    <h3 class="h4 fw-bold mb-3 text-white">Keamanan Data</h3>
                    <p class="text-secondary mb-0">Data transaksi Anda tersimpan aman dengan enkripsi database. Backup otomatis untuk mencegah kehilangan data penting.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
