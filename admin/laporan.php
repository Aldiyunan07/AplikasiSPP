<?php include 'header.php';
if($_SESSION['login'] !== "Admin" ){
	echo "<script> document.location.href = 'index.php' </script>";
} ?>
	  	<div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
					<div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="ml-3 mt-3 mb-0 font-size-18">Data Laporan </h4>
										<div class="page-title-right">
                                        <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                            <li class="breadcrumb-item active">Data Laporan</li>
                                        </ol>
                                    	</div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="card">
							<div class="card-body">
								<table class="table table-bordered table-striped table-lg">
											<tr style="background-color:#556ee6; color:white;">
												<th >Nama Laporan</th>
												<th width="200">Opsi</th>
											</tr>
											<tr>
												<td>
													Laporan Data Siswa
												</td>
												<td align="center">
													<div class="btn-group">
													<a href="media/word.php?pesan=siswa" target="_blank"><button class="btn btn-primary btn-sm" > <span class="bx bxs-file-doc"></span> </button></a>
													<a href="media/excel.php?pesan=siswa" target="_blank"><button class="btn btn-success btn-sm" > <span class="bx bxs-file-doc"></span> </button></a>
													<a href="laporan_siswa.php?pesan=siswa" target="_blank"><button class="btn btn-dark btn-sm" > <span class="bx bx-printer"></span></button></a>
												</div>
											</td>
											<tr>
												<td> Laporan Data Tabungan </td>
												<td align="center">
													<div class="btn-group">
													<a href="media/word.php?pesan=tabungan" target="_blank"><button class="btn btn-primary btn-sm" > <span class="bx bxs-file-doc"></span> </button></a>
													<a href="media/excel.php?pesan=tabungan" target="_blank"><button class="btn btn-success btn-sm" > <span class="bx bxs-file-doc"></span> </button></a>
													<a href="laporan_siswa.php?pesan=tabungan" target="_blank"><button class="btn btn-dark btn-sm" > <span class="bx bx-printer"></span></button></a>
												</div>
												</td>
											</tr>
											</tr>
											
											<tr>
												<td> Laporan Data Galat Transaksi </td>
												<td align="center">
													<div class="btn-group">
													<a href="media/word.php?pesan=galat" target="_blank"><button class="btn btn-primary btn-sm" > <span class="bx bxs-file-doc"></span> </button></a>
													<a href="media/excel.php?pesan=galat" target="_blank"><button class="btn btn-success btn-sm" > <span class="bx bxs-file-doc"></span> </button></a>
													<a href="laporan_siswa.php?pesan=galat" target="_blank"><button class="btn btn-dark btn-sm" > <span class="bx bx-printer"></span></button></a>
												</div>
											</tr>
											</tr>
											

											<form class="col-md-2" action="laporan_pembayaran.php" method="GET" target="_blank" >
												<td>
												<b>Laporan Pembayaran</b>
											</td>
											<td>
												<h6 class="mt-3"> Mulai Tanggal </h6> 
												<input class="form-control" type="date" name="tgl1" value="<?= date('Y-m-d') ?>">
												<h6 class="mt-3"> Sampai Tanggal </h6>
													<input class="form-control" type="date" name="tgl2" value="<?= date('Y-m-d') ?>">
												<center>
													<button class="btn mt-3 btn-success" type="submit" name="tampil">Tampilkan</button> </center>
											</td>
											</form>
										</tr>
									</table>
						</div>
					</div>
					</div>
				</div>
		</div>

<?php include 'footer.php' ?>