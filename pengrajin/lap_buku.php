

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Data Buku</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Judul Buku</th>
                  <th>Kategori</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>ISBN</th>
                  <th>Jumlah</th>
                  <th>Tahun Terbit</th>
                </tr>

                <?php
                    $no=1;
                    $query="SELECT kd_buku, judul_buku, nama_kategori, nama_penerbit, isbn, jumlah, tahun_terbit from buku B JOIN kategori K ON B.kd_kategori=K.kd_kategori JOIN penerbit P ON B.kd_penerbit=P.kd_penerbit";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $kd_buku; ?></td>
                      <td><?php echo $judul_buku; ?></td>
                      <td><?php echo $nama_kategori; ?></td>
                      <td style="width: 200px">

                        <?php
                        $a="";
                        $query2="SELECT kd_buku, DP.kd_pengarang, nama_pengarang FROM det_pengarang DP JOIN pengarang P ON Dp.kd_pengarang=P.kd_pengarang where kd_buku ='$kd_buku'";
                        $result2=$mysqli->query($query2);
                        while ($data2=mysqli_fetch_assoc($result2)) {
                          $a = $a .', '. $data2['nama_pengarang'];?>

                        <?php
                        }
                          echo substr($a, 1);
                        ?>

                      </td>
                      <td><?php echo $nama_penerbit; ?></td>
                      <td><?php echo $isbn; ?></td>
                      <td><?php echo $jumlah; ?></td>
                      <td><?php echo $tahun_terbit; ?></td>
                    </tr>
                <?php }} ?>

              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" align="center">
<!--               <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul> -->
                 <a href="ctk_lap_buku.php" class="btn btn-primary btn-flat" target="_blank"><i class="fa  fa-print"></i> Cetak</a>
            </div>
          </div>
          <!-- /.box -->