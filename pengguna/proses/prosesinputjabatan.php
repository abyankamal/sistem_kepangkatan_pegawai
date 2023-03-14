<?php
session_start();

include "../../koneksi.php";

$nmjabatan = mysqli_real_escape_string($con, $_POST['nm_jabatan']);
$asalskpd = mysqli_real_escape_string($con, $_POST['asal_skpd']);

$sql = "INSERT INTO jabatan (nm_jabatan, asal_skpd) VALUES ('$nmjabatan', '$asalskpd')";

mysqli_query($con, $sql);

echo "<script>alert('Sukses Menambahkan Jabatan');
document.location.href = '../daftarjabatan.php';
</script>";
?>