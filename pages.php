<?php
$_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
switch ($_pages) {
  case "home":
    include('.\pages\home.php');
    break;
  case "dashboard":
    include('.\pages\dashboard.php');
    break;
  case "anggota":
    include('.\pages\admin\anggota.php');
    break;
    case "tambahanggota":
      include('.\pages\admin\tambahanggota.php');
      break;
      case "edit_anggota":
        include('.\pages\admin\edit_anggota.php');
        break;
  case "buku":
    include('.\pages\admin\buku.php');
    break;
  case "transaksi":
    include('.\pages\admin\transaksi.php');
    break;
  case "tambahtransaksi":
    include('.\pages\admin\tambahtransaksi.php');
    break;
  case "perpanjang":
    include('.\pages\admin\perpanjang-transaksi.php');
    break;
  case "kembali":
    include('.\pages\admin\kembali-transaksi.php');
    break;
  case "pegawai":
    include('.\pages\admin\pegawai.php');
    break;
  case "exportToExcel":
    include('.\pages\export-excel.php');
    break;
  default:
    include('.\pages\home.php');
}