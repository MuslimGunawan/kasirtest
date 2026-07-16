<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-white mb-0">Profil Pengguna</h3>
</div>

<div class="row g-4">
    <!-- Foto Card -->
    <div class="col-lg-3">
        <div class="card premium-glass-card border-0 rounded-4 overflow-hidden mb-4">
            <div class="card-header py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
                <h6 class="mb-0 fw-bold"><i class="fa fa-user me-2"></i>Foto Pengguna</h6>
            </div>
            <div class="card-body p-4 text-center">
                <img src="{{ asset('assets/img/user/' . ($user->gambar ?? 'default.jpg')) }}" alt="Foto" class="img-fluid rounded-3 mb-4" style="max-height: 200px; object-fit: cover;">
                <form method="POST" action="/fungsi/edit/edit.php?gambar=user" enctype="multipart/form-data">
                    <input type="file" accept="image/*" class="form-control mb-3" name="foto" required>
                    <input type="hidden" value="{{ $user->gambar }}" name="foto2">
                    <input type="hidden" name="id" value="{{ $user->id_member }}">
                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-2.5 fw-semibold"><i class="fas fa-edit me-1"></i>Ganti Foto</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Profil Settings Card -->
    <div class="col-lg-5">
        <div class="card premium-glass-card border-0 rounded-4 overflow-hidden mb-4">
            <div class="card-header py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
                <h6 class="mb-0 fw-bold"><i class="fa fa-edit me-2"></i>Kelola Profil</h6>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="/fungsi/edit/edit.php?profil=edit">
                    <div class="mb-3">
                        <label class="form-label text-white-50">Nama Lengkap</label>
                        <input type="text" class="form-control px-3 py-2.5" name="nama" value="{{ $user->nm_member }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Nama Pengguna (Username)</label>
                        <input type="text" class="form-control px-3 py-2.5" name="user" value="{{ $user->user }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Email</label>
                        <input type="email" class="form-control px-3 py-2.5" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Telepon</label>
                        <input type="text" class="form-control px-3 py-2.5" name="tlp" value="{{ $user->telepon }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">NIK (KTP)</label>
                        <input type="text" class="form-control px-3 py-2.5" name="nik" value="{{ $user->NIK }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-white-50">Alamat</label>
                        <textarea name="alamat" rows="3" class="form-control px-3 py-2.5" required>{{ $user->alamat_member }}</textarea>
                    </div>
                    <input type="hidden" name="id" value="{{ $user->id_member }}">
                    <button type="submit" class="btn btn-primary px-4 py-2.5 rounded-pill fw-semibold"><i class="fas fa-save me-2"></i>Simpan Profil</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Password Card -->
    <div class="col-lg-4">
        <div class="card premium-glass-card border-0 rounded-4 overflow-hidden mb-4">
            <div class="card-header py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
                <h6 class="mb-0 fw-bold"><i class="fa fa-lock me-2"></i>Ganti Kata Sandi</h6>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="/fungsi/edit/edit.php?pass=ganti-pas">
                    <div class="mb-3">
                        <label class="form-label text-white-50">Kata Sandi Lama</label>
                        <input type="password" class="form-control px-3 py-2.5" placeholder="Kata Sandi Lama" name="pass_lama" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-white-50">Kata Sandi Baru</label>
                        <input type="password" class="form-control px-3 py-2.5" placeholder="Kata Sandi Baru" name="pass_baru" required>
                    </div>
                    <input type="hidden" name="id" value="{{ $user->id_member }}">
                    <button type="submit" class="btn btn-primary px-4 py-2.5 rounded-pill fw-semibold" name="proses"><i class="fas fa-key me-2"></i>Simpan Kata Sandi</button>
                </form>
            </div>
        </div>
    </div>
</div>
