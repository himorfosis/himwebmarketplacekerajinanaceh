<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];

    $query="SELECT * from pemesanan join konfirmasi_pembayaran on konfirmasi_pembayaran.id_pemesanan = pemesanan.id_pemesanan join bank on bank.id_bank = pemesanan.id_bank join detail_pemesanan on detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan join pelanggan on pelanggan.id_pelanggan = pemesanan.id_pelanggan where pemesanan.id_pemesanan = '$kode' ";

    $result=$mysqli->query($query);
    $data=mysqli_fetch_assoc($result);
    // print_r($data);
    // echo $data['id_pemesanan'];
    $a = "Detail";

    echo $kode;

    $id_alamat = $data['id_alamat'];

    $alamat = "SELECT * from alamat where alamat.id_alamat = '$id_alamat' ";

    $resultalamat=$mysqli->query($alamat);
    $dataalamat=mysqli_fetch_assoc($resultalamat);
    // print_r($dataalamat);

    $alamatpelanggan = $dataalamat['alamat_lengkap'] .", ". $dataalamat['kecamatan'] .", ". $dataalamat['kota'] .", ". $dataalamat['provinsi'] ;

    $id_produk = $data['id_produk'];

    $produk = "SELECT * from produk where produk.id_produk = '$id_produk' ";

    $resultproduk=$mysqli->query($produk);
    $dataproduk=mysqli_fetch_assoc($resultproduk);
    // print_r($dataproduk);


}
?>

	<div class="box">
	  <div class="box-header with-border">
	    <h3 class="box-title"><b><?php echo $a; ?></b></h3>
	  </div><!-- /.box-header -->
	  <div class="box-body">
	  	<form class="form-horizontal" action="pembayaran_proses.php" method="post" enctype="multipart/form-data">

		  <div class="form-group">
	        <label class="col-sm-3 control-label">ID Pemesanan</label>
	        <div class="col-sm-4">
	        	<td>:</td>
	          <td><?php echo $data['id_pemesanan'] ?></td>
	        </div>
	      </div>

		  <div class="form-group">
	        <label class="col-sm-3 control-label">Nama Penerima</label>
	        <div class="col-sm-4">
	        	<td>:</td>
	          <td><?php echo $dataalamat['nama_penerima'] ?></td>
	        </div>
	      </div>

  		  <div class="form-group">
	        <label class="col-sm-3 control-label">Nama Bank</label>
	        <div class="col-sm-4">
	        	<td>:</td>
	          <td><?php echo $data['nama_bank'] ?></td>
	        </div>
	      </div>

  		  <div class="form-group">
	        <label class="col-sm-3 control-label">Total Bayar</label>
	        <div class="col-sm-4">
	        	<td>:</td>
	          <td><?php echo $data['total_bayar'] ?></td>
	        </div>
	      </div>

		  <div class="form-group">
	        <label class="col-sm-3 control-label">Alamat</label>
	        <div class="col-sm-4">
	        	<td>:</td>
	          <td><?php echo $alamatpelanggan ?></td>
	        </div>
	      </div>

  		  <div class="form-group">
	        <label class="col-sm-3 control-label">Nama Produk</label>
	        <div class="col-sm-4">
	        	<td>:</td>
	          <td><?php echo $dataproduk['nama_produk'] ?></td>
	        </div>
	      </div>


  		  <div class="form-group">
	        <label class="col-sm-3 control-label">Gambar Produk</label>
	        <div class="col-sm-4">
	        	<td>:</td>
	          <td><img weidth="220px" height="200px" src="../uploaded/produk/<?php echo $data['id_produk'] .".jpg"; ?>"></td>
	        </div>
	      </div>

	     </form>

  	      <div class="form-group">
	        <label class="col-sm-3 control-label"> </label>
	        <div class="col-sm-4">
		        <div class="pull-left">
		        	<a href="?hal=pemesanan" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Kembali</a>
		        </div>

	        </div>
	      </div>
