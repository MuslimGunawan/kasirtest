@extends('layouts.site')

@section('title', 'Tentang Kami - SmartKasir')

@section('content')
<style>
    .team-card { 
        border-radius: 20px; 
        overflow: hidden; 
        transition: all 0.4s ease; 
        border: 1px solid rgba(255, 255, 255, 0.05); 
    }
    .team-img-wrapper { 
        height: 300px; 
        overflow: hidden; 
        background: #060608; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        position: relative;
    }
    .team-img-wrapper img { 
        width: 100%; 
        height: 100%; 
        object-fit: contain;
        display: block;
        transition: transform 0.5s ease;
    }
    .team-card:hover .team-img-wrapper img {
        transform: scale(1.08);
    }
    .university-badge { 
        background: rgba(168, 85, 247, 0.15); 
        color: #c084fc; 
        border: 1px solid rgba(168, 85, 247, 0.3);
        padding: 5px 15px; 
        border-radius: 20px; 
        font-size: 0.8rem; 
        display: inline-block; 
        margin-bottom: 15px; 
        font-weight: 600;
    }
</style>

<header class="universal-header text-center">
    <div class="container" data-aos="fade-up">
        <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="mb-4" style="width: 150px; filter: drop-shadow(0 0 15px rgba(168, 85, 247, 0.45));">
        <h1 class="universal-title display-3 fw-bold mb-4">Tentang Kami</h1>
        <p class="lead fs-5 text-secondary opacity-75">Tim hebat di balik SmartKasir</p>
    </div>
</header>

<section class="py-5 mb-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold mb-3 text-white">Tim Pengembang</h2>
            <p class="text-secondary">Mahasiswa Teknik Informatika Universitas Malikussaleh</p>
        </div>
        <div class="row justify-content-center g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="team-card premium-glass-card tilt-3d text-center h-100">
                    <div class="team-img-wrapper"><img src="{{ asset('assets/img/user/1782277092Garwita Rasikha.jpeg') }}" alt="Garwita Rasikha" class="img-fluid w-100"></div>
                    <div class="card-body p-4">
                        <span class="university-badge">Universitas Malikussaleh</span>
                        <h4 class="fw-bold text-white mb-2">Garwita Rasikha</h4>
                        <p class="fw-bold mb-2" style="color: #a855f7;">240170041</p>
                        <p class="text-secondary small mb-0">Fakultas Teknik</p>
                        <p class="text-secondary small">Prodi Teknik Informatika</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="team-card premium-glass-card tilt-3d text-center h-100">
                    <div class="team-img-wrapper"><img src="{{ asset('assets/img/user/1782276631Intan Maulana.jpeg') }}" alt="Intan Maulana" class="img-fluid w-100"></div>
                    <div class="card-body p-4">
                        <span class="university-badge">Universitas Malikussaleh</span>
                        <h4 class="fw-bold text-white mb-2">Intan Maulana</h4>
                        <p class="fw-bold mb-2" style="color: #a855f7;">240170049</p>
                        <p class="text-secondary small mb-0">Fakultas Teknik</p>
                        <p class="text-secondary small">Prodi Teknik Informatika</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="team-card premium-glass-card tilt-3d text-center h-100">
                    <div class="team-img-wrapper"><img src="{{ asset('assets/img/user/1782276984Maulidayana.jpeg') }}" alt="Maulidayana" class="img-fluid w-100"></div>
                    <div class="card-body p-4">
                        <span class="university-badge">Universitas Malikussaleh</span>
                        <h4 class="fw-bold text-white mb-2">Maulidayana</h4>
                        <p class="fw-bold mb-2" style="color: #a855f7;">240170044</p>
                        <p class="text-secondary small mb-0">Fakultas Teknik</p>
                        <p class="text-secondary small">Prodi Teknik Informatika</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
