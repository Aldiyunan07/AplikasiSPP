<?php

session_start();
include 'koneksi.php';
if (isset($_SESSION['login']) ) {
	if($_SESSION['login'] !== "Admin" ){
		echo "<script> document.location.href = 'index.php' </script>";
	}
	$data = mysqli_query($konek,"DELETE FROM tb_tu WHERE id ='$_GET[id]'");
	if ($data){
		header('location:datatu.php?pesan=hapusberhasil');
	}else {
		header('location:datatu.php?pesan=hapusgagal');
	}
}else {
	header('location:datatu.php?pesan=akses');
}