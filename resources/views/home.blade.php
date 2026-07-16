@extends('layouts.site')

@section('title', 'SmartKasir - Sistem Kasir Modern')

@section('content')
<style>
    /* Hero section */
    .hero-section {
        background-color: #0b0b0f;
        background-image: 
            radial-gradient(at 10% 20%, rgba(99, 102, 241, 0.15) 0px, transparent 50%),
            radial-gradient(at 90% 10%, rgba(168, 85, 247, 0.15) 0px, transparent 50%),
            radial-gradient(at 50% 80%, rgba(236, 72, 153, 0.08) 0px, transparent 50%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        padding-top: 100px;
        padding-bottom: 60px;
    }
    
    /* 3D Glowing grid background effect */
    .grid-bg-3d {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                          linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 50px 50px;
        transform: perspective(500px) rotateX(60deg) translateY(-30%) translateZ(-100px);
        mask-image: linear-gradient(to bottom, transparent, rgba(0,0,0,0.8));
        -webkit-mask-image: linear-gradient(to bottom, transparent, rgba(0,0,0,0.8));
        opacity: 0.5;
        z-index: 0;
        pointer-events: none;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 3.8rem;
        font-weight: 800;
        line-height: 1.15;
        background: linear-gradient(to right, #ffffff 30%, #a855f7 70%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
        letter-spacing: -0.03em;
    }

    /* 3D Interactive elements */
    .tilt-3d {
        transform-style: preserve-3d;
        transform: perspective(1000px);
        transition: transform 0.1s ease;
    }

    /* Modern Glassmorphism Card Mockup */
    .dashboard-mockup {
        background: rgba(20, 20, 28, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 24px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4),
                    inset 0 1px 0 rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        padding: 24px;
        position: relative;
        overflow: visible;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }

    /* Floating glowing orb */
    .glow-orb {
        position: absolute;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(168, 85, 247, 0.4) 0%, rgba(99, 102, 241, 0) 70%);
        filter: blur(20px);
        z-index: -1;
        pointer-events: none;
    }
    
    .glow-orb-1 { top: -20px; right: -40px; animation: float 6s ease-in-out infinite; }
    .glow-orb-2 { bottom: -30px; left: -40px; animation: float 8s ease-in-out infinite alternate; }

    @keyframes float {
        0% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-10px) scale(1.1); }
        100% { transform: translateY(0px) scale(1); }
    }

    /* Mock Credit Card */
    .mock-card {
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        border-radius: 16px;
        padding: 20px;
        color: white;
        box-shadow: 0 15px 35px rgba(139, 92, 246, 0.35);
        transform: translateZ(50px); /* Pushes the card forward in 3D space */
        margin-bottom: 20px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        position: relative;
        overflow: hidden;
    }

    .mock-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 80%);
        pointer-events: none;
    }

    /* Charts/UI details */
    .mock-bar {
        height: 8px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
        overflow: hidden;
    }
    .mock-bar-fill {
        height: 100%;
        background: linear-gradient(90deg, #6366f1, #a855f7);
        border-radius: 4px;
    }

    .section-padding {
        padding: 100px 0;
    }

    .section-title {
        font-size: 2.8rem;
        font-weight: 800;
        background: linear-gradient(to right, #ffffff, #a855f7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }

    /* Feature card enhancements */
    .feature-card-glow {
        background: rgba(20, 20, 28, 0.45);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 24px;
        padding: 40px 30px;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        height: 100%;
    }

    .feature-card-glow:hover {
        border-color: rgba(168, 85, 247, 0.3);
        box-shadow: 0 20px 40px rgba(168, 85, 247, 0.1),
                    inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }

    .icon-container {
        width: 70px;
        height: 70px;
        border-radius: 20px;
        background: rgba(99, 102, 241, 0.1);
        border: 1px solid rgba(99, 102, 241, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
        font-size: 28px;
        color: #a855f7;
        transition: all 0.3s ease;
    }

    .feature-card-glow:hover .icon-container {
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        color: white;
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        transform: scale(1.05);
    }

    .badge-custom {
        background: rgba(168, 85, 247, 0.1);
        border: 1px solid rgba(168, 85, 247, 0.2);
        color: #c084fc;
        padding: 8px 16px;
        font-weight: 600;
        font-size: 0.85rem;
    }
</style>

<section class="hero-section">
    <div class="grid-bg-3d"></div>
    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 mb-5 mb-lg-0 text-start" data-aos="fade-right">
                <span class="badge badge-custom rounded-pill mb-4"><i class="fas fa-star me-2"></i>Sistem Kasir 3D #1 di Indonesia</span>
                <h1 class="hero-title">Revolusi Transaksi Digital Bisnis Anda</h1>
                <p class="lead text-secondary mb-5 fs-5" style="line-height: 1.6;">Tingkatkan efisiensi operasional dengan sistem kasir cerdas yang terintegrasi. Pantau stok, kelola penjualan, dan analisis keuntungan dalam satu dashboard yang intuitif.</p>
                <div class="d-flex gap-3 flex-wrap">
                    @if(session('admin'))
                        <a href="{{ route('dashboard') }}" class="btn btn-primary-glow px-4 py-3 rounded-pill fw-bold"><i class="fas fa-tachometer-alt me-2"></i>Buka Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary-glow px-4 py-3 rounded-pill fw-bold"><i class="fas fa-rocket me-2"></i>Mulai Sekarang</a>
                    @endif
                    <a href="{{ route('fitur') }}" class="btn btn-outline-light rounded-pill px-4 py-3 fw-bold border-1" style="background: rgba(255,255,255,0.03); border-color: rgba(255,255,255,0.15);">Pelajari Fitur</a>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <!-- 3D Card Scene -->
                <div class="scene-3d">
                    <div class="dashboard-mockup tilt-3d">
                        <div class="glow-orb glow-orb-1"></div>
                        <div class="glow-orb glow-orb-2"></div>
                        
                        <!-- Mock Credit Card (3D Floating) -->
                        <div class="mock-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
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

                        <!-- Card Body / Stats -->
                        <div style="transform: translateZ(30px);">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold mb-0 text-white">Ringkasan Omset</h5>
                                <span class="badge rounded-pill px-3 py-1" style="background: rgba(25, 135, 84, 0.18) !important; color: #39e582 !important; border: 1px solid rgba(25, 135, 84, 0.3);"><i class="fas fa-arrow-up me-1"></i>Real-time</span>
                            </div>
                            <div class="fs-3 fw-bold text-white mb-4">Rp {{ number_format($totalSales, 0, ',', '.') }} <span class="fs-6 fw-normal text-muted">total penjualan</span></div>
                            
                            <!-- Graph Mockup -->
                            <div class="mb-4">
                                <div class="d-flex justify-content-between text-xs text-muted mb-2">
                                    <span>Target Penjualan</span>
                                    <span>100% Tercapai</span>
                                </div>
                                <div class="mock-bar">
                                    <div class="mock-bar-fill" style="width: 100%;"></div>
                                </div>
                            </div>

                            <!-- List Group -->
                            <h6 class="fw-bold text-white mb-3">Metrik Utama</h6>
                            <div class="d-flex flex-column gap-2 text-start">
                                <div class="d-flex align-items-center justify-content-between p-2 rounded" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05);">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-shopping-cart text-primary me-3"></i>
                                        <div>
                                            <div class="fw-bold text-white">Transaksi Sukses</div>
                                            <div class="text-muted" style="font-size: 0.75rem;">Total Nota Penjualan</div>
                                        </div>
                                    </div>
                                    <span class="fw-bold text-white">{{ number_format($totalTransactions) }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-2 rounded" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05);">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-box text-pink me-3" style="color: #ec4899;"></i>
                                        <div>
                                            <div class="fw-bold text-white">Stok Terpantau</div>
                                            <div class="text-muted" style="font-size: 0.75rem;">
                                                @if($lowStock > 0)
                                                    {{ $lowStock }} Produk Stok Menipis (<= 50)
                                                @else
                                                    Semua Stok Aman
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if($lowStock > 0)
                                        <span class="badge rounded px-2" style="background: rgba(220, 53, 69, 0.18) !important; color: #ff5c6c !important; border: 1px solid rgba(220, 53, 69, 0.3);">Alert</span>
                                    @else
                                        <span class="badge rounded px-2" style="background: rgba(25, 135, 84, 0.18) !important; color: #39e582 !important; border: 1px solid rgba(25, 135, 84, 0.3);">Aman</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding" style="background: #08080c; border-top: 1px solid rgba(255, 255, 255, 0.03);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge badge-custom rounded-pill mb-2">KEUNGGULAN</span>
            <h2 class="section-title">Fitur Masa Depan</h2>
            <p class="text-secondary col-lg-6 mx-auto">Semua yang Anda butuhkan untuk mengelola bisnis dengan lebih praktis dan modern.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card-glow tilt-3d text-start">
                    <div class="icon-container">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h4 class="fw-bold text-white mb-3">Transaksi Kilat 3D</h4>
                    <p class="text-secondary" style="line-height: 1.6;">Proses checkout super cepat yang responsif dan minim antrian untuk pengalaman pelanggan maksimal.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card-glow tilt-3d text-start">
                    <div class="icon-container" style="color: #ec4899; background: rgba(236, 72, 153, 0.1); border-color: rgba(236, 72, 153, 0.2);">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <h4 class="fw-bold text-white mb-3">Manajemen Stok Cerdas</h4>
                    <p class="text-secondary" style="line-height: 1.6;">Pantau pergerakan barang masuk dan keluar secara real-time dengan pemberitahuan otomatis.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card-glow tilt-3d text-start">
                    <div class="icon-container" style="color: #3b82f6; background: rgba(59, 130, 246, 0.1); border-color: rgba(59, 130, 246, 0.2);">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4 class="fw-bold text-white mb-3">Laporan Analitik Interaktif</h4>
                    <p class="text-secondary" style="line-height: 1.6;">Dapatkan insight mendalam tentang omzet, tren produk, dan keuntungan secara periodik.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
