<?php
include('library/koneksi.php');

if ($_POST['kode_barang'] == '') {
    session_start();

    // SESSION NAMA
    $kode_user_session =  $_SESSION['kode_user'];

    // SIMPAN TABLE TRANSAKSI
    $tanggal_skrg = date("Y-m-d");

    $no_transaksi = $_POST['no_transaksi'];
    $tanggal = $tanggal_skrg;
    $kode_user = $kode_user_session;
    $grand_total = $_POST['grand_total'];
    $jumlah_bayar = $_POST['jumlah_bayar'];

    if ($jumlah_bayar < $grand_total) {
        echo "<meta http-equiv='refresh' content='0;url=admin.php?page=data-transaksi'>";
    } else {
        $query = "INSERT INTO transaksi (no_transaksi, tanggal, kode_user, grand_total) VALUES ('$no_transaksi', '$tanggal', '$kode_user','$grand_total')";
        $input = mysqli_query($conn, $query);

        if ($input) {
            // Menampilkan Data Transaksi Tmp
            $sql = "SELECT transaksi_tmp.id, transaksi_tmp.kode_barang, barang.nama_barang, transaksi_tmp.harga_beli, transaksi_tmp.harga_jual, transaksi_tmp.jumlah, transaksi_tmp.subtotal, transaksi_tmp.kode_user, user.nama FROM transaksi_tmp
        LEFT JOIN barang ON transaksi_tmp.kode_barang = barang.kode_barang
        LEFT JOIN user ON transaksi_tmp.kode_user = user.kode_user";

            $query_tmp = mysqli_query($conn, $sql);
            while ($result = mysqli_fetch_array($query_tmp)) {
                $kode = $result['id'];

                $no_transaksi = $_POST['no_transaksi'];
                $kode_barang = $result['kode_barang'];
                $harga_beli = $result['harga_beli'];
                $harga_jual = $result['harga_jual'];
                $jumlah = $result['jumlah'];
                $subtotal = $result['subtotal'];

                $query_detail = "INSERT INTO transaksi_detail (no_transaksi, kode_barang, harga_beli, harga_jual, jumlah, subtotal) VALUES ('$no_transaksi','$kode_barang','$harga_beli','$harga_jual','$jumlah','$subtotal')";
                $input = mysqli_query($conn, $query_detail);
            }

            $query_dlt_tmp = "DELETE FROM transaksi_tmp";
            mysqli_query($conn, $query_dlt_tmp);

            echo "<meta http-equiv='refresh' content='0;url=admin.php?page=invoice&kode=" . $no_transaksi . "'>";
        } else {
            echo "<meta http-equiv='refresh' content='0;url=admin.php?page=data-transaksi'>";
        }
    }
} else {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama'];
    $jumlah_karakter = $_POST['nama_barang'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $kode_user = $_POST['kode_user'];

    $jumlah = strlen($jumlah_karakter);
    $qty = substr($nama_barang, $jumlah, 5);

    $subtotal = $harga_jual * $qty;

    $query = "INSERT INTO transaksi_tmp (kode_barang, kode_user, harga_beli, harga_jual, jumlah, subtotal) VALUES ('$kode_barang', '$kode_user', '$harga_beli', '$harga_jual', '$qty', '$subtotal')";
    $input = mysqli_query($conn, $query);

    if ($input) {
        // header("location: admin.php?page=data-transaksi");
        echo "<meta http-equiv='refresh' content='0; url=admin.php?page=data-transaksi'>";
    } else {
        // header("location : ?page=data-transaksi");
    }
}

// echo $kode_barang."<br>";
// echo $nama_barang."<br>";
// echo $harga_beli."<br>";
// echo $harga_jual."<br>";
// echo $qty."<br>";
// echo $subtotal."<br>";
// echo $kode_user."<br>";