<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$id = test_input($_POST["id"]);
	$class_name = test_input($_POST["class_name"]);
	
  
  $sql="update class_name set class_name='".$class_name."' where id='".$id."'";
		  if ($conn->query($sql) === TRUE) {
			 
			header("Location:all_class_name.php?success=success");
			
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
	}
	}
			//}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>			
