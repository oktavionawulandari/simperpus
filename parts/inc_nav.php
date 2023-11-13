<div class="container container-fluid">
    <button class="btn text-light fs-4" data-bs-toggle="offcanvas" href="#offcanvasExample" type="button"
        aria-controls="offcanvasExample">
        ☰
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"
        style="width: 300px;">
        <div class="offcanvas-header mt-2">
            <h4 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h4>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mt-2">
            <div class="text-center">
                <a href="#">
                    <img src="assets\bahan\profile-user.png" alt="" width="30" height="30" class="d-inline-block">
                </a>

                <div class="mt-1">
                    <?php
                    $sqlget = "SELECT nama_pegawai,jabatan FROM tb_pegawai where id_pegawai=1";
                    $result = $_koneksi->query($sqlget); ?>
                    <?php while ($value = $result->fetch_assoc()) { ?>
                    <h5><?php echo $value['nama_pegawai']; ?></h5>
                    <p><?php echo $value['jabatan']; ?></p>
                    <?php } ?>
                </div>
            </div>
            <hr>
            <div class="d-flex flex-column flex-shrink-1 p-2">
                <div class="list-group">
                    </a>
                    <a href="index.php?page=home"
                        class="navbar-brand list-group-item list-group-item-action border-0"><img
                            src="assets\bahan\home.png" alt="" width="30" height="30"
                            class="d-inline-block align-text-top">
                        Home
                    </a>
                    <a href="index.php?page=dashboard"
                        class="navbar-brand list-group-item list-group-item-action border-0"><img
                            src="assets\bahan\dashboard.png" alt="" width="30" height="30"
                            class="d-inline-block align-text-top">
                        Dashboard
                    </a>
                    <a href="index.php?page=anggota"
                        class="navbar-brand list-group-item list-group-item-action border-0"><img
                            src="assets\bahan\anggota.png" alt="" width="30" height="30"
                            class="d-inline-block align-text-top">
                        Anggota
                    </a>
                    <a href="index.php?page=buku"
                        class="navbar-brand list-group-item list-group-item-action border-0"><img
                            src="assets\bahan\book.png" alt="" width="30" height="30"
                            class="d-inline-block align-text-top">
                        Buku
                    </a>
                    <a href="index.php?page=transaksi"
                        class="navbar-brand list-group-item list-group-item-action border-0"><img
                            src="assets\bahan\transaction.png" alt="" width="30" height="30"
                            class="d-inline-block align-text-top">
                        Transaksi
                    </a>
                    <a href="index.php?page=pegawai"
                        class="navbar-brand list-group-item list-group-item-action border-0"><img
                            src="assets\bahan\pegawai.png" alt="" width="30" height="30"
                            class="d-inline-block align-text-top">
                        Pegawai
                    </a>
                </div>
                <hr>
                <!--logout button-->
                <div class="sticky-sm-bottom ms-auto">
                    <button type="button" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </div>
    </div>
</div>