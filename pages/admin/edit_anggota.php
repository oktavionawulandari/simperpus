<div class="container">
    <div class="col col-md-12">
        <!--Form Edit Anggota-->
        <div class="card">
            <div class="card-header text-light fs-5" style="background-color: #2383b6;">
                Edit Anggota
            </div>
            <div class="card-body">
          <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" style="background-color: #eee;" value="<?php echo $value['nim'] ?>"  readonly>
                </div>
             
                <form action="" method="post">
                <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_anggota" style="background-color: #eee;" value="<?php echo $value['nama_anggota'] ?>" required>
                </div>

                <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" style="background-color: #eee;" value="<?php echo $value['tgl_lahir'] ?>" required>
                </div>

                <div class="mb-3">
              <label class="form-label">Jenis Kelamin</label> 
              <div class="radio-inline"><?php $jenis_kelamin = $value['jenis_kelamin']; ?>  
                <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($jenis_kelamin == 'Laki-laki') ? "checked": "" ?>> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($jenis_kelamin == 'Perempuan') ? "checked": "" ?>> Perempuan</label>
                </div>

            <div class="form-group">
            <div class="mb-3">
              <label class="form-label">Jurusan</label>
              <select id="nama_jurusan" class="form-select" name="nama_jurusan" style="background-color: #eee;" required>
              <?php
                $sqlget = $_koneksi->query("SELECT*FROM tb_jurusan order by kode_jurusan");
                while ($value = $sqlget->fetch_assoc()) {
                echo "<option value='$value[kode_jurusan]-$value[nama_jurusan]'>$value[nama_jurusan]</option>";
                } ?>
                </select>
            </div>

            <div class="form-group">
            <div class="mb-3">
              <label class="form-label">Program Studi</label>
              <select id="nama_prodi" class="form-select" name="nama_prodi" style="background-color: #eee;" required>
              <?php
                $sqlget = $_koneksi->query("SELECT*FROM tb_prodi order by kode_prodi");
                while ($value = $sqlget->fetch_assoc()) {
                echo "<option value='$value[kode_prodi]-$value[nama_prodi]'>$value[nama_prodi]</option>";
                } ?>
                </select>
            </div>

            <input type="submit" name="submit" value="Submit" class="btn btn-primary me-md-2">
            <a href="anggota.php?page=anggota"><button type="button" class="btn btn-outline-secondary">Batal</button>
          </form>
        </div>
        <?php
//mengumpulkan data ke tabel di database
if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama_anggota = $_POST['nama_anggota'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $nama_prodi = $_POST['nama_prodi'];
?>
<script type="text/javascript">
alert("Edit Data Berhasil");
window.location.href = "index.php?page=anggota";
</script>
<?php
    }
?>

       