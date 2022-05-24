<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id'])) 
{
$student_id=$_SESSION['student_id'];

require("connection.php");
$date = date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');

if(isset($_POST["study"]))
{
	$certi_name=$_POST["certi_name"];
	$reason=$_POST["reason"];

	$sql="select * from students where id='".$student_id."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$cur_academic_year=$row["academic_year"];
	}


	
	$sql="insert into request_study (student_id,certi_name,reason,academic_year) values('$student_id','$certi_name','$reason','$cur_academic_year')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:request_study.php?success=.'success'");


	} 
	else 
	{
				
	header("Location:request_study.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>