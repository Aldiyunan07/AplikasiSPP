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
										<h4 class="mb-0 font-size-18 ml-3 mt-3 mb-0 font-size-18	" >Data Pembayaran <?= $d['namasiswa']; ?></h4>
										<div class="page-title-right">
											<ol class="breadcrumb mb-0 ml-3 mt-3 mr-3">
												<li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
												<li class="breadcrumb-item active">Data Pembayaran </li>
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
									<a target="_blank" href="cetak.php?id=<?= $d['idsiswa'] ?>&act=many" class="btn btn-primary btn-sm mb-2"> Cetak Semuanya </a>
                                        <table id="datatable" class="table table-bordered">
                                            <thead class="bg-primary text-white">
                                            <tr class="bg-primary text-white">
												<th>NO</th>
												<th>NO PEMBAYARAN</th>
												<th>BULAN</th>
												<th>TANGGAL BAYAR</th>
												<th>JUMLAH  </th>
												<th>AKSI</th>
											</tr>
                                            </thead>
                                            <tbody>
											<?php 
												$idsiswa = $d['idsiswa'];
												$data = $konek ->query("SELECT * FROM spp WHERE idsiswa='$idsiswa' AND ket='LUNAS'");
												$i    = 1;
												while ($dta = mysqli_fetch_assoc($data) ) : 
											?>
											<tr>
												<td><?= $i; ?></td>
												<td><?= $dta['nobayar'] ?></td>
												<td><?= $dta['bulan'] ?></td>
												<td><?= $dta['tglbayar'] ?> , <?= $dta['wkt_bayar']; ?></td>
												<td><?= $dta['jumlah'] ?></td>
												<td>
													<a class="btn btn-success btn-sm" target="_blank" href="cetak.php?id=<?= $dta['idsiswa'] ?>&act=person&idspp=<?= $dta['idspp'] ?>">Cetak</a> 
												</td>
											</tr>
											<?php $i++;  ?>
 											<?php endwhile; ?>
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
 <?php include 'footer.php'; ?>