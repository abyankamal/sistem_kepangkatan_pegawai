<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kepangkatan Pegawai (SKP) - Badan Kepegawaian Diklat Kabupaten Garut</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/DataTables/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/Buttons-2.2.3/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
</head>
<body>
<?php 
include("header.php");
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
            <div class="mb-3">
              <div class="mb-3">
              <form action="" method="post">
              <div class="row">
                        <div class="col-auto">
                          <label class="fs-5">Periode Surat :</label>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="date" class="form-control" name="tanggal1" value="<?= $_POST['tanggal1']?>" required>
                            </div>
                        </div>
                        <div class="col-auto">
                        -
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="date" class="form-control" name="tanggal2" value="<?=$_POST['tanggal2']?>" required>
                            </div>
                        </div>
                        <div class="col-md-1">
                        <button class="btn btn-primary form-control" name="tampilkan">Cari</button>
                        </div>
                        <div class="col-md-1">
                        <a href="datapegawai.php" class="btn btn-warning">Refresh</a>
                        </div>
                    </div>
              </form>
              </div>
              <div class="card">
                  <div class="row card-body">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Asal SKPD</label>
                        <select placeholder="Pilih Asal SKPD" id="nama_skpd" class="form-select" required>
                        <option value=""></option>
                        <?php
                        include "../koneksi.php";
                        $sql= mysqli_query($con, "SELECT nama_user FROM user WHERE level = 'pengguna'");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                          <option value="<?= $row['nama_user']?>"><?= $row['nama_user']?></option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                    <label>Pilih Pangkat Pegawai</label>
                    <select class="form-select" id="panggol" placeholder="Pilih Pangkat Pegawai" id="inputGroupSelect01" required>
                    <option value=""></option>
                    <option value="Juru Muda, I/a">Juru Muda, I/a</option>
                    <option value="Juru Muda Tingkat I, I/b">Juru Muda Tingkat I, I/b</option>
                    <option value="Juru, I/c">Juru, I/c</option>
                    <option value="Juru Tingkat I, I/d">Juru Tingkat I, I/d</option>
                    <option value="Pengatur Muda, II/a">Pengatur Muda, II/a</option>
                    <option value="Pengatur Muda Tingkat I, II/b">Pengatur Muda Tingkat I, II/b</option>
                    <option value="Pengatur, II/c">Pengatur, II/c</option>
                    <option value="Pengatur Tingkat I, II/d">Pengatur Tingkat I, II/d</option>
                    <option value="Penata Muda, III/a">Penata Muda, III/a</option>
                    <option value="Penata Muda Tingkat I, III/b">Penata Muda Tingkat I, III/b</option>
                    <option value="Penata, III/c">Penata, III/c</option>
                    <option value="Penata Tingkat I, III/d">Penata Tingkat I, III/d</option>
                    <option value="Pembina, IV/a">Pembina, IV/a</option>
                    <option value="Pembina Tingkat I, IV/b">Pembina Tingkat I, IV/b</option>
                    <option value="Pembina Utama Muda, IV/c">Pembina Utama Muda, IV/c</option>
                    <option value="Pembina Utama, IV/e">Pembina Utama, IV/e</option>
                    </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                    <label>Pilih Status Pengajuan</label>
                    <select class="form-select" id="status" placeholder="Pilih Status Pengajuan" id="inputGroupSelect01" required>
                    <option value=""></option>
                    <option value="Belum Diverifikasi">Belum Diverifikasi</option>
                    <option value="Verifikasi Diterima">Verifikasi Diterima</option>
                    <option value="Verifikasi Ditolak">Verifikasi Ditolak</option>
                    </select>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            <table class="table table-striped table-bordered" id="tabel" style="font-size: 14px;">
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
                  if(isset($_POST['tampilkan'])){
                  $tgl1 = $_POST['tanggal1'];
                  $tgl2 = $_POST['tanggal2'];
                  include "../koneksi.php";
                  $query = mysqli_query($con, "SELECT * FROM dapeg WHERE tanggal_surat BETWEEN '$tgl1' AND '$tgl2'");
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
                        <a href="verifikasidatapegawai.php?id=<?= $data['id_dapeg']?>" class="btn btn-sm btn-outline-warning" title="Verifikasi Data Pegawai"><i class="fa-solid fa-check-double"></i></a>
                        <a href="download.php?filename=<?= $data['file']?>" class="btn btn-sm btn-outline-info" title="Unduh File"><i class="fa-solid fa-download"></i></a>
                        </td>
                        <?php } ?>
                    </tr>
                  <?php }} else {?>
                  <?php
                  include '../koneksi.php';
                  $query = mysqli_query($con, "SELECT * FROM dapeg");
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
                        <a href="verifikasidatapegawai.php?id=<?= $data['id_dapeg']?>" class="btn btn-sm btn-outline-warning" title="Verifikasi Data Pegawai"><i class="fa-solid fa-check-double"></i></a>
                        <a href="download.php?filename=<?= $data['file']?>" class="btn btn-sm btn-outline-info" title="Unduh File"><i class="fa-solid fa-download"></i></a>
                        </td>
                        <?php } ?>
                    </tr>
                  <?php }} ?>
                </tbody>
            </table>
            </div>
          </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/DataTables/js/jquery.dataTables.min.js"></script>
<script src="../assets/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
<script src="../assets/Buttons-2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="../assets/DataTables/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/JSZip-2.5.0/jszip.min.js"></script>
<script src="../assets/Buttons-2.2.3/js/buttons.html5.min.js"></script>
<script src="../assets/Buttons-2.2.3/js/buttons.print.min.js"></script>
<script src="../assets/fontawesome/js/all.min.js"></script>
<script>
    $(document).ready(function () {
    let table = $('#tabel').DataTable({
      columnDefs:{
            "searchable": false,
            "orderable": false,
            "targets": 0
      },
      dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      buttons: [
        {
          extend: "excel",
          orientation: 'landscape',
          pageSize: 'LEGAL',
          title: "Rekap Data Pegawai",
          exportOptions: {
              columns: [0,1,2,3,4,5,6,7,8,9,10,11]
          },
          customize: function ( xlsx ) {
            var sheet = xlsx.xl.worksheets['sheet1.xml'];
            $( 'row c', sheet ).attr( 's', '25' );
          },
        },
        {
          extend: "print",
          orientation: 'landscape',
          pageSize: 'LEGAL',
          title: "Rekap Data Pegawai",
          exportOptions: {
              columns: [0,1,2,3,4,5,6,7,8,9,10,11]
          },
        },
      ],
      "ordering" : false,
      "scrollX": true,
      "scrollY": "300px",
      "scrollCollapse": true,
      drawCallback: function() {
  var hasRows = this.api().rows({ filter: 'applied' }).data().length > 0;
  $('.buttons-excel')[0].style.visibility = hasRows ? 'visible' : 'hidden'
  var hasRows1 = this.api().rows({ filter: 'applied' }).data().length > 0;
  $('.buttons-print')[0].style.visibility = hasRows1 ? 'visible' : 'hidden'
}
    });
    $('#nama_skpd').on('change', function(){
        table.columns(2).search($(this).val()).draw()
    });
    $('#panggol').on('change', function(){
        table.columns(8).search($(this).val()).draw()
    });
    $('#status').on('change', function(){
        table.columns(11).search($(this).val()).draw()
    });
  });
</script>
</html>