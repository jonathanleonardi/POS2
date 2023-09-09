<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" align="center">
                    <h3>LAPORAN HARI INI</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <?php
                // Memanggil Koneksi
                include('library/koneksi.php');

                $tanggal = date("Y-m-d");

                // Menampilkan Data Kategori
                $sql = "SELECT SUM(transaksi_detail.harga_jual * transaksi_detail.jumlah) AS omzet, 
                SUM(transaksi_detail.harga_beli* transaksi_detail.jumlah) AS jumlah_beli FROM transaksi
                LEFT JOIN transaksi_detail ON transaksi.no_transaksi = transaksi_detail.no_transaksi
                WHERE transaksi.tanggal = '$tanggal'";

                $query = mysqli_query($conn, $sql);
                $result = mysqli_fetch_array($query);

                $omzet = $result['omzet'];
                $jumlah_beli = $result['jumlah_beli'];

                // $laba = 0;
                $laba = $omzet - $jumlah_beli;
                ?>
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">OMZET</span>
                                <span class="info-box-number text-center text-muted mb-0"><?php echo $result['omzet'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">JUMLAH BELI</span>
                                <span class="info-box-number text-center text-muted mb-0"><?php echo $result['jumlah_beli'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">KEUNTUNGAN</span>
                                <span class="info-box-number text-center text-muted mb-0"><?php echo $laba ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No Transaksi</th>
                                        <th>Nama</th>
                                        <th>Grand Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Memanggil Koneksi
                                    // include('library/koneksi.php');

                                    $tanggal = date("Y-m-d");

                                    // Menampilkan Data Kategori
                                    $sql = "SELECT transaksi.no_transaksi, user.nama, transaksi.grand_total FROM transaksi 
                                    LEFT JOIN user ON transaksi.kode_user = user.kode_user
                                    WHERE transaksi.tanggal = '$tanggal'";
                                    $query = mysqli_query($conn, $sql);
                                    while ($result = mysqli_fetch_array($query)) {
                                        $kode = $result['no_transaksi'];
                                    ?>
                                        <tr>
                                            <td><?php echo $result['no_transaksi'] ?></td>
                                            <td><?php echo $result['nama'] ?></td>
                                            <td><?php echo $result['grand_total'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>