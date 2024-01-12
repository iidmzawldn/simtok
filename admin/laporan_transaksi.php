<?php include('koneksi.php'); ?>
<div class="box box-info">
	<div class="box-header with-border">
		<font color="black">
		<h3>Laporan Transaksi</h3>

<form action="" method="GET">
<input type="hidden" name="menu" value="laporan">
    <div class="form-group no-print">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" name="range" class="form-control" id="reservation" value="<?= (!empty($_GET['range']))?$_GET['range']:"" ?>" style="width: 200px;margin-right: 10px;">
          <button class="btn btn-primary">
            <i class="fa fa-refresh"></i>
          </button>
      </div>
    </div>
    </form>

		<?php
		if(isset($_GET['aksi'])){
			$aksi = $_GET['aksi'];
		}else{
			$aksi = " ";
		}
		if($aksi=='edit'){
			$id_transaksi = $_GET['id_transaksi'];
			$transaksi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM transaksi_pembelian WHERE id_transaksi='$id_transaksi'"));
			?>
			<div class="panel panel-info">
				<div class="panel-heading">Edit Barang</div>
				<div class="panel-body">
			<form action="edit_transaksi.php?id_transaksi=<?php echo $id_transaksi ?>" method="post">
						<div class="form-group">
								<input type="text" name="tanggal" class="form-control" placeholder="Tanggal" value="<?php echo $transaksi['tanggal'] ?>"></div>
						<div class="form-group">
								<input type="text" name="kode_transaksi" class="form-control" placeholder="Kode Transaksi" value="<?php echo $transaksi['kode_transaksi'] ?>"></div>
						<div class="form-group">
								<input type="text" name="nama_pembeli" class="form-control" placeholder="Nama Pembeli" value="<?php echo $transaksi['nama_pembeli'] ?>"></div>
						<div class="form-group">
								<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?php echo $transaksi['nama_barang'] ?>"></div>
						<div class="form-group">
								<input type="text" name="jumlah_pembelian" class="form-control" placeholder="Jumlah Pembelian" value="<?php echo $transaksi['jumlah_pembelian'] ?>"></div>
						<div class="form-group">
								<input type="text" name="harga" class="form-control" placeholder="Harga" value="<?php echo $transaksi['harga'] ?>"></div>
						<div class="form-group">
								<input type="text" name="total_harga" class="form-control" placeholder="Total Harga" value="<?php echo $transaksi['total_harga'] ?>"></div>
						<div class="form-group">
								<input type="text" name="laba" class="form-control" placeholder="Laba" value="<?php echo $transaksi['laba'] ?>"></div>
						<div class="form-group">
								<input type="submit" name="aksi" value="Simpan" class="btn btn-success "></div>
			</form>
			</div>
			</div>
			<?php
		}
		?>
		<table class="table table-bordered table-striped no-print">
			<table class="table table-bordered" >
				<thead>
			<tr>
				<td><b>No</b></td>
				<td><b>Kode Transaksi</b></td>
				<td><b>Jumlah Pembelian</b></td>
				<td><b>Total Harga</b></td>
				<td><b>Tanggal Transaksi</b></td>
			</tr>
				</thead>
			<?php
			$No=1;
			 if(isset($_GET['range'])){
				$range = $_GET['range'];
			}else{
				$range = "";
			}
            if(!empty($range)){
	    	$range = explode("-",trim($_GET['range']));
	          $start = date("Y/m/d",strtotime($range[0]));
	          $end = date("Y/m/d",strtotime($range[1]));
			$query=mysqli_query($koneksi, "SELECT *,SUM(jumlah_barang) as 'jumlah_barangnya',SUM(harga_jual*jumlah_barang) as 'total_harga'FROM detail_transaksi INNER JOIN transaksi_pembelian ON transaksi_pembelian.kode_transaksi=detail_transaksi.kode_transaksi INNER JOIN barang ON barang.kode_barang=detail_transaksi.kode_barang WHERE tanggal_transaksi BETWEEN '$start' AND '$end' GROUP BY transaksi_pembelian.kode_transaksi");
			while ($transaksi=mysqli_fetch_array($query)) {
			?>
			<tbody>
			<tr>
				<td><?php echo $No ?></td>
				<td><?php echo $transaksi['kode_transaksi'] ?></td>
				<td><?php echo $transaksi['jumlah_barangnya'] ?></td>
				<td><?php echo $transaksi['total_harga'] ?></td>
				<td><?php echo $transaksi['tanggal_transaksi'] ?></td>
			</tr>
			<?php
			$No++;
			}
			}
			?>
			</tbody>
		</table>
		<button class="btn btn-success no-print" data-toggle="modal" data-target="#tambah" onclick="print()">
					<span class="glyphicon glyphicon-print"></span>
					Print Laporan
		</button>
	</font>
	</div>
	</div>
	</div>
	