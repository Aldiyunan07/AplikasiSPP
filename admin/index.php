<?php
    include 'header.php';
    date_default_timezone_set('Asia/Jakarta');
    $waktu   = date('H:i:s');
    $date    = date('Y-m-d');
    $result  = mysqli_query($konek,"SELECT SUM(jumlah) AS value_sum FROM spp WHERE ket = 'BELUM'  ORDER BY jatuhtempo ASC ");
    $row     = mysqli_fetch_assoc($result);
    $result2 = mysqli_query($konek,"SELECT SUM(jumlah) AS f FROM spp WHERE ket = 'LUNAS' AND tglbayar= '$date' ORDER BY jatuhtempo ASC ");
    $row2    = mysqli_fetch_assoc($result2);
    $sum     = $row['value_sum'];
    $sum2    = $row2['f'];												
        if($sum == "0"| $sum2 == "0"){
            $sum  = 0;
            $sum2 = 0;
        }
?>
	<script type="text/javascript" src="assets/chart.js"></script>
<div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <span style="margin-bottom:20px;">Terakhir di Update : <?= $waktu; ?></span> <br> <br/>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body shadow-lg rounded">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">Jumlah Siswa</p>
                                                <h4 class="mb-0">
                                                <?php
                                                  $siswa = mysqli_query($konek,"SELECT * FROM siswa");
                                                  echo mysqli_num_rows($siswa);
                                                  ?>
                                                </h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title bg-info">
                                                    <i class="bx bx-user font-size-24"></i>
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
                                                <p class="text-muted font-weight-medium">Transaksi</p>
                                                <h4 class="mb-0">
                                                <?php
                                                  $date = date('Y-m-d');
                                                  $data2 = mysqli_query($konek,"SELECT * FROM spp WHERE tglbayar = '$date'");
                                                  $num2 = mysqli_num_rows($data2);
                                                  echo $num2 ; 
                                                  ?>
                                                </h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle align-self-center">
                                                <span class="avatar-title bg-success">
                                                    <i class="bx bx-transfer font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($_SESSION['login'] == 'Admin'){?>
                              <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body shadow-lg rounded">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">Tagihan Siswa</p>
                                                <h4 class="mb-0">
                                                <?php
                                                  $data3 = mysqli_query($konek,"SELECT sum(jumlah) AS value_index FROM spp WHERE ket = 'BELUM'");
                                                  $num3 = mysqli_fetch_assoc($data3);
                                                  $numr3 = $num3['value_index'];
                                                  $jumlah = strlen($sum2);
                                                  $jumlah2 = strlen($sum);
                                                  if($jumlah2 > 6){
                                                    $nomer2 = substr($sum,0,1);
                                                    $nomer22 = substr($sum,1,3);
                                                    $hasil2 = "$nomer2 Jt $nomer22 K";
                                                  }elseif($jumlah2 > 5){
                                                    $nomer2 = substr($sum,0,3);
                                                    $hasil2 = "$nomer2 K";
                                                  }elseif($jumlah2 > 4){
                                                    $nomer2 = substr($sum,0,2);
                                                    $hasil2 = "$nomer2 K";
                                                  }else{
                                                    $hasil2 = $sum;
                                                  }
                                                  
                                                  
                                                  if($jumlah > 6){
                                                    $nomer = substr($sum2,0,1);
                                                    $nomer2 = substr($sum2,1,3);
                                                    $hasil = "$nomer Jt $nomer2 K";
                                                  }elseif($jumlah > 5){
                                                    $nomer = substr($sum2,0,3);
                                                    $hasil = "$nomer K";
                                                  }elseif($jumlah > 4){
                                                    $nomer = substr($sum2,0,2);
                                                    $hasil = "$nomer K";
                                                  }else{
                                                    $hasil = $sum2;
                                                  }
                                                  echo $hasil2;
                                                  ?>

                                                </h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-warning align-self-center">
                                                <span class="avatar-title bg-danger">
                                                    <i class="bx bx-money font-size-24"></i>
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
                                                <p class="text-muted font-weight-medium">Pemasukan</p>
                                                <h4 class="mb-0">
                                                  <?php 
                                                    if($hasil == ""){
                                                        echo "0"; 
                                                    }else{
                                                        echo $hasil;
                                                    }
                                                  ?>
                                                </h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-success align-self-center">
                                                <span class="avatar-title bg-warning">
                                                    <i class="bx bx-check-square font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <?php }else{ ?>
                              <div class="col-md-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body shadow-lg rounded">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">Laki Laki</p>
                                                <h4 class="mb-0">
                                                <?php 
                                                    $cwo = mysqli_query($konek,"SELECT * FROM siswa WHERE jk = 'Laki Laki'");
                                                    echo mysqli_num_rows($cwo);
                                                ?></h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-warning align-self-center">
                                                <span class="avatar-title">
                                                    <i class="bx bx-male font-size-24"></i>
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
                                                <p class="text-muted font-weight-medium">Perempuan</p>
                                                <h4 class="mb-0">
                                                <?php 
                                                    $cwe = mysqli_query($konek,"SELECT * FROM siswa WHERE jk = 'Perempuan'");
                                                    echo mysqli_num_rows($cwe);
                                                ?>
                                                </h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-success align-self-center">
                                                <span class="avatar-title bg-danger">
                                                    <i class="bx bx-female font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                      <div class="card">
                                    <div class="card-body">
                                    <h5 class="">
                                        Statistik Pembayaran SPP Semester 1
                                    </h5>
                                    <div style="width: 100%;margin-bottom: 30p;">
	                                	<canvas id="myChart"></canvas>
	                                </div>    
                                    </div>
                                </div>
                                <div class="card shadow-lg">
                                    <div class="card-header">
                                        <h5 style="font-weight:bold;"> Tanggapan Aplikasi School Payment </h5>
                                    </div>
                                    <div class="card-body">
                                    <?php 
                                    $date = date('Y-m-d');
                                    $tanggapan = mysqli_query($konek,"SELECT * FROM tb_kontak WHERE tgl_pesan='$date'");
                                    if(mysqli_num_rows($tanggapan) > 0){
                                        while($d = mysqli_fetch_array($tanggapan)){
                                        ?>
                                        <div class="media mb-4">
                                                <img class="d-flex mr-3 rounded-circle" src="img/avatar.jpg" alt="Generic placeholder image" height="64">
                                                <div class="media-body">
                                                    <h5 class="mt-0 font-16"><?= $d['nama']; ?></h5>
                                                    <?= $d['pesan']; ?>
                                                    <span class="float-right"> <?= $d['email']; ?> </span>
                                                </div>
                                        </div>
                                            <?php 
                                        }
                                    }else{
                                        $tanggapan2 = mysqli_query($konek,"SELECT * FROM tb_kontak ORDER BY id DESC LIMIT 3");
                                        while($l = mysqli_fetch_array($tanggapan2)){
                                        ?>
                                        <div class="media mb-4">
                                                <img class="d-flex mr-3 rounded-circle" src="img/avatar.jpg" alt="Generic placeholder image" height="64">
                                                <div class="media-body">
                                                    <h5 class="mt-0 font-16" style="font-weight:bold;"><?= $l['nama']; ?></h5>
                                                    <?= $l['pesan']; ?>
                                                    <span class="float-right"> <?= $l['email']; ?> </span>
                                                    <br> <span style="float:right; color:red;"><?= $l['tgl_pesan']; ?></span>
                                                </div>
                                        </div>
                                        <?php
                                        }    
                                    }
                                    ?>
                                    </div>
                                    <div class="card-footer">
                                        <span style="float:right;"> <?= $date; ?> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-lg rounded">
                                    <div class="card-body">
                                        <h4 class="card-title mb-5">Riwayat Pembayaran Terbaru</h4>
                                        <ul class="verti-timeline list-unstyled">
                                        <?php
                                          $data = mysqli_query($konek,"SELECT * FROM siswa INNER JOIN spp ON spp.idsiswa=siswa.idsiswa WHERE spp.tglbayar='$date' AND spp.ket='LUNAS' ORDER BY (wkt_bayar) DESC LIMIT 3 ");
                                          $nom = mysqli_num_rows($data);
                                          if($nom > 0){
                                          while($d = mysqli_fetch_array($data)){
                                          ?>
                                          <li class="event-list">
                                                <div class="event-timeline-dot">
                                                    <i class="bx bx-right-arrow-circle font-size-18"></i>
                                                </div>
                                                <div class="media">
                                                    <div class="mr-3">
                                                        <h5 class="font-size-14"><?php echo substr($d['wkt_bayar'],0,5); ?> <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                                    </div>
                                                    <div class="media-body">
                                                        <div>
                                                            <b> <?= $d['namasiswa']; ?> </b> membayar <?= $d['jumlah']; ?> untuk  <b>SPP <?= $d['bulan']; ?></b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                          <?php } ?>
                                          
                                          <?php }else{?>
                                            <h5 class="text-center">Belum Ada Transaksi Hari Ini</h5>
                                          <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                       <center class="text-center" style="text-align:center"> <?= $date; ?> </center> 
                                    </div>
                                </div>
                                <div class="card shadow-lg rounded">
                                    <div class="card-body">
                                            <h4 class="card-title"> Daftar Tabungan Siswa </h4>
                                            <table class="table table-borderless">
                                                <?php 
                                                $no = 1;
                                                $tt = mysqli_query($konek,"SELECT * FROM tb_tabungan INNER JOIN siswa ON tb_tabungan.idsiswa=siswa.idsiswa ORDER BY jumlah DESC LIMIT 6"); 
                                                while($t = mysqli_fetch_array($tt)){?>
                                                <tr> 
                                                    <td> <?= $no++; ?> </td>
                                                    <td> <?= $t['namasiswa']; ?> </td>
                                                    <td> Rp.<?= $t['jumlah'] ?>,- </td>    
                                                </tr>
                                                <?php } ?>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
</div>
<?php 
$m1 = mysqli_query($konek,"SELECT * FROM spp WHERE month(jatuhtempo)='03' AND ket='LUNAS'");
$n1 = mysqli_num_rows($m1);
$m2 = mysqli_query($konek,"SELECT * FROM spp WHERE month(jatuhtempo)='04' AND ket='LUNAS'");
$n2 = mysqli_num_rows($m2);
$m3 = mysqli_query($konek,"SELECT * FROM spp WHERE month(jatuhtempo)='05' AND ket='LUNAS'");
$n3 = mysqli_num_rows($m3);
$m4 = mysqli_query($konek,"SELECT * FROM spp WHERE month(jatuhtempo)='06' AND ket='LUNAS'");
$n4 = mysqli_num_rows($m4);
$m5 = mysqli_query($konek,"SELECT * FROM spp WHERE month(jatuhtempo)='07' AND ket='LUNAS'");
$n5 = mysqli_num_rows($m5);
$m6 = mysqli_query($konek,"SELECT * FROM spp WHERE month(jatuhtempo)='08' AND ket='LUNAS'");
$n6 = mysqli_num_rows($m6);


?>
<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Maret", "April","Mei","Juni","Juli","Agustus"],
				datasets: [{
					label: '',
					data: [<?= $n1 ?>,<?= $n2; ?>,<?= $n3; ?>,<?= $n4; ?>,<?= $n5; ?>],
					backgroundColor: [
					'yellow',
					'orange',
					'red',
					'purple',
                    'blue',
                    'aqua'
					],
					borderColor: [
					'black',
					'black',
					'black',
					'black',
					'black',
					'black'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
<?php include 'footer.php'; ?>