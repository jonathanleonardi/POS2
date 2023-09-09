<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" align="center">
                    <h3>EDIT KATEGORI</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <?php
                        include('library/koneksi.php');

                        // Menampilkan Data Kategori
                        $kode = $_GET['kode'];
                        $sql = "SELECT * FROM kategori WHERE kode_kategori = '$kode'";
                        $query = mysqli_query($conn, $sql);
                        $edit = mysqli_fetch_array($query);
                        ?>
                        <form action="proses-edit-kategori.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputNama">Nama Kategori</label>
                                    <input type="hidden" name="kode_kategori" class="form-control" maxlength="10" value="<?php echo $edit['kode_kategori']; ?>">
                                    <input type="text" name="nama_kategori" class="form-control" id="inputNamaKategori" placeholder="Masukkan Nama Kategori" maxlength="100" value="<?php echo $edit['nama_kategori']; ?>">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>