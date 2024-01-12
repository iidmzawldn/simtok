<?php
include('koneksi.php');
$id_admin=$_GET['id_admin'];
$hapus = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin='$id_admin'");
if($hapus){
	?>

		<script type="text/javascript">
			window.alert("Hapus Admin Berhasil");
			document.location='index.php?menu=admin';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Hapus Admin");
			document.location='index.php?menu=admin';
		</script>

		<?php
	}
?>