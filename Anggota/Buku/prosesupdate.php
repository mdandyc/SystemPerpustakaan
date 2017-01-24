<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");
//ambil variabel yang dikirim dari form
$is = $_GET['isbn'];
$j = $_GET['judul'];
$pt = $_GET['penerbit'];
$pg = $_GET['pengarang'];

$update = "UPDATE buku SET judul = '$j', penerbit = '$pt', pengarang ='$pg'
WHERE isbn='$is'";

$hasil = mysqli_query($konek,$update);
if($hasil){
header("location:index.php");
}else{
echo "Update data siswa gagal";
}