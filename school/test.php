<?php
require("connection.php");
$sql="select * from student_marks where academic_year='".$cur_academic_year."' and exam_name='Final Exam'";
$result=mysqli_query($conn,$sql);
foreach($result as $row){
	$sub1 = $row["sub1"];
	$sub2 = $row["sub2"];
	$sub3 = $row["sub3"];
	$sub4 = $row["sub4"];
	$sub5 = $row["sub5"];
	$message_detail="Final Exam marks,QURAN:".$sub1.",HADEES:".$sub2.",AQAID:".$sub3.",TARBIYAT:".$sub4.",ZABAAN:".$sub5;
	
	$message = "Dear parents, ".$message_detail."-".$sch_name;
	echo $message;
	//require("sms_gateway.php");
}