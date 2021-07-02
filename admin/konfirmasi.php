<?php
ob_start();
include 'header.php'; ?>
<?php

if($_GET['pesan']){
    if($_GET['pesan'] == "berhasil" ){
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
                Swal.fire({
                    title: 'Pembayaran Berhasil',
                    icon:'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('konfirmasi.php')
                }
                });
            </script>
        ";         
    }elseif($_GET['pesan'] == "gagal" ){
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
                Swal.fire({
                    title: 'Pembayaran Gagal ',
                    icon:'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then(function(result) {
                if (result.value) {
                    location.assign('konfirmasi.php')
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="ml-3 mt-3 mb-0 font-size-18">Konfirmasi Transaksi </h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active">Konfirmasi Transaksi</li>
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
                            <div class="table-responsive" style="border:none;">
                                <table class="table table-bordered" id="datatable">
                                    <thead>
                                        <tr bgcolor="#556ee6" class="text-white">
                                            <td> No </td>
                                            <td> NIS </td>
                                            <td> Nama Siswa </td>
                                            <td> SPP Bulan </td>
                                            <td> Jumlah Tabungan </td>
                                            <td> Aksi </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no   = 1;
                                            $data = mysqli_query($konek,"SELECT * FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa INNER JOIN tb_tabungan ON siswa.idsiswa=tb_tabungan.idsiswa WHERE spp.idadmin='0'");
                                            while($d = mysqli_fetch_array($data)){
                                            ?>
                                        <tr>
                                            <td> <?= $no++; ?> </td>
                                            <td> <?= $d['nis']; ?> </td>
                                            <td> <?= $d['namasiswa']; ?> </td>
                                            <td> <?= $d['bulan']; ?> </td>
                                            <td> <?= $d['jumlah']; ?> </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="?idspp=<?= $d['idspp'] ?>&idsiswa=<?= $d['idsiswa'] ?>&jumlah=<?= $d['jumlah'] ?>"
                                                        class="btn btn-success btn-sm"> konfirmasi </a>
                                                    <a href="" class="btn btn-danger btn-sm"> Hapus </a>
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
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['idspp'])){
    $idspp   = $_GET['idspp'];
    $jum     = $_GET['jumlah'];
    $idsiswa = $_GET['idsiswa'];
    $cekin   = mysqli_query($konek,"SELECT * FROM spp WHERE idspp='$idspp'");
    $soc     = mysqli_fetch_assoc($cekin);
    $hasil   = $jum - $soc['jumlah'];
		// bulan
		$today = date("ymd");
		$query = mysqli_query($konek,"SELECT max(nobayar) AS last FROM spp WHERE nobayar LIKE '$today%'");
		$data = mysqli_fetch_assoc($query);
		$lastNobayar = $data['last'];
		$lastNoUrut  = substr($lastNobayar, 6 ,4);
		$nextNoUrut  = $lastNoUrut + 1;
		$nextNobayar = $today.sprintf('%04s' , $nextNoUrut);

		// tanggal bayar
		$tglbayar = date('Y-m-d');
		$wkt_bayar = date('H:i:s');
		// id admin
		$admin = $_SESSION['id'];

		$byr = mysqli_query($konek ,"UPDATE spp SET 
			nobayar = '$nextNobayar',
			tglbayar = '$tglbayar',
			ket = 'LUNAS',
			idadmin = '$admin',
			wkt_bayar = '$wkt_bayar'
			WHERE idspp = '$idspp'");
		$tagihan = mysqli_query($konek,"SELECT SUM(jumlah) as f FROM spp WHERE ket='BELUM' AND idsiswa = '$idsiswa'");
		$tagihan1 = mysqli_fetch_assoc($tagihan);
		$tagihan3 = $tagihan1['f'];
		$ubah = mysqli_query($konek,"UPDATE tb_tagihan SET jumlah = '$tagihan3' WHERE idsiswa='$idsiswa'");
        $waktu  = date('H:i:s');
        $fake1  = date('sHi');
        $rand   = rand();
        $nobayar = "$fake1$rand";
        $ubah2 = mysqli_query($konek,"UPDATE tb_tabungan SET jumlah='$hasil' , tgl_update='$tglbayar' WHERE idsiswa='$idsiswa'");
        $tambah = mysqli_query($konek,"INSERT INTO t_tabungan VALUES(null,'$nobayar','$idsiswa','-$soc[jumlah]','$tglbayar','$wkt_bayar')");
        if($byr){
            header('location:konfirmasi.php?pesan=berhasil');
        }else{
            header('location:konfirmasi.php?pesan=gagal');
        }
}
?>
<?php include 'footer.php'; ?>