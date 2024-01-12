<?php
include('koneksi.php');
$kode_barang=$_POST['kode_barang'];
$nama_barang=$_POST['nama_barang'];
$kategori=$_POST['kategori'];
$harga_beli=$_POST['harga_beli'];
$stok=$_POST['stok'];
$harga_jual=$_POST['harga_jual'];
$tambah = mysqli_query($koneksi, "INSERT into barang values('','$kode_barang','$nama_barang','$kategori','$stok','$harga_jual','$harga_beli')");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Tambah Barang Berhasil");
			document.location='index.php?menu=barang';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Tambah Barang");
			document.location='index.php?menu=barang';
		</script>

		<?php
	}
?>