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
			<h3>Tambah Operator</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					
                    <input type="text" name="nomorpegawai" placeholder="Nomor Pegawai" class="input-control" value="" required>
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value=""required>
					<input type="text" name="user" placeholder="Username" class="input-control" value="" required>
                    <input type="password" name="pass" placeholder="Password" class="input-control" value="" required>
					<input type="text" name="hp" placeholder="No Hp" class="input-control" value="" required>
					<input type="email" name="email" placeholder="Email" class="input-control" value="" required>
					<input type="text" name="alamat" placeholder="Alamat" class="input-control" value="" required>
					<input type="file" name="foto" class="input-control" placeholder="Foto Wajah" required>
					<select class="input-control" name="status" required>
						<option value="">Pilih Status</option>
						<option value="1">AKTIF</option>
						<option value="0">TIDAK AKTIF</option>
						
					</select>
					
					<input type="submit" name="submit" value="Tambah" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nomor_pegawai 	= ucwords($_POST['nomorpegawai']);
                        $nama 	= ucwords($_POST['nama']);
						$user 	= $_POST['user'];
                        $pass 	= $_POST['pass'];
						$hp 	= $_POST['hp'];
						$email 	= $_POST['email'];
						$alamat = ucwords($_POST['alamat']);
						$status = $_POST['status'];
						$filename = $_FILES['foto']['name'];
						$tmp_name = $_FILES['foto']['tmp_name'];
						$type1 = explode('.', $filename);
						$type2 = $type1[1];
						$newname = 'operator'.time().'.'.$type2;
						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

						if(!in_array($type2, $tipe_diizinkan)){
							echo '<script>alert("Format file tidak diizinkan")</script>';
						}else{
							move_uploaded_file($tmp_name, './operator/'.$newname);
						

							$insert = mysqli_query($conn, "INSERT INTO data_operator VALUES (
							
							'".$nomor_pegawai."',
							'".$nama."',
							'".$user."',
							'".MD5($pass)."',
							'".$hp."',
							'".$email."',
							'".$alamat."',
							'".$newname."',
							'".$status."'
							
							)");
						if($insert){
							echo '<script>alert("Tambah Operator berhasil")</script>';
							echo '<script>window.location="profil.php"</script>';
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