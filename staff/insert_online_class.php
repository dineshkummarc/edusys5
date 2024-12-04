<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

require("connection.php");
if(isset($_POST["online"]))
{
	$class_teach = $_POST["class_teach"];
	$subject_name = $_POST["subject_name"];
	$chapter = $_POST["chapter"];
	$section = $_POST["section"];
	$url = $_POST["url"];
	$details = mysqli_real_escape_string($conn, $_POST["details"]);
	
	$filetmp = $_FILES["upload_file"]["tmp_name"];
	$filename = $_FILES["upload_file"]["name"];
	$filetype = $_FILES["upload_file"]["type"];
	$filepath = "../school/online_class_uploads/".$filename;
    move_uploaded_file($filetmp,$filepath);    
	
	$sql="insert into online_class (present_class,section,subject_name,chapter,url,details,filename, filetype, filepath,admin_id) values('$class_teach','$section','$subject_name','$chapter','$url','$details','$filename','$filetype','$filepath','$admin_id')";
	
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