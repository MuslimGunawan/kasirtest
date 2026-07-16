<?php
    @ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
    <title>Fitur Unggulan - SmartKasir</title>
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
        .feature-header {
            background: linear-gradient(135deg, #a4f6ff 0%, #ffaffb 100%);
            color: white;
            padding: 150px 0 100px;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }
        .feature-card {
            border: none;
            border-radius: 20px;
            transition: all 0.4s ease;
            background: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgb(99, 97, 69);
        }
        .icon-wrapper {
            width: 80px;
            height: 80px;
            background: rgba(28, 200, 138, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        .feature-card:hover .icon-wrapper {
            background: #c2edff;
            color: white;
        }
        .feature-icon {
            font-size: 2.5rem;
            color: #f9b5e5;
            transition: all 0.3s;
        }
        .feature-card:hover .feature-icon {
            color: white;
        }
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
            background-color: #f9b5e5;
            color: white;
            cursor: pointer;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            transition: all 0.3s ease-in-out;
            opacity: 0;
            visibility: hidden;
        }
        #scrollTopBtn.show {
            opacity: 1;
            visibility: visible;
        }
        #scrollTopBtn:hover {
            background-color: #c2edff;
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
                        <a class="nav-link fw-semibold" href="index">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-semibold active text-primary" href="fitur">Fitur</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-semibold" href="tentang">Tentang</a>
                    </li>
                    <li class="nav-item ms-3">
                        <?php if(!empty($_SESSION['admin'])){ ?>
                            <a class="btn btn-primary rounded-pill px-4 shadow-sm" href="dashboard">
                                <i class="fas fa-user-circle me-2"></i><?php echo $_SESSION['admin']['nm_member']; ?>
                            </a>
                        <?php } else { ?>
                            <a class="btn btn-primary rounded-pill px-4 shadow-sm" href="login">Masuk</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="feature-header text-center">
        <div class="container" data-aos="fade-up">
            <h1 class="display-3 fw-bold mb-4">Fitur Canggih</h1>
            <p class="lead fs-4 opacity-75">Solusi lengkap untuk pertumbuhan bisnis Anda</p>
        </div>
    </header>

    <!-- Features Grid -->
    <section class="py-5 mb-5">
        <div class="container">
            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card p-4 text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon-wrapper">
                                <i class="fas fa-bolt feature-icon"></i>
                            </div>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Transaksi Kilat</h3>
                        <p class="text-muted">Proses checkout super cepat dengan antarmuka yang intuitif. Minimalkan antrian dan tingkatkan kepuasan pelanggan Anda.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card p-4 text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon-wrapper">
                                <i class="fas fa-boxes feature-icon"></i>
                            </div>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Manajemen Stok Real-time</h3>
                        <p class="text-muted">Pantau persediaan barang secara otomatis. Dapatkan notifikasi saat stok menipis agar Anda tidak pernah kehabisan barang.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card p-4 text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon-wrapper">
                                <i class="fas fa-chart-pie feature-icon"></i>
                            </div>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Laporan Analitik</h3>
                        <p class="text-muted">Data penjualan divisualisasikan dalam grafik yang mudah dipahami. Analisis tren penjualan harian, mingguan, hingga bulanan.</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card p-4 text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon-wrapper">
                                <i class="fas fa-users feature-icon"></i>
                            </div>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Manajemen Pengguna</h3>
                        <p class="text-muted">Atur hak akses untuk kasir dan manajer. Pantau kinerja setiap karyawan dengan sistem log aktivitas yang detail.</p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card p-4 text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon-wrapper">
                                <i class="fas fa-print feature-icon"></i>
                            </div>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Cetak Struk Otomatis</h3>
                        <p class="text-muted">Kompatibel dengan berbagai jenis printer thermal. Cetak struk belanja profesional dengan logo toko Anda.</p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-card p-4 text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon-wrapper">
                                <i class="fas fa-shield-alt feature-icon"></i>
                            </div>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Keamanan Data</h3>
                        <p class="text-muted">Data transaksi Anda tersimpan aman dengan enkripsi database. Backup otomatis untuk mencegah kehilangan data penting.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h4 class="fw-bold text-primary mb-3"><i class="fas fa-cash-register me-2"></i>SmartKasir</h4>
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
    </script>
</body>
</html>
