<?php
session_start();
include "../config/koneksi.php";

/* CEK LOGIN */
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

/* FLASH MESSAGE */
$flash = "";
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

/* DATA KEUANGAN */
$id_user = $_SESSION['user']['id_user'];
$query = mysqli_query(
    $conn,
    "SELECT * FROM keuangan 
     WHERE id_user='$id_user' 
     ORDER BY tanggal DESC"
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<title>Dashboard Keuangan | KoSaku</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php include "../navbar.php"; ?>

<div class="container dashboard-card">

    <h2>Dashboard Keuangan</h2>

    <!-- FLASH MESSAGE -->
    <?php if ($flash != "") { ?>
        <div class="alert success" id="alertBox">
            <?= $flash; ?>
        </div>
    <?php } ?>

    <a href="tambah.php">
        <button class="btn-add">+ Tambah Data</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (mysqli_num_rows($query) > 0): ?>
            <?php while ($data = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?= $data['tanggal']; ?></td>
                <td><?= $data['keterangan']; ?></td>
                <td><?= $data['jenis']; ?></td>
                <td>Rp <?= number_format($data['jumlah']); ?></td>
                <td>
                    <a href="edit.php?id=<?= $data['id_keuangan']; ?>" class="btn-edit">
                        Edit
                    </a>
                    <a href="hapus.php?id=<?= $data['id_keuangan']; ?>" 
                       class="btn-delete"
                       onclick="return confirm('Yakin ingin hapus data?')">
                        Hapus
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align:center;">
                    Belum ada data keuangan
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

</div>

<?php include "../footer.php"; ?>
<script src="../assets/js/script.js"></script>
</body>
</html>
