<?php
session_start();
$options = [
    'cost' => 10,
];
include "../../koneksi.php";

// input data ke database
$id = $_POST['id_user'];
$fullname = $_POST["namauser"];
$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT, $options);

if($_POST["password"] == ''){
    $sql = "UPDATE user SET nama_user = '$fullname',username = '$username' WHERE id_user = '$id'";
    mysqli_query($con, $sql);
    echo "<script>alert('User Sukses Di Edit Tanpa Merubah Password');
    document.location.href = '../daftaruser.php';
    </script>";
}else{
    $sql = "UPDATE user SET nama_user = '$fullname',username = '$username',password = '$password' WHERE id_user = '$id'";
    mysqli_query($con, $sql);
    echo "<script>alert('User Sukses Di Edit Dengan Perubahan Password');
    document.location.href = '../daftaruser.php';
    </script>";
}
?>