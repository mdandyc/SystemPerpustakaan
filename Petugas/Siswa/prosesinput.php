
<?php 

include "../../config/koneksi.php";


//ambil data dari form
$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];
$lokasifile = $_FILES['upfile']['tmp_name'];
$namafile = $_FILES['upfile']['name'];
$sizefile = $_FILES['upfile']['size'];

//tujuan
$tujuan = "img/$namafile";

//perintah upload
$upload = move_uploaded_file($lokasifile, $tujuan);

$input = "INSERT INTO siswa(nama,foto,kontak,alamat) VALUES ('$nama','$namafile','$kontak','$alamat')";
$hasil = mysqli_query($konek, $input);

if($hasil){
	header("location:index.php");
}else{
	header("location:inputsiswa.php");
}
?>