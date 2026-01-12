<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

$id = $_GET['id'] ?? null;
$error = "";

if (!$id) {
    header("Location: index.php");
    exit;
}

$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM keuangan WHERE id_keuangan='$id'")
);

if (!$data) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])) {
    $update = mysqli_query($conn, "UPDATE keuangan SET
        tanggal='$_POST[tanggal]',
        keterangan='$_POST[keterangan]',
        jenis='$_POST[jenis]',
        jumlah='$_POST[jumlah]'
        WHERE id_keuangan='$id'
    ");

    if ($update) {
        $_SESSION['flash'] = "Data berhasil diupdate";
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal mengupdate data!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Keuangan | KoSaku</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php include "../navbar.php"; ?>

<div class="form-wrapper">
  <div class="card">
    <h3>Edit Data Keuangan</h3>

    <?php if ($error != "") { ?>
        <div class="alert error"><?= $error ?></div>
    <?php } ?>

    <form method="POST">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required>

        <label>Keterangan</label>
        <input type="text" name="keterangan" value="<?= $data['keterangan']; ?>" required>

        <label>Jenis</label>
        <select name="jenis" required>
            <option value="Pemasukan"
                <?= $data['jenis']=="Pemasukan" ? "selected" : ""; ?>>
                Pemasukan
            </option>
            <option value="Pengeluaran"
                <?= $data['jenis']=="Pengeluaran" ? "selected" : ""; ?>>
                Pengeluaran
            </option>
        </select>

        <label>Jumlah</label>
        <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" required>

        <button type="submit" name="update">Update Data</button>
    </form>
  </div>
</div>

<?php include "../footer.php"; ?>
<script src="../assets/js/script.js"></script>
</body>
</html>
