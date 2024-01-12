<?php
include('koneksi.php');
$id_kategori=$_GET['id_kategori'];
$hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");
if($hapus){
	?>

		<script type="text/javascript">
			window.alert("Hapus Kategori Berhasil");
			document.location='index.php?menu=kategori';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Hapus Kategori");
			document.location='index.php?menu=kategori';
		</script>

		<?php
	}
?>