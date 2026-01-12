<?php
include 'koneksi.php';
include 'header.php';

if (isset($_POST['simpan'])) {
    $tgl = $_POST['tanggal'];
    $kat = $_POST['kategori'];
    $tipe = $_POST['tipe'];
    $nom = $_POST['nominal'];
    $ket = $_POST['keterangan'];

    $query = "INSERT INTO transaksi (tanggal, kategori, tipe, nominal, keterangan) VALUES ('$tgl', '$kat', '$tipe', '$nom', '$ket')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>window.location='index.php';</script>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border p-4">
            <h4>Tambah Catatan Baru</h4>
            <form method="POST">
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option>Makanan & Minuman</option>
                        <option>Kiriman Ortu</option>
                        <option>Kebutuhan Kuliah</option>
                        <option>Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Tipe</label><br>
                    <input type="radio" name="tipe" value="Pemasukan" required> Pemasukan
                    <input type="radio" name="tipe" value="Pengeluaran" class="ms-3"> Pengeluaran
                </div>
                <div class="mb-3">
                    <label>Nominal (Rp)</label>
                    <input type="number" name="nominal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Keterangan</label>
                    <input name="keterangan" class="form-control">
                </div>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan Catatan</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>