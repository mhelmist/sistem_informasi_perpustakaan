<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status-login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
	$operator = mysqli_query($conn, "SELECT * FROM data_operator WHERE nomor_pegawai = '".$_GET['id']."' ");
	if(mysqli_num_rows($operator) == 0){
		echo '<script>window.location="profil.php"</script>';
	}
	$o = mysqli_fetch_object($operator);
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
			<h1><a href="dashboard.php">Sistem Informasi Perpustakaan</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Daftar Operator</a></li>
				<li><a href="datasubjek.php">Daftar Subjek</a></li>
				<li><a href="datakoleksi.php">Daftar Koleksi</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Ubah Profil</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
										
					<input type="text" name="nama" class="input-control" placeholder="Nama Lengkap" value="<?php echo $o->nama_pegawai?>" required>
					<input type="text" name="user" class="input-control" placeholder="Username" value="<?php echo $o->username?>" required>
					<input type="text" name="hp" class="input-control" placeholder="Nomor HP" value="<?php echo $o->nomor_telepon?>"  required>
					<input type="text" name="email" class="input-control" placeholder="Alamat Email" value="<?php echo $o->email_pegawai?>" required>
					<input type="text" name="alamat" class="input-control" placeholder="Alamat Domisili" value="<?php echo $o->alamat_pegawai?>" required>
					
					
					
					<img src="operator/<?php echo $o->foto ?>" width="100px">
					<input type="hidden" name="foto" value="<?php echo $o->foto ?>">
					<input type="file" name="foto" class="input-control" placeholder="Foto Wajah" value="<?php echo $o->foto?>">
					<select class="input-control" name="status" required>
						<option value="">Pilih Status</option>
						<option value="1" <?php echo ($o->status == 1)? 'selected':''; ?>>AKTIF</option>
						<option value="0" <?php echo ($o->status == 0)? 'selected':''; ?>>TIDAK AKTIF</option>
						
					</select>
					<input type="submit" name="submit" value="Ubah" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nama = $_POST['nama']; 
						$username = $_POST['user'];
						$hp = $_POST['hp'];
						$email = $_POST['email'];
						$alamat = $_POST['alamat'];
						
						
						$status = $_POST['status'];
						$foto = $_POST['foto'];
						
						$filename = $_FILES['foto']['name'];
						$tmp_name = $_FILES['foto']['tmp_name'];
						$type1 = explode('.', $filename);
						$type2 = $type1[1];
						$newname = 'operator'.time().'.'.$type2;

						if($filename != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'operator'.time().'.'.$type2;

						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

						if(!in_array($type2, $tipe_diizinkan)){
							// jika format file tidak ada di dalam tipe diizinkan
							echo '<script>alert("Format file tidak diizinkan")</script>';

						}else{
							unlink('./operator/'.$foto);
							move_uploaded_file($tmp_name, './operator/'.$newname);
							$namagambar = $newname;
						}
					}else{
							
							$namagambar = $foto;
							
						}
						
						$update = mysqli_query($conn, "UPDATE data_operator SET 
												nama_pegawai = '".$nama."',
												username = '".$username."',
												nomor_telepon = '".$hp."',
												email_pegawai = '".$email."',
												alamat_pegawai = '".$alamat."',
												
												foto = '".$namagambar."',
												status = '".$status."'
												WHERE nomor_pegawai = '".$o->nomor_pegawai."'");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="editprofil.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}
					
					}
					
				?>
			</div>
            <h3>Ubah Password</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
					<input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
					<input type="submit" name="ubah_password" value="Ubah Password" class="btn">
				</form>
				<?php 
					if(isset($_POST['ubah_password'])){

						$pass1 	= $_POST['pass1'];
						$pass2 	= $_POST['pass2'];

						if($pass2 != $pass1){
							echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
						}else{

							$u_pass = mysqli_query($conn, "UPDATE data_operator SET 
										password = '".MD5($pass1)."'
										WHERE nomor_pegawai = '".$o->nomor_pegawai."' ");
							if($u_pass){
								echo '<script>alert("Ubah data berhasil")</script>';
								echo '<script>window.location="editprofil.php"</script>';
							}else{
								echo 'gagal '.mysqli_error($conn);
							}
						}

					}
				?>
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