<a href="{{ route('dashboard', ['page' => 'barang']) }}" class="btn btn-outline-light rounded-pill px-4 mb-4"><i class="fa fa-angle-left me-2"></i> Kembali</a>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-white mb-0">Detail Barang</h3>
</div>

<div class="premium-glass-card border-0 rounded-4 p-5 mb-5">
    <div class="table-responsive">
        <table class="table align-middle text-white mb-0">
            <tr>
                <td style="width: 250px;" class="text-white-50">ID Barang</td>
                <td class="fw-bold text-primary">{{ $barang->id_barang }}</td>
            </tr>
            <tr>
                <td class="text-white-50">Kategori</td>
                <td class="text-white">{{ $barang->nama_kategori }}</td>
            </tr>
            <tr>
                <td class="text-white-50">Nama Barang</td>
                <td class="fw-semibold text-white">{{ $barang->nama_barang }}</td>
            </tr>
            <tr>
                <td class="text-white-50">Merk Barang</td>
                <td>{{ $barang->merk }}</td>
            </tr>
            <tr>
                <td class="text-white-50">Harga Beli</td>
                <td>Rp {{ number_format($barang->harga_beli, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="text-white-50">Harga Jual</td>
                <td class="fw-bold text-white">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="text-white-50">Satuan Barang</td>
                <td>{{ $barang->satuan_barang }}</td>
            </tr>
            <tr>
                <td class="text-white-50">Stok</td>
                <td><span class="badge bg-secondary bg-opacity-20 text-white rounded px-2">{{ $barang->stok }}</span></td>
            </tr>
            <tr>
                <td class="text-white-50">Tanggal Input</td>
                <td class="text-secondary">{{ $barang->tgl_input }}</td>
            </tr>
            <tr>
                <td class="text-white-50">Tanggal Update</td>
                <td class="text-secondary">{{ $barang->tgl_update ?? '-' }}</td>
            </tr>
        </table>
    </div>
</div>
