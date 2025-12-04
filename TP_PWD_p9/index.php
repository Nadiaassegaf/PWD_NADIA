<?php
require_once "Produk.php";
$produk = new Produk();
$dataProduk = $produk->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Baju Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="title">Toko Baju Online</h1>

<div class="container">
    <?php foreach ($dataProduk as $p): ?>
        <div class="card">
            <img src="images/<?php echo $p['gambar']; ?>" alt="gambar produk">
            <h2><?php echo $p['nama_produk']; ?></h2>
            <p class="kategori"><?php echo $p['kategori']; ?></p>
            <p class="harga">Rp <?php echo number_format($p['harga'],0,',','.'); ?></p>
            <button>Beli Sekarang</button>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
