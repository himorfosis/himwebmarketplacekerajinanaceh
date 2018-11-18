<?php
require_once '../../setting/crud.php';
require_once '../../setting/koneksi.php';
require_once '../../setting/tanggal.php';
require_once '../../setting/fungsi.php';
	
    // print_r($_POST);
	$idbk = $_POST['buku'];

    $query="SELECT * from buku B Join Penerbit P ON B.kd_penerbit=P.kd_penerbit where kd_buku='$idbk'";
    $result=$mysqli->query($query);
    $data=mysqli_fetch_assoc($result);
    echo json_encode($data);
    // $penerbit=$data['nama_penerbit'];
    // echo $penerbit;
    // echo $penerbit;
    
?>