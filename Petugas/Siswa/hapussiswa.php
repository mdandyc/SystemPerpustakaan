<?php

$nomor = $_GET['nomor'];

include "../../config/koneksi.php";

$carifoto = "SELECT foto FROM siswa WHERE nomor = '$nomor'";

$hapus= "DELETE FROM siswa WHERE nomor = '$nomor'";



//mencari foto
$hasilfoto = mysqli_query($konek,$carifoto);
$foto = mysqli_fetch_array($hasilfoto);

//menghapus foto
unlink("img/$foto[foto]");


//menghapus record dari database
$hasil=mysqli_query($konek,$hapus);

if($hasil){
	header("location:index.php");
}else{
	echo "gagal";
}




?>