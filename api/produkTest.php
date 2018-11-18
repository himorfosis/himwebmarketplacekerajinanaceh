<?php require_once '../setting/koneksi.php';

  // $query="SELECT * from jadwal";
    $query="SELECT * FROM produk join pengrajin on pengrajin.id_pengrajin = produk.id_pengrajin join kategori on kategori.id_kategori = produk.id_kategori WHERE produk.id_pengrajin = '2'";
  
 $result=$mysqli->query($query);
  $num_result=$result->num_rows;
  $arr=array();
  if ($num_result > 0 ) { 
      while ($hasil=mysqli_fetch_assoc($result)) {
      // extract($data);
      $arr['produk'][] = $hasil;
      //print_r($arr);
   }
} 



echo json_encode($arr);

