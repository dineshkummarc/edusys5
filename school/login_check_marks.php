<?php
session_start();
if(isset($_SESSION['lkg_uname'])) unset($_SESSION['lkg_uname']);
if(isset($_SESSION['lkg_pass'])) unset($_SESSION['lkg_pass']);
//if(isset($_SESSION['academic_year'])) unset($_SESSION['academic_year']);


	$user=$_POST['username'];
	
	$log_pas=$_POST['log_pas'];
	$class_teach=$_POST['class_teach'];

	$academic_year=$_POST['academic_year'];
	
	echo $user;
	
	
	
	
//$password=md5($password);
	require("connection.php");
	$sql='select username,log_pas,class_teach from class_ad_members where username="'.$user.'" and academic_year="'.$academic_year.'" and log_pas="'.$log_pas.'" and class_teach="'.$class_teach.'"';
	$result=mysqli_query($conn,$sql);
	var_dump($sql);
	
	$f=false;
	if($row=mysqli_fetch_array($result))
		{
		header("location: marks.php");
		$_SESSION['marks_uname']=$user;
		$_SESSION['marks_pass']=$log_pas;
		$_SESSION['class']=$_POST["class_teach"];
		$_SESSION['section']=$section;
		$_SESSION['academic_year']=$academic_year;
		
		$f=true;
		}
		else
		{
		$status="User/Password incorrect1!";
		header("Location:login_marks.php?failed=failed");
		}
	if($f)
		{	
		header("location: marks.php");
		}
		else
		{
		$status="User/Password incorrect2!";
		header("Location:login_marks.php?failed=failed");
		}
		
		
        //}
	
?>