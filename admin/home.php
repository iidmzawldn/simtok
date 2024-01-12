<?php
include('koneksi.php');
$jumlah_admin=mysqli_num_rows(mysqli_query($koneksi,'SELECT * FROM admin where id_admin'));
$jumlah_barang=mysqli_num_rows(mysqli_query($koneksi,'SELECT * FROM barang where id_barang'));
$jumlah_transaksi=mysqli_num_rows(mysqli_query($koneksi,'SELECT * FROM transaksi_pembelian where id_transaksi'));
$query = mysqli_query($koneksi, "SELECT * FROM detail_transaksi INNER JOIN transaksi_pembelian ON transaksi_pembelian.kode_transaksi=detail_transaksi.kode_transaksi INNER JOIN barang ON barang.kode_barang=detail_transaksi.kode_barang");
$total = 0;
while ($data = mysqli_fetch_array($query)) {
  $subtotal = $data['harga_jual']*$data['jumlah_barang'];
  $total += $subtotal;
}
?>
<body style="font-family: ELEGANT TYPEWRITER;">              
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner" style="height: 120px;">
              <h5 style="font-family: Bohemian typewriter; font-size: 20px;">
                
                <?php
                  echo $jumlah_admin;
                  ?>

              </h5>
              <p>Admin</p>

            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="?menu=admin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner" style="height: 120px;">
              <h3 style="font-family: Bohemian typewriter; font-size: 20px;">
                
              
                <?php
                  echo "Rp".number_format($total);
                  ?>

              </h3>

              <p>Jumlah Keuangan Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-usd"></i>
            </div>
            <a class="small-box-footer">Jumlah Keuangan Masuk</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner" style="height: 120px;">

              <h3 style="font-family: Bohemian typewriter; font-size: 20px;">

                <?php
                  echo $jumlah_barang;
                  ?>

                  </h3>

              <p>Data Barang</p>
            </div>
            <div class="icon">
              <i class="fa fa-dropbox"></i>
            </div>
            <a href="?menu=barang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner" style="height: 120px;">
               <h3 style=" font-family: Bohemian typewriter; font-size: 20px;">
              <?php
                  echo $jumlah_transaksi;
              ?> Orang


              <p></p>
              </h3>
              <p>Transaksi Pembelian</p>
            </div>
            <div class="icon">
              <i class="fa fa-clipboard"></i>
            </div>
            <a href="?menu=transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <form action="index.php" method="GET">
      <select class="form-control select2" name="tahun" onchange="submit()">
        <?php
        $tahun = (!empty($_GET['tahun']))?$_GET['tahun']:date("Y");
        $data_tahun_query = mysqli_query($koneksi, "SELECT YEAR(tanggal_transaksi) as tahun FROM transaksi_pembelian GROUP BY YEAR(tanggal_transaksi) ORDER BY YEAR(tanggal_transaksi) DESC");
        while($data_tahun_result = mysqli_fetch_array($data_tahun_query)){
        ?>
          <option value="<?= $data_tahun_result['tahun'] ?>" <?= ($data_tahun_result['tahun']==$tahun)?"selected":"" ?>><?= $data_tahun_result['tahun'] ?></option>
        <?php
        }
        ?>
        </select>
        </form>
      <div class="chart" id="bar-chart" style="height: 300px;"></div>
      <?php
            $data_penjualan_perbulan_query = mysqli_query($koneksi, "SELECT *,DATE_FORMAT(tanggal_transaksi,'%M %Y') as tanggal,SUM(jumlah_barang) as jumlah FROM transaksi_pembelian INNER JOIN detail_transaksi ON detail_transaksi.kode_transaksi=transaksi_pembelian.kode_transaksi WHERE YEAR(tanggal_transaksi)='$tahun' GROUP BY DATE_FORMAT(tanggal_transaksi,'%M-%Y') ORDER BY tanggal_transaksi");
            $data = "[";
            while($data_peminjaman_pertahun = mysqli_fetch_array($data_penjualan_perbulan_query)){
              $data .= "{y: '".$data_peminjaman_pertahun['tanggal']."', jumlah:".$data_peminjaman_pertahun['jumlah']."},
              ";
            }
            $data .= "]";
            ?>
            <script>
              $(function(){
                    //BAR CHART
              var bar = new Morris.Bar({
                element: 'bar-chart',
                resize: true,
                data: <?php echo $data ?>,
                barColors: ['#605ca8'],
                xkey: 'y',
                ykeys: ['jumlah'],
                labels: ['Jumlah Barang Terjual'],
                hideHover: 'auto'
              });
              })
            </script>


</div>

</body>