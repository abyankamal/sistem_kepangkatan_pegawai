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
        <h3 class="text-white shadow text-center card-header bg-info">Halaman Tambah Jabatan</h3>
          <div class="card card-body">
            <h5 class="text-bold text-center">Silahkan Lakukan Tambah Jabatan</h5>
            <form action="proses/prosesinputjabatan.php" method="post" class="row">
            <label class="form-label">Masukan Nama Jabatan</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nm_jabatan" placeholder="Masukan Nama Jabatan" required>
                    <input type="hidden" class="form-control" value="<?= $_SESSION['nama_user']?>" name="asal_skpd" placeholder="Masukan Username" required>
                </div>
                <button type="submit" class="btn btn-info text-white">Tambah Jabatan</button>
            </form>
          </div>
        </div>
    </div>
</body>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>