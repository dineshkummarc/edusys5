<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["update_remarks"]))
{
	$remarks_title=$_POST["remark_title"];
	$remarks_desc=$_POST["remark_desc"];
	$id=$_POST["id"];
	$student_id=$_POST["student_id"];
	
	
	
	$sql="update remarks set remarks_title='".$remarks_title."',remarks_desc='".$remarks_desc."' where id='".$id."'";
	
	if ($conn->query($sql) === TRUE) 
	{
		
	
	header("Location:description.php?id=".$student_id);


	} 
	else 
	{
	//var_dump($sql);			
	header("Location:add_remarks.php?failed=.'failed'");	
		
	}
    }

	}else{
		header("Location:login.php");
	}
	
?>