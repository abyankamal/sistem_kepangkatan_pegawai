<?php
session_start();
include "../koneksi.php";

// input data ke database
$id = $_GET['id'];

$sql = "DELETE FROM jabatan WHERE id_jabatan = '$id'";
mysqli_query($con, $sql);
echo "<script>alert('Jabatan Berhasil Dihapus');
document.location.href = 'daftarjabatan.php';
</script>"
?>