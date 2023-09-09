<?php
session_start();

// Koneksi DB
include 'library/koneksi.php';

// Mengambil Data Form
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];

// Mencari Data User n Password
$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

// Menjumlah Data Yang Ditemukan
$check = mysqli_num_rows($query);

// Query Data Hak Akses
$login = mysqli_fetch_assoc($query);

// Menampilkan Data User
$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$result = mysqli_fetch_array($query);
$kode_user = $result['kode_user'];

if ($login['hak_akses'] == "PEMILIK") {
    // MEMBACA DATA KODE USER DI QUERY
    // $result = mysqli_fetch_array($query);

    // SESSION LOGIN USERNAME DAN HAK AKSES
    $_SESSION['kode_user'] = $kode_user;
    $_SESSION['username'] = $username;
    $_SESSION['hak_akses'] = $login['hak_akses'];
    header("location:pemilik.php");
} else {
    header("location:login.php");
}

// Check Username dan Password
// if ($check > 0) {
//     // Jika Sesuai
//     if ($login['hak_akses'] == "PEMILIK") {
//         // MEMBACA DATA KODE USER DI QUERY
//         // $result = mysqli_fetch_array($query);

//         // SESSION LOGIN USERNAME DAN HAK AKSES
//         $_SESSION['kode_user'] = $kode_user;
//         $_SESSION['username'] = $username;
//         $_SESSION['hak_akses'] = $login['hak_akses'];
//         header("location:pemilik.php");
//     } 
//     else if ($login['hak_akses'] == "PEMILIK") {
//         // MEMBACA DATA KODE USER DI QUERY
//         // $result = mysqli_fetch_array($query);

//         // SESSION LOGIN USERNAME DAN HAK AKSES
//         $_SESSION['kode_user'] = $kode_user;
//         $_SESSION['username'] = $username;
//         $_SESSION['hak_akses'] = $login['hak_akses'];
//         header("location:pemilik.php");
//     } else if ($login['hak_akses'] == "STAFF") {
//         // MEMBACA DATA KODE USER DI QUERY
//         // $result = mysqli_fetch_array($query);

//         // SESSION LOGIN USERNAME DAN HAK AKSES 
//         $_SESSION['kode_user'] = $kode_user;
//         $_SESSION['username'] = $username;
//         $_SESSION['hak_akses'] = $login['hak_akses'];
//         header("location:staff.php");
//     }
// } else {
//     header("location:login.php");
// }



echo $check;
