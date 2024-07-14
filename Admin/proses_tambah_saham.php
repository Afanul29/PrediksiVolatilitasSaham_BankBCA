<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $harga_penutup = $_POST['harga_penutup'];
    $harga_pembuka = $_POST['harga_pembuka'];
    $harga_tertinggi = $_POST['harga_tertinggi'];
    $harga_terendah = $_POST['harga_terendah'];
    $volume = $_POST['volume'];
    $perubahan = $_POST['perubahan'];

    // Query untuk memasukkan data saham baru
    $query = "INSERT INTO saham (TANGGAL, HARGA_PENUTUP, HARGA_PEMBUKA, HARGA_TERTINGGI, HARGA_TERENDAH, VOLUME, PERUBAHAN) 
              VALUES ('$tanggal', '$harga_penutup', '$harga_pembuka', '$harga_tertinggi', '$harga_terendah', '$volume', '$perubahan')";

    if (mysqli_query($koneksi, $query)) {
        echo "Data saham berhasil ditambahkan.";
        header('Location: saham_management.php'); // Mengarahkan ke halaman transaksi history setelah sukses
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>
