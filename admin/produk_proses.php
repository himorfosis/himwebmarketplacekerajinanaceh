<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{

	$kode = $_POST['kode'];
	$lokasi_file = $_FILES['gambar']['name'];
	$tipe_file = $_FILES['gambar']['type'];
	$nama_file = $kode.'.jpg';

	if(!empty($lokasi_file)) {
		if ($tipe_file != "image/jpeg" && $tipe_file != "image/pjpeg"){
			echo "<script>window.alert('Upload Gagal, Pastikan File Foto yang di Upload Bertipe *.JPG')</script>";
			//ARAHKAN
			echo "<script>window.location='javascript:history.go(-1)';</script>";
		}else {

			//menjalankan
			if(is_dir("../uploaded/produk")) {

				$tempat_gambar = "../uploaded/produk";

			} else {

				mkdir("../uploaded/produk");
				$tempat_gambar = "../uploaded/produk";

			}

			UploadImage($nama_file, $tempat_gambar, "gambar");

		}
	
	} else {

		$nama_file = "default.jpg";
	}


	$stmt = $mysqli->prepare("INSERT INTO produk 
		(id_produk, id_kategori, id_pengrajin, nama_produk, des_produk, harga_produk, gambar_produk) 
		VALUES (?, ?, ?, ?, ?, ?, ?)");

	$stmt->bind_param("sssssss",
		mysqli_real_escape_string($mysqli, $_POST['kode']), 
		mysqli_real_escape_string($mysqli, $_POST['kategori']), 
		mysqli_real_escape_string($mysqli, $_POST['pengrajin']), 
		mysqli_real_escape_string($mysqli, $_POST['nama']),	
		mysqli_real_escape_string($mysqli, $_POST['deskripsi']),	
		mysqli_real_escape_string($mysqli, $_POST['harga']),
		mysqli_real_escape_string($mysqli, $nama_file));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Produk Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=produk';</script>";	
	} else {
		echo "<script>alert('Data Produk Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){


	$kode = $_POST['kode'];
	$lokasi_file = $_FILES['gambar']['tmp_name'];
	$tipe_file = $_FILES['gambar']['type'];
	$nama_file = $kode.'.jpg';

	if(!empty($lokasi_file)) {
		if ($tipe_file != "image/jpeg" && $tipe_file != "image/pjpeg"){
			echo "<script>window.alert('Upload Gagal, Pastikan File Foto yang di Upload Bertipe *.JPG')</script>";
			//ARAHKAN
			echo "<script>window.location='javascript:history.go(-1)';</script>";
		}else {

			//menjalankan
			if(is_dir("../uploaded/produk")) {

				$tempat_gambar = "../uploaded/produk";

			} else {

				mkdir("../uploaded/produk");
				$tempat_gambar = "../uploaded/produk";

			}

			$ambil = caridata($mysqli,"SELECT gambar_produk FROM produk WHERE id_produk = '".$_POST['kode']."'");
				if(is_file("../uploaded/produk/".$ambil) && $ambil!='default.jpg')
					{
						unlink("../uploaded/produk/".$ambil);
						unlink("../uploaded/produk/small_".$ambil);
					}

			UploadImage($nama_file, $tempat_gambar, "gambar");

		}
		
		$status = true;

	} else {

		$status = false;
	}


	$stmt = $mysqli->prepare("UPDATE produk SET 
		id_kategori=?,
		id_pengrajin=?,
		nama_produk=?,
		des_produk=?,
		harga_produk=?
		where id_produk=?");
	$stmt->bind_param("ssssss",
		mysqli_real_escape_string($mysqli, $_POST['kategori']), 
		mysqli_real_escape_string($mysqli, $_POST['pengrajin']), 
		mysqli_real_escape_string($mysqli, $_POST['nama']),	
		mysqli_real_escape_string($mysqli, $_POST['deskripsi']),
		mysqli_real_escape_string($mysqli, $_POST['harga']),	
		mysqli_real_escape_string($mysqli, $_POST['kode']));

		// mysqli_real_escape_string($mysqli, $_POST['gambar']));	

	if ($stmt->execute()) { 


		if($status) {

			$sql = "UPDATE produk SET gambar_produk = '".$nama_file."' where id_produk = '".$_POST['kode']."' ";

			$mysqli-> query($sql);

		}

		echo "<script>alert('Data Produk Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=produk';</script>";	
	} else {
		echo "<script>alert('Data Produk Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){


	$ambil = caridata($mysqli,"SELECT gambar_produk FROM produk WHERE id_produk = '".$_GET['hapus']."'");
	$stmt = $mysqli->prepare("DELETE FROM produk where id_produk=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		//HAPUS FILE
		if(is_file("../uploaded/produk/".$ambil) && $ambil!='default.jpg')
		{
			unlink("../uploaded/produk/".$ambil);
			unlink("../uploaded/produk/small_".$ambil);
		}
		echo "<script>alert('Data Produk Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=produk';</script>";	
	} else {
		echo "<script>alert('Data Produk Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>