<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kepangkatan Pegawai (SKP) - Badan Kepegawaian Diklat Kabupaten Garut</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php include("header.php")?>
    <div class="container mb-5">
        <div class="col-md-10 mt-5 offset-md-1">
          <div class="card card-body bg-white pt-5">
          <h1 class="text-muted text-center border card-header">Selamat Datang, <?= $_SESSION['nama_user'];?></h1>
          <div class="row gx-5 p-5 d-flex justify-content-center">
          <p class="text-bold">Berikut Ini Adalah Cara Penggunaan Sistem Kepangkatan Pegawai :</p>
          <div class="card card-body">
          <center>
          <iframe width="560" height="315" src="../assets/videos/Muhammad A4.mp4" frameborder="5px" allowfullscreen></iframe>
          </iframe>
          </center>
          </div>
          </div>
          </div>
        </div>
        <div class="col-md-10 mt-5 offset-md-1">
          <div class="card card-body bg-white pt-5">
          <h1 class="text-muted text-center border card-header">Notifikasi</h1>
          <div class="row gx-5 p-5 d-flex justify-content-center">
          <div class="card card-body">
          <center>
            <?php
            include "../koneksi.php";
            $nmdapeg = $_SESSION['nama_user'];
            $tampil = mysqli_query($con, "SELECT * FROM dapeg WHERE nama_skpd='$nmdapeg' and status='Verifikasi Ditolak' order by id_dapeg limit 5");
            while($data = mysqli_fetch_array($tampil)){
            ?>
          <div class="alert alert-danger" role="alert">
          <strong><?php echo $data['nm_pegawai']; ?></strong>, Tidak Lolos Verifikasi
          </div>
          <?php } ?>
          </center>
          </div>
          </div>
          </div>
        </div>
    </div>
</body>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>