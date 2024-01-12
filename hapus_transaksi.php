<?php
include('admin/koneksi.php');
$kode_transaksi=$_GET['kode_transaksi'];
$hapus = mysqli_query($koneksi, "DELETE FROM transaksi_pembelian WHERE kode_transaksi='$kode_transaksi'");
if($hapus){
	?>

		<script type="text/javascript">
			document.location='index.php';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			document.location='index.php';
		</script>

		<?php
	}
?>