<?php 
    @ob_start();
    session_start();

    if(!empty($_SESSION['admin'])){
        require 'config/database.php';
        include $view;
        $lihat = new view($config);
        $toko = $lihat -> toko();
        $role = $_SESSION['role'];
        $status = isset($_SESSION['status']) ? $_SESSION['status'] : 1; // Default to 1 if not set (backward compatibility)

        //  admin
        include 'admin/template/header.php';
        include 'admin/template/sidebar.php';
        if(!empty($_GET['page'])) {
            // Check status first
            if($status == 0 && $_GET['page'] != 'user') {
                 echo '<script>
                    Swal.fire({
                        title: "Akun Belum Aktif!",
                        text: "Akun Anda sedang menunggu konfirmasi dari Admin. Anda belum bisa mengakses menu lain.",
                        icon: "warning",
                        confirmButtonText: "OK"
                    }).then(function() {
                        window.location = "dashboard.php";
                    });
                </script>';
            } else {
                // Cek akses berdasarkan role
                $manajer_only = ['laporan', 'pengaturan', 'kasir', 'pesan'];
                $kasir_only = [];
                
                if($role == 'manajer' && in_array($_GET['page'], $kasir_only)) {
                    echo '<script>
                        Swal.fire({
                            title: "Akses Ditolak!",
                            text: "Anda tidak memiliki akses ke halaman ini.",
                            icon: "warning",
                            confirmButtonText: "OK"
                        }).then(function() {
                            window.location = "dashboard.php";
                        });
                    </script>';
                } 
                else if($role == 'kasir' && in_array($_GET['page'], $manajer_only)) {
                    echo '<script>
                        Swal.fire({
                            title: "Akses Ditolak!",
                            text: "Anda tidak memiliki akses ke halaman ini.",
                            icon: "warning",
                            confirmButtonText: "OK"
                        }).then(function() {
                            window.location = "dashboard.php";
                        });
                    </script>';
                }
                else {
                    if($_GET['page'] == 'kasir') {
                        if(isset($_GET['tambah'])) {
                            include 'admin/module/kasir/tambah/index.php';
                        }
                        else if(isset($_GET['edit'])) {
                            include 'admin/module/kasir/edit/index.php';
                        }
                        else if(isset($_GET['details'])) {
                            include 'admin/module/kasir/details/index.php';
                        }
                        else {
                            include 'admin/module/kasir/index.php';
                        }
                    } else {
                        include 'admin/module/'.$_GET['page'].'/index.php';
                    }
                }
            }
        }else{
            include 'admin/template/home.php';
        }
        include 'admin/template/footer.php';
    }else{
        echo '<script>window.location="login.php";</script>';
        exit;
    }
?>

