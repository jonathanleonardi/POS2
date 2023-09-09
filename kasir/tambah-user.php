<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" align="center">
                    <h3>TAMBAH USER</h3>
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

                        $query = mysqli_query($conn, "SELECT max(kode_user) as kode_terakhir from user");
                        $isi = mysqli_fetch_array($query);
                        $KodeUser = $isi['kode_terakhir'];

                        $KodeOtomatis = (int) substr($KodeUser, 8, 2);
                        $KodeOtomatis++;

                        $KodeData = "PEMILIK-";
                        $KodeUser =  $KodeData . sprintf("%02s", $KodeOtomatis);
                        ?>
                        <form action="proses-tambah-user.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputNama">Kode User</label>
                                    <input type="text" name="kode_user" class="form-control" maxlength="10" value="<?php echo $KodeUser; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputNama">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="inputNama" placeholder="Masukkan Nama" maxlength="100" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputNoHP">No Handphone</label>
                                    <input type="number" name="no_hp" class="form-control" id="inputNoHP" placeholder="Masukkan No Handphone" min=0 onKeyPress="if(this.value.length==13) return false;" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername">Username</label>
                                    <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Masukkan Username" maxlength="16" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Masukkan Password" maxlength="16" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputRounded">Hak Akses</label>
                                    <select name="hak_akses" class="custom-select rounded-0" id="inputRounded">
                                        <option>PEMLIK</option>
                                    </select>
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