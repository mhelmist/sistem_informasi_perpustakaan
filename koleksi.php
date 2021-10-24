<?php 
	error_reporting(0);
	include 'db.php';
	
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
				<li><a href="koleksi.php">Koleksi</a></li>
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

	<!-- koleksi -->
	<div class="section">
		<div class="container">
			<h3>Koleksi Perpustakaan Siap Pakai</h3>
			<div class="box">
				<?php 
					if($_GET['search'] != '' || $_GET['sub'] != ''){
						$where = "AND judul_koleksi LIKE '%".$_GET['search']."%' AND nomor_subjek LIKE '%".$_GET['sub']."%' ";
					}

					$koleksi = mysqli_query($conn, "SELECT * FROM koleksi WHERE status_koleksi = 1 $where ORDER BY nomor_panggil_koleksi DESC");
					if(mysqli_num_rows($koleksi) > 0){
						while($k = mysqli_fetch_array($koleksi)){
				?>	
					<a href="detailkoleksi.php?id=<?php echo $k['nomor_panggil_koleksi'] ?>">
						<div class="col-4">
							<img src="koleksi/<?php echo $k['gambar_koleksi'] ?>">
							<p class="judul"><?php echo substr($k['judul_koleksi'], 0, 30) ?></p>
							<p class="penanggungjawab"><?php echo $k['penanggungjawab_koleksi'] ?></p>
						</div>
					</a>
				<?php } }else{ ?>
					<p>Tidak ada koleksi</p>
				<?php } ?>
			</div>
			<h3>Koleksi lainnya</h3>
			<div class="box">
				<?php 
					if($_GET['search'] != '' || $_GET['sub'] != ''){
						$where = "AND judul_koleksi LIKE '%".$_GET['search']."%' AND nomor_subjek LIKE '%".$_GET['sub']."%' ";
					}

					$koleksi = mysqli_query($conn, "SELECT * FROM koleksi WHERE status_koleksi = 0 $where ORDER BY nomor_panggil_koleksi DESC");
					if(mysqli_num_rows($koleksi) > 0){
						while($k = mysqli_fetch_array($koleksi)){
				?>	
					<a href="detailkoleksi.php?id=<?php echo $k['nomor_panggil_koleksi'] ?>">
						<div class="col-4">
							<img src="koleksi/<?php echo $k['gambar_koleksi'] ?>">
							<p class="judul"><?php echo substr($k['judul_koleksi'], 0, 30) ?></p>
							<p class="penanggungjawab"><?php echo $k['penanggungjawab_koleksi'] ?></p>
						</div>
					</a>
				<?php } }else{ ?>
					<p>Tidak ada koleksi</p>
				<?php } ?>
			</div>
			
		</div>
	</div>

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p>Jalan Mekarjaya No. 26, jakarta</p>

			<h4>Email</h4>
			<p>perpustakaan123@yahoo.com</p>

			<h4>Nomor Telepon</h4>
			<p>0251 - 781312</p>
			<small>Copyright &copy; 2021.</small>
		</div>
	</div>
</body>
</html>