<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

// echo isset($_GET['id']);

if (isset($_GET['id'])) {
	$kode=$_GET['id'];

    $query="SELECT * from pemesanan join konfirmasi_pembayaran on konfirmasi_pembayaran.id_pemesanan = pemesanan.id_pemesanan join bank on bank.id_bank = pemesanan.id_bank where pemesanan.id_pemesanan = '$kode'";

    $result=$mysqli->query($query);
    $data=mysqli_fetch_assoc($result);
    // print_r($data);

    // echo  "id pemesanan = ". $data['id_pelanggan'] ;
    $id_pemesanan = $data['id_pemesanan'];
    $id_pelanggan = $data['id_pelanggan'];
    $id_alamat = $data['id_alamat'];
    $id_bank = $data['id_bank'];
    $total_produk = $data['total_produk'];
    $total_bayar = $data['total_bayar'];
    $waktu = $data['waktu'];
    $gambar = $data['gambar'];
    $waktu_konfirmasi = $data['waktu_konfirmasi'];


    $stmt = $mysqli->prepare("UPDATE pemesanan SET
    id_pelanggan = '$id_pelanggan', 
    id_alamat = '$id_alamat',
    id_bank = '$id_bank',  
    total_produk = '$total_produk', 
    total_bayar = '$total_bayar', 
    waktu = '$waktu', 
    status = 'Dikonfirmasi'
    where id_pemesanan = '$id_pemesanan' ");

    $sql = $mysqli->prepare("UPDATE konfirmasi_pembayaran SET
    id_bank = '$id_bank',  
    status_konfirmasi = 'Dikonfirmasi',
    gambar = '$gambar',
    waktu_konfirmasi = '$waktu_konfirmasi'
    where id_pemesanan = '$id_pemesanan' ");

    if ($stmt->execute()) { 

    if ($sql->execute()) { 

     // echo "Sukses";
    	echo "<script>alert('Data Berhasil Dikonfirmasi')</script>";
		echo "<script>window.location='index.php?hal=pembayaran';</script>";	

      } else {

		echo "<script>alert('Data Gagal Dikonfirmasi')</script>";
		echo "<script>window.location='index.php?hal=pembayaran';</script>";
      // echo "Gagal";

      }

    
  } else {

    // echo "Gagal";
    	echo "<script>alert('Data Gagal Dikonfirmasi')</script>";
		echo "<script>window.location='index.php?hal=pembayaran';</script>";

  }



} else if (isset($_GET['hapus'])) {




}

?>