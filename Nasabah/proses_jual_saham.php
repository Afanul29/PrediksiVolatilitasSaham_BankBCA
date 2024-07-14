<?php
include 'koneksi.php';
session_start();

// Pastikan user sudah login
if (!isset($_SESSION['username_nasabah'])) {
    header('Location: ../login.php');
    exit;
}

$username_nasabah = $_SESSION['username_nasabah'];

// Ambil ID nasabah dari username
$query_nasabah = "SELECT ID_NASABAH, SALDO FROM nasabah WHERE USERNAME_NASABAH = '$username_nasabah'";
$result_nasabah = mysqli_query($koneksi, $query_nasabah);
$data_nasabah = mysqli_fetch_assoc($result_nasabah);

$id_nasabah = $data_nasabah['ID_NASABAH'];
$saldo_nasabah = $data_nasabah['SALDO'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $jumlah_jual_lot = $_POST['jumlah_jual_lot'];

    // Ambil data transaksi yang dipilih
    $query_transaksi = "SELECT * FROM history_transaksi WHERE ID_TRANSAKSI = '$id_transaksi' AND ID_NASABAH = '$id_nasabah'";
    $result_transaksi = mysqli_query($koneksi, $query_transaksi);
    $data_transaksi = mysqli_fetch_assoc($result_transaksi);

    if ($data_transaksi) {
        $id_saham = $data_transaksi['ID_SAHAM'];
        $jumlah_beli_saham = $data_transaksi['JUMLAH_BELI_SAHAM'];
        $harga_total = $data_transaksi['HARGA_TOTAL'];
        $harga_per_lot = $harga_total / $jumlah_beli_saham;

        if ($jumlah_jual_lot <= $jumlah_beli_saham) {
            $harga_jual_total = $jumlah_jual_lot * $harga_per_lot;

            // Perbarui saldo nasabah
            $saldo_baru = $saldo_nasabah + $harga_jual_total;
            $query_update_saldo = "UPDATE nasabah SET SALDO = '$saldo_baru' WHERE ID_NASABAH = '$id_nasabah'";
            mysqli_query($koneksi, $query_update_saldo);

            // Hapus atau perbarui data transaksi
            if ($jumlah_jual_lot == $jumlah_beli_saham) {
                $query_delete_transaksi = "DELETE FROM history_transaksi WHERE ID_TRANSAKSI = '$id_transaksi'";
                mysqli_query($koneksi, $query_delete_transaksi);
            } else {
                $jumlah_beli_saham_baru = $jumlah_beli_saham - $jumlah_jual_lot;
                $harga_total_baru = $jumlah_beli_saham_baru * $harga_per_lot;
                $query_update_transaksi = "UPDATE history_transaksi SET JUMLAH_BELI_SAHAM = '$jumlah_beli_saham_baru', HARGA_TOTAL = '$harga_total_baru' WHERE ID_TRANSAKSI = '$id_transaksi'";
                mysqli_query($koneksi, $query_update_transaksi);
            }

            echo "Penjualan saham berhasil.";
            header('Location: transaksi_history.php');
            exit;
        } else {
            echo "Jumlah lot yang dijual melebihi jumlah yang dimiliki.";
        }
    } else {
        echo "Data transaksi tidak ditemukan.";
    }
}
?>
