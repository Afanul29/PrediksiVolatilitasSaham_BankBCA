<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_saham = $_GET['id'];

    // Query untuk menghapus data saham
    $query = "DELETE FROM saham WHERE ID_SAHAM = '$id_saham'";

    if (mysqli_query($koneksi, $query)) {
        echo "Data saham berhasil dihapus.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
    header('Location: saham_management.php'); // Mengarahkan kembali ke halaman daftar saham setelah penghapusan
    exit;
} else {
    echo "ID Saham tidak ditemukan.";
}
?>
