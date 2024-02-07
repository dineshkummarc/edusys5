<?php
session_start();
if(isset($_SESSION['marks_uname'])) unset($_SESSION['marks_uname']);
if(isset($_SESSION['marks_pass'])) unset($_SESSION['marks_pass']);

if(isset($_SESSION['class'])) unset($_SESSION['class']);
if(isset($_SESSION['section'])) unset($_SESSION['section']);
if(isset($_SESSION['academic_year'])) unset($_SESSION['academic_year']);



	if((isset($_POST['uname']))&&(!empty($_POST['pass']))&&(!empty($_POST['academic_year'])))
	{
	require("connection.php");
	$user=mysqli_real_escape_string($conn,$_POST['uname']);
	
	$password=mysqli_real_escape_string($conn,$_POST['pass']);
	
	$academic_year=mysqli_real_escape_string($conn,$_POST['academic_year']);
	
	$sql='select id,username,log_pas,user_access from ad_members where username="'.$user.'" and  user_access="admin" and academic_year="'.$academic_year.'"';
	$result=mysqli_query($conn,$sql);
	
	
	$f=false;
	if($row=mysqli_fetch_array($result))
		{
		$secure = password_verify($password, $row["log_pas"]);	
		
		if($secure){
			header("location: index.php");
			$_SESSION['lkg_uname']=$user;
			$_SESSION['lkg_pass']=$secure;
			$_SESSION['academic_year']=$academic_year;
			$_SESSION['user_access']=$row["user_access"];
			$_SESSION['admin_id']=$row["id"];
			$f=true;
		}
			
		
		}
		else
		{
		$status="User/Password incorrect1!";
		header("Location:login.php?failed=failed");
		}
	if($f)
		{
		if($secure){
			header("location: index.php");
		}
		}
		else
		{
		$status="User/Password incorrect2!";
		header("Location:login.php?failed=failed");
		}
		
		
        }
		
		/*  
		$password = $_POST["password"]; // password
		$options = ['cost' => 12];  //salt 
		$secure = password_hash($password, PASSWORD_DEFAULT, $options); // hashing password
		*/
	
?>