<?php
include('library/koneksi.php');

$kode_user = $_POST['kode_user'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "UPDATE user SET nama = '$nama', no_hp = '$no_hp', username = '$username', password = '$password' WHERE kode_user = '$kode_user'";
$input = mysqli_query($conn, $query);

if ($input) {
    header("location: pemilik.php?page=data-user");
} else {
    header("location : ?page=edit-user");
}
