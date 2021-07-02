<?php include 'header.php'; ?>
<div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="ml-3 mt-3 mb-0 font-size-18">Data Tabungan Siswa </h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
                                            <li class="breadcrumb-item"><a href="index.php">Data</a></li>
                                            <li class="breadcrumb-item active">Data Tabungan Siswa</li>
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
                                    <div class="" style="border:none;">
                                        <table class="table table-bordered" id="datatable">
                                            <thead>
                                            <tr bgcolor="#556ee6" class="text-white">
                                                <td> No </td>
                                                <td> NIS </td>
                                                <td> Nama Siswa </td>
                                                <td> Kelas </td>
                                                <td> Jumlah Tabungan </td>
                                                <td> Terakhir Transaksi </td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $no   = 1;
                                            $data = mysqli_query($konek,"SELECT * FROM tb_tabungan INNER JOIN siswa ON tb_tabungan.idsiswa=siswa.idsiswa");
                                            while($d = mysqli_fetch_array($data)){
                                            ?>
                                            <tr>
                                                <td> <?= $no++; ?> </td>
                                                <td> <?= $d['nis']; ?> </td>
                                                <td> <?= $d['namasiswa']; ?> </td>
                                                <td> <?= $d['kelas']; ?> </td>
                                                <td> <?= $d['jumlah']; ?> </td>
                                                <td> <?= $d['tgl_update']; ?> </td>
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
<?php include 'footer.php'; ?>