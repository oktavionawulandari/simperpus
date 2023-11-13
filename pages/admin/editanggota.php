<?php
require 'koneksi.php';
$dataanggota = mysqli_query($conn, "SELECT * FROM anggota WHERE id = '".$_GET['id']."' ");
	if(mysqli_num_rows($dataanggota) == 0){
		echo '<script>window.location="anggota.php"</script>';
	}
	$d = mysqli_fetch_object($dataanggota);
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Halaman Anggota</title>
</head>
<body>
    
<nav class="navbar navbar-dark fixed-top" style="background-color: #2383b6; 
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" style="color:#FFF"> Sistem Informasi Manajemen Perpustakaan </a>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          
          <div class="offcanvas-body">
            <ul class="navbar-brand justify-content-end flex-grow-1 pe-3" > 
              <li class="nav-itm">
              <center> <img src="asset/user.png" width="50"/> </center>
              <center><p class="text-black">username </p></center>

       <a class="nav-link active" aria-current="page" href="index.php"><img src="asset/home.png" width="30" height="30">&nbsp Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><img src="asset/speedometer.png" width="30" height="30">&nbsp Dashboard</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="anggota.php"><img src="asset/anggota.png" width="30" height="30">&nbsp Anggota</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="buku.php"><img src="asset/book.png" width="30" height="30">&nbsp Buku</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><img src="asset/transaction.png" width="30" height="30">&nbsp Transaksi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><img src="asset/user.png" width="30" height="30">&nbsp Pegawai</a>
                </li>
                <li class="nav-item" >
                  <a class="nav-link" href="#">Logout</a>
        </div>
        </div>
    </nav>
    <br><br><br><br>

    <div class="container p-4">
    <div class="col col-md-12">
        <div class="card">
            <div class="card-header text-light fs-5" style="background-color: #2383b6;">
                Edit Anggota
                </div>

                <div class="card-body">
                <form action="" method="post">
                <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" style="background-color: #eee;" value="<?php echo $d->nim ?>" readonly>
                </div>
             
                <form action="" method="post">
                <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" style="background-color: #eee;" value="<?php echo $d->nama ?>" required>
                </div>

                <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" style="background-color: #eee;" value="<?php echo $d->tanggal_lahir ?>" required>
                </div>
                
                <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="radio-inline" >
             	  <input type="radio" name="kelamin" value="<?php echo $d->jenis_kelamin ?>"> Laki-Laki 
            	  <input type="radio" name="kelamin" value="<?php echo $d->jenis_kelamin ?>"> Perempuan

                <div class="form-group">
                <div class="mb-3">
                <label class="form-label">Jurusan </label>
                <select class="form-control" name="jurusan"style="background-color: #eee;" value="<?php echo $d->jurusan ?>" required> 
                <option value="User" selected="selected">-- Pilih Satu --</option>
                <option>Teknik Sipil</option> 
                <option>Teknik Mesin</option> 
                <option>Teknik Elektro</option> 
                <option>Akutansi</option> 
                <option>Administrasi Niaga</option>
                <option>Pariwisata</option>
                </select>
                </div>

                <div class="form-group">
                <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <select class="form-control" name="program_studi"style="background-color: #eee;" value="<?php echo $d->program_studi ?>" required>
                <option value="User" selected="selected">-- Pilih Satu --</option> 
                <option>D3 Administrasi Bisnis</option> 
                <option>D3 Akutansi</option> 
                <option>D3 Manajemen Informatika</option> 
                <option>D3 Perhotelan</option> 
                <option>D3 Teknik Listrik</option>
                <option>D3 Teknik Mesin</option>
                <option>D3 Usaha Perjalan Wisata</option>
                <option>D4 Akutansi Manajerial</option>
                <option>D4 Manajemen Bisnis Internasional</option>
                <option>D4 Manajemen Bisnis Pariwisata</option>
                <option>D4 Manajemen Proyek Konstruksi</option>
                <option>D4 Teknik Otomasi</option>
                <option>D4 Teknologi Rekayasa Utilitas</option>
                </select>
            </div>

            <input type="submit" name="submit" value="Submit" class="btn btn-primary me-md-2">
            <a href="anggota.php?page=anggota"><button type="button" class="btn btn-outline-secondary">Batal</button>
          </form>
        </div>

            
				<?php 
					if(isset($_POST['submit'])){

            $nim = ucwords($_POST['nim']);
						$nama = ucwords($_POST['nama']);
            $tanggal_lahir = ucwords($_POST['tanggal_lahir']);
            $jenis_kelmain = ucwords($_POST['jenis_kelamin']);
            $jurusan = ucwords($_POST['jurusan']);
            $program_studi = ucwords($_POST['program_studi']);

						$update = mysqli_query($conn, "UPDATE anggota SET 
											nama = '".$nama."',
                      tanggal_lahir = '".$tanggal_lahir."',
                      jurusan = '".$jurusan."',
                      program_studi = '".$program_studi."'
											WHERE id = '".$d->id."' ");

						if($update){
							echo '<script>alert("Edit data berhasil")</script>';
							echo '<script>window.location="anggota.php"</script>';
						}else {
							echo 'gagal '.mysqli_error($conn);
						}

					}
				 ?>
        </div>
		</div>
	</div>
</body>
</html>