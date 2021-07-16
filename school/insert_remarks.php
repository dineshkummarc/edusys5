<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["remarks"]))
{
	
	$first_name=$_POST["first_name"];
	$roll_no=$_POST["roll_no"];

	$remarks_title=mysqli_real_escape_string($conn, $_POST["remark_title"]);
	$remarks_desc=mysqli_real_escape_string($conn, $_POST["remark_desc"]);



	$remarks_date=$_POST["remark_date"];
	$present_class=$_POST["present_class"];
	$section=$_POST["section"];
	
	$sql="insert into remarks (first_name,roll_no,present_class,section,remarks_title,remarks_desc,remarks_date,academic_year) values('$first_name','$roll_no','$present_class','$section','$remarks_title','$remarks_desc','$remarks_date','$cur_academic_year')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		
	
	header("Location:description.php?first_name=".$first_name."&roll_no=".$roll_no);


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