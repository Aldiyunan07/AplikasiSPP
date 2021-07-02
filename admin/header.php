<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['login']) ) {
	header('location: login.php');
}
$level = $_SESSION['nama']; 
?>
<?php if($_SESSION['login'] !== 'Admin'){
  $idlevel = $_SESSION['id'];
  $jquery  = mysqli_query($konek,"SELECT * FROM tb_tu WHERE id='$idlevel'");
  $dnm     = mysqli_fetch_assoc($jquery);
} ?>

<!DOCTYPE html>
      <html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title><?=  $_SESSION['login']; ?> | S - Pay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/home/img/lo-removebg-preview.png">

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
                            <a href="index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/home/img/long.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/home/img/long.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/home/img/lo-removebg-preview.png" alt="" height="30">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/home/img/panjang.png" alt="" height="50">
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
                        <?php if( $_SESSION['login'] == "Admin" ){ ?>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                $date = date('Y-m-d');
                                $galatt = mysqli_query($konek,"SELECT * FROM tb_galat INNER JOIN spp ON tb_galat.idspp=spp.idspp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa WHERE tb_galat.proses='belum'");     
                                $datatabung = mysqli_query($konek,"SELECT * FROM t_tabungan INNER JOIN siswa ON t_tabungan.idsiswa=siswa.idsiswa WHERE tgl_bayar='$date'");
                                $datanum1 = mysqli_num_rows($galatt);
                                $datanum2 = mysqli_num_rows($datatabung);
                                $jum = $datanum1 + $datanum2;
                                if($jum > 0){
                                  echo "<i class='bx bx-bell bx-tada'></i>";
                                  echo "<span class='badge badge-danger badge-pill'>$jum    </span>";
                                }else{
                                  echo "<i class='bx bx-bell'></i>";
                                } 
                                ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Pemberitahuan </h6>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar="" style="max-height: 230px;">
                                    <?php 
                                    while($c = mysqli_fetch_array($galatt)){ ?>
                                    <a href="galat.php" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-history"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1"><?= $c['namasiswa']; ?></h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">Mengajukan Galat Untuk SPP <?= $c['bulan']; ?></p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <?= $c['wkt_galat']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>    
                                    <?php } ?>
                                    <?php 
                                    while($h = mysqli_fetch_array($datatabung)){ ?>
                                    <a href="galat.php" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-data"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1"><?= $h['namasiswa']; ?></h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">Menambahkan uang senilai Rp.<?php echo "$h[jumlah],- "; ?> Kedalam Tabungannya</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <?= $h['wkt_bayar']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>    
                                    <?php } ?>
                                </div>
                                <div class="p-2 border-top m-2 text-center">
                                    Aplikasi S-Pay V.1.1
                                </div>
                            </div>
                        </div>
                                    <?php } ?>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
                                if($_SESSION['login'] == "Admin"){
                                    echo "<img class='rounded-circle header-profile-user' src='img/avatar.jpg' alt='Header Avatar'>";
                                }else{
                                    echo "<img class='rounded-circle header-profile-user' src='img/tu/$dnm[foto]' alt='Header Avatar'>";
                                }
                                ?> 
                                <span class="d-none d-xl-inline-block ml-1">
                                <?php if($_SESSION['login'] == 'Admin'){
                                          echo $_SESSION['nama'];
                                        }else{
                                          echo $dnm['nama'];
                                        } ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item d-block" href="ubahPw.php"><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Ganti Password</a>
                                <div class="dropdown-divider"></div>
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
                         <?php if($_SESSION['login'] == 'Admin'){ ?>
                          <li><a href="datatu.php">Data Staff TU</a></li>
                        <li><a href="datakelas.php">Data Kelas</a></li>
                        <li><a href="datanominal.php">Data Nominal</a></li>
                        <li><a href="datasiswa.php">Data Siswa</a></li>
                        <li><a href="progres.php">Data Progress</a></li>
                        <li><a href="datatabungan.php">Data Tabungan</a></li>
                        <?php }else{?>
                        <li><a href="datasiswa.php">Data Siswa</a></li>
                        <li><a href="progres.php">Data Progress</a></li>
                        <?php } ?>                 
                    </ul>
                </li>

                <li class="menu-title">Proses Transaksi</li>

                <li>
                    <a href="transaksi.php" class=" waves-effect">
                        <i class="bx bx-transfer"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="konfirmasi.php" class=" waves-effect">
                        <?php 
                            $glt = mysqli_query($konek,"SELECT * FROM spp WHERE idadmin='0'");
                            $n   = mysqli_num_rows($glt);
                            if($n > 0){
                            echo "<i class='bx bx-check'></i><span class='badge badge-pill badge-danger float-right'>$n</span>";
                            }else{
                                echo "<i class='bx bx-check'></i>";
                            
                            }
                            ?>
                        <span>Konfirmasi</span>
                    </a>
                </li>
                <li>
                    <a href="galat.php" class=" waves-effect">
                    <?php 
                    $glt = mysqli_query($konek,"SELECT * FROM tb_galat WHERE proses='belum'");
                    $n   = mysqli_num_rows($glt);
                    if($n > 0){
                      echo "  <i class='bx bx-history'></i><span class='badge badge-pill badge-danger float-right'>$n</span>";
                    }else{
                        echo "  <i class='bx bx-history'></i>";
                    
                    }
                    ?>
                        <span>Galat Transaksi</span>
                    </a>
                </li>
                <?php if( $_SESSION['login'] == "Admin" ){ ?>
                    <li class="menu-title">Cetak Data</li>
                <li>
                    <a href="laporan.php" class=" waves-effect">
                        <i class="bx bx-printer"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
