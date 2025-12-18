<?php
session_start();

require "../config/Database.php";
require "../classes/User.php";

$db = new Database();
$conn = $db->connect();

$user = new User($conn);

$username = $_POST['username'];
$password = $_POST['password'];

$data = $user->login($username, $password);

if ($data) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];

    if ($data['level'] == 0) {
        header("Location: halamanA.php");
    } else {
        header("Location: halamanB.php");
    }
} else {
    echo "Login gagal";
}
