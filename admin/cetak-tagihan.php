<?php 
session_start();
if(isset($_SESSION['login']) ) {
	include 'koneksi.php';
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
	<h3>SMK AL MADANI GARUT<b><br/>LAPORAN TAGIHAN SPP</b></h3>
	<hr/>
	<?php 
	$nis = $_GET['id'];
	$tagihan = $_GET['num'];
	$lunas = $_GET['num2'];
	if($lunas == ""){
		$lunas = 0;
	}elseif($tagihan == ""){
		$tagihan = 0;
	}
	$total = $tagihan + $lunas;
	$spp = mysqli_query($konek,"SELECT * FROM siswa WHERE nis='$nis'");
	$num = mysqli_num_rows($spp);
	while($dta = mysqli_fetch_array($spp)){
    $id = $_GET['id'];
	 ?>
	<table>
		<tr>
			<td>Nama Siswa </td>
			<td>:</td>
			<td> <?= $dta['namasiswa'] ?></td>
		</tr>
		<tr>
			<td>Nis </td>
			<td>:</td>
			<td> <?= $dta['nis'] ?></td>
		</tr>
		<tr>
			<td>Kelas </td>
			<td>:</td>
			<td> <?= $dta['kelas'] ?></td>
		</tr>
	</table>
	<hr>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>NIS</th>
		<th>NAMA</th>
		<th>TOTAL PEMBAYARAN</th>
		<th>LUNAS</th>
		<th>TAGIHAN</th>
	</tr>
	<?php 
	$i = 1;
	// while(=mysqli_fetch_array($spp)) :
	 ?>
	<tr>
		<td align="center"><?= $i++ ?></td>
		<td align="center"><?= $id ?></td>
		<td align=""><?= $dta['namasiswa'] ?></td>
        <td align="center"><?= $total ?></td>
		<td align="center"><?= $lunas ?></td>
		<td align=""><?= $tagihan ?></td>
	<?php $i++; ?>
	

<?php }?>

	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>Garut , <?= date('d/m/y') ?> <br/>
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		<center> <?= $_SESSION['nama'] ?> </center>
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