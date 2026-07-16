<?php
    $id = $_SESSION['admin']['id_member'];
    $hasil = $lihat -> member_edit($id);

    if(isset($_GET['hapus'])){
        $id_member = $_GET['id'];
        try {
            // Delete dependent records first
            $delete_login = $config->prepare("DELETE FROM login WHERE id_member = ?");
            $delete_login->execute(array($id_member));
            
            $delete_nota = $config->prepare("DELETE FROM nota WHERE id_member = ?");
            $delete_nota->execute(array($id_member));

            $delete_penjualan = $config->prepare("DELETE FROM penjualan WHERE id_member = ?");
            $delete_penjualan->execute(array($id_member));

            // Finally delete member
            $delete_member = $config->prepare("DELETE FROM member WHERE id_member = ?");
            $delete_member->execute(array($id_member));
            
            echo '<script>window.location="dashboard.php?page=kasir&success=hapus-data"</script>';
        } catch(PDOException $e) {
            echo '<script>
                alert("Gagal menghapus data: '.$e->getMessage().'");
                window.location="dashboard.php?page=kasir";
            </script>';
        }
    }

    if(isset($_GET['activate'])){
        $id_member = $_GET['id'];
        $sql = "UPDATE member SET status = 1 WHERE id_member = ?";
        $row = $config->prepare($sql);
        $row->execute(array($id_member));
        echo '<script>window.location="dashboard.php?page=kasir"</script>';
    }

    if(isset($_GET['deactivate'])){
        $id_member = $_GET['id'];
        $sql = "UPDATE member SET status = 0 WHERE id_member = ?";
        $row = $config->prepare($sql);
        $row->execute(array($id_member));
        echo '<script>window.location="dashboard.php?page=kasir"</script>';
    }
?>

<h4><b>Manajemen Pengguna</b></h4>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <a href="dashboard.php?page=kasir&tambah=yes" class="btn btn-primary btn-md pull-right">
                    <i class="fa fa-plus"></i> Tambah Pengguna</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="example1">
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
                        <?php
                            $no = 1;
                            // List all members
                            $query = "SELECT * FROM member ORDER BY id_member DESC";
                            $row = $config->prepare($query);
                            $row->execute();
                            $hasil = $row->fetchAll();
                            foreach($hasil as $r){
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $r['nm_member'];?></td>
                            <td><?php echo $r['telepon'];?></td>
                            <td>
                                <?php 
                                    if($r['role'] == 'manajer'){
                                        echo '<span class="badge badge-primary">Manajer</span>';
                                    } else {
                                        echo '<span class="badge badge-secondary">Kasir</span>';
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    if($r['status'] == 1){
                                        echo '<span class="badge badge-primary">Aktif</span>';
                                    } else {
                                        echo '<span class="badge badge-warning">Menunggu</span>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="dashboard.php?page=kasir&details=yes&id=<?php echo $r['id_member'];?>" 
                                   class="btn btn-info btn-sm">Detail</a>
                                <a href="dashboard.php?page=kasir&edit=yes&id=<?php echo $r['id_member'];?>" 
                                   class="btn btn-warning btn-sm">Ubah</a>
                                
                                <?php if($r['status'] == 0) { ?>
                                    <a href="dashboard.php?page=kasir&activate=yes&id=<?php echo $r['id_member'];?>" 
                                       class="btn btn-primary btn-sm" onclick="return confirm('Aktifkan pengguna ini?');">Aktifkan</a>
                                <?php } else { ?>
                                    <a href="dashboard.php?page=kasir&deactivate=yes&id=<?php echo $r['id_member'];?>" 
                                       class="btn btn-secondary btn-sm" onclick="return confirm('Non-aktifkan pengguna ini?');">Non-aktif</a>
                                <?php } ?>

                                <a href="dashboard.php?page=kasir&hapus=yes&id=<?php echo $r['id_member'];?>" 
                                   onclick="javascript:return confirm('Hapus Data Pengguna ?');"
                                   class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php $no++; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

