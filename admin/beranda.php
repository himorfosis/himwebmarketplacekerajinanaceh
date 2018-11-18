
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo JumlahData($mysqli,"pengrajin"); ?></h3>

              <p>Pengrajin</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
<!--               <i class="ion ion-bag"></i>
 -->            </div>
            <a href="?hal=pengrajin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo JumlahData($mysqli,"produk"); ?></h3>

              <p>Produk</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
<!--               <i class="ion ion-stats-bars"></i>
 -->            </div>
            <a href="?hal=produk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo JumlahData($mysqli,"konfirmasi_pembayaran"); ?></h3>

              <p>Konfirmasi Pembayaran</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
<!--               <i class="ion ion-person-add"></i>
 -->            </div>
            <a href="?hal=pembayaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo JumlahData($mysqli,"pemesanan"); ?></h3>

              <p>Pemesanan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
<!--               <i class="ion ion-pie-graph"></i>
 -->            </div>
            <a href="?hal=pembayaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
