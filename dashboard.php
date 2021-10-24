<?php 
	session_start();
	if($_SESSION['status-login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
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
            <h1><a href="">Sistem Informasi Perpustakaan</a></h1>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="profil.php">Profil Operator</a></li>
					<li><a href="tambahoperator.php">Tambah Operator</a></li>
                    <li><a href="datasubjek.php">Daftar Subjek</a></li>
                    <li><a href="datakoleksi.php">Daftar Koleksi</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
        </div>
    </header>

    <!-- konten -->
    <div class="section">    
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['p-global']->nama_pegawai ?></h4>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2021</small>
        </div>
    </footer>
    </body>
</html>