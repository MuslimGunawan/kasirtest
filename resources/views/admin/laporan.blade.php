@php
    $cari = request('cari');
    $hari = request('hari');
    
    $query = DB::table('nota')
        ->leftJoin('barang', 'nota.id_barang', '=', 'barang.id_barang')
        ->leftJoin('member', 'nota.id_member', '=', 'member.id_member')
        ->select('nota.*', 'barang.nama_barang', 'barang.harga_beli', 'member.nm_member');
        
    if ($cari === 'ok') {
        $periode = request('bln') . '-' . request('thn');
        $query->where('nota.periode', $periode);
        $title = "Laporan Penjualan Periode " . request('bln') . " / " . request('thn');
    } elseif ($hari === 'cek') {
        $tgl = request('hari');
        $query->where('nota.tanggal_input', 'LIKE', '%' . $tgl . '%');
        $title = "Laporan Penjualan Tanggal " . $tgl;
    } else {
        $periode = date('m-Y');
        $query->where('nota.periode', $periode);
        $title = "Laporan Penjualan Bulan Ini (" . date('F Y') . ")";
    }
    
    $hasil = $query->orderByDesc('nota.id_nota')->get();
    
    $bayar = 0;
    $jumlah = 0;
    $modal = 0;
@endphp

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-white mb-0">{{ $title }}</h3>
</div>

<div class="card premium-glass-card border-0 rounded-4 overflow-hidden mb-4">
    <div class="card-header py-3" style="background: rgba(168, 85, 247, 0.1) !important; border-bottom: 1px solid rgba(168, 85, 247, 0.2) !important; color: #c084fc !important;">
        <h5 class="mb-0 fw-bold"><i class="fa fa-search me-2"></i>Cari Laporan</h5>
    </div>
    <div class="card-body p-0">
        <!-- Form Bulanan -->
        <form method="POST" action="/dashboard?page=laporan&cari=ok">
            @csrf
            <table class="table align-middle text-white mb-0" style="background: transparent !important;">
                <thead>
                    <tr>
                        <th style="border-top: none; border-bottom: none;">Pilih Bulan</th>
                        <th style="border-top: none; border-bottom: none;">Pilih Tahun</th>
                        <th style="border-top: none; border-bottom: none;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="bln" class="form-select" required>
                                <option value="">Bulan</option>
                                @foreach(['01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'] as $key => $val)
                                    <option value="{{ $key }}" {{ request('bln') === $key ? 'selected' : '' }}>{{ $val }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="thn" class="form-select" required>
                                <option value="">Tahun</option>
                                @for($y = 2017; $y <= date('Y'); $y++)
                                    <option value="{{ $y }}" {{ request('thn') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary px-4"><i class="fa fa-search me-1"></i> Cari</button>
                                <a href="{{ route('dashboard', ['page' => 'laporan']) }}" class="btn btn-outline-light px-3"><i class="fa fa-refresh me-1"></i> Segarkan</a>
                                @if($cari === 'ok')
                                    <a href="/excel.php?cari=yes&bln={{ request('bln') }}&thn={{ request('thn') }}" class="btn btn-success px-3"><i class="fa fa-download me-1"></i> Excel</a>
                                @else
                                    <a href="/excel.php" class="btn btn-success px-3"><i class="fa fa-download me-1"></i> Excel</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

        <!-- Form Harian -->
        <form method="POST" action="/dashboard?page=laporan&hari=cek">
            @csrf
            <table class="table align-middle text-white mb-0" style="background: transparent !important; border-top: 1px solid rgba(255,255,255,0.05);">
                <thead>
                    <tr>
                        <th style="border-bottom: none;">Pilih Hari</th>
                        <th style="border-bottom: none;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="date" value="{{ request('hari') ?? date('Y-m-d') }}" class="form-control" name="hari" required>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary px-4"><i class="fa fa-search me-1"></i> Cari</button>
                                <a href="{{ route('dashboard', ['page' => 'laporan']) }}" class="btn btn-outline-light px-3"><i class="fa fa-refresh me-1"></i> Segarkan</a>
                                @if($hari === 'cek')
                                    <a href="/excel.php?hari=cek&tgl={{ request('hari') }}" class="btn btn-success px-3"><i class="fa fa-download me-1"></i> Excel</a>
                                @else
                                    <a href="/excel.php" class="btn btn-success px-3"><i class="fa fa-download me-1"></i> Excel</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
            </div>
        </div>
    </div>
</div>

<div class="premium-glass-card border-0 rounded-4 overflow-hidden mb-5">
    <div class="card-body p-4 p-md-5">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" id="laporanTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th style="width: 10%;">Jumlah</th>
                        <th style="width: 15%;">Modal</th>
                        <th style="width: 15%;">Total Penjualan</th>
                        <th>Kasir</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hasil as $key => $isi)
                        @php
                            $bayar += $isi->total;
                            $modal += $isi->harga_beli * $isi->jumlah;
                            $jumlah += $isi->jumlah;
                        @endphp
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="fw-bold" style="color: #c084fc;">{{ $isi->id_barang }}</td>
                            <td class="fw-semibold text-white">{{ $isi->nama_barang }}</td>
                            <td><span class="badge bg-secondary bg-opacity-20 text-white rounded px-2">{{ $isi->jumlah }}</span></td>
                            <td>Rp {{ number_format($isi->harga_beli * $isi->jumlah, 0, ',', '.') }}</td>
                            <td class="fw-bold text-white">Rp {{ number_format($isi->total, 0, ',', '.') }}</td>
                            <td>{{ $isi->nm_member }}</td>
                            <td class="text-secondary">{{ $isi->tanggal_input }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="fw-bold text-white">
                        <td colspan="3" class="text-end">Summary:</td>
                        <td>{{ number_format($jumlah) }} Pcs</td>
                        <td>Rp {{ number_format($modal, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($bayar, 0, ',', '.') }}</td>
                        <td style="background: rgba(25, 135, 84, 0.15) !important; color: #39e582 !important;">Untung Bersih:</td>
                        <td style="background: rgba(25, 135, 84, 0.15) !important; color: #39e582 !important;">Rp {{ number_format($bayar - $modal, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#laporanTable').DataTable({
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
