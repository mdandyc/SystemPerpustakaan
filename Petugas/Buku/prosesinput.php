
<?php

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");


//ambil data dari form
$j = $_GET['judul'];
$pt = $_GET['penerbit'];
$pg = $_GET['pengarang'];

$input = "INSERT INTO buku(judul,penerbit,pengarang) VALUES ('$j','$pt','$pg')";
$hasil = mysqli_query($konek,$input);

if($hasil){
	header("location:index.php");
}else{
	header("location:inputbuku.php");
}
?>