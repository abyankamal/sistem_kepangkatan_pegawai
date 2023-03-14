<?php
  session_start();

  if(isset($_SESSION['level'])){
    if((time() - $_SESSION["last_login_timestamp"]) > 3600){
      echo "<script>alert('Maaf Sesi Anda Sudah Habis, Silahkan Login Dulu');
      document.location.href = '../logout.php';
      </script>";
      }else{
        $_SESSION["last_login_timestamp"] = time();
      }
  }else{
    echo "<script>alert('Maaf Anda Belum Login, Silahkan Login Dulu');
    document.location.href = '../logout.php';
    </script>";
  }
  ?>
    <!-- Header -->
    <header>
    <nav class="navbar navbar-dark bg-info h1 mb-0" role="navigation">
    <div class="container-fluid">
    <a href="#" class="navbar-brand">
    <img src="../assets/images/Lambang_Kabupaten_Garut.png" height="60" width="45">
    <span>Sistem Kepangkatan Pegawai (SKP)</span>
    </a>
    </div>
    </nav>
    </header>
    <nav class="navbar bg-secondary bg-opacity-75">
    <div class="container-fluid">
    <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="1" id="offcanvasNavbar">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?= $_SESSION['username'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <h3 class="m-auto text-bold" aria-current="page" href="#">Menu SKP</h3>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end pe-2">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <a class="nav-link active" aria-current="page" href="datapegawai.php">Daftar Pegawai</a>
            <a class="nav-link active" aria-current="page" href="daftarjabatan.php">Daftar Jabatan</a>
            <a class="nav-link active" aria-current="page" href="edituser.php">Edit User</a>
            <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
          </li>
      </div>
    </div>
  </div>
</nav>