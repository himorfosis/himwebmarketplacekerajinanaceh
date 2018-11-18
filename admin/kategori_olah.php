<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];
    extract(ArrayData($mysqli,"kategori","id_kategori='$kode'"));
    $a = "Edit Data";

}else{
    $id_kategori=KodeOtomatis($mysqli,"kategori","id_kategori","","","");
    $nama_kategori="";
    $des_kategori="";
    $a = "Tambah Data";
}
?>
	<div class="box">
	  <div class="box-header with-border">
	    <h3 class="box-title"><b><?php echo $a; ?></b></h3>
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    <form class="form-horizontal" action="kategori_proses.php" method="post" enctype="multipart/form-data">

		  <div class="form-group">
	        <label class="col-sm-3 control-label">ID Kategori</label>
	        <div class="col-sm-4">
	          <input type="text" name="kode" class="form-control" required value="<?php echo $id_kategori; ?>" readonly>
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Nama Kategori</label>
	        <div class="col-sm-4">
	          <input type="text" name="nama" class="form-control" required value="<?php echo $nama_kategori; ?>" >
	        </div>
	      </div>

  	      <div class="form-group">
	        <label class="col-sm-3 control-label">Deskripsi</label>
	        <div class="col-sm-4">
	          <input type="text" name="deskripsi" class="form-control" required value="<?php echo $des_kategori; ?>" >
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label"> </label>
	        <div class="col-sm-4">
		        <div class="pull-left">
		        	<a href="?hal=kategori" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Kembali</a>
		        </div>
		        <div class="text-right">
		           <input type="submit" name="<?php echo isset($_GET['id']) ? 'ubah' : 'tambah'; ?>" value="Simpan" class="btn btn-primary" > 
		        </div>
	        </div>
	      </div>

	    </form>
	  </div>
	  <!-- /.box-body -->
	</div><!-- /.box -->

		