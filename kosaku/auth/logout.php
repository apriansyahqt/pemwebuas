<?php
session_start();

/* HAPUS SEMUA DATA LOGIN */
session_unset();
session_destroy();

/* BUAT SESSION BARU UNTUK FLASH */
session_start();
$_SESSION['flash'] = "Berhasil logout";

/* REDIRECT KE LANDING */
header("Location: /LatihanWEB/kosaku/index.php");
exit;
