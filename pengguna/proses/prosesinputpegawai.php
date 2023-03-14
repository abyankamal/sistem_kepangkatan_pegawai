<?php
session_start();

include "../../koneksi.php";

// input data ke database
$nosurat = mysqli_real_escape_string($con,$_POST['no_surat']);
$tanggalsurat = mysqli_real_escape_string($con,$_POST['tanggal_surat']);
$namaskpd = mysqli_real_escape_string($con,$_POST['nama_skpd']);
$namapegawai = mysqli_real_escape_string($con,$_POST['nm_pegawai']);
$nip = mysqli_real_escape_string($con,$_POST['nip']);
$tgllahir = mysqli_real_escape_string($con,$_POST['tgl_lahir']); // tanggal lahir pegawai
$panggol = mysqli_real_escape_string($con,$_POST['panggol']); // pangkat / golongan pegawai
$tanggol = mysqli_real_escape_string($con,$_POST['tanggol']); // tanggal / golongan pegawai
$jbtlm = mysqli_real_escape_string($con,$_POST['jbtlm']); // jabatan lama pegawai
$jbtbr = mysqli_real_escape_string($con,$_POST['jbtbr']); // jabatan baru pegawai
$usulan = mysqli_real_escape_string($con,$_POST['usulan']);
$namafile = $_FILES['file']['name'];
$tipe_file = $_FILES['file']['type'];
$ukuran_file = $_FILES['file']['size'];
$tmp_file 		= $_FILES['file']['tmp_name'];
$nama_file 		= substr($namafile, 0, strripos($namafile, '.'));
$ext_file		= substr($namafile, strripos($namafile, '.'));

$formattglsurat = date('Y-m-d', strtotime($tanggalsurat));
$formattglpanggol = date('Y-m-d', strtotime($tanggol));

if($jbtlm == $jbtbr){
    echo "<script>alert('Jabatan Lama Dan Jabatan Baru Tidak Boleh Sama');
    document.location.href = '../tambahdatapegawai.php';
    </script>";
}else if($ukuran_file >= 10340000){
    echo "<script>alert('Ukuran File Harus Dibawah 10 MB');
    document.location.href = '../tambahdatapegawai.php';
    </script>";
}else {
    $namafilebaru = $formattglsurat.'-'.$namapegawai . $ext_file;  
    $simpanfile = "../../files/".$namafilebaru;
    move_uploaded_file($tmp_file, $simpanfile);
    $sql = "INSERT INTO dapeg (no_surat, tanggal_surat, nama_skpd, nm_pegawai, nip, tgl_lahir, panggol, tanggol, jbtlm, jbtbr, usulan, file, status, keterangan) VALUES ('$nosurat', '$formattglsurat', '$namaskpd', '$namapegawai', '$nip', '$tgllahir', '$panggol', '$formattglpanggol', '$jbtlm', '$jbtbr', '$usulan', '$namafilebaru', 'Belum Diverifikasi', '-')";
    mysqli_query($con, $sql);

    echo "<script>alert('Pegawai Sukses Diajukan');
    document.location.href = '../datapegawai.php';
    </script>";
}
?>