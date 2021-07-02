<?php 
session_start();
if(isset($_SESSION['login']) ) {
	include 'koneksi.php';
	if($_GET['act']=='konfirmasi') {
		
		$tglbayar = date('Y-m-d');
		$wkt_bayar = date('H:i:s');
		$idspp = $_GET['idspp']; // Id Spp
		$id    = $_GET['id']; // Id tb_galat
		$update = mysqli_query($konek,"UPDATE tb_galat SET proses='selesai',tgl_selesai='$tglbayar' WHERE id='$id'");
		$s1 = mysqli_query($konek,"SELECT * FROM siswa INNER JOIN tb_galat ON siswa.idsiswa=tb_galat.idsiswa WHERE tb_galat.id='$id'");
		$s2 = mysqli_fetch_assoc($s1);
		$idsiswa = $s2['idsiswa'];
		// bulan
		$today = date("ymd");
		$query = mysqli_query($konek,"SELECT max(nobayar) AS last FROM spp WHERE nobayar LIKE '$today%'");
		$data = mysqli_fetch_assoc($query);
		$lastNobayar = $data['last'];
		$lastNoUrut  = substr($lastNobayar, 6 ,4);
		$nextNoUrut  = $lastNoUrut + 1;
		$nextNobayar = $today.sprintf('%04s' , $nextNoUrut);

		// tanggal bayar
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
		$galat = mysqli_query($konek,"UPDATE tb_galat SET proses='selesai' WHERE id='$id'");
		$ubah = mysqli_query($konek,"UPDATE tb_tagihan SET jumlah = '$tagihan3' WHERE idsiswa='$idsiswa'");
		if ($byr) {	
			header('location: galat.php?pesan=sukses');
		}else {
			header('location: galat.php?pesan=gagal');

		}
		
	}
	else if($_GET['act']=='hapus'){
	    $idgalat = $_GET['id'];

		$batal = mysqli_query($konek,"DELETE FROM tb_galat WHERE id='$idgalat'");
			if ($batal) {
				header('location:galat.php?pesan=hapussukses');
		}
	}
}
 ?>