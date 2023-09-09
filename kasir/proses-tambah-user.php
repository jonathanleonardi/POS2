<?php
include('library/koneksi.php');

$kode_user = $_POST['kode_user'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$username = $_POST['username'];
$password = $_POST['password'];
$hak_akses = $_POST['hak_akses'];

$query = "INSERT INTO user (kode_user, nama, no_hp, username, password, hak_akses) VALUES ('$kode_user','$nama','$no_hp','$username','$password','$hak_akses')";
$input = mysqli_query($conn, $query);

if ($input) {
    header("location: pemilik.php?page=data-user");
} else {
    header("location : ?page=tambah-user");
}
