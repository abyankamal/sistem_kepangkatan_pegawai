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
        <h3 class="text-white shadow text-center card-header bg-info">Halaman Edit User</h3>
          <div class="card card-body">
            <h5 class="text-bold text-center">Silahkan Lakukan Edit User</h5>
            <?php
              include "../koneksi.php";
              $id = $_GET['id'];
              $query = mysqli_query($con, "SELECT * FROM user WHERE id_user = $id");
              while($data = mysqli_fetch_assoc($query)) :
            ?>
            <form action="proses/proseseditpengguna.php" method="post" class="row">
                <label class="form-label">Nama SKPD</label>
                <div class="input-group mb-3">
                    <input type="hidden" value="<?= $data['id_user']?>" name="id_user">
                    <input type="text" value="<?= $data['nama_user'];?>" class="form-control" name="namauser" placeholder="Masukan Nama SKPD" required>
                </div>
                <label class="form-label">Username</label>
                <div class="input-group mb-3">
                    <input type="text" value="<?= $data['username'];?>" class="form-control" name="username" placeholder="Masukan Username" required>
                </div>
                <label class="form-label">Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Masukan Password User">
                </div>
                <button type="submit" class="btn btn-info">Kirim</button>
            </form>
            <?php endwhile; ?>
          </div>
        </div>
    </div>
    <footer>
        
    </footer>
</body>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>