<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];

    //extract berfungsi membuat kolom array menjadi variabel

    extract(ArrayData($mysqli,"produk","id_produk='$kode'"));
    $a = "Edit Data";

}else{
    $id_produk=KodeOtomatis($mysqli,"produk","id_produk","","","");
    $id_kategori="";
    $id_pengrajin="";
    $nama_produk="";
    $des_produk="";
    $harga_produk="";
    $gambar="";
    $a = "Tambah Data";
}
?>
	<div class="box">
	  <div class="box-header with-border">
	    <h3 class="box-title"><b><?php echo $a; ?></b></h3>
	  </div><!-- /.box-header -->
	  <div class="box-body">
	    <form class="form-horizontal" action="produk_proses.php" method="post" enctype="multipart/form-data">

		  <div class="form-group">
	        <label class="col-sm-3 control-label">ID Produk</label>
	        <div class="col-sm-4">
	          <input type="text" name="kode" class="form-control" required value="<?php echo $id_produk; ?>" readonly>
	        </div>
	      </div>

  	      <div class="form-group">
	        <label class="col-sm-3 control-label">Pengrajin</label>
	        <div class="col-sm-4">
       
 				<select name="kategori" class="form-control" required="">
 					<option value="">Pilih kategori</option>
 					<?php  
 					$query= $mysqli->query('SELECT * FROM kategori');
 					while ($kategori= $query->fetch_assoc()) {
 						echo "<option value='".$kategori['id_kategori']."' ".pilihselect($id_kategori,$kategori['id_kategori']).">";
 						echo $kategori['nama_kategori'];
 						echo "</option>";
 					}
 					?>

 				</select>

			</div>
	      </div>

	      	      <div class="form-group">
	        <label class="col-sm-3 control-label">Pengrajin</label>
	        <div class="col-sm-4">
       
 				<select name="pengrajin" class="form-control" required="">
 					<option value="">Pilih Pengrajin</option>
 					<?php  
 					$query= $mysqli->query('SELECT * FROM pengrajin');
 					while ($pengrajin= $query->fetch_assoc()) {
 						echo "<option value='".$pengrajin['id_pengrajin']."' ".pilihselect($id_pengrajin, $pengrajin['id_pengrajin']).">";
 						echo $pengrajin['nama_pengrajin'];
 						echo "</option>";
 					}
 					?>

 				</select>

			</div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Nama Produk</label>
	        <div class="col-sm-4">
	          <input type="text" name="nama" class="form-control" required value="<?php echo $nama_produk; ?>" >
	        </div>
	      </div>

  	      <div class="form-group">
	        <label class="col-sm-3 control-label">Deskripsi</label>
	        <div class="col-sm-4">
	         <textarea name="deskripsi" class="form-control" required><?php echo $des_produk; ?></textarea>
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Harga</label>
	        <div class="col-sm-4">
	          <input type="text" name="harga" class="form-control" required value="<?php echo $harga_produk; ?>" >
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label">Gambar</label>
	        <div class="col-sm-4">
	        	<img weidth="120px" height="100px" src="../uploaded/produk/small_<?php echo $gambar_produk; ?>">
	          <input type="file" name="gambar" value="<?php echo $gambar; ?>" >
	          <br>
	          <p>Ukuran gambar maksimal 2 MB</p>
	        </div>
	      </div>

	      <div class="form-group">
	        <label class="col-sm-3 control-label"> </label>
	        <div class="col-sm-4">
		        <div class="pull-left">
		        	<a href="?hal=kategori" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Kembali</a>
		        </div>
		        <div class="text-right">
		           <input type="submit" name="<?php echo  isset($_GET['id']) ? 'ubah' : 'tambah'; ?>" value="Simpan" class="btn btn-primary" > 
		        </div>
	        </div>
	      </div>

	    </form>
	  </div><!-- /.box-body -->
	</div><!-- /.box -->

		