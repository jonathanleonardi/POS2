<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" align="center">
                    <h3>KATEGORI</h3>
                </div>
                <div class="col-sm-3">
                    <a href="?page=tambah-kategori" class="btn btn-outline-primary btn-block"><i class="nav-icon fas fa-plus-square"></i> Tambah Kategori</a>
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
                                        <th>Kode User</th>
                                        <th>Nama Kategori</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Memanggil Koneksi
                                    include('library/koneksi.php');

                                    // Menampilkan Data Kategori
                                    $sql = "SELECT * FROM kategori";
                                    $query = mysqli_query($conn, $sql);
                                    while ($result = mysqli_fetch_array($query)) {
                                        $kode = $result['kode_kategori'];
                                    ?>
                                        <tr>
                                            <td><?php echo $result['kode_kategori'] ?></td>
                                            <td><?php echo $result['nama_kategori'] ?></td>
                                            <td align="center"> <a href="?page=edit-kategori&kode=<?php echo $kode; ?>" class="nav-link nav-icon fas fa-pencil-alt"></a></td>
                                            <td align="center"> <a href="?page=delete-kategori&kode=<?php echo $kode; ?>" class="nav-link nav-icon fas fa-trash-alt"></a></td>
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