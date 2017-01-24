<?php
$nomor = $_GET['nomor'];

include "../../config/koneksi.php";

$perintah = "SELECT * FROM siswa WHERE nomor = '$nomor'";

$hasil =  mysqli_query($konek,$perintah);

$data = mysqli_fetch_array($hasil);

$foto = $data['foto'];

if ($foto == NULL) {
  $foto = "percobaan1.png";
}

?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1><?php echo $data['nama']; ?></h1>

    <table border="1">
      <tr>
        <td rowspan="5" ><img src="img/<?php echo $foto; ?>" alt="" width="200" /></td>
      </tr>
      <tr>
        <td>NISN</td>
        <td><?php echo $data['nomor']; ?></td>
      </tr>
      <tr>
        <td>nama</td>
        <td><?php echo $data['nama']; ?></td>
      </tr>
      <td>kontak</td>
      <td><?php echo $data['kontak']; ?></td>
    </tr>
    <td>alamat</td>
    <td><?php echo $data['alamat']; ?></td>
  </tr>
    </table>

  </body>
</html>
