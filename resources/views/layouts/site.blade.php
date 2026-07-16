<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SmartKasir')</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.svg') }}" type="image/svg+xml">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/global-overrides.css') }}">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #0b0b0f; 
            color: #f4f4f7;
            overflow-x: hidden; 
        }
        h1, h2, h3, h4, h5, h6, .fw-bold {
            font-family: 'Outfit', sans-serif;
        }
        .navbar { 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background-color: rgba(11, 11, 15, 0.6) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .navbar-scrolled { 
            background-color: rgba(15, 15, 22, 0.85) !important; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.3); 
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 12px !important;
            padding-bottom: 12px !important;
        }
        .nav-link {
            color: rgba(255, 255, 255, 0.75) !important;
            position: relative;
            transition: color 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            color: #a855f7 !important;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background: linear-gradient(90deg, #6366f1, #a855f7);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-link:hover::after, .nav-link.active::after {
            width: 80%;
        }
        .btn-primary-glow {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            border: none;
            color: white !important;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
            transition: all 0.3s ease;
        }
        .btn-primary-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(168, 85, 247, 0.5);
            color: white !important;
        }
        .hover-white:hover { color: white !important; }
        .transition-all { transition: all 0.3s ease; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary fs-4" href="{{ route('home') }}"><i class="fas fa-cash-register me-2"></i>SmartKasir</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item mx-2"><a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active text-primary' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item mx-2"><a class="nav-link fw-semibold {{ request()->routeIs('fitur') ? 'active text-primary' : '' }}" href="{{ route('fitur') }}">Fitur</a></li>
                <li class="nav-item mx-2"><a class="nav-link fw-semibold {{ request()->routeIs('tentang') ? 'active text-primary' : '' }}" href="{{ route('tentang') }}">Tentang</a></li>
                <li class="nav-item mx-2"><a class="nav-link fw-semibold {{ request()->routeIs('kontak') ? 'active text-primary' : '' }}" href="{{ route('kontak') }}">Kontak</a></li>
                @if(session('admin'))
                    <li class="nav-item ms-3"><a class="btn btn-secondary rounded-pill px-4 shadow-sm" href="{{ route('dashboard') }}"><i class="fas fa-user-circle me-2"></i>{{ session('admin')['nm_member'] ?? 'Dashboard' }}</a></li>
                    <li class="nav-item ms-2"><a class="btn btn-outline-danger rounded-pill px-4 shadow-sm" href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li class="nav-item ms-3"><a class="btn btn-primary rounded-pill px-4 shadow-sm" href="{{ route('login') }}">Masuk</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

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
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-decoration-none text-white-50 hover-white">Home</a></li>
                    <li class="mb-2"><a href="{{ route('fitur') }}" class="text-decoration-none text-white-50 hover-white">Fitur</a></li>
                    <li class="mb-2"><a href="{{ route('tentang') }}" class="text-decoration-none text-white-50 hover-white">Tentang</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5 class="fw-bold mb-3">Bantuan</h5>
                <ul class="list-unstyled text-white-50">
                    <li class="mb-2"><a href="{{ route('panduan') }}" class="text-decoration-none text-white-50 hover-white">Panduan</a></li>
                    <li class="mb-2"><a href="{{ route('faq') }}" class="text-decoration-none text-white-50 hover-white">FAQ</a></li>
                    <li class="mb-2"><a href="{{ route('kontak') }}" class="text-decoration-none text-white-50 hover-white">Kontak</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="fw-bold mb-3">Sosial Media</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; transition: all 0.3s;" onmouseover="this.style.background='#a855f7'" onmouseout="this.style.background='rgba(108,117,125,0.25)'"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; transition: all 0.3s;" onmouseover="this.style.background='#a855f7'" onmouseout="this.style.background='rgba(108,117,125,0.25)'"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; transition: all 0.3s;" onmouseover="this.style.background='#a855f7'" onmouseout="this.style.background='rgba(108,117,125,0.25)'"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <hr class="border-secondary my-4">
        <div class="text-center text-muted">
            <p class="text-decoration-none text-white-50 mb-0">&copy; 2026 SmartKasir. All rights reserved.</p>
        </div>
    </div>
</footer>

<button onclick="window.scrollTo({top:0,behavior:'smooth'})" id="scrollTopBtn" title="Kembali ke atas">
    <i class="fas fa-arrow-up"></i>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });
    
    window.onscroll = function(){
        const btn = document.getElementById('scrollTopBtn');
        const nav = document.querySelector('.navbar');
        
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            nav.classList.add('navbar-scrolled');
        } else {
            nav.classList.remove('navbar-scrolled');
        }
        
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            btn.classList.add('show');
        } else {
            btn.classList.remove('show');
        }
    };

    // Dynamic 3D Card Tilt Effect
    document.querySelectorAll('.tilt-3d').forEach(el => {
        el.addEventListener('mousemove', e => {
            const rect = el.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const xc = rect.width / 2;
            const yc = rect.height / 2;
            const dx = x - xc;
            const dy = y - yc;
            const maxVal = 10; // degrees
            const tiltX = -(dy / yc) * maxVal;
            const tiltY = (dx / xc) * maxVal;
            
            el.style.transform = `perspective(1000px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) scale3d(1.03, 1.03, 1.03)`;
        });
        
        el.addEventListener('mouseleave', () => {
            el.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
            el.style.transition = 'transform 0.5s cubic-bezier(0.25, 1, 0.5, 1)';
        });
        
        el.addEventListener('mouseenter', () => {
            el.style.transition = 'transform 0.1s cubic-bezier(0.25, 1, 0.5, 1)';
        });
    });
</script>
</body>
</html>
