<?php

$is = $_GET['isbn'];

$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");

$hapus= "DELETE FROM buku WHERE isbn = '$is'";

$hasil=mysqli_query($konek,$hapus);

if($hasil){
	header("location:index.php");
}else{
	echo "gagal";
}




?>