<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if(isset($_POST["submit"])){
    if(tambahDataA($_POST) > 0 ){
        $msg = 'Created Successfully!';
    }
}
?>

function tambahDataA($data){
    global $pdo;
    $nama_objek = $data["nama_objek"];
    $deskripsi = $data["deskripsi"];
    $gambar = UploadGambar();
    $alamat = $data["alamat"];
    $jam_buka_tutup = $data["jam_buka_tutup"];
    if (!$gambar) {
        return false;
    }

    $stmt = $pdo->prepare("INSERT INTO objek (nama_objek, deskripsi, gambar, alamat, jam_buka_tutup) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nama_objek, $deskripsi, $gambar, $alamat, $jam_buka_tutup]);

    return $stmt->rowCount();
}


// Function upload gambar
function UploadGambar(){
    $namaFile =  $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmp = $_FILES["gambar"]["tmp_name"];

    if($error === 4){
        echo "<script>
        alert('File Belum Di Upload!!');
        </script>"
        return false;
    }


    $ekstensivalid = ["jpeg", "jpg", "png"];
    // foto1.jpg => ["foto1", "jpg"]
    $ekstensiiFile = explode(".", $namaFile);
    $ekstensiiFile = strtolower(end(eksttensiiFile)); // jpg

    if(!in_array($ekstensiiFile, $ekstensivalid)){
        echo "<script>
        alert('Ekstensi File tidak valid');
        </script>"
        return false;
}

if($ukuranFile > 4000000){
    echo "<script>
        alert('Ukuran File terlalu besar');
        </script>"
        return false;
}
    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensiiFile;
    

    move_uploaded_file($tmpName, "img/" . $namaFilebaru );

    return $namaFilebaru;
