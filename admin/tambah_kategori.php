<?php
include('koneksi.php');
$nama_kategori=$_POST['nama_kategori'];
$tambah = mysqli_query($koneksi, "INSERT into kategori values('','$nama_kategori')");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Tambah kategori Berhasil");
			document.location='index.php?menu=kategori';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Tambah Kategori");
			document.location='index.php?menu=kategori';
		</script>

		<?php
	}
?>