<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Usulan Pangkat - Badan Kepegawaian Diklat Kabupaten Garut</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/DataTables/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
</head>
<body>
<?php include("header.php");
function hitungusia($tgllahir){
  $birthday = new DateTime($tgllahir);
  $today = new DateTime('today');
  $y = $today->diff($birthday)->y;
  $m = $today->diff($birthday)->m;
  $d = $today->diff($birthday)->d;
  return $y." tahun ".$m." bulan ".$d." hari";
}
function tgl_indo($tanggal){
  $bulan = array (
  1 =>'Januari',
  'Februari',
  'Maret',
  'April',
  'Mei',
  'Juni',
  'Juli',
  'Agustus',
  'September',
  'Oktober',
  'November',
  'Desember'
  );
  $pecahkan = explode('-', $tanggal);  
  return $pecahkan[2] . ' ' .$bulan[ (int)$pecahkan[1]]. ' ' .$pecahkan[0];
}
?>
<div class="container mb-5">
        <div class="col-lg-12 mt-5 card">
        <h3 class="text-white shadow text-center card-header bg-info">Halaman Data Pegawai</h3>
          <div class="card-body">
            <a href="tambahdatapegawai.php" class="btn btn-info btn-sm mb-3 text-white">Tambah Pegawai</a>
            <table class="table table-striped table-bordered" style="font-size: 14px;" id="tabel">
                <thead class="fw-bold">
                    <tr>
                        <td>No</td>
                        <td>No Surat</td>
                        <td>Tanggal Surat</td>
                        <td>Nama SKPD</td>
                        <td>Nama Pegawai Yang Diusulkan</td>
                        <td>NIP Pegawai Yang Diusulkan</td>
                        <td>Usia Pegawai</td>
                        <td>Pangkat / Golongan Pegawai</td>
                        <td>Tanggal Pangkat / Golongan Pegawai</td>
                        <td>Jabatan Lama</td>
                        <td>Jabatan Baru</td>
                        <td>Usulan</td>
                        <td>Status</td>
                        <td>Keterangan</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody class="fw-light">
                  <?php
                  include '../koneksi.php';
                  $namaskpd = $_SESSION['nama_user'];
                  $query = mysqli_query($con, "SELECT * FROM dapeg WHERE nama_skpd = '$namaskpd'");
                  $no=1;
                  while($data = mysqli_fetch_assoc($query)) {
                  ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $data['no_surat'] ?></td>
                        <td><?= tgl_indo($data['tanggal_surat']) ?></td>
                        <td><?= $data['nama_skpd'] ?></td>
                        <td><?= $data['nm_pegawai'] ?></td>
                        <td><?= $data['nip'] ?></td>
                        <td><?= hitungusia($data['tgl_lahir']) ?></td>
                        <td><?= $data['panggol'] ?></td>
                        <td><?= tgl_indo($data['tanggol']) ?></td>
                        <td><?= $data['jbtlm'] ?></td>
                        <td><?= $data['jbtbr'] ?></td>
                        <td><?= $data['usulan'] ?></td>
                        <?php if($data['status'] == 'Verifikasi Diterima'){?>
                        <td><?= $data['status'] ?></td>
                        <td><?= $data['keterangan'] ?></td>
                        <td>
                        <a href="download.php?filename=<?= $data['file']?>" class="btn btn-sm btn-outline-info" title="Unduh File"><i class="fa-solid fa-download"></i></a>
                        </td>
                        <?php } else {?>
                        <td><?= $data['status'] ?></td>
                        <td><?= $data['keterangan'] ?></td>
                        <td>
                        <a href="editdatapegawai.php?id=<?= $data['id_dapeg']?>" class="btn btn-sm btn-outline-warning" title="Edit Data Pegawai"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="download.php?filename=<?= $data['file']?>" class="btn btn-sm btn-outline-info" title="Unduh File"><i class="fa-solid fa-download"></i></a>
                        </td>
                        <?php } ?>
                  <?php }?>
                </tbody>
            </table>
            </div>
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
      "scrollX": true,
      "scrollY": "300px",
      "scrollCollapse": true,
      "ordering" : false,
      // "language": {
      //   "url" : "../assets/id.json",
      //   "sEmptyTable": "Tidads"
      // }
    });
  })
</script>
</html>