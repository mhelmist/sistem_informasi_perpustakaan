<?php 
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT nomor_telepon, email_pegawai, alamat_pegawai FROM data_operator WHERE nomor_pegawai = 198723");
	$o = mysqli_fetch_object($kontak);

	$koleksi = mysqli_query($conn, "SELECT * FROM koleksi WHERE nomor_panggil_koleksi = '".$_GET['id']."' ");
	$k = mysqli_fetch_object($koleksi);
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
			<h1><a href="index.php">Sistem Informasi Perpustakaan</a></h1>
			<ul>
				<li><a href="koleksi.php">Koleksi Perpustakaan</a></li>
			</ul>
		</div>
	</header>

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="koleksi.php">
				<input type="text" name="search" placeholder="Cari Koleksi" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="sub" value="<?php echo $_GET['sub'] ?>">
				<input type="submit" name="cari" value="Cari Koleksi">
			</form>
		</div>
	</div>

	<!-- detail koleksi -->
	<div class="section">
		<div class="container">
			<h3>Tentang Koleksi</h3>
			<div class="box">
				<div class="col-2">
					<img src="koleksi/<?php echo $k->gambar_koleksi ?>" width="100%">
				</div>
				<div class="col-2">
					<h3><?php echo $k->judul_koleksi ?></h3>
					<h4><?php echo $k->penanggungjawab_koleksi ?></h4>
					<p>Call Number : <?php echo $k->nomor_panggil_koleksi ?></p>
					
					<p>Tempat Terbit : <?php echo $k->tempat_terbit_koleksi ?></p>
					<p>Penerbit : <?php echo $k->penerbit_koleksi ?></p>
					<p>ISBN : <?php echo $k->isbn ?></p>
					<p>Jumlah Ketersediaan : <?php echo $k->jumlah_koleksi ?></p>

                    <h4><a href="komentar.php?id=<?php echo $k->nomor_panggil_koleksi ?>">Lihat Komentar</a></h4>
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<div class="footer">
	<div class="container">
			<h4>Alamat</h4>
			<p><?php echo $o->alamat_pegawai ?></p>

			<h4>Email</h4>
			<p><?php echo $o->email_pegawai ?></p>

			<h4>No. Hp</h4>
			<p><?php echo $o->nomor_telepon ?></p>
			<small>Copyright &copy; 2021.</small>
		</div>
	</div>
</body>
</html>