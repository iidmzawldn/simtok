<?php
//created by dsyafaatul
include("koneksi.php");
$nama_foto = date(YmdHis)."_".$_FILES['foto']['name'];
$type_foto = $_FILES['foto']['type'];
$size_foto = $_FILES['foto']['size'];
$max_size= 1000000;
$type = array("image/jpg","image/jpeg","image/png");
$action = $_POST['action'];
	if(!empty($action)){
		if(!empty($type_foto)){
			if($size_foto<=$max_size){
				if(in_array($type_foto, $type)){
						move_uploaded_file($_FILES['foto']['tmp_name'], "gambar/".$nama_foto);
						$ganti_foto_query = mysqli_query($koneksi, "UPDATE setting_pengguna SET foto='$nama_foto'");
					if($ganti_foto_query){
						header("location: index.php?menu=profil&alert=success");
					}else{
						header("location: index.php?menu=profil&alert=error");
					}
				}else{
					header("location: index.php?menu=profil&alert=error");
				}
			}else{
				header("location: index.php?menu=profil&alert=error");
			}
		}else{
			header("location: index.php?menu=profil&alert=error");
		}
	}else{
		header("location: index.php?menu=profil&alert=error");
	}
?>