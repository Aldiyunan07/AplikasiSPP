<?php
if(isset($_GET['pesan'])){
	$pesan = $_GET['pesan'];
?>
<?php 
session_start();
if(isset($_SESSION['login']) ) {
	include 'koneksi.php';
	if($_SESSION['login'] !== "Admin" ){
		echo "<script> document.location.href = 'index.php' </script>";
	}

	if($pesan == "siswa"){ ?>
<!DOCTYPE html>
<html>

<head>
    <title> Laporan Data Siswa </title>

    <style>
        body {
            font-family: arial;
        }

        .print {
            margin-top: 10px;
        }

        @media print {
            .print {
                display: none;
            }
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <b>LAPORAN DATA SISWA</b>
    <br />
    <hr />

    <table border="1" cellspacing="" cellpadding="4" width="100%">
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>NAMA SISWA</th>
            <th>KELAS</th>
            <th>TAHUN AJARAN</th>
        </tr>
        <?php 
	$data = $konek -> query("SELECT * FROM siswa ORDER BY idsiswa ASC ");
	$i=1;
	while ($dta = mysqli_fetch_assoc($data)) :
	 ?>
        <tr>
            <td align="center"><?= $i ?></td>
            <td align="center"><?= $dta['nis'] ?></td>
            <td align=""><?= $dta['namasiswa'] ?></td>
            <td align=""><?= $dta['kelas'] ?></td>
            <td align=""><?= $dta['tahunajaran'] ?></td>
        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>
    </table>
	<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>SMK Al Madani , <?= date('d/m/y') ?> <br/>
				Administrator,
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
    <?php }elseif($pesan == "tabungan"){?>
<!DOCTYPE html>
<html>

<head>
    <title> Laporan Data Tabungan </title>

    <style>
        body {
            font-family: arial;
        }

        .print {
            margin-top: 10px;
        }

        @media print {
            .print {
                display: none;
            }
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <b>LAPORAN DATA Tabungan</b>
    <br />
    <hr />

    <table border="1" cellspacing="" cellpadding="4" width="100%">
        <tr>
            <th>NO</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Jumlah Tabungan</th>
            <th>Tanggal di buat</th>
            <th>Terakhir Transaksi</th>
        </tr>
        <?php 
	$data = $konek -> query("SELECT * FROM tb_tabungan INNER JOIN siswa ON tb_tabungan.idsiswa=siswa.idsiswa ORDER BY siswa.namasiswa ASC ");
	$i=1;
	while ($dta = mysqli_fetch_assoc($data)) :
	 ?>
        <tr>
            <td align="center"><?= $i ?></td>
            <td align="center"><?= $dta['namasiswa'] ?></td>
            <td align="center"><?= $dta['kelas'] ?></td>
            <td align=""><?= $dta['jumlah'] ?></td>
            <td align=""><?= $dta['tgl_dibuat'] ?></td>
            <td align=""><?= $dta['tgl_diupdate'] ?></td>
        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>
    </table>   
	<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>SMK Al Madani , <?= date('d/m/y') ?> <br/>
				Administrator,
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
    <?php }elseif($pesan == "galat"){?>
    <!DOCTYPE html>
<html>

<head>
    <title> Laporan Data Galat </title>

    <style>
        body {
            font-family: arial;
        }
    </style>
</head>
<body>
    <b>Laporan Data Galat Transaksi</b>
    <br />
    <hr />

    <table border="1" cellspacing="" cellpadding="4" width="100%">
        <tr>
            <th>NO</th>
            <th>Nama Siswa</th>
            <th> NIS </th>
            <th>Kelas</th>
            <th>Tanggal Transaksi</th>
            <th>Jumlah</th>
        </tr>
        <?php 
	$data = $konek -> query("SELECT * FROM tb_galat INNER JOIN siswa ON tb_galat.idsiswa=siswa.idsiswa ORDER BY tb_galat.id ASC ");
	$i=1;
	while ($dta = mysqli_fetch_assoc($data)) :
	 ?>
        <tr>
            <td align="center"><?= $i ?></td>
            <td align="center"><?= $dta['namasiswa'] ?></td>
            <td align="center"><?= $dta['nis'] ?></td>
            <td align="center"><?= $dta['kelas'] ?></td>
            <td align=""><?= $dta['tanggal'] ?></td>
            <td align=""><?= $dta['nominal'] ?></td>
        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>
    </table> 
	<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>SMK Al Madani , <?= date('d/m/y') ?> <br/>
				Administrator,
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
    <?php } ?>
    <?php
        } else {
	        header("location : login.php");
}
}
?>