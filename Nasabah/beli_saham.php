<?php
include 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username_nasabah = $_SESSION['username_nasabah'];
    $jumlah_beli_lot = $_POST['jumlah_beli_lot'];

    // Ambil ID dan saldo nasabah dari tabel nasabah berdasarkan username
    $query_nasabah = "SELECT ID_NASABAH, SALDO FROM nasabah WHERE USERNAME_NASABAH = '$username_nasabah'";
    $result_nasabah = mysqli_query($koneksi, $query_nasabah);
    $data_nasabah = mysqli_fetch_assoc($result_nasabah);

    $id_nasabah = $data_nasabah['ID_NASABAH'];
    $saldo_nasabah = $data_nasabah['SALDO'];

    // Ambil data saham terakhir dari tabel saham
    $query_saham = "SELECT * FROM saham ORDER BY ID_SAHAM DESC LIMIT 1";
    $result_saham = mysqli_query($koneksi, $query_saham);
    $data_saham = mysqli_fetch_assoc($result_saham);

    $id_saham = $data_saham['ID_SAHAM'];
    $harga_pembuka = $data_saham['HARGA_PEMBUKA'];
    $total_harga = $jumlah_beli_lot * $harga_pembuka;

    // Periksa apakah saldo nasabah cukup untuk melakukan pembelian
    if ($saldo_nasabah >= $total_harga) {
        // Kurangi saldo nasabah
        $saldo_baru = $saldo_nasabah - $total_harga;
        $query_update_saldo = "UPDATE nasabah SET SALDO = '$saldo_baru' WHERE ID_NASABAH = '$id_nasabah'";
        mysqli_query($koneksi, $query_update_saldo);

        // Simpan transaksi ke tabel history_transaksi
        $tanggal_transaksi = date('Y-m-d');
        $query_insert_transaksi = "INSERT INTO history_transaksi (ID_NASABAH, ID_SAHAM, TANGGAL_TRANSAKSI, JUMLAH_BELI_SAHAM, HARGA_TOTAL) VALUES ('$id_nasabah', '$id_saham', '$tanggal_transaksi', '$jumlah_beli_lot', '$total_harga')";
        if (mysqli_query($koneksi, $query_insert_transaksi)) {
            $_SESSION['pesan_sukses'] = "Pembelian saham berhasil.";
            header('Location: transaksi_history.php');
            exit;
        } else {
            echo "Error: " . $query_insert_transaksi . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Saldo tidak cukup untuk melakukan pembelian.";
    }
}
?>
