<?php
require_once "../config/Database.php";
require_once "../classes/Produk.php";

$db = new Database();
$conn = $db->connect();

$produk = new Produk($conn);
$data = $produk->getAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>

    <link rel="stylesheet" href="../asset/style.css">
    <script src="../asset/script.js"></script>
</head>
<body>

<h2>Data Produk</h2>

<a href="tambah.php">Tambah Produk</a>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($data)) : ?>
        <?php foreach ($data as $row) : ?>
        <tr>
            <td><?= $row['nama_produk']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td><?= $row['stok']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id_produk']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row['id_produk']; ?>"
                   onclick="return confirm('Yakin hapus data?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="4">Data belum ada</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
