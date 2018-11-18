<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $tgl = date('ym');
  $id_pemesanan = KodeOtomatis($mysqli,"pemesanan","id_pemesanan","P$tgl","5","6");
  $waktu = date("Y-m-d H:i:s");

  $produk = $_POST['data_json'];

  $json = json_decode($produk, true);

  $id_pelanggan = $json['id_pelanggan'];
  $id_alamat = $json['id_alamat'];
  $total_produk = $json['total_produk'];
  $total_bayar = $json['total_bayar'];
  $id_bank = $json['id_bank'];

  $q="INSERT INTO pemesanan (id_pemesanan,id_pelanggan, id_alamat, id_bank, total_produk, total_bayar, waktu, status) VALUES ('$id_pemesanan','$id_pelanggan', '$id_alamat', '$id_bank', '$total_produk', '$total_bayar', '$waktu', 'Dipesan') ";

    echo $id_pemesanan;


  if($mysqli->query($q)){


      foreach ($json['detailproduk'] as $key => $value) {

      $id_produk = $value['produk'];
      $jumlah = $value['jumlah'];

      if ($id_produk == 1 ) {

      foreach ($json['detailproduk'] as $value) {

            $id_produk = $value['produk'];
            $jumlah = $value['jumlah'];

            $id_produk = $value['produk'];
            $jumlah = $value['jumlah'];

            $harga = caridata($mysqli,"SELECT harga_produk FROM produk WHERE id_produk='$id_produk'");

            $q2="INSERT INTO detail_pemesanan (id_pemesanan, id_produk, jumlah_produk, harga) VALUES ('$id_pemesanan','$id_produk', '$jumlah', '$harga') ";

          if($mysqli->query($q2)){

          echo "Sukses!";
          echo $id_pemesanan;

          }

        }


      } else {

          foreach ($json['detailproduk'] as $key => $value) {

          $id_produk = $value['produk'];
          $jumlah = $value['jumlah'];

          $harga = caridata($mysqli,"SELECT harga_produk FROM produk WHERE id_produk='$id_produk'");

          $q2="INSERT INTO detail_pemesanan (id_pemesanan, id_produk, jumlah_produk, harga) VALUES ('$id_pemesanan','$id_produk', '$jumlah', '$harga') ";
    

          if($mysqli->query($q2)){

          echo "Sukses!";
          echo $id_pemesanan;

          }

        }

    }

    }

  }


// {"id_pelanggan":"3","id_alamat":"4","id_bank":"1","total_produk":"1","total_bayar":"1000000","detailproduk":[{"produk":"4","jumlah":"1"}]}
// {"id_pelanggan":"3","id_alamat":"4","id_bank":"1","total_produk":"2","total_bayar":"1000000","detailproduk":[{"produk":"4","jumlah":"2"}]}