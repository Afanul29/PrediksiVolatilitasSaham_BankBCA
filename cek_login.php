<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($role == 'nasabah') {
        $query = "SELECT * FROM nasabah WHERE USERNAME_NASABAH='$username' AND PASSWORD_NASABAH='$password'";
        $result = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id_nasabah'] = $row['ID_NASABAH'];
            $_SESSION['username_nasabah'] = $row['USERNAME_NASABAH'];
            header("Location: Nasabah/index.php");
            exit;
        } else {
            $message = "Username atau password salah.";
        }
    } elseif ($role == 'admin') {
        $query = "SELECT * FROM admin WHERE USERNAME_ADMIN='$username' AND PASSWORD_ADMIN='$password'";
        $result = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id_admin'] = $row['ID_ADMIN'];
            $_SESSION['username_admin'] = $row['USERNAME_ADMIN'];
            header("Location: Admin/index.php");
            exit;
        } else {
            $message = "Username atau password salah.";
        }
    }
}
?>
