<?php
include 'header.php';
include 'koneksi.php';
if($_SESSION['login'] !== "Admin" ){
	echo "<script> document.location.href = 'index.php' </script>";
}
?>
<?php
if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "hapusberhasil"){
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
                Swal.fire({
                    title: 'Data TU Berhasil Di Hapus',
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
    }elseif($_GET['pesan'] == "hapusgagal"){
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
                Swal.fire({
                    title: 'Data TU gagal Di Hapus!',
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

    }elseif($_GET['pesan'] == "editberhasil"){
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	  <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                            <div class="card">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="ml-3 mt-3 mb-0 font-size-18">Data Staff TU</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                            <li class="breadcrumb-item"><a href="index.php">Data</a></li>
                                            <li class="breadcrumb-item active">Data Staff TU</li>
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
                                    <div class="table-responsive" style="border:none;">
                                    <a class="btn btn-primary btn-sm mb-3" href="tambahTU.php"> Tambah Data</a>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="bg-primary text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama Guru</th>
                                                <th>NIP</th>
                                                <th>Username</th>
                                                <th>Posisi</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
												$data = mysqli_query($konek,"SELECT * FROM tb_tu");
												$i = 1;
												while($dta = mysqli_fetch_array($data)){ 
											?>
											<tr>
                                                <td><?= $i++; ?></td>
                                                <td><img src="img/tu/<?= $dta['foto']; ?>" alt="" height="110" width="90"></td>
                                                <td><?= $dta['nama']; ?></td>
                                                <td><?= $dta['nip']; ?></td>
                                                <td><?= $dta['username']; ?></td>
                                                <td><?= $dta['posisi']; ?></td>
                                                <td>
                                                    <div class="btn-group">

                                                    <a class="btn btn-sm btn-primary" href="ubahTU.php?id=<?= $dta['id'] ?>"> Edit </a>
                                                    <a class="btn btn-sm btn-danger" href="#"
                                                    onclick="Swal.fire({
                                                        title: 'Apakah anda yakin ingin menghapus data?',
                                                        icon: 'info',
                                                        showCancelButton: true, 
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33', 
                                                        confirmButtonText: 'Ok'
                                                    }).then(function(result) {
                                                    if (result.value) {
                                                        location.assign('hapusTU.php?id=<?= $dta['id'] ?>')
                                                    }
                                                    });"> Hapus</a>
                                                    </div>
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
                
<?php include 'footer.php';  ?>