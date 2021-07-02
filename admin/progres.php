<?php 
include 'koneksi.php';
include 'header.php';
?>
	  <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="ml-3 mt-3 mb-0 font-size-18">Data Progress SPP</h4>
                                        <div class="page-title-right">
                                            <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                                <li class="breadcrumb-item"><a href="index.php">Data</a></li>  
                                                <li class="breadcrumb-item active">Data Progress</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div style="border:none;" class="table-responsive">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="bg-primary text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Jumlah Tagihan</th>
                                                <th>Progress</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php											
                                                $no = 1;
                                                $dt = mysqli_query($konek,"SELECT * FROM siswa INNER JOIN tb_tagihan ON siswa.idsiswa=tb_tagihan.idsiswa");
                                                while($dtt = mysqli_fetch_array($dt)){
                                                $jumlah = $dtt['jumlah'];
                                                $id = $dtt['idsiswa'];
                                                
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
                                                $i = 1;
                                                ?>
											<tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $dtt['nis']; ?></td>
                                                <td><?= $dtt['namasiswa']; ?></td>
                                                <td><?= $dtt['kelas']; ?></td>
                                                <td><?= $jumlah; ?></td>
                                                <td>
                                                <div class="custom-progess mt-2">
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
                                                <!-- <?= $o; ?>
                                                    <div class="progress mt-2">
                                                      <div
                                                      <?php
                                                        if($o > 80){
                                                            echo "class='progress-bar progress-bar-striped progress-bar-animated bg-success'";
                                                        }elseif($o > 40){
                                                            echo "class='progress-bar progress-bar-striped progress-bar-animated bg-primary'";
                                                        }elseif($o > 0){
                                                            echo "class='progress-bar progress-bar-striped progress-bar-animated bg-danger'";
                                                        }
                                                        ?>
                                                      role="progressbar" aria-valuenow="<?= $o; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $o; ?>%"> <?= $o; ?>%</div>
                                                    </div> -->
                                                  </td>
                                                <td align="center">
                                                    <a class="btn btn-sm btn-success" href="detailp.php?id=<?= $dtt['idsiswa'] ?>"> Detail</a>
                                                </td>
                                              </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

 <?php include 'footer.php'; ?>