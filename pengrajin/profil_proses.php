<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['ubah'])) {

	$stmt = $mysqli->prepare("UPDATE pengrajin  SET 
		nama_pengrajin=?,
		alamat=?,
		nama_usaha=?,
		telp=?,
		no_ktp=?
		where id_pengrajin=?");
	$stmt->bind_param("sssss",
		mysqli_real_escape_string($mysqli, $_POST['nama']),
		mysqli_real_escape_string($mysqli, $_POST['alamat']), 
		mysqli_real_escape_string($mysqli, $_POST['nama_usaha']), 
		mysqli_real_escape_string($mysqli, $_POST['telp']),	 
		mysqli_real_escape_string($mysqli, $_POST['ktp']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Pengrajin Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=profil';</script>";	
	} else {
		echo "<script>alert('Data Pengrajin Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}


?>