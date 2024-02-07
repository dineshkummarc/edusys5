<?php
if(isset($_GET["id_path"])){
  $id_path = $_GET["id_path"];
}
if(file_exists($id_path)) {
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="'.basename($id_path).'"');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($id_path));
  flush(); // Flush system output buffer
  readfile($id_path);
  
  exit;
}
?>