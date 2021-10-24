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
			<h3>Data Subjek</h3>
			<div class="box">
				<p><a href="tambahsubjek.php">Tambah Subjek</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">Nomor Subjek</th>
							<th>Nama Subjek</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$subjek = mysqli_query($conn, "SELECT * FROM data_subjek ORDER BY nomor_subjek DESC");
							if(mysqli_num_rows($subjek) > 0){
							while($row = mysqli_fetch_array($subjek)){
						?>
						<tr>
							<td><?php echo $row['nomor_subjek'] ?></td>
							<td><?php echo $row['nama_subjek'] ?></td>
							<td>
								<a href="editsubjek.php?id=<?php echo $row['nomor_subjek'] ?>">Edit</a> || <a href="proseshapus.php?ids=<?php echo $row['nomor_subjek'] ?>" onclick="return confirm('Apakah ingin menghapus ?')">Hapus</a>
							</td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="3">Tidak ada data</td>
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