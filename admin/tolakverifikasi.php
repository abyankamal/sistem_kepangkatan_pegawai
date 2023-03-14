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
        <h3 class="text-white shadow text-center card-header bg-info">Halaman Menolak Verifikasi Pegawai</h3>
          <div class="card card-body">
            <h5 class="text-bold text-center">Silahkan Masukan Keterangan Menolak Verifikasi</h5>
            <?php
              include "../koneksi.php";
              $id = $_GET['id'];
              $query = mysqli_query($con, "SELECT * FROM dapeg WHERE id_dapeg = $id");
              while($data = mysqli_fetch_assoc($query)) :
            ?>
            <form action="proses/verifikasiditolak.php" method="post" class="row" enctype="multipart/form-data">
                <div class="input-group mb-3">
                <input type="hidden" value="<?= $data['id_dapeg']?>" name="id_dapeg">
                    <textarea name="keterangan" class="form-control" placeholder="Masukan Keterangan Verifikasi" required rows="3"></textarea>
                </div>
                <button class="btn btn-info">Kirim</button>
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