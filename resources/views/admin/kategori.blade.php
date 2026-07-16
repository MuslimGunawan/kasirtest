@php
    $uid = request('uid');
    $editKategori = null;
    if ($uid) {
        $editKategori = DB::table('kategori')->where('id_kategori', $uid)->first();
    }
@endphp

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-white mb-0">Kategori</h3>
</div>

<div class="premium-glass-card border-0 rounded-4 p-4 mb-4">
    @if($editKategori)
        <h5 class="fw-bold text-white mb-3"><i class="fa fa-edit me-2 text-warning"></i>Ubah Kategori</h5>
        <form method="POST" action="/fungsi/edit/edit.php?kategori=edit">
            <div class="d-flex gap-2 align-items-center flex-wrap">
                <div class="flex-grow-1" style="min-width: 250px;">
                    <input type="text" class="form-control py-2 px-3" value="{{ $editKategori->nama_kategori }}" required name="kategori" placeholder="Masukkan Kategori Barang Baru">
                    <input type="hidden" name="id" value="{{ $editKategori->id_kategori }}">
                </div>
                <button type="submit" class="btn btn-warning px-4 py-2 rounded-pill fw-semibold"><i class="fa fa-edit me-2"></i>Ubah Data</button>
                <a href="{{ route('dashboard', ['page' => 'kategori']) }}" class="btn btn-outline-light px-4 py-2 rounded-pill fw-semibold">Batal</a>
            </div>
        </form>
    @else
        @if(session('role') !== 'kasir')
            <h5 class="fw-bold text-white mb-3"><i class="fa fa-plus me-2 text-primary"></i>Tambah Kategori</h5>
            <form method="POST" action="/fungsi/tambah/tambah.php?kategori=tambah">
                <div class="d-flex gap-2 align-items-center flex-wrap">
                    <div class="flex-grow-1" style="min-width: 250px;">
                        <input type="text" class="form-control py-2 px-3" required name="kategori" placeholder="Masukkan Kategori Barang Baru">
                    </div>
                    <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold"><i class="fa fa-plus me-2"></i>Tambah Data</button>
                </div>
            </form>
        @endif
    @endif
</div>

<div class="premium-glass-card border-0 rounded-4 overflow-hidden mb-5">
    <div class="card-body p-4 p-md-5">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" id="kategoriTable">
                <thead>
                    <tr>
                        <th style="width: 80px;">No.</th>
                        <th>Kategori</th>
                        <th>Tanggal Input</th>
                        @if(session('role') !== 'kasir')
                            <th style="width: 200px;">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategori as $key => $isi)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="fw-semibold text-white">{{ $isi->nama_kategori }}</td>
                            <td class="text-secondary">{{ $isi->tgl_input }}</td>
                            @if(session('role') !== 'kasir')
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('dashboard', ['page' => 'kategori', 'uid' => $isi->id_kategori]) }}" class="btn btn-warning btn-sm px-3 py-1.5"><i class="fa fa-edit me-1"></i>Ubah</a>
                                        <a href="/fungsi/hapus/hapus.php?kategori=hapus&id={{ $isi->id_kategori }}" class="btn btn-danger btn-sm px-3 py-1.5" onclick="return confirm('Hapus Data Kategori?');"><i class="fa fa-trash me-1"></i>Hapus</a>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#kategoriTable').DataTable({
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
