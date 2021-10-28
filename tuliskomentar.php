<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status-loginuser'] != true){
		echo '<script>window.location="loginuser.php"</script>';

	}
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
	
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="koleksi.php">Sistem Informasi Perpustakaan</a></h1>
			
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Tulis Komentar/Ulasan mengenai Koleksi</h3>
			<p><a href="komentar.php?id=<?php echo $k->nomor_panggil_koleksi ?>">Lihat Komentar</a></p>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					
				  	<input type="text" name="username" class="input-control" placeholder="Nama Anda" required>
                    <input type="text" name="nomor_panggil_koleksi" class="input-control" value="<?php echo $k->nomor_panggil_koleksi ?>" required>
					<input type="text" name="komentar" class="input-control" placeholder="Tulis Komentar/Ulasan" required>
					<input type="submit" name="submit" value="KIRIM" class="btn">
				</form>
				
				<?php 
					if(isset($_POST['submit'])){

						
						$username = $_POST['username']; 
						$nomor_panggil_koleksi = $_POST['nomor_panggil_koleksi']; 
						$komentar = $_POST['komentar']; 
						

							$insert = mysqli_query($conn, "INSERT INTO ulasan_koleksi VALUES (
							
							NULL,
                           	'".$username."',							
							'".$nomor_panggil_koleksi."',
							'".$komentar."'
							
							
							)");
						if($insert){
							echo '<script>alert("Tulis Komentar berhasil")</script>';
							
						}	else{
							echo 'gagal',mysqli_error($conn) ;
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