<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" align="center">
                    <h3>BARANG</h3>
                </div>
                <div class="col-sm-3">
                    <a href="?page=tambah-barang" class="btn btn-outline-primary btn-block"><i class="nav-icon fas fa-plus-square"></i> Tambah Barang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr align="center">
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Kategori</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Memanggil Koneksi
                                    include('library/koneksi.php');

                                    // Menampilkan Data Barang
                                    $sql = "SELECT kode_barang, nama_barang, kategori.nama_kategori, harga_beli, harga_jual, stok FROM barang 
                                    LEFT JOIN kategori ON barang.kode_kategori = kategori.kode_kategori";
                                    $query = mysqli_query($conn, $sql);
                                    while ($result = mysqli_fetch_array($query)) {
                                        $kode = $result['kode_barang'];
                                    ?>
                                        <tr>
                                            <td><?php echo $result['kode_barang'] ?></td>
                                            <td><?php echo $result['nama_barang'] ?></td>
                                            <td><?php echo $result['nama_kategori'] ?></td>
                                            <td><?php echo $result['harga_beli'] ?></td>
                                            <td><?php echo $result['harga_jual'] ?></td>
                                            <td><?php echo $result['stok'] ?></td>
                                            <td align="center"> <a href="?page=edit-barang&kode=<?php echo $kode; ?>" class="nav-link nav-icon fas fa-pencil-alt"></a></td>
                                            <td align="center"> <a href="?page=delete-barang&kode=<?php echo $kode; ?>" class="nav-link nav-icon fas fa-trash-alt"></a></td>
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