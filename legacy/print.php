<?php 
	@ob_start();
	session_start();
	if(!empty($_SESSION['admin'])){ }else{
		echo '<script>window.location="login";</script>';
        exit;
	}
	require 'config/database.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();
	$hsl = $lihat -> penjualan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Struk Pembayaran - <?php echo $toko['nama_toko'];?></title>
    <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/global-overrides.css">
	<style>
        body {
            background-color: #f8f9fa;
            font-family: 'Courier New', Courier, monospace; /* Monospace for receipt look */
        }
        .receipt-container {
            background: white;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            max-width: 400px; /* Typical receipt width */
            margin-left: auto;
            margin-right: auto;
            border-top: 5px solid #1cc88a; /* Brand color */
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px dashed #ddd;
            padding-bottom: 15px;
        }
        .receipt-header h4 {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .receipt-header p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
        }
        .receipt-details {
            margin-bottom: 15px;
            font-size: 0.85rem;
        }
        .receipt-details .row {
            margin-bottom: 5px;
        }
        .table-receipt {
            width: 100%;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }
        .table-receipt th {
            border-bottom: 1px solid #000;
            text-align: left;
            padding: 5px 0;
        }
        .table-receipt td {
            padding: 5px 0;
            vertical-align: top;
        }
        .table-receipt .item-name {
            font-weight: 600;
        }
        .table-receipt .item-qty {
            text-align: center;
        }
        .table-receipt .item-total {
            text-align: right;
        }
        .receipt-summary {
            border-top: 2px dashed #ddd;
            padding-top: 10px;
            margin-bottom: 20px;
        }
        .receipt-summary .row {
            margin-bottom: 5px;
        }
        .receipt-summary .total-row {
            font-weight: bold;
            font-size: 1.1rem;
            border-top: 1px solid #ddd;
            padding-top: 5px;
            margin-top: 5px;
        }
        .receipt-footer {
            text-align: center;
            border-top: 2px dashed #ddd;
            padding-top: 15px;
            font-size: 0.85rem;
            color: #666;
        }
        @media print {
            body {
                background: none;
            }
            .receipt-container {
                box-shadow: none;
                border: none;
                margin: 0;
                width: 100%;
                max-width: 100%;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
	<div class="container">
        <div class="receipt-container">
            <div class="receipt-header">
                <h4><?php echo $toko['nama_toko'];?></h4>
                <p><?php echo $toko['alamat_toko'];?></p>
                <p><i class="fas fa-phone-alt me-1"></i> <?php echo $toko['tlp'];?></p>
            </div>

            <div class="receipt-details">
                <div class="row">
                    <div class="col-6">Tanggal</div>
                    <div class="col-6 text-end"><?php echo date("d/m/Y H:i");?></div>
                </div>
                <div class="row">
                    <div class="col-6">Kasir</div>
                    <div class="col-6 text-end"><?php echo htmlentities($_GET['nm_member']);?></div>
                </div>
                <div class="row">
                    <div class="col-6">No. Struk</div>
                    <div class="col-6 text-end">#<?php echo date("YmdHis");?></div>
                </div>
            </div>

            <table class="table-receipt">
                <thead>
                    <tr>
                        <th width="50%">Item</th>
                        <th width="15%" class="text-center">Qty</th>
                        <th width="35%" class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($hsl as $isi){?>
                    <tr>
                        <td class="item-name"><?php echo $isi['nama_barang'];?></td>
                        <td class="item-qty"><?php echo $isi['jumlah'];?></td>
                        <td class="item-total">Rp.<?php echo number_format($isi['total']);?></td>
                    </tr>
                    <?php $no++; }?>
                </tbody>
            </table>

            <div class="receipt-summary">
                <?php $hasil = $lihat -> jumlah(); ?>
                <div class="row">
                    <div class="col-6">Total Belanja</div>
                    <div class="col-6 text-end">Rp.<?php echo number_format($hasil['bayar']);?></div>
                </div>
                <div class="row">
                    <div class="col-6">Tunai</div>
                    <div class="col-6 text-end">Rp.<?php echo number_format(htmlentities($_GET['bayar']));?></div>
                </div>
                <div class="row total-row">
                    <div class="col-6">Kembali</div>
                    <div class="col-6 text-end">Rp.<?php echo number_format(htmlentities($_GET['kembali']));?></div>
                </div>
            </div>

            <div class="receipt-footer">
                <p>Terima Kasih Telah Berbelanja!</p>
                <p>Barang yang sudah dibeli tidak dapat ditukar/dikembalikan.</p>
                <p class="mt-2"><small>Powered by SmartKasir</small></p>
            </div>
        </div>
        
        <div class="text-center mt-4 no-print">
            <button onclick="window.print()" class="btn btn-primary me-2"><i class="fas fa-print me-1"></i> Cetak</button>
            <a href="index" class="btn btn-secondary"><i class="fas fa-home me-1"></i> Kembali</a>
        </div>
	</div>

    <script>
        // Auto print when page loads
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
