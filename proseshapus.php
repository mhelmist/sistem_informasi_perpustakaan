<?php 
	
	include 'db.php';

	if(isset($_GET['ids'])){
		$hapus = mysqli_query($conn, "DELETE FROM data_subjek WHERE nomor_subjek = '".$_GET['ids']."' ");
		echo '<script>window.location="datasubjek.php"</script>';
	}

	if(isset($_GET['idk'])){
		$koleksi = mysqli_query($conn, "SELECT gambar_koleksi FROM koleksi WHERE nomor_panggil_koleksi = '".$_GET['idk']."' ");
		$k = mysqli_fetch_object($koleksi);

		unlink('./koleksi/'.$k->gambar_koleksi);

		$hapus = mysqli_query($conn, "DELETE FROM koleksi WHERE nomor_panggil_koleksi = '".$_GET['idk']."' ");
		echo '<script>window.location="datakoleksi.php"</script>';
	}

	if(isset($_GET['id'])){
		$operator = mysqli_query($conn, "SELECT foto FROM data_operator WHERE nomor_pegawai = '".$_GET['id']."' ");
		$o = mysqli_fetch_object($operator);

		unlink('./operator/'.$o->foto);

		$hapus = mysqli_query($conn, "DELETE FROM data_operator WHERE nomor_pegawai = '".$_GET['id']."' ");
		echo '<script>window.location="profil.php"</script>';
	}

?>