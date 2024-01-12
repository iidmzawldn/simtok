<?php
include('koneksi.php');;
$nama_perusahaan=$_POST['nama_perusahaan'];
$alamat=$_POST['alamat'];
$tambah = mysqli_query($koneksi, "UPDATE setting_pengguna SET nama_perusahaan='$nama_perusahaan',alamat='$alamat'");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Edit Data Berhasil");
			document.location='index.php?menu=profil';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Edit Data");
			document.location='index.php?menu=profil';
		</script>

		<?php
	}
?>