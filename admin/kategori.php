	<?php include('koneksi.php'); ?>
<div class="box box-info">
	<div class="box-header with-border">
		<font color="black">
		<h3>Kategori Barang</h3>

		<?php
		if(isset($_GET['aksi'])){
			$aksi = $_GET['aksi'];
		}else{
			$aksi = " ";
		}
		if($aksi=='edit'){
			$id_kategori = $_GET['id_kategori'];
			$kategori= mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id_kategori'"));
			?>
			<div class="panel panel-info">
				<div class="panel-heading">Edit Data Kategori</div>
				<div class="panel-body">
			<form action="edit_kategori.php?id_kategori=<?php echo $id_kategori ?>" method="post">
						<div class="form-group">
								<input type="text" name="nama_kategori" class="form-control" placeholder="Username" value="<?php echo $kategori['nama_kategori'] ?>"></div>
						<div class="form-group">
								<input type="submit" name="aksi" value="Simpan" class="btn btn-success ">
							</div>
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
				<td><b>Kategori Barang</b></td>
				<td width="70"><b>Aksi</b></td>
			</tr>
				</thead>
			<?php
			$No=1;
			$query=mysqli_query($koneksi, 'SELECT * from kategori');
			while ($kategori=mysqli_fetch_array($query)) {
			?>
			<tbody>
			<tr>
				<td><?php echo $No ?></td>
				<td><?php echo $kategori['nama_kategori'] ?></td>
				<td>
					<a href="index.php?menu=kategori&aksi=edit&id_kategori=<?php echo $kategori['id_kategori'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="hapus_kategori.php?id_kategori=<?php echo $kategori['id_kategori'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span class="glyphicon glyphicon-trash"></span></a>
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
					Tambah Data Kategori Barang
				</button>
				<div class="modal fade" id="tambah">
					<div class="modal-dialog">
					<div class="modal-content">
						<form action="tambah_kategori.php" method="post">
					<div class="modal-header"><span class="close" data-dismiss="modal">&times;</span><h4>Tambah Data Barang</h4></div>
					<div class="modal-body">
						<div class="form-group">
								<input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori"></div>
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