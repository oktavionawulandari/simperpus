<?php
// pengembalian buku
$kode_transaksi = $_GET['kode_transaksi'];
$kode_buku = $_GET['kode_buku'];

$sqlupdate = $_koneksi->query("UPDATE tb_transaksi SET status_transaksi='dikembalikan' where kode_transaksi='$kode_transaksi'");
$sqlupdate = $_koneksi->query("UPDATE tb_buku SET jumlah=(jumlah+1) where kode_buku='$kode_buku'");
?>
<script type="text/javascript">
alert("Proses Pengembalian Buku Berhasil Dilakukan");
window.location.href = "index.php?page=transaksi";
</script>
<?php
?>