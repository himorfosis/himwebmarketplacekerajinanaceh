<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';


  $response = array();

  $id_pelanggan = $_POST['id_pelanggan'];
  $penerima = $_POST['nama_penerima']; 
  $telp = $_POST['telp']; 
  $kode_pos = $_POST['kode_pos']; 
  $provinsi = $_POST['provinsi']; 
  $kota = $_POST['kota']; 
  $kecamatan = $_POST['kecamatan']; 
  $alamat = $_POST['alamat'];
  $postcode = $_POST['postcode'];


  $stmt = $mysqli->prepare("INSERT INTO alamat SET
    id_pelanggan = '$id_pelanggan', 
    nama_penerima = '$penerima', 
    telp = '$telp', 
    kode_pos = '$kode_pos', 
    provinsi = '$provinsi', 
    kota = '$kota', 
    kecamatan = '$kecamatan', 
    alamat_lengkap = '$alamat',
    post_code = '$postcode'");


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
