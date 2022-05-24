<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$first_name = $_POST["first_name"];
	$roll_no = $_POST["roll_no"];
	$sub1=	$_POST["sub1"];
	$sub2=	$_POST["sub2"];
	$sub3=	$_POST["sub3"];
	$sub4=	$_POST["sub4"];
	$sub5=	$_POST["sub5"];
	$sub6=	$_POST["sub6"];
	$sub7=	$_POST["sub7"];
	$sub8=	$_POST["sub8"];
	$sub9=	$_POST["sub9"];
	$sub10=	$_POST["sub10"];
	$sub11=	$_POST["sub11"];
	$sub12=	$_POST["sub12"];
    $present_class = $_POST["present_class"];
	$section = $_POST["section"];
	$academic_year = $_POST["academic_year"];
	$exam_name = $_POST["exam_name"];
	$id = $_POST["id"];
	

	
	$sql="update student_marks set first_name='".$first_name."',roll_no='".$roll_no."',present_class='".$present_class."',section='".$section."',academic_year='".$academic_year."',exam_name='".$exam_name."',sub1='".$sub1."',sub2='".$sub2."',sub3='".$sub3."',sub4='".$sub4."',sub5='".$sub5."',sub6='".$sub6."',sub7='".$sub7."',sub8='".$sub8."',sub9='".$sub9."',sub10='".$sub10."',sub11='".$sub11."',sub12='".$sub12."' where  id='".$id."'";
	
	
   var_dump($sql);
	 if ($conn->query($sql) === TRUE) {
		
		echo "success";
		
	 }	

header("Location:marks_list.php?success=success");
}
}
