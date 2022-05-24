<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST['id'])){

	$id=$_POST['id'];
	$exam_name=$_POST['exam_name'];
	$academic_year=$_POST['academic_year'];
	$class=$_POST['class'];
	
	
}

$sql = "update exams set exam_name='".$exam_name."',class='".$class."',academic_year='".$academic_year."' where  id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:all_exams.php?status=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
			}

?>