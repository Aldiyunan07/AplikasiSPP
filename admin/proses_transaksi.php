<?php 
session_start();
if(isset($_SESSION['login']) ) {
	include 'koneksi.php';
	if($_GET['act']=='bayar') {
		$idspp = $_GET['id'];
		$nis   = $_GET['nis'];
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
		$wayay = mysqli_query($konek,"SELECT idsiswa FROM siswa WHERE nis='$nis'");
		$real = mysqli_fetch_assoc($wayay);
		$ids = $real['idsiswa'];
		$tagihan = mysqli_query($konek,"SELECT SUM(jumlah) as f FROM spp WHERE ket='BELUM' AND idsiswa = '$ids'");
		$tagihan1 = mysqli_fetch_assoc($tagihan);
		$tagihan3 = $tagihan1['f'];
		$ubah = mysqli_query($konek,"UPDATE tb_tagihan SET jumlah = '$tagihan3' WHERE idsiswa='$ids'");
		if ($byr) {
			
			header('location: transaksi.php?nis='.$nis);
		}else {
			echo "
			<script>
			alert('gagal')
			</script>
			";

		}
		
	}
	else if($_GET['act']=='batal'){
	    $idspp = $_GET['id'];
		$nis   = $_GET['nis'];

		$batal = mysqli_query($konek ,"UPDATE spp SET 
			nobayar = null,
			tglbayar = null,
			ket = 'BELUM',
			idadmin = null,
			wkt_bayar = null 
			WHERE idspp = '$idspp'");
			$wayay = mysqli_query($konek,"SELECT idsiswa FROM siswa WHERE nis='$nis'");
			$real = mysqli_fetch_assoc($wayay);
			$ids = $real['idsiswa'];
			$tagihan = mysqli_query($konek,"SELECT SUM(jumlah) as f FROM spp WHERE ket='BELUM' AND idsiswa = '$ids'");
			$tagihan1 = mysqli_fetch_assoc($tagihan);
			$tagihan3 = $tagihan1['f'];
			$ubah = mysqli_query($konek,"UPDATE tb_tagihan SET jumlah = '$tagihan3' WHERE idsiswa='$ids'");
			if ($batal) {
				header('location: transaksi.php?nis='.$nis);
		}
	}
}
 ?>