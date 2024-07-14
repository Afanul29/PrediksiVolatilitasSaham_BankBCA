<?php
// Koneksi ke database
include 'koneksi.php';

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $tanggal = $_POST['tanggal'];
    $harga_penutup = $_POST['harga_penutup'];
    $harga_pembuka = $_POST['harga_pembuka'];
    $harga_tertinggi = $_POST['harga_tertinggi'];
    $harga_terendah = $_POST['harga_terendah'];
    $volume = $_POST['volume'];

    // Query untuk menyimpan data saham ke dalam tabel
    $query = "INSERT INTO saham (TANGGAL, HARGA_PENUTUP, HARGA_PEMBUKA, HARGA_TERTINGGI, HARGA_TERENDAH, VOLUME) 
              VALUES ('$tanggal', '$harga_penutup', '$harga_pembuka', '$harga_tertinggi', '$harga_terendah', '$volume')";

    if (mysqli_query($koneksi, $query)) {
        $message = "Data saham berhasil ditambahkan.";
    } else {
        $message = "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);

    // Redirect kembali ke halaman tambah saham dengan notifikasi
    header("Location: saham_management.php?message=" . urlencode($message));
    exit;
}
?>
