<?php
include('admin/koneksi.php');
$kode_transaksi=$_POST['kode_transaksi'];
$kode_barang=$_POST['kode_barang'];
$tambah = mysqli_query($koneksi, "INSERT into detail_transaksi values('','$kode_transaksi','$kode_barang','1')");
if($tambah){
	?>

		<script type="text/javascript">
			document.location='index.php?kode_transaksi=<?php echo $kode_transaksi ?>';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Barang tidak ditemukan");
			document.location='index.php?kode_transaksi=<?php echo $kode_transaksi ?>';
		</script>

		<?php
	}
?>