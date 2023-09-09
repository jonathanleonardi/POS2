<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="transaksi-tmp.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <!--  -->
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
                            <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
                            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                            <!--  -->
                            <script>
                                $(function() {
                                    $('#nama').autocomplete({
                                        source: 'autocomplete.php',

                                        select: function(event, ui) {
                                            $('[name="nama"]').val(ui.item.label);
                                            // 
                                            $('[name="kode_barang"]').val(ui.item.kode_barang);
                                            $('[name="nama_barang"]').val(ui.item.nama_barang);
                                            $('[name="harga_jual"]').val(ui.item.harga_jual);
                                            $('[name="harga_beli"]').val(ui.item.harga_beli);
                                        }
                                    });
                                });
                            </script>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputNamaBarang" class="col-sm-3 col-form-label">Nama Barang</label>
                                    <div class="col-sm-9">

                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Barang">
                                    </div>
                                </div>
                                <!--  -->
                                <div class="form-group row">
                                    <label for="inputHarga" class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">

                                        <input type="hidden" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang">
                                        <input type="hidden" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga">
                                        <input type="hidden" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga Beli">
                                        <?php
                                        // SESSION NAMA
                                        $kode_user =  $_SESSION['kode_user'];
                                        ?>
                                        <input type="hidden" class="form-control" id="kode_user" name="kode_user" value="<?php echo $kode_user; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right">Kirim</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">INVOICE</h3>
                                <?php
                                // Memanggil Koneksi
                                include('library/koneksi.php');

                                $query = mysqli_query($conn, "SELECT max(no_transaksi) AS kode_terakhir FROM transaksi");
                                $isi = mysqli_fetch_array($query);
                                $KodeTransaksi = $isi['kode_terakhir'];

                                $KodeOtomatis = (int) substr($KodeTransaksi, 5, 3);
                                $KodeOtomatis++;

                                $KodeData = "TR-";
                                $KodeTransaksi =  $KodeData . sprintf("%05s", $KodeOtomatis);
                                ?>
                                <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" value="<?php echo $KodeTransaksi ?>" placeholder="No Transaksi">

                            </div>
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            // Memanggil Koneksi
                                            // include('library/koneksi.php');

                                            //Menampilkan Data Jumlah Barang
                                            $query = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah_barang FROM transaksi_tmp");
                                            $result = mysqli_fetch_array($query);
                                            $jumlah_barang = $result['jumlah_barang'];

                                            ?>
                                            <td>1.</td>
                                            <td>Jumlah Barang</td>
                                            <td><?php echo $jumlah_barang ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            //Menampilkan Data Grand Total
                                            $query = mysqli_query($conn, "SELECT SUM(jumlah*harga_jual) AS grand_total FROM transaksi_tmp");
                                            $result = mysqli_fetch_array($query);
                                            $grand_total = $result['grand_total'];

                                            ?>
                                            <td>2.</td>
                                            <td>Grand Total</td>
                                            <td>
                                                <input type="text" class="form-control" id="grand_total" name="grand_total" value="<?php echo $grand_total ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Jumlah Bayar</td>
                                            <td>
                                                <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    // Menampilkan Data Transaksi Tmp
                                    $sql = "SELECT transaksi_tmp.id, transaksi_tmp.kode_barang, barang.nama_barang, transaksi_tmp.harga_beli, transaksi_tmp.harga_jual, transaksi_tmp.jumlah, transaksi_tmp.subtotal, transaksi_tmp.kode_user, user.nama FROM transaksi_tmp
                                    LEFT JOIN barang ON transaksi_tmp.kode_barang = barang.kode_barang
                                    LEFT JOIN user ON transaksi_tmp.kode_user = user.kode_user";

                                    $query = mysqli_query($conn, $sql);
                                    while ($result = mysqli_fetch_array($query)) {
                                        $kode = $result['id'];
                                    ?>
                                        <tr>
                                            <td><?php echo $result['kode_barang'] ?></td>
                                            <td><?php echo $result['nama_barang'] ?></td>
                                            <td><?php echo $result['harga_jual'] ?></td>
                                            <td><?php echo $result['jumlah'] ?></td>
                                            <td><?php echo $result['subtotal'] ?></td>
                                            <td> <a href="?page=delete-transaksi-tmp&kode=<?php echo $kode; ?>" class="nav-link nav-icon fas fa-trash-alt"></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="?page=laporan-transaksi-today" class="nav-link">Laporan Transaksi Hari Ini</a>
                            </h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </form>
    </section>
</div>