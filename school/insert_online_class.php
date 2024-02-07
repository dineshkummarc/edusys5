<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year'])&&!empty($_SESSION['admin_id']))
{
$cur_academic_year = $_SESSION['academic_year'];
$admin_id = $_SESSION['admin_id'];
require("connection.php");

if(isset($_POST["online"]))
{
	$present_class = $_POST["present_class"];
	$section = $_POST["section"];
	$subject_name = $_POST["subject_name"];
	$chapter = $_POST["chapter"];
	$url = $_POST["url"];
	$details = mysqli_real_escape_string($conn, $_POST["details"]);
	
	$filetmp = $_FILES["upload_file"]["tmp_name"];
	$filename = $_FILES["upload_file"]["name"];
	$filetype = $_FILES["upload_file"]["type"];
	$filepath = "online_class_uploads/".$filename;
    move_uploaded_file($filetmp,$filepath);
    
	
	$sql="insert into online_class (present_class,section,subject_name,chapter,url,details,filename, filetype, filepath,academic_year,admin_id) values('$present_class','$section','$subject_name','$chapter','$url','$details','$filename','$filetype','$filepath','$cur_academic_year','$admin_id')";
    var_dump($sql);
	
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:add_online_class.php?success=.'success'");
} 
	else 
	{		
	//header("Location:add_online_class.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>