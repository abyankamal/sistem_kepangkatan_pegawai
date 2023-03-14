<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistem Kepangkatan Pegawai (SKP) - Badan Kepegawaian Diklat Kabupaten Garut</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php include("header.php")?>
    <div class="container mb-5">
        <div class="col-md-10 mt-5 offset-md-1 card">
        <h3 class="text-white shadow text-center card-header bg-info">Halaman Verifikasi Data Pegawai</h3>
          <div class="card card-body">
            <h5 class="text-bold text-center">Silahkan Lakukan Verifikasi Data Pegawai</h5>
            <?php
              include "../koneksi.php";
              $id = $_GET['id'];
              $query = mysqli_query($con, "SELECT * FROM dapeg WHERE id_dapeg = $id");
              while($data = mysqli_fetch_assoc($query)) :
            ?>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Nomor Surat</td>
                        <td><?= $data['no_surat'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Surat</td>
                        <td><?= $data['tanggal_surat'] ?></td>
                    </tr>
                    <tr>
                        <td>Asal SKPD</td>
                        <td><?= $data['nama_skpd'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pegawai</td>
                        <td><?= $data['nm_pegawai'] ?></td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td><?= $data['nip'] ?></td>
                    </tr>
                    <tr>
                        <td>Pangkat Pegawai</td>
                        <td><?= $data['panggol'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pangkat</td>
                        <td><?= $data['tanggol'] ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan Lama</td>
                        <td><?= $data['jbtlm'] ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan Baru</td>
                        <td><?= $data['jbtbr'] ?></td>
                    </tr>
                    <tr>
                        <td>Usulan</td>
                        <td><?= $data['usulan'] ?></td>
                    </tr>
                    <tr>
                        <td>File Surat</td>
                        <td><a href="viewfile.php?filename=<?=$data['file'];?>" target="_blank"><b class="text-white btn btn-info">Lihat File</b></a></td>
                    </tr>
                </tbody>
            </table>
            <center>
            <a href="terimaverifikasi.php?id=<?= $data['id_dapeg']?>" class="btn btn-success col-2 me-2">Setujui</a>
            <a href="tolakverifikasi.php?id=<?= $data['id_dapeg']?>" class="btn btn-danger col-2">Tolak</a>
            </center>
            <?php endwhile; ?>
          </div>
        </div>
    </div>
</body>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>