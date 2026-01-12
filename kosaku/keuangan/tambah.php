<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

$error = "";

if (isset($_POST['simpan'])) {
    $id_user = $_SESSION['user']['id_user'];
    $tgl = $_POST['tanggal'];
    $ket = $_POST['keterangan'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];

    $simpan = mysqli_query($conn, "INSERT INTO keuangan
        (id_user, tanggal, keterangan, jenis, jumlah)
        VALUES ('$id_user','$tgl','$ket','$jenis','$jumlah')
    ");

    if ($simpan) {
        $_SESSION['flash'] = "Data berhasil ditambahkan";
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal menambahkan data!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Keuangan</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php include "../navbar.php"; ?>

<div class="form-wrapper">
<div class="card">

<h3>Tambah Data Keuangan</h3>

<?php if ($error != "") { ?>
    <div class="alert error"><?= $error; ?></div>
<?php } ?>

<form method="POST">
    <label>Tanggal</label>
    <input type="date" name="tanggal" required>

    <label>Keterangan</label>
    <input type="text" name="keterangan" required>

    <label>Jenis</label>
    <select name="jenis" required>
        <option value="">-- Pilih --</option>
        <option value="Pemasukan">Pemasukan</option>
        <option value="Pengeluaran">Pengeluaran</option>
    </select>

    <label>Jumlah</label>
    <input type="number" name="jumlah" required>

    <button type="submit" name="simpan">Simpan</button>
</form>

</div>
</div>

</body>
</html>
