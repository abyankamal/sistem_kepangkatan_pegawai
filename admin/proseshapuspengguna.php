<?php
session_start();
include "../koneksi.php";

// input data ke database
$id = $_GET['id'];

$sql = "DELETE FROM user WHERE id_user = '$id'";
mysqli_query($con, $sql);
echo "<script>alert('User Berhasil Dihapus');
document.location.href = 'daftaruser.php';
</script>"
?>