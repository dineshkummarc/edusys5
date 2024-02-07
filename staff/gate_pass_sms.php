<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

require("connection.php");
//error_reporting("0");
$id=$_GET["id"];
$sql="select * from gate_pass where id ='".$id."'";
//var_dump($sql);
$result=mysqli_query($conn,$sql);
if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$student_id = $value["student_id"];
	$gate_reason = $value["gate_reason"];
	$gate_permit_go = $value["gate_permit_go"];
	$gate_with = $value["gate_with"];

	$sql_student="select distinct parent_contact from students where id='".$student_id."'";
	$result_student=mysqli_query($conn,$sql_student);
	if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC)){

  $mob_number=$row_student["parent_contact"];
	}
}

	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$approved_senderid=$row_sch["sender_id"];
  $username=$row_sch["username"];
  $password=$row_sch["user_id"];
  $sms_school_name=$row_sch["sms_school_name"];
	$phone=$row_sch["phone"];
	}

	$message = "Dear parents, Gate pass: reason-".$gate_reason.", Permitted to go-".$gate_permit_go.", with-".$gate_with.".Call for more info ".$phone.". ".$sms_school_name;
	//echo $message;

	$subject = "Student Gate Pass SMS";

  $sql="insert into individual_notifications (title,details,student_id,academic_year,indi_viewed,updated_by) values('$subject','$message','$student_id','$cur_academic_year','False','$admin_id')";

  $conn->query($sql_message);


	require("sms_gateway.php");
	header("Location:description.php?id=".$student_id);

}
?>