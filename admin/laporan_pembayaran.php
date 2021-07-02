<?php 
session_start();
if(isset($_SESSION['login']) ) {
	include 'koneksi.php';
	if($_SESSION['login'] !== "Admin" ){
		echo "<script> document.location.href = 'index.php' </script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran</title>
	
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
	<h3>SMK AL MADANI GARUT<b><br/>LAPORAN PEMBAYARAN SPP</b></h3>
	<hr/>
	Tanggal <?= $_GET['tgl1']." -- ".$_GET['tgl2'];  ?>
	<br/>
	<br>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>NIS</th>
		<th>NAMA SISWA</th>
		<th>KELAS</th>
		<th>NO. BAYAR</th>
		<th>PEMBAYARAN BULAN</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>
	<?php 
	$spp = $konek -> query("SELECT spp.*,siswa.nis,siswa.namasiswa,siswa.kelas
							FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa
							WHERE tglbayar BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]'
							ORDER BY nobayar ASC");
	$i=1;
	$total = 0;
	while($dta=mysqli_fetch_array($spp)) :
	 ?>
	 <?php
		$kalimat = $dta['namasiswa'];
		$jumlah = "1";
		$hasil = implode(" ", array_slice(explode(" ", $kalimat), 0, $jumlah)); 
		$hasil2 = implode(" ", array_slice(explode(" ", $kalimat), 1, $jumlah));
		$nomer2 = substr($hasil2,0,1);
	?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['nis'] ?></td>
		<td align=""><?php echo "$hasil $nomer2" ?></td>
		<td align=""><?= $dta['kelas'] ?></td>
		<td align=""><?= $dta['nobayar'] ?></td>
		<td align=""><?= $dta['bulan'] ?></td>
		<td align="right"><?= $dta['jumlah'] ?></td>
		<td align="center"><?= $dta['ket'] ?></td>
	</tr>
	<?php $i++; ?>
	<?php $total += $dta['jumlah']; ?>

<?php endwhile; ?>
<tr>
		<td colspan="7" align="right">TOTAL</td>
		<td align="right"><b><?= $total ?></b></td>
		<td></td>
	</tr>
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Dermayu , <?= date('d/m/y') ?> <br/>
				Operator,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>
<script>
	window.print();
</script>
</body>
</html>


<?php 
} else {
	header("location : login.php");
}
?>