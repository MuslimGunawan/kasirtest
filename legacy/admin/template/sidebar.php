<!--sidebar start-->
<?php 
    $id = $_SESSION['admin']['id_member'];
    $hasil_profil = $lihat -> member_edit($id);
    $role = $_SESSION['role'];
    $status = isset($_SESSION['status']) ? $_SESSION['status'] : 1;
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <script>
        if (localStorage.getItem('sidebar-toggled') === 'true') {
            document.getElementById('accordionSidebar').classList.add('toggled');
        }
    </script>

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cash-register"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SmartKasir<sup></sup></div>
    </a>

    <script>
        if (localStorage.getItem('sidebar-toggled') === 'true') {
            document.getElementById('accordionSidebar').classList.add('toggled');
        }
    </script>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dasbor</span></a>
    </li>

    <?php if($status == 1): ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <!-- <div class="sidebar-heading">
           Master
       </div> -->
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="dashboard?page=barang">Barang</a>
                <a class="collapse-item" href="dashboard?page=kategori">Kategori</a>
            </div>
        </div>
    </li>

    <!-- Transaksi Menu -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true"
            aria-controls="collapse3">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php if($role == 'kasir' || $role == 'manajer'): ?>
                <a class="collapse-item" href="dashboard?page=jual">Transaksi Jual</a>
                <?php endif; ?>
                <?php if($role == 'manajer'): ?>
                <a class="collapse-item" href="dashboard?page=laporan">Laporan Penjualan</a>
                <?php endif; ?>
            </div>
        </div>
    </li>

    <?php if($role == 'manajer'): ?>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="dashboard?page=kasir">
            <i class="fas fa-fw fa-users"></i>
            <span>Manajemen Kasir</span></a>
    </li>
    <?php endif; ?>
    <?php if($role == 'manajer'): ?>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="dashboard?page=pengaturan">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Pengaturan Toko</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="dashboard?page=pesan">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Pesan Kontak</span></a>
    </li>
    <?php endif; ?>
    <?php endif; // End status check ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <h5 class="d-lg-block d-none mt-2"><b><?php echo $toko['nama_toko'];?>, <?php echo $toko['alamat_toko'];?></b></h5>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
                <!-- Topbar Search -->
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle"
                            src="assets/img/user/<?php echo $hasil_profil['gambar'];?>">
                        <span
                            class="mr-2 d-none d-lg-inline text-gray-600 small ml-2"><?php echo $hasil_profil['nm_member'];?></span>
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="dashboard.php?page=user">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
