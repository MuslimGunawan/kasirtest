<?php
    $id = $_GET['id'];
    $hasil = $lihat->member_edit($id);
?>
<h4><b>Detail Kasir</b></h4>
<br>
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mt-2"><i class="fa fa-user"></i> Foto Kasir</h5>
            </div>
            <div class="card-body">
                <img src="assets/img/user/<?php echo $hasil['gambar'];?>" alt="" width="100%">
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mt-2"><i class="fa fa-user"></i> Data Kasir</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $hasil['nm_member'];?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $hasil['alamat_member'];?></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td><?php echo $hasil['telepon'];?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $hasil['email'];?></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><?php echo $hasil['NIK'];?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <?php
                                $login = $config->prepare("SELECT * FROM login WHERE id_member = ?");
                                $login->execute(array($hasil['id_member']));
                                $status = $login->fetch();
                                echo $status ? '<span class="badge badge-primary">Aktif</span>' : '<span class="badge badge-danger">Non-aktif</span>';
                            ?>
                        </td>
                    </tr>
                </table>
                <div class="float-right">
                    <a href="dashboard.php?page=kasir" class="btn btn-danger">Kembali</a>
                    <a href="dashboard.php?page=kasir&edit=yes&id=<?php echo $hasil['id_member'];?>" class="btn btn-warning">Ubah</a>
                </div>
            </div>
        </div>
    </div>
</div>

