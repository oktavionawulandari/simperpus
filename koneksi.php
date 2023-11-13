<?php
$_host       = "localhost";
$_user       = "root";
$_password   = "";
$_database   = "simperpus";
$_port       = "3306";
// membuat koneksi
$_koneksi = new mysqli($_host, $_user, $_password, $_database, $_port);
//mengecek koneksi
if ($_koneksi->connect_error) {
  die("Koneksi Gagal: " . $_koneksi->connect_error);
}
echo "Koneksi Berhasil";