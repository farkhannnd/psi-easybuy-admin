<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>


  <section class="content">

    <div class="row">

     
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $bulan = date('m');
            $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Masuk' and month(transaksi_tanggal)='$bulan'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo number_format($p['total_pemasukan']) ?></h4>
            <p>Stok Masuk Bulan Ini</p>
          </div>
          <div class="icon">
          <i><img src="../assets/image/icon-stok-masuk.svg" alt="" width=80%></i>
          </div>
          <a href="laporan.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $tahun = date('Y');
            $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Masuk' and year(transaksi_tanggal)='$tahun'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo number_format($p['total_pemasukan']) ?></h4>
            <p>Stok Masuk Tahun Ini</p>
          </div>
          <div class="icon">
          <i><img src="../assets/image/icon-stok-masuk.svg" alt="" width=80%></i>
          </div>
          <a href="laporan.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $bulan= date('m');
            $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Keluar' and month(transaksi_tanggal)='$bulan'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo number_format($p['total_pemasukan']) ?></h4>
            <p>Stok Keluar Bulan Ini</p>
          </div>
          <div class="icon">
            <i><img src="../assets/image/icon-stok-keluar.svg" alt="" width=80%></i>
          </div>
          <a href="laporan.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $tahun = date('Y');
            $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Keluar' and year(transaksi_tanggal)='$tahun'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo number_format($p['total_pemasukan']) ?></h4>
            <p>Stok Keluar Tahun Ini</p>
          </div>
          <div class="icon">
            <i><img src="../assets/image/icon-stok-keluar.svg" alt="" width=80%></i>
          </div>
          <a href="laporan.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $kategori = mysqli_query($koneksi,"SELECT count(idkategori) as kategori FROM kategori_stok");
            $p = mysqli_fetch_assoc($kategori);
            ?>
            <h4 style="font-weight: bolder"><?php echo number_format($p['kategori']) ?></h4>
            <p>Kategori Stok Barang</p>
          </div>
          <div class="icon">
            <i><img src="../assets/image/icon-kategori.svg" alt="" width=80%></i>
          </div>
          <a href="kategori.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-gray-dark">
          <div class="inner">
            <?php 
            $stok = mysqli_query($koneksi,"SELECT sum(stok_barang) as total_stok FROM barang");
            $p = mysqli_fetch_assoc($stok);
            ?>
            <h4 style="font-weight: bolder"><?php echo number_format($p['total_stok']) ?></h4>
            <p>Total Stok Tersedia</p>
          </div>
          <div class="icon">
          <i><img src="../assets/image/icon-total-stok.svg" alt="" width=80%></i>
          </div>
          <a href="barang.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

      <!-- Left col -->
      <section class="col-lg-8">

        <div class="nav-tabs-custom">

          <ul class="nav nav-tabs pull-right">
            <!-- <li><a href="#tab2" data-toggle="tab">Pemasukan</a></li> -->
            <li class="active"><a href="#tab1" data-toggle="tab">Pemasukan & Pengeluaran</a></li>
            <li class="pull-left header">Grafik</li>
          </ul>

          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">

              
              <h4 class="text-center">Grafik Data Barang Masuk & Keluar Per <b>Bulan</b></h4>
              <canvas id="grafik1" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>
              <br/>

              <h4 class="text-center">Grafik Data Data Barang Masuk & Keluar Per <b>Tahun</b></h4>
              <canvas id="grafik2" style="position: relative; height: 300px;"></canvas>

            </div>
            <div class="chart tab-pane" id="tab2" style="position: relative; height: 300px;">
            </div>
          </div>

        </div>

      </section>
      <!-- /.Left col -->


      <section class="col-lg-4">


        <!-- Calendar -->
        <div class="box box-solid bg-green">
          <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">Kalender</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
        </div>
        

      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->


  </section>

</div>



<?php include 'footer.php'; ?>