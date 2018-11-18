<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];

    $query="SELECT * from pemesanan join konfirmasi_pembayaran on konfirmasi_pembayaran.id_pemesanan = pemesanan.id_pemesanan join bank on bank.id_bank = pemesanan.id_bank where pemesanan.id_pemesanan = '$kode' ";

    $result=$mysqli->query($query);
    $data=mysqli_fetch_assoc($result);
    // print_r($data);
    // echo $data['id_pemesanan'];
    $a = "Detail";

    echo $kode;

// echo $id_pemesanan;
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
	        <label class="col-sm-3 control-label">Bukti Pembayaran</label>
	        <div class="col-sm-4">
	        	<td>:</td>
	          <td><img weidth="220px" height="200px" src="../uploaded/pembayaran/small_<?php echo $data['gambar']; ?>"></td>
	        </div>
	      </div>

	     </form>

  	      <div class="form-group">
	        <label class="col-sm-3 control-label"> </label>
	        <div class="col-sm-4">
		        <div class="pull-left">
		        	<a href="?hal=pembayaran" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Kembali</a>
		        </div>
		        <div class="text-right">
		        	<a href="?hal=pembayaran_proses&id=<?php echo $kode; ?> " class="btn btn-primary"></i> Konfirmasi</a>
	
		        </div>
	        </div>
	      </div>
