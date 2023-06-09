<?php

include "koneksi.php";

if( isset($_GET['id_kuliner'])){

   $id_kuliner = $_GET['id_kuliner']; // Mengambil nilai id_kuliner dari parameter GET

    // Membuat query SQL untuk menghapus data berdasarkan id_kuliner
    $sql = "DELETE FROM kuliner WHERE id_kuliner = $id_kuliner";
    $query = mysqli_query($db, $sql);


    if($query ){
header('location: ke.php');


    }
    else{
        die("gagal");
    
    }
}
else {
    die("akses ggl");
}
?>