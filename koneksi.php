<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "database_sup";

$con = mysqli_connect($server, $username, $password, $database);

// cek koneksi 
if(!$con) {
    die(mysqli_error($con));
    echo "Koneksi Sukses";
}
?>