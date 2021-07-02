<?php 
include 'header.php';
?>
<div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <span style="margin-bottom:20px;">Terakhir di Update : <?php $waktu = date('H:i:s'); echo $waktu; ?></span> <br> <br/>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body shadow-lg rounded">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">Tabungan</p>
                                                <h4 class="mb-0">
                                                <?php 
                                                  $masuk   = mysqli_query($konek,"SELECT SUM(jumlah) AS m FROM spp WHERE idsiswa='$id' AND ket='LUNAS'");
                                                  $masuka  = mysqli_fetch_assoc($masuk);
                                                  $tbungan = mysqli_query($konek,"SELECT * FROM tb_tabungan WHERE idsiswa='$id'");
                                                  $tb      = mysqli_fetch_assoc($tbungan);
                                                  if($tb['jumlah'] > 0){
                                                      echo $tb['jumlah'];
                                                  }else{
                                                      echo "0";
                                                  }
                                                ?>
                                                </h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title bg-success">
                                                    <i class="bx bx-data font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body shadow-lg rounded">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">Tagihan</p>
                                                <h4 class="mb-0">
                                                <?php 
                                                  $tagihan   = mysqli_query($konek,"SELECT * FROM tb_tagihan WHERE idsiswa='$id'");
                                                  $tagihana  = mysqli_fetch_assoc($tagihan);
                                                  echo $tagihana['jumlah'];
                                                  if($tagihana == ""){
                                                      echo "0";
                                                  }
                                                ?>
                                                </h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title bg-warning">
                                                    <i class="bx bx-money font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body shadow-lg rounded">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">Progress SPP</p>
                                                <h4 class="mb-0">
                                                <?php 
                                                    $jumlah = $tagihana['jumlah'] + $masuka['m'];
                                                    $hitung  = $masuka['m'] * 100 / $jumlah;
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
                                                    echo "$o%";
                                                ?>
                                                </h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-warning align-self-center">
                                                <span class="avatar-title bg-info">
                                                    <i class="bx bx-chart font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mini-stats-wid shadow">
                                    <div class="card-body shadow-lg rounded">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">Galat Transaksi </p>
                                                <h4 class="mb-0">
                                                    <?php 
                                                    $galat = mysqli_query($konek,"SELECT * FROM tb_galat WHERE idsiswa='$id' AND proses='belum'"); 
                                                    $numgalat = mysqli_num_rows($galat);
                                                    echo $numgalat; ?>
                                                </h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-success align-self-center">
                                                <span class="avatar-title bg-danger
                                                  ">
                                                    <i class="bx bx-history font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
</div>
<?php include 'footer.php'; ?>