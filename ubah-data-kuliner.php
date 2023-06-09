<?php
require 'koneksi.php';
 
$id = $_GET["ubahid_kuliner"];
$queryResult = tampil("SELECT * FROM kuliner WHERE id_kuliner ='$id'");
if (!empty($queryResult)) {
    $query = $queryResult[0];

    if(isset($_POST["ubah"])){
        if(ubahDataK($query, $id) > 0 ){
            echo "Ubah data berhasil";
            echo '<script>window.location="kuliner.php"</script>';
        } else {
            echo '<script>alert("Gagal mengubah")</script>';
        }
    }
} else {
    echo "Data tidak ditemukan";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Kuliner</title>
    <style>
        /* CSS Styles */
    </style>
</head>
<body>
    <!-- HTML Content -->
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Kuliner</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ubah Data Kuliner</h1>
        <form action="" method="post">
            <label for="jenis">Jenis Kuliner:</label>
            <input type="text" name="jenis" id="jenis" autocomplete="off" placeholder="Masukkan jenis ..." value="<?= $query["jenis_kuliner"]; ?>"><br>
            <label for="nama">Nama Kuliner:</label>
            <input type="text" name="nama" id="nama" autocomplete="off" placeholder="Masukkan nama ..." value="<?= $query["nama_kuliner"]; ?>"><br>
            <label for="lokasi">Lokasi Kuliner:</label>
            <input type="text" name="lokasi" id="lokasi" autocomplete="off" placeholder="Masukkan lokasi ..." value="<?= $query["lokasi_kuliner"]; ?>"><br>
            <label for="menu">Menu:</label>
            <input type="text" name="menu" id="menu" autocomplete="off" placeholder="Masukkan Menu ..." value="<?= $query["menu"]; ?>"><br>
            <label for="telp">No Telp:</label>
            <input type="text" name="telp" id="telp" autocomplete="off" placeholder="Masukkan No Telp ..." value="<?= $query["no_telp"]; ?>"><br>
            
            <button type="submit" name="ubah">Ubah Data</button>
        </form>
    </div>
</body>
</html>
