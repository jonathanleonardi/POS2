<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" align="center">

                </div>
            </div>
        </div>
    </section>

    <div class="invoice p-3 mb-3">
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
                <b>Payment Due : </b><?php echo $tanggal; ?><br>
                <br>
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-12 table-responsive">
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
            <div class="col-6">
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
                        // $kembalian = $result['jumlah_bayar'] - $result['subtotal'];

                        ?>
                        <tr>
                            <th>Kembalian : </th>
                            <td><?php echo $kembalian; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <a href="invoice-print.php?kode=<?php echo $kode; ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                
            </div>
        </div>
    </div>
</div>