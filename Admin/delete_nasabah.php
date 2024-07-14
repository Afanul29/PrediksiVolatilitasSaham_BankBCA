<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna adalah admin
if (!isset($_SESSION['username_admin'])) {
    header('Location: ../login.php');
    exit();
}

// Ambil ID nasabah dari parameter URL
$id_nasabah = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_nasabah) {
    // Query untuk menghapus data nasabah
    $delete_query = "DELETE FROM nasabah WHERE ID_NASABAH = '$id_nasabah'";

    if (mysqli_query($koneksi, $delete_query)) {
        echo "<script>alert('Nasabah berhasil dihapus.'); window.location.href = 'user_management.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "ID nasabah tidak tersedia.";
}
?>
