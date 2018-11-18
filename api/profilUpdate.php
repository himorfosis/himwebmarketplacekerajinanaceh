<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();


  $id = $_POST['id_pelanggan'];
  $nama_pelanggan = $_POST['nama_pelanggan']; 
  $password = $_POST['password']; 
  $email = $_POST['email']; 
  $telp = $_POST['telp'];
  $kota = $_POST['kota'];
  $provinsi = $_POST['provinsi'];


  // id_pelanggan, nama_pelanggan, password, email,  telp, kota, provinsi


  $stmt = $mysqli->prepare("UPDATE pelanggan SET
    nama_pelanggan = '$nama_pelanggan', 
    password = '$password',
    email = '$email', 
    telp = '$telp',  
    kota = '$kota', 
    provinsi = '$provinsi'
    where id_pelanggan = '$id'");
   

    if ($stmt->execute()) { 


    $response['error'] = false; 
    $response['message'] = 'Sukses'; 
    
  } else {

    echo "Gagal";
    $response['error'] = true; 

  }

    echo json_encode($response);
