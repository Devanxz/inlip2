<?php
//koneksi ke database
$host = "localhost"; //nama host database
$username = "root"; //username database
$password = ""; //password database
$database = "inlippart2"; //nama database

$connect = mysqli_connect($host, $username, $password, $database);

//memeriksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

//jika form disubmit
if (isset($_POST['btn-login'])) {
    //mengambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    //query untuk mencari data pengguna
    $query = "SELECT * FROM pemilik WHERE username='$username' AND password='$password'";

    //mengeksekusi query
    $result = mysqli_query($connect, $query);

    //mengecek apakah data pengguna ditemukan atau tidak
    if (mysqli_num_rows($result) == 1) {
        //jika ditemukan, redirect ke halaman dashboard
        header('Location: kuliner.php');
        exit;
    } else {
        //jika tidak ditemukan, tampilkan pesan error
        $error_message = "Username atau password salah.";
    }
}

//menutup koneksi ke database
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <h1>Login</h1>
            <form action="" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukkan nama..." autocomplete="off" required>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Masukkan password..." autocomplete="off" required>
                <button type="submit" name="btn-login">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
