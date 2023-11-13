<div class="container p-4">
    <div class="col col-md-12">
        <!--Tabel Transaksi-->
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
                                <th scope="col">Kode Transaksi</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama Peminjam</th>
                                <th scope="col">Kode Buku</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Tgl Pinjam</th>
                                <th scope="col">Tgl Kembali</th>
                                <th scope="col">Denda</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqlget = "SELECT kode_transaksi,nim,nama_anggota,
                                tb_transaksi.`kode_buku`,judul_buku,tgl_pinjam,tgl_kembali,status_transaksi 
                                FROM tb_transaksi INNER JOIN tb_anggota ON tb_transaksi.`id_anggota`=tb_anggota.`id_anggota`
                                INNER join tb_buku ON tb_transaksi.`kode_buku`=tb_buku.`kode_buku` 
                                WHERE status_transaksi='dipinjam' ORDER BY kode_transaksi";
                            $noUrut = 1;
                            $result = $_koneksi->query($sqlget);
                            ?>
                            <?php while ($value = $result->fetch_assoc()) { ?>
                            <tr class="text-center align-middle">
                                <td><?php echo $noUrut++; ?></td>
                                <td><?php echo $value['kode_transaksi']; ?></td>
                                <td><?php echo $value['nim']; ?></td>
                                <td><?php echo $value['nama_anggota']; ?></td>
                                <td><?php echo $value['kode_buku']; ?></td>
                                <td><?php echo $value['judul_buku']; ?></td>
                                <td><?php echo $value['tgl_pinjam']; ?></td>
                                <td><?php echo $value['tgl_kembali']; ?></td>
                                <td>
                                    <?php
                                        //menentukan denda
                                        $tgl_dateline = date_create($value['tgl_kembali']);
                                        $tgl_now = date_create(date('Y-m-d'));
                                        $selisih = date_diff($tgl_dateline, $tgl_now);
                                        $lambat = $selisih->format("%R%a");
                                        //menampilkan denda pada tabel dengan if-else
                                        if ($lambat > 0) {
                                            $denda = $lambat * 1000;
                                            echo "
                                        <font color='red'>Rp $denda<br>(Terlambat $selisih->d hari)</font>";
                                        } else {
                                            $denda = $lambat * 0;
                                            echo "Rp $denda";
                                        }
                                        //menentukan lama waktu peminjaman yang berlangsung
                                        $pinjam = date_create($value['tgl_pinjam']);
                                        $hari = date_diff($pinjam, $tgl_now)->d;
                                        ?>
                                </td>
                                <td><?php echo $value['status_transaksi']; ?></td>
                                <td>
                                    <div class="d-grid gap-2">
                                        <a class="btn btn-info btn-sm text-light"
                                            onclick="return confirm('Apakah Anda yakin untuk memperpanjang peminjaman buku ini???')"
                                            href="index.php?page=perpanjang&kode_transaksi=<?php echo $value['kode_transaksi']; ?>&tgl_kembali=<?php echo $value['tgl_kembali']; ?>&hari=<?php echo $hari ?>">
                                            Perpanjang</a>
                                        <a class="btn btn-danger btn-sm"
                                            href="index.php?page=kembali&kode_transaksi=<?php echo $value['kode_transaksi']; ?>&kode_buku=<?php echo $value['kode_buku']; ?>">Kembali</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <a href="index.php?page=tambahtransaksi" class="btn btn-success text-light mt-4">+ Tambah Data</a>
                <a href="index.php?page=exportToExcel" class="btn text-dark mt-4"
                    style="border-color:#2383b6;">ExportToExcel</a>
                <a href="#" class="btn text-dark mt-4" style="border-color:#2383b6;">ExportToPDF</a>
            </div>
        </div>
    </div>
</div>