<?php
include('koneksi.php');
$id_admin=$_GET['id_admin'];
$user=$_POST['user'];
$password=$_POST['password'];
$tambah = mysqli_query($koneksi, "UPDATE admin SET user='$user',password='$password' WHERE id_admin='$id_admin'");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Edit Admin Berhasil");
			document.location='index.php?menu=admin';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Edit Admin");
			document.location='index.php?menu=admin';
		</script>

		<?php
	}
?>