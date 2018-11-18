<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();


  $id = $_POST['id'];
  $produk = $_POST['id_produk']; 
  $pengrajin = $_POST['id_pengrajin']; 
  $pelanggan = $_POST['id_pelanggan']; 
  $alamat = $_POST['id_alamat'];
  $bank = $_POST['id_bank'];
  $total_produk = $_POST['total_produk'];
  $total_bayar = $_POST['total_bayar'];
  $status = $_POST['status']; 


  $lokasi_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
 

  $nama_file = $id.'.jpg';

  if(!empty($lokasi_file)) {
    
    if ($tipe_file != "image/jpeg" && $tipe_file != "image/pjpeg"){

      echo "<script>window.alert('Upload Gagal, Pastikan File Foto yang di Upload Bertipe *.JPG')</script>";
      //ARAHKAN
      echo "<script>window.location='javascript:history.go(-1)';</script>";

    }else {

      //menjalankan
      if(is_dir("../uploaded/pembayaran")) {

        $tempat_gambar = "../uploaded/pembayaran";

      } else {

        mkdir("../uploaded/pembayaran");
        $tempat_gambar = "../uploaded/pembayaran";

      }

      UploadImage($nama_file, $tempat_gambar, "gambar");

    }
  
  } else {

    $nama_file = $id.'.jpg';

  }


  $stmt = $mysqli->prepare("UPDATE pembayaran SET
    id_produk = '$produk', 
    id_pengrajin = '$pengrajin',
    id_pelanggan = '$pelanggan', 
    id_alamat = '$alamat', 
    id_bank = '$bank',  
    gambar = '$nama_file', 
    total_produk = '$total_produk', 
    total_bayar = '$total_bayar', 
    status = '$status'
    where id_pembayaran = '$id'");
   

    if ($stmt->execute()) { 

    $sql = "UPDATE pembayaran SET gambar = '".$nama_file."' where id_pembayaran = '".$_POST['id']."' ";

      $mysqli-> query($sql);


    $response['error'] = false; 
    $response['message'] = 'Sukses'; 
    
  } else {

    echo "Gagal";
    $response['error'] = true; 

  }

    echo json_encode($response);
