<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

$id = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM keuangan WHERE id_keuangan='$id'");

if ($hapus) {
    $_SESSION['flash'] = "Data berhasil dihapus";
} else {
    $_SESSION['flash'] = "Gagal menghapus data!";
}

header("Location: index.php");
exit;
