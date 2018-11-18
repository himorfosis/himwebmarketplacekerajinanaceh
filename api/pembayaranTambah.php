<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $tgl = date('ym');
  $id_pembayaran = KodeOtomatis($mysqli,"pembayaran","id_pembayaran","P$tgl","5","6");
  $waktu = date("Y-m-d H:i:s");

  $id_produk = $_POST['data_json'];

  $json = json_decode($id_produk, true);

  $id_pelanggan = $json['id_pelanggan'];
  $total_produk = $json['total_produk'];
  $total_bayar = $json['total_bayar'];
  $id_alamat = $json['id_alamat'];
  $id_bank = $json['id_bank'];

  $q="INSERT INTO pembayaran (id_pembayaran,id_pelanggan, id_alamat, id_bank, total_produk, total_bayar, waktu, status) VALUES ('$id_pembayaran','$id_pelanggan', '$id_alamat', '$id_bank', '$total_produk', '$total_bayar', '$waktu', 1) ";
  if($mysqli->query($q)){

    foreach ($json['detailproduk'] as $key => $value) {

        $id_produk = $value['produk'];
        $jumlah = $value['jumlah'];
        $harga = caridata($mysqli,"SELECT harga_produk FROM produk WHERE id_produk='$id_produk'");

        $q2="INSERT INTO detail_pemesanan (id_pembayaran, id_produk, jumlah_produk, harga) VALUES ('$id_pembayaran','$id_produk', '$jumlah', '$harga') ";

      $mysqli->query($q2)

        // if($mysqli->query($q2)){
        //   echo "Sukses!";
        // }

    }

  }

  // echo $json['id_pelanggan']."<br>";
  // $q="INSERT INTO pembayaran (id_pembayaran,id_pelanggan, id_alamat, id_bank, total_produk, total_bayar, waktu, status) VALUES () ";
  // if($mysqli->query($q)){

  //   // echo $json['detailproduk'][0]['produk'];
  //   foreach ($json['detailproduk'] as $key => $value) {
  //     echo $value['produk'].":".$value['jml']."<br>";

  //   }

  // }


  // $stmt = $mysqli->prepare("INSERT INTO pembayaran SET
  //   id_pembayaran = '$id_pembayaran', 
  //   id_pelanggan = '$pelanggan', 
  //   id_alamat = '$alamat', 
  //   id_bank = '$bank',  
  //   total_produk = '$total_produk', 
  //   total_bayar = '$total_bayar', 
  //   waktu = '$waktu', 
  //   status = '$status'");

  //   $sql = $mysqli->prepare("INSERT INTO konfirmasi_pembayaran SET
  //   id_pembayaran = '$id_pembayaran',
  //   id_bank = '$bank',
  //   status_konfirmasi = '$status',  
  //   gambar = '$gambar', 
  //   waktu_konfirmasi = '$waktu'");

  //   $db = $mysqli->prepare("INSERT INTO detail_pemesanan SET

  //   id_pembayaran = '$id_pembayaran',
  //   id_produk = '$produk',  
  //   gambar = '$gambar', 
  //   jumlah_produk = '$total_produk'");
   

  //  //lopinng ambil data array

  //   if ($stmt->execute()) { 

  //     if ($sql->execute()) { 

  //       if ($db->execute()) { 

  //       echo "Sukses";
  //       $response['error'] = false; 
  //       $response['message'] = 'Sukses'; 
    
  //     } else {

  //       echo "Gagal";
  //       $response['error'] = true; 
     
  //     }

  //   } else {

  //   echo "Gagal";
  //   $response['error'] = true; 

  // }

  // } else {

  //   echo "Gagal";
  //   $response['error'] = true; 

  // }

