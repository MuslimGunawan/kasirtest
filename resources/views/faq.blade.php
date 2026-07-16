@extends('layouts.site')

@section('title', 'FAQ - SmartKasir')

@section('content')
<header class="universal-header text-center">
    <div class="container" data-aos="fade-up">
        <h1 class="universal-title display-3 fw-bold mb-4">FAQ</h1>
        <p class="lead fs-5 text-secondary opacity-75">Pertanyaan yang sering diajukan</p>
    </div>
</header>

<section class="py-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item mb-3 rounded-3 overflow-hidden">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Apakah SmartKasir gratis?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-secondary" style="line-height: 1.6;">
                                SmartKasir tersedia dalam versi gratis dengan fitur dasar yang cukup untuk usaha kecil. Kami juga menyediakan versi premium dengan fitur lebih lengkap untuk kebutuhan bisnis yang lebih besar.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 rounded-3 overflow-hidden">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-bold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Bagaimana cara mereset password?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-secondary" style="line-height: 1.6;">
                                Jika Anda lupa password, silakan hubungi admin toko Anda untuk melakukan reset password melalui menu manajemen pengguna di dashboard admin.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 rounded-3 overflow-hidden">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-bold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Apakah data saya aman?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-secondary" style="line-height: 1.6;">
                                Ya, keamanan data adalah prioritas kami. SmartKasir menggunakan enkripsi untuk password dan sistem keamanan berlapis untuk melindungi data transaksi Anda.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 rounded-3 overflow-hidden">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed fw-bold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Bisakah saya menggunakan SmartKasir secara offline?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-secondary" style="line-height: 1.6;">
                                SmartKasir adalah aplikasi berbasis web yang berjalan di server lokal (localhost) menggunakan XAMPP atau Laragon, sehingga Anda bisa menggunakannya secara offline tanpa koneksi internet.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
