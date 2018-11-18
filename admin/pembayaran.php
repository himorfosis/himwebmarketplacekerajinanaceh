          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pembayaran</h3>
              <div class="box-tools pull-right">

              </div> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Pemesanan</th>
                  <th>Nama Bank</th>
                  <th>Total Bayar</th>
                  <th>Status</th>
                  <th>Gambar</th>

                </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    $query="SELECT * from pemesanan join konfirmasi_pembayaran on konfirmasi_pembayaran.id_pemesanan = pemesanan.id_pemesanan join bank on bank.id_bank = pemesanan.id_bank where pemesanan.status = 'Dibayar' ";

                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 

                        while ($data=mysqli_fetch_assoc($result)) {

                                extract($data);

                    ?>
                    <tr>

                      <td><?php echo $no++ ?></td>
                      <td><?php echo $id_pemesanan; ?></td>
                      <td><?php echo $nama_bank; ?></td>
                      <td><?php echo "Rp " .$total_bayar; ?></td>
                      <td><?php echo $status_konfirmasi; ?></td>
                      <td><img weidth="120px" height="100px" src="../uploaded/pembayaran/small_<?php echo $gambar; ?>"></td>
                      <td>

                      <a href="?hal=pembayaran_detail&id=<?php echo $id_pemesanan; ?>" class="btn btn-success"><i class="fa fa-edit">
                        
                      </i> Detail</a>
                      
                        <a href="pembayaran_proses.php?konfirmasi=<?php echo $id_pemesanan;?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin Konfirmasi [[ <?php echo $id_pemesanan;?> ]] ??')"> Konfirmasi</a>

                      </td>
                    </tr>
                <?php }} ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
