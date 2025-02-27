<?php
include 'connect.php';
session_start();

// Cek login admin
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// Ambil data produk dari database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Daftar Produk</h1>
    <a href="tambah_produk.php">Tambah Produk</a>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['name']; ?></td>
            <td>Rp <?= number_format($row['price'], 0, ',', '.'); ?></td>
            <td>
                <a href="edit_produk.php?id=<?= $row['id']; ?>">Edit</a>
                <a href="hapus_produk.php?id=<?= $row['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>