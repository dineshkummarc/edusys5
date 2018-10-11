<?php
session_start();

	if((isset($_POST['parents_uname']))&&(!empty($_POST['parents_pass']))&&(!empty($_POST['academic_year'])))
	{
	$user=$_POST['parents_uname'];
	
	$log_pas=$_POST['parents_pass'];
	$academic_year=$_POST['academic_year'];
	
//$password=md5($password);
	require("connection.php");
	$sql='select first_name,admission_no,present_class from students where first_name="'.$user.'" and admission_no="'.$log_pas.'" and academic_year="'.$academic_year.'"';
	$result=mysqli_query($conn,$sql);
	
	
	$f=false;
	if($row=mysqli_fetch_array($result))
		{
		header("location: index.php");
		$_SESSION['parents_uname']=$user;
		$_SESSION['parents_pass']=$log_pas;
		$_SESSION['academic_year']=$academic_year;
		$_SESSION['parents_class']=$row["present_class"];
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