<?php
// isi nama host, username mysql, dan password mysql anda 
$databaseHost = "localhost";
$databaseName = "inlippart2";
$databaseUsername = "root";
$databasePasword = "";

$connect = mysqli_connect($databaseHost, $databaseUsername, $databasePasword, $databaseName);

if (mysqli_connect_errno()){
    die("koneksi gagal: " . mysqli_connect_errno());
}
if (isset($_POST['sumbit'])){
    $id_kuliner = $_POST['id_kuliner'];
    $jenis_kuliner = $_POST['jenis_kuliner'];
    $nama_kuliner = $_POST['nama_kuliner'];
    $lokasi_kuliner = $_POST['lokasi_kuliner'];
    $menu = $_POST['menu'];
    $no_telp = $_POST['no_telp'];

    $query = "INSERT INTO kuliner (id_kuliner, jenis_kuliner, nama_kuliner, lokasi_kuliner, menu, no_telp) VALUES ('$id_kuliner', '$jenis_kuliner','$nama_tkuliner','$nama_kuliner','$lokasi_kuliner','$menu','$no_telp')";

    if (mysqli_query($connect, $query)) {
        echo "Data Tersimpan";
    }   else {
        echo "Data Gagal Tersimpan" . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Register</title>
</head>

<body>
    <h2>Form Register</h2>
    <form method="POST" action="">
        <label>jenis_kuliner;</label>
        <input type="text" name ="JENIS_KULINER"><br>
        <label>nama_tkuliner;</label>
        <input type="text" name ="NAMA_TKULINER"><br>
        <label>id_kuliner;</label>
        <input type="text" name ="ID_KULINER"><br>
        <label>menu;</label>
        <input type="text" name ="MENU"><br>
        <label>id_lokasi;</label>
        <input type="text" name ="ID_LOKASI"><br>
        <label>no_telp;</label>
        <input type="text" name ="NO_TELP"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
<html>
