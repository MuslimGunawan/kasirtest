<?php
    @ob_start();
    session_start();
    require 'config/database.php';

    // Fetch Real-time Stats
    try {
        // Total Transaksi
        $sql_transaksi = "SELECT count(*) FROM nota";
        $row_transaksi = $config->prepare($sql_transaksi);
        $row_transaksi->execute();
        $jml_transaksi = $row_transaksi->fetchColumn();

        // Total Barang
        $sql_barang = "SELECT count(*) FROM barang";
        $row_barang = $config->prepare($sql_barang);
        $row_barang->execute();
        $jml_barang = $row_barang->fetchColumn();

        // Total Terjual (Items Sold)
        $sql_terjual = "SELECT sum(jumlah) FROM nota";
        $row_terjual = $config->prepare($sql_terjual);
        $row_terjual->execute();
        $jml_terjual = $row_terjual->fetchColumn();
        if(!$jml_terjual) $jml_terjual = 0;

    } catch (Exception $e) {
        $jml_transaksi = 0;
        $jml_barang = 0;
        $jml_terjual = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
    <title>SmartKasir - Sistem Kasir Modern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global-overrides.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        .navbar {
            transition: all 0.3s;
        }
        .navbar-scrolled {
            background-color: white !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .hero-section {
            background: linear-gradient(135deg, #f5a3d6 0%, #ef79c5 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 80px;
        }
        .hero-bg-shape {
            position: absolute;
            top: -20%;
            right: -10%;
            width: 60%;
            height: 120%;
            background: linear-gradient(135deg, #c1f3fb 0%, #f4bde6 100%);
            border-radius: 0 0 0 200px;
            transform: skewX(-10deg);
            z-index: 0;
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            background: linear-gradient(45deg, #010101, #131312);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
        }
        .hero-3d-element {
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
            padding: 20px; /* Add padding to prevent clipping */
        }
        .floating-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            padding: 2rem;
            transform: rotateY(-15deg) rotateX(10deg);
            transition: transform 0.5s ease;
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 5; /* Lower z-index than icons */
        }
        .floating-card:hover {
            transform: rotateY(0deg) rotateX(0deg) scale(1.05);
        }
        .floating-icon {
            position: absolute;
            background: white;
            border-radius: 50%;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2); /* Stronger shadow */
            display: flex;
            align-items: center;
            justify-content: center;
            animation: float 6s ease-in-out infinite;
            z-index: 10; /* Higher z-index to float above card */
        }
        .icon-1 { top: -30px; right: -30px; width: 80px; height: 80px; animation-delay: 0s; }
        .icon-2 { bottom: -40px; left: -40px; width: 70px; height: 70px; animation-delay: 2s; }
        .icon-3 { top: 40%; right: -60px; width: 60px; height: 60px; animation-delay: 4s; }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .btn-primary-custom {
            background: linear-gradient(45deg, #f4c6eb, #d9c4f5);
            border: none;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s;
            box-shadow: 0 10px 20px rgba(179, 128, 216, 0.3);
        }
        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(170, 116, 205, 0.4);
            color: white;
        }
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
            opacity: 0.7;
            cursor: pointer;
            z-index: 10;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0) translateX(-50%);}
            40% {transform: translateY(-10px) translateX(-50%);}
            60% {transform: translateY(-5px) translateX(-50%);}
        }
        .hover-white:hover { color: white !important; }
        .hover-shadow:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
        .transition-all { transition: all 0.3s ease; }
        
        /* Scroll to Top Button */
        #scrollTopBtn {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #226dbd;
            color: white;
            cursor: pointer;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(245, 26, 26, 0.93);
            transition: all 0.3s ease-in-out;
            opacity: 0;
            visibility: hidden;
        }
        #scrollTopBtn.show {
            opacity: 1;
            visibility: visible;
        }
        #scrollTopBtn:hover {
            background-color: #fadbf7;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary fs-4" href="index"><i class="fas fa-cash-register me-2"></i>SmartKasir</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-semibold active text-primary" href="index">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-semibold" href="fitur">Fitur</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-semibold" href="tentang">Tentang</a>
                    </li>
                    <li class="nav-item ms-3">
                        <?php if(!empty($_SESSION['admin'])){ ?>
                            <a class="btn btn-secondary rounded-pill px-4 shadow-sm" href="dashboard">
                                <i class="fas fa-user-circle me-2"></i><?php echo $_SESSION['admin']['nm_member']; ?>
                            </a>
                        <?php } else { ?>
                            <a class="btn btn-secondary rounded-pill px-4 shadow-sm" href="login">Masuk</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-bg-shape"></div>
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2 rounded-pill mb-3 fw-bold">
                        <i class="fas fa-star me-2"></i>Solusi Kasir #1 di Indonesia
                    </span>
                    <h1 class="hero-title">Revolusi Transaksi Digital Bisnis Anda</h1>
                    <p class="lead text-muted mb-5">
                        Tingkatkan efisiensi operasional dengan sistem kasir cerdas yang terintegrasi. 
                        Pantau stok, kelola penjualan, dan analisis keuntungan dalam satu dashboard yang intuitif.
                    </p>
                    <div class="d-flex gap-3">
                        <?php if(!empty($_SESSION['admin'])){ ?>
                            <a href="dashboard" class="btn btn-primary-custom">
                                <i class="fas fa-tachometer-alt me-2"></i>Buka Dashboard
                            </a>
                        <?php } else { ?>
                            <a href="login" class="btn btn-primary-custom">
                                <i class="fas fa-rocket me-2"></i>Mulai Sekarang
                            </a>
                        <?php } ?>
                        <a href="fitur" class="btn btn-outline-secondary rounded-pill px-4 py-3 fw-bold border-2">
                            Pelajari Fitur
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="hero-3d-element text-center">
                        <div class="floating-card">
                            <div class="text-start mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-secondary rounded-circle p-2 me-3 text-white">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0 fw-bold">Statistik Penjualan</h5>
                                        <small class="text-muted">Update Real-time</small>
                                    </div>
                                </div>
                                <?php 
                                    // Calculate progress percentage based on items sold vs total products
                                    $progress_percentage = ($jml_barang > 0) ? round(($jml_terjual / $jml_barang) * 100) : 0;
                                    $progress_percentage = min($progress_percentage, 100);
                                ?>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $progress_percentage; ?>%"></div>
                                </div>
                                <small class="text-muted d-block mb-3">Persentase Penjualan: <?php echo $progress_percentage; ?>%</small>
                                <div class="mt-4 d-flex justify-content-between text-center">
                                    <div>
                                        <h4 class="fw-bold mb-0"><?php echo number_format($jml_transaksi); ?></h4>
                                        <small class="text-muted">Transaksi</small>
                                    </div>
                                    <div>
                                        <h4 class="fw-bold mb-0 text-info"><?php echo number_format($jml_terjual); ?></h4>
                                        <small class="text-muted">Terjual</small>
                                    </div>
                                    <div>
                                        <h4 class="fw-bold mb-0"><?php echo number_format($jml_barang); ?></h4>
                                        <small class="text-muted">Produk</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Real-time Chart Visualization -->
                            <div class="bg-light rounded p-3" style="height: 150px;">
                                <div class="d-flex align-items-flex-end justify-content-around h-100" style="gap: 8px;">
                                    <?php 
                                        // Create bar chart based on data
                                        $max_value = max($jml_transaksi, $jml_terjual, $jml_barang, 1);
                                        $transaksi_height = ($jml_transaksi / $max_value) * 100;
                                        $terjual_height = ($jml_terjual / $max_value) * 100;
                                        $barang_height = ($jml_barang / $max_value) * 100;
                                    ?>
                                    <div class="text-center flex-grow-1">
                                        <div class="bg-secondary rounded" style="height: <?php echo $transaksi_height; ?>%; margin: 0 auto; width: 20px;"></div>
                                        <small class="d-block mt-2 text-muted" style="font-size: 0.7rem;">Transaksi</small>
                                    </div>
                                    <div class="text-center flex-grow-1">
                                        <div class="bg-info rounded" style="height: <?php echo $terjual_height; ?>%; margin: 0 auto; width: 20px;"></div>
                                        <small class="d-block mt-2 text-muted" style="font-size: 0.7rem;">Terjual</small>
                                    </div>
                                    <div class="text-center flex-grow-1">
                                        <div class="bg-warning rounded" style="height: <?php echo $barang_height; ?>%; margin: 0 auto; width: 20px;"></div>
                                        <small class="d-block mt-2 text-muted" style="font-size: 0.7rem;">Produk</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating Icons -->
                        <div class="floating-icon icon-1 text-secondary fs-3">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="floating-icon icon-2 text-info fs-4">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <div class="floating-icon icon-3 text-warning fs-4">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <a href="#why-us" class="scroll-indicator text-muted text-decoration-none">
            <small>Scroll untuk info lebih lanjut</small><br>
            <i class="fas fa-chevron-down mt-2"></i>
        </a>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-5 bg-white" id="why-us">
        <div class="container py-5">
            <div class="row text-center mb-5" data-aos="fade-up">
                <div class="col-lg-8 mx-auto">
                    <h2 class="fw-bold display-6">Kenapa Memilih SmartKasir?</h2>
                    <p class="text-muted lead mt-3">Kami menghadirkan teknologi kasir modern yang mudah digunakan untuk semua jenis usaha, dari UMKM hingga ritel besar.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 rounded-4 bg-light h-100 text-center border hover-shadow transition-all">
                        <div class="d-inline-block p-3 rounded-circle bg-secondary bg-opacity-10 text-secondary mb-3">
                            <i class="fas fa-bolt fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Cepat & Ringan</h4>
                        <p class="text-muted">Aplikasi dirancang untuk performa maksimal bahkan di perangkat spesifikasi rendah. Transaksi selesai dalam hitungan detik.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-4 rounded-4 bg-light h-100 text-center border hover-shadow transition-all">
                        <div class="d-inline-block p-3 rounded-circle bg-info bg-opacity-10 text-info mb-3">
                            <i class="fas fa-sync fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Real-time Sync</h4>
                        <p class="text-muted">Data penjualan dan stok terupdate secara otomatis dan akurat setiap saat. Pantau bisnis Anda dari mana saja.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-4 rounded-4 bg-light h-100 text-center border hover-shadow transition-all">
                        <div class="d-inline-block p-3 rounded-circle bg-warning bg-opacity-10 text-warning mb-3">
                            <i class="fas fa-shield-alt fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Aman & Terpercaya</h4>
                        <p class="text-muted">Sistem keamanan berlapis untuk melindungi data transaksi bisnis Anda. Backup otomatis untuk ketenangan pikiran.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-info text-white text-center">
        <div class="container py-4" data-aos="zoom-in">
            <h2 class="fw-bold mb-3">Siap Mengembangkan Bisnis Anda?</h2>
            <p class="lead mb-4 opacity-75">Bergabunglah dengan ribuan pengusaha sukses lainnya yang telah beralih ke SmartKasir.</p>
            <?php if(!empty($_SESSION['admin'])){ ?>
                <a href="dashboard" class="btn btn-light btn-lg rounded-pill px-5 fw-bold shadow">Buka Dashboard</a>
            <?php } else { ?>
                <a href="login" class="btn btn-light btn-lg rounded-pill px-5 fw-bold shadow">Daftar Sekarang</a>
            <?php } ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h4 class="fw-bold text-secondary mb-3"><i class="fas fa-cash-register me-2"></i>SmartKasir</h4>
                    <p class="text-white-50">Solusi kasir modern untuk bisnis masa depan. Kelola usaha Anda dengan lebih mudah, cepat, dan efisien.</p>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <h5 class="fw-bold mb-3">Menu</h5>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2"><a href="index" class="text-decoration-none text-white-50 hover-white">Home</a></li>
                        <li class="mb-2"><a href="fitur" class="text-decoration-none text-white-50 hover-white">Fitur</a></li>
                        <li class="mb-2"><a href="tentang" class="text-decoration-none text-white-50 hover-white">Tentang</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="fw-bold mb-3">Bantuan</h5>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2"><a href="panduan" class="text-decoration-none text-white-50 hover-white">Panduan</a></li>
                        <li class="mb-2"><a href="faq" class="text-decoration-none text-white-50 hover-white">FAQ</a></li>
                        <li class="mb-2"><a href="kontak" class="text-decoration-none text-white-50 hover-white">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="fw-bold mb-3">Sosial Media</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white bg-secondary bg-opacity-25 p-2 rounded-circle"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white bg-info bg-opacity-25 p-2 rounded-circle"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white bg-secondary bg-opacity-25 p-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <div class="text-center text-muted">
                <p class="text-decoration-none text-white-50 hover-white">&copy; 2026 SmartKasir. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button onclick="topFunction()" id="scrollTopBtn" title="Go to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('navbar-scrolled', 'shadow-sm');
            } else {
                document.querySelector('.navbar').classList.remove('navbar-scrolled', 'shadow-sm');
            }
        });

        // Scroll to Top Button Logic
        var mybutton = document.getElementById("scrollTopBtn");

        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.classList.add("show");
            } else {
                mybutton.classList.remove("show");
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        // Simple 3D tilt effect for the card
        const card = document.querySelector('.floating-card');
        const container = document.querySelector('.hero-3d-element');

        container.addEventListener('mousemove', (e) => {
            const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
            card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });

        container.addEventListener('mouseenter', (e) => {
            card.style.transition = 'none';
        });

        container.addEventListener('mouseleave', (e) => {
            card.style.transition = 'all 0.5s ease';
            card.style.transform = `rotateY(-15deg) rotateX(10deg)`;
        });
    </script>
</body>
</html>

