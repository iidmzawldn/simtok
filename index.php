<?php include('admin/koneksi.php'); ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kasir - SIMTok</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Custom styles for this template -->
    <link href="css/full-width-pics.css" rel="stylesheet">

    <link rel="stylesheet" href="skins/_all-skins.min.css">
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: purple;">
      <div class="container">
        <a class="navbar-brand" href="#">Kasir Manajemen Toko</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="admin/login.php">Login
                <span class="sr-only">(current)</span>
              </a>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header - set the background image for the header in the line below -->
    <header class="bg-image-full" style="background-image: url('#');">
      <img class="img-fluid d-block mx-auto" src="" alt="">
    </header>

    <!-- Content section -->
    <section class="py-5">
      <div class="container" style="height: 300px; width: 90%; padding: 0px;">
    <div class="header" style="background-color: black;height: 35px;color: white;line-height: 35px;padding-left: 10px;">
      <span class="glyphicon glyphicon-user">Sistem Kasir Manajemen Toko</span>
    </div>
    <div class="body">
      <?php
      if(empty($_GET['kode_transaksi'])){
      ?>
      <table border="0" style="width: 100%; border-collapse: collapse;">
        <form method="POST" action="tambah_transaksi.php">
          <?php
          $hasil = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM transaksi_pembelian"));
          $kode = str_pad($hasil[0]+1, 3, '0', STR_PAD_LEFT);
          $kode_transaksi =  "T".date("dmY").$kode;
           ?>
           <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ?>">
          <tr>
            <td>Kode Transaksi</td>
            <td>:</td>
            <td><?php echo $kode_transaksi ?></td>
          </tr>
          <tr>
            <td>Tanggal Transaksi</td>
            <td>:</td>
            <td><?php echo date("d-m-Y") ?></td>
          </tr>
          <tr>
            <td colspan="3">
              <input type="submit" name="save" value="Tambah" class="btn btn-primary">
            </td>
          </tr>
        </form>
      </table>
      <?php
      }else{
      ?>
      <table border="0" style="width: 100%; border-collapse: collapse;">
        <form method="POST" action="edit_detail_transaksi.php">
          <?php
          $kode_transaksi =  $_GET['kode_transaksi'];
          $data_transaksi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM transaksi_pembelian WHERE kode_transaksi='$kode_transaksi'"));
           ?>
           <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ?>">
          <tr>
            <td>Kode Transaksi</td>
            <td>:</td>
            <td><?php echo $kode_transaksi ?></td>
          </tr>
          <tr>
            <td>Tanggal Transaksi</td>
            <td>:</td>
            <td><?php echo $data_transaksi['tanggal_transaksi'] ?></td>
          </tr>
        </form>
      </table>
      <form method="post" action="tambah_detail_transaksi.php" class="noprint">
        <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ?>">
        <div class="form-group">
            <input type="text" name="kode_barang" class="form-control" placeholder="Masukan kode barang">
        </div>
      </form>
      <table class="table table-bordered">
          <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Kuantitas</th>
            <th>Jumlah Harga</th>
            <th class="noprint">Aksi</th>
          </tr>
          <?php
          $query = mysqli_query($koneksi, "SELECT * FROM detail_transaksi INNER JOIN transaksi_pembelian ON transaksi_pembelian.kode_transaksi=detail_transaksi.kode_transaksi INNER JOIN barang ON barang.kode_barang=detail_transaksi.kode_barang WHERE transaksi_pembelian.kode_transaksi='$kode_transaksi'");
          $total = 0;
          while ($data = mysqli_fetch_array($query)) {
            $subtotal = $data['harga_jual']*$data['jumlah_barang'];
            ?>
            <tr>
              <td><?php echo $data['kode_barang'] ?></td>
              <td><?php echo $data['nama_barang'] ?></td>
              <td><?php echo $data['harga_jual'] ?></td>
              <td>
                <form action="update_jumlah_barang.php">
                  <input type="hidden" name="kode_transaksi" value="<?php echo $data['kode_transaksi'] ?>">
                  <input type="hidden" name="id_detail" value="<?php echo $data['id_detail'] ?>">
                  <input type="text" name="jumlah_barang" value="<?php echo $data['jumlah_barang'] ?>" class="form-control">
                </form>
              </td>
              <td>
                <?php echo $subtotal ?>
              </td>
              <td class="noprint"><a href="hapus_detail_transaksi.php?kode_transaksi=<?php echo $kode_transaksi ?>&id_detail=<?php echo $data['id_detail'] ?>" class="btn btn-danger">Hapus item</a></td>
            </tr>
            <?php
            $total += $subtotal;
          }
          ?>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Total</th>
            <th><?php echo $total ?></th>
            <th></th>
          </tr>
      </table>
      <form action="simpan_transaksi.php" method="POST">
        <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ?>">
        <table align="right">
          <tr>
            <td>Cash</td>
            <td>:</td>
            <td>
                <input type="text" name="total_bayar" class="form-control" style="width: 200px" value="<?php echo $data_transaksi['total_bayar'] ?>">
            </td>
          </tr>
          <tr>
            <td>Kembalian</td>
            <td>:</td>
            <td>
                <input type="text" name="kembalian" class="form-control" style="width: 200px" value="<?php echo $data_transaksi['total_bayar']-$total ?>" disabled>
            </td>
          </tr>
        </table>
        <br>
        <div class="form-group noprint">
          <input type="submit" name="save" value="Simpan" class="btn btn-primary">
          <input type="button" name="" value="Batal" class="btn btn-default" onclick="document.location='hapus_transaksi.php?kode_transaksi=<?php echo $kode_transaksi ?>'">
        </div>
      </form>
    <?php } ?>
      </div>
    </form>
    </div>
  </div>
    </section>

    <!-- Image Section - set the background image for the header in the line below -->
    <section class="p y-5 bg-image-full" style="background-image: url('#');">
      <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
      <div style="height: 200px;"></div>
    </section>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#tambah").click(function(){
          $("#p").before($("#o"));
        })
      })
    </script>

  </body>

</html>