@extends('layouts.site')

@section('title', 'Kontak - SmartKasir')

@section('content')
<style>
    .contact-card { 
        border-radius: 20px; 
        transition: all 0.4s ease; 
        height: 100%; 
    }
    .contact-icon { 
        width: 65px; 
        height: 65px; 
        background: rgba(168, 85, 247, 0.1); 
        color: #a855f7; 
        border: 1px solid rgba(168, 85, 247, 0.2);
        border-radius: 50%; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        font-size: 1.5rem; 
        margin-bottom: 1.5rem; 
        transition: all 0.3s;
    }
    .premium-glass-card:hover .contact-icon {
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        color: white;
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
    }
</style>

<header class="universal-header text-center">
    <div class="container" data-aos="fade-up">
        <h1 class="universal-title display-3 fw-bold mb-4">Hubungi Kami</h1>
        <p class="lead fs-5 text-secondary opacity-75">Kami siap membantu Anda</p>
    </div>
</header>

<section class="py-5 mb-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-card premium-glass-card tilt-3d p-4 text-center">
                    <div class="contact-icon mx-auto"><i class="fas fa-map-marker-alt"></i></div>
                    <h4 class="fw-bold text-white mb-3">Alamat</h4>
                    <p class="text-secondary mb-0">Universitas Malikussaleh<br>Aceh Utara, Indonesia</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-card premium-glass-card tilt-3d p-4 text-center">
                    <div class="contact-icon mx-auto"><i class="fas fa-envelope"></i></div>
                    <h4 class="fw-bold text-white mb-3">Email</h4>
                    <p class="text-secondary mb-0">support@smartkasir.com<br>info@smartkasir.com</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="contact-card premium-glass-card tilt-3d p-4 text-center">
                    <div class="contact-icon mx-auto"><i class="fas fa-phone-alt"></i></div>
                    <h4 class="fw-bold text-white mb-3">Telepon</h4>
                    <p class="text-secondary mb-0">+62 812 3456 7890<br>+62 812 9876 5432</p>
                </div>
            </div>
        </div>

        <div class="row mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="400">
            <div class="col-lg-8">
                <div class="premium-glass-card border-0 rounded-4 overflow-hidden">
                    <div class="card-body p-5">
                        <h3 class="fw-bold text-white mb-4 text-center">Kirim Pesan</h3>
                        @if(session('success'))
                            <div class="alert alert-success bg-success bg-opacity-10 border-success border-opacity-35 text-success rounded-3 mb-4">{{ session('success') }}</div>
                        @endif
                        <form method="POST" action="{{ route('kirim-kontak') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="nama" placeholder="Nama Lengkap" required>
                                        <label for="name">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subjek" placeholder="Subjek" required>
                                        <label for="subject">Subjek</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Pesan Anda" id="message" name="pesan" style="height: 150px" required></textarea>
                                        <label for="message">Pesan Anda</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button class="btn btn-primary btn-lg rounded-pill px-5 py-2.5 fw-semibold" type="submit">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
