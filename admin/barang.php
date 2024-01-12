<?php include('koneksi.php'); ?>
<div class="box box-info">
	<div class="box-header with-border">
		<font color="black">
		<h3>Data Barang</h3>

		<?php
		if(isset($_GET['aksi'])){
			$aksi = $_GET['aksi'];
		}else{
			$aksi = " ";
		}
		if($aksi=='edit'){
			$id_barang = $_GET['id_barang'];
			$data_barang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id_barang'"));
			?>
			<div class="panel panel-info">
				<div class="panel-heading">Edit admin</div>
				<div class="panel-body">
			<form action="edit_barang.php?id_barang=<?php echo $id_barang ?>" method="post">
						<div class="form-group">
								<input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" value="<?php echo $data_barang['kode_barang'] ?>"></div>
						<div class="form-group">
								<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?php echo $data_barang['nama_barang'] ?>"></div>
						<div class="form-group">
								<input type="text" name="id_kategori" class="form-control" placeholder="Nama Kategori" value="<?php echo $data_barang['id_kategori'] ?>"></div>
						<div class="form-group">
								<input type="text" name="harga_beli" class="form-control" placeholder="Harga Beli" value="<?php echo $data_barang['harga_beli'] ?>"></div>
						<div class="form-group">
								<input type="text" name="stok" class="form-control" placeholder="Jumlah Barang" value="<?php echo $data_barang['stok'] ?>"></div>
						<div class="form-group">
								<input type="text" name="harga_jual" class="form-control" placeholder="Harga Jual" value="<?php echo $data_barang['harga_jual'] ?>"></div>
						<div class="form-group">
								<input type="submit" name="aksi" value="Simpan" class="btn btn-success "></div>
			</form>
			</div>
			</div>
			<?php
		}
		?>
		<table class="table table-bordered">
			<table class="table table-bordered example2 table-striped" >
				<thead>
			<tr>
				<td width="40"><b>No</b></td>
				<td><b>Kode Barang</b></td>
				<td><b>Nama Barang</b></td>
				<td><b>Kategori</b></td>
				<td><b>Harga Beli</b></td>
				<td><b>Jumlah Barang</b></td>
				<td><b>Harga Jual</b></td>
				<td width="70"><b>Aksi</b></td>
			</tr>
				</thead>
			<?php
			$No=1;
			$query=mysqli_query($koneksi, 'SELECT barang.*,kategori.* from barang,kategori WHERE barang.id_kategori=kategori.id_kategori');
			while ($barang=mysqli_fetch_array($query)) {
			?>
			<tbody>
			<tr>
				<td><?php echo $No ?></td>
				<td><?php echo $barang['kode_barang'] ?></td>
				<td><?php echo $barang['nama_barang'] ?></td>
				<td><?php echo $barang['nama_kategori'] ?></td>
				<td><?php echo $barang['harga_beli'] ?></td>
				<td><?php echo $barang['stok'] ?></td>
				<td><?php echo $barang['harga_jual'] ?></td>
				<td>
					<a href="index.php?menu=barang&aksi=edit&id_barang=<?php echo $barang['id_barang'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="hapus_barang.php?id_barang=<?php echo $barang['id_barang'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span class="glyphicon glyphicon-trash"></span></a>
				</td>
			</tr>
			<?php
			$No++;
			}
			?>
			</tbody>
		</table>
		<button class="btn btn-info" data-toggle="modal" data-target="#tambah">
					<span class="glyphicon glyphicon-plus"></span>
					Tambah Barang
				</button>
				<div class="modal fade" id="tambah">
					<div class="modal-dialog">
					<div class="modal-content">
						<form action="tambah_barang.php" method="post">
					<div class="modal-header"><span class="close" data-dismiss="modal">&times;</span><h4>Tambah Data Barang</h4></div>
					<div class="modal-body">
						<div class="form-group">
								<input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang"></div>
						<div class="form-group">
								<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang"></div>
						<div class="form-group">
								<select name="kategori" class="form-control" placeholder="Masukan Kelas">
									<?php
									$query = mysqli_query($koneksi, "select * from kategori");
									while($kategori = mysqli_fetch_array($query)){
									?>
									<option value="<?php echo $kategori['id_kategori'] ?>"><?php echo $kategori['nama_kategori'] ?></option>
									<?php } ?>
								</select></div>
						<div class="form-group">
								<input type="text" name="harga_beli" class="form-control" placeholder="Harga Beli"></div>
						<div class="form-group">
								<input type="text" name="stok" class="form-control" placeholder="Jumlah Barang"></div>
						<div class="form-group">
								<input type="text" name="harga_jual" class="form-control" placeholder="Harga jual"></div>
						</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
						<input type="reset" value="Reset" class="btn btn-warning">
						<input type="submit" name="aksi" value="Simpan" class="btn btn-success">
					</div>
					</form>
					</div>
					</div>
					</div>
	</font>
	</div>
	</div>
	</div>