<?php 
include 'koneksi.php';
include 'header.php';
?>
<?php
if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "hapussukses"){
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
                Swal.fire({
                    title: 'Data Siswa Berhasil Di Hapus',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datasiswa.php')
                }
                });
        
            </script>
        ";
    }elseif($_GET['pesan'] == "hapusgagal"){
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
                Swal.fire({
                    title: 'Data Siswa gagal Di Hapus!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datasiswa.php')
                }
                });
        
            </script>
        ";

    }elseif($_GET['pesan'] == "tambahsukses"){
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
                Swal.fire({
                    title: 'Data Berhasil di tambahkan',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datasiswa.php')
                }
                });
        
            </script>
        ";

    }elseif($_GET['pesan'] == "editsukses"){
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
                Swal.fire({
                    title: 'Data Berhasil di edit',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datasiswa.php')
                }
                });
        
            </script>
        ";

    }
}
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
                                <h4 class="ml-3 mt-3 mb-0 font-size-18">Data Siswa</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                            <li class="breadcrumb-item"><a href="index.php">Data</a></li>
                                            <li class="breadcrumb-item active">Data Siswa</li>
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
                                        <div class="table-responsive " style="border:none;">
                                        <a class="btn btn-primary btn-sm mb-3" href="tambahSW.php"> Tambah Data</a>
                                        <table id="datatable" class="table table-bordered">
                                            <thead class="bg-primary text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Biaya</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
												$data = mysqli_query($konek,"SELECT * FROM siswa");
												$i = 1;
												while($dta = mysqli_fetch_array($data)){ 
											?>
											<tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $dta['nis']; ?></td>
                                                <td><?= $dta['namasiswa']; ?></td>
                                                <td><?= $dta['kelas']; ?></td>
                                                <td><?= $dta['tahunajaran']; ?></td>
                                                <td><?= $dta['biaya']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-sm btn-primary" href="ubahSW.php?id=<?= $dta['idsiswa'] ?>"> Edit </a>
                                                        <a class="btn btn-sm btn-danger text-white"
                                                        onclick="Swal.fire({
                                                        title: 'Apakah anda yakin ingin menghapus data?',
                                                        icon: 'info',
                                                        showCancelButton: true, 
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33', 
                                                        confirmButtonText: 'Ok'
                                                    }).then(function(result) {
                                                    if (result.value) {
                                                        location.assign('hapusSW.php?id=<?= $dta['idsiswa'] ?>')
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
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <script>
//javascript working
$('document').ready(function()
{
	$('#datatable').dataTable({
		"responsive": true
    } );
});
</script>
dan untuk di atas
 <?php include 'footer.php'; ?>