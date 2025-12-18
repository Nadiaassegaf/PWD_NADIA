<?php
require_once "../config/Database.php";
require_once "../classes/Produk.php";

$db = new Database();
$conn = $db->connect();
$produk = new Produk($conn);

// ambil id dari URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$data = $produk->getById($id);

// kalau data tidak ditemukan
if (!$data) {
    echo "Data tidak ditemukan";
    exit;
}

// proses update
if (isset($_POST['update'])) {
    $updateData = [
        'nama_produk' => $_POST['nama_produk'],
        'kategori'    => $_POST['kategori'],
        'ukuran'      => $_POST['ukuran'],
        'warna'       => $_POST['warna'],
        'harga'       => $_POST['harga'],
        'stok'        => $_POST['stok'],
        'gambar'      => $_POST['gambar']
    ];

    $produk->update($id, $updateData);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>

    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>

<h2>Edit Produk</h2>

<form method="post">
    <table>
        <tr>
            <td>Nama Produk</td>
            <td><input type="text" name="nama_produk" value="<?= $data['nama_produk']; ?>" required></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><input type="text" name="kategori" value="<?= $data['kategori']; ?>" required></td>
        </tr>
        <tr>
            <td>Ukuran</td>
            <td><input type="text" name="ukuran" value="<?= $data['ukuran']; ?>" required></td>
        </tr>
        <tr>
            <td>Warna</td>
            <td><input type="text" name="warna" value="<?= $data['warna']; ?>" required></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="number" name="harga" value="<?= $data['harga']; ?>" required></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="number" name="stok" value="<?= $data['stok']; ?>" required></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td><input type="text" name="gambar" value="<?= $data['gambar']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="update">Update</button>
                <a href="index.php">Batal</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
