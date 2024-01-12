<?php
include('admin/koneksi.php');
$kode_transaksi=$_GET['kode_transaksi'];
$id_detail=$_GET['id_detail'];
$hapus = mysqli_query($koneksi, "DELETE FROM detail_transaksi WHERE id_detail='$id_detail'");
if($hapus){
	?>

		<script type="text/javascript">
			document.location='index.php?kode_transaksi=<?php echo $kode_transaksi ?>';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Hapus Barang");
			document.location='index.php?kode_transaksi=<?php echo $kode_transaksi ?>';
		</script>

		<?php
	}
?>