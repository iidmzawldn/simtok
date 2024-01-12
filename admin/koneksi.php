<!-- Nama  : Iid Muiz Awaludin
     Kelas : 12 RPL 3-->
<?php
$koneksi = mysqli_connect("localhost","root","");
$database  = mysqli_select_db($koneksi,"db_simtok");
if($koneksi){
	//Jika Koneksi Berhasil
	// echo "database terhubung";
}
else{
	echo "database gagal terhubung";
}
?>