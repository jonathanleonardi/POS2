<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" align="center">
                    <h3>USER</h3>
                </div>
                <div class="col-sm-3">
                    <a href="?page=tambah-user" class="btn btn-outline-primary btn-block"><i class="nav-icon fas fa-plus-square"></i> Tambah User</a>
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
                                        <th>Nama</th>
                                        <th>No HP</th>
                                        <th>Hak Akses</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Memanggil Koneksi
                                    include('library/koneksi.php');

                                    // Menampilkan Data User
                                    $sql = "SELECT * FROM user";
                                    $query = mysqli_query($conn, $sql);
                                    while ($result = mysqli_fetch_array($query)) {
                                        $kode = $result['kode_user'];
                                    ?>
                                        <tr>
                                            <td><?php echo $result['kode_user'] ?></td>
                                            <td><?php echo $result['nama'] ?></td>
                                            <td><?php echo $result['no_hp'] ?></td>
                                            <td><?php echo $result['hak_akses'] ?></td>
                                            <td align="center"> <a href="?page=edit-user&kode=<?php echo $kode; ?>" class="nav-link nav-icon fas fa-pencil-alt"></a></td>
                                            <td align="center"> <a href="?page=delete-user&kode=<?php echo $kode; ?>" class="nav-link nav-icon fas fa-trash-alt"></a></td>
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