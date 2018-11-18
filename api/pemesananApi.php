<?php require_once '../setting/koneksi.php';

    $query="SELECT * FROM pemesanan join alamat on alamat.id_alamat = pemesanan.id_alamat";

  
 $result=$mysqli->query($query);
  $num_result=$result->num_rows;
  $arr=array();
  if ($num_result > 0 ) { 
      while ($hasil=mysqli_fetch_assoc($result)) {
      // extract($data);
      $arr['pemesanan'][] = $hasil;
      //print_r($arr);
   }
} 

echo json_encode($arr);

