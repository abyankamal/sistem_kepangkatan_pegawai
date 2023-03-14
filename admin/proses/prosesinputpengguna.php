<?php
session_start();
$options = [
    'cost' => 10,
];
include "../../koneksi.php";

// input data ke database

$fullname = $_POST["namauser"];
$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT, $options);
$level = $_POST["level"];

$sql = "INSERT INTO user (nama_user, username, password, level) VALUES ('$fullname', '$username', '$password',  '$level')";
mysqli_query($con, $sql);
echo "<script>alert('Akun Sukses Ditambahkan');
 document.location.href = '../daftaruser.php';
 </script>"
?>