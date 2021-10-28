<?php 
	session_start();
    include 'db.php';
	if($_SESSION['status-login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

    $query = mysqli_query($conn, "SELECT * FROM data_operator WHERE nomor_pegawai = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Informasi Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
	<div class="container">
            <h1><a href="">Sistem Informasi Perpustakaan</a></h1>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="profil.php">Profil Operator</a></li>
					<li><a href="tambahoperator.php">Tambah Operator</a></li>
                    <li><a href="datasubjek.php">Daftar Subjek</a></li>
                    <li><a href="datakoleksi.php">Daftar Koleksi</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
        </div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Data Koleksi</h3>
			<div class="box">
				<p><a href="tambahkoleksi.php">Tambah Koleksi</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">Nomor</th>
							<th>Subjek</th>
							<th>Call Number</th>
							<th>Judul</th>
							<th>Penanggungjawab</th>
							<th>Tempat Terbit</th>
							<th>Penerbit</th>
							<th>ISBN</th>
							<th>Jumlah</th>
							<th>Gambar</th>
							<th>Status</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$koleksi = mysqli_query($conn, "SELECT * FROM koleksi LEFT JOIN data_subjek USING (nomor_subjek) ORDER BY nomor_panggil_koleksi DESC");
							if(mysqli_num_rows($koleksi) > 0) {
							while($row = mysqli_fetch_array($koleksi)){
						?>
						<tr>
							
						<td><?php echo $no++ ?></td>
							<td><?php echo $row['nama_subjek'] ?></td>	
							<td><?php echo $row['nomor_panggil_koleksi'] ?></td>
							<td><?php echo $row['judul_koleksi'] ?></td>
							<td><?php echo $row['penanggungjawab_koleksi'] ?></td>
							<td><?php echo $row['tempat_terbit_koleksi'] ?></td>
							<td><?php echo $row['penerbit_koleksi'] ?></td>
							<td><?php echo $row['isbn'] ?></td>
							<td><?php echo $row['jumlah_koleksi'] ?></td>
							<td><img src="koleksi/<?php echo $row['gambar_koleksi'] ?>"width="50px"></td>
							<td><?php echo ($row['status_koleksi'] == 0)? 'Tidak Tersedia':'Tersedia'?></td>
							<td>
							<center>	<a href="editkoleksi.php?id=<?php echo $row['nomor_panggil_koleksi'] ?>"><img src="img/edit.png" width=25px></a>  <a href="proseshapus.php?idk=<?php echo $row['nomor_panggil_koleksi'] ?>" onclick="return confirm('Apakah ingin menghapus ?')"><img src="img/hapus.png" width=20px></a> </center>
							</td>
						</tr>
												<?php }}else{ ?>
														<tr>
															<td colspan="11">Tidak ada Koleksi</td>
														</tr>
													<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2021.</small>
		</div>
	</footer>
</body>
</html>