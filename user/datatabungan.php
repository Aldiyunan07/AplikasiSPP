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
										<h4 class="mb-0 font-size-18 ml-3 mt-3 mb-0 font-size-18" >Data Tabungan <?= $d['namasiswa']; ?></h4>
										<div class="page-title-right">
											<ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
												<li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
												<li class="breadcrumb-item active">Data Tabungan </li>
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
                                     <?php 
                                    $datat = mysqli_query($konek,"SELECT * FROM tb_tabungan WHERE idsiswa='$id'"); 
                                    $d = mysqli_fetch_assoc($datat); ?>
                            <h4 class="mb-2">
                                Tabungan Anda : <?php if( $d['jumlah'] > 0 ){
                                    echo $d['jumlah'];
                                }else{
                                    echo "0";
                                }
                                 ?>
                            </h4>
                                    <button class="btn btn-primary float-right btn-sm mb-3 text-white" data-toggle="modal" data-target="#myModal2"> Tambah Data Tabungan</button>
                                                <div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title mt-0" id="myModalLabel">Tambah Data Tabungan</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="post">
                                                                    <table class="table table-borderless">
                                                                        <tr>
                                                                            <td> <h5 class="mt-2"> Jumlah </h5></td>
                                                                            <input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
                                                                            <td> <input type="text" autocomplete="off" name="jumlah" class="form-control" id=""> </td>
                                                                        </tr>
                                                                    </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Kembali</button>
                                                                <button type="submit" name="simpantabungan" class="btn btn-primary ">Simpan</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                    </form>
                                                </div><!-- /.modal --><div class="table-responsive" style="border:none;">
                                            <table id="datatable" class="table table-bordered">
                                                <thead bgcolor="#556ee6" class="text-white">
                                                <tr>
                                                    <td> No </td>
                                                    <td> No Pembayaran </td>
                                                    <td> Jumlah </td>
                                                    <td> Tanggal Pembayaran </td>
                                                    <td> Waktu </td>
                                                    <td> Detail</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $no    = 1;
                                                $datat = mysqli_query($konek,"SELECT * FROM t_tabungan WHERE idsiswa='$_SESSION[id]'"); 
                                                while($d = mysqli_fetch_array($datat)){ ?>    
                                                    <tr>
                                                        <td > <?= $no++; ?> </td>
                                                        <td> <?= $d['nobayar']; ?> </td>
                                                        <td> <?= $d['jumlah']; ?> </td>
                                                        <td> <?= $d['tgl_bayar']; ?> </td>
                                                        <td> <?= $d['wkt_bayar']; ?> </td>
                                                        <td> <a href="" class="btn btn-success btn-sm"> Cetak </a> </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
</div>
</div>
<?php 
if(isset($_POST['simpantabungan'])){
    $jumlah = $_POST['jumlah'];
    $idsis  = $_POST['id'];
    $date   = date('Y-m-d');
    $waktu  = date('H:i:s');
    $fake1  = date('sHi');
    $rand   = rand();
    $nobayar = "$fake1$rand";
    $cek     = mysqli_query($konek,"SELECT * FROM tb_tabungan WHERE idsiswa='$idsis'");
    $numcek  = mysqli_num_rows($cek);
    if($numcek > 0){
        $assoc  = mysqli_fetch_assoc($cek);
        $today  = $assoc['jumlah'];
        $jumjum = $today + $jumlah; 
        $sql1  = mysqli_query($konek,"UPDATE tb_tabungan SET jumlah='$jumjum' , tgl_update='$date' WHERE idsiswa='$idsis'");
         
    }else{
        $sql2  = mysqli_query($konek,"INSERT INTO tb_tabungan VALUES('','$idsis','$jumlah','$date','$waktu')");         
    }
    $sql = mysqli_query($konek,"INSERT INTO t_tabungan VALUES('','$nobayar','$idsis','$jumlah','$date','$waktu')");    
    if($sql){
        echo "<script>
                Swal.fire({
                    title: 'Berhasil di tabung',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datatabungan.php')
                }
                });
        
            </script>
        ";
    }else{
        echo "<script>
                Swal.fire({
                    title: 'Gagal Di Tabung!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datatabungan.php')
                }
                });
        
            </script>
        ";
    }    
}
 ?>
<?php include 'footer.php'; ?>