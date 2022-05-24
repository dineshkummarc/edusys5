<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
$sql="select first_name,roll_no,section from students where academic_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
foreach($result as $value){
	$first_name=$value["first_name"];
	$roll_no=$value["roll_no"];
	$section=$value["section"];
	$sql_upd="update attendance set section='".$section."' where first_name='".$first_name."' academic_year='".$cur_academic_year."' and roll_no='".$roll_no."'";
	$conn->query($sql_upd);
}
}
	
	
	
   
   