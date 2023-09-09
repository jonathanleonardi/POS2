<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" align="center">
                    <h3>TAMBAH KATEGORI</h3>
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

                        $query = mysqli_query($conn, "SELECT max(kode_kategori) as kode_terakhir from kategori");
                        $isi = mysqli_fetch_array($query);
                        $KodeKategori = $isi['kode_terakhir'];

                        $KodeOtomatis = (int) substr($KodeKategori, 4, 3);
                        $KodeOtomatis++;

                        $KodeData = "KAT-";
                        $KodeKategori =  $KodeData . sprintf("%02s", $KodeOtomatis);
                        ?>
                        <form action="proses-tambah-kategori.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputNama">Kode Kategori</label>
                                    <input type="text" name="kode_kategori" class="form-control" maxlength="10" value="<?php echo $KodeKategori; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputNama">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" class="form-control" id="inputNama" placeholder="Masukkan Nama Kategori" maxlength="100" required>
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