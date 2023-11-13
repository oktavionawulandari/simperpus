<div class="container">
    <div class="col col-md-12">
        <!--Form Tambah Transaksi-->
        <div class="card">
            <div class="card-header text-light fs-5" style="background-color: #2383b6;">
                Tambah Peminjaman
            </div>
            <div class="card-body p-5 mx-5">
                <form action="index.php?page=tambahtransaksi" method="post" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Kode Transaksi</label>
                        <!--Membuat Kode Transaksi Otomatis-->
                        <?php
                        $sqlget = mysqli_query($_koneksi, "SELECT MAX(kode_transaksi) as kodeTerbesar FROM tb_transaksi");
                        $value = mysqli_fetch_array($sqlget);
                        $kodeTransaksi = $value['kodeTerbesar'];

                        $urutan = (int)substr($kodeTransaksi, 2, 8);
                        $urutan++;
                        $huruf = "TR";
                        $kodeTransaksi = $huruf . sprintf("%08s", $urutan);
                        ?>
                        <input type="text" class="form-control" name="kode_transaksi"
                            value=<?php echo $kodeTransaksi; ?> readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Anggota</label>
                        <select id="anggota" class="form-select" name="anggota">
                            <?php
                            $sqlget = $_koneksi->query("SELECT*FROM tb_anggota");
                            while ($value = $sqlget->fetch_assoc()) {
                                echo "<option value='$value[id_anggota]-$value[nim]-$value[nama_anggota]'>$value[id_anggota]-$value[nim]-$value[nama_anggota]</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Judul Buku</label>
                        <select id="buku" class="form-select" name="buku">
                            <?php
                            $sqlget = $_koneksi->query("SELECT*FROM tb_buku order by kode_buku");
                            while ($value = $sqlget->fetch_assoc()) {
                                echo "<option value='$value[kode_buku]-$value[judul_buku]'>$value[kode_buku]-$value[judul_buku]</option>";
                            } ?>
                        </select>
                    </div>
                    <!--Tanggal Pinjam dan Kembali-->
                    <?php
                    $tgl_pinjam = date("Y-m-d");
                    $tujuh_hari = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
                    $kembali = date("Y-m-d", $tujuh_hari);
                    ?>

                    <div class="col-md-4">
                        <label class="form-label">Tanggal Pinjam</label>
                        <input type="text" name="tgl_pinjam" class="form-control" id="tgl"
                            value="<?php echo $tgl_pinjam; ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Kembali</label>
                        <input type="text" name="tgl_kembali" class=" form-control" id="tgl"
                            value="<?php echo $kembali; ?>" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" id="status" value="dipinjam" readonly>
                    </div>
            </div>

            <div class="card-body md-4">

                <div class="col-12">
                    <a href="index.php?page=transaksi"><button type="button"
                            class="btn btn-outline-secondary float-end">Batal</button>
                    </a>
                    <button type="submit" name="simpan" class="btn float-end text-light me-2"
                        style="background-color:#2383b6;">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
//mengumpulkan data ke tabel di database
if (isset($_POST['simpan'])) {
    $kode_transaksi = $_POST['kode_transaksi'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $status = $_POST['status'];

    $anggota = $_POST['anggota'];
    $pecah_anggota = explode("-", $anggota);
    $id_anggota = $pecah_anggota[0];
    $nim = $pecah_anggota[1];
    $nama_anggota = $pecah_anggota[2];

    $buku = $_POST['buku'];
    $pecah_buku = explode("-", $buku);
    $kode_buku = $pecah_buku[0];
    $judul_buku = $pecah_buku[1];

    $sqlget = mysqli_query($_koneksi, "SELECT*FROM tb_buku WHERE judul_buku='$judul_buku'");
    $value = mysqli_fetch_array($sqlget);
    $sisa = $value['jumlah'];

    if ($sisa == 0) {
?>
<script type="text/javascript">
alert("Stok Buku Habis, Transaksi Tidak Dapat Dilakukan");
window.location.href = "index.php?page=tambahtransaksi";
</script>
<?php
    } else {
        mysqli_query($_koneksi, "INSERT INTO tb_transaksi (kode_transaksi, id_anggota, kode_buku, tgl_pinjam, 
        tgl_kembali, status_transaksi) 
        VALUES ('$kode_transaksi', '$id_anggota', '$kode_buku', '$tgl_pinjam', '$tgl_kembali', '$status')");
        mysqli_query($_koneksi, "UPDATE tb_buku SET jumlah=(jumlah-1) Where kode_buku='$kode_buku'");
    ?>
<script type="text/javascript">
alert("Transaksi Peminjaman Berhasil Ditambahkan");
window.location.href = "index.php?page=transaksi";
</script>
<?php
    }
}
?>