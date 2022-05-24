<?php
session_start();
	if((isset($_POST['class_uname']))&&(isset($_POST['class_pass']))&&(isset($_POST['class'])))
	{
	$user=$_POST['class_uname'];
	
	$log_pas=$_POST['class_pass'];
	$class=$_POST['class'];
	
//$password=md5($password);
	require("connection.php");
	$sql='select username,log_pas,class,academic_year from class_ad_members where username="'.$user.'" and log_pas="'.$log_pas.'" and class="'.$class.'"';
	$result=mysqli_query($conn,$sql);
	$f=false;
	if($row=mysqli_fetch_array($result))
		{
		header("location: index.php");
		$_SESSION['class_uname']=$user;
		$_SESSION['class_pass']=$log_pas;
		$_SESSION['class']=$class;
		$_SESSION['academic_year']=$row["academic_year"];
		$f=true;
		}
		else
		{
		$status="User/Password incorrect1!";
		header("Location:login.php?status=".$status);
		}
	if($f)
		{	
		header("location: index.php");
		}
		else
		{
		$status="User/Password incorrect2!";
		header("Location:login.php?status=".$status);
		}
		
		
        }
	
?>