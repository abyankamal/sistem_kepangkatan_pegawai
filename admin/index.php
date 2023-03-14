<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kepangkatan Pegawai (SKP) - Badan Kepegawaian Diklat Kabupaten Garut</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
</head>
<body>
<?php include("header.php")?>
    <div class="container mb-5">
        <div class="col-md-10 mt-5 offset-md-1">
          <div class="card card-body bg-white pt-5">
          <h1 class="text-muted text-center border card-header">Selamat Datang, <?= $_SESSION['nama_user'];?></h1>
          <div class="row gx-5 p-5 d-flex justify-content-center">
          <?php
          include "../koneksi.php";
          $sql1 = "SELECT * FROM dapeg";
          $query1 = mysqli_query($con, $sql1);
          $jumlah1 = mysqli_num_rows($query1);
          ?>
          <div class="card card-body col-3 pe-3 me-3 position-relative">
            <h2 class="fs-1 font-bold text-info"><?= $jumlah1 ?></h2>
            <p class="fs-4 text-muted">Jumlah Data Pegawai</p>
            <p class="fs-6">Yang Terdata</p>
            <i class="fa fa-solid fa-people-group fa-5x position-absolute top-50 end-0 translate-middle-y"></i>
          </div>
          <?php
          include "../koneksi.php";
          $sql2 = "SELECT * FROM user where level = 'pengguna'";
          $query2 = mysqli_query($con, $sql2);
          $jumlah2 = mysqli_num_rows($query2);
          ?>
          <div class="card col-3 pe-3 card-body">
          <h2 class="fs-1 font-bold text-info"><?= $jumlah2 ?></h2>
            <p class="fs-4 text-muted">Jumlah Data Pengguna</p>
            <p class="fs-6">Yang Terdaftar</p>
            <i class="fa fa-solid fa-user-group fa-5x position-absolute top-50 end-0 translate-middle-y"></i>
          </div>
          </div>
          <div class="row gx-5 p-5 d-flex justify-content-center">
          <?php
          include "../koneksi.php";
          $sql3 = "SELECT * FROM dapeg where status = 'Verifikasi Diterima'";
          $query3 = mysqli_query($con, $sql3);
          $jumlah3 = mysqli_num_rows($query3);
          ?>
          <div class="card col-3 pe-3 me-3 card-body">
          <h2 class="fs-1 font-bold text-info"><?= $jumlah3 ?></h2>
            <p class="fs-6 text-muted">Jumlah Data Pegawai</p>
            <p class="fs-6">Terverifikasi</p>
            <i class="fa fa-solid fa-user-group fa-3x position-absolute top-50 end-0 translate-middle-y"></i>
          </div>
          <?php
          include "../koneksi.php";
          $sql4 = "SELECT * FROM dapeg where status = 'Verifikasi Ditolak'";
          $query4 = mysqli_query($con, $sql4);
          $jumlah4 = mysqli_num_rows($query4);
          ?>
          <div class="card col-3 pe-3 me-3 card-body">
          <h2 class="fs-1 font-bold text-info"><?= $jumlah4 ?></h2>
            <p class="fs-6 text-muted">Jumlah Data Pegawai</p>
            <p class="fs-6">Ditolak</p>
            <i class="fa fa-solid fa-user-group fa-3x position-absolute top-50 end-0 translate-middle-y"></i>
          </div>
          <?php
          include "../koneksi.php";
          $sql5 = "SELECT * FROM dapeg where status = 'Belum Diverifikasi'";
          $query5 = mysqli_query($con, $sql5);
          $jumlah5 = mysqli_num_rows($query5);
          ?>
          <div class="card col-3 pe-3 card-body">
          <h2 class="fs-1 font-bold text-info"><?= $jumlah5 ?></h2>
            <p class="fs-6 text-muted">Jumlah Data Pegawai</p>
            <p class="fs-6">Belum Terverifikasi</p>
            <i class="fa fa-solid fa-user-group fa-3x position-absolute top-50 end-0 translate-middle-y"></i>
          </div>
          </div>
          </div>
        </div>
    </div>
</body>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/fontawesome/js/all.min.js"></script>
</html>