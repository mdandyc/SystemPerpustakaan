<?php

$nomor = $_GET['nomor'];

//koneksi ke database
include "../../config/koneksi.php";

//query menampilkan data
$tampil = "SELECT * FROM  siswa WHERE nomor = '$nomor'";
$hasil = mysqli_query($konek,$tampil);

$data = mysqli_fetch_array($hasil);
$foto=$data['foto'];
if($foto==NULL){
      $foto="percobaan1.png"; 
       }
?>

<h3>Update siswa</h3>
	<form method="POST" action="prosesupdate.php" enctype="multipart/form-data">
		<img src="img/<?php echo $foto; ?>" width="200px;"><br>
		<input type="hidden" value="<?php echo $data['foto']; ?>" name="fotolama">
		<input type="file" name="fprofil"><br>
		Nama : <input type="text" name="nama" value="<?php  echo $data['nama'];  ?>"><br>

		<input type="hidden" name="nomor" value="<?php  echo $data['nomor'];  ?>">
		kontak : <input type="text" name="kontak" value="<?php  echo $data['kontak'];  ?>"><br>
		alamat : <textarea name="alamat" rows="5" COLS="30"><?php  echo $data['alamat']; ?>		</textarea><br>
<input type="submit" value="Kirim"><br>
</form>