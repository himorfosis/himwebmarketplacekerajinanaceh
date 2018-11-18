<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';


if(isset($_POST['tambah']))
{

	// echo "tambah";

	$stmt = $mysqli->prepare("INSERT INTO kategori 
		(id_kategori, nama_kategori, des_kategori) 
		VALUES (?, ?, ?)");

	$stmt->bind_param("sss",

		mysqli_real_escape_string($mysqli, $_POST['kode']),	
		mysqli_real_escape_string($mysqli, $_POST['nama']),	
		mysqli_real_escape_string($mysqli, $_POST['deskripsi']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data kategori Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=kategori';</script>";	
	} else {
		echo "<script>alert('Data kategori Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

	// echo "ubah";


	$stmt = $mysqli->prepare("UPDATE kategori SET 
		nama_kategori=?,
		des_kategori=?
		where id_kategori=?");
	$stmt->bind_param("sss",

		mysqli_real_escape_string($mysqli, $_POST['nama']),	 
		mysqli_real_escape_string($mysqli, $_POST['deskripsi']),	 
		mysqli_real_escape_string($mysqli, $_POST['kode']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data kategori Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=kategori';</script>";	
	} else {
		echo "<script>alert('Data kategori Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	$stmt = $mysqli->prepare("DELETE FROM kategori where id_kategori=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data kategori Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=kategori';</script>";	
	} else {
		echo "<script>alert('Data kategori Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>