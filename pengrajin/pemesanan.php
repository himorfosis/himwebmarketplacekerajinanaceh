          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pemesanan</h3>
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
                  <th>Nama Pelanggan</th>
                  <th>Total Produk</th>
                  <th>Total Bayar</th>
                  <th>Waktu</th>

                </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    $query="SELECT * from pemesanan join konfirmasi_pembayaran on konfirmasi_pembayaran.id_pemesanan = pemesanan.id_pemesanan join bank on bank.id_bank = pemesanan.id_bank join pelanggan on pelanggan.id_pelanggan = pemesanan.id_pelanggan where pemesanan.status = 'Dikonfirmasi' ";

                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 

                        while ($data=mysqli_fetch_assoc($result)) {

                              extract($data);

                    ?>
                    <tr>

                      <td><?php echo $no++ ?></td>
                      <td><?php echo $id_pemesanan; ?></td>
                      <td><?php echo $nama_pelanggan; ?></td>
                      <td><?php echo $total_produk ." Barang" ; ?></td>
                      <td><?php echo "Rp " .$total_bayar; ?></td>
                      <td><?php echo $waktu_konfirmasi; ?></td>
                      <td>

                      <a href="?hal=pemesanan_detail&id=<?php echo $id_pemesanan; ?>" class="btn btn-success"><i class="fa fa-edit">
                        
                      </i> Detail</a>

                      </td>
                    </tr>
                <?php }} ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
