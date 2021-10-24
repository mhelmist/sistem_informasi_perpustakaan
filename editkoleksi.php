<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status-login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
	$koleksi = mysqli_query($conn, "SELECT * FROM koleksi WHERE nomor_panggil_koleksi = '".$_GET['id']."' ");
	if(mysqli_num_rows($koleksi) == 0){
		echo '<script>window.location="datakoleksi.php"</script>';
	}
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
			<h3>Ubah data Koleksi</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="subjek" required>
						<option value="">Pilih Subjek</option>
						<?php 
							$subjek = mysqli_query($conn, "SELECT * FROM data_subjek ORDER BY nomor_subjek DESC");
							while($r = mysqli_fetch_array($subjek)) {
						?>
						<option value="<?php echo $r['nomor_subjek'] ?>"<?php echo ($r['nomor_subjek'] == $k->nomor_subjek)? 'selected':''; ?>><?php echo $r['nama_subjek'] ?></option>
						<?php } ?>
					</select>
					
					<input type="text" name="nomor_panggil_koleksi" class="input-control" placeholder="Call Number" value="<?php echo $k->nomor_panggil_koleksi?>" required>
					<input type="text" name="judul_koleksi" class="input-control" placeholder="Judul Koleksi" value="<?php echo $k->judul_koleksi?>" required>
					<input type="text" name="penanggungjawab" class="input-control" placeholder="Penanggungjawab Koleksi" value="<?php echo $k->penanggungjawab_koleksi?>"  required>
					<input type="text" name="tempat_terbit_koleksi" class="input-control" placeholder="Tempat Terbit Koleksi" value="<?php echo $k->tempat_terbit_koleksi?>" required>
					<input type="text" name="penerbit_koleksi" class="input-control" placeholder="Penerbit Koleksi" value="<?php echo $k->penerbit_koleksi?>" required>
					<input type="text" name="isbn" class="input-control" placeholder="ISBN" value="<?php echo $k->isbn?>" required>
					<input type="text" name="jumlah_koleksi" class="input-control" placeholder="Jumlah Koleksi" value="<?php echo $k->jumlah_koleksi?>" required>
					
					<img src="koleksi/<?php echo $k->gambar_koleksi ?>" width="100px">
					<input type="hidden" name="foto" value="<?php echo $k->gambar_koleksi ?>">
					<input type="file" name="gambar_koleksi" class="input-control" placeholder="Gambar Koleksi" value="<?php echo $k->gambar_koleksi?>">
					<select class="input-control" name="status" required>
						<option value="">Pilih Status</option>
						<option value="1" <?php echo ($k->status_koleksi == 1)? 'selected':''; ?>>TERSEDIA</option>
						<option value="0" <?php echo ($k->status_koleksi == 0)? 'selected':''; ?>>SEDANG DIPINJAM</option>
						<option value="0" <?php echo ($k->status_koleksi == 0)? 'selected':''; ?>>SEDANG PERAWATAN</option>
						<option value="0" <?php echo ($k->status_koleksi == 0)? 'selected':''; ?>>AKAN DATANG</option>
					</select>
					<input type="submit" name="submit" value="Ubah" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$subjek = $_POST['subjek']; 
						$nomor_panggil_koleksi = $_POST['nomor_panggil_koleksi'];
						$judul_koleksi = $_POST['judul_koleksi'];
						$penanggungjawab = $_POST['penanggungjawab'];
						$tempat_terbit_koleksi = $_POST['tempat_terbit_koleksi'];
						$penerbit_koleksi = $_POST['penerbit_koleksi'];
						$isbn = $_POST['isbn'];
						$jumlah_koleksi = $_POST['jumlah_koleksi'];
						$status = $_POST['status'];
						$foto = $_POST['foto'];
						
						$filename = $_FILES['gambar_koleksi']['name'];
						$tmp_name = $_FILES['gambar_koleksi']['tmp_name'];
						$type1 = explode('.', $filename);
						$type2 = $type1[1];
						$newname = 'koleksi'.time().'.'.$type2;

						if($filename != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'koleksi'.time().'.'.$type2;

						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

						if(!in_array($type2, $tipe_diizinkan)){
							// jika format file tidak ada di dalam tipe diizinkan
							echo '<script>alert("Format file tidak diizinkan")</script>';

						}else{
							unlink('./koleksi/'.$foto);
							move_uploaded_file($tmp_name, './koleksi/'.$newname);
							$namagambar = $newname;
						}
					}else{
							
							$namagambar = $foto;
							
						}
						
						$update = mysqli_query($conn, "UPDATE koleksi SET 
												nomor_subjek = '".$subjek."',
												nomor_panggil_koleksi = '".$nomor_panggil_koleksi."',
												judul_koleksi= '".$judul_koleksi."',
												penanggungjawab_koleksi = '".$penanggungjawab."',
												tempat_terbit_koleksi = '".$tempat_terbit_koleksi."',
												penerbit_koleksi = '".$penerbit_koleksi."',
												isbn = '".$isbn."',
												jumlah_koleksi = '".$jumlah_koleksi."',
												gambar_koleksi = '".$namagambar."',
												status_koleksi = '".$status."'
												WHERE nomor_panggil_koleksi = '".$k->nomor_panggil_koleksi."'");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="datakoleksi.php"</script>';
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