<?php
require_once "../config/Database.php";
require_once "../classes/Produk.php";

$db = new Database();
$conn = $db->connect();
$produk = new Produk($conn);

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$produk->hapus($id);

header("Location: index.php");
exit;
