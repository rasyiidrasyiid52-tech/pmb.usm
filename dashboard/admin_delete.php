<?php
session_start();
error_reporting();
	include '../../assets/config/koneksi.php'; // Mengambil file koneksi ke database
	$id = $_GET['id_user'];
	$del = mysqli_query($con, "SELECT * FROM users WHERE id_user='$id'");
	$r=mysqli_fetch_array($del);
	unlink("../../assets/dist/img/user/$r[gambar]");
	echo "$r[name]";
	mysqli_query($con, "DELETE FROM users WHERE id_user ='$id'");
	header("location:../admin?alert=hapus");
?>
