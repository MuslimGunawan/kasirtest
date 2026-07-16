<?php
require 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
    <title>Daftar Member - SmartKasir</title>

    <!-- Custom fonts for this template-->
    <link href="sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global-overrides.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gradient-primary">

    
    <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
       
                <!-- Nested Row within Card Body -->
                <div class="p-5">
							<div class="text-center">
								<h4 class="h4 text-gray-900 mb-4"><b>Pendaftaran Member</b></h4>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="nm_member" class="form-control" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="user" class="form-control" placeholder="Nama Pengguna" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="contact" class="form-control" placeholder="Email atau No HP" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control" placeholder="Kata Sandi" required>
                                </div>
								
                                <button type="submit" value="submit" class="btn btn-primary btn-block" name="submit">Daftar Sekarang</button>
                            </form>
         <?php
            if(isset($_POST['submit'])){
                $nm_member = strip_tags($_POST['nm_member']);
                $user = strip_tags($_POST['user']);
                $contact = strip_tags($_POST['contact']);
                $pass = strip_tags($_POST['pass']);
                
                // Determine Email or Phone
                $email = '';
                $telepon = '';
                if (strpos($contact, '@') !== false) {
                    $email = $contact;
                    $telepon = '-';
                } else {
                    $telepon = $contact;
                    $email = '-';
                }

                // Default values
                $alamat_member = '-';
                $NIK = '-';
                $gambar = 'default.jpg'; // Ensure this file exists or handle it
                $status = 0; // 0 = Pending/Inactive

                try {
                    // Insert into member
                    $sql_member = "INSERT INTO member (nm_member, alamat_member, telepon, email, gambar, NIK, status) VALUES (?,?,?,?,?,?,?)";
                    $row = $config->prepare($sql_member);
                    $row->execute(array($nm_member, $alamat_member, $telepon, $email, $gambar, $NIK, $status));
                    
                    $id_member = $config->lastInsertId();
                    
                    // Insert into login
                    $sql_login = "INSERT INTO login (user, pass, id_member) VALUES (?,md5(?),?)";
                    $row_login = $config->prepare($sql_login);
                    $row_login->execute(array($user, $pass, $id_member));
                    
                    echo '<script>
                        setTimeout(function() {
                            Swal.fire({
                                title: "Pendaftaran Berhasil!",
                                text: "Silakan login dengan akun baru Anda.",
                                icon: "success",
                                confirmButtonText: "Login"
                            }).then(function() {
                                window.location = "login";
                            });
                        }, 10);
                    </script>';
                } catch(PDOException $e) {
                    echo '<script>
                        setTimeout(function() {
                            Swal.fire({
                                title: "Registrasi Gagal",
                                text: "Terjadi kesalahan: '.$e->getMessage().'",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }, 10);
                    </script>';
                }
            }
        ?>
                                <hr>
                                
                            <div class="text-center">
                                <a class="small" href="login"> <i class="fas fa-arrow-left me-1"></i> Kembali ke halaman <strong>Masuk</strong></a>
                            </div>
                            <div class="text-center mt-2">
                                <a class="small" href="index">Kembali ke Beranda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="sb-admin/js/sb-admin-2.min.js"></script>
</body>

</html>

