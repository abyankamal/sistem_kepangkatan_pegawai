<?php
$filename = $_GET['filename'];
$downloadfile = "../files/".$filename;
  
// Header content type
header("Content-type: application/pdf");
  
header("Content-Length: " . filesize($downloadfile));
  
// Send the file to the browser.
readfile($downloadfile);
?> 