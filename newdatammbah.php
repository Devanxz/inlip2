<html>
    <head>
        <h1>Menampilkan Table </h1>
</head>

<body>
    <h3>Data Kuliner</h3>
    <button><a href="add.php">Add New User</a><br/><br/></button>

    <table border="1" class="table">
        <h1></h1>
        <tr>
            <th>id_kuliner</th>
            <th>jenis_kuliner</th>
            <th>nama_kuliner</th>
            <th>lokasi_kuliner</th>
            <th>menu</th>
            <th>no_telp</th>
</tr>
<?php
//select table kuliner dari database
include "add.php";
$query_mysql = mysqli_query($mysqli,"SELECT * FROM kuliner")or die(mysqli_error());
$nomor = 1;
while($data = mysqli_fetch_array($query_mysql)){
?>
<tr>
    <td><?php echo $nomor++; ?></td>
    <td><?php echo $data['jenis_kuliner'];?></td>
    <td><?php echo $data['nama_kuliner'];?></td>
    <td><?php echo $data['lokasi_kuliner'];?></td>
    <td><?php echo $data['menu'];?></td>
    <td><?php echo $data['no_telp'];?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
   