<?php
include 'koneksi.php';
include 'header.php';
?>

<div class="card border p-4">
    <h5 class="mb-4">Riwayat Transaksi</h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Tipe</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM transaksi");
                while ($row = mysqli_fetch_assoc($data)): ?>
                    <tr>
                        <td><?= $row['tanggal']; ?></td>
                        <td><?= $row['kategori']; ?></td>
                        <td><?= $row['tipe']; ?></td>
                        <td>Rp <?= $row['nominal']; ?>
                        </td>
                        <td>
                            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Aselina dihapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>