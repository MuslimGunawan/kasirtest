<?php
    @ob_start();
    session_start();
    $login_success = false;
    $login_error = false;
    $member_name = '';

    if(isset($_POST['proses'])){
        require 'config/database.php';
            
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);

        $sql = 'select member.*, login.user, login.pass
                from member inner join login on member.id_member = login.id_member
                where user =? and pass = md5(?)';
        $row = $config->prepare($sql);
        $row -> execute(array($user,$pass));
        $jum = $row -> rowCount();
        if($jum > 0){
            $hasil = $row -> fetch();
            $_SESSION['admin'] = $hasil;
            $_SESSION['role'] = $hasil['role'];
            $_SESSION['status'] = $hasil['status'];
            $login_success = true;
            $member_name = $hasil['nm_member'];
        }else{
            $login_error = true;
        }
    }
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
    <title>Login - SmartKasir</title>
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
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
						<div class="p-5">
							<div class="text-center">
								<h4 class="h4 text-gray-900 mb-4"><b><i class="fas fa-cash-register me-2"></i> Login SmartKasir</b></h4>
							</div>
							<form class="form-login" method="POST">
								<div class="form-group">
									<input type="text" class="form-control form-control-user" name="user" id="user"
										placeholder="Nama Pengguna" autofocus>
								</div>
								<div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-user" name="pass" id="pass"
                                            placeholder="Kata Sandi">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-transparent border-0" style="cursor: pointer; margin-left: -40px; z-index: 100;" onclick="togglePassword()">
                                                <i class="fa fa-eye" id="toggleIcon"></i>
                                            </span>
                                        </div>
                                    </div>
								</div>
								<button class="btn btn-primary btn-block btn-user" name="proses" type="submit">
									<i class="fas fa-sign-in-alt mr-2"></i> Masuk
                                </button>
							</form>
							
							<hr>
							
							<div class="text-center">
								<a class="small" href="registrasi">Belum punya akun? <strong>Daftar di sini</strong></a>
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
    
    <script>
        <?php if($login_success): ?>
        Swal.fire({
            title: "Selamat Datang!",
            text: "Senang melihat Anda kembali, <?php echo $member_name; ?>!",
            icon: "success",
            timer: 2000,
            showConfirmButton: false,
            backdrop: `
                rgba(234, 21, 42, 0.4)
                left top
                no-repeat
            `
        }).then(function() {
            window.location = "dashboard.php";
        });
        <?php endif; ?>

        <?php if($login_error): ?>
        Swal.fire({
            title: "Akses Ditolak",
            text: "Username atau Password yang Anda masukkan salah. Silakan coba lagi.",
            icon: "error",
            confirmButtonText: "Coba Lagi",
            confirmButtonColor: "rgb(63, 30, 183)"
        });
        <?php endif; ?>

        // Enter key to move to password field
        document.getElementById('user').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                document.getElementById('pass').focus();
            }
        });

        // Toggle Password Visibility
        function togglePassword() {
            var passwordInput = document.getElementById('pass');
            var toggleIcon = document.getElementById('toggleIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
