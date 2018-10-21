<?php 
	include'koneksi.php';
	$nim=$_GET['nim'];

	$query="DELETE FROM datamhs WHERE nim =$nim";
	$hasil=mysqli_query($koneksi,$query);
	if($hasil){
		echo "Data berhasil dihapus";
		header("location: menuawal.php");

	}else{
		echo "Data gagal dihapus";
	}

 ?>