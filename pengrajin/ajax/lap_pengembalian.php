<?php

require_once '../../setting/crud.php';
require_once '../../setting/koneksi.php';
require_once '../../setting/tanggal.php';
require_once '../../setting/fungsi.php';
  
  $tgl1=$_POST['tgl1'];
  $tgl2=$_POST['tgl2'];
?>

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Data Pengembalian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>No</th>
                  <th>Kode Kembali</th>
                  <th>Tanggal Kembali</th>
                  <th>Petugas</th>
                  <th>Kode Pinjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Anggota</th>
                  <th>Denda</th>
                </tr>
                <?php
                    $no=1;
                    $query="SELECT kd_pengembalian, tgl_kembali, PM.kd_petugas, nama_petugas, PM.kd_peminjaman, tgl_peminjaman, PJ.kd_anggota, nama_anggota, total_denda FROM pengembalian PM JOIN peminjaman PJ ON PM.kd_peminjaman=PJ.kd_peminjaman JOIN petugas PT ON PM.kd_petugas=PT.kd_petugas JOIN anggota A ON PJ.kd_anggota=A.kd_anggota where tgl_kembali between '$tgl1' and '$tgl2'";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $kd_pengembalian; ?></td>
                      <td><?php echo date('d-M-Y', strtotime($tgl_kembali)); ?></td>
                      <td><?php echo $nama_petugas; ?></td>
                      <td><?php echo $kd_peminjaman; ?></td>
                      <td><?php echo date('d-M-Y', strtotime($tgl_peminjaman)); ?></td>
                      <td><?php echo $nama_anggota; ?></td>
                      <td><?php echo $total_denda; ?></td>
                    </tr>
                <?php }} ?>

              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" align="center">
                 <a href="ctk_lap_pengembalian.php?tgl1=<?php echo $tgl1; ?>&tgl2=<?php echo $tgl2; ?>" class="btn btn-primary btn-flat" target="_blank"><i class="fa  fa-print"></i> Cetak</a>
            </div>
          </div>
          <!-- /.box -->
