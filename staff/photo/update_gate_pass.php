<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["gate_pass"]))
{
	$gate_reason=$_POST["gate_reason"];
	$gate_permit_go=$_POST["gate_permit_go"];
	$gate_with=$_POST["with"];
	$relation=$_POST["relation"];
	$id=$_POST["id"];
	
	
	
	$sql="update gate_pass set gate_reason='".$gate_reason."',gate_permit_go='".$gate_permit_go."',gate_with='".$gate_with."',relation='".$relation."' where  id='".$id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		header("Location:gate_pass_sms.php?id=".$id);


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