<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["remarks"]))
{
	$student_id=$_POST["id"];

	$remarks_title=mysqli_real_escape_string($conn, $_POST["remark_title"]);
	$remarks_desc=mysqli_real_escape_string($conn, $_POST["remark_desc"]);
	
	
	$sql="insert into remarks (student_id,remarks_title,remarks_desc,academic_year) values('$student_id','$remarks_title','$remarks_desc','$cur_academic_year')";
	var_dump($sql);
	
	if ($conn->query($sql) === TRUE) 
	{
		
	
	header("Location:description.php?id=".$student_id);


	} 
	else 
	{		
	header("Location:add_remarks.php?failed=.'failed'");	
		
	}
    }

	}else{
		header("Location:login.php");
	}
	
?>