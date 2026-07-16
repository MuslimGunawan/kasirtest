<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-white mb-0">Manajemen Pengguna</h3>
    @if(!request('tambah'))
        <a href="{{ route('dashboard', ['page' => 'kasir', 'tambah' => 'yes']) }}" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold">
            <i class="fa fa-user-plus me-2"></i> Tambah Pengguna
        </a>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success rounded-3 mb-4">
        {{ session('success') }}
    </div>
@endif

@if(request('tambah') === 'yes')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="premium-glass-card border-0 rounded-4 p-5 mb-5">
                <h5 class="fw-bold text-white mb-4"><i class="fa fa-user-plus me-2 text-primary"></i>Tambah Data Pengguna</h5>
                <form method="POST" enctype="multipart/form-data" action="{{ route('dashboard', ['page' => 'kasir']) }}">
                    @csrf
                    <input type="hidden" name="tambah_user" value="1">
                    <div class="mb-3">
                        <label class="form-label text-white-50">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control px-3 py-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Alamat</label>
                        <textarea name="alamat" class="form-control px-3 py-2" rows="3" required></textarea>
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
                        <label class="form-label text-white-50">NIK</label>
                        <input type="text" name="nik" class="form-control px-3 py-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Peran</label>
                        <select name="role" class="form-select" required>
                            <option value="kasir">Kasir</option>
                            <option value="manajer">Manajer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Nama Pengguna (Username)</label>
                        <input type="text" name="user" class="form-control px-3 py-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Kata Sandi</label>
                        <input type="password" name="pass" class="form-control px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-white-50">Foto Profil</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>
                    
                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold">Tambah Data</button>
                        <a href="{{ route('dashboard', ['page' => 'kasir']) }}" class="btn btn-outline-light px-4 py-2 rounded-pill fw-semibold">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@else
    <div class="premium-glass-card border-0 rounded-4 overflow-hidden mb-5">
        <div class="card-body p-4 p-md-5">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0" id="kasirTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Peran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kasir as $key => $isi)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="fw-semibold text-white">{{ $isi->nm_member }}</td>
                                <td>{{ $isi->telepon }}</td>
                                <td>
                                    @if($isi->role === 'manajer')
                                        <span class="badge bg-primary text-white rounded px-2">Manajer</span>
                                    @else
                                        <span class="badge bg-secondary bg-opacity-20 text-white rounded px-2">Kasir</span>
                                    @endif
                                </td>
                                <td>
                                    @if((int)$isi->status === 1)
                                        <span class="badge bg-success rounded px-2" style="background: rgba(25, 135, 84, 0.15) !important; color: #39e582 !important;">Aktif</span>
                                    @else
                                        <span class="badge bg-warning text-dark rounded px-2">Menunggu</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1 flex-wrap">
                                        <a href="{{ route('dashboard', ['page' => 'kasir/details', 'id' => $isi->id_member]) }}" class="btn btn-primary btn-sm px-2.5 py-1">Detail</a>
                                        <a href="{{ route('dashboard', ['page' => 'kasir/edit', 'id' => $isi->id_member]) }}" class="btn btn-warning text-dark btn-sm px-2.5 py-1">Ubah</a>
                                        @if((int)$isi->status === 0)
                                            <a href="{{ route('dashboard', ['page' => 'kasir', 'activate' => 'yes', 'id' => $isi->id_member]) }}" class="btn btn-success btn-sm px-2.5 py-1" onclick="return confirm('Aktifkan pengguna ini?');">Aktifkan</a>
                                        @else
                                            <a href="{{ route('dashboard', ['page' => 'kasir', 'deactivate' => 'yes', 'id' => $isi->id_member]) }}" class="btn btn-secondary btn-sm px-2.5 py-1" onclick="return confirm('Non-aktifkan pengguna ini?');">Non-aktif</a>
                                        @endif
                                        <a href="{{ route('dashboard', ['page' => 'kasir', 'hapus' => 'yes', 'id' => $isi->id_member]) }}" class="btn btn-danger btn-sm px-2.5 py-1" onclick="return confirm('Hapus Data Pengguna?');">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

<script>
    $(document).ready(function() {
        $('#kasirTable').DataTable({
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ baris",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Lanjut",
                    previous: "Kembali"
                }
            }
        });
    });
</script>
