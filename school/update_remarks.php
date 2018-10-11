<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["update_remarks"]))
{
	
	$first_name=$_POST["first_name"];
	$roll_no=$_POST["roll_no"];
	$remarks_title=$_POST["remark_title"];
	$remarks_desc=$_POST["remark_desc"];
	$remarks_date=$_POST["remark_date"];
	$present_class=$_POST["present_class"];
	$section=$_POST["section"];
	$id=$_POST["id"];
	
	
	
	$sql="update remarks set remarks_title='".$remarks_title."',remarks_desc='".$remarks_desc."',remarks_date='".$remarks_date."' where id='".$id."'";
	
	if ($conn->query($sql) === TRUE) 
	{
		
	
	header("Location:description.php?first_name=".$first_name."&roll_no=".$roll_no);


	} 
	else 
	{
	var_dump($sql);			
	//header("Location:add_remarks.php?failed=.'failed'");	
		
	}
    }

	}else{
		header("Location:login.php");
	}
	
?>