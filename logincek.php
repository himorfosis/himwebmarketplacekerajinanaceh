<?php
session_start();
require_once 'setting/crud.php';
require_once 'setting/koneksi.php';
require_once 'setting/tanggal.php';

	$email=$_POST['email'];
	$pass=$_POST['password']; 

	$sqladmin="Select * from admin where email='$email' and password='$pass'";

	$sqlpengrajin="Select * from pengrajin where username='$email' and password='$pass'";

	// $sqlkepala="Select * from pengrajin where level='Kepala' and username='$user' and password='$pass'";
	
	if (CekExist($mysqli,$sqladmin)== true){
		
		$_SESSION['adm']=caridata($mysqli,"Select id_admin from admin where email='$email' and password='$pass'");
		$_SESSION['nama']=caridata($mysqli,"Select nama_admin from admin where email='$email' and password='$pass'");

		// $_SESSION['namaptgs']=caridata($mysqli,"Select nama_petugas from petugas where level='Admin' and username='$user' and password='$pass'");

		echo "<script>alert('Anda login sebagai admin')</script>";
		echo "<script>window.location='admin/index.php?hal=beranda';</script>";

	}else if (CekExist($mysqli,$sqlpengrajin)== true){
		
		$_SESSION['ptgs']=caridata($mysqli,"Select id_pengrajin from pengrajin where username='$email' and password='$pass'");
		$_SESSION['nama']=caridata($mysqli,"Select nama_pengrajin from pengrajin where username='$email' and password='$pass'");

		echo "<script>alert('Anda login sebagai pengrajin')</script>";
		echo "<script>window.location='pengrajin/index.php?hal=beranda';</script>";

	}else{
		
		echo "<script>alert('Email atau password tidak terdaftar')</script>";
		echo "<script>window.location='login.php';</script>";
	
	}

?>