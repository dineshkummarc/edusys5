<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_GET["count"];
	
    for($i=0;$i<$count;$i++){
	$first_name = $_POST["first_name"][$i];
	$roll_no = $_POST["roll_no"][$i];
	$sub1=	$_POST["sub1"][$i];
	$sub2=	$_POST["sub2"][$i];
	$sub3=	$_POST["sub3"][$i];
	$sub4=	$_POST["sub4"][$i];
	$sub5=	$_POST["sub5"][$i];
	$sub6=	$_POST["sub6"][$i];
	$sub7=	$_POST["sub7"][$i];
	$sub8=	$_POST["sub8"][$i];
	$sub9=	$_POST["sub9"][$i];
	$sub10=	$_POST["sub10"][$i];
	$sub11=	$_POST["sub11"][$i];
	$sub12=	$_POST["sub12"][$i];
    $present_class = $_POST["present_class"][$i];
	$section = $_POST["section"][$i];
	$academic_year = $_POST["academic_year"][$i];
	$exam_name = $_POST["exam_name"][$i];
	
	$sql="insert into student_marks (first_name,roll_no,present_class,section,academic_year,exam_name,sub1,sub2,sub3,sub4,sub5,sub6,sub7,sub8,sub9,sub10,sub11,sub12) values('$first_name','$roll_no','$present_class','$section','$cur_academic_year','$exam_name','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7','$sub8','$sub9','$sub10','$sub11','$sub12')";
//	var_dump($sql);
	 if ($conn->query($sql) === TRUE) 
	 {
	////////////////////////// Start SMS Sending ////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$approved_senderid=$row_sch["sender_id"];
	}

	$sql="select parent_contact from students where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and roll_no='".$roll_no."'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$mob_number=$row["parent_contact"];
	}
	
	$username ="ma.musthafa6@gmail.com";
	$password ="ajmal524";
	
	
	switch ($present_class){
		case "prekg":
		$message_detail=$exam_name." marks,ENG:".$sub1.",KAN:".$sub2.",MAT:".$sub3.",STR/RHY:".$sub4.",DRW:".$sub5.",GK:".$sub6;
		break;
		
		case "lkg":
		$message_detail=$exam_name." marks,ENG:".$sub1.",KAN:".$sub2.",MAT:".$sub3.",GK:".$sub4.",STR/RHY:".$sub5.",DRW:".$sub6;
		break;
		
		case "ukg":
		$message_detail=$exam_name." marks,ENG:".$sub1.",KAN:".$sub2.",MAT:".$sub3.",GK:".$sub4.",STR/RHY:".$sub5.",DRW:".$sub6;
		break;
		
		case "first standard":
		$message_detail=$exam_name." marks,KAN:".$sub1.",ENG:".$sub2.",HIN:".$sub3.",MAT:".$sub4.",SCI:".$sub5.",SOCI:".$sub6.",COMP:".$sub7;
		break;
		
		case "second standard":
		$message_detail=$exam_name." marks,KAN:".$sub1.",ENG:".$sub2.",HIN:".$sub3.",MAT:".$sub4.",SCI:".$sub5.",SOCI:".$sub6.",COMP:".$sub7;
		break;
		
		case "third standard":
		$message_detail=$exam_name." marks,KAN:".$sub1.",ENG:".$sub2.",HIN:".$sub3.",MAT:".$sub4.",SCI:".$sub5.",SOCI:".$sub6.",COMP:".$sub7;
		break;
		
		case "fourth standard":
		$message_detail=$exam_name." marks,KAN:".$sub1.",ENG:".$sub2.",HIN:".$sub3.",MAT:".$sub4.",SCI:".$sub5.",SOCI:".$sub6.",COMP:".$sub7;
		break;
		
		case "fifth standard":
		$message_detail=$exam_name." marks,KAN:".$sub1.",ENG:".$sub2.",HIN:".$sub3.",MAT:".$sub4.",SCI:".$sub5.",SOCI:".$sub6.",COMP:".$sub7;
		break;
		
		case "sixth standard":
		$message_detail=$exam_name." marks,KAN:".$sub1.",ENG:".$sub2.",HIN:".$sub3.",MAT:".$sub4.",SCI:".$sub5.",SOCI:".$sub6.",COMP:".$sub7;
		break;
		
		case "seventh standard":
		$message_detail=$exam_name." marks,KAN:".$sub1.",ENG:".$sub2.",HIN:".$sub3.",MAT:".$sub4.",SCI:".$sub5.",SOCI:".$sub6.",COMP:".$sub7;
		break;
		
		case "eighth standard":
		$message_detail=$exam_name." marks,KAN:".$sub1.",ENG:".$sub2.",HIN:".$sub3.",MAT:".$sub4.",SCI:".$sub5.",SOCI:".$sub6.",COMP:".$sub7;
		break;
		
		case "ninth standard":
		$message_detail=$exam_name." marks,KAN:".$sub1.",ENG:".$sub2.",HIN:".$sub3.",MAT:".$sub4.",SCI:".$sub5.",SOCI:".$sub6.",COMP:".$sub7;
		break;
		
		case "tenth standard":
		$message_detail=$exam_name." marks,KAN:".$sub1.",ENG:".$sub2.",HIN:".$sub3.",MAT:".$sub4.",SCI:".$sub5.",SOCI:".$sub6.",COMP:".$sub7;
		break;
		
	}
	
	$message = "Dear parents, ".$message_detail."-".$sch_name;
	
	require("sms_gateway.php");

}	
  
}
}
header("Location:marks.php");
}
