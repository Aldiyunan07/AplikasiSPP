<?php include 'header.php'; ?>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
			<!-- start page title -->
			<div class="row">
                <div class="col-12">
				<div class="card">
					<div class="page-title-box d-flex align-items-center justify-content-between">
						<h4 class="mb-0 font-size-18 ml-3 mt-3 mb-0 font-size-18" >Buat Galat transaksi</h4>
							<div class="page-title-right">
								<ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
									<li class="breadcrumb-item"><a href="indexp.php">Home</a></li>
									<li class="breadcrumb-item active">Data Galat Transaksi</li>
								</ol>
							</div>
						</div>
					</div>
                </div>
			</div>
			<div class="card">
			<form class="mt-3 ml-3 mr-3" action="" method="post" enctype="multipart/form-data">
			<table class="table table-borderless" >
			<tr>
				<td>Bulan</td>
				<td>:</td>
				<td>
                <select name="idspp" id="" class="form-control">
                    <option value=""> -- Silahkan Pilih Bulan --</option>
                    <?php 
					$bulan = mysqli_query($konek,"SELECT * FROM spp  WHERE idspp NOT IN (SELECT idspp from tb_galat) AND idsiswa='$id' AND ket = 'BELUM'");
					
                    while($b = mysqli_fetch_array($bulan)){
                    ?>
                    <option value="<?= $b['idspp']; ?>"> <?= $b['bulan']; ?> </option>
                    <?php } ?>
				</select>  
            </td>
			</tr>
			<tr>
			<td>Foto</td>
			<td>:</td>
			<td><input type="file" name="foto" class="form-control"  id=""></td>
			</tr>
				<tr>
					
				<td>
					Nominal
				</td>
                <td> : </td>
                <?php 
                $tahun  = date('Y');
                $value  = $tahun + 1;
                $result = "$tahun/$value";
                $nominal = mysqli_query($konek,"SELECT * FROM tb_nominal WHERE tahun='$result'");
                $d       = mysqli_fetch_assoc($nominal);
                ?>
				<td> <input type="text" autocomplete="off" name="nominal" class="form-control" value='<?= $d['nominal'] ?>' size="30"  id="" readonly></td>
				</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<a href="data.php" class="btn btn-md btn-danger"> KEMBALI </a>
					<button class="btn btn-success btn-md" type="submit" name="tambah">KIRIM</button>
				</td>
			</tr>
		</table>
	</form>
			</div>
		</div>
	</div>
</div>
<?php
 if (isset($_POST['tambah']) ) {
     $bulan    = $_POST['idspp'];   
     $nom      = $_POST['nominal']; 
	 $rand = rand();
	 $ekstensi =  array('png','jpg','jpeg','gif');
	 $filename = $_FILES['foto']['name'];
     $ukuran = $_FILES['foto']['size'];
	 $tgl = date('Y-m-d');
	 $wkt = date('H:i:s');
	 $ext = pathinfo($filename, PATHINFO_EXTENSION);
	 if($filename == ""){
		 mysqli_query($konek,"INSERT INTO tb_galat VALUES('','$id','$bulan','$tgl','$nom','','belum','0000-00-00','$wkt') ");
	 }else{
		 if(!in_array($ext,$ekstensi) ) {
			echo "<script>
                Swal.fire({
                    title: 'Data Gagal di tambahkan',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('buat_galat.php')
                }
                });
        
            </script>
        ";
		 }else{
			 if($ukuran < 91044070){		
				 $xx = $rand.'_'.$filename;
				 move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$rand.'_'.$filename);
				 $gambar = mysqli_query($konek,"INSERT INTO tb_galat VALUES('','$id','$bulan','$tgl','$nom','$xx','belum','0000-00-00','$wkt') ");
			 }else{
				echo "<script>
                Swal.fire({
                    title: 'File tidak sesuai',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('buat_galat.php')
                }
                });
        
					</script>
				";
			 }
		 }
		 echo "<script>
                Swal.fire({
                    title: 'Data Berhasil di tambahkan Mohon tunggu konfirmasi selanjutnya',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('galat.php')
                }
                });
        
            </script>
        ";
	 }
 }


?>
</div>
		</div>
        </section>
      </div> -->

<?php include 'footer.php'; ?>