<?php
include 'header.php';
if ($_SESSION['login'] == "Admin"){
    echo "<script> document.location.href = 'index.php' </script> ";
}
?>
<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
          </div>
          <div class="section-body">
            <h2 class="section-title"><?= $dnm['nama'] ?></h2>
            <p class="section-lead">
              Ubah Informasi diri di halaman ini
            </p>
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <div align="center">
                      <img alt="image" src="../assets/img/tu/<?= $dnm['foto'] ?>" height="250" width='350' class="mt-4">
                    </div>    
                      <hr>
                      <table>
                        <tr>
                          <td>
                              <h6 class="mt-3 ml-4 profile-widget-name">Nama </div> 
                          </td>
                          <td>
                          <h6 class="mt-3 ml-4 profile-widget-name"> <div class="text-muted d-inline font-weight-normal"> : <?= $dnm['nama']; ?> </div> </h6>
                          </td>
                        </tr>
                        
                        <tr>
                          <td>
                              <h6 class="mt-3 ml-4 profile-widget-name">NIP </div> 
                          </td>
                          <td>
                          <h6 class="mt-3 ml-4 profile-widget-name"> <div class="text-muted d-inline font-weight-normal"> : <?= $dnm['nip']; ?> </div> </h6>
                          </td>
                        </tr>
                        <tr>
                          <td>
                              <h6 class="mt-3 ml-4 profile-widget-name">Posisi </div> 
                          </td>
                          <td>
                          <h6 class="mt-3 ml-4 profile-widget-name"> <div class="text-muted d-inline font-weight-normal"> : <?= $dnm['posisi']; ?> </div> </h6>
                          </td>
                        </tr>
                      </table>
                  </div>
                  <div class="profile-widget-description">
                 <h6>BIO</h6>
                 <hr>
                 <?= $dnm['bio']; ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="<?= $dnm['nama'] ?>" required="">
                            <div class="invalid-feedback">
                              Lengkapi Nama anda
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label> NIP</label>
                            <input type="text" class="form-control" name="nip" value="<?= $dnm['nip'] ?>" required="">
                            <div class="invalid-feedback">
                              Lengkapi Nip anda
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>POSISI</label>
                            <select name="posisi" id="" class="form-control">
                                <option value="<?= $dnm['posisi'] ?>"> <?= $dnm['posisi'] ?> </option>
						        <option value=""> -- Pilih Salah Satu -- </option>
						        <option value="Anggota TU"> Anggota TU </option>
						        <option value="Administrasi Kegiatan Siswa"> Administrasi Kegiatan Siswa </option>
						        <option value="Administrasi SPP"> Administrasi SPP</option>
						        <option value="Administrasi Kegiatan Sekolah"> Administrasi Kegiatan Sekolah </option>
					        </select>
                          </div>
                            <div class="form-group col-md-6 col-12">
                                <label for=""> Foto </label>
                                <input type="file" name="foto" class="form-control  " id="">
                            </div>
                          <div class="form-group col-md-12 col-12">
                              <label for="">BIO</label>
                              <textarea name="bio" id="" cols="30" class="form-control" rows="10"><?= $dnm['bio']; ?></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" name="ubah" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                  </form>
                <?php ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
                  <?php 
                  if(isset($_POST['ubah'])){
                    $nama     = $_POST['nama'];
                    $nip      = $_POST['nip'];
                    $bio      = $_POST['bio'];
                    $posisi   = $_POST['posisi'];
                    $filename = $_FILES['foto']['name'];
                    $rand     = rand();
                    $ekstensi =  array('png','jpg','jpeg','gif');
                    $ukuran   = $_FILES['foto']['size'];
                    $ext      = pathinfo($filename, PATHINFO_EXTENSION);
                      if($filename == ""){
                      $query = mysqli_query($konek,"UPDATE tb_tu SET nama='$nama',posisi = '$posisi' , nip='$nip', bio='$bio' WHERE id='$idlevel'");
                      echo " <script> alert('profil berhasil diedit'); document.location.href = 'profil.php'; </script> ";
                    }else{
                      if(!in_array($ext,$ekstensi) ) {
                        echo " <script> alert('file bukan tipe gambar!'); document.location.href = 'profil.php'; </script> ";
                    }else{
                      if($ukuran < 91044070){		
                        $xx = $rand.'_'.$filename;
                        move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/img/tu/'.$rand.'_'.$filename);
                        $query2 = mysqli_query($konek,"UPDATE tb_tu SET nama='$nama', nip='$nip',bio='$bio',foto='$xx', posisi = '$posisi' WHERE id='$idlevel'");
                        echo "<script> document.location.href = 'profil.php' </script>";
                    }else{
                        echo " <script> alert('ukuran terlalu besar!'); document.location.href = 'profil.php'; </script> ";
                      }
                    } 
                  }
                }
                  ?>
<?php
include 'footer.php';
?>