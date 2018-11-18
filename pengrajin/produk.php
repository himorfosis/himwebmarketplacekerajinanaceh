<?php
session_start();


    $kode=$_SESSION['ptgs'];
    extract(ArrayData($mysqli,"pengrajin","id_pengrajin='$kode'"));
?>

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Produk</h3>
              <div class="box-tools pull-right">
                 <a href="?hal=produk_olah" class="btn btn-primary btn-flat" style="float:right;margin-top:0px;"><i class="fa  fa-plus-square"></i> Tambah Data</a>
              </div> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th>No</th> -->
                  <th>Kategori</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Gambar</th>

                </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    $query="SELECT * from produk WHERE produk.id_pengrajin = '$id_pengrajin'";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>
                    <tr>
                      <td><?php echo $id_kategori; ?></td>
                      <td><?php echo $nama_produk; ?></td>
                      <td><?php echo "Rp " .$harga_produk; ?></td>
                      <td><img weidth="120px" height="100px" src="../uploaded/produk/small_<?php echo $gambar_produk; ?>"></td>
                      <td>
                        <a href="?hal=produk_olah&id=<?php echo $id_produk; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>

                        <a href="produk_proses.php?hapus=<?php echo $id_produk;?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus [[ <?php echo $nama_produk;?> ]] ??')"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                <?php }} ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
