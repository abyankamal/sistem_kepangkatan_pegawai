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
        <h3 class="text-white shadow text-center card-header bg-info">Halaman Edit Jabatan</h3>
          <div class="card card-body">
            <h5 class="text-bold text-center">Silahkan Lakukan Edit Jabatan</h5>
            <?php
              include "../koneksi.php";
              $id = $_GET['id'];
              $query = mysqli_query($con, "SELECT * FROM jabatan WHERE id_jabatan = $id");
              while($data = mysqli_fetch_assoc($query)) :
            ?>
            <form action="proses/proseseditjabatan.php" method="post" class="row">
            <label class="form-label">Masukan Nama Jabatan</label>
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="id_jabatan" value="<?= $data['id_jabatan']?>" placeholder="Masukan Nama Jabatan" required>
                    <input type="text" class="form-control" name="nm_jabatan" value="<?= $data['nm_jabatan']?>" placeholder="Masukan Nama Jabatan" required>
                </div>
                <button type="submit" class="btn btn-info text-white">Edit Jabatan</button>
            </form>
            <?php endwhile; ?>
          </div>
        </div>
    </div>
</body>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>