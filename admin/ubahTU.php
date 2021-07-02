<?php
include 'koneksi.php';
$data = mysqli_query($konek,"SELECT * FROM tb_tu WHERE id = '$_GET[id]'");
$dtA = mysqli_fetch_assoc($data);
include 'header.php';
if($_SESSION['login'] !== "Admin" ){
	echo "<script> document.location.href = 'index.php' </script>";
}
?>
<?php 
$id = $_GET['id'];
$query = mysqli_query($konek,"SELECT * FROM tb_tu WHERE id='$id'");
$m     = mysqli_fetch_assoc($query);
?>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="ml-3 mt-3 mb-0 font-size-18">Edit Data staff TU </h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                            <li class="breadcrumb-item"><a href="index.php">Data</a></li>
                                            <li class="breadcrumb-item"><a href="datatu.php">Data Staff TU</a></li>
                                            <li class="breadcrumb-item active">Edit Data staff TU</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="card">
                <div class="card-body">
                    <form action="#" class="custom-validation" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-md-6">
								<center>
									<img src="img/tu/<?= $m['foto'] ?>" width="350" height="auto" alt="">
								</center>
                            </div>
                            <div class="col-md-6">
							<div class="form-group">
                                    <label>NIP</label>
                                    <div>
                                        <input value="<?= $m['nip'] ?>" type="text" class="form-control" required="" data-parsley-minlength="6" placeholder="Minimal 6 angka" name="nip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <div>
                                        <input type="text" value="<?= $m['nama'] ?>" class="form-control" required="" placeholder="Masukan Nama" name="nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <div>
										<input type="text" class="form-control" value="<?= $m['username'] ?>" required="" data-parsley-minlength="6" placeholder="Minimal 6 Huruf" name="username">
										<span class="text-danger">* Username tidak boleh sama dengan yang sudah ada </span>
                                    </div>
                                </div>
							<div class="form-group">
                                    <label>Foto</label>
                                    <div>
										<input type="hidden" name="idguru" value="<?= $id ?>">
                                        <input type="file" class="form-control" name="foto" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Posisi</label>
                                    <div>
										<select name="posisi" class="form-control" id="">
											<option value="<?= $m['posisi'] ?>"><?= $m['posisi']; ?></option>
											<option value="ketua"> -- Pilih Salah Satu -- </option>
											<option value="Anggota TU"> Anggota TU </option>
											<option value="Administrasi Kegiatan Siswa"> Administrasi Kegiatan Siswa </option>
											<option value="Administrasi SPP"> Administrasi SPP</option>
											<option value="Administrasi Kegiatan Sekolah"> Administrasi Kegiatan Sekolah </option>
									</select>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 float-right">
                            <div>
                                <a class="btn btn-danger waves-effect waves-light mr-1" href="datatu.php">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary waves-effect" name="ubah">
                                    Simpan Perubahan
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
 if ( isset($_POST['ubah']) ) {
 	$idguru = $_POST['idguru'];
	 $nama  = $_POST['nama'];
	 $nip  = $_POST['nip'];
 	$posisi   = $_POST['posisi'];
	$filename = $_FILES['foto']['name'];
	$rand = rand();
	$ekstensi =  array('png','jpg','jpeg','gif');
	$ukuran = $_FILES['foto']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if($filename == ""){
		$query = mysqli_query($konek,"UPDATE tb_tu SET nip='$nip',nama='$nama',posisi='$posisi' WHERE id='$idguru'");
			echo "<script>
                Swal.fire({
                    title: 'Data TU Berhasil Di Edit',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datatu.php')
                }
                });
        
            </script>
        ";	
	}else{
		if(!in_array($ext,$ekstensi) ) {
			echo "<script>
                Swal.fire({
                    title: 'File Bukan Gambar!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datatu.php')
                }
                });
        
            </script>
        ";
		}else{
			if($ukuran < 91044070){		
				$xx = $rand.'_'.$filename;
				move_uploaded_file($_FILES['foto']['tmp_name'], 'img/tu/'.$rand.'_'.$filename);
				$query2 = mysqli_query($konek,"UPDATE tb_tu SET nama='$nama', nip='$nip',posisi='$posisi',foto='$xx' WHERE id='$idguru'");
			}else{
				echo "<script>
                Swal.fire({
                    title: 'Gambar Terlalu Besar!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datatu.php')
                }
                });
        
            </script>
        ";
			}
		}
		echo "<script>
                Swal.fire({
                    title: 'Data TU Berhasil Di Edit',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datatu.php')
                }
                });
        
            </script>
        ";
		 }
		}
		 ?>
          </div>
        </section>
      </div>

<?php include 'footer.php';  ?>