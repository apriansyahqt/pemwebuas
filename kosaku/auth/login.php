<?php
session_start();
include "../config/koneksi.php";

/* AMBIL FLASH MESSAGE */
$flash = "";
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

$msg = "";

/* PROSES LOGIN */
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = md5($_POST['password']);

    $cek = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE email='$email' AND password='$pass'"
    );

    if (mysqli_num_rows($cek) > 0) {
        $_SESSION['user'] = mysqli_fetch_assoc($cek);

        /* PESAN LOGIN BERHASIL */
        $_SESSION['flash'] = "Login berhasil, selamat datang ";

        header("Location: ../home.php");
        exit;
    } else {
        $msg = "Email atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login KoSaku</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php if ($flash != "") { ?>
<div class="alert success" id="alertBox">
    <?= $flash; ?>
</div>
<?php } ?>

<div class="form-card">
<h2>Login KoSaku</h2>

<?php if ($msg != "") { ?>
<div class="alert error"><?= $msg; ?></div>
<?php } ?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>

<p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</div>

<script>
setTimeout(() => {
  const alert = document.getElementById("alertBox");
  if(alert) alert.style.display = "none";
}, 3000);
</script>

</body>
</html>
