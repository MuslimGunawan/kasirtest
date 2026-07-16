@extends('layouts.site')

@section('title', 'Login - SmartKasir')

@section('content')
<div class="container py-5" style="padding-top: 100px !important; min-height: calc(100vh - 150px); display: flex; align-items: center; justify-content: center;">
    <div class="row justify-content-center w-100">
        <div class="col-md-5">
            <div class="premium-glass-card tilt-3d border-0 rounded-4 shadow-lg">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-white mb-4 text-center">Masuk ke SmartKasir</h3>
                    
                    @if(session('error'))
                        <div class="alert alert-danger bg-danger bg-opacity-10 border-danger border-opacity-35 text-danger rounded-3 mb-4">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success bg-success bg-opacity-10 border-success border-opacity-35 text-success rounded-3 mb-4">{{ session('success') }}</div>
                    @endif
                    
                    <form method="POST" action="{{ route('authenticate') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label text-white-50">Username</label>
                            <input type="text" name="user" class="form-control px-3 py-2.5" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-white-50">Password</label>
                            <input type="password" name="pass" class="form-control px-3 py-2.5" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2.5 fw-semibold mt-2">Masuk</button>
                    </form>
                    
                    <div class="mt-4 text-center">
                        <a href="{{ route('register') }}" class="small text-secondary" style="text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#c084fc'" onmouseout="this.style.color='rgba(244,244,247,0.6)'">Belum punya akun? Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
