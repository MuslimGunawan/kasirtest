@extends('layouts.site')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-3">Hubungi Kami</h3>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form method="POST" action="{{ route('kirim-kontak') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Subjek</label>
                                <input type="text" name="subjek" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Pesan</label>
                                <textarea name="pesan" rows="4" class="form-control" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
