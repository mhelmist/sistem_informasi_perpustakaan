<?php 
    include 'db.php';
    
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="with=device-width, initial-scale=1">
        <title>Sistem Informasi Perpustakaan</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body">
    <!-- header      -->
    <header>
        <div class="container">
            <h1><a href="index.php">Sistem Informasi Perpustakaan</a></h1>
                <ul>
                    <li><a href="koleksi.php">Koleksi</a></li>
                    <li><a href="login.php">Login Operator</a></li>
					<li><a href="loginuser.php">Login Operator</a></li>
                </ul>
        </div>
    </header>

	<!--search-->
	<div class="search">
		<div class="container">
			<form action="koleksi.php">
				<input type="text" name="search" placeholder="cari koleksi">
				<input type="submit" name="cari" value="Cari Koleksi">
			</form>
		</div>
	</div>

    <!--subjek-->
    <div class="container">
        <h3>Subjek Koleksi</h3>
        <div class="box">
                <?php 
					$subjek = mysqli_query($conn, "SELECT * FROM data_subjek ORDER BY nomor_subjek DESC");
					if(mysqli_num_rows($subjek) > 0){
						while($s = mysqli_fetch_array($subjek)){
				?>
            <a href="koleksi.php?sub=<?php echo $s['nomor_subjek']?>">
            <div class="col-5">
                <img src="img/iconsubjek1.jpg" width="50px" style="margin-bottom: 5px;">
                <p><?php echo $s['nama_subjek']?></p>
				
            </div>
			
            </a>
                <?php } }else {?>
                    <p>Tidak ada Subjek</p>
                <?php } ?>
    
        </div>
        </div>
    </div>

    <!--koleksi terbaru-->
    <div class="section">
		<div class="container">
			<h3>Koleksi Terbaru Kami...</h3>
			<div class="box">
				<?php 
					$koleksi = mysqli_query($conn, "SELECT * FROM koleksi WHERE status_koleksi = 1 ORDER BY nomor_panggil_koleksi DESC LIMIT 8");
					if(mysqli_num_rows($koleksi) > 0){
						while($k = mysqli_fetch_array($koleksi)){
				?>	
					<a href="detailkoleksi.php?id=<?php echo $k['nomor_panggil_koleksi'] ?>">
                        <div class="col-4">
							<img src="koleksi/<?php echo $k['gambar_koleksi'] ?>">
							<p class="judul"><?php echo substr ($k['judul_koleksi'], 0, 30) ?></p>
							<p class="penanggungjawab"><?php echo $k['penanggungjawab_koleksi'] ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>koleksi tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

    <!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p>Jalan Mekarjaya No. 26, Jakarta</p>

			<h4>Email</h4>
			<p>perpustakaan123@yahoo.com</p>

			<h4>Nomor Telepon</h4>
			<p>0251 - 781312</p>
			<small>Copyright &copy; 2021.</small>
		</div>
	</div>
    </body>
</html>