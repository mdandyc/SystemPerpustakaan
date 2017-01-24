<?php

$is = $_GET['isbn'];

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");

//query menampilkan data
$tampil = "SELECT * FROM  buku WHERE isbn = '$is'";
$hasil = mysqli_query($konek,$tampil);

$data = mysqli_fetch_array($hasil);

?>
<h3>Update Buku</h3>
	<form method="GET" action="prosesupdate.php"> 
	ISBN : <input type="text" name="isbn" value="<?php echo $data['isbn'];?>" disabled> <br>
		Judul : <input type="text" name="judul" value="<?php echo $data['judul'];  ?>"><br>
		Penerbit : <input type="text" name="penerbit" value="<?php echo $data['penerbit'];  ?>"><br>
		Pengarang : <input type="text" name="pengarang" value ="<?php echo $data['pengarang']; ?>"><br>
<input type="submit" value="Kirim"><br>
</form>