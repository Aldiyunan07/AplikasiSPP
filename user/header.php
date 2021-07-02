<?php
include '../admin/koneksi.php';
session_start();
if($_SESSION['status'] != "loginsiswa"){
header("location:login.php?pesan=belum_login");
}
$id   = $_SESSION['id'];
$data = mysqli_query($konek,"SELECT *FROM siswa WHERE idsiswa='$id'");
$d    = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
      <html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>S - Pay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="../admin/assets/home/img/lo-removebg-preview.png">

        <!-- Bootstrap Css -->
        <link href="assets\css\bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <link href="assets\libs\datatables.net-bs4\css\dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <!-- Responsive Table css -->
        <link href="assets\libs\admin-resources\rwd-table\rwd-table.min.css" rel="stylesheet" type="text/css">

        <!-- Icons Css -->
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets\css\app.min.css" id="app-style" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </head>
    <body data-sidebar="colored">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="../admin/assets/home/img/lo-removebg-preview.png" alt="" height="30">
                                </span>
                                <span class="logo-lg">
                                    <img src="../admin/assets/home/img/panjang.png" alt="" height="50">
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>
                    <div class="d-flex">
                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="../assets/img/avatar1.png" alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1"><?= $_SESSION['nama']; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header> <!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar="" class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Dashboard</li>

                <li>
                    <a href="index.php">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">Data Informasi</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span>Data </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                          <li><a href="data.php">Data Pembayaran</a></li>
                          <li><a href="datatagihan.php">Data Tagihan</a></li>
                        <li><a href="datatabungan.php">Data Tabungan</a></li>
                    </ul>
                </li>

                <li class="menu-title">Data Transaksi</li>

                <li>
                    <a href="galat.php" class=" waves-effect">
                        <i class="bx bx-history"></i>
                        <span> Galat Transaksi</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
