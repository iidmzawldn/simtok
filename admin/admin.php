	<?php include('koneksi.php'); ?>
<div class="box box-info">
	<div class="box-header with-border">
		<font color="black">
		<h3>Data Admin</h3>

		<?php
		if(isset($_GET['aksi'])){
			$aksi = $_GET['aksi'];
		}else{
			$aksi = " ";
		}
		if($aksi=='edit'){
			$id_admin = $_GET['id_admin'];
			$data_admin = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$id_admin'"));
			?>
			<div class="panel panel-info">
				<div class="panel-heading">Edit admin</div>
				<div class="panel-body">
			<form action="edit_admin.php?id_admin=<?php echo $id_admin ?>" method="post">
						<div class="form-group">
								<input type="text" name="user" class="form-control" placeholder="Username" value="<?php echo $data_admin['user'] ?>"></div>
						<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $data_admin['password'] ?>"></div>
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
				<td><b>Username</b></td>
				<td><b>Password</b></td>
				<td width="70"><b>Aksi</b></td>
			</tr>
				</thead>
			<?php
			$No=1;
			$query=mysqli_query($koneksi,'SELECT * from admin');
			while ($admin=mysqli_fetch_array($query)) {
			?>
			<tbody>
			<tr>
				<td><?php echo $No ?></td>
				<td><?php echo $admin['username'] ?></td>
				<td><?php echo $admin['password'] ?></td>
				<td>
					<a href="index.php?menu=admin&aksi=edit&id_admin=<?php echo $admin['id_admin'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="hapus_admin.php?id_admin=<?php echo $admin['id_admin'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span class="glyphicon glyphicon-trash"></span></a>
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
					Tambah Admin
				</button>
				<div class="modal fade" id="tambah">
					<div class="modal-dialog">
					<div class="modal-content">
						<form action="tambah_admin.php" method="post">
					<div class="modal-header"><span class="close" data-dismiss="modal">&times;</span><h4>Tambah Data Admin</h4></div>
					<div class="modal-body">
						<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username"></div>
						<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Password"></div>
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