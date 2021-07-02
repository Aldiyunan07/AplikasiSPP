<?php 
ob_start();
include 'koneksi.php';
include 'header.php';
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Tambah Data Siswa</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                <li class="breadcrumb-item active">Tambah Data Siswa</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="#" class="custom-validation" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NIS</label>
                                    <div>
                                        <input type="text" autocomplete="off" class="form-control" required="" data-parsley-minlength="6" placeholder="Minimal 6 angka" name="nis">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label>Jatuh Tempo</label>
                                    <div>
                                        <input data-tooltip='Data ini hanya bisa dilihat' class="form-control" name="jatuhtempo" required="" value="<?php $tgl = date('Y-m-d'); echo $tgl; ?>" readonly>
                                    </div>
								</div>
								<div class="form-group">
									<label>Kelas</label>
									<div>
										<select name="kelas" class="form-control" id="">
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
                                        <input type="text" autocomplete="off" class="form-control" required="" placeholder="Masukan Nama" name="namasiswa">
                                    </div>
								</div>
								<div class="form-group mt-2">
									<label for="">Jenis Kelamin</label>
									<div class="form-check mb-3">
                                                        <input class="form-check-input" name="jk" type="radio" value="Laki Laki" name="exampleRadios" id="exampleRadios1" value="option1" checked="">
                                                        <label class="form-check-label mr-4" for="exampleRadios1">
                                                            Laki Laki
														</label>
														<input class="form-check-input" type="radio" name="jk" value="Perepuan" name="exampleRadios" id="exampleRadios1" value="option1">
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
										<input type="hidden" name="tahunajaran" value="<?= $thn ?>/<?= $thn1 ?>">
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
                                <button type="submit" class="btn btn-primary waves-effect" name="tambah">
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
<?php 
 if (isset($_POST['tambah']) ) {
 	$nis   		 = $_POST['nis'];
 	$namasiswa 	 = $_POST['namasiswa'];
 	$kelas 		 = $_POST['kelas'];
 	$tahunajaran = $_POST['tahunajaran'];
 	$biaya  	 = $_POST['biaya'];
 	$awaltempo	 = $_POST['jatuhtempo'];
	$jk 		 = $_POST['jk'];
	$cek = mysqli_query($konek,"SELECT * FROM siswa WHERE nis='$nis'");
	$numcek = mysqli_num_rows($cek);
	if($numcek > 0 ){
		echo "<script> alert('NIS anda yang input telah ada! '); document.location.href = 'tambahSW.php';</script>";
	}else{
		$bulanIndo =[
			'01' => 'januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];
		if ($nis == '' || $namasiswa == '' || $kelas ==''){
			echo "Form belum lengkap";
		}else{
			$simpan = mysqli_query($konek,"INSERT INTO siswa (nis,namasiswa,kelas,tahunajaran,biaya,jk) VALUES('$nis','$namasiswa','$kelas','$tahunajaran','$biaya','$jk')");
		   $slek   = mysqli_query($konek,"SELECT * FROM tb_kelas WHERE kelas='$kelas'");
		   $dd     = mysqli_fetch_assoc($slek);
		   $jum    = $dd['jumlah'];
		   $sum    = $jum + 1;
		   mysqli_query($konek,"UPDATE tb_kelas SET jumlah='$sum' WHERE kelas='$kelas'");
			if(!$simpan) {
				echo "$nis , $namasiswa , $kelas , $tahunajaran , $biaya";
			}else {
				// ambil data id terakhir
				$ds = mysqli_fetch_array(mysqli_query($konek, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
				$idsiswa = $ds['idsiswa'];
				// var_dump($idsiswa); die;
				$idsiswa;
				// taggihan dan simpan di tabel spp
				for ($i = 0 ; $i < 12; $i++){
					// tanggal jatuh tempo setiap tanggal 10
					$jatuhtempo = date("Y-m-d" , strtotime("+$i month" , strtotime($awaltempo)));
					$bulan     = $bulanIndo[date('m' ,strtotime($jatuhtempo))]."  ".date('Y', strtotime($jatuhtempo));
					$no = $i +1;
					// simpan data
					$add = mysqli_query($konek,"INSERT INTO spp(idspp, idsiswa , jatuhtempo, no_urut, bulan, jumlah, ket, wkt_bayar) VALUES ('','$idsiswa','$jatuhtempo','$no','$bulan','$biaya','BELUM','')");
			   }
			   $select = mysqli_query($konek,"SELECT SUM(jumlah) AS f FROM spp WHERE ket = 'BELUM' AND idsiswa ='$idsiswa'");
			   $num = mysqli_fetch_assoc($select);
			   $hasil = $num['f'];
			   $tagihan = mysqli_query($konek,"INSERT INTO tb_tagihan VALUES ('','$idsiswa','$hasil')");
				header('location:datasiswa.php?pesan=tambahsukses');
			}
		}
	}
 	
 }


  ?>
</div>
          </div>
        </section>
      </div>

 <?php include 'footer.php'; ?>