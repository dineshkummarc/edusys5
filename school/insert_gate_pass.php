<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["gate_pass"]))
{
	$student_id=$_POST["student_id"];
	$gate_reason=$_POST["gate_reason"];
	$gate_permit_go=$_POST["gate_permit_go"];
	$gate_with=$_POST["with"];
	$relation=$_POST["relation"];
	$academic_year=$_POST["academic_year"];
	
	$sql="insert into gate_pass (student_id,gate_reason,gate_permit_go,gate_with,relation,academic_year) values('$student_id','$gate_reason','$gate_permit_go','$gate_with','$relation','$cur_academic_year')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	$last_id = $conn->insert_id;
	header("Location:gate_pass_sms.php?id=".$last_id);
} 
	else 
	{
				
	header("Location:gate_pass.php?failed=.'failed'");	
		
	}
    }

	}else{
		header("Location:login.php");
	}
	
?>