<?php

include 'koneksi.php';
if (isset($_GET['deleteid_kuliner'])) {   
    $id = $_GET['deleteid_kuliner'];
    $sql = "delete from `kuliner` where id_kuliner= $id";
    $result = mysqli_query($db, $sql);
    if ($result) {
        header('location:kuliner.php');
    } else {
        die(mysqli_error($db));
    }
}

?>