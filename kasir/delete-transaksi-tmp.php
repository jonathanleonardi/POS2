<?php
include('library/koneksi.php');

$kode = $_GET['kode'];

$query = "DELETE FROM transaksi_tmp WHERE id = '$kode'";
$input = mysqli_query($conn, $query);

if ($input) {
    // header("location: ?page=data-staff", true, 301);
    echo "<meta http-equiv='refresh' content='0;url=pemilik.php?page=data-transaksi'>";
} else {
    // header("location : ?page=data-kategori");
}
