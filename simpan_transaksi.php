<?php
include('admin/koneksi.php');
$kode_transaksi=$_POST['kode_transaksi'];
$total_bayar=$_POST['total_bayar'];
$tambah = mysqli_query($koneksi, "UPDATE transaksi_pembelian SET total_bayar='$total_bayar' WHERE kode_transaksi='$kode_transaksi'");
if($tambah){
	?>

		<script type="text/javascript">
			document.location='index.php?kode_transaksi=<?php echo $kode_transaksi ?>';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("simpan transaksi gagal");
			document.location='index.php?kode_transaksi=<?php echo $kode_transaksi ?>';
		</script>

		<?php
	}
?>