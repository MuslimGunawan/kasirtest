@extends('layouts.site')

@section('content')
<section class="hero d-flex align-items-center">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge bg-dark-subtle text-dark px-3 py-2 rounded-pill mb-3">Laravel-ready POS System</span>
                <h1 class="display-4 fw-bold mb-3">Solusi kasir modern untuk toko Anda</h1>
                <p class="lead text-muted mb-4">Aplikasi ini sudah diubah ke arsitektur Laravel dan siap dikonfigurasi untuk hosting InfinityFree dengan database MySQL.</p>
                <div class="d-flex gap-3 flex-wrap">
                    @if(session('admin'))
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">Buka Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Masuk</a>
                    @endif
                    <a href="{{ route('fitur') }}" class="btn btn-outline-dark btn-lg">Lihat Fitur</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-lg border-0 rounded-4 p-4">
                    <h4 class="fw-bold mb-3">Apa yang sudah siap?</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Routing Laravel untuk halaman utama, fitur, tentang, kontak, login, dashboard</li>
                        <li class="list-group-item">Integrasi database MySQL yang kompatibel dengan skema lama</li>
                        <li class="list-group-item">Konfigurasi server untuk hosting InfinityFree melalui .htaccess</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
