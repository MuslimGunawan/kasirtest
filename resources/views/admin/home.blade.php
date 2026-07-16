@if(session('admin')['alamat_member'] === '-' || session('admin')['NIK'] === '-' || session('admin')['email'] === '-' || session('admin')['telepon'] === '-')
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: "Lengkapi Profil Anda!",
                text: "Data profil Anda belum lengkap (Alamat, NIK, Email, atau Telepon). Silahkan lengkapi data diri Anda.",
                icon: "info",
                showCancelButton: true,
                confirmButtonText: "Lengkapi Sekarang",
                cancelButtonText: "Nanti Saja",
                confirmButtonColor: "#a855f7",
                background: "#14141c",
                color: "#ffffff"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "{{ route('dashboard', ['page' => 'user']) }}";
                }
            });
        });
    </script>
@endif

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-white mb-0">Dasbor</h3>
</div>

@if($lowStockCount > 0)
    <div class="alert alert-warning d-flex align-items-center justify-content-between mb-4 p-3 rounded-3" role="alert">
        <div>
            <i class="fas fa-exclamation-triangle me-2"></i>
            Ada <strong>{{ $lowStockCount }}</strong> barang yang stoknya kurang dari atau sama dengan 3 item. Silakan pesan lagi!
        </div>
        <a href="{{ route('dashboard', ['page' => 'barang']) }}" class="btn btn-warning btn-sm rounded-pill px-3">Tabel Barang <i class="fas fa-angle-double-right ms-1"></i></a>
    </div>
@endif

<div class="row g-4">
    <!-- Nama Barang -->
    <div class="col-md-3">
        <div class="card premium-glass-card h-100 border-0 rounded-4 overflow-hidden">
            <div class="card-header bg-success text-white py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
                <h6 class="mb-0 fw-bold"><i class="fas fa-cubes me-2"></i> Nama Barang</h6>
            </div>
            <div class="card-body d-flex align-items-center justify-content-center py-4">
                <h1 class="display-4 fw-bold text-white mb-0">{{ number_format($jml_barang) }}</h1>
            </div>
            <div class="card-footer bg-transparent border-top border-white-5 opacity-75 text-center">
                <a href="{{ route('dashboard', ['page' => 'barang']) }}" class="text-decoration-none">Tabel Barang <i class="fa fa-angle-double-right ms-1"></i></a>
            </div>
        </div>
    </div>
    
    <!-- Stok Barang -->
    <div class="col-md-3">
        <div class="card premium-glass-card h-100 border-0 rounded-4 overflow-hidden">
            <div class="card-header bg-success text-white py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
                <h6 class="mb-0 fw-bold"><i class="fas fa-chart-bar me-2"></i> Stok Barang</h6>
            </div>
            <div class="card-body d-flex align-items-center justify-content-center py-4">
                <h1 class="display-4 fw-bold text-white mb-0">{{ number_format($stok) }}</h1>
            </div>
            <div class="card-footer bg-transparent border-top border-white-5 opacity-75 text-center">
                <a href="{{ route('dashboard', ['page' => 'barang']) }}" class="text-decoration-none">Tabel Barang <i class="fa fa-angle-double-right ms-1"></i></a>
            </div>
        </div>
    </div>
    
    <!-- Telah Terjual -->
    @if(session('role') !== 'kasir')
        <div class="col-md-3">
            <div class="card premium-glass-card h-100 border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-success text-white py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
                    <h6 class="mb-0 fw-bold"><i class="fas fa-upload me-2"></i> Telah Terjual</h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center py-4">
                    <h1 class="display-4 fw-bold text-white mb-0">{{ number_format($jual) }}</h1>
                </div>
                <div class="card-footer bg-transparent border-top border-white-5 opacity-75 text-center">
                    <a href="{{ route('dashboard', ['page' => 'laporan']) }}" class="text-decoration-none">Tabel Laporan <i class="fa fa-angle-double-right ms-1"></i></a>
                </div>
            </div>
        </div>
    @endif
    
    <!-- Kategori Barang -->
    <div class="col-md-3">
        <div class="card premium-glass-card h-100 border-0 rounded-4 overflow-hidden">
            <div class="card-header bg-success text-white py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
                <h6 class="mb-0 fw-bold"><i class="fa fa-bookmark me-2"></i> Kategori Barang</h6>
            </div>
            <div class="card-body d-flex align-items-center justify-content-center py-4">
                <h1 class="display-4 fw-bold text-white mb-0">{{ number_format($jml_kategori) }}</h1>
            </div>
            <div class="card-footer bg-transparent border-top border-white-5 opacity-75 text-center">
                <a href="{{ route('dashboard', ['page' => 'kategori']) }}" class="text-decoration-none">Tabel Kategori <i class="fa fa-angle-double-right ms-1"></i></a>
            </div>
        </div>
    </div>
</div>
