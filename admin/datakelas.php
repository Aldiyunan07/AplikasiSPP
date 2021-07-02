<?php include 'header.php'; ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="ml-3 mt-3 mb-0 font-size-18">Data Kelas</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                    <li class="breadcrumb-item"><a href="index.php">Data</a></li>
                                    <li class="breadcrumb-item active">Data Kelas</li>
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
                            <button class="btn btn-primary btn-sm mb-3 text-white" data-toggle="modal"
                                data-target="#myModal"> Tambah Data Kelas</button>
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title mt-0" id="myModalLabel">Tambah Data Kelas</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>
                                                            <h5 class="mt-2"> Kelas</h5>
                                                        </td>
                                                        <td>
                                                            <select name="kelas" class="form-control" id="">
                                                                <option value="">-- Pilih Kelas --</option>
                                                                <option value="X"> X </option>
                                                                <option value="XI"> XI</option>
                                                                <option value="XII"> XII</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 class="mt-2"> Jurusan</h5>
                                                        </td>
                                                        <td>
                                                            <select name="jurusan" class="form-control" id="">
                                                                <option value=""> -- Pilih Jurusan --</option>
                                                                <?php 
                                                                                    $jurusan = mysqli_query($konek,"SELECT * FROM tb_jurusan"); 
                                                                                    while($j = mysqli_fetch_array($jurusan)){ ?>
                                                                <option value="<?= $j['namajurusan'] ?>">
                                                                    <?= $j['namajurusan'] ?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                data-dismiss="modal">Kembali</button>
                                            <button type="submit" name="simpankelas"
                                                class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <button class="btn btn-success btn-sm mb-3 text-white" data-toggle="modal"
                                data-target="#myModal2"> Tambah Data Jurusan</button>
                            <div id="myModal2" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title mt-0" id="myModalLabel">Tambah Data Jurusan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>
                                                            <h5 class="mt-2"> Nama</h5>
                                                        </td>
                                                        <td> <input type="text" autocomplete="off" name="namajurusan"
                                                                class="form-control" id=""> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 class="mt-2"> Singakatan </h5>
                                                        </td>
                                                        <td> <input type="text" name="singkatan" autocomplete="off"
                                                                class="form-control" id=""> </td>
                                                    </tr>
                                                </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                data-dismiss="modal">Kembali</button>
                                            <button type="submit" name="simpanjurusan"
                                                class="btn btn-primary ">Simpan</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                                </form>
                            </div><!-- /.modal -->
                            <div class="table-responsive" style="border:none;">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Tanggal di buat</th>
                                            <th>Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
												$data = mysqli_query($konek,"SELECT * FROM tb_kelas");
												$i = 1;
												while($dta = mysqli_fetch_array($data)){ 
											?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $dta['kelas']; ?></td>
                                            <td><?= $dta['jumlah']; ?> Siswa </td>
                                            <td><?= $dta['tgl_dibuat']; ?></td>
                                            <td><?= $dta['jurusan']; ?></td>
                                            <td>
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
                                                        location.assign('datakelas.php?act=hapus&id=<?= $dta['id'] ?>')
                                                    }
                                                    });">
                                                    Hapus</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php
if (isset($_POST['simpankelas'])){
    $kelas   = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $select1 = mysqli_query($konek,"SELECT * FROM tb_jurusan WHERE namajurusan='$jurusan'");
    $assoc   = mysqli_fetch_assoc($select1);
    $singkatan = $assoc['singkatan'];
    $namakelas = "$kelas $singkatan";
    $tgl = date('Y-m-d');
    $cek = mysqli_query($konek,"SELECT * FROM tb_kelas WHERE kelas='$namakelas'");
    $numcek = mysqli_num_rows($cek);
    if($numcek > 0){
        echo "<script>
                Swal.fire({
                    title: 'Data Kelas Sudah ada!   ',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datakelas.php')
                }
                });
        
            </script>
        "; 
    }else{
    $sqlz = mysqli_query($konek,"INSERT INTO tb_kelas(id,kelas,jurusan,tgl_dibuat,jumlah) VALUES ('','$namakelas','$jurusan','$tgl','0')");
    if($sqlz){
            echo "<script>
                Swal.fire({
                    title: 'Data Kelas berhasil di tambahkan',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datakelas.php')
                }
                });
        
            </script>
        "; 
        }else{
            echo "<script>
                Swal.fire({
                    title: 'Data Kelas gagal di tambahkan!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datakelas.php')
                }
                });
        
            </script>
        "; 
        }   
    }
}
if(isset($_POST['simpanjurusan'])){
    $jurusan2 = $_POST['namajurusan'];
    $singkatan2 = $_POST['singkatan'];
    $date      = date('Y-m-d');
    $sqlz1 = mysqli_query($konek,"INSERT INTO tb_jurusan VALUES('','$jurusan2','$singkatan2','$date')");
    if($sqlz1){
        echo "<script>
                Swal.fire({
                    title: 'Data Jurusan berhasil Di Tambahkan',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datakelas.php')
                }
                });
        
            </script>
        "; 
    }else{
        echo "<script>
                Swal.fire({
                    title: 'Data Jurusan Gagal Di Tambahkan',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datakelas.php')
                }
                });
        
            </script>
        "; 
    }
}

if(isset($_GET['act'])){
    $idk = $_GET['id'];
    $sqlz2 = mysqli_query($konek,"DELETE FROM tb_kelas WHERE id='$idk'");
    if($sqlz2){
        echo "<script>
                Swal.fire({
                    title: 'Data Kelas Berhasil Di Hapus ',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datakelas.php')
                }
                });
        
            </script>
        "; 
    }else{
        echo "<script>
                Swal.fire({
                    title: 'Data Kelas Gagal Di Hapus!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datakelas.php')
                }
                });
        
            </script>
        "; 
    }
}
?>
    <?php include 'footer.php'; ?>