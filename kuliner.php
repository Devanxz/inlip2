<?php
require "koneksi.php";

$kuliner = tampil("SELECT * FROM kuliner ORDER BY id_kuliner DESC");

if(isset($_POST["cari"])){
    $kuliner = Carik($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuliner</title>
    <link rel="stylesheet"  type="text/css" href="warnaborder.css">
</head>
<body>
<nav class="navtop">
    <div>
        <img src="lolo.jpg" alt="">
        <a href="homepage.php"><i class="fas fa-home"></i>Home</a>
        <a href="pemilik.php"><i class="fas fa-address-book"></i>Pemilik</a>
        <a href="user.php"><i class="fas fa-address-book"></i>View</a>
    </div>
</nav>
<a href="tambah-data-kuliner.php">Tambah Data</a><br><br>
<form action="" method="post">
    <input type="text" name="keyword" autocomplete="off" autofocus size="50">
    <button type="submit" name="cari">Cari</button>
</form><br>
<table border="1" cellspacing="0" cellpadding="3">
    <tr>
        <th>No</th>
        <th>Jenis Kuliner</th>
        <th>Nama Kuliner</th>
        <th>Lokasi Kuliner</th>
        <th>Menu</th>
        <th>No Telp</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; ?>
    <?php foreach($kuliner as $k) {
        $id = $k["id_kuliner"];
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?php echo $k["jenis_kuliner"]; ?></td>
            <td><?php echo $k["nama_kuliner"]; ?></td>
            <td><?php echo $k["lokasi_kuliner"]; ?></td>
            <td><?php echo $k["menu"]; ?></td>
            <td><?php echo $k["no_telp"]; ?></td>
            <td>
                <a href="delete_kuliner.php?deleteid_kuliner=<?= $id ?>" onclick="return confirm('Apakah data ingin dihapus?')">Hapus</a>
                <a href="ubah-data-kuliner.php?ubahid_kuliner=<?= $id ?>">Ubah</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
