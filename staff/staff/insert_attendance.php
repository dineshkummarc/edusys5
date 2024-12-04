<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];


require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = test_input($_GET["count"]);
	
    //for($i=1;$i<$count+1;$i++){
    for($i=0;$i<$count;$i++){
	
	$attendance = test_input($_POST["attendance"][$i]);
	$id = test_input($_POST["id"][$i]);
	$present_class = test_input($_POST["present_class"][$i]);
	$section = test_input($_POST["section"][$i]);
	
	$academic_year = test_input($_POST["academic_year"][$i]);
	$taken_by = test_input($_POST["taken_by"][$i]);
	$tot_class=1;
	if($attendance=="Present"){
		$att_count=1;
	}else{
		$att_count=0;
	}
	
	


	
	$sql_contact="select parent_contact from students where id='".$id."'";
	$result_contact=mysqli_query($conn,$sql_contact);
	if($row_contact=mysqli_fetch_array($result_contact,MYSQLI_ASSOC))
	{
		
		$parent_contact=$row_contact["parent_contact"];
		if($parent_contact==""){
		$parent_contact="null";
	    }else{
		$parent_contact=$row_contact["parent_contact"];
	    }
	
	}
	

	$sql="insert into attendance (student_id,present_class,section,academic_year,taken_by,attendance,att_date,att_count,tot_class) values('$id','$present_class','$section','$cur_academic_year','$taken_by','$attendance',now(),'$att_count','$tot_class')";
   
	 $conn->query($sql);
	 
}
header("Location:att_sms.php?academic_year=".$cur_academic_year."&present_class=".$present_class."&student_id=".$id);
}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}