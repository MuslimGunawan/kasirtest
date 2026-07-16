<?php
    $id = $_GET['id'];
    $hasil = $lihat->member_edit($id);

    if(isset($_POST['update'])) {
        $id = htmlentities($_POST['id']);
        $nama = htmlentities($_POST['nama']);
        $alamat = htmlentities($_POST['alamat']);
        $telepon = htmlentities($_POST['telepon']);
        $email = htmlentities($_POST['email']);
        $nik = htmlentities($_POST['nik']);
        $role = htmlentities($_POST['role']); // Get Role
        $gambar = $_FILES['gambar'];

        $data = array();
        $data[] = $nama;
        $data[] = $alamat;
        $data[] = $telepon;
        $data[] = $email;
        $data[] = $nik;
        $data[] = $role; // Add Role to data

        // Jika ada gambar baru
        if(!empty($gambar['name'])) {
            $nama_file = time() . $gambar['name'];
            move_uploaded_file($gambar['tmp_name'], 'assets/img/user/' . $nama_file);
            $data[] = $nama_file;
            $sql = 'UPDATE member SET nm_member=?, alamat_member=?, telepon=?, email=?, NIK=?, role=?, gambar=? WHERE id_member=?';
        } else {
            $sql = 'UPDATE member SET nm_member=?, alamat_member=?, telepon=?, email=?, NIK=?, role=? WHERE id_member=?';
        }

        $data[] = $id;
        $row = $config->prepare($sql);
        $row->execute($data);

        echo '<script>window.location="dashboard.php?page=kasir&success=edit-data"</script>';
    }

    if(isset($_POST['update_login'])) {
        $id = htmlentities($_POST['id']);
        $user = htmlentities($_POST['user']);
        $pass = htmlentities($_POST['pass']);

        if(!empty($pass)) {
            $data = array($user, md5($pass), $id);
            $sql = 'UPDATE login SET user=?, pass=? WHERE id_member=?';
        } else {
            $data = array($user, $id);
            $sql = 'UPDATE login SET user=? WHERE id_member=?';
        }

        $row = $config->prepare($sql);
        $row->execute($data);

        echo '<script>window.location="dashboard.php?page=kasir&success=edit-data"</script>';
    }
?>

<h4><b>Ubah Data Pengguna</b></h4>
<br>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mt-2"><i class="fa fa-user"></i> Data Pengguna</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $hasil['id_member'];?>">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $hasil['nm_member'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required><?php echo $hasil['alamat_member'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="telepon" class="form-control" value="<?php echo $hasil['telepon'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $hasil['email'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" value="<?php echo $hasil['NIK'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Peran</label>
                        <select name="role" class="form-control" required>
                            <option value="kasir" <?php echo $hasil['role'] == 'kasir' ? 'selected' : '';?>>Kasir</option>
                            <option value="manajer" <?php echo $hasil['role'] == 'manajer' ? 'selected' : '';?>>Manajer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="gambar" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="dashboard.php?page=kasir" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mt-2"><i class="fa fa-lock"></i> Data Login</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $hasil['id_member'];?>">
                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" name="user" class="form-control" value="<?php echo $hasil['user'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Kata Sandi</label>
                        <input type="password" name="pass" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah kata sandi</small>
                    </div>
                    <button type="submit" name="update_login" class="btn btn-primary">Simpan Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
