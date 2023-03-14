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
        <h3 class="text-white shadow text-center card-header bg-info">Halaman Data Jabatan</h3>
          <div class="card-body">
            <a href="tambahjabatan.php" class="btn btn-info btn-sm mb-3 text-white">Tambah Jabatan</a>
            <?php
            include '../koneksi.php';
            $skpd = $_SESSION['nama_user'];
            $query = mysqli_query($con, "SELECT * FROM jabatan where asal_skpd = '$skpd'");
            $no=1;
            ?>
            <table class="table table-striped table-bordered" style="text-align: center;" id="tabel">
                <thead style="text-align: center;">
                    <tr>
                        <td>No</td>
                        <td>Nama Jabatan</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  while($data = mysqli_fetch_assoc($query)) :
                  ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $data['nm_jabatan'] ?></td>
                        <td>
                            <!-- <a href="editdatajabatan.php?id=<?= $data['id_jabatan']?>" class="btn btn-sm btn-outline-warning" title="Edit Data User"><i class="fa-solid fa-pen-to-square"></i></a> -->
                            <a href="proseshapusjabatan.php?id=<?= $data['id_jabatan']?>" class="btn btn-sm btn-outline-danger" title="Hapus Pengguna"
                            onclick="return confirm('Apakah anda yakin ingin menghapus <?= $data['nm_jabatan'] ?> ?')"><i class="fa-solid fa-trash"></i></a>
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
      "ordering": false,
      // "language": {
      //   "url" : "../assets/id.json",
      //   "sEmptyTable": "Tidads"
      // }
    });
  })
</script>
</html>