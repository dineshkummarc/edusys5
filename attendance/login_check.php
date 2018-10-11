<?php
session_start();
	if((isset($_POST['uname']))&&(isset($_POST['pass'])))
	{
	$user=$_POST['uname'];
	
	$log_pas=$_POST['pass'];
	
//$password=md5($password);
	require("connection.php");
	$sql='select username,log_pas,user_access from ad_members where username="'.$user.'" and log_pas="'.$log_pas.'" and user_access="attendance"';
	$result=mysqli_query($conn,$sql);
	
	
	$f=false;
	if($row=mysqli_fetch_array($result))
		{
		header("location: index.php");
		$_SESSION['lkg_uname']=$user;
		$_SESSION['lkg_pass']=$log_pas;
		$_SESSION['user_access']=$ro["user_access"];
		$f=true;
		}
		else
		{
		$status="User/Password incorrect1!";
		header("Location:login.php?status=".$status);
		}
	if($f)
		{	
		header("location: attendance.php");
		}
		else
		{
		$status="User/Password incorrect2!";
		header("Location:login.php?status=".$status);
		}
		
		
        }
	
?>