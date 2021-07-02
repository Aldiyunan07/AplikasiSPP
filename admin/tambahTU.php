<?php
include 'koneksi.php';
include 'header.php';
if($_SESSION['login'] !== "Admin" ){
	echo "<script> document.location.href = 'index.php' </script>";
}
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Tambah Data Staff TU</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                <li class="breadcrumb-item active">Data Staff TU</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="#" class="custom-validation" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NIP</label>
                                    <div>
                                        <input autocomplete="off" type="text" class="form-control" required="" data-parsley-minlength="6" placeholder="Minimal 6 angka" name="nip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <div>
                                        <input type="text" autocomplete="off" class="form-control" required="" placeholder="Masukan Nama" name="nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <div>
										<input type="text" class="form-control" autocomplete="off" required="" placeholder="Minimal 6 Huruf" name="username">
										<span class="text-danger">* Username tidak boleh sama dengan yang sudah ada </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <div>
                                        <input type="file" class="form-control" required="" name="foto" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Posisi</label>
                                    <div>
										<select name="posisi" class="form-control" id="">
											<option value="ketua"> -- Pilih Salah Satu -- </option>
											<option value="Anggota TU"> Anggota TU </option>
											<option value="Administrasi Kegiatan Siswa"> Administrasi Kegiatan Siswa </option>
											<option value="Administrasi SPP"> Administrasi SPP</option>
											<option value="Administrasi Kegiatan Sekolah"> Administrasi Kegiatan Sekolah </option>
									</select>
									</div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div>
                                        <input class="form-control" name="password" required="" type="password" required="" data-parsley-min="6" placeholder="Minimal 6 Huruf atau Angka">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div>
                                <a class="btn btn-danger waves-effect waves-light mr-1" href="datatu.php">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
 if (isset($_POST['tambah']) ) {
	 $nip   = $_POST['nip'];
	 $posisi = $_POST['posisi'];
	 $nama  = $_POST['nama'];
	 $username = $_POST['username'];
	 $password = MD5($_POST['password']);
	 $rand = rand();
	 $ekstensi =  array('png','jpg','jpeg','gif');
	 $filename = $_FILES['foto']['name'];
	 $ukuran = $_FILES['foto']['size'];
	 $ext = pathinfo($filename, PATHINFO_EXTENSION);
	 $cek = mysqli_query($konek,"SELECT * FROM tb_tu WHERE username='$username'");
	 $nums = mysqli_num_rows($cek);
	 if($nums == 0){
		 if($filename == ""){
			 mysqli_query($konek,"INSERT INTO tb_tu VALUES('','$nip','','$username','$password','$nama','$posisi','') ");
		 }else{
			 if(!in_array($ext,$ekstensi) ) {
				echo "    <script>
                Swal.fire({
                    title: 'Data Berhasil Di tambahkan',
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
				 if($ukuran < 91044070){		
					 $xx = $rand.'_'.$filename;
					 move_uploaded_file($_FILES['foto']['tmp_name'], 'img/tu/'.$rand.'_'.$filename);
					 $gambar = mysqli_query($konek,"INSERT INTO tb_tu VALUES('','$nip','$xx','$username','$password','$nama','$posisi','') ");
				 }else{
					echo " <script> alert('Ukuran Foto tidak sesuai'); document.location.href = 'tambahTU.php'; </script> ";
				 }
			 }
			 echo "    <script>
                Swal.fire({
                    title: 'Data Berhasil Di tambahkan',
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
		}else{
			echo "<script> alert('Username sudah ada ! '); document.location.href = 'tambahTU.php';</script>";
		}
 	}


?>
</div>
		</div>
        </section>
      </div> -->

<?php include 'footer.php';  ?>