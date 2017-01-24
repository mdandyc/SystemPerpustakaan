<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");
//ambil variabel yang dikirim dari form
$a = $_GET['no'];
$b = $_GET['tglpinjam'];
$c = $_GET['tglkembali'];
$d = $_GET['nisn'];
$e = $_GET['isbn'];
$f = $_GET['status'];

$update = "UPDATE peminjaman SET tgl_pinjam = '$b', tgl_kembali = '$c', nomor ='$d', isbn = '$e', keterangan = '$f'
WHERE id_pinjam='$a'";

$hasil = mysqli_query($konek,$update);

if($hasil){
	header("location:index.php");
}else{
	echo "Update data siswa gagal";
}