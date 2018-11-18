          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Olah Data Kategori</h3>
              <div class="box-tools pull-right">
                 <!-- <button data-toggle="modal" data-target="#myModal" class="btn btn-primary" type="button"> <span class="label label-primary">( <i class="fa fa-plus"></i> ) ADD </span></button>  -->
                 <a href="?hal=kategori_olah" class="btn btn-primary btn-flat" style="float:right;margin-top:0px;"><i class="fa  fa-plus-square"></i> Tambah Data</a>
              </div> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th>No</th> -->
                  <th>Kode Kategori</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    $query="SELECT * from kategori";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>
                    <tr>
                      <!-- <td><?php echo $no++ ?></td> -->
                      <td><?php echo $kd_kategori; ?></td>
                      <td><?php echo $nama_kategori; ?></td>
                      <td>
                        <a href="?hal=kategori_olah&id=<?php echo $kd_kategori; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                        <a href="kategori_proses.php?hapus=<?php echo $kd_kategori;?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus [[ <?php echo $nama_kategori;?> ]] ??')"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                <?php }} ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
