<?php 
$folder = "files/";
$id = $_GET['id'];
$query = mysqli_query($konek,"SELECT * FROM siswa WHERE siswa='$id'");
?>