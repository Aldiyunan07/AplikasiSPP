<?php
include 'header.php';
include 'koneksi.php';
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
                                    <h4 class="ml-3 mt-4 mb-0 font-size-18">Data Galat Transaksi</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb mb-0 ml-3 mt-4 mr-3">
                                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                            <li class="breadcrumb-item active">Data Galat Transaksi</li>
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
        								<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="bg-primary text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama Siswa</th>
                                                <th>Bulan</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
												$data = mysqli_query($konek,"SELECT * FROM siswa JOIN tb_galat ON siswa.idsiswa=tb_galat.idsiswa JOIN spp ON tb_galat.idspp=spp.idspp WHERE tb_galat.proses='belum'");
												$i = 1;
												
												while($dta = mysqli_fetch_array($data)){ 
												?>
											<tr>
                                                <td><?= $i++; ?></td>
                                                <td align="center"><img src="../user/img/<?= $dta['gambar']; ?>" alt="" height="100" width="150"></td>
                                                <td><?= $dta['namasiswa']; ?></td>
                                                <td><?= $dta['bulan']; ?></td>
                                                <td><?= $dta['tanggal']; ?></td>
                                                <td>
													<a class="btn btn-primary btn-sm text-white" onclick="Swal.fire({
                                                        title: 'Apakah anda yakin untuk melakukan galat transaksi?',
                                                        icon: 'info',
                                                        showCancelButton: true, 
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33', 
                                                        confirmButtonText: 'Ok'
                                                    }).then(function(result) {
                                                    if (result.value) {
                                                        location.assign('aksi_galat.php?id=<?= $dta['id'] ?>&idspp=<?= $dta['idspp'] ?>&act=konfirmasi')
                                                    }
                                                    });"><i class="fa fa-check"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" onclick="Swal.fire({
                                                        title: 'Apakah anda yakin ingin menghapus data?',
                                                        icon: 'info',
                                                        showCancelButton: true, 
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33', 
                                                        confirmButtonText: 'Ok'
                                                    }).then(function(result) {
                                                    if (result.value) {
                                                        location.assign('aksi_galat.php?id=<?= $dta['id'] ?>&act=hapus')
                                                    }
                                                    });"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
												<?php } ?>
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
<?php 
if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if($pesan == "hapussukses"){
        echo "    <script>
                Swal.fire({
                    title: 'Data Berhasil Di tambahkan',
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
    }elseif($pesan == "sukses"){
        echo "    <script>
                Swal.fire({
                    title: 'Pembayaran Berhasil',
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
<?php include 'footer.php';  ?>