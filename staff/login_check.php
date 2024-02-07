<?php
session_start();
require("connection.php");
$user=mysqli_real_escape_string($conn,$_POST['staff_uname']);
$password=mysqli_real_escape_string($conn,$_POST['staff_pass']);

$sql='select id,username,log_pas,user_access,academic_year from ad_members where username="'.$user.'" and  user_access="staff"';


	$result=mysqli_query($conn,$sql);
	$f=false;
	if($row=mysqli_fetch_array($result))
		{
    $secure = password_verify($password, $row["log_pas"]);	
		$admin_id = $row["id"];
		$academic_year = $row["academic_year"];

    if(!isset($_COOKIE["staff_login"])) {
      $sql .= " AND log_pas='".$secure."'";
    }


    if($secure){
			header("location: index.php");
			$_SESSION['staff_uname']=$user;
			$_SESSION['staff_pass']=$secure;
			$_SESSION['admin_id']=$admin_id;
			$_SESSION['staff_academic_year']=$academic_year;
			$f=true;
		}
		
		if(!empty($_POST["remember"])) {
			setcookie ("staff_login",$user,time()+ (10 * 365 * 24 * 60 * 60));
		} else {
			//echo "set cookie";
			if(isset($_COOKIE["staff_login"])) {
				setcookie ("staff_login","");
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
