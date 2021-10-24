<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="with=device-width, initial-scale=1">
        <title>Login Anggota - Sistem Informasi Perpustakaan</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body id="bg-login">
        
        
        <div class="box-login">
            <h2>Login</h2>
            <form action="" method="post">
                <input type="text" name="user" placeholder="masukkan username" class="input-control">
			    <input type="password" name="pass" placeholder="masukkan password" class="input-control">
			    <input type="submit" name="kirim" value="Login" class="btn">
            </form>


        <?php 
        
        if(isset($_POST['kirim'])) {
            session_start();
            include 'db.php';

            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $cek = mysqli_query($conn, "SELECT * FROM user ORDER BY username = '".$user."' AND password = '".MD5($pass)."'");
            
            if(mysqli_num_rows($cek) > 0){
            $d = mysqli_fetch_object($cek);
            $_SESSION['status-login'] = true;
            $_SESSION['p-global'] = $d;
            $_SESSION['id'] = $d->username;
                echo '<script>window.location="koleksi.php"</script>';}
            else{echo '<script>alert("username atau password Anda salah!")</script>';}
        }
            
            
            
        ?>
            
        </div>
    </body>
</html>