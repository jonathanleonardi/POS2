<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SRC HERLINAH | Invoice Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <section class="invoice">
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> SRC HERLINAH
                        <br>
                    </h2>
                    <p><b>Jl. CIMANUK 145 | 081313074257</b></p>
                </div>
            </div>
            <div class="row invoice-info">
                <?php
                include('library/koneksi.php');

                //Menampilkan Data Jumlah Bayar
                $kode = $_GET['kode'];
                $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE no_transaksi = '$kode'");
                $result = mysqli_fetch_array($query);
                $tanggal = $result['tanggal'];
                ?>
                <div class="col-sm-4 invoice-col">
                    <b>Invoice # </b><?php echo $_GET['kode']; ?><br>
                    <!-- <b>Order ID : </b><?php echo $_GET['kode']; ?><br> -->
                    <b>Payment Due : </b><?php echo $tanggal; ?><br>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-4 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Code</th>
                                <th>Product</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Memanggil Koneksi
                            // include('library/koneksi.php');

                            // Menampilkan Data Transaksi Tmp
                            $kode = $_GET['kode'];
                            $sql = "SELECT transaksi_detail.jumlah, barang.nama_barang, transaksi_detail.kode_barang, transaksi_detail.subtotal FROM transaksi_detail
                        LEFT JOIN barang ON transaksi_detail.kode_barang = barang.kode_barang
                        WHERE transaksi_detail.no_transaksi = '$kode'";

                            $query = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_array($query)) {
                                $kode = $result['kode_barang'];
                            ?>
                                <tr>
                                    <td><?php echo $result['jumlah']; ?></td>
                                    <td><?php echo $result['kode_barang']; ?></td>
                                    <td><?php echo $result['nama_barang']; ?></td>
                                    <td><?php echo $result['subtotal']; ?></td>
                                </tr>
                            <?php

                                $grand_total = 0;
                                $subtotal = $result['subtotal'];
                                $grand_total = $grand_total + $subtotal;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Grand Total : </th>
                                <td><?php echo $grand_total; ?></td>
                            </tr>
                            <tr>
                                <?php
                                //Menampilkan Data Jumlah Bayar
                                $kode = $_GET['kode'];
                                $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE no_transaksi = '$kode'");
                                $result = mysqli_fetch_array($query);
                                $jumlah_bayar = $result['jumlah_bayar'];

                                ?>
                                <th>Jumlah Bayar : </th>
                                <td><?php echo $jumlah_bayar; ?></td>
                            </tr>
                            <?php
                            $kembalian = 0;
                            $kembalian = $jumlah_bayar - $grand_total;
                            ?>
                            <tr>
                                <th>Kembalian : </th>
                                <td><?php echo $kembalian; ?></td>
                            </tr>
                        </table>
                    </div>
                    <p align="center"><b>Barang Yang Telah Dibeli Tidak Dapat Ditukar / Dikembalikan</b></p>
                </div>
            </div>
        </section>
    </div>

    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>