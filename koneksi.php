<?php
// isi nama host, username mysql, dan password mysql 
$databaseHost = "localhost";
$databaseName = "inlippart2";
$databaseUsername = "root";
$databasePassword = "";

$db = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

function tampil($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];

    while ($data = mysqli_fetch_assoc($result)) {
        $rows[] = $data;
    }
    return $rows;
}

function CariK($keyword)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM kuliner WHERE nama_kuliner LIKE '%$keyword%' OR jenis_kuliner LIKE '%$keyword%'");

    return $query;
}

function tambahDataK($data)
{
    global $db;
    $jenis = $data["jenis"];
    $nama = $data["nama"];
    $lokasi = $data["lokasi"];
    $menu = isset($data["menu"]) ? $data["menu"] : "";
    $telp = $data["telp"];

    $query = "INSERT INTO kuliner (jenis_kuliner, nama_kuliner, lokasi_kuliner, menu, no_telp) VALUES ('$jenis', '$nama', '$lokasi', '$menu', '$telp')";
    $result = mysqli_query($db, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function ubahDataK($data, $id)
{
    global $db;
    $jenis = $_POST["jenis"];
    $nama = $_POST["nama"];
    $lokasi = $_POST["lokasi"];
    $menu = $_POST["menu"];
    $telp = $_POST["telp"];

    $query = "UPDATE kuliner SET jenis_kuliner = '$jenis', nama_kuliner = '$nama', lokasi_kuliner = '$lokasi', menu = '$menu', no_telp = '$telp' WHERE id_kuliner = $id";
    $result = mysqli_query($db, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function template_header($title)
{
    echo <<<EOT
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>$title</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
    <nav class="navtop">
        <div>
            <h1>INLIP</h1>
            <a href="homepeg.php"><i class="fas fa-home"></i>Home</a>
            <a href="pemilik.php"><i class="fas fa-address-book"></i>Objek</a>
        </div>
    </nav>
EOT;
}

function template_footer()
{
    echo <<<EOT
    </body>
    </html>
EOT;
}
?>
