<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-white mb-0">Pengaturan Toko</h3>
</div>

<div class="premium-glass-card border-0 rounded-4 p-5 mb-5">
    <form method="POST" action="/fungsi/edit/edit.php?pengaturan=ubah">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label text-white-50">Nama Toko</label>
                    <input type="text" class="form-control px-3 py-2.5" name="namatoko" value="{{ $toko->nama_toko }}" placeholder="Nama Toko" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-white-50">Alamat Toko</label>
                    <input type="text" class="form-control px-3 py-2.5" name="alamat" value="{{ $toko->alamat_toko }}" placeholder="Alamat Toko" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label text-white-50">Kontak (Hp)</label>
                    <input type="text" class="form-control px-3 py-2.5" name="kontak" value="{{ $toko->tlp }}" placeholder="Kontak (Hp)" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-white-50">Nama Pemilik Toko</label>
                    <input type="text" class="form-control px-3 py-2.5" name="pemilik" value="{{ $toko->nama_pemilik }}" placeholder="Nama Pemilik Toko" required>
                </div>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-5 py-2.5 fw-semibold"><i class="fas fa-edit me-2"></i> Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>
