<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_GET["count"];
	
    for($i=0;$i<$count;$i++){
	$name = test_input($_POST["first_name"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);
	$towards = test_input($_POST["towards"][$i]);

	$class = test_input($_POST["present_class"][$i]);
	$section = test_input($_POST["section"][$i]);
	$adm_fee = test_input($_POST["adm_fee"][$i]);
	
	$rec_date = test_input($_POST["rec_date"][$i]);
	$rec_no = test_input($_POST["rec_no"][$i]);
	
    if($adm_fee!=""){
	$sql="insert into other_fee (name,roll_no,academic_year,class,section,adm_fee,rec_date,rec_no,towards) values('$name','$roll_no','$cur_academic_year','$class','$section','$adm_fee','$rec_date','$rec_no','$towards')";
		
	$conn->query($sql);
	//var_dump($sql);
	}
}
header("Location:bulk_other_fee.php?success=success");
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}