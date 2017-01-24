<?php 

$nomor=$_GET['no'];


$koneksi=mysqli_connect("localhost","root","","latihanxirpl2");
$tampilsiswa="SELECT nomor,nama FROM siswa";
$tampilbuku="SELECT isbn,judul FROM buku";
$pilihan = "SELECT * FROM peminjaman WHERE id_pinjam = '$nomor'";

$hasilsiswa=mysqli_query($koneksi,$tampilsiswa);
$hasilbuku=mysqli_query($koneksi,$tampilbuku);
$hasileksekusi = mysqli_query($koneksi,$pilihan);

$pilihanpinjam = mysqli_fetch_array($hasileksekusi);



 ?>


<h3>Form Perpustakaan</h3>
	<form method="GET" action="prosesupdate.php">
	<input type="hidden" name="no" value="<?php echo $pilihanpinjam['id_pinjam']; ?>">
		TANGGAL PINJAM   : <br>
		<input type="text" name="tglpinjam" value="<?php echo $pilihanpinjam['tgl_pinjam']; ?>"><br>
		TANGGAL KEMBALI  : <br>
		<input type="text" name="tglkembali" value="<?php echo $pilihanpinjam['tgl_kembali']; ?>"><br>

		
			

		NAMA			 : <br>
		<select name="nisn">
		<?php 
		foreach ($hasilsiswa as $siswa) {
			?>
			<option value="<?php echo $siswa['nomor'];?>" <?php if($siswa['nomor']==$pilihanpinjam['nomor']){
				echo"selected";}?> > <?php echo $siswa['nama'];?></option>
			


		<?php
	}
	?>
		</select><br>

		JUDUL 			 : <br>
		<select name="isbn">
		<?php
			foreach ($hasilbuku as $buku) {
							?>
			<option value="<?php echo $buku['isbn'];?>" <?php if($buku['isbn']==$pilihanpinjam['isbn']){echo"selected";}?>>
						   <?php echo $buku['judul'];?>
			</option>
		<?php
		}
		?>

		</select><br>


		KETERANGAN 		 : <br>
		<input type="radio" name="status" value="Kembali" <?php if ($pilihanpinjam['keterangan']=="kembali"){
			echo "checked";
			} ?> > PENGEMBALIAN <br>
		<input type="radio" name="status" value="Belum" <?php if ($pilihanpinjam['keterangan']=="belum"){
			echo "checked";
			} ?>> PEMINJAMAN <br>
<input type="submit" value="Kirim"><br>
</form>