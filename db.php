<?php 

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'sistem_informasi_perpustakaan';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung ke Database');
?>