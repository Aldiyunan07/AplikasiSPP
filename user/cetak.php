<?php 
	include '../admin/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slip Pembayaran SPP</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>

<?php 
if($_GET['act'] == "person"){
    ?>
	<h3>SMK AL MADANI GARUT<b><br/>LAPORAN PEMBAYARAN SPP</b></h3>
	<hr/>
    <?php 
    
	$siswa = $konek->query("SELECT * FROM siswa WHERE idsiswa='$_GET[id]' ");
	$sw = mysqli_fetch_assoc($siswa);

	 ?>
	<table>
		<tr>
			<td>Nama Siswa </td>
			<td>:</td>
			<td> <?= $sw['namasiswa'] ?></td>
		</tr>
		<tr>
			<td>Nis </td>
			<td>:</td>
			<td> <?= $sw['nis'] ?></td>
		</tr>
		<tr>
			<td>Kelas </td>
			<td>:</td>
			<td> <?= $sw['kelas'] ?></td>
		</tr>
	</table>
	<hr>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>NO. BAYAR</th>
		<th>PEMBAYARAN</th>
		<th>TANGGAL BAYAR</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>
	<?php 
	$spp = $konek -> query("SELECT spp.*,siswa.nis,siswa.namasiswa,siswa.kelas
							FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa
							WHERE idspp ='$_GET[idspp]'
							ORDER BY nobayar ASC");
	$i=1;
	$total = 0;
	$dta = mysqli_fetch_assoc($spp);
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align=""><?= $dta['nobayar'] ?></td>
		<td align=""> SPP Bulan <?= $dta['bulan'] ?></td>
		<td align="center"><?= $dta['tglbayar'] ?></td>
		<td align="right"><?= $dta['jumlah'] ?></td>
		<td align="center"><?= $dta['ket'] ?></td>
	</tr>
	<?php $i++; ?>
	

	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Garut , <?= date('d/m/y') ?> <br/>
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>
    <?php
}elseif($_GET['act'] == "many"){
    ?>
    	<h3>SMK AL MADANI GARUT<b><br/>LAPORAN PEMBAYARAN SPP</b></h3>
	<hr/>
    <?php 
    
	$siswa = $konek->query("SELECT * FROM siswa WHERE idsiswa='$_GET[id]' ");
	$sw = mysqli_fetch_assoc($siswa);

	 ?>
	<table>
		<tr>
			<td>Nama Siswa </td>
			<td>:</td>
			<td> <?= $sw['namasiswa'] ?></td>
		</tr>
		<tr>
			<td>Nis </td>
			<td>:</td>
			<td> <?= $sw['nis'] ?></td>
		</tr>
		<tr>
			<td>Kelas </td>
			<td>:</td>
			<td> <?= $sw['kelas'] ?></td>
		</tr>
	</table>
	<hr>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>NO. BAYAR</th>
		<th>PEMBAYARAN</th>
		<th>TANGGAL BAYAR</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>
    <?php 
    $spp = mysqli_query($konek,"SELECT * FROM spp WHERE idsiswa='$_GET[id]' AND ket='LUNAS'");
	$i=1;
	$total = 0;
	while($dta = mysqli_fetch_array($spp)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align=""><?= $dta['nobayar'] ?></td>
		<td align=""> SPP Bulan <?= $dta['bulan'] ?></td>
		<td align="center"><?= $dta['tglbayar'] ?></td>
		<td align="right"><?= $dta['jumlah'] ?></td>
		<td align="center"><?= $dta['ket'] ?></td>
	</tr>
	<?php $i++; ?>
	

<?php endwhile; ?>

	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Garut , <?= date('d/m/y') ?> <br/>
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>
    <?php
}
?>
<script>
	window.print();
</script>
</body>
</html>
