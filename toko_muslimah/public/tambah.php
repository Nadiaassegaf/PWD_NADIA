<?php
require_once "../config/Database.php";
require_once "../classes/Produk.php";

$db = new Database();
$conn = $db->connect();
$produk = new Produk($conn);

// PROSES SIMPAN
if (isset($_POST['simpan'])) {
    $data = [
        'nama_produk' => $_POST['nama_produk'],
        'kategori'    => $_POST['kategori'],
        'ukuran'      => $_POST['ukuran'],
        'warna'       => $_POST['warna'],
        'harga'       => $_POST['harga'],
        'stok'        => $_POST['stok'],
        'gambar'      => $_POST['gambar'] // sementara TEXT
    ];

    $produk->tambah($data);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>

    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>

<h2>Tambah Produk</h2>

<form method="post">
    <table>
        <tr>
            <td>Nama Produk</td>
            <td><input type="text" name="nama_produk" required></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><input type="text" name="kategori" required></td>
        </tr>
        <tr>
            <td>Ukuran</td>
            <td><input type="text" name="ukuran" required></td>
        </tr>
        <tr>
            <td>Warna</td>
            <td><input type="text" name="warna" required></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="number" name="harga" required></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="number" name="stok" required></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td><input type="text" name="gambar" placeholder="nama_file.jpg"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="simpan">Simpan</button>
                <a href="index.php">Kembali</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
