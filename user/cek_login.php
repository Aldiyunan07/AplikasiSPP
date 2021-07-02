<?php 
session_start();
include '../admin/koneksi.php';
$nis  = $_POST['nis'];
$nama = $_POST['nama'];
$data = mysqli_query($konek,"SELECT * FROM siswa WHERE namasiswa='$nama' AND nis='$nis'");
$cek = mysqli_num_rows($data);        
if($cek > 0){
    $d = mysqli_fetch_assoc($data);
    $_SESSION['nama']        = $nama;
    $_SESSION['id']          = $d['idsiswa'];
    $_SESSION['status']      = "loginsiswa";
    header('location:index.php');
        }else{
        header("location:login.php?pesan=gagal");
        }
?>