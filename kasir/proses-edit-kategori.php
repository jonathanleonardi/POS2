<?php
include('library/koneksi.php');

$kode_kategori = $_POST['kode_kategori'];
$nama_kategori = $_POST['nama_kategori'];

$query = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE kode_kategori = '$kode_kategori'";
$input = mysqli_query($conn, $query);

if ($input) {
    header("location: pemilik.php?page=data-kategori");
} else {
    header("location : ?page=edit-kategori");
}
