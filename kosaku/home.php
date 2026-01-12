<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$flash = "";
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit;
}


$user = $_SESSION['user'];
 include "navbar.php"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Beranda | KoSaku</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php if ($flash != "") { ?>
<div class="alert success" id="alertBox">
    <?= $flash; ?>
</div>
<?php } ?>




<!-- HERO / WELCOME -->
<section class="hero">
    <div class="hero-text">
        <h1>Halo, <?= htmlspecialchars($user['nama']); ?> </h1>
        <p>
            Selamat datang di <b>KoSaku</b>, aplikasi pengelola keuangan
            mahasiswa kos agar pengeluaran lebih terkontrol dan rapi.
        </p>
        <a href="keuangan/index.php" class="btn-primary">
            Kelola Keuangan
        </a>
    </div>

    <div class="hero-img">
        <img src="assets/img/welcome.jpg" alt="Welcome KoSaku">
    </div>
</section>

<!-- FOOTER -->
<?php include "footer.php"; ?>

</body>
</html>
