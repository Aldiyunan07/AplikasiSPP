<?php 
include '../admin/koneksi.php';
include 'header.php';
 ?>
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="page-title-box d-flex align-items-center justify-content-between">
							<h4 class="mb-0 font-size-18 ml-3 mt-3 mb-0 font-size-18">Data Galat Transaksi
								<?= $d['namasiswa']; ?></h4>
							<div class="page-title-right">
								<ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
									<li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
									<li class="breadcrumb-item active">Data Galat </li>
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
							<a href="buat_galat.php" class="btn btn-primary btn-sm mb-3"> Tambah Data Galat </a>
							<button class="btn btn-success btn-sm float-right" data-target="#myModal"
								data-toggle="modal"> Apa itu galat transaksi? </button>
							<table id="datatable" class="table table-bordered">
								<thead>
									<tr class="bg-primary text-white">
										<th>NO</th>
										<th>Foto</th>
										<th>Bulan</th>
										<th>Tanggal</th>
										<th>Jumlah</th>
										<th>Proses</th>
									</tr>
								</thead>
								<?php
                                    $no = 1;
                                    $ft = mysqli_query($konek,"SELECT * FROM tb_galat INNER JOIN spp ON tb_galat.idspp=spp.idspp WHERE tb_galat.idsiswa='$id'");
                                    while($d = mysqli_fetch_array($ft)){
                                    ?>
								<tr>
									<td><?= $no++ ?></td>
									<td align="center"><img height="80" width="150" src="img/<?= $d['gambar'] ?>"
											alt=""></td>
									<td><?= $d['bulan'] ?></td>
									<td><?= $d['tanggal'] ?></td>
									<td><?= $d['nominal'] ?></td>
									<td><?= $d['proses'] ?></td>
								</tr>
								<?php } ?>
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
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title mt-0" id="myModalLabel">Apa itu Galat Transaksi?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<h6 class="m-3" style="text-align:justify">
			Galat Transaksi adala kondisi dimana siswa sudah melakukan transaksi pembayaran SPP namun di dalam aplikasi nya belum terkonfirmasi transaksi. Maka siswa bisa mengajukan transaksi yang sebelum nya dengan mengirimkan foto struk pembayaran spp 
			</h6>
			<div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm waves-effect" data-dismiss="modal">Kembali</button>
            </div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</form>
</div><!-- /.modal -->
<?php include 'footer.php'; ?>