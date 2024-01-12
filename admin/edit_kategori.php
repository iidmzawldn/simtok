<?php
include('koneksi.php');
$id_kategori=$_GET['id_kategori'];
$nama_kategori=$_POST['nama_kategori'];
$tambah = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Edit Kategori Berhasil");
			document.location='index.php?menu=kategori';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Edit Kategori");
			document.location='index.php?menu=kategori';
		</script>

		<?php
	}
?>