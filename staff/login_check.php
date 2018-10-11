<?php
session_start();
	if(isset($_POST['staff_uname'])&&isset($_POST['staff_pass'])&&isset($_POST['staff_class']))

{
	$user=$_POST['staff_uname'];
	$log_pas=$_POST['staff_pass'];
	$class_teach=$_POST['staff_class'];
	
//$log_pas=md5($log_pas);
	require("connection.php");
	$sql='select fac_fname,staff_pass,class_teach from faculty where fac_fname="'.$user.'" and staff_pass="'.$log_pas.'" and class_teach="'.$class_teach.'"';
	var_dump($sql);
	$result=mysqli_query($conn,$sql);
	
	
	$f=false;
	if($row=mysqli_fetch_array($result))
		{
		header("location: index.php");
		$_SESSION['staff_uname']=$user;
		$_SESSION['staff_pass']=$log_pas;
		$_SESSION['staff_class']=$class_teach;
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