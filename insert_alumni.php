<?php

require("connection.php");
if(isset($_POST["register"]))
{
	$first_name=test_input($_POST["first_name"]);
	$gender=test_input($_POST["gender"]);
	$dob=test_input($_POST["dob"]);
	$studied_upto=test_input($_POST["studied_upto"]);
	$year_passing=test_input($_POST["year_passing"]);
	$qualification=test_input($_POST["qualification"]);
	$occupation=test_input($_POST["occupation"]);
	$expertise=test_input($_POST["expertise"]);
	$current_position=test_input($_POST["current_position"]);
	$address=test_input($_POST["address"]);
	$city=test_input($_POST["city"]);
	$hometown=test_input($_POST["hometown"]);
	$email=test_input($_POST["email"]);
	$phone=test_input($_POST["phone"]);
	$comments=test_input($_POST["comments"]);
	
	
	
	
	$sql="insert into alumni (first_name,gender,dob,studied_upto,year_passing,qualification,occupation,expertise,current_position,address,city,hometown,email,phone,comments) values('$first_name','$gender','$dob','$studied_upto','$year_passing','$qualification','$occupation','$expertise','$current_position','$address','$city','$hometown','$email','$phone','$comments')";
	
	
	
	if ($conn->query($sql) === TRUE) 
	{
		//echo "success";
		//var_dump($sql);	
	header("Location:registration.php?success=.'success'");
    } 
	else 
	{
	header("Location:registration.php?failed=.'failed'");			
		
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	
?>