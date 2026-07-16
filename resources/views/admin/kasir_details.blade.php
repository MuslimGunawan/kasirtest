<a href="{{ route('dashboard', ['page' => 'kasir']) }}" class="btn btn-outline-light rounded-pill px-4 mb-4"><i class="fa fa-angle-left me-2"></i> Kembali</a>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-white mb-0">Detail Kasir</h3>
</div>

<div class="row g-4">
    <div class="col-sm-4">
        <div class="card premium-glass-card border-0 rounded-4 overflow-hidden mb-4">
            <div class="card-header py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
                <h5 class="mb-0 fw-bold"><i class="fa fa-user me-2"></i> Foto Kasir</h5>
            </div>
            <div class="card-body p-4 text-center">
                <img src="{{ asset('assets/img/user/' . ($kasir->gambar ?? 'default.jpg')) }}" alt="Foto Kasir" class="img-fluid rounded-3 mb-3" style="max-height: 250px; object-fit: cover; width: 100%;">
            </div>
        </div>
    </div>
    
    <div class="col-sm-8">
        <div class="card premium-glass-card border-0 rounded-4 overflow-hidden mb-4">
            <div class="card-header py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
                <h5 class="mb-0 fw-bold"><i class="fa fa-database me-2"></i> Data Kasir</h5>
            </div>
            <div class="card-body p-4">
                <table class="table align-middle text-white mb-0">
                    <tr>
                        <td style="width: 200px;" class="text-white-50">Nama</td>
                        <td>{{ $kasir->nm_member }}</td>
                    </tr>
                    <tr>
                        <td class="text-white-50">Alamat</td>
                        <td>{{ $kasir->alamat_member }}</td>
                    </tr>
                    <tr>
                        <td class="text-white-50">Telepon</td>
                        <td>{{ $kasir->telepon }}</td>
                    </tr>
                    <tr>
                        <td class="text-white-50">Email</td>
                        <td>{{ $kasir->email }}</td>
                    </tr>
                    <tr>
                        <td class="text-white-50">NIK</td>
                        <td>{{ $kasir->NIK }}</td>
                    </tr>
                    <tr>
                        <td class="text-white-50">Peran</td>
                        <td>
                            @if($kasir->role === 'manajer')
                                <span class="badge bg-primary text-white rounded px-2">Manajer</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-20 text-white rounded px-2">Kasir</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-white-50">Status</td>
                        <td>
                            @if((int)$kasir->status === 1)
                                <span class="badge bg-success rounded px-2" style="background: rgba(25, 135, 84, 0.15) !important; color: #39e582 !important;">Aktif</span>
                            @else
                                <span class="badge bg-warning text-dark rounded px-2">Menunggu</span>
                            @endif
                        </td>
                    </tr>
                </table>
                <div class="d-flex gap-2 justify-content-end mt-4">
                    <a href="{{ route('dashboard', ['page' => 'kasir/edit', 'id' => $kasir->id_member]) }}" class="btn btn-warning px-4 py-2 rounded-pill fw-semibold"><i class="fa fa-edit me-1"></i> Ubah</a>
                </div>
            </div>
        </div>
    </div>
</div>
