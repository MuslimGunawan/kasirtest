<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartKasir Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; }
        .hero { background: linear-gradient(135deg, #f8d9ee 0%, #d8c4f8 100%); min-height: 100vh; }
        .card-hover:hover { transform: translateY(-4px); transition: .2s ease; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}"><i class="fas fa-cash-register me-2"></i>SmartKasir</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('fitur') }}">Fitur</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
                @if(session('admin'))
                    <li class="nav-item"><a class="btn btn-secondary ms-2" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="btn btn-outline-danger ms-2" href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li class="nav-item"><a class="btn btn-primary ms-2" href="{{ route('login') }}">Masuk</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
