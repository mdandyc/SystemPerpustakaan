<?php
//koneksi ke database

include "../../config/koneksi.php";


//ambil variabel yang dikirim dari form
$nomor = $_POST['nomor'];
$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];
$fotolama = $_POST['fotolama'];

$lokasifile = $_FILES['fprofil']['tmp_name'];
$namafile = $_FILES['fprofil']['name'];

if ($namafile !=NULL) {
	//hapus foto
	unlink("img/$fotolama");
	//tujuan
	$tujuan = "img/$namafile";

	//perintah upload
	$upload = move_uploaded_file($lokasifile, $tujuan);
	$foto=$namafile;
}else{
	$foto=$fotolama;
}

$update = "UPDATE siswa SET nama = '$nama', kontak = '$kontak', alamat ='$alamat',foto='$foto' 
WHERE nomor='$nomor'";

$hasil = mysqli_query($konek,$update);
if($hasil){
header("location:index.php");
}else{
echo "Update data siswa gagal";
}