<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["expense"]))
{

	date_default_timezone_set("Asia/Kolkata");
	$last_updated=date("Y-m-d");

	$amount=test_input($_POST["amount"]);
	$towards=test_input($_POST["towards"]);
	$exp_date=test_input($_POST["exp_date"]);
	$added_by = $_SESSION['lkg_uname'];


	$sql="insert into expense (amount,towards,exp_date,added_by,academic_year) values('$amount','$towards','$exp_date','$added_by','$cur_academic_year')";



	if ($conn->query($sql) === TRUE)
	{
		echo "success";

	header("Location:accounts_overview.php?success_exp=.'success_exp'");
    }
	else
	{
	var_dump($sql);

	}
}
}else{
		header("Location:login.php");
	}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
