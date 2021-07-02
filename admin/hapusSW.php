<?php 
session_start();
include 'koneksi.php';
if (isset($_SESSION['login'])){
	$hapus  = $konek -> query("DELETE FROM siswa WHERE idsiswa ='$_GET[id]' ");
	mysqli_query($konek,"DELETE FROM spp WHERE idsiswa='$_GET[id]'");
	mysqli_query($konek,"DELETE FROM tb_tagihan WHERE idsiswa='$_GET[id]'");
	$select = mysqli_query($konek,"SELECT * FROM siswa WHERE idsiswa='$_GET[id]'");
	$assoc = mysqli_fetch_assoc($select);
	$kelas = mysqli_query($konek,"SELECT * FROM tb_kelas WHERE kelas='$assoc[kelas]'");
	$kelas1 = mysqli_fetch_assoc($kelas);
	$jumkel = $kelas1['jumlah'];
	$jumlah = $jumkel - 1;
	mysqli_query($konek,"UPDATE tb_kelas SET jumlah='$jumlah' WHERE kelas='$assoc[kelas]'");
	if($hapus){
		header('location:datasiswa.php?pesan=hapussukses');
	}else {
		header('location:datasiswa.php?pesan=hapusgagal');

	}

}else {
	echo "
	<script>
		alert('anda tidak punya akses dihalaman ini');
		document.location.href = 'login.php';
		</script>
	";
}

 ?>