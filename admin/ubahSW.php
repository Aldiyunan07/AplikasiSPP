<?php 
include 'koneksi.php';
ob_start();
$sqlsiswa = mysqli_query($konek , "SELECT * FROM siswa WHERE idsiswa = '$_GET[id]' ") ;
$sw = mysqli_fetch_assoc($sqlsiswa);
$dk = mysqli_query($konek,"SELECT * FROM tb_kelas ORDER BY kelas ASC"); 
include 'header.php';
 ?>
 <div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
			<div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="ml-3 mt-3 mb-0 font-size-18"> edit Data Siswa </h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                            <li class="breadcrumb-item"><a href="index.php">Data</a></li>
                                            <li class="breadcrumb-item"><a href="index.php">Data siswa</a></li>
                                            <li class="breadcrumb-item active"> Edit Data Siswa</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
								<form action="#" class="custom-validation" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>NIS</label>
												<div>
													<input type="text" autocomplete="off" class="form-control" required="" data-parsley-minlength="6" placeholder="Minimal 6 angka" name="nis" value="<?= $sw['nis'] ?>">
												</div>
											</div>
											<div class="form-group">
												<label>Kelas</label>
												<div>
													<select name="kelas" class="form-control" id="">
														<option value="<?= $sw['kelas']; ?>"> <?= $sw['kelas']; ?> </option>
														<option value="ketua"> -- Pilih Salah Satu -- </option>
														<?php 
														$kelas = mysqli_query($konek,"SELECT * FROM tb_kelas");
														while($c = mysqli_fetch_array($kelas)){?>
														<option value="<?= $c['kelas'] ?>"><?= $c['kelas']; ?></option>
														<?php } ?>
												</select>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Nama Lengkap</label>
												<div>
													<input type="text" autocomplete="off" class="form-control" value="<?= $sw['namasiswa']; ?>" required="" placeholder="Masukan Nama" name="namasiswa">
												</div>
											</div>
											<div class="form-group mt-2">
												<label for="">Jenis Kelamin</label>
												<div class="form-check mb-3">


												
																	<input class="form-check-input" name="jk" type="radio" value="Laki Laki" name="exampleRadios" id="exampleRadios1" value="option1" checked="">
																	<label class="form-check-label mr-4" for="exampleRadios1">
																		Laki Laki
																	</label>
																	<input class="form-check-input" type="radio" name="jk" value="Perempuan" name="exampleRadios" id="exampleRadios1" value="option1">
																	<label class="form-check-label" for="exampleRadios1">
																		Perempuan
																	</label>
											</div>
											<div class="form-group">
												<label>Biaya</label>
												<div>
													<?php 
													$thn = date('Y');
													$thn1= $thn +1;

													$nmn = mysqli_query($konek,"SELECT * FROM tb_nominal WHERE tahun='$thn/$thn1'");
													$fg  = mysqli_fetch_assoc($nmn);
													?>
													<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
													<input class="form-control" name="biaya" required="" autocomplete="off" value="<?= $fg['nominal'] ?>">
												</div>
											</div>
											
										</div>
									</div>
									<div class="form-group mb-0 ml-3">
										<div>
											<a class="btn btn-danger waves-effect waves-light mr-1" href="datasiswa.php">
												Kembali
											</a>
											<button type="submit" class="btn btn-primary waves-effect" name="ubah">
												Simpan
											</button>
										</div>
									</div>
								</form>

								</div>
							</div>
						</div>
					</div>
		</div>
	</div>
</div>
<?php 
 if (isset($_POST['ubah']) ) {
 	$id          = $_POST['id'];
 	$nis   		 = $_POST['nis'];
 	$namasiswa 	 = $_POST['namasiswa'];
 	$kelas 		 = $_POST['kelas'];
 	$biaya  	 = $_POST['biaya'];
	$jk 		 = $_POST['jk'];
 	// $awaltempo	 = $_POST['jatuhtempo'];
	$ubah = mysqli_query($konek,"UPDATE siswa SET nis = '$nis', jk = '$jk', namasiswa = '$namasiswa' , kelas = '$kelas' , biaya = '$biaya' WHERE idsiswa = '$id'");
 	if ($ubah){
		header('location:datasiswa.php?pesan=editsukses');
 	}else{
 		header('location:datasiswa.php?pesan=editgagal');
 	}
 }


  ?>
</div>
          </div>
        </section>
      </div>

 <?php include 'footer.php'; ?>