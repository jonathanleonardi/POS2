<?php
include('library/koneksi.php');

$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$kode_kategori = $_POST['kode_kategori'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];

$query = "UPDATE barang SET nama_barang = '$nama_barang', kode_kategori = '$kode_kategori', harga_beli = '$harga_beli', harga_jual = '$harga_jual', stok = '$stok' WHERE kode_barang = '$kode_barang'";
$input = mysqli_query($conn, $query);

if ($input) {
    header("location: pemilik.php?page=data-barang");
} else {
    header("location : ?page=edit-barang");
}
