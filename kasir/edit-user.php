<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12" align="center">
                    <h3>EDIT USER</h3>
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

                        // Menampilkan Data User
                        $kode = $_GET['kode'];
                        $sql = "SELECT * FROM user WHERE kode_user = '$kode'";
                        $query = mysqli_query($conn, $sql);
                        $edit = mysqli_fetch_array($query);
                        ?>
                        <form action="proses-edit-user.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputNama">Nama</label>
                                    <input type="hidden" name="kode_user" class="form-control" maxlength="10" value="<?php echo $edit['kode_user']; ?>">
                                    <input type="text" name="nama" class="form-control" id="inputNama" placeholder="Masukkan Nama" maxlength="100" value="<?php echo $edit['nama']; ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="inputNoHP">No Handphone</label>
                                    <input type="number" name="no_hp" class="form-control" id="inputNoHP" placeholder="Masukkan No Handphone" min=0 onKeyPress="if(this.value.length==13) return false;" value="<?php echo $edit['no_hp']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername">Username</label>
                                    <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Masukkan Username" maxlength="16" value="<?php echo $edit['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Masukkan Password" maxlength="16" value="<?php echo $edit['password']; ?>">
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