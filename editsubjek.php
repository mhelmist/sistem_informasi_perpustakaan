<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status-login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$subjek = mysqli_query($conn, "SELECT * FROM data_subjek WHERE nomor_subjek = '".$_GET['id']."' ");
	if(mysqli_num_rows($subjek) == 0){
		echo '<script>window.location="datasubjek.php"</script>';
	}
	$s = mysqli_fetch_object($subjek);
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
				<li><a href="logout.php">logout</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Edit Data Subjek</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Subjek" class="input-control" value="<?php echo $s->nama_subjek ?>" required>
					<input type="submit" name="submit" value="Edit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nama = ucwords($_POST['nama']);

						$update = mysqli_query($conn, "UPDATE data_subjek SET 
												nama_subjek = '".$nama."'
												WHERE nomor_subjek = '".$s->nomor_subjek."' ");

						if($update){
							echo '<script>alert("Edit data berhasil")</script>';
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