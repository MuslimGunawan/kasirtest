@extends('layouts.site')

@section('title', 'Daftar Akun - SmartKasir')

@section('content')
<div class="container py-5" style="padding-top: 100px !important; min-height: calc(100vh - 150px); display: flex; align-items: center; justify-content: center;">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="premium-glass-card tilt-3d border-0 rounded-4 shadow-lg">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-white mb-4 text-center">Daftar Akun</h3>
                    
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-white-50">Nama Lengkap</label>
                            <input type="text" name="nm_member" class="form-control px-3 py-2" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50">Alamat</label>
                            <textarea name="alamat_member" class="form-control px-3 py-2" style="height: 80px;" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50">Telepon</label>
                            <input type="text" name="telepon" class="form-control px-3 py-2" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50">Email</label>
                            <input type="email" name="email" class="form-control px-3 py-2" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50">Username</label>
                            <input type="text" name="user" class="form-control px-3 py-2" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50">Password</label>
                            <input type="password" name="pass" class="form-control px-3 py-2" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2.5 fw-semibold mt-3">Daftar</button>
                    </form>
                    
                    <div class="mt-4 text-center">
                        <a href="{{ route('login') }}" class="small text-secondary" style="text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#c084fc'" onmouseout="this.style.color='rgba(244,244,247,0.6)'">Sudah punya akun? Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
