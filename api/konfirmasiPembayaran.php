<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  // $response = array();

  $waktu = date("Y-m-d H:i:s");

  $id = $_POST['id_pemesanan']; 
  $bank = $_POST['id_bank'];
  $total_bayar = $_POST['total_bayar'];
  $total_produk = $_POST['total_produk'];
  $waktu_pemesanan = $_POST['waktu'];
  $id_alamat = $_POST['id_alamat'];
  $id_pelanggan = $_POST['id_pelanggan'];

  // $image = $_POST['gambar'];

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


  $stmt = "INSERT INTO konfirmasi_pembayaran (id_pemesanan, id_bank, status_konfirmasi, gambar, waktu_konfirmasi) VALUES ('$id','$bank', 'Dibayar', '$nama_file', '$waktu') "; 

    $data = $mysqli->prepare("UPDATE pemesanan SET
    id_pelanggan = '$id_pelanggan', 
    id_alamat = '$id_alamat',
    id_bank = '$bank',  
    total_produk = '$total_produk', 
    total_bayar = '$total_bayar', 
    waktu = '$waktu_pemesanan', 
    status = 'Dibayar'
    where id_pemesanan = '$id'");
   

  if ($mysqli->query($stmt)) { 

    if ($data->execute()) { 

     echo "Sukses";

      } else {

      echo "Gagal";

      }

    
  } else {

    echo "Gagal";

  }

