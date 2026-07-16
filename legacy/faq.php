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
    <title>FAQ - SmartKasir</title>
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
        .page-header {
            background: linear-gradient(135deg, #e29ccd 0%, #aec9f2 100%);
            color: white;
            padding: 150px 0 100px;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }
        .accordion-button:not(.collapsed) {
            color: #13855c;
            background-color: #e8f5e9;
            box-shadow: inset 0 -1px 0 rgba(0,0,0,.125);
        }
        .accordion-button:focus {
            border-color: #1cc88a;
            box-shadow: 0 0 0 0.25rem rgba(28, 200, 138, 0.25);
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
            background-color: #1cc88a;
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
            background-color: #13855c;
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
                        <a class="nav-link fw-semibold" href="fitur">Fitur</a>
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
    <header class="page-header text-center">
        <div class="container" data-aos="fade-up">
            <h1 class="display-3 fw-bold mb-4">FAQ</h1>
            <p class="lead fs-4 opacity-75">Pertanyaan yang sering diajukan</p>
        </div>
    </header>

    <!-- Content -->
    <section class="py-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item border-0 shadow-sm mb-3 rounded overflow-hidden">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Apakah SmartKasir gratis?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-muted">
                                    SmartKasir tersedia dalam versi gratis dengan fitur dasar yang cukup untuk usaha kecil. Kami juga menyediakan versi premium dengan fitur lebih lengkap untuk kebutuhan bisnis yang lebih besar.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 shadow-sm mb-3 rounded overflow-hidden">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Bagaimana cara mereset password?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-muted">
                                    Jika Anda lupa password, silakan hubungi admin toko Anda untuk melakukan reset password melalui menu manajemen pengguna di dashboard admin.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 shadow-sm mb-3 rounded overflow-hidden">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Apakah data saya aman?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-muted">
                                    Ya, keamanan data adalah prioritas kami. SmartKasir menggunakan enkripsi untuk password dan sistem keamanan berlapis untuk melindungi data transaksi Anda.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 shadow-sm mb-3 rounded overflow-hidden">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Bisakah saya menggunakan SmartKasir secara offline?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-muted">
                                    SmartKasir adalah aplikasi berbasis web yang berjalan di server lokal (localhost) menggunakan XAMPP, sehingga Anda bisa menggunakannya secara offline tanpa koneksi internet.
                                </div>
                            </div>
                        </div>
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

        // Navbar Scroll Effect
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
