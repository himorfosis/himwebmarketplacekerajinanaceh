<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];
    extract(ArrayData($mysqli,"bank","id_bank='$kode'"));
    $a = "Edit Data";

}else{
    $id_bank=KodeOtomatis($mysqli,"bank","id_bank","","","");
    $nama_bank="";
    $no_rekening="";
    $a = "Tambah Data";
}
?>
	<div class="box">
	  <div class="box-header with-border">
	    <h3 class="box-title"><b><?php echo $a; ?></b></h3>
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    <form class="form-horizontal" action="bank_proses.php" method="post" enctype="multipart/form-data">

		  <div class="form-group">
	        <label class="col-sm-3 control-label">ID Bank</label>
	        <div class="col-sm-4">
	          <input type="text" name="id" class="form-control" required value="<?php echo $id_bank; ?>" readonly>
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Nama Bank</label>
	        <div class="col-sm-4">
	          <input type="text" name="nama" class="form-control" required value="<?php echo $nama_bank; ?>" >
	        </div>
	      </div>

  	      <div class="form-group">
	        <label class="col-sm-3 control-label">No Rekening</label>
	        <div class="col-sm-4">
	          <input type="text" name="rekening" class="form-control" required value="<?php echo $no_rekening; ?>" >
	        </div>
	      </div>


	      <div class="form-group">
	        <label class="col-sm-3 control-label"> </label>
	        <div class="col-sm-4">
		        <div class="pull-left">
		        	<a href="?hal=bank" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Kembali</a>
		        </div>
		        <div class="text-right">
		           <input type="submit" name="<?php echo  isset($_GET['id']) ? 'ubah' : 'tambah'; ?>" value="Simpan" class="btn btn-primary" > 
		        </div>
	        </div>
	      </div>

	    </form>
	  </div><!-- /.box-body -->
	</div><!-- /.box -->

		