<?php
include('library/koneksi.php');

$kode_user = $_GET['kode'];

$query = "DELETE FROM user WHERE kode_user = '$kode_user'";
$input = mysqli_query($conn, $query);

if ($input) {
    // header("location: ?page=data-staff", true, 301);
    echo "<meta http-equiv='refresh' content='0;url=pemilik.php?page=data-user'>";
} else {
    header("location : ?page=data-user");
}
