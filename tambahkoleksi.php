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
			<h3>Tambah Koleksi</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="subjek" required>
						<option value="">Pilih Subjek</option>
						<?php 
							$subjek = mysqli_query($conn, "SELECT * FROM data_subjek ORDER BY nomor_subjek DESC");
							while($r = mysqli_fetch_array($subjek)) {
						?>
						<option value="<?php echo $r['nomor_subjek'] ?>"><?php echo $r['nama_subjek'] ?></option>
						<?php } ?>
					</select>
					
					<input type="text" name="nomor_panggil_koleksi" class="input-control" placeholder="Call Number" required>
					<input type="text" name="judul_koleksi" class="input-control" placeholder="Judul Koleksi" required>
					<input type="text" name="penanggungjawab" class="input-control" placeholder="Penanggungjawab Koleksi" required>
					<input type="text" name="tempat_terbit_koleksi" class="input-control" placeholder="Tempat Terbit Koleksi" required>
					<input type="text" name="penerbit_koleksi" class="input-control" placeholder="Penerbit Koleksi" required>
					<input type="text" name="isbn" class="input-control" placeholder="ISBN" required>
					<input type="text" name="jumlah_koleksi" class="input-control" placeholder="Jumlah Koleksi" required>
					<input type="file" name="gambar_koleksi" class="input-control" placeholder="Gambar Koleksi" required>
					<select class="input-control" name="status" required>
						<option value="">Pilih Status</option>
						<option value="1">TERSEDIA</option>
						<option value="0">SEDANG DIPINJAM</option>
						<option value="0">SEDANG PERAWATAN</option>
						<option value="0">AKAN DATANG</option>
					</select>
					<input type="submit" name="submit" value="Tambah" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						// print_r($_FILES['gambar_koleksi']);
						$subjek = $_POST['subjek']; 
						$nomor_panggil_koleksi = $_POST['nomor_panggil_koleksi'];
						$judul_koleksi = $_POST['judul_koleksi'];
						$penanggungjawab = $_POST['penanggungjawab'];
						$tempat_terbit_koleksi = $_POST['tempat_terbit_koleksi'];
						$penerbit_koleksi = $_POST['penerbit_koleksi'];
						$isbn = $_POST['isbn'];
						$jumlah_koleksi = $_POST['jumlah_koleksi'];
						$status = $_POST['status'];
						$filename = $_FILES['gambar_koleksi']['name'];
						$tmp_name = $_FILES['gambar_koleksi']['tmp_name'];
						$type1 = explode('.', $filename);
						$type2 = $type1[1];
						$newname = 'koleksi'.time().'.'.$type2;
						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

						if(!in_array($type2, $tipe_diizinkan)){
							echo '<script>alert("Format file tidak diizinkan")</script>';
						}else{
							move_uploaded_file($tmp_name, './koleksi/'.$newname);

							$insert = mysqli_query($conn, "INSERT INTO koleksi VALUES (
							
							'".$nomor_panggil_koleksi."',
							
							'".$subjek."',
							
							'".$judul_koleksi."',
							'".$penanggungjawab."',
							'".$tempat_terbit_koleksi."',
							'".$penerbit_koleksi."',
							'".$isbn."',
							'".$jumlah_koleksi."',
							'".$newname."',
							'".$status."',
							null
							)");
						if($insert){
							echo '<script>alert("Tambah Koleksi berhasil")</script>';
							echo '<script>window.location="datakoleksi.php"</script>';
						}	else{
							echo 'gagal',mysqli_error($conn) ;
						}
						
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