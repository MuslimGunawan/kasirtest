@extends('layouts.site')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Dashboard</h2>
            <p class="text-muted mb-0">Selamat datang, {{ session('admin')['nm_member'] ?? 'Admin' }}</p>
        </div>
        <a href="{{ route('logout') }}" class="btn btn-outline-danger">Logout</a>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Transaksi</h6>
                    <h3 class="fw-bold">{{ $stats['transaksi'] }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Barang</h6>
                    <h3 class="fw-bold">{{ $stats['barang'] }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Terjual</h6>
                    <h3 class="fw-bold">{{ $stats['terjual'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Riwayat Penjualan Terbaru</h5>
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($recentSales as $sale)
                        <tr>
                            <td>{{ $sale->id_nota }}</td>
                            <td>{{ $sale->nama_barang }}</td>
                            <td>{{ $sale->jumlah }}</td>
                            <td>Rp {{ number_format($sale->total, 0, ',', '.') }}</td>
                            <td>{{ $sale->tanggal_input }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data penjualan.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
