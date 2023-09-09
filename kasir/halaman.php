<?php

if ($_GET) {
    switch ($_GET['page']) {
        case '';
            if (!file_exists("main-page.php")) die("Halaman Tidak Ditemukan");
            include "main-page.php";
            break;

            // DATA USER
        case 'data-user':
            if (!file_exists("data-user.php")) die("Halaman Tidak Ditemukan");
            include "data-user.php";
            break;

            // Tambah User
        case 'tambah-user':
            if (!file_exists("tambah-user.php")) die("Halaman Tidak Ditemukan");
            include "tambah-user.php";
            break;

            // Edit User
        case 'edit-user':
            if (!file_exists("edit-user.php")) die("Halaman Tidak Ditemukan");
            include "edit-user.php";
            break;

            // Delete User
        case 'delete-user':
            if (!file_exists("delete-user.php")) die("Halaman Tidak Ditemukan");
            include "delete-user.php";
            break;

            // Data Kategori
        case 'data-kategori':
            if (!file_exists("data-kategori.php")) die("Halaman Tidak Ditemukan");
            include "data-kategori.php";
            break;

            // Tambah Kategori
        case 'tambah-kategori':
            if (!file_exists("tambah-kategori.php")) die("Halaman Tidak Ditemukan");
            include "tambah-kategori.php";
            break;

            // Edit Kategori
        case 'edit-kategori':
            if (!file_exists("edit-kategori.php")) die("Halaman Tidak Ditemukan");
            include "edit-kategori.php";
            break;

            // Delete Kategori
        case 'delete-kategori':
            if (!file_exists("delete-kategori.php")) die("Halaman Tidak Ditemukan");
            include "delete-kategori.php";
            break;

            // Data Barang
        case 'data-barang':
            if (!file_exists("data-barang.php")) die("Halaman Tidak Ditemukan");
            include "data-barang.php";
            break;

            // Tambah Barang
        case 'tambah-barang':
            if (!file_exists("tambah-barang.php")) die("Halaman Tidak Ditemukan");
            include "tambah-barang.php";
            break;

            // Edit Barang
        case 'edit-barang':
            if (!file_exists("edit-barang.php")) die("Halaman Tidak Ditemukan");
            include "edit-barang.php";
            break;

            // Delete Barang
        case 'delete-barang':
            if (!file_exists("delete-barang.php")) die("Halaman Tidak Ditemukan");
            include "delete-barang.php";
            break;

            // Transaksi Tmp
        case 'data-transaksi':
            if (!file_exists("data-transaksi.php")) die("Halaman Tidak Ditemukan");
            include "data-transaksi.php";
            break;

            // Delete Transaksi Tmp
        case 'delete-transaksi-tmp':
            if (!file_exists("delete-transaksi-tmp.php")) die("Halaman Tidak Ditemukan");
            include "delete-transaksi-tmp.php";
            break;

            // INVOICE
        case 'invoice':
            if (!file_exists("invoice.php")) die("Halaman Tidak Ditemukan");
            include "invoice.php";
            break;

            // INVOICE
        case 'laporan-transaksi-today':
            if (!file_exists("laporan-transaksi-today.php")) die("Halaman Tidak Ditemukan");
            include "laporan-transaksi-today.php";
            break;
    }
} else {
    if (!file_exists("main-page.php")) die("Halaman Tidak Ditemukan");
    include "main-page.php";
}
