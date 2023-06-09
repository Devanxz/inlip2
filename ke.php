<?php
	include("koneksi.php");
?>

<html>
<head>
	<title>kuliner</title>
</head>

<body>
	<form method="GET" action="ke.php" style="text-align: center;">
<label>Pencarian : </label>
<input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>">
<button type="submit">cari</button>
	</form>
	<?php
	include "koneksi.php";
	if(isset($_GET['cari'])){
		$pencarian = $_GET['cari'];
		$query = "select *  from kuliner where id_kuliner like'%".$pencarian. "%'";
	} else {
		$query = "select *  from kuliner";
	}

	?>
	<a href="new.php"><p>Tambah Data</p></a>
	<table border="1">
		<thead>
			<tr>
				<th>id_kuliner</th>
				<th>jenis_kuliner</th>
				<th>nama_kuliner</th>
				<th>lokasi_kuliner</th>
				<th>menu</th>
				<th>no_telp</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "SELECT * FROM kuliner";
			$query = mysqli_query($db, $sql);
			$no = 1;
			while ($kuliner = mysqli_fetch_array($query)) {
				echo "<tr>";
				echo "<td>" . $no++ . "</td>";
				echo "<td>" . $kuliner['jenis_kuliner'] . "</td>";
				echo "<td>" . $kuliner['nama_kuliner'] . "</td>";
				echo "<td>" . $kuliner['lokasi_kuliner'] . "</td>";
				echo "<td>" . $kuliner['menu'] . "</td>";
				echo "<td>" . $kuliner['no_telp'] . "</td>";
				echo "<td><a href='edit.php?id_kuliner=" . $kuliner['id_kuliner'] . "'>edit</a> | ";
				echo "<a href=\"hapusdata.php?id_kuliner=" . $kuliner['id_kuliner'] . "\" onClick=\"return confirm('yakin mau dihapus?')\">hapus</a></td>";
				echo "</tr>";
			}
		?>
		</tbody>
	</table>
</body>
</html>
		