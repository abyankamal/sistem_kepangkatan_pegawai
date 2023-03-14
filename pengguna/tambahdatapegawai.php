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
        <h3 class="text-white shadow text-center card-header bg-info">Halaman Tambah Data Pegawai</h3>
          <div class="card card-body">
            <h5 class="text-bold text-center">Silahkan Lakukan Tambah Pegawai</h5>
            <form action="proses/prosesinputpegawai.php" method="post" class="row" enctype="multipart/form-data">
                <label class="form-label">Masukan Nomor Surat</label>
                <div class="input-group mb-3">
                    <input type="text" name="no_surat" class="form-control" placeholder="Masukan Nomor Surat" required>
                </div>
                <label class="form-label">Masukan Tanggal Surat</label>
                <div class="input-group mb-3">
                    <input type="date" name="tanggal_surat" class="form-control" placeholder="Masukan Tanggal Surat" required>
                </div>
                <label class="form-label">Masukan Asal SKPD</label>
                <div class="input-group mb-3">
                    <input type="text" name="nama_skpd" value="<?= $_SESSION['nama_user']?>" class="form-control" placeholder="Masukan Asal SKPD" readonly>
                </div>
                <label class="form-label">Masukan Nama Pegawai</label>
                <div class="input-group mb-3">
                    <input type="text" name="nm_pegawai" class="form-control" placeholder="Masukan Nama Pegawai" required>
                </div>
                <label class="form-label">Masukan NIP Pegawai</label>
                <div class="input-group mb-3">
                    <input type="text" name="nip" class="form-control" minlength="18" maxlength="18" placeholder="Masukan NIP Pegawai" onkeyup="validAngka(this)" required>
                </div>
                <label class="form-label">Masukan Tanggal Lahir Pegawai</label>
                <div class="input-group mb-3">
                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Surat" required>
                </div>
                <label class="form-label">Masukan Pangkat Pegawai</label>
                <div class="input-group mb-3">
                <select class="form-select" name="panggol" placeholder="Pilih Pangkat Pegawai" id="inputGroupSelect01" required>
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
                <label class="form-label">Masukan Tanggal Pangkat</label>
                <div class="input-group mb-3">
                    <input type="date" name="tanggol" class="form-control" placeholder="Masukan Tanggal Surat" required>
                </div>
                <label class="form-label">Masukan Jabatan Lama</label>
                <div class="input-group mb-3">
                <select placeholder="Pilih Asal SKPD" name="jbtlm" class="form-select" required>
                        <?php
                        include "../koneksi.php";
                        $skpd = $_SESSION['nama_user'];
                        $sql= mysqli_query($con, "SELECT nm_jabatan FROM jabatan WHERE asal_skpd = '$skpd'");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                          <option value="<?= $row['nm_jabatan']?>"><?= $row['nm_jabatan']?></option>
                        <?php } ?>
                </select>
                </div>
                <label class="form-label">Masukan Jabatan Baru</label>
                <div class="input-group mb-3">
                <select placeholder="Pilih Asal SKPD" name="jbtbr" class="form-select" required>
                        <?php
                        include "../koneksi.php";
                        $skpd = $_SESSION['nama_user'];
                        $sql= mysqli_query($con, "SELECT nm_jabatan FROM jabatan WHERE asal_skpd = '$skpd'");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                          <option value="<?= $row['nm_jabatan']?>"><?= $row['nm_jabatan']?></option>
                        <?php } ?>
                        </select>
                </div>
                <label class="form-label">Masukan Usulan Pangkat</label>
                <div class="input-group mb-3">
                <textarea name="usulan" class="form-control" placeholder="Masukan Usulan Pangkat" required rows="3"></textarea>
                </div>
                <label class="form-label">Masukan File Surat</label>
                <label class="fs-6">* file yang diupload maksimal 10 mb</label>
                <div class="input-group mb-3">
                <input type="file" name="file" class="form-control" accept="application/pdf" required> 
                </div>
                <button class="btn btn-info">Kirim</button>
            </form>
          </div>
        </div>
    </div>
    <footer>
        
    </footer>
</body>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    function validAngka(a)
{
	if(!/^[0-9.]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1000);
	}
}
</script>
</html>