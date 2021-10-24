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
                    <li><a href="profil.php">Daftar Operator</a></li>
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
			<h3>Daftar Operator</h3>
			<div class="box">
				<p><a href="tambahoperator.php">Tambah Operator</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">Nomor</th>
							<th>Nomor Pegawai</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Nomor HP</th>
							<th>Email</th>
							<th>Alamat</th>
							<th>Gambar</th>
							<th>Status</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$operator = mysqli_query($conn, "SELECT * FROM data_operator ORDER BY nomor_pegawai DESC");
							if(mysqli_num_rows($operator) > 0) {
							while($row = mysqli_fetch_array($operator)){
						?>
						<tr>
							
						<td><?php echo $no++ ?></td>
							<td><?php echo $row['nomor_pegawai'] ?></td>	
							<td><?php echo $row['nama_pegawai'] ?></td>
							<td><?php echo $row['username'] ?></td>
							<td><?php echo $row['nomor_telepon'] ?></td>
							<td><?php echo $row['email_pegawai'] ?></td>
							<td><?php echo $row['alamat_pegawai'] ?></td>
							<td><img src="operator/<?php echo $row['foto'] ?>"width="50px"></td>
							<td><?php echo ($row['status'] == 0)? 'Tidak Aktif':'Aktif'?></td>
							<td>
								<a href="editprofil.php?id=<?php echo $row['nomor_pegawai'] ?>">Edit</a> || <a href="proseshapus.php?id=<?php echo $row['nomor_pegawai'] ?>" onclick="return confirm('Apakah ingin menghapus ?')">Hapus</a>
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