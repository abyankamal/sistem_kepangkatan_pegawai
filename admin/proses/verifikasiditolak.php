<?php
session_start();

include "../../koneksi.php";

$id = mysqli_real_escape_string($con,$_POST['id_dapeg']); 
$keterangan = mysqli_real_escape_string($con,$_POST['keterangan']); 

$sql = "UPDATE dapeg SET status = 'Verifikasi Ditolak', keterangan = '$keterangan' WHERE id_dapeg = '$id'";

mysqli_query($con, $sql);

echo "<script>alert('Sukses Menambahkan Keterangan Verifikasi');
document.location.href = '../datapegawai.php';
</script>"
?>