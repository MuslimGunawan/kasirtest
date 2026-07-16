@extends('layouts.site')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">Fitur SmartKasir</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 card-hover">
                <div class="card-body">
                    <h5 class="fw-bold">Manajemen Barang</h5>
                    <p class="text-muted">Kelola stok, kategori, harga jual, dan pembelian dari satu tempat.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 card-hover">
                <div class="card-body">
                    <h5 class="fw-bold">Transaksi Cepat</h5>
                    <p class="text-muted">Proses penjualan lebih cepat dengan data pelanggan dan produk yang tersusun rapi.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 card-hover">
                <div class="card-body">
                    <h5 class="fw-bold">Laporan Real-time</h5>
                    <p class="text-muted">Pantau omzet, barang terjual, dan aktivitas penjualan secara otomatis.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
