<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['level'] != 1) {
    echo "Akses ditolak";
    exit;
}
?>

<h2>Halaman B (User)</h2>
<p>Halo, <?= $_SESSION['username']; ?></p>

<a href="logout.php">Logout</a>
