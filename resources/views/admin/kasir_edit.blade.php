<a href="{{ route('dashboard', ['page' => 'kasir']) }}" class="btn btn-outline-light rounded-pill px-4 mb-4"><i class="fa fa-angle-left me-2"></i> Kembali</a>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-white mb-0">Ubah Data Pengguna</h3>
</div>

<div class="row g-4 mb-5">
    <!-- User Profile Data Card -->
    <div class="col-md-6">
        <div class="card premium-glass-card border-0 rounded-4 overflow-hidden mb-4">
            <div class="card-header py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
                <h5 class="mb-0 fw-bold"><i class="fa fa-user me-2"></i> Data Pengguna</h5>
            </div>
            <div class="card-body p-4">
                <form method="POST" enctype="multipart/form-data" action="{{ route('dashboard', ['page' => 'kasir/edit', 'id' => $kasir->id_member]) }}">
                    @csrf
                    <input type="hidden" name="update" value="1">
                    <input type="hidden" name="id" value="{{ $kasir->id_member }}">
                    
                    <div class="mb-3">
                        <label class="form-label text-white-50">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control px-3 py-2" value="{{ $kasir->nm_member }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Alamat</label>
                        <textarea name="alamat" class="form-control px-3 py-2" rows="3" required>{{ $kasir->alamat_member }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Telepon</label>
                        <input type="text" name="telepon" class="form-control px-3 py-2" value="{{ $kasir->telepon }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Email</label>
                        <input type="email" name="email" class="form-control px-3 py-2" value="{{ $kasir->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">NIK</label>
                        <input type="text" name="nik" class="form-control px-3 py-2" value="{{ $kasir->NIK }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Peran</label>
                        <select name="role" class="form-select" required>
                            <option value="kasir" {{ $kasir->role === 'kasir' ? 'selected' : '' }}>Kasir</option>
                            <option value="manajer" {{ $kasir->role === 'manajer' ? 'selected' : '' }}>Manajer</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-white-50">Foto Profil</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <small class="text-white-50 mt-1 d-block">Kosongkan jika tidak ingin mengubah foto</small>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 py-2.5 rounded-pill fw-semibold">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- User Login Data Card -->
    <div class="col-md-6">
        <div class="card premium-glass-card border-0 rounded-4 overflow-hidden mb-4">
            <div class="card-header py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
                <h5 class="mb-0 fw-bold"><i class="fa fa-lock me-2"></i> Data Login</h5>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('dashboard', ['page' => 'kasir/edit', 'id' => $kasir->id_member]) }}">
                    @csrf
                    <input type="hidden" name="update_login" value="1">
                    <input type="hidden" name="id" value="{{ $kasir->id_member }}">
                    
                    <div class="mb-3">
                        <label class="form-label text-white-50">Nama Pengguna (Username)</label>
                        <input type="text" name="user" class="form-control px-3 py-2" value="{{ $kasir->user }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-white-50">Kata Sandi Baru</label>
                        <input type="password" name="pass" class="form-control px-3 py-2">
                        <small class="text-white-50 mt-1 d-block">Kosongkan jika tidak ingin mengubah kata sandi</small>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 py-2.5 rounded-pill fw-semibold">Simpan Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
