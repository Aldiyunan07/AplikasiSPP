<?php 
include 'koneksi.php';
include 'header.php';

 ?>
<style>
	/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
	@media screen and (max-width: 600px) {
		.form-control {
			width: 80%;
			margin-top: 0;
		}
	}
</style>
<!-- Main Content -->
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="page-title-box d-flex align-items-center justify-content-between">
							<h4 class="ml-3 mt-4 mb-0 font-size-18">TRANSAKSI</h4>

							<div class="page-title-right">
								<ol class="breadcrumb mb-0 ml-3 mt-4 mr-3">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active">Transaksi</li>
								</ol>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="section-body">
				<div class="card">
					<div class="container">
						<div class="page-header">
							<h4 class="mt-4 ml-2">CARI SISWA BERDASARKAN NIS</h4>
						</div>

						<form action="" method="get">
							<table class="table table-borderless">
								<tr>
									<td>
										<h4 class="mt-1">NIS</h4>
									</td>
									<td>
										<h4 class="mt-1">:</h4>
									</td>
									<td>
										<div class="form-group" style="margin-top:3px;">
											<select name="nis"
												class="select2 js-states form-control js-states selectpicker"
												data-live-search="true" style="width:330px;" id="">
												<?php 
										 $datat = mysqli_query($konek,"SELECT * FROM siswa ORDER BY (idsiswa) DESC"); 
										 while($f = mysqli_fetch_array($datat)){?>
												<option value="<?= $f['nis'] ?>"> <?= $f['nis'] ?>
													(<?= $f['namasiswa'] ?>) </option>
												<?php } ?>
											</select>
											<button class="btn btn-success btn-sm" id="toast" type="submit"
												name="cari">Cari</button>
										</div>
									</td>
									<td> </td>
								</tr>
							</table>
						</form>
						<?php 
								if (isset($_GET['nis']) && $_GET['nis'] != ''){
									$data = $konek->query("SELECT * FROM siswa WHERE nis = '$_GET[nis]'");
									$dta = mysqli_fetch_assoc($data);
									$nis = $dta['nis'];
												$sql = mysqli_query($konek ," SELECT * FROM spp WHERE idsiswa = '$dta[idsiswa]' ORDER BY jatuhtempo ASC ");
												$result = mysqli_query($konek,"SELECT SUM(jumlah) AS value_sum FROM spp WHERE idsiswa = '$dta[idsiswa]' AND ket = 'BELUM' ORDER BY jatuhtempo ASC ");
												$row = mysqli_fetch_assoc($result);
												

												$result2 = mysqli_query($konek,"SELECT SUM(jumlah) AS f FROM spp WHERE idsiswa = '$dta[idsiswa]' AND ket = 'LUNAS' ORDER BY jatuhtempo ASC ");
												$row2 = mysqli_fetch_assoc($result2);
												$sum = $row['value_sum'];
												$sum2 = $row2['f'];
												
												if($sum == "0"| $sum2 == "0"){
													$sum  = 0;
													$sum2 = 0;
												}
												$hj       = $sum + $sum2;
												$hitung   = $sum2 * 100 / $hj ;
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
												$tb = mysqli_query($konek,"SELECT * FROM tb_tabungan WHERE idsiswa='$dta[namasiswa]'");
												$g  = mysqli_fetch_assoc($tb);
							?>
						<div class="row">
							<div class="col-xl-5">
								<div class="card overflow-hidden ml-3">
									<div class="bg-soft-primary">
										<div class="row">
											<div class="col-7">
												<div class="text-primary p-3">
													<h5 class="text-primary"> <?= $dta['namasiswa']; ?></h5>
													<p><?= $nis; ?></p>
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
												<div class="avatar-md profile-user-wid mb-3">
													<img src="img/avatar.jpg" alt=""
														class="img-thumbnail rounded-circle">
												</div>
												<h5 class="font-size-15 text-truncate ml-2"><?= $dta['kelas']; ?></h5>
											</div>

											<div class="col-sm-8">
												<div class="pt-4">

													<div class="row">
														<div class="col-5">
															<h5 class="font-size-15">Tagihan</h5>
															<p class="text-muted mb-0"><?= $sum; ?></p>
														</div>
														<div class="col-7">
															<h5 class="font-size-15">Tabungan</h5>
															<p class="text-muted mb-0">
															<?php 
															if( $g['jumlah'] > 0 ){
																echo $g['jumlah'];	
															}else{
																echo "0";
															} ?></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- end card -->

							</div>

							<div class="col-xl-7">
								<div class="card mr-3">
									<div class="card-body">
										<h4 class="card-title">Data Progress <?= $dta['namasiswa']; ?></h4>
										<p class="card-title-desc">
												
											Jumlah Pemasukkan : <?= $sum; ?> <br />
											Jumlah Tagihan : <?= $sum2  ?> <br />
											Jumlah Semua Pembayaran : <?php $jl = $sum + $sum2; echo "$jl"; ?>
										</p>
										<div class="custom-progess mt-2 mb-4">
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
                                                        ?>" aria-valuenow="<?= $o; ?>" aria-valuemin="0"
													aria-valuemax="100"></div>
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
										<a target="_blank"
											href="cetak-tagihan.php?id=<?= $_GET['nis'] ?>&num=<?= $sum ?>&num2=<?= $sum2 ?>"
											class="btn btn-success mt-3 btn-sm"> Cetak Tagihan </a>
									</div>
								</div>
							</div>
						</div>
						<!-- end row -->

						<br>
						<hr>
						<div class="panel panel-info m-2">
							<div class="panel-heading">
								<h3 class="mb-3 ml-2">Tagihan SPP Siswa</h3>
							</div>
							<div class="panel-body ">
								<div class="table table-responsive" style="border:none;">
									<table class="table p-3 table-bordered table-md table-striped">
										<tr class="bg-primary text-white">
											<th>NO</th>
											<th>Bulan</th>
											<th>jatuh tempo</th>
											<th>No bayar</th>
											<th>Waktu Bayar</th>
											<th>Jumlah</th>
											<th>Keterangan</th>
											<th>Bayar</th>
										</tr>
										<?php 
													
													$i = 1;
													while($sq = mysqli_fetch_assoc($sql)){
														echo "
															<tr>
																<td>$i</td>
																<td>$sq[bulan]</td>
																<td>$sq[jatuhtempo]</td>
																<td>$sq[nobayar]</td>
																<td>$sq[tglbayar]  </td>
																<td>$sq[jumlah]</td>
																";
																
																if($sq['ket'] == "LUNAS"){
																	echo"
																	<td align='center'> <div class='badge badge-primary badge-sm'> $sq[ket] </div> </td>
																";	
																}else{
																	echo "
																	<td align='center'> <div class='badge badge-danger badge-sm'> BELUM </div> </td>
																	"		
																; }
																echo "
																<td align='center'";
																			if ($sq['nobayar'] == ''){
																				$ex  = $sq['no_urut'];
																				$doy = $sq['idsiswa'];
																					if($ex > 1){
																						$ex1 = $ex - 1;
																						$eksekusi = mysqli_query($konek,"SELECT * FROM spp WHERE idsiswa='$doy'AND no_urut='$ex1'");
																						$ssoc = mysqli_fetch_assoc($eksekusi);
																						if($ssoc['ket'] == "LUNAS" ){
																					?>
										<a
											href='proses_transaksi.php?nis=<?= $nis?>&act=bayar&id=<?=$sq['idspp']?>'></a>
										<a class='btn btn-primary btn-sm'
											href='proses_transaksi.php?nis=<?= $nis ?>&act=bayar&id=<?= $sq['idspp']?>'>Bayar</a>
										<?php	
																						}else{?>

										<?php }
																						}else{?>
										<a
											href='proses_transaksi.php?nis=<?= $nis?>&act=bayar&id=<?=$sq['idspp']?>'></a>
										<a class='btn btn-primary btn-sm'
											href='proses_transaksi.php?nis=<?= $nis ?>&act=bayar&id=<?= $sq['idspp']?>'>Bayar</a>
										<?php }
																
																				?>
										<?php
																			}else {
																				echo "</a>";
																				echo "<a class='btn btn-danger btn-sm' href='proses_transaksi.php?nis=$nis&act=batal&id=$sq[idspp]'>Batal</a> ";
																				echo "<a class='btn btn-success btn-sm' href='cetak_slip_transaksi.php?nis=$nis&act=bayar&id=$sq[idspp]' target='_blank'>Cetak</a> ";
																				
																			}
																		echo "</td>
																	</tr>

																	";
																	$i++;
															}
															?>
									</table>

								</div>
							</div>
						</div>
						<?php 
}elseif(isset($_GET['nis']) && $_GET['nis'] == ''){
	?>
						<center>
							<h3 class="mb-4"> NIS yang anda cari tidak ada </h3>
						</center>
						<?php
}
?>

					</div>
				</div>
			</div>
		</div>

		<?php include 'footer.php' ?>