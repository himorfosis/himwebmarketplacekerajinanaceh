<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';


   $response = array();

  // $id = $_POST['id'];
  $produk = $_POST['id_produk']; 
  $pengrajin = $_POST['id_pengrajin']; 
  $pelanggan = $_POST['id_pelanggan']; 
  $status = $_POST['status']; 


  $stmt = $mysqli->prepare("INSERT INTO keranjang SET
    id_keranjang = '', 
    id_pengrajin = '$pengrajin', 
    id_produk = '$produk', 
    id_pelanggan = '$pelanggan', 
    status = '$status' ");
   

  if ($stmt->execute()) { 

    // echo "Berhasil Masuk Keranjang", "\n";
    $response['error'] = false; 
    $response['message'] = 'Sukses'; 
    
  } else {

    // echo "Gagal";
    $response['error'] = true; 
    $response['message'] = 'Gagal';

  }

  echo json_encode($response);
 