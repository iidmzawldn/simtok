<?php
include('admin/koneksi.php');
$kode_transaksi=$_POST['kode_transaksi'];
$tambah = mysqli_query($koneksi, "INSERT into transaksi_pembelian values('','$kode_transaksi',NOW(),'0')");
if($tambah){
	?>

		<script type="text/javascript">
			document.location='index.php?kode_transaksi=<?php echo $kode_transaksi ?>';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Tambah Barang");
			document.location='index.php';
		</script>

		<?php
	}
?>