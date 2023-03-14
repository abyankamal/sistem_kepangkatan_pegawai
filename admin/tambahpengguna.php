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
        <div class="col-md-10 mt-5 offset-md-1 card">
        <h3 class="text-white shadow text-center card-header bg-info">Halaman Tambah User</h3>
          <div class="card card-body">
            <h5 class="text-bold text-center">Silahkan Lakukan Tambah User</h5>
            <form action="proses/prosesinputpengguna.php" method="post" class="row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="namauser" placeholder="Masukan Nama SKPD" required>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Masukan Password User" required>
                </div>
                <label class="form-label">Pilih Level Akun</label>
                <div class="input-group mb-3">
                <select class="form-select" id="inputGroupSelect01" name="level" required>
                  <option value="admin">Admin</option>
                  <option value="pengguna">Pengguna</option>
                </select>
                </div>
                <button type="submit" class="btn btn-info">Tambah Akun</button>
            </form>
          </div>
        </div>
    </div>
</body>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>