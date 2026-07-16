<?php

session_start();
if (!empty($_SESSION['admin'])) {
    require '../../config/database.php';
    if (!empty($_GET['kategori'])) {
        $nama= htmlentities(htmlentities($_POST['kategori']));
        $tgl= date("j F Y, G:i");
        $data[] = $nama;
        $data[] = $tgl;
        $sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../dashboard.php?page=kategori&&success=tambah-data"</script>';
    }

    if (!empty($_GET['barang'])) {
        $id = htmlentities($_POST['id']);
        $kategori = trim(htmlentities($_POST['kategori']));
        $nama = htmlentities($_POST['nama']);
        $merk = htmlentities($_POST['merk']);
        $beli = htmlentities($_POST['beli']);
        $jual = htmlentities($_POST['jual']);
        $satuan = htmlentities($_POST['satuan']);
        $stok = htmlentities($_POST['stok']);
        $tgl = htmlentities($_POST['tgl']);

        // Cari kategori berdasarkan ID atau nama. Jika belum ada, buat baru.
        $kategori_id = null;
        if (ctype_digit($kategori)) {
            $sql = 'SELECT id_kategori FROM kategori WHERE id_kategori = ? LIMIT 1';
            $row = $config->prepare($sql);
            $row->execute(array($kategori));
            $cek = $row->fetch();
            if ($cek) {
                $kategori_id = $cek['id_kategori'];
            }
        }

        if (empty($kategori_id)) {
            $sql = 'SELECT id_kategori FROM kategori WHERE nama_kategori = ? LIMIT 1';
            $row = $config->prepare($sql);
            $row->execute(array($kategori));
            $cek = $row->fetch();
            if ($cek) {
                $kategori_id = $cek['id_kategori'];
            }
        }

        if (empty($kategori_id)) {
            $tgl_kat = date("j F Y, G:i");
            $sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
            $row = $config->prepare($sql);
            $row->execute(array($kategori, $tgl_kat));
            $kategori_id = $config->lastInsertId();
        }

        $data[] = $id;
        $data[] = $kategori_id;
        $data[] = $nama;
        $data[] = $merk;
        $data[] = $beli;
        $data[] = $jual;
        $data[] = $satuan;
        $data[] = $stok;
        $data[] = $tgl;
        $sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?) ';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../dashboard.php?page=barang&success=tambah-data"</script>';
    }
    
    if (!empty($_GET['jual'])) {
        $id = $_GET['id'];

        // get tabel barang id_barang
        $sql = 'SELECT * FROM barang WHERE id_barang = ?';
        $row = $config->prepare($sql);
        $row->execute(array($id));
        $hsl = $row->fetch();

        if ($hsl['stok'] > 0) {
            $kasir =  $_GET['id_kasir'];
            $jumlah = 1;
            $total = $hsl['harga_jual'];
            $tgl = date("j F Y, G:i");

            $data1[] = $id;
            $data1[] = $kasir;
            $data1[] = $jumlah;
            $data1[] = $total;
            $data1[] = $tgl;

            $sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';
            $row1 = $config -> prepare($sql1);
            $row1 -> execute($data1);

            echo '<script>window.location="../../dashboard.php?page=jual&success=tambah-data"</script>';
        } else {
            echo '<!DOCTYPE html>
            <html>
            <head>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: "Stok Habis!",
                        text: "Stok barang anda telah habis.",
                        icon: "error",
                        confirmButtonText: "OK"
                    }).then(function() {
                        window.location = "../../dashboard.php?page=jual#keranjang";
                    });
                </script>
            </body>
            </html>';
        }
    }
}
