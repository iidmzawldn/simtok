<?php
include('koneksi.php');
$id_barang=$_GET['id_barang'];
$kode_barang=$_POST['kode_barang'];
$nama_barang=$_POST['nama_barang'];
$id_kategori=$_POST['id_kategori'];
$harga_beli=$_POST['harga_beli'];
$stok=$_POST['stok'];
$harga_jual=$_POST['harga_jual'];
$tambah = mysqli_query($koneksi, "UPDATE barang SET kode_barang='$kode_barang',nama_barang='$nama_barang',id_kategori='$id_kategori',harga_beli='$harga_beli',stok='$stok',harga_jual='$harga_jual' WHERE id_barang='$id_barang'");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Edit Data Barang Berhasil");
			document.location='index.php?menu=barang';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Edit Data Barang");
			document.location='index.php?menu=barang';
		</script>

		<?php
	}
?>