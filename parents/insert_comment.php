<?php
session_start();
if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['academic_year'])&&isset($_SESSION['student_id']))
{
$cur_academic_year=$_SESSION['academic_year'];
$first_name=$_SESSION['parents_uname'];
$roll_no=$_SESSION['parents_pass'];
$student_id=$_SESSION['student_id'];
require("connection.php");
//echo "outside";
if(isset($_POST["comment"]))
{
	$contents = mysqli_real_escape_string($conn, $_POST["contents"]);
    $video_id = $_POST["video_id"];
    $category = "video";
	  
	
	$sql="insert into comments (contents,item_id,student_id, category,academic_year) values('$contents','$video_id','$student_id','$category','$cur_academic_year')";
	
	if ($conn->query($sql) === TRUE) 
	{
    header("Location:video_description.php?id=".$video_id."&success=.'success'");
	} 
	else 
	{
	//var_dump($sql);			
	header("Location:video_description.php?id=".$video_id."&failed=.'failed'");	
		
	}
}
	}else{
		header("Location:login.php");
	}
	
?>