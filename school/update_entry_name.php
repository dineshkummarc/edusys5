<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$account_name_id = test_input($_POST["account_name"]);
	$entry_name = test_input($_POST["entry_name"]);
    
	$sql="update entry_name set entry_name='".$entry_name."',account_name_id='".$account_name_id."'  WHERE id='".$id."'";
	$conn->query($sql); 
    
	header("Location:all_entry_name.php?success=success");
}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 