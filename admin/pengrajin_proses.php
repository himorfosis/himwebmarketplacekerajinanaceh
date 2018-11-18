<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{

	$stmt = $mysqli->prepare("INSERT INTO pengrajin 
		(id_pengrajin, nama_pengrajin, alamat, nama_usaha, telp, no_ktp, username, password) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

	$stmt->bind_param("ssssssss",
		mysqli_real_escape_string($mysqli, $_POST['id_pengrajin']), 
		mysqli_real_escape_string($mysqli, $_POST['nama_pengrajin']), 
		mysqli_real_escape_string($mysqli, $_POST['alamat']), 
		mysqli_real_escape_string($mysqli, $_POST['nama_usaha']), 
		mysqli_real_escape_string($mysqli, $_POST['telp']), 
		mysqli_real_escape_string($mysqli, $_POST['no_ktp']),
		mysqli_real_escape_string($mysqli, $_POST['username']), 
		mysqli_real_escape_string($mysqli, $_POST['password'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Pengrajin Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=pengrajin';</script>";	
	} else {
		echo "<script>alert('Data Pengrajin Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){


	$stmt = $mysqli->prepare("UPDATE pengrajin  SET 
		nama_pengrajin=?,
		alamat=?,
		nama_usaha=?,
		telp=?,
		no_ktp=?,
		username=?,
		password=?
		where id_pengrajin=?");
	$stmt->bind_param("ssssssss",
		mysqli_real_escape_string($mysqli, $_POST['nama_pengrajin']),
		mysqli_real_escape_string($mysqli, $_POST['alamat']), 
		mysqli_real_escape_string($mysqli, $_POST['nama_usaha']), 
		mysqli_real_escape_string($mysqli, $_POST['telp']), 
		mysqli_real_escape_string($mysqli, $_POST['no_ktp']),
		mysqli_real_escape_string($mysqli, $_POST['username']), 
		mysqli_real_escape_string($mysqli, $_POST['password'])); 


	if ($stmt->execute()) { 
		echo "<script>alert('Data Pengrajin Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=pengrajin';</script>";	
	} else {
		echo "<script>alert('Data Pengrajin Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	$stmt = $mysqli->prepare("DELETE FROM pengrajin where id_pengrajin=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Pengrajin Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=pengrajin';</script>";	
	} else {
		echo "<script>alert('Data Pengrajin Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>