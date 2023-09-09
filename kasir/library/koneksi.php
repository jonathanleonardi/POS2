<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'src_herlinah');

$conn = mysqli_connect(HOST, USER, PASS, DB) or die('unable to connect');

//Buat Rupiah
// function buatRupiah($angka)
// {
//     $rupiah = "Rp " . number_format($angka, 2, ',', '.');
//     return $rupiah;
// }