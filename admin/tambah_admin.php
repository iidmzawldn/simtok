<?php
include('koneksi.php');
$user=$_POST['user'];
$password=$_POST['password'];
$tambah = mysqli_query($koneksi, "INSERT into admin values('','$user','$password')");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Tambah Admin Berhasil");
			document.location='index.php?menu=admin';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Tambah Admin");
			document.location='index.php?menu=admin';
		</script>

		<?php
	}
?>