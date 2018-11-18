<?php
    $tgl2= date('Y-m-d');
    $tgl1= date('Y-m-d', strtotime('-7 days', strtotime($tgl2)));
?>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"><b>Filter Laporan Pengembalian</b></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <form class="form-horizontal" id="search">

        <div class="form-group">
          <label class="col-sm-4 control-label">Tanggal Awal</label>
          <div class="col-sm-3">
            <input type="date" name="tgl1" class="form-control" value="<?php echo $tgl1; ?>" required>
          </div>
          <!-- <div class="col-sm-4"></div> -->
        </div>

        <div class="form-group">
          <label class="col-sm-4 control-label">Tanggal Akhir</label>
          <div class="col-sm-3">
            <input type="date" name="tgl2" class="form-control" value="<?php echo $tgl2; ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-4 control-label"> </label>
          <div class="col-sm-3">
            <div class="text-center">
              <a href="javascript:void(0)" onclick="return cari()" class="btn btn-warning"><i class="fa fa-search"></i> Search</a>
            </div>
          </div>
        </div>

      </form>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

        <div id="viewdata"><!-- menmapilkan Data Hasil Filter  -->
          
        </div>

          

<script>
  function cari(){
    $.ajax({
      type : 'POST',
      data : $('#search').serialize(),
      url  : 'ajax/lap_pengembalian.php',
      success : function (hasil){
        $('#viewdata').html(hasil);
      }
    })
  } // close function cari

</script>  