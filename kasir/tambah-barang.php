<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" align="center">
                    <h3>TAMBAH BARANG</h3>
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

                        $query = mysqli_query($conn, "SELECT max(kode_barang) as kode_terakhir from barang");
                        $isi = mysqli_fetch_array($query);
                        $KodeBarang = $isi['kode_terakhir'];

                        $KodeOtomatis = (int) substr($KodeBarang, 4, 3);
                        $KodeOtomatis++;

                        $KodeData = "BRG-";
                        $KodeBarang =  $KodeData . sprintf("%03s", $KodeOtomatis);
                        ?>
                        <form action="proses-tambah-barang.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputKodeBarang">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control" maxlength="10" value="<?php echo $KodeBarang; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputNamaBarang">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="inputNama" placeholder="Masukkan Nama Barang" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="inputKodeKategori">Kode Kategori</label>
                                    <select class="custom-select rounded-0" name="kode_kategori" id="inputKodeKategori">
                                        <option value="kosong">...</option>
                                        <?php
                                        $kategori = $edit['kategori'];
                                        // Menampilkan Data Kategori
                                        $sql = "SELECT * FROM kategori";
                                        $query = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_array($query)) {
                                            $kode_kategori = $result['kode_kategori'];
                                            if ($kategori == $kode_kategori) {
                                                $cek = "selected";
                                            } else {
                                                $cek = "";
                                            }
                                            echo "<option value = '$result[kode_kategori]' $cek> $result[nama_kategori] </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputHargaBeli">Harga Beli</label>
                                    <input type="number" name="harga_beli" class="form-control" id="inputUsername" placeholder="Masukkan Harga Beli" maxlength="11">
                                </div>
                                <div class="form-group">
                                    <label for="inputHargaJual">Harga Jual</label>
                                    <input type="number" name="harga_jual" class="form-control" id="inputUsername" placeholder="Masukkan Harga Jual" maxlength="11">
                                </div>
                                <div class="form-group">
                                    <label for="inputHargaJual">Stok</label>
                                    <input type="number" name="stok" class="form-control" id="inputUsername" placeholder="Masukkan Jumlah Stok" maxlength="11">
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