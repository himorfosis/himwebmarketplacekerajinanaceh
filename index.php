<?php
require_once 'setting/crud.php';
require_once 'setting/koneksi.php';
require_once 'setting/tanggal.php';
require_once 'setting/fungsi.php';

session_start();

if (isset($_SESSION['adm'])){
  	echo "<script>window.location='admin/index.php';</script>";
}elseif (isset($_SESSION['ptgs'])){

  echo "<script>window.location='petugas/index.php';</script>";

}elseif (isset($_SESSION['kpl'])){

  echo "<script>window.location='petugas/index.php';</script>";
  
}else{
    echo "<script>window.location='login.php';</script>";
}
?>