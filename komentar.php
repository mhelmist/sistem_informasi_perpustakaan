<?php 
	session_start();
    include 'db.php';
	if($_SESSION['status-login'] != true){
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
	<title>Komentar - Sistem Informasi Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
            <h1><a href="">Sistem Informasi Perpustakaan</a></h1>
                
        </div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Ulasan</h3>
			<div class="box">
				
				<p><a href="detailkoleksi.php?id=<?php echo $k->nomor_panggil_koleksi ?>">Detail Koleksi</a></p>
				<p><a href="tuliskomentar.php?id=<?php echo $k->nomor_panggil_koleksi ?>">Tulis Komentar</a></p>
				
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">Nomor</th>
							<th>Username</th>
							<th>Komentar</th>
						</tr>
					</thead>
					<tbody>
					<?php
							$no = 1;
							$komentar = mysqli_query($conn, "SELECT * FROM ulasan_koleksi WHERE nomor_panggil_koleksi = '".$_GET['id']."' " );
							if(mysqli_num_rows($komentar) > 0){
							while($row = mysqli_fetch_object($komentar)){
						?>
						<tr>
                        <td><?php echo $no++ ?></td>
							<td><?php echo $row->username ?> </td>	
							<td><?php echo $row->komentar ?></td>
							
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="3">Tidak ada Komentar</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
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