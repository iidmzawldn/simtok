<?php
include('koneksi.php');
$id_barang=$_GET['id_barang'];
$hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id_barang'");
if($hapus){
	?>

		<script type="text/javascript">
			window.alert("Hapus Barang Berhasil");
			document.location='index.php?menu=barang';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Hapus Barang");
			document.location='index.php?menu=barang';
		</script>

		<?php
	}
?>