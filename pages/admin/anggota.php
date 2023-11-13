<div class="container p-4">
    <div class="col col-md-12">
        <!--Tabel Anggota-->
        <div class="card">
            <div class="card-header text-light fs-5" style="background-color: #2383b6;">
                Data Anggota
            </div>
            <div class="card-body m-3">
                <div class="table-responsive">
                    <table id="example" class="table table-hover table-bordered border-secondary border-1"
                        style="width:100%">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Program Studi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $sqlget = "SELECT nim,nama_anggota,tgl_lahir,
                            jenis_kelamin,no_hp,nama_prodi,nama_jurusan
                            FROM tb_anggota INNER JOIN tb_prodi ON tb_anggota.`kode_prodi`=tb_prodi.`kode_prodi`
                            INNER JOIN tb_jurusan ON tb_prodi.`kode_jurusan`=tb_jurusan.`kode_jurusan`";

                            $noUrut = 1;
                            $result = $_koneksi->query($sqlget);
                            ?>
                            
                            <?php while ($value = $result->fetch_assoc()) { ?>
                            <tr class="text-center align-middle">
                                <td><?php echo $noUrut++; ?></td>
                                <td><?php echo $value['nim']; ?></td>
                                <td><?php echo $value['nama_anggota']; ?></td>
                                <td><?php echo $value['tgl_lahir']; ?></td>
                                <td><?php echo $value['jenis_kelamin']; ?></td>
                                <td><?php echo $value['nama_jurusan']; ?></td>
                                <td><?php echo $value['nama_prodi']; ?></td>
                                <td class="text-center">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <div class="btn btn-primary btn-sm"><img style="width: 15px;" src="assets/bahan/editing.png"/>
                                <a href="./edit_anggota.php?id=<?= $row["id"]; ?>" class="text-decoration-none text-white">Edit</a>
                                </div><div class="btn btn-danger btn-sm">
                                <img style="width: 15px;" src="assets/bahan/trash (1).png"/><a href="./hapusbuku.php?id=<?= $row["id"]; ?>" onclick="
                                return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="text-decoration-none text-white">Hapus</a>
                                </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                    <a href="index.php?page=tambahanggota" class="btn btn-success text-light mt-4">+ Tambah Data</a>
                <a href="index.php?page=exportToExcel" class="btn text-dark mt-4"
                    style="border-color:#2383b6;">ExportToExcel</a>
                <a href="#" class="btn text-dark mt-4" style="border-color:#2383b6;">ExportToPDF</a>
            </div>
        </div>
    </div>
</div>