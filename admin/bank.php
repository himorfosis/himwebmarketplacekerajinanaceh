          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Bank</h3>
              <div class="box-tools pull-right">
                 <!-- <button data-toggle="modal" data-target="#myModal" class="btn btn-primary" type="button"> <span class="label label-primary">( <i class="fa fa-plus"></i> ) ADD </span></button>  -->
                 <a href="?hal=bank_olah" class="btn btn-primary btn-flat" style="float:right;margin-top:0px;"><i class="fa  fa-plus-square"></i> Tambah Data</a>
              </div> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th>No</th> -->
                  <th>No</th>
                  <th>Nama Bank</th>
                  <th>Nomor Rekening</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    $query="SELECT * from bank";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $nama_bank; ?></td>
                      <td><?php echo $no_rekening; ?></td>
                      <td>
                        <a href="?hal=bank_olah&id=<?php echo $id_bank; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                        <a href="bank_proses.php?hapus=<?php echo $id_bank;?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus [[ <?php echo $nama_bank;?> ]] ??')"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                <?php }} ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
