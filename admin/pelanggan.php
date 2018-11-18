          <div class="box">

            <div class="box-body">
              <table id="dt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th>No</th> -->
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Kota</th>

                </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    $query="SELECT * from pelanggan";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $nama_pelanggan; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $telp; ?></td>
                      <td><?php echo $provinsi; ?></td>
                      <td>
                        <a href="?hal=pelanggan&id=<?php echo $id_pelanggan; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                        <a href="produk_proses.php?hapus=<?php echo $id_pelanggan;?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus [[ <?php echo $nama_pelanggan;?> ]] ??')"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                <?php }} ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
