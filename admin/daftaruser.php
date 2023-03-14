<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kepangkatan Pegawai (SKP) - Badan Kepegawaian Diklat Kabupaten Garut</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/DataTables/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
</head>
<body>
<?php include("header.php")?>
<div class="container mb-5">
        <div class="col-md-10 mt-5 offset-md-1 card">
        <h3 class="text-white shadow text-center card-header bg-info">Halaman Data Pengguna</h3>
          <div class="card-body">
            <a href="tambahpengguna.php" class="btn btn-info btn-sm mb-3 text-white">Tambah Pengguna</a>
            <?php
            include '../koneksi.php';
            $query = mysqli_query($con, "SELECT * FROM user where level = 'pengguna'");
            ?>
            <table class="table table-striped table-bordered" style="text-align: center;" id="tabel">
                <thead style="text-align: center;">
                    <tr>
                        <td>No</td>
                        <td>Nama SKPD</td>
                        <td>Username</td>
                        <td>Level Akun</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;
                  while($data = mysqli_fetch_assoc($query)) :
                  ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $data['nama_user'] ?></td>
                        <td><?= $data['username'] ?></td>
                        <td><?= $data['level'] ?></td>
                        <td>
                            <a href="editdatapengguna.php?id=<?= $data['id_user']?>" class="btn btn-sm btn-outline-warning" title="Edit Data User"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="proseshapuspengguna.php?id=<?= $data['id_user']?>" class="btn btn-sm btn-outline-danger" title="Hapus Pengguna"
                            onclick="return confirm('Apakah anda yakin ingin menghapus <?= $data['nama_user'] ?> ?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/DataTables/js/jquery.dataTables.min.js"></script>
<script src="../assets/DataTables/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/fontawesome/js/all.min.js"></script>
<script>
  $(document).ready(function() {
    $('#tabel').DataTable({
      "scrollY": "300px",
      "scrollCollapse": true,
      "ordering": false
    });
  })
</script>
</html>