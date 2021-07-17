<?php
session_start();
if(isset($_SESSION['staff_uname'])&&isset($_SESSION['staff_pass'])&&isset($_SESSION['class_teach']))
{
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

require("connection.php");
if(isset($_POST["online"]))
{
	$present_class = $_SESSION['class_teach'];
	$subject_name = $_POST["subject_name"];
	$chapter = $_POST["chapter"];
	$url = $_POST["url"];
	$details = mysqli_real_escape_string($conn, $_POST["details"]);
	
	$filetmp = $_FILES["upload_file"]["tmp_name"];
	$filename = $_FILES["upload_file"]["name"];
	$filetype = $_FILES["upload_file"]["type"];
	$filepath = "../school/online_class_uploads/".$filename;
    move_uploaded_file($filetmp,$filepath);    
	
	$sql="insert into online_class (present_class,subject_name,chapter,url,details,filename, filetype, filepath,updated_by) values('$present_class','$subject_name','$chapter','$url','$details','$filename','$filetype','$filepath','$staff_uname')";
	
	if ($conn->query($sql) === TRUE) 
	{	
	header("Location:index.php?success=.'success'");
	} 
	else 
	{		
	header("Location:index.php?failed=.'failed'");			
	}
}
	}else{
		header("Location:login.php");
	}
	
?>