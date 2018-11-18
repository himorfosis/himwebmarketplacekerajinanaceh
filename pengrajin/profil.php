<?php
    $kode=$_SESSION['ptgs'];
    extract(ArrayData($mysqli,"pengrajin","id_pengrajin='$kode'"));
    $a = "Edit Profil";
?>
	<div class="box">
	  <div class="box-header with-border">
	    <h3 class="box-title"><b><?php echo $a; ?></b></h3>
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    <form class="form-horizontal" action="profil_proses.php" method="post" enctype="multipart/form-data">

	      <div class="form-group">
	        <label class="col-sm-3 control-label">ID Pengrajin</label>
	        <div class="col-sm-4">
	          <input type="text" name="nama" class="form-control" required value="<?php echo $id_pengrajin; ?>" >
	        </div>
	      </div>


	      <div class="form-group">
	        <label class="col-sm-3 control-label">Nama Pengrajin</label>
	        <div class="col-sm-4">
	          <input type="text" name="nama" class="form-control" required value="<?php echo $nama_pengrajin; ?>" >
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Alamat</label>
	        <div class="col-sm-4">
	          <input type="text" name="alamat" class="form-control" required value="<?php echo $alamat; ?>">
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Nama Usaha</label>
	        <div class="col-sm-4">
	          <input type="text" name="nama_usaha" class="form-control" required value="<?php echo $nama_usaha; ?>">
	        </div>
	      </div>

  	      <div class="form-group">
	        <label class="col-sm-3 control-label">Nomor Telephon</label>
	        <div class="col-sm-4">
	          <input type="text" name="telp" class="form-control" required value="<?php echo $telp; ?>">
	        </div>
	      </div>

  	      <div class="form-group">
	        <label class="col-sm-3 control-label">Nomor KTP</label>
	        <div class="col-sm-4">
	          <input type="text" name="ktp" class="form-control" required value="<?php echo $no_ktp; ?>">
	        </div>
	      </div>


	      <div class="form-group">
	        <label class="col-sm-3 control-label"> </label>
	        <div class="col-sm-4">
		        <div class="pull-left">
		        	<a href="?hal=beranda" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Kembali</a>
		        </div>
		        <div class="text-right">
		           <input type="submit" name="ubah" value="Simpan" class="btn btn-primary" > 
		        </div>
	        </div>
	      </div>

	    </form>
	  </div><!-- /.box-body -->
	</div><!-- /.box -->

		