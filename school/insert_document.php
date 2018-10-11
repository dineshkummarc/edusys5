<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");

date_default_timezone_set("Asia/Kolkata");
$today = date("Y-m-d");
if(isset($_POST["upl_scan_doc"]))
{
	
  $upl_doc_name=$_POST["upl_doc_name"];		
  $filetmp = $_FILES["photo"]["tmp_name"];
  $filename = $_FILES["photo"]["name"];
  $filetype = $_FILES["photo"]["type"];
  $filepath = "documents/".$filename;
   move_uploaded_file($filetmp,$filepath);	
   $sql="insert into uploaded_documents (upl_doc_name,upl_file_name,upl_file_path,upl_file_type,upl_date,academic_year) values('$upl_doc_name','$filename','$filepath','$filetype','$today','$cur_academic_year')";
   $conn->query($sql);
	
}

	
	header("Location:documents.php?success=.'success'");
}