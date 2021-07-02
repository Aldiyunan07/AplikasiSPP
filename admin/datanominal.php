<?php include 'header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="ml-3 mt-3 mb-0 font-size-18">Data Nominal SPP </h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                    <li class="breadcrumb-item active">Data Nominal</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive" style="border:none;">
                            <button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm mb-3"> Tambah Data Nominal </button>
                            <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr style="color:white;" bgcolor="#556ee6">
                                    <td> No </td>
                                    <td> Tahun Ajaran </td>
                                    <td> Nominal SPP </td>
                                    <td> Tanggal Peresmian </td>
                                    <td> Aksi </td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $nom  = 1;
                                $data = mysqli_query($konek,"SELECT * FROM tb_nominal"); 
                                while($d = mysqli_fetch_array($data)){ ?>
                                <tr>
                                    <td> <?= $nom++; ?> </td>
                                    <td> <?= $d['tahun']; ?> </td>
                                    <td> <?= $d['nominal']; ?> </td>
                                    <td> <?= $d['tgl_peresmian']; ?> </td>
                                    <td align="center">
                                    <?php 
                                    $years  = date('Y');
                                    $years1 = $years + 1;
                                    $jj     = "$years/$years1";

                                    if($d['tahun'] == "$jj" ){
                                        echo "<div class='btn btn-group'>";
                                        echo "<button data-toggle='modal' data-target='#myModal1' class='btn btn-sm btn-danger'> Hapus </button>";
                                        echo "</div>";
                                    ?>
                                    <div id="id<?= $d['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title mt-0" id="myModalLabel">Tambah Data Nominal</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                    Ini adalah <?= $d['id']; ?>    
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    <?php
                                    }else{
                                        echo "<div class='btn btn-group'>";
                                        echo "<a href='?idhapus=$d[id]' onclick='return confirm('apakah anda yakin menghapus data?')' class='btn btn-sm btn-danger'> Hapus </a>";
                                        echo "</div>";
                                    }
                                    ?>
                                     
                                    </td>
                                </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title mt-0" id="myModalLabel">Tambah Data Nominal</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td> <h5 class="mt-2"> Pilih Tahun Ajaran </h5></td>
                                                        <td> 
                                                            <select name="tahunajaran" class="form-control" id="">
                                                                <?php 
                                                                $dty  = date('Y');
                                                                $dty1 = $dty + 1;
                                                                $jm   = $dty + $dty1;
                                                                ?>
                                                                <option value="<?= $dty ?>/<?= $dty1 ?>"> <?= $dty ?>/<?= $dty1 ?> </option>
                                                                <?php 
                                                                    for ($i = 0 ; $i < 12; $i++){
                                                                        $year = date('Y');
                                                                        $no1  = $i + 1;
                                                                        $no2  = $i + 2;
                                                                        $pil2 = $year + $no1;
                                                                        $pil1 = $year + $no2;
                                                                        ?>
                                                                        <option value="<?= $pil2 ?>/<?= $pil1 ?>"> <?= $pil2 ?>/<?= $pil1 ?> </option>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <h5 class="mt-2"> Nominal</h5></td>
                                                        <td> <input type="text" autocomplete="off" name="nominal" class="form-control" > 
                                                        </td>
                                                    </tr>
                                                </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Kembali</button>
                                            <button type="submit" name="simpannominal" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<?php 
if(isset($_POST['simpannominal'])){
    $tahunajaran = $_POST['tahunajaran'];
    $nominal     = $_POST['nominal'];
    $cek         = mysqli_query($konek,"SELECT * FROM tb_nominal WHERE tahun='$tahunajaran'");
    $numcek      = mysqli_num_rows($cek);
    $tgl         = date('Y-m-d');
    if($numcek > 0 ){
        echo "    <script>
                Swal.fire({
                    title: 'Data Nominal Sudah Ada!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datanominal.php')
                }
                });
        
            </script>
        ";
    }else{
        $sql = mysqli_query($konek,"INSERT INTO tb_nominal VALUES (null,'$tahunajaran','$nominal','$tgl')");
        if($sql){
            echo "    <script>
                Swal.fire({
                    title: 'Data Nominal Berhasil Di Buat',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datanominal.php')
                }
                });
        
            </script>
        ";
        }else{
            echo "    <script>
                Swal.fire({
                    title: 'Data Nominal gagal di buat!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datanominal.php')
                }
                });
        
            </script>
        ";
        }
    }
}
?>
<div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">Peringatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <p class="text-danger">
                    Anda Tidak bisa menghapus data nominal yang sedang di pakai karena akan terjadi kesalahan pada transaksi
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Kembali</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php 
if(isset($_GET['idhapus'])){
    $idhapus = $_GET['idhapus'];
    $sql     = mysqli_query($konek,"DELETE FROM tb_nominal WHERE id='$idhapus'");
    if($sql){
        echo "    <script>
                Swal.fire({
                    title: 'Data Tahun AJaran Berhasil Di Hapus',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datanominal.php')
                }
                });
        
            </script>
        ";
    }else{
        echo "    <script>
                Swal.fire({
                    title: 'Data Tahun Gagal Di hapus!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('datanominal.php')
                }
                });
        
            </script>
        ";
    }
}
?> 
<?php include 'footer.php'; ?>