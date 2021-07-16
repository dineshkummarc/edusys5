<?php
session_start();
if (isset($_SESSION['lkg_uname']) && !empty($_SESSION['lkg_pass']) && !empty($_SESSION['academic_year'])) {
$academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$account_name = test_input($_POST["account_name"]);
	
$sql="insert into account_names (account_name) values('$account_name')";
$conn->query($sql); 
    
header("Location:add_account_name.php?success=success");
}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 