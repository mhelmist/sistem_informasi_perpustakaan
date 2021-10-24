<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status-login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
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
			<h1><a href="dashboard.php">Sistem Informasi Perpustakaan</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Profil Operator</a></li>
				<li><a href="datasubjek.php">Daftar Subjek</a></li>
				<li><a href="datakoleksi.php">Daftar Koleksi</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Tambah Data Subjek</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nomor" placeholder="Nomor Subjek" class="input-control" required>
					<input type="text" name="nama" placeholder="Nama Subjek" class="input-control" required>
					<input type="submit" name="submit" value="Tambah" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nomor = ucwords($_POST['nomor']);
						$nama = ucwords($_POST['nama']);

						$insert = mysqli_query($conn, "INSERT INTO data_subjek VALUES (
											'".$nomor."',
											'".$nama."') ");
						if($insert){
							echo '<script>alert("Tambah subjek berhasil")</script>';
							echo '<script>window.location="datasubjek.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}

					}
				?>
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