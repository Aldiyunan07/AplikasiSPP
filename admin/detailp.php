<?php 
include 'header.php';
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($konek,"SELECT * FROM siswa INNER JOIN tb_tagihan ON siswa.idsiswa=tb_tagihan.idsiswa WHERE siswa.idsiswa='$id'");
$data1 = mysqli_query($konek,"SELECT * FROM spp WHERE ket='LUNAS' AND idsiswa='$id'");
$d    = mysqli_fetch_assoc($data);
$jumlah = $d['jumlah'];
$id = $d['idsiswa'];
$banding = mysqli_query($konek,"SELECT SUM(jumlah) AS f FROM spp WHERE ket='LUNAS' AND idsiswa='$id'");
$banding2 = mysqli_query($konek,"SELECT SUM(jumlah) AS b FROM spp WHERE idsiswa='$id'");
$bd      = mysqli_fetch_assoc($banding);  
$bdb     = $bd['f'];
$bd2     = mysqli_fetch_assoc($banding2);
$bdb2    = $bd2['b'];
                        $hitung  = $bdb * 100 / $bdb2;
                        $eksekusi = strlen($hitung);
                        $o        = substr($hitung,0,2);
                        
                        $ada = strpos($o, ".");
                        if($ada > 0){
                          $o = substr($hitung,0,3);
                        }elseif($ada == 0 && $hitung == 100 ){
                          $o = substr($hitung,0,3);
                        }elseif($ada == 0){
                          $o = substr($hitung,0,2);
                        }
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="ml-3 mt-3 mb-0 font-size-18">Detail Progress <?= $d['namasiswa']; ?></h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                    <li class="breadcrumb-item"><a href="index.php">Data</a></li>  
                                    <li class="breadcrumb-item"><a href="progres.php">Data Progress</a></li>
                                    <li class="breadcrumb-item active">Detail Progress</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary"> <?= $d['namasiswa']; ?></h5>
                                        <p><?= $d['nis']; ?></p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets\images\profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="img/avatar.jpg" alt="" class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate ml-2"><?= $d['kelas']; ?></h5>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">
                                       
                                        <div class="row">
                                            <div class="col-5">
                                                <h5 class="font-size-15">Tagihan</h5>
                                                <p class="text-muted mb-0"><?= $d['jumlah']; ?></p>
                                            </div>
                                            <div class="col-7">
                                                <h5 class="font-size-15">Pemasukan</h5>
                                                <p class="text-muted mb-0"><?= $bdb; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="progres.php" class="btn btn-success btn-sm float-right"> Kembali </a>
                        </div>
                    </div>
                    <!-- end card -->
                    

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Riwayat Pembayaran Terbaru</h4>
                            <div class="">
                                <ul class="verti-timeline list-unstyled">
                                  <?php 
                                  $data4 = mysqli_query($konek,"SELECT * FROM spp WHERE idsiswa='$id' AND ket ='LUNAS' ORDER BY(tglbayar) LIMIT 5");
                                  while($d2 = mysqli_fetch_array($data4)){
                                  ?>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <i class="bx bx-right-arrow h4 text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h5 class="font-size-15"><a href="#" class="text-dark">SPP <?= $d2['bulan']; ?></a></h5>
                                                    <span class="text-primary"><?= $d2['tglbayar']; ?></span>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                  <?php } ?>
                                </ul>
                            </div>

                        </div>
                    </div>  
                    <!-- end card -->
                </div>         
                
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Progress <?= $d['namasiswa']; ?></h4>
                            <p class="card-title-desc">
                                Jumlah Pemasukkan : <?= $bdb; ?> <br/>
                                Jumlah Tagihan    : <?= $d['jumlah']  ?> <br/>
                                Jumlah Semua Pembayaran : <?php $jl = $bdb + $d['jumlah']; echo "$jl"; ?>
                            </p>
                            <div class="custom-progess mt-2 mb-3">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar" role="progressbar" style="width: <?= $o; ?>%;
                                                    <?php
                                                        if($o > 80){
                                                            echo "background-color:green;";
                                                        }elseif($o > 40){
                                                            echo "background-color:blue;";
                                                        }elseif($o >= 0){
                                                            echo "background-color:red;";
                                                        }
                                                        ?>" aria-valuenow="<?= $o; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="avatar-xs progress-icon">
                                                    <?php
                                                        if($o > 80){
                                                            echo "<span class='avatar-title rounded-circle border border-success'>";
                                                            echo "<i class='text-success font-size-10'>";
                                                        }elseif($o > 40){
                                                            echo "<span class='avatar-title rounded-circle border border-primary'>";
                                                            echo "<i class='text-primary font-size-10'>";
                                                        }elseif($o >= 0){
                                                            echo "<span class='avatar-title rounded-circle border border-danger'>";
                                                            echo "<i class='text-danger font-size-10'>";
                                                        }
                                                        ?><?= $o; ?>%</i>
                                                    </span>
                                                </div>
                                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Data Pembayaran</h4>
                            <div class="table-responsive" style="border:none;">
                                <table class="table table-stripped table-bordered mb-0">
                                    <thead>
                                        <tr style="background-color:#556ee6; color:white;">
                                            <th scope="col">No Pembayaran</th>
                                            <th scope="col">Bulan</th>
                                            <th scope="col">Tanggal Bayar</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      while($d3 = mysqli_fetch_array($data1)){
                                      ?>
                                        <tr>
                                            <th scope="row"><?= $d3['nobayar']; ?></th>
                                            <td><?= $d3['bulan']; ?></td>
                                            <td><?= $d3['tglbayar']; ?></td>
                                            <td><?= $d3['ket']; ?></td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
<?php 
include 'footer.php';
?>