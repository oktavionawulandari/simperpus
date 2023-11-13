<?php
$kode_transaksi = $_GET['kode_transaksi'];
$hari = $_GET['hari'];
$tgl_kembali = $_GET['tgl_kembali'];
//notifikasi bahwa perpanjangan tidak bisa dilakukan apabila waktu peminjaman lebih dari 7 hari
if ($hari > 7) {
?>
<script type="text/javascript">
alert("Perpanjangan Peminjaman Tidak Dapat Dilakukan Karena Lebih Dari 7 Hari. Silahkan Kembalikan Terlebih Dahulu");
window.location.href = "index.php?page=transaksi";
</script>

<?php
    //menentukan perpanjangan tanggal
} else {
    $pecah_tgl_kembali = explode("-", $tgl_kembali);
    $next_7hari = mktime(0, 0, 0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[2] + 7, $pecah_tgl_kembali[0]);
    $hari_next = date("Y-m-d", $next_7hari);
    $sqlupdate = $_koneksi->query("UPDATE tb_transaksi SET tgl_kembali='$hari_next' WHERE kode_transaksi='$kode_transaksi'");
    if ($sqlupdate) {
    ?>
<script type="text/javascript">
alert("Perpanjangan Berhasil");
window.location.href = "index.php?page=transaksi";
</script><?php
                } else {
                    ?>
<script type="text/javascript">
alert("Perpanjangan Gagal");
window.location.href = "index.php?page=transaksi";
</script>
<?php
                }
    ?>

?>
<?php
}