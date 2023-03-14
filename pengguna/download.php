<?php
if(isset($_GET['filename'])){
    $filename = $_GET['filename'];
    $downloadfile = "../files/".$filename;

    if(file_exists($downloadfile)){
        header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($downloadfile));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: private');
            header('Pragma: private');
            header('Content-Length: ' . filesize($downloadfile));
            ob_clean();
            flush();
            readfile($downloadfile);
            
            exit;
    } else {
        echo "<script>alert('File Gagal Diunduh Karena Tidak Ada');
        document.location.href = 'datapegawai.php';
        </script>";
    }
}
?>