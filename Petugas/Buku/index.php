<h3>Data Peminjman</h3>
<a href="inputbuku.php">input buku</a><hr>
<form action="index.php" method="GET">
	<input type="text" name="s">
	<input type="submit" value="CARI" name="cari">

</form>
<?php
//pagging
$batas = 5;
$halaman = @$_GET['halaman'];
if (empty($halaman)) {
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi =($halaman - 1)*$batas;
}
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");
	//query menampilkan data
if (isset($_GET['cari'])) {
	$q = $_GET['s'];
	$tampil = "SELECT * FROM  buku WHERE judul LIKE '%$q%' ORDER BY judul LIMIT $posisi,$batas";
}else{

	$tampil = "SELECT * FROM  buku ORDER BY judul LIMIT $posisi,$batas";
}
$hasil = mysqli_query($konek,$tampil);
$jmlhasil = mysqli_num_rows($hasil);
?>

<table border="1">
	<tr>
		<th>ISBN</th>
		<th>Judul</th>
		<th>Penerbit</th>
		<th>Pengarang</th>
		<th>aksi</th>
	</tr>

	
<?php
if ($jmlhasil<1) {
	echo "<tr>";
	echo "<td colspan='5' style='text-align:center;'>No Result!</td>";
	echo "</tr>";
}else{
$no=$posisi+1;
//tampil nama, email dan pesan
while($data=mysqli_fetch_array($hasil)){
	echo "<tr>";
	echo "<td> $no</td>";
	echo "<td> $data[judul] </td> ";
	echo "<td> $data[penerbit]</td> ";
	echo "<td>$data[pengarang]</td> ";
	echo "<td><a href='hapusbuku.php?isbn=$data[isbn]'>hapus </a>| <a href='editbuku.php?isbn=$data[isbn]'>edit </a></td>";
	echo "</tr>";
	$no++;
}	
}


?>

</table>
<?php 

$tampil2 = "SELECT * FROM buku ";
$hasil2 = mysqli_query($konek,$tampil2);
$jmldata= mysqli_num_rows($hasil2);
$jmlhalaman = ceil($jmldata/$batas);

echo "JUMLAH DATA : $jmldata <br>";

for ($i=1; $i <=$jmlhalaman ; $i++) { 

	if ($i != $halaman) {
		echo "<a href=$_SERVER[PHP_SELF]?halaman=$i>$i</a> ";
	}else{
		echo "<b> | $i | </b>";
	}

	
}

 ?>