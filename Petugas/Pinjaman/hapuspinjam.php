<?php

$id = $_GET['id_pinjam'];

$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");

$hapus= "DELETE FROM peminjaman WHERE id_pinjam = '$id'";

$hasil=mysqli_query($konek,$hapus);

if($hasil){
	header("location:index.php");
}else{
	echo "gagal";
}




?>