<?php
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
	
	
	
    $sql="insert into student_marks (first_name,roll_no,present_class,section,academic_year,exam_name,sub1,sub2,sub3,sub4,sub5,sub6,sub7,sub8,sub9,sub10,sub11,sub12) values('$first_name','$roll_no','$present_class','$section','$academic_year','$exam_name','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7','$sub8','$sub9','$sub10','$sub11','$sub12')";
   //var_dump($sql);
	 if ($conn->query($sql) === TRUE) {
		
		echo "success";
		
	 }	
  
}
header("Location:marks.php");
}
