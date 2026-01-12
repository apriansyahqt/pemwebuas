<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* AMBIL FLASH */
$flash = "";
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']); // ← INI KUNCI
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>KoSaku | Pengelola Keuangan Mahasiswa Kos</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php if ($flash != ""): ?>
<div class="alert success" id="alertBox">
    <?= $flash ?>
</div>
<?php endif; ?>

<div class="landing">
    <div class="overlay">
        <div class="content">
            <h1>KoSaku </h1>
            <p>Aplikasi Pengelola Keuangan Mahasiswa Kos</p>
            <div class="btn-group">
                <a href="auth/login.php"><button class="btn-login">Login</button></a>
                <a href="auth/register.php"><button class="btn-register">Register</button></a>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/alert.js"></script>
</body>
</html>
