<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["gate_pass"]))
{
	
	date_default_timezone_set("Asia/Kolkata");
    $today_date=date("Y-m-d");
	$first_name=$_POST["first_name"];
	$roll_no=$_POST["roll_no"];
	$present_class=$_POST["present_class"];
	$gate_reason=$_POST["gate_reason"];
	$gate_permit_go=$_POST["gate_permit_go"];
	$gate_with=$_POST["with"];
	$relation=$_POST["relation"];
	$section=$_POST["section"];
	$academic_year=$_POST["academic_year"];
	$parent_contact=$_POST["parent_contact"];
	$address=$_POST["address"];
	$id=$_POST["id"];
	
	
	
	$sql="update gate_pass set first_name='".$first_name."',present_class='".$present_class."',roll_no='".$roll_no."',gate_reason='".$gate_reason."',gate_permit_go='".$gate_permit_go."',gate_with='".$gate_with."',relation='".$relation."',section='".$section."',academic_year='".$academic_year."',parent_contact='".$parent_contact."',address='".$address."',date_time=now(),issued_date='".$today_date."' where  id='".$id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:gate_pass_sms.php?first_name=".$first_name."&roll_no=".$roll_no."&parent_contact=".$parent_contact."&gate_reason=".$gate_reason."&gate_with=".$gate_with."&gate_permit_go=".$gate_permit_go);


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