<h3>Data Peminjaman</h3>
<a href="inputpinjam.php">Input Peminjaman</a><hr>
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
if (isset($_GET['cari'])) {
	$q = $_GET['s'];
	$tampil = "SELECT peminjaman.id_pinjam,
siswa.nomor,
siswa.nama,
peminjaman.tgl_pinjam,
peminjaman.tgl_kembali,
buku.judul,
peminjaman.keterangan
FROM siswa,peminjaman,buku 
WHERE siswa.nomor = peminjaman.nomor AND peminjaman.isbn = buku.isbn AND siswa.nama LIKE '%$q%' LIMIT $posisi,$batas";
}else{
	$tampil = "SELECT peminjaman.id_pinjam,
siswa.nomor,
siswa.nama,
peminjaman.tgl_pinjam,
peminjaman.tgl_kembali,
buku.judul,
peminjaman.keterangan
FROM siswa,peminjaman,buku
WHERE siswa.nomor = peminjaman.nomor AND peminjaman.isbn = buku.isbn LIMIT $posisi,$batas";
}
//query menampilkan data

$hasil = mysqli_query($konek,$tampil);
$jmlhasil = mysqli_num_rows($hasil);
?>

<table border="1">
	<tr>
		<th>No</th>
		<th>NISN</th>
		<th>Nama</th>		
		<th>Tanggal Pinjam</th>
		<th>Tanggal Kembali</th>
		<th>Judul</th>
		<th>Keterangan</th>
		<th>Aksi</th>
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
	echo "<td> $data[nomor] </td> ";
	echo "<td> $data[nama]</td> ";
	echo "<td>$data[tgl_pinjam]</td> ";
	echo "<td>$data[tgl_kembali]</td> ";
	echo "<td>$data[judul]</td> ";
	echo "<td>$data[keterangan]</td> ";
	echo "<td><a href='hapuspinjam.php?id_pinjam=$data[id_pinjam]'>Hapus </a>| <a href='editpinjam.php?no=$data[id_pinjam]'>Edit </a></td>";
	echo "</tr>";
	$no++;
}	
}


?>

</table>


<?php 

$tampil2 = "SELECT peminjaman.id_pinjam,
siswa.nomor,
siswa.nama,
peminjaman.tgl_pinjam,
peminjaman.tgl_kembali,
buku.judul,
peminjaman.keterangan
FROM siswa,peminjaman,buku
WHERE siswa.nomor = peminjaman.nomor AND peminjaman.isbn = buku.isbn ";
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
