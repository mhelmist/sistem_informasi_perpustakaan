<?php 
	
	include 'db.php';
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Anggota - Sistem Informasi Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="index.php">Sistem Informasi Perpustakaan</a></h1>
			<ul>
                    
                    <li><a href="koleksi.php">Koleksi</a></li>
                    <li><a href="login.php">Login Operator</a></li>
                    <li><a href="loginuser.php">Login Pengguna</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Daftar Anggota</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					
                    
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="" required>
					<input type="password" name="pass" placeholder="Password" class="input-control" value="" required>
					<input type="text" name="hp" placeholder="No Hp" class="input-control" value="" required>
					<input type="email" name="email" placeholder="Email" class="input-control" value="" required>
					<input type="text" name="alamat" placeholder="Alamat" class="input-control" value="" required>
					
					
					
					<input type="submit" name="submit" value="KIRIM" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						
                        $nama 	= ucwords($_POST['nama']);
						$user 	= $_POST['user'];
                        $pass 	= $_POST['pass'];
						$hp 	= $_POST['hp'];
						$email 	= $_POST['email'];
						$alamat = ucwords($_POST['alamat']);
						
						
						

							$insert = mysqli_query($conn, "INSERT INTO user VALUES (
							
							NULL,
							'".$nama."',
							'".$user."',
							'".MD5($pass)."',
							'".$hp."',
							'".$email."',
							'".$alamat."'
							
							
							
							)");
						if($insert){
							echo '<script>alert("Pendaftaran Anggota berhasil")</script>';
							echo '<script>window.location="loginuser.php"</script>';
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