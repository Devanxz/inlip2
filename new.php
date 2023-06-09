<?php
     include "koneksi.php";

     

     if (isset($_POST['daftar'])){
         mysqli_query($db, "INSERT INTO kuliner SET
         nama_kuliner = '$_POST[nama_kuliner]',
         lokasi_kuliner = '$_POST[lokasi_kuliner]',
         menu = '$_POST[menu]',
         no_telp = '$_POST[no_telp]',
         jenis_kuliner = '$_POST[jk]'");

         echo "Data pengguna telah masuk";
     }
?>

<html>
<head>
     <title>Tambah Data</title>
</head>

<body>
   <header>
   <h2>Tambah Data kuliner</h2>
   </header>
   
   <form action="" method="POST">

     <fieldset>

     <p>
         <label for="nama_kuliner">nama_kuliner: </label>
         <input type="text" name="nama_kuliner" placeholder="nama kuliner" />
    </p>
    <p>
         <label for="lokasi_kuliner">lokasi_kuliner: </label>
         <input type="text" name="lokasi_kuliner" placeholder="lokasi" />
    </p>
    <p>
         <label for="menu">menu: </label>
         <input type="text" name="menu" placeholder="menu" />
    </p>
    <p>
         <label for="no_telp">no_telp: </label>
         <input type="text" name="no_telp" placeholder="no telp" />
    </p>

    <p>
         <label for="jenis_kuliner">Jenis kuliner: </label>
         <label><input type="radio" name="jk" value="makanan"> Makanan</label>
         <label><input type="radio" name="jk" value="minuman"> Minuman</label>
     </p>

     <p>
         <input type="submit" name="daftar" value="Tambah">
    </p>
    </fieldset>
    </form>

     <a href="index.php">Kembali</a>
    
    </body>
    
    </html>
