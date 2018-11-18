<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{

	$stmt = $mysqli->prepare("INSERT INTO bank 
		(id_bank,nama_bank, no_rekening) 
		VALUES (?, ?, ?)");

	$stmt->bind_param("sss",
		mysqli_real_escape_string($mysqli, $_POST['id']), 
		mysqli_real_escape_string($mysqli, $_POST['nama']),	
		mysqli_real_escape_string($mysqli, $_POST['rekening']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Bank Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=bank';</script>";	
	} else {
		echo "<script>alert('Data Bank Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

	$stmt = $mysqli->prepare("UPDATE bank SET 
		nama_bank=?,
		no_rekening=?
		where id_bank=?");
	$stmt->bind_param("sss",
		mysqli_real_escape_string($mysqli, $_POST['nama']),	 
		mysqli_real_escape_string($mysqli, $_POST['rekening']),	 
		mysqli_real_escape_string($mysqli, $_POST['id']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Bank Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=bank';</script>";	
	} else {
		echo "<script>alert('Data Bank Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	$stmt = $mysqli->prepare("DELETE FROM bank where id_bank=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Bank Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=bank';</script>";	
	} else {
		echo "<script>alert('Data Bank Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>