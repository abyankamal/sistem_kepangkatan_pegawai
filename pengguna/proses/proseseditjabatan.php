<?php
session_start();

include "../../koneksi.php";

$id = $_POST['id_jabatan'];
$nmjabatan = mysqli_real_escape_string($con, $_POST['nm_jabatan']);

$sql = "UPDATE jabatan SET nm_jabatan='$nmjabatan' WHERE id_jabatan='$id";

mysqli_query($con, $sql);

echo "<script>alert('Sukses Mengedit Jabatan');
document.location.href = '../daftarjabatan.php';
</script>";
?>