<?php
session_start();

include "../../koneksi.php";

// input data ke database
$id = mysqli_real_escape_string($con,$_POST['id_dapeg']); 
$nosurat = mysqli_real_escape_string($con,$_POST['no_surat']);
$tanggalsurat = mysqli_real_escape_string($con,$_POST['tanggal_surat']);
$namaskpd = mysqli_real_escape_string($con,$_POST['nama_skpd']);
$namapegawai = mysqli_real_escape_string($con,$_POST['nm_pegawai']);
$nip = mysqli_real_escape_string($con,$_POST['nip']);
$panggol = mysqli_real_escape_string($con,$_POST['panggol']); // pangkat / golongan pegawai
$tanggol = mysqli_real_escape_string($con,$_POST['tanggol']); // tanggal / golongan pegawai
$jbtlm = mysqli_real_escape_string($con,$_POST['jbtlm']); // jabatan lama pegawai
$jbtbr = mysqli_real_escape_string($con,$_POST['jbtbr']); // jabatan baru pegawai
$usulan = mysqli_real_escape_string($con,$_POST['usulan']);
$namafile = $_FILES['file']['name'];

$formattglsurat = date('Y-m-d', strtotime($tanggalsurat));
$formattglpanggol = date('Y-m-d', strtotime($tanggol));

$sql        = "SELECT * FROM dapeg WHERE id_dapeg = '".$id."'";
$query  	= mysqli_query($con, $sql);
$data 		= mysqli_fetch_array($query);

if($namafile == ''){
    $ext = substr($data['file'], strripos($data['file'], '.'));
    $namafilebr = $formattglsurat.'-'.$namapegawai . $ext;
    rename("../../files/".$data['file'],"../../files/".$namafilebr);
    $sql = "UPDATE dapeg SET
     no_surat = '$nosurat',
     tanggal_surat = '$formattglsurat', 
     nama_skpd = '$namaskpd', 
     nm_pegawai = '$namapegawai', 
     nip = '$nip', 
     panggol = '$panggol', 
     tanggol = '$formattglpanggol', 
     jbtlm = '$jbtlm', 
     jbtbr = '$jbtbr', 
     usulan = '$usulan', 
     file = '$namafilebr'
     WHERE id_dapeg = '$id'";
    mysqli_query($con, $sql);
    echo "<script>alert('Pegawai Sukses Diedit Tanpa Merubah Surat');
    document.location.href = '../datapegawai.php';
    </script>";
}else {
    $tipe_file = $_FILES['file']['type'];
    $ukuran_file = $_FILES['file']['size'];
    if(($tipe_file == 'application/pdf') && ($ukuran_file <= 10340000)){
        unlink("../../files/".$data['file']);
        $tmp_file 		= $_FILES['file']['tmp_name'];
        $ext_file		= substr($namafile, strripos($namafile, '.'));

        $namafilebaru = $formattglsurat.'-'.$namapegawai . $ext_file;  
        $simpanfile = "../../files/".$namafilebaru;
        move_uploaded_file($tmp_file, $simpanfile);
        $sql = "UPDATE dapeg SET
        no_surat = '$nosurat',
        tanggal_surat = '$formattglsurat', 
        nama_skpd = '$namaskpd', 
        nm_pegawai = '$namapegawai', 
        nip = '$nip', 
        panggol = '$panggol', 
        tanggol = '$formattglpanggol', 
        jbtlm = '$jbtlm', 
        jbtbr = '$jbtbr', 
        usulan = '$usulan', 
        file = '$namafilebaru'
        WHERE id_dapeg = '$id'";
        mysqli_query($con, $sql);

        echo "<script>alert('Pegawai Sukses Diedit Dengan Merubah Surat');
        document.location.href = '../datapegawai.php';
        </script>";
    } else {
        echo "<script>alert('File Terlalu Besar');
        document.location.href = '../datapegawai.php';
        </script>";
    }
}
?>