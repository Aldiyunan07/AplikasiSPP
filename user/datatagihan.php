<?php 
include '../admin/koneksi.php';
include 'header.php';
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
                            <h4 class="mb-0 font-size-18 ml-3 mt-3 mb-0 font-size-18">Data Tagihan
                                <?= $d['namasiswa']; ?></h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                    <li class="breadcrumb-item active">Data Tagihan </li>
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
                            <?php 
                                    $datat = mysqli_query($konek,"SELECT * FROM tb_tabungan WHERE idsiswa='$id'"); 
                                    $d = mysqli_fetch_assoc($datat); ?>
                            <h4 class="mb-2">
                                Tabungan Anda : 
                                <?php if( $d['jumlah'] > 0 ){
                                    echo $d['jumlah'];
                                }else{
                                    echo "0";
                                }
                                 ?>
                            </h4>
                            <a target="_blank" href="cetak.php?id=<?= $d['idsiswa'] ?>&act=many"
                                class="btn btn-primary float-right btn-sm mb-2"> Cetak Semuanya </a>
                            <div class="table-responsive" style="border:none;">
                            <table id="datatable" class="table table-borderless">
                                <thead class="bg-primary text-white">
                                    <tr class="bg-primary text-white">
                                        <th>NO</th>
                                        <th>BULAN</th>
                                        <th>TANGGAL BAYAR</th>
                                        <th>Jatuh Tempo</th>
                                        <th>JUMLAH </th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
												$idsiswa = $d['idsiswa'];
												$data = $konek ->query("SELECT * FROM spp WHERE idsiswa='$idsiswa' AND ket='BELUM'");
												$i    = 1;
												while ($dta = mysqli_fetch_assoc($data) ) : 
											?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $dta['bulan'] ?></td>
                                        <td><?= $dta['tglbayar'] ?> , <?= $dta['wkt_bayar']; ?></td>
                                        <td><?= $dta['jatuhtempo'] ?></td>
                                        <td><?= $dta['jumlah'] ?></td>
                                        <td>
                                            <?php
                                                    $jmk = $d['jumlah'] - $dta['jumlah'];
                                                    ?>
                                            <a class="btn btn-success btn-sm" target="_blank"
                                                href="cetak.php?id=<?= $dta['idsiswa'] ?>&act=person&idspp=<?= $dta['idspp'] ?>">Cetak</a>
                                            <a class="btn btn-primary btn-sm"
                                                href="?id=<?= $dta['idsiswa'] ?>&act=person&idspp=<?= $dta['idspp'] ?>&jum=<?= $dta['jumlah'] ?>">Bayar</a>
                                        </td>
                                    </tr>
                                    <?php $i++;  ?>
                                    <?php endwhile; ?>
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
<?php
if(isset($_GET['id'])){
    $jumlahspp = $_GET['jumlah'];
    $idsiswa = $_GET['id'];
    $idspp   = $_GET['idspp'];
    $cekin   = mysqli_query($konek,"SELECT * FROM tb_tabungan WHERE idsiswa='$idsiswa'");
    $bg      = mysqli_fetch_assoc($cekin);
    $hasil   = $bg['jumlah'] - $jumlahspp ;
    if($hasil < 0 ){
        echo "<script> alert('Tabungan anda kurang!'); </script>";
    }else{
		// tanggal bayar
		$tglbayar = date('Y-m-d');
		$wkt_bayar = date('H:i:s');
		// id admin

		$byr = mysqli_query($konek ,"UPDATE spp SET tglbayar = '$tglbayar', idadmin = '0', wkt_bayar = '$wkt_bayar' WHERE idspp = '$idspp'");
        $up  = mysqli_query($konek,"UPDATE tb_tabungan SET jumlah='$hasil' WHERE idsiswa='$idsiswa'");
        if($byr){
            echo "<script> alert('Pembayaran berhasil! mohon tunggu konfirmasi selanjutnya');</script>";
        }else{
             echo "<script> alert('Pembayaran gagal');</script>";
        }
    }
}
?>
<?php include 'footer.php'; ?>