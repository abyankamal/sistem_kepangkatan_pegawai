<?php
session_start();
include "koneksi.php";

$username = addslashes(trim($_POST['username']));
$password = addslashes(trim($_POST['password']));

if(!empty($username) || !empty($password)){
    $seq=mysqli_query($con,"SELECT * FROM user where username='$username'");
    $data=mysqli_fetch_array($seq);
    $jml=mysqli_num_rows($seq);
    if($jml>0){
      if(password_verify($password, $data['password'])) {
         $_SESSION['id']=$data['id_user'];
         $_SESSION['nama_user']=$data['nama_user'];
         $_SESSION['username']=$data['username'];
         $_SESSION['last_login_timestamp'] = time();
         $_SESSION['level']=$data['level'];

         if($data['level']=='admin'){
            header("location: admin/index.php");
         }else{
            header("location: pengguna/index.php");
         }
      }else{
        echo "<script>alert('Password Salah!'); window.location.href='login.php';</script>";
      }
    }else{
    echo "<script>alert('Username Salah'); window.location.href='login.php';</script>";
    }   
 }else{
   echo "<script>alert('Username Dan Password Wajib Di Isi'); window.location.href='login.php';</script>";
 }
?>