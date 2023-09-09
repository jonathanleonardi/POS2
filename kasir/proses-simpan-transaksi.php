<?php
include('library/koneksi.php');
session_start();

// SESSION NAMA
$kode_user_session =  $_SESSION['kode_user'];

// SIMPAN TABLE TRANSAKSI
$tanggal_skrg = date("Y-m-d");

$no_transaksi = $_POST['no_transaksi'];
$tanggal = $tanggal_skrg;
$kode_user = $kode_user_session;
$grand_total = $_POST['grand_total'];

$query = "INSERT INTO transaksi (no_transaksi, tanggal, kode_user, grand_total) VALUES ('$no_transaksi','$tanggal','$kode_user','$grand_total)";
$input = mysqli_query($conn, $query);

if ($input) {
    // Menampilkan Data Transaksi Tmp
    $sql = "SELECT transaksi_tmp.id, transaksi_tmp.kode_barang, barang.nama_barang, transaksi_tmp.harga_beli, transaksi_tmp.harga_jual, transaksi_tmp.jumlah, transaksi_tmp.subtotal, transaksi_tmp.kode_user, user.nama FROM transaksi_tmp
    LEFT JOIN barang ON transaksi_tmp.kode_barang = barang.kode_barang
    LEFT JOIN user ON transaksi_tmp.kode_user = user.kode_user";

    $query = mysqli_query($conn, $sql);
    while ($result = mysqli_fetch_array($query)) {
        $kode = $result['id'];

        $no_transaksi = $_POST['no_transaksi'];
        $kode_barang = $result['kode_barang'];
        $harga_beli = $result['harga_beli'];
        $harga_jual = $result['harga_jual'];
        $jumlah = $result['jumlah'];
        $subtotal = $result['subtotal'];

        $query = "INSERT INTO transaksi_detail (no_transaksi, kode_barang, harga_beli, harga_jual, jumlah, subtotal) VALUES ('$no_transaksi','$kode_barang','$harga_beli','$harga_jual','$jumlah','$subtotal)";
        $input = mysqli_query($conn, $query);
    }
} else {
    // header("location : ?page=tambah-kategori");
}
