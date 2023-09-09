<?php
include('library/koneksi.php');

$kode_barang = $_GET['kode'];

$query = "DELETE FROM barang WHERE kode_barang = '$kode_barang'";
$input = mysqli_query($conn, $query);

if ($input) {
    echo "<meta http-equiv='refresh' content='0;url=pemilik.php?page=data-barang'>";
} else {
    header("location : ?page=data-barang");
}
