<?php
include('admin/koneksi.php');
$kode_transaksi=$_GET['kode_transaksi'];
$id_detail=$_GET['id_detail'];
$jumlah_barang=$_GET['jumlah_barang'];
$tambah = mysqli_query($koneksi, "UPDATE detail_transaksi SET jumlah_barang='$jumlah_barang' WHERE id_detail='$id_detail'");
if($tambah){
	?>

		<script type="text/javascript">
			document.location='index.php?kode_transaksi=<?php echo $kode_transaksi ?>';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("update jumlah barang gagal");
			document.location='index.php?kode_transaksi=<?php echo $kode_transaksi ?>';
		</script>

		<?php
	}
?>