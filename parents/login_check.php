<?php
session_start();
require("connection.php");
	$user=mysqli_real_escape_string($conn,$_POST['parents_uname']);
	$log_pas=mysqli_real_escape_string($conn,$_POST['parents_pass']);

	$sql='select id,first_name,adhaar_no,academic_year,present_class from students where adhaar_no="'.$log_pas.'"';

	if(!isset($_COOKIE["member_login"])) {
		$sql .= " AND adhaar_no='".$log_pas."'";
	}

	//var_dump($sql);
	$result=mysqli_query($conn,$sql);
	$f=false;
	if($row=mysqli_fetch_array($result))
		{

		header("location: index.php");
		$_SESSION['parents_uname']=$row["first_name"];
		$_SESSION['parents_pass']=$log_pas;
		$_SESSION['academic_year']=$row["academic_year"];
		$_SESSION['parents_class']=$row["present_class"];
		$_SESSION['student_id']=$row["id"];
		
		if(!empty($_POST["remember"])) {
			setcookie ("member_login",$user,time()+ (10 * 365 * 24 * 60 * 60));
		} else {
			echo "set cookie";
			if(isset($_COOKIE["member_login"])) {
				setcookie ("member_login","");
			}
		}

		


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


?>
