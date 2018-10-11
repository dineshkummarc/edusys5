<?php
session_start();
if(isset($_SESSION['marks_uname'])) unset($_SESSION['marks_uname']);
if(isset($_SESSION['marks_pass'])) unset($_SESSION['marks_pass']);
if(isset($_SESSION['class'])) unset($_SESSION['class']);
if(isset($_SESSION['section'])) unset($_SESSION['section']);
if(isset($_SESSION['academic_year'])) unset($_SESSION['academic_year']);



	if((isset($_POST['uname']))&&(!empty($_POST['pass']))&&(!empty($_POST['academic_year'])))
	{
	$user=$_POST['uname'];
	
	$log_pas=$_POST['pass'];
	$academic_year=$_POST['academic_year'];
	
//$password=md5($password);
	require("connection.php");
	$sql='select username,log_pas,user_access from ad_members where username="'.$user.'" and log_pas="'.$log_pas.'" and user_access="admin" and academic_year="'.$academic_year.'"';
	$result=mysqli_query($conn,$sql);
	
	
	$f=false;
	if($row=mysqli_fetch_array($result))
		{
		header("location: index.php");
		$_SESSION['lkg_uname']=$user;
		$_SESSION['lkg_pass']=$log_pas;
		$_SESSION['academic_year']=$academic_year;
		$_SESSION['user_access']=$row["user_access"];
		$f=true;
		}
		else
		{
		$status="User/Password incorrect1!";
		header("Location:login.php?failed=failed");
		}
	if($f)
		{	
		header("location: index.php");
		}
		else
		{
		$status="User/Password incorrect2!";
		header("Location:login.php?failed=failed");
		}
		
		
        }
	
?>