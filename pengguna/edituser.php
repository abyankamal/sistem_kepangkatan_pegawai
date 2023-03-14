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
            <form action="proses/prosesedituser.php" method="post" class="row">
            <?php
            include "../koneksi.php";
            $id = $_SESSION['nama_user'];
            $query = "SELECT * FROM user WHERE nama_user = '$id'";
            $getresult = mysqli_query($con, $query);
            if(mysqli_num_rows($getresult) > 0) {
              while($user = mysqli_fetch_array($getresult)){
                ?>
                <label class="form-label">Masukan Asal SKPD</label>
                <div class="input-group mb-3">
                    <input type="hidden" value="<?php echo @$user['id_user']?>" name="id_user">
                    <input type="text" name="namauser" value="<?php echo @$user['nama_user']?>" class="form-control" placeholder="Masukan Asal SKPD" readonly>
                </div>
                <label class="form-label">Masukan Username</label>
                <div class="input-group mb-3">
                    <input type="text" name="username" value="<?php echo @$user['username']?>" class="form-control" placeholder="Masukan Username">
                </div>
                <label class="form-label">Masukan Password</label>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Masukan Password User">
                </div>
                <?php
              }
            }
            ?>
            <button class="btn btn-info">Kirim</button>
            </form>
          </div>
        </div>
    </div>
    <footer>
        
    </footer>
</body>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>