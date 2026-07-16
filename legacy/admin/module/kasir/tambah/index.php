<?php
    if(isset($_POST['tambah'])) {
        $nama = htmlentities($_POST['nama']);
        $alamat = htmlentities($_POST['alamat']);
        $telepon = htmlentities($_POST['telepon']);
        $email = htmlentities($_POST['email']);
        $nik = htmlentities($_POST['nik']);
        $user = htmlentities($_POST['user']);
        $pass = htmlentities($_POST['pass']);
        $role = htmlentities($_POST['role']);
        $gambar = $_FILES['gambar'];
        $status = 1; // Active by default when added by admin

        // Upload gambar
        $nama_file = time() . $gambar['name'];
        move_uploaded_file($gambar['tmp_name'], 'assets/img/user/' . $nama_file);

        // Insert ke tabel member
        $data_member = array($nama, $alamat, $telepon, $email, $nama_file, $nik, $role, $status);
        $sql_member = 'INSERT INTO member (nm_member, alamat_member, telepon, email, gambar, NIK, role, status) VALUES (?,?,?,?,?,?,?,?)';
        $row_member = $config->prepare($sql_member);
        $row_member->execute($data_member);
        $id_member = $config->lastInsertId();

        // Insert ke tabel login
        $data_login = array($user, md5($pass), $id_member);
        $sql_login = 'INSERT INTO login (user, pass, id_member) VALUES (?,?,?)';
        $row_login = $config->prepare($sql_login);
        $row_login->execute($data_login);

        echo '<script>window.location="dashboard.php?page=kasir&success=tambah-data"</script>';
    }
?>

<h4><b>Tambah Pengguna</b></h4>
<br>
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mt-2"><i class="fa fa-user-plus"></i> Tambah Data Pengguna</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="telepon" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Peran</label>
                        <select name="role" class="form-control" required>
                            <option value="kasir">Kasir</option>
                            <option value="manajer">Manajer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" name="user" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kata Sandi</label>
                        <input type="password" name="pass" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                    <a href="dashboard.php?page=kasir" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
