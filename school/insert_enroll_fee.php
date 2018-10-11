<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$first_name = test_input($_POST["first_name"]);
	$st_enroll_no = test_input($_POST["st_enroll_no"]);
	$fee_paid_amount = test_input($_POST["fee_paid_amount"]);
    $fee_receipt_date = test_input($_POST["fee_receipt_date"]);
    $fee_receipt_no = test_input($_POST["fee_receipt_no"]);
    $id = test_input($_POST["id"]);
	
	$sql="update enrolled_students set st_enroll_no='".$st_enroll_no."',fee_paid_amount=fee_paid_amount+'".$fee_paid_amount."',fee_receipt_date='".$fee_receipt_date."',fee_receipt_no='".$fee_receipt_no."' where id='".$id."'";
	$conn->query($sql);
	var_dump($sql);

	$sql_insert="insert into enrolled_fees (first_name,st_enroll_no,fee_paid_amount,fee_receipt_date,fee_receipt_no) values('$first_name','$st_enroll_no','$fee_paid_amount','$fee_receipt_date','$fee_receipt_no')";
	$conn->query($sql_insert); 
	
	
    
header("Location:all_enrolled_students.php?success=success");
}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 