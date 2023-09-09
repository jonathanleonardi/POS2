<?php
include('library/koneksi.php');

$kode_kategori = $_GET['kode'];

$query = "DELETE FROM kategori WHERE kode_kategori = '$kode_kategori'";
$input = mysqli_query($conn, $query);

if ($input) {
    // header("location: ?page=data-staff", true, 301);
    echo "<meta http-equiv='refresh' content='0;url=pemilik.php?page=data-kategori'>";
} else {
    header("location : ?page=data-kategori");
}
