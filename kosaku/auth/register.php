<?php
include "../config/koneksi.php";


$msg = "";
if(isset($_POST['daftar'])){
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $pass  = md5($_POST['password']);

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($cek) > 0){
        $msg = "Email sudah terdaftar!";
    } else {
        mysqli_query($conn, "INSERT INTO users (nama,email,password) VALUES ('$nama','$email','$pass')");
        header("Location: login.php?msg=Register berhasil! Silakan login.");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register KoSaku</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container form-card">
<h2>Register KoSaku</h2>

<?php if($msg != ""){ ?>
<div class="alert error"><?= $msg; ?></div>
<?php } ?>

<form method="POST">
    <input type="text" name="nama" placeholder="Nama Lengkap" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="daftar">Daftar</button>
</form>

<p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>

</body>
</html>
