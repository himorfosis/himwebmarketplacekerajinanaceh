<?php
    $kode=$_SESSION['adm'];
    extract(ArrayData($mysqli,"admin","id_admin='$kode'"));
    $a = "Edit Profil";
?>
	<div class="box">
	  <div class="box-header with-border">
	    <h3 class="box-title"><b><?php echo $a; ?></b></h3>
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    <form class="form-horizontal" action="petugas_proses.php" method="post" enctype="multipart/form-data">

		  <div class="form-group">
	        <label class="col-sm-3 control-label">Id Admin</label>
	        <div class="col-sm-4">
	          <input type="text" name="kode" class="form-control" required value="<?php echo $id_admin; ?>" readonly>
	        </div>
	        <!-- <div class="col-sm-4"></div> -->
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Nama Admin</label>
	        <div class="col-sm-4">
	          <input type="text" name="nama" class="form-control" required value="<?php echo $nama_admin; ?>" >
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Email</label>
	        <div class="col-sm-4">
	          <input type="text" name="username" class="form-control" required value="<?php echo $email; ?>">
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Password</label>
	        <div class="col-sm-4">
	          <input type="text" name="password" class="form-control" required value="<?php echo $password; ?>">
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label"> </label>
	        <div class="col-sm-4">
		        <div class="pull-left">
		        	<a href="?hal=petugas" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Kembali</a>
		        </div>
		        <div class="text-right">
		           <input type="submit" name="ubah" value="Simpan" class="btn btn-primary" > 
		        </div>
	        </div>
	      </div>

	    </form>
	  </div><!-- /.box-body -->
	</div><!-- /.box -->

		