<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];
    extract(ArrayData($mysqli,"pengrajin","id_pengrajin='$kode'"));
    $a = "Edit Data";

}else{
    $id_pengrajin=KodeOtomatis($mysqli,"pengrajin","id_pengrajin","","","");
    $nama_pengrajin="";
    $alamat="";
    $nama_usaha="";
    $telp="";
    $no_ktp="";
    $username="";
    $password="";
    $a = "Tambah Data";
}
?>
	<div class="box">
	  <div class="box-header with-border">
	    <h3 class="box-title"><b><?php echo $a; ?></b></h3>
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    <form class="form-horizontal" action="pengrajin_proses.php" method="post" enctype="multipart/form-data">

		  <div class="form-group">
	        <label class="col-sm-3 control-label">ID Pengrajin</label>
	        <div class="col-sm-4">
	          <input type="text" name="id_pengrajin" class="form-control" value="<?php echo $id_pengrajin; ?>" readonly>
	        </div>
	        <!-- <div class="col-sm-4"></div> -->
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Nama Pengrajin</label>
	        <div class="col-sm-4">
	          <input type="text" name="nama_pengrajin" class="form-control" value="<?php echo $nama_pengrajin; ?>" required>
	        </div>
	      </div>

  	      <div class="form-group">
	        <label class="col-sm-3 control-label">Alamat</label>
	        <div class="col-sm-4">
	          <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>" required>
	        </div>
	      </div>

  	      <div class="form-group">
	        <label class="col-sm-3 control-label">Nama Usaha</label>
	        <div class="col-sm-4">
	          <input type="text" name="nama_usaha" class="form-control" value="<?php echo $nama_usaha; ?>" required>
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Telephone</label>
	        <div class="col-sm-4">
	          <input type="text" name="telp" class="form-control" value="<?php echo $telp; ?>" required>
	        </div>
	      </div>

  	      <div class="form-group">
	        <label class="col-sm-3 control-label">Nomor KTP</label>
	        <div class="col-sm-4">
	          <input type="text" name="no_ktp" class="form-control" value="<?php echo $no_ktp; ?>" required>
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Username</label>
	        <div class="col-sm-4">
	          <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Password</label>
	        <div class="col-sm-4">
	          <input type="text" name="password" class="form-control"  value="<?php echo $password; ?>" required>
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label"> </label>
	        <div class="col-sm-4">
		        <div class="pull-left">
		        	<a href="?hal=pengrajin" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Kembali</a>
		        </div>
		        <div class="text-right">
		           <input type="submit" name="<?php echo  isset($_GET['id']) ? 'ubah' : 'tambah'; ?>" value="Simpan" class="btn btn-primary" > 
		        </div>
	        </div>
	      </div>


	    </form>
	  </div><!-- /.box-body -->
	</div><!-- /.box -->

		